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
        
            $select = "SELECT * FROM `user` WHERE id = $u_id";
            $run_select = mysqli_query($conn,$select);
            $select_rows = mysqli_num_rows($run_select);
            if($select_rows > 0)
            {
                $transaction = "SELECT `id`, `user_id`, `type`, `transaction_id`, `amount`, `created_at` FROM `transaction` WHERE user_id = $u_id ORDER BY `created_at` DESC";
                $run_trans =mysqli_query($conn,$transaction);
                $row_trans = mysqli_num_rows($run_trans); 
                if($row_trans > 0)
                {
                    $myarr = array();
                    while($ar = mysqli_fetch_array($run_trans))
                    {
                        $temp = 
                        [
                            "id"=>$ar['id'],
                            "user_id"=>$ar['user_id'],
                            "type"=>$ar['type'],
                            "transaction_id"=>$ar['transaction_id'],
                            "amount"=>$ar['amount'],
                            "created_at"=>$ar['created_at']
                        ];
                        array_push($myarr,$temp);
                    }
                    
                    $data = 
                    [
                        "status"=> true,
                        "response_code"=> 200,
                        "message"=> "your all transaction fetched successfully",
                        "data"=>$myarr
                    ];
                    echo json_encode($data);
                    
                    
                }
                else
                {
                     $data = 
                    [
                        "status"=> true,
                        "response_code"=> 403,
                        "message"=> "no transaction found!",
                    ];
                    echo json_encode($data);
                }
                
            }
            else
            {
                $data = 
                    [
                        "status"=> false,
                        "response_code"=> 403,
                        "message"=> "user not found!",
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
            "message"=> "access denied!",
        ];
        echo json_encode($data);
    }


?>