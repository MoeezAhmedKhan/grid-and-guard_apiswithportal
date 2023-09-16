<?php


if($_POST['token'] == 'as23rlkjadsnlkcj23qkjnfsDKJcnzdfb3353ads54vd3favaeveavgbqaerbVEWDSC')
{

 $guard_id = $_POST['guard_id'];  
 $location = json_encode($_POST['location']);
 $current_date = date("Y-m-d");
 require_once('connection.php');


  if (empty($guard_id))
  {
        $data = ["status"=>false,
        "message"=>"guard id is required"];
        echo json_encode($data); 
  }
  else if(empty($location))
  {
      $data = ["status"=>false,
      "message"=>"location is required"];
      echo json_encode($data); 
  }
  else
  {
      
        $check = "SELECT `id`, `user_id`, `guard_id`, `task_id`, `type`, `status`, `created_at` FROM `schedule_job` WHERE guard_id = $guard_id"; 
        $check_exec = mysqli_query($conn,$check);
        if(mysqli_num_rows($check_exec) > 0)
        {
            $myarr = array();
            
            while($chckArr = mysqli_fetch_array($check_exec))
            {
                $status = $chckArr['status'];
                $task_id = $chckArr['task_id'];
                $type = $chckArr['type']; 
                if($status == "engaged")
                {
                    if($type == "Petroling Service")
                    {
                        $select_pat = "SELECT p.id,p.user_id,p.start_date,p.end_date,p.service_address,p.week_days,p.petrols_daily,p.location,p.time,p.post_order,p.status,p.created_at,u.business_name,u.company_name,u.first_name,u.last_name FROM add_petroling_service p INNER JOIN user u on u.id = p.user_id WHERE p.id = $task_id";
                        $exec_pat = mysqli_query($conn,$select_pat);
                        if($exec_pat)
                        {
                            while($pat = mysqli_fetch_array($exec_pat))
                            {
                                $start_date = date_create($pat['start_date']);
                                $start = date_format($start_date,"Y-m-d");
                                if($current_date == $start)
                                {
                                    $tmp = 
                                    [
                                        "type"=>"Petroling Service",
                                        "id"=>$pat['id'],
                                        "user_id"=>$pat['user_id'],
                                        "business_name"=>$pat['business_name'],
                                        "company_name"=>$pat['company_name'],
                                        "first_name"=>$pat['first_name'],
                                        "last_name"=>$pat['last_name'],
                                        "start_date"=>$pat['start_date'],
                                        "end_date"=>$pat['end_date'],
                                        "service_address"=>$pat['service_address'],
                                        "week_days"=>json_decode($pat['week_days']),
                                        "petrols_daily"=>$pat['petrols_daily'],
                                        "location"=>json_decode($pat['location']),
                                        "time"=>$pat['time'],
                                        "post_order"=>$pat['post_order'],
                                        "status"=>$pat['status'],
                                        "created_at"=>$pat['created_at'],
                                    ];
                                    array_push($myarr,$tmp);
                                }
                            }
                        }
                    }
                    elseif($type == "Standing Security")
                    {
                            $select_standing = "SELECT s.`id`, s.`user_id`, s.`week_days`, s.`start_date`, s.`end_date`, s.`service_address`, s.`petrols_daily`, s.`shift_start_time`, s.`specific_post_order`, s.`location`, s.`time`, s.`post_orders`, s.`status`, s.`created_at`,u.business_name,u.company_name,u.first_name,u.last_name FROM `add_standing_security` s INNER JOIN user u on u.id = s.user_id WHERE s.id = $task_id";
                            $exec_pstanding = mysqli_query($conn,$select_standing);
                            if($exec_pstanding)
                            {
                                while($stand = mysqli_fetch_array($exec_pstanding))
                                {
                                    $start_date = date_create($pat['start_date']);
                                    $start = date_format($start_date,"Y-m-d");
                                    if($current_date == $start)
                                    {
                                        $tmp = 
                                        [
                                         "type"=>"Standing Security",
                                         "id"=>$stand['id'],
                                         "user_id"=>$stand['user_id'],
                                         "business_name"=>$pat['business_name'],
                                         "company_name"=>$pat['company_name'],
                                         "first_name"=>$pat['first_name'],
                                         "last_name"=>$pat['last_name'],
                                         "week_days"=>$stand['week_days'],
                                         "start_date"=>$stand['start_date'],
                                         "end_date"=>$stand['end_date'],
                                         "service_address"=>$stand['service_address'],
                                         "petrols_daily"=>$stand['petrols_daily'],
                                         "shift_start_time"=>$stand['shift_start_time'],
                                         "specific_post_order"=>$stand['specific_post_order'],
                                         "location"=>$stand['location'],
                                         "time"=>$stand['time'],
                                         "post_orders"=>$stand['post_orders'],
                                         "status"=>$stand['status'],
                                         "created_at"=>$stand['created_at'],
                                     ];
                                        array_push($myarr,$tmp);
                                    }
                                }
                            }
                        }
                    elseif($type == "Vacational Petrol")
                    {
                            $select_vocational = "SELECT v.`id`, v.`user_id`, v.`start_date`, v.`end_date`, v.`service_address`, v.`petrols_daily`, v.`location`, v.`time`,u.business_name,u.company_name,u.first_name,u.last_name FROM `add_vacational_petrol` v INNER JOIN user u on u.id = v.user_id WHERE v.id = $task_id";
                            $exec_vocational = mysqli_query($conn,$select_vocational);
                            if($exec_vocational)
                            {
                                 while($voca = mysqli_fetch_array($exec_vocational))
                                 {
                                     $start_date = date_create($pat['start_date']);
                                     $start = date_format($start_date,"Y-m-d");
                                     if($current_date == $start)
                                     {
                                        $tmp = 
                                        [
                                        "type"=>"Vacational Petrol",   
                                         "id"=>$voca['id'],
                                         "user_id"=>$voca['user_id'],
                                         "business_name"=>$pat['business_name'],
                                         "company_name"=>$pat['company_name'],
                                         "first_name"=>$pat['first_name'],
                                         "last_name"=>$pat['last_name'],
                                         "start_date"=>$voca['start_date'],
                                         "end_date"=>$voca['end_date'],
                                         "service_address"=>$voca['service_address'],
                                         "petrols_daily"=>$voca['petrols_daily'],
                                         "location"=>$voca['location'],
                                         "time"=>$voca['time'],
                                     ];
                                        array_push($myarr,$tmp);
                                     }
                                 }
                            }
                        }
                }
                
            }
            
             $insert_loc = "UPDATE `assign_request` SET `guard_location` = $location WHERE `guard_id` = $guard_id";
             mysqli_query($conn,$insert_loc);
            
            
             $data = ["status"=>true,
                "Response_code"=>200,
                "message"=>"location update Successfully",
                "data"=>$myarr];
            echo json_encode($data);  
            
            
        }
        else
        {
            $data = ["status"=>true,
            "Response_code"=>200,
            "message"=>"no schedule found"];
            echo json_encode($data);  
        }
        
              
              

    }
      
  
}
else
{
    
      $data = ["status"=>false,
                "Response_code"=>403,
                "message"=>"Access denied"];
      echo json_encode($data);      
      
}
