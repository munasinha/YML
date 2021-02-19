<?php

if(isset($_REQUEST["status"])){

    include "../model/test_model.php";
    $test_obj = new Test();
    $status = $_REQUEST["status"];

    switch($status){
        case "add_test":
            
            $test_name = trim($_POST["test_name"]);
            $y_price = trim($_POST["y_price"]);
            $a_price = trim($_POST["a_price"]);
            $l_price = trim($_POST["l_price"]);
            $test_category = $_POST["test_category"];
                     

            try{
                
                if($test_name==""){
                    throw new Exception("Test name can't be empty ");
                }
                if($y_price==""){
                    $y_price=0;
                }
                if($a_price==""){
                    $a_price=0;
                }
                if($l_price==""){
                    $l_price=0;
                }
                $test_id = $test_obj->add_test($test_name, $test_category);
                if($test_id>0){
                    if($test_obj->add_test_price($test_id,1,$y_price)){
                        if($test_obj->add_test_price($test_id,2,$a_price)){
                            if($test_obj->add_test_price($test_id,3,$l_price)){
                                $msg="Successfully Inserted";
                                $msg=  base64_encode($msg);
                                ?>
                                    <script> window.location="../view/test.php?msg=<?php echo $msg;?>"</script>
                                <?php
                            }
                            else{
                                throw new Exception("Couldn't Insert Test Price Data");   
                            }
                        }
                        else{
                            throw new Exception("Couldn't Insert Test Price Data");   
                        }
                    }
                    else{
                        throw new Exception("Couldn't Insert Test Price Data");   
                    }                
                }else{
                    throw new Exception("Couldn't Insert Test Data");    
                }
            }
            catch(Exception $ex){
                $msg="Error $ex";
                $msg=  base64_encode($msg);
        
            ?>
                <script> window.location="../view/test.php?msg=<?php echo $msg;  ?>"</script>
            <?php
            }
        break;
        case "edit_test":
            $test_id = $_POST["test_id"];
            $test_name = trim($_POST["test_name"]);
            $y_price = trim($_POST["y_price"]);
            $a_price = trim($_POST["a_price"]);
            $l_price = $_POST["l_price"];
            $test_category = $_POST["test_category"];
         
            try{
                
                if($test_name==""){
                    throw new Exception("Test name can't be empty ");
                }

                if($y_price==""){
                    $y_price=0;
                }
                if($a_price==""){
                    $a_price=0;
                }
                if($l_price==""){
                    $l_price=0;
                }

                $test_id = $test_obj->edit_test($test_id,$test_name, $test_category);
                if($test_id>0){
                    if($test_obj->edit_test_price($test_id,1,$y_price)){
                        if($test_obj->edit_test_price($test_id,2,$a_price)){
                            if($test_obj->edit_test_price($test_id,3,$l_price)){
                                $msg="Successfully Updated";
                                $msg=  base64_encode($msg);
                                ?>
                                    <script> window.location="../view/test.php?msg=<?php echo $msg;?>"</script>
                                <?php
                            }
                            else{
                                throw new Exception("Couldn't Insert Test Price Data");   
                            }
                        }
                        else{
                            throw new Exception("Couldn't Insert Test Price Data");   
                        }
                    }
                    else{
                        throw new Exception("Couldn't Insert Test Price Data");   
                    }                
                }else{
                    throw new Exception("Couldn't Insert Test Data");    
                }
             
                ?>
                    <script> window.location="../view/test.php?msg=<?php echo $msg;  ?>"</script>
                <?php
            }
            catch(Exception $ex){
                $msg="Error $ex";
                $msg=  base64_encode($msg);
        
            ?>
                <script> window.location="../view/test.php?msg=<?php echo $msg;  ?>"</script>
            <?php
            }
        break;
        case "search":
            
            $search_txt = $_POST['search'];
            $res = $test_obj->search_data($search_txt);           
            $output = "<table class='table table-responsive'>
                                <tr style='background-color:gray;'>
                                    <th>Test ID</th>
                                    <th>Test Name</th>
                                    <th>Yasas Price</th>
                                    <th>Asiri</th>
                                    <th>Lanka</th>
                                    <th>&nbsp;</th>
                                </tr>";
           
            while($res_row = $res->fetch_assoc()){
                $test_id =$res_row['test_id'];
                
                
                $lab_id =1;
                $yasas_res = $test_obj->get_test_price($lab_id,$test_id);
                $yasas_row = $yasas_res->fetch_assoc();
                $yasas_price= $yasas_row["price"];

                $lab_id =2;
                $asiri_res = $test_obj->get_test_price($lab_id,$test_id);
                $asiri_row = $asiri_res->fetch_assoc();
                $asiri_price = $asiri_row["price"];

                $lab_id =3;
                $lanka_res = $test_obj->get_test_price($lab_id,$test_id);
                $lanka_row = $lanka_res->fetch_assoc();
                $lanka_price = $lanka_row["price"];

                $test_id = base64_encode($test_id); 
                
                $output .= "<tr style='background-color:lightgray'>
                    <th style='text-align:center'>".$res_row['test_id']."</th>
                    <th style='text-align:center'>".$res_row['test_name']."</th>
                    <th style='text-align:center'>".$yasas_price."</th>
                    <th style='text-align:center'>".$asiri_price."</th>
                    <th style='text-align:center'>".$lanka_price."</th>
                    <th><a href='test-edit.php?id=$test_id' class='btn btn-primary'>Edit Test</a></th>
                </tr>";
            }
            $output .= "</table>";
            echo $output;
        break;
    }

}