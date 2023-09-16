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
                <h1 class="page-title">Manage Company Profile</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Manage Company Profile</li>
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
                            <div class="table-responsive">
                                <table id="example" class="table table-bordered border text-nowrap mb-0 display nowrap" id="basic-edit">
                                    <thead>
                                        <tr>
                                            <th>S no.</th>
                                            <td>Id</td>
                                            <td>Role Id</td>
                                            <th>Company name</th>
                                            <th>Company Direct Contact Person Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Company Alter Phone</th>
                                            <th>Address</th>
                                            <th>Standing Service Per Hour Charge</th>
                                            <th>Per Petrol Charge</th>
                                            <td>company_license_document</td>
                                            <th>insurance_document</th>
                                            <th>auto_insurance_document</th>
                                            <th>W9 Form Document</th>
                                            <th>State Operating License Document</th>
                                            <th>User Agreement Document</th>
                                            <th>Password</th>
                                            <td>Status</th>
                                            <th>Created At</th>
                                            <td>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                               require_once("connection.php");
                                               $sql = "select * from user where role_id = 3";
                                               $exec = mysqli_query($conn,$sql);
                                               $num = mysqli_num_rows($exec);
                                               $index = 0;
                                               if($num > 0)
                                               {
                                                    while($rec = mysqli_fetch_array($exec))
                                                    {
                                                        $sn = $index+1;
                                                        
                                                         echo '<tr>
                                                                    <td>'.$sn.'</td>
                                                                    <td>'.$rec['id'].'</td>
                                                                    <td>'.$rec['role_id'].'</td>
                                                                    <td>'.$rec['company_name'].'</td>
                                                                    <td>'.$rec['company_direct_contact_person_name'].'</td>
                                                                    <td>'.$rec['email'].'</td>
                                                                    <td>'.$rec['phone'].'</td>
                                                                    <td>'.$rec['company_alter_phone'].'</td>
                                                                    <td>'.$rec['address'].'</td>
                                                                    <td>'.$rec['standing_service_per_hour_charge'].'</td>
                                                                    <td>'.$rec['per_petrol_charge'].'</td>
                                                                    <td><a href="https://sassolution.org/neethane/grid/admin_panel/upload/'.$rec['company_license_document'].'"><i class="fa fa-cloud-download"></i></a></td>
                                                                    <td><a href="https://sassolution.org/neethane/grid/admin_panel/upload/'.$rec['insurance_document'].'"><i class="fa fa-cloud-download"></i><a/></td>
                                                                    <td><a href="https://sassolution.org/neethane/grid/admin_panel/upload/'.$rec['auto_insurance_document'].'"><i class="fa fa-cloud-download"></i><a/></td>
                                                                    <td><a href="https://sassolution.org/neethane/grid/admin_panel/upload/'.$rec['w9_Form_document'].'"><i class="fa fa-cloud-download"></i><a/></td>
                                                                    <td><a href="https://sassolution.org/neethane/grid/admin_panel/upload/'.$rec['state_operating_license_document'].'"><i class="fa fa-cloud-download"></i><a/></td>
                                                                    <td><a href="https://sassolution.org/neethane/grid/admin_panel/upload/'.$rec['user_agreement_document'].'"><i class="fa fa-cloud-download"></i><a/></td>
                                                                    <td>'.$rec['password'].'</td>
                                                                    <td>'.$rec['status'].'</td>
                                                                    <td>'.$rec['created_at'].'</td>
                                                                    <td>
                                                                        <div class="btn-list">
                                                                            <a href="edit_company_profile.php?id='.$rec['id'].'"><button id="bEdit" type="button" class="btn btn-sm btn-primary"><span class="fa fa-edit"></span></button></a>
                                                                            <a href="delete_company_profile.php?id='.$rec['id'].'"><button id="bDelete" type="button" class="btn btn-sm btn-primary"><span class="fa fa-trash"></span></button></a>
                                                                        </div>
                                                                    </td>
                                                                </tr>';

                                                                $index++;
                                                    }

                                                }
                                                else
                                                {
                                                    echo '<tr>
                                                            <td class"text-center">No Record Found</td>
                                                         </tr>';
                                                }

                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Row -->
        </div>
        <!-- CONTAINER CLOSED -->

    </div>
</div>
<!-- MAIN-CONTENT CLOSED-->



















<?php
require_once("footer.php");
?>