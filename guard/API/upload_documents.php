<?php
include('connection.php');

if($_POST['token'] == 'as23rlkjadsnlkcj23qkjnfsDKJcnzdfb3353ads54vd3favaeveavgbqaerbVEWDSC')
{
    $target_dir = "Upload/"; 
    $guard_id = $_POST['guard_id'];
    $type = $_POST['type'];
    
    // file1
    $file_URL = $_FILES['file_URL']['name'];
    $target_doc1 = $target_dir . basename($file_URL);
    $docFileType1 = strtolower(pathinfo($target_doc1,PATHINFO_EXTENSION));
    $filewithnewname1 = date("Ymdis")."Guard_License.".$docFileType1;
    
    $doc_size1 = $_FILES['file_URL']['size'];
    $doc_type1 = $_FILES['file_URL']['type'];
    $doc_tmp1 = $_FILES['file_URL']['tmp_name'];
    
    //types are "glicense" , "Armlicense" , "BatonLicense" , "VehicleLicense" , "W9" , "I9" , "DriverLicense" , "StateTaxDoc"	
 
    if($type == "glicense" || $type == "Armlicense" || $type == "BatonLicense" || $type == "VehicleLicense" || $type == "W9" || $type == "I9" || $type == "DriverLicense"  || $type == 'StateTaxDoc')
    {
        $check_if_dataisin_db = "SELECT  `file_url` FROM `guard_documentation` WHERE `guard_id` = $guard_id AND `type` ='$type'";
        $execute = mysqli_query($conn,$check_if_dataisin_db);
        
        
        if(mysqli_num_rows($execute) > 0){
            
             $duard_doc = mysqli_fetch_array($execute);
             $curent_doc = $duard_doc['file_url'];
             if($doc_size1 <= 5000000) /*5 mb*/
                {
                    if(strtolower($doc_type1) == "image/jpg" || strtolower($doc_type1) == "image/jpeg" || strtolower($doc_type1) == "image/png" || strtolower($doc_type1) == "application/pdf")
                    {      
                        
                        $updatedat = date("Y-m-d h:i:s");
                        if(move_uploaded_file($doc_tmp1,$target_dir.$curent_doc)){
                            $insert = "UPDATE `guard_documentation` SET `updated_at` = '$updatedat' WHERE `guard_id`= $guard_id AND `type` ='$type'";
                            $run_insert = mysqli_query($conn,$insert);
                            if($run_insert)
                            {
                                        
                                $temp = [
                                            "guard_id"=>$guard_id,
                                            "path"=>$curent_doc,
                                                    
                                        ];
                                        $data = ["status"=>true,
                                                "message"=>"document updated successfully.",
                                                "data"=>$temp];
                                        echo json_encode($data);
                                                        
                            }
                            else
                            {
                                $data =
                                [
                                    "status"=>false,
                                    "response_code"=>403,
                                    "message"=>"there was a some error while inserting document",
                                ];
                                echo json_encode($data);
                            }
                        }else{
                           
                             $data =
                                [
                                    "status"=>false,
                                    "response_code"=>403,
                                    "message"=>"there was a some error while uploading document",
                                ];
                                echo json_encode($data);
                        }
                        
                            
                                            
                    }
                    else
                    {
                        $data =
                        [
                            "status"=>false,
                            "response_code"=>403,
                            "message"=>"file should be jpeg, jpg, png and Pdf",
                        ];
                        echo json_encode($data);
                    }
                }
              else
              {
                    $data =
                    [
                        "status"=>false,
                        "response_code"=>403,
                        "message"=>"file size is greater then 5MB || file size should be less then or equal to 5MB",
                    ];
                    echo json_encode($data);
              }
            
        }else{
            if($doc_size1 <= 5000000) /*5 mb*/
                {
                    if(strtolower($doc_type1) == "image/jpg" || strtolower($doc_type1) == "image/jpeg" || strtolower($doc_type1) == "image/png" || strtolower($doc_type1) == "application/pdf")
                    {   
                        $path = $guard_id."_".$type.date("Ymdhis").".".$docFileType1;
                        
                        
                        
                        if(move_uploaded_file($doc_tmp1,$target_dir.$path)){
                            $insert = "INSERT INTO `guard_documentation`(`guard_id`, `type`, `file_url`) VALUES ($guard_id,'$type','$path')";
                            $run_insert = mysqli_query($conn,$insert);
                            if($run_insert)
                            {
                                        
                                $temp = [
                                            "guard_id"=>$guard_id,
                                            "path"=>$target_dir.$path,
                                                    
                                        ];
                                        $data = ["status"=>true,
                                                "message"=>"document insert successfully.",
                                                "data"=>$temp];
                                        echo json_encode($data);
                                                        
                            }
                            else
                            {
                                $data =
                                [
                                    "status"=>false,
                                    "response_code"=>403,
                                    "message"=>"there was a some error while inserting document",
                                ];
                                echo json_encode($data);
                            }
                        }else{
                           
                             $data =
                                [
                                    "status"=>false,
                                    "response_code"=>403,
                                    "message"=>"there was a some error while uploading document",
                                ];
                                echo json_encode($data);
                        }
                        
                            
                                            
                    }
                    else
                    {
                        $data =
                        [
                            "status"=>false,
                            "response_code"=>403,
                            "message"=>"file should be jpeg, jpg, png and Pdf",
                        ];
                        echo json_encode($data);
                    }
                }
              else
              {
                    $data =
                    [
                        "status"=>false,
                        "response_code"=>403,
                        "message"=>"file size is greater then 5MB || file size should be less then or equal to 5MB",
                    ];
                    echo json_encode($data);
              }
            
            
        }
        
        
               
       
        
        die();
    }else{
                 $data =
                    [
                        "status"=>false,
                        "response_code"=>403,
                        "message"=>'types are "glicense" , "Armlicense" , "BatonLicense" , "VehicleLicense" , "W9" , "I9" , "DriverLicense" , "StateTaxDoc"',
                    ];
                    echo json_encode($data);
    }

    
}
else
{
    $data = ["status"=>false,
            "message"=>"access desined"];
    echo json_encode($data); 
}
    
?>