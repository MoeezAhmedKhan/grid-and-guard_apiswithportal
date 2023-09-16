<?php

    if($_POST['token'] == 'as23rlkjadsnlkcj23qkjnfsDKJcnzdfb3353ads54vd3favaeveavgbqaerbVEWDSC')
    {
        require_once("connection.php");
        $type = $_POST["type"];
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];
        $week_days = json_decode($_POST['week_days']);
        $petrols_daily = $_POST['petrols_daily'];
        $provider_company = $_POST['provider_company'];
        $time = $_POST['time'];
        
            
          if(!isset($_POST['type'])){
                  $data = ["status"=>false,
                    "message"=>"type is required"];
                  echo json_encode($data); 
          }else{
             
             if($type == "Petroling Service"){
                 if(!isset($_POST['start_date'])){
                      $data = ["status"=>false,
                          "message"=>"start_date is required"];
                          echo json_encode($data); 
                          
                 }else if(!isset($_POST['provider_company'])){
                      $data = ["status"=>false,
                          "message"=>"provider_company is required"];
                          echo json_encode($data); 
                          
                 }else if(!isset($_POST['end_date'])){
                      $data = ["status"=>false,
                          "message"=>"end_date is required"];
                          echo json_encode($data); 
                          
                 }else if(!isset($_POST['week_days'])){
                      $data = ["status"=>false,
                          "message"=>"week_days is required"];
                          echo json_encode($data); 
                 }else if(!isset($_POST['time'])){
                      $data = ["status"=>false,
                          "message"=>"time is required"];
                          echo json_encode($data); 
                 }else if(!isset($_POST['petrols_daily'])){
                      $data = ["status"=>false,
                          "message"=>"petrols_daily is required"];
                          echo json_encode($data); 
                 }else{
                          $date1 = new DateTime($start_date);
                          $date2 = new DateTime($end_date);
                          $interval = $date1->diff($date2);
                            
                          $days = $interval->days;
                          $totalpetrols = 0;
                          $daysCounter = 0;
                          for($i=0; $i<=$days; $i++){
                              
                             $date=date_create($start_date);
                             date_add($date,date_interval_create_from_date_string($i." days"));
                             $newdate = $date;
                             $day  = date_format($date,"D");
                             $day  = date_format($date,"D");
                             if(in_array($day, $week_days)){
                                 date_add($newdate,date_interval_create_from_date_string("12 hours"));
                                 for($j=1; $j<=$petrols_daily; $j++){
                                    date_add($newdate,date_interval_create_from_date_string($time." hours"));
                                         $totalpetrols++;
                                 }
                                 $daysCounter++;
                             }
                         }
                         
                        $select = "SELECT `amount` , `fee`  FROM `payment` WHERE `vendor_id` = $provider_company AND `type` = '$type'";
                        $run_select = mysqli_query($conn,$select);
                        $select_rows = mysqli_num_rows($run_select);
                        if($select_rows > 0)
                        {
                           
                          $Data = mysqli_fetch_array($run_select);
                          $amount  = $Data['amount'];
                          $fee  = $Data['fee'];
                          $totalAmounteachpetrol = $amount + $fee;
                          $totalAmount = $totalpetrols * $totalAmounteachpetrol;
                          $totalGridFee = $totalpetrols * $fee;
                          $totalVendorCharges = $totalpetrols * $amount;
                          
                          
                          $temp = [
                                        "each_service_price"=>$totalAmounteachpetrol,
                                        "total_vendor_charges"=>$totalVendorCharges,
                                        "total_grid_fee"=>$totalGridFee,
                                        "total_price"=>$totalAmount,
                                        "number_of_services"=>$totalpetrols,
                              
                                  ];
                          $data = 
                            [
                                 "status"=> true,
                                "response_code"=> 200,
                                "message"=> "Payment found.",
                                 "Data"=>$temp
                            ];
                            echo json_encode($data);
                          
                          
                          
                        }
                        else
                        {
                            $data = 
                            [
                                 "status"=> false,
                                "response_code"=> 404,
                                "message"=> "Payment not found!",
                            ];
                            echo json_encode($data);
                        }
   
                }
                 
                 
                 
                
             
             
             }
             else if($type == "Standing Security"){
                 if(!isset($_POST['start_date'])){
                      $data = ["status"=>false,
                          "message"=>"start_date is required"];
                          echo json_encode($data); 
                          
                 }else if(!isset($_POST['provider_company'])){
                      $data = ["status"=>false,
                          "message"=>"provider_company is required"];
                          echo json_encode($data); 
                          
                 }else if(!isset($_POST['end_date'])){
                      $data = ["status"=>false,
                          "message"=>"end_date is required"];
                          echo json_encode($data); 
                          
                 }else if(!isset($_POST['week_days'])){
                      $data = ["status"=>false,
                          "message"=>"week_days is required"];
                          echo json_encode($data); 
                 }else{
                        $date1 = new DateTime($start_date);
                         $date2 = new DateTime($end_date);
                         $interval = $date1->diff($date2);
                        
                         $days = $interval->days;
                         $daysCounter = 0;
                         $result = 0;
                         $availablity = 0;
                         $availablityinStanding = 0;
                         for($n=0; $n<=$days; $n++){
                             $date=date_create($start_date);
                             date_add($date,date_interval_create_from_date_string($n." days"));
                             $newdate = $date;
                             $day  = date_format($date,"D");
                             $day  = date_format($date,"D");
                             $datetodayFrom  = date_format($date,"Y-m-d")." 00:00:00";
                             $datetodayTo  = date_format($date,"Y-m-d")." 23:59:59";
                             if(in_array($day, $week_days)){
                                  $availablityinStanding++;
                             }
                                 
                         }
                    $select = "SELECT `amount` , `fee`  FROM `payment` WHERE `vendor_id` = $provider_company AND `type` = '$type'";
                    $run_select = mysqli_query($conn,$select);
                    $select_rows = mysqli_num_rows($run_select);
                    if($select_rows > 0)
                    {
                       
                      $Data = mysqli_fetch_array($run_select);
                      $amount  = $Data['amount'];
                      $fee  = $Data['fee'];
                      $totalAmounteachpetrol = $amount + $fee;
                      $totalAmount = $availablityinStanding * $totalAmounteachpetrol;
                      $totalGridFee = $availablityinStanding * $fee;
                      $totalVendorCharges = $availablityinStanding * $amount;
                      
                      
                      $temp = [
                                    "each_service_price"=>$totalAmounteachpetrol,
                                    "total_vendor_charges"=>$totalVendorCharges,
                                    "total_grid_fee"=>$totalGridFee,
                                    "total_price"=>$totalAmount,
                                    "number_of_services"=>$availablityinStanding,
                          
                              ];
                      $data = 
                        [
                             "status"=> true,
                            "response_code"=> 200,
                            "message"=> "Payment found.",
                             "Data"=>$temp
                        ];
                        echo json_encode($data);
                      
                      
                      
                    }
                    else
                    {
                        $data = 
                        [
                             "status"=> false,
                            "response_code"=> 404,
                            "message"=> "Payment not found!",
                        ];
                        echo json_encode($data);
                    }   
                 }     
                     
             }
             else if($type == "On Demand"){
                    $select = "SELECT `amount` , `fee`  FROM `payment` WHERE `vendor_id` = $provider_company AND `type` = '$type'";
                    $run_select = mysqli_query($conn,$select);
                    $select_rows = mysqli_num_rows($run_select);
                    if($select_rows > 0)
                    {
                       
                      $Data = mysqli_fetch_array($run_select);
                      $amount  = $Data['amount'];
                      $fee  = $Data['fee'];
                      $totalAmounteachpetrol = $amount + $fee;
                      $totalAmount = 1 * $totalAmounteachpetrol;
                      $totalGridFee = 1 * $fee;
                      $totalVendorCharges = 1 * $amount;
                      
                      
                      $temp = [
                                    "each_service_price"=>$totalAmounteachpetrol,
                                    "total_vendor_charges"=>$totalVendorCharges,
                                    "total_grid_fee"=>$totalGridFee,
                                    "total_price"=>$totalAmount,
                                    "number_of_services"=>1,
                          
                              ];
                      $data = 
                        [
                             "status"=> true,
                            "response_code"=> 200,
                            "message"=> "Payment found.",
                             "Data"=>$temp
                        ];
                        echo json_encode($data);
                      
                      
                      
                    }
                    else
                    {
                        $data = 
                        [
                             "status"=> false,
                            "response_code"=> 404,
                            "message"=> "Payment not found!",
                        ];
                        echo json_encode($data);
                    }
             }
             else {
                 $data = 
                        [
                             "status"=> false,
                            "response_code"=> 202,
                            "message"=> "Invalid service type! use only On Demand, Petroling Service or Standing Security",
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