<?php
include('connection.php');

if($_POST['token'] == 'as23rlkjadsnlkcj23qkjnfsDKJcnzdfb3353ads54vd3favaeveavgbqaerbVEWDSC')
{
    

    
     $latitudeFrom = $_POST["latitude"] ;
     $longitudeFrom = $_POST["longitude"];
     
     $sql_fetch_guards = "SELECT `current_location` , `id` , `first_name` , `last_name` ,`email` , `phone` , `profile`  FROM `user` WHERE `role_id` = 4 AND status = 'active'";
     $execute_fetch_guard = mysqli_query($conn,$sql_fetch_guards);
     
     if(mysqli_num_rows($execute_fetch_guard) > 0){
         
         $data = array();
         while($row = mysqli_fetch_array($execute_fetch_guard)){
     
             $DataJson = json_decode($row['current_location']);
             $latitudeTo = $DataJson->latitude;
             $longitudeTo = $DataJson->longitude;
             
             
             
          $value = haversineGreatCircleDistance($latitudeFrom,$longitudeFrom,$latitudeTo,$longitudeTo,3959);
             
             
             $temp = [
                     "user_id"=>$row['id'],
                     "first_name"=>$row['first_name'],
                     "last_name"=>$row['last_name'],
                     "email"=>$row['email'],
                     "phone"=>$row['phone'],
                     "profile"=>$row['profile'],
                     "location"=>$DataJson,
                     
                 ];
                   
              if($value < 10){
                  array_push($data,$temp);     
              }     
         }
         
         if(sizeof($data) > 0){
             $data = ["status"=>true,
            "Response_code"=>200,
            "Message"=>"Nearest guards within 10 KM radius.",
            "Data"=>$data];
            echo json_encode($data);        
         }else{
            $data = ["status"=>false,
            "Response_code"=>203,
            "Message"=>"No nearest guard found!"];
            echo json_encode($data);       
         }

         
         
     }else{
         $data = ["status"=>false,
            "Response_code"=>203,
            "Message"=>"No data found!"];
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
  
function haversineGreatCircleDistance(
  $latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $earthRadius)
{
  // convert from degrees to radians
  $latFrom = deg2rad($latitudeFrom);
  $lonFrom = deg2rad($longitudeFrom);
  $latTo = deg2rad($latitudeTo);
  $lonTo = deg2rad($longitudeTo);

  $latDelta = $latTo - $latFrom;
  $lonDelta = $lonTo - $lonFrom;

  $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
    cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
  return ($angle * $earthRadius)*1.609;
}
  
  
 ?>