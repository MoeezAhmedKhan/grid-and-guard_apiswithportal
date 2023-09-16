<?php


if($_POST['token'] == 'as23rlkjadsnlkcj23qkjnfsDKJcnzdfb3353ads54vd3favaeveavgbqaerbVEWDSC')
{
    include('connection.php');

     $user_id = $_POST['user_id'];
     $guard_id = $_POST['guard_id'];
     $task_id = $_POST['task_id'];
     
     date_default_timezone_set("Asia/Karachi");
     $current_date = date('Y-m-d H:i:s');
     
     
     $playerId = [];
     $subject = '';
 
    $update = "UPDATE `accept_request` SET `status`= 'idle',`end_job_date`= '$current_date' WHERE `user_id`= $user_id and `guard_id`= $guard_id and `task_id`= $task_id";
    $execute_update = mysqli_query($conn,$update);
                
    if($execute_update)
    {
        $on_demand = "UPDATE `on_demand_request` SET `status`= 'completed' WHERE `id`= $task_id";
        $execute_on_demand = mysqli_query($conn,$on_demand);
        $guard_status = "UPDATE `guard_status` SET `status`= 'idle',`job_type`= ' ' WHERE `guard_id`= $guard_id";
        mysqli_query($conn,$guard_status);
        if($execute_on_demand)
        {
            $getAmount_And_wallet = "SELECT `amount` , u.Wallaet_Balance FROM `on_demand_request` as ondemand INNER JOIN user as u ON user_id = u.id  WHERE ondemand.id = $task_id";
            
            $ex_getamounts = mysqli_query($conn,$getAmount_And_wallet);
            $Data = mysqli_fetch_array($ex_getamounts);
            $Fees = $Data['amount'];
            $Wallet_Balance = $Data['Wallaet_Balance'];
            $Amount_To_Deduct = $Wallet_Balance - $Fees;
            
            $update_Wallet = "UPDATE `user` SET `Wallaet_Balance` = $Amount_To_Deduct WHERE`id` =$user_id";
            $ex_update_wallet = mysqli_query($conn,$update_Wallet);
            
            $unique_id = rand()."_".date('ydmis');
            
            $insert .= "INSERT INTO `transaction`( `user_id`, `type`, `transaction_id`, `amount`) VALUES 
            ('$user_id','debit','$unique_id','$Fees')";
            $exec_insert = mysqli_multi_query($conn,$insert);
            
            $sql_get_token = "SELECT * FROM `user` WHERE `id`= $guard_id";
            $ex = mysqli_query($conn,$sql_get_token);
            $Data = mysqli_fetch_array($ex);
            array_push($playerId, $Data['notification_token']);
            $content = array
            (
                "en" => "Your Job Has Been Ended From User",
            );
            $fields = array
            (
                'app_id' => "83e0a29c-60be-46c0-ac3f-e08f4e905e0b",
                'include_player_ids' => $playerId,
                'data' => array("foo" => "end job","Id" => $taskid),
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
            
            $temp = 
            [
                "status"=>true,
                "message"=>"on demand task has been ended successfully",
            ];
            echo json_encode($temp);
        }
    }
    else
    {
                    
        $temp = 
        [
            "status"=>false,
            "message"=>"something went wrong",
        ];
        echo json_encode($temp);
                    
    }
  
    
  
    
}
else{
  $data = ["status"=>false,
            "Response_code"=>403,
            "Message"=>"Access denied"];
  echo json_encode($data);          
}
