<?php

require_once("connection.php");
if($_POST['token'] == 'as23rlkjadsnlkcj23qkjnfsDKJcnzdfb3353ads54vd3favaeveavgbqaerbVEWDSC')
{
    
    $task_id = $_POST['task_id'];
    $customer_id = $_POST['customer_id'];
    $rider_id = $_POST['rider_id'];
    // $additonal_cost = $_POST['additonal_cost'];
    
    $task_details = "SELECT `estimated_cost` FROM `task_details` WHERE task_id = $task_id";
    $run_task_details = mysqli_query($conn,$task_details);
    $task_details_row = mysqli_num_rows($run_task_details);
    if($task_details_row > 0)
    {
        $sum = 0;
        
        while($ar = mysqli_fetch_array($run_task_details))
        {
            $sum += $estimated_cost = $ar['estimated_cost'];
        }
        
        $upd_stat = "UPDATE `task` SET `status`='inprogress' WHERE `id`='$task_id'";
        $run_upd_stat = mysqli_query($conn,$upd_stat);
           
           
         $sub_task = "UPDATE `task_details` SET `status`='inprogress' WHERE `task_id` = '$task_id'";
        $run_upd_task = mysqli_query($conn,$sub_task);
           
        $sqltaskMembers = "SELECT `id`, `first_name`, `last_name`, `phone`, `email`, `password`, `img`,
        `address`, `city`, `state`, `zipcode`, `status`, `role_id`, `social_id`, `notification_token`,
        `Wallaet_Balance`, `created_at` FROM `users` WHERE `id` = '$customer_id'";
        
            $subject = '';
                       
    $taskMembers = mysqli_query($conn,$sqltaskMembers);
        
    $sqlother = "SELECT `id`, `first_name`, `last_name`, `phone`, `email`, `password`, `img`,
        `address`, `city`, `state`, `zipcode`, `status`, `role_id`, `social_id`, `notification_token`,
        `Wallaet_Balance`, `created_at` FROM `users` WHERE `id` = '$rider_id'";        
    $exec_other = mysqli_query($conn,$sqlother);   
    $other = mysqli_fetch_array($exec_other);
    $subject =  $other['first_name']." ".$other['last_name'];
        
    $playerId = [];
        
    while($row = mysqli_fetch_array($taskMembers))
    {
        array_push($playerId, $row['notification_token']);
    }
            
    $content = array
    (
        "en" => 'Dear customer, Rider '.$subject.' has accepted your job.'
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
            
        
        
        $insert = "INSERT INTO `task_log`(`task_id`, `customer_id`, `rider_id`, `total_cost`) VALUES ($task_id,$customer_id,$rider_id,$sum);";
        $insert .= "UPDATE `rider_status` SET  `status` = 'engaged' WHERE `rider_id` = $rider_id";
       
        
        $run = mysqli_multi_query($conn,$insert);
        if($run)
        {
            
     
            $temp = 
            [
                "task_id"=>$task_id,
                "customer_id"=>$customer_id,
                "rider_id"=>$rider_id,
                "total"=>$sum,
                "status"=>"engaged",
            ];
            
            $data = 
            [
                        
                "status"=>true,
                "response_code"=>200,
                "message"=>"log has been generated",
                "data"=>$temp
                        
            ];
            echo json_encode($data);
        }
        else
        {
            $data = 
            [
                        
                "status"=>false,
                "response_code"=>203,
                "message"=>"something went wrong",
                        
            ];
            echo json_encode($data);
        }
    }
    else
    {
       $data = 
        [
                    
            "status"=>false,
            "response_code"=>203,
            "message"=>"task details not found",
                    
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