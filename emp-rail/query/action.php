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

    if($action == "pmeRmeDateInsert"){

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


    if( $action == "getPmeRmeDate"){

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

            $obj->pme_date = "<span>".$sectionRun['pme_date']."/<span> <a role='button' href='../admin-rail/images/pmeRmeFile/".$obj->pme_file."' target='_black' class='btn btn-sm btn-success m-1'>Show</a>";
        }

        if($sectionRun['rme_file']==''){

            $obj->rme_date = $sectionRun['rme_date']==''?'No Record':$sectionRun['rme_date'];
        }else{

            $obj->rme_date = "<span>".$sectionRun['rme_date']."</span> <a role='button' href='../admin-rail/images/pmeRmeFile/".$obj->rme_file."' target='_black' class='btn btn-sm btn-success m-1'>Show</a>";
        }

        $data[] = $obj;

       }

  

       $respo['status'] = true;
       $respo['msg'] = "Employee list found";
       $respo['data'] = $data;

       echo json_encode($respo);
       die();

    }

    if($action == "stationComponentAdd"){

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

    if($action == "getComponentData"){
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

    if($action == 'getEP_FormDetails'){
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
            
            default:
                $respo['status'] = false;
                $respo['msg'] = "Invalid request!";
                $respo['data'] = [];
                echo json_encode($respo);
                die();
                break;
        }

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
    }

    if($action == "EP1_formSubmit"){
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

        $checkData = mysqli_query($con,"SELECT id FROM ep1_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp' && sub_component = '$subcompoNameTmp'");
        if(mysqli_num_rows($checkData) > 0){

            $respo['status'] = false;
            $respo['msg'] = "You are already submit this form";
            echo json_encode($respo);
            die();

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

}else{

    $respo['status'] = false;
    $respo['msg'] = "Access Denied";
    echo json_encode($respo);
    die();
}


?>