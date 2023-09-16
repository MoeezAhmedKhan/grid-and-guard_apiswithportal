<?php
include('connection.php');

if($_POST['token'] == 'as23rlkjadsnlkcj23qkjnfsDKJcnzdfb3353ads54vd3favaeveavgbqaerbVEWDSC')
 {
    $guard_id = $_POST['guard_id'];
    
    if(!isset($_POST['guard_id'])){
     $data = ["status"=>false,
              "message"=>"guard_id is required"
             ];
              echo json_encode($data); 
              
    }else{
        $sql_get_shedule = "SELECT `id`, `user_id`, `guard_id`, `task_id` , `type` FROM `schedule_job` WHERE `status` = 'inprogress' AND `guard_id` = $guard_id";
        $ex_get_shedule = mysqli_query($conn,$sql_get_shedule);
        if(mysqli_num_rows($ex_get_shedule) > 0 ){
            $data = array();
            while($row = mysqli_fetch_array($ex_get_shedule)){
                $temp = [
                        "shedule_id"=>$row['id'], 
                        "task_id"=>$row['task_id'],
                        "status"=>$row['status'],
                        "type"=>$row['type'],
                    ];
                array_push($data,$temp);
            }
            $data = ["status"=>true,
                    "message"=>"found ingpress jobs",
                    "data"=>$data,
                    
                    ];
            echo json_encode($data); 
            
            
            
        }else{
              $data = ["status"=>false,
                    "message"=>"No data found!"];
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