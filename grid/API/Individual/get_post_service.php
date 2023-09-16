<?php

require_once('../connection.php');
if($_POST['token'] == 'as23rlkjadsnlkcj23qkjnfsDKJcnzdfb3353ads54vd3favaeveavgbqaerbVEWDSC')
{
    $user_id = $_POST['user_id'];
    $select = "SELECT * FROM `add_post_service` WHERE user_id = $user_id";
    $run = mysqli_query($conn,$select);
    $row = mysqli_num_rows($run);
    if($row > 0)
    {
        while($ar = mysqli_fetch_array($run))
        {
            $tmp =
            [
                "id"=>$ar['id'],
                "user_id"=>$ar['user_id'],
                "name_of_location"=>$ar['name_of_location'],
                "address_of_location"=>$ar['address_of_location'],
                "phone"=>$ar['phone'],
                "gate_code"=>$ar['gate_code'],
                "quite_time_rule"=>$ar['quite_time_rule'],
                "lock_ups"=>$ar['lock_ups'],
                "tow_company"=>$ar['tow_company'],
                "tow_company_phone"=>$ar['tow_company_phone'],
                "two_red_zone_parking_violation"=>$ar['two_red_zone_parking_violation'],
                "can_security_sign_for_permit_only_towing"=>$ar['can_security_sign_for_permit_only_towing'],
                "maintenance_on_call_name"=>$ar['maintenance_on_call_name'],
                "maintenance_on_phone_call"=>$ar['maintenance_on_phone_call'],
                "additional_notes"=>$ar['additional_notes'],
                "created_at"=>$ar['created_at'],
            ];
        }
        
        $data = 
        [
            "status"=>true,
            "Response_code"=>200,
            "Message"=>"post service found successfully",
            "data"=>$tmp
        ];
        echo json_encode($data);
    }
    else
    {
        $data = 
        [
            "status"=>false,
            "Response_code"=>403,
            "Message"=>"post service not found"
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