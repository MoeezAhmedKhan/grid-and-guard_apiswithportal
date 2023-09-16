<?php
include('connection.php');

if($_POST['token'] == 'as23rlkjadsnlkcj23qkjnfsDKJcnzdfb3353ads54vd3favaeveavgbqaerbVEWDSC')
{
    $user_id = $_POST['user_id'];
    $data_arr = array();
    $myarr_arr = array();
    // $pat_arr = array();
    // $sec_arr = array();
    // $ondemand_arr = array();
    
    $months = array("January","February","March","April","May","June","July","August","September","October","November","December");
    for($i = 0; $i < count($months); $i++)
    {
        
        $petroling_service = "SELECT a.id,a.user_id,a.guard_id,a.guard_location,a.task_id,a.type,a.status,a.end_job_date,p.id AS patrol_id,p.start_date,p.end_date,p.service_address,p.week_days,p.petrols_daily,p.location,p.time,p.post_order,p.status,p.created_at,u.business_name,u.company_name,u.first_name,u.last_name FROM accept_request a INNER JOIN add_petroling_service p on p.id = a.task_id INNER JOIN user u on a.guard_id = u.id WHERE a.user_id = $user_id and p.status = 'completed' ORDER BY p.created_at ASC";
        $petroling_execute = mysqli_query($conn,$petroling_service);
        $petrol_row = mysqli_num_rows($petroling_execute);
        if($petrol_row > 0)
        {
            while($petroling_data = mysqli_fetch_array($petroling_execute))
            {
                $created_at = $petroling_data['created_at'];
                $date=date_create($created_at);
    	        $newDate = date_format($date,"F");
    	        
    	        if($newDate == $months[$i])
    	         {
        	            $patrol = 
                        [
                            
                              "type"=>"Petroling Service",
                                "id"=>$petroling_data['id'],
                                "task_id"=>$petroling_data['task_id'],
                                "user_id"=>$petroling_data['user_id'],
                                "business_name"=>$petroling_data['business_name'],
                                "company_name"=>$petroling_data['company_name'],
                                "user_name"=>$petroling_data['first_name']." ".$petroling_data['last_name'],
                                "start_date"=>$petroling_data['start_date'],
                                "end_date"=>$petroling_data['end_date'],
                                "service_address"=>$petroling_data['service_address'],
                                "week_days"=>json_decode($petroling_data['week_days']),
                                "petrols_daily"=>$petroling_data['petrols_daily'],
                                "location"=>json_decode($petroling_data['location']),
                                "time"=>$petroling_data['time'],
                                "post_order"=>$petroling_data['post_order'],
                                "status"=>$petroling_data['status'],
                                "created_at" => $petroling_data['created_at'],
        
                        ];
                        array_push($data_arr,$patrol);
                    
                        // $month_data = 
                        // [
                        //     "month"=>$newDate,
                        //     "request"=>$pat_arr,
                        // ];
                        // array_push($myarr_arr,$month_data);
                        // $patrol =[];
                        
    	         }
    	         
                    
                    
            }
        }

         $standing_security = "SELECT a.id,a.user_id,a.guard_id,a.guard_location,a.task_id,a.type,a.status,a.end_job_date,s.id AS standing_id,s.week_days,s.start_date,s.end_date,s.service_address,s.petrols_daily,s.shift_start_time,s.specific_post_order,s.location,s.time,s.post_orders,s.status,s.created_at,u.business_name,u.company_name,u.first_name,u.last_name FROM accept_request a INNER JOIN add_standing_security s on s.id = a.task_id INNER JOIN user u on a.guard_id = u.id WHERE a.user_id = $user_id and s.status = 'completed' ORDER BY s.created_at ASC";
         $standing_security_exec = mysqli_query($conn,$standing_security);
         $standing_security_row = mysqli_num_rows($standing_security_exec);
         if($standing_security_row > 0)
         {
            while($standing_security_data = mysqli_fetch_array($standing_security_exec))
            {
                $created_at = $standing_security_data['created_at'];
                 $date=date_create($created_at);
    	         $newDate = date_format($date,"F");
    	         
    	         if($newDate == $months[$i])
    	         {
        
                    $security = 
                    [
                        "type"=>"Standing Security",
                        "id"=>$standing_security_data['id'],
                        "task_id"=>$standing_security_data['task_id'],
                            "amount"=>$standing_security_data['actual_amount'],
                            "start_date"=>$standing_security_data['created_at'],
                            "end_job_date"=>$standing_security_data['end_job_date'],
                        "user_id"=>$standing_security_data['user_id'],
                        "business_name"=>$standing_security_data['business_name'],
                        "company_name"=>$standing_security_data['company_name'],
                        "user_name"=>$standing_security_data['first_name']." ".$standing_security_data['last_name'],
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
                         "created_at" => $standing_security_data['created_at']
                    ];
                    array_push($data_arr,$security);
                    
                    //  $month_data = [
                    //             "month"=>$newDate,
                    //             "request"=>$sec_arr,
                    //         ];
                    // array_push($myarr_arr,$month_data);
                    // $security =[];
                    
    	         }
                    
    	        
                    
            }
         }
         

         $on_demand_request = "SELECT a.id,a.user_id,a.guard_id,a.guard_location,a.task_id,a.type,a.status,a.end_job_date,d.id AS on_demand_id, d.name_of_location,d.location,d.additional_notes,d.image,d.video,d.amount,d.status,d.created_at,u.business_name,u.company_name,u.first_name,u.last_name FROM accept_request a INNER JOIN on_demand_request d on d.id = a.task_id INNER JOIN user u on u.id = a.guard_id WHERE a.user_id = $user_id AND d.status = 'completed' ORDER BY d.created_at ASC";
         $on_demand_request_exec = mysqli_query($conn,$on_demand_request);
         $on_demand_request_row = mysqli_num_rows($on_demand_request_exec);
         if($on_demand_request_row > 0)
         {
             
            while($on_demand_request_data = mysqli_fetch_array($on_demand_request_exec))
            {
                $created_at = $on_demand_request_data['created_at'];
                 $date=date_create($created_at);
    	         $newDate = date_format($date,"F");
    	         
    	         if($newDate == $months[$i])
    	         {
    	        
                    $on_demand = 
                    [
                        "type"=>"On Demand",
                        "id"=>$on_demand_request_data['id'],
                        "task_id"=>$on_demand_request_data['on_demand_id'],
                        "user_id"=>$on_demand_request_data['user_id'],
                        "guard_id"=>$on_demand_request_data['guard_id'],
                        "business_name"=>$on_demand_request_data['business_name'],
                        "company_name"=>$on_demand_request_data['company_name'],
                        "user_name"=>$on_demand_request_data['first_name']." ".$on_demand_request_data['last_name'],
                        "name_of_location"=>$on_demand_request_data['name_of_location'],
                        "location"=>json_decode($on_demand_request_data['location']),
                        "additional_notes"=>$on_demand_request_data['additional_notes'],
                        "image"=>$on_demand_request_data['image'],
                        "video"=>$on_demand_request_data['video'],
                        "discounted_price"=>$on_demand_request_data['discounted_price'],
                        "amount"=>$on_demand_request_data['amount'],
                        "status"=>$on_demand_request_data['status'],
                         "created_at" => $on_demand_request_data['created_at']
                    ];
                    array_push($data_arr,$on_demand);
                    
                    
    	         }
    	        
                                
            }
         }
        
        
        
         
         
    }
         
          $month_data = [
                            "month"=>$newDate,
                            "request"=>$data_arr,
                        ];
        array_push($myarr_arr,$month_data);
        $data_arr = [];
        
 
 
    $data = [
                "status"=>true,
                "message"=>"completed requests get successffully",
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