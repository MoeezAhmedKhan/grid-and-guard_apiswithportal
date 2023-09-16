<?php
include('connection.php');

if($_POST['token'] == 'as23rlkjadsnlkcj23qkjnfsDKJcnzdfb3353ads54vd3favaeveavgbqaerbVEWDSC')
{
    

    $shedule_id = $_POST['shedule_id'];
    $type = $_POST['type'];

    
   
     if(!isset($_POST['shedule_id'])){
          $data = ["status"=>false,
              "message"=>"shedule_id is required"];
              echo json_encode($data); 
     }else if(!isset($_POST['type'])){
          $data = ["status"=>false,
              "message"=>"type is required"];
              echo json_encode($data); 
     }else{
         $sql = '';
         if($type == 'Petroling Service'){
             $sql = "SELECT s.id, s.task_id , s.user_id, CONCAT(u.first_name , ' ' , u.last_name) as customername , s.type , `Start_Date_Time`, a.location FROM `schedule_job` s INNER JOIN user as u ON u.id = s.user_id INNER JOIN add_petroling_service as a ON a.id = s.task_id WHERE s.id = $shedule_id;";
         }else if($type == 'Standing Security'){
             $sql = "SELECT s.id, s.task_id , s.user_id, CONCAT(u.first_name , ' ' , u.last_name) as customername , s.type , `Start_Date_Time`, a.location FROM `schedule_job` s INNER JOIN user as u ON u.id = s.user_id INNER JOIN add_standing_security as a ON a.id = s.task_id WHERE s.id = $shedule_id";
         }
         
         $ex = mysqli_query($conn,$sql);
         if(mysqli_num_rows($ex) > 0){
             $Data = mysqli_fetch_array($ex);
             $temp = [
                        "user_id"=>$Data['user_id'],
                        "shedule_id"=>$Data['id'],
                        "task_id"=>$Data['task_id'],
                        "customer_name"=>$Data['customername'],
                        "Start_Date_Time"=>$Data['Start_Date_Time'],
                        "location"=>json_decode($Data['location']),
                        "type"=>$Data['type'],
                 
                     ];
                 $data = ["status"=>true,
                "message"=>"Fetched data secessfuly",
                "Data"=>$temp];
                echo json_encode($data);      
                     
             
         }else{
              $data = ["status"=>false,
                "message"=>"There was some error!"];
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