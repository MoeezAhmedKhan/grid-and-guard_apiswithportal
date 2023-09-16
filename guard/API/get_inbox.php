<?php

    if($_POST['token'] == 'as23rlkjadsnlkcj23qkjnfsDKJcnzdfb3353ads54vd3favaeveavgbqaerbVEWDSC')
    {
        require_once("connection.php");
        
        $guard_id = $_POST['guard_id'];
        
        if(empty($guard_id))
        {
            $data = 
            [
                "status" => false,
                "message" => "guard_id is required"
            ];
            echo json_encode($data);
        }
        else
        {
            $select = "SELECT r.id,r.user_id,r.guard_id,r.task_id,r.type,r.status,u.first_name,u.last_name,u.business_name,u.company_name,u.profile FROM accept_request r INNER JOIN user u on u.id = r.user_id WHERE r.guard_id = $guard_id and r.status = 'engaged'  || r.guard_id = $guard_id and r.status = 'inprogress'";
            $run_select = mysqli_query($conn,$select);
            $select_rows = mysqli_num_rows($run_select);
            if($select_rows > 0)
            {
                $myarr = array();
                
                while($ar = mysqli_fetch_array($run_select))
                {
                    $temp = 
                    [
                        "guard_id"=>$ar['guard_id'],
                        "user_id"=>$ar['user_id'],
                        "task_id"=>$ar['task_id'],
                        "type"=>$ar['type'],
                        "status"=>$ar['status'],
                        "user_name"=>$ar['first_name']." ".$ar['last_name'],
                        "business_name"=>$ar['business_name'],
                        "company_name"=>$ar['company_name'],
                        "profile"=>$ar['profile'],
                        "message"=>"The User is Connected",
                    ];
                    array_push($myarr,$temp);
                    
                }
                
                    $data = 
                    [
                        "status"=> true,
                        "response_code"=> 200,
                        "message"=> "user fetched successfully",
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
        
        
    }
    else
    {
        $data =
        [
            "status"=> false,
            "response_code"=>403,
            "message"=> "access denied",
        ];
        echo json_encode($data);
    }


?>