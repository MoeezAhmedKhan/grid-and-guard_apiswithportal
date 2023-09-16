<?php
include('connection.php');

if($_POST['token'] == 'as23rlkjadsnlkcj23qkjnfsDKJcnzdfb3353ads54vd3favaeveavgbqaerbVEWDSC')
{
    
     $user_id = $_POST["user_id"];
    
     $sql_credit = "SELECT `id`, `user_id`, `type`, `transaction_id`, `amount`, `created_at` FROM `transaction` WHERE `user_id` = $user_id AND `type` = 'credit' ORDER BY `id` DESC LIMIT 1";
     $execute_credit = mysqli_query($conn,$sql_credit);
     $sql_debit = "SELECT `id`, `user_id`, `type`, `transaction_id`, `amount`, `created_at` FROM `transaction` WHERE `user_id` = $user_id AND `type` = 'debit' ORDER BY `id` DESC LIMIT 1";
     $execute_debit = mysqli_query($conn,$sql_debit);
     if(mysqli_num_rows($execute_credit) > 0)
     {
         $select_total = "SELECT Wallaet_Balance FROM `user` WHERE id = $user_id";
         $run_total = mysqli_query($conn,$select_total);
         $total = mysqli_fetch_array($run_total);
         
         $last_debit_data = mysqli_fetch_array($execute_debit);
         $last_debit = $last_debit_data['amount'];
         
         $last_credit_data = mysqli_fetch_array($execute_credit);
         $last_credit = $last_credit_data['amount'];
         
        
      
            $data = ["status"=>true,
                    "message"=>"user transaction details fetched successfully",
                    "last_debit"=>$last_debit,
                    "last_credit"=>$last_credit,
                    "total_amount"=>$total['Wallaet_Balance'],
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
else
{
  $data = ["status"=>false,
            "Response_code"=>403,
            "Message"=>"Access denied"];
  echo json_encode($data);          
}
  
  
  
  
 ?>