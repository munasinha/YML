<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="../css/dataTables.bootstrap.min.css"/>
        
      <?php
        include '../model/equipment_model.php';
        $eq_obj = new Equipment();  ///  creating the user Object    
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
                <h1 style="margin:auto;">Equipment</h1>
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
               
                <ul class="nav nav-tabs" role="tablist" >
                    <li class="nav-item">
                        <a href="#sum" class="nav-link <?php if(!(isset($_REQUEST['tab']))){?>active<?php }?>" role="tab" data-toggle="tab">Summary</a>
                    </li>
                    <li class="nav-item">
                        <a href="#add" class="nav-link  <?php if((isset($_REQUEST['tab']))){?>active<?php }?>" role="tab" data-toggle="tab">Add Equipment</a>
                    </li>
                    <li class="nav-item">
                        <a href="#schedule" class="nav-link" role="tab" data-toggle="tab">Schedule Maintainance</a>
                    </li>
                </ul>

                <div class="tab-content" >
                    
                    <div role="tabpanel" class="tab-pane <?php if(!(isset($_REQUEST['tab']))){?>active<?php }?>" id="sum">
                    <div class="row">
                            &nbsp;
                        </div>
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
                        
                        <div class="col-md-10">
                            <table class="table table-responsive">
                                <tr style="background-color:gray;">
                                    <th>Number</th>
                                    <th>Equipment</th>
                                    <th>Manufacturer</th>
                                    <th>Last Maintainace</th>
                                    <th>Next Maintainace</th>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                </tr>
                                <?php 
                                $eq_res = $eq_obj->get_all_equipment();
                                $count =1;
                                while($eq_row = $eq_res->fetch_assoc()){
                                    $eq_id = base64_encode($eq_row["equ_id"]);
                                    
                                ?>
                                <tr style="background-color:lightgray">
                                    <th style="text-align:center"><?php echo $count;?></th>
                                    <th><?php echo $eq_row["equ_name"];?></th>
                                    <th><?php echo $eq_row["manufacture"];?></th>
                                    <th><?php echo $eq_row["prev_date"];?></th>
                                    <th><?php echo $eq_row["sh_date"];?></th>
                                    <td><a href="employee-profile.php?id=<?php echo $eq_id;?>" class="btn btn-success">Show Employee Profile</a></td>
                                    <td><a href="employee-edit.php?id=<?php echo $eq_id;?>" class="btn btn-primary">Edit Employee</a></td>
                                </tr>
                                <?php
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                   
                    <div role="tabpanel" class="tab-pane <?php if((isset($_REQUEST['tab']))){?>active<?php }?>" id="add">
                        <div class="row">
                            &nbsp;
                        </div>
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
                            <form id="addUser" enctype="multipart/form-data" method="post" action="../controller/equipment_controller.php?status=add_equipment">
                                    <div class="row" >
                                        <div class="col-md-3">
                                            <label class="control-label">Equipment Name</label>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" name="equ_name" class="form-control" id="equ_name" />
                                        </div>

                                        <div class="col-md-3">
                                            <label class="control-label">Purchased Date</label>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="date" name="purchase_date" class="form-control" id="purchase_date"/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">&nbsp;</div>
                                    </div>
                                        
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="control-label">Manufacturer</label>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" name="manufacturer" class="form-control" id="manufacturer"/>
                                        </div>

                                        <div class="col-md-3">
                                            <label class="control-label">Comment</label>
                                        </div>
                                        <div class="col-md-3">
                                            <textarea class="form-control" name="comment" id="comment" rows="3"></textarea>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">&nbsp;</div>
                                    </div>

                                    <div class="row" >
                                        <div class="col-md-3">
                                            <label class="control-label">Maintainance Date</label>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="date" name="maintenance_date" class="form-control" id="maintenance_date"/>
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

                    <div role="tabpanel" class="tab-pane" id="schedule">
                        <div class="row">
                            &nbsp;
                        </div>
                        <div class="col-md-12"> 
                            <form id="addUser" enctype="multipart/form-data" method="post" action="../controller/equipment_controller.php?status=sh_maintainance">
                                    <div class="row" >
                                        <div class="col-md-3">
                                            <label class="control-label">Equipment</label>
                                        </div>
                                        <div class="col-md-3">
                                            <select name="equ" class="form-control">
                                                <?php
                                                    $res = $eq_obj->get_all_equipment();
                                                    while($row = $res->fetch_assoc()){
                                                ?>
                                                    <option value="<?php echo $row['equ_id'];?>"><?php echo $row['equ_name'];?></option>
                                                <?php
                                                    }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="col-md-3">
                                            <label class="control-label">Shedule Date</label>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="date" name="sh_date" class="form-control" id="sh_date"/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">&nbsp;</div>
                                    </div>
                                        
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="control-label">Comment</label>
                                        </div>
                                        <div class="col-md-3">
                                            <textarea class="form-control" name="comment" id="comment" rows="3"></textarea>
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
