<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="../css/dataTables.bootstrap.min.css"/>
        
      <?php
        include '../model/finance_model.php';
        $fin_obj = new Finance(); 
      ?>

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
                <h1 style="margin:auto;">Finance</h1>
            </div>
            <div class="row">
                <div class="col-md-12">&nbsp;</div>
            </div>
        </div>
        <div class="row">
            &nbsp;
        </div>
        <div class="row">
            <?php include_once("../includes/side-nav.php");?>
            <div class="col-md-9">
                
                <ul class="nav nav-tabs" role="tablist" >
                    <li class="nav-item">
                        <a href="#sum" class="nav-link <?php if(!isset($_GET['tab'])){?> active <?php } ?>" role="tab" data-toggle="tab">Summary</a>
                    </li>
                    <li class="nav-item">
                        <a href="#test" class="nav-link <?php if(isset($_GET['tab'])){?> active <?php } ?>" role="tab" data-toggle="tab">By Test</a>
                    </li>
                    <li class="nav-item">
                        <a href="#doc" class="nav-link" role="tab" data-toggle="tab">By Doctor</a>
                    </li>
                    <li class="nav-item">
                        <a href="#lab" class="nav-link" role="tab" data-toggle="tab">By Lab</a>
                    </li>
                </ul>
                
                <div class="tab-content" >
                    <div role="tabpanel" class="tab-pane  <?php if(!(isset($_REQUEST['tab']))){?>active<?php }?>" id="sum">
                        <div class="row">
                            &nbsp;
                        </div>
                        <div class="row">
                            <div class="col-md-4" style="height: 250px;background-color:#1b4f3c">
                                <h1 style="color: #FFF;text-align:center;">Today's Income</h1>
                                <h2 style="color: #FFF;text-align:center;margin:auto;">
                                    <?php 
                                        $sum = 0;
                                        $fin_res=$fin_obj->get_today(1);
                                        $fin_row=$fin_res->fetch_assoc();
                                        if($fin_row['t'] == 0){
                                            echo "Yasas 0.00"; 
                                        }else{
                                            echo "Yasas ". $fin_row['t']; 
                                            $sum += $fin_row['t'];
                                        }
                                    ?>
                                </h2>
                                <h2 style="color: #FFF;text-align:center;margin:auto">
                                    <?php 
                                        $fin_res=$fin_obj->get_today(2);
                                        $fin_row=$fin_res->fetch_assoc();
                                        if($fin_row['t'] == 0){
                                            echo "Asiri 0.00"; 
                                        }else{
                                            echo "Asiri ". $fin_row['t'];
                                            $sum += $fin_row['t']; 
                                        }
                                    ?>
                                </h2>
                                <h2 style="color: #FFF;text-align:center;margin:auto">
                                    <?php 
                                        $fin_res=$fin_obj->get_today(3);
                                        $fin_row=$fin_res->fetch_assoc();
                                        if($fin_row['t'] == 0){
                                            echo "Lanka 0.00"; 
                                        }else{
                                            echo "Lanka ". $fin_row['t']; 
                                            $sum += $fin_row['t'];
                                        }
                                    ?>
                                </h2>
                                <h2 style="color: #FFF;text-align:center;margin:auto">
                                    <?php 
                                    /* $fin_res=$fin_obj->get_today_total();
                                        $fin_row=$fin_res->fetch_assoc();
                                        if($fin_row['t'] == 0){
                                            echo "Total 0.00"; 
                                        }else{
                                            $fin_row=$fin_res->fetch_assoc();*/
                                            echo "Total ". $sum; 
                                        //}
                                    ?>
                                </h2>
                            </div>

                            <div class="col-md-1">
                                &nbsp;
                            </div> 
                            
                            <div class="col-md-4" style="height: 250px;background-color:#1b4f3c">
                                <h1 style="color: #FFF;text-align:center;">Last 7 days' Income</h1>
                                <h2 style="color: #FFF;text-align:center;margin:auto;">
                                    <?php 
                                        $sum = 0;
                                        $fin_res=$fin_obj->get_last_week(1);
                                        $fin_row=$fin_res->fetch_assoc();
                                        if($fin_row['t'] == 0){
                                            echo "Yasas 0.00"; 
                                        }else{
                                            echo "Yasas ". $fin_row['t']; 
                                            $sum += $fin_row['t'];
                                        }
                                    ?>
                                </h2>
                                <h2 style="color: #FFF;text-align:center;margin:auto">
                                    <?php 
                                        $fin_res=$fin_obj->get_last_week(2);
                                        $fin_row=$fin_res->fetch_assoc();
                                        if($fin_row['t'] == 0){
                                            echo "Asiri 0.00"; 
                                        }else{
                                            echo "Asiri ". $fin_row['t'];
                                            $sum += $fin_row['t']; 
                                        }
                                    ?>
                                </h2>
                                <h2 style="color: #FFF;text-align:center;margin:auto">
                                    <?php 
                                        $fin_res=$fin_obj->get_last_week(3);
                                        $fin_row=$fin_res->fetch_assoc();
                                        if($fin_row['t'] == 0){
                                            echo "Lanka 0.00"; 
                                        }else{
                                            echo "Lanka ". $fin_row['t']; 
                                            $sum += $fin_row['t'];
                                        }
                                    ?>
                                </h2>
                                <h2 style="color: #FFF;text-align:center;margin:auto">
                                    <?php 
                                    /* $fin_res=$fin_obj->get_today_total();
                                        $fin_row=$fin_res->fetch_assoc();
                                        if($fin_row['t'] == 0){
                                            echo "Total 0.00"; 
                                        }else{
                                            $fin_row=$fin_res->fetch_assoc();*/
                                            echo "Total ". $sum; 
                                        //}
                                    ?>
                                </h1>
                            </div>
                        </div>                    
                        
                        <div class="row">
                            &nbsp;
                        </div>
                        
                        <div class="row">
                            <div class="col-md-4" style="height: 250px;background-color:#1b4f3c">
                                <h1 style="color: #FFF;text-align:center;">Last 30 day's Income</h1>
                                <h2 style="color: #FFF;text-align:center;margin:auto;">
                                    <?php 
                                        $sum = 0;
                                        $fin_res=$fin_obj->get_last_month(1);
                                        $fin_row=$fin_res->fetch_assoc();
                                        if($fin_row['t'] == 0){
                                            echo "Yasas 0.00"; 
                                        }else{
                                            echo "Yasas ". $fin_row['t']; 
                                            $sum += $fin_row['t'];
                                        }
                                    ?>
                                </h2>
                                <h2 style="color: #FFF;text-align:center;margin:auto">
                                    <?php 
                                        $fin_res=$fin_obj->get_last_month(2);
                                        $fin_row=$fin_res->fetch_assoc();
                                        if($fin_row['t'] == 0){
                                            echo "Asiri 0.00"; 
                                        }else{
                                            echo "Asiri ". $fin_row['t'];
                                            $sum += $fin_row['t']; 
                                        }
                                    ?>
                                </h2>
                                <h2 style="color: #FFF;text-align:center;margin:auto">
                                    <?php 
                                        $fin_res=$fin_obj->get_last_month(3);
                                        $fin_row=$fin_res->fetch_assoc();
                                        if($fin_row['t'] == 0){
                                            echo "Lanka 0.00"; 
                                        }else{
                                            echo "Lanka ". $fin_row['t']; 
                                            $sum += $fin_row['t'];
                                        }
                                    ?>
                                </h2>
                                <h2 style="color: #FFF;text-align:center;margin:auto">
                                    <?php 
                                    /* $fin_res=$fin_obj->get_today_total();
                                        $fin_row=$fin_res->fetch_assoc();
                                        if($fin_row['t'] == 0){
                                            echo "Total 0.00"; 
                                        }else{
                                            $fin_row=$fin_res->fetch_assoc();*/
                                            echo "Total ". $sum; 
                                        //}
                                    ?>
                                </h1>
                            </div>

                            <div class="col-md-1">
                                &nbsp;
                            </div> 
                            
                            <div class="col-md-4" style="height: 250px;background-color:#1b4f3c">
                                <h1 style="color: #FFF;text-align:center;">Highest Income</h1>
                                <h2 style="color: #FFF;text-align:center;margin:auto;">
                                    <?php 
                                        $sum = 0;
                                        $fin_res=$fin_obj->get_last_month(1);
                                        $fin_row=$fin_res->fetch_assoc();
                                        if($fin_row['t'] == 0){
                                            echo "Yasas 0.00"; 
                                        }else{
                                            echo "Yasas ". $fin_row['t']; 
                                            $sum += $fin_row['t'];
                                        }
                                    ?>
                                </h2>
                                <h2 style="color: #FFF;text-align:center;margin:auto">
                                    <?php 
                                        $fin_res=$fin_obj->get_last_month(2);
                                        $fin_row=$fin_res->fetch_assoc();
                                        if($fin_row['t'] == 0){
                                            echo "Asiri 0.00"; 
                                        }else{
                                            echo "Asiri ". $fin_row['t'];
                                            $sum += $fin_row['t']; 
                                        }
                                    ?>
                                </h2>
                                <h2 style="color: #FFF;text-align:center;margin:auto">
                                    <?php 
                                        $fin_res=$fin_obj->get_last_month(3);
                                        $fin_row=$fin_res->fetch_assoc();
                                        if($fin_row['t'] == 0){
                                            echo "Lanka 0.00"; 
                                        }else{
                                            echo "Lanka ". $fin_row['t']; 
                                            $sum += $fin_row['t'];
                                        }
                                    ?>
                                </h2>
                                <h2 style="color: #FFF;text-align:center;margin:auto">
                                    <?php 
                                    /* $fin_res=$fin_obj->get_today_total();
                                        $fin_row=$fin_res->fetch_assoc();
                                        if($fin_row['t'] == 0){
                                            echo "Total 0.00"; 
                                        }else{
                                            $fin_row=$fin_res->fetch_assoc();*/
                                            echo "Total ". $sum; 
                                        //}
                                    ?>
                                </h1>
                            </div>
                        </div>
                        
                    </div>

                    <div role="tabpanel" class="tab-pane" id="test">
                        <div class="row">
                            &nbsp;
                        </div>
                        <div class="row">
                            <div class="col-md-4" style="height: 250px;background-color:#1b4f3c">
                                <h1 style="color: #FFF;text-align:center;">Highest Income Tests</h1>
                                <h2 style="color: #FFF;text-align:center;margin:auto;">
                                    <?php 
                                        $sum = 0;
                                        $fin_res=$fin_obj->get_today(1);
                                        $fin_row=$fin_res->fetch_assoc();
                                        if($fin_row['t'] == 0){
                                            echo "Yasas 0.00"; 
                                        }else{
                                            echo "Yasas ". $fin_row['t']; 
                                            $sum += $fin_row['t'];
                                        }
                                    ?>
                                </h2>
                                <h2 style="color: #FFF;text-align:center;margin:auto">
                                    <?php 
                                        $fin_res=$fin_obj->get_today(2);
                                        $fin_row=$fin_res->fetch_assoc();
                                        if($fin_row['t'] == 0){
                                            echo "Asiri 0.00"; 
                                        }else{
                                            echo "Asiri ". $fin_row['t'];
                                            $sum += $fin_row['t']; 
                                        }
                                    ?>
                                </h2>
                                <h2 style="color: #FFF;text-align:center;margin:auto">
                                    <?php 
                                        $fin_res=$fin_obj->get_today(3);
                                        $fin_row=$fin_res->fetch_assoc();
                                        if($fin_row['t'] == 0){
                                            echo "Lanka 0.00"; 
                                        }else{
                                            echo "Lanka ". $fin_row['t']; 
                                            $sum += $fin_row['t'];
                                        }
                                    ?>
                                </h2>
                                <h2 style="color: #FFF;text-align:center;margin:auto">
                                    <?php 
                                    /* $fin_res=$fin_obj->get_today_total();
                                        $fin_row=$fin_res->fetch_assoc();
                                        if($fin_row['t'] == 0){
                                            echo "Total 0.00"; 
                                        }else{
                                            $fin_row=$fin_res->fetch_assoc();*/
                                            echo "Total ". $sum; 
                                        //}
                                    ?>
                                </h2>
                            </div>

                            <div class="col-md-1">
                                &nbsp;
                            </div> 
                            
                            <div class="col-md-4" style="height: 250px;background-color:#1b4f3c">
                                <h1 style="color: #FFF;text-align:center;">Least Income Tests</h1>
                                <h2 style="color: #FFF;text-align:center;margin:auto;">
                                    <?php 
                                        $sum = 0;
                                        $fin_res=$fin_obj->get_last_week(1);
                                        $fin_row=$fin_res->fetch_assoc();
                                        if($fin_row['t'] == 0){
                                            echo "Yasas 0.00"; 
                                        }else{
                                            echo "Yasas ". $fin_row['t']; 
                                            $sum += $fin_row['t'];
                                        }
                                    ?>
                                </h2>
                                <h2 style="color: #FFF;text-align:center;margin:auto">
                                    <?php 
                                        $fin_res=$fin_obj->get_last_week(2);
                                        $fin_row=$fin_res->fetch_assoc();
                                        if($fin_row['t'] == 0){
                                            echo "Asiri 0.00"; 
                                        }else{
                                            echo "Asiri ". $fin_row['t'];
                                            $sum += $fin_row['t']; 
                                        }
                                    ?>
                                </h2>
                                <h2 style="color: #FFF;text-align:center;margin:auto">
                                    <?php 
                                        $fin_res=$fin_obj->get_last_week(3);
                                        $fin_row=$fin_res->fetch_assoc();
                                        if($fin_row['t'] == 0){
                                            echo "Lanka 0.00"; 
                                        }else{
                                            echo "Lanka ". $fin_row['t']; 
                                            $sum += $fin_row['t'];
                                        }
                                    ?>
                                </h2>
                                <h2 style="color: #FFF;text-align:center;margin:auto">
                                    <?php 
                                    /* $fin_res=$fin_obj->get_today_total();
                                        $fin_row=$fin_res->fetch_assoc();
                                        if($fin_row['t'] == 0){
                                            echo "Total 0.00"; 
                                        }else{
                                            $fin_row=$fin_res->fetch_assoc();*/
                                            echo "Total ". $sum; 
                                        //}
                                    ?>
                                </h1>
                            </div>
                        </div>                    
                        
                        <div class="row">
                            &nbsp;
                        </div>
                        
                        <div class="row">
                            <div class="col-md-4" style="height: 250px;background-color:#1b4f3c">
                                <h1 style="color: #FFF;text-align:center;">Most Frequant Tests</h1>
                                <h2 style="color: #FFF;text-align:center;margin:auto;">
                                    <?php 
                                        $sum = 0;
                                        $fin_res=$fin_obj->get_last_month(1);
                                        $fin_row=$fin_res->fetch_assoc();
                                        if($fin_row['t'] == 0){
                                            echo "Yasas 0.00"; 
                                        }else{
                                            echo "Yasas ". $fin_row['t']; 
                                            $sum += $fin_row['t'];
                                        }
                                    ?>
                                </h2>
                                <h2 style="color: #FFF;text-align:center;margin:auto">
                                    <?php 
                                        $fin_res=$fin_obj->get_last_month(2);
                                        $fin_row=$fin_res->fetch_assoc();
                                        if($fin_row['t'] == 0){
                                            echo "Asiri 0.00"; 
                                        }else{
                                            echo "Asiri ". $fin_row['t'];
                                            $sum += $fin_row['t']; 
                                        }
                                    ?>
                                </h2>
                                <h2 style="color: #FFF;text-align:center;margin:auto">
                                    <?php 
                                        $fin_res=$fin_obj->get_last_month(3);
                                        $fin_row=$fin_res->fetch_assoc();
                                        if($fin_row['t'] == 0){
                                            echo "Lanka 0.00"; 
                                        }else{
                                            echo "Lanka ". $fin_row['t']; 
                                            $sum += $fin_row['t'];
                                        }
                                    ?>
                                </h2>
                                <h2 style="color: #FFF;text-align:center;margin:auto">
                                    <?php 
                                    /* $fin_res=$fin_obj->get_today_total();
                                        $fin_row=$fin_res->fetch_assoc();
                                        if($fin_row['t'] == 0){
                                            echo "Total 0.00"; 
                                        }else{
                                            $fin_row=$fin_res->fetch_assoc();*/
                                            echo "Total ". $sum; 
                                        //}
                                    ?>
                                </h2>
                            </div>

                            <div class="col-md-1">
                                &nbsp;
                            </div> 
                            
                            <div class="col-md-4" style="height: 250px;background-color:#1b4f3c">
                                <h1 style="color: #FFF;text-align:center;">Least Frequant Tests</h1>
                                <h2 style="color: #FFF;text-align:center;margin:auto;">
                                    <?php 
                                        $sum = 0;
                                        $fin_res=$fin_obj->get_last_month(1);
                                        $fin_row=$fin_res->fetch_assoc();
                                        if($fin_row['t'] == 0){
                                            echo "Yasas 0.00"; 
                                        }else{
                                            echo "Yasas ". $fin_row['t']; 
                                            $sum += $fin_row['t'];
                                        }
                                    ?>
                                </h2>
                                <h2 style="color: #FFF;text-align:center;margin:auto">
                                    <?php 
                                        $fin_res=$fin_obj->get_last_month(2);
                                        $fin_row=$fin_res->fetch_assoc();
                                        if($fin_row['t'] == 0){
                                            echo "Asiri 0.00"; 
                                        }else{
                                            echo "Asiri ". $fin_row['t'];
                                            $sum += $fin_row['t']; 
                                        }
                                    ?>
                                </h2>
                                <h2 style="color: #FFF;text-align:center;margin:auto">
                                    <?php 
                                        $fin_res=$fin_obj->get_last_month(3);
                                        $fin_row=$fin_res->fetch_assoc();
                                        if($fin_row['t'] == 0){
                                            echo "Lanka 0.00"; 
                                        }else{
                                            echo "Lanka ". $fin_row['t']; 
                                            $sum += $fin_row['t'];
                                        }
                                    ?>
                                </h2>
                                <h2 style="color: #FFF;text-align:center;margin:auto">
                                    <?php 
                                    /* $fin_res=$fin_obj->get_today_total();
                                        $fin_row=$fin_res->fetch_assoc();
                                        if($fin_row['t'] == 0){
                                            echo "Total 0.00"; 
                                        }else{
                                            $fin_row=$fin_res->fetch_assoc();*/
                                            echo "Total ". $sum; 
                                        //}
                                    ?>
                                </h2>
                            </div>
                        </div>
                    </div>                             

                    <div role="tabpanel" class="tab-pane" id="doc">
                    <div class="row">
                            &nbsp;
                        </div>
                        <div class="row">
                            <div class="col-md-4" style="height: 250px;background-color:#1b4f3c">
                                <h1 style="color: #FFF;text-align:center;">Doctors with most Tests</h1>
                                <h2 style="color: #FFF;text-align:center;margin:auto;">
                                    <?php 
                                        $sum = 0;
                                        $fin_res=$fin_obj->get_today(1);
                                        $fin_row=$fin_res->fetch_assoc();
                                        if($fin_row['t'] == 0){
                                            echo "Yasas 0.00"; 
                                        }else{
                                            echo "Yasas ". $fin_row['t']; 
                                            $sum += $fin_row['t'];
                                        }
                                    ?>
                                </h2>
                                <h2 style="color: #FFF;text-align:center;margin:auto">
                                    <?php 
                                        $fin_res=$fin_obj->get_today(2);
                                        $fin_row=$fin_res->fetch_assoc();
                                        if($fin_row['t'] == 0){
                                            echo "Asiri 0.00"; 
                                        }else{
                                            echo "Asiri ". $fin_row['t'];
                                            $sum += $fin_row['t']; 
                                        }
                                    ?>
                                </h2>
                                <h2 style="color: #FFF;text-align:center;margin:auto">
                                    <?php 
                                        $fin_res=$fin_obj->get_today(3);
                                        $fin_row=$fin_res->fetch_assoc();
                                        if($fin_row['t'] == 0){
                                            echo "Lanka 0.00"; 
                                        }else{
                                            echo "Lanka ". $fin_row['t']; 
                                            $sum += $fin_row['t'];
                                        }
                                    ?>
                                </h2>
                                <h2 style="color: #FFF;text-align:center;margin:auto">
                                    <?php 
                                    /* $fin_res=$fin_obj->get_today_total();
                                        $fin_row=$fin_res->fetch_assoc();
                                        if($fin_row['t'] == 0){
                                            echo "Total 0.00"; 
                                        }else{
                                            $fin_row=$fin_res->fetch_assoc();*/
                                            echo "Total ". $sum; 
                                        //}
                                    ?>
                                </h2>
                            </div>

                            <div class="col-md-1">
                                &nbsp;
                            </div> 
                            
                            <div class="col-md-4" style="height: 250px;background-color:#1b4f3c">
                                <h1 style="color: #FFF;text-align:center;">Doctors with least Tests</h1>
                                <h2 style="color: #FFF;text-align:center;margin:auto;">
                                    <?php 
                                        $sum = 0;
                                        $fin_res=$fin_obj->get_last_week(1);
                                        $fin_row=$fin_res->fetch_assoc();
                                        if($fin_row['t'] == 0){
                                            echo "Yasas 0.00"; 
                                        }else{
                                            echo "Yasas ". $fin_row['t']; 
                                            $sum += $fin_row['t'];
                                        }
                                    ?>
                                </h2>
                                <h2 style="color: #FFF;text-align:center;margin:auto">
                                    <?php 
                                        $fin_res=$fin_obj->get_last_week(2);
                                        $fin_row=$fin_res->fetch_assoc();
                                        if($fin_row['t'] == 0){
                                            echo "Asiri 0.00"; 
                                        }else{
                                            echo "Asiri ". $fin_row['t'];
                                            $sum += $fin_row['t']; 
                                        }
                                    ?>
                                </h2>
                                <h2 style="color: #FFF;text-align:center;margin:auto">
                                    <?php 
                                        $fin_res=$fin_obj->get_last_week(3);
                                        $fin_row=$fin_res->fetch_assoc();
                                        if($fin_row['t'] == 0){
                                            echo "Lanka 0.00"; 
                                        }else{
                                            echo "Lanka ". $fin_row['t']; 
                                            $sum += $fin_row['t'];
                                        }
                                    ?>
                                </h2>
                                <h2 style="color: #FFF;text-align:center;margin:auto">
                                    <?php 
                                    /* $fin_res=$fin_obj->get_today_total();
                                        $fin_row=$fin_res->fetch_assoc();
                                        if($fin_row['t'] == 0){
                                            echo "Total 0.00"; 
                                        }else{
                                            $fin_row=$fin_res->fetch_assoc();*/
                                            echo "Total ". $sum; 
                                        //}
                                    ?>
                                </h1>
                            </div>
                        </div>                    
                        
                        <div class="row">
                            &nbsp;
                        </div>
                        
                        <div class="row">
                            <div class="col-md-4" style="height: 250px;background-color:#1b4f3c">
                                <h1 style="color: #FFF;text-align:center;">ASDF</h1>
                                <h2 style="color: #FFF;text-align:center;margin:auto;">
                                    <?php 
                                        $sum = 0;
                                        $fin_res=$fin_obj->get_last_month(1);
                                        $fin_row=$fin_res->fetch_assoc();
                                        if($fin_row['t'] == 0){
                                            echo "Yasas 0.00"; 
                                        }else{
                                            echo "Yasas ". $fin_row['t']; 
                                            $sum += $fin_row['t'];
                                        }
                                    ?>
                                </h2>
                                <h2 style="color: #FFF;text-align:center;margin:auto">
                                    <?php 
                                        $fin_res=$fin_obj->get_last_month(2);
                                        $fin_row=$fin_res->fetch_assoc();
                                        if($fin_row['t'] == 0){
                                            echo "Asiri 0.00"; 
                                        }else{
                                            echo "Asiri ". $fin_row['t'];
                                            $sum += $fin_row['t']; 
                                        }
                                    ?>
                                </h2>
                                <h2 style="color: #FFF;text-align:center;margin:auto">
                                    <?php 
                                        $fin_res=$fin_obj->get_last_month(3);
                                        $fin_row=$fin_res->fetch_assoc();
                                        if($fin_row['t'] == 0){
                                            echo "Lanka 0.00"; 
                                        }else{
                                            echo "Lanka ". $fin_row['t']; 
                                            $sum += $fin_row['t'];
                                        }
                                    ?>
                                </h2>
                                <h2 style="color: #FFF;text-align:center;margin:auto">
                                    <?php 
                                    /* $fin_res=$fin_obj->get_today_total();
                                        $fin_row=$fin_res->fetch_assoc();
                                        if($fin_row['t'] == 0){
                                            echo "Total 0.00"; 
                                        }else{
                                            $fin_row=$fin_res->fetch_assoc();*/
                                            echo "Total ". $sum; 
                                        //}
                                    ?>
                                </h2>
                            </div>

                            <div class="col-md-1">
                                &nbsp;
                            </div> 
                            
                            <div class="col-md-4" style="height: 250px;background-color:#1b4f3c">
                                <h1 style="color: #FFF;text-align:center;">GSDL</h1>
                                <h2 style="color: #FFF;text-align:center;margin:auto;">
                                    <?php 
                                        $sum = 0;
                                        $fin_res=$fin_obj->get_last_month(1);
                                        $fin_row=$fin_res->fetch_assoc();
                                        if($fin_row['t'] == 0){
                                            echo "Yasas 0.00"; 
                                        }else{
                                            echo "Yasas ". $fin_row['t']; 
                                            $sum += $fin_row['t'];
                                        }
                                    ?>
                                </h2>
                                <h2 style="color: #FFF;text-align:center;margin:auto">
                                    <?php 
                                        $fin_res=$fin_obj->get_last_month(2);
                                        $fin_row=$fin_res->fetch_assoc();
                                        if($fin_row['t'] == 0){
                                            echo "Asiri 0.00"; 
                                        }else{
                                            echo "Asiri ". $fin_row['t'];
                                            $sum += $fin_row['t']; 
                                        }
                                    ?>
                                </h2>
                                <h2 style="color: #FFF;text-align:center;margin:auto">
                                    <?php 
                                        $fin_res=$fin_obj->get_last_month(3);
                                        $fin_row=$fin_res->fetch_assoc();
                                        if($fin_row['t'] == 0){
                                            echo "Lanka 0.00"; 
                                        }else{
                                            echo "Lanka ". $fin_row['t']; 
                                            $sum += $fin_row['t'];
                                        }
                                    ?>
                                </h2>
                                <h2 style="color: #FFF;text-align:center;margin:auto">
                                    <?php 
                                    /* $fin_res=$fin_obj->get_today_total();
                                        $fin_row=$fin_res->fetch_assoc();
                                        if($fin_row['t'] == 0){
                                            echo "Total 0.00"; 
                                        }else{
                                            $fin_row=$fin_res->fetch_assoc();*/
                                            echo "Total ". $sum; 
                                        //}
                                    ?>
                                </h2>
                            </div>
                        </div>
                    </div>

                    <div role="tabpanel" class="tab-pane" id="lab">
                        <div class="row">
                            &nbsp;
                        </div>
                        <h1>Add Lab<h1>
                    </div>
                </div>

            </div>
        </div>
    </body>
   <?php
 
   ?>

    <script type="text/javascript">

        function readURL(input) {
        if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#prev_img1')
            .attr('src', e.target.result)
            .height(70)
            .width(80);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

        function readURL2(input) {
        if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#prev_img2')
            .attr('src', e.target.result)
            .height(70)
            .width(80);
        };

        reader.readAsDataURL(input.files[0]);
    }
}
        </script>
        <script type="text/javascript" src="../js/category.js"></script>
        <?php
        
        include '../includes/bootstrap_script_includes.php';

        ?>
</html>
