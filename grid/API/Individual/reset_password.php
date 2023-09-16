<?php


require_once('../connection.php');
if($_POST['token'] == 'as23rlkjadsnlkcj23qkjnfsDKJcnzdfb3353ads54vd3favaeveavgbqaerbVEWDSC')
{
    $user_id = $_POST['user_id'];
    $current_pass = $_POST['current'];
    $new_pass = $_POST['new_password'];
    
    $select_user = "SELECT * FROM `user` WHERE id = '$user_id' and role_id = 1";
    $run_user = mysqli_query($conn,$select_user);
    $row_user = mysqli_num_rows($run_user);
    if($row_user > 0)
    {
        $user_ar = mysqli_fetch_array($run_user);
        $act_user_id = $user_ar['id'];
        $c_pass = $user_ar['password'];
        if($c_pass == $current_pass)
        {
            $update = "UPDATE `user` SET `password`= '$new_pass' WHERE id = '$act_user_id'";
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
                    "message"=>"current password is invalid",
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
            "message"=>"user does'nt exist",
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