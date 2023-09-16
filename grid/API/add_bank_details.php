<?php

    if($_POST['token'] == 'as23rlkjadsnlkcj23qkjnfsDKJcnzdfb3353ads54vd3favaeveavgbqaerbVEWDSC')
    {
        require_once("connection.php");
        
        $u_id = $_POST['user_id'];
        $bank_name = $_POST['bank_name'];
        $iban_number = $_POST['iban_number'];
        $account_holder_name = $_POST['account_holder_name'];
        
        if(empty($u_id))
        {
            $data = 
            [
                "status" => false,
                "message" => "userid is required"
            ];
            echo json_encode($data);
        }
        elseif(empty($bank_name))
        {
            $data = 
            [
                "status" => false,
                "message" => "bank name is required"
            ];
            echo json_encode($data);
        }
        elseif(empty($iban_number))
        {
            $data = 
            [
                "status" => false,
                "message" => "iban number is required"
            ];
            echo json_encode($data);
        }
        elseif(empty($account_holder_name))
        {
            $data = 
            [
                "status" => false,
                "message" => "account holder name is required"
            ];
            echo json_encode($data);
        }
        else
        {
        
                
                $insert = "INSERT INTO `add_bank_details`(`user_id`, `bank_name`, `iban_number`, `account_holder_name`) 
                VALUES ('$u_id','$bank_name','$iban_number','$account_holder_name')";
                $run_insert = mysqli_query($conn,$insert);
                if($run_insert)
                {
                    $temp = 
                    [
                        "user_id"=>$u_id,
                        "bank_name"=>$bank_name,
                        "iban_number"=>$iban_number,
                        "account_holder_name"=>$account_holder_name,
                    ];
                    
                    $data = 
                    [
                        "status"=> true,
                        "response_code"=> 200,
                        "message"=> "bank details add successfully",
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
                        "message"=> "something wrong while adding bank info",
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