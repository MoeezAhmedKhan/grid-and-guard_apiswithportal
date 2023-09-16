<?php

require_once("connection.php");
if($_POST['token'] == 'as23rlkjadsnlkcj23qkjnfsDKJcnzdfb3353ads54vd3favaeveavgbqaerbVEWDSC')
{
    $user_id = $_POST['user_id'];
    $myarr = array();
    $myarr2 = array();
    
   $rider_stat = "SELECT `status` FROM `rider_status` WHERE `rider_id` = '$user_id'";
   $runforstatus = mysqli_query($conn,$rider_stat);
   $rzz = mysqli_fetch_array($runforstatus);
   $rider_status = $rzz['status'];
   if($rider_status == 'idle'){
    $sqlfortask = "SELECT `id`, `user_id`, `dropoff_location`, `status`, `created_at` FROM `task` WHERE `status` != 'completed'";
    $runfortask = mysqli_query($conn,$sqlfortask);
    $rowfortask = mysqli_num_rows($runfortask);
    if($rowfortask > 0)
    {
        $sum = 0;
        while($ar1 = mysqli_fetch_array($runfortask))
        {
            
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
                            $last_name = $ar3['last_name'];
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
                        "task_detail_status" => $ar2['status']
                    ];
                    array_push($myarr,$temp2);
                }
            }
            
            
            $temp1 = 
            [
                "task_id" => $ar1['id'],
                "user_id" => $ar1['user_id'],
                "username" => $username." ".$last_name,
                "total"=>$sum,
                "dropoff_location" => $ar1['dropoff_location'],
                "status "=> $ar1['status'],
                "task_details"=>$myarr,
            ];
            $myarr = [];
            array_push($myarr2,$temp1);
            
            
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
             "data"=>[],       
        ];
        echo json_encode($data);
    }
    
   }else{
       $data = 
        [
                    
            "status"=>false,
            "response_code"=>203,
            "message"=>"Provider is buzy in current task.",
            "data"=>[]
                    
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