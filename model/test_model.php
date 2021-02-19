<?php

include_once '../commons/dbConnection.php';
$db_con_obj= new db_connection();

class Test{
    function get_all_tests(){
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM test";
        $results=$con->query($sql);
        return $results; 
    }

    function get_test_price($lab_id,$test_id){
        $con=$GLOBALS['con'];
        $sql="SELECT price FROM test_price where test_id=$test_id and lab_id=$lab_id";
        $results=$con->query($sql);
        return $results; 
    }
    function get_test_details($id){
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM test where test_id=$id";
        $results=$con->query($sql);
        return $results;
    }

    function search_data($search_txt){
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM test where test_name LIKE '%$search_txt%' ";
        $results=$con->query($sql);
        return $results; 
    }

    function add_test($test_name, $test_category){
        $con=$GLOBALS['con'];
        $sql="INSERT into test(test_name, category_id) values('$test_name', '$test_category')";
        $results=$con->query($sql);
        $test_id=$con->insert_id;  //  getting the auto incremented id
        return $test_id;
    }

    function add_test_price($test_id,$lab_id,$price){
        $con=$GLOBALS['con'];
        $sql="INSERT into test_price(test_id, lab_id,price) values('$test_id', '$lab_id','$price')";
        $results=$con->query($sql);
        return $test_id;
    }

    function get_all_categories(){
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM test_category";
        $results=$con->query($sql);
        return $results; 
    }

    function edit_test($test_id,$test_name, $test_category){
        $con=$GLOBALS['con'];
        $sql="UPDATE test SET test_name='$test_name', category_id='$test_category' WHERE test_id='$test_id' ";
        $results=$con->query($sql);
        return $test_id;
    }

    function edit_test_price($test_id,$lab_id,$price){
        $con=$GLOBALS['con'];
        $sql="UPDATE test_price SET price='$price' WHERE test_id='$test_id' and lab_id='$lab_id' ";
        $results=$con->query($sql);
        return $test_id;
    }
}