<?php 


if($_POST['token'] == 'as23rlkjadsnlkcj23qkjnfsDKJcnzdfb3353ads54vd3favaeveavgbqaerbVEWDSC'){

function compressImage($source, $destination, $quality) 
{ 
    // Get image info 
    $imgInfo = getimagesize($source); 
    $mime = $imgInfo['mime']; 
     
    // Create a new image from file 
    switch($mime){ 
        case 'image/jpeg': 
            $image = imagecreatefromjpeg($source); 
            break; 
        case 'image/png': 
            $image = imagecreatefrompng($source); 
            break; 
        case 'image/gif': 
            $image = imagecreatefromgif($source); 
            break; 
        default: 
            $image = imagecreatefromjpeg($source); 
    } 
     
    // Save image 
    imagejpeg($image, $destination, $quality); 
     
    // Return compressed image 
    $file_namez = explode("/",$destination);
    return $file_namez[1]; 
} 
 
 
// File upload path 
$uploadPath = "uploads/"; 
 
// If file upload form is submitted 
$image_name = '';
$status = $response_code = $statusMsg = ''; 
    $status = false; 
    if(!empty($_FILES["image"]["name"])) { 
        // File info 
        $file_extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION); 
        $fileName = rand().date('Ymdis')."IMG.".$file_extension; 
        $imageUploadPath = $uploadPath . $fileName; 
        $fileType = pathinfo($imageUploadPath, PATHINFO_EXTENSION); 
         
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif','webp','svg','ico'); 
        if(in_array($fileType, $allowTypes)){ 
            // Image temp source 
            $imageTemp = $_FILES["image"]["tmp_name"]; 
            $imageSize = $_FILES["image"]["size"];
             
            // Compress size and upload image 
            $compressedImage = compressImage($imageTemp, $imageUploadPath, 75); 
             
            if($compressedImage){ 
                $compressedImageSize = filesize($compressedImage);

                $status = true; 
                 $statusMsg = "Image compressed successfully.";
                 $response_code = 200;
            }else{ 
                $statusMsg = "Image compress failed!"; 
                $status = false; 
                $response_code = 203;
            } 
        }else{ 
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.';
            $status = false; 
            $response_code = 203;
        } 
    }else{ 
        $statusMsg = 'Please select an image file to upload.';
        $status = false; 
        $response_code = 203;
    } 
    
  $data = [
            "status"=>$status,
            "Response_code"=>$response_code,
            "message"=>$statusMsg,
            "data"=>$compressedImage
          ];
        echo json_encode($data);  
  
  
}else{
  $data = ["status"=>false,
            "Response_code"=>403,
            "Message"=>"Access denied"];
  echo json_encode($data);          
}

?>