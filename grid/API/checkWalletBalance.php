<?php


if($_POST['token'] == 'as23rlkjadsnlkcj23qkjnfsDKJcnzdfb3353ads54vd3favaeveavgbqaerbVEWDSC'){


  $user_id = $_POST['user_id'];  
 include('connection.php');


  if (empty($user_id))
  {
      
        $data = [
        "status"=>false,
        "message"=>"User id is required!",
             ];
         echo json_encode($data); 
         
  }
  else
  {
      
         $sql = "SELECT `Wallaet_Balance` FROM `user` WHERE  `id` = $user_id"; 
        $exec = mysqli_query($conn,$sql);
        
        if(mysqli_num_rows($exec) > 0)
        {
            
            $Data = mysqli_fetch_array($exec);
            $current_balance = $Data['Wallaet_Balance'];
            $data = ["status"=>true,
                "Response_code"=>200,
                "current_balance"=>$current_balance,
                "message"=>"Found your current balance."];
                 echo json_encode($data); 
          
            
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
