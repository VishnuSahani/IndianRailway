<?php
if(isset($_POST['action'])){

    include("../../include/db.php");
    date_default_timezone_set('Asia/Kolkata');


    $action = trim($_POST['action']);
    function response($status,$msg,$data = []){
        $respo['status'] = $status;
        $respo['msg'] = $msg;
        $respo['data'] = $data;

        echo json_encode($respo);
        exit;

    }

    if($action === 'insertBlockRegisterData'){

        $dateTime = $_POST['dateTime'];
        $department = $_POST['department'];
        $board = $_POST['board'];
        $line = $_POST['line'];
        $fromStation = $_POST['fromStation'];
        $toStation = $_POST['toStation'];
        $blockType = $_POST['blockType'];
        $mainWork = $_POST['mainWork'];
        $subWork = $_POST['subWork'];
        $organisation = $_POST['organisation'];
        $sseName = $_POST['sseName'];
        $mobileNo = $_POST['mobileNo'];
        $kmFrom = $_POST['kmFrom'];
        $kmTo = $_POST['kmTo'];
        $otherLineAffected = $_POST['otherLineAffected'];
        $signalAffected = $_POST['signalAffected'];
        $workDetails = $_POST['workDetails'];
        $typeOfDemand = $_POST['typeOfDemand'];
        $quantumOfWorkDemand = $_POST['quantumOfWorkDemand'];
        $resourcesNeeded = $_POST['resourcesNeeded'];
        $dayNight = $_POST['dayNight'];
        $demandHrs = $_POST['demandHrs'];
        $corridorFrom = $_POST['corridorFrom'];
        $corridorTo = $_POST['corridorTo'];
        $ohe = $_POST['ohe'];
        $sAndT = $_POST['sAndT'];
        $btnPower = $_POST['btnPower'];
        $sasm = $_POST['sasm'];
        $vahicle = $_POST['vahicle'];
        $status = $_POST['status'];
        $operatedFrom = $_POST['operatedFrom'];
        $operatedTo = $_POST['operatedTo'];
        $operatedOrNot = $_POST['operatedOrNot'];
        $progress = $_POST['progress'];
        $resonRemark = $_POST['resonRemark'];
        $oheSecFrom = $_POST['oheSecFrom'];
        $oheSecTo = $_POST['oheSecTo'];

        $createdDateTime = date("Y-m-d h:i:s");


        $query = "INSERT INTO bms_block_register (dateTime,department,board,line,fromStation,toStation,blockType,mainWork,subWork,organisation,sseName,mobileNo,kmFrom,kmTo,otherLineAffected,signalAffected,workDetails,typeOfDemand,quantumOfWorkDemand,resourcesNeeded,dayNight,demandHrs,corridorFrom,corridorTo,ohe,sAndT,btnPower,sasm,vahicle,status,operatedFrom,operatedTo,operatedOrNot,progress,resonRemark,oheSecFrom,oheSecTo,created_date) VALUES ('$dateTime','$department','$board','$line','$fromStation','$toStation','$blockType','$mainWork','$subWork','$organisation','$sseName','$mobileNo','$kmFrom','$kmTo','$otherLineAffected','$signalAffected','$workDetails','$typeOfDemand','$quantumOfWorkDemand','$resourcesNeeded','$dayNight','$demandHrs','$corridorFrom','$corridorTo','$ohe','$sAndT','$btnPower','$sasm','$vahicle','$status','$operatedFrom','$operatedTo','$operatedOrNot','$progress','$resonRemark','$oheSecFrom','$oheSecTo','$createdDateTime')";

        if(mysqli_query($con,$query)){

            response(true,"Data inserted successfully");
            
        }else{
            response(false,"Something went wrong.");
        }



    }elseif($action == "getBlockRegisterList"){

        $queryExe = mysqli_query($con,"SELECT * FROM bms_block_register");

        if(mysqli_num_rows($queryExe) <= 0){
            response(true,"Data List Empty");
        }

        $data = [];
        $count = 0;
        
        while($runData = mysqli_fetch_assoc($queryExe)){
            // $obj = new stdClass($runData);
            $count = $count +1;
            $runData['SrNo'] = $count;
            $runData['totalCorridor'] = "00:00";
            $runData['totalOperator'] = "00:00";
            $data[] = $runData;

            // $time = "06:58:00";
            // $time2 = "00:40:00";

            // $secs = strtotime($time2)-strtotime("00:00:00");
            // $result = date("H:i:s",strtotime($time)+$secs);
        }
        response(true,"Data List Found",$data);
    }

}

?>