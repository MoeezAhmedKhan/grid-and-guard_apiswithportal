<?php

    session_start();
    if($_SESSION["role"] != '0')
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
                                <h1 class="page-title">Edit Sub Admin</h1>
                                <div>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Edit Sub Admin</li>
                                    </ol>
                                </div>
                            </div>
                            <!-- PAGE-HEADER END -->

                            <!-- ROW OPEN -->
                            <div class="row">

                            <?php

                                    require_once("connection.php");
                                    $Id = $_GET["id"];
                                    $select = "SELECT * FROM `users` WHERE id = '$Id'";
                                    $exec = mysqli_query($conn,$select);
                                    $rec = mysqli_fetch_array($exec);

                            ?>

                                <div class="col-lg-12 col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Edit</h3>
                                        </div>
                                        <div class="card-body">
                                            <form action="phpfiles/action.php" method="POST">
                                                <div class="form-row">
                                                    <div class="col-xl-6 mb-3">
                                                        <input type="hidden" class="form-control" name="id" value="<?php echo $rec['id'] ?>" id="validationDefault01" >
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-xl-6 mb-3">
                                                        <label for="validationDefault01">First name</label>
                                                        <input type="text" class="form-control" name="fname" value="<?php echo $rec['first_name'] ?>" id="validationDefault01" >
                                                    </div>
                                                    <div class="col-xl-6 mb-3">
                                                        <label for="validationDefault01">Last name</label>
                                                        <input type="text" class="form-control" name="lname" value="<?php echo $rec['last_name'] ?>" id="validationDefault01" >
                                                    </div>
                                                </div>
                                                
                                                <div class="form-row">
                                                    <div class="col-xl-6 mb-3">
                                                        <label for="validationDefault02">Email</label>
                                                        <input type="email" class="form-control" name="email" value="<?php echo $rec['email'] ?>" id="validationDefault02" >
                                                    </div>
                                                    <div class="col-xl-6 mb-3">
                                                        <label for="validationDefault01">Phone</label>
                                                        <input type="text" class="form-control" name="phone" value="<?php echo $rec['phone'] ?>" id="validationDefault01" >
                                                    </div>
                                                </div>
                                       
                                                
                                                <div class="form-row">
                                                    <div class="col-xl-12 mb-3">
                                                        <label for="validationDefault03">Password</label>
                                                        <input type="text" class="form-control" name="password" value="<?php echo $rec['password'] ?>" id="validate" >
                                                    </div>
                                                </div>
                                                
                                                <div class="form-row">
                                                    <div class="col-xl-12 mb-3">
                                                        <label for="validationDefault04">Status</label>
                                                        <select class="form-select form-control" name="status" id="validationDefault04">
                                                            <option selected disabled value="">Select</option>
                                                            <option value="active" <?php if($rec["status"] == "active"){echo "selected";} ?> >active</option>
                                                            <option value="suspended" <?php if($rec["status"] == "suspended"){echo "selected";} ?> >suspended</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            
                                                <button class="btn btn-primary" type="submit" name="update_sub_admin_btn">Create</button>
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