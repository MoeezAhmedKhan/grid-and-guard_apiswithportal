<?php

    require_once("connection.php");
      $current_date = date("Y-m-d");

    $shedule = "SELECT `id`, `user_id`, `guard_id`, `task_id`, `type`, `status`, `created_at` FROM `schedule_job`";
    $run_shedule = mysqli_query($conn,$shedule);
    $shedule_rows = mysqli_num_rows($run_shedule);
    if($shedule_rows > 0)
    {
                
        while($ar = mysqli_fetch_array($run_shedule))
        {
            $guard_id = $ar['guard_id'];
            
           $patrol = "SELECT `id`, `user_id`, `start_date`, `end_date`, `service_address`, `week_days`, `petrols_daily`, `location`, `time`, `post_order`, `status`, `created_at` FROM `add_petroling_service` WHERE id = {$ar['task_id']}";
           $run_patrol = mysqli_query($conn,$patrol);
           if($run_patrol)
           {
               while($patArr = mysqli_fetch_assoc($run_patrol))
               {
                    $index = 0;
                    $week_days = json_decode($patArr['week_days']);
                        if($current_date == $patArr['start_date'] && $week_days[index] == )
                            $sql_guard = "SELECT `id`, `guard_id`, `status`, `job_type` FROM `guard_status` WHERE guard_id=$guard_id";
                            $guardexce = mysqli_query($conn,$sql_guard);
                        }
                    index++;
               }
           }
        }
                
        $data = 
        [
            "status"=> true,
            "response_code"=> 200,
            "message"=> "fetched successfully",
            "data"=>$TMP,
        ];
        echo json_encode($data);
    }
    else
    {
        $data = 
        [
            "status"=> true,
            "response_code"=> 200,
            "data"=> [],
        ];
        echo json_encode($data);
    }
        
        
        
    


?>