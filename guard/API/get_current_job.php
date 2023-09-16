<?php
include('connection.php');

if($_POST['token'] == 'as23rlkjadsnlkcj23qkjnfsDKJcnzdfb3353ads54vd3favaeveavgbqaerbVEWDSC')
 {
     $guard_id = $_POST['guard_id'];    
   
      $get_accepted_jobs = "SELECT a.id, a.user_id, a.guard_id, a.guard_location, a.task_id, a.type, a.status, a.end_job_date , CONCAT(cx.first_name , ' ' , cx.last_name) as customer_name , CONCAT(ga.first_name , ' ',  ga.last_name) as guard_Name FROM `accept_request` a  INNER JOIN user as cx ON a.user_id = cx.id  INNER JOIN user as ga ON a.guard_id = ga.id WHERE `guard_id`=  $guard_id AND a.Status = 'inprogress' AND `type` = 'Petroling Service' || `guard_id`=  $guard_id AND a.Status = 'inprogress' AND `type` = 'Standing Security'";
      $ex_accpted_jobs = mysqli_query($conn,$get_accepted_jobs);
      if(mysqli_num_rows($ex_accpted_jobs) > 0)
       {
         $copleteshedule= array();
         
         $i = 1;
             while($row_accpeted_jobs = mysqli_fetch_array($ex_accpted_jobs))
             { 
                   
                 $task_id = $row_accpeted_jobs['task_id'];
                 $type = $row_accpeted_jobs['type'];
                 if($type == 'Petroling Service' )
                    {
                         $get_pertrolling_services = "SELECT s.id as shedule_id, a.user_id, s.guard_id , s.Start_Date_Time , s.status , a.week_days , a.service_address , a.petrols_daily , a.location ,a.post_order , a.actual_amount  FROM add_petroling_service a INNER JOIN schedule_job as s ON  s.task_id = a.id WHERE a.id = $task_id";
                         $ex_pertolling_services = mysqli_query($conn,$get_pertrolling_services);
                         $each_pertol = array();
                         while($row_pertrolling_services = mysqli_fetch_array($ex_pertolling_services))
                         {
                             $inner_data = [
                                             'shedule_id'=>$row_pertrolling_services['shedule_id'],
                                             'user_id'=>$row_pertrolling_services['user_id'],
                                             'guard_id'=>$row_pertrolling_services['guard_id'],
                                             'Start_Date_Time'=>$row_pertrolling_services['Start_Date_Time'],
                                             'status'=>$row_pertrolling_services['status'],
                                             'service_address'=>$row_pertrolling_services['service_address'],
                                             'location'=>$row_pertrolling_services['location'],
                                 
                                          ];
                            array_push($each_pertol,$inner_data);
                         }
                         
                         $temp = [
                                    "Task_id"=>$task_id,
                                    "Cx_Name"=>$row_accpeted_jobs['customer_name'],
                                    "guard_Name"=>$row_accpeted_jobs['guard_Name'],
                                    "type"=>$row_accpeted_jobs['type'],
                                    "Job_status"=>$row_accpeted_jobs['status'],
                                    "Data"=>$each_pertol,
                                 ];
                         
                         array_push($copleteshedule,$temp);
                        
                      
                     }
                     else if ($type == 'Standing Security')
                     {
                         $get_pertrolling_services = "SELECT  s.id as shedule_id, a.user_id, s.guard_id , s.Start_Date_Time , s.status , a.week_days , a.service_address , a.petrols_daily , a.location , a.actual_amount FROM add_standing_security a INNER JOIN schedule_job as s ON s.task_id = a.id WHERE a.id  = $task_id";
                         $ex_pertolling_services = mysqli_query($conn,$get_pertrolling_services);
                         $each_pertol = array();
                         while($row_pertrolling_services = mysqli_fetch_array($ex_pertolling_services))
                         {
                             $inner_data = [
                                             'shedule_id'=>$row_pertrolling_services['shedule_id'],
                                             'user_id'=>$row_pertrolling_services['user_id'],
                                             'guard_id'=>$row_pertrolling_services['guard_id'],
                                             'Start_Date_Time'=>$row_pertrolling_services['Start_Date_Time'],
                                             'status'=>$row_pertrolling_services['status'],
                                             'service_address'=>$row_pertrolling_services['service_address'],
                                             'location'=>$row_pertrolling_services['location'],
                                 
                                          ];
                            array_push($each_pertol,$inner_data);
                         }
                         
                         $temp = [
                                    "Task_id"=>$task_id,
                                    "Cx_Name"=>$row_accpeted_jobs['customer_name'],
                                    "guard_Name"=>$row_accpeted_jobs['guard_Name'],
                                    "type"=>$row_accpeted_jobs['type'],
                                    "Job_status"=>$row_accpeted_jobs['status'],
                                    "Data"=>$each_pertol,
                                 ];
                         
                         array_push($copleteshedule,$temp);
                     }
             }
              echo json_encode($copleteshedule); 
         
        }
        else
        {
                $data = ["status"=>false,
                    "message"=>$type];
                echo json_encode($data); 
         }
              

 }else{
           
            $data = ["status"=>false,
                "message"=>"access desined"];
            echo json_encode($data); 
}