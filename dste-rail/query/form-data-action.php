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
        elseif($compoNameTmp == "DL"){
            // EP 1,2,4,5 form data
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
    else{
        responseSend(false,"Invalid Action");
    }

}else{
    responseSend(false,"Access Denied");
}


?>