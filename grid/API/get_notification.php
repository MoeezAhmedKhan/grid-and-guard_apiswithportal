<?php
include('connection.php');

if($_POST['token'] == 'as23rlkjadsnlkcj23qkjnfsDKJcnzdfb3353ads54vd3favaeveavgbqaerbVEWDSC')
{
    $user_id = $_POST['user_id'];

     $sql = "SELECT `id`, `user_id`, `content`, `purpose`, `created_at` FROM `notification` WHERE user_id = $user_id";
     
     $execute = mysqli_query($conn,$sql);
     if(mysqli_num_rows($execute) > 0)
     {
         $myarray = array();
         while($row = mysqli_fetch_array($execute))
         {
             
             $temp =[
                 
                        "id"=>$row['id'],
                        "user_id"=>$row['user_id'],
                         "content"=>$row['content'],
                          "purpose"=>$row['purpose'],
                          "date"=>$row['created_at'],
                        //   "created_at"=>humanTiming( strtotime($row['date'].' '.$row['time']))." ago",
                    ];
                    array_push($myarray,$temp);
        
         }
        
        $data = [
                    "status"=>true,
                    "message"=>"notification fetched successfully",
                    "data"=>$myarray,
                ];
        echo json_encode($data);  
        
     }
     else
     {
          $data = [
                      "status"=>false,
                      "message"=>"No notification found!"
                  ];
             echo json_encode($data);   
     }
     

}
else
{
      $data = [
                    "status"=>false,
                    "Response_code"=>403,
                    "Message"=>"Access denied"
              ];
      echo json_encode($data);          
}




  
//   function humanTiming ($time)
//         {

//             $time = time() - $time; // to get the time since that moment
//             $time = ($time<1)? 1 : $time;
//             $tokens = array (
//                 31536000 => 'year',
//                 2592000 => 'month',
//                 604800 => 'week',
//                 86400 => 'day',
//                 3600 => 'hour',
//                 60 => 'minute',
//                 1 => 'second',
             
//             );

//             foreach ($tokens as $unit => $text) {
//                 if ($time < $unit) continue;
//                 $numberOfUnits = floor($time / $unit);
//                 return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
//             }

//         }
  
  
 ?>