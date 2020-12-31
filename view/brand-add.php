<html>
    <head>
    
    <?php
        include '../includes/bootstrap_includes_css.php';
        include '../model/third_party_model.php';

        $third_party_obj = new Thirdparty(); //create employee object
        $stock_result= $third_party_obj->get_all_stock_types();
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
                      <h1 align="center"><?php  echo strtoupper("Add Brand") ?></h1>
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
 
        <div class="row">
        <div class="col-md-12">
        <form id="addUser" enctype="multipart/form-data" method="post" action="../controller/thirdparty_controller.php?status=add_brand">
            <div class="row" >

                <div class="col-md-2">
                    <label class="control-label">Brand Name</label>
                </div>
                <div class="col-md-2">
                    <input type="text" name="brand_name" class="form-control" id="brand_name" />
                </div>
                <div class="col-md-2">
                    <label class="control-label">Stock Type</label>
                </div>
                <div class="col-md-2">
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
            </div>
            <div class="row">
                &nbsp;
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
