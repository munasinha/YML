<?php

include_once '../commons/dbConnection.php';
$db_con_obj= new db_connection();

class Thirdparty{
    
    function get_all_labs()
    {
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM lab";
        $results=$con->query($sql);
        return $results;       
    }

    function add_lab($lab_name, $commission){
        $con=$GLOBALS['con'];
        $sql="INSERT into lab(lab_name,commission) values('$lab_name', '$commission')";
        $results=$con->query($sql);
        $lab_id=$con->insert_id;  //  getting the auto incremented id
        return $lab_id;
    }

    function add_lab_contact($lab_id,$collector_no,$tel_no_1,$tel_no_2,$email,$no,$street,$city){
        $con=$GLOBALS['con'];
        $sql="INSERT into lab_contact(lab_id,collector_no,telephone_number_1,telephone_number_2,email,address_no,street,town) values('$lab_id','$collector_no','$tel_no_1','$tel_no_2','$email','$no','$street','$city')";
        $results = $con->query($sql);
        $lab_contact_id=$con->insert_id;  //  getting the auto incremented id
        return $lab_contact_id;
    }

    function edit_lab($id,$lab_name, $commission){
        $con=$GLOBALS['con'];
        $sql="UPDATE lab SEt lab_name='$lab_name',commission='$commission' WHERE lab_id='$id'";
        $results=$con->query($sql)or die($con->error);

        return $id;
    }

    function edit_lab_contact($lab_id,$collector_no,$tel_no_1,$tel_no_2,$email,$no,$street,$city){
        $con=$GLOBALS['con'];
        $sql="UPDATE lab_contact SET collector_no='$collector_no',telephone_number_1='$tel_no_1',telephone_number_2='$tel_no_2',email='$email',address_no='$no',street='$street',town='$city' WHERE lab_id='$lab_id' ";
        $results=$con->query($sql)or die($con->error);
        return $lab_id;
    }

    function get_lab_details($id){
        $id = base64_decode($id);
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM lab l,lab_contact lc WHERE l.lab_id=lc.lab_id and l.lab_id='$id'";
        $results=$con->query($sql) or die($con->error);
        return $results;   
    }

    function add_doctor($fname,$lname,$cno){
        $con=$GLOBALS['con'];
        $sql="INSERT INTO doctor(first_name,last_name,contact_number) values('$fname','$lname','$cno')";
        $results=$con->query($sql) or die($con->error);
        $doc_id=$con->insert_id; //auto increamented id
        return $doc_id;
    }
    function get_all_docs()
    {
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM doctor";
        $results=$con->query($sql);
        return $results;       
    }
    function get_docs_name($name)
    {
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM doctor WHERE (first_name LIKE '%$name%' or last_name LIKE '%$name%')";
        $results=$con->query($sql);
        return $results;       
    }
    function get_doc_details($id){
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM doctor WHERE doctor_id=$id";
        $results=$con->query($sql);
        return $results; 
    }
    
    function edit_doctor($id,$fname,$lname,$cno){
        $con=$GLOBALS['con'];
        $sql="UPDATE doctor SET first_name='$fname', last_name='$lname',contact_number='$cno' WHERE doctor_id=$id";
        $results=$con->query($sql) or die($con->error);
        return $id;
    }

    function add_supplier($supplier_name,$contact_person,$con_num,$email,$add_num,$street,$city){
        $con=$GLOBALS['con'];
        $sql="INSERT INTO supplier(supplier_name,contact_person,con_num,email,add_num,street,city) values('$supplier_name','$contact_person','$con_num','$email','$add_num','$street','$city')";
        $results=$con->query($sql) or die($con->error);
        $sup_id=$con->insert_id; //auto increamented id
        return $sup_id;
    }

    function add_stock($stock_type,$supplier,$stock_quantity,$expire_date,$unit_price){
        $con=$GLOBALS['con'];
        $sql="INSERT INTO stock(category_id,brand_id,amount,expire,date_added,unit_price) values('$stock_type','$supplier','$stock_quantity','$expire_date',NOW(),'$unit_price')";
        $results=$con->query($sql) or die($con->error);
        $stock_id=$con->insert_id; //auto increamented id
        return $stock_id;    
    }

    function add_stock_cat($stock_type,$stock_unit){
        $con=$GLOBALS['con'];
        $sql="INSERT INTO stock_category(category_name,metric) values('$stock_type','$stock_unit')";
        $results=$con->query($sql) or die($con->error);
        $stock_cat_id=$con->insert_id; //auto increamented id
        return $stock_cat_id;
    }

    function get_all_stock_types(){
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM stock_category";
        $results=$con->query($sql);
        return $results; 
    }

    function get_all_suppliers(){
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM supplier";
        $results=$con->query($sql);
        return $results; 
    }

    function add_brand($brand_name,$stock_type){
        $con=$GLOBALS['con'];
        $sql="INSERT INTO brand(brand_name,stock_type) values('$brand_name','$stock_type')";
        $results=$con->query($sql) or die($con->error);
        $brand_id=$con->insert_id; //auto increamented id
        return $brand_id; 
    }

    function get_all_brands(){
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM brand";
        $results=$con->query($sql);
        return $results;
    }

    function get_all_stocks(){
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM stock s, stock_category sc WHERE s.category_id=sc.category_id";
        $results=$con->query($sql) or die($con->error);
        return $results; 
    }

}   