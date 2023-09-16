<?php


if($_POST['token'] == 'as23rlkjadsnlkcj23qkjnfsDKJcnzdfb3353ads54vd3favaeveavgbqaerbVEWDSC'){
 $social_id = $_POST['social_id'];   
 $notification_token =$_POST['notification_token'];

 include('connection.php');

 $sql = "SELECT * FROM `user` WHERE `social_id`= '$social_id'";
 $execute = mysqli_query($conn,$sql);
 if(mysqli_num_rows($execute) > 0)
 {
     $user_data = mysqli_fetch_array($execute);
     $user_id = $user_data['id'];
     $role_id = $user_data['role_id'];
     
      if($role_id == 1)
      {
            $update_data = "UPDATE `user` SET `notification_token` = '$notification_token' WHERE `id` = '$user_id'";
            $execute_update = mysqli_query($conn,$update_data);
            if($execute_update)
            {
                
                    $temp = [
                                    "type"=>"social",
                                    "user_id"=>$user_id,
                                    "role_id"=>$role_id,
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
                                    "social_id"=>$social_id,
                            ];
                   $data = ["status"=>true,
                            "message"=>"logged in successfully.",
                            "data"=>$temp];
                   echo json_encode($data);
                   
                }
      }
      elseif($role_id == 2)
      {
            $update_data = "UPDATE `user` SET `notification_token` = '$notification_token' WHERE `id` = '$user_id'";
            $execute_update = mysqli_query($conn,$update_data);
            if($execute_update)
            {
                
                    $temp = [
                                    "type"=>"social",
                                    "user_id"=>$user_id,
                                    "role_id"=>$role_id,
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
                                    "social_id"=>$social_id,
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
       $data = [
                    "status"=>false,
                    "Response_code"=>403,
                    "message"=>"login failed"
               ];
       echo json_encode($data);   
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