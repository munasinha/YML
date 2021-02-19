<?php

include_once '../commons/dbConnection.php';
$db_con_obj= new db_connection();

class Bill{
    function get_active_appoitments(){
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM appointment ap, patient p WHERE ap.patient_id=p.patient_id and ap.appointment_date= CURDATE()";
        $results=$con->query($sql);
        return $results; 
    }

    function get_tests($app_id){
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM appointment_test ap_t, test t,test_price tp WHERE ap_t.test_id=t.test_id and ap_t.appointment_id=$app_id and ap_t.lab_id=tp.lab_id and ap_t.test_id=tp.test_id";
        $results=$con->query($sql);
        return $results; 
    }

    function get_total($app_id){
        $con=$GLOBALS['con'];
        $sql="SELECT sum(tp.price) as t FROM appointment_test ap_t,test_price tp WHERE ap_t.appointment_id=$app_id and ap_t.test_id=tp.test_id and ap_t.lab_id=tp.lab_id";
        $results=$con->query($sql);       
        return $results;
    }

    function get_appointment_details($id){
        $id= base64_decode($id);
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM appointment ap, patient p WHERE ap.patient_id=p.patient_id and ap.appointment_id= $id";
        $results=$con->query($sql);
        return $results; 
    }



}