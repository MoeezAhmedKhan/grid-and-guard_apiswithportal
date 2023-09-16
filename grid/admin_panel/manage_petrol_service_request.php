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
                <h1 class="page-title">Petrol Service Request</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Petrol Service Request</li>
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
                         <form method='POST' action="phpfiles/insertions.php">
                            <div class="table-responsive">
                                <table id="example" class="table table-bordered border text-nowrap mb-0 display nowrap" id="basic-edit">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Check Item</th>
                                            <th>S no.</th>
                                            <td>Id</td>
                                            <th>User</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Service Address</th>
                                            <th>Week Days</th>
                                            <td>Petrols Daily</td>
                                            <th>Location</th>
                                            <th>Time</th>
                                            <th>Post Orders</th>
                                            <th>Status</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                               require_once("connection.php");
                                               $sql = "SELECT p.id,p.start_date,p.end_date,p.service_address,p.week_days,p.petrols_daily,p.location,p.time,p.post_order,p.status,p.created_at,u.business_name,u.company_name,u.first_name,u.last_name FROM add_petroling_service p INNER JOIN user u on u.id = p.user_id WHERE p.status = 'pending'";
                                               $exec = mysqli_query($conn,$sql);
                                               $num = mysqli_num_rows($exec);
                                               $index = 0;
                                               if($num > 0)
                                               {
                                                   
                                                    while($rec = mysqli_fetch_array($exec))
                                                    {
                                                        
                                                        $location = ''.$rec["location"].'';
                                                        $location = json_decode($location);
                                                        $latitude = $location->latitude;
                                                        $longitude = $location->longitude;
                                                        
                                                        // $w = $rec["week_days"];
                                                        // $string_w = implode(',',$w);
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        // // get location thorugh curl request
                                                        
                                                        $curl = curl_init();

                                                        curl_setopt_array($curl, array(
                                                          CURLOPT_URL => 'https://us1.locationiq.com/v1/reverse?key=pk.bd733b0aaf436f3ad0ef530a41ab5ee3&lat='.$latitude.'&lon='.$longitude.'&format=json',
                                                          CURLOPT_RETURNTRANSFER => true,
                                                          CURLOPT_ENCODING => '',
                                                          CURLOPT_MAXREDIRS => 10,
                                                          CURLOPT_TIMEOUT => 0,
                                                          CURLOPT_FOLLOWLOCATION => true,
                                                          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                                          CURLOPT_CUSTOMREQUEST => 'GET',
                                                        ));
                                                        
                                                        $response = curl_exec($curl);
                                                        
                                                        curl_close($curl);
                                                        
                                                         $newresp = json_decode($response, true);
                                                         
                                                        $Country = $newresp['address']['country'];
                                                        
                                                        
                
                                                        $sn = $index+1;
                                                        
                                                         echo '<tr>
                                                                    <td><input type="hidden" name="patrol_id" value='.$rec["id"].' /></td>
                                                                    <td><input type="checkbox" name="checkbox[]" value='.$rec["id"].' /></td>
                                                                    <td>'.$sn.'</td>
                                                                    <td name"id">'.$rec['id'].'</td>
                                                                    <td name="bankname">'.$rec['business_name'].''.$rec['company_name'].''.$rec['first_name'].'</td>
                                                                    <td name="iban_number">'.$rec['start_date'].'</td>
                                                                    <td>'.$rec['end_date'].'</td>
                                                                    <td name"id">'.$rec['service_address'].'</td>
                                                                    <td>'.$rec["week_days"].'</td>
                                                                    <td>'.$rec['petrols_daily'].'</td>
                                                                    <td>'.$Country.'</td>
                                                                    <td name"id">'.$rec['time'].'</td>
                                                                    <td name"id">'.$rec['post_order'].'</td>
                                                                    <td name"id">'.$rec['status'].'</td>
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
                                
                                
                                 <div class="col-sm-6">
                    			    <div class="form-group">
                                        <div class="controls">
                                            <select name="guard_id" class="form-control" >
                                                <?php 
                                                    
                                                    require_once("connection.php");
                                                    $fecth_guard = "SELECT u.id,u.first_name,u.last_name FROM guard_status s INNER JOIN user u on u.id = s.guard_id WHERE s.status = 'idle'";
                                                    $run_guard = mysqli_query($conn,$fecth_guard);
                                                    if(mysqli_num_rows($run_guard) > 0)
                                                    {
                                                        ?>
                                                        <option disabled>Select Guard</option>
                                                        <?php 
                                                        
                                                        while($guard_ar = mysqli_fetch_array($run_guard))
                                                        {
                                                            ?>
                                                            <option value="<?php echo $guard_ar['id'] ?>"><?php echo $guard_ar['first_name']." ".$guard_ar['last_name'] ?></option>
                                                            <?php 
                                                        }
                                                    }
                                                    else
                                                    {
                                                        ?>
                                                        <option>Gurad is not available for the job</option>
                                                        <?php 
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" name="PatrolBtnSendpush" class="btn btn-primary">Submit</button>
                                
                                
                            </div>
                         </form>
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