<html>
    <head>
    
    <?php
        include '../includes/bootstrap_includes_css.php';
        include '../model/test_model.php';

        $test_obj = new Test(); //create employee object
        $id = 0;

        if(isset($_GET['id'])){
            $id = base64_decode($_GET['id']);
        }
        $test_res = $test_obj->get_test_details($id);
        $test_row = $test_res->fetch_assoc();

        $lab_id =1;
        $yasas_res = $test_obj->get_test_price($lab_id,$id);
        $yasas_row = $yasas_res->fetch_assoc();
        $yasas_price= $yasas_row["price"];

        $lab_id =2;
        $asiri_res = $test_obj->get_test_price($lab_id,$id);
        $asiri_row = $asiri_res->fetch_assoc();
        $asiri_price = $asiri_row["price"];

        $lab_id =3;
        $lanka_res = $test_obj->get_test_price($lab_id,$id);
        $lanka_row = $lanka_res->fetch_assoc();
        $lanka_price = $lanka_row["price"];
    
    ?>
    </head>
    
    <body>
        <div class="container">
            <div class="col-md-12">&nbsp;</div>
            
            <div class="row">
                <?php include_once('../includes/top_row.php');?>
            </div>
            <div class="row">
                <div class="col-md-12">&nbsp;</div>
            </div>
            <div class="row">
                <h1 style="margin:auto;">Edit Test</h1>
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
            </div>
            
        </div>
        
        <?php include_once("../includes/side-nav.php");?>

        <div class="col-md-9">
            <form id="addUser" enctype="multipart/form-data" method="post" action="../controller/test_controller.php?status=edit_test">
                <div class="row" >
                    <input type="hidden" name="test_id" value="<?php echo $id;?>">
                    <div class="col-md-3">
                        <label class="control-label">Test Name</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="test_name" class="form-control" value="<?php echo $test_row['test_name'];?>" id="emp_fname" />
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
                        <input type="text" name="y_price" value="<?php echo $yasas_price; ?>" class="form-control" id="emp_lname"/>
                    </div>
                    <div class="col-md-3">
                        <label class="control-label">Asiri Price</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="a_price" value="<?php echo $asiri_price; ?>" class="form-control" id="emp_email"/>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">&nbsp;</div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <label class="control-label">Lanka Price</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="l_price" value="<?php echo $lanka_price; ?>" class="form-control" id="emp_email"/>
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
