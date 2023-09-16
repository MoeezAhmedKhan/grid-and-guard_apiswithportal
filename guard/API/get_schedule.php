<?php
include('connection.php');

if($_POST['token'] == 'as23rlkjadsnlkcj23qkjnfsDKJcnzdfb3353ads54vd3favaeveavgbqaerbVEWDSC')
{
    $guard_id = $_POST['guard_id'];
    $myarr_arr = array();
    $data_arr = array();
 
    
        $shedule_patrol = "SELECT s.id,s.user_id,s.guard_id,s.type,s.created_at,u.business_name,u.company_name,u.first_name,u.last_name,u.phone,p.start_date,p.end_date,p.service_address,p.week_days,p.petrols_daily,p.location,p.time,p.post_order,p.status FROM schedule_job s INNER JOIN user u on u.id = s.user_id INNER JOIN add_petroling_service p on p.id = s.task_id WHERE s.guard_id = $guard_id";
        $patrol_execute = mysqli_query($conn,$shedule_patrol);
        $petrol_row = mysqli_num_rows($patrol_execute);
        if($petrol_row > 0)
        {
            while($petroling_data = mysqli_fetch_array($patrol_execute))
            {
                $created_at = $petroling_data['created_at'];
                $newDate = explode(" ",$created_at);
                
    	         
        	   $patrol = 
               [
                            
                    "id"=>$petroling_data['id'],
                    "user_id"=>$petroling_data['user_id'],
                    "guard_id"=>$petroling_data['guard_id'],
                    "type"=>$petroling_data['type'],
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
        
                ];
               array_push($data_arr,$patrol);
                    
    	         
            }
        }
     
         $shedule_standing = "SELECT s.id,s.user_id,s.guard_id,s.type,s.created_at,u.business_name,u.company_name,u.first_name,u.last_name,u.phone,sa.week_days,sa.start_date,sa.end_date,sa.service_address,sa.petrols_daily,sa.shift_start_time,sa.specific_post_order,sa.location,sa.time,sa.post_orders,sa.status FROM schedule_job s INNER JOIN user u on u.id = s.user_id INNER JOIN add_standing_security sa on sa.id = s.task_id WHERE s.guard_id = $guard_id";
         $standing_exec = mysqli_query($conn,$shedule_standing);
         $standing_row = mysqli_num_rows($standing_exec);
         if($standing_row > 0)
         {
            while($standing_security_data = mysqli_fetch_array($standing_exec))
            {
                $created_at = $standing_security_data['created_at'];
                $newDate = explode(" ",$created_at);
        
                $security = 
                [
                        "type"=>"Schedule Standing Security",
                        "id"=>$standing_security_data['id'],
                        "user_id"=>$standing_security_data['user_id'],
                        "guard_id"=>$standing_security_data['guard_id'],
                        "business_name"=>$standing_security_data['business_name'],
                        "company_name"=>$standing_security_data['company_name'],
                        "user_name"=>$standing_security_data['first_name']." ".$standing_security_data['last_name'],
                        "phone"=>$standing_security_data['phone'],
                        "week_days"=>json_decode($standing_security_data['week_days']),
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
                    ];
                    array_push($data_arr,$security);
                    
            }
         }
         
         
         $shedule_on_demand = "SELECT s.id,s.user_id,s.guard_id,s.type,s.created_at,u.business_name,u.company_name,u.first_name,u.last_name,u.phone,v.start_date,v.end_date,v.service_address,v.petrols_daily,v.location,v.time FROM schedule_job s INNER JOIN user u on u.id = s.user_id INNER JOIN add_vacational_petrol v on v.id = s.task_id WHERE s.guard_id = $guard_id";
         $on_demand_exec = mysqli_query($conn,$shedule_on_demand);
         $on_demand_row = mysqli_num_rows($on_demand_exec);
         if($on_demand_row > 0)
         {
            while($on_demand_request_data = mysqli_fetch_array($on_demand_exec))
            {
                $created_at = $on_demand_request_data['created_at'];
    	        $newDate = explode(" ",$created_at);

                $on_demand = 
                [
                        "id"=>$on_demand_request_data['id'],
                        "user_id"=>$on_demand_request_data['user_id'],
                        "guard_id"=>$on_demand_request_data['guard_id'],
                        "type"=>$on_demand_request_data['type'],
                        "business_name"=>$on_demand_request_data['business_name'],
                        "company_name"=>$on_demand_request_data['company_name'],
                        "user_name"=>$on_demand_request_data['first_name']." ".$on_demand_request_data['last_name'],
                        "phone"=>$on_demand_request_data['phone'],
                        "start_date"=>$on_demand_request_data['start_date'],
                        "end_date"=>json_decode($on_demand_request_data['end_date']),
                        "service_address"=>$on_demand_request_data['service_address'],
                        "petrols_daily"=>$on_demand_request_data['petrols_daily'],
                        "location"=>json_decode($on_demand_request_data['location']),
                        "time"=>$on_demand_request_data['time'],
                    ];
                array_push($data_arr,$on_demand);
                                
            }
         }
         
         
         if(!empty($data_arr))
         {
              $month_data = 
              [
                   "month"=>$newDate[0],
                   "request"=>$data_arr,
              ];
            array_push($myarr_arr,$month_data);
            $data_arr = [];
         }
         else
         {
             $myarr_arr = null;
         }
        
 
 
    $data = [
                "status"=>true,
                "message"=>"requests get successffully",
                "data"=>$myarr_arr,
            ];
    echo json_encode($data); 
    
    
    
}
 else
 {
           
       $data = ["status"=>false,
                "message"=>"access desined"];
            echo json_encode($data); 
}
    
?>