<?php
include('connection.php');

if($_POST['token'] == 'as23rlkjadsnlkcj23qkjnfsDKJcnzdfb3353ads54vd3favaeveavgbqaerbVEWDSC')
{
    
    $user_id = $_POST['user_id'];
    $fname = $_POST['first_name'];
    $lname = $_POST['last_name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $zipcode = $_POST['zipcode'];
    $country = $_POST['country'];
    
    $target_dir = "Upload/"; 
    $profile_image = $_FILES['profile']['name'];
    $target_file = $target_dir . basename($profile_image);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $filewithnewname = date("Ymdis")."Guard_Profile.".$imageFileType;
    
    $profile_size = $_FILES['profile']['size'];
    $profile_type = $_FILES['profile']['type'];
    $profile_tmp = $_FILES['profile']['tmp_name'];
 
    $check_if_dataisin_db = "SELECT * FROM `user` WHERE `id` = $user_id";
    $execute = mysqli_query($conn,$check_if_dataisin_db);
    
    if(mysqli_num_rows($execute) > 0)
    {
        $fetch_user_data = mysqli_fetch_array($execute);
        $u_id = $fetch_user_data['id'];
        $curent_img = $fetch_user_data['profile'];
           
        if(isset($_FILES['profile']))
        {
            if($profile_size <= 5000000) /*5 mb*/
            {
                if(strtolower($profile_type) == "image/jpg" || strtolower($profile_type) == "image/jpeg" || strtolower($profile_type) == "image/png" || strtolower($profile_type) == "image/jfif")
                {
                    if($curent_img == "")
                    {
                        $insert = "UPDATE `user` SET `first_name`= '$fname',`last_name`= '$lname',`email`= '$email',`username`= '$username',`phone` = '$phone',`address`= '$address',`zipcode`= '$zipcode',`country`= '$country', `profile`= '$filewithnewname' WHERE id = $u_id";
                        $run_insert = mysqli_query($conn,$insert);
                        if($run_insert)
                        {
                            move_uploaded_file($profile_tmp,$target_dir.$filewithnewname);
                            
                            $temp = [
                                        "user_id"=>$u_id,
                                        "role_id"=>$fetch_user_data['role_id'],
                                        "firstname"=>$fname,
                                        "lastname"=>$lname,
                                        "email"=>$email,
                                        "password"=>$fetch_user_data['password'],
                                        "service"=>$fetch_user_data['service'],
                                        "username"=>$username,
                                        "phone"=>$phone,
                                        "address"=>$address,
                                        "zipcode"=>$zipcode,
                                        "country"=>$country,
                                        "profile"=> $filewithnewname,
                                        "notification_token"=>$fetch_user_data['notification_token'],
                                        
                                    ];
                                   $data = ["status"=>true,
                                            "message"=>"guard updated successfully.",
                                            "data"=>$temp];
                                   echo json_encode($data);
                                            
                              
                            }
                        else
                        {
                                $data =
                                [
                                    "status"=>false,
                                    "response_code"=>403,
                                    "message"=>"there was a some error while inserting image",
                                ];
                                echo json_encode($data);
                            }
                    }
                    elseif($curent_img != "")
                    {
                        $update = "UPDATE `user` SET `first_name`= '$fname',`last_name`= '$lname',`email`= '$email',`username`= '$username',`phone` = '$phone',`address`= '$address',`zipcode`= '$zipcode',`country`= '$country', `profile`= '$filewithnewname' WHERE id = $u_id";
                        $run_update = mysqli_query($conn,$update);
                        if($run_update)
                        {
                            move_uploaded_file($profile_tmp,$target_dir.$filewithnewname);
                            unlink($target_dir.$curent_img);
                                
                               $temp = [
                                            "user_id"=>$u_id,
                                            "role_id"=>$fetch_user_data['role_id'],
                                            "firstname"=>$fname,
                                            "lastname"=>$lname,
                                            "email"=>$email,
                                            "password"=>$fetch_user_data['password'],
                                            "service"=>$fetch_user_data['service'],
                                            "username"=>$username,
                                            "phone"=>$phone,
                                            "address"=>$address,
                                            "zipcode"=>$zipcode,
                                            "country"=>$country,
                                            "profile"=> $filewithnewname,
                                            "notification_token"=>$fetch_user_data['notification_token'],
                                        
                                        ];
                       
                                        
                                    $data = ["status"=>true,
                                            "message"=>"guard updated in successfully.",
                                            "data"=>$temp];
                                   echo json_encode($data);
                            }
                        else
                        {
                                $data =
                                [
                                    "status"=>false,
                                    "response_code"=>403,
                                    "message"=>"there was a some error while updating image",
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
        elseif(!isset($_FILES['profile']))
        {
            $insert = "UPDATE `user` SET `first_name`= '$fname',`last_name`= '$lname',`email`= '$email',`username`= '$username',`phone` = '$phone',`address`= '$address',`zipcode`= '$zipcode',`country`= '$country' WHERE `id`= $u_id";
            $run_insert = mysqli_query($conn,$insert);
            if($run_insert)
            {
                    
                    $temp = [
                        "user_id"=>$u_id,
                        "role_id"=>$fetch_user_data['role_id'],
                        "firstname"=>$fname,
                        "lastname"=>$lname,
                        "email"=>$email,
                        "password"=>$fetch_user_data['password'],
                        "service"=>$fetch_user_data['service'],
                        "username"=>$username,
                        "phone"=>$phone,
                        "address"=>$address,
                        "zipcode"=>$zipcode,
                        "country"=>$country,
                        "profile"=>$curent_img,
                        "notification_token"=>$fetch_user_data['notification_token'],
                        
                    ];
                                        
                            $data = ["status"=>true,
                                "message"=>"guard updated successfully.",
                                "data"=>$temp];
                       echo json_encode($data); 
                }
            else
            {
                    $data =
                    [
                        "status"=>false,
                        "response_code"=>403,
                        "message"=>"there was a some error while updating record",
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
 else
 {
           
       $data = ["status"=>false,
                "message"=>"access desined"];
            echo json_encode($data); 
}
    
?>