<?php


require_once('connection.php');
if($_POST['token'] == 'as23rlkjadsnlkcj23qkjnfsDKJcnzdfb3353ads54vd3favaeveavgbqaerbVEWDSC')
{
    $email = $_POST['email'];
    
    $from = 'zeshanfaisal10@gmail.com';
    $email_subject =  "FORGOT PASSWORD";
    $headers = "From: ".$from;
    
    $select_user = "SELECT * FROM `user` WHERE email = '$email'";
    $run_user = mysqli_query($conn,$select_user);
    $row_user = mysqli_num_rows($run_user);
    if($row_user > 0)
    {
            $user_ar = mysqli_fetch_array($run_user);
            $user_email = $user_ar['email'];
            
            $digits = 4;
            $OTP = rand(pow(10, $digits-1), pow(10, $digits)-1);
            $email_txt = "Your OTP code for Grid App is ".$OTP."";
            mail($user_email, $email_subject, $email_txt, $headers);
            
             $data = 
            [
                "OTP"=>$OTP,
            ];
            $temp = 
            [
                "status"=>true,
                "data"=>$data,
                "message"=>"your OTP has been sent to your email address",
            ];
          echo json_encode($temp);
        
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