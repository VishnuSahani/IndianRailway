<?php

if (isset($_POST['common_action'])) {

    include("../include/db_config.php");
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

    if ($action == "getEmployeeDataById") {
        if (!isset($_POST['empId']) || empty(trim($_POST['empId']))) {

            sendResponse(false,"Employee id are not set.");         

        }

        $empId = trim($_POST['empId']);

        $query = mysqli_query($con, "SELECT * FROM emp_info_rail WHERE empid='$empId'");
        if (mysqli_num_rows($query) <= 0) {           
            sendResponse(false,"Invalid Employee id");     
        }

        $empData = mysqli_fetch_array($query);
        sendResponse(true,"Employee data found",$empData);

    } 
    elseif ($action == "getComponentData"){
        if(!isset($_POST['stationId']) || !isset($_POST['sectionId'])){        
           
            sendResponse(false,"All request are not set");
       }

       $sectionId = trim($_POST['sectionId']);
       $stationId = trim($_POST['stationId']);

       $getQueryComponent = mysqli_query($con,"SELECT * FROM station_component_info WHERE section_id='$sectionId' && station_id='$stationId'");

       if(mysqli_num_rows($getQueryComponent) <= 0){

            sendResponse(true,"Component list is empty.");
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

     
       sendResponse(true,"Component list found.",$data);

    }
    elseif ($action == "setSessionForFormDetails"){
        if(!isset($_POST['empid']) || !isset($_POST['from'])){        
           
            sendResponse(false,"Something went wrong");
       }

       $empid = trim($_POST['empid']);
       $from = trim($_POST['from']);
        
       session_start();

       $query = mysqli_query($con, "SELECT * FROM emp_info_rail WHERE empid='$empid'");
       if (mysqli_num_rows($query) <= 0) {           
           sendResponse(false,"Invalid Employee id");     
       }

       $run = mysqli_fetch_array($query);

       $_SESSION['section_id_tmp']= $run['section_id'];
       $_SESSION['section_name_tmp']= $run['section_name'];
       $_SESSION['station_id_tmp']= $run['station_id'];
       $_SESSION['station_name_tmp']= $run['station_name'];
       $_SESSION['emp_name_tmp']= $run['empname'];

       if($from == 'JE' && isset($_SESSION['userretailerje'])){
        $_SESSION['empid_for_form']= $empid;
        $_SESSION['from']= 'JE';
        $_SESSION['redirectPage']= '../je-rail/emp-info.php';

       }elseif($from == 'Admin' && isset($_SESSION['userretailer'])){
        $_SESSION['empid_for_form']= $empid;
        $_SESSION['from']= 'Admin';
        $_SESSION['redirectPage']= '../je-rail/emp-info.php';

       }else{
            sendResponse(false,"Wrong Access");
            die();

       }

       sendResponse(true,"Data set.");


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