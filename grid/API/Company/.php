<?php
    error_reporting (E_ALL ^ E_NOTICE);
    require_once('../connection.php');
if($_POST['token'] == 'as23rlkjadsnlkcj23qkjnfsDKJcnzdfb3353ads54vd3favaeveavgbqaerbVEWDSC')
{
    
    $user_id = $_POST['user_id'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $service_address = $_POST['service_address'];
    $week_days = $_POST['week_days'];
    $petrols_daily = $_POST['petrols_daily'];
    $location = ($_POST['location']);
    $time = $_POST['time'];
    $promo_id = $_POST['promo_id'] ? $_POST['promo_id'] : 0;
    $discounted_amount = $_POST['discounted_amount'] ? $_POST['discounted_amount'] : 0;
    $actual_amount = $_POST['actual_amount'] ? $_POST['actual_amount'] : 0;
    $post_orders = $_POST['post_orders'] ? $_POST['post_orders'] : 0;
    $insert = "INSERT INTO `add_petroling_service`(`user_id`, `start_date`, `end_date`, `service_address`, `week_days`, `petrols_daily`, `location`, `time`, `promo_id`, `discounted_amount`, `actual_amount`, `post_order`) VALUES ('$user_id','$start_date','$end_date','$service_address','$week_days','$petrols_daily','$location','$time', '$promo_id', '$discounted_amount' ,'$actual_amount','$post_orders')";
    $run_insert = mysqli_query($conn,$insert);
    //return false;	
    if($run_insert)
    {
        
            $temp = 
            [
                "user_id"=>$user_id,
                "start_date"=>$start_date,
                "end_date"=>$end_date,
                "service_address"=>$service_address,
                "week_days"=>$week_days,
                "petrols_daily"=>$petrols_daily,
                "location"=>$location,
                "time"=>$time,
                "promo_id"=>$promo_id,
                "discounted_amount"=>$discounted_amount,
                "actual_amount"=>$actual_amount,
                "post_orders"=>$post_orders
            ];
            $data = 
            [
                "status"=>true,
                "Response_code"=>200,
                "Message"=>"petroling service with location has been inserted successfully",
                "data"=>$temp
            ];
            echo json_encode($data); 
            die();
    }
    else
    {
        $data = 
        [
            "status"=>false,
            "Response_code"=>403,
            "Message"=>"something went wrong while inserting petroling service",
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