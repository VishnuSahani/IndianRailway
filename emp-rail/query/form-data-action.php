<?php

if(isset($_POST['action'])){

    include("../include/db_config.php");
    date_default_timezone_set('Asia/Kolkata');

    function responseSend($status,$msg,$formType='',$data=[]){

        $respo['status'] = $status;
        $respo['msg'] = $msg;
        $respo['formType'] = $formType;
        $respo['data'] = $data;
        echo json_encode($respo);
        die();

    }


    $action = trim($_POST['action']);
    $respo = [];


    if($action == "getFormSubmitedData"){
        if(!isset($_POST['userID']) || !isset($_POST['sectionName']) || !isset($_POST['sectionId']) || !isset($_POST['stationName']) || !isset($_POST['stationId']) || !isset($_POST['componentName'])){
            responseSend(false,"Something went wrong with request");

        }

        $userID = trim($_POST['userID']);
        $sectionName = trim($_POST['sectionName']);
        $sectionId = trim($_POST['sectionId']);
        $stationName = trim($_POST['stationName']);
        $stationId = trim($_POST['stationId']);
        $compoNameTmp = trim($_POST['componentName']);

        if(empty($sectionName) || empty($sectionId) || empty($stationName) || empty($stationId) || empty($compoNameTmp)){
            responseSend(false,"Something went wrong, Empty request");
        }

        $formType = "";
        $data = [];
        $formData =[];

        if($compoNameTmp == "POINT"){
            // EP 1,2,4,5 form data
            $formType = "EP";

            $qEP1 = mysqli_query($con,"SELECT * FROM ep1_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if(mysqli_num_rows($qEP1) <=0){

                // $formData['EP1']=[];

            }else{

                $ep1Data = [];

                while($runEp1 = mysqli_fetch_array($qEP1)){

                    $ep1Data[] = $runEp1;

                }
                
                $formData['EP1'] = $ep1Data ;

            }


            // ep1 end

            // ep2 start

            $qEP2 = mysqli_query($con,"SELECT * FROM ep2_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if(mysqli_num_rows($qEP2) <=0){

                // $formData['EP2']=[];

            }else{

                $ep2Data = [];

                while($runEp2 = mysqli_fetch_array($qEP2)){

                    $ep2Data[] = $runEp2;

                }
                
                $formData['EP2'] = $ep2Data ;

            }


            // ep2 end 

                        // ep3 start

                        $qEP3 = mysqli_query($con,"SELECT * FROM ep3_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

                        if(mysqli_num_rows($qEP3) <=0){
            
                            // $formData['EP2']=[];
            
                        }else{
            
                            $ep3Data = [];
            
                            while($runEp3 = mysqli_fetch_array($qEP3)){
            
                                $ep3Data[] = $runEp3;
            
                            }
                            
                            $formData['EP3'] = $ep3Data ;
            
                        }
            
            
                        // ep3 end 

            // ep4 start

            $qEP4 = mysqli_query($con,"SELECT * FROM ep4_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if(mysqli_num_rows($qEP4) <=0){

                // $formData['EP4']=[];

            }else{

                $ep4Data = [];

                while($runEp4 = mysqli_fetch_array($qEP4)){

                    $ep4Data[] = $runEp4;

                }
                
                $formData['EP4'] = $ep4Data ;

            }

            // ep4 end here

            // ep5 start

            $qEP5 = mysqli_query($con,"SELECT * FROM ep5_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if(mysqli_num_rows($qEP5) <=0){

               // $formData['EP5']=[];

            }else{

                $ep5Data = [];

                while($runEp5 = mysqli_fetch_array($qEP5)){

                    $ep5Data[] = $runEp5;

                }
                
                $formData['EP5'] = $ep5Data ;

            }





        }
        elseif($compoNameTmp == "TRACK"){
            // EP 1,2,4,5 form data
            $formType = "T";
            
            $qEP1 = mysqli_query($con,"SELECT * FROM t1_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if(mysqli_num_rows($qEP1) <=0){

                // $formData['EP1']=[];

            }else{

                $ep1Data = [];

                while($runEp1 = mysqli_fetch_array($qEP1)){

                    $ep1Data[] = $runEp1;

                }
                
                $formData['T1'] = $ep1Data ;

            }


            // ep1 end

            // ep2 start

            $qEP2 = mysqli_query($con,"SELECT * FROM t2_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if(mysqli_num_rows($qEP2) <=0){

                // $formData['EP2']=[];

            }else{

                $ep2Data = [];

                while($runEp2 = mysqli_fetch_array($qEP2)){

                    $ep2Data[] = $runEp2;

                }
                
                $formData['T2'] = $ep2Data ;

            }


            // ep2 end 

            // ep4 start

            $qEP3 = mysqli_query($con,"SELECT * FROM t3_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if(mysqli_num_rows($qEP3) <=0){

                // $formData['EP4']=[];

            }else{

                $ep3Data = [];

                while($runEp3 = mysqli_fetch_array($qEP3)){

                    $ep3Data[] = $runEp3;

                }
                
                $formData['T3'] = $ep3Data ;

            }

            // ep4 end here

            // ep5 start

            $qEP5 = mysqli_query($con,"SELECT * FROM t5_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if(mysqli_num_rows($qEP5) <=0){

               // $formData['EP5']=[];

            }else{

                $ep5Data = [];

                while($runEp5 = mysqli_fetch_array($qEP5)){

                    $ep5Data[] = $runEp5;

                }
                
                $formData['T5'] = $ep5Data ;

            }





        }
        elseif($compoNameTmp == "SIGNAL" || $compoNameTmp == "SIGNAL CS"){
            // EP 1,2,4,5 form data
            $formType = "CS";
            
            $qEP1 = mysqli_query($con,"SELECT * FROM cs1_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if(mysqli_num_rows($qEP1) <=0){

                // $formData['EP1']=[];

            }else{

                $ep1Data = [];

                while($runEp1 = mysqli_fetch_array($qEP1)){

                    $ep1Data[] = $runEp1;

                }
                
                $formData['CS1'] = $ep1Data ;

            }


            // ep1 end

            // ep2 start

            $qEP2 = mysqli_query($con,"SELECT * FROM cs2_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if(mysqli_num_rows($qEP2) <=0){

                // $formData['EP2']=[];

            }else{

                $ep2Data = [];

                while($runEp2 = mysqli_fetch_array($qEP2)){

                    $ep2Data[] = $runEp2;

                }
                
                $formData['CS2'] = $ep2Data ;

            }

        }
        
         elseif($compoNameTmp == "MLB"){
            // EP 1,2,4,5 form data
            $formType = "MLB";
            
            $qEP1 = mysqli_query($con,"SELECT * FROM mlb1_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if(mysqli_num_rows($qEP1) <=0){

                // $formData['EP1']=[];

            }else{

                $ep1Data = [];

                while($runEp1 = mysqli_fetch_array($qEP1)){

                    $ep1Data[] = $runEp1;

                }
                
                $formData['MLB1'] = $ep1Data ;

            }


            // ep1 end

            // ep2 start

            $qEP2 = mysqli_query($con,"SELECT * FROM mlb2_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if(mysqli_num_rows($qEP2) <=0){

                // $formData['EP2']=[];

            }else{

                $ep2Data = [];

                while($runEp2 = mysqli_fetch_array($qEP2)){

                    $ep2Data[] = $runEp2;

                }
                
                $formData['MLB2'] = $ep2Data ;

            }

            // 2 end

            
            $qEP3 = mysqli_query($con,"SELECT * FROM mlb3_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if(mysqli_num_rows($qEP3) <=0){

                // $formData['EP1']=[];

            }else{

                $ep3Data = [];

                while($runEp3 = mysqli_fetch_array($qEP3)){

                    $ep3Data[] = $runEp3;

                }
                
                $formData['MLB3'] = $ep3Data ;

            }


        // 3  end



        // ep1 end

        }
//
        elseif($compoNameTmp == "ELB"){
            // EP 1,2,4,5 form data
            $formType = "ELB";
            
            $qEP1 = mysqli_query($con,"SELECT * FROM elb1_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if(mysqli_num_rows($qEP1) <=0){

                // $formData['EP1']=[];

            }else{

                $ep1Data = [];

                while($runEp1 = mysqli_fetch_array($qEP1)){

                    $ep1Data[] = $runEp1;

                }
                
                $formData['ELB1'] = $ep1Data ;

            }


            // elb1 end

            // elb2 start

            $qEP2 = mysqli_query($con,"SELECT * FROM elb2_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if(mysqli_num_rows($qEP2) <=0){

                // $formData['EP2']=[];

            }else{

                $ep2Data = [];

                while($runEp2 = mysqli_fetch_array($qEP2)){

                    $ep2Data[] = $runEp2;

                }
                
                $formData['ELB2'] = $ep2Data ;

            } 
            //elb2 end

            // elb3 start

            $qEP2 = mysqli_query($con,"SELECT * FROM elb3_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if(mysqli_num_rows($qEP2) <=0){

                // $formData['EP2']=[];

            }else{

                $ep2Data = [];

                while($runEp2 = mysqli_fetch_array($qEP2)){

                    $ep2Data[] = $runEp2;

                }
                
                $formData['ELB3'] = $ep2Data ;

            }

            // elb3 end

            // elb4 start

            $qEP2 = mysqli_query($con,"SELECT * FROM elb4_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if(mysqli_num_rows($qEP2) <=0){

                // $formData['EP2']=[];

            }else{

                $ep2Data = [];

                while($runEp2 = mysqli_fetch_array($qEP2)){

                    $ep2Data[] = $runEp2;

                }
                
                $formData['ELB4'] = $ep2Data ;

            }

            // elb4 end

            // elb2 start

            $qEP2 = mysqli_query($con,"SELECT * FROM elb5_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if(mysqli_num_rows($qEP2) <=0){

                // $formData['EP2']=[];

            }else{

                $ep2Data = [];

                while($runEp2 = mysqli_fetch_array($qEP2)){

                    $ep2Data[] = $runEp2;

                }
                
                $formData['ELB5'] = $ep2Data ;

            }
            //elb5 end

        }

         elseif($compoNameTmp == "SLB"){
            // EP 1,2,4,5 form data
            $formType = "SLB";
            
            $qEP1 = mysqli_query($con,"SELECT * FROM slb1_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if(mysqli_num_rows($qEP1) <=0){

                // $formData['EP1']=[];

            }else{

                $ep1Data = [];

                while($runEp1 = mysqli_fetch_array($qEP1)){

                    $ep1Data[] = $runEp1;

                }
                
                $formData['SLB1'] = $ep1Data ;

            }


            // slb1 end

            // slb2 start

            $qEP2 = mysqli_query($con,"SELECT * FROM slb2_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if(mysqli_num_rows($qEP2) <=0){

                // $formData['EP2']=[];

            }else{

                $ep2Data = [];

                while($runEp2 = mysqli_fetch_array($qEP2)){

                    $ep2Data[] = $runEp2;

                }
                
                $formData['SLB2'] = $ep2Data ;

            } 
            //slb2 end

            }

        elseif($compoNameTmp == "AXLE COUNTER"){
            // EP 1,2,4,5 form data
            $formType = "DAC";
            
            $qEP1 = mysqli_query($con,"SELECT * FROM dac1_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if(mysqli_num_rows($qEP1) <=0){

                // $formData['EP1']=[];

            }else{

                $ep1Data = [];

                while($runEp1 = mysqli_fetch_array($qEP1)){

                    $ep1Data[] = $runEp1;

                }
                
                $formData['DAC1'] = $ep1Data ;

            }


            // dac1 end

            // dac2 start

            $qEP2 = mysqli_query($con,"SELECT * FROM dac2_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if(mysqli_num_rows($qEP2) <=0){

                // $formData['EP2']=[];

            }else{

                $ep2Data = [];

                while($runEp2 = mysqli_fetch_array($qEP2)){

                    $ep2Data[] = $runEp2;

                }
                
                $formData['DAC2'] = $ep2Data ;

            } 
            //dac2 end

            // dac3 start

            $qEP2 = mysqli_query($con,"SELECT * FROM dac3_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if(mysqli_num_rows($qEP2) <=0){

                // $formData['EP2']=[];

            }else{

                $ep2Data = [];

                while($runEp2 = mysqli_fetch_array($qEP2)){

                    $ep2Data[] = $runEp2;

                }
                
                $formData['DAC3'] = $ep2Data ;

            }

            // dac3 end

           

           

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
            
        }

        //
        elseif($compoNameTmp == "DL"){
            
            $formType = "DL";
            
            $qEP1 = mysqli_query($con,"SELECT * FROM dl1_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if(mysqli_num_rows($qEP1) <=0){

                // $formData['EP1']=[];

            }else{

                $ep1Data = [];

                while($runEp1 = mysqli_fetch_array($qEP1)){

                    $ep1Data[] = $runEp1;

                }
                
                $formData['DL1'] = $ep1Data ;

            }


            // ep1 end

            // ep2 start

            $qEP2 = mysqli_query($con,"SELECT * FROM dl2_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if(mysqli_num_rows($qEP2) <=0){

                // $formData['EP2']=[];

            }else{

                $ep2Data = [];

                while($runEp2 = mysqli_fetch_array($qEP2)){

                    $ep2Data[] = $runEp2;

                }
                
                $formData['DL2'] = $ep2Data ;

            }

            // 2 end

            
            $qEP3 = mysqli_query($con,"SELECT * FROM dl3_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if(mysqli_num_rows($qEP3) <=0){

                // $formData['EP1']=[];

            }else{

                $ep3Data = [];

                while($runEp3 = mysqli_fetch_array($qEP3)){

                    $ep3Data[] = $runEp3;

                }
                
                $formData['DL3'] = $ep3Data ;

            }


        // 3  end

        
        $qEP4 = mysqli_query($con,"SELECT * FROM dl4_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

        if(mysqli_num_rows($qEP4) <=0){

            // $formData['EP1']=[];

        }else{

            $ep4Data = [];

            while($runEp4 = mysqli_fetch_array($qEP4)){

                $ep4Data[] = $runEp4;

            }
            
            $formData['DL4'] = $ep4Data ;

        }


        // ep1 end

        }
        else{
            responseSend(false,"Invalid Component Name, Kindly check component name",[]);
        }


        // $data[0] = json_encode($formData);
        $data[0] = $formData;

        responseSend(true,"Data Found",$formType,$data);
 

        

    }
    elseif($action == "updateSingleValueFormData"){
        if(!isset($_POST['userID']) || empty($_POST['userID'])){
            $respo['status'] = false;
            $respo['msg'] = "Your session is logout, try again";
            $respo['data'] = [];
            echo json_encode($respo);
            die();
        }

        if(!isset($_POST['value']) || !isset($_POST['tableName']) || !isset($_POST['columnName']) || !isset($_POST['id'])){

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
       $userID=$_POST['userID'];

       switch($tbName){
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

       $updateQuery = mysqli_query($con,"UPDATE $tableName SET $columnName = '$value' WHERE id='$id' AND emp_id = '$userID'");

       if($updateQuery){
            $respo['status'] = true;
            $respo['msg'] = "Data successfully updated";
            $respo['data'] = [];
            echo json_encode($respo);
            die();
       }else{

        $respo['status'] = false;
        $respo['msg'] = "Something went wrong with DB";
        $respo['data'] = [];
        echo json_encode($respo);
        die();
       }

       



        
    }
    else{
        responseSend(false,"Invalid Action");
    }

}else{
    responseSend(false,"Access Denied");
}


?>