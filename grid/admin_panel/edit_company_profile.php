<?php

 session_start();
//   if(isset($_SESSION["role"]) && $_SESSION["role"] != '0') 
//   {
//     header('location:index.php');
//   }

  require_once("header.php");

?>


 <!-- MAIN-CONTENT -->
 <div class="main-content app-content mt-0">
                    <div class="side-app">

                        <!-- CONTAINER -->
                        <div class="main-container container-fluid">

                            <!-- PAGE-HEADER -->
                            <div class="page-header">
                                <h1 class="page-title">Edit Company Profile</h1>
                                <div>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Edit Company Profile</li>
                                    </ol>
                                </div>
                            </div>
                            <!-- PAGE-HEADER END -->

                            <!-- ROW OPEN -->
                            <div class="row">
                                
                                <?php

                                    require_once("connection.php");
                                    $Id = $_GET["id"];
                                    $select = "SELECT * FROM `user` WHERE id = '$Id'";
                                    $exec = mysqli_query($conn,$select);
                                    $rec = mysqli_fetch_array($exec);

                                ?>

                                <div class="col-lg-12 col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Edit</h3>
                                        </div>
                                        <div class="card-body">
                                            <form action="phpfiles/action.php" method="POST" enctype="multipart/form-data">
                                                <div class="form-row">
                                                    <input type="hidden"  name="cid" value="<?php echo $rec['id'] ?>">
                                                    <div class="col-xl-6 mb-3">
                                                        <label for="validationDefault01">Company Name</label>
                                                        <input type="text" class="form-control"  name="cname" value="<?php echo $rec['company_name'] ?>">
                                                    </div>
                                                    <div class="col-xl-6 mb-3">
                                                        <label for="validationDefault01">Company Direct Contact person name</label>
                                                        <input type="text" class="form-control" name="cdcpname" value="<?php echo $rec['company_direct_contact_person_name'] ?>">
                                                    </div>
                                                    <div class="col-xl-6 mb-3">
                                                        <label for="validationDefault01">Company Phone</label>
                                                        <input type="text" class="form-control" name="cphone" value="<?php echo $rec['phone'] ?>">
                                                    </div>
                                                      <div class="col-xl-6 mb-3">
                                                        <label for="validationDefault01">Company Alter phone</label>
                                                        <input type="text" class="form-control" name="caphone" value="<?php echo $rec['company_alter_phone'] ?>">
                                                    </div>
                                                    <div class="col-xl-12 mb-3">
                                                        <label for="validationDefault01">Company Email</label>
                                                        <input type="email" class="form-control" name="cemail" value="<?php echo $rec['email'] ?>">
                                                    </div>
                                                    <div class="col-xl-12 mb-3">
                                                        <label for="validationDefault01">Company Address</label>
                                                        <input type="text" class="form-control" name="caddress" value="<?php echo $rec['address'] ?>">
                                                    </div>
                                                    <div class="col-xl-6 mb-3">
                                                        <label for="validationDefault01">Standing service per hour charge</label>
                                                        <input type="text" class="form-control" name="ssphcharge" value="<?php echo $rec['standing_service_per_hour_charge'] ?>">
                                                    </div>
                                                    <div class="col-xl-6 mb-3">
                                                        <label for="validationDefault01">Per petrol charge</label>
                                                        <input type="text" class="form-control" name="ppcharge" value="<?php echo $rec['per_petrol_charge'] ?>">
                                                    </div>
                                                     <div class="col-xl-6 mb-3">
                                                        <label for="validationDefault01">Company License document</label>
                                                        <input type="file" class="form-control" name="new_clicensedocument">
                                                        <input type="hidden" class="form-control" name="old_clicensedocument" value="<?php echo $rec['company_license_document'] ?>">
                                                    </div>
                                                    <div class="col-xl-6 mb-3">
                                                        <label for="validationDefault01">Insurance document</label>
                                                        <input type="file" class="form-control" name="new_insurancedocument">
                                                        <input type="hidden" class="form-control" name="old_insurancedocument" value="<?php echo $rec['insurance_document'] ?>">
                                                    </div>
                                                     <div class="col-xl-6 mb-3">
                                                        <label for="validationDefault01">Auto Insurance document</label>
                                                        <input type="file" class="form-control" name="new_aidocument">
                                                        <input type="hidden" class="form-control" name="old_aidocument" value="<?php echo $rec['auto_insurance_document'] ?>">
                                                    </div>
                                                       <div class="col-xl-6 mb-3">
                                                        <label for="validationDefault01">W9 Form document</label>
                                                        <input type="file" class="form-control" name="new_wformdocument">
                                                        <input type="hidden" class="form-control" name="old_wformdocument" value="<?php echo $rec['w9_Form_document'] ?>">
                                                    </div>
                                                    <div class="col-xl-6 mb-3">
                                                        <label for="validationDefault01">State operating License document</label>
                                                        <input type="file" class="form-control" name="new_splicensedocument">
                                                        <input type="hidden" class="form-control" name="old_splicensedocument" value="<?php echo $rec['state_operating_license_document'] ?>">
                                                    </div>
                                                    <div class="col-xl-6 mb-3">
                                                        <label for="validationDefault01">User Agreement document</label>
                                                        <input type="file" class="form-control" name="new_uagreementdocument">
                                                        <input type="hidden" class="form-control" name="old_uagreementdocument" value="<?php echo $rec['user_agreement_document'] ?>">
                                                    </div>
                                                     <div class="col-xl-12 mb-3">
                                                        <label for="validationDefault01">Password</label>
                                                        <input type="text" class="form-control" name="cpasswprd" value="<?php echo $rec['password'] ?>">
                                                    </div>
                                                    
                                                    <div class="col-xl-12 mb-3">
                                                        <label for="validationDefault04">Status</label>
                                                        <select class="form-select form-control" name="status" id="validationDefault04">
                                                            <option selected disabled value="">Select</option>
                                                            <option value="active" <?php if($rec["status"] == "active"){echo "selected";} ?> >active</option>
                                                            <option value="suspended" <?php if($rec["status"] == "suspended"){echo "selected";} ?> >suspended</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <button class="btn btn-primary" type="submit" name="edit_company_profile_btn">Create</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>                  
                            </div>
                            <!-- ROW CLOSED -->
                        </div>
                        <!-- CONTAINER CLOSED -->
                    </div>
                </div>
                <!-- MAIN-CONTENT CLOSED -->
            </div>










<?php
require_once("footer.php");
?>