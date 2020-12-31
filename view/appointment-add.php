<html>
    <head>
    
    <?php
       
        include '../includes/bootstrap_includes_css.php';
        
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
        <link rel='stylesheet' type="text/css" href="../css/test_style.css"/>
        <link rel='stylesheet' type="text/css" href="../css/tags.css"/>
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
        <?php 
            include_once('../includes/side-nav.php');
        ?>

        <div class="col-md-9">
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

            <div class="col-md-12">
            
                <div class="row">
                    <div class="col-md-4">
                        <form class="form-inline">
                            <input type="text" name="search" class="form-control" placeholder="NIC number" style="width:200px;margin:2px;"/>
                            <button type="submit" class="btn btn-lg btn-primary"><span class="glyphicon glyphicon-search">Search</span></button>
                            </span>&nbsp;
                        </form>
                    </div>
                </div>
                    
                <div class="row">
                    <div class="col-md-12">&nbsp;</div>
                </div>

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
                        <div class="test-container">
                            <div class="col-md-3">
                                <input type="text" class="form-control" placeholder="Test" id="test" name="test">    
                           </div>
                           <span class="test">FBC &nbsp;<span class="glyphicon glyphicon-remove"></span></span>
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
                    <div>
                </form>
                </div>
            </div>
        </div>
    </body>
    <?php
    include '../includes/bootstrap_script_includes.php';

    ?>
        <script type="text/javascript" src="../js/autofill.js"></script>
        <script type="text/javascript" src="../js/tags.js"></script>
        
        <script type="text/javascript">
           $(document).ready(function(){
                var d=[];
                var data;
              
                $("#test").keydown(function(){
                    var query = $("#test").val();
                    
                    $.ajax(
                        {
                            url:'../controller/appointment_controller.php?status=search_test',
                            method: 'POST',
                            data:{
                                search:1,
                                q:query
                            },
                            success:function(data_1){
                                d = data_1;
                            },
                            dataType:'text'
                        }
                    );
                    
                });
                
                /*$("#test").autofill({
                                       
                });*/

           });
           
        </script>

</html>
