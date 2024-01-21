<?php

if(isset($_POST['action'])){

    include("../include/db_config.php");
    date_default_timezone_set('Asia/Kolkata');


    $action = trim($_POST['action']);
    $respo = [];

    if($action == "getEmployeeData"){

        if(!isset($_POST['stationId']) && !isset($_POST['sectionId'])){

             $respo['status'] = false;
            $respo['msg'] = "Either Section id or Station id are not set.";
            $respo['data'] = [];
            echo json_encode($respo);
            die();

        }

        $stationId = trim($_POST['stationId']);
        $sectionId = trim($_POST['sectionId']);
        $q="SELECT * FROM emp_info_rail WHERE section_id='$sectionId' && station_id='$stationId' && status != '-1'";

         if(empty($_POST['stationId'])){

             $respo['status'] = false;
            $respo['msg'] = "Station id are empty.";
            $respo['data'] = [];
            echo json_encode($respo);
            die();

        }

        if(empty($_POST['sectionId'])){
            $q = "SELECT * FROM emp_info_rail WHERE station_id='$stationId' && status != '-1'";
        }


        $getQuerySection = mysqli_query($con,$q);
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
            $obj->rme_date = $sectionRun['rme_date']=='' || $sectionRun['rme_date'] == '0000-00-00'?'No Record':$sectionRun['rme_date'];

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
                // continue;
            }else{
                $sectionRunfile = mysqli_fetch_array($getQueryFile);


            if($sectionRun['pme_date'] == '' || $sectionRun['pme_date'] == '0000-00-00'){
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

            if($sectionRun['rme_date'] == '' || $sectionRun['rme_date'] == '0000-00-00'){
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
            }

            
            $emppName = implode("_", explode(" ",$sectionRun['empname']));
            $emppId = $sectionRun['empid'];
            // $obj->rme_date = $sectionRun['rme_date'];
            $a = '<a type="button" class="btn btn-sm btn-success" href="pme-rme-add.php?id='.$sectionRun['id'].'">Edit</a>';
            $obj->href = $a;
            //  $obj->form = '<a type="button" class="btn btn-sm btn-info" href="view-emp-form.php?id='.$sectionRun['empid'].'">Form</a>';
            $obj->form  = '<a onclick=showCommonform("'.$emppId.'","Admin") type="button" class="btn btn-sm btn-warning">Form</a>';

             $obj->action = "<a type='button' class='btn btn-sm btn-danger' onclick=deleteEmplyeeModal('".$emppId."','".$emppName."')>Delete</a>";
 
            $data[] = $obj;

        }

        $respo['status'] = true;
        $respo['msg'] = "Employee list found";
        $respo['data'] = $data;

        echo json_encode($respo);
        die();

    }
    
    if($action == "getEmployeeAllData"){




        $getQuerySection = mysqli_query($con,"SELECT * FROM emp_info_rail WHERE status != '-1'");
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
            $emppName = implode("_", explode(" ",$sectionRun['empname']));
            $obj->id = $sectionRun['id'];
            $obj->section_name = $sectionRun['section_name'];
            $obj->section_id = $sectionRun['section_id'];
            $obj->station_name = $sectionRun['station_name'];
            $obj->station_id = $sectionRun['station_id'];

            $obj->empid = $sectionRun['empid'];
            $obj->empname = $sectionRun['empname'];
            $obj->empdesg = $sectionRun['empdesg'];

            // $obj->pme_date = $sectionRun['pme_date']==''?'No Record':$sectionRun['pme_date'];
            // $obj->rme_date = $sectionRun['rme_date']==''?'No Record':$sectionRun['rme_date'];
            $obj->rme_date = $sectionRun['rme_date']=='' || $sectionRun['rme_date'] == '0000-00-00'?'No Record':$sectionRun['rme_date'];


            // for pme rme file getting

            $pme_date = $sectionRun['pme_date'];
            $rme_date = $sectionRun['rme_date'];

            $empId = $sectionRun['empid'];
            $section_id = $sectionRun['section_id'];
            $station_id = $sectionRun['station_id'];
            $getQueryFile = mysqli_query($con,"SELECT * FROM pmerme_info_rail WHERE empid='$empId' and pme_date='$pme_date' and rme_date='$rme_date' and section_id='$section_id' and station_id ='$station_id'");


            if(mysqli_num_rows($getQueryFile) <= 0){
                $obj->pme_date = $sectionRun['pme_date'] == '0000-00-00'?'No Record':$sectionRun['pme_date'];
                $obj->rme_date = $sectionRun['rme_date'] == '0000-00-00'?'No Record':$sectionRun['rme_date'];
                $obj->competency = "No Record";
                // continue;
            }else{

            $sectionRunfile = mysqli_fetch_array($getQueryFile);


            if($sectionRun['pme_date'] == '' || $sectionRun['pme_date'] == '0000-00-00'){
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

            if($sectionRun['rme_date'] == '' || $sectionRun['rme_date'] == '0000-00-00'){
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
            }


            $emppId = $sectionRun['empid'];
            // $obj->rme_date = $sectionRun['rme_date'];
            $a = '<a type="button" class="btn btn-sm btn-success" href="pme-rme-add.php?id='.$sectionRun['id'].'">Edit</a>';
            $obj->href = $a;
            // $obj->form = '<a type="button" class="btn btn-sm btn-info" href="view-emp-form.php?id='.$sectionRun['empid'].'">Form</a>';
            $obj->form  = '<a onclick=showCommonform("'.$emppId.'","Admin") type="button" class="btn btn-sm btn-warning">Form</a>';

            $obj->action = "<a type='button' class='btn btn-sm btn-danger' onclick=deleteEmplyeeModal('".$emppId."','".$emppName."')>Delete</a>";

            $data[] = $obj;

        }

        $respo['status'] = true;
        $respo['msg'] = "Employee list found";
        $respo['data'] = $data;

        echo json_encode($respo);
        die();

    }
        if($action == "deleteEmployee"){
        if(!isset($_POST['empId']) || empty(trim($_POST['empId']))){

            $respo['status'] = false;
            $respo['msg'] = "Employee Id is not set, try again.";
            echo json_encode($respo);
            die();
    
        }

        $empId = trim($_POST['empId']);

       $emplyeeStatusUpdate = "UPDATE emp_info_rail SET status = '-1' WHERE empid = '$empId'";

        if(mysqli_query($con,$emplyeeStatusUpdate)){

            $respo['status'] = true;
            $respo['msg'] = "Employee deleted successfully.";
            echo json_encode($respo);
            die();

        }else{

            $respo['status'] = false;
            $respo['msg'] = "Something went wrong, try again.";
            echo json_encode($respo);
            die();

        }
        

    }

    if($action == "deletePmeRmeRow"){
        //
        if(!isset($_POST['deletePmeRmeId']) || empty(trim($_POST['deletePmeRmeId']))){

            $respo['status'] = false;
            $respo['msg'] = "Row Id is not set, try again.";
            echo json_encode($respo);
            die();
    
        }

        $deletePmeRmeId = trim($_POST['deletePmeRmeId']);

        // check data
        $check = mysqli_query($con,"SELECT * FROM pmerme_info_rail WHERE id = '$deletePmeRmeId'");
        if(mysqli_num_rows($check) <=0){
            $respo['status'] = false;
            $respo['msg'] = "Invalid row Id, try again.";
            echo json_encode($respo);
            die();
        }

        // $run = mysqli_fetch_array($check);

        // $pme_date = $run['pme_date'];
        // $rme_date = $run['rme_date'];
        // if($pme_date != '0000-00-00' || $rme_date != '0000-00-00' ){

        // }

    //    $deleteQuery = "DELETE FROM pmerme_info_rail WHERE id = '$deletePmeRmeId'";
       $deleteQuery = "UPDATE pmerme_info_rail SET status = '-1' WHERE id = '$deletePmeRmeId'";


        if(mysqli_query($con,$deleteQuery)){

            $respo['status'] = true;
            $respo['msg'] = "Row Data deleted successfully.";
            echo json_encode($respo);
            die();

        }else{

            $respo['status'] = false;
            $respo['msg'] = "Something went wrong, try again.";
            echo json_encode($respo);
            die();

        }
        

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

            
            // print_r($_FILES['files']);

            if($img_type != 'image/jpeg' && $img_type != 'image/jpg' && $img_type != "application/pdf") {
                             
                $respo['status'] = false;
                $respo['msg'] = "Kindly selete on JPG and PDF format file";
                echo json_encode($respo);
                die();
            }

            if($img_size >= (  3 * 1024 * 1024)){
                $respo['status'] = false;
                $respo['msg'] = "JPG/PDF file maximum 3MB are not allow";
                echo json_encode($respo);
                die();
            }

            $extra_dot = explode(".",$img_name);
            if(count($extra_dot) > 2){

                $respo['status'] = false;
                $respo['msg'] = "Please remove unnecessary (.) dot from file name, Only .pdf and .jpg valid";
                echo json_encode($respo);
                die();

            }


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
    
     if($action == 'editPmeRmeDate'){

        if(!isset($_POST['editPmeRmeDateValue'])){

            $respo['status'] = false;
           $respo['msg'] = "Date is not set.";
           echo json_encode($respo);
           die();
       }

       if(!isset($_POST['editPmeRmeId'])){

            $respo['status'] = false;
            $respo['msg'] = "Data update Id is not set.";
            echo json_encode($respo);
            die();
        }

        //

        if(!isset($_POST['editSubActionName'])){

            $respo['status'] = false;
            $respo['msg'] = "Sub Action is not set.";
            echo json_encode($respo);
            die();
        }


        $editPmeRmeDateValue = trim($_POST['editPmeRmeDateValue']);
        $editPmeRmeId = trim($_POST['editPmeRmeId']);
        $editSubActionName = trim($_POST['editSubActionName']);

        if(empty($editPmeRmeDateValue) || empty($editPmeRmeId) || empty($editSubActionName)){
            $respo['status'] = false;
            $respo['msg'] = "All field required.";
            echo json_encode($respo);
            die();
        }

        $checkData = mysqli_query($con,"SELECT * FROM pmerme_info_rail WHERE id = '$editPmeRmeId'");
        if(mysqli_num_rows($checkData) <= 0){
            $respo['status'] = false;
            $respo['msg'] = "No data found of give id.";
            echo json_encode($respo);
            die();

        }

        $getData = mysqli_fetch_array($checkData);

        $pmeRmeData;
        
        $empId = $getData['empid'];

        if($editSubActionName == 'pmeDate'){

            $pmeRmeData = $getData['pme_date'];
            $updQ = "UPDATE pmerme_info_rail SET pme_date='$editPmeRmeDateValue' WHERE id = '$editPmeRmeId'";
            $emp_info_rail_Data = "SELECT * FROM emp_info_rail WHERE empid = '$empId' && pme_date='$pmeRmeData'";
            
        }else{
            
            $pmeRmeData = $getData['rme_date'];
            $updQ = "UPDATE pmerme_info_rail SET rme_date='$editPmeRmeDateValue' WHERE id = '$editPmeRmeId'";
            $emp_info_rail_Data = "SELECT * FROM emp_info_rail WHERE empid = '$empId' && rme_date='$pmeRmeData'";
        }
        
        //update pme rme date in emp_info
        $empInfo_Query = mysqli_query($con,$emp_info_rail_Data);

        if(mysqli_num_rows($empInfo_Query) > 0){

            if($editSubActionName == 'pmeDate'){
                $empDataUpdate = "UPDATE emp_info_rail SET pme_date = '$editPmeRmeDateValue' WHERE empid = '$empId'";
                
            }else{
                $empDataUpdate = "UPDATE emp_info_rail SET rme_date = '$editPmeRmeDateValue' WHERE empid = '$empId'";

            }
            mysqli_query($con,$empDataUpdate);
        }


        $updtQuery = mysqli_query($con,$updQ); //update date in pme_rme_info

        if($updtQuery){

            $respo['status'] = true;
            $respo['msg'] = "Date update successfully";
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

       $getQuery = mysqli_query($con,"SELECT * FROM pmerme_info_rail WHERE empid='$empId' && status !='-1'");

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
            $obj->pme_date = "No Record <button type='button' class='btn btn-sm btn-success' onclick=editPmeRmeDialog('".$iddd."','pmeDate','')>Edit</button>";

            $obj->addPmeFileBtn = "<button type='button' class='btn btn-sm btn-info' disabled title='No PME Date added'>Add</button>";
        }else{
            // $obj->pme_date = $sectionRun['pme_date'];
                        $p_date = $sectionRun['pme_date'];
            $obj->pme_date = $p_date."  <button type='button' class='btn btn-sm btn-success' onclick=editPmeRmeDialog('".$iddd."','pmeDate','".$p_date."')>Edit</button>";


            if($sectionRun['pme_file']==''){

                $obj->addPmeFileBtn = "<button type='button' onclick=openDialog('".$iddd."','pmeFile') class='btn btn-sm btn-info'>Add</button>";

            }else{
    
                $obj->addPmeFileBtn = "<a role='button' href='./images/pmeRmeFile/".$obj->pme_file."' target='_black' class='btn btn-sm btn-success m-1'><i class='fa fa-file-pdf-o'></i></a> <button type='button' onclick=deleteFile('".$iddd."','pmeFile') class='btn btn-sm btn-danger m-1'>Delete</button>";
            }

        }

        if($sectionRun['rme_date']==''){
            // $obj->rme_date = 'No Record';
                        $obj->rme_date = "No Record <button type='button' class='btn btn-sm btn-success' onclick=editPmeRmeDialog('".$iddd."','rmeDate','')>Edit</button>";

            $obj->addRmeFileBtn = "<button type='button' class='btn btn-sm btn-info' disabled title='No Refresher Date added'>Add</button>";
        }else{
            // $obj->rme_date = $sectionRun['rme_date'];
            $r_date = $sectionRun['rme_date'];
            $obj->rme_date = $r_date." <button type='button' class='btn btn-sm btn-success' onclick=editPmeRmeDialog('".$iddd."','rmeDate','".$r_date."')>Edit</button>";


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

        $obj->action = "<a type='button' class='btn btn-sm btn-danger' onclick=deleteEmplyeeModal('".$iddd."')>Delete</a>";
        

      

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
    
    if($action == "getSectionStationById"){
        
        if(!isset($_POST['empId']) || empty($_POST['empId'])){
            $respo['status'] = false;
            $respo['msg'] = "Something went wrong with request,Employee Id not set";
            echo json_encode($respo);
            die();

        }
        
        $empId = trim($_POST['empId']);
        
        $query = mysqli_query($con,"SELECT * FROM emp_info_rail WHERE empid='$empId' && status != '-1'");
        if(mysqli_num_rows($query) <= 0){
              $respo['status'] = false;
            $respo['msg'] = "Invalid Employee Id.";
            echo json_encode($respo);
            die();

        }
        
        $runEmpData = mysqli_fetch_array($query);
        
         $respo['status'] = true;
        $respo['msg'] = "Data found.";
        $respo['data'] = $runEmpData;
        echo json_encode($respo);
        die();
        
        
        
    }
    
    if ($action == 'getEP_FormDetails'){
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

      // get Track form details
    if ($action == 'getT_FormDetails'){
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

    if ($action == 'getCS_FormDetails'){
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

    // DL
    if ($action == 'getDL_FormDetails'){
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
    
    
    
    
    // 
      $respo['status'] = false;
            $respo['msg'] = "Invalid Action provide";
            $respo['data'] = [];

            echo json_encode($respo);
            die();
    

}else{

    $respo['status'] = false;
    $respo['msg'] = "Access Denied";
    echo json_encode($respo);
    die();
}


?>