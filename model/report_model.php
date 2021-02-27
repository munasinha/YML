<?php

include_once '../commons/dbConnection.php';
$db_con_obj= new db_connection();

class Report{
    function get_active_appoitments($lab_id){
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM appointment ap, patient p,appointment_test ap_t WHERE ap.patient_id=p.patient_id and ap.appointment_date= CURDATE() and ap.appointment_id=ap_t.appointment_id and ap_t.lab_id=$lab_id group by ap.appointment_id";
        $results=$con->query($sql);
        return $results;
    }
    function get_tests($app_id){
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM appointment_test ap_t, test t WHERE ap_t.test_id=t.test_id and ap_t.appointment_id=$app_id";
        $results=$con->query($sql);
        return $results; 
    }
    
    function get_completed($app_id){
        $con=$GLOBALS['con'];
        $sql="SELECT count(rep_status) as com FROM appointment_test ap_t WHERE ap_t.appointment_id=$app_id and ap_t.rep_status=1";
        $result=$con->query($sql);
        if($result->num_rows>0){
            return $result;             
        }
         else{
             return 0;
        }
    }

    function get_total_tests($app_id){
        $con=$GLOBALS['con'];
        $sql="SELECT count(rep_status) as tot FROM appointment_test ap_t WHERE ap_t.appointment_id=$app_id";
        $result=$con->query($sql);
        if($result->num_rows>0){
            return $result;             
        }
         else{
            return 0;
        }       
    }

    function get_test_name($test_id){
        $con=$GLOBALS['con'];
        $sql="SELECT test_name FROM test WHERE test_id=$test_id";
        $result=$con->query($sql);
        return $result;             
            
    }

    function get_test_attibutes($test_id){
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM test_attribute ta, attribute att WHERE ta.test_id=$test_id and ta.attribute_id=att.attribute_id";
        $result=$con->query($sql);
        return $result;             
    } 


}