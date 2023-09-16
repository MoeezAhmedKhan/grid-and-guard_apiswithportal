<?php

require_once('../connection.php');
if($_POST['token'] == 'as23rlkjadsnlkcj23qkjnfsDKJcnzdfb3353ads54vd3favaeveavgbqaerbVEWDSC')
{
    
    $u_id = $_POST['user_id'];
    $week_days = $_POST['week_days'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $service_address = $_POST['service_address'];
    $petrols_daily = $_POST['petrols_daily'];
    $shift_start_time = $_POST['shift_start_time'];
    $specific_post_order = $_POST['specific_post_order'];
    $promo_id = $_POST['promo_id'] ? $_POST['promo_id'] : 0;
    $discounted_amount = $_POST['discounted_amount'] ? $_POST['discounted_amount'] : 0;
    $actual_amount = $_POST['actual_amount'] ? $_POST['actual_amount'] : 0;
    $post_orders = $_POST['post_orders'] ? $_POST['post_orders'] : null;
    $latlong = json_encode($_POST['location'],true);
    $insert = "INSERT INTO `add_standing_security`(`user_id`, `week_days`, `start_date`, `end_date`, `service_address`,
    `petrols_daily`, `shift_start_time`, `specific_post_order`, `location`,`promo_id`,`discounted_amount`,`actual_amount`, `post_orders`) VALUES
    ('$u_id','$week_days','$start_date','$end_date','$service_address','$petrols_daily','$shift_start_time','$specific_post_order',
    $latlong,'$promo_id','$discounted_amount','$actual_amount','$post_orders')";
    $run_insert = mysqli_query($conn,$insert);
    if($run_insert)
    {
        
          $playerId = array();
          $sql_get_token = "SELECT * FROM guard_status g INNER JOIN user u on u.id = g.guard_id WHERE g.status = 'idle'";
                $ex = mysqli_query($conn,$sql_get_token);
                while($Data = mysqli_fetch_array($ex))
                {
                    array_push($playerId, $Data['notification_token']);
                }
                $content = array
                (
                    "en" => "A standard seciruty job Available Now",
                );
                $fields = array
                (
                   'app_id' => "83e0a29c-60be-46c0-ac3f-e08f4e905e0b",
                   'include_player_ids' => $playerId,
                   'data' => array("type" => "message"),
                   'large_icon' =>"ic_launcher_round.png",
                   'contents' => $content
                );
                $fields = json_encode($fields);
                       
        
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
                'Authorization: Basic ODU5ZDhiZjAtOWRkZS00NDIyLWI0ZWItOTYxMDc5YzQzMGIz'));
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                curl_setopt($ch, CURLOPT_HEADER, FALSE);
                curl_setopt($ch, CURLOPT_POST, TRUE);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);    
        
                $response = curl_exec($ch);
                curl_close($ch);
        
        
        
        
            $temp = 
            [
                "u_id"=>$u_id,
                "week_days"=>$week_days,
                "start_date"=>$start_date,
                "end_date"=>$end_date,
                "service_address"=>$service_address,
                "petrols_daily"=>$petrols_daily,
                "shift_start_time"=>$shift_start_time,
                "specific_post_order"=>$specific_post_order,
                "shift_start_time"=>$latlong,
                
                "post_orders"=>$post_orders,
                
            ];
            
            
            $data = 
            [
                "status"=>true,
                "Response_code"=>200,
                "Message"=>"standing security service with location has been inserted successfull",
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
            "Message"=>"something went wrong while inserting standing security service",
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