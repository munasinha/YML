<html>
    <head>
    
    <?php
     include '../includes/bootstrap_includes_css.php';
     include '../model/patient_model.php';

      $patient_obj = new Patient(); //create patient object
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
                    <a href="" class="btn btn-primary" >Logout</a>
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
                      <h1 align="center"><?php  echo strtoupper("Add Patient") ?></h1>
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

        <form id="addUser" enctype="multipart/form-data" method="post" action="../controller/patient_controller.php?status=add_patient">
            <div class="row" >

                <div class="col-md-3">
                    <label class="control-label">First Name</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" name="patient_fname" class="form-control" id="patient_fname" />
                        </div>

                    <div class="col-md-3">
                            <label class="control-label">Last Name</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" name="patient_lname" class="form-control" id="patient_lname"/>
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
                            <input type="text" name="patient_email" class="form-control" id="patient_email"/>
                        </div>



                    <div class="col-md-3">
                            <label class="control-label">Gender</label>
                        </div>
                        <div class="col-md-3">
                            <input type="radio" name="patient_gender" value="0" checked="checked"  />&nbsp;<label class="control-label">Male</label>
                            &nbsp;
                            <input type="radio" name="patient_gender" value="1" />&nbsp;<label class="control-label">Female</label>
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
                                <input type="date" name="patient_dob" class="form-control" id="patient_dob" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>



                    <div class="col-md-3">
                            <label class="control-label">NIC Number</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" name="patient_nic" class="form-control" id="patient_nic" />
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
                        <input type="text" name="patient_cno1" class="form-control"  id="patient_cno1" />
                    </div>



                    <div class="col-md-3">
                        <label class="control-label">Contact Number 2 (Mobile)</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="patient_cno2" class="form-control" id="patient_cno2" />
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
                        <input type="text" name="patient_add_no" class="form-control"  id="patient_add_no" placeholder="Number"/>
                    </div>
                    
                    <div class="col-md-3">
                        <input type="text" name="patient_add_street" class="form-control" id="patient_add_street" placeholder="Street"/>
                    </div>
                    
                    <div class="col-md-3">
                        <input type="text" name="patient_add_city" class="form-control" id="patient_add_city" placeholder="City"/>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-12">&nbsp;</div>
                </div>

                <div class="row">
                    
                    <div class="col-md-3">
                        <label class="control-label">Patient Image</label>
                    </div>
                    
                    <div class="col-md-3">
                        <input type="file" name="patient_img" id="patient_img" onchange="readURL(this)"  class="form-control" />
                        <br/>
                        <img id="prev_img"/>
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
