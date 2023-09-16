<?php
include('connection.php');

if($_POST['token'] == 'as23rlkjadsnlkcj23qkjnfsDKJcnzdfb3353ads54vd3favaeveavgbqaerbVEWDSC')
  {
       
       $guard_id = $_POST['guard_id'];
       if(!isset($_POST['guard_id'])){
         
              $data = ["status"=>false,
                "message"=>"guard_id is required"];
              echo json_encode($data); 
       }else{
           $sql = "SELECT `id` , `type` , `updated_at` , `file_url`  FROM `guard_documentation` WHERE `guard_id` = $guard_id AND type = 'glicense' OR `guard_id` = $guard_id AND type = 'StateTaxDoc' OR `guard_id` = $guard_id AND type = 'Armlicense' OR `guard_id` = $guard_id AND type = 'BatonLicense' OR `guard_id` = $guard_id AND type = 'VehicleLicense' OR `guard_id` = $guard_id AND type = 'W9' OR `guard_id` = $guard_id AND type = 'I9' OR `guard_id` = $guard_id AND type = 'DriverLicense'";
           
         
           $licenses =array(
               [ 
                   "id"=>null,
                   "type"=>"glicense",
                   "updated_at"=>"Please update the document",
                   "file_url"=>null,
                    
              ], 
              
              [ 
                   "id"=>null,
                   "type"=>"Armlicense",
                   "updated_at"=>"Please update the document",
                   "file_url"=>null,
                    
              ], 
               [ 
                   "id"=>null,
                   "type"=>"BatonLicense",
                   "updated_at"=>"Please update the document",
                   "file_url"=>null,
                    
              ], 
              
               [ 
                   "id"=>null,
                   "type"=>"VehicleLicense",
                   "updated_at"=>"Please update the document",
                   "file_url"=>null,
                    
              ], 
              
               [ 
                   "id"=>null,
                   "type"=>"W9",
                   "updated_at"=>"Please update the document",
                   "file_url"=>null,
                    
              ], 
               [ 
                   "id"=>null,
                   "type"=>"I9",
                   "updated_at"=>"Please update the document",
                   "file_url"=>null,
                    
              ], 
               [ 
                   "id"=>null,
                   "type"=>"DriverLicense",
                   "updated_at"=>"Please update the document",
                   "file_url"=>null,
                    
              ], 
               [ 
                   "id"=>null,
                   "type"=>"StateTaxDoc",
                   "updated_at"=>"Please update the document",
                   "file_url"=>null,
                    
              ]);
           $ex = mysqli_query($conn,$sql);
           if(mysqli_num_rows($ex) > 0){
               $Data = array();
               while($row = mysqli_fetch_array($ex)){
                   
                   $temp  = [
                             "id"=>$row['id'],
                             "type"=>$row['type'],
                             "updated_at"=>$row['updated_at'],
                             "file_url"=>$row['file_url'],
                            ];
                         
                   
                   if($row['type'] == 'glicense'){
                       $licenses[0] = $temp;
                   }else if($row['type'] == 'Armlicense'){
                       $licenses[1] = $temp;
                   }
                   else if($row['type'] == 'BatonLicense'){
                       $licenses[2] = $temp;
                   }
                   else if($row['type'] == 'VehicleLicense'){
                       $licenses[3] = $temp;
                   }else if($row['type'] == 'W9'){
                       $licenses[4] = $temp;
                   }else if($row['type'] == 'I9'){
                       $licenses[5] = $temp;
                   }else if($row['type'] == 'DriverLicense'){
                       $licenses[6] = $temp;
                   }else if($row['type'] == 'StateTaxDoc'){
                       $licenses[7] = $temp;
                   }
              
                   
                   
               }
             
               
             
              $data = ["status"=>true,
                    "message"=>"Data found",
                    "Data"=>$licenses,
                    ];
              echo json_encode($data); 
               
           }else{
                          
                $data = ["status"=>false,
                    "message"=>"Nothing found"];
                echo json_encode($data); 
           }


           
       }
  }

 else{
           
            $data = ["status"=>false,
                "message"=>"access desined"];
            echo json_encode($data); 
}

