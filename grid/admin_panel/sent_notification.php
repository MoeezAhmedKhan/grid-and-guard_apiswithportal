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
                <h1 class="page-title">Sent Notification</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Sent Notification</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <!-- Row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Manage</h3>
                        </div>
                        <div class="card-body">
                            <div class="col-md-12" style="display:flex;justify-content:center;">
                               <button type="button" class="btn btn-primary" id="individual" style="margin:5px">Individual</button>
                               <button type="button" class="btn btn-primary" id="company" id="company" style="margin:5px">Company</button>
                               <button type="button" class="btn btn-primary" id="vendor" style="margin:5px">Vendor</button>
                               <button type="button" class="btn btn-primary" id="guard" style="margin:5px">Guard</button>
                            </div>
                            <form method='POST' action="phpfiles/insertions.php">
                              <div class="container-fluide">
                                <div class="table-responsive" id="table-data"></div>
                                
                                
                              
                              </div>
                            </form>
                        </div>
                    </div>
                </div>
            <!-- End Row -->
            </div>
        <!-- CONTAINER CLOSED -->

    </div>
</div>
<!-- MAIN-CONTENT CLOSED-->

















<script src="assets/js/jquery-3.6.3.min.js"></script>

<script>
    $(document).ready(function(){
        
        // for individual
        $("#individual").on("click",function(e){
            $.ajax({
                url: "ajax/load-individual.php",
                type: "POST",
                success: function(data){
                    $("#table-data").html(data);
                }
            });
        });
        
        
        // for company
        $("#company").on("click",function(e){
            $.ajax({
                url: "ajax/load-company.php",
                type: "POST",
                success: function(data){
                    $("#table-data").html(data);
                }
            });
        });
        
        // for vendor
        $("#vendor").on("click",function(e){
            $.ajax({
                url: "ajax/load-vendor.php",
                type: "POST",
                success: function(data){
                    $("#table-data").html(data);
                }
            });
        });
        
        // for guard
        $("#guard").on("click",function(e){
            $.ajax({
                url: "ajax/load-guard.php",
                type: "POST",
                success: function(data){
                    $("#table-data").html(data);
                }
            });
        });
        
    });
</script>

<?php
require_once("footer.php");
?>