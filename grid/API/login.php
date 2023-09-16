<?php
include('connection.php');

if($_POST['token'] == 'as23rlkjadsnlkcj23qkjnfsDKJcnzdfb3353ads54vd3favaeveavgbqaerbVEWDSC')
{
    
     // $role_id = $_POST['role_id'];  
     $email = $_POST['email'];  
     $password = $_POST['password'];  
     $notification_token= $_POST['notification_token'];
 
 
     if(empty($email))
     {
        $data = ["status"=>false,
                 "message"=>"email is required",
                ];
        echo json_encode($data); 
     }
     else if
     (empty($password))
     {
        $data = ["status"=>false,
                 "message"=>"password is required",
                ];
        echo json_encode($data);
     }
     else
     {
     
        $check_if_dataisin_db = "SELECT * FROM `user` WHERE email = '$email' and password = '$password'";
        $execute = mysqli_query($conn,$check_if_dataisin_db);
        $row = mysqli_num_rows($execute);
        if($row > 0)
        {
            $user_data = mysqli_fetch_array($execute);
            $user_role = $user_data['role_id'];
            $user_id = $user_data['id'];
            if($user_role == 1)
            {
                $update_data = "UPDATE `user` SET `notification_token` = '$notification_token' WHERE `id` = '$user_id'";
                $execute_update = mysqli_query($conn,$update_data);
                if($execute_update)
                {
                
                    $temp = [
                                    "user_id"=>$user_id,
                                    "role_id"=> $user_data['role_id'],
                                    "provider_company"=> $user_data['provider_company'],
                                    "firstname"=>$user_data['first_name'],
                                    "lastname"=>$user_data['last_name'],
                                    "email"=>$user_data['email'],
                                    "username"=>$user_data['username'],
                                    "phone"=> $user_data['phone'],
                                    "password"=> $user_data['password'],
                                    "address"=> $user_data['phone'],
                                    "zipcode"=> $user_data['zipcode'],
                                    "country"=> $user_data['country'],
                                    "profile"=> $user_data['profile'],
                                    "notification_token"=> $notification_token,
                            ];
                   $data = ["status"=>true,
                            "message"=>"logged in successfully.",
                            "data"=>$temp];
                   echo json_encode($data);
                   
                }
            }
            elseif($user_role == 2)
            {
                 $update_data = "UPDATE `user` SET `notification_token` = '$notification_token' WHERE `id` = '$user_id'";
                $execute_update = mysqli_query($conn,$update_data);
                if($execute_update)
                {
                
                    $temp = [
                                    "user_id"=>$user_id,
                                    "role_id"=>$user_data['role_id'],
                                    "provider_company"=> $user_data['provider_company'],
                                    "business_name"=>$user_data['business_name'],
                                    "email"=>$user_data['email'],
                                    "username"=>$user_data['username'],
                                    "phone"=> $user_data['phone'],
                                    "password"=> $user_data['password'],
                                    "address"=> $user_data['address'],
                                    "zipcode"=> $user_data['zipcode'],
                                    "country"=> $user_data['country'],
                                    "profile"=> $user_data['profile'],
                                    "notification_token"=> $notification_token,
                            ];
                   $data = ["status"=>true,
                            "message"=>"logged in successfully.",
                            "data"=>$temp];
                   echo json_encode($data);
            }
                else
                {
                    $data = ["status"=>false,
                        "message"=>"something went wrong"];
                    echo json_encode($data);  
                }
            }
            else
            {
               $data = ["status"=>false,
                        "message"=>"sorry you can't access!"];
               echo json_encode($data);   
             }
      
        }
        else
        {
            $data = ["status"=>false,
                        "message"=>"email or password is invalid!"];
            echo json_encode($data);   
        }
    }
        
}
else
{
  $data = ["status"=>false,
            "Response_code"=>403,
            "Message"=>"Access denied"];
  echo json_encode($data);          
 }

?>