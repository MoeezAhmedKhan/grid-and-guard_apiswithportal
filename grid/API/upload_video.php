<?php
    $message = "";
    $status = false;
    $data = null;
    $response_code = '';
$directory = "uploads/video/";
$extension = pathinfo($_FILES['video']['name'], PATHINFO_EXTENSION);
$filename = rand()."_".date('Ymdis')."VID.".$extension;
$allowedExts = array("mp4", "wma","mov","AVI","3gp","MP4");

if(!in_array($extension, $allowedExts)){
    $message = "Invalid video type.";
    $status = false;
    $data = null;
    $response_code = 203;
}else if($_FILES["video"]["size"] > 5000000){
    $message = "video size too large.";
    $status = false;
    $data = null;
    $response_code = 203;
}else{
     if(move_uploaded_file($_FILES["video"]["tmp_name"],
      $directory . $filename)){
                $message = "video uploaded successfully.";
                $status = true;
                $data = $filename;
                $response_code = 200;
      }else{
                $message = "something went wrong.";
                $status = false;
                $data = null;
                $response_code=203;
      }
}

  $data_enc = [
            "status"=>$status,
            "Response_code"=>$response_code,
            "message"=>$message,
            "data"=>$data
          ];
        echo json_encode($data_enc);  

?>