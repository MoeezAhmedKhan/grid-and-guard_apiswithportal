<?php
require_once("header.php");

?>



<!-- MAIN-CONTENT -->
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">Standing Request</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Standing Request</li>
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
                                            <th>User</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Service Address</th>
                                            <td>Petrols Daily</td>
                                            <td>Shift Start Time</td>
                                            <th>Specific Post Order</th>
                                            <th>Location</th>
                                            <th>Time</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                               require_once("connection.php");
                                               $sql = "SELECT `id`, `user_id`, `start_date`, `end_date`, `service_address`, `petrols_daily`, `shift_start_time`, `specific_post_order`, `location`, `time`, `created_at` FROM `add_standing_security`";
                                               $exec = mysqli_query($conn,$sql);
                                               $num = mysqli_num_rows($exec);
                                               $index = 0;
                                               if($num > 0)
                                               {
                                                   
                                                    while($rec = mysqli_fetch_array($exec))
                                                    {
                                                        $loc = json_decode($rec['location'],true);
                                                        
                                                        $sn = $index+1;
                                                        
                                                         echo '<tr>
                                                                    <td>'.$sn.'</td>
                                                                    <td name"id">'.$rec['id'].'</td>
                                                                    <td name="bankname">'.$rec['user_id'].'</td>
                                                                    <td name="iban_number">'.$rec['start_date'].'</td>
                                                                    <td>'.$rec['end_date'].'</td>
                                                                    <td name"id">'.$rec['service_address'].'</td>
                                                                     <td>'.$rec['petrols_daily'].'</td>
                                                                     <td>'.$rec['shift_start_time'].'</td>
                                                                     <td>'.$rec['specific_post_order'].'</td>
                                                                      <td>'.$lat.'</td>
                                                                    <td name"id">'.$rec['time'].'</td>
                                                                    <td name="iban_number">'.$rec['created_at'].'</td>
                                                                    <td>
                                                                        <div class="btn-list">
                                                                            <a><button id="bEdit" type="button" onclick="openAddMore('.$rec['id'].','.$index.')" class="btn btn-sm btn-primary edit-btn"><span class="fa fa-edit"></span> Update</button></a>
                                                                            <a href="delete_bank.php?id='.$rec['id'].'"><button id="bDelete" type="button" class="btn btn-sm btn-primary" onclick="ConfirmDelete()"><span class="fa fa-trash"></span></button></a>
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
            
            <div id="modal">
                <div id="modal-form">
                    <h2>Edit</h2>
                    <form method="POST" action="phpfiles/action.php">
                        <input type="hidden" name="id" id="id"> 
                        <!--<div class="form-row">-->
                        <!--    <div class="col-xl-12 mb-3">-->
                        <!--        <label for="validationDefault01">First name</label>-->
                        <!--        <input type="text" class="form-control" name="fname" id="Firstname" id="validationDefault01">-->
                        <!--    </div>-->
                        <!--</div>-->
                        <!--<div class="form-row">-->
                        <!--    <div class="col-xl-12 mb-3">-->
                        <!--        <label for="validationDefault01">Last name</label>-->
                        <!--        <input type="text" class="form-control" name="lname" id="Lastname" id="validationDefault01">-->
                        <!--    </div>-->
                        <!--</div>-->
                        <!--<div class="form-row">-->
                        <!--    <div class="col-xl-12 mb-3">-->
                        <!--        <label for="validationDefault01">Drop Of Location</label>-->
                        <!--        <input type="text" class="form-control" name="droploc" id="DropLocation" id="validationDefault01">-->
                        <!--    </div>-->
                        <!--</div>-->
                        
                         <div class="form-row">
                            <div class="col-xl-12 mb-3">
                                <label for="validationDefault01">Bank name</label>
                                <input type="text" class="form-control" name="bankname" id="Bank_name" id="validationDefault01">
                            </div>
                            <div class="col-xl-12 mb-3">
                                <label for="validationDefault01">Bank name</label>
                                <input type="text" class="form-control" name="iban_number" id="Iban_number" id="validationDefault01">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg" name="update_bank_btn">Update</button>
                    </form>
                    <div id="close-btn">X</div>
                </div>
            </div>
        </div>
        <!-- CONTAINER CLOSED -->

    </div>
</div>
<!-- MAIN-CONTENT CLOSED-->















<?php
require_once("footer.php");
?>

<script>
    // show modal
    $(document).on("click",".edit-btn",function(){
        $("#modal").show(); 
    });
    // hide modal
    $("#close-btn").on("click",function(){
        $("#modal").hide();
    });
    
    function openAddMore(id,index)
    {
        // document.getElementById('Firstname').value = document.getElementsByName('fname')[index].innerText;
        // document.getElementById('Lastname').value = document.getElementsByName('lname')[index].innerText;
        // document.getElementById('DropLocation').value = document.getElementsByName('droplocation')[index].innerText;
        
        document.getElementById('Bank_name').value = document.getElementsByName('bankname')[index].innerText;
        document.getElementById('Iban_number').value = document.getElementsByName('iban_number')[index].innerText;
        document.getElementsByName('id')[0].value = id;
    }
</script>