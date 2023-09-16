<?php

require_once("../connection.php");
if($_POST['token'] == "as23rlkjadsnlkcj23qkjnfsDKJcnzdfb3353ads54vd3favaeveavgbqaerbVEWDSC")
{
    $u_id = $_POST['user_id'];
    $loc = $_POST['location'];
    $guard_response = $_POST['guard_response'];
    
    // for image
    $target_dir = "../Upload/";
    $image = $_FILES['image']['name'];
    $target_file = $target_dir.basename($image);
    $imagefiletype = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $filewithnewname = date("Ymdis")."GUARDRESPONSE.".$imagefiletype;
    
    $image_size = $_FILES['image']['size'];
    $image_type = $_FILES['image']['type'];
    $image_tmp = $_FILES['image']['tmp_name'];
    
    // for video
    $video = $_FILES['video']['name'];
    $target_video = $target_dir . basename($video);
    $videofiletype = strtolower(pathinfo($target_video,PATHINFO_EXTENSION));
    $videowithnewname = date("Ymdis")."GUARDRESPONSE.".$videofiletype;
    
    $video_size = $_FILES['video']['size'];
    $video_type = $_FILES['video']['type'];
    $video_tmp = $_FILES['video']['tmp_name'];
    
    if(isset($_FILES['image']) && isset($_FILES['video']))
    {
        if($image_size <= 5000000) /*5MB*/
        {
            if(strtolower($image_type) == "image/jpg" || strtolower($image_type) == "image/jpeg" || strtolower($image_type) == "image/png" || strtolower($image_type) == "image/jfif")
            {
                if($video_size <= 5000000) /*5MB*/
                {
                    if(strtolower($video_type) == "video/mp4" || strtolower($video_type) == "video/wmv" || strtolower($video_type) == "video/mkv" || strtolower($video_type) == "video/mov" || strtolower($video_type) == "video/avi" || strtolower($video_type) == "video/avchd")
                    {
                        $insert = "INSERT INTO `on_demand_guard_response`(`user_id`, `location`, `guard_response`, `image`, `video`) 
                        VALUES ($u_id,'$loc','$guard_response','$filewithnewname','$videowithnewname')";
                        $run = mysqli_query($conn,$insert);
                        if($insert)
                        {
                            move_uploaded_file($image_tmp,$target_dir.$filewithnewname);
                            move_uploaded_file($video_tmp,$target_dir.$videowithnewname);
                                
                            $data =
                            [
                                "status"=>true,
                                "response_code"=>200,
                                "message"=>"guard response with image and video added successfully",
                            ];
                            echo json_encode($data);
                        }
                        else
                        {
                            $data = 
                            [
                                "status"=>false,
                                "response_code"=>403,
                                "message"=>"guard response with image and video action failed",
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
                            "message"=>"video should be MP4, MOV, WMV, AVI, AVCHD and MKV",
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
                        "message"=>"video size is greater then 5MB || image size should be less then or equal to 5MB",
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
    elseif(!isset($_FILES['image']) && !isset($_FILES['video']))
    {
        $insert = "INSERT INTO `on_demand_guard_response`(`user_id`, `location`, `guard_response`) 
        VALUES ($u_id,'$loc','$guard_response')";
        $run = mysqli_query($conn,$insert);
        if($run)
        {
            $data = 
            [
                "status"=>true,
                "response_code"=>200,
                "message"=>"guard response without image and video added successfully",
            ];
            echo json_encode($data);
        }
        else
        {
            $data = 
            [
                "status"=>false,
                "response_code"=>403,
                "message"=>"guard response without image and video action failed",
            ];
            echo json_encode($data);
        }
    }
    elseif(isset($_FILES['image']))
    {
        if($image_size <= 5000000) /*5MB*/
        {
            if(strtolower($image_type) == "image/jpg" || strtolower($image_type) == "image/jpeg" || strtolower($image_type) == "image/png" || strtolower($image_type) == "image/jfif")
            {
                $insert = "INSERT INTO `on_demand_guard_response`(`user_id`, `location`, `guard_response`,`image`) 
                VALUES ($u_id,'$loc','$guard_response','$filewithnewname')";
                $run = mysqli_query($conn,$insert);
                if($insert)
                {
                    move_uploaded_file($image_tmp,$target_dir.$filewithnewname);
                        
                    $data =
                    [
                        "status"=>true,
                        "response_code"=>200,
                        "message"=>"guard response with image added successfully",
                    ];
                    echo json_encode($data);
                }
                else
                {
                    $data = 
                    [
                        "status"=>false,
                        "response_code"=>403,
                        "message"=>"guard response with image action failed",
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
    elseif(isset($_FILES['video']))
    {
        if($video_size <= 5000000) /*5MB*/
        {
            if(strtolower($video_type) == "video/mp4" || strtolower($video_type) == "video/wmv" || strtolower($video_type) == "video/mkv" || strtolower($video_type) == "video/mov" || strtolower($video_type) == "video/avi" || strtolower($video_type) == "video/avchd")
            {
                $insert = "INSERT INTO `on_demand_guard_response`(`user_id`, `location`, `guard_response`,`video`) 
                VALUES ($u_id,'$loc','$guard_response','$videowithnewname')";
                $run = mysqli_query($conn,$insert);
                if($insert)
                {
                    move_uploaded_file($video_tmp,$target_dir.$videowithnewname);
                        
                    $data =
                    [
                        "status"=>true,
                        "response_code"=>200,
                        "message"=>"guard response with video added successfully",
                    ];
                    echo json_encode($data);
                }
                else
                {
                    $data = 
                    [
                        "status"=>false,
                        "response_code"=>403,
                        "message"=>"guard response with video action failed",
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
                    "message"=>"video should be MP4, MOV, WMV, AVI, AVCHD and MKV",
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
                "message"=>"video size is greater then 5MB || image size should be less then or equal to 5MB",
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
        "message"=>"access denied",
    ];
    echo json_encode($data);
}


?>