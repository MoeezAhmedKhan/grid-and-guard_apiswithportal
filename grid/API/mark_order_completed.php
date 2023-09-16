<?php

require_once("connection.php");
if($_POST['token'] == 'as23rlkjadsnlkcj23qkjnfsDKJcnzdfb3353ads54vd3favaeveavgbqaerbVEWDSC')
{

    $rider_id = $_POST['rider_id'];
    $user_id = $_POST['user_id'];
    $task_id = $_POST['task_id'];

    $total_amount = 0;
// UPDATE `task` SET `status`='completed' WHERE `id`='$task_id'
    // $sql_rider_status = "UPDATE `rider_status` SET `status`='idle' WHERE `rider_id`= '$rider_id'";
    // $exec_rider_status = mysqli_query($conn, $sql_rider_status);
    $sql = "SELECT `id`, `task_id`, `title`, `name`, `description`, `estimated_cost`,
            `additional_cost`, `pickup_location`, `menu_item_id`, `status` FROM
            `task_details` WHERE `task_id` = '$task_id'";
    $exec = mysqli_query($conn, $sql);
    // calculate total amount
    if(mysqli_num_rows($exec) > 0){
        
      while($row = mysqli_fetch_array($exec)){
         $total_amount = $total_amount + ($row['estimated_cost'] + $row['additional_cost']);
      }      
        
    }
    
    //get delivery charges
    
    $sql2 = "SELECT `cost` FROM `extras`";
    $exec2  = mysqli_query($conn , $sql2);
    $c = mysqli_fetch_array($exec2);
    $delivery_fee = $c['cost'];
    
    $grand_total = ($delivery_fee + $total_amount);
    
    // deduct amount
    
    $sql3 = "SELECT `Wallaet_Balance` FROM `users` WHERE `id` = '$user_id'";
    $exec3  = mysqli_query($conn , $sql3);
    $w = mysqli_fetch_array($exec3);
    $wallet_amount = $w['Wallaet_Balance'];
    
    if($wallet_amount > 0 && $wallet_amount > $grand_total){
    $after_deduct = ($wallet_amount - $grand_total);
    
    $sql4 = "UPDATE `users` SET `Wallaet_Balance`='$after_deduct' WHERE `id`='$user_id'";
    $exec4  = mysqli_query($conn , $sql4);
    if($exec4){
        
    $transaction_id = "".rand()."_".date('Ymdis');    
    $transaction_log = "INSERT INTO `transaction`(`user_id`, `amount`, `transaction_id`,
                        `type`) VALUES ('$user_id','$grand_total','$transaction_id','debit')";                   
    
    $exec_transaction_log = mysqli_query($conn , $transaction_log);
    $sqltaskMembers = "SELECT  `notification_token` FROM `users` WHERE `id` = '$user_id'";
    $taskMembers = mysqli_query($conn,$sqltaskMembers);
    $subject = "Dear customer your account has been debited with $$grand_total for your order.";
    
    $date = date('Y-m-d');
    $time = date('H:i:s');
    $sql22 = "INSERT INTO `notification`( `user_id`, `title`, `description`, `date`, `time`) 
            VALUES ('$user_id','$transaction_id','$subject','$date','$time')";
    $exec22 = mysqli_query($conn,$sql22);

        
    $playerId = [];
        
    while($row = mysqli_fetch_array($taskMembers))
    {
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
     
    $sqlx = "UPDATE `task` SET `status`='completed' WHERE `id`='$task_id'";
    $execsqlx = mysqli_query($conn,$sqlx);
    
    if($execsqlx){
         
        // Topup to rider
        $sql31 = "SELECT `Wallaet_Balance` FROM `users` WHERE `id` = '$rider_id'";
        $exec31  = mysqli_query($conn , $sql31);
        $w1 = mysqli_fetch_array($exec31);
        $wallet_amount1 = $w1['Wallaet_Balance'];
        
        $rider_cut = (0.8 * $delivery_fee);
        $total_rider_charge = ($rider_cut + $wallet_amount1);
        $sql41 = "UPDATE `users` SET `Wallaet_Balance`='$total_rider_charge' WHERE `id`='$rider_id'";
        $exec41  = mysqli_query($conn , $sql41);
        $transaction_id1 = "".rand()."_".date('Ymdis');    
    $transaction_log1 = "INSERT INTO `transaction`(`user_id`, `amount`, `transaction_id`,
                        `type`) VALUES ('$rider_id','$rider_cut','$transaction_id1','credit')";                   
    
    $exec_transaction_log1 = mysqli_query($conn , $transaction_log1);
        
         
         $sql_rider_status = "UPDATE `rider_status` SET `status`='idle' WHERE `rider_id`= '$rider_id'";
         $exec_rider_status = mysqli_query($conn, $sql_rider_status);
         
         if($exec_rider_status){
             
               $sqltaskMembers = "SELECT  `notification_token` FROM `users` WHERE `id` = '$rider_id'";
    $taskMembers = mysqli_query($conn,$sqltaskMembers);
    $subject = "Dear rider, customer has marked your job as completed.";
    
    
    $date = date('Y-m-d');
    $time = date('H:i:s');
    $sql22 = "INSERT INTO `notification`( `user_id`, `title`, `description`, `date`, `time`) 
            VALUES ('$rider_id','Order Completion','$subject','$date','$time')";
    $exec22 = mysqli_query($conn,$sql22);
        
    $playerId = [];
        
    while($row = mysqli_fetch_array($taskMembers))
    {
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
                    "message"=>"Your order is marked as completed",
                            
                ];
            echo json_encode($data);
         }
         
    }
        
    }
    
    }else{
        // not sufficient balance
           $data = 
                [
                            
                    "status"=>false,
                    "response_code"=>202,
                    "message"=>"You have insufficient balance in your wallet, Please recharge then try again.",
                            
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