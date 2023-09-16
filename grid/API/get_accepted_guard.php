<?php

    if($_POST['token'] == 'as23rlkjadsnlkcj23qkjnfsDKJcnzdfb3353ads54vd3favaeveavgbqaerbVEWDSC')
    {
        require_once("connection.php");
        
        $u_id = $_POST['user_id'];
        
        if(empty($u_id))
        {
            $data = 
            [
                "status" => false,
                "message" => "userid is required"
            ];
            echo json_encode($data);
        }
        else
        {
            $myarr = array();
        
            $select = "SELECT r.id,r.user_id,r.guard_id,r.task_id,r.type,r.status,u.first_name,u.last_name,u.profile FROM accept_request r INNER JOIN user u on u.id = r.guard_id WHERE r.user_id = $u_id AND r.status = 'inprogress'";
            $run_select = mysqli_query($conn,$select);
            $select_rows = mysqli_num_rows($run_select);
            if($select_rows > 0)
            {
                while($ar = mysqli_fetch_array($run_select)){
                    
                      $temp = 
                    [
                        "user_id"=>$ar['user_id'],
                        "guard_id"=>$ar['guard_id'],
                        "task_id"=>$ar['task_id'],
                        "type"=>$ar['type'],
                        "status"=>$ar['status'],
                        "guard_name"=>$ar['first_name']." ".$ar['last_name'],
                        "profile"=>$ar['profile'],
                        "message"=>"The Guard is Connected",
                    ];
                 array_push($myarr,$temp);
                    
                    
                }
              
                    
            }
            
        
            
            
             $data = 
                [
                    "status"=> true,
                    "response_code"=> 200,
                    "message"=> "guard fetched successfully",
                    "data"=>$myarr,
                ];
                echo json_encode($data);
            
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