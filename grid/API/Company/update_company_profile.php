<?php
 require_once('../connection.php');

if($_POST['token'] == 'as23rlkjadsnlkcj23qkjnfsDKJcnzdfb3353ads54vd3favaeveavgbqaerbVEWDSC')
{
    
    $u_id= $_POST['user_id'];
    $business_name= $_POST['business_name'];
    $email= $_POST['email'];
    $username= $_POST['username'];
    $phone= $_POST['phone'];
    $address = $_POST['address'];
    $zipcode = $_POST['zipcode']; 
    $country= $_POST['country'];
    
    $target_dir = "../Upload/"; 
    $profile_image = $_FILES['profile']['name'];
    $target_file = $target_dir . basename($profile_image);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $filewithnewname = date("Ymdis")."Company_Profile.".$imageFileType;
    
    $profile_size = $_FILES['profile']['size'];
    $profile_type = $_FILES['profile']['type'];
    $profile_tmp = $_FILES['profile']['tmp_name'];
    
    
    if (empty($u_id))
    {
          
         $data = ["status"=>false,
                    "message"=>"userid is required",
                 ];
             echo json_encode($data); 
             
    }
    else
    {
        $check_if_dataisin_db="SELECT * FROM `user` WHERE id = $u_id and role_id = 2";
        $execute = mysqli_query($conn,$check_if_dataisin_db);
      
        if(mysqli_num_rows($execute) > 0)
        {
            $ar = mysqli_fetch_array($execute);
            $role_id = $ar['role_id'];
            $provider_company = $ar['provider_company'];
            $password = $ar['password'];
            $curent_img = $ar['profile'];
            if(isset($_FILES['profile']))
            {
                if($profile_size <= 5000000) /*5 mb*/
                {
                    if(strtolower($profile_type) == "image/jpg" || strtolower($profile_type) == "image/jpeg" || strtolower($profile_type) == "image/png" || strtolower($profile_type) == "image/jfif")
                    {
                        if($curent_img == "")
                        {
                            $insert = "UPDATE `user` SET `business_name`= '$business_name',`email`= '$email',`username`= '$username',
                            `phone`= '$phone',`address`= '$address',`zipcode`= '$zipcode',`country`= '$country',`profile`= '$filewithnewname' WHERE `id`= $u_id";
                            $run_insert = mysqli_query($conn,$insert);
                            if($run_insert)
                            {
                                move_uploaded_file($profile_tmp,$target_dir.$filewithnewname);
                                
                                $temp = 
                                [
                                    "user_id"=>$u_id,
                                    "role_id"=>$role_id,
                                    "provider_company"=>$provider_company,
                                    "business_name"=>$business_name,
                                    "email"=>$email,
                                    "username"=>$username,
                                    "phone"=> $phone,
                                    "address"=> $address,
                                    "zipcode"=> $zipcode,
                                    "country"=> $country,
                                    "password"=> $password,
                                    "profile"=> $filewithnewname,
                                ];
                                        
                                $data =
                                [
                                    "status"=>true,
                                    "response_code"=>200,
                                    "message"=>"Company account account has been updated sucessfully.",
                                    "data"=>$temp
                                ];
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
                            $update = "UPDATE `user` SET `business_name`= '$business_name',`email`= '$email',`username`= '$username',
                            `phone`= '$phone',`address`= '$address',`zipcode`= '$zipcode',`country`= '$country',`profile`= '$filewithnewname' WHERE id = $u_id";
                            $run_update = mysqli_query($conn,$update);
                            if($run_update)
                            {
                                move_uploaded_file($profile_tmp,$target_dir.$filewithnewname);
                                unlink($target_dir.$curent_img);
                                
                                $temp = 
                                [
                                    "user_id"=>$u_id,
                                    "role_id"=>$role_id,
                                    "provider_company"=>$provider_company,
                                    "business_name"=>$business_name,
                                    "email"=>$email,
                                    "username"=>$username,
                                    "phone"=> $phone,
                                    "address"=> $address,
                                    "zipcode"=> $zipcode,
                                    "country"=> $country,
                                    "password"=> $password,
                                    "profile"=> $filewithnewname,
                                ];
                       
                                        
                                $data =
                                [
                                    "status"=>true,
                                    "response_code"=>200,
                                    "message"=>"Company account has been updated sucessfully.",
                                    "data"=>$temp
                                ];
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
                $insert = "UPDATE `user` SET `business_name`= '$business_name',`email`= '$email',`username`= '$username',
                `phone`= '$phone',`address`= '$address',`zipcode`= '$zipcode',`country`= '$country' WHERE `id`= $u_id";
                $run_insert = mysqli_query($conn,$insert);
                if($run_insert)
                {
                    $temp = 
                    [
                        "user_id"=>$u_id,
                        "role_id"=>$role_id,
                        "provider_company"=>$provider_company,
                        "business_name"=>$business_name,
                        "email"=>$email,
                        "username"=>$username,
                        "phone"=> $phone,
                        "address"=> $address,
                        "zipcode"=> $zipcode,
                        "country"=> $country,
                        "password"=> $password,
                        "profile"=> $curent_img,
                    ];
                                        
                    $data =
                    [
                        "status"=>true,
                        "response_code"=>200,
                        "message"=>"Company account has been updated sucessfully.",
                        "data"=>$temp
                    ];
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
                    
        }
        else
        {
            $data = ["status"=>false,
                    "message"=>"profile not exists"];
            echo json_encode($data);
        }
    }
    
      
}
else
{
    $data = 
    [
        "status"=>false,
        "Response_code"=>404,
        "Message"=>"Access denied"
    ];
    echo json_encode($data);          
}
    
      
      
      
    
      
    
     
    

?>