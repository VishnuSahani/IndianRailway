<?php

if (isset($_POST['common_action'])) {

    include ("../include/db_config.php");
    date_default_timezone_set('Asia/Kolkata');


    $action = trim($_POST['common_action']);
    $respo = [];

    function sendResponse($status, $msg, $data = [])
    {
        $respo['status'] = $status;
        $respo['msg'] = $msg;
        $respo['data'] = $data;
        echo json_encode($respo);
        die();
    }

    function getEmpIdBySectionStationIdFromTable($conn,$section_id,$station_id,$tableName){

        $getid = mysqli_query($conn,"SELECT empid FROM $tableName WHERE section_id='$section_id' && station_id ='$station_id'");
        if(mysqli_num_rows($getid) > 0){
            $run = mysqli_fetch_array($getid);
           return $run['empid'];
        }

        return "";

    }

    if ($action == "getEmployeeDataById") {
        if (!isset($_POST['empId']) || empty(trim($_POST['empId']))) {

            sendResponse(false, "Employee id are not set.");

        }

        $empId = trim($_POST['empId']);

        session_start();

        $viewType = $_SESSION['viewType'];

        if ($viewType == "Employee") {
            $q = "SELECT * FROM emp_info_rail WHERE empid='$empId'";

        } elseif ($viewType == "JE" || $viewType == "SSE" || $viewType == "ASTE" || $viewType == "DSTE" || $viewType == 'Admin') {

            $data = [];
            $data['section_id'] = $_SESSION['section_id_tmp'];
            $data['section_name'] = $_SESSION['section_name_tmp'];
            $data['station_id'] = $_SESSION['station_id_tmp'];
            $data['station_name'] = $_SESSION['station_name_tmp'];
            $data['empname'] = $_SESSION['emp_name_tmp'];
            $data['empid'] = $_SESSION['empid_for_form'];
            sendResponse(true, $viewType . " data found", $data);

        } else {
            sendResponse(false, "Invalid View Type");
        }

        $query = mysqli_query($con, $q);

        if (mysqli_num_rows($query) <= 0) {
            sendResponse(false, "Invalid Employee id");
        }

        $empData = mysqli_fetch_array($query);
        sendResponse(true, "Employee data found", $empData);

    } elseif ($action == "getComponentData") {
        if (!isset($_POST['stationId']) || !isset($_POST['sectionId'])) {

            sendResponse(false, "All request are not set");
        }

        $sectionId = trim($_POST['sectionId']);
        $stationId = trim($_POST['stationId']);

        $getQueryComponent = mysqli_query($con, "SELECT * FROM station_component_info WHERE section_id='$sectionId' && station_id='$stationId'");

        if (mysqli_num_rows($getQueryComponent) <= 0) {

            sendResponse(true, "Component list is empty.");
        }

        $data = [];
        while ($sectionRun = mysqli_fetch_array($getQueryComponent)) {

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


        sendResponse(true, "Component list found.", $data);

    } elseif ($action == "setSessionForFormDetails") {
        if (!isset($_POST['empid']) || !isset($_POST['from'])) {

            sendResponse(false, "Something went wrong, Id not set");
        }

        $empid = trim($_POST['empid']);
        $from = trim($_POST['from']);
        $viewType = trim($_POST['viewType']);


        session_start();

        $q = "";

        if ($viewType == "Employee") {
            $q = "SELECT * FROM emp_info_rail WHERE empid='$empid'";

        } else {
            sendResponse(false, "Invalid View Type");
        }

        $query = mysqli_query($con, $q);
        if (mysqli_num_rows($query) <= 0) {
            sendResponse(false, "Invalid Employee id");
        }

        $run = mysqli_fetch_array($query);

        $_SESSION['section_id_tmp'] = $run['section_id'];
        $_SESSION['section_name_tmp'] = $run['section_name'];
        $_SESSION['station_id_tmp'] = $run['station_id'];
        $_SESSION['station_name_tmp'] = $run['station_name'];
        $_SESSION['emp_name_tmp'] = $run['empname'];
        $_SESSION['viewType'] = $viewType;

        if ($from == 'JE' && isset($_SESSION['userretailerje'])) {

            $_SESSION['empid_for_form'] = $empid;
            $_SESSION['from'] = 'JE';
            $_SESSION['redirectPage'] = '../je-rail/';

        } elseif ($from == 'Admin' && isset($_SESSION['userretailer'])) {
            $_SESSION['empid_for_form'] = $empid;
            $_SESSION['from'] = 'Admin';
            $_SESSION['redirectPage'] = '../admin-rail/';

        } elseif ($from == 'Employee' && isset($_SESSION['userretaileremp'])) {
            $_SESSION['empid_for_form'] = $empid;
            $_SESSION['from'] = 'Employee';
            $_SESSION['redirectPage'] = '../emp-rail/';

        } elseif ($from == 'SSE' && isset($_SESSION['userretailersse'])) {
            $_SESSION['empid_for_form'] = $empid;
            $_SESSION['from'] = 'SSE';
            $_SESSION['redirectPage'] = '../incharge-sse/';

        } elseif ($from == 'ASTE' && isset($_SESSION['userretaileraste'])) {
            $_SESSION['empid_for_form'] = $empid;
            $_SESSION['from'] = 'ASTE';
            $_SESSION['redirectPage'] = '../aste-rail/';

        } elseif ($from == 'DSTE' && isset($_SESSION['userretailerdste'])) {
            $_SESSION['empid_for_form'] = $empid;
            $_SESSION['from'] = 'DSTE';
            $_SESSION['redirectPage'] = '../dste-rail/';

        } else {
            sendResponse(false, "Wrong Access");
            die();

        }

        sendResponse(true, "Data set.");


    } elseif ($action == "setSessionForFormDetails_JE") {
        session_start();
        if (!isset($_POST['from']) || !isset($_POST['viewType']) || !isset($_POST['sectionId']) || !isset($_POST['stationId']) || !isset($_POST['sectionName']) || !isset($_POST['stationName'])) {

            sendResponse(false, "Something went wrong, Id not set");
        }

        if (empty($_POST['from']) || empty($_POST['viewType']) || empty($_POST['sectionId']) || empty($_POST['stationId']) || empty($_POST['sectionName']) || empty($_POST['stationName'])) {

            sendResponse(false, "Something went wrong, empty set");
        }
        $from = trim($_POST['from']);
        $empid = "";


        if ($from == "JE" && isset($_SESSION['userretailerje'])) {
            $empid = trim($_SESSION['userretailerje']);

        } elseif ($from == "Admin" && isset($_SESSION['userretailer'])) {
            $empid = trim($_POST['empId']);
        } elseif ($from == "SSE" && isset($_SESSION['userretailersse'])) {
            $empid = trim($_POST['empId']);
        } elseif ($from == "ASTE" && isset($_SESSION['userretaileraste'])) {
            $empid = trim($_POST['empId']);
        } elseif ($from == "DSTE" && isset($_SESSION['userretailerdste'])) {
            $empid = trim($_POST['empId']);
        } else {
            sendResponse(false, "Something went wrong with session ID");
        }

        if ($empid == "" || $empid == null) {
            sendResponse(false, "Something went wrong with emp/JE Id");
        }


        $viewType = trim($_POST['viewType']);

        $sectionId = trim($_POST['sectionId']);
        $stationId = trim($_POST['stationId']);
        $sectionName = trim($_POST['sectionName']);
        $stationName = trim($_POST['stationName']);



        $_SESSION['section_id_tmp'] = $sectionId;
        $_SESSION['section_name_tmp'] = $sectionName;
        $_SESSION['station_id_tmp'] = $stationId;
        $_SESSION['station_name_tmp'] = $stationName;
        $_SESSION['viewType'] = $viewType;
        $_SESSION['empid_for_form'] = $empid;

        $query = mysqli_query($con, "SELECT * FROM je_info_rail WHERE empid='$empid'");
        if (mysqli_num_rows($query) <= 0) {
            sendResponse(false, "Invalid JE id");
        }
        $run = mysqli_fetch_array($query);
        $_SESSION['emp_name_tmp'] = $run['empname'];

        //    print_r($_SESSION);
        //    die();

        if ($from == 'JE' && isset($_SESSION['userretailerje'])) {

            $_SESSION['from'] = 'JE';
            $_SESSION['redirectPage'] = '../je-rail/';

        } elseif ($from == 'Admin' && isset($_SESSION['userretailer'])) {
            $_SESSION['empid_for_form'] = $empid;
            $_SESSION['from'] = 'Admin';
            $_SESSION['redirectPage'] = '../admin-rail/';

        } elseif ($from == 'Employee' && isset($_SESSION['userretaileremp'])) {
            $_SESSION['empid_for_form'] = $empid;
            $_SESSION['from'] = 'Employee';
            $_SESSION['redirectPage'] = '../emp-rail/';

        } elseif ($from == 'SSE' && isset($_SESSION['userretailersse'])) {
            $_SESSION['empid_for_form'] = $empid;
            $_SESSION['from'] = 'SSE';
            $_SESSION['redirectPage'] = '../incharge-sse/';

        } elseif ($from == 'DSTE' && isset($_SESSION['userretailerdste'])) {
            $_SESSION['empid_for_form'] = $empid;
            $_SESSION['from'] = 'DSTE';
            $_SESSION['redirectPage'] = '../dste-rail/';

        } else {
            sendResponse(false, "Wrong Access");
            die();

        }

        sendResponse(true, "Data set.");


    } elseif ($action == "setSessionForFormDetails_SSE") {
        session_start();
        if (!isset($_POST['from']) || !isset($_POST['viewType']) || !isset($_POST['sectionId']) || !isset($_POST['stationId']) || !isset($_POST['sectionName']) || !isset($_POST['stationName'])) {

            sendResponse(false, "Something went wrong, Id not set");
        }

        if (empty($_POST['from']) || empty($_POST['viewType']) || empty($_POST['sectionId']) || empty($_POST['stationId']) || empty($_POST['sectionName']) || empty($_POST['stationName'])) {

            sendResponse(false, "Something went wrong, empty set");
        }
        $from = trim($_POST['from']);
        $empid = "";

        if ($from == "Admin" && isset($_SESSION['userretailer'])) {
            $empid = trim($_POST['empId']);
        } elseif ($from == "SSE" && isset($_SESSION['userretailersse'])) {
            $empid = trim($_SESSION['userretailersse']);
        } elseif ($from == "DSTE" && isset($_SESSION['userretailerdste'])) {
            $empid = trim($_POST['empId']);
        } else {
            sendResponse(false, "Something went wrong with session ID");
        }

        if ($empid == "" || $empid == null) {
            sendResponse(false, "Something went wrong with SSE Id");
        }


        $viewType = trim($_POST['viewType']);

        $sectionId = trim($_POST['sectionId']);
        $stationId = trim($_POST['stationId']);
        $sectionName = trim($_POST['sectionName']);
        $stationName = trim($_POST['stationName']);



        $_SESSION['section_id_tmp'] = $sectionId;
        $_SESSION['section_name_tmp'] = $sectionName;
        $_SESSION['station_id_tmp'] = $stationId;
        $_SESSION['station_name_tmp'] = $stationName;
        $_SESSION['viewType'] = $viewType;
        $_SESSION['empid_for_form'] = $empid;

        $query = mysqli_query($con, "SELECT * FROM sse_info_rail WHERE empid='$empid'");
        if (mysqli_num_rows($query) <= 0) {
            sendResponse(false, "Invalid JE id");
        }
        $run = mysqli_fetch_array($query);
        $_SESSION['emp_name_tmp'] = $run['empname'];

        //    print_r($_SESSION);
        //    die();

        if ($from == 'Admin' && isset($_SESSION['userretailer'])) {
            $_SESSION['empid_for_form'] = $empid;
            $_SESSION['from'] = 'Admin';
            $_SESSION['redirectPage'] = '../admin-rail/';

        } elseif ($from == 'SSE' && isset($_SESSION['userretailersse'])) {
            $_SESSION['empid_for_form'] = $empid;
            $_SESSION['from'] = 'SSE';
            $_SESSION['redirectPage'] = '../incharge-sse/';

        } elseif ($from == 'DSTE' && isset($_SESSION['userretailerdste'])) {
            $_SESSION['empid_for_form'] = $empid;
            $_SESSION['from'] = 'DSTE';
            $_SESSION['redirectPage'] = '../dste-rail/';

        } else {
            sendResponse(false, "Wrong Access");
            die();

        }

        sendResponse(true, "Data set.");


    } elseif ($action == "setSessionForFormDetails_ASTE") {
        session_start();
        if (!isset($_POST['from']) || !isset($_POST['viewType']) || !isset($_POST['sectionId']) || !isset($_POST['stationId']) || !isset($_POST['sectionName']) || !isset($_POST['stationName'])) {

            sendResponse(false, "Something went wrong, Id not set");
        }

        if (empty($_POST['from']) || empty($_POST['viewType']) || empty($_POST['sectionId']) || empty($_POST['stationId']) || empty($_POST['sectionName']) || empty($_POST['stationName'])) {

            sendResponse(false, "Something went wrong, empty set");
        }
        $from = trim($_POST['from']);
        $empid = "";

        if ($from == "Admin" && isset($_SESSION['userretailer'])) {
            $empid = trim($_POST['empId']);
        } elseif ($from == "ASTE" && isset($_SESSION['userretaileraste'])) {
            $empid = trim($_SESSION['userretaileraste']);
        } elseif ($from == "DSTE" && isset($_SESSION['userretailerdste'])) {
            $empid = trim($_POST['empId']);
        } else {
            sendResponse(false, "Something went wrong with session ID");
        }

        if ($empid == "" || $empid == null) {
            sendResponse(false, "Something went wrong with aste Id");
        }


        $viewType = trim($_POST['viewType']);

        $sectionId = trim($_POST['sectionId']);
        $stationId = trim($_POST['stationId']);
        $sectionName = trim($_POST['sectionName']);
        $stationName = trim($_POST['stationName']);



        $_SESSION['section_id_tmp'] = $sectionId;
        $_SESSION['section_name_tmp'] = $sectionName;
        $_SESSION['station_id_tmp'] = $stationId;
        $_SESSION['station_name_tmp'] = $stationName;
        $_SESSION['viewType'] = $viewType;
        $_SESSION['empid_for_form'] = $empid;

        $query = mysqli_query($con, "SELECT * FROM aste_info_rail WHERE empid='$empid'");
        if (mysqli_num_rows($query) <= 0) {
            sendResponse(false, "Invalid ASTE id");
        }
        $run = mysqli_fetch_array($query);
        $_SESSION['emp_name_tmp'] = $run['empname'];

        //    print_r($_SESSION);
        //    die();

        if ($from == 'Admin' && isset($_SESSION['userretailer'])) {
            $_SESSION['empid_for_form'] = $empid;
            $_SESSION['from'] = 'Admin';
            $_SESSION['redirectPage'] = '../admin-rail/';

        } elseif ($from == 'ASTE' && isset($_SESSION['userretaileraste'])) {
            $_SESSION['empid_for_form'] = $empid;
            $_SESSION['from'] = 'ASTE';
            $_SESSION['redirectPage'] = '../aste-rail/';

        } elseif ($from == 'DSTE' && isset($_SESSION['userretailerdste'])) {
            $_SESSION['empid_for_form'] = $empid;
            $_SESSION['from'] = 'DSTE';
            $_SESSION['redirectPage'] = '../dste-rail/';

        } else {
            sendResponse(false, "Wrong Access");
            die();

        }

        sendResponse(true, "Data set.");


    } elseif ($action == "setSessionForFormDetails_Common") {
        session_start();
        if (!isset($_POST['from']) || !isset($_POST['viewType']) || !isset($_POST['sectionId']) || !isset($_POST['stationId']) || !isset($_POST['sectionName']) || !isset($_POST['stationName'])) {

            sendResponse(false, "Something went wrong, Id not set");
        }

        if (empty($_POST['from']) || empty($_POST['viewType']) || empty($_POST['sectionId']) || empty($_POST['stationId']) || empty($_POST['sectionName']) || empty($_POST['stationName'])) {

            sendResponse(false, "Something went wrong, empty set");
        }
        $from = trim($_POST['from']);
        $empid = "";

        $empid = trim($_POST['empId']);

        if ($empid == "" || $empid == null) {
            sendResponse(false, "Something went wrong with emp/JE Id");
        }


        $viewType = trim($_POST['viewType']);

        $sectionId = trim($_POST['sectionId']);
        $stationId = trim($_POST['stationId']);
        $sectionName = trim($_POST['sectionName']);
        $stationName = trim($_POST['stationName']);



        $_SESSION['section_id_tmp'] = $sectionId;
        $_SESSION['section_name_tmp'] = $sectionName;
        $_SESSION['station_id_tmp'] = $stationId;
        $_SESSION['station_name_tmp'] = $stationName;
        $_SESSION['viewType'] = $viewType;
        $_SESSION['empid_for_form'] = $empid;

        $query = "";
        if ($viewType == "JE") {
            $query = mysqli_query($con, "SELECT * FROM je_info_rail WHERE empid='$empid'");

        } elseif ($viewType == "SSE") {
            $query = mysqli_query($con, "SELECT * FROM sse_info_rail WHERE empid='$empid'");

        } elseif ($viewType == "ASTE") {
            $query = mysqli_query($con, "SELECT * FROM aste_info_rail WHERE empid='$empid'");

        } elseif ($viewType == "DSTE") {
            $query = mysqli_query($con, "SELECT * FROM dste_info_rail WHERE empid='$empid'");

        } elseif ($viewType == "Admin") {
            $query = mysqli_query($con, "SELECT * FROM ibn_signup_retailer WHERE ibn_id='$empid'");

        } else {
            sendResponse(false, "Invalid viewType");
        }



        if (mysqli_num_rows($query) <= 0) {
            sendResponse(false, "Invalid " . $viewType . " id");
        }
        $run = mysqli_fetch_array($query);

        if ($viewType == "Admin") {

            $_SESSION['emp_name_tmp'] = $run['first_name'];
        } else {

            $_SESSION['emp_name_tmp'] = $run['empname'];
        }


        if ($from == 'JE' && isset($_SESSION['userretailerje'])) {

            $_SESSION['from'] = 'JE';
            $_SESSION['redirectPage'] = '../je-rail/';

        } elseif ($from == 'Admin' && isset($_SESSION['userretailer'])) {
            $_SESSION['empid_for_form'] = $empid;
            $_SESSION['from'] = 'Admin';
            $_SESSION['redirectPage'] = '../admin-rail/';

        } elseif ($from == 'Employee' && isset($_SESSION['userretaileremp'])) {
            $_SESSION['empid_for_form'] = $empid;
            $_SESSION['from'] = 'Employee';
            $_SESSION['redirectPage'] = '../emp-rail/';

        } elseif ($from == 'SSE' && isset($_SESSION['userretailersse'])) {
            $_SESSION['empid_for_form'] = $empid;
            $_SESSION['from'] = 'SSE';
            $_SESSION['redirectPage'] = '../incharge-sse/';

        } elseif ($from == 'ASTE' && isset($_SESSION['userretaileraste'])) {
            $_SESSION['empid_for_form'] = $empid;
            $_SESSION['from'] = 'ASTE';
            $_SESSION['redirectPage'] = '../aste-rail/';

        } elseif ($from == 'DSTE' && isset($_SESSION['userretailerdste'])) {
            $_SESSION['empid_for_form'] = $empid;
            $_SESSION['from'] = 'DSTE';
            $_SESSION['redirectPage'] = '../dste-rail/';

        } else {
            sendResponse(false, "Wrong Access");
            die();

        }

        sendResponse(true, "Data set.");


    } elseif ($action == "getIPSBattery_FormFill") {

        if (!isset($_POST['empid']) || empty(trim($_POST['empid']))) {
            sendResponse(false, "Something went wrong, Id not set");
        }

        $empid = trim($_POST['empid']);
        $language = trim($_POST['language']);
        $compo = trim($_POST['compo']);

        $stationId = trim($_POST['stationId']);
        $sectionId = trim($_POST['sectionId']);

        if (empty($compo) || empty($language) || empty($stationId) || empty($sectionId)) {
            sendResponse(false, "Something went wrong, request is not proper");
        }

        $checkData = mysqli_query($con, "SELECT * FROM ips_battery_read WHERE emp_id='$empid' && section_id='$sectionId' && station_id = '$stationId' && component_name='$compo' && isComplete ='false'");

        if (mysqli_num_rows($checkData) > 0) {
            $run = mysqli_fetch_object($checkData);
            sendResponse(true, "Data found", $run);
        } else {
            sendResponse(false, "Fill new form");
        }

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
            case 'DAC4':
                $tableName = 'dac4_form';
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
            case 'IPS_Battery':
                $tableName = 'ips_battery_read';
                break;
            default:
                $respo['status'] = false;
                $respo['msg'] = "Invalid request!";
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






    } elseif ($action == "whoViewMyForm") {

        if (!isset($_POST['who']) || empty($_POST['who'])) {
            sendResponse(false, "Who are you!");
        }

        if (!isset($_POST['id']) || empty($_POST['id'])) {
            sendResponse(false, "Your id is missing");
        }
        if (!isset($_POST['formId']) || empty($_POST['formId'])) {
            sendResponse(false, "Your form id is missing");
        }

        $who = trim($_POST['who']);
        $formId = trim($_POST['formId']);

        //defalut dste,and admin id
        $dsteId='24129800587';
        $adminId='ya@sh#vee#r';
        $jeId = '';
        $sseId='';
        $asteId='';
        $id = '';

        session_start();
        $section_id = $_SESSION['section_id_tmp'] ;
        $station_id = $_SESSION['station_id_tmp'] ;

        $idArr = [];
        $idArr[] = $adminId;
        $idArr[] = $dsteId;

        if($who == "Employee"){
            $id = trim($_POST['id']);
            $jeId='';
            $sseId='';
            $asteId='';
            $idArr[] = $id; // push emp id in array

            //get je id
            $getId = getEmpIdBySectionStationIdFromTable($con,$section_id,$station_id,'assign_info_rail');
            if($getId){
                $idArr[] = $getId;
                $jeId = $getId;
            }

            //get SSE id
            $getId = getEmpIdBySectionStationIdFromTable($con,$section_id,$station_id,'assign_incharge_sse_rail');
            if($getId){
                $idArr[] = $getId;
                $sseId = $getId;
            }
            

            //get ASTE id
            $getId = getEmpIdBySectionStationIdFromTable($con,$section_id,$station_id,'assign_aste_rail');
            if($getId){
                $idArr[] = $getId;
                $asteId = $getId;
            }

        }elseif($who == "JE"){
            $jeId = trim($_POST['id']);
            $sseId='';
            $asteId='';
            $idArr[] = $jeId; // push emp id in array
            
            //get SSE id
            $getId = getEmpIdBySectionStationIdFromTable($con,$section_id,$station_id,'assign_incharge_sse_rail');
            if($getId){
                $idArr[] = $getId;
                $sseId = $getId;
            }

            //get ASTE id
            $getId = getEmpIdBySectionStationIdFromTable($con,$section_id,$station_id,'assign_aste_rail');
            if($getId){
                $idArr[] = $getId;
                $asteId = $getId;
            }
            
            
        }elseif($who == "SSE"){
            $sseId = trim($_POST['id']);
            $asteId='';
            $idArr[] = $sseId; // push id in array
            
            //get ASTE id
            $getId = getEmpIdBySectionStationIdFromTable($con,$section_id,$station_id,'assign_aste_rail');
            if($getId){
                $idArr[] = $getId;
                $asteId = $getId;
            }
            
            
        }elseif($who == "ASTE"){
            $asteId = trim($_POST['id']);
            $idArr[] = $asteId; // push id in array           
            
        }

        $respoData =[];
        foreach ($idArr as $key => $value) {
            $checkViewForm = mysqli_query($con,"SELECT * FROM whoviewform where empid='$value' && formId = '$formId'");

            $viewType = '';
            switch($value){
                case $jeId:
                    $viewType = 'JE';
                break;
                case $sseId:
                    $viewType = 'SSE';
                break;
                case $asteId:
                    $viewType = 'ASTE';
                break;
                case $dsteId:
                    $viewType = 'DSTE';
                break;
                case $adminId:
                    $viewType = 'Admin';
                break;
                case $id:
                    $viewType = 'Employee';
                break;

            }
            $obj = new stdClass();
            $obj->type = $viewType;

            if(mysqli_num_rows($checkViewForm) > 0){
                $obj->isView = true;                    
            }else{
                $obj->isView = false;
            }

            $respoData[] = $obj;
        }

        sendResponse(true, "View Data Found",$respoData);



    }elseif($action == "whoViewMyFormAdd"){

        if (!isset($_POST['formId']) || empty($_POST['formId'])) {
            sendResponse(false, "Form Id is missing!");
        }

        if (!isset($_POST['empid']) || empty($_POST['empid'])) {
            sendResponse(false, "employee id is missing");
        }

        $empid = trim($_POST['empid']);
        $formId = trim($_POST['formId']);

        $section_id = trim($_POST['section_id']);
        $station_id = trim($_POST['station_id']);
        $component_name = trim($_POST['component_name']);
        $form_empid = trim($_POST['form_empid']);
        $createdDateTime = date("Y-m-d h:i:s");
        
        $checkForm = mysqli_query($con,"SELECT * FROM whoviewform WHERE formId='$formId' && empid = '$empid' && component_name = '$component_name' && form_empid='$form_empid' && section_id='$section_id' && station_id='$station_id'");
        if(mysqli_num_rows($checkForm)>0){
            sendResponse(true, "Form already Viewed");
            die();
        }
        $q = "INSERT INTO whoviewform (formId, empid,section_id,station_id,component_name,form_empid,created_date) VALUES ('$formId','$empid','$section_id','$station_id','$component_name','$form_empid','$createdDateTime')";
        $updateView = mysqli_query($con,$q);
        if(!$updateView){
            mysqli_query($con,$q);
        }

        sendResponse(true, "Form successfully Viewed");

        
    } elseif ($action == "getSummerPrecuation_FormFill") {

        if (!isset($_POST['empid']) || empty(trim($_POST['empid']))) {
            sendResponse(false, "Something went wrong, Id not set");
        }

        $empid = trim($_POST['empid']);
        $language = trim($_POST['language']);
        $compo = trim($_POST['compo']);

        $stationId = trim($_POST['stationId']);
        $sectionId = trim($_POST['sectionId']);

        if (empty($compo) || empty($language) || empty($stationId) || empty($sectionId)) {
            sendResponse(false, "Something went wrong, request is not proper");
        }

        $checkData = mysqli_query($con, "SELECT * FROM summerprecaution_form WHERE emp_id='$empid' && section_id='$sectionId' && station_id = '$stationId' && component_name='$compo' && isComplete ='false'");

        if (mysqli_num_rows($checkData) > 0) {
            $run = mysqli_fetch_object($checkData);
            sendResponse(true, "Data found", $run);
        } else {
            sendResponse(false, "Fill new form");
        }

    }elseif ($action == "getMansoonPrecuation_FormFill") {

        if (!isset($_POST['empid']) || empty(trim($_POST['empid']))) {
            sendResponse(false, "Something went wrong, Id not set");
        }

        $empid = trim($_POST['empid']);
        $language = trim($_POST['language']);
        $compo = trim($_POST['compo']);

        $stationId = trim($_POST['stationId']);
        $sectionId = trim($_POST['sectionId']);

        if (empty($compo) || empty($language) || empty($stationId) || empty($sectionId)) {
            sendResponse(false, "Something went wrong, request is not proper");
        }

        $checkData = mysqli_query($con, "SELECT * FROM mansoonprecaution_form WHERE emp_id='$empid' && section_id='$sectionId' && station_id = '$stationId' && component_name='$compo' && isComplete ='false'");

        if (mysqli_num_rows($checkData) > 0) {
            $run = mysqli_fetch_object($checkData);
            sendResponse(true, "Data found", $run);
        } else {
            sendResponse(false, "Fill new form");
        }

    }
    else {

        sendResponse(false, "Invalid Action");
    }

} else {

    $respo['status'] = false;
    $respo['msg'] = "Access Denied, Action not set";
    $respo['data'] = [];
    echo json_encode($respo);
    die();

}


?>