<?php

if($_POST['token'] == 'as23rlkjadsnlkcj23qkjnfsDKJcnzdfb3353ads54vd3favaeveavgbqaerbVEWDSC')
{
    require_once('../connection.php');
    
    $u_id = $_POST['user_id'];
    
    $target_dir = "../Upload/"; 
    $profile_image = $_FILES['profile']['name'];
    $target_file = $target_dir . basename($profile_image);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $filewithnewname = date("Ymdis")."Company_Profile.".$imageFileType;
    
    $profile_size = $_FILES['profile']['size'];
    $profile_type = $_FILES['profile']['type'];
    $profile_tmp = $_FILES['profile']['tmp_name'];
    
    
    $select = "SELECT * FROM `user` WHERE id = $u_id and role_id = 2";
    $run_select = mysqli_query($conn,$select);
    $row_select = mysqli_num_rows($run_select);
    if($row_select > 0)
    {
        $ar = mysqli_fetch_array($run_select);
        $curent_img = $ar['profile'];
    
        if($profile_size <= 5000000) /*5 mb*/
        {
            if(strtolower($profile_type) == "image/jpg" || strtolower($profile_type) == "image/jpeg" || strtolower($profile_type) == "image/png" || strtolower($profile_type) == "image/jfif")
            {
                    if($curent_img == "")
                    {
                        $insert = "UPDATE `user` SET `profile`= '$filewithnewname' WHERE `id`= $u_id";
                        $run_insert = mysqli_query($conn,$insert);
                        if($run_insert)
                        {
                            move_uploaded_file($profile_tmp,$target_dir.$filewithnewname);
                            
                            $data =
                            [
                                "status"=>true,
                                "response_code"=>200,
                                "message"=>"image Upload Successfull",
                            ];
                            echo json_encode($data);
                        }
                        else
                        {
                            $data =
                            [
                                "status"=>false,
                                "response_code"=>403,
                                "message"=>"there was a some error while inserting image",
                            ];
                            echo json_encode($data);
                        }
                    }
                    elseif($curent_img != "")
                    {
                        $update = "UPDATE `user` SET `profile`= '$filewithnewname' WHERE `id`= $u_id";
                        $run_update = mysqli_query($conn,$update);
                        if($run_update)
                        {
                            move_uploaded_file($profile_tmp,$target_dir.$filewithnewname);
                            unlink($target_dir.$curent_img);
                            $data =
                            [
                                "status"=>true,
                                "response_code"=>200,
                                "message"=>"image updated Successfull",
                            ];
                            echo json_encode($data);
                        }
                        else
                        {
                            $data =
                            [
                                "status"=>false,
                                "response_code"=>403,
                                "message"=>"there was a some error while updating image",
                            ];
                            echo json_encode($data);
                        }
                        
                    }
            }
            else
            {
                $data =
                [
                    "status"=>false,
                    "response_code"=>403,
                    "message"=>"image should be jpeg, jpg, jfif and png",
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
                "message"=>"image size is greater then 5MB || image size should be less then or equal to 5MB",
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
            "message"=>"company does'nt exist!",
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