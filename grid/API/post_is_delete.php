<?php

    if($_POST['token'] == 'as23rlkjadsnlkcj23qkjnfsDKJcnzdfb3353ads54vd3favaeveavgbqaerbVEWDSC')
    {
        require_once("connection.php");
        
        $id = $_POST['post_service_id'];
        $u_id = $_POST['user_id'];
        
        if(empty($id))
        {
            $data = 
            [
                "status" => false,
                "message" => "post service id is required"
            ];
            echo json_encode($data);
        }
        elseif(empty($u_id))
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
        
            $select = "SELECT * FROM `add_post_service` WHERE `id` = $id and user_id = $u_id";
            $run_select = mysqli_query($conn,$select);
            $select_rows = mysqli_num_rows($run_select);
            if($select_rows > 0)
            {
                $update = "UPDATE `add_post_service` SET `is_delete`= 'Yes' WHERE `id` = $id and user_id = $u_id";
                $run_update = mysqli_query($conn,$update);
                if($run_update)
                {
                    $data = 
                    [
                        "status"=> true,
                        "response_code"=> 200,
                        "message"=> "Post Delete Successfully",
                    ];
                    echo json_encode($data);
                }
                else
                {
                    $data = 
                    [
                        "status"=> false,
                        "response_code"=> 402,
                        "message"=> "something went wrong while deleting post service",
                    ];
                    echo json_encode($data);
                }
            }
            else
            {
                $data = 
                    [
                        "status"=> false,
                        "response_code"=> 404,
                        "message"=> "post service not found",
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