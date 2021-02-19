<?php

if(isset($_REQUEST["status"])){

    include "../model/appointment_model.php";
    $app_obj = new Appointment();
    $status = $_REQUEST["status"];

    switch($status){
        case "add_appointment":
            
            $patient_id = $_POST['patient_id'];
            $patient_f_name=trim($_POST['patient_fname']);  
            $patient_l_name=trim($_POST['patient_lname']);  
            $patient_gender=trim($_POST['patient_gender']);  
            $patient_dob=trim($_POST['patient_dob']);  
            $doc_id=trim($_POST['doctor']);  
            $patient_cno=trim($_POST['patient_cno']);  
            $emp_id = $_POST['emp_id'];
            $patient_tests = array();
            $patient_tests = $_POST['tests'];
            $lab_ids = array();
            $lab_ids = $_POST['labs'];

            $bill_id = 0;
            /*
            for($i=0;$i<count($patient_tests);$i++){
                
                echo "</br>test ".$patient_tests[$i]."<br>";
                //$app_obj->add_app_tests($app_id,$a[0],$lab_ids[$a[1]]);//get the lab related to the test
            }
            echo "******* ".$patient_tests[2]."<br>";
            for($i=0;$i<count($lab_ids);$i++){
                echo "index ".($i+1)." lab".$lab_ids[$i]."<br>";
                //$app_obj->add_app_tests($app_id,$a[0],$lab_ids[$a[1]]);//get the lab related to the test
            }
            for($i=0;$i<count($patient_tests);$i++){
                
                $a = explode(',',$patient_tests[$i]);
                echo "</br>index ".$i. " test" .$a[0]." lab".$lab_ids[($a[1]-1)]."<br>";
                //$app_obj->add_app_tests($app_id,$a[0],$lab_ids[($a[1]-1)]);//get the lab related to the test
            }die();*/
            try{
                
                if($patient_f_name == "" && $patient_l_name ==""){
                    throw new Exception("Please insert at least one name");
                }
                if($patient_id==0){
                   
                    $pat_id = $app_obj->add_patient($patient_f_name, $patient_l_name,$patient_gender,$patient_dob,$patient_cno);
                    if($pat_id>0){
                        $pat_con_id = $app_obj->add_patient_con($pat_id,$patient_cno);
                        if($pat_con_id>0){
                            
                            $app_id = $app_obj->add_appointment($pat_id,$doc_id,$bill_id,$emp_id);
                            if($app_id>0){
                                for($i=0;$i<count($patient_tests);$i++){
                                    $a = explode(',',$patient_tests[$i]);
                                    $app_obj->add_app_tests($app_id,$a[0],$lab_ids[$a[1]-1]);//get the lab related to the test
                                } 
                                $msg = "Successfully created the appointment";
                                $msg = base64_encode($msg);
                                ?>
                                <script> window.location="../view/appointment-add.php?msg=<?php echo $msg;  ?>"</script>
                                <?php
                            }else{
                                throw new Exception("Error in inserting Appointment");    
                            }
                        }else{
                            throw new Exception("Error in inserting Patient Contact"); 
                        }
                    }else{
                        throw new Exception("Error in inserting Patient");
                    }
                }else{
                    echo "Here2";
                    $app_id = $app_obj->add_appointment($pat_id,$doc_id,$bill_id,$emp_id);
                    if($app_id>0){
                        for($i=0;$i<count($patient_tests);$i++){
                
                            $a = explode(',',$patient_tests[$i]);
                            //echo "</br>index ".$i. " test" .$a[0]." lab".$lab_ids[($a[1]-1)]."<br>";
                            $app_obj->add_app_tests($app_id,$a[0],$lab_ids[$a[1]-1]);//get the lab related to the test
                        }
                        $msg = "Successfully created the appointment";
                        $msg = base64_encode($msg);
                        ?>
                        <script> window.location="../view/appointment.php?msg=<?php echo $msg;  ?>"</script>
                        <?php
                    }else{
                        throw new Exception("Error in inserting Appointment");    
                    }
                }
                
            }catch(Exception $ex){
                $msg = "Error ".$ex;
                $msg = base64_encode($msg);
                ?>
                <script> window.location="../view/appointment-add.php?msg=<?php echo $msg;  ?>"</script>
            <?php

            }
        break;

        case "search_test":  
            if(isset($_POST['search'])){
                $app_res = $app_obj-> get_tests_name($_POST['q']);
                $response = array();
                while($app_row = $app_res->fetch_assoc()){
                    $response[] = $app_row;
                }
                print_r($response);
                exit($response);
            }
        break;

        case "get_test_name":
            $ltr = $_GET['ltr'];
            $app_res = $app_obj->get_tests_name($ltr);
            $response = "";

            if($app_res->num_rows>0){
                $response = "<ul class='form-control' style='list-style:none'>";
                while($row = $app_res->fetch_assoc()){
                    $response .= "<li>".$row['test_name']."</li>";   
                }
                $response .= "</ul>";
            }
            exit($response);
        break;
    }
}
?>