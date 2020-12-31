<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="../css/dataTables.bootstrap.min.css"/>
        
      <?php

        include '../model/third_party_model.php';
        $labObj = new Thirdparty();
        //$labResult=$labObj->get_all_labs();
        
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
                <h1 style="margin:auto">Partner Information</h1>
            </div>
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
        </div>
        
        <div class="row">
            &nbsp;
        </div>
        
        <?php include_once('../includes/side-nav.php');?>
        
        <div class="col-md-9">
            <ul class="nav nav-tabs" role="tablist" >
                <li class="nav-item">
                    <a href="#sum" class="nav-link active" role="tab" data-toggle="tab">Summary</a>
                </li>
                <li class="nav-item">
                    <a href="#add_lab" class="nav-link" role="tab" data-toggle="tab">Add Lab</a>
                </li>
                <li class="nav-item">
                    <a href="#add_doctor" class="nav-link" role="tab" data-toggle="tab">Add Doctor</a>
                </li>
            </ul>
            
            <div class="row">
                &nbsp;
            </div>

            <div class="tab-content" >
                <div role="tabpanel" class="tab-pane active" id="sum">
                    <div class="row">
                        <div class="col-md-6">
                            <h1>Lab Information </h1>
                            <table class="table table-responsive">
                                <tr style="background-color:gray;">
                                    <th>LAB ID</th>
                                    <th>Name</th>
                                    <th>Commision</th>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                </tr>
                                <?php 
                                $labRes = $labObj->get_all_labs();
                                while($lab_row = $labRes->fetch_assoc()){
                                    $lab_id = base64_encode($lab_row["lab_id"]);
                                    
                                ?>
                                <tr style="background-color:lightgray">
                                    <th style="text-align:center"><?php echo $lab_row["lab_id"];?></th>
                                    <th><?php echo $lab_row["lab_name"];?></th>
                                    <th><?php echo $lab_row["commission"];?></th>
                                    <td><a href="lab-profile.php?id=<?php echo $lab_id;?>" class="btn btn-success"> Lab Profile</a></td>
                                    <td><a href="lab-edit.php?id=<?php echo $lab_id;?>" class="btn btn-primary">Edit Lab</a></td>
                                </tr>
                                <?php
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                    
                            
                    <div class="row">
                        &nbsp;
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <h1>Doctor's Information </h1>
                            <table class="table table-responsive">
                                <tr style="background-color:gray;">
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Contact Number</th>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                </tr>
                                <?php 
                                $docResult=$labObj->get_all_docs();
                                while($doc_row = $docResult->fetch_assoc()){
                                    $doc_id = base64_encode($doc_row["doctor_id"]);
                                    
                                ?>
                                <tr style="background-color:lightgray">
                                    <th style="text-align:center"><?php echo $doc_row["doctor_id"];?></th>
                                    <th><?php echo "Dr.". $doc_row["first_name"]." ".$doc_row["last_name"];?></th>
                                    <th><?php echo $doc_row["contact_number"];?></th>
                                    <td><a href="doctor-profile.php?id=<?php echo $doc_id;?>" class="btn btn-success"> Doctor Profile</a></td>
                                    <td><a href="doctor-edit.php?id=<?php echo $doc_id;?>" class="btn btn-primary">Edit Doctor</a></td>
                                </tr>
                                <?php
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>

                <div role="tabpanel" class="tab-pane" id="add_lab">
                    <form id="addUser" enctype="multipart/form-data" method="post" action="../controller/thirdparty_controller.php?status=add_lab">
                        <div class="row" >

                            <div class="col-md-3">
                                <label class="control-label">Lab Name</label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" name="lab_name" class="form-control" id="lab_name" />
                            </div>

                            <div class="col-md-3">
                                <label class="control-label">Commission</label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" name="commission" class="form-control" id="commision"/>
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
                                <input type="text" name="lab_email" class="form-control" id="lab_email"/>
                            </div>

                            <div class="col-md-3">
                                <label class="control-label">Collector Number</label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" name="lab_collector_cno" class="form-control"  id="lab_collector_cno" />
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
                                <input type="text" name="lab_cno1" class="form-control"  id="lab_cno1" />
                            </div>

                            <div class="col-md-3">
                                <label class="control-label">Contact Number 2 (Mobile)</label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" name="lab_cno2" class="form-control" id="lab_cno2" />
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
                                <input type="text" name="lab_add_no" class="form-control"  id="lab_add_no" placeholder="Number"/>
                            </div>
                            
                            <div class="col-md-3">
                                <input type="text" name="lab_add_street" class="form-control" id="lab_add_street" placeholder="Street"/>
                            </div>
                            
                            <div class="col-md-3">
                                <input type="text" name="lab_add_city" class="form-control" id="lab_add_city" placeholder="City"/>
                            </div>

                        </div>

                        <div class="row">
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
                
                <div role="tabpanel" class="tab-pane" id="add_doctor">
                    <form id="addUser" enctype="multipart/form-data" method="post" action="../controller/thirdparty_controller.php?status=add_doc">
                        <div class="row" >
                            <div class="col-md-3">
                                <label class="control-label">First Name</label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" name="fname" class="form-control" id="fname" />
                            </div>

                            <div class="col-md-3">
                                <label class="control-label">Last Name</label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" name="lname" class="form-control" id="lname" />
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">&nbsp;</div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-3">
                                <label class="control-label">Contact Number</label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" name="cno" class="form-control"  id="cno" />
                            </div>
                        </div>

                        <div class="row">
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

            </div>
        </div>
    </body>
   <?php
        include '../includes/bootstrap_script_includes.php';
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

</html>
