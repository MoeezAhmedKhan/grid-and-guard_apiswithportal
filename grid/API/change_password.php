<?php


if($_POST['token'] == 'as23rlkjadsnlkcj23qkjnfsDKJcnzdfb3353ads54vd3favaeveavgbqaerbVEWDSC'){


 $email = $_POST['email'];  
 $current = $_POST['current'];
 $password = $_POST['password'];
 include('connection.php');


  if (empty($email))
  {
      
        $data = [
        "status"=>false,
        "message"=>"email is required",
             ];
         echo json_encode($data); 
         
  }
  
  else if (empty($current))
  {
      
        $data = [
        "status"=>false,
        "message"=>"current password is required",
             ];
         echo json_encode($data); 
         
  }
    else if (empty($password))
  {
      
        $data = [
        "status"=>false,
        "message"=>"new password is required",
             ];
         echo json_encode($data); 
         
  }
  else
  {
      
        $sql = "SELECT `id`, `email`, `password` FROM `users` WHERE  `email` = '$email' AND  `password` = '$current'"; 
        $exec = mysqli_query($conn,$sql);
        
        if(mysqli_num_rows($exec) > 0){
            
            
            $update_pass = "UPDATE `users` SET `password`='$password' WHERE `email`='$email'";
            $exec_upd = mysqli_query($conn,$update_pass);
            if($exec_upd){
             $data = ["status"=>true,
                "Response_code"=>200,
                "message"=>"Successfully updated password!"];
                 echo json_encode($data);   
            }
            
        }else{
             $data = ["status"=>false,
                "Response_code"=>202,
                "message"=>"Current password is invalid!"];
                 echo json_encode($data); 
        }
        
              
              

}
      
  
}
else
{
    
      $data = ["status"=>false,
                "Response_code"=>403,
                "message"=>"Access denied"];
      echo json_encode($data);      
      
}
