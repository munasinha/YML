<html>
    <head>
    
    <?php
     include '../includes/bootstrap_includes_css.php';
     include '../model/patient_model.php';

      $patient_obj = new Patient(); //create patient object
     
      $id = 0;
      if(isset($_GET['id'])){
        $id = base64_decode($_GET['id']);
      }else{
        header("Location:../view/patient.php");
      }
      $patient_res = $patient_obj->get_patient_details($_GET['id']);
      $patient_row = $patient_res->fetch_assoc();
      $id = base64_encode($patient_row["patient_id"]);

    ?>

    </head>

    <body>
        <div class="container">

            <div class="row">
                <div class="col-md-12">&nbsp;</div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <h4> <span class="glyphicon glyphicon-user"></span><span>TMS Tennakoon</span></h4>
                </div>
                
                <div class="col-md-8"><h4 align="center" >Yasas Medi Lab</h4></div>
                    <div class="col-md-1">
                    <a href="../controller/login_controller.php?status=logout" class="btn btn-primary" >Logout</a>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">&nbsp;</div>
            </div>

            <div class="row">
                <div class="col-md-2">
                    &nbsp;
                </div>

              <div class="col-md-10">
                  <div class="row">
                      <h1 align="center"><?php  echo strtoupper("Edit Patientt") ?></h1>
                  </div>
             </div>

            </div>
            <div class="row">
                <div class="col-md-12">&nbsp;</div>
            </div>
        <div class="row">
            <?php
                if(isset($_GET["msg"])){
            ?>
            <div class="col-md-12">
                <div class="alert alert-danger">
                    <?php
                        $msg=$_REQUEST["msg"];
                        $msg=  base64_decode($msg);
                        echo $msg;
                    ?>

                </div>
            </div>

            <?php
                }
            ?>

            <div class="col-md-12">
                <div id="alertDiv"></div>
            </div>
        </div>

        <form id="addUser" enctype="multipart/form-data" method="post" action="../controller/patient_controller.php?status=edit_patient&id=<?php echo $id; ?>">
            <div class="row" >
                <input type="hidden" value="<?php echo $patient_row["patient_id"];?>" name="patient_id">
                <div class="col-md-3">
                    <label class="control-label">First Name</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" name="patient_fname" class="form-control" id="patient_fname" value="<?php echo $patient_row["patient_f_name"];?>" />
                        </div>

                    <div class="col-md-3">
                            <label class="control-label">Last Name</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" name="patient_lname" class="form-control" id="patient_lname" value="<?php echo $patient_row["patient_l_name"];?>"/>
                        </div>

                </div>
                <div class="row">
                    <div class="col-md-12">&nbsp;</div>
                </div>
                <div class="row">

                        <div class="col-md-3">
                            <label class="control-label">Email</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" name="patient_email" class="form-control" id="patient_email"  value="<?php echo $patient_row["email"];?>"/>
                        </div>



                    <div class="col-md-3">
                            <label class="control-label">Gender</label>
                        </div>
                        <div class="col-md-3">
                            <?php
                                if($patient_row["gender"]==0){
                            ?>
                                 <input type="radio" name="patient_gender" value="0" checked="checked"  />&nbsp;<label class="control-label">Male</label>
                            &nbsp;
                            <input type="radio" name="patient_gender" value="1" />&nbsp;<label class="control-label">Female</label>
                            <?php
                                }else{
                            ?>
                                 <input type="radio" name="patient_gender" value="0"  />&nbsp;<label class="control-label">Male</label>
                            &nbsp;
                            <input type="radio" name="patient_gender" value="1" checked="checked" />&nbsp;<label class="control-label">Female</label>
                            <?php
                                }
                            ?>
                           
                        </div>

                </div>
                <div class="row">
                    <div class="col-md-12">&nbsp;</div>
                </div>
                <div class="row">

                        <div class="col-md-3">
                            <label class="control-label">Date of Birth</label>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group">
                                <input type="date" name="patient_dob" class="form-control" id="patient_dob" value="<?php echo $patient_row["d_o_b"];?>"/>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>



                    <div class="col-md-3">
                            <label class="control-label">NIC Number</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" name="patient_nic" class="form-control" id="patient_nic" value="<?php echo $patient_row["nic"]?>"/>
                        </div>

                </div>
                <div class="row">
                    <div class="col-md-12">&nbsp;</div>
                </div>

                <div class="row">

                    <div class="col-md-3">
                        <label class="control-label">Contact Number 1</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="patient_cno1" class="form-control"  id="patient_cno1" value="<?php echo $patient_row["telephone_number"];?>"/>
                    </div>



                    <div class="col-md-3">
                        <label class="control-label">Contact Number 2 (Mobile)</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="patient_cno2" class="form-control" id="patient_cno2" value="<?php echo $patient_row["telephone_number_2"];?>"/>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-12">&nbsp;</div>
                </div>

                <div class="row">

                    <div class="col-md-3">
                        <label class="control-label">Address</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="patient_add_no" class="form-control"  id="patient_add_no" placeholder="Number" value="<?php echo $patient_row["house_no"];?>"/>
                    </div>
                    
                    <div class="col-md-3">
                        <input type="text" name="patient_add_street" class="form-control" id="patient_add_street" placeholder="Street" value="<?php echo $patient_row["street"];?>"/>
                    </div>
                    
                    <div class="col-md-3">
                        <input type="text" name="patient_add_city" class="form-control" id="patient_add_city" placeholder="City" value="<?php echo $patient_row["town"];?>"/>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-12">&nbsp;</div>
                </div>

              
                    <div class="col-md-3">
                        <label class="control-label">Patient Image</label>
                    </div>
                    
                    <div class="col-md-3">
                        <input type="file" name="patient_img" id="patient_img" onchange="readURL(this)"  class="form-control" />
                        <br/>
                        <img id="prev_img"/>
                        <input type="hidden" value="<?php echo $patient_row["image_url"];?>" name="patient_img">
                    </div>

                </div>

                <div class="row" >
                    <div class="col-md-12">&nbsp;</div>
                </div>

                <div class="row">
                    <div class="col-md-5">
                        &nbsp;
                    </div>
                    <div class="col-md-5">
                        <button type="submit" class="btn btn-primary">
                            <span class="glyphicon glyphicon-floppy-disk"></span>&nbsp;  Save
                        </button>
                        <button type="reset" class="btn btn-danger">
                            <span class="glyphicon glyphicon-refresh"></span>&nbsp;  Reset
                        </button>
                    </div>

                </div>
                </form>
            </div>


        </body>
    <?php
    include '../includes/bootstrap_script_includes.php';

    ?>
        <script type="text/javascript" src="../js/user_validation.js"></script>
        <script type="text/javascript">

            function readURL(input) {
            if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#prev_img')
                .attr('src', e.target.result)
                .height(70)
                .width(80);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
            </script>

</html>
