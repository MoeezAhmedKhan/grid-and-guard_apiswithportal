<?php


require_once('../connection.php');
if($_POST['token'] == 'as23rlkjadsnlkcj23qkjnfsDKJcnzdfb3353ads54vd3favaeveavgbqaerbVEWDSC')
{
    $u_id = $_POST['user_id'];
    $post_id = $_POST['post_id'];
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
    
    $update = "UPDATE `add_post_service` SET `name_of_location`= '$name_of_location',`address_of_location`= '$address_of_location',
    `phone`= '$phone',`gate_code`= '$gate_code',`quite_time_rule`= '$quite_time_rule',`lock_ups`= '$lock_ups',
    `tow_company`= '$tow_company',`tow_company_phone`= '$tow_company_phone',`two_red_zone_parking_violation`= '$two_red_zone_parking_violation',
    `can_security_sign_for_permit_only_towing`= '$can_security_sign_for_permit_only_towing',`maintenance_on_call_name`= '$maintenance_on_call_name',
    `maintenance_on_phone_call`= '$maintenance_on_phone_call',`additional_notes`= '$additional_notes' WHERE `id`= '$post_id' and `user_id`= '$u_id'";
    $run = mysqli_query($conn,$update);
    if($run)
    {
        $data = 
        [
            "status"=>true,
            "response_code"=>200,
            "message"=>"post has been updated successfull",
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