<?php


require_once('../connection.php');
if($_POST['token'] == 'as23rlkjadsnlkcj23qkjnfsDKJcnzdfb3353ads54vd3favaeveavgbqaerbVEWDSC')
{
    $u_id = $_POST['user_id'];
    $name_of_location = $_POST['name_of_location'];
    $address_of_location = $_POST['address_of_location'];
    $phone = $_POST['phone'];
    $gate_code = $_POST['gate_code'];
    $quite_time_rule = $_POST['quite_time_rule'];
    $lock_ups = $_POST['lock_ups'];
    $tow_company = $_POST['tow_company'];
    $tow_company_phone = $_POST['tow_company_phone'];
    $two_red_zone_parking_violation = $_POST['two_red_zone_parking_violation'];
    $can_security_sign_for_permit_only_towing = $_POST['can_security_sign_for_permit_only_towing'];
    $maintenance_on_call_name = $_POST['maintenance_on_call_name'];
    $maintenance_on_phone_call = $_POST['maintenance_on_phone_call'];
    $additional_notes = $_POST['additional_notes'];
    
    $insert = "INSERT INTO `add_post_service`(`user_id`, `name_of_location`, `address_of_location`,
    `phone`, `gate_code`, `quite_time_rule`, `lock_ups`, `tow_company`, `tow_company_phone`,
    `two_red_zone_parking_violation`, `can_security_sign_for_permit_only_towing`, 
    `maintenance_on_call_name`, `maintenance_on_phone_call`, `additional_notes`) 
    VALUES ('$u_id','$name_of_location','$address_of_location','$phone','$gate_code','$quite_time_rule',
    '$lock_ups','$tow_company','$tow_company_phone','$two_red_zone_parking_violation',
    '$can_security_sign_for_permit_only_towing','$maintenance_on_call_name','$maintenance_on_phone_call',
    '$additional_notes')";
    $run = mysqli_query($conn,$insert);
    if($run)
    {
        $data = 
        [
            "status"=>true,
            "response_code"=>200,
            "message"=>"post has been inserted successfull",
        ];
        echo json_encode($data);
    }
    else
    {
        $data = 
        [
            "status"=>false,
            "response_code"=>403,
            "message"=>"there was a some error",
        ];
        echo json_encode($data);
    }
    
}
else
{
    $data = 
    [
        "status"=>false,
        "Response_code"=>404,
        "Message"=>"Access denied"
    ];
    echo json_encode($data);          
}


?>