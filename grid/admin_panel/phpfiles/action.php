<?php 

require_once("../connection.php");

    // update comapny
    
    if(isset($_POST['update_business_account_btn']))
    {
        
        $id = $_POST['id'];
        $businessname = $_POST["businessname"];
        $email = $_POST["email"];;
        $phone = $_POST["phone"];
        $username = $_POST["username"];
        $address = $_POST["address"];
        $zip = $_POST["zip"];
        $country = $_POST["country"];
        $password = $_POST["password"];
        $status = $_POST["status"];
    
        $update = "UPDATE `user` SET `business_name`= '$businessname',`email`= '$email',`username`= '$username',`phone`= '$phone',
        `password`= '$password',`address`= '$address',`zipcode`= '$zip',`country`= '$country',`status`= '$status' WHERE `id`= $id";
        $excec = mysqli_query($conn,$update);
        if($excec)
        {
            ?>
            <script>
            alert("Company Account Updated Successfully");
            window.location.href = "../manage_comapny.php";
            </script>
            <?php 
        }
        else
        {
            ?>
            <script>
            alert("Something Went Wrong");
            window.location.href = "../manage_comapny.php";
            </script>
            <?php 
        }
    
    }
        
        
    // update comapny
    
    
    // update Individual
    
    if(isset($_POST['update_individual_account_btn']))
    {
        
        $id = $_POST['id'];
        $first_name = $_POST["fname"];
        $last_name = $_POST["lname"];
        $email = $_POST["email"];;
        $phone = $_POST["phone"];
        $username = $_POST["username"];
        $address = $_POST["address"];
        $zip = $_POST["zip"];
        $country = $_POST["country"];
        $password = $_POST["password"];
        $status = $_POST["status"];
    
        $update = "UPDATE `user` SET `first_name`= '$first_name',`last_name`= '$last_name',`email`= '$email',`username`= '$username',`phone`= '$phone',
        `password`= '$password',`address`= '$address',`zipcode`= '$zip',`country`= '$country',`status`= '$status' WHERE `id`= $id";
        $excec = mysqli_query($conn,$update);
        if($excec)
        {
            ?>
            <script>
            alert("Individual Account Updated Successfully");
            window.location.href = "../manage_individual.php";
            </script>
            <?php 
        }
        else
        {
            ?>
            <script>
            alert("Something Went Wrong");
            window.location.href = "../manage_individual.php";
            </script>
            <?php 
        }
    
    }
        
        
    // update Individual




// update_task

// if(isset($_POST["update_task_btn"]))
// {
//     $id = $_POST["id"];       
//     $fname = $_POST["fname"];
//     $lname = $_POST["lname"];
//     $droploc = $_POST["droploc"];
        
        
//     $update = "UPDATE `task` SET `id`=[value-1],`user_id`= '',`dropoff_location`= '' WHERE ";
//     $excec = mysqli_query($conn,$update);
//     if($excec)
//     {
//         >
//             <script>
//                 alert("Rider has been Updated");window.location.href = "../manage_provider.php";
//             </script>
//         <?php
//     }
//     else
//     {
//         echo mysqli_error($conn);
//     }
            
// }




// update_work_category_btn

if(isset($_POST["update_work_category_btn"]))
{
    $id = $_POST["id"];       
    $icon_name = $_POST["icon_name"];
    $icon_type = $_POST["icon_type"];
    $work_title = $_POST["work_title"];

    
    $update = "UPDATE `menu_items` SET `icon_name`= '$icon_name',`icon_type`= '$icon_type',`title`= '$work_title' WHERE `id` = '$id'";
    $excec = mysqli_query($conn,$update);
    if($excec)
    {
        ?>
            <script>
                alert("Work Category has been Updated");window.location.href = "../manage_work_category.php";
            </script>
        <?php
    }
    else
    {
        echo mysqli_error($conn);
    }
            
}


// update_task

if(isset($_POST["update_bank_btn"]))
{
    $id = $_POST["id"];       
    $bankname = $_POST["bankname"];
    $iban_number = $_POST["iban_number"];
        
        
    $update = "UPDATE `add_bank` SET `bank_name`= '$bankname',`iban_number` = '$iban_number' WHERE `id`= '$id'";
    $excec = mysqli_query($conn,$update);
    if($excec)
    {
        ?>
            <script>
                alert("Bank has been Updated");window.location.href = "../manage_bank.php";
            </script>
        <?php
    }
    else
    {
        echo mysqli_error($conn);
    }
            
}




// update_customer_btn

if(isset($_POST["update_customer_btn"]))
{
    $id = $_POST["id"];       
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $zip = $_POST["zip"];
    $password = $_POST["password"];
    $status = $_POST["status"];
        
        
    $update = "UPDATE `users` SET `first_name`= '$fname',`last_name`= '$lname',`phone`= '$phone'
    ,`email`= '$email',`password`= '$password',`address`= '$address',`city`= '$city',
    `state`= '$state',`zipcode`= '$zip',`status`= '$status'  WHERE id = '$id'";
    $excec = mysqli_query($conn,$update);
    if($excec)
    {
        ?>
            <script>
                alert("Customer has been Updated");window.location.href = "../manage_customer.php";
            </script>
        <?php
    }
    else
    {
        echo mysqli_error($conn);
    }
            
}




// update_sub_admin_btn

if(isset($_POST["update_sub_admin_btn"]))
{
    $id = $_POST["id"];       
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $password = $_POST["password"];
    $status = $_POST["status"];
        
        
    $update = "UPDATE `users` SET `first_name`= '$fname',`last_name`= '$lname',`phone`= '$phone'
    ,`email`= '$email',`password`= '$password',`status`= '$status'  WHERE id = '$id'";
    $excec = mysqli_query($conn,$update);
    if($excec)
    {
        ?>
            <script>
                alert("Sub Admin has been Updated");window.location.href = "../manage_sub_admin.php";
            </script>
        <?php
    }
    else
    {
        echo mysqli_error($conn);
    }
            
}





    // manage_company_profile
    
    if(isset($_POST['edit_company_profile_btn']))
    {
        require_once('../connection.php');
         
        $cid = $_POST["cid"];               
        $cname = $_POST["cname"];
        $cdcpname = $_POST["cdcpname"];
        $cphone = $_POST["cphone"];;
        $caphone = $_POST["caphone"];
        $cemail = $_POST["cemail"];
        $caddress = $_POST["caddress"];
        $ssphcharge = $_POST["ssphcharge"];
        $ppcharge = $_POST["ppcharge"];
        $cpasswprd = $_POST["cpasswprd"];
        $status = $_POST['status'];
                              
                              
        // 1                    
        if(empty($_FILES["new_clicensedocument"]["name"]))
        {
            $filwwithnewname1 =  $_POST['old_clicensedocument'];
        }
        elseif(isset($_FILES["new_clicensedocument"]["name"]))
        {
                                 
            $target_dir = "../upload/";
            $clicensedocument = $_FILES['new_clicensedocument']['name'];
            $target_file1 = $target_dir . basename($clicensedocument);
            $fileType1 = strtolower(pathinfo($target_file1,PATHINFO_EXTENSION));
            $filwwithnewname1 = date('Ydmis')."Company_License_Document.".$fileType1;
                                  
            $filetype1 = $_FILES['new_clicensedocument']['type'];
            $filesize1 = $_FILES['new_clicensedocument']['size'];
            $filetemploc1 = $_FILES['new_clicensedocument']['tmp_name'];
                                 
        }
        
        // 2                   
        if(empty($_FILES["new_insurancedocument"]["name"]))
        {
            $filewithnewname2 =  $_POST['old_insurancedocument'];
        }
        elseif(isset($_FILES["new_insurancedocument"]["name"]))
        {
            
            $target_dir = "../upload/";                        
            $insurancedocument = $_FILES['new_insurancedocument']['name'];
            $target_file2 = $target_dir . basename($insurancedocument);
            $fileType2 = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));
            $filewithnewname2 = date('Ydmis')."Insurance_Document.".$fileType2;
            
            $filetype2 = $_FILES['new_insurancedocument']['type'];
            $filesize2 = $_FILES['new_insurancedocument']['size'];
            $filetemploc2 = $_FILES['new_insurancedocument']['tmp_name'];
                                 
        }
        
        // 3                 
        if(empty($_FILES["new_aidocument"]["name"]))
        {
            $filwwithnewname3 =  $_POST['old_aidocument'];
        }
        elseif(isset($_FILES["new_aidocument"]["name"]))
        {
            
            $target_dir = "../upload/";                     
            $aidocument = $_FILES['new_aidocument']['name'];
            $target_file3 = $target_dir . basename($aidocument);
            $fileType3 = strtolower(pathinfo($target_file3,PATHINFO_EXTENSION));
            $filwwithnewname3 = date('Ydmis')."Auto_Insurance_Document.".$fileType3;
            
            $filetype3 = $_FILES['new_aidocument']['type'];
            $filesize3 = $_FILES['new_aidocument']['size'];
            $filetemploc3 = $_FILES['new_aidocument']['tmp_name'];
                                 
        }
        
        // 4                
        if(empty($_FILES["new_wformdocument"]["name"]))
        {
            $filwwithnewname4 =  $_POST['old_wformdocument'];
        }
        elseif(isset($_FILES["new_wformdocument"]["name"]))
        {
            
            $target_dir = "../upload/";                     
            $wformdocument = $_FILES['new_wformdocument']['name'];
            $target_file4 = $target_dir . basename($wformdocument);
            $fileType4 = strtolower(pathinfo($target_file4,PATHINFO_EXTENSION));
            $filwwithnewname4 = date('Ydmis')."W9_Form_document.".$fileType4;
            
            $filetype4 = $_FILES['new_wformdocument']['type'];
            $filesize4 = $_FILES['new_wformdocument']['size'];
            $filetemploc4 = $_FILES['new_wformdocument']['tmp_name']; 
                                 
        }
        
        // 5                  
        if(empty($_FILES["new_splicensedocument"]["name"]))
        {
            $filwwithnewname5 =  $_POST['old_splicensedocument'];
        }
        elseif(isset($_FILES["new_splicensedocument"]["name"]))
        {
            
            $target_dir = "../upload/";                    
            $splicensedocument = $_FILES['new_splicensedocument']['name'];
            $target_file5 = $target_dir . basename($splicensedocument);
            $fileType5 = strtolower(pathinfo($target_file5,PATHINFO_EXTENSION));
            $filwwithnewname5 = date('Ydmis')."State_Operating_License_Document.".$fileType5;
            
            $filetype5 = $_FILES['new_splicensedocument']['type'];
            $filesize5 = $_FILES['new_splicensedocument']['size'];
            $filetemploc5 = $_FILES['new_splicensedocument']['tmp_name']; 
                                 
        }
        
        // 6                 
        if(empty($_FILES["new_uagreementdocument"]["name"]))
        {
            $filwwithnewname6 =  $_POST['old_uagreementdocument'];
        }
        elseif(isset($_FILES["new_uagreementdocument"]["name"]))
        {
            
            $target_dir = "../upload/";                     
            $uagreementdocument = $_FILES['new_uagreementdocument']['name'];
            $target_file6 = $target_dir . basename($uagreementdocument);
            $fileType6 = strtolower(pathinfo($target_file6,PATHINFO_EXTENSION));
            $filwwithnewname6 = date('Ydmis')."User_Agreement_Document.".$fileType6;
            
            $filetype6 = $_FILES['new_uagreementdocument']['type'];
            $filesize6 = $_FILES['new_uagreementdocument']['size'];
            $filetemploc6 = $_FILES['new_uagreementdocument']['tmp_name'];
                                 
        }
        
                                  
        $update = "UPDATE `user` SET `company_name`= '$cname',`company_direct_contact_person_name`= '$cdcpname',`email`= '$cemail',
        `phone`= '$cphone',`company_alter_phone`= '$caphone',`standing_service_per_hour_charge`= '$ssphcharge',`per_petrol_charge`= '$ppcharge',
        `company_license_document`= '$filwwithnewname1',`insurance_document`= '$filewithnewname2',`auto_insurance_document`= '$filwwithnewname3',
        `w9_Form_document`= '$filwwithnewname4',`state_operating_license_document`= '$filwwithnewname5',`user_agreement_document`= '$filwwithnewname6',
        `password`= '$cpasswprd',`address`= '$caddress',`status`= '$status' WHERE `id`= $cid";
         $update_query = mysqli_query($conn,$update);
        if($update_query)
        {
            // 1
            if(isset($_FILES["new_clicensedocument"]["name"]))
            {
                move_uploaded_file($filetemploc1,$target_dir.$filwwithnewname1);
                // unlink($target_dir.$_POST['old_clicensedocument']);
            }
            // 2
            if(isset($_FILES["new_insurancedocument"]["name"]))
            {
                move_uploaded_file($filetemploc2,$target_dir.$filewithnewname2);
                // unlink($target_dir.$_POST['old_insurancedocument']);
            }
            // 3
            if(isset($_FILES["new_aidocument"]["name"]))
            {
                move_uploaded_file($filetemploc3,$target_dir.$filwwithnewname3);
                // unlink($target_dir.$_POST['old_aidocument']);
            }
            // 4
            if(isset($_FILES["new_wformdocument"]["name"]))
            {
                move_uploaded_file($filetemploc4,$target_dir.$filwwithnewname4);
                // unlink($target_dir.$_POST['old_wformdocument']);
            }
            // 5
            if(isset($_FILES["new_splicensedocument"]["name"]))
            {
                move_uploaded_file($filetemploc5,$target_dir.$filwwithnewname5);
                // unlink($target_dir.$_POST['old_splicensedocument']);
            }
            // 6
            if(isset($_FILES["new_uagreementdocument"]["name"]))
            {
                move_uploaded_file($filetemploc6,$target_dir.$filwwithnewname6);
                // unlink($target_dir.$_POST['old_uagreementdocument']);
            }
                                  
            ?>
                <script>alert("Vendor record Updated Successfully");
                window.location.href = "../manage_company_profile.php";
                </script>
            <?php
        }   
        
    }
                        
    // manage_company_profile
    
    
    
    
    // update_guard_account_btn
    
    if(isset($_POST['update_guard_account_btn']))
    {
        
        $gid = $_POST["id"];
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $email = $_POST["email"];;
        $service = $_POST["service"];
        $address = $_POST["address"];
        $country = $_POST["country"];
        $phone = $_POST["phone"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $status = $_POST["status"];
        
        // 1                    
        if(empty($_FILES["new_image"]["name"]))
        {
            $filwwithnewname =  $_POST['old_image'];
        }
        elseif(isset($_FILES["new_image"]["name"]))
        {
                                 
            $target_dir = "../upload/";
            $new_image = $_FILES['new_image']['name'];
            $target_file = $target_dir . basename($new_image);
            $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $filwwithnewname = date('Ydmis')."Guard_Image.".$fileType;
                                  
            $filetype = $_FILES['new_image']['type'];
            $filesize = $_FILES['new_image']['size'];
            $filetemploc = $_FILES['new_image']['tmp_name'];
                                 
        }
        
        
     
                        
        $update = "UPDATE `user` SET `first_name`= '$fname',`last_name`= '$lname',`service`= '$service',`email`= '$email',
        `username`= '$username',`phone`= '$phone',`password`= '$password',`address`= '$address',`country`= '$country',
        `profile`= '$filwwithnewname',`status`= '$status' WHERE `id`= $gid";
        $excec = mysqli_query($conn,$update);
        if($excec)
        {
            if(isset($_FILES["new_image"]["name"]))
            {
                move_uploaded_file($filetemploc,$target_dir.$filwwithnewname);
                unlink($target_dir.$_POST['old_image']);
            }
                                                                        
            ?>
                <script>
                alert("Guard Account Updated Successfully");
                window.location.href = "../manage_guard.php";
                </script>
            <?php 
        }
        else
        {
            ?>
            <script>
                alert("Something Went Wrong");
                window.location.href = "../manage_guard.php";
            </script>
            <?php 
        }
            
    }
        
 // update_guard_account_btn
 
 
 
 
     // update vendor
    
    if(isset($_POST['update_vendor_account_btn']))
    {
        
        $id = $_POST['id'];
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];;
        $email = $_POST["email"];
        $password = $_POST["password"];
        $status = $_POST["status"];
    
        $update = "UPDATE `user` SET `first_name` = '$fname', `last_name` = '$lname', `email`= '$email',
        `password`= '$password',`status`= '$status' WHERE `id`= $id";
        $excec = mysqli_query($conn,$update);
        if($excec)
        {
            ?>
            <script>
            alert("Vendor Account Updated Successfully");
            window.location.href = "../manage_vendor.php";
            </script>
            <?php 
        }
        else
        {
            ?>
            <script>
            alert("Something Went Wrong");
            window.location.href = "../manage_vendor.php";
            </script>
            <?php 
        }
    
    }
        
        
    // update vendor





?>