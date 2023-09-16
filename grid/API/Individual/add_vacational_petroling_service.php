<?php

require_once('../connection.php');
if($_POST['token'] == 'as23rlkjadsnlkcj23qkjnfsDKJcnzdfb3353ads54vd3favaeveavgbqaerbVEWDSC')
{
    
    $u_id = $_POST['user_id'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $service_address = $_POST['service_address'];
    $petrols_daily = $_POST['petrols_daily'];
    
    $latlog = json_encode($_POST['loc'],true);
    $time = $_POST['time'];
    
    $insert = "INSERT INTO `add_vacational_petrol`(`user_id`, `start_date`, `end_date`, `service_address`, `petrols_daily`, `location`, `time`) 
    VALUES ('$u_id','$start_date','$end_date','$service_address','$petrols_daily','$latlog','$time')";
    $run_insert = mysqli_query($conn,$insert);
    if($run_insert)
    {
            $temp = 
            [
                "u_id"=>$u_id,
                "start_date"=>$start_date,
                "end_date"=>$end_date,
                "service_address"=>$service_address,
                "petrols_daily"=>$petrols_daily,
                "latlog"=>$latlog,
                "time"=>$time,
                
            ];
            
            $data = 
            [
                "status"=>true,
                "Response_code"=>200,
                "Message"=>"vacational petroling service with location has been inserted successfull",
                "data"=>$temp
            ];
            echo json_encode($data); 

        
    }
    else
    {
        $data = 
        [
            "status"=>false,
            "Response_code"=>403,
            "Message"=>"something went wrong while inserting vacational petroling service",
        ];
        echo json_encode($data);
    }
    
    
}
else
{
    $data = 
    [
        "status"=>false,
        "Response_code"=>404,
        "Message"=>"Access denied"
    ];
    echo json_encode($data);
}


?>