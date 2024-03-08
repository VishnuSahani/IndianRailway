<?php
session_start();

if (isset($_POST['common_action'])) {

    include("../include/db_config.php");
    date_default_timezone_set('Asia/Kolkata');

    function responseSend($status, $msg, $formType = '', $data = [])
    {

        $respo['status'] = $status;
        $respo['msg'] = $msg;
        $respo['formType'] = $formType;
        $respo['data'] = $data;
        echo json_encode($respo);
        die();

    }


    $action = trim($_POST['common_action']);
    $respo = [];


    if ($action == "getFormSubmitedData") {
        if (!isset($_SESSION['empid_for_form']) || !isset($_SESSION['section_name_tmp']) || !isset($_SESSION['section_id_tmp']) || !isset($_SESSION['station_name_tmp']) || !isset($_SESSION['station_id_tmp']) || !isset($_POST['componentName'])) {
            responseSend(false, "Something went wrong with request");

        }

        $userID = trim($_SESSION['empid_for_form']);
        $sectionName = trim($_SESSION['section_name_tmp']);
        $sectionId = trim($_SESSION['section_id_tmp']);
        $stationName = trim($_SESSION['station_name_tmp']);
        $stationId = trim($_SESSION['station_id_tmp']);
        $compoNameTmp = trim($_POST['componentName']);

        if (empty($sectionName) || empty($sectionId) || empty($stationName) || empty($stationId) || empty($compoNameTmp) || empty($userID)) {
            responseSend(false, "Something went wrong, Empty request");
        }

        $formType = "";
        $data = [];
        $formData = [];

        if ($compoNameTmp == "POINT") {
            // EP 1,2,4,5 form data
            $formType = "EP";

            $qEP1 = mysqli_query($con, "SELECT * FROM ep1_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if (mysqli_num_rows($qEP1) <= 0) {

                // $formData['EP1']=[];

            } else {

                $ep1Data = [];

                while ($runEp1 = mysqli_fetch_array($qEP1)) {

                    $ep1Data[] = $runEp1;

                }

                $formData['EP1'] = $ep1Data;

            }


            // ep1 end

            // ep2 start

            $qEP2 = mysqli_query($con, "SELECT * FROM ep2_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if (mysqli_num_rows($qEP2) <= 0) {

                // $formData['EP2']=[];

            } else {

                $ep2Data = [];

                while ($runEp2 = mysqli_fetch_array($qEP2)) {

                    $ep2Data[] = $runEp2;

                }

                $formData['EP2'] = $ep2Data;

            }


            // ep2 end 

            
            // ep3 start

            $qEP3 = mysqli_query($con, "SELECT * FROM ep3_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if (mysqli_num_rows($qEP3) <= 0) {

                // $formData['EP2']=[];

            } else {

                $ep3Data = [];

                while ($runEp3 = mysqli_fetch_array($qEP3)) {

                    $ep3Data[] = $runEp3;

                }

                $formData['EP3'] = $ep3Data;

            }


            // ep3 end 

            // ep4 start

            $qEP4 = mysqli_query($con, "SELECT * FROM ep4_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if (mysqli_num_rows($qEP4) <= 0) {

                // $formData['EP4']=[];

            } else {

                $ep4Data = [];

                while ($runEp4 = mysqli_fetch_array($qEP4)) {

                    $ep4Data[] = $runEp4;

                }

                $formData['EP4'] = $ep4Data;

            }

            // ep4 end here

            // ep5 start

            $qEP5 = mysqli_query($con, "SELECT * FROM ep5_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if (mysqli_num_rows($qEP5) <= 0) {

                // $formData['EP5']=[];

            } else {

                $ep5Data = [];

                while ($runEp5 = mysqli_fetch_array($qEP5)) {

                    $ep5Data[] = $runEp5;

                }

                $formData['EP5'] = $ep5Data;

            }





        } elseif ($compoNameTmp == "TRACK") {
            // EP 1,2,4,5 form data
            $formType = "T";

            $qEP1 = mysqli_query($con, "SELECT * FROM t1_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if (mysqli_num_rows($qEP1) <= 0) {

                // $formData['EP1']=[];

            } else {

                $ep1Data = [];

                while ($runEp1 = mysqli_fetch_array($qEP1)) {

                    $ep1Data[] = $runEp1;

                }

                $formData['T1'] = $ep1Data;

            }


            // ep1 end

            // ep2 start

            $qEP2 = mysqli_query($con, "SELECT * FROM t2_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if (mysqli_num_rows($qEP2) <= 0) {

                // $formData['EP2']=[];

            } else {

                $ep2Data = [];

                while ($runEp2 = mysqli_fetch_array($qEP2)) {

                    $ep2Data[] = $runEp2;

                }

                $formData['T2'] = $ep2Data;

            }


            // ep2 end 

            // ep4 start

            $qEP3 = mysqli_query($con, "SELECT * FROM t3_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if (mysqli_num_rows($qEP3) <= 0) {

                // $formData['EP4']=[];

            } else {

                $ep3Data = [];

                while ($runEp3 = mysqli_fetch_array($qEP3)) {

                    $ep3Data[] = $runEp3;

                }

                $formData['T3'] = $ep3Data;

            }

            // ep4 end here

                     // t4 start

                     $qEP4 = mysqli_query($con, "SELECT * FROM t4_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

                     if (mysqli_num_rows($qEP4) <= 0) {
         
                         // $formData['EP4']=[];
         
                     } else {
         
                         $ep4Data = [];
         
                         while ($runEp4 = mysqli_fetch_array($qEP4)) {
         
                             $ep4Data[] = $runEp4;
         
                         }
         
                         $formData['T4'] = $ep4Data;
         
                     }
         
                     // ep4 end here

            // ep5 start

            $qEP5 = mysqli_query($con, "SELECT * FROM t5_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if (mysqli_num_rows($qEP5) <= 0) {

                // $formData['EP5']=[];

            } else {

                $ep5Data = [];

                while ($runEp5 = mysqli_fetch_array($qEP5)) {

                    $ep5Data[] = $runEp5;

                }

                $formData['T5'] = $ep5Data;

            }





        } elseif ($compoNameTmp == "SIGNAL" || $compoNameTmp == "SIGNAL CS") {
            // EP 1,2,4,5 form data
            $formType = "CS";

            $qEP1 = mysqli_query($con, "SELECT * FROM cs1_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if (mysqli_num_rows($qEP1) <= 0) {

                // $formData['EP1']=[];

            } else {

                $ep1Data = [];

                while ($runEp1 = mysqli_fetch_array($qEP1)) {

                    $ep1Data[] = $runEp1;

                }

                $formData['CS1'] = $ep1Data;

            }


            // ep1 end

            // ep2 start

            $qEP2 = mysqli_query($con, "SELECT * FROM cs2_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if (mysqli_num_rows($qEP2) <= 0) {

                // $formData['EP2']=[];

            } else {

                $ep2Data = [];

                while ($runEp2 = mysqli_fetch_array($qEP2)) {

                    $ep2Data[] = $runEp2;

                }

                $formData['CS2'] = $ep2Data;

            }

        } elseif ($compoNameTmp == "MLB") {
            // EP 1,2,4,5 form data
            $formType = "MLB";

            $qEP1 = mysqli_query($con, "SELECT * FROM mlb1_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if (mysqli_num_rows($qEP1) <= 0) {

                // $formData['EP1']=[];

            } else {

                $ep1Data = [];

                while ($runEp1 = mysqli_fetch_array($qEP1)) {

                    $ep1Data[] = $runEp1;

                }

                $formData['MLB1'] = $ep1Data;

            }


            // ep1 end

            // ep2 start

            $qEP2 = mysqli_query($con, "SELECT * FROM mlb2_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if (mysqli_num_rows($qEP2) <= 0) {

                // $formData['EP2']=[];

            } else {

                $ep2Data = [];

                while ($runEp2 = mysqli_fetch_array($qEP2)) {

                    $ep2Data[] = $runEp2;

                }

                $formData['MLB2'] = $ep2Data;

            }

            // 2 end


            $qEP3 = mysqli_query($con, "SELECT * FROM mlb3_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if (mysqli_num_rows($qEP3) <= 0) {

                // $formData['EP1']=[];

            } else {

                $ep3Data = [];

                while ($runEp3 = mysqli_fetch_array($qEP3)) {

                    $ep3Data[] = $runEp3;

                }

                $formData['MLB3'] = $ep3Data;

            }


            // 3  end



            // ep1 end

        }
        //
        elseif ($compoNameTmp == "ELB") {
            // EP 1,2,4,5 form data
            $formType = "ELB";

            $qEP1 = mysqli_query($con, "SELECT * FROM elb1_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if (mysqli_num_rows($qEP1) <= 0) {

                // $formData['EP1']=[];

            } else {

                $ep1Data = [];

                while ($runEp1 = mysqli_fetch_array($qEP1)) {

                    $ep1Data[] = $runEp1;

                }

                $formData['ELB1'] = $ep1Data;

            }


            // elb1 end

            // elb2 start

            $qEP2 = mysqli_query($con, "SELECT * FROM elb2_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if (mysqli_num_rows($qEP2) <= 0) {

                // $formData['EP2']=[];

            } else {

                $ep2Data = [];

                while ($runEp2 = mysqli_fetch_array($qEP2)) {

                    $ep2Data[] = $runEp2;

                }

                $formData['ELB2'] = $ep2Data;

            }
            //elb2 end

            // elb3 start

            $qEP2 = mysqli_query($con, "SELECT * FROM elb3_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if (mysqli_num_rows($qEP2) <= 0) {

                // $formData['EP2']=[];

            } else {

                $ep2Data = [];

                while ($runEp2 = mysqli_fetch_array($qEP2)) {

                    $ep2Data[] = $runEp2;

                }

                $formData['ELB3'] = $ep2Data;

            }

            // elb3 end

            // elb4 start

            $qEP2 = mysqli_query($con, "SELECT * FROM elb4_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if (mysqli_num_rows($qEP2) <= 0) {

                // $formData['EP2']=[];

            } else {

                $ep2Data = [];

                while ($runEp2 = mysqli_fetch_array($qEP2)) {

                    $ep2Data[] = $runEp2;

                }

                $formData['ELB4'] = $ep2Data;

            }

            // elb4 end

            // elb2 start

            $qEP2 = mysqli_query($con, "SELECT * FROM elb5_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if (mysqli_num_rows($qEP2) <= 0) {

                // $formData['EP2']=[];

            } else {

                $ep2Data = [];

                while ($runEp2 = mysqli_fetch_array($qEP2)) {

                    $ep2Data[] = $runEp2;

                }

                $formData['ELB5'] = $ep2Data;

            }
            //elb5 end

        } elseif ($compoNameTmp == "SLB") {
            // EP 1,2,4,5 form data
            $formType = "SLB";

            $qEP1 = mysqli_query($con, "SELECT * FROM slb1_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if (mysqli_num_rows($qEP1) <= 0) {

                // $formData['EP1']=[];

            } else {

                $ep1Data = [];

                while ($runEp1 = mysqli_fetch_array($qEP1)) {

                    $ep1Data[] = $runEp1;

                }

                $formData['SLB1'] = $ep1Data;

            }


            // slb1 end

            // slb2 start

            $qEP2 = mysqli_query($con, "SELECT * FROM slb2_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if (mysqli_num_rows($qEP2) <= 0) {

                // $formData['EP2']=[];

            } else {

                $ep2Data = [];

                while ($runEp2 = mysqli_fetch_array($qEP2)) {

                    $ep2Data[] = $runEp2;

                }

                $formData['SLB2'] = $ep2Data;

            }
            //slb2 end

        } elseif ($compoNameTmp == "AXLE COUNTER") {
            // EP 1,2,4,5 form data
            $formType = "DAC";

            $qEP1 = mysqli_query($con, "SELECT * FROM dac1_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if (mysqli_num_rows($qEP1) <= 0) {

                // $formData['EP1']=[];

            } else {

                $ep1Data = [];

                while ($runEp1 = mysqli_fetch_array($qEP1)) {

                    $ep1Data[] = $runEp1;

                }

                $formData['DAC1'] = $ep1Data;

            }


            // dac1 end

            // dac2 start

            $qEP2 = mysqli_query($con, "SELECT * FROM dac2_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if (mysqli_num_rows($qEP2) <= 0) {

                // $formData['EP2']=[];

            } else {

                $ep2Data = [];

                while ($runEp2 = mysqli_fetch_array($qEP2)) {

                    $ep2Data[] = $runEp2;

                }

                $formData['DAC2'] = $ep2Data;

            }
            //dac2 end

            // dac3 start

            $qEP2 = mysqli_query($con, "SELECT * FROM dac3_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if (mysqli_num_rows($qEP2) <= 0) {

                // $formData['EP2']=[];

            } else {

                $ep2Data = [];

                while ($runEp2 = mysqli_fetch_array($qEP2)) {

                    $ep2Data[] = $runEp2;

                }

                $formData['DAC3'] = $ep2Data;

            }

            // dac3 end





        }
        elseif ($compoNameTmp == "DL") {

            $formType = "DL";

            $qEP1 = mysqli_query($con, "SELECT * FROM dl1_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if (mysqli_num_rows($qEP1) <= 0) {

                // $formData['EP1']=[];

            } else {

                $ep1Data = [];

                while ($runEp1 = mysqli_fetch_array($qEP1)) {

                    $ep1Data[] = $runEp1;

                }

                $formData['DL1'] = $ep1Data;

            }


            // ep1 end

            // ep2 start

            $qEP2 = mysqli_query($con, "SELECT * FROM dl2_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if (mysqli_num_rows($qEP2) <= 0) {

                // $formData['EP2']=[];

            } else {

                $ep2Data = [];

                while ($runEp2 = mysqli_fetch_array($qEP2)) {

                    $ep2Data[] = $runEp2;

                }

                $formData['DL2'] = $ep2Data;

            }

            // 2 end


            $qEP3 = mysqli_query($con, "SELECT * FROM dl3_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if (mysqli_num_rows($qEP3) <= 0) {

                // $formData['EP1']=[];

            } else {

                $ep3Data = [];

                while ($runEp3 = mysqli_fetch_array($qEP3)) {

                    $ep3Data[] = $runEp3;

                }

                $formData['DL3'] = $ep3Data;

            }


            // 3  end


            $qEP4 = mysqli_query($con, "SELECT * FROM dl4_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if (mysqli_num_rows($qEP4) <= 0) {

                // $formData['EP1']=[];

            } else {

                $ep4Data = [];

                while ($runEp4 = mysqli_fetch_array($qEP4)) {

                    $ep4Data[] = $runEp4;

                }

                $formData['DL4'] = $ep4Data;

            }


            // ep1 end

        }
        elseif($compoNameTmp == "BLOCK INSTRUMENT"){
            // EP 1,2,4,5 form data
            $formType = "BI";
            
            $qEP1 = mysqli_query($con,"SELECT * FROM db1_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if(mysqli_num_rows($qEP1) <=0){

                // $formData['EP1']=[];

            }else{

                $ep1Data = [];

                while($runEp1 = mysqli_fetch_array($qEP1)){

                    $ep1Data[] = $runEp1;

                }
                
                $formData['DB1'] = $ep1Data ;

            }


            // dB1 end

            // dac2 start

            $qEP2 = mysqli_query($con,"SELECT * FROM db2_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if(mysqli_num_rows($qEP2) <=0){

                // $formData['EP2']=[];

            }else{

                $ep2Data = [];

                while($runEp2 = mysqli_fetch_array($qEP2)){

                    $ep2Data[] = $runEp2;

                }
                
                $formData['DB2'] = $ep2Data ;

            } 
            //db2 end

            // db3 start

            $qEP2 = mysqli_query($con,"SELECT * FROM db3_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if(mysqli_num_rows($qEP2) <=0){

                // $formData['EP2']=[];

            }else{

                $ep2Data = [];

                while($runEp2 = mysqli_fetch_array($qEP2)){

                    $ep2Data[] = $runEp2;

                }
                
                $formData['DB3'] = $ep2Data ;

            }

            // dac3 end
            
                        // hb1 start

                        $hb1Q = mysqli_query($con,"SELECT * FROM hb1_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

                        if(mysqli_num_rows($hb1Q) <=0){
            
                            // $formData['EP2']=[];
            
                        }else{
            
                            $hb1Data = [];
            
                            while($hb1_run = mysqli_fetch_array($hb1Q)){
            
                                $hb1Data[] = $hb1_run;
            
                            }
                            
                            $formData['HB1'] = $hb1Data ;
            
                        }
            
                        // hb1 end

                                      // hb2 start

                                      $hb2Q = mysqli_query($con,"SELECT * FROM hb2_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

                                      if(mysqli_num_rows($hb2Q) <=0){
                          
                                          // $formData['EP2']=[];
                          
                                      }else{
                          
                                          $hb2Data = [];
                          
                                          while($hb2_run = mysqli_fetch_array($hb2Q)){
                          
                                              $hb2Data[] = $hb2_run;
                          
                                          }
                                          
                                          $formData['HB2'] = $hb2Data ;
                          
                                      }
                          
                                      // hb1 end

                                                    // hb1 start

                        $hb3Q = mysqli_query($con,"SELECT * FROM hb3_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

                        if(mysqli_num_rows($hb3Q) <=0){
            
                            // $formData['EP2']=[];
            
                        }else{
            
                            $hb3Data = [];
            
                            while($hb3_run = mysqli_fetch_array($hb3Q)){
            
                                $hb3Data[] = $hb3_run;
            
                            }
                            
                            $formData['HB3'] = $hb3Data ;
            
                        }
            
                        // hb1 end

           //uf1 start
            $qEP2 = mysqli_query($con,"SELECT * FROM uf1_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if(mysqli_num_rows($qEP2) <=0){

                // $formData['EP2']=[];

            }else{

                $ep2Data = [];

                while($runEp2 = mysqli_fetch_array($qEP2)){

                    $ep2Data[] = $runEp2;

                }
                
                $formData['UF1'] = $ep2Data ;

            }

            // uf1 end
            //uf2 start
            $qEP2 = mysqli_query($con,"SELECT * FROM uf2_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if(mysqli_num_rows($qEP2) <=0){

                // $formData['EP2']=[];

            }else{

                $ep2Data = [];

                while($runEp2 = mysqli_fetch_array($qEP2)){

                    $ep2Data[] = $runEp2;

                }
                
                $formData['UF2'] = $ep2Data ;

            }


            //uf2 end
           //uf3 start
            $qEP2 = mysqli_query($con,"SELECT * FROM uf3_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if(mysqli_num_rows($qEP2) <=0){

                // $formData['EP2']=[];

            }else{

                $ep2Data = [];

                while($runEp2 = mysqli_fetch_array($qEP2)){

                    $ep2Data[] = $runEp2;

                }
                
                $formData['UF3'] = $ep2Data ;

            }

            //uf3 end


            //uf4 start
            $qEP2 = mysqli_query($con,"SELECT * FROM uf4_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if(mysqli_num_rows($qEP2) <=0){

                // $formData['EP2']=[];

            }else{

                $ep2Data = [];

                while($runEp2 = mysqli_fetch_array($qEP2)){

                    $ep2Data[] = $runEp2;

                }
                
                $formData['UF4'] = $ep2Data ;

            }

            //uf4 end

            //uf5 start
            $qEP2 = mysqli_query($con,"SELECT * FROM uf5_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if(mysqli_num_rows($qEP2) <=0){

                // $formData['EP2']=[];

            }else{

                $ep2Data = [];

                while($runEp2 = mysqli_fetch_array($qEP2)){

                    $ep2Data[] = $runEp2;

                }
                
                $formData['UF5'] = $ep2Data ;

            }

            //uf5 end

            

            //hb1 end
            
        } elseif ($compoNameTmp == "IPS") {
            // EP 1,2,4,5 form data
            $formType = "IPS";

            $qEP1 = mysqli_query($con, "SELECT * FROM ips1_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if (mysqli_num_rows($qEP1) <= 0) {

                // $formData['EP1']=[];

            } else {

                $ep1Data = [];

                while ($runEp1 = mysqli_fetch_array($qEP1)) {

                    $ep1Data[] = $runEp1;

                }

                $formData['IPS1'] = $ep1Data;

            }


            // ep1 end

            // ep2 start

            $qEP2 = mysqli_query($con, "SELECT * FROM ips2_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if (mysqli_num_rows($qEP2) <= 0) {

                // $formData['EP2']=[];

            } else {

                $ep2Data = [];

                while ($runEp2 = mysqli_fetch_array($qEP2)) {

                    $ep2Data[] = $runEp2;

                }

                $formData['IPS2'] = $ep2Data;

            }

            // 2 end


            $qEP3 = mysqli_query($con, "SELECT * FROM ips3_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if (mysqli_num_rows($qEP3) <= 0) {

                // $formData['EP1']=[];

            } else {

                $ep3Data = [];

                while ($runEp3 = mysqli_fetch_array($qEP3)) {

                    $ep3Data[] = $runEp3;

                }

                $formData['IPS3'] = $ep3Data;

            }

        }elseif ($compoNameTmp == "EARTHING") {
            // EP 1,2,4,5 form data
            $formType = "IPS";

            $qEP1 = mysqli_query($con, "SELECT * FROM E1_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if (mysqli_num_rows($qEP1) <= 0) {

                // $formData['EP1']=[];

            } else {

                $ep1Data = [];

                while ($runEp1 = mysqli_fetch_array($qEP1)) {

                    $ep1Data[] = $runEp1;

                }

                $formData['E1'] = $ep1Data;

            }


            // ep1 end

            // ep2 start

            $qEP2 = mysqli_query($con, "SELECT * FROM e2_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if (mysqli_num_rows($qEP2) <= 0) {

                // $formData['EP2']=[];

            } else {

                $ep2Data = [];

                while ($runEp2 = mysqli_fetch_array($qEP2)) {

                    $ep2Data[] = $runEp2;

                }

                $formData['E2'] = $ep2Data;

            }

            // 2 end


            $qEP3 = mysqli_query($con, "SELECT * FROM e3_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if (mysqli_num_rows($qEP3) <= 0) {

                // $formData['EP1']=[];

            } else {

                $ep3Data = [];

                while ($runEp3 = mysqli_fetch_array($qEP3)) {

                    $ep3Data[] = $runEp3;

                }

                $formData['E3'] = $ep3Data;

            }

        }
        
        else {
            responseSend(false, "Invalid Component Name, Kindly check component name", []);
        }


        // $data[0] = json_encode($formData);
        $data[0] = $formData;

        responseSend(true, "Data Found", $formType, $data);




    } elseif ($action == "updateSingleValueFormData") {
        if (!isset($_POST['userID']) || empty($_POST['userID'])) {
            $respo['status'] = false;
            $respo['msg'] = "Your session is logout, try again";
            $respo['data'] = [];
            echo json_encode($respo);
            die();
        }

        if (!isset($_POST['value']) || !isset($_POST['tableName']) || !isset($_POST['columnName']) || !isset($_POST['id'])) {

            $respo['status'] = false;
            $respo['msg'] = "Something went wrong with parameter";
            $respo['data'] = [];
            echo json_encode($respo);
            die();

        }

        $value = $_POST['value'];
        $tbName = $_POST['tableName'];
        $columnName = $_POST['columnName'];
        $id = $_POST['id'];
        $tableName = "";
        $userID = $_POST['userID'];

        switch ($tbName) {
            case "EP1":
                $tableName = "ep1_form";
                break;

            case "EP2":
                $tableName = "ep2_form";
                break;

            case "EP3":
                $tableName = "ep3_form";
                break;

            case "EP4":
                $tableName = "ep4_form";
                break;
            case "EP5":
                $tableName = "ep5_form";
                break;
            default:
                $respo['status'] = false;
                $respo['msg'] = "Something went wrong with Table name";
                $respo['data'] = [];
                echo json_encode($respo);
                die();


        }

        $updateQuery = mysqli_query($con, "UPDATE $tableName SET $columnName = '$value' WHERE id='$id' AND emp_id = '$userID'");

        if ($updateQuery) {
            $respo['status'] = true;
            $respo['msg'] = "Data successfully updated";
            $respo['data'] = [];
            echo json_encode($respo);
            die();
        } else {

            $respo['status'] = false;
            $respo['msg'] = "Something went wrong with DB";
            $respo['data'] = [];
            echo json_encode($respo);
            die();
        }






    }
    // new
    if ($action == "getFormSubmitedData_new") {
        if (!isset($_SESSION['empid_for_form']) || !isset($_SESSION['section_name_tmp']) || !isset($_SESSION['section_id_tmp']) || !isset($_SESSION['station_name_tmp']) || !isset($_SESSION['station_id_tmp']) || !isset($_POST['formType'])) {
            responseSend(false, "Something went wrong with request");

        }

        $userID = trim($_SESSION['empid_for_form']);
        $sectionName = trim($_SESSION['section_name_tmp']);
        $sectionId = trim($_SESSION['section_id_tmp']);
        $stationName = trim($_SESSION['station_name_tmp']);
        $stationId = trim($_SESSION['station_id_tmp']);
        $formType = trim($_POST['formType']);

        if (empty($sectionName) || empty($sectionId) || empty($stationName) || empty($stationId) || empty($formType) || empty($userID)) {
            responseSend(false, "Something went wrong, Empty request");
        }

        $data_form = [];
        $tableName = "";

        switch ($formType) {
            case 'EP1':
                $tableName = 'ep1_form';
                break;

            case 'EP2':
                $tableName = 'ep2_form';
                break;
            case 'EP3':
                $tableName = 'ep3_form';
                break;

            case 'EP4':
                $tableName = 'ep4_form';
                break;
            case 'EP5':
                $tableName = 'ep5_form';
                break;
            case 'T1':
                $tableName = 't1_form';
                break;
            case 'T2':
                $tableName = 't2_form';
                break;
            case 'T3':
                $tableName = 't3_form';
                break;
            case 'T4':
                $tableName = 't4_form';
                break;
            case 'T5':
                $tableName = 't5_form';
                break;
            case 'MLB1':
                $tableName = 'mlb1_form';
                break;
            case 'MLB2':
                $tableName = 'mlb2_form';
                break;
            case 'MLB3':
                $tableName = 'mlb3_form';
                break;
            case 'MLB4':
                $tableName = 'mlb4_form';
                break;
            case 'MLB5':
                $tableName = 'mlb5_form';
                break;

            case 'SLB1':
                $tableName = 'slb1_form';
                break;
            case 'SLB2':
                $tableName = 'slb2_form';
                break;
            case 'SLB3':
                $tableName = 'slb3_form';
                break;
            case 'SLB4':
                $tableName = 'slb4_form';
                break;
            case 'SLB5':
                $tableName = 'slb5_form';
                break;

            case 'ELB1':
                $tableName = 'elb1_form';
                break;
            case 'ELB2':
                $tableName = 'elb2_form';
                break;
            case 'ELB3':
                $tableName = 'elb3_form';
                break;
            case 'ELB4':
                $tableName = 'elb4_form';
                break;
            case 'ELB5':
                $tableName = 'elb5_form';
                break;
            case 'DL1':
                $tableName = 'dl1_form';
                break;
            case 'DL2':
                $tableName = 'dl2_form';
                break;
            case 'DL3':
                $tableName = 'dl3_form';
                break;
            case 'DL4':
                $tableName = 'dl4_form';
                break;
            case 'DAC1':
                $tableName = 'dac1_form';
                break;
            case 'DAC2':
                $tableName = 'dac2_form';
                break;
            case 'DAC3':
                $tableName = 'dac3_form';
                break;
            case 'DB1':
                $tableName = 'db1_form';
                break;
            case 'DB2':
                $tableName = 'db2_form';
                break;
            case 'DB3':
                $tableName = 'db3_form';
                break;
            case 'HB1':
                $tableName = 'hb1_form';
                break;
            case 'HB2':
                $tableName = 'hb2_form';
                break;
            case 'HB3':
                $tableName = 'hb3_form';
                break;
            case 'UF1':
                $tableName = 'uf1_form';
                break;
            case 'UF2':
                $tableName = 'uf2_form';
                break;
            case 'UF3':
                $tableName = 'uf3_form';
                break;
            case 'UF4':
                $tableName = 'uf4_form';
                break;
            case 'UF5':
                $tableName = 'uf5_form';
                break;
            case 'CS1':
                $tableName = 'cs1_form';
                break;
            case 'CS2':
                $tableName = 'cs2_form';
                break;
            case 'E1':
                $tableName = 'e1_form';
                break;
            case 'E2':
                $tableName = 'e2_form';
                break;
            case 'E3':
                $tableName = 'e3_form';
                break;
            case 'IPS1':
                $tableName = 'ips1_form';
                break;
            case 'IPS2':
                $tableName = 'ips2_form';
                break;
            case 'IPS3':
                $tableName = 'ips3_form';
                break;
            default:
                $respo['status'] = false;
                $respo['msg'] = "Invalid request!";
                $respo['data'] = [];
                echo json_encode($respo);
                die();
        }

 

            $queryform = mysqli_query($con, "SELECT * FROM ".$tableName." WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId'");

            if (mysqli_num_rows($queryform) <= 0) {

                $respo['status'] = false;
                $respo['msg'] = "No ".$formType." form submit by emplyee, Id= ".$userID;
                $respo['data'] = [];
                echo json_encode($respo);
                die();

            } 
            while ($query_run = mysqli_fetch_array($queryform)) {
                $data_form[] = $query_run;
            }

  

            $respo['status'] = true;
            $respo['msg'] = "Data found";
            $respo['data'] = $data_form;
            $respo['formType'] = $formType;
            echo json_encode($respo);
            die();



    }
     elseif ($action == 'getEP_FormDetails') {
        if (!isset($_POST['formType']) || empty($_POST['formType'])) {
            $respo['status'] = false;
            $respo['msg'] = "Invalid request";
            $respo['data'] = [];
            echo json_encode($respo);
            die();
        }

        $formType = trim($_POST['formType']);
        $language = trim($_POST['language']);

        $tableName = "";
        switch ($formType) {
            case 'EP1':
                $tableName = 'ep1_info';
                break;

            case 'EP2':
                $tableName = 'ep2_info';
                break;
            case 'EP3':
                $tableName = 'ep3_info';
                break;
            case 'EP4':
                $tableName = 'ep4_info';
                break;
            case 'EP5':
                $tableName = 'ep5_info';
                break;
            default:
                $respo['status'] = false;
                $respo['msg'] = "Invalid request!123";
                $respo['data'] = [];
                echo json_encode($respo);
                die();
        }

        try {

            $query = "SELECT * FROM " . $tableName . " WHERE language='$language'";
            $queryExe = mysqli_query($con, $query);
            if (mysqli_num_rows($queryExe) <= 0) {
                $respo['status'] = false;
                $respo['msg'] = "Data not found";
                $respo['data'] = [];
                echo json_encode($respo);
                die();
            }

            $data = [];

            while ($q_run = mysqli_fetch_array($queryExe)) {
                $obj = new stdClass();
                $obj->id = $q_run['id'];
                $obj->ep_id = $q_run['ep_id'];
                $obj->ep_details = $q_run['ep_details'];
                $obj->ep_option = $q_run['ep_option'];
                $data[] = $obj;

            }

            $respo['status'] = true;
            $respo['msg'] = "List found";
            $respo['data'] = $data;

            echo json_encode($respo);
            die();

        } catch (Exception $err) {

            $respo['status'] = false;
            $respo['msg'] = "Catch error"; //$err;
            $respo['data'] = [];

            echo json_encode($respo);
            die();

        }
    } elseif ($action == 'getT_FormDetails') {
        if (!isset($_POST['formType']) || empty($_POST['formType'])) {
            $respo['status'] = false;
            $respo['msg'] = "Invalid request";
            $respo['data'] = [];
            echo json_encode($respo);
            die();
        }

        $formType = trim($_POST['formType']);
        $language = trim($_POST['language']);

        $tableName = "";
        switch ($formType) {
            case 'T1':
                $tableName = 't1_info';
                break;

            case 'T2':
                $tableName = 't2_info';
                break;
            case 'T3':
                $tableName = 't3_info';
                break;

            case 'T4':
                $tableName = 't4_info';
                break;
            case 'T5':
                $tableName = 't5_info';
                break;

            default:
                $respo['status'] = false;
                $respo['msg'] = "Invalid request!";
                $respo['data'] = [];
                echo json_encode($respo);
                die();
        }

        try {

            $query = "SELECT * FROM " . $tableName . " WHERE language='$language'";
            $queryExe = mysqli_query($con, $query);
            if (mysqli_num_rows($queryExe) <= 0) {
                $respo['status'] = false;
                $respo['msg'] = "Data not found";
                $respo['data'] = [];
                echo json_encode($respo);
                die();
            }

            $data = [];

            while ($q_run = mysqli_fetch_array($queryExe)) {
                $obj = new stdClass();
                $obj->id = $q_run['id'];
                $obj->t_id = $q_run['t_id'];
                $obj->t_details = $q_run['t_details'];
                $obj->t_option = $q_run['t_option'];
                $obj->t_status = $q_run['status'];
                $data[] = $obj;

            }

            $respo['status'] = true;
            $respo['msg'] = "List found";
            $respo['data'] = $data;

            echo json_encode($respo);
            die();

        } catch (Exception $err) {

            $respo['status'] = false;
            $respo['msg'] = $err;
            $respo['data'] = [];

            echo json_encode($respo);
            die();

        }
    } elseif ($action == 'getCS_FormDetails') {
        if (!isset($_POST['formType']) || empty($_POST['formType'])) {
            $respo['status'] = false;
            $respo['msg'] = "Invalid request";
            $respo['data'] = [];
            echo json_encode($respo);
            die();
        }

        $formType = trim($_POST['formType']);
        $language = trim($_POST['language']);

        $tableName = "";
        switch ($formType) {
            // case 'CS1':
            //     $tableName = 'cs1_info';
            //     break;

            case 'CS2':
                $tableName = 'cs2_info';
                break;

            default:
                $respo['status'] = false;
                $respo['msg'] = "Invalid request!";
                $respo['data'] = [];
                echo json_encode($respo);
                die();

        }

        try {

            $query = "SELECT * FROM " . $tableName . " WHERE language='$language'";
            $queryExe = mysqli_query($con, $query);
            if (mysqli_num_rows($queryExe) <= 0) {
                $respo['status'] = false;
                $respo['msg'] = "Data not found";
                $respo['data'] = [];
                echo json_encode($respo);
                die();
            }

            $data = [];

            while ($q_run = mysqli_fetch_array($queryExe)) {
                $obj = new stdClass();
                $obj->id = $q_run['id'];
                $obj->cs_id = $q_run['cs_id'];
                $obj->cs_details = $q_run['cs_details'];
                $obj->cs_option = $q_run['cs_option'];
                $obj->cs_status = $q_run['status'];
                $data[] = $obj;

            }

            $respo['status'] = true;
            $respo['msg'] = "List found";
            $respo['data'] = $data;

            echo json_encode($respo);
            die();

        } catch (Exception $err) {

            $respo['status'] = false;
            $respo['msg'] = $err;
            $respo['data'] = [];

            echo json_encode($respo);
            die();

        }
    } elseif ($action == 'getDL_FormDetails') {
        if (!isset($_POST['formType']) || empty($_POST['formType'])) {
            $respo['status'] = false;
            $respo['msg'] = "Invalid request";
            $respo['data'] = [];
            echo json_encode($respo);
            die();
        }

        $formType = trim($_POST['formType']);
        $language = trim($_POST['language']);

        $tableName = "";
        switch ($formType) {
            case 'DL1':
                $tableName = 'dl1_info';
                break;

            case 'DL2':
                $tableName = 'dl2_info';
                break;
            case 'DL3':
                $tableName = 'dl3_info';
                break;
            case 'DL4':
                $tableName = 'dl4_info';
                break;

            default:
                $respo['status'] = false;
                $respo['msg'] = "Invalid request!";
                $respo['data'] = [];
                echo json_encode($respo);
                die();

        }

        try {

            $query = "SELECT * FROM " . $tableName . " WHERE language='$language'";
            $queryExe = mysqli_query($con, $query);
            if (mysqli_num_rows($queryExe) <= 0) {
                $respo['status'] = false;
                $respo['msg'] = "Data not found";
                $respo['data'] = [];
                echo json_encode($respo);
                die();
            }

            $data = [];

            while ($q_run = mysqli_fetch_array($queryExe)) {
                $obj = new stdClass();
                $obj->id = $q_run['id'];
                $obj->dl_id = $q_run['dl_id'];
                $obj->dl_details = $q_run['dl_details'];
                $obj->dl_option = $q_run['dl_option'];
                $obj->dl_status = $q_run['status'];
                $data[] = $obj;

            }

            $respo['status'] = true;
            $respo['msg'] = "List found";
            $respo['data'] = $data;

            echo json_encode($respo);
            die();

        } catch (Exception $err) {

            $respo['status'] = false;
            $respo['msg'] = $err;
            $respo['data'] = [];

            echo json_encode($respo);
            die();

        }
    } elseif ($action == 'getMLB_FormDetails') {
        if (!isset($_POST['formType']) || empty($_POST['formType'])) {
            $respo['status'] = false;
            $respo['msg'] = "Invalid request";
            $respo['data'] = [];
            echo json_encode($respo);
            die();
        }

        $formType = trim($_POST['formType']);
        $language = trim($_POST['language']);

        $tableName = "";
        switch ($formType) {
            case 'MLB1':
                $tableName = 'mlb1_info';
                break;

            case 'MLB2':
                $tableName = 'mlb2_info';
                break;
            case 'MLB3':
                $tableName = 'mlb3_info';
                break;

            default:
                $respo['status'] = false;
                $respo['msg'] = "Invalid request!";
                $respo['data'] = [];
                echo json_encode($respo);
                die();

        }

        try {

            $query = "SELECT * FROM " . $tableName . " WHERE language='$language'";
            $queryExe = mysqli_query($con, $query);
            if (mysqli_num_rows($queryExe) <= 0) {
                $respo['status'] = false;
                $respo['msg'] = "Data not found";
                $respo['data'] = [];
                echo json_encode($respo);
                die();
            }

            $data = [];

            while ($q_run = mysqli_fetch_array($queryExe)) {
                $obj = new stdClass();
                $obj->id = $q_run['id'];
                $obj->mlb_id = $q_run['mlb_id'];
                $obj->mlb_details = $q_run['mlb_details'];
                $obj->mlb_option = $q_run['mlb_option'];
                $obj->mlb_status = $q_run['status'];

                $data[] = $obj;

            }

            $respo['status'] = true;
            $respo['msg'] = "List found";
            $respo['data'] = $data;

            echo json_encode($respo);
            die();

        } catch (Exception $err) {

            $respo['status'] = false;
            $respo['msg'] = $err;
            $respo['data'] = [];

            echo json_encode($respo);
            die();

        }
    } elseif ($action == 'getSLB_FormDetails') {
        if (!isset($_POST['formType']) || empty($_POST['formType'])) {
            $respo['status'] = false;
            $respo['msg'] = "Invalid request";
            $respo['data'] = [];
            echo json_encode($respo);
            die();
        }

        $formType = trim($_POST['formType']);
        $language = trim($_POST['language']);

        $tableName = "";
        switch ($formType) {
            case 'SLB1':
                $tableName = 'slb1_info';
                break;

            case 'SLB2':
                $tableName = 'slb2_info';
                break;


            default:
                $respo['status'] = false;
                $respo['msg'] = "Invalid request!";
                $respo['data'] = [];
                echo json_encode($respo);
                die();

        }

        try {

            $query = "SELECT * FROM " . $tableName . " WHERE language='$language'";
            $queryExe = mysqli_query($con, $query);
            if (mysqli_num_rows($queryExe) <= 0) {
                $respo['status'] = false;
                $respo['msg'] = "Data not found";
                $respo['data'] = [];
                echo json_encode($respo);
                die();
            }

            $data = [];

            while ($q_run = mysqli_fetch_array($queryExe)) {
                $obj = new stdClass();
                $obj->id = $q_run['id'];
                $obj->slb_id = $q_run['slb_id'];
                $obj->slb_details = $q_run['slb_details'];
                $obj->slb_option = $q_run['slb_option'];
                $obj->slb_status = $q_run['status'];

                $data[] = $obj;

            }

            $respo['status'] = true;
            $respo['msg'] = "List found";
            $respo['data'] = $data;

            echo json_encode($respo);
            die();

        } catch (Exception $err) {

            $respo['status'] = false;
            $respo['msg'] = $err;
            $respo['data'] = [];

            echo json_encode($respo);
            die();

        }
    } elseif ($action == 'getELB_FormDetails') {
        if (!isset($_POST['formType']) || empty($_POST['formType'])) {
            $respo['status'] = false;
            $respo['msg'] = "Invalid request";
            $respo['data'] = [];
            echo json_encode($respo);
            die();
        }

        $formType = trim($_POST['formType']);
        $language = trim($_POST['language']);

        $tableName = "";
        switch ($formType) {
            case 'ELB1':
                $tableName = 'elb1_info';
                break;

            case 'ELB2':
                $tableName = 'elb2_info';
                break;

            case 'ELB3':
                $tableName = 'elb3_info';
                break;

            case 'ELB4':
                $tableName = 'elb4_info';
                break;

            case 'ELB5':
                $tableName = 'elb5_info';
                break;

            default:
                $respo['status'] = false;
                $respo['msg'] = "Invalid request!";
                $respo['data'] = [];
                echo json_encode($respo);
                die();

        }

        try {

            $query = "SELECT * FROM " . $tableName . " WHERE language='$language'";
            $queryExe = mysqli_query($con, $query);
            if (mysqli_num_rows($queryExe) <= 0) {
                $respo['status'] = false;
                $respo['msg'] = "Data not found";
                $respo['data'] = [];
                echo json_encode($respo);
                die();
            }

            $data = [];

            while ($q_run = mysqli_fetch_array($queryExe)) {
                $obj = new stdClass();
                $obj->id = $q_run['id'];
                $obj->elb_id = $q_run['elb_id'];
                $obj->elb_details = $q_run['elb_details'];
                $obj->elb_option = $q_run['elb_option'];
                $obj->elb_status = $q_run['status'];

                $data[] = $obj;

            }

            $respo['status'] = true;
            $respo['msg'] = "List found";
            $respo['data'] = $data;

            echo json_encode($respo);
            die();

        } catch (Exception $err) {

            $respo['status'] = false;
            $respo['msg'] = $err;
            $respo['data'] = [];

            echo json_encode($respo);
            die();

        }
    } elseif ($action == 'getDAC_FormDetails') {
        if (!isset($_POST['formType']) || empty($_POST['formType'])) {
            $respo['status'] = false;
            $respo['msg'] = "Invalid request";
            $respo['data'] = [];
            echo json_encode($respo);
            die();
        }

        $formType = trim($_POST['formType']);
        $language = trim($_POST['language']);

        $tableName = "";
        switch ($formType) {
            case 'DAC1':
                $tableName = 'dac1_info';
                break;

            case 'DAC2':
                $tableName = 'dac2_info';
                break;

            case 'DAC3':
                $tableName = 'dac3_info';
                break;

            default:
                $respo['status'] = false;
                $respo['msg'] = "Invalid request!";
                $respo['data'] = [];
                echo json_encode($respo);
                die();

        }

        try {

            $query = "SELECT * FROM " . $tableName . " WHERE language='$language'";
            $queryExe = mysqli_query($con, $query);
            if (mysqli_num_rows($queryExe) <= 0) {
                $respo['status'] = false;
                $respo['msg'] = "Data not found";
                $respo['data'] = [];
                echo json_encode($respo);
                die();
            }

            $data = [];

            while ($q_run = mysqli_fetch_array($queryExe)) {
                $obj = new stdClass();
                $obj->id = $q_run['id'];
                $obj->dac_id = $q_run['dac_id'];
                $obj->dac_details = $q_run['dac_details'];
                $obj->dac_option = $q_run['dac_option'];
                $obj->dac_status = $q_run['status'];

                $data[] = $obj;

            }

            $respo['status'] = true;
            $respo['msg'] = "List found";
            $respo['data'] = $data;

            echo json_encode($respo);
            die();

        } catch (Exception $err) {

            $respo['status'] = false;
            $respo['msg'] = $err;
            $respo['data'] = [];

            echo json_encode($respo);
            die();

        }
    } elseif ($action == 'getBI_FormDetails'){
        if(!isset($_POST['formType']) || empty($_POST['formType'])){
            $respo['status'] = false;
            $respo['msg'] = "Invalid request";
            $respo['data'] = [];
            echo json_encode($respo);
            die();
        }

        $formType = trim($_POST['formType']);
        $language = trim($_POST['language']);

        $tableName = "";
        switch ($formType) {
            case 'DB1':
                $tableName = 'db1_info';
                break;

            case 'DB2':
                $tableName = 'db2_info';
                break;
            
            case 'DB3':
                $tableName = 'db3_info';
                break;

             case 'UF1':
                $tableName = 'uf1_info';
                break;   

            case 'UF2':
                $tableName = 'uf2_info';
                break;   
                
            case 'UF3':
                $tableName = 'uf3_info';
                break;           

            case 'UF4':
                $tableName = 'uf4_info';
                break;   
                        
            case 'UF5':
                $tableName = 'uf5_info';
                break; 

            case 'HB1':
                $tableName = 'hb1_info';
                break;

            case 'HB2':
                $tableName = 'hb2_info';
                break;
            
            case 'HB3':
                $tableName = 'hb3_info';
                break;              


            default:
                $respo['status'] = false;
                $respo['msg'] = "Invalid request!";
                $respo['data'] = [];
                echo json_encode($respo);
                die();
                
        }

        try{

                $query = "SELECT * FROM ".$tableName." WHERE language='$language'";
            $queryExe = mysqli_query($con,$query);
            if(mysqli_num_rows($queryExe) <= 0){
                $respo['status'] = false;
                $respo['msg'] = "Data not found";
                $respo['data'] = [];
                echo json_encode($respo);
                die();
            }

            $data = [];
            
            while($q_run = mysqli_fetch_array($queryExe)) {
                $obj = new stdClass();
                $obj->id = $q_run['id'];
                $obj->db_id = $q_run['db_id'];
                $obj->db_details = $q_run['db_details'];
                $obj->db_option = $q_run['db_option'];
                $obj->elb_status = $q_run['status'];

                $data[] = $obj;
                
            }

        $respo['status'] = true;
        $respo['msg'] = "List found";
        $respo['data'] = $data;

        echo json_encode($respo);
        die();

        }catch(Exception $err){

            $respo['status'] = false;
            $respo['msg'] = $err;
            $respo['data'] = [];

            echo json_encode($respo);
            die();

        }
    } elseif ($action == 'getE_FormDetails'){
        if(!isset($_POST['formType']) || empty($_POST['formType'])){
            $respo['status'] = false;
            $respo['msg'] = "Invalid request";
            $respo['data'] = [];
            echo json_encode($respo);
            die();
        }

        $formType = trim($_POST['formType']);
        $language = trim($_POST['language']);

        $tableName = "";
        switch ($formType) {
            case 'E1':
                $tableName = 'e1_info';
                break;

            case 'E2':
                $tableName = 'e2_info';
                break;
            
            case 'E3':
                $tableName = 'e3_info';
                break;           
            default:
                $respo['status'] = false;
                $respo['msg'] = "Invalid request in Earthing!";
                $respo['data'] = [];
                echo json_encode($respo);
                die();
                
        }

        try{

                $query = "SELECT * FROM ".$tableName." WHERE language='$language'";
            $queryExe = mysqli_query($con,$query);
            if(mysqli_num_rows($queryExe) <= 0){
                $respo['status'] = false;
                $respo['msg'] = "Data not found";
                $respo['data'] = [];
                echo json_encode($respo);
                die();
            }

            $data = [];
            
            while($q_run = mysqli_fetch_array($queryExe)) {
                $obj = new stdClass();
                $obj->id = $q_run['id'];
                $obj->e_id = $q_run['e_id'];
                $obj->e_details = $q_run['e_details'];
                $obj->e_option = $q_run['e_option'];
                $obj->e_status = $q_run['status'];

                $data[] = $obj;
                
            }

        $respo['status'] = true;
        $respo['msg'] = "List found";
        $respo['data'] = $data;

        echo json_encode($respo);
        die();

        }catch(Exception $err){

            $respo['status'] = false;
            $respo['msg'] = $err;
            $respo['data'] = [];

            echo json_encode($respo);
            die();

        }
    }elseif ($action == 'getIPS_FormDetails'){
        if(!isset($_POST['formType']) || empty($_POST['formType'])){
            $respo['status'] = false;
            $respo['msg'] = "Invalid request";
            $respo['data'] = [];
            echo json_encode($respo);
            die();
        }

        $formType = trim($_POST['formType']);
        $language = trim($_POST['language']);

        $tableName = "";
        switch ($formType) {
            case 'IPS1':
                $tableName = 'ips1_info';
                break;

            case 'IPS2':
                $tableName = 'ips2_info';
                break;
            
            case 'IPS3':
                $tableName = 'ips3_info';
                break;           
            default:
                $respo['status'] = false;
                $respo['msg'] = "Invalid request in IPS!";
                $respo['data'] = [];
                echo json_encode($respo);
                die();
                
        }

        try{

                $query = "SELECT * FROM ".$tableName." WHERE language='$language'";
            $queryExe = mysqli_query($con,$query);
            if(mysqli_num_rows($queryExe) <= 0){
                $respo['status'] = false;
                $respo['msg'] = "Data not found";
                $respo['data'] = [];
                echo json_encode($respo);
                die();
            }

            $data = [];
            
            while($q_run = mysqli_fetch_array($queryExe)) {
                $obj = new stdClass();
                $obj->id = $q_run['id'];
                $obj->ips_id = $q_run['ips_id'];
                $obj->ips_details = $q_run['ips_details'];
                $obj->ips_option = $q_run['ips_option'];
                $obj->ips_status = $q_run['status'];

                $data[] = $obj;
                
            }

        $respo['status'] = true;
        $respo['msg'] = "List found";
        $respo['data'] = $data;

        echo json_encode($respo);
        die();

        }catch(Exception $err){

            $respo['status'] = false;
            $respo['msg'] = $err;
            $respo['data'] = [];

            echo json_encode($respo);
            die();

        }
    }
    
    else {
        responseSend(false, "Invalid Action");
    }

} else {
    responseSend(false, "Access Denied");
}


?>