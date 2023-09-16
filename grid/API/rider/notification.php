<?php


    if($_POST['token'] == 'as23rlkjadsnlkcj23qkjnfsDKJcnzdfb3353ads54vd3favaeveavgbqaerbVEWDSC')
    {
        require_once("connection.php");
        
        $user_id = $_POST['user_id'];
        
        $query = "SELECT `id`, `user_id`, `title`, `description`, `date`, `time` FROM `notification` WHERE `user_id` = '$user_id'";
        $run = mysqli_query($conn,$query);
        $rows = mysqli_num_rows($run);
        if($rows > 0)
        {
            while($arr = mysqli_fetch_array($run))
            {
                $temp = [
                    
                        "id" => $arr['id'],
                        "user_id" => $arr['user_id'],
                        "title" => $arr['title'],
                        "description" => $arr['description'],
                        "date" => $arr['date'],
                        "time" => $arr['time'],
                    
                    ];
            }
            
            $data = [
                
                    "status"=>true,
                    "response_code"=>200,
                    "message"=>"notification found successfull",
                    "data"=>$notification_array,
                
                ];
                echo json_encode($data);
        }
        else
        {
            $data = [
                
                    "status"=>false,
                    "response_code"=>202,
                    "message"=>"Not found",
                
                ];
                echo json_encode($data);
        }
    }
    else
    {
        $data = [
                
                    "status"=>false,
                    "response_code"=>404,
                    "message"=>"Not found",
                
                ];
                echo json_encode($data);
    }


?>