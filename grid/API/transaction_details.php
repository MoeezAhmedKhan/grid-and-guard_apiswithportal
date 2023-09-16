<?php
include('connection.php');

$mData = array();

if($_POST['token'] == 'as23rlkjadsnlkcj23qkjnfsDKJcnzdfb3353ads54vd3favaeveavgbqaerbVEWDSC')
{
    
    $user_id = $_POST["user_id"];
    $amount = $_POST["amount"];
    $transaction_id = $_POST["transaction_id"];
    
    $sql = "SELECT `id`, `user_id`, `amount`, `transaction_id` FROM `transaction` WHERE user_id = '$user_id'";
     
     $execute = mysqli_query($conn,$sql);
     if(mysqli_num_rows($execute) > 0)
     {
         
         while($row = mysqli_fetch_array($execute))
         {
             
             $temp =[
                         "user_id"=>$row['user_id'],
                          "amount"=>$row['amount'],
                           "transaction_id"=>$row['transaction_id'],
                    ];
                    
                    array_push($mData,$temp);
        
        }
            $data = ["status"=>true,
                "message"=>"user transaction details fetched successfully",
                "data"=>$mData,
                ];
            echo json_encode($data);  
       
     }
     else
     {
          $data = ["status"=>false,
            "message"=>"No data found!"];
             echo json_encode($data);   
     }
     


}
else{
  $data = ["status"=>false,
            "Response_code"=>403,
            "Message"=>"Access denied"];
  echo json_encode($data);          
}
  
  
  
  
 ?>