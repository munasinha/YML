<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="../css/dataTables.bootstrap.min.css"/>
        
      <?php
        include '../model/employee_model.php';
        $emp_obj = new Employee();  ///  creating the user Object
        $emp_res = $emp_obj->get_total_employee_count();
        $emp_row = $emp_res->fetch_assoc();
        $role_result= $emp_obj->get_emp_roles();
        include '../model/patient_model.php';
        $patient_obj = new Patient(); //create patient object

        include '../model/appointment_model.php';
        $appointment_obj = new Appointment();  ///  creating the appointment Object
        $blood_tests = $appointment_obj->get_blood_tests();
        $urine_tests = $appointment_obj->get_urine_tests();
        $other_tests = $appointment_obj->get_other_tests();

        include '../model/third_party_model.php';
        $lab_obj = new Thirdparty();  ///  creating the appointment Object
        
        $doc_res = $lab_obj->get_all_docs();

        $temp= 0; //to get checkbox values;
      ?>

    </head>

    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">&nbsp;</div>
            </div>
            <div class="row">
                <?php include_once('../includes/top_row.php');?>
            </div>
            <div class="row">
                <div class="col-md-12">&nbsp;</div>
            </div>
            <div class="row">
                <h1 style="margin:auto;">Appointment</h1>
            </div>
            <div class="row">
                <div class="col-md-12">&nbsp;</div>
            </div>
        </div>
        <div class="row">
            &nbsp;
        </div>
        <div class="row">
            <?php include_once("../includes/side-nav.php");?>
            <div class="col-md-9">
                <?php  
                   /* if(isset($_GET["msg"]))
                    {
                ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-danger">
                                <?php

                                $msg=$_REQUEST["msg"];
                                $msg=  base64_decode($msg);
                                echo $msg;
                                ?>

                            </div>
                        </div>
                    </div>
                <?php
                    }*/
                ?>
                <ul class="nav nav-tabs" role="tablist" >
                    <li class="nav-item">
                        <a href="#sum" class="nav-link <?php if(!isset($_GET['tab'])){?> active <?php } ?>" role="tab" data-toggle="tab">Today Summary</a>
                    </li>
                    <li class="nav-item">
                        <a href="#add" class="nav-link <?php if(isset($_GET['tab'])){?> active <?php } ?>" role="tab" data-toggle="tab">Add Appointment</a>
                    </li>
                    <li class="nav-item">
                        <a href="#history" class="nav-link" role="tab" data-toggle="tab">History</a>
                    </li>
                </ul>
                
                <div class="tab-content" >
                    <div role="tabpanel" class="tab-pane  <?php if(!(isset($_REQUEST['tab']))){?>active<?php }?>" id="sum">
                        <div class="row">
                            &nbsp;
                        </div>
                        <div class="col-md-3" style="height: 200px;background-color:#1b4f3c">
                            <h1 style="color: #FFF;text-align:center;">Total Employees</h1>
                            <h1 style="color: #FFF;width:10%;text-align:center;margin:auto">
                                <?php echo $emp_row['c']?>
                            </h1>
                        </div>

                        <div class="col-md-8">
                            <table class="table table-responsive">
                                <tr style="background-color:gray;">
                                    <th>Employee ID</th>
                                    <th>Employee First Name</th>
                                    <th>Employee Last Name</th>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                </tr>
                                <?php 
                                $emp_res = $emp_obj->get_all_employees();
                                while($emp_row = $emp_res->fetch_assoc()){
                                    $emp_id = base64_encode($emp_row["employee_id"]);
                                    
                                ?>
                                <tr style="background-color:lightgray">
                                    <th style="text-align:center"><?php echo $emp_row["employee_id"];?></th>
                                    <th><?php echo $emp_row["employee_f_name"];?></th>
                                    <th><?php echo $emp_row["employee_l_name"];?></th>
                                    <td><a href="employee-profile.php?id=<?php echo $emp_id;?>" class="btn btn-success">Show Employee Profile</a></td>
                                    <td><a href="employee-edit.php?id=<?php echo $emp_id;?>" class="btn btn-primary">Edit Employee</a></td>
                                </tr>
                                <?php
                                }
                                ?>
                            </table>
                        </div>
                    </div>

                    <div role="tabpanel" class="tab-pane" id="add">
                        <?php  
                        if(isset($_GET["msg"]))
                            {
                        ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="alert alert-danger">
                                        <?php

                                        $msg=$_REQUEST["msg"];
                                        $msg=  base64_decode($msg);
                                        echo $msg;
                                        ?>

                                    </div>
                                </div>
                            </div>
                        <?php
                            }
                        ?>
                        <div class="row">
                            &nbsp;
                        </div>
                        <div class="col-md-12"> 
                            <form id="addUser" method="post" action="../controller/appointment_controller.php?status=add_appointment">
                                <div class="row">
                                    <div class="col-md-12">&nbsp;</div>
                                </div>

                                <input type="hidden" name="patient_id" value="0">
                                <input type="hidden" name="emp_id" value="<?php echo $emp_id;?>">

                                <div class="row">
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
                                    &nbsp;
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="control-label">Gender</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="radio" name="patient_gender" value="0" checked="checked"  />&nbsp;<label class="control-label">Male</label>
                                        &nbsp;
                                        <input type="radio" name="patient_gender" value="1" />&nbsp;<label class="control-label">Female</label>
                                    </div>

                                    <div class="col-md-3">
                                        <label class="control-label">Date of Birth</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="date" name="patient_dob" class="form-control" id="patient_dob" >
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">&nbsp;</div>
                                </div>

                                <div class="row">

                                    <div class="col-md-3">
                                        <label class="control-label">Doctor Name</label>
                                    </div>
                                    <div class="col-md-3">
                                        <select name="doctor" class="form-control">
                                            <?php 
                                            
                                            while($doc_row=$doc_res->fetch_assoc()){?>

                                                <option value=<?php echo $doc_row['doctor_id'];?>><?php echo "Dr. ". $doc_row['first_name']." ".$doc_row['last_name']?></option>
                                            <?php
                                            }
                                            ?>
                                            <option value="0">Other</option>
                                        </select>   
                                    </div>

                                    <div class="col-md-3">
                                        <label class="control-label">Contact Number</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" name="patient_cno" class="form-control" id="patient_cno" />
                                    </div>

                                </div>


                                <div class="row">
                                    <div class="col-md-12">&nbsp;</div>
                                </div>
                                
                                <div class="row" >
                                    <div class="col-md-12">&nbsp;</div>
                                </div>
                                
                                <div class="container" id="tests">
                                    <div class="col-md-4">
                                        <table class="table table-responsive">
                                            <tr>
                                                <th colspan="2">Blood Tests</th>
                                            </tr>
                                            <tr style="background-color:gray;">
                                                <th>Test</th>
                                                <th>Lab</th>
                                            </tr>
                                    
                                            <?php 
                                            while($appointment_row = $blood_tests->fetch_assoc()){
                                                $temp+=1;
                                            ?>
                                            <tr>
                                                <td>
                                                    <?php echo $appointment_row['test_name'];?>
                                                    <input type="checkbox" name="tests[]" value="<?php echo $appointment_row['test_id'].",".$temp;?>">
                                                </td>
                                                <td>
                                                    <select name="labs[]" class="form-control" id="lab">
                                                    <?php
                                                        $lab_res = $lab_obj->get_all_labs();
                                                        while($lab_row = $lab_res->fetch_assoc()){
                                                        ?>
                                                            <option name="lab" value="<?php  echo $lab_row["lab_id"]; ?>" >
                                                            <?php  echo $lab_row["lab_name"]; ?></option>
                                                        <?php
                                                        }
                                                    ?>
                                                    </select>
                                                </td>
                                            </tr>
                                        <?php
                                            }
                                        ?>
                                        </table>
                                    </div>

                                    <div class="col-md-4">
                                        <table class="table table-responsive">
                                            <tr>
                                                <th colspan="2">Urine Tests</th>
                                            </tr>
                                            <tr style="background-color:gray;">
                                                <th>Test</th>
                                                <th>Lab</th>
                                            </tr>
                                    
                                            <?php 
                                            while($appointment_row = $urine_tests->fetch_assoc()){
                                                $temp+=1;
                                            ?>
                                            <tr>
                                                <td>
                                                    <?php echo $appointment_row['test_name'];?>
                                                    <input type="checkbox" name="tests[]" value="<?php echo $appointment_row['test_id'].",".$temp;?>">
                                                </td>

                                                <td>
                                                    <select  name="labs[]" class="form-control" id="lab">
                                                    <?php
                                                        $lab_res = $lab_obj->get_all_labs();
                                                        while($lab_row = $lab_res->fetch_assoc()){
                                                        ?>
                                                            <option name="lab" value="<?php  echo $lab_row["lab_id"]; ?>" >
                                                            <?php  echo $lab_row["lab_name"]; ?></option>
                                                        <?php
                                                        }
                                                    ?>
                                                    </select>
                                                </td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                        </table>
                                    </div>

                                    <div class="col-md-4">
                                        <table class="table table-responsive">
                                            <tr>
                                                <th colspan="2">Other Tests</th>
                                            </tr>
                                            <tr style="background-color:gray;">
                                                <th>Test</th>
                                                <th>Lab</th>
                                            </tr>
                                    
                                            <?php 
                                            while($appointment_row = $other_tests->fetch_assoc()){
                                                $temp+=1;
                                            ?>
                                            <tr>
                                                <td>
                                                    <?php echo $appointment_row['test_name'];?>
                                                    <input type="checkbox" name="tests[]" value="<?php echo $appointment_row['test_id'].",".$temp;?>">
                                                </td>
                                                <td>
                                                    <select  name="labs[]" class="form-control" id="lab">
                                                    <?php
                                                        $lab_res = $lab_obj->get_all_labs();
                                                        while($lab_row = $lab_res->fetch_assoc()){
                                                        ?>
                                                            <option value="<?php  echo $lab_row["lab_id"]; ?>" >
                                                            <?php  echo $lab_row["lab_name"]; ?></option>
                                                        <?php
                                                        }
                                                    ?>
                                                    </select>
                                                </td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                        </table>
                                    </div>
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
                    </div>
                    
                    <div role="tabpanel" class="tab-pane" id="history">
                        <div class="row">
                            &nbsp;
                        </div>
                        <h1>Check History<h1>
                    </div>
                </div>
            </div>
        </div>
    </body>
   <?php
 
   ?>

    <script type="text/javascript">

        function readURL(input) {
        if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#prev_img1')
            .attr('src', e.target.result)
            .height(70)
            .width(80);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

        function readURL2(input) {
        if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#prev_img2')
            .attr('src', e.target.result)
            .height(70)
            .width(80);
        };

        reader.readAsDataURL(input.files[0]);
    }
}
        </script>
        <script type="text/javascript" src="../js/category.js"></script>
        <?php
        
        include '../includes/bootstrap_script_includes.php';

        ?>
</html>
