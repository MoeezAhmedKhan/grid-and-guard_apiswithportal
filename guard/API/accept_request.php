<?php
include('connection.php');

if($_POST['token'] == 'as23rlkjadsnlkcj23qkjnfsDKJcnzdfb3353ads54vd3favaeveavgbqaerbVEWDSC')
{
    
    $user_id = $_POST['user_id'];
    $guard_id = $_POST['guard_id'];
    $guard_location = json_decode($_POST['location']);
    $task_id = $_POST['task_id'];
    $type = $_POST['type'];
    $playerId = [];
    $subject = '';
    
    $check_if_accepted_already = "SELECT `id` FROM `accept_request` WHERE  `task_id` = $task_id";
    
    $ex_check_if_accepted_already = mysqli_query($conn,$check_if_accepted_already);
    
    if(mysqli_num_rows($ex_check_if_accepted_already) > 0 ){
         $data = ["status"=>false,
            "message"=>"Other guard has already accepted this job!"];
        echo json_encode($data); 
        
    }else{
        
            $select_petroling_service = "SELECT `status`, `created_at` FROM `add_petroling_service` WHERE `user_id` = $user_id";
            $run_petroling_service = mysqli_query($conn,$select_petroling_service);
            $row_petroling_service = mysqli_num_rows($run_petroling_service);;
            if($row_petroling_service > 0)
            {
                $status_petroling = mysqli_fetch_array($run_petroling_service);
                if($status_petroling['status'] == 'pending')
                {
                    $upd_petrol = "UPDATE `add_petroling_service` SET`status`= 'inprogress' WHERE `id`=  $task_id";
                    mysqli_query($conn,$upd_petrol);
                }
            }
            
            $select_standing_security = "SELECT `status`, `created_at` FROM `add_standing_security` WHERE `user_id` = $user_id";
            $run_standing_security = mysqli_query($conn,$select_standing_security);
            $row_standing_security = mysqli_num_rows($run_standing_security);;
            if($row_standing_security > 0)
            {
                $status_standing = mysqli_fetch_array($run_standing_security);
                if($status_standing['status'] == 'pending')
                {
                    $upd_standing = "UPDATE `add_standing_security` SET`status`= 'inprogress' WHERE `id`=  $task_id";
                    mysqli_query($conn,$upd_standing);
                }
            }
            
            $select_on_demand_request = "SELECT `status`, `created_at` FROM `on_demand_request` WHERE `user_id` = $user_id AND `id` = $task_id";
            $run_on_demand_request = mysqli_query($conn,$select_on_demand_request);
            $row_on_demand_request = mysqli_num_rows($run_on_demand_request);
            if($row_on_demand_request > 0)
            {
                $status_on_demand_request = mysqli_fetch_array($run_on_demand_request);
                if($status_on_demand_request['status'] == 'pending')
                {
                    $upd_on_demand = "UPDATE `on_demand_request` SET`status`= 'inprogress' WHERE `id`=  $task_id";
                    mysqli_query($conn,$upd_on_demand);
                }
            }
         
            $loc = json_encode($guard_location);
            $insert = "INSERT INTO `accept_request`(`user_id`, `guard_id`, `guard_location`, `task_id`, `type`) VALUES 
            ('$user_id','$guard_id','$loc','$task_id','$type')";
            $execute = mysqli_query($conn,$insert);
            
            $guard_status = "UPDATE `guard_status` SET `status`= 'engaged',`job_type`= '$type' WHERE `guard_id`= '$guard_id'";
             mysqli_query($conn,$guard_status);
        
            $fetch_guard = "SELECT * FROM `user` WHERE `id` = $guard_id";   
            $run_guard = mysqli_query($conn,$fetch_guard);
            $guard_ar = mysqli_fetch_array($run_guard);
            $gfirst = $guard_ar['first_name'];
            $glast = $guard_ar['last_name'];
            $guard_name = $gfirst." ".$glast;
        
            if($execute)
            {
                $sql_get_token = "SELECT * FROM `user` WHERE `id`=$user_id";
                $ex = mysqli_query($conn,$sql_get_token);
                $Data = mysqli_fetch_array($ex);
                $Data['notification_token'];
                array_push($playerId, $Data['notification_token']);
                $content = array
                (
                    "en" => "The Guard is on the way",
                );
                $fields = array
                (
                   'app_id' => "83e0a29c-60be-46c0-ac3f-e08f4e905e0b",
                   'include_player_ids' => $playerId,
                   'data' => array("guard_id" => "$guard_id","guard_name" => "$guard_name","location" => $guard_location,"Id" => $taskid),
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
                
                if($type == 'On Demand Request')
                {
                    $empty = array();
                    $data = ["status"=>true,
                            "message"=>"request submit successfully. and fetched empty array",
                            "data"=>$empty];
                    echo json_encode($data);
                }
                else
                {
                   $temp = 
                        [
                            "user_id"=>$user_id,
                            "guard_id"=>$guard_id,
                            "task_id"=>$task_id,
                            "type"=>$type
                        ];
                        $data = ["status"=>true,
                                "message"=>"Job has accpeted suessfully",
                                "data"=>$temp];
                        echo json_encode($data);
                }
        
                       
            }
            else
            {
                $data = ["status"=>false,
                    "message"=>"something went wrong"];
                echo json_encode($data); 
            }
                
        
        
    }
    
   
               
        
}
else
{
           
    $data = ["status"=>false,
        "message"=>"access desined"];
    echo json_encode($data); 
}
    
?>