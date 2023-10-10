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
        elseif($compoNameTmp == ("SIGNAL" || "SIGNAL CS")){
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