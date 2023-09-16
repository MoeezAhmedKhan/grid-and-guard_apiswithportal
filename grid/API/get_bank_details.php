<?php

    if($_POST['token'] == 'as23rlkjadsnlkcj23qkjnfsDKJcnzdfb3353ads54vd3favaeveavgbqaerbVEWDSC')
    {
        require_once("connection.php");
        
        $u_id = $_POST['user_id'];
        
        if(empty($u_id))
        {
            $data = 
            [
                "status" => false,
                "message" => "userid is required"
            ];
            echo json_encode($data);
        }
        else
        {
        
            $select = "SELECT * FROM `add_bank_details` WHERE user_id = $u_id";
            $run_select = mysqli_query($conn,$select);
            $select_rows = mysqli_num_rows($run_select);
            if($select_rows > 0)
            {
                $fetch = "SELECT `id`, `user_id`, `bank_name`, `iban_number`, `account_holder_name`, `created_at` FROM `add_bank_details` WHERE user_id = $u_id";
                $run_fetch = mysqli_query($conn,$fetch);
                while($ar = mysqli_fetch_array($run_fetch))
                {
                    if($run_fetch)
                    {
                        $temp = 
                        [
                            // "id"=>$ar['id'],
                            "user_id"=>$ar['user_id'],
                            "bank_name"=>$ar['bank_name'],
                            "iban_number"=>$ar['iban_number'],
                            "account_holder_name"=>$ar['account_holder_name'],
                        ];
                        
                        $data = 
                        [
                            "status"=> true,
                            "response_code"=> 200,
                            "message"=> "user bank details fetch successfully",
                            "data"=>$temp,
                        ];
                        echo json_encode($data);
                    }
                    else
                    {
                        $data = 
                        [
                            "status"=> false,
                            "response_code"=> 404,
                            "message"=> "something wrong while updating bank info",
                        ];
                        echo json_encode($data);
                    }
                }
            }
            else
            {
                $data = 
                    [
                        "status"=> false,
                        "response_code"=> 404,
                        "message"=> "user record not found",
                    ];
                    echo json_encode($data);
            }
        }
        
        
    }
    else
    {
        $data =
        [
            "status"=> false,
            "response_code"=>403,
            "message"=> "access denied",
        ];
        echo json_encode($data);
    }


?>