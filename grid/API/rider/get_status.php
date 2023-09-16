<?php

require_once("connection.php");
if($_POST['token'] == 'as23rlkjadsnlkcj23qkjnfsDKJcnzdfb3353ads54vd3favaeveavgbqaerbVEWDSC')
{
    
    $rider_id = $_POST['rider_id'];
    
    $fetch_status = "SELECT `id`, `rider_id`, `status` FROM `rider_status` WHERE rider_id = $rider_id";
    $run = mysqli_query($conn,$fetch_status);
    $row = mysqli_num_rows($run);
    if($row > 0)
    {
        
        while($ar = mysqli_fetch_array($run))
        {
            $status = $ar['status'];
        }
        
            $temp = 
            [
                "rider_id"=>$rider_id,
                "status"=>$status,
            ];
            
            $data = 
            [
                        
                "status"=>true,
                "response_code"=>200,
                "message"=>"rider status has been fetched",
                "data"=>$temp
                        
            ];
            echo json_encode($data);
    }
    else
    {
       $data = 
        [
                    
            "status"=>false,
            "response_code"=>203,
            "message"=>"no status found",
                    
        ];
        echo json_encode($data); 
    }
    
    
}
else
{
    $data = 
    [
                
        "status"=>false,
        "response_code"=>404,
        "message"=>"acess denied",
                
    ];
    echo json_encode($data);
    
}



?>