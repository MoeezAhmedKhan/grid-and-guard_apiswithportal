<?php

require_once("connection.php");
if ($_POST['token'] == 'as23rlkjadsnlkcj23qkjnfsDKJcnzdfb3353ads54vd3favaeveavgbqaerbVEWDSC') {
    $myarr = array();
    
$task_id = $_POST['task_id'];
$getReport = "SELECT `id`, `user_id`, `task_id`, `guard_id`, `image`, `location`, `description`, `type`, `created_at` FROM `add_report_data` WHERE  `task_id` = $task_id";
$run_getReport = mysqli_query($conn,$getReport);
$rePort_rows = mysqli_num_rows($run_getReport);
if($rePort_rows > 0)
{         
    while($ar = mysqli_fetch_array($run_getReport))
    {
        $tmp = 
        [
            "image"=>$ar['image'],
            "location"=>json_decode($ar['location']),
        ];
        array_push($myarr,$tmp);
    }
            
    $data = 
    [
        "status"=> true,
        "response_code"=> 200,
        "message"=> "fetched successfully",
        "data"=>$myarr,
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
    
}
else
{
  $data = ["status"=>false,
            "Response_code"=>403,
            "Message"=>"Access denied"];
  echo json_encode($data);          
 }
?>