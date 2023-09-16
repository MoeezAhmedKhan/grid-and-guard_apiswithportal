<?php 

    require_once("../connection.php");
    $individual = "SELECT * FROM `user` where role_id = 3";
    $run = mysqli_query($conn,$individual);
    $row = mysqli_num_rows($run);
    if($row > 0)
    {
        ?>
        <table id="example" class="table table-bordered border text-nowrap mb-0 display nowrap" id="basic-edit">
            <thead>
                <tr>
                    <th></th>
                    <th>Check Item</th>
                    <th>S no.</th>
                    <td>Id</td>
                    <th>Company name</th>
                    <th>Company Person name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <td>Status</td>
                </tr>
            </thead>
            <tbody>

                <?php
                        while($rec = mysqli_fetch_array($run))
                        {
                            $sn = $index+1;
                                                        
                            echo '<tr>
                                    <td><input type="hidden" name="user_id" value='.$rec["id"].' /></td>
                                    <td><input type="checkbox" name="checkbox[]" value='.$rec["id"].' /></td>
                                    <td>'.$sn.'</td>
                                    <td>'.$rec['id'].'</td>
                                    <td>'.$rec['company_name'].'</td>
                                    <td>'.$rec['company_direct_contact_person_name'].'</td>
                                    <td>'.$rec['email'].'</td>
                                    <td>'.$rec['phone'].'</td>
                                    <td>'.$rec['status'].'</td>
                                    <td>
                                    </td>
                                </tr>';

                                    $index++;
                            }

                    ?>
                    </tbody>
                </table>
                
                
                
                <div class="col-sm-6 mt-5">
                    <div class="form-group">
                        <div class="controls" id="text_for_option1">
                            <input type="text" name="content" class="form-control" placeholder="Enter Notification Text.." required="">
                        </div>
                    </div>
                  </div>
                 <div class="col-sm-6">
    			    <div class="form-group">
                        <div class="controls">
                            <select name="purpose" class="form-control" >
                                <option value="order">Order Info</option>
                                <option value="promo">Promotion</option>
                            </select>
                        </div>
                    </div>
                </div>
                <button type="submit" name="BtnSendpush" class="btn btn-primary">Submit</button>
                
                
        <?php 
    }
    else
    {
        echo 0;
    }

?>