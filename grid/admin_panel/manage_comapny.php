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
                <h1 class="page-title">Manage Company</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Manage Company</li>
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
                                            <th>Business name</th>
                                            <th>Email</th>
                                            <th>User name</th>
                                            <th>Phone</th>
                                            <th>Password</th>
                                            <th>Address</th>
                                            <th>Zipcode</th>
                                            <th>Country</th>
                                            <td>Status</td>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                               require_once("connection.php");
                                               $sql = "select * from user where role_id = 2";
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
                                                                    <td>'.$rec['business_name'].'</td>
                                                                    <td>'.$rec['email'].'</td>
                                                                    <td>'.$rec['username'].'</td>
                                                                    <td>'.$rec['phone'].'</td>
                                                                    <td>'.$rec['password'].'</td>
                                                                    <td>'.$rec['address'].'</td>
                                                                    <td>'.$rec['zipcode'].'</td>
                                                                    <td>'.$rec['country'].'</td>
                                                                    <td>'.$rec['status'].'</td>
                                                                    <td>'.$rec['created_at'].'</td>
                                                                    <td>
                                                                        <div class="btn-list">
                                                                            <a href="edit_company.php?id='.$rec['id'].'"><button id="bEdit" type="button" class="btn btn-sm btn-primary"><span class="fa fa-edit"></span></button></a>
                                                                            <a href="delete_company.php?id='.$rec['id'].'"><button id="bDelete" type="button" class="btn btn-sm btn-primary"><span class="fa fa-trash"></span></button></a>
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