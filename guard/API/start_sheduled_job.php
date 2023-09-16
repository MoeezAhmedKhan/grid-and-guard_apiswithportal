<?php
include('connection.php');

if($_POST['token'] == 'as23rlkjadsnlkcj23qkjnfsDKJcnzdfb3353ads54vd3favaeveavgbqaerbVEWDSC')
 {
     $sheduled_id = $_POST['shedule_id'];
     $task_id = $_POST['task_id'];
     $current_date_time = $_POST['current_date_time'];
     $latitudeFrom = $_POST["latitude"] ;
     $longitudeFrom = $_POST["longitude"];
     $guard_id = $_POST["guard_id"];
     $user_id = $_POST["user_id"];
     $type = $_POST["type"];
     if(!isset($_POST['shedule_id'])){
         
              $data = ["status"=>false,
                "message"=>"Shedule_id is required"];
              echo json_encode($data); 
         
     }else if(!isset($_POST['task_id'])){
          $data = ["status"=>false,
              "message"=>"task_id is required"];
              echo json_encode($data); 
              
     }else if(!isset($_POST['current_date_time'])){
          $data = ["status"=>false,
              "message"=>"current_date_time is required"];
              echo json_encode($data); 
     }else if(!isset($_POST['latitude'])){
          $data = ["status"=>false,
              "message"=>"latitude is required"];
              echo json_encode($data); 
     }
     else if(!isset($_POST['longitude'])){
          $data = ["status"=>false,
              "message"=>"longitude is required"];
              echo json_encode($data); 
     }else if(!isset($_POST['guard_id'])){
          $data = ["status"=>false,
              "message"=>"guard_id is required"];
              echo json_encode($data); 
     }else if(!isset($_POST['user_id'])){
          $data = ["status"=>false,
              "message"=>"user_id is required"];
              echo json_encode($data); 
     }else if(!isset($_POST['type'])){
          $data = ["status"=>false,
              "message"=>"type is required"];
              echo json_encode($data); 
     }
     else{
         
     $getshedule = '';
    if($type == 'Petroling Service'){
        $getshedule = "SELECT s.id , a.actual_amount , a.discounted_amount , a.promo_id , a.location FROM `schedule_job` s INNER JOIN add_petroling_service as a ON a.id = s.task_id  WHERE s.id = $sheduled_id AND s.Start_Date_Time <= '$current_date_time'";
    }else if($type == 'Standing Security'){
        $getshedule = "SELECT s.id , a.actual_amount , a.discounted_amount , a.promo_id , a.location FROM `schedule_job` s INNER JOIN add_standing_security  as a ON a.id = s.task_id  WHERE s.id = $sheduled_id AND s.Start_Date_Time <= '$current_date_time'";
    }
     $ex_shedule = mysqli_query($conn,$getshedule);
     if(mysqli_num_rows($ex_shedule)>0){
         $Data = mysqli_fetch_array($ex_shedule);
          $location  = json_decode($Data['location']);
          $latitudeTo = $location->latitude;
          $longitudeTo = $location->longitude;
          $value = haversineGreatCircleDistance($latitudeFrom,$longitudeFrom,$latitudeTo,$longitudeTo,3959);
          
          if($value > 0.5){
               $data = ["status"=>false,
                "message"=>"You should be within 500 meter of the location to start this sheduled job!"];
            echo json_encode($data); 
          }else{
                  $sqlupdate = "UPDATE `schedule_job` SET `status` = 'inprogress' WHERE `id` =$sheduled_id";
                  $ex_sqlupdate = mysqli_query($conn,$sqlupdate);
                  $sql_guard_state = "UPDATE `guard_status` SET `status` = 'engaged' , `job_type` = '$type' WHERE `guard_id` =$guard_id";
                  $ex_sql_guard_state = mysqli_query($conn,$sql_guard_state);

             
                  if($ex_sql_guard_state){
                      
                            // //sending push notification to customer
                            $playerId = array();
                            $sql_get_token = "SELECT * FROM `user` WHERE `id`= $user_id";
                            $ex = mysqli_query($conn,$sql_get_token);
                            $Data = mysqli_fetch_array($ex);
                            array_push($playerId, $Data['notification_token']);
                            $content = array
                            (
                                "en" => "Guard has started the job.",
                            );
                            
                            
                            
                            $fields = array
                            (
                              'app_id' => "83e0a29c-60be-46c0-ac3f-e08f4e905e0b",
                              'include_player_ids' => $playerId,
                              'data' => array("Id" => $task_id),
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
                            "message"=>"Sheduled job has been accespted sucessfully."];
                            echo json_encode($data); 
                      
                      
                      
                  }else{
                        $data = ["status"=>false,
                        "message"=>"There was some error!"];
                        echo json_encode($data); 
                  }
        
          }
         
         }else{
                $data = ["status"=>false,
                    "message"=>"This job start time is different please try again on time!",
                    ];
                echo json_encode($data); 
         }
         
         
         
         
     }
    
     
 }else{
           
            $data = ["status"=>false,
                "message"=>"access desined"];
            echo json_encode($data); 
}


function haversineGreatCircleDistance(
  $latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $earthRadius)
{
  // convert from degrees to radians
  $latFrom = deg2rad($latitudeFrom);
  $lonFrom = deg2rad($longitudeFrom);
  $latTo = deg2rad($latitudeTo);
  $lonTo = deg2rad($longitudeTo);

  $latDelta = $latTo - $latFrom;
  $lonDelta = $lonTo - $lonFrom;

  $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
    cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
  return ($angle * $earthRadius)*1.609;
}