<?php


if($_POST['token'] == 'as23rlkjadsnlkcj23qkjnfsDKJcnzdfb3353ads54vd3favaeveavgbqaerbVEWDSC')
{
    require_once("connection.php");
    
    $user_email = $_POST['email']; 
    $from = 'zeshanfaisal10@gmail.com';
    $email_subject =  "New OTP Message";
    $headers = "From: ".$from;
    
    if (empty($user_email))
    {
         $data = 
         [
            "status"=>false,
            "message"=>"email is required",
        ];
        echo json_encode($data); 
    }
    else
    {
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