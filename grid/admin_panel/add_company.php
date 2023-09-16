<?php

 session_start();
  if(isset($_SESSION["role"]) && $_SESSION["role"] != '0') 
  {
    header('location:index.php');
  }

  require_once("header.php");

?>


 <!-- MAIN-CONTENT -->
 <div class="main-content app-content mt-0">
                    <div class="side-app">

                        <!-- CONTAINER -->
                        <div class="main-container container-fluid">

                            <!-- PAGE-HEADER -->
                            <div class="page-header">
                                <h1 class="page-title">Add Company Profile</h1>
                                <div>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Add Company Profile</li>
                                    </ol>
                                </div>
                            </div>
                            <!-- PAGE-HEADER END -->

                            <!-- ROW OPEN -->
                            <div class="row">

                                <div class="col-lg-12 col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Create</h3>
                                        </div>
                                        <div class="card-body">
                                            <form action="phpfiles/insertions.php" method="POST" enctype="multipart/form-data">
                                                <div class="form-row">
                                                    <div class="col-xl-6 mb-3">
                                                        <label for="validationDefault01">Company Name</label>
                                                        <input type="text" class="form-control" name="cname">
                                                    </div>
                                                    <div class="col-xl-6 mb-3">
                                                        <label for="validationDefault01">Company Direct Contact person name</label>
                                                        <input type="text" class="form-control" name="cdcpname">
                                                    </div>
                                                    <div class="col-xl-6 mb-3">
                                                        <label for="validationDefault01">Company Phone</label>
                                                        <input type="text" class="form-control" name="cphone">
                                                    </div>
                                                      <div class="col-xl-6 mb-3">
                                                        <label for="validationDefault01">Company Alter phone</label>
                                                        <input type="text" class="form-control" name="caphone">
                                                    </div>
                                                    <div class="col-xl-12 mb-3">
                                                        <label for="validationDefault01">Company Email</label>
                                                        <input type="email" class="form-control" name="cemail">
                                                    </div>
                                                    <div class="col-xl-12 mb-3">
                                                        <label for="validationDefault01">Company Address</label>
                                                        <input type="text" class="form-control" name="caddress">
                                                    </div>
                                                    <div class="col-xl-6 mb-3">
                                                        <label for="validationDefault01">Standing service per hour charge</label>
                                                        <input type="text" class="form-control" name="ssphcharge">
                                                    </div>
                                                    <div class="col-xl-6 mb-3">
                                                        <label for="validationDefault01">Per petrol charge</label>
                                                        <input type="text" class="form-control" name="ppcharge">
                                                    </div>
                                                     <div class="col-xl-6 mb-3">
                                                        <label for="validationDefault01">Company License document</label>
                                                        <input type="file" class="form-control" name="clicensedocument">
                                                    </div>
                                                    <div class="col-xl-6 mb-3">
                                                        <label for="validationDefault01">Insurance document</label>
                                                        <input type="file" class="form-control" name="insurancedocument">
                                                    </div>
                                                     <div class="col-xl-6 mb-3">
                                                        <label for="validationDefault01">Auto Insurance document</label>
                                                        <input type="file" class="form-control" name="aidocument">
                                                    </div>
                                                       <div class="col-xl-6 mb-3">
                                                        <label for="validationDefault01">W9 Form document</label>
                                                        <input type="file" class="form-control" name="wformdocument">
                                                    </div>
                                                    <div class="col-xl-6 mb-3">
                                                        <label for="validationDefault01">State operating License document</label>
                                                        <input type="file" class="form-control" name="splicensedocument">
                                                    </div>
                                                    <div class="col-xl-6 mb-3">
                                                        <label for="validationDefault01">User Agreement document</label>
                                                        <input type="file" class="form-control" name="uagreementdocument">
                                                    </div>
                                                     <div class="col-xl-12 mb-3">
                                                        <label for="validationDefault01">Password</label>
                                                        <input type="text" class="form-control" name="cpasswprd">
                                                    </div>
                                                </div>
                                                <button class="btn btn-primary" type="submit" name="add_company_btn">Create</button>
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