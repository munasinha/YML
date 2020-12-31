<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css"/>        
      <?php
        include '../model/employee_model.php';
        $emp_obj = new Employee();  ///  creating the user Object
        $emp_res = $emp_obj->get_total_employee_count();
        $emp_row = $emp_res->fetch_assoc();
        $role_result= $emp_obj->get_emp_roles();
        
        include '../model/third_party_model.php';

        $third_party_obj = new Thirdparty(); //create employee object
        $stock_result= $third_party_obj->get_all_stock_types();
        $sup_result= $third_party_obj->get_all_suppliers();  
        $brand_result = $third_party_obj->get_all_brands();
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
                <h1 style="margin:auto">Stock</h1>
            </div>
            <div class="row">
                <div class="col-md-12">&nbsp;</div>
            </div>
        </div>

        <div class="row">
            &nbsp;
        </div>

        <div class="col-md-12">
            <?php include_once("../includes/side-nav.php");?>
           
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
                <ul class="nav nav-tabs" role="tablist" >
                    <li class="nav-item">
                        <a href="#sum" class="nav-link active" role="tab" data-toggle="tab">Summary</a>
                    </li>
                    <li class="nav-item">
                        <a href="#add_stock" class="nav-link" role="tab" data-toggle="tab">Add Stock</a>
                    </li>
                    <li class="nav-item">
                        <a href="#add_supplier" class="nav-link" role="tab" data-toggle="tab">Add Supplier</a>
                    </li>
                    <li class="nav-item">
                        <a href="#add_stock_category" class="nav-link" role="tab" data-toggle="tab">Add Stock Category</a>
                    </li>
                </ul>
            

                <div class="tab-content" >
                    <div role="tabpanel" class="tab-pane active" id="sum">
                        <div class="row">
                            &nbsp;
                        </div>
                        <div class="col-md-12">
                            <h1>Stock Summary</h1>
                            <table class="table table-responsive">
                                <tr style="background-color:gray;">
                                    <th>Number</th>
                                    <th>Stock Type</th>
                                    <th>Quantity</th>
                                    <th>Unit Cost</th>
                                    <th>Added on</th>
                                    <th>Expires On</th>
                                    <th>&nbsp;</th>
                                </tr>
                                <?php 
                                    $stock_res = $third_party_obj->get_all_stocks();
                                    $count =1;
                                    while($st_row = $stock_res->fetch_assoc()){
                                ?>
                                        <tr style="background-color:lightgray">
                                            <th style="text-align:center"><?php echo $count;?></th>
                                            <th><?php echo $st_row["category_name"];?></th>
                                            <th><?php echo $st_row["amount"];?></th>
                                            <th><?php echo $st_row["unit_price"];?></th>
                                            <th><?php echo $st_row["date_added"];?></th>
                                            <th><?php echo $st_row["expire"];?></th>
                                            <td><a href="employee-edit.php?id=<?php echo $emp_id;?>" class="btn btn-primary">Edit</a></td>
                                        </tr>
                                <?php
                                     $count+=1;
                                    }
                                ?>
                            </table>
                        </div>

                        <div class="row">
                            &nbsp;
                        </div>
                        <div class="col-md-12">
                            <h1>Supplier Information</h1>
                            <table class="table table-responsive">
                                <tr style="background-color:gray;">
                                    <th>Number</th>
                                    <th>Supplier Name</th>
                                    <th>Contact Person Name</th>
                                    <th>Email</th>
                                    <th>Contact Number</th>
                                    <th></th>
                                    <th>&nbsp;</th>
                                </tr>
                                <?php 
                                    $sup_res = $third_party_obj->get_all_suppliers();
                                    $count =1;
                                    while($sup_row = $sup_res->fetch_assoc()){
                                ?>
                                        <tr style="background-color:lightgray">
                                            <th style="text-align:center"><?php echo $count;?></th>
                                            <th><?php echo $sup_row["supplier_name"];?></th>
                                            <th><?php echo $sup_row["contact_person"];?></th>
                                            <th><?php echo $sup_row["email"];?></th>
                                            <th><?php echo $sup_row["con_num"];?></th>
                                            <th><?php echo $sup_row["add_num"]." ".$sup_row["street"]." ".$sup_row["city"];?></th>
                                            <td><a href="employee-edit.php?id=<?php echo $emp_id;?>" class="btn btn-primary">Edit</a></td>
                                        </tr>
                                <?php
                                     $count+=1;
                                    }
                                ?>
                            </table>
                        </div>
                        
                        <div class="row">
                            &nbsp;
                        </div>
                        <div class="col-md-8">
                            <h1>Stock categories</h1>
                            <table class="table table-responsive">
                                <tr style="background-color:gray;">
                                    <th>Number</th>
                                    <th>Category</th>
                                    <th>Unit</th>
                                    <th>&nbsp;</th>
                                </tr>
                                <?php 
                                    $stock_cat_res = $third_party_obj->get_all_stock_types();
                                    $count =1;
                                    while($st_cat_row = $stock_cat_res->fetch_assoc()){
                                ?>
                                        <tr style="background-color:lightgray">
                                            <th style="text-align:center"><?php echo $count;?></th>
                                            <th><?php echo $st_cat_row["category_name"];?></th>
                                            <th><?php echo $st_cat_row["metric"];?></th>
                                            <td><a href="employee-edit.php?id=<?php echo $emp_id;?>" class="btn btn-primary">Edit</a></td>
                                        </tr>
                                <?php
                                     $count+=1;
                                    }
                                ?>
                            </table>
                        </div>


                    </div>

                    <div role="tabpanel" class="tab-pane" id="add_stock">
                        <div class="row">
                            &nbsp;
                        </div>

                        
                            <form id="addUser" enctype="multipart/form-data" method="post" action="../controller/thirdparty_controller.php?status=add_stock">
                                <div class="row" >
                                    <div class="col-md-3">
                                        <label class="control-label">Stock Type</label>
                                    </div>
                                    <div class="col-md-3">
                                        <select name="stock_type" class="form-control" >
                                            <?php
                                                while($stock_row=$stock_result->fetch_assoc()){
                                            ?>
                                                <option value="<?php echo $stock_row['category_id'];?>"><?php echo $stock_row['category_name']?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    
                                    <div class="col-md-3">
                                        <label class="control-label">Supplier</label>
                                    </div>
                                    <div class="col-md-3">
                                        <select name="supplier" class="form-control" >
                                            <?php
                                                while($sup_row=$sup_result->fetch_assoc()){
                                            ?>
                                                <option value="<?php echo $sup_row['sup_id'];?>"><?php echo $sup_row['supplier_name']?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    &nbsp;
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="control-label">Quantity</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="number" name="stock_quantity" class="form-control" id="stock_quantity" />
                                    </div>
                                    
                                    <div class="col-md-3">
                                        <label class="control-label">Expire date</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="date" name="expire_date" class="form-control"  id="exp_date" />
                                    </div>
                                </div>  
                                
                                <div class="row">
                                    <div class="col-md-12">&nbsp;</div>
                                </div>
                                
                                <div class="row" >
                                    <div class="col-md-3">
                                        <label class="control-label">Unit Cost</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" name="unit_price" id="unit_price" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-12">&nbsp;</div>
                                </div>
                                
                                <div class="row">
                                    
                                    <div class="col-md-4">
                                        &nbsp;
                                    </div>

                                    <div class="col-md-6">
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
                    
                    <div role="tabpanel" class="tab-pane" id="add_supplier">
                        <div class="row">
                            &nbsp;
                        </div>
                        <div class="col-md-12">
                            <form id="addUser" enctype="multipart/form-data" method="post" action="../controller/thirdparty_controller.php?status=add_supp">
                                <div class="row" >

                                    <div class="col-md-3">
                                        <label class="control-label">Supplier Name</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" name="supplier_name" class="form-control" id="supplier_name" />
                                    </div>
                                    <div class="col-md-3">
                                        <label class="control-label">Contact Person</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" name="contact_person" class="form-control" id="contact_person" />
                                    </div>
                                </div>
                                <div class="row">
                                    &nbsp;
                                </div>
                                <div class="row">
                                    
                                    <div class="col-md-3">
                                        <label class="control-label">Contact number</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" name="con_num" class="form-control" id="sup_con_num" />
                                    </div>
                                    
                                    <div class="col-md-3">
                                        <label class="control-label">Email</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="email" name="email" class="form-control"  id="email" />
                                    </div>
                                </div>
                                    
                                <div class="row">
                                    &nbsp;
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="control-label">Address</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" name="num" class="form-control" id="num" placeholder="Number"/>
                                    </div>
                                    
                                    <div class="col-md-3">
                                        <input type="text" name="street" class="form-control"  id="street" placeholder="Street"/>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" name="city" class="form-control"  id="city" placeholder="City"/>
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
                    
                    <div role="tabpanel" class="tab-pane" id="add_stock_category">
                        <div class="row">
                            &nbsp;
                        </div>
                        <div class="col-md-12">
                            <form id="addUser" enctype="multipart/form-data" method="post" action="../controller/thirdparty_controller.php?status=add_stock_category">
                                <div class="row" >
                                    <div class="col-md-3">
                                        <label class="control-label">Stock Type</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" name="stock_type" class="form-control" id="stock_type" />
                                    </div>
                                    
                                    <div class="col-md-3">
                                        <label class="control-label">Unit</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" name="stock_unit" class="form-control" id="stock_unit" />
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
