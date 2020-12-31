<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="../css/dataTables.bootstrap.min.css"/>
        
      <?php
        include '../model/patient_model.php';
        $patient_obj = new Patient();  ///  creating the patient Object
        $patient_res = $patient_obj->get_total_patient_count();
        $patient_row = $patient_res->fetch_assoc();
       
      ?>

    </head>

    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">&nbsp;</div>
            </div>
            <div class="row">
                <?php include_once("../includes/top_row.php");?>
            </div>
            <div class="row">
                <div class="col-md-12">&nbsp;</div>
            </div>
            <div class="row">
                <h1 style="margin:auto;">Patient</h1>
            </div>
            <div class="row">

            </div>
        </div>
        
        <?php include_once("../includes/side-nav.php");?>
        
        <div class="col-md-9">
            <ul class="nav nav-tabs" role="tablist" >
                <li class="nav-item">
                    <a href="#sum" class="nav-link <?php if(!(isset($_REQUEST['tab']))){?>active<?php }?>" role="tab" data-toggle="tab">Summary</a>
                </li>
                <li class="nav-item">
                    <a href="#add_patient" class="nav-link <?php if(isset($_GET['tab'])){?>active<?php }?>" role="tab" data-toggle="tab">Add Patient</a>
                </li>
                <li class="nav-item">
                    <a href="#search" class="nav-link" role="tab" data-toggle="tab">Search</a>
                </li>
            </ul>
            
            <div class="row">
                &nbsp;
            </div>
            
            <div class="tab-content" >
                <div role="tabpanel" class="tab-pane  <?php if(!(isset($_REQUEST['tab']))){?>active<?php }?>" id="sum">
                    <div class="row">
                        <div class="col-md-3 col-md-offset-1 panel" style="height: 200px;background-color:#1b4f3c">
                            <h1 style="color: #FFF;text-align:center;">Total Patients</h1>
                            <h1 style="color: #FFF;width:10%;text-align:center;margin:auto">
                                <?php echo $patient_row['c']?>
                            </h1>
                        </div>
                        <div class="col-md-6 col-md-offset-1 panel">
                            <table class="table table-responsive">
                                <tr style="background-color:gray;">
                                    <th>Patient ID</th>
                                    <th>Patient First Name</th>
                                    <th>Patient Last Name</th>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                </tr>
                                <?php 
                                $patient_res = $patient_obj->get_all_patients();
                                while($patient_row = $patient_res->fetch_assoc()){
                                    $patient_id = base64_encode($patient_row["patient_id"]);
                                    
                                ?>
                                <tr style="background-color:lightgray">
                                    <th style="text-align:center"><?php echo $patient_row["patient_id"];?></th>
                                    <th><?php echo $patient_row["patient_f_name"];?></th>
                                    <th><?php echo $patient_row["patient_l_name"];?></th>
                                    <td><a href="patient-profile.php?id=<?php echo $patient_id;?>" class="btn btn-success">Show Patient Profile</a></td>
                                    <td><a href="patient-edit.php?id=<?php echo $patient_id;?>" class="btn btn-primary">Edit Patient</a></td>
                                </tr>
                                <?php
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
                
                <div role="tabpanel" class="tab-pane" id="add_patient">

                <div class="row">
                    <?php
                    if(isset($_GET["msg"]))
                    {
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
                                <input type="date" name="patient_dob" class="form-control" id="patient_dob" />
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
                
                <div role="tabpanel" class="tab-pane" id="search">
                    <div class="row">
                        <div class="col-md-4">
                            <form class="form-inline">
                                <input type="text" name="search_pat" id="search_pat" class="form-control" placeholder="NIC number,Name or Patient Id" style="width:200px;margin:2px;"/>
                                <button type="submit" class="btn btn-lg btn-primary"><span class="glyphicon glyphicon-search">Search</span></button>
                                </span>&nbsp;
                            </form>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12" id="result">
                            
                        </div>
                    </div>

                </div>
                

            </div>
        </div>
    </body>
   <?php
        include '../includes/bootstrap_script_includes.php';
   ?>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#search_pat').keyup(function(){
                var txt = $(this).val();
            
                if(txt !=''){
                    $.ajax({
                        url:'../controller/patient_controller.php?status=search',
                        method:"POST",
                        data:{search:txt},
                        dataType:"text",
                        success:function(data){
                            $('#result').html(data);
                        }
                    });
                }else{ 
                    $('#result').html('');
                }
            });
        });
    </script>
    
</html>
