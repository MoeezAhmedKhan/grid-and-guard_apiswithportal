<?php

require_once("connection.php");
if($_POST['token'] == 'as23rlkjadsnlkcj23qkjnfsDKJcnzdfb3353ads54vd3favaeveavgbqaerbVEWDSC')
{
    
    $rider_id = $_POST['rider_id'];
    
    $sql = "SELECT `id`, `user_id`, `bank_name`, `iban_number`, `account_holder_name`, `created_at` FROM
            `add_bank_details` WHERE `user_id` = '$rider_id'";
    $exec = mysqli_query($conn , $sql);
    
    if(mysqli_num_rows($exec) > 0){
        $data_array = array();
        while($row = mysqli_fetch_array($exec)){
            $temp = [
                "id"=>$row['id'],
                "bank_name"=>$row['bank_name'],
                "iban_number"=>$row['iban_number'],
                "account_holder_name"=>$row['account_holder_name'],
                ];
                array_push($data_array,$temp);
        }
        
          $data = 
    [
                
        "status"=>true,
        "response_code"=>200,
        "message"=>"Banks fetched successfully.",
        "data"=>$data_array
                
    ];
    echo json_encode($data);
        
    }else{
        $data = 
    [
                
        "status"=>false,
        "response_code"=>203,
        "message"=>"Please add your bank first.",
                
    ];
    echo json_encode($data);
    }
    
}
else
{
    $data = 
    [
                
        "status"=>false,
        "response_code"=>404,
        "message"=>"acess denied",
                
    ];
    echo json_encode($data);
    
}



?>