<?php
 include('connection.php');

if($_POST['token'] == 'as23rlkjadsnlkcj23qkjnfsDKJcnzdfb3353ads54vd3favaeveavgbqaerbVEWDSC')
{
    
    $role_id= $_POST['role_id'];
    $business_name= $_POST['business_name'];
    $firstname= $_POST['firstname'];
    $lastname= $_POST['lastname'];
    $email= $_POST['email'];
    $username= $_POST['username'];
    $phone= $_POST['phone'];
    $password= $_POST['password'];
    $address = $_POST['address'];
    $zipcode = $_POST['zipcode']; 
    $country= $_POST['country'];
    $notification_token= $_POST['notification_token'];
    $social_id= $_POST['social_id'];
    
    if (empty($role_id))
    {
          
         $data = ["status"=>false,
                    "message"=>"role id is required",
                 ];
             echo json_encode($data); 
             
    }
    else if(empty($email)) 
    {
          
        $data = ["status"=>false,
                    "message"=>"email is required",
                 ];
             echo json_encode($data);
             
    }
    else if(empty($username)) 
      {
          
        $data = ["status"=>false,
                    "message"=>"username is required",
                 ];
             echo json_encode($data);
             
    }
    else if(empty($phone)) 
    {
          
        $data = ["status"=>false,
                    "message"=>"phone is required",
                 ];
             echo json_encode($data);
             
    }
    else if(empty($password)) 
    {
          
        $data = ["status"=>false,
                    "message"=>"password is required",
                 ];
             echo json_encode($data); 
             
    }
    else if(empty($zipcode)) 
    {
          
        $data = ["status"=>false,
                    "message"=>"zipcode is required",
                 ];
             echo json_encode($data); 
             
    }
    else if(empty($country)) 
    {
          
        $data = ["status"=>false,
                    "message"=>"country is required",
                 ];
             echo json_encode($data); 
             
    }
    else
    {
          
        $check_if_dataisin_db="SELECT * FROM `user` WHERE email = '$email'";
        $execute = mysqli_query($conn,$check_if_dataisin_db);
      
        if(mysqli_num_rows($execute) == 0)
        {
            if($social_id != "")
            {
                if(empty($business_name))
                {
                    // for individual
                    $insert_user = "INSERT INTO `user`(`role_id`, `first_name`, `last_name`, `email`,
                    `username`, `phone`, `password`, `address`, `zipcode`, `country`, `notification_token`,`social_id`) VALUES 
                    ($role_id,'$firstname','$lastname','$email','$username','$phone','$password','$address','$zipcode','$country','$notification_token','$social_id')";
                     $result = mysqli_query($conn,$insert_user);
                    if($result)
                    {
                        $last_id = $conn->insert_id;
                        $companyQuery = "SELECT provider_company FROM `user` WHERE `id` = $last_id";
                         $execute = mysqli_query($conn,$companyQuery);
                        $_companyProvider = mysqli_fetch_array($execute);
                        $temp = [
                                    "user_id"=>$last_id,
                                    "role_id"=>$role_id,
                                    "firstname"=> $firstname,
                                    "lastname"=>$lastname,
                                    "email"=>$email,
                                    "username"=>$username,
                                    "phone"=> $phone,
                                    "password"=> $password,
                                    "address"=> $address,
                                    "zipcode"=> $zipcode,
                                    "country"=> $country,
                                    "provider_company"=> $_companyProvider['provider_company'],
                                    "notification_token"=> $notification_token,
                                    "social_id"=> $social_id,
                                ];
                                        
                              $data = ["status"=>true,
                                    "message"=>"individual account has been registered sucessfully.",
                                    "data"=>$temp];
                              echo json_encode($data);   
                    }
                    else
                    {
                              
                        $data = ["status"=>false,
                                "message"=>"there was some error while creating individual account"];
                        echo json_encode($data);   
                    }
                
                }
                else
                {
                    // for company
                     $insert_user = "INSERT INTO `user`(`role_id`, `business_name`, `email`, `username`,
                     `phone`, `password`, `address`, `zipcode`, `country`, `notification_token`,`social_id`) VALUES 
                    ($role_id,'$business_name','$email','$username','$phone','$password','$address','$zipcode','$country','$notification_token','$social_id')";
                     $result = mysqli_query($conn,$insert_user);
                    if($result)
                    {
                            
                        $last_id = $conn->insert_id;
                        $companyQuery = "SELECT provider_company FROM `user` WHERE `id` = $last_id";
                         $execute = mysqli_query($conn,$companyQuery);
                        $_companyProvider = mysqli_fetch_array($execute);
                        $temp = [
                                    "user_id"=>$last_id,
                                    "role_id"=>$role_id,
                                    "business_name"=>$business_name,
                                    "firstname"=> $firstname,
                                    "lastname"=>$lastname,
                                    "email"=>$email,
                                    "username"=>$username,
                                    "phone"=> $phone,
                                    "password"=> $password,
                                    "address"=> $address,
                                    "zipcode"=> $zipcode,
                                    "country"=> $country,
                                    "provider_company"=> $_companyProvider['provider_company'],
                                    "notification_token"=> $notification_token,
                                    "social_id"=> $social_id,
                                ];
                                        
                              $data = ["status"=>true,
                                    "message"=>"account has been registered sucessfully.",
                                    "data"=>$temp];
                              echo json_encode($data);   
                    }
                    else
                    {
                              
                        $data = ["status"=>false,
                                    "message"=>"there was some error while creating company account"];
                        echo json_encode($data);   
                    }
                }
            }
            else
            {
                if(empty($business_name))
                {
                    // for individual
                    $insert_user = "INSERT INTO `user`(`role_id`, `first_name`, `last_name`, `email`,
                    `username`, `phone`, `password`, `address`, `zipcode`, `country`, `notification_token`) VALUES 
                    ($role_id,'$firstname','$lastname','$email','$username','$phone','$password','$address','$zipcode','$country','$notification_token')";
                     $result = mysqli_query($conn,$insert_user);
                    if($result)
                    {
                            
                        $last_id = $conn->insert_id;
                        $companyQuery = "SELECT provider_company FROM `user` WHERE `id` = $last_id";
                         $execute = mysqli_query($conn,$companyQuery);
                        $_companyProvider = mysqli_fetch_array($execute);
                        $temp = [
                                    "user_id"=>$last_id,
                                    "role_id"=>$role_id,
                                    "firstname"=> $firstname,
                                    "lastname"=>$lastname,
                                    "email"=>$email,
                                    "username"=>$username,
                                    "phone"=> $phone,
                                    "password"=> $password,
                                    "address"=> $address,
                                    "zipcode"=> $zipcode,
                                    "country"=> $country,
                                    "provider_company"=> $_companyProvider['provider_company'],
                                    "notification_token"=> $notification_token,
                                ];
                                        
                              $data = ["status"=>true,
                                    "message"=>"individual account has been registered sucessfully.",
                                    "data"=>$temp];
                              echo json_encode($data);   
                    }
                    else
                    {
                              
                        $data = ["status"=>false,
                                "message"=>"there was some error while creating individual account"];
                        echo json_encode($data);   
                    }
                
                }
                else
                {
                    // for company
                     $insert_user = "INSERT INTO `user`(`role_id`, `business_name`, `email`, `username`,
                     `phone`, `password`, `address`, `zipcode`, `country`, `notification_token`) VALUES 
                    ($role_id,'$business_name','$email','$username','$phone','$password','$address','$zipcode','$country','$notification_token')";
                     $result = mysqli_query($conn,$insert_user);
                    if($result)
                    {
                            
                        $last_id = $conn->insert_id;
                        $companyQuery = "SELECT provider_company FROM `user` WHERE `id` = $last_id";
                         $execute = mysqli_query($conn,$companyQuery);
                        $_companyProvider = mysqli_fetch_array($execute);
                        $temp = [
                                    "user_id"=>$last_id,
                                    "role_id"=>$role_id,
                                    "business_name"=>$business_name,
                                    "firstname"=> $firstname,
                                    "lastname"=>$lastname,
                                    "email"=>$email,
                                    "username"=>$username,
                                    "phone"=> $phone,
                                    "password"=> $password,
                                    "address"=> $address,
                                    "zipcode"=> $zipcode,
                                    "country"=> $country,
                                    "provider_company"=> $_companyProvider['provider_company'],
                                    "notification_token"=> $notification_token,
                                ];
                                        
                              $data = ["status"=>true,
                                    "message"=>"company account has been registered sucessfully.",
                                    "data"=>$temp];
                              echo json_encode($data);   
                    }
                    else
                    {
                              
                        $data = ["status"=>false,
                                    "message"=>"there was some error while creating company account"];
                        echo json_encode($data);   
                    }
                }
            }
            
         
        }
        else
        {
              
              $data = ["status"=>false,
                        "message"=>"email already exists"];
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