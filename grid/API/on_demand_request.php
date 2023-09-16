<?php


require_once('connection.php');
if($_POST['token'] == 'as23rlkjadsnlkcj23qkjnfsDKJcnzdfb3353ads54vd3favaeveavgbqaerbVEWDSC')
{
        $user_id = $_POST['user_id'];
        $location_name = $_POST['name_of_location'];
        $location = json_encode($_POST['location'],true);
        $notes = $_POST['notes'];
        $promoCode_id = $_POST['promo_id'] ? $_POST['promo_id'] : 0;
        $amount = $_POST['amount'];
        $discounted_amount = $_POST['discounted_amount'];
        $image = $_FILES['image']['name'];
        $video = $_FILES['video']['name'];
        // echo $promoCode_id;
        // die();
        $playerId = [];
        
        
        $target_dir = "Upload/"; 
        $target = $image;
        $target_image = $target_dir . basename($target);
        $imageFileType = strtolower(pathinfo($target_image,PATHINFO_EXTENSION));
        $imagewithnewname = date("Ymdis")."On_Demand_Request_Image.".$imageFileType;
        
        $image_size = $_FILES['image']['size'];
        $image_type = $_FILES['image']['type'];
        $image_tmp = $_FILES['image']['tmp_name'];
        
        
        $target_v = $video;
        $target_video = $target_dir . basename($target_v);
        $videoFileType = strtolower(pathinfo($target_video,PATHINFO_EXTENSION));
        $videowithnewname = date("Ymdis")."On_Demand_Video.".$videoFileType;
        
        $video_size = $_FILES['video']['size'];
        $video_type = $_FILES['video']['type'];
        $video_tmp = $_FILES['video']['tmp_name'];
        
        if(!isset($_FILES['image']) && !isset($_FILES['video']))
        {
            $sql = "INSERT INTO `on_demand_request`(`user_id`, `name_of_location`, `location`,`additional_notes`,
            `promoCode_id`, `amount` , `discounted_amount`) VALUES 
            ('$user_id','$location_name',$location,'$notes','$promoCode_id','$amount' , $discounted_amount)";
            $exec_sql = mysqli_query($conn , $sql);
            if($exec_sql)
            {
                $sql_get_token = "SELECT * FROM guard_status g INNER JOIN user u on u.id = g.guard_id WHERE g.status = 'idle'";
                $ex = mysqli_query($conn,$sql_get_token);
                while($Data = mysqli_fetch_array($ex))
                {
                    array_push($playerId, $Data['notification_token']);
                }
                $content = array
                (
                    "en" => "On Demand Job Available Now",
                );
                $fields = array
                (
                   'app_id' => "83e0a29c-60be-46c0-ac3f-e08f4e905e0b",
                   'include_player_ids' => $playerId,
                   'data' => array("type" => "message"),
                   'large_icon' =>"ic_launcher_round.png",
                   'contents' => $content
                );
                $fields = json_encode($fields);
                       
        
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
                'Authorization: Basic ODU5ZDhiZjAtOWRkZS00NDIyLWI0ZWItOTYxMDc5YzQzMGIz'));
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                curl_setopt($ch, CURLOPT_HEADER, FALSE);
                curl_setopt($ch, CURLOPT_POST, TRUE);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);    
        
                $response = curl_exec($ch);
                curl_close($ch);
                
                
                
                
                 $data = 
                 [
                        "status"=>true,
                        "response_code"=>200,
                        "message"=>"On Demand request with out image and video added successfully."
                 ];
                 echo json_encode($data);  
            }
            else
            {
                 $data = 
                        [
                            "status"=>false,
                            "response_code"=>203,
                            "message"=>"Something went wrong. Please try later."
                        ];
                    echo json_encode($data);  
            }
        
            
        }
        elseif(isset($_FILES['image']) && !isset($_FILES['video']))
        {
            if($image_size <= 5000000) /*5 mb*/
            {
                if(strtolower($image_type) == "image/jpg" || strtolower($image_type) == "image/jpeg" || strtolower($image_type) == "image/png" || strtolower($image_type) == "image/jfif")
                {
                    $sql = "INSERT INTO `on_demand_request`( `user_id`, `name_of_location`, `location`, `additional_notes`, `image`, `promoCode_id`, `amount` , `discounted_amount`) 
                    VALUES ($user_id,'$location_name','$location','$notes','$imagewithnewname','$promoCode_id','$amount' , $discounted_amount)";
                    $exec_sql = mysqli_query($conn, $sql);
                    if($exec_sql)
                    {
                        move_uploaded_file($image_tmp,$target_dir.$imagewithnewname);
                        
                        $sql_get_token = "SELECT * FROM guard_status g INNER JOIN user u on u.id = g.guard_id WHERE g.status = 'idle'";
                        $ex = mysqli_query($conn,$sql_get_token);
                        while($Data = mysqli_fetch_array($ex))
                        {
                            array_push($playerId, $Data['notification_token']);
                        }
                        
                        $content = array
                        (
                            "en" => "On Demand Job Available Now",
                        );
                        $fields = array
                        (
                           'app_id' => "83e0a29c-60be-46c0-ac3f-e08f4e905e0b",
                           'include_player_ids' => $playerId,
                           'data' => array("type" => "message"),
                           'large_icon' =>"ic_launcher_round.png",
                           'contents' => $content
                        );
                        $fields = json_encode($fields);
                               
                
                        $ch = curl_init();
                        curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
                        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
                        'Authorization: Basic ODU5ZDhiZjAtOWRkZS00NDIyLWI0ZWItOTYxMDc5YzQzMGIz'));
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                        curl_setopt($ch, CURLOPT_HEADER, FALSE);
                        curl_setopt($ch, CURLOPT_POST, TRUE);
                        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);    
                
                        $response = curl_exec($ch);
                        curl_close($ch);
                        
                        
                        
                        
                         $data = 
                         [
                                "status"=>true,
                                "response_code"=>200,
                                "message"=>"On Demand request with image added successfully."
                         ];
                         echo json_encode($data);  
                    }
                    else
                    {
                         $data = 
                        [
                            "status"=>false,
                            "response_code"=>203,
                            "message"=>"Something went wrong. Please try later."
                        ];
                        echo json_encode($data);  
                    }
                }
                else
                {
                        $data =
                        [
                            "status"=>false,
                            "response_code"=>402,
                            "message"=>"image should be jpeg, jpg, jfif and png",
                        ];
                        echo json_encode($data);
                }
            }
            else
            {
                    $data =
                    [
                        "status"=>false,
                        "response_code"=>403,
                        "message"=>"image size is greater then 5MB || image size should be less then or equal to 5MB",
                    ];
                    echo json_encode($data);
            }
        }
        elseif(isset($_FILES['video']) && !isset($_FILES['image']))
        {
            if($video_size <= 5000000) /*5 mb*/
            {
                if(strtolower($video_type) == "video/mp4" || strtolower($video_type) == "video/mov" || strtolower($video_type) == "video/wmv" || strtolower($video_type) == "video/mkv" || strtolower($video_type) == "video/avi" || strtolower($video_type) == "video/avchd")
                {
                    $sql = "INSERT INTO `on_demand_request`( `user_id`, `name_of_location`, `location`, `additional_notes`, `video`, `promoCode_id`, `amount` , `discounted_amount`) 
                    VALUES ($user_id,'$location_name','$location','$notes','$videowithnewname','$promoCode_id','$amount' , $discounted_amount)";
                    $exec_sql = mysqli_query($conn , $sql);
                    if($exec_sql)
                    {
                        move_uploaded_file($video_tmp,$target_dir.$videowithnewname);
                        
                        $sql_get_token = "SELECT * FROM guard_status g INNER JOIN user u on u.id = g.guard_id WHERE g.status = 'idle'";
                        $ex = mysqli_query($conn,$sql_get_token);
                        while($Data = mysqli_fetch_array($ex))
                        {
                            array_push($playerId, $Data['notification_token']);
                        }
                        
                        $content = array
                        (
                            "en" => "On Demand Job Available Now",
                        );
                        $fields = array
                        (
                           'app_id' => "83e0a29c-60be-46c0-ac3f-e08f4e905e0b",
                           'include_player_ids' => $playerId,
                           'data' => array("type" => "message"),
                           'large_icon' =>"ic_launcher_round.png",
                           'contents' => $content
                        );
                        $fields = json_encode($fields);
                               
                
                        $ch = curl_init();
                        curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
                        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
                        'Authorization: Basic ODU5ZDhiZjAtOWRkZS00NDIyLWI0ZWItOTYxMDc5YzQzMGIz'));
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                        curl_setopt($ch, CURLOPT_HEADER, FALSE);
                        curl_setopt($ch, CURLOPT_POST, TRUE);
                        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);    
                
                        $response = curl_exec($ch);
                        curl_close($ch);
                        
                        
                        
                        
                         $data = 
                         [
                                "status"=>true,
                                "response_code"=>200,
                                "message"=>"On Demand request with video added successfully."
                         ];
                         echo json_encode($data);  
                    }
                    else
                    {
                         $data = 
                        [
                            "status"=>false,
                            "response_code"=>203,
                            "message"=>"Something went wrong. Please try later."
                        ];
                        echo json_encode($data);  
                    }
                }
                else
                {
                        $data =
                        [
                            "status"=>false,
                            "response_code"=>402,
                            "message"=>"video should be AVCHD , AVI, WMV, MOV, MP4 and MKV",
                        ];
                        echo json_encode($data);
                }
            }
            else
            {
                    $data =
                    [
                        "status"=>false,
                        "response_code"=>403,
                        "message"=>"image size is greater then 5MB || image size should be less then or equal to 5MB",
                    ];
                    echo json_encode($data);
            }
        }

}
else
{
    $data = 
    [
        "status"=>false,
        "response_code"=>404,
        "message"=>"Access denied"
    ];
    echo json_encode($data);          
}

?>