<?php

require_once("connection.php");
if($_POST['token'] == 'as23rlkjadsnlkcj23qkjnfsDKJcnzdfb3353ads54vd3favaeveavgbqaerbVEWDSC')
{
    $userid = $_POST['user_id'];
    $stats = $_POST['status'];
    
    $myarr = array();
    $myarr2 = array();
   
    if($stats == 'completed'){
    $sqlfortask = "SELECT `id`, `user_id`, `dropoff_location`, `status`, `created_at` FROM `task` where user_id = '$userid' AND `status` = '$stats'";
    $runfortask = mysqli_query($conn,$sqlfortask);
    $rowfortask = mysqli_num_rows($runfortask);
    $rider_id = '';
    $rider_name = '';
    if($rowfortask > 0)
    {
        $sum = 0;
        while($ar1 = mysqli_fetch_array($runfortask))
        {
            
            $sqlforrider = 'SELECT tl.rider_id, u.first_name , u.last_name FROM `task_log` tl INNER JOIN `users` u ON tl.rider_id = u.id WHERE tl.task_id ='.$ar1['id'];
            $runsqlforrider = mysqli_query($conn,$sqlforrider);
            $rider = mysqli_fetch_array($runsqlforrider);
            $rider_id = $rider['rider_id'];
            $rider_name = $rider['first_name']." ".$rider['last_name'];
            
            
            
            $sqlfortaskdetail = "SELECT `id`, `task_id`, `title`, `name`, `description`, `estimated_cost`, `pickup_location`, `menu_item_id`,`status` FROM `task_details` where task_id =".$ar1['id'];
            $runfortaskdetail = mysqli_query($conn,$sqlfortaskdetail);
            $rowfortaskdetail = mysqli_num_rows($runfortaskdetail);
            if($rowfortaskdetail > 0)
            {
                
                while($ar2 = mysqli_fetch_array($runfortaskdetail))
                {
                    $sum += $ar2['estimated_cost'];
                    
                    $sqlforuser = "SELECT `id`, `first_name`, `last_name`, `phone`, `email`, `password`, `img`, `address`, `city`, `state`, `zipcode`, `status`, `role_id`, `social_id`, `notification_token`, `Wallaet_Balance`, `created_at` FROM `users` WHERE id =".$ar1['user_id'];
                    $runforuser = mysqli_query($conn,$sqlforuser);
                    $rowforuser = mysqli_num_rows($runforuser);
                    if($rowforuser > 0)
                    {
                        while($ar3 = mysqli_fetch_array($runforuser))
                        {
                            $username = $ar3['first_name'];
                            $notification_token = $ar3['notification_token'];
                        }
                    }
                    
                    $temp2 = 
                    [
                        "task_details_id" => $ar2['id'],
                        "title" => $ar2['title'],
                        "name" => $ar2['name'],
                        "description" => $ar2['description'],
                        "estimated_cost" => $ar2['estimated_cost'],
                        "pickup_location" => $ar2['pickup_location'],
                        "menu_item_id" => $ar2['menu_item_id'],
                        "task_detail_status"=>$ar2['status'],
                    ];
                    array_push($myarr,$temp2);
                }
            }
            
            $temp1 = 
            [
                "task_id" => $ar1['id'],
                "user_id" => $ar1['user_id'],
                "rider_id"=>$rider_id,
                "rider_name"=>$rider_name,
                "username" => $username,
                // "notification_token" => $notification_token,
                "total"=>$sum,
                "dropoff_location" => $ar1['dropoff_location'],
                "status"=> $ar1['status'],
                "task_details"=>$myarr,
            ];
            $myarr = [];
            
            array_push($myarr2,$temp1);
                $rider_id = '';
                $rider_name = '';
        }
        
        
        $data = 
        [
                    
            "status"=>true,
            "response_code"=>200,
            "message"=>"Task found",
            "data"=>$myarr2
                    
        ];
        echo json_encode($data);
        
        
    }
    else
    {
        $data = 
        [
                    
            "status"=>false,
            "response_code"=>203,
            "message"=>"Task not found",
                    
        ];
        echo json_encode($data);
    }
    
    }else{
            $sqlfortask = "SELECT `id`, `user_id`, `dropoff_location`, `status`, `created_at` FROM `task` where user_id = '$userid' AND `status` != 'completed'";
    $runfortask = mysqli_query($conn,$sqlfortask);
    $rowfortask = mysqli_num_rows($runfortask);
    $rider_id = '';
    $rider_name = '';
    if($rowfortask > 0)
    {
        $sum = 0;
        while($ar1 = mysqli_fetch_array($runfortask))
        {
            
            $sqlforrider = 'SELECT tl.rider_id, u.first_name , u.last_name FROM `task_log` tl INNER JOIN `users` u ON tl.rider_id = u.id WHERE tl.task_id ='.$ar1['id'];
            $runsqlforrider = mysqli_query($conn,$sqlforrider);
            $rider = mysqli_fetch_array($runsqlforrider);
            $rider_id = $rider['rider_id'];
            $rider_name = $rider['first_name']." ".$rider['last_name'];
            
            
            
            $sqlfortaskdetail = "SELECT `id`, `task_id`, `title`, `name`, `description`, `estimated_cost`, `pickup_location`, `menu_item_id`,`status` FROM `task_details` where task_id =".$ar1['id'];
            $runfortaskdetail = mysqli_query($conn,$sqlfortaskdetail);
            $rowfortaskdetail = mysqli_num_rows($runfortaskdetail);
            if($rowfortaskdetail > 0)
            {
                
                while($ar2 = mysqli_fetch_array($runfortaskdetail))
                {
                    $sum += $ar2['estimated_cost'];
                    
                    $sqlforuser = "SELECT `id`, `first_name`, `last_name`, `phone`, `email`, `password`, `img`, `address`, `city`, `state`, `zipcode`, `status`, `role_id`, `social_id`, `notification_token`, `Wallaet_Balance`, `created_at` FROM `users` WHERE id =".$ar1['user_id'];
                    $runforuser = mysqli_query($conn,$sqlforuser);
                    $rowforuser = mysqli_num_rows($runforuser);
                    if($rowforuser > 0)
                    {
                        while($ar3 = mysqli_fetch_array($runforuser))
                        {
                            $username = $ar3['first_name'];
                            $notification_token = $ar3['notification_token'];
                        }
                    }
                    
                    $temp2 = 
                    [
                        "task_details_id" => $ar2['id'],
                        "title" => $ar2['title'],
                        "name" => $ar2['name'],
                        "description" => $ar2['description'],
                        "estimated_cost" => $ar2['estimated_cost'],
                        "pickup_location" => $ar2['pickup_location'],
                        "menu_item_id" => $ar2['menu_item_id'],
                        "task_detail_status"=>$ar2['status'],
                    ];
                    array_push($myarr,$temp2);
                }
            }
            
            $temp1 = 
            [
                "task_id" => $ar1['id'],
                "user_id" => $ar1['user_id'],
                "rider_id"=>$rider_id,
                "rider_name"=>$rider_name,
                "username" => $username,
                "notification_token" => $notification_token,
                "total"=>$sum,
                "dropoff_location" => $ar1['dropoff_location'],
                "status"=> $ar1['status'],
                "task_details"=>$myarr,
            ];
            $myarr = [];
            
            array_push($myarr2,$temp1);
                $rider_id = '';
                $rider_name = '';
        }
        
        
        $data = 
        [
                    
            "status"=>true,
            "response_code"=>200,
            "message"=>"Task found",
            "data"=>$myarr2
                    
        ];
        echo json_encode($data);
        
        
    }
    else
    {
        $data = 
        [
                    
            "status"=>false,
            "response_code"=>203,
            "message"=>"Task not found",
                    
        ];
        echo json_encode($data);
    }
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