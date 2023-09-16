<?php
include('connection.php');

if($_POST['token'] == 'as23rlkjadsnlkcj23qkjnfsDKJcnzdfb3353ads54vd3favaeveavgbqaerbVEWDSC')
{
    
    $user_id = $_POST['user_id'];
    $task_id= $_POST['task_id'];
    $guard_id = $_POST['guard_id'];
    $description = $_POST['description'];
    $location = $_POST['location'];
    $shedule_id = $_POST['shedule_id'];
    $type = $_POST['type'];
    
    
     if(!isset($_POST['user_id'])){
          $data = ["status"=>false,
            "message"=>"user_id is required"];
          echo json_encode($data); 
     }else if(!isset($_POST['task_id'])){
          $data = ["status"=>false,
              "message"=>"task_id is required"];
              echo json_encode($data); 
              
     }else if(!isset($_POST['guard_id'])){
          $data = ["status"=>false,
              "message"=>"guard_id is required"];
              echo json_encode($data); 
     }else if(!isset($_POST['location'])){
          $data = ["status"=>false,
              "message"=>"location is required"];
              echo json_encode($data); 
     }
     else if(!isset($_POST['shedule_id'])){
          $data = ["status"=>false,
              "message"=>"shedule_id is required"];
              echo json_encode($data); 
     }else if(!isset($_POST['guard_id'])){
          $data = ["status"=>false,
              "message"=>"guard_id is required"];
              echo json_encode($data); 
     }else if(!isset($_POST['type'])){
          $data = ["status"=>false,
              "message"=>"type is required"];
              echo json_encode($data); 
     }else if(!isset($_POST['description'])){
          $data = ["status"=>false,
              "message"=>"description is required"];
              echo json_encode($data); 
     }else if(!isset($_FILES['fileURI'])){
          $data = ["status"=>false,
              "message"=>"fileURI is required"];
              echo json_encode($data); 
     }else{
         
          $target_dir = "Upload/"; 
            $report_image = $_FILES['fileURI']['name'];
            $target_file = $target_dir . basename($report_image);
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $filewithnewname = date("Ymdis")."Guard_Report.".$imageFileType;
            
            $report_size = $_FILES['fileURI']['size'];
          $report_type = $_FILES['fileURI']['type'];
            $report_tmp = $_FILES['fileURI']['tmp_name'];
         
            $check_if_dataisin_db = "SELECT * FROM `user` WHERE `id` = $guard_id";
            $execute = mysqli_query($conn,$check_if_dataisin_db);
            
            if(mysqli_num_rows($execute) > 0)
            {
           
            if(isset($_FILES['fileURI']) && $description != "")
            {   
                
                if($report_size <= 5000000) /*5 mb*/
                {
                    
                   
                    if(strtolower($report_type) == "image/jpg" || strtolower($report_type) == "image/jpeg" || strtolower($report_type) == "image/png" || strtolower($report_type) == "image/jfif")
                    {
                        $insert = "INSERT INTO `add_report_data`( `user_id`, `task_id`, `guard_id`, `image` , `location` ,`file_type` , `shedule_id` , `type`) VALUES ('$user_id','$task_id','$guard_id','$filewithnewname' , '$location' ,'image' , $shedule_id , '$type')";
                        $run_insert = mysqli_query($conn,$insert);
                        if($run_insert)
                        {
                            move_uploaded_file($report_tmp,$target_dir.$filewithnewname);
                                
                            $temp = [
                                        "guard_id"=>$guard_id,
                                        "file"=>$filewithnewname,
                                            
                                    ];
                            $data = ["status"=>true,
                                    "message"=>"guard report added successfully in term of discription null",
                                    "data"=>$temp];
                            echo json_encode($data);
                                                
                                  
                        }
                        else
                        {
                            $data =
                            [
                                "status"=>false,
                                "response_code"=>403,
                                "message"=>"there was a some error while adding guard report in term of discription null",
                            ];
                            echo json_encode($data);
                        }
                        
                    }else if(strtolower($report_type) == "video/mp4"  ||  strtolower($report_type) == "video/mov"){
                        
                        $insert = "INSERT INTO `add_report_data`( `user_id`, `task_id`, `guard_id`, `image` , `location`,`file_type` , `shedule_id` , `type` ) VALUES ('$user_id','$task_id','$guard_id','$filewithnewname' , '$location' , 'video' , $shedule_id , '$type')";
                        $run_insert = mysqli_query($conn,$insert);
                        if($run_insert)
                        {
                            move_uploaded_file($report_tmp,$target_dir.$filewithnewname);
                                
                            $temp = [
                                        "guard_id"=>$guard_id,
                                        "file"=>$filewithnewname,
                                            
                                    ];
                            $data = ["status"=>true,
                                    "message"=>"guard report added successfully in term of discription null",
                                    "data"=>$temp];
                            echo json_encode($data);
                                                
                                  
                        }
                        else
                        {
                            $data =
                            [
                                "status"=>false,
                                "response_code"=>403,
                                "message"=>"there was a some error while adding guard report in term of discription null",
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
                                "message"=>"image should be jpeg, jpg, jfif and png or its a video so .mp4 and .mov is supported",
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
            elseif(!isset($_FILES['image']) && $description != "")
            {
                $insert = "INSERT INTO `add_report_data`(`user_id`, `task_id`,`guard_id`, `description`) VALUES ('$user_id','$task_id','$guard_id','$description')";
                $run_insert = mysqli_query($conn,$insert);
                if($run_insert)
                {
                        
                        $temp = [
                            "guard_id"=>$guard_id,
                            "description"=>$description];
                                            
                        $data = ["status"=>true,
                                "message"=>"guard report added successfully in term of image null",
                                "data"=>$temp];
                         echo json_encode($data); 
                    }
                else
                {
                        $data =
                        [
                            "status"=>false,
                            "response_code"=>403,
                            "message"=>"there was a some error while adding guard report in term of image null",
                        ];
                        echo json_encode($data);
                    }
            }
            elseif(isset($_FILES['image']) && $description != "")
            {
                if($report_size <= 5000000) /*5 mb*/
                {
                    if(strtolower($report_type) == "image/jpg" || strtolower($report_type) == "image/jpeg" || strtolower($report_type) == "image/png" || strtolower($report_type) == "image/jfif")
                    {
                        $insert = "INSERT INTO `add_report_data`(`user_id`, `task_id`,`guard_id`, `image`, `description` , `location`) VALUES ('$user_id','$task_id','$guard_id','$filewithnewname','$description', '$location')";
                        $run_insert = mysqli_query($conn,$insert);
                        if($run_insert)
                        {
                            move_uploaded_file($report_tmp,$target_dir.$filewithnewname);
                                
                            $temp = [
                                        "guard_id"=>$guard_id,
                                        "file"=>$filewithnewname,
                                        "description"=>$description,
                                            
                                    ];
                            $data = ["status"=>true,
                                    "message"=>"guard report added successfully in term of discription set and also set image",
                                    "data"=>$temp];
                            echo json_encode($data);
                                                
                                  
                        }
                        else
                        {
                            $data =
                            [
                                "status"=>false,
                                "response_code"=>403,
                                "message"=>"there was a some error while adding guard report in term of discription set and also set image",
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
        
        }
        else
        {
               
           $data = ["status"=>false,
                    "message"=>"user not exist!"];
                echo json_encode($data); 
        }
         
         
         
         
         
         
     }
    
   
    
}
 else
 {
           
       $data = ["status"=>false,
                "message"=>"access desined"];
            echo json_encode($data); 
}
    
?>