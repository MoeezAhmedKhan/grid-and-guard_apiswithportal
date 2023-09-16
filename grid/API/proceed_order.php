<?php


if($_POST['token'] == 'as23rlkjadsnlkcj23qkjnfsDKJcnzdfb3353ads54vd3favaeveavgbqaerbVEWDSC')
{
    include('connection.php');
    $drop = $_POST["drop_location"];
    $menu_item  = $_POST['menu_item'];
    $u_id = $_POST['user_id'];
    
    $insert_task = "INSERT INTO `task`(`user_id`, `dropoff_location`) VALUES ('$u_id','$drop')";
    $run_task = mysqli_query($conn,$insert_task);
    $last_id = $conn->insert_id;
    $data= json_decode($menu_item);
 
    foreach($data as $item)
    {
        $menu_item_id =  $item->menu_item_id;
        $title =  $item->title;
        $name =  $item->name;
        $desc =  $item->description;
        $pickup_location =  $item->pickup_location;
        $estimate_amount =  $item->estimated_cost;
    
        //   print_r($menu_item_id);
       
        $insert = "INSERT INTO `task_details`(`task_id`, `title`, `name`, `description`, `estimated_cost`,`pickup_location`,`menu_item_id`) 
        VALUES ('$last_id','$title','$name','$desc','$estimate_amount','$pickup_location','$menu_item_id')";
        $run_insert = mysqli_query($conn,$insert);
        
    }
    
    // $user = "SELECT `id`, `first_name`, `last_name`, `phone`, `email`, `password`, `img`, `address`, `city`, `state`, `zipcode`, `status`, `role_id`, `social_id`, `notification_token`, `Wallaet_Balance`, `created_at` FROM `users` WHERE ";
    // $run_user = mysqli_query($conn,$user)
    
    if($run_insert)
    {
        
        
           $sqltaskMembers = "SELECT u.id,u.notification_token FROM `users` u INNER JOIN `rider_status` r  ON r.rider_id = u.id WHERE u.role_id = 2 AND r.status = 'idle'";
        
            $subject = '';
                       
    $taskMembers = mysqli_query($conn,$sqltaskMembers);
        
    $sqlother = "SELECT `id`, `first_name`, `last_name`, `phone`, `email`, `password`, `img`,
        `address`, `city`, `state`, `zipcode`, `status`, `role_id`, `social_id`, `notification_token`,
        `Wallaet_Balance`, `created_at` FROM `users` WHERE `id` = '$u_id'";        
    $exec_other = mysqli_query($conn,$sqlother);   
    $other = mysqli_fetch_array($exec_other);
    $subject =  $other['first_name']." ".$other['last_name'];
        
    $playerId = [];
        
    while($row = mysqli_fetch_array($taskMembers))
    {
        array_push($playerId, $row['notification_token']);
    }
            
    $content = array
    (
        "en" => 'New Job from '.$subject.''
    );

    $fields = array
    (
        'app_id' => "115eddf7-e4bd-4ea9-b92c-177986f0f572",
        'include_player_ids' => $playerId,
        'data' => array("foo" => "NewMassage","type"=>"GetTask"),
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
                "message"=>"your order has been placed"];
                echo json_encode($data); 
    }
    else
    {
        $data = ["status"=>false,
        "message"=>"failed!"];
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



