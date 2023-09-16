<?php
    // session_start();
    // if($_SESSION["role"] != "Admin")
    // {   
    //     header('location:index.php');
    // }
require_once("header.php");


?>







 <!-- MAIN-CONTENT -->
 <div class="main-content app-content mt-0">
                    <div class="side-app">

                        <!-- CONTAINER -->
                        <div class="main-container container-fluid">

                            <!-- PAGE-HEADER -->
                            <div class="page-header">
                                <h1 class="page-title">Create Individual Account</h1>
                                <div>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Create Individual Account</li>
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
                                            <form action="phpfiles/insertions.php" method="POST">
                                                <div class="form-row">
                                                    <div class="col-xl-6 mb-3">
                                                        <label for="validationDefault01">First name</label>
                                                        <input type="text" class="form-control" name="fname" required>
                                                    </div>
                                                    <div class="col-xl-6 mb-3">
                                                        <label for="validationDefault01">Last name</label>
                                                        <input type="text" class="form-control" name="lname" required>
                                                    </div>
                                                </div>
                                                
                                                  <div class="form-row">
                                                    <div class="col-xl-12 mb-3">
                                                        <label for="validationDefault01">Email</label>
                                                        <input type="email" class="form-control" name="email" required>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-row">
                                                    <div class="col-xl-6 mb-3">
                                                        <label for="validationDefault02">Phone</label>
                                                        <input type="text" class="form-control" name="phone" required>
                                                    </div>
                                                    <div class="col-xl-6 mb-3">
                                                        <label for="validationDefault01">Username</label>
                                                        <input type="text" class="form-control" name="username" required>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-row">
                                                    <div class="col-xl-12 mb-3">
                                                        <label for="validationDefault01">Address</label>
                                                        <input type="text" class="form-control" name="address" required>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-row">
                                                    <div class="col-xl-6 mb-3">
                                                        <label for="validationDefault01">Zip code</label>
                                                        <input type="text" class="form-control" name="zip" required>
                                                    </div>
                                                       <div class="col-xl-6 mb-3">
                                                        <label for="validationDefault02">Country</label>
                                                        <input type="text" class="form-control" name="country" required>
                                                    </div>
                                                </div>
                                                
                                                 <div class="form-row">
                                                    <div class="col-xl-12 mb-3">
                                                        <label for="validationDefault02">Password</label>
                                                        <input type="text" class="form-control" name="password" required>
                                                    </div>
                                                </div>
                                            
                                                <button class="btn btn-primary" type="submit" name="add_individual_account_btn">Create</button>
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






<?php require_once("footer.php"); ?>


