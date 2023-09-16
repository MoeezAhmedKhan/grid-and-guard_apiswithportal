<?php

include('connection.php');
if($_POST['token'] == 'as23rlkjadsnlkcj23qkjnfsDKJcnzdfb3353ads54vd3favaeveavgbqaerbVEWDSC'){

    $rider_id = $_POST['rider_id'];
    
    $sql = "SELECT `tracking` FROM `rider_status` WHERE `rider_id` = '$rider_id'";
    $exec = mysqli_query($conn,$sql);
    $xc = mysqli_fetch_array($exec);
    $status = $xc['tracking'];
    
    
    $data = ["status"=>true,
            "Response_code"=>200,
            "tracking_status"=>$status];
  echo json_encode($data); 
    
    
  
}else{
  $data = ["status"=>false,
            "Response_code"=>403,
            "message"=>"Access denied"];
  echo json_encode($data);          
}
