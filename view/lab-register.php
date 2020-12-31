<html>
    <head>
    
    <?php
     include '../includes/bootstrap_includes_css.php';
     include '../model/third_party_model.php';

      $lab_obj = new Thirdparty(); //create employee object
      $lab_result= $lab_obj->get_all_labs();

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
                      <h1 align="center"><?php  echo strtoupper("Add Lab") ?></h1>
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
