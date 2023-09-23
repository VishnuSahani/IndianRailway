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

            // $obj->pme_date = $sectionRun['pme_date']==''?'No Record':$sectionRun['pme_date'];
            $obj->rme_date = $sectionRun['rme_date']==''?'No Record':$sectionRun['rme_date'];

            // for pme rme file getting

            $pme_date = $sectionRun['pme_date'];
            $rme_date = $sectionRun['rme_date'];

            $empId = $sectionRun['empid'];
            $section_id = $sectionRun['section_id'];
            $station_id = $sectionRun['station_id'];
            $getQueryFile = mysqli_query($con,"SELECT * FROM pmerme_info_rail WHERE empid='$empId' and pme_date='$pme_date' and rme_date='$rme_date' and section_id='$section_id' and station_id ='$station_id'");


            if(mysqli_num_rows($getQueryFile) <= 0){
                $obj->pme_date = $sectionRun['pme_date'];
                $obj->rme_date = $sectionRun['rme_date'];
                $obj->competency = "No Record";
                continue;
            }

            $sectionRunfile = mysqli_fetch_array($getQueryFile);


            if($sectionRun['pme_date'] == ''){
                $obj->pme_date = 'No Record';
            }else{        

                if($sectionRunfile['pme_file']==''){
                    $obj->pme_date = $sectionRun['pme_date'];

                }else{
                    $pme_file = $sectionRunfile['pme_file'];
                    $pme_date = $sectionRun['pme_date'];

                    $obj->pme_date = "<a role='button' href='./images/pmeRmeFile/".$pme_file."' target='_black' class='btn btn-sm btn-warning m-1'><i class='fa fa-file-pdf-o'></i></a> ($pme_date)";
                    
                }
            }

            if($sectionRun['rme_date'] == ''){
                $obj->rme_date = 'No Record';
            }else{        

                if($sectionRunfile['rme_file']==''){
                    $obj->rme_date = $sectionRun['rme_date'];

                }else{
                    $rme_file = $sectionRunfile['rme_file'];
                    $rme_date = $sectionRun['rme_date'];

                    $obj->rme_date = "<a role='button' href='./images/pmeRmeFile/".$rme_file."' target='_black' class='btn btn-sm btn-warning m-1'><i class='fa fa-file-pdf-o'></i>
                    </a> ($rme_date)";
                    
                }
            }

            if($sectionRunfile['competencyCertificate']==''){
                $obj->competency = "No Record";

            }else{
                $competency = $sectionRunfile['competencyCertificate'];

                $obj->competency = "<a role='button' href='./images/pmeRmeFile/".$competency."' target='_black' class='btn btn-sm btn-warning m-1'><i class='fa fa-file-pdf-o'></i>
                    </a>";

            }

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

    if($action == "getEmployeeAllData"){




        $getQuerySection = mysqli_query($con,"SELECT * FROM emp_info_rail");
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

            // $obj->pme_date = $sectionRun['pme_date']==''?'No Record':$sectionRun['pme_date'];
            $obj->rme_date = $sectionRun['rme_date']==''?'No Record':$sectionRun['rme_date'];

            // for pme rme file getting

            $pme_date = $sectionRun['pme_date'];
            $rme_date = $sectionRun['rme_date'];

            $empId = $sectionRun['empid'];
            $section_id = $sectionRun['section_id'];
            $station_id = $sectionRun['station_id'];
            $getQueryFile = mysqli_query($con,"SELECT * FROM pmerme_info_rail WHERE empid='$empId' and pme_date='$pme_date' and rme_date='$rme_date' and section_id='$section_id' and station_id ='$station_id'");


            if(mysqli_num_rows($getQueryFile) <= 0){
                $obj->pme_date = $sectionRun['pme_date'];
                $obj->rme_date = $sectionRun['rme_date'];
                $obj->competency = "No Record";
                continue;
            }

            $sectionRunfile = mysqli_fetch_array($getQueryFile);


            if($sectionRun['pme_date'] == ''){
                $obj->pme_date = 'No Record';
            }else{        

                if($sectionRunfile['pme_file']==''){
                    $obj->pme_date = $sectionRun['pme_date'];

                }else{
                    $pme_file = $sectionRunfile['pme_file'];
                    $pme_date = $sectionRun['pme_date'];

                    $obj->pme_date = "<a role='button' href='./images/pmeRmeFile/".$pme_file."' target='_black' class='btn btn-sm btn-warning m-1'><i class='fa fa-file-pdf-o'></i></a> ($pme_date)";
                    
                }
            }

            if($sectionRun['rme_date'] == ''){
                $obj->rme_date = 'No Record';
            }else{        

                if($sectionRunfile['rme_file']==''){
                    $obj->rme_date = $sectionRun['rme_date'];

                }else{
                    $rme_file = $sectionRunfile['rme_file'];
                    $rme_date = $sectionRun['rme_date'];

                    $obj->rme_date = "<a role='button' href='./images/pmeRmeFile/".$rme_file."' target='_black' class='btn btn-sm btn-warning m-1'><i class='fa fa-file-pdf-o'></i>
                    </a> ($rme_date)";
                    
                }
            }

            if($sectionRunfile['competencyCertificate']==''){
                $obj->competency = "No Record";

            }else{
                $competency = $sectionRunfile['competencyCertificate'];

                $obj->competency = "<a role='button' href='./images/pmeRmeFile/".$competency."' target='_black' class='btn btn-sm btn-warning m-1'><i class='fa fa-file-pdf-o'></i>
                    </a>";

            }

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

    if($action == "pmeRmeDocUpload"){

        if(isset($_FILES['files']) && isset($_POST['report_id']) && isset($_POST['subActionName'])){

            $report_id = trim($_POST['report_id']);
            $subActionName = trim($_POST['subActionName']);
            
            $img_name= str_replace(" ","",$_FILES['files']['name']);
            $img_type=$_FILES['files']['type'];
            $img_size=$_FILES['files']['size'];
            $img_tmp=$_FILES['files']['tmp_name'];

             $curentDate = date("Y-m-d h:i:s");

             $img_storeName = strtotime($curentDate)."_".$img_name;

             $updQ = "UPDATE pmerme_info_rail SET pme_file='$img_storeName' WHERE id = '$report_id'";

             if($subActionName == 'rmeFile'){
                $updQ = "UPDATE pmerme_info_rail SET rme_file='$img_storeName' WHERE id = '$report_id'";
             }elseif($subActionName == 'certificate'){
                $updQ = "UPDATE pmerme_info_rail SET competencyCertificate='$img_storeName' WHERE id = '$report_id'";

             }
             

            $updtQuery = mysqli_query($con,$updQ);

            if($updtQuery){

                move_uploaded_file($img_tmp,"../images/pmeRmeFile/".$img_storeName);
                $respo['status'] = true;
                $respo['msg'] = "File uploaded successfully";
                echo json_encode($respo);
                die();

            }else{
                $respo['status'] = false;
                $respo['msg'] = "Something went wrong try again";
                echo json_encode($respo);
                die();

            }





        }else{
            $respo['status'] = false;
            $respo['msg'] = "Something went wrong with request, try again";
            echo json_encode($respo);
            die();

        }

    }


    if($action == "deletePmeRmeFile"){
        if(!isset($_POST['pmeRmeId']) || empty($_POST['pmeRmeId']) || !isset($_POST['subAction']) ){
             $respo['status'] = false;
                $respo['msg'] = "Request error";
                echo json_encode($respo);
                die();
        }


        $pmeRmeId = $_POST['pmeRmeId'];
        $subAction = $_POST['subAction'];
        $delQuery = "SELECT pme_file,rme_file,competencyCertificate FROM pmerme_info_rail WHERE id = '$pmeRmeId'";
       

        $getImgName = mysqli_query($con,$delQuery);
        
        if(mysqli_num_rows($getImgName) <= 0){
            $respo['status'] = false;
            $respo['msg'] = "Invalid Id";
            echo json_encode($respo);
            die();
        }


        $delRun = mysqli_fetch_array($getImgName);

        $fileName = $delRun['pme_file'];

        $delUpdateQuery = "UPDATE pmerme_info_rail SET pme_file='' WHERE id = '$pmeRmeId'";


        if($subAction == 'rmeFile'){
            $fileName = $delRun['rme_file'];
            $delUpdateQuery = "UPDATE pmerme_info_rail SET rme_file='' WHERE id = '$pmeRmeId'";
        }elseif($subAction =="certificate"){
            $fileName = $delRun['competencyCertificate'];
            $delUpdateQuery = "UPDATE pmerme_info_rail SET competencyCertificate='' WHERE id = '$pmeRmeId'";
        }

        
        try{
            unlink("../images/pmeRmeFile/".$fileName);
        }
        catch(Exception $err){
             $respo['status'] = false;
            $respo['msg'] = $err;
            echo json_encode($respo);
            die();
        }


         $updtQueryRemove = mysqli_query($con,$delUpdateQuery);

            if($updtQueryRemove){

                $respo['status'] = true;
                $respo['msg'] = "File successfully removed";
                echo json_encode($respo);
                die();

            }else{
                $respo['status'] = false;
                $respo['msg'] = "Something went wrong try again";
                echo json_encode($respo);
                die();

            }


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
        $obj->pme_file = $sectionRun['pme_file'];
        $obj->rme_file = $sectionRun['rme_file'];
        // $obj->rme_date = $sectionRun['rme_date'];
        $iddd= $sectionRun['id'];
        
        

        if($sectionRun['pme_date'] == ''){
            $obj->pme_date = 'No Record';
            $obj->addPmeFileBtn = "<button type='button' class='btn btn-sm btn-info' disabled title='No PME Date added'>Add</button>";
        }else{
            $obj->pme_date = $sectionRun['pme_date'];

            if($sectionRun['pme_file']==''){

                $obj->addPmeFileBtn = "<button type='button' onclick=openDialog('".$iddd."','pmeFile') class='btn btn-sm btn-info'>Add</button>";

            }else{
    
                $obj->addPmeFileBtn = "<a role='button' href='./images/pmeRmeFile/".$obj->pme_file."' target='_black' class='btn btn-sm btn-success m-1'><i class='fa fa-file-pdf-o'></i></a> <button type='button' onclick=deleteFile('".$iddd."','pmeFile') class='btn btn-sm btn-danger m-1'>Delete</button>";
            }

        }

        if($sectionRun['rme_date']==''){
            $obj->rme_date = 'No Record';
            $obj->addRmeFileBtn = "<button type='button' class='btn btn-sm btn-info' disabled title='No Refresher Date added'>Add</button>";
        }else{
            $obj->rme_date = $sectionRun['rme_date'];

            if($sectionRun['rme_file']==''){

                $obj->addRmeFileBtn = "<button type='button' onclick=openDialog('".$iddd."','rmeFile') class='btn btn-sm btn-info'>Add</button>";
            }else{
    
                $obj->addRmeFileBtn = "<a role='button' href='./images/pmeRmeFile/".$obj->rme_file."' target='_black' class='btn btn-sm btn-success m-1'><i class='fa fa-file-pdf-o'></i></a> <button type='button' onclick=deleteFile('".$iddd."','rmeFile') class='btn btn-sm btn-danger m-1'>Delete</button>";
            }

        }

        if($sectionRun['competencyCertificate']==''){

            $obj->competency = "<button type='button' onclick=openDialog('".$iddd."','certificate') class='btn btn-sm btn-info'>Certificate</button>";
        }else{
            $obj->competency_file = $sectionRun['competencyCertificate'];

            $obj->competency = "<a role='button' href='./images/pmeRmeFile/".$obj->competency_file."' target='_black' class='btn btn-sm btn-warning m-1'><i class='fa fa-file-pdf-o'></i></a> <button type='button' onclick=deleteFile('".$iddd."','certificate') class='btn btn-sm btn-danger m-1'>Delete</button>";

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

    if($action == "stationComponentUpdate"){

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

    if($action == "getSingleComponetData"){
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

    if($action == "componentModalForm"){
        if(!isset($_POST['name']) || !isset($_POST['email'])){
            $respo['status'] = false;
            $respo['msg'] = "Something went wrong with request";
            echo json_encode($respo);
            die();

        }

        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        //current
        $createdDateTime = date("Y-m-d h:i:s");
        $insertQuery = "INSERT INTO component_modal (name,email,created_date) VALUES ('$name','$email','$createdDateTime')";

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