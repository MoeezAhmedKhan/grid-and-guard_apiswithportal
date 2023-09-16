<?php

require_once("../connection.php");
if($_POST['token'] == "as23rlkjadsnlkcj23qkjnfsDKJcnzdfb3353ads54vd3favaeveavgbqaerbVEWDSC")
{
    
    $post_id = $_POST['post_id'];
    $user_id = $_POST['user_id'];
    
    $delete = "DELETE FROM `add_post_service.php` WHERE id = $post_id and user_id = $user_id";
    $run = mysqli_query($conn,$delete);
    if($run)
    {
        $data = 
        [
            "status"=>true,
            "response_code"=>200,
            "message"=>"post has been deleted successfull",
        ];
        echo json_encode($data);
    }
    else
    {
        $data = 
        [
            "status"=>false,
            "response_code"=>403,
            "message"=>"something went wrong",
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
        "message"=>"access denied",
    ];
    echo json_encode($data);
}

?>