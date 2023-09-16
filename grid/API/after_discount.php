<?php

    if($_POST['token'] == 'as23rlkjadsnlkcj23qkjnfsDKJcnzdfb3353ads54vd3favaeveavgbqaerbVEWDSC')
    {
        require_once("connection.php");
        
        $promo_code = $_POST['promo_code'];
        $provider_company = $_POST['provider_company'];
        $current_date_time = $_POST['current_date_time'];
        
         if(!isset($_POST['promo_code'])){
         
              $data = ["status"=>false,
                "message"=>"promo_code is required"];
              echo json_encode($data); 
         
         }else if(!isset($_POST['provider_company'])){
              $data = ["status"=>false,
                  "message"=>"provider_company is required"];
                  echo json_encode($data); 
                  
         }else if(!isset($_POST['current_date_time'])){
              $data = ["status"=>false,
                  "message"=>"current_date_time is required"];
                  echo json_encode($data); 
         }else{
             
             
              
            $select_promo = "SELECT `id`, `vendor_id` , `promo_code`, `percentage`, `created_at` FROM `promo` WHERE promo_code = '$promo_code' AND `start_date_time` <= '$current_date_time' AND `end_date_time` >= '$current_date_time'";
            $run_promo = mysqli_query($conn,$select_promo);
            $promo_rows = mysqli_num_rows($run_promo);
            if($promo_rows > 0)
            {
                $Data = mysqli_fetch_array($run_promo);
                $vendor_id = $Data['vendor_id'];
                $discount_percent = $Data['percentage'];
                $id = $Data['id'];
                $temp = [
                         "promo_id"=>$id,
                         "vendor_id"=>$vendor_id,
                         "discount_percent"=>$discount_percent,
                    
                    ];
                if($vendor_id == $provider_company){
                    
                    $data = 
                    [
                        "status"=> true,
                        "response_code"=> 200,
                        "message"=> "Found promocode",
                        "Data"=>$temp
                    ];
                    echo json_encode($data);
                    
                }else if ($vendor_id == 75){
                    $data = 
                    [
                        "status"=> true,
                        "response_code"=> 200,
                        "message"=> "Grid promocode found",
                        "Data"=>$temp
                    ];
                    echo json_encode($data);
                    
                }else{
                    $data = 
                    [
                         "status"=> false,
                        "response_code"=> 402,
                        "message"=> "Promo code is not valid for you as its from some other service provider!",
                    ];
                    echo json_encode($data);
                }
                
            }
            else
            {
                $data = 
                [
                     "status"=> false,
                    "response_code"=> 402,
                    "message"=> "The promo code it not valid or active at the currently!",
                ];
                echo json_encode($data);
            }
             
        }
        
        
       
        
        
        
    }
    else
    {
        $data =
        [
            "status"=> false,
            "response_code"=>403,
            "message"=> "access denied",
        ];
        echo json_encode($data);
    }


?>