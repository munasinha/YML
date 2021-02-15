<?php

include_once '../commons/dbConnection.php';
$db_con_obj= new db_connection();

class Appointment{
    function get_tests(){
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM test";
        $results=$con->query($sql);
        return $results; 
    }
    function get_blood_tests(){
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM test WHERE category_id=1";
        $results=$con->query($sql);
        return $results; 
    }
    function get_urine_tests(){
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM test WHERE category_id=2";
        $results=$con->query($sql);
        return $results; 
    }
    function get_other_tests(){
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM test WHERE  NOT (category_id = 1 or category_id = 2) ";
        $results=$con->query($sql);
        return $results; 
    }

    function get_tests_name($name){
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM test WHERE test_name LIKE '$name%' ";
        $results=$con->query($sql);
        return $results; 
    }

    function add_patient($patient_f_name, $patient_l_name,$patient_gender,$patient_dob){
        $con=$GLOBALS['con'];
        $sql="INSERT into patient(patient_f_name, patient_l_name,gender,d_o_b) values('$patient_f_name', '$patient_l_name','$patient_gender','$patient_dob')";
        $results=$con->query($sql) or die($con->error);
        $patient_id=$con->insert_id;  //  getting the auto incremented id
        return $patient_id;
    }

    function add_patient_con($pat_id,$patient_cno){
        $con=$GLOBALS['con'];
        $sql="INSERT into patient_contact(patient_id,telephone_number) values('$pat_id','$patient_cno')";
        $results = $con->query($sql)or die($con->error);
        $patient_contact_id=$con->insert_id;  //  getting the auto incremented id
        return $patient_contact_id;
    }
           
    function add_appointment($patient_id,$doctor_id,$bill_id,$employee_id){
        $con=$GLOBALS['con'];
        $sql="INSERT into appointment(patient_id,appointment_date,appointment_time,doctor_id,bill_id,employee_id) values('$patient_id',NOW(),CURRENT_TIME(),'$doctor_id','$bill_id','$employee_id')";
        $results=$con->query($sql)or die($con->error);
        $appointment_id=$con->insert_id;  //  getting the auto incremented id
        return $appointment_id;
    }

    function add_app_tests($appointment_id,$test_id,$lab_id){
        $con=$GLOBALS["con"];
        $sql="INSERT INTO appointment_test(appointment_id,test_id,lab_id)VALUES('$appointment_id','$test_id','$lab_id')";
        $result = $con->query($sql)or die($con->error);
        return $result;
    }

}