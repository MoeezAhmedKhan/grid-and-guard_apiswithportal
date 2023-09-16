<?php
include('connection.php');

 if($_POST['token'] == 'as23rlkjadsnlkcj23qkjnfsDKJcnzdfb3353ads54vd3favaeveavgbqaerbVEWDSC')
 {
    
    $user_id = $_POST['user_id'];
    $guard_id = $_POST['guard_id'];
    $task_id = $_POST['task_id'];
    $type = $_POST['type'];
    

    if($type == 'Petroling Service'){
    $check_if_dataisin_db = "SELECT * FROM `schedule_job` WHERE guard_id = $guard_id and task_id = $task_id AND `type` = '$type'";
    $execute = mysqli_query($conn,$check_if_dataisin_db);
    
    if(mysqli_num_rows($execute) == 0)
    {

         
         $sql = "SELECT  `user_id`, `start_date`, `end_date`, `week_days`, `petrols_daily`, `time` FROM `add_petroling_service` WHERE `id` = $task_id";
    
         $ex = mysqli_query($conn,$sql);
         if(mysqli_num_rows($ex) > 0){
             $Data = mysqli_fetch_array($ex);
             $user_id = $Data['user_id'];
             $start_date = $Data['start_date'];
             $end_date = $Data['end_date'];
             $week_days = json_decode($Data['week_days']);
             $petrols_daily = $Data['petrols_daily'];
             $time = $Data['time'];
             
             $date1 = new DateTime($start_date);
             $date2 = new DateTime($end_date);
             $interval = $date1->diff($date2);
            
             $days = $interval->days;
             $daysCounter = 0;
             $result = 0;
             $availablity = 0;
              $availablityinStanding = 0;
             for($n=0; $n<=$days; $n++){
                 $date=date_create($start_date);
                 date_add($date,date_interval_create_from_date_string($n." days"));
                 $newdate = $date;
                 $day  = date_format($date,"D");
                 $day  = date_format($date,"D");
                 $datetodayFrom  = date_format($date,"Y-m-d")." 00:00:00";
                 $datetodayTo  = date_format($date,"Y-m-d")." 23:59:59";
                 if(in_array($day, $week_days)){
                       $check_availablity = "SELECT `task_id` FROM `schedule_job` WHERE `guard_id` = 117  AND `type` = 'Standing Security' AND `Start_Date_Time` BETWEEN '$datetodayFrom' AND '$datetodayTo'";
                        $check_result = mysqli_query($conn,$check_availablity);
                        if(mysqli_num_rows($check_result) != 0){
                             $availablityinStanding++;
                         }
                 }
                     
             }
             
             
             for($i=0; $i<=$days; $i++){
                 $date=date_create($start_date);
                 date_add($date,date_interval_create_from_date_string($i." days"));
                 $newdate = $date;
                 $day  = date_format($date,"D");
                 $day  = date_format($date,"D");
                 if(in_array($day, $week_days)){
                     date_add($newdate,date_interval_create_from_date_string("12 hours"));
                     for($j=1; $j<=$petrols_daily; $j++){
                        date_add($newdate,date_interval_create_from_date_string($time." hours"));
                        $SheduleDate_Time_Start =  date_format($newdate,"Y-m-d H:i:s");
                        $check_availablity = "SELECT `task_id` FROM `schedule_job` WHERE `guard_id` = $guard_id AND `Start_Date_Time` = '$SheduleDate_Time_Start'";
                        $check_result = mysqli_query($conn,$check_availablity);
                        if(mysqli_num_rows($check_result) == 0){
                             $availablity++;
                        }
                     }
                    $daysCounter++;
                 }
             }
             
             if($daysCounter*$petrols_daily != $availablity && $availablityinStanding > 0){
                 $data = ["status"=>false,
                        "message"=>"There is already some task that has time conflict with this job!"];
                 echo json_encode($data); 
             }else{
                
                   for($i=0; $i<=$days; $i++){
                     $date=date_create($start_date);
                     date_add($date,date_interval_create_from_date_string($i." days"));
                     $newdate = $date;
                     $day  = date_format($date,"D");
                     $day  = date_format($date,"D");
                     if(in_array($day, $week_days)){
                         date_add($newdate,date_interval_create_from_date_string("12 hours"));
                         for($j=1; $j<=$petrols_daily; $j++){
                            date_add($newdate,date_interval_create_from_date_string($time." hours"));
                            $SheduleDate_Time_Start =  date_format($newdate,"Y-m-d H:i:s");
                            $insert = "INSERT INTO `schedule_job`(`user_id`, `guard_id`, `task_id`, `Start_Date_Time`, `type`) VALUES ($user_id,$guard_id,$task_id,'$SheduleDate_Time_Start','$type')";
                            $exe_insert = mysqli_query($conn,$insert);
                              if($exe_insert)
                                {
                                   $result++;
                                }
                         }
                     }
                 }
                 if($daysCounter*$petrols_daily == $result){
                     
                  $accept_job = "INSERT INTO `accept_request`(`user_id`, `guard_id`, `task_id`, `type`, `status`) VALUES ($user_id,$guard_id,$task_id,'$type','inprogress')";
                  $exe_insert_job = mysqli_query($conn,$accept_job);
                  
                  $updatestatus = "UPDATE `add_petroling_service` SET `status` =  'inprogress' WHERE `id` = $task_id";
                  mysqli_query($conn,$updatestatus);
                  
                  
                  
                    $playerId = array();
                    $sql_get_token = "SELECT * FROM `user` WHERE `id`=$user_id";
                    $ex = mysqli_query($conn,$sql_get_token);
                    while($Data = mysqli_fetch_array($ex))
                    {
                        array_push($playerId, $Data['notification_token']);
                    }
                    $content = array
                    (
                        "en" => "Guard has accepted your petrol request",
                    );
                    $fields = array
                    (
                       'app_id' => "83e0a29c-60be-46c0-ac3f-e08f4e905e0b",
                       'include_player_ids' => $playerId,
                       'data' => array("type" => "message"),
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
                        "user_id"=>$user_id,
                        "guard_id"=>$guard_id,
                        "task_id"=>$task_id,
                        "type"=>$type,
                    ];
                    
                    $data = ["status"=>true,
                        "message"=>"schedule has been added successfully",
                        "data"=>$temp];
                    echo json_encode($data); 
                }
                else
                {
                    $data = ["status"=>false,
                        "message"=>"something went wrong!"];
                    echo json_encode($data); 
                }
                 
             }
              
          }
    }
    else
    {
           
      $data = ["status"=>false,
                "message"=>"This job has been sheduled already for a guard!"];
            echo json_encode($data); 
     }
    
    }else if($type == 'Standing Security'){

 
    $check_if_dataisin_db = "SELECT * FROM `schedule_job` WHERE guard_id = $guard_id and task_id = $task_id AND `type` = '$type'";
    $execute = mysqli_query($conn,$check_if_dataisin_db);
    
    if(mysqli_num_rows($execute) == 0)
    {
        
        $get_standing_service = "SELECT `user_id`, `week_days`, `start_date`, `end_date`, `service_address`,  `shift_start_time`, `specific_post_order`, `location`, `time` FROM `add_standing_security` WHERE `id` = $task_id";
        $ex = mysqli_query($conn,$get_standing_service);
         if(mysqli_num_rows($ex) > 0){
             $Data = mysqli_fetch_array($ex);
             $user_id = $Data['user_id'];
             $start_date = $Data['start_date'];
             $end_date = $Data['end_date'];
             $week_days = json_decode($Data['week_days']);
             $time = $Data['time'];
             $shift_start_time = $Data['shift_start_time'];
             
             $date1 = new DateTime($start_date);
             $date2 = new DateTime($end_date);
             $interval = $date1->diff($date2);
            
             $days = $interval->days;
             $daysCounter = 0;
             $result = 0;
             $availablity = 0;
             $availablityinStanding = 0;
             for($n=0; $n<=$days; $n++){
                 $date=date_create($start_date);
                 date_add($date,date_interval_create_from_date_string($n." days"));
                 $newdate = $date;
                 $day  = date_format($date,"D");
                 $day  = date_format($date,"D");
                 $datetodayFrom  = date_format($date,"Y-m-d")." 00:00:00";
                 $datetodayTo  = date_format($date,"Y-m-d")." 23:59:59";
                 if(in_array($day, $week_days)){
                       $check_availablity = "SELECT `task_id` FROM `schedule_job` WHERE `guard_id` = 117  AND `type` = 'Standing Security' AND `Start_Date_Time` BETWEEN '$datetodayFrom' AND '$datetodayTo'";
                        $check_result = mysqli_query($conn,$check_availablity);
                        if(mysqli_num_rows($check_result) != 0){
                             $availablityinStanding++;
                         }
                 }
                     
             }
            
             for($i=0; $i<=$days; $i++){
                 $date=date_create($start_date);
                 date_add($date,date_interval_create_from_date_string($i." days"));
                 $newdate = $date;
                 $day  = date_format($date,"D");
                 $day  = date_format($date,"D");
                 if(in_array($day, $week_days)){
                     date_add($newdate,date_interval_create_from_date_string("12 hours"));
                     for($j=1; $j<=$petrols_daily; $j++){
                        date_add($newdate,date_interval_create_from_date_string($time." hours"));
                        $SheduleDate_Time_Start =  date_format($newdate,"Y-m-d H:i:s");
                        $check_availablity = "SELECT `task_id` FROM `schedule_job` WHERE `guard_id` = $guard_id AND `Start_Date_Time` = '$SheduleDate_Time_Start' AND `type` == 'Petroling Service'";
                        $check_result = mysqli_query($conn,$check_availablity);
                        if(mysqli_num_rows($check_result) == 0){
                             $availablity++;
                        }
                     }
                    $daysCounter++;
                 }
               }
               
                if($daysCounter*$petrols_daily != $availablity && $availablityinStanding > 0){
                 $data = ["status"=>false,
                        "message"=>"There is already some task that has time conflict with this job!"];
                 echo json_encode($data); 
                 }else{
                     
                     for($m=0; $m<=$days; $m++){
                         $date=date_create($start_date);
                         date_add($date,date_interval_create_from_date_string($m." days"));
                         $newdate = $date;
                         $day  = date_format($date,"D");
                         $day  = date_format($date,"D");
                         $shiftDateTime  = date_format($date,"Y-m-d")." ".$shift_start_time;
                         if(in_array($day, $week_days)){
                              $insert = "INSERT INTO `schedule_job`(`user_id`, `guard_id`, `task_id`, `Start_Date_Time`, `type`) VALUES ($user_id,$guard_id,$task_id,'$shiftDateTime','$type')";
                            $exe_insert = mysqli_query($conn,$insert);
                              if($exe_insert)
                                {
                                   $result++;
                              }
                         }
                          
                         
                     }
                     
                   if($daysCounter == $result){
                      $accept_job = "INSERT INTO `accept_request`(`user_id`, `guard_id`, `task_id`, `type`, `status`) VALUES ($user_id,$guard_id,$task_id,'$type','inprogress')";
                      $exe_insert_job = mysqli_query($conn,$accept_job);
                      
                      
                    $playerId = array();
                    $sql_get_token = "SELECT * FROM `user` WHERE `id`=$user_id";
                    $ex = mysqli_query($conn,$sql_get_token);
                    while($Data = mysqli_fetch_array($ex))
                    {
                        array_push($playerId, $Data['notification_token']);
                    }
                    $content = array
                    (
                        "en" => "Guard has accepted your petrol request",
                    );
                    $fields = array
                    (
                       'app_id' => "83e0a29c-60be-46c0-ac3f-e08f4e905e0b",
                       'include_player_ids' => $playerId,
                       'data' => array("type" => "message"),
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
                            "user_id"=>$user_id,
                            "guard_id"=>$guard_id,
                            "task_id"=>$task_id,
                            "type"=>$type,
                        ];
                        
                        $data = ["status"=>true,
                            "message"=>"schedule has been added successfully",
                            "data"=>$temp];
                        echo json_encode($data); 
                    }
                    else
                    {
                        $data = ["status"=>false,
                            "message"=>"something went wrong!"];
                        echo json_encode($data); 
                    }
                     
                 }
             }
        
    }
    else
    {
           
      $data = ["status"=>false,
                "message"=>"This job has been sheduled already for a guard!"];
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