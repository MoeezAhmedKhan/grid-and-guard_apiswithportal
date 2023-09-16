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
        
            $select = "SELECT * FROM `users` WHERE id = $u_id";
            $run_select = mysqli_query($conn,$select);
            $select_rows = mysqli_num_rows($run_select);
            if($select_rows > 0)
            {
                        $ar = mysqli_fetch_array($run_select);
                        
                        $temp = 
                        [
                            "password"=>$ar['password'],
                        ];
                        
                        $data = 
                        [
                            "status"=> true,
                            "response_code"=> 200,
                            "message"=> "user password fetched",
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