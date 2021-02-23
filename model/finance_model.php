<?php

include_once '../commons/dbConnection.php';
$db_con_obj= new db_connection();

class Finance{
    function get_today($lab_id){
        $con=$GLOBALS['con'];
        $sql="SELECT sum(price) as t FROM appointment ap, appointment_test ap_t, test_price tp WHERE ap.appointment_id=ap_t.appointment_id and ap_t.test_id=tp.test_id and tp.lab_id=$lab_id and  ap.appointment_date = CURDATE()";
        $result=$con->query($sql);
        if($result->num_rows>0){
            return $result;             
        }
         else{
             return 0;
        }
    }

    function get_today_total(){
        $con=$GLOBALS['con'];
        $sql="SELECT sum(price) as t FROM appointment ap, appointment_test ap_t, test_price tp WHERE ap.appointment_id=ap_t.appointment_id and ap_t.test_id=tp.test_id and  ap.appointment_date = CURDATE()";
        $result=$con->query($sql);
        if($result->num_rows>0){
            return $result;             
        }
         else{
             return 0;
        }
    }

    function get_last_week($lab_id){
        $con=$GLOBALS['con'];
        $sql="SELECT sum(price) as t FROM appointment ap, appointment_test ap_t, test_price tp WHERE ap.appointment_id=ap_t.appointment_id and ap_t.test_id=tp.test_id and tp.lab_id=$lab_id and  ap.appointment_date > Date_add(CURDATE(),INTERVAL-7 DAY)";
        $result=$con->query($sql);
        if($result->num_rows>0){
            return $result;             
        }
         else{
             return 0;
        }
    }

    function get_last_week_total(){
        $con=$GLOBALS['con'];
        $sql="SELECT sum(price) as t FROM appointment ap, appointment_test ap_t, test_price tp WHERE ap.appointment_id=ap_t.appointment_id and ap_t.test_id=tp.test_id and tp.lab_id=$lab_id and  ap.appointment_date > Date_add(CURDATE(),INTERVAL-7 DAY)";
        $result=$con->query($sql);
        if($result->num_rows>0){
            return $result;             
        }
         else{
             return 0;
        }
    }

    function get_last_month($lab_id){
        $con=$GLOBALS['con'];
        $sql="SELECT sum(price) as t FROM appointment ap, appointment_test ap_t, test_price tp WHERE ap.appointment_id=ap_t.appointment_id and ap_t.test_id=tp.test_id and tp.lab_id=$lab_id and  ap.appointment_date > Date_add(CURDATE(),INTERVAL-30 DAY)";
        $result=$con->query($sql);
        if($result->num_rows>0){
            return $result;             
        }
         else{
             return 0;
        }
    }

}