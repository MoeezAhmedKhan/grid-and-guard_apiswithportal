<?php

require_once("connection.php");
if($_POST['token'] == 'as23rlkjadsnlkcj23qkjnfsDKJcnzdfb3353ads54vd3favaeveavgbqaerbVEWDSC')
{
  
  $item_id = $_POST['item_id'];
  $task_id = $_POST['task_id'];
  
    $sql = "UPDATE `task_details` SET `status`='completed' WHERE `id`= '$item_id'";
    $exec = mysqli_query($conn, $sql);
    
    if($exec){
        
        $sqltaskMembers = "SELECT t.id, t.user_id , u.notification_token FROM `task` t INNER JOIN `users` u
       ON t.user_id = u.id WHERE t.id = '$task_id'";
       
       $dql_task_name = "SELECT  `title` FROM `task_details` WHERE `id` = '$item_id'";
       $doneee = mysqli_query($conn,$dql_task_name);
       $tn = mysqli_fetch_array($doneee);
        
           
                       
    $taskMembers = mysqli_query($conn,$sqltaskMembers);
    
        
    $subject =  $tn['title'];
        
    $playerId = [];
        
    while($row = mysqli_fetch_array($taskMembers))
    {
        array_push($playerId, $row['notification_token']);
    }
            
    $content = array
    (
        "en" => 'Dear customer, Your task '.$subject.' has been  completed.'
    );

    $fields = array
    (
        'app_id' => "115eddf7-e4bd-4ea9-b92c-177986f0f572",
        'include_player_ids' => $playerId,
        'data' => array("foo" => "NewMassage","Id" => $idd),
        'large_icon' =>"ic_launcher_round.png",
        'contents' => $content
    );

    $fields = json_encode($fields);
               

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
    'Authorization: Basic ODU5ZDhiZjAtOWRkZS00NDIyLWI0ZWItOTYxMDc5YzQzMGIz'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);    

    $response = curl_exec($ch);
    curl_close($ch);
           
           
     $data = 
    [
                
        "status"=>true,
        "response_code"=>200,
        "message"=>"Task marked as completed!",
                
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