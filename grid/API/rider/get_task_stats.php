<?php

require_once("connection.php");
if($_POST['token'] == 'as23rlkjadsnlkcj23qkjnfsDKJcnzdfb3353ads54vd3favaeveavgbqaerbVEWDSC')
{
  
  $my_array = array();
  $task_id = $_POST['task_id'];
  
  $sql = "SELECT `id`, `task_id`, `title`, `name`, `description`, `estimated_cost`, `additional_cost`,
  `pickup_location`, `menu_item_id`, `status` FROM `task_details` WHERE `task_id` = '$task_id'";
 
 $exec = mysqli_query($conn,$sql);
 
 if(mysqli_num_rows($exec) > 0){
     
    while($row = mysqli_fetch_array($exec)){
        $temp = [
            "id"=>$row['id'],
            "name"=>$row['name'],
            "status"=>$row['status']
            ];
           array_push($my_array,$temp); 
    }
    
      $data = 
    [
                
        "status"=>true,
        "response_code"=>200,
        "message"=>"All tasks fetched!",
        "data"=>$my_array
    ];
    
    echo json_encode($data);
 }else{
    $data = [
        "status"=>true,
        "response_code"=>202,
        "message"=>"Something went wrong!",
        "data"=>$my_array
    ];
    
    echo json_encode($data);
 }
  
   
    
}
else
{
    $data = 
    [
                
        "status"=>false,
        "response_code"=>404,
        "message"=>"acess denied",
                
    ];
    echo json_encode($data);
    
}



?>