<?php

 include('connection.php');

   $dataa = array('status'=>false);
   header('Access-Control-Allow-Origin: *');
   header('Content-type:application/json');	
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
      if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
      } else {
        echo "File is not an image.";
        $uploadOk = 0;
      }
    }
    
    // // Check if file already exists
    // if (file_exists($target_file)) {
    //   echo "Sorry, file already exists.";
    //   $uploadOk = 0;
    // }
    
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 50000000) {
      $dataa = array('status'=>false, "message"=>"Not Uploaded due to size!.");
    		   	        echo json_encode($dataa);
      $uploadOk = 0;
    }
    
    // Allow certain file formats
    // if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    // && $imageFileType != "gif" ) {
    //   echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    //   $uploadOk = 0;
    // }
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk != 0) {
  
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                        $dataa = array('status'=>true, "message"=>"Uploaded sucessfully.");
    		   	        echo json_encode($dataa);
      } else {
                       $dataa = array('status'=>false, "message"=>"Not Uploaded!.");
    		   	        echo json_encode($dataa);
      }
    }
?>