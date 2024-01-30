<?php

if(isset($_POST['JE_action'])){

    include("../include/db_config.php");
    date_default_timezone_set('Asia/Kolkata');


    $action = trim($_POST['JE_action']);
    $respo = [];

    function sendResponse($status,$msg,$data = []){
        $respo['status'] = $status;
        $respo['msg'] = $msg;
        $respo['data'] = $data;
        echo json_encode($respo);
        die();
    }


    if($action == "getEmpByStation"){

        if(!isset($_POST['stationData'])){
            sendResponse(false,"Station data not set, try again");
        }

        $stationData = $_POST['stationData'];

         if(count($stationData) <= 0){
            sendResponse(false,"Station data is empty, try again");
        }

        $q =  "SELECT * FROM emp_info_rail WHERE station_id IN ('". implode("','", $stationData). "')";
       
        $getQuerySection = mysqli_query($con,$q);
        if(mysqli_num_rows($getQuerySection) <= 0){
            sendResponse(true,"Empoyee list is empty.");
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

            $empId_form = $sectionRun['empid'];
            $section_id = $sectionRun['section_id'];
            $station_id = $sectionRun['station_id'];

            // $obj->rme_date = $sectionRun['rme_date'];
            $a = '<a type="button" class="btn btn-sm btn-success" href="pme-rme-add.php?id='.$sectionRun['id'].'">Edit</a>';
            $obj->href = $a;
             $obj->formView1  = '<a  href="view-form-details.php?empid='.$sectionRun['empid'].'" type="button" class="btn btn-sm btn-warning">Form</a>';
             $obj->formView2  = '<a  href="../commonForm/view-form.php?empid='.$sectionRun['empid'].'&from=JE" type="button" class="btn btn-sm btn-warning">Form</a>';
             $obj->formView  = '<a onclick=showCommonform("'.$empId_form.'","ASTE") type="button" class="btn btn-sm btn-warning">Form</a>';

            $data[] = $obj;

        }

        sendResponse(true,"Employee list found",$data);


    }elseif($action == "getJEByStation"){

        if(!isset($_POST['stationData'])){
            sendResponse(false,"Station data not set, try again");
        }

        $stationData = $_POST['stationData'];

         if(count($stationData) <= 0){
            sendResponse(false,"Station data is empty, try again");
        }

        $q =  "SELECT * FROM assign_info_rail WHERE station_id IN ('". implode("','", $stationData). "')";
       
        $getQuerySection = mysqli_query($con,$q);
        if(mysqli_num_rows($getQuerySection) <= 0){
            sendResponse(true,"Empoyee list is empty.");
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

            $empId_form = $sectionRun['empid'];
            $section_id = $sectionRun['section_id'];
            $section_name = $sectionRun['section_name'];
            $station_id = $sectionRun['station_id'];
            $station_name = $sectionRun['station_name'];

            // $obj->rme_date = $sectionRun['rme_date'];
            $a = '<a type="button" class="btn btn-sm btn-success" href="pme-rme-add.php?id='.$sectionRun['id'].'">Edit</a>';
            $obj->href = $a;
             $obj->formView1  = '<a  href="view-form-details.php?empid='.$sectionRun['empid'].'" type="button" class="btn btn-sm btn-warning">Form</a>';
             $obj->formView2  = '<a  href="../commonForm/view-form.php?empid='.$sectionRun['empid'].'&from=JE" type="button" class="btn btn-sm btn-warning">Form</a>';
             $obj->formView  = '<a onclick=showCommonform("'.$empId_form.'","ASTE","'.$section_id.'","'.$section_name.'","'.$station_id.'","'.$station_name.'") type="button" class="btn btn-sm btn-warning">Form</a>';

            $data[] = $obj;

        }

        sendResponse(true,"Employee list found",$data);


    }elseif($action == "getSSCByStation"){

        if(!isset($_POST['stationData'])){
            sendResponse(false,"Station data not set, try again");
        }

        $stationData = $_POST['stationData'];

         if(count($stationData) <= 0){
            sendResponse(false,"Station data is empty, try again");
        }

        $q =  "SELECT * FROM assign_incharge_sse_rail WHERE station_id IN ('". implode("','", $stationData). "')";
       
        $getQuerySection = mysqli_query($con,$q);
        if(mysqli_num_rows($getQuerySection) <= 0){
            sendResponse(true,"Empoyee list is empty.");
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

            $empId_form = $sectionRun['empid'];

            $section_id = $sectionRun['section_id'];
            $section_name = $sectionRun['section_name'];
            $station_id = $sectionRun['station_id'];
            $station_name = $sectionRun['station_name'];

            // $obj->rme_date = $sectionRun['rme_date'];
            $a = '<a type="button" class="btn btn-sm btn-success" href="pme-rme-add.php?id='.$sectionRun['id'].'">Edit</a>';
            $obj->href = $a;
             $obj->formView1  = '<a  href="view-form-details.php?empid='.$sectionRun['empid'].'" type="button" class="btn btn-sm btn-warning">Form</a>';
             $obj->formView2  = '<a  href="../commonForm/view-form.php?empid='.$sectionRun['empid'].'&from=JE" type="button" class="btn btn-sm btn-warning">Form</a>';
             $obj->formView  = '<a onclick=showCommonform("'.$empId_form.'","ASTE","'.$section_id.'","'.$section_name.'","'.$station_id.'","'.$station_name.'") type="button" class="btn btn-sm btn-warning">Form</a>';

            $data[] = $obj;

        }

        sendResponse(true,"Employee list found",$data);


    }elseif($action == "getSectionStation"){
        if(!isset($_POST['jeId'])){
            sendResponse(false,"JE ID not set, try again");
        }

        $jeId = $_POST['jeId'];

        if(empty($jeId)){
            sendResponse(false,"JE Id is empty, try again");
        }

        $q = "SELECT * FROM assign_aste_rail WHERE empid='$jeId'";
        $getQuery = mysqli_query($con,$q);
        if(mysqli_num_rows($getQuery) <= 0){
            sendResponse(true,"No station assign for you");
        }

        $data = [];
        $num =0 ;
        
        while($sectionRun = mysqli_fetch_array($getQuery)){
            $num++;
            $obj = new stdClass();
            $obj->id = $num;
            $obj->section_name = $sectionRun['section_name'];
            $obj->section_id = $sectionRun['section_id'];
            $obj->station_name = $sectionRun['station_name'];
            $obj->station_id = $sectionRun['station_id'];
            $data[] = $obj;

        }

        sendResponse(true,"Station list found",$data);

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
    elseif($action == "stationComponentUpdate"){

        if(!isset($_POST['stationComponent']) || !isset($_POST['subComponent']) || !isset($_POST['id']) ){
            $respo['status'] = false;
            $respo['msg'] = "Something went wrong with request ";
            echo json_encode($respo);
            die();

        }

        $id = trim($_POST['id']);
        $stationComponent = trim($_POST['stationComponent']);
        $subComponent = trim($_POST['subComponent']);

        $checkQuery = mysqli_query($con,"SELECT id FROM station_component_info WHERE id='$id'");

       if(mysqli_num_rows($checkQuery) <= 0){        
            $respo['status'] = false;
            $respo['msg'] = "Invalid Id provided";
            echo json_encode($respo);
            die();

       }

       $updateQuery = mysqli_query($con,"UPDATE station_component_info SET station_component='$stationComponent', sub_component='$subComponent' WHERE id = '$id'");

       if($updateQuery){

        $respo['status'] = true;
        $respo['msg'] = "Station component data Updated successfully.";
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
    elseif($action == "getSingleComponetData"){
        if(!isset($_POST['componentId']) || empty($_POST['componentId'])){
            $respo['status'] = false;
            $respo['msg'] = "Invalid Request";
            echo json_encode($respo);
            die();
        }

        $componentId = $_POST['componentId'];

        $getSingleQueryComponent = mysqli_query($con,"SELECT * FROM station_component_info WHERE id='$componentId'");
        if(mysqli_num_rows($getSingleQueryComponent) <= 0){
            $respo['status'] = false;
            $respo['msg'] = "Invalid Id provided.";
            $respo['data'] = [];
            echo json_encode($respo);
            die();
        }

        
       $data = [];
       while($sectionRun = mysqli_fetch_array($getSingleQueryComponent)){

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
    else{

        sendResponse(false,"Invalid Action");
    }

}else{

    $respo['status'] = false;
    $respo['msg'] = "Access Denied, Action not set";
    $respo['data'] = [];
    echo json_encode($respo);
    die();

}


?>