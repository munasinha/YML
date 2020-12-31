<?php

if(isset($_REQUEST["status"])){

    include "../model/third_party_model.php";
    $third_obj = new Thirdparty();
    $status = $_REQUEST["status"];

    switch($status){
        case "add_lab":
            $lab_name = trim($_POST["lab_name"]);
            $commission = trim($_POST["commission"]);
            $lab_email = trim($_POST["lab_email"]);
            $lab_collector_cno = $_POST["lab_collector_cno"];
            $lab_cno_1 = trim($_POST["lab_cno1"]);
            $lab_cno_2 = trim($_POST["lab_cno2"]);
            $lab_add_no = trim($_POST["lab_add_no"]);
            $lab_add_street = trim($_POST["lab_add_street"]);
            $lab_add_city = trim($_POST["lab_add_city"]);
          
         
            try{
                
                if($lab_name==""){
                    throw new Exception("Lab name can't be empty ");
                }

                if($commission==""){
                    throw new Exception("Commission can't be empty ");
                }

                if($lab_email!=""){
                    $patern_email="/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,6})+$/";
                    if(!preg_match($patern_email, $lab_email)){
                        throw new Exception("Invalid Email Address");
                    }
                    
                }
                
                if($lab_collector_cno==""){
                    throw new Exception("Collector's Number can't be empty ");
                }

               
                if($lab_cno_1=="" && $lab_cno_2==""){
                    throw new Exception("Has to fill atleast on contact number");
                }

                if($lab_add_no==""){
                    throw new Exception("Address Number can't be empty");
                }
                
                if($lab_add_street==""){
                    throw new Exception("Address Street can't be empty ");
                }
                
                if($lab_add_city==""){
                    throw new Exception("Address City can't be empty");
                }
               
                $lab_id = $third_obj->add_lab($lab_name, $commission);
              
                
                if($lab_id>0){
                    $lab_contact_id = $third_obj->add_lab_contact($lab_id,$lab_collector_cno,$lab_cno_1,$lab_cno_2,$lab_email,$lab_add_no,$lab_add_street,$lab_add_city);
                    if(!($lab_contact_id>0)){
                        throw new Exception("Error in contacts");
                    }
                        $msg="Successfully Inserted $patient_f_name"." "."$patient_l_name";
                        $msg=  base64_encode($msg);
                    ?>
                        <script> window.location="../view/third_party.php?msg=<?php echo $msg;  ?>"</script>
                
                    <?php
                }else{
                    throw new Exception("Error in Inserting Lab");    
                }
            }
            catch(Exception $ex){
                $msg="Error $ex";
                $msg=  base64_encode($msg);
        
            ?>
                <script> window.location="../view/lab-register.php?msg=<?php echo $msg;  ?>"</script>
            <?php
            }

        break;
        case "edit_lab":
            $lab_name = trim($_POST["lab_name"]);
            $commission = trim($_POST["commission"]);
            $lab_email = trim($_POST["lab_email"]);
            $lab_collector_cno = $_POST["lab_collector_cno"];
            $lab_cno_1 = trim($_POST["lab_cno1"]);
            $lab_cno_2 = trim($_POST["lab_cno2"]);
            $lab_add_no = trim($_POST["lab_add_no"]);
            $lab_add_street = trim($_POST["lab_add_street"]);
            $lab_add_city = trim($_POST["lab_add_city"]);
            $lab_id = base64_decode($_GET["id"]);
         
            try{
                
                if($lab_name==""){
                    throw new Exception("Lab name can't be empty ");
                }

                if($commission==""){
                    throw new Exception("Commission can't be empty ");
                }

                if($lab_email!=""){
                    $patern_email="/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,6})+$/";
                    if(!preg_match($patern_email, $lab_email)){
                        throw new Exception("Invalid Email Address");
                    }
                    
                }
                
                if($lab_collector_cno==""){
                    throw new Exception("Collector's Number can't be empty ");
                }

               
                if($lab_cno_1=="" && $lab_cno_2==""){
                    throw new Exception("Has to fill atleast on contact number");
                }

                if($lab_add_no==""){
                    throw new Exception("Address Number can't be empty");
                }
                
                if($lab_add_street==""){
                    throw new Exception("Address Street can't be empty ");
                }
                
                if($lab_add_city==""){
                    throw new Exception("Address City can't be empty");
                }
               
                $lab_id = $third_obj->edit_lab($lab_id,$lab_name,$commission);
              
                
                if($lab_id>0){
                    $lab_contact_id = $third_obj->edit_lab_contact($lab_id,$lab_collector_cno,$lab_cno_1,$lab_cno_2,$lab_email,$lab_add_no,$lab_add_street,$lab_add_city);
                    if(!$lab_contact_id>0){
                        throw new Exception("Error in contacts");
                    }
                        $msg="Successfully Inserted $patient_f_name"." "."$patient_l_name";
                        $msg=  base64_encode($msg);
                    ?>
                        <script> window.location="../view/third_party.php?msg=<?php echo $msg;  ?>"</script>
                
                    <?php
                }else{
                    throw new Exception("Error in Inserting Lab");    
                }
            }
            catch(Exception $ex){
                $msg="Error $ex";
                $msg=  base64_encode($msg);
        
            ?>
                <script> window.location="../view/lab-register.php?msg=<?php echo $msg;  ?>"</script>
            <?php
            }

        break;
        case "add_doc":
            $fname = trim($_POST['fname']);
            $lname = trim($_POST['lname']);
            $cno = trim($_POST['cno']);
           
            try{
                if($fname=="" && $lname=="" ){
                    throw new Exception("Insert name");
                }
                $doc_id = $third_obj->add_doctor($fname,$lname,$cno);
                if(!$doc_id>0){
                    throw new Exception("Error");
                }
                    $msg="Successfully Inserted Dr. $fname"." "."$lname";
                    $msg=  base64_encode($msg);
                ?>
                    <script> window.location="../view/third_party.php?msg=<?php echo $msg;?>"</script>
            
                <?php   
                
            }
            catch(Exception $ex){
                $msg="Error $ex";
                $msg=  base64_encode($msg);
        
            ?>
                <script> window.location="../view/doctor-add.php?msg=<?php echo $msg;  ?>"</script>
            <?php
            }         

        break;
        case "edit_doc":
            $fname = trim($_POST['fname']);
            $lname = trim($_POST['lname']);
            $cno = trim($_POST['cno']);
            $id = base64_decode($_GET['id']);
            try{
                if($fname=="" && $lname=="" ){
                    throw new Exception("Insert name");
                }
                $doc_id = $third_obj->edit_doctor($id,$fname,$lname,$cno);
                if(0>0){
                    throw new Exception("Error");
                }
                    $msg="Successfully Updated Dr. $fname"." "."$lname";
                    $msg=  base64_encode($msg);
                ?>
                    <script> window.location="../view/third_party.php?msg=<?php echo $msg;?>"</script>
            
                <?php   
                
            }
            catch(Exception $ex){
                $msg="Error $ex";
                $msg=  base64_encode($msg);
        
            ?>
                <script> window.location="../view/lab-edit.php?msg=<?php echo $msg;  ?>"</script>
            <?php
            }
        break;
        case "add_supp":
            $supplier_name = $_POST['supplier_name'];
            $contact_person = $_POST['contact_person'];
            $con_num= $_POST['con_num'];
            $email= $_POST['email'];
            $add_num = $_POST['num'];
            $street= $_POST['street'];
            $city= $_POST['city'];
           
            try{
                if($supplier_name == "" ){
                    throw new Exception("Insert Supplier name");
                }
                if($contact_person =="" ){
                    throw new Exception("Insert Contact Person name");
                }
                if($con_num=="" ){
                    throw new Exception("Insert Contact number");
                }
                
                $sup_id = $third_obj->add_supplier($supplier_name,$contact_person,$con_num,$email,$add_num,$street,$city);
                if(!$sup_id>0){
                    throw new Exception("Error");
                }
                    $msg="Successfully Inserted $supplier_name";
                    $msg=  base64_encode($msg);
                ?>
                    <script> window.location="../view/third_party.php?msg=<?php echo $msg;?>"</script>
            
                <?php   
                
            }
            catch(Exception $ex){
                $msg="Error $ex";
                $msg=  base64_encode($msg);
        
            ?>
                <script> window.location="../view/supplier-add.php?msg=<?php echo $msg;  ?>"</script>
            <?php
            }  
            
        break;
        case "add_stock_category":
            $stock_type= $_POST['stock_type'];
            $stock_unit= $_POST['stock_unit'];

            try{
                if($stock_type==""){
                    throw new Exception("Please insert stock type");
                }
                if($stock_unit==""){
                    throw new Exception("Please insert stock unit");
                }
                $stock_cat_id = $third_obj->add_stock_cat($stock_type,$stock_unit);
                if(!$stock_cat_id>0){
                    throw new Exception("Error");
                }
                    $msg="Successfully Inserted New Stock Category: $stock_type";
                    $msg=  base64_encode($msg);
                ?>
                    <script> window.location="../view/third_party.php?msg=<?php echo $msg;?>"</script>
            
                <?php   
                
            }
            catch(Exception $ex){
                $msg="Error $ex";
                $msg=  base64_encode($msg);
        
            ?>
                <script> window.location="../view/stock-categoy-add.php?msg=<?php echo $msg;  ?>"</script>
            <?php
            }    
        break;
        case "add_stock":
            $stock_type = $_POST['stock_type'];
            $supplier = $_POST['supplier'];
            $stock_quantity = $_POST['stock_quantity'];
            $expire_date = $_POST['expire_date'];
            $unit_price = $_POST['unit_price'];

            try{
                if($stock_type==""){
                    throw new Exception("Please insert stock type");
                }
                if($supplier==""){
                    throw new Exception("Please insert Supplier");
                }
                if($stock_quantity==""){
                    throw new Exception("Please insert stock quantity");
                }
                
                $stock_id = $third_obj->add_stock($stock_type,$supplier,$stock_quantity,$expire_date,$unit_price);
                if(!$stock_id>0){
                    throw new Exception("Error");
                }
                    $msg="Successfully Inserted New Stock";
                    $msg=  base64_encode($msg);
                ?>
                    <script> window.location="../view/third_party.php?msg=<?php echo $msg;?>"</script>
            
                <?php   
                
            }
            catch(Exception $ex){
                $msg="Error $ex";
                $msg=  base64_encode($msg);
        
            ?>
                <script> window.location="../view/stock-add.php?msg=<?php echo $msg;  ?>"</script>
            <?php
            }

        break;
        case "add_brand":
            $brand_name = $_POST['brand_name'];
            $stock_type = $_POST['stock_type'];
            
            try{
                if($brand_name==""){
                    throw new Exception("Please insert Brand Name");
                }
                if($stock_type==""){
                    throw new Exception("Please Stock type");
                }
                
                $brand_id = $third_obj->add_brand($brand_name,$stock_type);
                if(!$brand_id>0){
                    throw new Exception("Error");
                }
                    $msg="Successfully Inserted New Brand";
                    $msg=  base64_encode($msg);
                ?>
                    <script> window.location="../view/third_party.php?msg=<?php echo $msg;?>"</script>
            
                <?php   
                
            }
            catch(Exception $ex){
                $msg="Error $ex";
                $msg=  base64_encode($msg);
        
            ?>
                <script> window.location="../view/brand-add.php?msg=<?php echo $msg;  ?>"</script>
            <?php
            }
        break;
    }
}