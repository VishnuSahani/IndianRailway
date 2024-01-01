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
             $obj->formView  = '<a  href="view-form-details.php?empid='.$sectionRun['empid'].'" type="button" class="btn btn-sm btn-warning">Form</a>';

            $data[] = $obj;

        }

        $respo['status'] = true;
        $respo['msg'] = "Employee list found";
        $respo['data'] = $data;

        echo json_encode($respo);
        die();

    }
    elseif($action == "getEmployeeDataById"){
         if(!isset($_POST['empId']) || !isset($_POST['empId'])){

             $respo['status'] = false;
            $respo['msg'] = "Employee id are not set.";
            $respo['data'] = [];
            echo json_encode($respo);
            die();

        }

        $empId = trim($_POST['empId']);
        
        $query = mysqli_query($con,"SELECT * FROM emp_info_rail WHERE empid='$empId'");
        if(mysqli_num_rows($query) == 0){
               $respo['status'] = false;
            $respo['msg'] = "Invalid Employee id";
            $respo['data'] = [];
            echo json_encode($respo);
            die();
        }
        
        $empData = mysqli_fetch_array($query);
        
           $respo['status'] = true;
            $respo['msg'] = "Employee data found";
            $respo['data'] = $empData;
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
                break;
        }

        try{

            $query = "SELECT * FROM ".$tableName;
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
            $respo['msg'] = $err;
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
        $insertQuery = "INSERT INTO ep1_form (emp_id,section_id,section_name,station_id,station_name,component_name,sub_component,ep1_1,ep1_2,ep1_3,ep1_4,ep1_5,ep1_6,ep1_7,ep1_8,ep1_9,ep1_10,ep1_11,created_date,updated_date) VALUES ('$userID','$sectionId','$sectionName','$stationId','$stationName','$compoNameTmp','$subcompoNameTmp','$ep1_1','$ep1_2','$ep1_3','$ep1_4','$ep1_5','$ep1_6','$ep1_7','$ep1_8','$ep1_9','$ep1_10','$ep1_11','$createdDateTime','$createdDateTime')";


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
        $insertQuery = "INSERT INTO ep2_form (emp_id,section_id,section_name,station_id,station_name,component_name,sub_component,EP2_1,EP2_2,EP2_3,EP2_4,EP2_5,op_v_N_R,op_v_R_N,ob_v_N_R,ob_v_R_N,det_v_N_R,det_v_R_N,nwc_N_R,nwc_R_N,ob_sc_N_R,ob_sc_R_N,ob_t_N_R,gt_N_R,operatingTimeSecond,operatingTime_dbt,friction_c_s,track_locking,remark_brief,created_date,updated_date) VALUES ('$userID','$sectionId','$sectionName','$stationId','$stationName','$compoNameTmp','$subcompoNameTmp','$EP2_1','$EP2_2','$EP2_3','$EP2_4','$EP2_5','$op_v_N_R','$op_v_R_N','$ob_v_N_R','$ob_v_R_N','$det_v_N_R','$det_v_R_N',
        '$nwc_N_R','$nwc_R_N','$ob_sc_N_R','$ob_sc_R_N','$ob_t_N_R','$gt_N_R','$operatingTimeSecond','$operatingTime_dbt','$friction_c_s','$track_locking','$remark_brief','$createdDateTime','$createdDateTime')";


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
        $insertQuery = "INSERT INTO ep4_form (emp_id,section_id,section_name,station_id,station_name,component_name,sub_component,ep4_1,ep4_2,ep4_3,ep4_4,created_date,updated_date) VALUES ('$userID','$sectionId','$sectionName','$stationId','$stationName','$compoNameTmp','$subcompoNameTmp','$ep4_1','$ep4_2','$ep4_3','$ep4_4','$createdDateTime','$createdDateTime')";


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
        $insertQuery = "INSERT INTO ep5_form (emp_id,section_id,section_name,station_id,station_name,component_name,sub_component,ep5_1,ep5_2,ep5_3,ep5_4,ep5_5,ep5_6,created_date,updated_date) VALUES ('$userID','$sectionId','$sectionName','$stationId','$stationName','$compoNameTmp','$subcompoNameTmp','$ep5_1','$ep5_2','$ep5_3','$ep5_4','$ep5_5','$ep5_6','$createdDateTime','$createdDateTime')";


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
                break;
        }

        try{

            $query = "SELECT * FROM ".$tableName;
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
        $insertQuery = "INSERT INTO t2_form (emp_id,section_id,section_name,station_id,station_name,component_name,sub_component,t2_1,t2_2,t2_3,created_date,updated_date) VALUES ('$userID','$sectionId','$sectionName','$stationId','$stationName','$compoNameTmp','$subcompoNameTmp','$t2_1','$t2_2','$t2_3','$createdDateTime','$createdDateTime')";


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
        $insertQuery = "INSERT INTO t3_form (emp_id,section_id,section_name,station_id,station_name,component_name,sub_component,t3_1,t3_2,t3_3,t3_4,created_date,updated_date) VALUES ('$userID','$sectionId','$sectionName','$stationId','$stationName','$compoNameTmp','$subcompoNameTmp','$t3_1','$t3_2','$t3_3','$t3_4','$createdDateTime','$createdDateTime')";


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
        $insertQuery = "INSERT INTO t5_form (emp_id,section_id,section_name,station_id,station_name,component_name,sub_component,t5_1,t5_2,created_date,updated_date) VALUES ('$userID','$sectionId','$sectionName','$stationId','$stationName','$compoNameTmp','$subcompoNameTmp','$t5_1','$t5_2','$createdDateTime','$createdDateTime')";


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