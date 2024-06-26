<?php

if(isset($_POST['action'])){

    include("../include/db_config.php");
    date_default_timezone_set('Asia/Kolkata');


    $action = trim($_POST['action']);
    $respo = [];


    if($action == "getEmployeeData"){

        if(!isset($_POST['stationId']) || !isset($_POST['sectionId'])){

             $respo['status'] = false;
            $respo['msg'] = "Either Section id or Station id are not set.";
            $respo['data'] = [];
            echo json_encode($respo);
            die();

        }

        $stationId = trim($_POST['stationId']);
        $sectionId = trim($_POST['sectionId']);

         if(empty($_POST['stationId']) || empty($_POST['sectionId'])){

             $respo['status'] = false;
            $respo['msg'] = "Either Section id or Station id are empty.";
            $respo['data'] = [];
            echo json_encode($respo);
            die();

        }


        $getQuerySection = mysqli_query($con,"SELECT * FROM emp_info_rail WHERE section_id='$sectionId' && station_id='$stationId'");
        if(mysqli_num_rows($getQuerySection) <= 0){
            $respo['status'] = true;
            $respo['msg'] = "Empoyee list is empty.";
            $respo['data'] = [];
            echo json_encode($respo);
            die();
        }

        $data = [];
        while($sectionRun = mysqli_fetch_array($getQuerySection)){

            $obj = new stdClass();
            $obj->id = $sectionRun['id'];
            $obj->section_name = $sectionRun['section_name'];
            $obj->section_id = $sectionRun['section_id'];
            $obj->station_name = $sectionRun['station_name'];
            $obj->station_id = $sectionRun['station_id'];

            $obj->empid = $sectionRun['empid'];
            $obj->empname = $sectionRun['empname'];
            $obj->empdesg = $sectionRun['empdesg'];
            $obj->pme_date = $sectionRun['pme_date']==''?'No Record':$sectionRun['pme_date'];
            $obj->rme_date = $sectionRun['rme_date']==''?'No Record':$sectionRun['rme_date'];

            // $obj->rme_date = $sectionRun['rme_date'];
            $a = '<a type="button" class="btn btn-sm btn-success" href="pme-rme-add.php?id='.$sectionRun['id'].'">Edit</a>';
            $obj->href = $a;

            $data[] = $obj;

        }

        $respo['status'] = true;
        $respo['msg'] = "Employee list found";
        $respo['data'] = $data;

        echo json_encode($respo);
        die();

    }

    elseif ($action == "pmeRmeDateInsert"){

        if(!isset($_POST['pmeDate']) && !isset($_POST['rmeDate'])){

            $respo['status'] = false;
           $respo['msg'] = "Please set at least on date ";
           echo json_encode($respo);
           die();

       }

       if(!isset($_POST['id'])){

        $respo['status'] = false;
        $respo['msg'] = "Employee Id is not set, try again.";
        echo json_encode($respo);
        die();

       }

       $pmeDate = trim($_POST['pmeDate']);
       $rmeDate = trim($_POST['rmeDate']);
       $id = trim($_POST['id']);

       $empDataUpdate = "UPDATE emp_info_rail SET pme_date = '$pmeDate', rme_date = '$rmeDate' WHERE id = '$id'";

       if(mysqli_query($con,$empDataUpdate)){

        $getEmpData = mysqli_query($con,"SELECT * FROM emp_info_rail WHERE id = '$id'");

        $getRun = mysqli_fetch_array($getEmpData);

        // insert query

        $createdDateTime = date("Y-m-d h:i:s");
        $section_id = $getRun['section_id'];
        $station_id = $getRun['station_id'];
        $station_name = $getRun['station_name'];
        $section_name = $getRun['section_name'];
        $empid = $getRun['empid'];
        $empname = $getRun['empname'];
        $empdesg = $getRun['empdesg'];


        $insertPmeRmeData = "INSERT INTO pmerme_info_rail (section_id,station_id,station_name,section_name,empid,empname,empdesg,pme_date,rme_date,created_date) VALUES ('$section_id','$station_id','$station_name','$section_name','$empid','$empname','$empdesg','$pmeDate','$rmeDate','$createdDateTime')";

        if(mysqli_query($con,$insertPmeRmeData)){

            $respo['status'] = true;
            $respo['msg'] = "PME, RME Date inserted successfully.";
            echo json_encode($respo);
            die();

        }else{

            $respo['status'] = false;
            $respo['msg'] = "Something went wrong, try again.";
            echo json_encode($respo);
            die();

        }


       }else{

        $respo['status'] = false;
        $respo['msg'] = "Something went wrong, try again.";
        echo json_encode($respo);
        die();

       }
       
    //    

    }


    elseif ( $action == "getPmeRmeDate"){

        if(!isset($_POST['empId'])){

            $respo['status'] = false;
           $respo['msg'] = "Employee Id not set, try again";
           $respo['data'] = [];
           echo json_encode($respo);
           die();

       }

       $empId = $_POST['empId'];

       $getQuery = mysqli_query($con,"SELECT * FROM pmerme_info_rail WHERE empid='$empId'");

       if(mysqli_num_rows($getQuery) <= 0){

        $respo['status'] = true;
        $respo['msg'] = "Empty List";
        $respo['data'] = [];
        echo json_encode($respo);
        die();

       }

       $data = [];
       while($sectionRun = mysqli_fetch_array($getQuery)){

        $obj = new stdClass();
        $obj->id = $sectionRun['id'];
        $obj->section_name = $sectionRun['section_name'];
        $obj->section_id = $sectionRun['section_id'];
        $obj->station_name = $sectionRun['station_name'];
        $obj->station_id = $sectionRun['station_id'];

        $obj->empid = $sectionRun['empid'];
        $obj->empname = $sectionRun['empname'];
        $obj->empdesg = $sectionRun['empdesg'];
        // $obj->pme_date = $sectionRun['pme_date'];
        // $obj->rme_date = $sectionRun['rme_date'];
        $obj->pme_file = $sectionRun['pme_file'];
        $obj->rme_file = $sectionRun['rme_file'];
        
        $obj->pme_date2 = $sectionRun['pme_date']==''?'No Record':$sectionRun['pme_date'];
        $obj->rme_date2 = $sectionRun['rme_date']==''?'No Record':$sectionRun['rme_date'];

        $iddd= $sectionRun['id'];
        if($sectionRun['pme_file']==''){

            $obj->pme_date = $sectionRun['pme_date']==''?'No Record':$sectionRun['pme_date'];

        }else{

            $obj->pme_date = "<span>".$sectionRun['pme_date']."/<span> <a role='button' href='../admin-rail/images/pmeRmeFile/".$obj->pme_file."' target='_black' class='btn btn-sm btn-danger m-1'><i class='fa fa-file-pdf-o'></i></a>";
        }

        if($sectionRun['rme_file']==''){

            $obj->rme_date = $sectionRun['rme_date']==''?'No Record':$sectionRun['rme_date'];
        }else{

            // $obj->rme_date = "<span>".$sectionRun['rme_date']."</span> <a role='button' href='../admin-rail/images/pmeRmeFile/".$obj->rme_file."' target='_black' class='btn btn-sm btn-danger m-1'><i class='fa fa-file-pdf-o'></i></a>";
            $obj->rme_date = $sectionRun['rme_date']==''?'No Record':$sectionRun['rme_date'];

        }

        if($sectionRun['competencyCertificate']==''){

            $obj->competency = 'No Record';
        }else{
            $competency = $sectionRun['competencyCertificate'];

            $obj->competency = "<a role='button' href='../admin-rail/images/pmeRmeFile/".$competency."' target='_black' class='btn btn-sm btn-danger m-1'><i class='fa fa-file-pdf-o'></i></a>";
        }

        $data[] = $obj;

       }

  

       $respo['status'] = true;
       $respo['msg'] = "Employee list found";
       $respo['data'] = $data;

       echo json_encode($respo);
       die();

    }

    elseif ($action == "stationComponentAdd"){

        if(!isset($_POST['sectionId']) || !isset($_POST['sectionName']) || !isset($_POST['stationId']) ||!isset($_POST['stationName']) || !isset($_POST['stationComponent']) || !isset($_POST['subComponent']) ){
            $respo['status'] = false;
            $respo['msg'] = "Something went wrong with request ";
            echo json_encode($respo);
            die();

        }

        $sectionId = trim($_POST['sectionId']);
       $sectionName = trim($_POST['sectionName']);
       $stationId = trim($_POST['stationId']);
       $stationName = trim($_POST['stationName']);
       $stationComponent = trim($_POST['stationComponent']);
       $subComponent = trim($_POST['subComponent']);
       $createdDateTime = date("Y-m-d h:i:s");

       $checkQuery = mysqli_query($con,"SELECT id FROM station_component_info WHERE section_id='$sectionId' && station_id='$stationId' && station_component='$stationComponent'");

       if(mysqli_num_rows($checkQuery) > 0){        
            $respo['status'] = false;
            $respo['msg'] = "This station Component already inserted ";
            echo json_encode($respo);
            die();

       }

       
       $insertComponent = "INSERT INTO station_component_info (section_id,section_name,station_id,station_name,station_component,sub_component,created_date) VALUES ('$sectionId','$sectionName','$stationId','$stationName','$stationComponent','$subComponent','$createdDateTime')";

       if(mysqli_query($con,$insertComponent)){

        $respo['status'] = true;
        $respo['msg'] = "Station component data inserted successfully.";
        echo json_encode($respo);
        die();

        }else{

            $respo['status'] = false;
            $respo['msg'] = "Something went wrong, try again.";
            echo json_encode($respo);
            die();

        }

    }

    elseif ($action == "getComponentData"){
        if(!isset($_POST['stationId']) || !isset($_POST['sectionId']) || !isset($_POST['stationName']) || !isset($_POST['sectionName'])){

            $respo['status'] = false;
           $respo['msg'] = "all request are not set";
           $respo['data'] = [];
           echo json_encode($respo);
           die();

       }

       $sectionId = trim($_POST['sectionId']);
       $sectionName = trim($_POST['sectionName']);

       $stationName = trim($_POST['stationName']);
       $stationId = trim($_POST['stationId']);

       $getQueryComponent = mysqli_query($con,"SELECT * FROM station_component_info WHERE section_id='$sectionId' && station_id='$stationId' && section_name = '$sectionName' && station_name = '$stationName'");

       if(mysqli_num_rows($getQueryComponent) <= 0){
           $respo['status'] = true;
           $respo['msg'] = "Component list is empty.";
           $respo['data'] = [];
           echo json_encode($respo);
           die();
       }

       $data = [];
       while($sectionRun = mysqli_fetch_array($getQueryComponent)){

           $obj = new stdClass();
           $obj->id = $sectionRun['id'];
           $obj->section_name = $sectionRun['section_name'];
           $obj->section_id = $sectionRun['section_id'];
           $obj->station_name = $sectionRun['station_name'];
           $obj->station_id = $sectionRun['station_id'];

           $obj->station_component = $sectionRun['station_component'];
           $obj->sub_component = $sectionRun['sub_component'];
           $obj->created_date = $sectionRun['created_date'];
        
           $data[] = $obj;

       }

       $respo['status'] = true;
       $respo['msg'] = "Component list found";
       $respo['data'] = $data;

       echo json_encode($respo);
       die();

    }


    // get EP form details

    elseif ($action == 'getEP_FormDetails'){
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

        }catch(Exception $err){

            $respo['status'] = false;
            $respo['msg'] = "Catch error";//$err;
            $respo['data'] = [];

            echo json_encode($respo);
            die();

        }
    }

    elseif ($action == "EP1_formSubmit"){
        if(!isset($_POST['userID']) || !isset($_POST['sectionName']) || !isset($_POST['sectionId']) || !isset($_POST['stationName']) || !isset($_POST['stationId']) || !isset($_POST['compoNameTmp']) || !isset($_POST['subcompoNameTmp'])){
            $respo['status'] = false;
            $respo['msg'] = "Something went wrong with request";
            echo json_encode($respo);
            die();

        }

        $userID = trim($_POST['userID']);
        $sectionName = trim($_POST['sectionName']);
        $sectionId = trim($_POST['sectionId']);
        $stationName = trim($_POST['stationName']);
        $stationId = trim($_POST['stationId']);
        $compoNameTmp = trim($_POST['compoNameTmp']);
        $subcompoNameTmp = trim($_POST['subcompoNameTmp']);
        $language = trim($_POST['language']);
        
        $createdDateTime = date("Y-m-d h:i:s");

        $checkData = mysqli_query($con,"SELECT * FROM ep1_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp' && sub_component = '$subcompoNameTmp' order by created_date DESC LIMIT 1");
        if(mysqli_num_rows($checkData) > 0){

            $lastInsert = mysqli_fetch_array($checkData);

            // print_r($lastInsert);
             $lastSubmitedDate = $lastInsert['created_date'];
            $d15 = strtotime("+15 days",strtotime($lastSubmitedDate));
             $day15Date = date("Y-m-d",$d15);
            //  echo $currentDate = date("Y-m-d",strtotime($createdDateTime));

            // $date1 = date_create($day15Date);
            // $date2 = date_create($currentDate);

            // $diff = date_diff($date1,$date2);
            // echo $diff2 = $diff->format("%R%a"); //+1
            // // $diff2 = $diff->format("%a"); // 1

            // if($diff2 <= 15){

            //     $respo['status'] = false;
            //     $respo['msg'] = "You have already submited this form on=>".$lastSubmitedDate.", Now can submit after $day15Date";
            //     echo json_encode($respo);
            //     die();

            // }


            $currentStrToTime =  strtotime($createdDateTime);

            if($currentStrToTime < $d15){

                
                $respo['status'] = false;
                $respo['msg'] = "You have already submited this form on=>".$lastSubmitedDate.", Now can submit on $day15Date";
                echo json_encode($respo);
                die();


            }

            

        }

        $ep1_1 = trim($_POST['EP1_1']);
        $ep1_2 = trim($_POST['EP1_2']);
        $ep1_3 = trim($_POST['EP1_3']);
        $ep1_4 = trim($_POST['EP1_4']);
        $ep1_5 = trim($_POST['EP1_5']);
        $ep1_6 = trim($_POST['EP1_6']);
        $ep1_7 = trim($_POST['EP1_7']);
        $ep1_8 = trim($_POST['EP1_8']);
        $ep1_9 = trim($_POST['EP1_9']);
        $ep1_10 = trim($_POST['EP1_10']);
        $ep1_11 = trim($_POST['EP1_11']);

        if(empty($ep1_1) || empty($ep1_2) || empty($ep1_3) || empty($ep1_4) || empty($ep1_5) || empty($ep1_6) || empty($ep1_7) || empty($ep1_8) || empty($ep1_9) || empty($ep1_10) || empty($ep1_11)){

            $respo['status'] = false;
            $respo['msg'] = "Kindly select all field";
            echo json_encode($respo);
            die();
        }
        $insertQuery = "INSERT INTO ep1_form (emp_id,section_id,section_name,station_id,station_name,component_name,sub_component,ep1_1,ep1_2,ep1_3,ep1_4,ep1_5,ep1_6,ep1_7,ep1_8,ep1_9,ep1_10,ep1_11,created_date,updated_date,language) VALUES ('$userID','$sectionId','$sectionName','$stationId','$stationName','$compoNameTmp','$subcompoNameTmp','$ep1_1','$ep1_2','$ep1_3','$ep1_4','$ep1_5','$ep1_6','$ep1_7','$ep1_8','$ep1_9','$ep1_10','$ep1_11','$createdDateTime','$createdDateTime','$language')";


        if(mysqli_query($con,$insertQuery)){

            $respo['status'] = true;
            $respo['msg'] = "Data inserted successfully.";
            echo json_encode($respo);
            die();

        }else{

            $respo['status'] = false;
            $respo['msg'] = "Something went wrong, try again.";
            echo json_encode($respo);
            die();

        }




    }

    elseif ($action == "EP2_formSubmit"){
        if(!isset($_POST['userID']) || !isset($_POST['sectionName']) || !isset($_POST['sectionId']) || !isset($_POST['stationName']) || !isset($_POST['stationId']) || !isset($_POST['compoNameTmp']) || !isset($_POST['subcompoNameTmp'])){
            $respo['status'] = false;
            $respo['msg'] = "Something went wrong with request";
            echo json_encode($respo);
            die();

        }

        $userID = trim($_POST['userID']);
        $sectionName = trim($_POST['sectionName']);
        $sectionId = trim($_POST['sectionId']);
        $stationName = trim($_POST['stationName']);
        $stationId = trim($_POST['stationId']);
        $compoNameTmp = trim($_POST['compoNameTmp']);
        $subcompoNameTmp = trim($_POST['subcompoNameTmp']);
        $language = trim($_POST['language']);
        
        $createdDateTime = date("Y-m-d h:i:s");

        $checkData = mysqli_query($con,"SELECT * FROM ep2_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp' && sub_component = '$subcompoNameTmp' order by created_date DESC LIMIT 1");
        if(mysqli_num_rows($checkData) > 0){

            $lastInsert = mysqli_fetch_array($checkData);

            // print_r($lastInsert);
             $lastSubmitedDate = $lastInsert['created_date'];
            $d15 = strtotime("+15 days",strtotime($lastSubmitedDate));
            $day15Date = date("Y-m-d",$d15);

            $currentStrToTime =  strtotime($createdDateTime);

            if($currentStrToTime < $d15){
                
                $respo['status'] = false;
                $respo['msg'] = "You have already submited this form on=>".$lastSubmitedDate.", Now can submit on $day15Date";
                echo json_encode($respo);
                die();

            }

            

        }

        $EP2_1 = trim($_POST['EP2_1']);
        $EP2_2 = trim($_POST['EP2_2']);
        $EP2_3 = trim($_POST['EP2_3']);
        $EP2_4 = trim($_POST['EP2_4']);
        $EP2_5 = trim($_POST['EP2_5']);

        $op_v_N_R = trim($_POST['op_v_N_R']);
        $op_v_R_N = trim($_POST['op_v_R_N']);
        $ob_v_N_R = trim($_POST['ob_v_N_R']);
        $ob_v_R_N = trim($_POST['ob_v_R_N']);
        $det_v_N_R = trim($_POST['det_v_N_R']);
        $det_v_R_N = trim($_POST['det_v_R_N']);
        $nwc_N_R = trim($_POST['nwc_N_R']);
        $nwc_R_N = trim($_POST['nwc_R_N']);
        $ob_sc_N_R = trim($_POST['ob_sc_N_R']);
        $ob_sc_R_N = trim($_POST['ob_sc_R_N']);
        $ob_t_N_R = trim($_POST['ob_t_N_R']);
        // $ob_t_R_N = trim($_POST['ob_t_R_N']);
        $gt_N_R = trim($_POST['gt_N_R']);
        // $gt_R_N = trim($_POST['gt_R_N']);
        $operatingTimeSecond = trim($_POST['operatingTimeSecond']);
        $operatingTime_dbt = trim($_POST['operatingTime_dbt']);
        $friction_c_s = trim($_POST['friction_c_s']);
        $track_locking = trim($_POST['track_locking']);
        $remark_brief = trim($_POST['remark_brief']);
        // $signature = trim($_POST['signature']);
       

        if(empty($EP2_1) || empty($EP2_2) || empty($EP2_3) || empty($EP2_4) || empty($EP2_5) || empty($op_v_N_R) || empty($op_v_R_N) || empty($ob_v_N_R) || empty($ob_v_R_N) || empty($det_v_N_R) || empty($det_v_R_N) || empty($nwc_N_R) || empty($nwc_R_N) || empty($ob_sc_N_R) || empty($ob_sc_R_N) || empty($ob_t_N_R) || empty($gt_N_R) || empty($operatingTimeSecond) || empty($operatingTime_dbt) || empty($friction_c_s) || empty($track_locking) || empty($remark_brief)){

            $respo['status'] = false;
            $respo['msg'] = "Kindly select all field";
            echo json_encode($respo);
            die();
        }
        $insertQuery = "INSERT INTO ep2_form (emp_id,section_id,section_name,station_id,station_name,component_name,sub_component,EP2_1,EP2_2,EP2_3,EP2_4,EP2_5,op_v_N_R,op_v_R_N,ob_v_N_R,ob_v_R_N,det_v_N_R,det_v_R_N,nwc_N_R,nwc_R_N,ob_sc_N_R,ob_sc_R_N,ob_t_N_R,gt_N_R,operatingTimeSecond,operatingTime_dbt,friction_c_s,track_locking,remark_brief,created_date,updated_date,language) VALUES ('$userID','$sectionId','$sectionName','$stationId','$stationName','$compoNameTmp','$subcompoNameTmp','$EP2_1','$EP2_2','$EP2_3','$EP2_4','$EP2_5','$op_v_N_R','$op_v_R_N','$ob_v_N_R','$ob_v_R_N','$det_v_N_R','$det_v_R_N',
        '$nwc_N_R','$nwc_R_N','$ob_sc_N_R','$ob_sc_R_N','$ob_t_N_R','$gt_N_R','$operatingTimeSecond','$operatingTime_dbt','$friction_c_s','$track_locking','$remark_brief','$createdDateTime','$createdDateTime','$language')";


        if(mysqli_query($con,$insertQuery)){

            $respo['status'] = true;
            $respo['msg'] = "Data inserted successfully.";
            echo json_encode($respo);
            die();

        }else{

            $respo['status'] = false;
            $respo['msg'] = "Something went wrong, try again.";
            echo json_encode($respo);
            die();

        }




    }

    elseif ($action == "EP3_formSubmit"){
        if(!isset($_POST['userID']) || !isset($_POST['sectionName']) || !isset($_POST['sectionId']) || !isset($_POST['stationName']) || !isset($_POST['stationId']) || !isset($_POST['compoNameTmp']) || !isset($_POST['subcompoNameTmp'])){
            $respo['status'] = false;
            $respo['msg'] = "Something went wrong with request";
            echo json_encode($respo);
            die();

        }

        $userID = trim($_POST['userID']);
        $sectionName = trim($_POST['sectionName']);
        $sectionId = trim($_POST['sectionId']);
        $stationName = trim($_POST['stationName']);
        $stationId = trim($_POST['stationId']);
        $compoNameTmp = trim($_POST['compoNameTmp']);
        $subcompoNameTmp = trim($_POST['subcompoNameTmp']);
        $language = trim($_POST['language']);
        
        $createdDateTime = date("Y-m-d h:i:s");

        $checkData = mysqli_query($con,"SELECT * FROM ep3_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp' && sub_component = '$subcompoNameTmp' order by created_date DESC LIMIT 1");
        if(mysqli_num_rows($checkData) > 0){

            $lastInsert = mysqli_fetch_array($checkData);

            // print_r($lastInsert);
             $lastSubmitedDate = $lastInsert['created_date'];
            $d15 = strtotime("+15 days",strtotime($lastSubmitedDate));
             $day15Date = date("Y-m-d",$d15);

            $currentStrToTime =  strtotime($createdDateTime);

            if($currentStrToTime < $d15){

                
                $respo['status'] = false;
                $respo['msg'] = "You have already submited this form on=>".$lastSubmitedDate.", Now can submit on $day15Date";
                echo json_encode($respo);
                die();


            }

            

        }

        $ep3_1 = trim($_POST['ep3_1']);
        $ep3_2 = trim($_POST['ep3_2']);
        $ep3_3 = trim($_POST['ep3_3']);
        $ep3_4 = trim($_POST['ep3_4']);

        if(empty($ep3_1) || empty($ep3_2)){

            $respo['status'] = false;
            $respo['msg'] = "Kindly select all field";
            echo json_encode($respo);
            die();
        }
        $insertQuery = "INSERT INTO ep3_form (emp_id,section_id,section_name,station_id,station_name,component_name,sub_component,ep3_1,ep3_2,ep3_3,ep3_4,created_date,updated_date,language) VALUES ('$userID','$sectionId','$sectionName','$stationId','$stationName','$compoNameTmp','$subcompoNameTmp','$ep3_1','$ep3_2','$ep3_3','$ep3_4','$createdDateTime','$createdDateTime','$language')";


        if(mysqli_query($con,$insertQuery)){

            $respo['status'] = true;
            $respo['msg'] = "Data inserted successfully.";
            echo json_encode($respo);
            die();

        }else{

            $respo['status'] = false;
            $respo['msg'] = "Something went wrong, try again.";
            echo json_encode($respo);
            die();

        }




    }

    elseif ($action == "EP4_formSubmit"){
        if(!isset($_POST['userID']) || !isset($_POST['sectionName']) || !isset($_POST['sectionId']) || !isset($_POST['stationName']) || !isset($_POST['stationId']) || !isset($_POST['compoNameTmp']) || !isset($_POST['subcompoNameTmp'])){
            $respo['status'] = false;
            $respo['msg'] = "Something went wrong with request";
            echo json_encode($respo);
            die();

        }

        $userID = trim($_POST['userID']);
        $sectionName = trim($_POST['sectionName']);
        $sectionId = trim($_POST['sectionId']);
        $stationName = trim($_POST['stationName']);
        $stationId = trim($_POST['stationId']);
        $compoNameTmp = trim($_POST['compoNameTmp']);
        $subcompoNameTmp = trim($_POST['subcompoNameTmp']);
        $language = trim($_POST['language']);
        
        $createdDateTime = date("Y-m-d h:i:s");

        $checkData = mysqli_query($con,"SELECT * FROM ep4_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp' && sub_component = '$subcompoNameTmp'");
        if(mysqli_num_rows($checkData) > 0){

            $lastInsert = mysqli_fetch_array($checkData);

            // print_r($lastInsert);
             $lastSubmitedDate = $lastInsert['created_date'];
            $d15 = strtotime("+15 days",strtotime($lastSubmitedDate));
            $day15Date = date("Y-m-d",$d15);

            $currentStrToTime =  strtotime($createdDateTime);

            if($currentStrToTime < $d15){
                
                $respo['status'] = false;
                $respo['msg'] = "You have already submited this form on=>".$lastSubmitedDate.", Now can submit on $day15Date";
                echo json_encode($respo);
                die();

            }

            // $respo['status'] = false;
            // $respo['msg'] = "You are already submit this form";
            // echo json_encode($respo);
            // die();

        }

        $ep4_1 = trim($_POST['EP4_1']);
        $ep4_2 = trim($_POST['EP4_2']);
        $ep4_3 = trim($_POST['EP4_3']);
        $ep4_4 = trim($_POST['EP4_4']);
      

        if(empty($ep4_1) || empty($ep4_2) || empty($ep4_3) || empty($ep4_4)){

            $respo['status'] = false;
            $respo['msg'] = "Kindly select all field";
            echo json_encode($respo);
            die();
        }
        $insertQuery = "INSERT INTO ep4_form (emp_id,section_id,section_name,station_id,station_name,component_name,sub_component,ep4_1,ep4_2,ep4_3,ep4_4,created_date,updated_date,language) VALUES ('$userID','$sectionId','$sectionName','$stationId','$stationName','$compoNameTmp','$subcompoNameTmp','$ep4_1','$ep4_2','$ep4_3','$ep4_4','$createdDateTime','$createdDateTime','$language')";


        if(mysqli_query($con,$insertQuery)){

            $respo['status'] = true;
            $respo['msg'] = "Data inserted successfully.";
            echo json_encode($respo);
            die();

        }else{

            $respo['status'] = false;
            $respo['msg'] = "Something went wrong, try again.";
            echo json_encode($respo);
            die();

        }




    }

    elseif ($action == "EP5_formSubmit"){
        if(!isset($_POST['userID']) || !isset($_POST['sectionName']) || !isset($_POST['sectionId']) || !isset($_POST['stationName']) || !isset($_POST['stationId']) || !isset($_POST['compoNameTmp']) || !isset($_POST['subcompoNameTmp'])){
            $respo['status'] = false;
            $respo['msg'] = "Something went wrong with request";
            echo json_encode($respo);
            die();

        }

        $userID = trim($_POST['userID']);
        $sectionName = trim($_POST['sectionName']);
        $sectionId = trim($_POST['sectionId']);
        $stationName = trim($_POST['stationName']);
        $stationId = trim($_POST['stationId']);
        $compoNameTmp = trim($_POST['compoNameTmp']);
        $subcompoNameTmp = trim($_POST['subcompoNameTmp']);
        $language = trim($_POST['language']);
        
        $createdDateTime = date("Y-m-d h:i:s");

        $checkData = mysqli_query($con,"SELECT * FROM ep5_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp' && sub_component = '$subcompoNameTmp'");
        if(mysqli_num_rows($checkData) > 0){

            // $respo['status'] = false;
            // $respo['msg'] = "You are already submit this form";
            // echo json_encode($respo);
            // die();

            $lastInsert = mysqli_fetch_array($checkData);

            // print_r($lastInsert);
             $lastSubmitedDate = $lastInsert['created_date'];
            $d15 = strtotime("+15 days",strtotime($lastSubmitedDate));
            $day15Date = date("Y-m-d",$d15);

            $currentStrToTime =  strtotime($createdDateTime);

            if($currentStrToTime < $d15){
                
                $respo['status'] = false;
                $respo['msg'] = "You have already submited this form on=>".$lastSubmitedDate.", Now can submit on $day15Date";
                echo json_encode($respo);
                die();

            }

        }

        $ep5_1 = trim($_POST['EP5_1']);
        $ep5_2 = trim($_POST['EP5_2']);
        $ep5_3 = trim($_POST['EP5_3']);
        $ep5_4 = trim($_POST['EP5_4']);
        $ep5_5 = trim($_POST['EP5_5']);
        $ep5_6 = trim($_POST['EP5_6']);
      

        if(empty($ep5_1) || empty($ep5_2) || empty($ep5_3) || empty($ep5_4) || empty($ep5_5) || empty($ep5_6)){

            $respo['status'] = false;
            $respo['msg'] = "Kindly select all field";
            echo json_encode($respo);
            die();
        }
        $insertQuery = "INSERT INTO ep5_form (emp_id,section_id,section_name,station_id,station_name,component_name,sub_component,ep5_1,ep5_2,ep5_3,ep5_4,ep5_5,ep5_6,created_date,updated_date,language) VALUES ('$userID','$sectionId','$sectionName','$stationId','$stationName','$compoNameTmp','$subcompoNameTmp','$ep5_1','$ep5_2','$ep5_3','$ep5_4','$ep5_5','$ep5_6','$createdDateTime','$createdDateTime','$language')";


        if(mysqli_query($con,$insertQuery)){

            $respo['status'] = true;
            $respo['msg'] = "Data inserted successfully.";
            echo json_encode($respo);
            die();

        }else{

            $respo['status'] = false;
            $respo['msg'] = "Something went wrong, try again.";
            echo json_encode($respo);
            die();

        }




    }  
    
    // get Track form details
    elseif ($action == 'getT_FormDetails'){
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

        }catch(Exception $err){

            $respo['status'] = false;
            $respo['msg'] = $err;
            $respo['data'] = [];

            echo json_encode($respo);
            die();

        }
    }
    //T1_formSubmit
    elseif ($action == "T1_formSubmit"){
        if(!isset($_POST['userID']) || !isset($_POST['sectionName']) || !isset($_POST['sectionId']) || !isset($_POST['stationName']) || !isset($_POST['stationId']) || !isset($_POST['compoNameTmp']) || !isset($_POST['subcompoNameTmp'])){
            $respo['status'] = false;
            $respo['msg'] = "Something went wrong with request";
            echo json_encode($respo);
            die();

        }

        $userID = trim($_POST['userID']);
        $sectionName = trim($_POST['sectionName']);
        $sectionId = trim($_POST['sectionId']);
        $stationName = trim($_POST['stationName']);
        $stationId = trim($_POST['stationId']);
        $compoNameTmp = trim($_POST['compoNameTmp']);
        $subcompoNameTmp = trim($_POST['subcompoNameTmp']);
        $language = trim($_POST['language']);
        
        $createdDateTime = date("Y-m-d h:i:s");

        $checkData = mysqli_query($con,"SELECT * FROM t1_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp' && sub_component = '$subcompoNameTmp'");
        if(mysqli_num_rows($checkData) > 0){

            $lastInsert = mysqli_fetch_array($checkData);

            // print_r($lastInsert);
             $lastSubmitedDate = $lastInsert['created_date'];
            $d15 = strtotime("+15 days",strtotime($lastSubmitedDate));
            $day15Date = date("Y-m-d",$d15);

            $currentStrToTime =  strtotime($createdDateTime);

            if($currentStrToTime < $d15){
                
                $respo['status'] = false;
                $respo['msg'] = "You have already submited this form on=>".$lastSubmitedDate.", Now can submit on $day15Date";
                echo json_encode($respo);
                die();

            }       

        }

        $t1_1 = trim($_POST['t1_1']);
        $t1_2 = trim($_POST['t1_2']);
        $t1_3 = trim($_POST['t1_3']);

        $t1_4 = trim($_POST['t1_4']);
        $t1_5 = trim($_POST['t1_5']);
        $t1_6 = trim($_POST['t1_6']);
        $t1_7 = trim($_POST['t1_7']);
        $t1_8 = trim($_POST['t1_8']);

        $date1 = trim($_POST['date1']);
        $sale1_spg = trim($_POST['sale1_spg']);
        $sale1_v = trim($_POST['sale1_v']);
        $sale2_spg = trim($_POST['sale2_spg']);
        $sale2_v = trim($_POST['sale2_v']);
        $sale3_spg = trim($_POST['sale3_spg']);
        $sale3_v = trim($_POST['sale3_v']);
        $charging_v = trim($_POST['charging_v']);
        $charging_current = trim($_POST['charging_current']);
        $feedVoltage = trim($_POST['feedVoltage']);
        $nearBlock = trim($_POST['nearBlock']);
        $wireStatus = trim($_POST['wireStatus']);
        $remark1 = trim($_POST['remark1']);
        $date2 = trim($_POST['date2']);
        $railVoltage = trim($_POST['railVoltage']);
        $vt_value = trim($_POST['vt_value']);
        $wireStatus2 = trim($_POST['wireStatus2']);
        $magneticPart = trim($_POST['magneticPart']);
        $railFlag2 = trim($_POST['railFlag2']);
        $jumberwireStatus = trim($_POST['jumberwireStatus']);
        $remark2 = trim($_POST['remark2']);
      

        if(empty($t1_1) || empty($t1_2) || empty($t1_3) || empty($t1_4) || empty($t1_5) || empty($t1_6) || empty($t1_7) || empty($t1_8)){

            $respo['status'] = false;
            $respo['msg'] = "Kindly select all field";
            echo json_encode($respo);
            die();
        }

        $insertQuery = "INSERT INTO t1_form (emp_id,section_id,section_name,station_id,station_name,component_name,sub_component,t1_1,t1_2,t1_3,t1_4,t1_5,t1_6,t1_7,t1_8,date1,sale1_spg,sale1_v,sale2_spg,sale2_v,sale3_spg,sale3_v,charging_v,charging_current,feedVoltage,nearBlock,wireStatus,remark1,date2,railVoltage,vt_value,wireStatus2,magneticPart,railFlag2,jumberwireStatus,remark2,created_date,updated_date,language) VALUES ('$userID','$sectionId','$sectionName','$stationId','$stationName','$compoNameTmp','$subcompoNameTmp','$t1_1','$t1_2','$t1_3','$t1_4','$t1_5','$t1_6','$t1_7','$t1_8','$date1','$sale1_spg','$sale1_v','$sale2_spg','$sale2_v','$sale3_spg','$sale3_v','$charging_v','$charging_current','$feedVoltage','$nearBlock','$wireStatus','$remark1','$date2','$railVoltage','$vt_value','$wireStatus2','$magneticPart','$railFlag2','$jumberwireStatus','$remark2','$createdDateTime','$createdDateTime','$language')";


        if(mysqli_query($con,$insertQuery)){

            $respo['status'] = true;
            $respo['msg'] = "Data inserted successfully.";
            echo json_encode($respo);
            die();

        }else{

            $respo['status'] = false;
            $respo['msg'] = "Something went wrong, try again.";
            echo json_encode($respo);
            die();

        }




    }
    elseif ($action == "T2_formSubmit"){
        if(!isset($_POST['userID']) || !isset($_POST['sectionName']) || !isset($_POST['sectionId']) || !isset($_POST['stationName']) || !isset($_POST['stationId']) || !isset($_POST['compoNameTmp']) || !isset($_POST['subcompoNameTmp'])){
            $respo['status'] = false;
            $respo['msg'] = "Something went wrong with request";
            echo json_encode($respo);
            die();

        }

        $userID = trim($_POST['userID']);
        $sectionName = trim($_POST['sectionName']);
        $sectionId = trim($_POST['sectionId']);
        $stationName = trim($_POST['stationName']);
        $stationId = trim($_POST['stationId']);
        $compoNameTmp = trim($_POST['compoNameTmp']);
        $subcompoNameTmp = trim($_POST['subcompoNameTmp']);
        $language = trim($_POST['language']);
        
        $createdDateTime = date("Y-m-d h:i:s");

        $checkData = mysqli_query($con,"SELECT * FROM t2_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp' && sub_component = '$subcompoNameTmp'");
        if(mysqli_num_rows($checkData) > 0){

            $lastInsert = mysqli_fetch_array($checkData);

            // print_r($lastInsert);
             $lastSubmitedDate = $lastInsert['created_date'];
            $d15 = strtotime("+15 days",strtotime($lastSubmitedDate));
            $day15Date = date("Y-m-d",$d15);

            $currentStrToTime =  strtotime($createdDateTime);

            if($currentStrToTime < $d15){
                
                $respo['status'] = false;
                $respo['msg'] = "You have already submited this form on=>".$lastSubmitedDate.", Now can submit on $day15Date";
                echo json_encode($respo);
                die();

            }

            // $respo['status'] = false;
            // $respo['msg'] = "You are already submit this form";
            // echo json_encode($respo);
            // die();

        }

        $t2_1 = trim($_POST['t2_1']);
        $t2_2 = trim($_POST['t2_2']);
        $t2_3 = trim($_POST['t2_3']);
      

        if(empty($t2_1) || empty($t2_2) || empty($t2_3)){

            $respo['status'] = false;
            $respo['msg'] = "Kindly select all field";
            echo json_encode($respo);
            die();
        }
        $insertQuery = "INSERT INTO t2_form (emp_id,section_id,section_name,station_id,station_name,component_name,sub_component,t2_1,t2_2,t2_3,created_date,updated_date,language) VALUES ('$userID','$sectionId','$sectionName','$stationId','$stationName','$compoNameTmp','$subcompoNameTmp','$t2_1','$t2_2','$t2_3','$createdDateTime','$createdDateTime','$language')";


        if(mysqli_query($con,$insertQuery)){

            $respo['status'] = true;
            $respo['msg'] = "Data inserted successfully.";
            echo json_encode($respo);
            die();

        }else{

            $respo['status'] = false;
            $respo['msg'] = "Something went wrong, try again.";
            echo json_encode($respo);
            die();

        }




    }
    elseif ($action == "T3_formSubmit"){
        if(!isset($_POST['userID']) || !isset($_POST['sectionName']) || !isset($_POST['sectionId']) || !isset($_POST['stationName']) || !isset($_POST['stationId']) || !isset($_POST['compoNameTmp']) || !isset($_POST['subcompoNameTmp'])){
            $respo['status'] = false;
            $respo['msg'] = "Something went wrong with request";
            echo json_encode($respo);
            die();

        }

        $userID = trim($_POST['userID']);
        $sectionName = trim($_POST['sectionName']);
        $sectionId = trim($_POST['sectionId']);
        $stationName = trim($_POST['stationName']);
        $stationId = trim($_POST['stationId']);
        $compoNameTmp = trim($_POST['compoNameTmp']);
        $subcompoNameTmp = trim($_POST['subcompoNameTmp']);
        $language = trim($_POST['language']);
        
        $createdDateTime = date("Y-m-d h:i:s");

        $checkData = mysqli_query($con,"SELECT * FROM t3_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp' && sub_component = '$subcompoNameTmp'");
        if(mysqli_num_rows($checkData) > 0){

            $lastInsert = mysqli_fetch_array($checkData);

            // print_r($lastInsert);
             $lastSubmitedDate = $lastInsert['created_date'];
            $d15 = strtotime("+15 days",strtotime($lastSubmitedDate));
            $day15Date = date("Y-m-d",$d15);

            $currentStrToTime =  strtotime($createdDateTime);

            if($currentStrToTime < $d15){
                
                $respo['status'] = false;
                $respo['msg'] = "You have already submited this form on=>".$lastSubmitedDate.", Now can submit on $day15Date";
                echo json_encode($respo);
                die();

            }


        }

        $t3_1 = trim($_POST['t3_1']);
        $t3_2 = trim($_POST['t3_2']);
        $t3_3 = trim($_POST['t3_3']);
        $t3_4 = trim($_POST['t3_4']);
      

        if(empty($t3_1) || empty($t3_2) || empty($t3_3) || empty($t3_4)){

            $respo['status'] = false;
            $respo['msg'] = "Kindly select all field";
            echo json_encode($respo);
            die();
        }
        $insertQuery = "INSERT INTO t3_form (emp_id,section_id,section_name,station_id,station_name,component_name,sub_component,t3_1,t3_2,t3_3,t3_4,created_date,updated_date,language) VALUES ('$userID','$sectionId','$sectionName','$stationId','$stationName','$compoNameTmp','$subcompoNameTmp','$t3_1','$t3_2','$t3_3','$t3_4','$createdDateTime','$createdDateTime','$language')";


        if(mysqli_query($con,$insertQuery)){

            $respo['status'] = true;
            $respo['msg'] = "Data inserted successfully.";
            echo json_encode($respo);
            die();

        }else{

            $respo['status'] = false;
            $respo['msg'] = "Something went wrong, try again.";
            echo json_encode($respo);
            die();

        }




    }
    elseif ($action == "T4_formSubmit"){
        if(!isset($_POST['userID']) || !isset($_POST['sectionName']) || !isset($_POST['sectionId']) || !isset($_POST['stationName']) || !isset($_POST['stationId']) || !isset($_POST['compoNameTmp']) || !isset($_POST['subcompoNameTmp'])){
            $respo['status'] = false;
            $respo['msg'] = "Something went wrong with request";
            echo json_encode($respo);
            die();

        }

        $userID = trim($_POST['userID']);
        $sectionName = trim($_POST['sectionName']);
        $sectionId = trim($_POST['sectionId']);
        $stationName = trim($_POST['stationName']);
        $stationId = trim($_POST['stationId']);
        $compoNameTmp = trim($_POST['compoNameTmp']);
        $subcompoNameTmp = trim($_POST['subcompoNameTmp']);
        $language = trim($_POST['language']);
        
        $createdDateTime = date("Y-m-d h:i:s");

        $checkData = mysqli_query($con,"SELECT * FROM t4_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp' && sub_component = '$subcompoNameTmp'");
        if(mysqli_num_rows($checkData) > 0){

            $lastInsert = mysqli_fetch_array($checkData);

            // print_r($lastInsert);
             $lastSubmitedDate = $lastInsert['created_date'];
            $d15 = strtotime("+15 days",strtotime($lastSubmitedDate));
            $day15Date = date("Y-m-d",$d15);

            $currentStrToTime =  strtotime($createdDateTime);

            if($currentStrToTime < $d15){
                
                $respo['status'] = false;
                $respo['msg'] = "You have already submited this form on=>".$lastSubmitedDate.", Now can submit on $day15Date";
                echo json_encode($respo);
                die();

            }

        }

        $t4_1 = trim($_POST['t4_1']);
        $t4_2 = trim($_POST['t4_2']);
        $t4_3 = trim($_POST['t4_3']);
        $t4_4 = trim($_POST['t4_4']);
        $t4_5 = trim($_POST['t4_5']);
      

        if(empty($t4_1) || empty($t4_2) || empty($t4_3) || empty($t4_4) || empty($t4_5)){

            $respo['status'] = false;
            $respo['msg'] = "Kindly select all field";
            echo json_encode($respo);
            die();
        }
        $insertQuery = "INSERT INTO t4_form (emp_id,section_id,section_name,station_id,station_name,component_name,sub_component,t4_1,t4_2,t4_3,t4_4,t4_5,created_date,updated_date,language) VALUES ('$userID','$sectionId','$sectionName','$stationId','$stationName','$compoNameTmp','$subcompoNameTmp','$t4_1','$t4_2','$t4_3','$t4_5','$t4_5','$createdDateTime','$createdDateTime','$language')";


        if(mysqli_query($con,$insertQuery)){

            $respo['status'] = true;
            $respo['msg'] = "Data inserted successfully.";
            echo json_encode($respo);
            die();

        }else{

            $respo['status'] = false;
            $respo['msg'] = "Something went wrong, try again.";
            echo json_encode($respo);
            die();

        }

    }
    
    elseif ($action == "T5_formSubmit"){
        if(!isset($_POST['userID']) || !isset($_POST['sectionName']) || !isset($_POST['sectionId']) || !isset($_POST['stationName']) || !isset($_POST['stationId']) || !isset($_POST['compoNameTmp']) || !isset($_POST['subcompoNameTmp'])){
            $respo['status'] = false;
            $respo['msg'] = "Something went wrong with request";
            echo json_encode($respo);
            die();

        }

        $userID = trim($_POST['userID']);
        $sectionName = trim($_POST['sectionName']);
        $sectionId = trim($_POST['sectionId']);
        $stationName = trim($_POST['stationName']);
        $stationId = trim($_POST['stationId']);
        $compoNameTmp = trim($_POST['compoNameTmp']);
        $subcompoNameTmp = trim($_POST['subcompoNameTmp']);
        $language = trim($_POST['language']);
        
        $createdDateTime = date("Y-m-d h:i:s");

        $checkData = mysqli_query($con,"SELECT * FROM t5_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp' && sub_component = '$subcompoNameTmp'");
        if(mysqli_num_rows($checkData) > 0){

            $lastInsert = mysqli_fetch_array($checkData);

            // print_r($lastInsert);
             $lastSubmitedDate = $lastInsert['created_date'];
            $d15 = strtotime("+15 days",strtotime($lastSubmitedDate));
            $day15Date = date("Y-m-d",$d15);

            $currentStrToTime =  strtotime($createdDateTime);

            if($currentStrToTime < $d15){
                
                $respo['status'] = false;
                $respo['msg'] = "You have already submited this form on=>".$lastSubmitedDate.", Now can submit on $day15Date";
                echo json_encode($respo);
                die();

            }

            // $respo['status'] = false;
            // $respo['msg'] = "You are already submit this form";
            // echo json_encode($respo);
            // die();

        }

        $t5_1 = trim($_POST['t5_1']);
        $t5_2 = trim($_POST['t5_2']);
      

        if(empty($t5_1) || empty($t5_2)){

            $respo['status'] = false;
            $respo['msg'] = "Kindly select all field";
            echo json_encode($respo);
            die();
        }
        $insertQuery = "INSERT INTO t5_form (emp_id,section_id,section_name,station_id,station_name,component_name,sub_component,t5_1,t5_2,created_date,updated_date,language) VALUES ('$userID','$sectionId','$sectionName','$stationId','$stationName','$compoNameTmp','$subcompoNameTmp','$t5_1','$t5_2','$createdDateTime','$createdDateTime','$language')";


        if(mysqli_query($con,$insertQuery)){

            $respo['status'] = true;
            $respo['msg'] = "Data inserted successfully.";
            echo json_encode($respo);
            die();

        }else{

            $respo['status'] = false;
            $respo['msg'] = "Something went wrong, try again.";
            echo json_encode($respo);
            die();

        }




    }
    elseif ($action == 'getCS_FormDetails'){
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

        }catch(Exception $err){

            $respo['status'] = false;
            $respo['msg'] = $err;
            $respo['data'] = [];

            echo json_encode($respo);
            die();

        }
    }
    // CS form
    elseif ($action == "CS1_formSubmit"){
        if(!isset($_POST['userID']) || !isset($_POST['sectionName']) || !isset($_POST['sectionId']) || !isset($_POST['stationName']) || !isset($_POST['stationId']) || !isset($_POST['compoNameTmp']) || !isset($_POST['subcompoNameTmp'])){
            $respo['status'] = false;
            $respo['msg'] = "Something went wrong with request";
            echo json_encode($respo);
            die();

        }

        $userID = trim($_POST['userID']);
        $sectionName = trim($_POST['sectionName']);
        $sectionId = trim($_POST['sectionId']);
        $stationName = trim($_POST['stationName']);
        $stationId = trim($_POST['stationId']);
        $compoNameTmp = trim($_POST['compoNameTmp']);
        $subcompoNameTmp = trim($_POST['subcompoNameTmp']);
        $language = trim($_POST['language']);
        
        $createdDateTime = date("Y-m-d h:i:s");

        $checkData = mysqli_query($con,"SELECT * FROM cs1_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp' && sub_component = '$subcompoNameTmp'");
        if(mysqli_num_rows($checkData) > 0){

            $lastInsert = mysqli_fetch_array($checkData);

            // print_r($lastInsert);
             $lastSubmitedDate = $lastInsert['created_date'];
            $d15 = strtotime("+15 days",strtotime($lastSubmitedDate));
            $day15Date = date("Y-m-d",$d15);

            $currentStrToTime =  strtotime($createdDateTime);

            if($currentStrToTime < $d15){
                
                $respo['status'] = false;
                $respo['msg'] = "You have already submited this form on=>".$lastSubmitedDate.", Now can submit on $day15Date";
                echo json_encode($respo);
                die();

            }       

        }

        $cs1_1 = trim($_POST['cs1_1']);
        $cs1_2 = trim($_POST['cs1_2']);
        $cs1_3 = trim($_POST['cs1_3']);

        $cs1_4 = trim($_POST['cs1_4']);
        $cs1_5 = trim($_POST['cs1_5']);
        $cs1_6 = trim($_POST['cs1_6']);
        $cs1_7 = trim($_POST['cs1_7']);
        $cs1_8 = trim($_POST['cs1_8']);

        $cs1_9 = trim($_POST['cs1_9']);
        $cs1_10 = trim($_POST['cs1_10']);
        $cs1_11 = trim($_POST['cs1_11']);
        $cs1_12a = trim($_POST['cs1_12a']);
        $cs1_12b = trim($_POST['cs1_12b']);
        $cs1_12c = trim($_POST['cs1_12c']);
        
        $date = trim($_POST['date']);
        $rg = trim($_POST['rg']);
        $hg = trim($_POST['hg']);
        $dg = trim($_POST['dg']);
        $hhg = trim($_POST['hhg']);
        $route = trim($_POST['route']);
        $c_on = trim($_POST['c_on']);
        $shout = trim($_POST['shout']);
        $nut_bolt = trim($_POST['nut_bolt']);
        $cover = trim($_POST['cover']);
        $remark = trim($_POST['remark']);
      

        if(empty($cs1_1) || empty($cs1_2) || empty($cs1_3) || empty($cs1_4) || empty($cs1_5) || empty($cs1_6) || empty($cs1_7) || empty($cs1_8) || empty($cs1_9) || empty($cs1_10) || empty($cs1_11) || empty($cs1_12a) || empty($cs1_12b) || empty($cs1_12c)){

            $respo['status'] = false;
            $respo['msg'] = "Kindly select all field";
            echo json_encode($respo);
            die();
        }

        $insertQuery = "INSERT INTO cs1_form (emp_id,section_id,section_name,station_id,station_name,component_name,sub_component,cs1_1,cs1_2,cs1_3,cs1_4,cs1_5,cs1_6,cs1_7,cs1_8,cs1_9,cs1_10,cs1_11,cs1_12a,cs1_12b,cs1_12c,date,rg,hg,dg,hhg,route,c_on,shout,nut_bolt,cover,remark,created_date,updated_date,language) VALUES ('$userID','$sectionId','$sectionName','$stationId','$stationName','$compoNameTmp','$subcompoNameTmp','$cs1_1','$cs1_2','$cs1_3','$cs1_4','$cs1_5','$cs1_6','$cs1_7','$cs1_8','$cs1_9','$cs1_10','$cs1_11','$cs1_12a','$cs1_12b','$cs1_12c','$date','$rg','$hg','$dg','$hhg','$route','$c_on','$shout','$nut_bolt','$cover','$remark','$createdDateTime','$createdDateTime','$language')";


        if(mysqli_query($con,$insertQuery)){

            $respo['status'] = true;
            $respo['msg'] = "Data inserted successfully.";
            echo json_encode($respo);
            die();

        }else{

            $respo['status'] = false;
            $respo['msg'] = "Something went wrong, try again.";
            echo json_encode($respo);
            die();

        }




    }
    elseif ($action == "CS2_formSubmit"){
        if(!isset($_POST['userID']) || !isset($_POST['sectionName']) || !isset($_POST['sectionId']) || !isset($_POST['stationName']) || !isset($_POST['stationId']) || !isset($_POST['compoNameTmp']) || !isset($_POST['subcompoNameTmp'])){
            $respo['status'] = false;
            $respo['msg'] = "Something went wrong with request";
            echo json_encode($respo);
            die();

        }

        $userID = trim($_POST['userID']);
        $sectionName = trim($_POST['sectionName']);
        $sectionId = trim($_POST['sectionId']);
        $stationName = trim($_POST['stationName']);
        $stationId = trim($_POST['stationId']);
        $compoNameTmp = trim($_POST['compoNameTmp']);
        $subcompoNameTmp = trim($_POST['subcompoNameTmp']);
        $language = trim($_POST['language']);
        
        $createdDateTime = date("Y-m-d h:i:s");

        $checkData = mysqli_query($con,"SELECT * FROM cs2_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp' && sub_component = '$subcompoNameTmp'");
        if(mysqli_num_rows($checkData) > 0){

            $lastInsert = mysqli_fetch_array($checkData);

            // print_r($lastInsert);
             $lastSubmitedDate = $lastInsert['created_date'];
            $d15 = strtotime("+15 days",strtotime($lastSubmitedDate));
            $day15Date = date("Y-m-d",$d15);

            $currentStrToTime =  strtotime($createdDateTime);

            if($currentStrToTime < $d15){
                
                $respo['status'] = false;
                $respo['msg'] = "You have already submited this form on=>".$lastSubmitedDate.", Now can submit on $day15Date";
                echo json_encode($respo);
                die();

            }       

        }

        $cs2_1 = trim($_POST['cs2_1']);
        $cs2_2 = trim($_POST['cs2_2']);
        $cs2_3 = trim($_POST['cs2_3']);

        $cs2_4 = trim($_POST['cs2_4']);
        $cs2_5a = trim($_POST['cs2_5a']);
        $cs2_5b = trim($_POST['cs2_5b']);
        $cs2_6 = trim($_POST['cs2_6']);
        $cs2_7 = trim($_POST['cs2_7']);

      

        if(empty($cs2_1) || empty($cs2_2) || empty($cs2_3) || empty($cs2_4) || empty($cs2_5a) || empty($cs2_5b) || empty($cs2_6) || empty($cs2_7)){

            $respo['status'] = false;
            $respo['msg'] = "Kindly select all field";
            echo json_encode($respo);
            die();
        }

        $insertQuery = "INSERT INTO cs2_form (emp_id,section_id,section_name,station_id,station_name,component_name,sub_component,cs2_1,cs2_2,cs2_3,cs2_4,cs2_5a,cs2_5b,cs2_6,cs2_7,created_date,updated_date,language) VALUES ('$userID','$sectionId','$sectionName','$stationId','$stationName','$compoNameTmp','$subcompoNameTmp','$cs2_1','$cs2_2','$cs2_3','$cs2_4','$cs2_5a','$cs2_5b','$cs2_6','$cs2_7','$createdDateTime','$createdDateTime','$language')";


        if(mysqli_query($con,$insertQuery)){

            $respo['status'] = true;
            $respo['msg'] = "Data inserted successfully.";
            echo json_encode($respo);
            die();

        }else{

            $respo['status'] = false;
            $respo['msg'] = "Something went wrong, try again.";
            echo json_encode($respo);
            die();

        }




    }
    // DL
    elseif ($action == 'getDL_FormDetails'){
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

        }catch(Exception $err){

            $respo['status'] = false;
            $respo['msg'] = $err;
            $respo['data'] = [];

            echo json_encode($respo);
            die();

        }
    }
    elseif ($action == "DL1_formSubmit"){
        if(!isset($_POST['userID']) || !isset($_POST['sectionName']) || !isset($_POST['sectionId']) || !isset($_POST['stationName']) || !isset($_POST['stationId']) || !isset($_POST['compoNameTmp']) || !isset($_POST['subcompoNameTmp'])){
            $respo['status'] = false;
            $respo['msg'] = "Something went wrong with request";
            echo json_encode($respo);
            die();

        }

        $userID = trim($_POST['userID']);
        $sectionName = trim($_POST['sectionName']);
        $sectionId = trim($_POST['sectionId']);
        $stationName = trim($_POST['stationName']);
        $stationId = trim($_POST['stationId']);
        $compoNameTmp = trim($_POST['compoNameTmp']);
        $subcompoNameTmp = trim($_POST['subcompoNameTmp']);
        $language = trim($_POST['language']);
        
        $createdDateTime = date("Y-m-d h:i:s");

        $checkData = mysqli_query($con,"SELECT * FROM dl1_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp' && sub_component = '$subcompoNameTmp'");
        if(mysqli_num_rows($checkData) > 0){

            $lastInsert = mysqli_fetch_array($checkData);

            // print_r($lastInsert);
             $lastSubmitedDate = $lastInsert['created_date'];
            $d15 = strtotime("+15 days",strtotime($lastSubmitedDate));
            $day15Date = date("Y-m-d",$d15);

            $currentStrToTime =  strtotime($createdDateTime);

            if($currentStrToTime < $d15){
                
                $respo['status'] = false;
                $respo['msg'] = "You have already submited this form on=>".$lastSubmitedDate.", Now can submit on $day15Date";
                echo json_encode($respo);
                die();

            }       

        }

        $dl1_1 = trim($_POST['dl1_1']);
        $dl1_2 = trim($_POST['dl1_2']);
        $dl1_3 = trim($_POST['dl1_3']);

        $dl1_4 = trim($_POST['dl1_4']);
        $dl1_5 = trim($_POST['dl1_5']);
        $dl1_6 = trim($_POST['dl1_6']);
        $dl1_7 = trim($_POST['dl1_7']);
        $dl1_8a = trim($_POST['dl1_8a']);
        $dl1_8b = trim($_POST['dl1_8b']);
        $dl1_9 = trim($_POST['dl1_9']);

      

        if(empty($dl1_1) || empty($dl1_2) || empty($dl1_3) || empty($dl1_4) || empty($dl1_5) || empty($dl1_6) || empty($dl1_7)  || empty($dl1_8a)  || empty($dl1_8b)  || empty($dl1_9) ){

            $respo['status'] = false;
            $respo['msg'] = "Kindly select all field";
            echo json_encode($respo);
            die();
        }

        $insertQuery = "INSERT INTO dl1_form (emp_id,section_id,section_name,station_id,station_name,component_name,sub_component,dl1_1,dl1_2,dl1_3,dl1_4,dl1_5,dl1_6,dl1_7,dl1_8a,dl1_8b,dl1_9,created_date,updated_date,language) VALUES ('$userID','$sectionId','$sectionName','$stationId','$stationName','$compoNameTmp','$subcompoNameTmp','$dl1_1','$dl1_2','$dl1_3','$dl1_4','$dl1_5','$dl1_6','$dl1_7','$dl1_8a','$dl1_8b','$dl1_9','$createdDateTime','$createdDateTime','$language')";


        if(mysqli_query($con,$insertQuery)){

            $respo['status'] = true;
            $respo['msg'] = "Data inserted successfully.";
            echo json_encode($respo);
            die();

        }else{

            $respo['status'] = false;
            $respo['msg'] = "Something went wrong, try again.";
            echo json_encode($respo);
            die();

        }




    }
    elseif ($action == "DL2_formSubmit"){
        if(!isset($_POST['userID']) || !isset($_POST['sectionName']) || !isset($_POST['sectionId']) || !isset($_POST['stationName']) || !isset($_POST['stationId']) || !isset($_POST['compoNameTmp']) || !isset($_POST['subcompoNameTmp'])){
            $respo['status'] = false;
            $respo['msg'] = "Something went wrong with request";
            echo json_encode($respo);
            die();

        }

        $userID = trim($_POST['userID']);
        $sectionName = trim($_POST['sectionName']);
        $sectionId = trim($_POST['sectionId']);
        $stationName = trim($_POST['stationName']);
        $stationId = trim($_POST['stationId']);
        $compoNameTmp = trim($_POST['compoNameTmp']);
        $subcompoNameTmp = trim($_POST['subcompoNameTmp']);
        $language = trim($_POST['language']);
        
        $createdDateTime = date("Y-m-d h:i:s");

        $checkData = mysqli_query($con,"SELECT * FROM dl2_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp' && sub_component = '$subcompoNameTmp'");
        if(mysqli_num_rows($checkData) > 0){

            $lastInsert = mysqli_fetch_array($checkData);

            // print_r($lastInsert);
             $lastSubmitedDate = $lastInsert['created_date'];
            $d15 = strtotime("+15 days",strtotime($lastSubmitedDate));
            $day15Date = date("Y-m-d",$d15);

            $currentStrToTime =  strtotime($createdDateTime);

            if($currentStrToTime < $d15){
                
                $respo['status'] = false;
                $respo['msg'] = "You have already submited this form on=>".$lastSubmitedDate.", Now can submit on $day15Date";
                echo json_encode($respo);
                die();

            }       

        }

        $dl2_1 = trim($_POST['dl2_1']);
        $dl2_2 = trim($_POST['dl2_2']);
        $dl2_3 = trim($_POST['dl2_3']);
        // $dl2_3b = trim($_POST['dl2_3b']);


      

        if(empty($dl2_1) || empty($dl2_2) || empty($dl2_3)  ){

            $respo['status'] = false;
            $respo['msg'] = "Kindly select all field";
            echo json_encode($respo);
            die();
        }

        $insertQuery = "INSERT INTO dl2_form (emp_id,section_id,section_name,station_id,station_name,component_name,sub_component,dl2_1,dl2_2,dl2_3,created_date,updated_date,language) VALUES ('$userID','$sectionId','$sectionName','$stationId','$stationName','$compoNameTmp','$subcompoNameTmp','$dl2_1','$dl2_2','$dl2_3','$createdDateTime','$createdDateTime','$language')";


        if(mysqli_query($con,$insertQuery)){

            $respo['status'] = true;
            $respo['msg'] = "Data inserted successfully.";
            echo json_encode($respo);
            die();

        }else{

            $respo['status'] = false;
            $respo['msg'] = "Something went wrong, try again.";
            echo json_encode($respo);
            die();

        }




    }
    elseif ($action == "DL3_formSubmit"){
        if(!isset($_POST['userID']) || !isset($_POST['sectionName']) || !isset($_POST['sectionId']) || !isset($_POST['stationName']) || !isset($_POST['stationId']) || !isset($_POST['compoNameTmp']) || !isset($_POST['subcompoNameTmp'])){
            $respo['status'] = false;
            $respo['msg'] = "Something went wrong with request";
            echo json_encode($respo);
            die();

        }

        $userID = trim($_POST['userID']);
        $sectionName = trim($_POST['sectionName']);
        $sectionId = trim($_POST['sectionId']);
        $stationName = trim($_POST['stationName']);
        $stationId = trim($_POST['stationId']);
        $compoNameTmp = trim($_POST['compoNameTmp']);
        $subcompoNameTmp = trim($_POST['subcompoNameTmp']);
        $language = trim($_POST['language']);
        
        $createdDateTime = date("Y-m-d h:i:s");

        $checkData = mysqli_query($con,"SELECT * FROM dl3_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp' && sub_component = '$subcompoNameTmp'");
        if(mysqli_num_rows($checkData) > 0){

            $lastInsert = mysqli_fetch_array($checkData);

            // print_r($lastInsert);
             $lastSubmitedDate = $lastInsert['created_date'];
            $d15 = strtotime("+15 days",strtotime($lastSubmitedDate));
            $day15Date = date("Y-m-d",$d15);

            $currentStrToTime =  strtotime($createdDateTime);

            if($currentStrToTime < $d15){
                
                $respo['status'] = false;
                $respo['msg'] = "You have already submited this form on=>".$lastSubmitedDate.", Now can submit on $day15Date";
                echo json_encode($respo);
                die();

            }       

        }

        $dl3_1 = trim($_POST['dl3_1']);
        $dl3_2 = trim($_POST['dl3_2']);
        $dl3_3= trim($_POST['dl3_3']);
        

      

        if(empty($dl3_1) || empty($dl3_2)|| empty($dl3_3)){

            $respo['status'] = false;
            $respo['msg'] = "Kindly select all field";
            echo json_encode($respo);
            die();
        }

        $insertQuery = "INSERT INTO dl3_form (emp_id,section_id,section_name,station_id,station_name,component_name,sub_component,dl3_1,dl3_2,dl3_3,created_date,updated_date,language) VALUES ('$userID','$sectionId','$sectionName','$stationId','$stationName','$compoNameTmp','$subcompoNameTmp','$dl3_1','$dl3_2','$dl3_3','$createdDateTime','$createdDateTime','$language')";


        if(mysqli_query($con,$insertQuery)){

            $respo['status'] = true;
            $respo['msg'] = "Data inserted successfully.";
            echo json_encode($respo);
            die();

        }else{

            $respo['status'] = false;
            $respo['msg'] = "Something went wrong, try again.";
            echo json_encode($respo);
            die();

        }




    }
    elseif ($action == "DL4_formSubmit"){
        if(!isset($_POST['userID']) || !isset($_POST['sectionName']) || !isset($_POST['sectionId']) || !isset($_POST['stationName']) || !isset($_POST['stationId']) || !isset($_POST['compoNameTmp']) || !isset($_POST['subcompoNameTmp'])){
            $respo['status'] = false;
            $respo['msg'] = "Something went wrong with request";
            echo json_encode($respo);
            die();

        }

        $userID = trim($_POST['userID']);
        $sectionName = trim($_POST['sectionName']);
        $sectionId = trim($_POST['sectionId']);
        $stationName = trim($_POST['stationName']);
        $stationId = trim($_POST['stationId']);
        $compoNameTmp = trim($_POST['compoNameTmp']);
        $subcompoNameTmp = trim($_POST['subcompoNameTmp']);
        $language = trim($_POST['language']);
        
        $createdDateTime = date("Y-m-d h:i:s");

        $checkData = mysqli_query($con,"SELECT * FROM dl4_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp' && sub_component = '$subcompoNameTmp'");
        if(mysqli_num_rows($checkData) > 0){

            $lastInsert = mysqli_fetch_array($checkData);

            // print_r($lastInsert);
             $lastSubmitedDate = $lastInsert['created_date'];
            $d15 = strtotime("+15 days",strtotime($lastSubmitedDate));
            $day15Date = date("Y-m-d",$d15);

            $currentStrToTime =  strtotime($createdDateTime);

            if($currentStrToTime < $d15){
                
                $respo['status'] = false;
                $respo['msg'] = "You have already submited this form on=>".$lastSubmitedDate.", Now can submit on $day15Date";
                echo json_encode($respo);
                die();

            }       

        }

        $dl4_1 = trim($_POST['dl4_1']);
        $dl4_2 = trim($_POST['dl4_2']);
        $dl4_3 = trim($_POST['dl4_3']);
        $dl4_4 = trim($_POST['dl4_4']);

      

        if(empty($dl4_1) || empty($dl4_2) || empty($dl4_3) || empty($dl4_4) ){

            $respo['status'] = false;
            $respo['msg'] = "Kindly select all field";
            echo json_encode($respo);
            die();
        }

        $insertQuery = "INSERT INTO dl4_form (emp_id,section_id,section_name,station_id,station_name,component_name,sub_component,dl4_1,dl4_2,dl4_3,dl4_4,created_date,updated_date,language) VALUES ('$userID','$sectionId','$sectionName','$stationId','$stationName','$compoNameTmp','$subcompoNameTmp','$dl4_1','$dl4_2','$dl4_3','$dl4_4','$createdDateTime','$createdDateTime','$language')";


        if(mysqli_query($con,$insertQuery)){

            $respo['status'] = true;
            $respo['msg'] = "Data inserted successfully.";
            echo json_encode($respo);
            die();

        }else{

            $respo['status'] = false;
            $respo['msg'] = "Something went wrong, try again.";
            echo json_encode($respo);
            die();

        }




    }

    // MLB
    elseif ($action == 'getMLB_FormDetails'){
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

        }catch(Exception $err){

            $respo['status'] = false;
            $respo['msg'] = $err;
            $respo['data'] = [];

            echo json_encode($respo);
            die();

        }
    }

    elseif ($action == "MLB1_formSubmit"){
        if(!isset($_POST['userID']) || !isset($_POST['sectionName']) || !isset($_POST['sectionId']) || !isset($_POST['stationName']) || !isset($_POST['stationId']) || !isset($_POST['compoNameTmp']) || !isset($_POST['subcompoNameTmp'])){
            $respo['status'] = false;
            $respo['msg'] = "Something went wrong with request";
            echo json_encode($respo);
            die();

        }

        $userID = trim($_POST['userID']);
        $sectionName = trim($_POST['sectionName']);
        $sectionId = trim($_POST['sectionId']);
        $stationName = trim($_POST['stationName']);
        $stationId = trim($_POST['stationId']);
        $compoNameTmp = trim($_POST['compoNameTmp']);
        $subcompoNameTmp = trim($_POST['subcompoNameTmp']);
        $language = trim($_POST['language']);
        
        $createdDateTime = date("Y-m-d h:i:s");

        $checkData = mysqli_query($con,"SELECT * FROM mlb1_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp' && sub_component = '$subcompoNameTmp'");
        if(mysqli_num_rows($checkData) > 0){

            $lastInsert = mysqli_fetch_array($checkData);

            // print_r($lastInsert);
             $lastSubmitedDate = $lastInsert['created_date'];
            $d15 = strtotime("+15 days",strtotime($lastSubmitedDate));
            $day15Date = date("Y-m-d",$d15);

            $currentStrToTime =  strtotime($createdDateTime);

            if($currentStrToTime < $d15){
                
                $respo['status'] = false;
                $respo['msg'] = "You have already submited this form on=>".$lastSubmitedDate.", Now can submit on $day15Date";
                echo json_encode($respo);
                die();

            }

            

        }

        $mlb1_1 = trim($_POST['mlb1_1']);
        $mlb1_2 = trim($_POST['mlb1_2']);
        $mlb1_3 = trim($_POST['mlb1_3']);
        $mlb1_4 = trim($_POST['mlb1_4']);
        $mlb1_5 = trim($_POST['mlb1_5']);
        $mlb1_6 = trim($_POST['mlb1_6']);


        if(empty($mlb1_1) || empty($mlb1_2) || empty($mlb1_3) || empty($mlb1_4) || empty($mlb1_5) || empty($mlb1_6) ){

            $respo['status'] = false;
            $respo['msg'] = "Kindly select all field";
            echo json_encode($respo);
            die();
        }
        $insertQuery = "INSERT INTO mlb1_form (emp_id,section_id,section_name,station_id,station_name,component_name,sub_component,mlb1_1,mlb1_2,mlb1_3,mlb1_4,mlb1_5,mlb1_6,created_date,updated_date,language) VALUES ('$userID','$sectionId','$sectionName','$stationId','$stationName','$compoNameTmp','$subcompoNameTmp','$mlb1_1','$mlb1_2','$mlb1_3','$mlb1_4','$mlb1_5','$mlb1_6','$createdDateTime','$createdDateTime','$language')";


        if(mysqli_query($con,$insertQuery)){

            $respo['status'] = true;
            $respo['msg'] = "Data inserted successfully.";
            echo json_encode($respo);
            die();

        }else{

            $respo['status'] = false;
            $respo['msg'] = "Something went wrong, try again.";
            echo json_encode($respo);
            die();

        }




    }

    elseif ($action == "MLB2_formSubmit"){
        if(!isset($_POST['userID']) || !isset($_POST['sectionName']) || !isset($_POST['sectionId']) || !isset($_POST['stationName']) || !isset($_POST['stationId']) || !isset($_POST['compoNameTmp']) || !isset($_POST['subcompoNameTmp'])){
            $respo['status'] = false;
            $respo['msg'] = "Something went wrong with request";
            echo json_encode($respo);
            die();

        }

        $userID = trim($_POST['userID']);
        $sectionName = trim($_POST['sectionName']);
        $sectionId = trim($_POST['sectionId']);
        $stationName = trim($_POST['stationName']);
        $stationId = trim($_POST['stationId']);
        $compoNameTmp = trim($_POST['compoNameTmp']);
        $subcompoNameTmp = trim($_POST['subcompoNameTmp']);
        $language = trim($_POST['language']);
        
        $createdDateTime = date("Y-m-d h:i:s");

        $checkData = mysqli_query($con,"SELECT * FROM mlb2_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp' && sub_component = '$subcompoNameTmp'");
        if(mysqli_num_rows($checkData) > 0){

            $lastInsert = mysqli_fetch_array($checkData);

            // print_r($lastInsert);
             $lastSubmitedDate = $lastInsert['created_date'];
            $d15 = strtotime("+15 days",strtotime($lastSubmitedDate));
            $day15Date = date("Y-m-d",$d15);

            $currentStrToTime =  strtotime($createdDateTime);

            if($currentStrToTime < $d15){
                
                $respo['status'] = false;
                $respo['msg'] = "You have already submited this form on=>".$lastSubmitedDate.", Now can submit on $day15Date";
                echo json_encode($respo);
                die();

            }

            

        }

        $mlb2_1 = trim($_POST['mlb2_1']);
        $mlb2_2 = trim($_POST['mlb2_2']);
     


        if(empty($mlb2_1) || empty($mlb2_2)){

            $respo['status'] = false;
            $respo['msg'] = "Kindly select all field";
            echo json_encode($respo);
            die();
        }
        $insertQuery = "INSERT INTO mlb2_form (emp_id,section_id,section_name,station_id,station_name,component_name,sub_component,mlb2_1,mlb2_2,created_date,updated_date,language) VALUES ('$userID','$sectionId','$sectionName','$stationId','$stationName','$compoNameTmp','$subcompoNameTmp','$mlb2_1','$mlb2_2','$createdDateTime','$createdDateTime','$language')";


        if(mysqli_query($con,$insertQuery)){

            $respo['status'] = true;
            $respo['msg'] = "Data inserted successfully.";
            echo json_encode($respo);
            die();

        }else{

            $respo['status'] = false;
            $respo['msg'] = "Something went wrong, try again.";
            echo json_encode($respo);
            die();

        }




    }

    elseif ($action == "MLB3_formSubmit"){
        if(!isset($_POST['userID']) || !isset($_POST['sectionName']) || !isset($_POST['sectionId']) || !isset($_POST['stationName']) || !isset($_POST['stationId']) || !isset($_POST['compoNameTmp']) || !isset($_POST['subcompoNameTmp'])){
            $respo['status'] = false;
            $respo['msg'] = "Something went wrong with request";
            echo json_encode($respo);
            die();

        }

        $userID = trim($_POST['userID']);
        $sectionName = trim($_POST['sectionName']);
        $sectionId = trim($_POST['sectionId']);
        $stationName = trim($_POST['stationName']);
        $stationId = trim($_POST['stationId']);
        $compoNameTmp = trim($_POST['compoNameTmp']);
        $subcompoNameTmp = trim($_POST['subcompoNameTmp']);
        $language = trim($_POST['language']);
        
        $createdDateTime = date("Y-m-d h:i:s");

        $checkData = mysqli_query($con,"SELECT * FROM mlb3_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp' && sub_component = '$subcompoNameTmp'");
        if(mysqli_num_rows($checkData) > 0){

            $lastInsert = mysqli_fetch_array($checkData);

            // print_r($lastInsert);
             $lastSubmitedDate = $lastInsert['created_date'];
            $d15 = strtotime("+15 days",strtotime($lastSubmitedDate));
            $day15Date = date("Y-m-d",$d15);

            $currentStrToTime =  strtotime($createdDateTime);

            if($currentStrToTime < $d15){
                
                $respo['status'] = false;
                $respo['msg'] = "You have already submited this form on=>".$lastSubmitedDate.", Now can submit on $day15Date";
                echo json_encode($respo);
                die();

            }

            

        }

        $mlb3_1 = trim($_POST['mlb3_1']);
     


        if(empty($mlb3_1)){

            $respo['status'] = false;
            $respo['msg'] = "Kindly select all field";
            echo json_encode($respo);
            die();
        }
        $insertQuery = "INSERT INTO mlb3_form (emp_id,section_id,section_name,station_id,station_name,component_name,sub_component,mlb3_1,created_date,updated_date,language) VALUES ('$userID','$sectionId','$sectionName','$stationId','$stationName','$compoNameTmp','$subcompoNameTmp','$mlb3_1','$createdDateTime','$createdDateTime','$language')";


        if(mysqli_query($con,$insertQuery)){

            $respo['status'] = true;
            $respo['msg'] = "Data inserted successfully.";
            echo json_encode($respo);
            die();

        }else{

            $respo['status'] = false;
            $respo['msg'] = "Something went wrong, try again.";
            echo json_encode($respo);
            die();

        }




    }
        // SLB

    elseif ($action == 'getSLB_FormDetails'){
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
    
            }catch(Exception $err){
    
                $respo['status'] = false;
                $respo['msg'] = $err;
                $respo['data'] = [];
    
                echo json_encode($respo);
                die();
    
            }
    }
    
    elseif ($action == "SLB1_formSubmit"){
            if(!isset($_POST['userID']) || !isset($_POST['sectionName']) || !isset($_POST['sectionId']) || !isset($_POST['stationName']) || !isset($_POST['stationId']) || !isset($_POST['compoNameTmp']) || !isset($_POST['subcompoNameTmp'])){
                $respo['status'] = false;
                $respo['msg'] = "Something went wrong with request";
                echo json_encode($respo);
                die();
    
            }
    
            $userID = trim($_POST['userID']);
            $sectionName = trim($_POST['sectionName']);
            $sectionId = trim($_POST['sectionId']);
            $stationName = trim($_POST['stationName']);
            $stationId = trim($_POST['stationId']);
            $compoNameTmp = trim($_POST['compoNameTmp']);
            $subcompoNameTmp = trim($_POST['subcompoNameTmp']);
            $language = trim($_POST['language']);
            
            $createdDateTime = date("Y-m-d h:i:s");
    
            $checkData = mysqli_query($con,"SELECT * FROM slb1_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp' && sub_component = '$subcompoNameTmp'");
            if(mysqli_num_rows($checkData) > 0){
    
                $lastInsert = mysqli_fetch_array($checkData);
    
                // print_r($lastInsert);
                 $lastSubmitedDate = $lastInsert['created_date'];
                $d15 = strtotime("+15 days",strtotime($lastSubmitedDate));
                $day15Date = date("Y-m-d",$d15);
    
                $currentStrToTime =  strtotime($createdDateTime);
    
                if($currentStrToTime < $d15){
                    
                    $respo['status'] = false;
                    $respo['msg'] = "You have already submited this form on=>".$lastSubmitedDate.", Now can submit on $day15Date";
                    echo json_encode($respo);
                    die();
    
                }
    
                
    
            }
    
            $slb1_1 = trim($_POST['slb1_1']);
            $slb1_2 = trim($_POST['slb1_2']);
            $slb1_3 = trim($_POST['slb1_3']);
            $slb1_4 = trim($_POST['slb1_4']);
            $slb1_5 = trim($_POST['slb1_5']);
            $slb1_6 = trim($_POST['slb1_6']);
            $slb1_7 = trim($_POST['slb1_7']);
    
    
            if(empty($slb1_1) || empty($slb1_2) || empty($slb1_3) || empty($slb1_4) || empty($slb1_5) || empty($slb1_6) || empty($slb1_7) ){
    
                $respo['status'] = false;
                $respo['msg'] = "Kindly select all field";
                echo json_encode($respo);
                die();
            }
            $insertQuery = "INSERT INTO slb1_form (emp_id,section_id,section_name,station_id,station_name,component_name,sub_component,slb1_1,slb1_2,slb1_3,slb1_4,slb1_5,slb1_6,slb1_7,created_date,updated_date,language) VALUES ('$userID','$sectionId','$sectionName','$stationId','$stationName','$compoNameTmp','$subcompoNameTmp','$slb1_1','$slb1_2','$slb1_3','$slb1_4','$slb1_5','$slb1_6','$slb1_7','$createdDateTime','$createdDateTime','$language')";
    
    
            if(mysqli_query($con,$insertQuery)){
    
                $respo['status'] = true;
                $respo['msg'] = "Data inserted successfully.";
                echo json_encode($respo);
                die();
    
            }else{
    
                $respo['status'] = false;
                $respo['msg'] = "Something went wrong, try again.";
                echo json_encode($respo);
                die();
    
            }
    
    
    
    
    }
    
    elseif ($action == "SLB2_formSubmit"){
            if(!isset($_POST['userID']) || !isset($_POST['sectionName']) || !isset($_POST['sectionId']) || !isset($_POST['stationName']) || !isset($_POST['stationId']) || !isset($_POST['compoNameTmp']) || !isset($_POST['subcompoNameTmp'])){
                $respo['status'] = false;
                $respo['msg'] = "Something went wrong with request";
                echo json_encode($respo);
                die();
    
            }
    
            $userID = trim($_POST['userID']);
            $sectionName = trim($_POST['sectionName']);
            $sectionId = trim($_POST['sectionId']);
            $stationName = trim($_POST['stationName']);
            $stationId = trim($_POST['stationId']);
            $compoNameTmp = trim($_POST['compoNameTmp']);
            $subcompoNameTmp = trim($_POST['subcompoNameTmp']);
            $language = trim($_POST['language']);
            
            $createdDateTime = date("Y-m-d h:i:s");
    
            $checkData = mysqli_query($con,"SELECT * FROM slb2_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp' && sub_component = '$subcompoNameTmp'");
            if(mysqli_num_rows($checkData) > 0){
    
                $lastInsert = mysqli_fetch_array($checkData);
    
                // print_r($lastInsert);
                 $lastSubmitedDate = $lastInsert['created_date'];
                $d15 = strtotime("+15 days",strtotime($lastSubmitedDate));
                $day15Date = date("Y-m-d",$d15);
    
                $currentStrToTime =  strtotime($createdDateTime);
    
                if($currentStrToTime < $d15){
                    
                    $respo['status'] = false;
                    $respo['msg'] = "You have already submited this form on=>".$lastSubmitedDate.", Now can submit on $day15Date";
                    echo json_encode($respo);
                    die();
    
                }
    
                
    
            }
    
            $slb2_1 = trim($_POST['slb2_1']);
            $slb2_2 = trim($_POST['slb2_2']);
            $slb2_3 = trim($_POST['slb2_3']);
            $slb2_4 = trim($_POST['slb2_4']);
         
    
    
            if(empty($slb2_1) || empty($slb2_2)|| empty($slb2_3)|| empty($slb2_4)){
    
                $respo['status'] = false;
                $respo['msg'] = "Kindly select all field";
                echo json_encode($respo);
                die();
            }
            $insertQuery = "INSERT INTO slb2_form (emp_id,section_id,section_name,station_id,station_name,component_name,sub_component,slb2_1,slb2_2,slb2_3,slb2_4,created_date,updated_date,language) VALUES ('$userID','$sectionId','$sectionName','$stationId','$stationName','$compoNameTmp','$subcompoNameTmp','$slb2_1','$slb2_2','$slb2_3','$slb2_4','$createdDateTime','$createdDateTime','$language')";
    
    
            if(mysqli_query($con,$insertQuery)){
    
                $respo['status'] = true;
                $respo['msg'] = "Data inserted successfully.";
                echo json_encode($respo);
                die();
    
            }else{
    
                $respo['status'] = false;
                $respo['msg'] = "Something went wrong, try again.";
                echo json_encode($respo);
                die();
    
            }
    
    
    
    
    }

    // ELB



    elseif ($action == 'getELB_FormDetails'){
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

        }catch(Exception $err){

            $respo['status'] = false;
            $respo['msg'] = $err;
            $respo['data'] = [];

            echo json_encode($respo);
            die();

        }
    }

    elseif ($action == "ELB1_formSubmit"){
        if(!isset($_POST['userID']) || !isset($_POST['sectionName']) || !isset($_POST['sectionId']) || !isset($_POST['stationName']) || !isset($_POST['stationId']) || !isset($_POST['compoNameTmp']) || !isset($_POST['subcompoNameTmp'])){
            $respo['status'] = false;
            $respo['msg'] = "Something went wrong with request";
            echo json_encode($respo);
            die();

        }

        $userID = trim($_POST['userID']);
        $sectionName = trim($_POST['sectionName']);
        $sectionId = trim($_POST['sectionId']);
        $stationName = trim($_POST['stationName']);
        $stationId = trim($_POST['stationId']);
        $compoNameTmp = trim($_POST['compoNameTmp']);
        $subcompoNameTmp = trim($_POST['subcompoNameTmp']);
        $language = trim($_POST['language']);
        
        $createdDateTime = date("Y-m-d h:i:s");

        $checkData = mysqli_query($con,"SELECT * FROM elb1_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp' && sub_component = '$subcompoNameTmp'");
        if(mysqli_num_rows($checkData) > 0){

            $lastInsert = mysqli_fetch_array($checkData);

            // print_r($lastInsert);
             $lastSubmitedDate = $lastInsert['created_date'];
            $d15 = strtotime("+15 days",strtotime($lastSubmitedDate));
            $day15Date = date("Y-m-d",$d15);

            $currentStrToTime =  strtotime($createdDateTime);

            if($currentStrToTime < $d15){
                
                $respo['status'] = false;
                $respo['msg'] = "You have already submited this form on=>".$lastSubmitedDate.", Now can submit on $day15Date";
                echo json_encode($respo);
                die();

            }

            

        }

         $elb1_1 = trim($_POST['elb1_1']);
        $elb1_2 = trim($_POST['elb1_2']);
        $elb1_3 = trim($_POST['elb1_3']);
        $elb1_4 = trim($_POST['elb1_4']);
        $elb1_5 = trim($_POST['elb1_5']);
        $elb1_6 = trim($_POST['elb1_6']);
        $elb1_7 = trim($_POST['elb1_7']);
        $elb1_8 = trim($_POST['elb1_8']);
        $elb1_9 = trim($_POST['elb1_9']);
        $elb1_10 = trim($_POST['elb1_10']);
        $elb1_11 = trim($_POST['elb1_11']);

        if(empty($elb1_1) || empty($elb1_2) || empty($elb1_3) || empty($elb1_4) || empty($elb1_5) || empty($elb1_6) || empty($elb1_7) || empty($elb1_8) || empty($elb1_9)|| empty($elb1_10) || empty($elb1_11)){
            $respo['status'] = false;
            $respo['msg'] = "Kindly select all field";
            echo json_encode($respo);
            die();
        }
         $insertQuery = "INSERT INTO elb1_form (emp_id,section_id,section_name,station_id,station_name,component_name,sub_component,elb1_1,elb1_2,elb1_3,elb1_4,elb1_5,elb1_6,elb1_7,elb1_8,elb1_9,elb1_10,elb1_11,created_date,updated_date,language) VALUES ('$userID','$sectionId','$sectionName','$stationId','$stationName','$compoNameTmp','$subcompoNameTmp','$elb1_1','$elb1_2','$elb1_3','$elb1_4','$elb1_5','$elb1_6','$elb1_7','$elb1_8','$elb1_9','$elb1_10','$elb1_11','$createdDateTime','$createdDateTime','$language')";


        if(mysqli_query($con,$insertQuery)){

            $respo['status'] = true;
            $respo['msg'] = "Data inserted successfully.";
            echo json_encode($respo);
            die();

        }else{

            $respo['status'] = false;
            $respo['msg'] = "Something went wrong, try again.";
            echo json_encode($respo);
            die();

        }




    }

    elseif ($action == "ELB2_formSubmit"){
        if(!isset($_POST['userID']) || !isset($_POST['sectionName']) || !isset($_POST['sectionId']) || !isset($_POST['stationName']) || !isset($_POST['stationId']) || !isset($_POST['compoNameTmp']) || !isset($_POST['subcompoNameTmp'])){
            $respo['status'] = false;
            $respo['msg'] = "Something went wrong with request";
            echo json_encode($respo);
            die();

        }

        $userID = trim($_POST['userID']);
        $sectionName = trim($_POST['sectionName']);
        $sectionId = trim($_POST['sectionId']);
        $stationName = trim($_POST['stationName']);
        $stationId = trim($_POST['stationId']);
        $compoNameTmp = trim($_POST['compoNameTmp']);
        $subcompoNameTmp = trim($_POST['subcompoNameTmp']);
        $language = trim($_POST['language']);
        
        $createdDateTime = date("Y-m-d h:i:s");

        $checkData = mysqli_query($con,"SELECT * FROM elb2_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp' && sub_component = '$subcompoNameTmp'");
        if(mysqli_num_rows($checkData) > 0){

            $lastInsert = mysqli_fetch_array($checkData);

            // print_r($lastInsert);
             $lastSubmitedDate = $lastInsert['created_date'];
            $d15 = strtotime("+15 days",strtotime($lastSubmitedDate));
            $day15Date = date("Y-m-d",$d15);

            $currentStrToTime =  strtotime($createdDateTime);

            if($currentStrToTime < $d15){
                
                $respo['status'] = false;
                $respo['msg'] = "You have already submited this form on=>".$lastSubmitedDate.", Now can submit on $day15Date";
                echo json_encode($respo);
                die();

            }

            

        }

      
        $elb2_1 = trim($_POST['elb2_1']);
        $elb2_2 = trim($_POST['elb2_2']);
        $elb2_3 = trim($_POST['elb2_3']);
        $elb2_4 = trim($_POST['elb2_4']);
        $elb2_5 = trim($_POST['elb2_5']);
        $elb2_6 = trim($_POST['elb2_6']);
        $elb2_7 = trim($_POST['elb2_7']);
        $elb2_8 = trim($_POST['elb2_8']);
     


       if(empty($elb2_1) || empty($elb2_2) || empty($elb2_3) || empty($elb2_4) || empty($elb2_5) || empty($elb2_6) || empty($elb2_7) || empty($elb2_8) ){

            $respo['status'] = false;
            $respo['msg'] = "Kindly select all field";
            echo json_encode($respo);
            die();
        }
       $insertQuery = "INSERT INTO elb2_form (emp_id,section_id,section_name,station_id,station_name,component_name,sub_component,elb2_1,elb2_2,elb2_3,elb2_4,elb2_5,elb2_6,elb2_7,elb2_8,created_date,updated_date,language) VALUES ('$userID','$sectionId','$sectionName','$stationId','$stationName','$compoNameTmp','$subcompoNameTmp','$elb2_1','$elb2_2','$elb2_3','$elb2_4','$elb2_5','$elb2_6','$elb2_7','$elb2_8','$createdDateTime','$createdDateTime','$language')";



        if(mysqli_query($con,$insertQuery)){

            $respo['status'] = true;
            $respo['msg'] = "Data inserted successfully.";
            echo json_encode($respo);
            die();

        }else{

            $respo['status'] = false;
            $respo['msg'] = "Something went wrong, try again.";
            echo json_encode($respo);
            die();

        }




    }

   
    elseif ($action == "ELB3_formSubmit"){
        if(!isset($_POST['userID']) || !isset($_POST['sectionName']) || !isset($_POST['sectionId']) || !isset($_POST['stationName']) || !isset($_POST['stationId']) || !isset($_POST['compoNameTmp']) || !isset($_POST['subcompoNameTmp'])){
            $respo['status'] = false;
            $respo['msg'] = "Something went wrong with request";
            echo json_encode($respo);
            die();

        }

        $userID = trim($_POST['userID']);
        $sectionName = trim($_POST['sectionName']);
        $sectionId = trim($_POST['sectionId']);
        $stationName = trim($_POST['stationName']);
        $stationId = trim($_POST['stationId']);
        $compoNameTmp = trim($_POST['compoNameTmp']);
        $subcompoNameTmp = trim($_POST['subcompoNameTmp']);
        $language = trim($_POST['language']);
        
        $createdDateTime = date("Y-m-d h:i:s");

        $checkData = mysqli_query($con,"SELECT * FROM elb3_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp' && sub_component = '$subcompoNameTmp'");
        if(mysqli_num_rows($checkData) > 0){

            $lastInsert = mysqli_fetch_array($checkData);

            // print_r($lastInsert);
             $lastSubmitedDate = $lastInsert['created_date'];
            $d15 = strtotime("+15 days",strtotime($lastSubmitedDate));
            $day15Date = date("Y-m-d",$d15);

            $currentStrToTime =  strtotime($createdDateTime);

            if($currentStrToTime < $d15){
                
                $respo['status'] = false;
                $respo['msg'] = "You have already submited this form on=>".$lastSubmitedDate.", Now can submit on $day15Date";
                echo json_encode($respo);
                die();

            }

            

        }

      
        $elb3_1 = trim($_POST['elb3_1']);
        $elb3_2 = trim($_POST['elb3_2']);
        $elb3_3 = trim($_POST['elb3_3']);
        $elb3_4 = trim($_POST['elb3_4']);
        $elb3_5 = trim($_POST['elb3_5']);
        $elb3_6 = trim($_POST['elb3_6']);
      
     


       if(empty($elb3_1) || empty($elb3_2) || empty($elb3_3) || empty($elb3_4) || empty($elb3_5) || empty($elb3_6)  ){

            $respo['status'] = false;
            $respo['msg'] = "Kindly select all field";
            echo json_encode($respo);
            die();
        }
       $insertQuery = "INSERT INTO elb3_form (emp_id,section_id,section_name,station_id,station_name,component_name,sub_component,elb3_1,elb3_2,elb3_3,elb3_4,elb3_5,elb3_6,created_date,updated_date,language) VALUES ('$userID','$sectionId','$sectionName','$stationId','$stationName','$compoNameTmp','$subcompoNameTmp','$elb3_1','$elb3_2','$elb3_3','$elb3_4','$elb3_5','$elb3_6','$createdDateTime','$createdDateTime','$language')";



        if(mysqli_query($con,$insertQuery)){

            $respo['status'] = true;
            $respo['msg'] = "Data inserted successfully.";
            echo json_encode($respo);
            die();

        }else{

            $respo['status'] = false;
            $respo['msg'] = "Something went wrong, try again.";
            echo json_encode($respo);
            die();

        }




    }

    elseif ($action == "ELB4_formSubmit"){
        if(!isset($_POST['userID']) || !isset($_POST['sectionName']) || !isset($_POST['sectionId']) || !isset($_POST['stationName']) || !isset($_POST['stationId']) || !isset($_POST['compoNameTmp']) || !isset($_POST['subcompoNameTmp'])){
            $respo['status'] = false;
            $respo['msg'] = "Something went wrong with request";
            echo json_encode($respo);
            die();

        }

        $userID = trim($_POST['userID']);
        $sectionName = trim($_POST['sectionName']);
        $sectionId = trim($_POST['sectionId']);
        $stationName = trim($_POST['stationName']);
        $stationId = trim($_POST['stationId']);
        $compoNameTmp = trim($_POST['compoNameTmp']);
        $subcompoNameTmp = trim($_POST['subcompoNameTmp']);
        $language = trim($_POST['language']);
        
        $createdDateTime = date("Y-m-d h:i:s");

        $checkData = mysqli_query($con,"SELECT * FROM elb4_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp' && sub_component = '$subcompoNameTmp'");
        if(mysqli_num_rows($checkData) > 0){

            $lastInsert = mysqli_fetch_array($checkData);

            // print_r($lastInsert);
             $lastSubmitedDate = $lastInsert['created_date'];
            $d15 = strtotime("+15 days",strtotime($lastSubmitedDate));
            $day15Date = date("Y-m-d",$d15);

            $currentStrToTime =  strtotime($createdDateTime);

            if($currentStrToTime < $d15){
                
                $respo['status'] = false;
                $respo['msg'] = "You have already submited this form on=>".$lastSubmitedDate.", Now can submit on $day15Date";
                echo json_encode($respo);
                die();

            }

            

        }

      
        $elb4_1 = trim($_POST['elb4_1']);
        $elb4_2 = trim($_POST['elb4_2']);
        $elb4_3 = trim($_POST['elb4_3']);
        $elb4_4 = trim($_POST['elb4_4']);
        $elb4_5 = trim($_POST['elb4_5']);
        $elb4_6 = trim($_POST['elb4_6']);
        $elb4_7 = trim($_POST['elb4_7']);
      
     


       if(empty($elb4_1) || empty($elb4_2) || empty($elb4_3) || empty($elb4_4) || empty($elb4_5) || empty($elb4_6) || empty($elb4_7 )){

            $respo['status'] = false;
            $respo['msg'] = "Kindly select all field";
            echo json_encode($respo);
            die();
        }
       $insertQuery = "INSERT INTO elb4_form (emp_id,section_id,section_name,station_id,station_name,component_name,sub_component,elb4_1,elb4_2,elb4_3,elb4_4,elb4_5,elb4_6,elb4_7,created_date,updated_date,language) VALUES ('$userID','$sectionId','$sectionName','$stationId','$stationName','$compoNameTmp','$subcompoNameTmp','$elb4_1','$elb4_2','$elb4_3','$elb4_4','$elb4_5','$elb4_6','$elb4_7','$createdDateTime','$createdDateTime','$language')";


        if(mysqli_query($con,$insertQuery)){

            $respo['status'] = true;
            $respo['msg'] = "Data inserted successfully.";
            echo json_encode($respo);
            die();

        }else{

            $respo['status'] = false;
            $respo['msg'] = "Something went wrong, try again.";
            echo json_encode($respo);
            die();

        }




    }

    elseif ($action == "ELB5_formSubmit"){
        if(!isset($_POST['userID']) || !isset($_POST['sectionName']) || !isset($_POST['sectionId']) || !isset($_POST['stationName']) || !isset($_POST['stationId']) || !isset($_POST['compoNameTmp']) || !isset($_POST['subcompoNameTmp'])){
            $respo['status'] = false;
            $respo['msg'] = "Something went wrong with request";
            echo json_encode($respo);
            die();

        }

        $userID = trim($_POST['userID']);
        $sectionName = trim($_POST['sectionName']);
        $sectionId = trim($_POST['sectionId']);
        $stationName = trim($_POST['stationName']);
        $stationId = trim($_POST['stationId']);
        $compoNameTmp = trim($_POST['compoNameTmp']);
        $subcompoNameTmp = trim($_POST['subcompoNameTmp']);
        $language = trim($_POST['language']);
        
        $createdDateTime = date("Y-m-d h:i:s");

        $checkData = mysqli_query($con,"SELECT * FROM elb5_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp' && sub_component = '$subcompoNameTmp'");
        if(mysqli_num_rows($checkData) > 0){

            $lastInsert = mysqli_fetch_array($checkData);

            // print_r($lastInsert);
             $lastSubmitedDate = $lastInsert['created_date'];
            $d15 = strtotime("+15 days",strtotime($lastSubmitedDate));
            $day15Date = date("Y-m-d",$d15);

            $currentStrToTime =  strtotime($createdDateTime);

            if($currentStrToTime < $d15){
                
                $respo['status'] = false;
                $respo['msg'] = "You have already submited this form on=>".$lastSubmitedDate.", Now can submit on $day15Date";
                echo json_encode($respo);
                die();

            }

            

        }

      
        $elb5_1 = trim($_POST['elb5_1']);
      
     


        if(empty($elb5_1) ){

            $respo['status'] = false;
            $respo['msg'] = "Kindly select all field";
            echo json_encode($respo);
            die();
        }
     $insertQuery = "INSERT INTO elb5_form (emp_id,section_id,section_name,station_id,station_name,component_name,sub_component,elb5_1,created_date,updated_date,language) VALUES ('$userID','$sectionId','$sectionName','$stationId','$stationName','$compoNameTmp','$subcompoNameTmp','$elb5_1','$createdDateTime','$createdDateTime','$language')";


        if(mysqli_query($con,$insertQuery)){

            $respo['status'] = true;
            $respo['msg'] = "Data inserted successfully.";
            echo json_encode($respo);
            die();

        }else{

            $respo['status'] = false;
            $respo['msg'] = "Something went wrong, try again.";
            echo json_encode($respo);
            die();

        }




    }

    else{

        $respo['status'] = false;
        $respo['msg'] = "Invalid Action";
        echo json_encode($respo);
        die();

    }

}else{

    $respo['status'] = false;
    $respo['msg'] = "Access Denied";
    echo json_encode($respo);
    die();
}


?>