<?php

include('connection.php');
if($_POST['token'] == 'as23rlkjadsnlkcj23qkjnfsDKJcnzdfb3353ads54vd3favaeveavgbqaerbVEWDSC'){

    $rider_id = $_POST['rider_id'];
    $user_id = $_POST['user_id'];
    $stat = $_POST['status'];
    $sql = "UPDATE `rider_status` SET `tracking`='$stat' WHERE `rider_id`='$rider_id'";
    $exec = mysqli_query($conn,$sql);
    if($exec){
        $rider_noti = '';

        $sqlother = "SELECT `notification_token` FROM `users` WHERE `id` = '$user_id'";        
        $exec_other = mysqli_query($conn,$sqlother);   
        $other = mysqli_fetch_array($exec_other);
        $user_noti =  $other['notification_token'];
    
        $sqltaskMembers = "SELECT `notification_token` FROM `users` WHERE `id` = '$rider_id'";
        $taskMembers = mysqli_query($conn,$sqltaskMembers);
        
    $subject = 'Customer is tracking';
        
        
    $playerId = [];
        
    while($row = mysqli_fetch_array($taskMembers))
    {
        $rider_noti = $row['notification_token'];
        array_push($playerId, $row['notification_token']);
    }
            
    $content = array
    (
        "en" => $subject
    );

    $fields = array
    (
        'app_id' => "115eddf7-e4bd-4ea9-b92c-177986f0f572",
        'include_player_ids' => $playerId,
        'data' => array("user_noti" => $user_noti),
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
        
            $data = ["status"=>true,
            "Response_code"=>200,
            "message"=>"Tracking initiated",
            "rider_notification"=>$rider_noti
            ];
            echo json_encode($data);     
        
    }else{
          $data = ["status"=>false,
            "Response_code"=>203,
            "message"=>"Something went wrong."];
            echo json_encode($data);  
    }

  
}else{
  $data = ["status"=>false,
            "Response_code"=>403,
            "message"=>"Access denied"];
  echo json_encode($data);          
}
