<?php
include('connection.php');

$mData = array();

if($_POST['token'] == 'as23rlkjadsnlkcj23qkjnfsDKJcnzdfb3353ads54vd3favaeveavgbqaerbVEWDSC')
{
    
    $rider_id = $_POST['rider_id'];
    $amount = $_POST['amount'];

    $sql = "INSERT INTO `withdraw_requests`(`user_id`, `amount`) 
            VALUES ('$rider_id','$amount')";
    $exec = mysqli_query($conn,$sql);
    
    if($exec){
        
        $sqltaskMembers = "SELECT `notification_token` FROM `users` WHERE `id`='$rider_id'";
        
           
                       
    $taskMembers = mysqli_query($conn,$sqltaskMembers);
    
        
    $subject =  "You have successfully requested to withdraw funds of $$amount. Let the App admin to approve your request.";
    
    $date = date('Y-m-d');
    $time = date('H:i:s');
    $sql2 = "INSERT INTO `notification`( `user_id`, `title`, `description`, `date`, `time`) 
            VALUES ('$rider_id','Withdraw Request','$subject','$date','$time')";
    $exec2 = mysqli_query($conn,$sql2);
        
    $playerId = [];
        
    while($row = mysqli_fetch_array($taskMembers))
    {
        array_push($playerId, $row['notification_token']);
    }
            
    $content = array
    (
        "en" =>$subject
    );

    $fields = array
    (
        'app_id' => "115eddf7-e4bd-4ea9-b92c-177986f0f572",
        'include_player_ids' => $playerId,
        'data' => array("foo" => "NewMassage","Id" => $idd),
        'large_icon' =>"ic_launcher_round.png",
        'contents' => $content
    );

    $fields = json_encode($fields);
               

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
    'Authorization: Basic ODU5ZDhiZjAtOWRkZS00NDIyLWI0ZWItOTYxMDc5YzQzMGIz'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);    

    $response = curl_exec($ch);
    curl_close($ch);
        
        
          $data = ["status"=>true,
            "Response_code"=>200,
            "Message"=>"You have successfully requested to withdraw funds."];
            echo json_encode($data);     
    }else{
          $data = ["status"=>true,
            "Response_code"=>203,
            "Message"=>"Something went wrong."];
            echo json_encode($data);
    }
    

}
else
{
  $data = ["status"=>false,
            "Response_code"=>403,
            "Message"=>"Access denied"];
  echo json_encode($data);          
}
  
  
  
  
 ?>