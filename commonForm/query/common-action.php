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

        session_start();

        $viewType = $_SESSION['viewType'];

        if($viewType == "Employee"){
            $q = "SELECT * FROM emp_info_rail WHERE empid='$empId'";

       }elseif($viewType == "JE"){

        $data = [];
        $data['section_id'] = $_SESSION['section_id_tmp'];
        $data['section_name'] = $_SESSION['section_name_tmp'];
        $data['station_id'] = $_SESSION['station_id_tmp'];
        $data['station_name'] = $_SESSION['station_name_tmp'];
        $data['empname'] = $_SESSION['emp_name_tmp'];
        $data['empid'] = $_SESSION['empid_for_form'];
        sendResponse(true,"JE data found",$data);
    
       }else{
            sendResponse(false,"Invalid View Type");     
       }

        $query = mysqli_query($con, $q);

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
           
            sendResponse(false,"Something went wrong, Id not set");
       }

       $empid = trim($_POST['empid']);
       $from = trim($_POST['from']);
       $viewType = trim($_POST['viewType']);
       
        
       session_start();

       $q="";

       if($viewType == "Employee"){
            $q = "SELECT * FROM emp_info_rail WHERE empid='$empid'";

       }elseif($viewType == "JE"){
            $q = "SELECT * FROM je_info_rail WHERE empid='$empid'";

       }else{
            sendResponse(false,"Invalid View Type");     
       }

       $query = mysqli_query($con,$q);
       if (mysqli_num_rows($query) <= 0) {           
           sendResponse(false,"Invalid Employee id");     
       }

       $run = mysqli_fetch_array($query);

       $_SESSION['section_id_tmp']= $run['section_id'];
       $_SESSION['section_name_tmp']= $run['section_name'];
       $_SESSION['station_id_tmp']= $run['station_id'];
       $_SESSION['station_name_tmp']= $run['station_name'];
       $_SESSION['emp_name_tmp']= $run['empname'];
       $_SESSION['viewType']= $viewType;

       if($from == 'JE' && isset($_SESSION['userretailerje'])){

        $_SESSION['empid_for_form']= $empid;
        $_SESSION['from']= 'JE';
        $_SESSION['redirectPage']= '../je-rail/';

       }elseif($from == 'Admin' && isset($_SESSION['userretailer'])){
        $_SESSION['empid_for_form']= $empid;
        $_SESSION['from']= 'Admin';
        $_SESSION['redirectPage']= '../admin-rail/';

       }elseif($from == 'Employee' && isset($_SESSION['userretaileremp'])){
        $_SESSION['empid_for_form']= $empid;
        $_SESSION['from']= 'Employee';
        $_SESSION['redirectPage']= '../emp-rail/';

       }else{
            sendResponse(false,"Wrong Access");
            die();

       }

       sendResponse(true,"Data set.");


    }elseif ($action == "setSessionForFormDetails_JE"){
        session_start();
        if(!isset($_POST['from']) || !isset($_POST['viewType']) || !isset($_POST['sectionId']) || !isset($_POST['stationId']) || !isset($_POST['sectionName']) || !isset($_POST['stationName'])){  
           
            sendResponse(false,"Something went wrong, Id not set");
       }

       if(empty($_POST['from']) || empty($_POST['viewType']) || empty($_POST['sectionId']) || empty($_POST['stationId']) || empty($_POST['sectionName']) || empty($_POST['stationName'])){  
           
            sendResponse(false,"Something went wrong, empty set");
        }
        $from = trim($_POST['from']);
        $empid = "";


        if($from == "JE" && isset($_SESSION['userretailerje']) ){
            $empid = trim($_SESSION['userretailerje']);

        }elseif($from == "Admin" && isset($_SESSION['userretailer']) ){
            $empid = trim($_POST['empId']);
        }else{
            sendResponse(false,"Something went wrong with session ID");
        }

        if($empid == "" || $empid == null){
            sendResponse(false,"Something went wrong with emp/JE Id");
        }


       $viewType = trim($_POST['viewType']);
       
       $sectionId = trim($_POST['sectionId']);
       $stationId = trim($_POST['stationId']);
       $sectionName = trim($_POST['sectionName']);
       $stationName = trim($_POST['stationName']);
        


       $_SESSION['section_id_tmp']= $sectionId;
       $_SESSION['section_name_tmp']=  $sectionName;
       $_SESSION['station_id_tmp']= $stationId;
       $_SESSION['station_name_tmp']= $stationName;
       $_SESSION['viewType']= $viewType;
       $_SESSION['empid_for_form']= $empid;

       $query = mysqli_query($con,"SELECT * FROM je_info_rail WHERE empid='$empid'");
       if (mysqli_num_rows($query) <= 0) {           
           sendResponse(false,"Invalid JE id");     
       }
       $run = mysqli_fetch_array($query);
       $_SESSION['emp_name_tmp']= $run['empname'];

    //    print_r($_SESSION);
    //    die();

       if($from == 'JE' && isset($_SESSION['userretailerje'])){

        $_SESSION['from']= 'JE';
        $_SESSION['redirectPage']= '../je-rail/';

       }elseif($from == 'Admin' && isset($_SESSION['userretailer'])){
        $_SESSION['empid_for_form']= $empid;
        $_SESSION['from']= 'Admin';
        $_SESSION['redirectPage']= '../admin-rail/';

       }elseif($from == 'Employee' && isset($_SESSION['userretaileremp'])){
        $_SESSION['empid_for_form']= $empid;
        $_SESSION['from']= 'Employee';
        $_SESSION['redirectPage']= '../emp-rail/';

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