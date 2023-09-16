<?php
include('connection.php');

if($_POST['token'] == 'as23rlkjadsnlkcj23qkjnfsDKJcnzdfb3353ads54vd3favaeveavgbqaerbVEWDSC')
{
    $guard_id = $_POST['guard_id'];
    $myarr_arr = array();
    $data_arr = array();
    // $pat_arr = array();
    // $sec_arr = array();
    // $ondemand_arr = array();
 
    
        $petroling_service = "SELECT * FROM accept_request a INNER JOIN add_petroling_service p on p.id = a.task_id INNER JOIN user u on a.user_id = u.id WHERE a.guard_id = $guard_id and p.status = 'completed' ORDER BY p.created_at ASC";
        $petroling_execute = mysqli_query($conn,$petroling_service);
        $petrol_row = mysqli_num_rows($petroling_execute);
        if($petrol_row > 0)
        {
            while($petroling_data = mysqli_fetch_array($petroling_execute))
            {
                $created_at = $petroling_data['created_at'];
                $newDate = explode(" ",$created_at);
                
    	         
        	   $patrol = 
              [
                            
                              "type"=>"Petroling Service",
                                "id"=>$petroling_data['id'],
                                "task_id"=>$petroling_data['task_id'],
                            "amount"=>$petroling_data['actual_amount'],
                            "start_date"=>$petroling_data['created_at'],
                            "end_job_date"=>$petroling_data['end_date'],
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
        
                        ];
              array_push($data_arr,$patrol);
                    
              // $month_data = 
              // [
              //     "month"=>$newDate[0],
              //     "request"=>$pat_arr,
              // ];
              // array_push($myarr_arr,$month_data);
              // $pat_arr =[];
    	         
                    
                    
            }
        }
     
         $standing_security = "SELECT * FROM accept_request a INNER JOIN add_standing_security s on s.id = a.task_id INNER JOIN user u on a.user_id = u.id WHERE a.guard_id = $guard_id and s.status = 'completed' ORDER BY s.created_at ASC";
         $standing_security_exec = mysqli_query($conn,$standing_security);
         $standing_security_row = mysqli_num_rows($standing_security_exec);
         if($standing_security_row > 0)
         {
            while($standing_security_data = mysqli_fetch_array($standing_security_exec))
            {
                $created_at = $standing_security_data['created_at'];
                $newDate = explode(" ",$created_at);
        
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
                    ];
                array_push($data_arr,$security);
                    
                //  $month_data = [
                //             "month"=>$newDate[0],
                //             "request"=>$sec_arr,
                //         ];
                // array_push($myarr_arr,$month_data);
                // $sec_arr =[];
                    
    	        
                    
            }
         }
         
         
         $on_demand_request = "SELECT * FROM accept_request a INNER JOIN on_demand_request d on d.id = a.task_id INNER JOIN user u on a.user_id = u.id WHERE a.guard_id = $guard_id and d.status = 'completed' ORDER BY d.created_at ASC";
         $on_demand_request_exec = mysqli_query($conn,$on_demand_request);
         $on_demand_request_row = mysqli_num_rows($on_demand_request_exec);
         if($on_demand_request_row > 0)
         {
            while($on_demand_request_data = mysqli_fetch_array($on_demand_request_exec))
            {
                $created_at = $on_demand_request_data['created_at'];
    	        $newDate = explode(" ",$created_at);

    	        
                $on_demand = 
                [
                        "type"=>$on_demand_request_data['type'],
                        "id"=>$on_demand_request_data['id'],
                        "task_id"=>$on_demand_request_data['task_id'],
                        "amount"=>$on_demand_request_data['amount'],
                        "start_date"=>$on_demand_request_data['created_at'],
                        "end_job_date"=>$on_demand_request_data['end_job_date'],
                        "user_id"=>$on_demand_request_data['user_id'],
                        "business_name"=>$on_demand_request_data['business_name'],
                        "company_name"=>$on_demand_request_data['company_name'],
                        "user_name"=>$on_demand_request_data['first_name']." ".$on_demand_request_data['last_name'],
                        "name_of_location"=>$on_demand_request_data['name_of_location'],
                        "location"=>json_decode($on_demand_request_data['location']),
                        "additional_notes"=>$on_demand_request_data['additional_notes'],
                        "image"=>$on_demand_request_data['image'],
                        "video"=>$on_demand_request_data['video'],
                        "status"=>$on_demand_request_data['status'],
                    ];
                array_push($data_arr,$on_demand);
                    
                // $month_data = [
                //             "month"=>$newDate[0],
                //             "request"=>$ondemand_arr,
                //         ];
                // array_push($myarr_arr,$month_data);
                // $ondemand_arr =[];
    	        
                                
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