<?php
include('connection.php');

if($_POST['token'] == 'as23rlkjadsnlkcj23qkjnfsDKJcnzdfb3353ads54vd3favaeveavgbqaerbVEWDSC')
{
    $guard_id = $_POST['guard_id'];
    $location = ($_POST['location']);
    
    if($guard_id != '' && $location != '' ){
        
        $sql_to_update_location = "UPDATE `user` SET `current_location` = '$location' WHERE`id` = $guard_id";
        $ex = mysqli_query($conn,$sql_to_update_location);
        if($ex){
             $data = ["status"=>true,
            "message"=>"The new location has been updated sucessfully."];
             echo json_encode($data); 
        }else{
            $data = ["status"=>false,
            "message"=>"There was some database error!."];
          echo json_encode($data); 
        }
    
    }else{
        $data = ["status"=>false,
            "message"=>"There was some error!."];
          echo json_encode($data); 
    }
    

    
}
else
{
    $data = ["status"=>false,
            "message"=>"access desined"];
    echo json_encode($data); 
}
    
?>