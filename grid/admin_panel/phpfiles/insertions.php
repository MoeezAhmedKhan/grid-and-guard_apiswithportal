<?php

    require_once("../connection.php");


    // add comapny
    
    if(isset($_POST['add_business_account_btn']))
    {
        
        $businessname = $_POST["businessname"];
        $email = $_POST["email"];;
        $phone = $_POST["phone"];
        $username = $_POST["username"];
        $address = $_POST["address"];
        $zip = $_POST["zip"];
        $country = $_POST["country"];
        $password = $_POST["password"];
        
        $select_email = "SELECT `email` FROM `user` WHERE email = '$email'";
        $run_email = mysqli_query($conn,$select_email);
        $email_row = mysqli_num_rows($run_email);
        if($email_row == 0)
        {
            $select_phone = "SELECT `phone` FROM `user` WHERE phone = '$phone'";
            $run_phone = mysqli_query($conn,$select_phone);
            $phone_row = mysqli_num_rows($run_phone);
            if($phone_row == 0)
            {
                $select_username = "SELECT `username` FROM `user` WHERE username = '$username'";
                $run_username = mysqli_query($conn,$select_username);
                $username_row = mysqli_num_rows($run_username);
                if($username_row == 0)
                {
                    $insert = "INSERT INTO `user`(`role_id`, `business_name`, `email`, `username`, `phone`, `password`, `address`,
                    `zipcode`, `country`) VALUES (2,'$businessname','$email','$username','$phone','$password','$address','$zip','$country')";
                    $excec = mysqli_query($conn,$insert);
                    if($excec)
                    {
                        ?>
                        <script>
                        alert("Company Account Created Successfully");
                        window.location.href = "../add_business_customer.php";
                        </script>
                        <?php 
                    }
                    else
                    {
                        ?>
                        <script>
                        alert("Something Went Wrong");
                        window.location.href = "../add_business_customer.php";
                        </script>
                        <?php 
                    }
                }
                else
                {
                    ?>
                        <script>
                        alert("Username is already exist. Please change Username");
                        window.location.href = "../add_business_customer.php";
                        </script>
                    <?php 
                    
                }
            }
            else
            {
                ?>
                    <script>
                    alert("Phone Number is already exist. Please change your Number");
                    window.location.href = "../add_business_customer.php";
                    </script>
                <?php 
                
            }
        }
        else
        {
            ?>
                <script>
                alert("Email is already exist. Please change your email");
                window.location.href = "../add_business_customer.php";
                </script>
            <?php 
            
        }
    
    }
        
 // end comapny
        


 // add individual
    
    if(isset($_POST['add_individual_account_btn']))
    {
        
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $email = $_POST["email"];;
        $phone = $_POST["phone"];
        $username = $_POST["username"];
        $address = $_POST["address"];
        $zip = $_POST["zip"];
        $country = $_POST["country"];
        $password = $_POST["password"];
        
        $select = "SELECT `email` FROM `user` WHERE email = '$email'";
        $run_email = mysqli_query($conn,$select);
        $email_row = mysqli_num_rows($run_email);
        if($email_row == 0)
        {
            $select_phone = "SELECT `phone` FROM `user` WHERE phone = '$phone'";
            $run_phone = mysqli_query($conn,$select_phone);
            $phone_row = mysqli_num_rows($run_phone);
            if($phone_row == 0)
            {
                $insert = "INSERT INTO `user`(`role_id`, `first_name`, `last_name`, `email`, `username`, `phone`, `password`, `address`,
                `zipcode`, `country`) VALUES (1,'$fname','$lname','$email','$username','$phone','$password','$address','$zip','$country')";
                $excec = mysqli_query($conn,$insert);
                if($excec)
                {
                    ?>
                    <script>
                    alert("Individual Account Created Successfully");
                    window.location.href = "../add_individual_customer.php";
                    </script>
                    <?php 
                }
                else
                {
                    ?>
                    <script>
                    alert("Something Went Wrong");
                    window.location.href = "../add_individual_customer.php";
                    </script>
                    <?php 
                }
            }
            else
            {
                ?>
                    <script>
                    alert("Phone Number is already exist. Please change your Number");
                    window.location.href = "../add_individual_customer.php";
                    </script>
                <?php 
            }
        }
        else
        {
            ?>
                <script>
                alert("Email is already exist. Please change your email");
                window.location.href = "../add_individual_customer.php";
                </script>
            <?php
        }
    
    }
        
 // end individual
 
 
 
 
 
  // add vendor
    
    if(isset($_POST['add_company_btn']))
    {
        
        $cname = $_POST["cname"];
        $cdcpname = $_POST["cdcpname"];
        $cphone = $_POST["cphone"];;
        $caphone = $_POST["caphone"];
        $cemail = $_POST["cemail"];
        $caddress = $_POST["caddress"];
        $ssphcharge = $_POST["ssphcharge"];
        $ppcharge = $_POST["ppcharge"];
        $cpasswprd = $_POST["cpasswprd"];
        
        // file1
        $target_dir = "../upload/";
        $clicensedocument = $_FILES['clicensedocument']['name'];
        $target_file1 = $target_dir . basename($clicensedocument);
        $fileType1 = strtolower(pathinfo($target_file1,PATHINFO_EXTENSION));
        $filwwithnewname1 = date('Ydmis')."Company_License_Document.".$fileType1;
        
        $filetype1 = $_FILES['clicensedocument']['type'];
        $filesize1 = $_FILES['clicensedocument']['size'];
        $filetemploc1 = $_FILES['clicensedocument']['tmp_name'];
        
        
        // file2
        $insurancedocument = $_FILES['insurancedocument']['name'];
        $target_file2 = $target_dir . basename($insurancedocument);
        $fileType2 = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));
        $filwwithnewname2 = date('Ydmis')."Insurance_Document.".$fileType2;
        
        $filetype2 = $_FILES['insurancedocument']['type'];
        $filesize2 = $_FILES['insurancedocument']['size'];
        $filetemploc2 = $_FILES['insurancedocument']['tmp_name'];
        
        
        // file3
        $aidocument = $_FILES['aidocument']['name'];
        $target_file3 = $target_dir . basename($aidocument);
        $fileType3 = strtolower(pathinfo($target_file3,PATHINFO_EXTENSION));
        $filwwithnewname3 = date('Ydmis')."Auto_Insurance_Document.".$fileType3;
        
        $filetype3 = $_FILES['aidocument']['type'];
        $filesize3 = $_FILES['aidocument']['size'];
        $filetemploc3 = $_FILES['aidocument']['tmp_name'];
        
        
        // file4
        $wformdocument = $_FILES['wformdocument']['name'];
        $target_file4 = $target_dir . basename($wformdocument);
        $fileType4 = strtolower(pathinfo($target_file4,PATHINFO_EXTENSION));
        $filwwithnewname4 = date('Ydmis')."W9_Form_document.".$fileType4;
        
        $filetype4 = $_FILES['wformdocument']['type'];
        $filesize4 = $_FILES['wformdocument']['size'];
        $filetemploc4 = $_FILES['wformdocument']['tmp_name'];
        
        
        // file5
        $splicensedocument = $_FILES['splicensedocument']['name'];
        $target_file5 = $target_dir . basename($splicensedocument);
        $fileType5 = strtolower(pathinfo($target_file5,PATHINFO_EXTENSION));
        $filwwithnewname5 = date('Ydmis')."State_Operating_License_Document.".$fileType5;
        
        $filetype5 = $_FILES['splicensedocument']['type'];
        $filesize5 = $_FILES['splicensedocument']['size'];
        $filetemploc5 = $_FILES['splicensedocument']['tmp_name'];
        
        
        // file6
        $uagreementdocument = $_FILES['uagreementdocument']['name'];
        $target_file6 = $target_dir . basename($uagreementdocument);
        $fileType6 = strtolower(pathinfo($target_file6,PATHINFO_EXTENSION));
        $filwwithnewname6 = date('Ydmis')."User_Agreement_Document.".$fileType6;
        
        $filetype6 = $_FILES['uagreementdocument']['type'];
        $filesize6 = $_FILES['uagreementdocument']['size'];
        $filetemploc6 = $_FILES['uagreementdocument']['tmp_name'];
        
        
        
        $select = "SELECT `email` FROM `user` WHERE email = '$email'";
        $run_email = mysqli_query($conn,$select);
        $email_row = mysqli_num_rows($run_email);
        if($email_row == 0)
        {
            $select_phone = "SELECT `phone` FROM `user` WHERE phone = '$phone'";
            $run_phone = mysqli_query($conn,$select_phone);
            $phone_row = mysqli_num_rows($run_phone);
            if($phone_row == 0)
            {
                if(strtolower($filetype1) == "image/jpg" || strtolower($filetype1) == "image/png" || strtolower($filetype1) == "image/jpeg" || strtolower($filetype1) == "image/gif" || strtolower($filetype1) == "application/pdf")
                {
                    if(strtolower($filetype2) == "image/jpg" || strtolower($filetype2) == "image/png" || strtolower($filetype2) == "image/jpeg" || strtolower($filetype2) == "image/gif" || strtolower($filetype2) == "application/pdf")
                    {
                        if(strtolower($filetype3) == "image/jpg" || strtolower($filetype3) == "image/png" || strtolower($filetype3) == "image/jpeg" || strtolower($filetype3) == "image/gif" || strtolower($filetype3) == "application/pdf")
                        {
                            if(strtolower($filetype4) == "image/jpg" || strtolower($filetype4) == "image/png" || strtolower($filetype4) == "image/jpeg" || strtolower($filetype4) == "image/gif" || strtolower($filetype4) == "application/pdf")
                            {
                                if(strtolower($filetype5) == "image/jpg" || strtolower($filetype5) == "image/png" || strtolower($filetype5) == "image/jpeg" || strtolower($filetype5) == "image/gif" || strtolower($filetype5) == "application/pdf")
                                {
                                    if(strtolower($filetype6) == "image/jpg" || strtolower($filetype6) == "image/png" || strtolower($filetype6) == "image/jpeg" || strtolower($filetype6) == "image/gif" || strtolower($filetype6) == "application/pdf")
                                    {
                                        if($filesize1 <= 5000000) /*front 5mb*/
                                        {
                                            if($filesize2 <= 5000000) /*front 5mb*/
                                            {
                                                if($filesize3 <= 5000000) /*front 5mb*/
                                                {
                                                    if($filesize4 <= 5000000) /*front 5mb*/
                                                    {
                                                        if($filesize5 <= 5000000) /*front 5mb*/
                                                        {
                                                            if($filesize6 <= 5000000) /*front 5mb*/
                                                            {
                                                                $insert = "INSERT INTO `user`(`role_id`, `company_name`, `company_direct_contact_person_name`,
                                                                `email`, `phone`, `company_alter_phone`, `standing_service_per_hour_charge`,`per_petrol_charge`, 
                                                                `company_license_document`, `insurance_document`, `auto_insurance_document`, `w9_Form_document`, 
                                                                `state_operating_license_document`, `user_agreement_document` ,`password`) VALUES 
                                                                (3,'$cname','$cdcpname','$cemail','$cphone','$caphone','$ssphcharge','$ppcharge','$filwwithnewname1',
                                                                '$filwwithnewname2','$filwwithnewname3','$filwwithnewname4','$filwwithnewname5','$filwwithnewname6','$cpasswprd')";
                                                                $excec = mysqli_query($conn,$insert);
                                                                if($excec)
                                                                {
                                                                    move_uploaded_file($filetemploc1,$target_dir.$filwwithnewname1);
                                                                    move_uploaded_file($filetemploc2,$target_dir.$filwwithnewname2);
                                                                    move_uploaded_file($filetemploc3,$target_dir.$filwwithnewname3);
                                                                    move_uploaded_file($filetemploc4,$target_dir.$filwwithnewname4);
                                                                    move_uploaded_file($filetemploc5,$target_dir.$filwwithnewname5);
                                                                    move_uploaded_file($filetemploc6,$target_dir.$filwwithnewname6);
                                                                        
                                                                    ?>
                                                                    <script>
                                                                    alert("Vendor Account Created Successfully");
                                                                    window.location.href = "../add_company.php";
                                                                    </script>
                                                                    <?php 
                                                                }
                                                                else
                                                                {
                                                                    ?>
                                                                    <script>
                                                                    alert("Something Went Wrong");
                                                                    window.location.href = "../add_company.php";
                                                                    </script>
                                                                    <?php 
                                                                }
                                                            }
                                                            else
                                                            {
                                                                ?>
                                                                    <script>
                                                                    alert("User Agreement document Should be less than 5 Mb");
                                                                    window.location.href = "../add_company.php";
                                                                    </script>
                                                                <?php 
                                                            }
                                                        }
                                                        else
                                                        {
                                                            ?>
                                                                <script>
                                                                alert("State operating License document Should be less than 5 Mb");
                                                                window.location.href = "../add_company.php";
                                                                </script>
                                                            <?php 
                                                        }
                                                    }
                                                    else
                                                    {
                                                        ?>
                                                            <script>
                                                            alert("W9 Form document Should be less than 5 Mb");
                                                            window.location.href = "../add_company.php";
                                                            </script>
                                                        <?php 
                                                    }
                                                }
                                                else
                                                {
                                                    ?>
                                                        <script>
                                                        alert("Auto Insurance document Should be less than 5 Mb");
                                                        window.location.href = "../add_company.php";
                                                        </script>
                                                    <?php 
                                                }
                                            }
                                            else
                                            {
                                                ?>
                                                    <script>
                                                    alert("Insurance document Should be less than 5 Mb");
                                                    window.location.href = "../add_company.php";
                                                    </script>
                                                <?php 
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                                <script>
                                                alert("Company License document Should be less than 5 Mb");
                                                window.location.href = "../add_company.php";
                                                </script>
                                            <?php 
                                        }
                                    }
                                    else
                                    {
                                        ?>
                                            <script>
                                            alert("User Agreement document document extension is wrong || You can insert jpg, png, jpeg, gif and Pdf");
                                            window.location.href = "../add_company.php";
                                            </script>
                                        <?php 
                                    }
                                }
                                else
                                {
                                    ?>
                                        <script>
                                        alert("State operating License document extension is wrong || You can insert jpg, png, jpeg, gif and Pdf");
                                        window.location.href = "../add_company.php";
                                        </script>
                                    <?php 
                                }
                            }
                            else
                            {
                                 ?>
                                    <script>
                                    alert("W9 Form document extension is wrong || You can insert jpg, png, jpeg, gif and Pdf");
                                    window.location.href = "../add_company.php";
                                    </script>
                                <?php 
                            }
                        }
                        else
                        {
                            ?>
                                <script>
                                alert("Auto Insurance document extension is wrong || You can insert jpg, png, jpeg, gif and Pdf");
                                window.location.href = "../add_company.php";
                                </script>
                            <?php 
                        }
                    }
                    else
                    {
                        ?>
                            <script>
                            alert("Insurance document extension is wrong || You can insert jpg, png, jpeg, gif and Pdf");
                            window.location.href = "../add_company.php";
                            </script>
                        <?php 
                    }
                }
                else
                {
                    ?>
                        <script>
                        alert("Company License document extension is wrong || You can insert jpg, png, jpeg, gif and Pdf");
                        window.location.href = "../add_company.php";
                        </script>
                    <?php 
                }
            }
            else
            {
                ?>
                    <script>
                    alert("Phone Number is already exist. Please change your Number");
                    window.location.href = "../add_company.php";
                    </script>
                <?php 
            }
        }
        else
        {
            ?>
                <script>
                alert("Email is already exist. Please change your email");
                window.location.href = "../add_company.php";
                </script>
            <?php
        }
    
    }
        
 // end vendor
        





  // add_skills_btn.php

     if(isset($_POST["add_skills_btn"]))
     {
         $skill = $_POST["skill"];
 
         $insert = "INSERT INTO `skills`(`skill_name`) VALUES ('$skill')";
         $excec = mysqli_query($conn,$insert);
         if($excec)
         {
             ?>
                 <script>
                     alert("Bank has been Added");window.location.href = "../add_skills.php";
                 </script>
             <?php
         }
         else
         {
             echo mysqli_error($conn);
         }
         
 
     }
     
     
     
  // add_bank_btn

     if(isset($_POST["add_bank_btn"]))
     {
         $bank_name = $_POST["bank_name"];
         $iban_number = $_POST["iban_number"];
 
         $insert = "INSERT INTO `add_bank`(`bank_name`,`iban_number`) VALUES ('$bank_name','$iban_number')";
         $excec = mysqli_query($conn,$insert);
         if($excec)
         {
             ?>
                 <script>
                     alert("Bank has been Added");window.location.href = "../add_bank.php";
                 </script>
             <?php
         }
         else
         {
             echo mysqli_error($conn);
         }
         
 
     }
     
     
    //  end
    
    
    
    
  // add guard
    
    if(isset($_POST['add_guard_account_btn']))
    {
        
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $email = $_POST["email"];;
        $service = $_POST["service"];
        $address = $_POST["address"];
        $country = $_POST["country"];
        $phone = $_POST["phone"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        
        $target_dir = "../upload/";
        $gimage = $_FILES['gimage']['name'];
        $target_file = $target_dir . basename($gimage);
        $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $filwwithnewname = date('Ydmis')."Guard_Image.".$fileType;
        
        $filetype = $_FILES['gimage']['type'];
        $filesize = $_FILES['gimage']['size'];
        $filetemploc = $_FILES['gimage']['tmp_name'];
        


        $select = "SELECT `email` FROM `user` WHERE email = '$email'";
        $run_email = mysqli_query($conn,$select);
        $email_row = mysqli_num_rows($run_email);
        if($email_row == 0)
        {
            $select_phone = "SELECT `phone` FROM `user` WHERE phone = '$phone'";
            $run_phone = mysqli_query($conn,$select_phone);
            $phone_row = mysqli_num_rows($run_phone);
            if($phone_row == 0)
            {
                $select_username = "SELECT `username` FROM `user` WHERE username = '$username'";
                $run_username = mysqli_query($conn,$select_username);
                $username_row = mysqli_num_rows($run_username);
                if($username_row == 0)
                {
                    if(strtolower($filetype) == "image/jpg" || strtolower($filetype) == "image/png" || strtolower($filetype) == "image/jpeg" || strtolower($filetype) == "image/gif")
                    {
                        if($filesize <= 5000000) /*front 5mb*/
                        {
                            $insert = "INSERT INTO `user`(`role_id`, `first_name`, `last_name`,  `service` ,`email`, `username`, `phone`, `password`,
                            `address`, `country`, `profile`) VALUES (4,'$fname','$lname','$service','$email','$username','$phone','$password',
                            '$address','$country','$filwwithnewname');";
                            $excec = mysqli_query($conn,$insert);
                            if($excec)
                            {
                                move_uploaded_file($filetemploc,$target_dir.$filwwithnewname);
                                
                                $last_id = $conn->insert_id;
                                $guard_id_insert = "INSERT INTO `guard_documentation`(`guard_id`) VALUES ('$last_id')";
                                mysqli_query($conn,$guard_id_insert);
                                
                                $gurad_status_insert = "INSERT INTO `guard_status`(`guard_id`) VALUES ('$last_id')";
                                mysqli_query($conn,$gurad_status_insert);
                                                                            
                                ?>
                                <script>
                                alert("Guard Account Created Successfully");
                                window.location.href = "../add_guard.php";
                                </script>
                                <?php 
                            }
                            else
                            {
                                ?>
                                    <script>
                                    alert("Something Went Wrong");
                                    window.location.href = "../add_guard.php";
                                    </script>
                                <?php 
                            }
                        }
                        else
                        {
                            ?>
                                <script>
                                alert("Image Should be less than 5 Mb");
                                window.location.href = "../add_guard.php";
                                </script>
                            <?php 
                        }
                    }
                    else
                    {
                        ?>
                            <script>
                            alert("Image extension is wrong || You can insert jpg, png, jpeg and gif");
                            window.location.href = "../add_guard.php";
                            </script>
                        <?php 
                    }
                }
                else
                {
                    ?>
                        <script>
                        alert("Username is already exist. Please change Username");
                        window.location.href = "../add_guard.php";
                        </script>
                    <?php 
                }
            }
            else
            {
                ?>
                    <script>
                    alert("Phone Number is already exist. Please change your Number");
                    window.location.href = "../add_guard.php";
                    </script>
                <?php 
            }
        }
        else
        {
            ?>
                <script>
                alert("Email is already exist. Please change your email");
                window.location.href = "../add_guard.php";
                </script>
            <?php
        }
    
    }
        
 // end guard
     
     


// notification
if(isset($_POST['BtnSendpush']))
{
    $v = $_POST['checkbox'];
    $user_idxx =$_POST['user_id'];
    $purpose = $_POST['purpose']; 
    $cont = mysqli_real_escape_string($conn,$_POST['content']);
    $playerId = [];
    $subject = '';
    
    foreach($v as $i)
    {
        $user_id = $i;
        
        $insert = "INSERT INTO `notification`(`user_id`, `content`, `purpose`) VALUES ($user_id,'$cont','$purpose')";
         mysqli_query($conn,$insert);
        
        $sql_get_token = "SELECT `first_name`,`last_name`, `notification_token` FROM `user` WHERE `id`=$user_id";
        $ex = mysqli_query($conn,$sql_get_token);
        $Data = mysqli_fetch_array($ex);
         $Data['notification_token'];
        array_push($playerId, $Data['notification_token']);   
    }
    $content = array
    (
        "en" => $cont
    );

    $fields = array
    (
        'app_id' => "83e0a29c-60be-46c0-ac3f-e08f4e905e0b",
        'include_player_ids' => $playerId,
        'data' => array("foo" => "NewMassage","Id" => $taskid),
        'large_icon' =>"ic_launcher_round.png",
        'contents' => $content
    );

     $fields = json_encode($fields);
               

     $ch = curl_init();
     curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
     curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
    'Authorization: Basic ODU5ZDhiZjAtOWRkZS00NDIyLWI0ZWItOTYxMDc5YzQzMGIz'));
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
     curl_setopt($ch, CURLOPT_HEADER, FALSE);
     curl_setopt($ch, CURLOPT_POST, TRUE);
     curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);    

     $response = curl_exec($ch);
     curl_close($ch);
     ?>
         <script>alert("Notification Has Been Sent Successfull");window.location.href = "../sent_notification.php";</script>
     <?php
    
}

     
     
 // add vendor
    
    if(isset($_POST['add_vendor_account_btn']))
    {
        
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        
        $select_email = "SELECT `email` FROM `user` WHERE email = '$email'";
        $run_email = mysqli_query($conn,$select_email);
        $email_row = mysqli_num_rows($run_email);
        if($email_row == 0)
        {
            $insert = "INSERT INTO `user`(`role_id`, `first_name`, `last_name`, `email`, `password`) VALUES (3,'$fname','$lname','$email','$password')";
            $excec = mysqli_query($conn,$insert);
            if($excec)
            {
                ?>
                    <script>
                    alert("Company Account Created Successfully");
                    window.location.href = "../add_vendor.php";
                    </script>
                <?php 
            }
            else
            {
                ?>
                <script>
                    alert("Something Went Wrong");
                    window.location.href = "../add_vendor.php";
                </script>
                <?php 
            }
                
            
        }
        else
        {
            ?>
                <script>
                alert("Email is already exist. Please change your email");
                window.location.href = "../add_vendor.php";
                </script>
            <?php 
            
        }
    
    }
        
 // end vendor
 
 
 
 
//  sent patrol request on guard

if(isset($_POST['PatrolBtnSendpush']))
{
    $v = $_POST['checkbox'];
    $patrol_id =$_POST['patrol_id'];
    $guard_id = $_POST['guard_id']; 
    $playerId = [];
    $subject = '';
    
    $check_status = "SELECT `id`, `guard_id`, `status`, `job_type` FROM `guard_status` WHERE guard_id = $guard_id";
    $run_status = mysqli_query($conn,$check_status);
    $gArr = mysqli_fetch_array($run_status);
    if($gArr['status'] == "idle")
    {
    
        foreach($v as $i)
        {
            $pat_id= $i;
            
            $insert = "INSERT INTO `assign_request`(`type`, `request_id`, `guard_id`) VALUES 
            ('Petroling Service',$pat_id,$guard_id)";
             mysqli_query($conn,$insert);
             
             $update_status = "UPDATE `guard_status` SET `status`= 'engaged',`job_type`= 'Petroling Service' WHERE `guard_id` = $guard_id";
              mysqli_query($conn,$update_status);
              
              $update_pat_status = "UPDATE `add_petroling_service` SET `status` = 'inprogress' WHERE `id` = $pat_id";
              mysqli_query($conn,$update_pat_status);
            
            $sql_get_token = "SELECT `first_name`,`last_name`, `notification_token` FROM `user` WHERE `id`= $guard_id";
            $ex = mysqli_query($conn,$sql_get_token);
            $Data = mysqli_fetch_array($ex);
            array_push($playerId, $Data['notification_token']);   
        }
        $content = array
        (
            "en" => "task has been assigned from admin side",
        );
    
        $fields = array
        (
            'app_id' => "83e0a29c-60be-46c0-ac3f-e08f4e905e0b",
            'include_player_ids' => $playerId,
            'data' => array("foo" => "NewMassage","task_id" => $patrol_id),
            'large_icon' =>"ic_launcher_round.png",
            'contents' => $content
        );
    
         $fields = json_encode($fields);
                   
    
         $ch = curl_init();
         curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
         curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
        'Authorization: Basic ODU5ZDhiZjAtOWRkZS00NDIyLWI0ZWItOTYxMDc5YzQzMGIz'));
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
         curl_setopt($ch, CURLOPT_HEADER, FALSE);
         curl_setopt($ch, CURLOPT_POST, TRUE);
         curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
         curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);    
    
         $response = curl_exec($ch);
         curl_close($ch);
         ?>
             <script>alert("Notification Has Been Sent Successfull");window.location.href = "../manage_petrol_service_request.php";</script>
         <?php
         
    }
    else
    {
        ?>
        <script>alert("The guard has a job so you can't give another job at the same time");window.location.href = "../manage_petrol_service_request.php";</script>
        <?php 
    }
        
}





?>