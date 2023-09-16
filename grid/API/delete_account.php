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
        
            $select = "SELECT * FROM `user` WHERE id = $u_id";
            $run_select = mysqli_query($conn,$select);
            $select_rows = mysqli_num_rows($run_select);
            if($select_rows > 0)
            {
               while($ar = mysqli_fetch_array($run_select))
               {
                   $insert_delete_log = "INSERT INTO `deleted_account_log`(`role_id`, `business_name`,
                   `company_name`, `first_name`, `last_name`, `service`, `company_direct_contact_person_name`,
                   `email`, `username`, `phone`, `company_alter_phone`, `standing_service_per_hour_charge`, 
                   `per_petrol_charge`, `company_license_document`, `insurance_document`, `auto_insurance_document`,
                   `w9_Form_document`, `state_operating_license_document`, `user_agreement_document`, `password`,
                   `address`, `zipcode`, `country`, `profile`, `notification_token`, `social_id`, `status`,
                   `created_at`) VALUES ('$ar[role_id]','$ar[business_name]','$ar[company_name]','$ar[first_name]',
                   '$ar[last_name]','$ar[service]','$ar[company_direct_contact_person_name]','$ar[email]',
                   '$ar[username]','$ar[phone]','$ar[company_alter_phone]','$ar[standing_service_per_hour_charge]',
                   '$ar[per_petrol_charge]','$ar[company_license_document]','$ar[insurance_document]',
                   '$ar[auto_insurance_document]','$ar[w9_Form_document]','$ar[state_operating_license_document]',
                   '$ar[user_agreement_document]','$ar[password]','$ar[address]','$ar[zipcode]','$ar[country]',
                   '$ar[profile]','$ar[notification_token]','$ar[social_id]','$ar[status]','$ar[created_at]')";
                   $run_log = mysqli_query($conn,$insert_delete_log);
                   if($run_log)
                   {
                       $delete = "DELETE FROM `user` WHERE id = $u_id";
                       $run_delete = mysqli_query($conn,$delete);
                       if($run_delete)
                       {
                            $data = 
                            [
                                "status"=> true,
                                "response_code"=> 200,
                                "message"=> "user record deleted successfully",
                            ];
                            echo json_encode($data);
                       }
                       else
                       {
                           $data = 
                            [
                                "status"=> false,
                                "response_code"=> 404,
                                "message"=> "Something went wrong while deleting the user account!",
                            ];
                            echo json_encode($data);
                       }
                       
                   }
                   else
                   {
                        $data = 
                        [
                            "status"=> false,
                            "response_code"=> 404,
                            "message"=> "Something went wrong while creating the user account log!",
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
                        "response_code"=> 404,
                        "message"=> "user record not found",
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