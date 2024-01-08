<?php
session_start();

if (isset($_POST['common_action'])) {

    include("../include/db_config.php");
    date_default_timezone_set('Asia/Kolkata');

    function responseSend($status, $msg, $formType = '', $data = [])
    {

        $respo['status'] = $status;
        $respo['msg'] = $msg;
        $respo['formType'] = $formType;
        $respo['data'] = $data;
        echo json_encode($respo);
        die();

    }


    $action = trim($_POST['common_action']);
    $respo = [];


    if ($action == "getFormSubmitedData") {
        if (!isset($_SESSION['empid_for_form']) || !isset($_SESSION['section_name_tmp']) || !isset($_SESSION['section_id_tmp']) || !isset($_SESSION['station_name_tmp']) || !isset($_SESSION['station_id_tmp']) || !isset($_POST['componentName'])) {
            responseSend(false, "Something went wrong with request");

        }

        $userID = trim($_SESSION['empid_for_form']);
        $sectionName = trim($_SESSION['section_name_tmp']);
        $sectionId = trim($_SESSION['section_id_tmp']);
        $stationName = trim($_SESSION['station_name_tmp']);
        $stationId = trim($_SESSION['station_id_tmp']);
        $compoNameTmp = trim($_POST['componentName']);

        if (empty($sectionName) || empty($sectionId) || empty($stationName) || empty($stationId) || empty($compoNameTmp) || empty($userID)) {
            responseSend(false, "Something went wrong, Empty request");
        }

        $formType = "";
        $data = [];
        $formData = [];

        if ($compoNameTmp == "POINT") {
            // EP 1,2,4,5 form data
            $formType = "EP";

            $qEP1 = mysqli_query($con, "SELECT * FROM ep1_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if (mysqli_num_rows($qEP1) <= 0) {

                // $formData['EP1']=[];

            } else {

                $ep1Data = [];

                while ($runEp1 = mysqli_fetch_array($qEP1)) {

                    $ep1Data[] = $runEp1;

                }

                $formData['EP1'] = $ep1Data;

            }


            // ep1 end

            // ep2 start

            $qEP2 = mysqli_query($con, "SELECT * FROM ep2_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if (mysqli_num_rows($qEP2) <= 0) {

                // $formData['EP2']=[];

            } else {

                $ep2Data = [];

                while ($runEp2 = mysqli_fetch_array($qEP2)) {

                    $ep2Data[] = $runEp2;

                }

                $formData['EP2'] = $ep2Data;

            }


            // ep2 end 

            
            // ep3 start

            $qEP3 = mysqli_query($con, "SELECT * FROM ep3_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if (mysqli_num_rows($qEP3) <= 0) {

                // $formData['EP2']=[];

            } else {

                $ep3Data = [];

                while ($runEp3 = mysqli_fetch_array($qEP3)) {

                    $ep3Data[] = $runEp3;

                }

                $formData['EP3'] = $ep3Data;

            }


            // ep3 end 

            // ep4 start

            $qEP4 = mysqli_query($con, "SELECT * FROM ep4_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if (mysqli_num_rows($qEP4) <= 0) {

                // $formData['EP4']=[];

            } else {

                $ep4Data = [];

                while ($runEp4 = mysqli_fetch_array($qEP4)) {

                    $ep4Data[] = $runEp4;

                }

                $formData['EP4'] = $ep4Data;

            }

            // ep4 end here

            // ep5 start

            $qEP5 = mysqli_query($con, "SELECT * FROM ep5_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if (mysqli_num_rows($qEP5) <= 0) {

                // $formData['EP5']=[];

            } else {

                $ep5Data = [];

                while ($runEp5 = mysqli_fetch_array($qEP5)) {

                    $ep5Data[] = $runEp5;

                }

                $formData['EP5'] = $ep5Data;

            }





        } elseif ($compoNameTmp == "TRACK") {
            // EP 1,2,4,5 form data
            $formType = "T";

            $qEP1 = mysqli_query($con, "SELECT * FROM t1_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if (mysqli_num_rows($qEP1) <= 0) {

                // $formData['EP1']=[];

            } else {

                $ep1Data = [];

                while ($runEp1 = mysqli_fetch_array($qEP1)) {

                    $ep1Data[] = $runEp1;

                }

                $formData['T1'] = $ep1Data;

            }


            // ep1 end

            // ep2 start

            $qEP2 = mysqli_query($con, "SELECT * FROM t2_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if (mysqli_num_rows($qEP2) <= 0) {

                // $formData['EP2']=[];

            } else {

                $ep2Data = [];

                while ($runEp2 = mysqli_fetch_array($qEP2)) {

                    $ep2Data[] = $runEp2;

                }

                $formData['T2'] = $ep2Data;

            }


            // ep2 end 

            // ep4 start

            $qEP3 = mysqli_query($con, "SELECT * FROM t3_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if (mysqli_num_rows($qEP3) <= 0) {

                // $formData['EP4']=[];

            } else {

                $ep3Data = [];

                while ($runEp3 = mysqli_fetch_array($qEP3)) {

                    $ep3Data[] = $runEp3;

                }

                $formData['T3'] = $ep3Data;

            }

            // ep4 end here

                     // t4 start

                     $qEP4 = mysqli_query($con, "SELECT * FROM t4_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

                     if (mysqli_num_rows($qEP4) <= 0) {
         
                         // $formData['EP4']=[];
         
                     } else {
         
                         $ep4Data = [];
         
                         while ($runEp4 = mysqli_fetch_array($qEP4)) {
         
                             $ep4Data[] = $runEp4;
         
                         }
         
                         $formData['T4'] = $ep4Data;
         
                     }
         
                     // ep4 end here

            // ep5 start

            $qEP5 = mysqli_query($con, "SELECT * FROM t5_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if (mysqli_num_rows($qEP5) <= 0) {

                // $formData['EP5']=[];

            } else {

                $ep5Data = [];

                while ($runEp5 = mysqli_fetch_array($qEP5)) {

                    $ep5Data[] = $runEp5;

                }

                $formData['T5'] = $ep5Data;

            }





        } elseif ($compoNameTmp == "SIGNAL" || $compoNameTmp == "SIGNAL CS") {
            // EP 1,2,4,5 form data
            $formType = "CS";

            $qEP1 = mysqli_query($con, "SELECT * FROM cs1_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if (mysqli_num_rows($qEP1) <= 0) {

                // $formData['EP1']=[];

            } else {

                $ep1Data = [];

                while ($runEp1 = mysqli_fetch_array($qEP1)) {

                    $ep1Data[] = $runEp1;

                }

                $formData['CS1'] = $ep1Data;

            }


            // ep1 end

            // ep2 start

            $qEP2 = mysqli_query($con, "SELECT * FROM cs2_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if (mysqli_num_rows($qEP2) <= 0) {

                // $formData['EP2']=[];

            } else {

                $ep2Data = [];

                while ($runEp2 = mysqli_fetch_array($qEP2)) {

                    $ep2Data[] = $runEp2;

                }

                $formData['CS2'] = $ep2Data;

            }

        } elseif ($compoNameTmp == "MLB") {
            // EP 1,2,4,5 form data
            $formType = "MLB";

            $qEP1 = mysqli_query($con, "SELECT * FROM mlb1_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if (mysqli_num_rows($qEP1) <= 0) {

                // $formData['EP1']=[];

            } else {

                $ep1Data = [];

                while ($runEp1 = mysqli_fetch_array($qEP1)) {

                    $ep1Data[] = $runEp1;

                }

                $formData['MLB1'] = $ep1Data;

            }


            // ep1 end

            // ep2 start

            $qEP2 = mysqli_query($con, "SELECT * FROM mlb2_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if (mysqli_num_rows($qEP2) <= 0) {

                // $formData['EP2']=[];

            } else {

                $ep2Data = [];

                while ($runEp2 = mysqli_fetch_array($qEP2)) {

                    $ep2Data[] = $runEp2;

                }

                $formData['MLB2'] = $ep2Data;

            }

            // 2 end


            $qEP3 = mysqli_query($con, "SELECT * FROM mlb3_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if (mysqli_num_rows($qEP3) <= 0) {

                // $formData['EP1']=[];

            } else {

                $ep3Data = [];

                while ($runEp3 = mysqli_fetch_array($qEP3)) {

                    $ep3Data[] = $runEp3;

                }

                $formData['MLB3'] = $ep3Data;

            }


            // 3  end



            // ep1 end

        }
        //
        elseif ($compoNameTmp == "ELB") {
            // EP 1,2,4,5 form data
            $formType = "ELB";

            $qEP1 = mysqli_query($con, "SELECT * FROM elb1_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if (mysqli_num_rows($qEP1) <= 0) {

                // $formData['EP1']=[];

            } else {

                $ep1Data = [];

                while ($runEp1 = mysqli_fetch_array($qEP1)) {

                    $ep1Data[] = $runEp1;

                }

                $formData['ELB1'] = $ep1Data;

            }


            // elb1 end

            // elb2 start

            $qEP2 = mysqli_query($con, "SELECT * FROM elb2_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if (mysqli_num_rows($qEP2) <= 0) {

                // $formData['EP2']=[];

            } else {

                $ep2Data = [];

                while ($runEp2 = mysqli_fetch_array($qEP2)) {

                    $ep2Data[] = $runEp2;

                }

                $formData['ELB2'] = $ep2Data;

            }
            //elb2 end

            // elb3 start

            $qEP2 = mysqli_query($con, "SELECT * FROM elb3_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if (mysqli_num_rows($qEP2) <= 0) {

                // $formData['EP2']=[];

            } else {

                $ep2Data = [];

                while ($runEp2 = mysqli_fetch_array($qEP2)) {

                    $ep2Data[] = $runEp2;

                }

                $formData['ELB3'] = $ep2Data;

            }

            // elb3 end

            // elb4 start

            $qEP2 = mysqli_query($con, "SELECT * FROM elb4_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if (mysqli_num_rows($qEP2) <= 0) {

                // $formData['EP2']=[];

            } else {

                $ep2Data = [];

                while ($runEp2 = mysqli_fetch_array($qEP2)) {

                    $ep2Data[] = $runEp2;

                }

                $formData['ELB4'] = $ep2Data;

            }

            // elb4 end

            // elb2 start

            $qEP2 = mysqli_query($con, "SELECT * FROM elb5_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if (mysqli_num_rows($qEP2) <= 0) {

                // $formData['EP2']=[];

            } else {

                $ep2Data = [];

                while ($runEp2 = mysqli_fetch_array($qEP2)) {

                    $ep2Data[] = $runEp2;

                }

                $formData['ELB5'] = $ep2Data;

            }
            //elb5 end

        } elseif ($compoNameTmp == "SLB") {
            // EP 1,2,4,5 form data
            $formType = "SLB";

            $qEP1 = mysqli_query($con, "SELECT * FROM slb1_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if (mysqli_num_rows($qEP1) <= 0) {

                // $formData['EP1']=[];

            } else {

                $ep1Data = [];

                while ($runEp1 = mysqli_fetch_array($qEP1)) {

                    $ep1Data[] = $runEp1;

                }

                $formData['SLB1'] = $ep1Data;

            }


            // slb1 end

            // slb2 start

            $qEP2 = mysqli_query($con, "SELECT * FROM slb2_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if (mysqli_num_rows($qEP2) <= 0) {

                // $formData['EP2']=[];

            } else {

                $ep2Data = [];

                while ($runEp2 = mysqli_fetch_array($qEP2)) {

                    $ep2Data[] = $runEp2;

                }

                $formData['SLB2'] = $ep2Data;

            }
            //slb2 end

        } elseif ($compoNameTmp == "AXLE COUNTER") {
            // EP 1,2,4,5 form data
            $formType = "DAC";

            $qEP1 = mysqli_query($con, "SELECT * FROM dac1_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if (mysqli_num_rows($qEP1) <= 0) {

                // $formData['EP1']=[];

            } else {

                $ep1Data = [];

                while ($runEp1 = mysqli_fetch_array($qEP1)) {

                    $ep1Data[] = $runEp1;

                }

                $formData['DAC1'] = $ep1Data;

            }


            // dac1 end

            // dac2 start

            $qEP2 = mysqli_query($con, "SELECT * FROM dac2_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if (mysqli_num_rows($qEP2) <= 0) {

                // $formData['EP2']=[];

            } else {

                $ep2Data = [];

                while ($runEp2 = mysqli_fetch_array($qEP2)) {

                    $ep2Data[] = $runEp2;

                }

                $formData['DAC2'] = $ep2Data;

            }
            //dac2 end

            // dac3 start

            $qEP2 = mysqli_query($con, "SELECT * FROM dac3_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if (mysqli_num_rows($qEP2) <= 0) {

                // $formData['EP2']=[];

            } else {

                $ep2Data = [];

                while ($runEp2 = mysqli_fetch_array($qEP2)) {

                    $ep2Data[] = $runEp2;

                }

                $formData['DAC3'] = $ep2Data;

            }

            // dac3 end





        }


        //
        elseif ($compoNameTmp == "DL") {

            $formType = "DL";

            $qEP1 = mysqli_query($con, "SELECT * FROM dl1_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if (mysqli_num_rows($qEP1) <= 0) {

                // $formData['EP1']=[];

            } else {

                $ep1Data = [];

                while ($runEp1 = mysqli_fetch_array($qEP1)) {

                    $ep1Data[] = $runEp1;

                }

                $formData['DL1'] = $ep1Data;

            }


            // ep1 end

            // ep2 start

            $qEP2 = mysqli_query($con, "SELECT * FROM dl2_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if (mysqli_num_rows($qEP2) <= 0) {

                // $formData['EP2']=[];

            } else {

                $ep2Data = [];

                while ($runEp2 = mysqli_fetch_array($qEP2)) {

                    $ep2Data[] = $runEp2;

                }

                $formData['DL2'] = $ep2Data;

            }

            // 2 end


            $qEP3 = mysqli_query($con, "SELECT * FROM dl3_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if (mysqli_num_rows($qEP3) <= 0) {

                // $formData['EP1']=[];

            } else {

                $ep3Data = [];

                while ($runEp3 = mysqli_fetch_array($qEP3)) {

                    $ep3Data[] = $runEp3;

                }

                $formData['DL3'] = $ep3Data;

            }


            // 3  end


            $qEP4 = mysqli_query($con, "SELECT * FROM dl4_form WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId' && component_name='$compoNameTmp'");

            if (mysqli_num_rows($qEP4) <= 0) {

                // $formData['EP1']=[];

            } else {

                $ep4Data = [];

                while ($runEp4 = mysqli_fetch_array($qEP4)) {

                    $ep4Data[] = $runEp4;

                }

                $formData['DL4'] = $ep4Data;

            }


            // ep1 end

        } else {
            responseSend(false, "Invalid Component Name, Kindly check component name", []);
        }


        // $data[0] = json_encode($formData);
        $data[0] = $formData;

        responseSend(true, "Data Found", $formType, $data);




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
            case "EP1":
                $tableName = "ep1_form";
                break;

            case "EP2":
                $tableName = "ep2_form";
                break;

            case "EP3":
                $tableName = "ep3_form";
                break;

            case "EP4":
                $tableName = "ep4_form";
                break;
            case "EP5":
                $tableName = "ep5_form";
                break;
            default:
                $respo['status'] = false;
                $respo['msg'] = "Something went wrong with Table name";
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






    }
    // new
    if ($action == "getFormSubmitedData_new") {
        if (!isset($_SESSION['empid_for_form']) || !isset($_SESSION['section_name_tmp']) || !isset($_SESSION['section_id_tmp']) || !isset($_SESSION['station_name_tmp']) || !isset($_SESSION['station_id_tmp']) || !isset($_POST['formType'])) {
            responseSend(false, "Something went wrong with request");

        }

        $userID = trim($_SESSION['empid_for_form']);
        $sectionName = trim($_SESSION['section_name_tmp']);
        $sectionId = trim($_SESSION['section_id_tmp']);
        $stationName = trim($_SESSION['station_name_tmp']);
        $stationId = trim($_SESSION['station_id_tmp']);
        $formType = trim($_POST['formType']);

        if (empty($sectionName) || empty($sectionId) || empty($stationName) || empty($stationId) || empty($formType) || empty($userID)) {
            responseSend(false, "Something went wrong, Empty request");
        }

        $data_form = [];
        $tableName = "";

        switch ($formType) {
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

            default:
                $respo['status'] = false;
                $respo['msg'] = "Invalid request!";
                $respo['data'] = [];
                echo json_encode($respo);
                die();
        }

 

            $queryform = mysqli_query($con, "SELECT * FROM ".$tableName." WHERE emp_id='$userID' && section_id='$sectionId' && station_id='$stationId'");

            if (mysqli_num_rows($queryform) <= 0) {

                $respo['status'] = false;
                $respo['msg'] = "No ".$formType." form submit by emplyee, Id= ".$userID;
                $respo['data'] = [];
                echo json_encode($respo);
                die();

            } 
            while ($query_run = mysqli_fetch_array($queryform)) {
                $data_form[] = $query_run;
            }

  

            $respo['status'] = true;
            $respo['msg'] = "Data found";
            $respo['data'] = $data_form;
            $respo['formType'] = $formType;
            echo json_encode($respo);
            die();



    }
     elseif ($action == 'getEP_FormDetails') {
        if (!isset($_POST['formType']) || empty($_POST['formType'])) {
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
                $respo['msg'] = "Invalid request!123";
                $respo['data'] = [];
                echo json_encode($respo);
                die();
        }

        try {

            $query = "SELECT * FROM " . $tableName . " WHERE language='$language'";
            $queryExe = mysqli_query($con, $query);
            if (mysqli_num_rows($queryExe) <= 0) {
                $respo['status'] = false;
                $respo['msg'] = "Data not found";
                $respo['data'] = [];
                echo json_encode($respo);
                die();
            }

            $data = [];

            while ($q_run = mysqli_fetch_array($queryExe)) {
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

        } catch (Exception $err) {

            $respo['status'] = false;
            $respo['msg'] = "Catch error"; //$err;
            $respo['data'] = [];

            echo json_encode($respo);
            die();

        }
    } elseif ($action == 'getT_FormDetails') {
        if (!isset($_POST['formType']) || empty($_POST['formType'])) {
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

        try {

            $query = "SELECT * FROM " . $tableName . " WHERE language='$language'";
            $queryExe = mysqli_query($con, $query);
            if (mysqli_num_rows($queryExe) <= 0) {
                $respo['status'] = false;
                $respo['msg'] = "Data not found";
                $respo['data'] = [];
                echo json_encode($respo);
                die();
            }

            $data = [];

            while ($q_run = mysqli_fetch_array($queryExe)) {
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

        } catch (Exception $err) {

            $respo['status'] = false;
            $respo['msg'] = $err;
            $respo['data'] = [];

            echo json_encode($respo);
            die();

        }
    } elseif ($action == 'getCS_FormDetails') {
        if (!isset($_POST['formType']) || empty($_POST['formType'])) {
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

        try {

            $query = "SELECT * FROM " . $tableName . " WHERE language='$language'";
            $queryExe = mysqli_query($con, $query);
            if (mysqli_num_rows($queryExe) <= 0) {
                $respo['status'] = false;
                $respo['msg'] = "Data not found";
                $respo['data'] = [];
                echo json_encode($respo);
                die();
            }

            $data = [];

            while ($q_run = mysqli_fetch_array($queryExe)) {
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

        } catch (Exception $err) {

            $respo['status'] = false;
            $respo['msg'] = $err;
            $respo['data'] = [];

            echo json_encode($respo);
            die();

        }
    } elseif ($action == 'getDL_FormDetails') {
        if (!isset($_POST['formType']) || empty($_POST['formType'])) {
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

        try {

            $query = "SELECT * FROM " . $tableName . " WHERE language='$language'";
            $queryExe = mysqli_query($con, $query);
            if (mysqli_num_rows($queryExe) <= 0) {
                $respo['status'] = false;
                $respo['msg'] = "Data not found";
                $respo['data'] = [];
                echo json_encode($respo);
                die();
            }

            $data = [];

            while ($q_run = mysqli_fetch_array($queryExe)) {
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

        } catch (Exception $err) {

            $respo['status'] = false;
            $respo['msg'] = $err;
            $respo['data'] = [];

            echo json_encode($respo);
            die();

        }
    } elseif ($action == 'getMLB_FormDetails') {
        if (!isset($_POST['formType']) || empty($_POST['formType'])) {
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

        try {

            $query = "SELECT * FROM " . $tableName . " WHERE language='$language'";
            $queryExe = mysqli_query($con, $query);
            if (mysqli_num_rows($queryExe) <= 0) {
                $respo['status'] = false;
                $respo['msg'] = "Data not found";
                $respo['data'] = [];
                echo json_encode($respo);
                die();
            }

            $data = [];

            while ($q_run = mysqli_fetch_array($queryExe)) {
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

        } catch (Exception $err) {

            $respo['status'] = false;
            $respo['msg'] = $err;
            $respo['data'] = [];

            echo json_encode($respo);
            die();

        }
    } elseif ($action == 'getSLB_FormDetails') {
        if (!isset($_POST['formType']) || empty($_POST['formType'])) {
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

        try {

            $query = "SELECT * FROM " . $tableName . " WHERE language='$language'";
            $queryExe = mysqli_query($con, $query);
            if (mysqli_num_rows($queryExe) <= 0) {
                $respo['status'] = false;
                $respo['msg'] = "Data not found";
                $respo['data'] = [];
                echo json_encode($respo);
                die();
            }

            $data = [];

            while ($q_run = mysqli_fetch_array($queryExe)) {
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

        } catch (Exception $err) {

            $respo['status'] = false;
            $respo['msg'] = $err;
            $respo['data'] = [];

            echo json_encode($respo);
            die();

        }
    } elseif ($action == 'getELB_FormDetails') {
        if (!isset($_POST['formType']) || empty($_POST['formType'])) {
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

        try {

            $query = "SELECT * FROM " . $tableName . " WHERE language='$language'";
            $queryExe = mysqli_query($con, $query);
            if (mysqli_num_rows($queryExe) <= 0) {
                $respo['status'] = false;
                $respo['msg'] = "Data not found";
                $respo['data'] = [];
                echo json_encode($respo);
                die();
            }

            $data = [];

            while ($q_run = mysqli_fetch_array($queryExe)) {
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

        } catch (Exception $err) {

            $respo['status'] = false;
            $respo['msg'] = $err;
            $respo['data'] = [];

            echo json_encode($respo);
            die();

        }
    } elseif ($action == 'getDAC_FormDetails') {
        if (!isset($_POST['formType']) || empty($_POST['formType'])) {
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
            case 'DAC1':
                $tableName = 'dac1_info';
                break;

            case 'DAC2':
                $tableName = 'dac2_info';
                break;

            case 'DAC3':
                $tableName = 'dac3_info';
                break;

            default:
                $respo['status'] = false;
                $respo['msg'] = "Invalid request!";
                $respo['data'] = [];
                echo json_encode($respo);
                die();

        }

        try {

            $query = "SELECT * FROM " . $tableName . " WHERE language='$language'";
            $queryExe = mysqli_query($con, $query);
            if (mysqli_num_rows($queryExe) <= 0) {
                $respo['status'] = false;
                $respo['msg'] = "Data not found";
                $respo['data'] = [];
                echo json_encode($respo);
                die();
            }

            $data = [];

            while ($q_run = mysqli_fetch_array($queryExe)) {
                $obj = new stdClass();
                $obj->id = $q_run['id'];
                $obj->dac_id = $q_run['dac_id'];
                $obj->dac_details = $q_run['dac_details'];
                $obj->dac_option = $q_run['dac_option'];
                $obj->dac_status = $q_run['status'];

                $data[] = $obj;

            }

            $respo['status'] = true;
            $respo['msg'] = "List found";
            $respo['data'] = $data;

            echo json_encode($respo);
            die();

        } catch (Exception $err) {

            $respo['status'] = false;
            $respo['msg'] = $err;
            $respo['data'] = [];

            echo json_encode($respo);
            die();

        }
    } else {
        responseSend(false, "Invalid Action");
    }

} else {
    responseSend(false, "Access Denied");
}


?>