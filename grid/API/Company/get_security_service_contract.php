<?php

require_once('../connection.php');
if($_POST['token'] == 'as23rlkjadsnlkcj23qkjnfsDKJcnzdfb3353ads54vd3favaeveavgbqaerbVEWDSC')
{
    $select = "SELECT `id`, `contract` FROM `security_service_contract`";
    $run = mysqli_query($conn,$select);
    $row = mysqli_num_rows($run);
    if($row > 0)
    {
        $ar = mysqli_fetch_array($run);
        $tmp =
        [
            "contract_id"=>$ar['id'],
            "contract"=>$ar['contract'],
        ];
        
        $data = 
        [
            "status"=>true,
            "Response_code"=>200,
            "Message"=>"security service contract found",
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
            "Message"=>"security service contract not found"
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