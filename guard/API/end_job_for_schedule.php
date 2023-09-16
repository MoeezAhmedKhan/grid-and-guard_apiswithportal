<?php


if($_POST['token'] == 'as23rlkjadsnlkcj23qkjnfsDKJcnzdfb3353ads54vd3favaeveavgbqaerbVEWDSC')
{
    include('connection.php');

     $user_id = $_POST['user_id'];
     $guard_id = $_POST['guard_id'];
     $task_id = $_POST['task_id'];
     $type = $_POST['type'];
     $police_restriction = $_POST['police_restriction'];
     $under_contruction = $_POST['under_contruction'];
     $description = $_POST['description'];
     
     date_default_timezone_set("US/Eastern");
     $current_date = date('Y-m-d H:i:s');
     
     $playerId = [];
     $subject = '';
 

    $update = "UPDATE `accept_request` SET `status`= 'idle',`end_job_date`= '$current_date' WHERE `user_id`= $user_id and `guard_id`= $guard_id and `task_id`= $task_id";
    $execute_update = mysqli_query($conn,$update);
    if($execute_update)
    {
        if($type == "Petroling Service")
        {
            $petroling_service = "UPDATE `add_petroling_service` SET `status`= 'completed' WHERE `id`= $task_id";
            $execute_petroling_service = mysqli_query($conn,$petroling_service);
            if($execute_petroling_service)
            {
                
                $guard_status = "UPDATE `guard_status` SET `status`= 'idle',`job_type`= ' ' WHERE `guard_id`= $guard_id";
                mysqli_query($conn,$guard_status);
                
                $assign_request = "UPDATE `assign_request` SET `status`= 'idle',`end_job_date`= '$current_date' WHERE `guard_id`= $guard_id";
                mysqli_query($conn,$assign_request);
                
                $fetch_guard = "SELECT * FROM `user` WHERE `id` = $guard_id";   
                $run_guard = mysqli_query($conn,$fetch_guard);
                $guard_ar = mysqli_fetch_array($run_guard);
                $gfirst = $guard_ar['first_name'];
                $glast = $guard_ar['last_name'];
                $guard_name = $gfirst." ".$glast;
                
                
                
                $sql_get_token = "SELECT * FROM `user` WHERE `id`=$user_id";
                $ex = mysqli_query($conn,$sql_get_token);
                $Data = mysqli_fetch_array($ex);
                $Data['notification_token'];
                array_push($playerId, $Data['notification_token']);
                $content = array
                (
                    "en" => "Your Task Has Been Completed",
                );
                $fields = array
                (
                   'app_id' => "83e0a29c-60be-46c0-ac3f-e08f4e905e0b",
                   'include_player_ids' => $playerId,
                   'data' => array("guard_id" => "$guard_id","guard_name" => "$guard_name","Id" => $task_id),
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
                    "message"=>"petroling service task has been ended successfully",
                ];
                echo json_encode($temp);
            }
        }
        elseif($type == "Standing Security")
        {
            $add_standing_security = "UPDATE `add_standing_security` SET `status`= 'completed' WHERE `id`= $task_id";
            $execute_standing_security = mysqli_query($conn,$add_standing_security);
            if($execute_standing_security)
            {
                
                $guard_status = "UPDATE `guard_status` SET `status`= 'idle',`job_type`= ' ' WHERE `guard_id`= $guard_id";
                mysqli_query($conn,$guard_status);
                
                $assign_request = "UPDATE `assign_request` SET `status`= 'idle',`end_job_date`= '$current_date' WHERE `guard_id`= $guard_id";
                mysqli_query($conn,$assign_request);
                
                $fetch_guard = "SELECT * FROM `user` WHERE `id` = $guard_id";   
                $run_guard = mysqli_query($conn,$fetch_guard);
                $guard_ar = mysqli_fetch_array($run_guard);
                $gfirst = $guard_ar['first_name'];
                $glast = $guard_ar['last_name'];
                $guard_name = $gfirst." ".$glast;
                
                
                
                $sql_get_token = "SELECT * FROM `user` WHERE `id`=$user_id";
                $ex = mysqli_query($conn,$sql_get_token);
                $Data = mysqli_fetch_array($ex);
                $Data['notification_token'];
                array_push($playerId, $Data['notification_token']);
                $content = array
                (
                    "en" => "Your Task Has Been Completed",
                );
                $fields = array
                (
                   'app_id' => "83e0a29c-60be-46c0-ac3f-e08f4e905e0b",
                   'include_player_ids' => $playerId,
                   'data' => array("guard_id" => "$guard_id","guard_name" => "$guard_name","Id" => $task_id),
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
                    "message"=>"Standing security task has been ended successfully",
                ];
                echo json_encode($temp);
            }
        }
        elseif($type == "Vacational Petrol")
        {
            $vacational_petrol = "UPDATE `vacational_petrol` SET `status`= 'completed' WHERE `id`= $task_id";
            $execute_vacational_petrol = mysqli_query($conn,$vacational_petrol);
            if($execute_vacational_petrol)
            {
                
                $guard_status = "UPDATE `guard_status` SET `status`= 'idle',`job_type`= ' ' WHERE `guard_id`= $guard_id";
                mysqli_query($conn,$guard_status);
                
                $fetch_guard = "SELECT * FROM `user` WHERE `id` = $guard_id";   
                $run_guard = mysqli_query($conn,$fetch_guard);
                $guard_ar = mysqli_fetch_array($run_guard);
                $gfirst = $guard_ar['first_name'];
                $glast = $guard_ar['last_name'];
                $guard_name = $gfirst." ".$glast;
                
                
                
                $sql_get_token = "SELECT * FROM `user` WHERE `id`=$user_id";
                $ex = mysqli_query($conn,$sql_get_token);
                $Data = mysqli_fetch_array($ex);
                $Data['notification_token'];
                array_push($playerId, $Data['notification_token']);
                $content = array
                (
                    "en" => "Your Task Has Been Completed",
                );
                $fields = array
                (
                   'app_id' => "83e0a29c-60be-46c0-ac3f-e08f4e905e0b",
                   'include_player_ids' => $playerId,
                   'data' => array("guard_id" => "$guard_id","guard_name" => "$guard_name","Id" => $task_id),
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
                    "message"=>"Vacational petrol task has been ended successfully",
                ];
                echo json_encode($temp);
            }
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
