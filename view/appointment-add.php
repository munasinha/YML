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
        <style>
            li:hover{
                background-color:#f2f2f2;
            }
        </style>
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
                            <input type="text" name="doctor" class="form-control" id="doctor">  
                            <div id="response"></div>
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
                                <input type="text" name="test" id="test" class="form-control" autocomplete="off">
                                <div id="test_div"></div>
                            </div>
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
    <?php   include '../includes/bootstrap_script_includes.php'; ?>
     
    <script type="text/javascript">
        $(document).ready(function() {
            $(window).keydown(function(event){
                if(event.keyCode == 13) {
                event.preventDefault();
                return false;
                }
            });
        });
    </script>
    
    <script type="text/javascript">
        $(document).ready(function() {
            $("#doctor").keyup(function(){
                var query = $("#doctor").val();
                $.ajax(
                    {
                        url:'../controller/thirdparty_controller.php?status=get_doc_name',
                        method:'POST',
                        data:{
                            search:1,
                            q:query
                        },
                        success:function(data){
                            $("#response").html(data);
                        },
                        dataType:'text'
                    }
                );
                $(document).on('click','li',function(){
                    var doc = $(this).text();
                    tags.push(doc);
                    addTags(); 
                    $("#doctor").val(doc);
                    $("#response").html("");
                });
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            window.count = 0;
            const tagContainer = document.querySelector('.test-container');
            const input = document.querySelector('.test-container input');
            var tags = [];

            function createTag(label){
                const div = document.createElement('div');
                div.setAttribute('class','test');
                
                const space = document.createElement('div');
                space.innerHTML = '&nbsp;&nbsp;';
                
                const span = document.createElement('span');
                span.innerHTML = label;

                const select = document.createElement('select');
                select.setAttribute('class',"form-control");
                select.setAttribute('name',"lab"+count);

                var values = [];
                $.ajax(
                    {
                        url:'../controller/thirdparty_controller.php?status=get_all_labs',
                        method:'POST',
                        success:function(data){
                            var a = JSON.parse(data);
                            for(var i=0;i<a.length;i++){
                                values.push(a[i]); 
                                var option = document.createElement("option");
                                option.value = values[i].lab_id;
                                option.text =  values[i].lab_name; 
                                select.appendChild(option); 
                            }  
                        },
                        dataType:'text'
                    }

                );
               
                const closeBtn = document.createElement('i');
                closeBtn.setAttribute('class','glyphicon glyphicon-remove');
                closeBtn.setAttribute('data-item',label);

                div.appendChild(span);
                div.appendChild(space);
                div.appendChild(select);
                div.appendChild(space);
                div.appendChild(closeBtn);
                return div;
            }
            function removeDouble(){
                document.querySelectorAll('.test').forEach(function(tag){
                    tag.parentElement.removeChild(tag);
                });
            }
            function addTags(){
                removeDouble();
                tags.slice().reverse().forEach(function(tag){
                    const input = createTag(tag);
                    tagContainer.prepend(input);
                });
            }
            
            input.addEventListener('keydown',function(e){
                if(e.keyCode == 13){
                    tags.push(input.value);
                    addTags();
                    input.value='';        
                }
            });
            document .addEventListener('click',function(e){
                if(e.target.tagName == 'I'){
                    const val = e.target.getAttribute('data-item');
                    const index= tags.indexOf(val);
                    tags=[...tags.slice(0,index),...tags.slice(index+1)] ;
                    addTags();
                }
            });

            $("#test").keyup(function(){
                var v = $("#test").val();
                if(v!=""){
                    $.ajax(
                    {
                        url:"../controller/appointment_controller.php?status=get_test_name&ltr="+v,
                        method:'POST',
                        data:{
                            search:1,
                            q:v
                        },
                        success:function(data){
                            $("#test_div").html(data);
                        },
                        dataType:'text'
                    }
                    );
                    $(document).on('click','li',function(){
                        var test = $(this).text();
                        $("#test").val(test);
                        $("#test_div").html("");
                        
                    });     
                }
                
            });
        });

    </script>
</html>

