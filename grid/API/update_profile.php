<?php
include('connection.php');

if($_POST['token'] == 'as23rlkjadsnlkcj23qkjnfsDKJcnzdfb3353ads54vd3favaeveavgbqaerbVEWDSC')
{
    
    $user_id = $_POST['user_id'];
    $fname = $_POST['first_name'];
    $lname = $_POST['last_name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zipcode = $_POST['zipcode'];
    // $profilepic = $_POST['profilepic'];
                
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["profilepic"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

 
    $check_if_dataisin_db = "SELECT * FROM `users` WHERE `id` = $user_id";
    $execute = mysqli_query($conn,$check_if_dataisin_db);
    
    if(mysqli_num_rows($execute) > 0)
    {
        
       $filewithnewname =  date("Ymdis")."_Profile."."png";  
       if(move_uploaded_file($_FILES["profilepic"]["tmp_name"], $target_dir.$filewithnewname))
       {
      
           $fetch_user_data = mysqli_fetch_array($execute);
           $user_id = $fetch_user_data['id'];
           
           
           $update_data = "UPDATE `users` SET `first_name`='$fname',`last_name`='$lname',`phone`='$phone',`email`= '$email',`img`='$filewithnewname',
           `address`='$address', `city`='$city',`state`='$state',`zipcode`='$zipcode' WHERE `id`='$user_id'";
           $execute_update = mysqli_query($conn,$update_data);
           
           if($execute_update)
           {
               
                $temp = [
                           "user_id"=>$fetch_user_data['id'],
                           "role_id"=>$fetch_user_data['role_id'],
                           "fname"=>$fname,
                           "lname"=>$lname,
                           "phone"=>$phone,
                           "address"=>$address,
                           "city"=>$city,
                           "state"=>$state,
                           "zipcode"=>$zipcode,
                           "email"=>$email,
                           "password"=>$fetch_user_data['password'],
                           "notification_token"=>$fetch_user_data['notification_token'],
                           "profile_pic"=>$filewithnewname
                        ];
               $data = ["status"=>true,
                        "message"=>"user updated in successfully.",
                        "data"=>$temp];
               echo json_encode($data); 
               
           }
        }
        else
        {
               
            $fetch_user_data = mysqli_fetch_array($execute);
           $user_id = $fetch_user_data['id'];
                  $update_data = "UPDATE `users` SET `first_name`='$fname',`last_name`='$lname',`phone`='$phone',
           `address`='$address', `city`='$city',`state`='$state',`zipcode`='$zipcode' WHERE `id`='$user_id'";
           $execute_update = mysqli_query($conn,$update_data);
           
           if($execute_update)
           {
               
                $temp = [
                           "user_id"=>$fetch_user_data['id'],
                           "role_id"=>$fetch_user_data['role_id'],
                           "fname"=>$fname,
                           "lname"=>$lname,
                           "phone"=>$phone,
                           "address"=>$address,
                           "city"=>$city,
                           "state"=>$state,
                           "zipcode"=>$zipcode,
                           "email"=>$email,
                           "password"=>$fetch_user_data['password'],
                           "notification_token"=>$fetch_user_data['notification_token'],
                        ];
               $data = ["status"=>true,
                        "message"=>"user a updated in successfully.",
                        "data"=>$temp];
               echo json_encode($data); 
               
           }
               
        }
    }
    else
    {
           
       $data = ["status"=>false,
                "message"=>"Something went wrong!"];
            echo json_encode($data); 
    }
    
}
?>