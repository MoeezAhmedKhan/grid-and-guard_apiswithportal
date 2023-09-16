<?php

    include('connection.php');
    
    if($_POST['token'] == 'as23rlkjadsnlkcj23qkjnfsDKJcnzdfb3353ads54vd3favaeveavgbqaerbVEWDSC')
    {
     
        $sender_id = $_POST['sender_id'];
        $reciever_id = $_POST['reciever_id'];
        $last_message = $_POST['last_message'];
        
        $query = "INSERT INTO `inbox`(`sender_id`, `reciever_id`, `last_message`) VALUES
        ('$sender_id','$reciever_id','$last_message')";
        $run = mysqli_query($conn,$query);


        if($run)
        {
            $data = ["status"=>true,
            "message"=>"inbox insert successfully!"];
            echo json_encode($data); 
        }
        else
        {
            $data = ["status"=>false,
            "message"=>"something went wrong"];
            echo json_encode($data); 
        }
            
       
        
    }
    else
    {
        $data = ["status"=>false,
        "message"=>"Access denied"];
        echo json_encode($data); 
    }

?>