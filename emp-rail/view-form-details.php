<?php require('header.php');?>
<?php require('include/db_config.php');

 //Include database configuration file
    $id="";

    if(isset($_SESSION['userretailer']))
{
  $id=$_SESSION['userretailer'];  
   
}

// echo $name;


?>



<!-- <script src="../jsPdf/dist/jspdf.umd.min.js"></script> -->
<!-- <script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script> -->

<script src="../jsPdf/jspdf.umd.min.js"></script>
<script src="../jsPdf/html2canvas.js"></script>



<div class="container" style="margin-top:30px;">

    <div class="alert alert-primary d-flex justify-content-between align-items-center">
        <div></div>
        <p class="text-center h5">Your Station Component </p>

        <button type="button" onclick="location.reload()" class="btn btn-sm btn-success">Refresh</button>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form>
                    <div class="row">
                        <div class="form-group col-xl-6 col-lg-6 col-12">
                            <!-- <label for="sectionName">Section Name</label> -->
                            <input type="hidden" id="sectionName" class="form-control" disabled
                                value="<?php echo $empSectionName;?>">
                            <input type="hidden" id="sectionId" class="form-control" disabled
                                value="<?php echo $empSectionId;?>">
                            <input type="hidden" id="compoNameTmp">
                            <input type="hidden" id="subcompoNameTmp">
                        </div>

                        <div class="form-group col-xl-6 col-lg-6 col-12">
                            <!-- <label for="stationName">Station Name</label> -->
                            <input type="hidden" id="stationName" class="form-control" disabled
                                value="<?php echo $empStationName;?>">
                            <input type="hidden" id="stationId" class="form-control" disabled
                                value="<?php echo $empStationId;?>">
                        </div>


                        <div class="form-group col-12">

                            <div class="d-flex flex-wrap my-2" id="componentDisplay">

                            </div>

                            <div id="showError" class="text-danger text-center h6">

                            </div>
                        </div>

                        <div class="form-group col-12" id="formKeyDisplay">

                        </div>
                        <div class="form-group my-1 col-12" id="createSubcompo">

                        </div>






                    </div>

                </form>
            </div>

            <div class="table-responsive d-none" id="mainTable">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <td>#</td>
                            <td>Component Name </td>
                            <td>Form Name</td>
                            <td>Sub Component Name </td>
                            <td>Created Date </td>
                            <td>Updated Date </td>
                            <td>Action</td>
                        </tr>
                    </thead>

                    <tbody id="printTableData">

                    </tbody>
                </table>
            </div>
        </div>
    </div>



</div>
<!--container close-->

<!-- Modal EP1 -->
<div class="modal fade" id="componentForm_EP1" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="componentFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div id="pdfBodyEP1">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="componentFormLabel">
                        <span class="badge badge-success h3" id="modalComponentName">
                            Schedule Code: EP1
                        </span>



                        <!-- <span id="modalSubCompoName"></span>
                    <span class="badge badge-danger h3" id="modalSubCompoType"></span> -->
                    </h5>
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> -->


                </div>

                <div class="row mx-2 px-2 py-1">
                    <div class="col-6">
                        <span>Name:</span>
                        <span class="ml-2 font-weight-bold">
                            <?php echo $_SESSION['userretailerempName'] ?? '...' ; ?>

                        </span>

                    </div>
                    <div class="col-6">
                        <span>Id:</span>
                        <span class="ml-2 font-weight-bold">

                            <?php echo $_SESSION['userretailer']; ?>
                        </span>

                    </div>

                    <div class="col-6">
                        <span>Section:</span>
                        <span class="ml-2 font-weight-bold">
                        <?php echo $empSectionName;?>
                        </span>
                    </div>
                    <div class="col-6">
                    <span>Station:</span>

                    <span class="ml-2 font-weight-bold">
                    <?php echo $empStationName;?>

                    </span>

                    </div>
                </div>
                <div class="m-2 text-center alert alert-danger" style="font-size:13px">

                    Periodicity: Technician(Signal): Fortnightly Sectional SSE/JE(Signal): Monthly SSE (Signal)/Incharge
                    :
                    Quarterly

                </div>
                <div class="modal-body table-responsive">
                    <!-- <form id="modalFormComponent">
                   
                </form> -->
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">S.No</th>
                                <th scope="col">Check the following</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="ep1_body">

                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card-footer d-flex justify-content-end ">
                <!-- <div id="ep1Form_status"></div> -->
                <!-- <button type='button' id="ep1FormBtn" class="btn btn-success">Final Submit</button> -->
                <button type='button' id="ep1PdfBtn" onclick="generatePdf('EP1','pdfBodyEP1')"
                    class="btn btn-success btn-sm">PDF</button>
                <button type="button" class="btn btn-sm btn-secondary mx-2" data-dismiss="modal" aria-label="Close">
                    Close
                </button>
            </div>

        </div>
    </div>
</div>

<!-- Modal EP2 -->
<div class="modal fade" id="componentForm_EP2" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="componentFormLabel2" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div id="pdfBodyEP2">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="componentFormLabel2">
                        <span class="badge badge-success h3">
                            Schedule Code: EP2
                        </span>

                        <!-- <span id="modalSubCompoName"></span>
                    <span class="badge badge-danger h3" id="modalSubCompoType"></span> -->
                    </h5>
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> -->
                </div>
                <div class="row mx-2 px-2 py-1">
                    <div class="col-6">
                        <span>Name:</span>
                        <span class="ml-2 font-weight-bold">
                            <?php echo $_SESSION['userretailerempName'] ?? '...' ; ?>

                        </span>

                    </div>
                    <div class="col-6">
                        <span>Id:</span>
                        <span class="ml-2 font-weight-bold">

                            <?php echo $_SESSION['userretailer']; ?>
                        </span>

                    </div>

                    <div class="col-6">
                        <span>Section:</span>
                        <span class="ml-2 font-weight-bold">
                        <?php echo $empSectionName;?>
                        </span>
                    </div>
                    <div class="col-6">
                    <span>Station:</span>

                    <span class="ml-2 font-weight-bold">
                    <?php echo $empStationName;?>

                    </span>

                    </div>
                </div>
                <div class="m-2 text-center alert alert-danger" style="font-size:13px">

                    Periodicity: Signal Technician: Monthly (to be done by ESM in the presence of SSE/JE) Sectional
                    SSE/JE(Signal): Monthly SSE(Signal)/Incharge: Quarterly

                </div>
                <div class="modal-body table-responsive">

                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">S.No</th>
                                <th scope="col">Check the following</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="ep2_body">
                            <tr>
                                <th scope="row">1</th>
                                <td colspan="2">
                                    <div class="alert alert-success">
                                        Measurements of operating values (voltage & current) of point machines, with and
                                        without obstruction for normal
                                        and reverse operation. Current required to operate the machine in either
                                        direction
                                        shall be 1.5 to 2 times of its
                                        normal operation and friction clutch shall slip within this range. Replace
                                        machine
                                        when difference between normal
                                        operating current and current under obstruction is less than 0.5 A.
                                    </div>
                                    <table class="table  table-bordered">
                                        <thead class="table-secondary">
                                            <tr>
                                                <td colspan="3">
                                                    <h5 class="text-center">Parameters to be Recorded</h5>
                                                </td>
                                            </tr>

                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="2">Date</td>
                                                <td>
                                                    <input type="date" id="EP2_1" disabled class="form-control">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td style="vertical-align: middle;" rowspan="2">Operating Voltage (>100
                                                    Volts)</td>
                                                <td>(N to R)</td>
                                                <td>
                                                    <input type="number" disabled id="op_v_N_R" class="form-control">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>(R to N)</td>
                                                <td>
                                                    <input type="number" disabled id="op_v_R_N" class="form-control">
                                                </td>
                                            </tr>


                                            <tr>
                                                <td style="vertical-align: middle;" rowspan="2">Obstruction Voltage (>80
                                                    Volts)</td>
                                                <td>(N to R)</td>
                                                <td>
                                                    <input type="number" disabled id="ob_v_N_R" class="form-control">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>(R to N)</td>
                                                <td>
                                                    <input type="number" disabled id="ob_v_R_N" class="form-control">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td style="vertical-align: middle;" rowspan="2">Detection Voltage (>24
                                                    Volts)</td>
                                                <td>(N to R)</td>
                                                <td>
                                                    <input type="number" disabled id="det_v_N_R" class="form-control">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>(R to N)</td>
                                                <td>
                                                    <input type="number" disabled id="det_v_R_N" class="form-control">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td style="vertical-align: middle;" rowspan="2">Normal Working Current
                                                    (1.5 - 2.5 Amp.)</td>
                                                <td>(N to R)</td>
                                                <td>
                                                    <input type="number" disabled id="nwc_N_R" class="form-control">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>(R to N)</td>
                                                <td>
                                                    <input type="number" disabled id="nwc_R_N" class="form-control">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td style="vertical-align: middle;" rowspan="2">Obstruction/Slipping
                                                    Current (3-5 Amp.)</td>
                                                <td>(N to R)</td>
                                                <td>
                                                    <input type="number" disabled id="ob_sc_N_R" class="form-control">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>(R to N)</td>
                                                <td>
                                                    <input type="number" disabled id="ob_sc_R_N" class="form-control">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td style="vertical-align: middle;" colspan="2">Obstruction Test (3.25
                                                    mm)</td>
                                                <!-- <td>(N to R)</td> -->
                                                <td>
                                                    <input type="text" disabled id="ob_t_N_R" class="form-control">

                                                </td>
                                            </tr>



                                            <tr>
                                                <td style="vertical-align: middle;" colspan="2">Go Test (1.6 mm Fail
                                                    Safe Test)</td>
                                                <!-- <td>(N to R)</td> -->
                                                <td>
                                                    <input type="text" disabled id="gt_N_R" class="custom-select">

                                                </td>
                                            </tr>


                                            <tr>
                                                <td style="vertical-align: middle;" colspan="2">Operating Time (4-5
                                                    Seconds)</td>
                                                <td>
                                                    <input type="number" disabled id="operatingTimeSecond"
                                                        class="form-control">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td style="vertical-align: middle;" colspan="2">
                                                    <!-- Operating time during barrier test (>10 Seconds) -->
                                                    अवरोध परिक्षण के दौरान परिचालन समय
                                                </td>
                                                <td>
                                                    <input type="number" disabled id="operatingTime_dbt"
                                                        class="form-control">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td style="vertical-align: middle;" colspan="2">
                                                    <!-- Is the friction clutch slipping or not? -->
                                                    फ्रिक्शन क्लच स्लिप कर रहा है या नहीं
                                                </td>
                                                <td>
                                                    <input type="number" disabled id="friction_c_s"
                                                        class="form-control">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td style="vertical-align: middle;" colspan="2">
                                                    Track Locking Test
                                                </td>
                                                <td>
                                                    <input type="number" disabled id="track_locking"
                                                        class="form-control">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td style="vertical-align: middle;" colspan="2">
                                                    <!-- Remark's inspection/brief description of maintenance -->
                                                    रिमार्क एवं निरिक्षण/अनुरक्षण का सञ्चिपट विवरण
                                                </td>
                                                <td>
                                                    <input type="number" disabled id="remark_brief"
                                                        class="form-control">
                                                </td>
                                            </tr>






                                        </tbody>
                                    </table>
                                </td>

                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Checking of feed disconnection time under obstruction is not less than 10 Seconds.
                                </td>
                                <td>
                                    <input type="text" disabled class="custom-select EP2Class" id="EP2_2">

                                </td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Ensure Hose pipe/GI pipe in good condition and without gaps/access.</td>
                                <td>
                                    <input type="text" disabled class="custom-select EP2Class" id="EP2_3">

                                </td>
                            </tr>
                            <tr>
                                <th scope="row">4</th>
                                <td>Check MS pins of Switch Extension piece/‘P’ bracket for any rib formation or
                                    excessive
                                    wear.</td>
                                <td>
                                    <input type="text" disabled class="custom-select EP2Class" id="EP2_4">

                                </td>
                            </tr>
                            <tr>
                                <th scope="row">5</th>
                                <td>
                                    In case of Clamp type point machine, Lubricate the following moving parts of the
                                    clamp
                                    lock.
                                    <div>
                                        <ol type="a">
                                            <li>Stock rail bracket groove.</li>
                                            <li>Moving part of tongue rail and lock arm assembly. </li>
                                            <li> Between machine of lock bar and lock arm assembly</li>
                                        </ol>
                                    </div>

                                </td>
                                <td style="vertical-align: middle;">
                                    <input type="text" disabled class="custom-select EP2Class" id="EP2_5">

                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>

            </div>


            <div class="card-footer d-flex justify-content-end">
                <div id="ep2Form_status"></div>
                <!-- <button type='button' id="ep2FormBtn" class="btn btn-success">Final Submit</button> -->
                <button type='button' id="ep2PdfBtn" onclick="generatePdf('EP2','pdfBodyEP2')"
                    class="btn btn-success btn-sm">PDF</button>
                <button type="button" class="btn btn-sm btn-secondary mx-2" data-dismiss="modal" aria-label="Close">
                    Close
                </button>

            </div>

        </div>
    </div>
</div>

<!-- Modal EP4 -->
<div class="modal fade" id="componentForm_EP4" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="componentFormLabel4" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div id="pdfBodyEP4">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="componentFormLabel4">
                        <span class="badge badge-success h3">
                            Schedule Code: EP4
                        </span>

                        <!-- <span id="modalSubCompoName"></span>
                    <span class="badge badge-danger h3" id="modalSubCompoType"></span> -->
                    </h5>
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> -->
                </div>
                <div class="row mx-2 px-2 py-1">
                    <div class="col-6">
                        <span>Name:</span>
                        <span class="ml-2 font-weight-bold">
                            <?php echo $_SESSION['userretailerempName'] ?? '...' ; ?>

                        </span>

                    </div>
                    <div class="col-6">
                        <span>Id:</span>
                        <span class="ml-2 font-weight-bold">

                            <?php echo $_SESSION['userretailer']; ?>
                        </span>

                    </div>

                    <div class="col-6">
                        <span>Section:</span>
                        <span class="ml-2 font-weight-bold">
                        <?php echo $empSectionName;?>
                        </span>
                    </div>
                    <div class="col-6">
                    <span>Station:</span>

                    <span class="ml-2 font-weight-bold">
                    <?php echo $empStationName;?>

                    </span>

                    </div>
                </div>
                <div class="m-2 text-center alert alert-danger" style="font-size:13px">

                    Periodicity: Technician(Signal): Quarterly Sectional SSE/JE(Signal): Half-yearly
                    SSE(Signal)/Incharge :
                    Yearly
                </div>
                <div class="modal-body table-responsive">
                    <!-- <form id="modalFormComponent">
                   
                </form> -->
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">S.No</th>
                                <th scope="col">Check the following</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="ep4_body">

                        </tbody>
                    </table>
                </div>


            </div>

            <div class="card-footer d-flex justify-content-end">
                <!-- <div id="ep4Form_status"></div> -->
                <!-- <button type='button' id="ep4FormBtn" class="btn btn-success">Final Submit</button> -->
                <button type='button' id="ep4PdfBtn" onclick="generatePdf('EP4','pdfBodyEP4')"
                    class="btn btn-success btn-sm">PDF</button>
                <button type="button" class="btn btn-sm btn-secondary mx-2" data-dismiss="modal" aria-label="Close">
                    Close
                </button>

            </div>

        </div>
    </div>
</div>

<!-- Modal EP5 -->
<div class="modal fade" id="componentForm_EP5" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="componentFormLabel4" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

            <div id="pdfBodyEP5">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="componentFormLabel5">
                        <span class="badge badge-success h3">
                            Schedule Code: EP5
                        </span>

                        <!-- <span id="modalSubCompoName"></span>
                    <span class="badge badge-danger h3" id="modalSubCompoType"></span> -->
                    </h5>
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> -->
                </div>

                <div class="row mx-2 px-2 py-1">
                    <div class="col-6">
                        <span>Name:</span>
                        <span class="ml-2 font-weight-bold">
                            <?php echo $_SESSION['userretailerempName'] ?? '...' ; ?>

                        </span>

                    </div>
                    <div class="col-6">
                        <span>Id:</span>
                        <span class="ml-2 font-weight-bold">

                            <?php echo $_SESSION['userretailer']; ?>
                        </span>

                    </div>

                    <div class="col-6">
                        <span>Section:</span>
                        <span class="ml-2 font-weight-bold">
                        <?php echo $empSectionName;?>
                        </span>
                    </div>
                    <div class="col-6">
                    <span>Station:</span>

                    <span class="ml-2 font-weight-bold">
                    <?php echo $empStationName;?>

                    </span>

                    </div>
                </div>
                <div class="m-2 text-center alert alert-danger" style="font-size:13px">

                    Periodicity: Sectional JSSE/JE(Signal): Half-yearly SSE(Signal)/Incharge : Yearly
                </div>
                <div class="modal-body table-responsive">
                    <!-- <form id="modalFormComponent">
                   
                </form> -->
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">S.No</th>
                                <th scope="col">Check the following</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="ep5_body">

                        </tbody>
                    </table>
                </div>

            </div>


            <div class="card-footer d-flex justify-content-end">
                <!-- <div id="ep5Form_status"></div>
                <button type='button' id="ep5FormBtn" class="btn btn-success">Final Submit</button> -->
                <button type='button' id="ep5PdfBtn" onclick="generatePdf('EP5','pdfBodyEP5')"
                    class="btn btn-success btn-sm">PDF</button>
                <button type="button" class="btn btn-sm btn-secondary mx-2" data-dismiss="modal" aria-label="Close">
                    Close
                </button>

            </div>

        </div>
    </div>
</div>


<!-- Modal T1 -->
<div class="modal fade" id="componentForm_T1" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="componentFormLabelT1" aria-hidden="true">
    <div class="modal-dialog" style="max-width:100%">
        <!--  modal-dialog-centered modal-lg -->
        <div class="modal-content">
            <div id="pdfBodyT1">

                <div class="modal-header">
                    <h5 class="modal-title text-center" id="componentFormLabelT1">
                        <span class="badge badge-success h3">
                            Schedule Code: T1
                        </span>

                        <!-- <span id="modalSubCompoName"></span>
                    <span class="badge badge-danger h3" id="modalSubCompoType"></span> -->
                    </h5>
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> -->
                </div>
                <div class="row mx-2 px-2 py-1">
                    <div class="col-6">
                        <span>Name:</span>
                        <span class="ml-2 font-weight-bold">
                            <?php echo $_SESSION['userretailerempName'] ?? '...' ; ?>

                        </span>

                    </div>
                    <div class="col-6">
                        <span>Id:</span>
                        <span class="ml-2 font-weight-bold">

                            <?php echo $_SESSION['userretailer']; ?>
                        </span>

                    </div>

                    <div class="col-6">
                        <span>Section:</span>
                        <span class="ml-2 font-weight-bold">
                        <?php echo $empSectionName;?>
                        </span>
                    </div>
                    <div class="col-6">
                    <span>Station:</span>

                    <span class="ml-2 font-weight-bold">
                    <?php echo $empStationName;?>

                    </span>

                    </div>
                </div>
                <div class="m-2 text-center alert alert-danger" style="font-size:13px">

                    Periodicity: Technician(Signal): Fortnightly Sectional SSE/JE(Signal): Monthly SSE (Signal)/Incharge
                    :
                    Quarterly

                </div>
                <div class="modal-body table-responsive">
                    <!-- <form id="modalFormComponent">
                   
                </form> -->
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">S.No</th>
                                <th scope="col">Check the following</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="t1_body">

                        </tbody>

                        <tbody>
                            <tr>
                                <td colspan="3">
                                    <table class="table table-bordered">
                                        <thead class="text-center table-dark">
                                            <tr>
                                                <td rowspan="3">Date</td>
                                                <td colspan="6">SPG and Volt</td>
                                                <td rowspan="3"> Charging V</td>
                                                <td rowspan="3">Current V</td>
                                                <td rowspan="3"> --- </td>
                                                <td rowspan="3"> िफड इंड पर वोल्टेज</td>
                                                <td rowspan="3">Near Block</td>
                                                <td rowspan="3">Wire status</td>
                                                <td rowspan="3">Remark</td>

                                            </tr>
                                            <tr>
                                                <td colspan="2">Sale 1</td>
                                                <td colspan="2">Sale 2</td>
                                                <td colspan="2">Sale 3</td>

                                            </tr>
                                            <tr>
                                                <td>SPG</td>
                                                <td>V</td>
                                                <td>SPG</td>
                                                <td>V</td>
                                                <td>SPG</td>
                                                <td>V</td>

                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td><input id="date1" class="form-control" type="date" disable="true"
                                                        readonly></td>
                                                <td><input id="sale1_spg" class="form-control" type="text"
                                                        disable="true" readonly></td>
                                                <td><input id="sale1_v" class="form-control" type="text" disable="true"
                                                        readonly></td>
                                                <td><input id="sale2_spg" class="form-control" type="text"
                                                        disable="true" readonly></td>
                                                <td><input id="sale2_v" class="form-control" type="text" disable="true"
                                                        readonly></td>
                                                <td><input id="sale3_spg" class="form-control" type="text"
                                                        disable="true" readonly></td>
                                                <td><input id="sale3_v" class="form-control" type="text" disable="true"
                                                        readonly></td>
                                                <td><input id="charging_v" class="form-control" type="text"
                                                        disable="true" readonly></td>
                                                <td><input id="charging_current" class="form-control" type="text"
                                                        disable="true" readonly></td>
                                                <td></td>
                                                <td><input id="feedVoltage" class="form-control" type="text"
                                                        disable="true" readonly></td>
                                                <td><input id="nearBlock" class="form-control" type="text"
                                                        disable="true" readonly></td>
                                                <td><input id="wireStatus" class="form-control" type="text"
                                                        disable="true" readonly></td>
                                                <td><input id="remark1" class="form-control" type="text" disable="true"
                                                        readonly></td>


                                            </tr>
                                        </tbody>
                                        <thead class="table-dark">
                                            <tr>
                                                <td>Date</td>
                                                <td>Rail Volt</td>
                                                <td>VT (PU Value < 250/300%)</td>
                                                <td>Wire status</td>
                                                <td>Magnetic Part</td>
                                                <td></td>
                                                <td>Rail Flag</td>
                                                <td>Wire status</td>
                                                <td>Remark</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input id="date2" class="form-control" type="text" disable="true"
                                                        readonly></td>
                                                <td><input id="railVoltage" class="form-control" type="text"
                                                        disable="true" readonly></td>
                                                <td><input id="vt_value" class="form-control" type="text" disable="true"
                                                        readonly></td>
                                                <td><input id="wireStatus2" class="form-control" type="text"
                                                        disable="true" readonly></td>
                                                <td><input id="magneticPart" class="form-control" type="text"
                                                        disable="true" readonly></td>
                                                <td></td>
                                                <td><input id="railFlag2" class="form-control" type="text"
                                                        disable="true" readonly></td>
                                                <td><input id="jumberwireStatus" class="form-control" type="text"
                                                        disable="true" readonly></td>
                                                <td><input id="remark2" class="form-control" type="text" disable="true"
                                                        readonly></td>
                                            </tr>

                                        </tbody>
                                    </table>



                                </td>
                            </tr>
                        </tbody>


                    </table>


                </div>

            </div>


            <div class="card-footer d-flex justify-content-end">
                <div id="t1Form_status"></div>
                <!-- <button type='button' id="t1FormBtn" class="btn btn-success">Final Submit</button> -->
                <button type='button' id="t1PdfBtn" onclick="generatePdf('T2','pdfBodyT1')"
                    class="btn btn-success btn-sm">PDF</button>
                <button type="button" class="btn btn-sm btn-secondary mx-2" data-dismiss="modal" aria-label="Close">
                    Close
                </button>

            </div>

        </div>
    </div>
</div>


<!-- Modal T2 -->
<div class="modal fade" id="componentForm_T2" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="componentFormLabelT2" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div id="pdfBodyT2">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="componentFormLabelT2">
                        <span class="badge badge-success h3">
                            Schedule Code: T2
                        </span>

                        <!-- <span id="modalSubCompoName"></span>
                    <span class="badge badge-danger h3" id="modalSubCompoType"></span> -->
                    </h5>
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> -->
                </div>

                <div class="row mx-2 px-2 py-1">
                    <div class="col-6">
                        <span>Name:</span>
                        <span class="ml-2 font-weight-bold">
                            <?php echo $_SESSION['userretailerempName'] ?? '...' ; ?>

                        </span>

                    </div>
                    <div class="col-6">
                        <span>Id:</span>
                        <span class="ml-2 font-weight-bold">

                            <?php echo $_SESSION['userretailer']; ?>
                        </span>

                    </div>

                    <div class="col-6">
                        <span>Section:</span>
                        <span class="ml-2 font-weight-bold">
                        <?php echo $empSectionName;?>
                        </span>
                    </div>
                    <div class="col-6">
                    <span>Station:</span>

                    <span class="ml-2 font-weight-bold">
                    <?php echo $empStationName;?>

                    </span>

                    </div>
                </div>
                <div class="m-2 text-center alert alert-danger" style="font-size:13px">

                    Periodicity: Technician(Signal): Fortnightly Sectional SSE/JE(Signal): Monthly SSE (Signal)/Incharge
                    :
                    Quarterly

                </div>
                <div class="modal-body table-responsive">
                    <!-- <form id="modalFormComponent">
                   
                </form> -->
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">S.No</th>
                                <th scope="col">Check the following</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="t2_body">

                        </tbody>
                    </table>
                </div>
            </div>


            <div class="card-footer d-flex justify-content-end">
                <div id="t2Form_status"></div>
                <!-- <button type='button' id="t2FormBtn" class="btn btn-success">Final Submit</button> -->
                <button type='button' id="t2PdfBtn" onclick="generatePdf('T2','pdfBodyT1')"
                    class="btn btn-success btn-sm">PDF</button>
                <button type="button" class="btn btn-sm btn-secondary mx-2" data-dismiss="modal" aria-label="Close">
                    Close
                </button>


            </div>

        </div>
    </div>
</div>

<!-- Modal T3 -->
<div class="modal fade" id="componentForm_T3" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="componentFormLabelT3" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

            <div id="pdfBodyT3">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="componentFormLabelT3">
                        <span class="badge badge-success h3">
                            Schedule Code: T3
                        </span>

                        <!-- <span id="modalSubCompoName"></span>
                    <span class="badge badge-danger h3" id="modalSubCompoType"></span> -->
                    </h5>
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> -->
                </div>
                <div class="row mx-2 px-2 py-1">
                    <div class="col-6">
                        <span>Name:</span>
                        <span class="ml-2 font-weight-bold">
                            <?php echo $_SESSION['userretailerempName'] ?? '...' ; ?>

                        </span>

                    </div>
                    <div class="col-6">
                        <span>Id:</span>
                        <span class="ml-2 font-weight-bold">

                            <?php echo $_SESSION['userretailer']; ?>
                        </span>

                    </div>

                    <div class="col-6">
                        <span>Section:</span>
                        <span class="ml-2 font-weight-bold">
                        <?php echo $empSectionName;?>
                        </span>
                    </div>
                    <div class="col-6">
                    <span>Station:</span>

                    <span class="ml-2 font-weight-bold">
                    <?php echo $empStationName;?>

                    </span>

                    </div>
                </div>
                <div class="m-2 text-center alert alert-danger" style="font-size:13px">

                    Periodicity: Technician(Signal): Fortnightly Sectional SSE/JE(Signal): Monthly SSE (Signal)/Incharge
                    :
                    Quarterly

                </div>
                <div class="modal-body table-responsive">
                    <!-- <form id="modalFormComponent">
                   
                </form> -->
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">S.No</th>
                                <th scope="col">Check the following</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="t3_body">

                        </tbody>
                    </table>
                </div>

            </div>


            <div class="card-footer d-flex justify-content-end">
                <div id="t3Form_status"></div>
                <!-- <button type='button' id="t3FormBtn" class="btn btn-success">Final Submit</button> -->
                <button type='button' id="t3PdfBtn" onclick="generatePdf('T3','pdfBodyT1')"
                    class="btn btn-success btn-sm">PDF</button>

                <button type="button" class="btn btn-sm btn-secondary mx-2" data-dismiss="modal" aria-label="Close">
                    Close
                </button>

            </div>

        </div>
    </div>
</div>


<!-- Modal T5 -->
<div class="modal fade" id="componentForm_T5" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="componentFormLabelT5" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

            <div id="pdfBodyT5">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="componentFormLabelT5">
                        <span class="badge badge-success h3">
                            Schedule Code: T5
                        </span>

                        <!-- <span id="modalSubCompoName"></span>
                    <span class="badge badge-danger h3" id="modalSubCompoType"></span> -->
                    </h5>
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> -->
                </div>
                <div class="row mx-2 px-2 py-1">
                    <div class="col-6">
                        <span>Name:</span>
                        <span class="ml-2 font-weight-bold">
                            <?php echo $_SESSION['userretailerempName'] ?? '...' ; ?>

                        </span>

                    </div>
                    <div class="col-6">
                        <span>Id:</span>
                        <span class="ml-2 font-weight-bold">

                            <?php echo $_SESSION['userretailer']; ?>
                        </span>

                    </div>

                    <div class="col-6">
                        <span>Section:</span>
                        <span class="ml-2 font-weight-bold">
                        <?php echo $empSectionName;?>
                        </span>
                    </div>
                    <div class="col-6">
                    <span>Station:</span>

                    <span class="ml-2 font-weight-bold">
                    <?php echo $empStationName;?>

                    </span>

                    </div>
                </div>
                <div class="m-2 text-center alert alert-danger" style="font-size:13px">

                    Periodicity: Technician(Signal): Fortnightly Sectional SSE/JE(Signal): Monthly SSE (Signal)/Incharge
                    :
                    Quarterly

                </div>
                <div class="modal-body table-responsive">
                    <!-- <form id="modalFormComponent">
                   
                </form> -->
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">S.No</th>
                                <th scope="col">Check the following</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="t5_body">

                        </tbody>
                    </table>
                </div>

            </div>


            <div class="card-footer d-flex justify-content-end">
                <div id="t5Form_status"></div>
                <!-- <button type='button' id="t5FormBtn" class="btn btn-success">Final Submit</button> -->
                <button type='button' id="t5PdfBtn" onclick="generatePdf('T5','pdfBodyT5')"
                    class="btn btn-success btn-sm">PDF</button>
                <button type="button" class="btn btn-sm btn-secondary mx-2" data-dismiss="modal" aria-label="Close">
                    Close
                </button>

            </div>

        </div>
    </div>
</div>

<!-- Modal CS1 -->
<div class="modal fade" id="componentForm_CS1" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="componentFormLabelCS1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:100%;max-width:100%">
        <div class="modal-content">
            <div id="pdfBodyCS1">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="componentFormLabelCS1">
                        <span class="badge badge-success h3">
                            Schedule Code: CS1
                        </span>

                        <!-- <span id="modalSubCompoName"></span>
                    <span class="badge badge-danger h3" id="modalSubCompoType"></span> -->
                    </h5>
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> -->
                </div>
                <div class="row mx-2 px-2 py-1">
                    <div class="col-6">
                        <span>Name:</span>
                        <span class="ml-2 font-weight-bold">
                            <?php echo $_SESSION['userretailerempName'] ?? '...' ; ?>

                        </span>

                    </div>
                    <div class="col-6">
                        <span>Id:</span>
                        <span class="ml-2 font-weight-bold">

                            <?php echo $_SESSION['userretailer']; ?>
                        </span>

                    </div>

                    <div class="col-6">
                        <span>Section:</span>
                        <span class="ml-2 font-weight-bold">
                        <?php echo $empSectionName;?>
                        </span>
                    </div>
                    <div class="col-6">
                    <span>Station:</span>

                    <span class="ml-2 font-weight-bold">
                    <?php echo $empStationName;?>

                    </span>

                    </div>
                </div>
                <div class="m-2 text-center alert alert-danger" style="font-size:13px">

                    Periodicity: Technician(Signal): Monthly, Sectional SSE/JE(Signal): Quarterly, SSE(Signal)/In
                    charge:
                    Half yearly

                </div>
                <div class="modal-body table-responsive">
                    <!-- <form id="modalFormComponent">
                   
                </form> -->
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">S.No</th>
                                <th scope="col">Check the following</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="cs1_body">
                            <tr>
                                <th scope="row">1</th>
                                <td>Cleaning of LED lighting unit & current regulator/integrated LED, all terminations,
                                    housing, signal units & around signal post.</td>
                                <td style="vertical-align:middle;width:16%">
                                    <input class="form-control CS1Class" disable="true" readonly id="cs1_1">

                                </td>
                            </tr>



                            <tr>
                                <th scope="row" rowspan="6">2</th>
                                <td>Measurement of input voltage & current with clamp type ammeter at input terminals of
                                    current regulator/LED signal for all signal aspects and V/I reading shall be within
                                    specified range as below:</td>
                                <td rowspan="6" style="vertical-align:middle;width:16%">
                                    <input class="form-control CS1Class" disable="true" readonly id="cs1_2">

                                </td>

                            </tr>
                            <tr>
                                <td>(a) Main signal Voltage: 82.5 to137.5 V and Current: 112 to 154 mA</td>

                            </tr>

                            <tr>
                                <td>(b) Calling on/A/AG Marker Voltage: 88 to 132 V and current: 120 to 165 mA.</td>
                            </tr>
                            <tr>
                                <td>(c) Route signal Voltage: 88 to 132 V and Current: 23.75 to 26.25 mA per LED.</td>
                            </tr>
                            <tr>
                                <td>(d) Shunt signal Voltage: 88 to 132 V and Current: 52.25 to 57.75 mA per LED.</td>
                            </tr>
                            <tr>
                                <td>
                                    <table class="table table-bordered">
                                        <thead class="text-center table-dark">
                                            <tr>
                                                <td rowspan="2">Date</td>
                                                <td colspan="7">LED</td>
                                                <td rowspan="2"> Nut Bolt </td>
                                                <td rowspan="2"> Dom Clean</td>
                                                <td rowspan="2"> Cover</td>
                                                <td rowspan="2">Remark </td>
                                            </tr>

                                            <tr>
                                                <td>RG</td>
                                                <td>HG</td>
                                                <td>DG</td>
                                                <td>HHG</td>
                                                <td>ROUTE</td>
                                                <td>C-ON</td>
                                                <td>Shunt</td>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td><input id="date" readonly disable="true" class="form-control"
                                                        type="date"></td>
                                                <td><input id="rg" readonly disable="true" class="form-control"
                                                        type="text">
                                                </td>
                                                <td><input id="hg" readonly disable="true" class="form-control"
                                                        type="text">
                                                </td>
                                                <td><input id="dg" readonly disable="true" class="form-control"
                                                        type="text">
                                                </td>
                                                <td><input id="hhg" readonly disable="true" class="form-control"
                                                        type="text"></td>
                                                <td><input id="route" readonly disable="true" class="form-control"
                                                        type="text"></td>
                                                <td><input id="c_on" readonly disable="true" class="form-control"
                                                        type="text"></td>
                                                <td><input id="shout" readonly disable="true" class="form-control"
                                                        type="text"></td>
                                                <td><input id="nut_bolt" readonly disable="true" class="form-control"
                                                        type="text"></td>
                                                <td><input id="dome_clean" readonly disable="true" class="form-control"
                                                        type="text"></td>

                                                <td><input id="cover" readonly disable="true" class="form-control"
                                                        type="text"></td>
                                                <td><input id="remark" readonly disable="true" class="form-control"
                                                        type="text"></td>


                                            </tr>
                                        </tbody>

                                    </table>

                                </td>
                            </tr>

                            <tr>
                                <th scope="row">3</th>
                                <td>
                                    Checking of tightness of all adjusting screws of LED signal unit as well as Current
                                    regulator/integrated LED.

                                </td>
                                <td style="vertical-align:middle;width:16%">
                                    <input class="form-control CS1Class" disable="true" readonly id="cs1_3">

                                </td>
                            </tr>

                            <tr>
                                <th scope="row">4</th>
                                <td>
                                    Ensure condition of signal post is satisfactory.

                                </td>
                                <td style="vertical-align:middle;width:16%">
                                    <input class="form-control CS1Class" disable="true" readonly id="cs1_4">

                                </td>
                            </tr>

                            <tr>
                                <th scope="row">5</th>
                                <td>
                                    Check condition of Signal foundation, ladder & ensure proper alignment of signal
                                    post.

                                </td>
                                <td style="vertical-align:middle;width:16%">
                                    <input class="form-control CS1Class" disable="true" readonly id="cs1_5">

                                </td>
                            </tr>

                            <tr>
                                <th scope="row">6</th>
                                <td>
                                    Ensure Signal unit condition, closing of door & locking arrangements are
                                    satisfactory.

                                </td>
                                <td style="vertical-align:middle;width:16%">
                                    <input class="form-control CS1Class" disable="true" readonly id="cs1_6">

                                </td>
                            </tr>

                            <tr>
                                <th scope="row">7</th>
                                <td>
                                    Ensure Signal post & CLS unit should be earthed & screen earthing is effective.
                                </td>
                                <td style="vertical-align:middle;width:16%">
                                    <input class="form-control CS1Class" disable="true" readonly id="cs1_7">

                                </td>
                            </tr>

                            <tr>
                                <th scope="row">8</th>
                                <td>
                                    Complete signal unit should be cleaned for removing oxidation, rusting & tightened
                                    properly.
                                </td>
                                <td style="vertical-align:middle;width:16%">
                                    <input class="form-control CS1Class" disable="true" readonly id="cs1_8">

                                </td>
                            </tr>

                            <tr>
                                <th scope="row">9</th>
                                <td>
                                    Ensure that there is no opening/access for rain water/rodent entry.

                                </td>
                                <td style="vertical-align:middle;width:16%">
                                    <input class="form-control CS1Class" disable="true" readonly id="cs1_9">

                                </td>
                            </tr>

                            <tr>
                                <th scope="row">10</th>
                                <td>
                                    Ensure the cable terminations in location box should be cleaned for removing
                                    oxidation,
                                    rusting & tightened properly.

                                </td>
                                <td style="vertical-align:middle;width:16%">
                                    <input class="form-control CS1Class" disable="true" readonly id="cs1_10">

                                </td>
                            </tr>

                            <tr>
                                <th scope="row">11</th>
                                <td>
                                    Visual check of insulations of cables, PVC wires, proper termination without criss
                                    cross, condition of rubber gasket arrangement.

                                </td>
                                <td style="vertical-align:middle;width:16%">
                                    <input class="form-control CS1Class" disable="true" readonly id="cs1_11">

                                </td>
                            </tr>

                            <tr>
                                <th rowspan="3" scope="row">12</th>
                                <td>
                                    (a) Check that where signals are Infringing with SOD, their Implantation distance is
                                    marked on Red colour on white back ground.
                                </td>
                                <td style="vertical-align:middle;width:16%">
                                    <input class="form-control CS1Class" disable="true" readonly id="cs1_12a">

                                </td>
                            </tr>

                            <tr>
                                <td>
                                    (b) Blanking off to be done as given in chapter 19 of SEM.
                                </td>
                                <td style="vertical-align:middle;width:16%">
                                    <input class="form-control CS1Class" disable="true" readonly id="cs1_12b">

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    (c) Right hand signals to be provided with an arrow mark pointing towards the
                                    relevant
                                    track.
                                </td>
                                <td style="vertical-align:middle;width:16%">
                                    <input class="form-control CS1Class" disable="true" readonly id="cs1_12c">

                                </td>
                            </tr>

                        </tbody>



                    </table>


                    </table>
                </div>
            </div>


            <div class="card-footer d-flex justify-content-end">
                <div id="cs1Form_status"></div>
                <!-- <button type='button' id="cs1FormBtn" class="btn btn-success">Final Submit</button> -->
                <button type='button' id="cs1PdfBtn" onclick="generatePdf('CS1','pdfBodyCS1')"
                    class="btn btn-success btn-sm">PDF</button>

                <button type="button" class="btn btn-sm btn-secondary mx-2" data-dismiss="modal" aria-label="Close">
                    Close
                </button>

            </div>

        </div>
    </div>
</div>

<!-- Modal CS2 -->
<div class="modal fade" id="componentForm_CS2" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="componentFormLabelCS2" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div id="pdfBodyCS2">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="componentFormLabelCS2">
                        <span class="badge badge-success h3">
                            Schedule Code: CS2
                        </span>

                        <!-- <span id="modalSubCompoName"></span>
                    <span class="badge badge-danger h3" id="modalSubCompoType"></span> -->
                    </h5>
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> -->
                </div>
                <div class="row mx-2 px-2 py-1">
                    <div class="col-6">
                        <span>Name:</span>
                        <span class="ml-2 font-weight-bold">
                            <?php echo $_SESSION['userretailerempName'] ?? '...' ; ?>

                        </span>

                    </div>
                    <div class="col-6">
                        <span>Id:</span>
                        <span class="ml-2 font-weight-bold">

                            <?php echo $_SESSION['userretailer']; ?>
                        </span>

                    </div>

                    <div class="col-6">
                        <span>Section:</span>
                        <span class="ml-2 font-weight-bold">
                        <?php echo $empSectionName;?>
                        </span>
                    </div>
                    <div class="col-6">
                    <span>Station:</span>

                    <span class="ml-2 font-weight-bold">
                    <?php echo $empStationName;?>

                    </span>

                    </div>
                </div>
                <div class="m-2 text-center alert alert-danger" style="font-size:13px">
                    Periodicity: Sectional SSE/JE : Half yearly
                    <div>
                        SSE (signal)/Incharge : Yearly
                    </div>

                </div>
                <div class="modal-body table-responsive">
                    <!-- <form id="modalFormComponent">
                   
                </form> -->
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">S.No</th>
                                <th scope="col">Check the following</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="cs2_body">

                        </tbody>
                    </table>
                </div>
            </div>


            <div class="card-footer d-flex justify-content-end">
                <div id="cs2Form_status"></div>
                <!-- <button type='button' id="cs2FormBtn" class="btn btn-success">Final Submit</button> -->
                <button type='button' id="cs2PdfBtn" onclick="generatePdf('CS2','pdfBodyCS2')"
                    class="btn btn-success btn-sm">PDF</button>

                <button type="button" class="btn btn-sm btn-secondary mx-2" data-dismiss="modal" aria-label="Close">
                    Close
                </button>
            </div>

        </div>
    </div>
</div>

<!-- Modal DL1 -->
<div class="modal fade" id="componentForm_DL1" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="componentFormLabelDL1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div id="pdfBodyDL1">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="componentFormLabelDL1">
                        <span class="badge badge-success h3">
                            Schedule Code: DL1
                        </span>

                        <!-- <span id="modalSubCompoName"></span>
                    <span class="badge badge-danger h3" id="modalSubCompoType"></span> -->
                    </h5>
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> -->
                </div>
                <div class="row mx-2 px-2 py-1">
                    <div class="col-6">
                        <span>Name:</span>
                        <span class="ml-2 font-weight-bold">
                            <?php echo $_SESSION['userretailerempName'] ?? '...' ; ?>

                        </span>

                    </div>
                    <div class="col-6">
                        <span>Id:</span>
                        <span class="ml-2 font-weight-bold">

                            <?php echo $_SESSION['userretailer']; ?>
                        </span>

                    </div>

                    <div class="col-6">
                        <span>Section:</span>
                        <span class="ml-2 font-weight-bold">
                        <?php echo $empSectionName;?>
                        </span>
                    </div>
                    <div class="col-6">
                    <span>Station:</span>

                    <span class="ml-2 font-weight-bold">
                    <?php echo $empStationName;?>

                    </span>

                    </div>
                </div>
                <div class="m-2 text-center alert alert-danger" style="font-size:13px">
                    Periodicity: Technician (Signal): Monthly, Sectional SSE/JE (Signal): Quarterly, SSE
                    Signal/Incharge:
                    Half Yearly

                </div>
                <div class="modal-body table-responsive">
                    <!-- <form id="modalFormComponent">
                   
                </form> -->
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">S.No</th>
                                <th scope="col">Check the following</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="dl1_body">

                        </tbody>
                    </table>
                </div>
            </div>


            <div class="card-footer d-flex justify-content-end">
                <!-- <div id="dl1Form_status"></div>
                <button type='button' id="dl1FormBtn" class="btn btn-success">Final Submit</button> -->
                <button type='button' id="dl1PdfBtn" onclick="generatePdf('DL1','pdfBodyDL1')"
                    class="btn btn-success btn-sm">PDF</button>

                <button type="button" class="btn btn-sm btn-secondary mx-2" data-dismiss="modal" aria-label="Close">
                    Close
                </button>
            </div>

        </div>
    </div>
</div>

<!-- Modal DL2 -->
<div class="modal fade" id="componentForm_DL2" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="componentFormLabelDL2" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div id="pdfBodyDL2">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="componentFormLabelDL2">
                        <span class="badge badge-success h3">
                            Schedule Code: DL2
                        </span>

                        <!-- <span id="modalSubCompoName"></span>
                    <span class="badge badge-danger h3" id="modalSubCompoType"></span> -->
                    </h5>
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> -->
                </div>
                <div class="row mx-2 px-2 py-1">
                    <div class="col-6">
                        <span>Name:</span>
                        <span class="ml-2 font-weight-bold">
                            <?php echo $_SESSION['userretailerempName'] ?? '...' ; ?>

                        </span>

                    </div>
                    <div class="col-6">
                        <span>Id:</span>
                        <span class="ml-2 font-weight-bold">

                            <?php echo $_SESSION['userretailer']; ?>
                        </span>

                    </div>

                    <div class="col-6">
                        <span>Section:</span>
                        <span class="ml-2 font-weight-bold">
                        <?php echo $empSectionName;?>
                        </span>
                    </div>
                    <div class="col-6">
                    <span>Station:</span>

                    <span class="ml-2 font-weight-bold">
                    <?php echo $empStationName;?>

                    </span>

                    </div>
                </div>
                <div class="m-2 text-center alert alert-danger" style="font-size:13px">
                    Periodicity: Sectional SSE/JE(Signal): Half Yearly, <br>
                    SSE (Signal)/Incharge: Yearly

                </div>
                <div class="modal-body table-responsive">
                    <!-- <form id="modalFormComponent">
                   
                </form> -->
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">S.No</th>
                                <th scope="col">Check the following</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="dl2_body">

                        </tbody>
                    </table>
                </div>
            </div>


            <div class="card-footer d-flex justify-content-end">
                <!-- <div id="dl2Form_status"></div>
                <button type='button' id="dl2FormBtn" class="btn btn-success">Final Submit</button> -->
                <button type='button' id="dl2PdfBtn" onclick="generatePdf('DL2','pdfBodyDL2')"
                    class="btn btn-success btn-sm">PDF</button>

                <button type="button" class="btn btn-sm btn-secondary mx-2" data-dismiss="modal" aria-label="Close">
                    Close
                </button>
            </div>

        </div>
    </div>
</div>

<!-- Modal DL3 -->
<div class="modal fade" id="componentForm_DL3" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="componentFormLabelDL3" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div id="pdfBodyDL3">

                <div class="modal-header">
                    <h5 class="modal-title text-center" id="componentFormLabelDL3">
                        <span class="badge badge-success h3">
                            Schedule Code: DL3
                        </span>
                    </h5>
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> -->
                </div>
                <div class="row mx-2 px-2 py-1">
                    <div class="col-6">
                        <span>Name:</span>
                        <span class="ml-2 font-weight-bold">
                            <?php echo $_SESSION['userretailerempName'] ?? '...' ; ?>

                        </span>

                    </div>
                    <div class="col-6">
                        <span>Id:</span>
                        <span class="ml-2 font-weight-bold">

                            <?php echo $_SESSION['userretailer']; ?>
                        </span>

                    </div>

                    <div class="col-6">
                        <span>Section:</span>
                        <span class="ml-2 font-weight-bold">
                        <?php echo $empSectionName;?>
                        </span>
                    </div>
                    <div class="col-6">
                    <span>Station:</span>

                    <span class="ml-2 font-weight-bold">
                    <?php echo $empStationName;?>

                    </span>

                    </div>
                </div>
                <div class="m-2 text-center alert alert-danger" style="font-size:13px">
                    Periodicity: Sectional SSE/JE(Signal): Yearly, SSE (Signal)/Incharge: Yearly

                </div>
                <div class="modal-body table-responsive">
                    <!-- <form id="modalFormComponent">
                   
                </form> -->
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">S.No</th>
                                <th scope="col">Check the following</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="dl3_body">

                        </tbody>
                    </table>
                </div>

            </div>


            <div class="card-footer d-flex justify-content-end">
                <!-- <div id="dl3Form_status"></div>
                <button type='button' id="dl3FormBtn" class="btn btn-success">Final Submit</button> -->
                <button type='button' id="dl3PdfBtn" onclick="generatePdf('DL3','pdfBodyDL3')"
                    class="btn btn-success btn-sm">PDF</button>

                <button type="button" class="btn btn-sm btn-secondary mx-2" data-dismiss="modal" aria-label="Close">
                    Close
                </button>
            </div>

        </div>
    </div>
</div>

<!-- Modal DL4 -->
<div class="modal fade" id="componentForm_DL4" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="componentFormLabelDL4" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div id="pdfBodyDL4">

                <div class="modal-header">
                    <h5 class="modal-title text-center" id="componentFormLabelDL4">
                        <span class="badge badge-success h3">
                            Schedule Code: DL4 (only for SSE/DLMC)
                        </span>
                    </h5>
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> -->
                </div>
                <div class="row mx-2 px-2 py-1">
                    <div class="col-6">
                        <span>Name:</span>
                        <span class="ml-2 font-weight-bold">
                            <?php echo $_SESSION['userretailerempName'] ?? '...' ; ?>

                        </span>

                    </div>
                    <div class="col-6">
                        <span>Id:</span>
                        <span class="ml-2 font-weight-bold">

                            <?php echo $_SESSION['userretailer']; ?>
                        </span>

                    </div>

                    <div class="col-6">
                        <span>Section:</span>
                        <span class="ml-2 font-weight-bold">
                        <?php echo $empSectionName;?>
                        </span>
                    </div>
                    <div class="col-6">
                    <span>Station:</span>

                    <span class="ml-2 font-weight-bold">
                    <?php echo $empStationName;?>

                    </span>

                    </div>
                </div>
                <div class="m-2 text-center alert alert-danger" style="font-size:13px">
                    Periodicity: SSE (Signal)/Incharge: Yearly
                </div>
                <div class="modal-body table-responsive">
                    <!-- <form id="modalFormComponent">
                   
                </form> -->
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">S.No</th>
                                <th scope="col">Check the following</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="dl4_body">

                        </tbody>
                    </table>
                </div>

            </div>


            <div class="card-footer d-flex justify-content-end">
                <!-- <div id="dl4Form_status"></div>
                <button type='button' id="dl4FormBtn" class="btn btn-success">Final Submit</button> -->
                <button type='button' id="dl4PdfBtn" onclick="generatePdf('DL4','pdfBodyDL4')"
                    class="btn btn-success btn-sm">PDF</button>

                <button type="button" class="btn btn-sm btn-secondary mx-2" data-dismiss="modal" aria-label="Close">
                    Close
                </button>
            </div>

        </div>
    </div>
</div>


<script>
var g_st_compList = [];
var colorArr = ['btn-info', 'btn-success', 'btn-warning', 'btn-primary', 'btn-secondary', 'btn-dark', 'btn-danger'];
var formDataList = {};


window.jsPDF = window.jspdf.jsPDF;


function generatePdf(formType, html_Id) {
    console.log("from type", formType);
    console.log("html type", html_Id);

    var doc = new jsPDF();

    // Source HTMLElement or a string containing HTML.
    var elementHTML = document.querySelector("#" + html_Id);

    doc.html(elementHTML, {
        callback: function(doc) {
            // Save the PDF
            // doc.save('sample-document.pdf');
            doc.save(formType + '.pdf');
            // doc.save();
        },
        margin: [10, 10, 10, 10],
        autoPaging: 'text',
        x: 0,
        y: 0,
        // filename: formType+'.pdf',
        width: 190, //target width in the PDF document
        windowWidth: 675 //window width in CSS pixels
    });


}

function generatePdfDemo() {

    window.jsPDF = window.jspdf.jsPDF;
    var doc = new jsPDF();

    doc.text(20, 20, 'Hello world!');
    doc.text(20, 30, 'This is client-side Javascript to generate a PDF.');

    // Add new page
    doc.addPage();
    doc.text(20, 20, 'Visit CodexWorld.com');

    // Save the PDF
    doc.save('document.pdf');

}

function updateSingleValue(value, tableName, columnName, id) {
    console.log("value", value);
    console.log("tableName", tableName);
    console.log("columnName", columnName);
    let userID = '<?php echo $_SESSION['userretailer']; ?>';
    if (userID == '' || userID == null || userID == undefined) {

        //  $("#t1Form_status").html("Something went wrong with user Id, Refresh the page and try again").css("color", "red");
        alert("Something went wrong with user Id, Refresh the page and try again");
        return
    }

    $.ajax({
        type: "POST",
        url: "./query/form-data-action.php",
        data: {
            action: "updateSingleValueFormData",
            value: value,
            tableName: tableName,
            columnName: columnName.toLowerCase(),
            userID: userID,
            id: id
        },
        beforeSend: function() {

        },
        success: function(response) {
            console.log("update single respo", response);
        }
    });

}

function openDialog(typeOfForm, dataList, id) {

    let tableId = '';
    let displayHtml = "";

    let tableDataForm = formDataList[typeOfForm].filter((x) => {
        if (x['id'] == id) {
            return x;
        }
    })[0];

    switch (typeOfForm) {
        case "EP1":
            tableId = "ep1_body";
            $("#componentForm_EP1").modal("show");
            break;

        case "EP4":
            tableId = "ep4_body";
            $("#componentForm_EP4").modal("show");
            break;

        case "EP5":
            tableId = "ep5_body";
            $("#componentForm_EP5").modal("show");
            break;


    }


    dataList.forEach((element, index) => {

        let value = tableDataForm[element['ep_id'].toLowerCase()]
        displayHtml += `
        <tr>
        <th scope="row">${index+1}</th>
        <td>${element['ep_details']}</td>
        <td style="vertical-align:middle;width:22%" >`;

        if (value == 'Not Done') {

            displayHtml +=
                `<select class="form-control">
                <option>${value}</option>
                <option value='Done'>Done</option>
            </select> <button type="button" onclick="updateSingleValue('Done','${typeOfForm}','${element['ep_id']}','${tableDataForm['id']}')" class="btn btn-sm btn-success my-1">Update</button>`;

        } else {
            // displayHtml += `<input type="text" class="form-control" disabled value="${value}">`;
            displayHtml += `<div class="alert alert-success">${value}</div>`;
        }



        displayHtml += `
        </td>
        </tr>
    `;


    });

    document.getElementById(tableId).innerHTML = displayHtml;

}

function fillEP2FormData(id) {

    let ep2DataObj = formDataList[['EP2']].filter((x) => {
        if (x['id'] == id) {
            return x;
        }
    })[0];

    $("#componentForm_EP2").modal("show");
    $("#EP2_1").val(ep2DataObj['ep2_1']);
    $("#EP2_2").val(ep2DataObj['ep2_2']);
    $("#EP2_3").val(ep2DataObj['ep2_3']);
    $("#EP2_4").val(ep2DataObj['ep2_4']);
    $("#EP2_5").val(ep2DataObj['ep2_5']);

    $("#op_v_N_R").val(ep2DataObj['op_v_N_R']);
    $("#op_v_R_N").val(ep2DataObj['op_v_R_N']);
    $("#ob_v_N_R").val(ep2DataObj['ob_v_N_R']);
    $("#ob_v_R_N").val(ep2DataObj['ob_v_R_N']);
    $("#det_v_N_R").val(ep2DataObj['det_v_N_R']);
    $("#det_v_R_N").val(ep2DataObj['det_v_R_N']);
    $("#nwc_N_R").val(ep2DataObj['nwc_N_R']);
    $("#nwc_R_N").val(ep2DataObj['nwc_R_N']);
    $("#ob_sc_N_R").val(ep2DataObj['ob_sc_N_R']);
    $("#ob_sc_R_N").val(ep2DataObj['ob_sc_R_N']);
    $("#ob_t_N_R").val(ep2DataObj['ob_t_N_R']);
    // let ob_t_R_N = $("#ob_t_R_N").val();
    $("#gt_N_R").val(ep2DataObj['gt_N_R']);
    // let gt_R_N = $("#gt_R_N").val();
    $("#operatingTimeSecond").val(ep2DataObj['operatingTimeSecond']);
    $("#operatingTime_dbt").val(ep2DataObj['operatingTime_dbt']);
    $("#friction_c_s").val(ep2DataObj['friction_c_s']);
    $("#track_locking").val(ep2DataObj['track_locking']);
    $("#remark_brief").val(ep2DataObj['remark_brief']);
}


function showFormDetails(id, EPtype) {

    // where EPtype = is EP1, EP4, EP5

    // EP2 here

    if (EPtype == 'EP2') {
        fillEP2FormData(id);
        return;
    }

    if (id != '' && EPtype != '') {

        $.ajax({
            type: "POST",
            url: "./query/action.php",
            data: {
                "action": "getEP_FormDetails",
                "formType": EPtype,

            },
            beforeSend: function() {
                $("#loader_show").removeClass('d-none');


            },
            success: function(respo) {
                $("#loader_show").addClass('d-none');

                let response = JSON.parse(respo);

                if (response['status']) {

                    openDialog(EPtype, response['data'], id);

                }

            },
            complete: function() {
                $("#loader_show").addClass('d-none');

            }
        });

    } else {
        alert("Id is not set");
    }

}


//create t1
function createTradeT1FormCreate(typeOfForm, dataList, id) {

    let tableId = '';
    let displayHtml = "";
    let tableDataForm = formDataList[typeOfForm].filter((x) => {
        if (x['id'] == id) {
            return x;
        }
    })[0];

    tableId = "t1_body";
    $("#componentForm_T1").modal("show");


    dataList.forEach((element, index) => {

        let value = tableDataForm[element['t_id'].toLowerCase()]

        displayHtml += `
            <tr>
            <th scope="row">${index+1}</th>
            <td>${element['t_details']}</td>
            <td style="vertical-align:middle;width:22%" >
            <input type="text" class="form-control" disabled value="${value}"> `;


        // <option value="Done">Done</option>
        // <option value="Not Done">Not Done</option>
        displayHtml += `
            </td>
            </tr>
        `;


    });

    console.log("tableDataForm=>", tableDataForm);


    $("#date1").val(tableDataForm['date1']);
    $("#sale1_spg").val(tableDataForm['sale1_spg']);
    $("#sale1_v").val(tableDataForm['sale1_v']);
    $("#sale2_spg").val(tableDataForm['sale2_spg']);
    $("#sale2_v").val(tableDataForm['sale2_v']);
    $("#sale3_spg").val(tableDataForm['sale3_spg']);
    $("#sale3_v").val(tableDataForm['sale3_v']);
    $("#charging_v").val(tableDataForm['charging_v']);
    $("#charging_current").val(tableDataForm['charging_current']);
    $("#feedVoltage").val(tableDataForm['feedVoltage']);
    $("#nearBlock").val(tableDataForm['nearBlock']);
    $("#wireStatus").val(tableDataForm['wireStatus']);
    $("#remark1").val(tableDataForm['remark1']);

    $("#date2").val(tableDataForm['date2']);
    $("#railVoltage").val(tableDataForm['railVoltage']);
    $("#vt_value").val(tableDataForm['vt_value']);
    $("#wireStatus2").val(tableDataForm['wireStatus2']);
    $("#magneticPart").val(tableDataForm['magneticPart']);
    $("#railFlag2").val(tableDataForm['railFlag2']);
    $("#jumberwireStatus").val(tableDataForm['jumberwireStatus']);
    $("#remark2").val(tableDataForm['remark2']);

    document.getElementById(tableId).innerHTML = displayHtml;






}


//DL 


function openDialog_DL(typeOfForm, dataList, id) {

    let tableId = '';
    let displayHtml = "";

    let tableDataForm = formDataList[typeOfForm].filter((x) => {
        if (x['id'] == id) {
            return x;
        }
    })[0];

    switch (typeOfForm) {
        case "DL1":
            tableId = "dl1_body";
            $("#componentForm_DL1").modal("show");
            break;
        case "DL2":
            tableId = "dl2_body";
            $("#componentForm_DL2").modal("show");
            break;

        case "DL3":
            tableId = "dl3_body";
            $("#componentForm_DL3").modal("show");
            break;

        case "DL4":
            tableId = "dl4_body";
            $("#componentForm_DL4").modal("show");
            break;
    }


    dataList.forEach((element, index) => {

        let value = tableDataForm[element['dl_id'].toLowerCase()]

        if (typeOfForm == 'DL1') {

            let sn = index + 1;
            if (element['dl_id'] == 'dl1_8b') {
                sn = '';
            }

            if (element['dl_id'] == 'dl1_9') {
                sn = index;
            }

            displayHtml += `
        <tr>
        <th scope="row">${sn}</th>
        <td>${element['dl_details']}</td>
        <td style="vertical-align:middle;width:22%" >
        <input type="text" class="form-control" disabled value="${value}">

        </td>
        </tr>
    `;


        } else {

            displayHtml += `
        <tr>
        <th scope="row">${index+1}</th>
        <td>${element['dl_details']}</td>
        <td style="vertical-align:middle;width:22%" >
        <input type="text" class="form-control" disabled value="${value}">

        </td>
        </tr>
    `;

        }

    });

    document.getElementById(tableId).innerHTML = displayHtml;

}


// T Type form


function openDialog_CS(typeOfForm, dataList, id) {

    let tableId = '';
    let displayHtml = "";

    let tableDataForm = formDataList[typeOfForm].filter((x) => {
        if (x['id'] == id) {
            return x;
        }
    })[0];

    switch (typeOfForm) {
        // case "CS1":
        //     tableId = "cs1_body";
        //     $("#componentForm_CS1").modal("show");
        //     break;
        case "CS2":
            tableId = "cs2_body";
            $("#componentForm_CS2").modal("show");
            break;
    }


    dataList.forEach((element, index) => {

        let value = tableDataForm[element['cs_id'].toLowerCase()]


        if (element['cs_id'] == 'cs2_5') {
            let value_5a = tableDataForm['cs2_5a'];
            let value_5b = tableDataForm['cs2_5b'];



            displayHtml += `
        <tr>
            <th rowspan="3" scope="row">${index+1}</th>
            <td>Implantation distance from center line of nearest track along with an arrow indicating towards nearest track should be painted on signal post in following colours</td>
            <td style="vertical-align:middle;width:22%" >
              
            </td>
        </tr>

        <tr>
            <td>(a) Black on white background for normal implantation.</td>
            <td style="vertical-align:middle;width:22%" >
            <input type="text" class="form-control" disabled value="${value_5a}">

            </td>
        </tr>

        <tr>
            <td>(b) Red on white background for implantation distance < 2.36 meters.</td>
            <td style="vertical-align:middle;width:22%" >
            <input type="text" class="form-control" disabled value="${value_5b}">

            </td>
        </tr>
    `;

        } else {


            displayHtml += `
        <tr>
        <th scope="row">${index+1}</th>
        <td>${element['cs_details']}</td>
        <td style="vertical-align:middle;width:22%" >
        <input type="text" class="form-control" disabled value="${value}">

        </td>
        </tr>
    `;

        }




    });

    document.getElementById(tableId).innerHTML = displayHtml;

}


function openDialog_T(typeOfForm, dataList, id) {

    let tableId = '';
    let displayHtml = "";

    if (typeOfForm == "T1") {
        createTradeT1FormCreate(typeOfForm, dataList, id)
    }

    let tableDataForm = formDataList[typeOfForm].filter((x) => {
        if (x['id'] == id) {
            return x;
        }
    })[0];

    switch (typeOfForm) {
        // case "T1":
        //     tableId = "t1_body";
        //     $("#componentForm_T1").modal("show");
        //     break;
        case "T2":
            tableId = "t2_body";
            $("#componentForm_T2").modal("show");
            break;
        case "T3":
            tableId = "t3_body";
            $("#componentForm_T3").modal("show");
            break;

        case "T5":
            tableId = "t5_body";
            $("#componentForm_T5").modal("show");
            break;


    }


    dataList.forEach((element, index) => {

        let value = tableDataForm[element['t_id'].toLowerCase()]

        displayHtml += `
        <tr>
        <th scope="row">${index+1}</th>
        <td>${element['t_details']}</td>
        <td style="vertical-align:middle;width:22%" >
        <input type="text" class="form-control" disabled value="${value}"> `;


        // <option value="Done">Done</option>
        // <option value="Not Done">Not Done</option>
        displayHtml += `
        </td>
        </tr>
    `;


    });

    document.getElementById(tableId).innerHTML = displayHtml;

}

function get_T_formData(id, tType) {


    $.ajax({
        type: "POST",
        url: "./query/action.php",
        data: {
            "action": "getT_FormDetails",
            "formType": tType,

        },
        beforeSend: function() {
            $("#loader_show").removeClass('d-none');


        },
        success: function(respo) {
            $("#loader_show").addClass('d-none');

            let response = JSON.parse(respo);

            if (response['status']) {

                openDialog_T(tType, response['data'], id);

            }

        },
        complete: function() {
            $("#loader_show").addClass('d-none');

        }
    });
}

//  cs

function fillCS1FormData(id) {

    let cs1DataObj = formDataList[['CS1']].filter((x) => {
        if (x['id'] == id) {
            return x;
        }
    })[0];

    $("#componentForm_CS1").modal("show");

    $("#cs1_1").val(cs1DataObj['cs1_1']);
    $("#cs1_2").val(cs1DataObj['cs1_2']);
    $("#cs1_3").val(cs1DataObj['cs1_3']);
    $("#cs1_4").val(cs1DataObj['cs1_4']);
    $("#cs1_5").val(cs1DataObj['cs1_5']);

    $("#cs1_6").val(cs1DataObj['cs1_6']);
    $("#cs1_7").val(cs1DataObj['cs1_7']);
    $("#cs1_8").val(cs1DataObj['cs1_8']);
    $("#cs1_9").val(cs1DataObj['cs1_9']);
    $("#cs1_10").val(cs1DataObj['cs1_10']);
    $("#cs1_11").val(cs1DataObj['cs1_11']);
    $("#cs1_12a").val(cs1DataObj['cs1_12a']);
    $("#cs1_12b").val(cs1DataObj['cs1_12b']);
    $("#cs1_12c").val(cs1DataObj['cs1_12c']);
    $("#date").val(cs1DataObj['date']);
    $("#rg").val(cs1DataObj['rg']);
    $("#hg").val(cs1DataObj['hg']);
    // let gt_R_N = $("#gt_R_N").val();
    $("#dg").val(cs1DataObj['dg']);
    $("#hhg").val(cs1DataObj['hhg']);
    $("#route").val(cs1DataObj['route']);
    $("#c_on").val(cs1DataObj['c_on']);
    $("#shout").val(cs1DataObj['shout']);
    $("#nut_bolt").val(cs1DataObj['nut_bolt']);
    $("#dome_clean").val(cs1DataObj['dome_clean']);
    $("#cover").val(cs1DataObj['cover']);
    $("#remark").val(cs1DataObj['remark']);
}

function get_CS_formData(id, csType) {


    if (csType == 'CS1') {
        // openDialog_CS(csType,[],id);
        fillCS1FormData(id);

        return;
    }

    $.ajax({
        type: "POST",
        url: "./query/action.php",
        data: {
            "action": "getCS_FormDetails",
            "formType": csType,

        },
        beforeSend: function() {
            $("#loader_show").removeClass('d-none');


        },
        success: function(respo) {
            $("#loader_show").addClass('d-none');

            let response = JSON.parse(respo);

            if (response['status']) {

                openDialog_CS(csType, response['data'], id);

            }

        },
        complete: function() {
            $("#loader_show").addClass('d-none');

        }
    });
}

// 

function get_DL_formData(id, dlType) {


    // if(csType == 'CS1'){
    //     fillCS1FormData(id);

    //     return;
    // }

    $.ajax({
        type: "POST",
        url: "./query/action.php",
        data: {
            "action": "getDL_FormDetails",
            "formType": dlType,

        },
        beforeSend: function() {
            $("#loader_show").removeClass('d-none');


        },
        success: function(respo) {
            $("#loader_show").addClass('d-none');

            let response = JSON.parse(respo);

            if (response['status']) {

                openDialog_DL(dlType, response['data'], id);

            }

        },
        complete: function() {
            $("#loader_show").addClass('d-none');

        }
    });
}


function showTable(formKeyName, subcomponame) {
    console.log("keyName=", formKeyName);

    $("#mainTable").removeClass('d-none');

    let formData = formDataList[formKeyName].filter((x) => x.sub_component == subcomponame);
    let displayHtml = '';


    formData.forEach((element, index) => {

        displayHtml += `
    <tr>
    <th scope="row">${index+1}</th>
    <td>${element['component_name']}</td>
    <td>${formKeyName}</td>
    <td>${element['sub_component']}</td>
    <td>${element['created_date']}</td>
    <td>${element['updated_date']}</td>
    <td style="vertical-align:middle;width:22%" >
    `;
        if (formKeyName.startsWith("EP")) {
            displayHtml += `
        <button type="button" class="btn btn-sm btn-success" onclick="showFormDetails('${element['id']}','${formKeyName}')">
            See <i class="fas fa-eye-close"></i>
        </button>
       `;

        } else if (formKeyName.startsWith("T")) {
            displayHtml += `
        <button type="button" class="btn btn-sm btn-success" onclick="get_T_formData('${element['id']}','${formKeyName}')">
            See <i class="fas fa-eye-close"></i>
        </button>
       `;
        } else if (formKeyName.startsWith("CS")) {
            displayHtml += `
        <button type="button" class="btn btn-sm btn-success" onclick="get_CS_formData('${element['id']}','${formKeyName}')">
            See <i class="fas fa-eye-close"></i>
        </button>
       `;
        } else if (formKeyName.startsWith("DL")) {
            displayHtml += `
        <button type="button" class="btn btn-sm btn-success" onclick="get_DL_formData('${element['id']}','${formKeyName}')">
            See <i class="fas fa-eye-close"></i>
        </button>
       `;
        }

        displayHtml += ` 
    </td>
    </tr>
`;


    });

    document.getElementById("printTableData").innerHTML = displayHtml;


}

function showSubComponent(formName, btnColor) {

    $("#mainTable").addClass('d-none');


    document.getElementById("printTableData").innerHTML = "";

    let dataList = formDataList[formName];

    let subCompo = [...new Set(dataList.map(x => x.sub_component))];

    console.log("subCompo map=", subCompo);
    if (subCompo.length != 0) {

        let createSubcompo = `<div class="mb-2 badge badge-light my-2 mr-3">SubComponet List of ${formName} :</div>`;

        subCompo.forEach(element => {

            createSubcompo +=
                `<button type="button" onclick="showTable('${formName}','${element}')" class="btn btn-sm btn-${btnColor} mx-2">${element}</button>`

        });

        $("#createSubcompo").html(createSubcompo);


    }


}

function displayFormData(keyList, btnColor = 'success') {

    document.getElementById("printTableData").innerHTML = "";
    $("#mainTable").addClass('d-none');


    if (keyList.length == 0) {
        $("#showError").html("No Form Data");
        return;
    }

    let formKeyDisplayHtml = '<div class="mb-2 badge badge-light">Form List : </div>'

    keyList.forEach(element => {

        formKeyDisplayHtml +=
            `<button type="button" onclick="showSubComponent('${element}','${btnColor}')" class="btn btn-sm btn-${btnColor} mx-2">${element}</button>`

    });

    $("#formKeyDisplay").html(formKeyDisplayHtml);




}

function getComponentForm(val) {
    document.getElementById("formKeyDisplay").innerHTML = "";
    $("#createSubcompo").html("");
    document.getElementById("printTableData").innerHTML = "";
    $("#mainTable").addClass('d-none');




    let componentName = val.target.innerHTML;
    let btnColor = val.target.classList[(val.target.classList).length - 1].split("-")[1]

    // alert()
    let componetData = g_st_compList.filter(x => x['station_component'] == componentName);
    console.log("vishnu componetData ", componetData);

    if (componetData.length == 0) {
        alert("no sub component added yet");
        return;
    }

    let sectionId = ($("#sectionId").val()).trim();
    let sectionName = ($("#sectionName").val()).trim();
    let stationId = ($("#stationId").val()).trim();
    let stationName = ($("#stationName").val()).trim();

    let userID = '<?php echo $_SESSION['userretailer']; ?>';
    if (userID == '' || userID == null || userID == undefined) {

        alert("Something went wrong with user Id, Refresh the page and try again");
        return
    }

    $.ajax({
        type: "POST",
        url: "query/form-data-action.php",
        data: {
            action: "getFormSubmitedData",
            "sectionId": sectionId,
            "sectionName": sectionName,
            "stationId": stationId,
            "stationName": stationName,
            "componentName": componentName,
            "userID": userID

        },
        beforeSend: function() {
            $("#loader_show").removeClass('d-none');
            formDataList = [];
            $("#showError").html("");


        },
        success: function(response) {
            try {
                let respo = JSON.parse(response);
                console.log("response form data=", respo);

                if (!respo['status']) {
                    $("#showError").html(respo['msg']);
                    return
                }

                formDataList = respo['data'][0];

                let keyList = Object.keys(formDataList);

                displayFormData(keyList, btnColor);

                console.log("formDataList=", formDataList);

            } catch (e) {
                $("#showError").html("Catch block, Response Error " + e);


            }


        },
        complete: function() {
            $("#loader_show").addClass('d-none');
            setTimeout(() => {
                $("#showError").html("");

            }, 9000);

        }

    });


}


function getComponent() {

    let sectionId = ($("#sectionId").val()).trim();
    let sectionName = ($("#sectionName").val()).trim();
    let stationId = ($("#stationId").val()).trim();
    let stationName = ($("#stationName").val()).trim();

    if (sectionId == '' || sectionName == "" || stationId == "" || stationName == "") {
        alert("Please refresh page.");
        return;
    }

    $.ajax({
        type: "POST",
        url: "query/action.php",
        data: {
            "action": "getComponentData",
            "sectionId": sectionId,
            "sectionName": sectionName,
            "stationId": stationId,
            "stationName": stationName
        },
        beforeSend: function() {
            g_st_compList = [];
            document.getElementById("componentDisplay").innerHTML = '';
            document.getElementById("formKeyDisplay").innerHTML = "";
            $("#createSubcompo").html("");


        },
        success: function(respo) {
            let response = JSON.parse(respo);
            if (response['status']) {
                g_st_compList = response['data'];
                let componetList = g_st_compList.map(x => x['station_component'])
                console.log(componetList);


                componetList.forEach((value, index) => {
                    let btn = document.createElement("button");
                    btn.id = "station_" + value;
                    btn.type = "button";
                    btn.className = "btn btn-sm m-2";

                    btn.classList.add(colorArr[index % 6])


                    btn.innerHTML = value;
                    btn.onclick = getComponentForm;
                    document.getElementById("componentDisplay").appendChild(btn)
                })
            }

        }
    });
}



$(document).ready(function() {
    getComponent();
});
</script>

</body>

</html>