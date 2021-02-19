<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="../css/dataTables.bootstrap.min.css"/>
        
      <?php
        include '../model/test_model.php';
        $test_obj = new Test();  ///  creating the user Object        
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
                <h1 style="margin:auto;">Tests</h1>
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
                        <a href="#add" class="nav-link" role="tab" data-toggle="tab">Add Test</a>
                    </li>
                    <li class="nav-item">
                        <a href="#search" class="nav-link" role="tab" data-toggle="tab">Search Test</a>
                    </li>
                </ul>
                
                <div class="tab-content" >
                    <div role="tabpanel" class="tab-pane <?php if(!(isset($_REQUEST['tab']))){?>active<?php }?>>" id="sum">
                        <div class="row">&nbsp; </div>
                       
                        <div class="col-md-8">
                            <table class="table table-responsive">
                                <tr style="background-color:gray;">
                                    <th>Test ID</th>
                                    <th>Test</th>
                                    <th>Yasas Price</th>
                                    <th>Asiri</th>
                                    <th>Lanka</th>
                                    <th>&nbsp;</th>
                                </tr>
                                <?php 
                                $test_res = $test_obj->get_all_tests();
                                while($test_row = $test_res->fetch_assoc()){
                                    $test_id = base64_encode($test_row["test_id"]);
                                    
                                ?>
                                <tr style="background-color:lightgray">
                                    <th style="text-align:center"><?php echo $test_row["test_id"];?></th>
                                    <th><?php echo $test_row["test_name"];?></th>
                                    <th><?php 
                                        $lab_id =1;
                                        $yasas_res = $test_obj->get_test_price($lab_id,base64_decode($test_id));
                                        $yasas_row = $yasas_res->fetch_assoc();
                                        echo $yasas_row["price"];
                                    ?></th>
                                    <th><?php 
                                        $lab_id =2;
                                        $asiri_res = $test_obj->get_test_price($lab_id,base64_decode($test_id));
                                        $asiri_row = $asiri_res->fetch_assoc();
                                        echo $asiri_row["price"];
                                    ?></th>
                                    <th><?php 
                                        $lab_id =3;
                                        $lanka_res = $test_obj->get_test_price($lab_id,base64_decode($test_id));
                                        $lanka_row = $lanka_res->fetch_assoc();
                                        echo $lanka_row["price"];
                                    ?></th>
                                    <td><a href="test-edit.php?id=<?php echo $test_id;?>" class="btn btn-primary">Edit Test</a></td>
                                </tr>
                                
                                <?php
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                    
                    <div role="tabpanel" class="tab-pane" id="add">
                        <?php  
                        if(isset($_GET["msg"])){
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
                            <form id="addTest" enctype="multipart/form-data" method="post" action="../controller/test_controller.php?status=add_test">
                                <div class="row" >
                                    <div class="col-md-3">
                                        <label class="control-label">Test Name</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" name="test_name" class="form-control" id="emp_fname" />
                                    </div>

                                    <div class="col-md-3">
                                        <label class="control-label">Test Category</label>
                                    </div>
                                    <div class="col-md-3">
                                        <select name="test_category" class="form-control">
                                            <?php
                                                $test_res = $test_obj->get_all_categories();
                                                while($row=$test_res->fetch_assoc()){ 
                                            ?>
                                                <option value="<?php echo $row['category_id'];?>"><?php echo $row['category_name']?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>                                    
                                </div>

                                <div class="row">
                                    <div class="col-md-12">&nbsp;</div>
                                </div>
                                    
                                <div class="row">
                                   
                                    <div class="col-md-3">
                                        <label class="control-label">Yasas Price</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" name="y_price" class="form-control" id="emp_lname"/>
                                    </div>
                                   
                                    <div class="col-md-3">
                                        <label class="control-label">Asiri Price</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" name="a_price" class="form-control" id="emp_email"/>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-12">&nbsp;</div>
                                </div>

                                <div class="row" >
                                    <div class="col-md-3">
                                        <label class="control-label">Lanka Price</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" name="l_price" class="form-control" id="emp_fname" />
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

                    <div role="tabpanel" class="tab-pane" id="search">
                        <div class="row">
                            &nbsp;
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <form class="form-inline">
                                    <input type="text" name="search_test" id="search_test" class="form-control" placeholder="Test Name" style="width:200px;margin:2px;"/>
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
        </div>
    </body>

    <?php
        include '../includes/bootstrap_script_includes.php';
   ?>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#search_test').keyup(function(){
                var txt = $(this).val();
            
                if(txt !=''){
                    $.ajax({
                        url:'../controller/test_controller.php?status=search',
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
