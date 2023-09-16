<?php

require_once("connection.php");
if ($_POST['token'] == 'as23rlkjadsnlkcj23qkjnfsDKJcnzdfb3353ads54vd3favaeveavgbqaerbVEWDSC') {
    
    
$user_id = $_POST['user_id'];
$task_id = $_POST['task_id'];
$type = $_POST['type'];
    if($type == "On Demand"){
            $myarr = array();
            $getReport = "SELECT `image`, `location` , `file_type` , `description` FROM `add_report_data` WHERE `user_id`= '$user_id' AND `task_id` = '$task_id' AND `type` = '$type'";    
            $run_getReport = mysqli_query($conn,$getReport);
            $rePort_rows = mysqli_num_rows($run_getReport);
              if($rePort_rows > 0)
                {   
                    while($ar = mysqli_fetch_array($run_getReport))
                    {
                        $tmp = 
                        [
                            "fileurl"=>$ar['image'],
                            "file_type"=>$ar['file_type'],
                            "description"=>$ar['description'],
                            "task_id"=>$ar['task_id'],
                            "location"=>json_decode($ar['location']),
                        ];
                        array_push($myarr,$tmp);
                    }
                          
                          
                          
                    $sql_get_locations = "SELECT `location` , `end_location`  FROM `on_demand_request` WHERE `id` = $task_id";
                    
                    $ex_locations = mysqli_query($conn,$sql_get_locations);
                    $Data = mysqli_fetch_array($ex_locations);
                    $start_location = $Data['location'];
                    $end_location = $Data['end_location'];
                          
                          
                            
                    $data = 
                    [
                        "status"=> true,
                        "response_code"=> 200,
                        "message"=> "fetched successfully",
                        "task_id"=> $task_id,
                        "start_location"=> json_decode($start_location),
                        "end_location"=> json_decode($end_location),
                        "data"=>$myarr,
                    ];
                        echo json_encode($data);
                }
                else
                {
                $data = 
                [
                    "status"=> false,
                    "response_code"=> 205,
                    "message"=> "Data not found",
                ];
                    echo json_encode($data);
                }
    }else{
        $myarr = array();
     $get_shedule = "SELECT `id`, `user_id`, `guard_id`, `task_id`, `Start_Date_Time`, `End_Date_Time`, `type`, `status`, `created_at` FROM `schedule_job` WHERE `task_id` = $task_id  AND `type` = '$type'";
        $ex= mysqli_query($conn,$get_shedule);
        if(mysqli_num_rows($ex) > 0){
            while($row = mysqli_fetch_array($ex)){
                $shedule_id = $row['id'];
                $get_shedule_data = "SELECT `id`, `user_id`, `task_id`, `shedule_id`, `guard_id`, `image`, `file_type`, `location`, `description`, `type`, `created_at` FROM `add_report_data` WHERE `shedule_id` =$shedule_id";
                $ex_get_shedule_data = mysqli_query($conn,$get_shedule_data);
                $shedule_reqport = array();
                if(mysqli_num_rows($ex_get_shedule_data) > 0){
                    while($row_shedule = mysqli_fetch_array($ex_get_shedule_data)){
                         $tmp = 
                            [
                                "id"=>$row_shedule['id'],
                                "fileurl"=>$row_shedule['image'],
                                "file_type"=>$row_shedule['file_type'],
                                "description"=>$row_shedule['description'],
                                "location"=>json_decode($row_shedule['location']),
                            ];
                            array_push($shedule_reqport,$tmp);
                        
                    }
                }
                
                $temp2 = [
                            "shedule_id"=>$row['id'],
                            "task_id"=>$row['task_id'],
                            "Start_Date_Time"=>$row['Start_Date_Time'],
                            "End_Date_Time"=>$row['End_Date_Time'],
                            "status"=>$row['status'],
                            "report_data"=>$shedule_reqport
                        ];
                array_push($myarr,$temp2);        
                        
            }
            
          $data = 
                    [
                        "status"=> true,
                        "response_code"=> 200,
                        "message"=> "fetched successfully",
                        "task_id"=> $task_id,
                        "data"=>$myarr,
                    ];
          echo json_encode($data);
        }
        else{
            
           $data = 
                    [
                        "status"=> false,
                        "response_code"=> 202,
                        "message"=> "No data found!",
                    ];
          echo json_encode($data);
            
        }
        
        
        
    }
  
    
}
else
{
  $data = ["status"=>false,
            "Response_code"=>403,
            "Message"=>"Access denied"];
  echo json_encode($data);          
 }
?>