<?php
include('connection.php');

if($_POST['token'] == 'as23rlkjadsnlkcj23qkjnfsDKJcnzdfb3353ads54vd3favaeveavgbqaerbVEWDSC')
{
    $guard_id = $_POST['guard_id'];
    $myarr_arr = array();
    
    $select_exist = "SELECT * FROM `user` WHERE `id` = $guard_id";
    $run_exist = mysqli_query($conn,$select_exist);
    $check_row = mysqli_num_rows($run_exist);
    if($check_row > 0)
    {
    
        $select_status = "SELECT `id`, `guard_id`, `status`, `job_type` FROM `guard_status` WHERE guard_id = $guard_id";
        $run_status = mysqli_query($conn,$select_status);
        $status_ar = mysqli_fetch_array($run_status);
        if($status_ar['status'] == "idle")
        {
            $petroling_service = "SELECT p.id,p.user_id,p.start_date,p.end_date,p.service_address,p.week_days,p.petrols_daily,p.location,p.time,p.post_order,p.status,p.created_at,u.business_name,u.company_name,u.first_name,u.last_name,u.phone FROM add_petroling_service p INNER JOIN user u on u.id = p.user_id WHERE p.status = 'pending'";
            $petroling_execute = mysqli_query($conn,$petroling_service);
            $petrol_row = mysqli_num_rows($petroling_execute);
            if($petrol_row > 0)
            {
                while($petroling_data = mysqli_fetch_array($petroling_execute))
                {
                    // echo $petroling_data['location'];
                    $patrol = [
                                "type"=>"Petroling Service",
                                "id"=>$petroling_data['id'],
                                "user_id"=>$petroling_data['user_id'],
                                "business_name"=>$petroling_data['business_name'],
                                "company_name"=>$petroling_data['company_name'],
                                "user_name"=>$petroling_data['first_name']." ".$petroling_data['last_name'],
                                "phone"=>$petroling_data['phone'],
                                "start_date"=>$petroling_data['start_date'],
                                "end_date"=>$petroling_data['end_date'],
                                "service_address"=>$petroling_data['service_address'],
                                "week_days"=>$petroling_data['week_days'],
                                "petrols_daily"=>$petroling_data['petrols_daily'],
                                "location"=>json_decode($petroling_data['location']),
                                "time"=>$petroling_data['time'],
                                "post_order"=>$petroling_data['post_order'],
                                "status"=>$petroling_data['status'],
                                "created_at"=>$petroling_data['created_at'],
                                    
                            ];
                            array_push($myarr_arr,$patrol);
                }
            }
         
        
            
             $standing_security = "SELECT s.`id`, s.`user_id`, s.`week_days`, s.`start_date`, s.`end_date`, s.`service_address`, s.`petrols_daily`, s.`shift_start_time`, s.`specific_post_order`, s.`location`, s.`time`, s.`post_orders`,s.status, s.`created_at`, u.business_name, u.company_name, u.first_name, u.last_name,u.phone FROM `add_standing_security` s INNER JOIN user u on u.id = s.user_id WHERE s.status = 'pending'";
             $standing_security_exec = mysqli_query($conn,$standing_security);
             $standing_security_row = mysqli_num_rows($standing_security_exec);
             if($standing_security_row > 0)
             {
                while($standing_security_data = mysqli_fetch_array($standing_security_exec))
                {
                    $security = 
                    [
                        "type"=>"Standing Security",
                        "id"=>$standing_security_data['id'],
                        "user_id"=>$standing_security_data['user_id'],
                        "business_name"=>$standing_security_data['business_name'],
                        "company_name"=>$standing_security_data['company_name'],
                        "user_name"=>$standing_security_data['first_name']." ".$standing_security_data['last_name'],
                        "phone"=>$standing_security_data['phone'],
                        "week_days"=>$standing_security_data['week_days'],
                        "start_date"=>$standing_security_data['start_date'],
                        "end_date"=>$standing_security_data['end_date'],
                        "service_address"=>$standing_security_data['service_address'],
                        "petrols_daily"=>$standing_security_data['petrols_daily'],
                        "shift_start_time"=>$standing_security_data['shift_start_time'],
                        "specific_post_order"=>$standing_security_data['specific_post_order'],
                        "location"=>json_decode($standing_security_data['location']),
                        "time"=>$standing_security_data ['time'],
                        "post_orders"=>$standing_security_data ['post_orders'],
                        "status"=>$standing_security_data ['status'],
                        "created_at"=>$standing_security_data ['created_at'],
                    ];
                    array_push($myarr_arr,$security);
                    
                }
             }
             
             
             $on_demand_request = "SELECT o.`id`, o.`user_id`, o.`name_of_location`,o.`location`, o.`additional_notes`, o.`image`, o.`video`,o.status, o.`created_at`,u.business_name,u.company_name,u.first_name,u.last_name,u.notification_token,u.phone FROM `on_demand_request` o INNER JOIN user u on u.id = o.user_id WHERE o.status = 'pending'";
             $on_demand_request_exec = mysqli_query($conn,$on_demand_request);
             $on_demand_request_row = mysqli_num_rows($on_demand_request_exec);
             if($on_demand_request_row > 0)
             {
                while($on_demand_request_data = mysqli_fetch_array($on_demand_request_exec))
                {
                                    
                    $on_demand = 
                    [
                        "type"=>"On Demand",
                        "id"=>$on_demand_request_data['id'],
                        "user_id"=>$on_demand_request_data['user_id'],
                        "business_name"=>$on_demand_request_data['business_name'],
                        "company_name"=>$on_demand_request_data['company_name'],
                        "user_name"=>$on_demand_request_data['first_name']." ".$on_demand_request_data['last_name'],
                        "phone"=>$on_demand_request_data['phone'],
                        "name_of_location"=>$on_demand_request_data['name_of_location'],
                        "location"=>json_decode($on_demand_request_data['location']),
                        "additional_notes"=>$on_demand_request_data['additional_notes'],
                        "image"=>$on_demand_request_data['image'],
                        "video"=>$on_demand_request_data['video'],
                        "status"=>$on_demand_request_data['status'],
                        "notification_token"=>$on_demand_request_data['notification_token'],
                        "created_at"=>$on_demand_request_data['created_at'],
                    ];
                    array_push($myarr_arr,$on_demand);
                                    
                }
             }
             
             
                 $data = [
                    "status"=>true,
                    "message"=>"service get successffully",
                    "data"=>$myarr_arr,
                ];
                 echo json_encode($data); 
             
             
        }
        else
        {
                $data = [
                    "status"=>true,
                    "message"=>"You have a job so you can't get new jobs",
                    "data"=>[],
                ];
                echo json_encode($data); 
        }
        
    }
    else
    {
        $data = ["status"=>false,
                "message"=>"Guard not found!"];
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