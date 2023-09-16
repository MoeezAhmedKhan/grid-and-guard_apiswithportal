<?php


require_once('connection.php');
if($_POST['token'] == 'as23rlkjadsnlkcj23qkjnfsDKJcnzdfb3353ads54vd3favaeveavgbqaerbVEWDSC')
{
    $email = $_POST['email'];
    $new_pass = $_POST['new_password'];
    
    $select_user = "SELECT * FROM `user` WHERE email = '$email'";
    $run_user = mysqli_query($conn,$select_user);
    $row_user = mysqli_num_rows($run_user);
    if($row_user > 0)
    {
        $user_ar = mysqli_fetch_array($run_user);
        $user_id = $user_ar['id'];
        $update = "UPDATE `user` SET `password`= '$new_pass' WHERE id = '$user_id'";
        $run_update = mysqli_query($conn,$update);
        if($run_update)
        {
            $data = 
            [
                "status"=>true,
                "response_code"=>200,
                "message"=>"password has been updated successfull",
            ];
            echo json_encode($data);
        }
    }
    else
    {
        $data = 
        [
            "status"=>false,
            "response_code"=>403,
            "message"=>"email does'nt exist",
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
        "message"=>"Access denied"
    ];
    echo json_encode($data);          
}

?>