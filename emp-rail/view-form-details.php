<?php require('header.php'); ?>
<?php require('include/db_config.php');

//Include database configuration file
$id = "";

if (isset($_SESSION['userretaileremp'])) {
    $id = $_SESSION['userretaileremp'];

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
                                value="<?php echo $empSectionName; ?>">
                            <input type="hidden" id="sectionId" class="form-control" disabled
                                value="<?php echo $empSectionId; ?>">
                            <input type="hidden" id="compoNameTmp">
                            <input type="hidden" id="subcompoNameTmp">
                        </div>

                        <div class="form-group col-xl-6 col-lg-6 col-12">
                            <!-- <label for="stationName">Station Name</label> -->
                            <input type="hidden" id="stationName" class="form-control" disabled
                                value="<?php echo $empStationName; ?>">
                            <input type="hidden" id="stationId" class="form-control" disabled
                                value="<?php echo $empStationId; ?>">
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
                        <span class="badge badge-danger h3 displaySubcompoName"></span>


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
                            <?php echo $_SESSION['userretailerempName'] ?? '...'; ?>

                        </span>

                    </div>
                    <div class="col-6">
                        <span>Id:</span>
                        <span class="ml-2 font-weight-bold">

                            <?php echo $_SESSION['userretaileremp']; ?>
                        </span>

                    </div>

                    <div class="col-6">
                        <span>Section:</span>
                        <span class="ml-2 font-weight-bold">
                        <?php echo $empSectionName; ?>
                        </span>
                    </div>
                    <div class="col-6">
                    <span>Station:</span>

                    <span class="ml-2 font-weight-bold">
                    <?php echo $empStationName; ?>

                    </span>

                    </div>
                </div>
                <div class="m-2 text-center alert alert-danger" style="font-size:13px">

                <span class="heading_english">
                Periodicity: Technician(Signal): Fortnightly Sectional SSE/JE(Signal): Monthly SSE (Signal)/Incharge :
                    Quarterly
                </span>

                <span class="heading_hindi">
                आवधिकता: तकनीशियन (सिग्नल): पाक्षिक अनुभागीय सीसेई/जेई (सिग्नल): मासिक सीसेई (सिग्नल)/प्रभारी: त्रैमासिक
                </span>

                </div>
                <div class="modal-body table-responsive">
                    <!-- <form id="modalFormComponent">
                   
                </form> -->
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                 <th scope="col">
                                    <span class="heading_english">
                                    S.No
                                    </span>

                                    <span class="heading_hindi">
                                        क्रम सं
                                    </span>
                                    
                                </th>
                                <th scope="col">
                                <span class="heading_english">
                                    Check the following
                                </span>

                                <span class="heading_hindi">
                                    निम्नलिखित की जाँच करें
                                </span>
                                    
                               </th>
                                <th scope="col">
                                <span class="heading_english">
                                    Action
                                </span>

                                <span class="heading_hindi">
                                    कार्रवाई
                                 </span>    
                                </th>
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
            <div id="pdfBodyEP2" style="font-size:12px">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="componentFormLabel2">
                        <span class="badge badge-success h3">
                            Schedule Code: EP2
                        </span>
                        <span class="badge badge-danger h3 displaySubcompoName"></span>
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
                            <?php echo $_SESSION['userretailerempName'] ?? '...'; ?>

                        </span>

                    </div>
                    <div class="col-6">
                        <span>Id:</span>
                        <span class="ml-2 font-weight-bold">

                            <?php echo $_SESSION['userretaileremp']; ?>
                        </span>

                    </div>

                    <div class="col-6">
                        <span>Section:</span>
                        <span class="ml-2 font-weight-bold">
                        <?php echo $empSectionName; ?>
                        </span>
                    </div>
                    <div class="col-6">
                    <span>Station:</span>

                    <span class="ml-2 font-weight-bold">
                    <?php echo $empStationName; ?>

                    </span>

                    </div>
                </div>
                <div class="m-2 text-center alert alert-danger" style="font-size:13px">

                    <span class="heading_english">
                Periodicity: Signal Technician: Monthly (to be done by ESM in the presence of SSE/JE) Sectional
                SSE/JE(Signal): Monthly SSE(Signal)/Incharge: Quarterly
                </span>

                <span class="heading_hindi">
               आवधिकता: तकनीशियन (सिग्नल): मासिक(अनुभागीय सीसेई/जेई (सिग्नल) की उपस्थिति में)
                                   अनुभागीय सीसेई/जेई (सिग्नल): मासिक
           सीसेई (सिग्नल)/प्रभारी: त्रैमासिक

                </span>

                </div>
                <div class="modal-body table-responsive">

                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">
                                    <span class="heading_english">
                                    S.No
                                    </span>

                                    <span class="heading_hindi">
                                        क्रम सं
                                    </span>
                                    
                                </th>
                                <th scope="col">
                                <span class="heading_english">
                                    Check the following
                                </span>

                                <span class="heading_hindi">
                                    निम्नलिखित की जाँच करें
                                </span>
                                    
                               </th>
                                <th scope="col">
                                <span class="heading_english">
                                    Action
                                </span>

                                <span class="heading_hindi">
                                    कार्रवाई
                                 </span>    
                                </th>
                            </tr>
                        </thead>
                        <tbody id="ep2_body">
                            <tr>
                                <th scope="row">1</th>
                                <td colspan="2">
                                    <div class="alert alert-success">
                                        <span class="ep2_details_english">
                                    Measurements of operating values (voltage & current) of point machines, with and
                                    without obstruction for normal
                                    and reverse operation. Current required to operate the machine in either direction
                                    shall be 1.5 to 2 times of its
                                    normal operation and friction clutch shall slip within this range. Replace machine
                                    when difference between normal
                                    operating current and current under obstruction is less than 0.5 A.</span>
                                    <span class="ep2_details_hindi">
                                    सामान्य और रिवर्स ऑपरेशन के लिए रुकावट के साथ और बिना, पॉइंट मशीनों के ऑपरेटिंग मूल्यों (वोल्टेज और करंट) का माप। मशीन को किसी भी दिशा में संचालित करने के लिए आवश्यक करंट इसके सामान्य संचालन से 1.5 से 2 गुना होगा और घर्षण क्लच इस सीमा के भीतर फिसल जाएगा। मशीन को तब बदलें जब सामान्य ऑपरेटिंग करंट और रुकावट के तहत करंट के बीच का अंतर 0.5 ए से कम हो।</span>
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
                                                <td colspan="2">
                                                    <span class="ep2_details_english">Date</span>
                                                    <span class="ep2_details_hindi">दिनांक</span>
                                                </td>
                                                <td>
                                                    <!-- <input type="date" id="EP2_1" disabled class="form-control"> -->
                                                    <div id="EP2_1" ></div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td style="vertical-align: middle;" rowspan="2">                                           
                                                     <span class="ep2_details_english">Operating Voltage (>100 Volts)</span>
                                                    <span class="ep2_details_hindi">सामान्य ऑपरेटिंग वोल्टेज (>100 वोल्ट)</span>
                                                </td>
                                                <td>
                                                    <span class="ep2_details_english">(N to R)</span>
                                                    <span class="ep2_details_hindi">नॉर्मल से रिर्वस</span>
                                                </td>
                                                <td>
                                                    <!-- <input type="number" disabled id="op_v_N_R" class="form-control"> -->
                                                    <div id="op_v_N_R"></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="ep2_details_english">(R to N)</span>
                                                    <span class="ep2_details_hindi">रिवर्स से नॉर्मल</span> 
                                                </td>
                                                <td>
                                                    <!-- <input type="number" disabled id="op_v_R_N" class="form-control"> -->
                                                    <div id="op_v_R_N"></div>
                                                </td>
                                            </tr>


                                            <tr>
                                                <td style="vertical-align: middle;" rowspan="2">
                                                    <span class="ep2_details_english">Obstruction Voltage (>80 Volts)</span>
                                                    <span class="ep2_details_hindi">बाधा वोल्टेज (>80 वोल्ट)</span>
                                                </td>
                                                <td>
                                                    <span class="ep2_details_english">(N to R)</span>
                                                    <span class="ep2_details_hindi">नॉर्मल से रिर्वस</span>
                                                </td>
                                                <td>
                                                    <!-- <input type="number" disabled id="ob_v_N_R" class="form-control"> -->
                                                    <div id="ob_v_N_R"></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="ep2_details_english">(R to N)</span>
                                                    <span class="ep2_details_hindi">रिवर्स से नॉर्मल</span> 
                                                </td>
                                                <td>
                                                    <!-- <input type="number" disabled id="ob_v_R_N" class="form-control"> -->
                                                    <div id="ob_v_R_N"></div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td style="vertical-align: middle;" rowspan="2">
                                                    <span class="ep2_details_english">Detection Voltage (>24 Volts)</span>
                                                    <span class="ep2_details_hindi">डिटेक्शन वोल्टेज (>24 वोल्ट)*</span>

                                                </td>
                                                <td>
                                                    <span class="ep2_details_english">(N to R)</span>
                                                    <span class="ep2_details_hindi">नॉर्मल से रिर्वस</span>
                                                </td>
                                                <td>
                                                    <!-- <input type="number" disabled id="det_v_N_R" class="form-control"> -->
                                                    <div id="det_v_N_R"></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="ep2_details_english">(R to N)</span>
                                                    <span class="ep2_details_hindi">रिवर्स से नॉर्मल</span> 
                                                </td>
                                                <td>
                                                    <!-- <input type="number" disabled id="det_v_R_N" class="form-control"> -->
                                                    <div id="det_v_R_N"></div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td style="vertical-align: middle;" rowspan="2">
                                                    <span class="ep2_details_english">Normal Working Current (1.5 - 2.5 Amp.)</span>
                                                    <span class="ep2_details_hindi">सामान्य कार्यशील धारा (1.5 - 2.5 एम्पियर)</span>
                                                </td>
                                                <td>
                                                    <span class="ep2_details_english">(N to R)</span>
                                                    <span class="ep2_details_hindi">नॉर्मल से रिर्वस</span> 
                                                </td>
                                                <td>
                                                    <!-- <input type="number" disabled id="nwc_N_R" class="form-control"> -->
                                                    <div id="nwc_N_R"></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="ep2_details_english">(R to N)</span>
                                                    <span class="ep2_details_hindi">रिवर्स से नॉर्मल</span> 
                                                </td>
                                                <td>
                                                    <!-- <input type="number" disabled id="nwc_R_N" class="form-control"> -->
                                                    <div id="nwc_R_N"></div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td style="vertical-align: middle;" rowspan="2">
                                                    <span class="ep2_details_english">Obstruction/Slipping Current (3-5 Amp.)</span>
                                                    <span class="ep2_details_hindi">रुकावट/स्लिपिंग करंट (3-5 एम्पियर)</span>
                                                 </td>
                                                <td>
                                                    <span class="ep2_details_english">(N to R)</span>
                                                    <span class="ep2_details_hindi">नॉर्मल से रिर्वस</span> 
                                                </td>
                                                <td>
                                                    <!-- <input type="number" disabled id="ob_sc_N_R" class="form-control"> -->
                                                    <div id="ob_sc_N_R"></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="ep2_details_english">(R to N)</span>
                                                    <span class="ep2_details_hindi">रिवर्स से नॉर्मल</span> 
                                                </td>
                                                <td>
                                                    <!-- <input type="number" disabled id="ob_sc_R_N" class="form-control"> -->
                                                    <div id="ob_sc_R_N"></div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td style="vertical-align: middle;" colspan="2">
                                                    <span class="ep2_details_english">Obstruction Test (3.25 mm)</span>
                                                    <span class="ep2_details_hindi">रुकावट परीक्षण (3.25 मिमी)*</span>
                                                </td>
                                                <!-- <td>(N to R)</td> -->
                                                <td>
                                                    <!-- <input type="text" disabled id="ob_t_N_R" class="form-control"> -->
                                                    <div id="ob_t_N_R"></div>

                                                </td>
                                            </tr>



                                            <tr>
                                                <td style="vertical-align: middle;" colspan="2">
                                                    <span class="ep2_details_english">Go Test (1.6 mm Fail Safe Test)</span>
                                                    <span class="ep2_details_hindi">गो टेस्ट (1.6 मिमी असफल सुरक्षित परीक्षण)*</span>
                                                </td>
                                                <!-- <td>(N to R)</td> -->
                                                <td>
                                                    <!-- <input type="text" disabled id="gt_N_R" class="custom-select"> -->
                                                    <div id="gt_N_R"></div>

                                                </td>
                                            </tr>


                                            <tr>
                                                <td style="vertical-align: middle;" colspan="2">
                                            
                                                    <span class="ep2_details_english">Operating Time (4-5 Seconds)</span>
                                                    <span class="ep2_details_hindi">परिचालन समय (4-5 सेकंड)*</span>
                                                </td>
                                                <td>
                                                    <!-- <input type="number" disabled id="operatingTimeSecond" class="form-control"> -->
                                                    <div id="operatingTimeSecond"></div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td style="vertical-align: middle;" colspan="2">
                                                    <span class="ep2_details_english">अवरोध परिक्षण के दौरान परिचालन समय*</span>
                                                    <span class="ep2_details_hindi">अवरोध परिक्षण के दौरान परिचालन समय*</span>
                                                </td>
                                                <td>
                                                    <!-- <input type="number" disabled id="operatingTime_dbt" class="form-control"> -->
                                                    <div id="operatingTime_dbt"></div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td style="vertical-align: middle;" colspan="2">
                                                    <!-- Is the friction clutch slipping or not? -->
                                                    <span class="ep2_details_english">फ्रिक्शन क्लच स्लिप कर रहा है या नहीं</span>
                                                     <span class="ep2_details_hindi">फ्रिक्शन क्लच स्लिप कर रहा है या नहीं</span>
                                                </td>
                                                <td>
                                                    <!-- <input type="number" disabled id="friction_c_s" class="form-control"> -->
                                                    <div id="friction_c_s"></div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td style="vertical-align: middle;" colspan="2">
                                                    <span class="ep2_details_english">Track Locking Test</span>
                                                    <span class="ep2_details_hindi">ट्रैक लॉकिंग टेस्ट*</span>
                                                </td>
                                                <td>
                                                    <!-- <input type="number" disabled id="track_locking" class="form-control"> -->
                                                    <div id="track_locking"></div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td style="vertical-align: middle;" colspan="2">
                                                    <!-- Remark's inspection/brief description of maintenance -->
                                                    <span class="ep2_details_english">रिमार्क एवं निरिक्षण/अनुरक्षण का सञ्चिपट विवरण*</span>
                                                    <span class="ep2_details_hindi">रिमार्क एवं निरिक्षण/अनुरक्षण का सञ्चिपट विवरण*</span>
                                                </td>
                                                <td>
                                                    <!-- <input type="number" disabled id="remark_brief" class="form-control"> -->
                                                    <div id="remark_brief"></div>
                                                </td>
                                            </tr>






                                        </tbody>
                                    </table>
                                </td>

                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>
                                <span class="ep2_details_english">
                                    Checking of feed disconnection time under obstruction is not less than 10 Seconds.
                                </span>
                                <span class="ep2_details_hindi">रुकावट के तहत फ़ीड वियोग का समय जांचने में 10 सेकंड से कम नहीं है।</span> 
                                </td>
                                <td>
                                    <!-- <input type="text" disabled class="custom-select EP2Class" id="EP2_2"> -->
                                    <div id="EP2_2"></div>

                                </td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>
                                    <span class="ep2_details_english">
                                    Ensure Hose pipe/GI pipe in good condition and without gaps/access.</span>
                                    <span class="ep2_details_hindi">सुनिश्चित करें कि होज़ पाइप/जीआई पाइप अच्छी स्थिति में और बिना किसी गैप/पहुँच के हो।</span>    
                                    
                                </td>
                                <td>
                                    <!-- <input type="text" disabled class="custom-select EP2Class" id="EP2_3"> -->
                                    <div id="EP2_3"></div>

                                </td>
                            </tr>
                            <tr>
                                <th scope="row">4</th>
                                <td>
                                <span class="ep2_details_english">
                                    Check MS pins of Switch Extension piece/'P' bracket for any rib formation or excessive
                                    wear.
                                </span>
                                <span class="ep2_details_hindi">किसी भी पसली गठन या अत्यधिक घिसाव के लिए स्विच एक्सटेंशन पीस/'पी' ब्रैकेट के MS पिन की जांच करें।</span>    
                            
                            
                                </td>
                                <td>
                                    <!-- <input type="text" disabled class="custom-select EP2Class" id="EP2_4"> -->
                                    <div id="EP2_4"></div>

                                </td>
                            </tr>
                            <tr>
                                <th scope="row">5</th>
                                <td>
                                <div class="ep2_details_english">
                                In case of Clamp type point machine, Lubricate the following moving parts of the clamp
                                lock.
                                <div>
                                    <ol type="a">
                                        <li>Stock rail bracket groove.</li>
                                        <li>Moving part of tongue rail and lock arm assembly. </li>
                                        <li> Between machine of lock bar and lock arm assembly</li>
                                    </ol>
                                </div>
                                </div>
                                <div class="ep2_details_hindi">
                                क्लैंप प्रकार की पॉइंट मशीन के मामले में, क्लैंप लॉक के निम्नलिखित गतिशील हिस्सों को चिकनाई दें।
                                <ul>
                                        <li>(ए) स्टॉक रेल ब्रैकेट ग्रूव.</li>
                                        <li>(बी) टंग रेल और लॉक आर्म असेंबली का गतिशील भाग। </li>
                                        <li>(सी) लॉक बार और लॉक आर्म असेंबली की मशीन के बीच ।  </li>
                                    </ul>
                                </div>

                                </td>
                                <td style="vertical-align: middle;">
                                    <!-- <input type="text" disabled class="custom-select EP2Class" id="EP2_5"> -->
                                    <div id="EP2_5"></div>

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


<!-- Modal EP3 -->
<div class="modal fade" id="componentForm_EP3" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="componentFormLabelEP3" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <form id="formEP3">
            <div class="modal-content">
                <div id="pdfBodyEP3">

                <div class="modal-header">
                    <h5 class="modal-title text-center" id="componentFormLabelEP3">
                        <span class="badge badge-success h3" id="modalComponentName">
                            Schedule Code: EP3  
                        </span>
                        <span class="badge badge-danger h3 displaySubcompoName"></span>

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
                            <?php echo $_SESSION['userretailerempName'] ?? '...'; ?>

                        </span>

                    </div>
                    <div class="col-6">
                        <span>Id:</span>
                        <span class="ml-2 font-weight-bold">

                            <?php echo $_SESSION['userretaileremp']; ?>
                        </span>

                    </div>

                    <div class="col-6">
                        <span>Section:</span>
                        <span class="ml-2 font-weight-bold">
                        <?php echo $empSectionName; ?>
                        </span>
                    </div>
                    <div class="col-6">
                    <span>Station:</span>

                    <span class="ml-2 font-weight-bold">
                    <?php echo $empStationName; ?>

                    </span>

                    </div>
                </div>
                <div class="m-2 text-center alert alert-danger" style="font-size:13px">

                    <span class="heading_english">
                 Periodicity: Technician(Signal): Fortnightly Sectional SSE/JE(Signal): Monthly SSE (Signal)/Incharge :
                    Quarterly
                </span>

                <span class="heading_hindi">
              आवधिकता: अनुभागीय सीसेई/जेई (सिग्नल): त्रैमासिक
(अनुभागीय सीसेई/जेई एवं प्रभारी सीसेई वैकल्पिक निरीक्षण करेंगे)
सीसेई (सिग्नल)/प्रभारी: त्रैमासिक (अनुभागीय सीसेई/जेई और प्रभारी सीसेई वैकल्पिक निरीक्षण करेंगे)


                </span>
                </div>
                <div class="modal-body table-responsive">
                    <!-- <form id="modalFormComponent">
                    
                    </form> -->
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                               <th scope="col">
                                    <span class="heading_english">
                                    S.No
                                    </span>

                                    <span class="heading_hindi">
                                        क्रम सं
                                    </span>
                                    
                                </th>
                                <th scope="col">
                                <span class="heading_english">
                                    Check the following
                                </span>

                                <span class="heading_hindi">
                                    निम्नलिखित की जाँच करें
                                </span>
                                    
                               </th>
                                <th scope="col">
                                <span class="heading_english">
                                    Action
                                </span>

                                <span class="heading_hindi">
                                    कार्रवाई
                                 </span>    
                                </th>
                            </tr>
                        </thead>
                        <tbody id="ep3_body">
                            <tr>
                                <td scope="row">1</td>
                                <td scope="row">
                                    
                                    <div class="ep3_details_english">
                                        Joint check with JE/SSE (P-Way), of points & crossing for leveling, squaring; creeping, packing, clearance of ballast and other P-Way fittings, etc. and measurement of LH, RH switch opening are as given below for normal point and as per proforma circulated by RDSO dated 14.2.19 for Thick Web Switches.

                                        <table class="table">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th colspan="2">Normal Point (143mm)</th>
                                                    <th colspan="2">Thick Web Point(220mm)</th>
                                                </tr>
                                                <tr>
                                                    <th colspan="2">OPENING (Tolerance)</th>
                                                    <th colspan="2">OPENING (Tolerance)</th>
                                                </tr>
                                                <tr>
                                                    <td>LH END</td>
                                                    <td>RH END</td>
                                                    <td>LH END</td>
                                                    <td>RH END</td>
                                                </tr>
                                                <tr>
                                                    <td>115+-3mm</td>
                                                    <td>115+-3mm</td>
                                                    <td>160+-3mm</td>
                                                    <td>160+-3mm</td>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                    <div class="ep3_details_hindi">

                                    कांटों और क्रॉसिंग की लेवलिंग, स्क्वायरिंग, रेंगना(creeping), पैकिंग, गिट्टी और अन्य पी-वे फिटिंग आदि की निकासी और LH, RH स्विच खोलने का माप सामान्य कांटों के लिए नीचे दिया गया है और थिक वेब स्विच(TWS) के लिए RDSO दिनांक 14.02.19 द्वारा प्रसारित प्रोफार्मा के अनुसार है इसकी जेई/सीसेई (पी-वे) के साथ संयुक्त जांच । 

                            <table class="table">
                                <thead class="table-dark">
                                    <tr>
                                        <th colspan="2">सामान्य कांटा(143mm)</th>
                                        <th colspan="2">थीक वेब कांटा(220mm)</th>
                                    </tr>
                                    <tr>
                                        <th colspan="2">
                                        प्रारंभण  ( सहनशीलता )
                                        </th>
                                        <th colspan="2">
                                        प्रारंभण  ( सहनशीलता )
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>LH अंत</td>
                                        <td>RH अंत</td>
                                        <td>LH अंत</td>
                                        <td>RH अंत</td>
                                    </tr>
                                    <tr>
                                        <td>115+-3 मिमी</td>
                                        <td>115+-3 मिमी</td>
                                        <td>160+-3 मिमी</td>
                                        <td>160+-3 मिमी</td>
                                    </tr>
                                </thead>
                            </table>
                                        
                                    </div>
                                           
                                </td>
                                <td scope="row" style="width: 25%;vertical-align: middle;">
                                <div id="ep3_1"></div>
                                </td>
                            </tr>

                            <tr>
                                <td>2</td>
                                <td>
                                    <div class="ep3_details_english">
                                    Joint checking of SSD Setting and its arm insulation with P-Way supervisor.
                                        
                                    </div>
                                        <div class="ep3_details_hindi">
                                        पी-वे सुपरवाइजर के साथ SSD सेटिंग और उसके आर्म इंसुलेशन की संयुक्त जांच।
                                        </div>
                                </td>
                                <td>
                                <div id="ep3_2"></div>

                                </td>
                            </tr>

                            <tr>
                                <td>3</td>
                                <td>
                                    <div class="ep3_details_english">
                                        Remarks by Signal Supervisor.
                                    </div>
                                    <div class="ep3_details_hindi">
                                            Remarks by Signal Supervisor.
                                            
                                        </div>
                                </td>
                                <td>
                                <div id="ep3_3"></div>
                                </td>
                            </tr>

                            <tr>
                                <td>4</td>
                                <td>
                                    <div class="ep3_details_english">
                                        Remarks by P.Way  Supervisor.
                                    </div>
                                    <div class="ep3_details_hindi">
                                            Remarks by P.Way  Supervisor.
                                            
                                        </div>
                                </td>
                                <td>
                                <div id="ep3_4"></div>

                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>

                </div>


                <div class="card-footer d-flex justify-content-between">
                    <div id="ep3Form_status"></div>
                    <div>
                    <button type='button' id="ep3PdfBtn" onclick="generatePdf('EP3','pdfBodyEP3')"
                    class="btn btn-success btn-sm">PDF</button>
                <button type="button" class="btn btn-sm btn-secondary mx-2" data-dismiss="modal" aria-label="Close">
                    Close
                </button>
                    </div>
                </div>

            </div>
        </form>
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
                        <span class="badge badge-danger h3 displaySubcompoName"></span>
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
                            <?php echo $_SESSION['userretailerempName'] ?? '...'; ?>

                        </span>

                    </div>
                    <div class="col-6">
                        <span>Id:</span>
                        <span class="ml-2 font-weight-bold">

                            <?php echo $_SESSION['userretaileremp']; ?>
                        </span>

                    </div>

                    <div class="col-6">
                        <span>Section:</span>
                        <span class="ml-2 font-weight-bold">
                        <?php echo $empSectionName; ?>
                        </span>
                    </div>
                    <div class="col-6">
                    <span>Station:</span>

                    <span class="ml-2 font-weight-bold">
                    <?php echo $empStationName; ?>

                    </span>

                    </div>
                </div>
                <div class="m-2 text-center alert alert-danger" style="font-size:13px">

                    <span class="heading_english">
                 Periodicity: Technician(Signal): Quarterly Sectional SSE/JE(Signal): Half-yearly SSE(Signal)/Incharge :
                Yearly
                </span>

                <span class="heading_hindi">
              आवधिकता: तकनीशियन (सिग्नल): त्रैमासिक
                                     अनुभागीय सीसेई/जेई (सिग्नल): अर्ध-वार्षिक
        सीसेई (सिग्नल)/प्रभारी: वार्षिक



                </span>
                </div>
                <div class="modal-body table-responsive">
                    <!-- <form id="modalFormComponent">
                   
                </form> -->
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">
                                    <span class="heading_english">
                                    S.No
                                    </span>

                                    <span class="heading_hindi">
                                        क्रम सं
                                    </span>
                                    
                                </th>
                                <th scope="col">
                                <span class="heading_english">
                                    Check the following
                                </span>

                                <span class="heading_hindi">
                                    निम्नलिखित की जाँच करें
                                </span>
                                    
                               </th>
                                <th scope="col">
                                <span class="heading_english">
                                    Action
                                </span>

                                <span class="heading_hindi">
                                    कार्रवाई
                                 </span>    
                                </th>
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
                        <span class="badge badge-danger h3 displaySubcompoName"></span>
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
                            <?php echo $_SESSION['userretailerempName'] ?? '...'; ?>

                        </span>

                    </div>
                    <div class="col-6">
                        <span>Id:</span>
                        <span class="ml-2 font-weight-bold">

                            <?php echo $_SESSION['userretaileremp']; ?>
                        </span>

                    </div>

                    <div class="col-6">
                        <span>Section:</span>
                        <span class="ml-2 font-weight-bold">
                        <?php echo $empSectionName; ?>
                        </span>
                    </div>
                    <div class="col-6">
                    <span>Station:</span>

                    <span class="ml-2 font-weight-bold">
                    <?php echo $empStationName; ?>

                    </span>

                    </div>
                </div>
                <div class="m-2 text-center alert alert-danger" style="font-size:13px">

                      <span class="heading_english">
                  Periodicity: Sectional JSSE/JE(Signal): Half-yearly SSE(Signal)/Incharge : Yearly
                </span>

                <span class="heading_hindi">
              आवधिकता: अनुभागीय सीसेई/जेई (सिग्नल): अर्ध-वार्षिक
सीसेई (सिग्नल)/प्रभारी: वार्षिक



                </span>
                </div>
                <div class="modal-body table-responsive">
                    <!-- <form id="modalFormComponent">
                   
                </form> -->
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                               <th scope="col">
                                    <span class="heading_english">
                                    S.No
                                    </span>

                                    <span class="heading_hindi">
                                        क्रम सं
                                    </span>
                                    
                                </th>
                                <th scope="col">
                                <span class="heading_english">
                                    Check the following
                                </span>

                                <span class="heading_hindi">
                                    निम्नलिखित की जाँच करें
                                </span>
                                    
                               </th>
                                <th scope="col">
                                <span class="heading_english">
                                    Action
                                </span>

                                <span class="heading_hindi">
                                    कार्रवाई
                                 </span>    
                                </th>
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
            <div id="pdfBodyT1" style="font-size:11px">

                <div class="modal-header">
                    <h5 class="modal-title text-center" id="componentFormLabelT1">
                        <span class="badge badge-success h3">
                            Schedule Code: T1
                        </span>
                        <span class="badge badge-danger h3 displaySubcompoName"></span>
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
                            <?php echo $_SESSION['userretailerempName'] ?? '...'; ?>

                        </span>

                    </div>
                    <div class="col-6">
                        <span>Id:</span>
                        <span class="ml-2 font-weight-bold">

                            <?php echo $_SESSION['userretaileremp']; ?>
                        </span>

                    </div>

                    <div class="col-6">
                        <span>Section:</span>
                        <span class="ml-2 font-weight-bold">
                        <?php echo $empSectionName; ?>
                        </span>
                    </div>
                    <div class="col-6">
                    <span>Station:</span>

                    <span class="ml-2 font-weight-bold">
                    <?php echo $empStationName; ?>

                    </span>

                    </div>
                </div>
                <div class="m-2 text-center alert alert-danger" style="font-size:13px">

                   
                 <span class="heading_english">
                  Periodicity: Technician(Signal): Fortnightly Sectional SSE/JE(Signal): Monthly SSE (Signal)/Incharge :
                Quarterly
                </span>

                <span class="heading_hindi">
             आवधिकता: तकनीशियन (सिग्नल): पाक्षिक,अनुभागीय सीसेई/जेई (सिग्नल): मासिक (ए, बी और सी मार्गों पर), त्रैमासिक (डी और ई मार्ग पर), सीसेई (सिग्नल)/प्रभारी: अर्धवार्षिक



                </span>

                </div>
                <div class="modal-body table-responsive">
                    <!-- <form id="modalFormComponent">
                   
                </form> -->
                    <table class="" border="1">
                        <thead class="">
                            <tr>
                               <th scope="col">
                                    <span class="heading_english">
                                    S.No
                                    </span>

                                    <span class="heading_hindi">
                                        क्रम सं
                                    </span>
                                    
                                </th>
                                <th scope="col">
                                <span class="heading_english">
                                    Check the following
                                </span>

                                <span class="heading_hindi">
                                    निम्नलिखित की जाँच करें
                                </span>
                                    
                               </th>
                                <th scope="col">
                                <span class="heading_english">
                                    Action
                                </span>

                                <span class="heading_hindi">
                                    कार्रवाई
                                 </span>    
                                </th>
                            </tr>
                        </thead>
                        <tbody id="t1_body">

                        </tbody>

                        <tbody>
                            <tr>
                                <td colspan="3">
                                    <table class="" border="1">
                                        <thead class="" style="font-size:9px">
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
                                                <td>
                                                    <!-- <input id="date1" class="form-control" type="date" disable="true" readonly> -->
                                                    <div id="date1"></div>
                                                    </td>
                                                <td>
                                                    <!-- <input id="sale1_spg" class="form-control" type="text" disable="true" readonly> -->
                                                    <div id="sale1_spg"></div>
                                            </td>
                                                <td>
                                                    <!-- <input id="sale1_v" class="form-control" type="text" disable="true" readonly> -->
                                                    <div id="sale1_v"></div>
                                                    </td>
                                                <td>
                                                    <!-- <input id="sale2_spg" class="form-control" type="text" disable="true" readonly> -->
                                                    <div id="sale2_spg"></div>
                                                </td>
                                                <td>
                                                    <!-- <input id="sale2_v" class="form-control" type="text" disable="true" readonly> -->
                                                    <div id="sale2_spg"></div>
                                                </td>
                                                <td>
                                                    <!-- <input id="sale3_spg" class="form-control" type="text" disable="true" readonly> -->
                                                    <div id="sale3_spg"></div>
                                                </td>
                                                <td>
                                                    <!-- <input id="sale3_v" class="form-control" type="text" disable="true" readonly> -->
                                                    <div id="sale3_v"></div>
                                                </td>
                                                <td>
                                                    <!-- <input id="charging_v" class="form-control" type="text" disable="true" readonly> -->
                                                    <div id="charging_v"></div>
                                                </td>
                                                <td>
                                                    <!-- <input id="charging_current" class="form-control" type="text"  disable="true" readonly> -->
                                                    <div id="charging_current"></div>
                                                    </td>
                                                <td></td>
                                                <td>
                                                    <!-- <input id="feedVoltage" class="form-control" type="text" disable="true" readonly> -->
                                                    <div id="feedVoltage"></div>
                                                </td>
                                                <td>
                                                    <!-- <input id="nearBlock" class="form-control" type="text" disable="true" readonly> -->
                                                    <div id="nearBlock"></div>
                                                </td>
                                                <td>
                                                    <!-- <input id="wireStatus" class="form-control" type="text" disable="true" readonly> -->
                                                    <div id="wireStatus"></div>
                                                </td>
                                                <td>
                                                    <!-- <input id="remark1" class="form-control" type="text" disable="true" readonly> -->
                                                    <div id="remark1"></div>
                                                </td>


                                            </tr>
                                        </tbody>
                                        <thead class="">
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
                                                <td>
                                                    <!-- <input id="date2" class="form-control" type="text" disable="true" readonly> -->
                                                    <div id="date2"></div>
                                                </td>
                                                <td>
                                                    <!-- <input id="railVoltage" class="form-control" type="text" disable="true" readonly> -->
                                                    <div id="railVoltage"></div>
                                                </td>
                                                <td>
                                                    <!-- <input id="vt_value" class="form-control" type="text" disable="true" readonly> -->
                                                    <div id="vt_value"></div>
                                                </td>
                                                <td>
                                                    <!-- <input id="wireStatus2" class="form-control" type="text" disable="true" readonly> -->
                                                    <div id="wireStatus2"></div>
                                                    </td>
                                                <td>
                                                    <!-- <input id="magneticPart" class="form-control" type="text" disable="true" readonly> -->
                                                    <div id="magneticPart"></div>
                                                    </td>
                                                <td></td>
                                                <td>
                                                    <!-- <input id="railFlag2" class="form-control" type="text" disable="true" readonly> -->
                                                    <div id="railFlag2"></div>
                                                    </td>
                                                <td>
                                                    <!-- <input id="jumberwireStatus" class="form-control" type="text" disable="true" readonly> -->
                                                    <div id="jumberwireStatus"></div>
                                                    </td>
                                                <td>
                                                    <!-- <input id="remark2" class="form-control" type="text" disable="true" readonly> -->
                                                    <div id="remark2"></div>
                                                    </td>
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
                        <span class="badge badge-danger h3 displaySubcompoName"></span>
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
                            <?php echo $_SESSION['userretailerempName'] ?? '...'; ?>

                        </span>

                    </div>
                    <div class="col-6">
                        <span>Id:</span>
                        <span class="ml-2 font-weight-bold">

                            <?php echo $_SESSION['userretaileremp']; ?>
                        </span>

                    </div>

                    <div class="col-6">
                        <span>Section:</span>
                        <span class="ml-2 font-weight-bold">
                        <?php echo $empSectionName; ?>
                        </span>
                    </div>
                    <div class="col-6">
                    <span>Station:</span>

                    <span class="ml-2 font-weight-bold">
                    <?php echo $empStationName; ?>

                    </span>

                    </div>
                </div>
                <div class="m-2 text-center alert alert-danger" style="font-size:13px">
 <span class="heading_english">
                  Periodicity: Technician(Signal): Fortnightly Sectional SSE/JE(Signal): Monthly SSE (Signal)/Incharge :
                Quarterly
                </span>

                <span class="heading_hindi">
           आवधिकता: तकनीशियन (सिग्नल): पाक्षिक (अनुभागीय सीसेई/जेई (सिग्नल) की उपस्थिति में), अनुभागीय सीसेई/जेई (सिग्नल): त्रैमासिक , सीसेई (सिग्नल)/प्रभारी: अर्धवार्षिक


                </span>

                </div>
                <div class="modal-body table-responsive">
                    <!-- <form id="modalFormComponent">
                   
                </form> -->
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                               <th scope="col">
                                    <span class="heading_english">
                                    S.No
                                    </span>

                                    <span class="heading_hindi">
                                        क्रम सं
                                    </span>
                                    
                                </th>
                                <th scope="col">
                                <span class="heading_english">
                                    Check the following
                                </span>

                                <span class="heading_hindi">
                                    निम्नलिखित की जाँच करें
                                </span>
                                    
                               </th>
                                <th scope="col">
                                <span class="heading_english">
                                    Action
                                </span>

                                <span class="heading_hindi">
                                    कार्रवाई
                                 </span>    
                                </th>
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
                <button type='button' id="t2PdfBtn" onclick="generatePdf('T2','pdfBodyT2')"
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
                        <span class="badge badge-danger h3 displaySubcompoName"></span>
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
                            <?php echo $_SESSION['userretailerempName'] ?? '...'; ?>

                        </span>

                    </div>
                    <div class="col-6">
                        <span>Id:</span>
                        <span class="ml-2 font-weight-bold">

                            <?php echo $_SESSION['userretaileremp']; ?>
                        </span>

                    </div>

                    <div class="col-6">
                        <span>Section:</span>
                        <span class="ml-2 font-weight-bold">
                        <?php echo $empSectionName; ?>
                        </span>
                    </div>
                    <div class="col-6">
                    <span>Station:</span>

                    <span class="ml-2 font-weight-bold">
                    <?php echo $empStationName; ?>

                    </span>

                    </div>
                </div>
                <div class="m-2 text-center alert alert-danger" style="font-size:13px">

                  
                 <span class="heading_english">
                  Periodicity: Technician(Signal): Fortnightly Sectional SSE/JE(Signal): Monthly SSE (Signal)/Incharge :
                Quarterly
                </span>

                <span class="heading_hindi">
         आवधिकता: अनुभागीय सीसेई/जेई (सिग्नल)/प्रभारी : अर्धवार्षिक


                </span>

                </div>
                <div class="modal-body table-responsive">
                    <!-- <form id="modalFormComponent">
                   
                </form> -->
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                 <th scope="col">
                                    <span class="heading_english">
                                    S.No
                                    </span>

                                    <span class="heading_hindi">
                                        क्रम सं
                                    </span>
                                    
                                </th>
                                <th scope="col">
                                <span class="heading_english">
                                    Check the following
                                </span>

                                <span class="heading_hindi">
                                    निम्नलिखित की जाँच करें
                                </span>
                                    
                               </th>
                                <th scope="col">
                                <span class="heading_english">
                                    Action
                                </span>

                                <span class="heading_hindi">
                                    कार्रवाई
                                 </span>    
                                </th>
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
                <button type='button' id="t3PdfBtn" onclick="generatePdf('T3','pdfBodyT3')"
                    class="btn btn-success btn-sm">PDF</button>

                <button type="button" class="btn btn-sm btn-secondary mx-2" data-dismiss="modal" aria-label="Close">
                    Close
                </button>

            </div>

        </div>
    </div>
</div>

<!-- Modal T4 -->
<div class="modal fade" id="componentForm_T4" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="componentFormLabelT4" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <form>
        <div class="modal-content">
            <div id="pdfBodyT4">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="componentFormLabelT4">
                    <span class="badge badge-success h3">
                        Schedule Code: T4
                    </span>
                    <span class="badge badge-danger h3 displaySubcompoName"></span>

                    <!-- <span id="modalSubCompoName"></span>
                    <span class="badge badge-danger h3" id="modalSubCompoType"></span> -->
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="m-2 text-center alert alert-danger" style="font-size:13px">

             <span class="heading_english">
                  Periodicity: Sectional SSE/JE (Signal)
                SSE (Signal)/Incharge: Half yearly (Sectional
                SSE/JE (Signal) & SSE (Signal) /Incharge to carry out alternatively once in six months)
                </span>

                <span class="heading_hindi">
         आवधिकता: अनुभागीय सीसेई/जेई (सिग्नल) और सीसेई (सिग्नल)/प्रभारी: अर्धवार्षिक (अनुभागीय
सीसेई/जेई (सिग्नल) और सीसेई (सिग्नल)/प्रभारी को सत्र में एक बार वैकल्पिक रूप से कार्य करना होगा।)



                </span>

            </div>
            <div class="modal-body table-responsive">
                <!-- <form id="modalFormComponent">
                   
                </form> -->
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">
                                    <span class="heading_english">
                                    S.No
                                    </span>

                                    <span class="heading_hindi">
                                        क्रम सं
                                    </span>
                                    
                                </th>
                                <th scope="col">
                                <span class="heading_english">
                                    Check the following
                                </span>

                                <span class="heading_hindi">
                                    निम्नलिखित की जाँच करें
                                </span>
                                    
                               </th>
                                <th scope="col">
                                <span class="heading_english">
                                    Action
                                </span>

                                <span class="heading_hindi">
                                    कार्रवाई
                                 </span>    
                                </th>
                        </tr>
                    </thead>
                    <tr>
                        <td></td>
                        <td class="text-center">Joint check with JE/SSE (P-way) of track circuited portion for</td>
                        <td></td>
                    </tr>
                    <tbody id="t4_body">

                    </tbody>
                </table>
            </div>

            </div>
       

            <div class="card-footer d-flex justify-content-between">
                <div id="t4Form_status"></div>

                <div>

                <button type='button' id="t4PdfBtn" onclick="generatePdf('T4','pdfBodyT4')"
                    class="btn btn-success btn-sm">PDF</button>

                <button type="button" class="btn btn-sm btn-secondary mx-2" data-dismiss="modal" aria-label="Close">
                    Close
                </button>
                </div>
            </div>

        </div>
        </form>
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
                        <span class="badge badge-danger h3 displaySubcompoName"></span>
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
                            <?php echo $_SESSION['userretailerempName'] ?? '...'; ?>

                        </span>

                    </div>
                    <div class="col-6">
                        <span>Id:</span>
                        <span class="ml-2 font-weight-bold">

                            <?php echo $_SESSION['userretaileremp']; ?>
                        </span>

                    </div>

                    <div class="col-6">
                        <span>Section:</span>
                        <span class="ml-2 font-weight-bold">
                        <?php echo $empSectionName; ?>
                        </span>
                    </div>
                    <div class="col-6">
                    <span>Station:</span>

                    <span class="ml-2 font-weight-bold">
                    <?php echo $empStationName; ?>

                    </span>

                    </div>
                </div>
                <div class="m-2 text-center alert alert-danger" style="font-size:13px">

               <span class="heading_english">
               
                Periodicity: Technician(Signal): Fortnightly Sectional SSE/JE(Signal): Monthly SSE (Signal)/Incharge :
                Quarterly
                </span>

                <span class="heading_hindi">
        आवधिकता: सीसेई (सिग्नल)/प्रभारी: वार्षिक



                </span>

                </div>
                <div class="modal-body table-responsive">
                    <!-- <form id="modalFormComponent">
                   
                </form> -->
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">
                                    <span class="heading_english">
                                    S.No
                                    </span>

                                    <span class="heading_hindi">
                                        क्रम सं
                                    </span>
                                    
                                </th>
                                <th scope="col">
                                <span class="heading_english">
                                    Check the following
                                </span>

                                <span class="heading_hindi">
                                    निम्नलिखित की जाँच करें
                                </span>
                                    
                               </th>
                                <th scope="col">
                                <span class="heading_english">
                                    Action
                                </span>

                                <span class="heading_hindi">
                                    कार्रवाई
                                 </span>    
                                </th>
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
            <div id="pdfBodyCS1" style="font-size:12px">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="componentFormLabelCS1">
                        <span class="badge badge-success h3">
                            Schedule Code: CS1
                        </span>
                        <span class="badge badge-danger h3 displaySubcompoName"></span>
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
                            <?php echo $_SESSION['userretailerempName'] ?? '...'; ?>

                        </span>

                    </div>
                    <div class="col-6">
                        <span>Id:</span>
                        <span class="ml-2 font-weight-bold">

                            <?php echo $_SESSION['userretaileremp']; ?>
                        </span>

                    </div>

                    <div class="col-6">
                        <span>Section:</span>
                        <span class="ml-2 font-weight-bold">
                        <?php echo $empSectionName; ?>
                        </span>
                    </div>
                    <div class="col-6">
                    <span>Station:</span>

                    <span class="ml-2 font-weight-bold">
                    <?php echo $empStationName; ?>

                    </span>

                    </div>
                </div>
                <div class="m-2 text-center alert alert-danger" style="font-size:13px">

                     <span class="heading_english">
               
               Periodicity: Technician(Signal): Monthly, Sectional SSE/JE(Signal): Quarterly, SSE(Signal)/In charge: Half yearly
                </span>

                <span class="heading_hindi">
        आवधिकता: तकनीशियन (सिग्नल): मासिक, अनुभागीय सीसेई /जेई (सिग्नल): त्रैमासिक, सीसेई (सिग्नल)/प्रभारी: अर्धवार्षिक



                </span>

                </div>
                <div class="modal-body table-responsive">
                    
                    <table class="" border='1'>
                        <thead class="">
                            <tr>
                                 <th scope="col">
                                    <span class="heading_english">
                                    S.No
                                    </span>

                                    <span class="heading_hindi">
                                        क्रम सं
                                    </span>
                                    
                                </th>
                                <th scope="col">
                                <span class="heading_english">
                                    Check the following
                                </span>

                                <span class="heading_hindi">
                                    निम्नलिखित की जाँच करें
                                </span>
                                    
                               </th>
                                <th scope="col">
                                <span class="heading_english">
                                    Action
                                </span>

                                <span class="heading_hindi">
                                    कार्रवाई
                                 </span>    
                                </th>
                            </tr>
                        </thead>
                        <tbody id="cs1_body">
                            <tr>
                                <th scope="row">1</th>
                                <td>Cleaning of LED lighting unit & current regulator/integrated LED, all terminations,
                                    housing, signal units & around signal post.</td>
                                <td style="vertical-align:middle;width:16%">
                                    <!-- <input class="form-control CS1Class" disable="true" readonly id="cs1_1"> -->
                                    <div id="cs1_1"></div>

                                </td>
                            </tr>



                            <tr>
                                <th scope="row" rowspan="6">2</th>
                                <td>Measurement of input voltage & current with clamp type ammeter at input terminals of
                                    current regulator/LED signal for all signal aspects and V/I reading shall be within
                                    specified range as below:</td>
                                <td rowspan="6" style="vertical-align:middle;width:16%">
                                    <!-- <input class="form-control CS1Class" disable="true" readonly id="cs1_2"> -->
                                    <div id="cs1_2"></div>

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
                                    <table style="width:100%" border='1'>
                                        <thead>
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
                                                <td>
                                                    <!-- <input id="date" readonly disable="true" class="form-control" type="date"> -->
                                                    <div id="date"></div>
                                                    </td>
                                                <td>
                                                    <!-- <input id="rg" readonly disable="true" class="form-control" type="text"> -->
                                                    <div id="rg"></div>
                                                </td>
                                                <td>
                                                    <!-- <input id="hg" readonly disable="true" class="form-control" type="text"> -->
                                                    <div id="hg"></div>

                                                </td>
                                                <td>
                                                    <!-- <input id="dg" readonly disable="true" class="form-control" type="text"> -->
                                                    <div id="dg"></div>
                                                </td>
                                                <td>
                                                    <!-- <input id="hhg" readonly disable="true" class="form-control" type="text"> -->
                                                    <div id="hhg"></div>
                                                </td>
                                                <td>
                                                    <!-- <input id="route" readonly disable="true" class="form-control" type="text"> -->
                                                    <div id="route"></div>
                                                    </td>
                                                <td>
                                                    <!-- <input id="c_on" readonly disable="true" class="form-control" type="text"> -->
                                                    <div id="c_on"></div>
                                                    </td>
                                                <td>
                                                    <!-- <input id="shout" readonly disable="true" class="form-control" type="text"> -->
                                                    <div id="shout"></div>
                                                    </td>
                                                <td>
                                                    <!-- <input id="nut_bolt" readonly disable="true" class="form-control" type="text"> -->
                                                    <div id="nut_bolt"></div>
                                                    </td>
                                                <td>
                                                    <!-- <input id="dome_clean" readonly disable="true" class="form-control" type="text"> -->
                                                    <div id="dome_clean"></div>
                                                    </td>

                                                <td>
                                                    <!-- <input id="cover" readonly disable="true" class="form-control" type="text"> -->
                                                    <div id="cover"></div>
                                                    </td>
                                                <td>
                                                    <!-- <input id="remark" readonly disable="true" class="form-control" type="text"> -->
                                                    <div id="remark"></div>
                                                    </td>


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
                                    <!-- <input class="form-control CS1Class" disable="true" readonly id="cs1_3"> -->
                                    <div id="cs1_3"></div>

                                </td>
                            </tr>

                            <tr>
                                <th scope="row">4</th>
                                <td>
                                    Ensure condition of signal post is satisfactory.

                                </td>
                                <td style="vertical-align:middle;width:16%">
                                    <!-- <input class="form-control CS1Class" disable="true" readonly id="cs1_4"> -->
                                    <div id="cs1_4"></div>

                                </td>
                            </tr>

                            <tr>
                                <th scope="row">5</th>
                                <td>
                                    Check condition of Signal foundation, ladder & ensure proper alignment of signal
                                    post.

                                </td>
                                <td style="vertical-align:middle;width:16%">
                                    <!-- <input class="form-control CS1Class" disable="true" readonly id="cs1_5"> -->
                                    <div id="cs1_5"></div>

                                </td>
                            </tr>

                            <tr>
                                <th scope="row">6</th>
                                <td>
                                    Ensure Signal unit condition, closing of door & locking arrangements are
                                    satisfactory.

                                </td>
                                <td style="vertical-align:middle;width:16%">
                                    <!-- <input class="form-control CS1Class" disable="true" readonly id="cs1_6"> -->
                                    <div id="cs1_6"></div>

                                </td>
                            </tr>

                            <tr>
                                <th scope="row">7</th>
                                <td>
                                    Ensure Signal post & CLS unit should be earthed & screen earthing is effective.
                                </td>
                                <td style="vertical-align:middle;width:16%">
                                    <!-- <input class="form-control CS1Class" disable="true" readonly id="cs1_7"> -->
                                    <div id="cs1_7"></div>

                                </td>
                            </tr>

                            <tr>
                                <th scope="row">8</th>
                                <td>
                                    Complete signal unit should be cleaned for removing oxidation, rusting & tightened
                                    properly.
                                </td>
                                <td style="vertical-align:middle;width:16%">
                                    <!-- <input class="form-control CS1Class" disable="true" readonly id="cs1_8"> -->
                                    <div id="cs1_8"></div>

                                </td>
                            </tr>

                            <tr>
                                <th scope="row">9</th>
                                <td>
                                    Ensure that there is no opening/access for rain water/rodent entry.

                                </td>
                                <td style="vertical-align:middle;width:16%">
                                    <!-- <input class="form-control CS1Class" disable="true" readonly id="cs1_9"> -->
                                    <div id="cs1_9"></div>

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
                                    <!-- <input class="form-control CS1Class" disable="true" readonly id="cs1_10"> -->
                                    <div id="cs1_10"></div>

                                </td>
                            </tr>

                            <tr>
                                <th scope="row">11</th>
                                <td>
                                    Visual check of insulations of cables, PVC wires, proper termination without criss
                                    cross, condition of rubber gasket arrangement.

                                </td>
                                <td style="vertical-align:middle;width:16%">
                                    <!-- <input class="form-control CS1Class" disable="true" readonly id="cs1_11"> -->
                                    <div id="cs1_11"></div>

                                </td>
                            </tr>

                            <tr>
                                <th rowspan="3" scope="row">12</th>
                                <td>
                                    (a) Check that where signals are Infringing with SOD, their Implantation distance is
                                    marked on Red colour on white back ground.
                                </td>
                                <td style="vertical-align:middle;width:16%">
                                    <!-- <input class="form-control CS1Class" disable="true" readonly id="cs1_12a"> -->
                                    <div id="cs1_12a"></div>

                                </td>
                            </tr>

                            <tr>
                                <td>
                                    (b) Blanking off to be done as given in chapter 19 of SEM.
                                </td>
                                <td style="vertical-align:middle;width:16%">
                                    <!-- <input class="form-control CS1Class" disable="true" readonly id="cs1_12b"> -->
                                    <div id="cs1_12b"></div>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    (c) Right hand signals to be provided with an arrow mark pointing towards the
                                    relevant
                                    track.
                                </td>
                                <td style="vertical-align:middle;width:16%">
                                    <!-- <input class="form-control CS1Class" disable="true" readonly id="cs1_12c"> -->
                                    <div id="cs1_12c"></div>

                                </td>
                            </tr>

                        </tbody>



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
                        <span class="badge badge-danger h3 displaySubcompoName"></span>
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
                            <?php echo $_SESSION['userretailerempName'] ?? '...'; ?>

                        </span>

                    </div>
                    <div class="col-6">
                        <span>Id:</span>
                        <span class="ml-2 font-weight-bold">

                            <?php echo $_SESSION['userretaileremp']; ?>
                        </span>

                    </div>

                    <div class="col-6">
                        <span>Section:</span>
                        <span class="ml-2 font-weight-bold">
                        <?php echo $empSectionName; ?>
                        </span>
                    </div>
                    <div class="col-6">
                    <span>Station:</span>

                    <span class="ml-2 font-weight-bold">
                    <?php echo $empStationName; ?>

                    </span>

                    </div>
                </div>
                <div class="m-2 text-center alert alert-danger" style="font-size:13px">
                    <span class="heading_english">
               
               Periodicity: Sectional SSE/JE : Half yearly
                <div>
                    SSE (signal)/Incharge : Yearly
                </div>
                </span>

                <span class="heading_hindi">
        आवधिकता: अनुभागीय सीसेई/जेई – अर्धवार्षिक
सीसेई (सिग्नल)/प्रभारी: वार्षिक 



                </span>
                </div>
                <div class="modal-body table-responsive">
                    <!-- <form id="modalFormComponent">
                   
                </form> -->
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                 <th scope="col">
                                    <span class="heading_english">
                                    S.No
                                    </span>

                                    <span class="heading_hindi">
                                        क्रम सं
                                    </span>
                                    
                                </th>
                                <th scope="col">
                                <span class="heading_english">
                                    Check the following
                                </span>

                                <span class="heading_hindi">
                                    निम्नलिखित की जाँच करें
                                </span>
                                    
                               </th>
                                <th scope="col">
                                <span class="heading_english">
                                    Action
                                </span>

                                <span class="heading_hindi">
                                    कार्रवाई
                                 </span>    
                                </th>
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
                           <span class="heading_english">
                    Schedule Code: DL1 (only for SSE/DLMC)
                </span>
                    <span class="heading_hindi">
                        डेटालॉगर का रखरखाव कार्यक्रम DL1
                    </span>
                        </span>
                        <span class="badge badge-danger h3 displaySubcompoName"></span>
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
                            <?php echo $_SESSION['userretailerempName'] ?? '...'; ?>

                        </span>

                    </div>
                    <div class="col-6">
                        <span>Id:</span>
                        <span class="ml-2 font-weight-bold">

                            <?php echo $_SESSION['userretaileremp']; ?>
                        </span>

                    </div>

                    <div class="col-6">
                        <span>Section:</span>
                        <span class="ml-2 font-weight-bold">
                        <?php echo $empSectionName; ?>
                        </span>
                    </div>
                    <div class="col-6">
                    <span>Station:</span>

                    <span class="ml-2 font-weight-bold">
                    <?php echo $empStationName; ?>

                    </span>

                    </div>
                </div>
                <div class="m-2 text-center alert alert-danger" style="font-size:13px">
                    <span class="heading_english">
               
                Periodicity: Technician (Signal): Monthly, Sectional SSE/JE (Signal): Quarterly, SSE (Signal/Incharge: Half Yearly
                </span>

                <span class="heading_hindi">
        आवधिकता: तकनीशियन (सिग्नल): मासिक, अनुभागीय सीसेई /जेई (सिग्नल): त्रैमासिक, सीसेई (सिग्नल)/प्रभारी: अर्धवार्षिक



                </span>
                </div>
                <div class="modal-body table-responsive">
                    <!-- <form id="modalFormComponent">
                   
                </form> -->
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                 <th scope="col">
                                    <span class="heading_english">
                                    S.No
                                    </span>

                                    <span class="heading_hindi">
                                        क्रम सं
                                    </span>
                                    
                                </th>
                                <th scope="col">
                                <span class="heading_english">
                                    Check the following
                                </span>

                                <span class="heading_hindi">
                                    निम्नलिखित की जाँच करें
                                </span>
                                    
                               </th>
                                <th scope="col">
                                <span class="heading_english">
                                    Action
                                </span>

                                <span class="heading_hindi">
                                    कार्रवाई
                                 </span>    
                                </th>
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
                             <span class="heading_english">
                    Schedule Code: DL2 (only for SSE/DLMC)
                </span>
                    <span class="heading_hindi">
                        डेटालॉगर का रखरखाव कार्यक्रम DL2
                    </span>
                        </span>
                        <span class="badge badge-danger h3 displaySubcompoName"></span>
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
                            <?php echo $_SESSION['userretailerempName'] ?? '...'; ?>

                        </span>

                    </div>
                    <div class="col-6">
                        <span>Id:</span>
                        <span class="ml-2 font-weight-bold">

                            <?php echo $_SESSION['userretaileremp']; ?>
                        </span>

                    </div>

                    <div class="col-6">
                        <span>Section:</span>
                        <span class="ml-2 font-weight-bold">
                        <?php echo $empSectionName; ?>
                        </span>
                    </div>
                    <div class="col-6">
                    <span>Station:</span>

                    <span class="ml-2 font-weight-bold">
                    <?php echo $empStationName; ?>

                    </span>

                    </div>
                </div>
                <div class="m-2 text-center alert alert-danger" style="font-size:13px">
                   <span class="heading_english">
               
                Periodicity: Sectional SSE/JE(Signal): Half Yearly, <br>
            SSE (Signal)/Incharge: Yearly
                </span>

                <span class="heading_hindi">
       आवधिकता: अनुभागीय सीसेई/जेई (सिग्नल): अर्ध-वार्षिक
सीसेई (सिग्नल)/प्रभारी: वार्षिक




                </span>
                </div>
                <div class="modal-body table-responsive">
                    <!-- <form id="modalFormComponent">
                   
                </form> -->
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">
                                    <span class="heading_english">
                                    S.No
                                    </span>

                                    <span class="heading_hindi">
                                        क्रम सं
                                    </span>
                                    
                                </th>
                                <th scope="col">
                                <span class="heading_english">
                                    Check the following
                                </span>

                                <span class="heading_hindi">
                                    निम्नलिखित की जाँच करें
                                </span>
                                    
                               </th>
                                <th scope="col">
                                <span class="heading_english">
                                    Action
                                </span>

                                <span class="heading_hindi">
                                    कार्रवाई
                                 </span>    
                                </th>
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
                            <span class="heading_english">
                    Schedule Code: DL3 (only for SSE/DLMC)
                </span>
                    <span class="heading_hindi">
                        डेटालॉगर का रखरखाव कार्यक्रम DL3
                    </span>
                        </span>
                        <span class="badge badge-danger h3 displaySubcompoName"></span>
                    </h5>
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> -->
                </div>
                <div class="row mx-2 px-2 py-1">
                    <div class="col-6">
                        <span>Name:</span>
                        <span class="ml-2 font-weight-bold">
                            <?php echo $_SESSION['userretailerempName'] ?? '...'; ?>

                        </span>

                    </div>
                    <div class="col-6">
                        <span>Id:</span>
                        <span class="ml-2 font-weight-bold">

                            <?php echo $_SESSION['userretaileremp']; ?>
                        </span>

                    </div>

                    <div class="col-6">
                        <span>Section:</span>
                        <span class="ml-2 font-weight-bold">
                        <?php echo $empSectionName; ?>
                        </span>
                    </div>
                    <div class="col-6">
                    <span>Station:</span>

                    <span class="ml-2 font-weight-bold">
                    <?php echo $empStationName; ?>

                    </span>

                    </div>
                </div>
                <div class="m-2 text-center alert alert-danger" style="font-size:13px">
                   <span class="heading_english">
               
                Periodicity: Sectional SSE/JE(Signal): Yearly,   SSE (Signal)/Incharge: Yearly
                </span>

                <span class="heading_hindi">
     आवधिकता: अनुभागीय सीसेई/जेई (सिग्नल): वार्षिक
सीसेई (सिग्नल)/प्रभारी: वार्षिक

                </span>
                </div>
                <div class="modal-body table-responsive">
                    <!-- <form id="modalFormComponent">
                   
                </form> -->
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                 <th scope="col">
                                    <span class="heading_english">
                                    S.No
                                    </span>

                                    <span class="heading_hindi">
                                        क्रम सं
                                    </span>
                                    
                                </th>
                                <th scope="col">
                                <span class="heading_english">
                                    Check the following
                                </span>

                                <span class="heading_hindi">
                                    निम्नलिखित की जाँच करें
                                </span>
                                    
                               </th>
                                <th scope="col">
                                <span class="heading_english">
                                    Action
                                </span>

                                <span class="heading_hindi">
                                    कार्रवाई
                                 </span>    
                                </th>
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
                           <span class="heading_english">
                    Schedule Code: DL4 (only for SSE/DLMC)
                </span>
                    <span class="heading_hindi">
                        डेटालॉगर का रखरखाव कार्यक्रम DL4
                    </span>
                        </span>
                        <span class="badge badge-danger h3 displaySubcompoName"></span>
                    </h5>
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> -->
                </div>
                <div class="row mx-2 px-2 py-1">
                    <div class="col-6">
                        <span>Name:</span>
                        <span class="ml-2 font-weight-bold">
                            <?php echo $_SESSION['userretailerempName'] ?? '...'; ?>

                        </span>

                    </div>
                    <div class="col-6">
                        <span>Id:</span>
                        <span class="ml-2 font-weight-bold">

                            <?php echo $_SESSION['userretaileremp']; ?>
                        </span>

                    </div>

                    <div class="col-6">
                        <span>Section:</span>
                        <span class="ml-2 font-weight-bold">
                        <?php echo $empSectionName; ?>
                        </span>
                    </div>
                    <div class="col-6">
                    <span>Station:</span>

                    <span class="ml-2 font-weight-bold">
                    <?php echo $empStationName; ?>

                    </span>

                    </div>
                </div>
                <div class="m-2 text-center alert alert-danger" style="font-size:13px">
                    <span class="heading_english">
               
                Periodicity: SSE (Signal)/Incharge: Yearly
                </span>

                <span class="heading_hindi">
    आवधिकता: सीसेई (सिग्नल)/डीएलएमसी: वार्षिक
                </span>
                </div>
                <div class="modal-body table-responsive">
                    <!-- <form id="modalFormComponent">
                   
                </form> -->
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">
                                    <span class="heading_english">
                                    S.No
                                    </span>

                                    <span class="heading_hindi">
                                        क्रम सं
                                    </span>
                                    
                                </th>
                                <th scope="col">
                                <span class="heading_english">
                                    Check the following
                                </span>

                                <span class="heading_hindi">
                                    निम्नलिखित की जाँच करें
                                </span>
                                    
                               </th>
                                <th scope="col">
                                <span class="heading_english">
                                    Action
                                </span>

                                <span class="heading_hindi">
                                    कार्रवाई
                                 </span>    
                                </th>
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

<!-- Modal MLB1 -->
<div class="modal fade" id="componentForm_MLB1" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="componentFormLabelMLB1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <form>
        <div class="modal-content">
            <div id="pdfBodyMLB1">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="componentFormLabelMLB1">
                    <span class="badge badge-success h3">
                    <span class="heading_english">
                    Maintenance Schedule of Mechanical Lifting Barrier MLB1
                </span>
                     <span class="heading_hindi">
                        मैकेनिकल लिफ्टिंग बैरी का रखरखाव कार्यक्रम MLB1
                     </span>
                    </span>
                    <span class="badge badge-danger h3 displaySubcompoName"></span>

                </h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> -->
            </div>

            <div class="row mx-2 px-2 py-1">
                    <div class="col-6">
                        <span>Name:</span>
                        <span class="ml-2 font-weight-bold">
                            <?php echo $_SESSION['userretailerempName'] ?? '...'; ?>

                        </span>

                    </div>
                    <div class="col-6">
                        <span>Id:</span>
                        <span class="ml-2 font-weight-bold">

                            <?php echo $_SESSION['userretaileremp']; ?>
                        </span>

                    </div>

                    <div class="col-6">
                        <span>Section:</span>
                        <span class="ml-2 font-weight-bold">
                        <?php echo $empSectionName; ?>
                        </span>
                    </div>
                    <div class="col-6">
                    <span>Station:</span>

                    <span class="ml-2 font-weight-bold">
                    <?php echo $empStationName; ?>

                    </span>

                    </div>
                </div>

            <div class="m-2 text-center alert alert-danger" style="font-size:13px">
            <span class="heading_english">
               
                 Periodicity: Technician (Signal): Fortnightly,
            Sectional SSE/JE (Signal): Monthly
            SSE(Signal)/ Incharge : Quarterly
                </span>

                <span class="heading_hindi">
    आवधिकता: तकनीशियन (सिग्नल): पाक्षिक
अनुभागीय सीसेई/जेई (सिग्नल): अर्ध-वार्षिक
सीसेई (सिग्नल)/प्रभारी: वार्षिक

                </span>
            </div>
            <div class="modal-body table-responsive">
                <!-- <form id="modalFormComponent">
                   
                </form> -->
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">
                                    <span class="heading_english">
                                    S.No
                                    </span>

                                    <span class="heading_hindi">
                                        क्रम सं
                                    </span>
                                    
                                </th>
                                <th scope="col">
                                <span class="heading_english">
                                    Check the following
                                </span>

                                <span class="heading_hindi">
                                    निम्नलिखित की जाँच करें
                                </span>
                                    
                               </th>
                                <th scope="col">
                                <span class="heading_english">
                                    Action
                                </span>

                                <span class="heading_hindi">
                                    कार्रवाई
                                 </span>    
                                </th>
                        </tr>
                    </thead>
                    <tbody id="mlb1_body">

                    </tbody>
                </table>
            </div>
            </div>

            <div class="card-footer d-flex justify-content-between">
                <div id="mlb1Form_status"></div>

                <div>
                    <!-- <button type='reset' class="btn btn-sm btn-danger">Reset</button>
                    <button type='button' id="mlb1FormBtn" class="btn btn-sm btn-success">Final Submit</button> -->

                    <button type='button' id="dl3PdfBtn" onclick="generatePdf('MLB1','pdfBodyMLB1')"
                    class="btn btn-success btn-sm">PDF</button>

                    <button type="button" class="btn btn-sm btn-secondary mx-2" data-dismiss="modal" aria-label="Close">
                        Close
                    </button>

                </div>
            </div>

        </div>
        </form>
    </div>
</div>

<!-- Modal MLB2 -->
<div class="modal fade" id="componentForm_MLB2" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="componentFormLabelMLB2" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <form>
        <div class="modal-content">

            <div id="pdfBodyMLB2">

            <div class="modal-header">
                <h5 class="modal-title text-center" id="componentFormLabelMLB2">
                    <span class="badge badge-success h3">
                 <span class="heading_english">
                    Maintenance Schedule of Mechanical Lifting Barrier MLB2
                </span>
                     <span class="heading_hindi">
                        मैकेनिकल लिफ्टिंग बैरी का रखरखाव कार्यक्रम MLB2
                     </span>
                    </span>
                    <span class="badge badge-danger h3 displaySubcompoName"></span>

                </h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> -->
            </div>

            <div class="row mx-2 px-2 py-1">
                    <div class="col-6">
                        <span>Name:</span>
                        <span class="ml-2 font-weight-bold">
                            <?php echo $_SESSION['userretailerempName'] ?? '...'; ?>

                        </span>

                    </div>
                    <div class="col-6">
                        <span>Id:</span>
                        <span class="ml-2 font-weight-bold">

                            <?php echo $_SESSION['userretaileremp']; ?>
                        </span>

                    </div>

                    <div class="col-6">
                        <span>Section:</span>
                        <span class="ml-2 font-weight-bold">
                        <?php echo $empSectionName; ?>
                        </span>
                    </div>
                    <div class="col-6">
                    <span>Station:</span>

                    <span class="ml-2 font-weight-bold">
                    <?php echo $empStationName; ?>

                    </span>

                    </div>
                </div>

            <div class="m-2 text-center alert alert-danger" style="font-size:13px">
           
             <span class="heading_english">
                Periodicity: Technician (Signal): Quarterly,
            Sectional SSE/JE (Signal): Monthly
            SSE(Signal)/ Incharge : Half-yearly
                </span>

                <span class="heading_hindi">
   आवधिकता: तकनीशियन (सिग्नल): मासिक
अनुभागीय सीसेई/जेई (सिग्नल): त्रेमासिक
सीसेई (सिग्नल)/प्रभारी: अर्ध-वार्षिक


                </span>
            </div>
            <div class="modal-body table-responsive">
                <!-- <form id="modalFormComponent">
                   
                </form> -->
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">
                                    <span class="heading_english">
                                    S.No
                                    </span>

                                    <span class="heading_hindi">
                                        क्रम सं
                                    </span>
                                    
                                </th>
                                <th scope="col">
                                <span class="heading_english">
                                    Check the following
                                </span>

                                <span class="heading_hindi">
                                    निम्नलिखित की जाँच करें
                                </span>
                                    
                               </th>
                                <th scope="col">
                                <span class="heading_english">
                                    Action
                                </span>

                                <span class="heading_hindi">
                                    कार्रवाई
                                 </span>    
                                </th>
                        </tr>
                    </thead>
                    <tbody id="mlb2_body">

                    </tbody>
                </table>
            </div>

            </div>


            <div class="card-footer d-flex justify-content-between">
                <div id="mlb2Form_status"></div>

                <div>
                    <!-- <button type='reset' class="btn btn-sm btn-danger">Reset</button>
                    <button type='button' id="mlb2FormBtn" class="btn btn-sm btn-success">Final Submit</button> -->
                    <button type='button' id="dl3PdfBtn" onclick="generatePdf('MLB2','pdfBodyMLB2')"
                    class="btn btn-success btn-sm">PDF</button>

                    <button type="button" class="btn btn-sm btn-secondary mx-2" data-dismiss="modal" aria-label="Close">
                        Close
                    </button>

                </div>
            </div>

        </div>
        </form>
    </div>
</div>

<!-- Modal MLB3 -->
<div class="modal fade" id="componentForm_MLB3" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="componentFormLabelMLB3" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <form>
        <div class="modal-content">
            <div id="pdfBodyMLB3">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="componentFormLabelMLB3">
                    <span class="badge badge-success h3">
                    <span class="heading_english">
                    Maintenance Schedule of Mechanical Lifting Barrier MLB3
                </span>
                     <span class="heading_hindi">
                        मैकेनिकल लिफ्टिंग बैरी का रखरखाव कार्यक्रम MLB3
                     </span>
                    </span>
                    <span class="badge badge-danger h3 displaySubcompoName"></span>

                </h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> -->
            </div>

            <div class="row mx-2 px-2 py-1">
                    <div class="col-6">
                        <span>Name:</span>
                        <span class="ml-2 font-weight-bold">
                            <?php echo $_SESSION['userretailerempName'] ?? '...'; ?>

                        </span>

                    </div>
                    <div class="col-6">
                        <span>Id:</span>
                        <span class="ml-2 font-weight-bold">

                            <?php echo $_SESSION['userretaileremp']; ?>
                        </span>

                    </div>

                    <div class="col-6">
                        <span>Section:</span>
                        <span class="ml-2 font-weight-bold">
                        <?php echo $empSectionName; ?>
                        </span>
                    </div>
                    <div class="col-6">
                    <span>Station:</span>

                    <span class="ml-2 font-weight-bold">
                    <?php echo $empStationName; ?>

                    </span>

                    </div>
                </div>
            <div class="m-2 text-center alert alert-danger" style="font-size:13px">
            <span class="heading_english">
              Periodicity: Technician (Signal): Quarterly,
            Sectional SSE/JE (Signal): Half-yearly
            SSE(Signal)/ Incharge : Yearly
                </span>

                <span class="heading_hindi">
   आवधिकता: तकनीशियन (सिग्नल): त्रेमासिक
अनुभागीय सीसेई/जेई (सिग्नल): अर्ध- वार्षिक
सीसेई (सिग्नल)/प्रभारी: वार्षिक

                </span>
            </div>
            <div class="modal-body table-responsive">
                <!-- <form id="modalFormComponent">
                   
                </form> -->
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">S.No</th>
                            <th scope="col">Check the following</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody id="mlb3_body">

                    </tbody>
                </table>
            </div>

            </div>


            <div class="card-footer d-flex justify-content-between">
                <div id="mlb3Form_status"></div>

                <div>
                    <!-- <button type='reset' class="btn btn-sm btn-danger">Reset</button>
                    <button type='button' id="mlb3FormBtn" class="btn btn-sm btn-success">Final Submit</button> -->
                    <button type='button' id="dl3PdfBtn" onclick="generatePdf('MLB3','pdfBodyMLB3')"
                    class="btn btn-success btn-sm">PDF</button>

                    <button type="button" class="btn btn-sm btn-secondary mx-2" data-dismiss="modal" aria-label="Close">
                        Close
                    </button>
                </div>
            </div>

        </div>
        </form>
    </div>
</div>

<!-- Modal SLB1 -->

<div class="modal fade" id="componentForm_SLB1" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="componentFormLabelSLB1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <form>
        <div class="modal-content">
            <div id="pdfBodySLB1">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="componentFormLabelMLB1">
                    <span class="badge badge-success h3">
                   <span class="heading_english">
                    Maintenance Schedule of Sliding Boom SLB1
                </span>
                 <span class="heading_hindi">
                    स्लाइडिंग बूम का रखरखाव कार्यक्रम SLB1
                 </span>

                    </span>
                    <span class="badge badge-danger h3 displaySubcompoName"></span>

                </h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> -->
            </div>

            <div class="row mx-2 px-2 py-1">
                    <div class="col-6">
                        <span>Name:</span>
                        <span class="ml-2 font-weight-bold">
                            <?php echo $_SESSION['userretailerempName'] ?? '...'; ?>

                        </span>

                    </div>
                    <div class="col-6">
                        <span>Id:</span>
                        <span class="ml-2 font-weight-bold">

                            <?php echo $_SESSION['userretaileremp']; ?>
                        </span>

                    </div>

                    <div class="col-6">
                        <span>Section:</span>
                        <span class="ml-2 font-weight-bold">
                        <?php echo $empSectionName; ?>
                        </span>
                    </div>
                    <div class="col-6">
                    <span>Station:</span>

                    <span class="ml-2 font-weight-bold">
                    <?php echo $empStationName; ?>

                    </span>

                    </div>
            </div>
            <div class="m-2 text-center alert alert-danger" style="font-size:13px">
              <span class="heading_english">
              Periodicity: Technician (Signal): Fortnightly,
                          Sectional SSE/JE (Signal): Monthly,
                     SSE(Signal)/Incharge: ): Quarterly 
                </span>

                <span class="heading_hindi">
 आवधिकता: तकनीशियन (सिग्नल): पाक्षिक
                                   अनुभागीय सीसेई/जेई (सिग्नल): मासिक
           सीसेई (सिग्नल)/प्रभारी: त्रैमासिक




                </span>
            </div>
            <div class="modal-body table-responsive">
                <!-- <form id="modalFormComponent">
                   
                </form> -->
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">
                                    <span class="heading_english">
                                    S.No
                                    </span>

                                    <span class="heading_hindi">
                                        क्रम सं
                                    </span>
                                    
                                </th>
                                <th scope="col">
                                <span class="heading_english">
                                    Check the following
                                </span>

                                <span class="heading_hindi">
                                    निम्नलिखित की जाँच करें
                                </span>
                                    
                               </th>
                                <th scope="col">
                                <span class="heading_english">
                                    Action
                                </span>

                                <span class="heading_hindi">
                                    कार्रवाई
                                 </span>    
                                </th>
                        </tr>
                    </thead>
                    <tbody id="slb1_body">

                    </tbody>
                </table>
            </div>
            </div>

            <div class="card-footer d-flex justify-content-between">
                <div id="slb1Form_status"></div>

                <div>
                <button type='button' id="slb1PdfBtn" onclick="generatePdf('SLB1','pdfBodySLB1')"
                    class="btn btn-success btn-sm">PDF</button>

                    <button type="button" class="btn btn-sm btn-secondary mx-2" data-dismiss="modal" aria-label="Close">
                        Close
                    </button>
                </div>
            </div>

        </div>
        </form>
    </div>
</div>


<!-- Modal SLB2 -->
<div class="modal fade" id="componentForm_SLB2" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="componentFormLabelSLB2" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <form>
        <div class="modal-content">
            <div id="pdfBodySLB2">

            <div class="modal-header">
                <h5 class="modal-title text-center" id="componentFormLabelMLB1">
                    <span class="badge badge-success h3">
                     <span class="heading_english">
                    Maintenance Schedule of Sliding Boom SLB2


                </span>
                 <span class="heading_hindi">
                    स्लाइडिंग बूम का रखरखाव कार्यक्रम SLB2
                 </span>

                    </span>
                    <span class="badge badge-danger h3 displaySubcompoName"></span>

                </h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> -->
            </div>
            
            <div class="row mx-2 px-2 py-1">
                    <div class="col-6">
                        <span>Name:</span>
                        <span class="ml-2 font-weight-bold">
                            <?php echo $_SESSION['userretailerempName'] ?? '...'; ?>

                        </span>

                    </div>
                    <div class="col-6">
                        <span>Id:</span>
                        <span class="ml-2 font-weight-bold">

                            <?php echo $_SESSION['userretaileremp']; ?>
                        </span>

                    </div>

                    <div class="col-6">
                        <span>Section:</span>
                        <span class="ml-2 font-weight-bold">
                        <?php echo $empSectionName; ?>
                        </span>
                    </div>
                    <div class="col-6">
                    <span>Station:</span>

                    <span class="ml-2 font-weight-bold">
                    <?php echo $empStationName; ?>

                    </span>

                    </div>
            </div>
            <div class="m-2 text-center alert alert-danger" style="font-size:13px">
         <span class="heading_english">
               Periodicity: Technician (Signal): Monthly,
                          Sectional SSE/JE (Signal): Quarterly,
                     SSE(Signal)/Incharge: ): Half-Yearly

                </span>

                <span class="heading_hindi">
 आवधिकता: तकनीशियन (सिग्नल) : मासिक
                                   अनुभागीय सीसेई/जेई (सिग्नल) : त्रैमासिक
           सीसेई (सिग्नल)/प्रभारी : अर्ध-वार्षिक




                </span>
            </div>
            <div class="modal-body table-responsive">
                <!-- <form id="modalFormComponent">
                   
                </form> -->
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">
                                    <span class="heading_english">
                                    S.No
                                    </span>

                                    <span class="heading_hindi">
                                        क्रम सं
                                    </span>
                                    
                                </th>
                                <th scope="col">
                                <span class="heading_english">
                                    Check the following
                                </span>

                                <span class="heading_hindi">
                                    निम्नलिखित की जाँच करें
                                </span>
                                    
                               </th>
                                <th scope="col">
                                <span class="heading_english">
                                    Action
                                </span>

                                <span class="heading_hindi">
                                    कार्रवाई
                                 </span>    
                                </th>
                        </tr>
                    </thead>
                    <tbody id="slb2_body">

                    </tbody>
                </table>
            </div>

            </div>


            <div class="card-footer d-flex justify-content-between">

                <div>
                <button type='button' id="slb2PdfBtn" onclick="generatePdf('SLB2','pdfBodySLB2')"
                    class="btn btn-success btn-sm">PDF</button>

                    <button type="button" class="btn btn-sm btn-secondary mx-2" data-dismiss="modal" aria-label="Close">
                        Close
                    </button>
                </div>
            </div>

        </div>
        </form>
    </div>
</div>

<!-- For ELB -->
<!-- Modal ELB1 -->
<div class="modal fade" id="componentForm_ELB1" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="componentFormLabelELB1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <form>
        <div class="modal-content">
            <div id="pdfBodyELB1">

            <div class="modal-header">

                <h5 class="modal-title text-center" id="componentFormLabelELB1">
                    <span class="badge badge-success h3">
                  <span class="heading_english">
                  Maintenance Schedule of Power Operated Lifting Barrier ELB1
              </span>
              <span class="heading_hindi">
                विद्युत चालित लिफ्टिंग बैरियर का रखरखाव कार्यक्रम ELB1
              </span>


                    </span>
                    <span class="badge badge-danger h3 displaySubcompoName"></span>

                </h5>
                
            </div>
            <div class="row mx-2 px-2 py-1">
                    <div class="col-6">
                        <span>Name:</span>
                        <span class="ml-2 font-weight-bold">
                            <?php echo $_SESSION['userretailerempName'] ?? '...'; ?>

                        </span>

                    </div>
                    <div class="col-6">
                        <span>Id:</span>
                        <span class="ml-2 font-weight-bold">

                            <?php echo $_SESSION['userretaileremp']; ?>
                        </span>

                    </div>

                    <div class="col-6">
                        <span>Section:</span>
                        <span class="ml-2 font-weight-bold">
                        <?php echo $empSectionName; ?>
                        </span>
                    </div>
                    <div class="col-6">
                    <span>Station:</span>

                    <span class="ml-2 font-weight-bold">
                    <?php echo $empStationName; ?>

                    </span>

                    </div>
                </div>
            <div class="m-2 text-center alert alert-danger" style="font-size:13px">
           <span class="heading_english">
                Periodicity: Technician (Signal): Fortnightly,
                          Sectional SSE/JE (Signal): Monthly,
                     SSE(Signal)/Incharge: Quarterly
                     

                </span>

                <span class="heading_hindi">
आवधिकता: तकनीशियन (सिग्नल): पाक्षिक
                 अनुभागीय सीसेई/जेई (सिग्नल): मासिक
           सीसेई (सिग्नल)/प्रभारी: त्रैमासिक





                </span>


            </div>
            <div class="modal-body table-responsive">
                <!-- <form id="modalFormComponent">
                   
                </form> -->
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">
                                    <span class="heading_english">
                                    S.No
                                    </span>

                                    <span class="heading_hindi">
                                        क्रम सं
                                    </span>
                                    
                                </th>
                                <th scope="col">
                                <span class="heading_english">
                                    Check the following
                                </span>

                                <span class="heading_hindi">
                                    निम्नलिखित की जाँच करें
                                </span>
                                    
                               </th>
                                <th scope="col">
                                <span class="heading_english">
                                    Action
                                </span>

                                <span class="heading_hindi">
                                    कार्रवाई
                                 </span>    
                                </th>
                        </tr>
                    </thead>
                    <tbody id="elb1_body">

                    </tbody>
                </table>
            </div>
</div>
            <div class="card-footer d-flex justify-content-between">
                <div id="elb1Form_status"></div>

                <div>
                     <button type='button' id="elb1PdfBtn" onclick="generatePdf('ELB1','pdfBodyELB1')"
                    class="btn btn-success btn-sm">PDF</button>

                <button type="button" class="btn btn-sm btn-secondary mx-2" data-dismiss="modal" aria-label="Close">
                    Close
                </button>

                </div>
            </div>

        </div>
        </form>
    </div>
</div>


<!-- Modal ELB2 -->
<div class="modal fade" id="componentForm_ELB2" data-backdrop="static" data-keyboard="false" tabindex="-1"  aria-labelledby="componentFormLabelELB2" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <form>
        <div class="modal-content">
            <div id="pdfBodyELB2">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="componentFormLabelELB2">
                    <span class="badge badge-success h3">
                   <span class="heading_english">
                  Maintenance Schedule of Power Operated Lifting Barrier ELB2
              </span>
              <span class="heading_hindi">
                विद्युत चालित लिफ्टिंग बैरियर का रखरखाव कार्यक्रम ELB2
              </span>



                    </span>
                    <span class="badge badge-danger h3 displaySubcompoName"></span>

                </h5>
             
            </div>
            <div class="row mx-2 px-2 py-1">
                    <div class="col-6">
                        <span>Name:</span>
                        <span class="ml-2 font-weight-bold">
                            <?php echo $_SESSION['userretailerempName'] ?? '...'; ?>

                        </span>

                    </div>
                    <div class="col-6">
                        <span>Id:</span>
                        <span class="ml-2 font-weight-bold">

                            <?php echo $_SESSION['userretaileremp']; ?>
                        </span>

                    </div>

                    <div class="col-6">
                        <span>Section:</span>
                        <span class="ml-2 font-weight-bold">
                        <?php echo $empSectionName; ?>
                        </span>
                    </div>
                    <div class="col-6">
                    <span>Station:</span>

                    <span class="ml-2 font-weight-bold">
                    <?php echo $empStationName; ?>

                    </span>

                    </div>
                </div>
            <div class="m-2 text-center alert alert-danger" style="font-size:13px">
          <span class="heading_english">
               Periodicity: Technician (Signal): Monthly,
                          Sectional SSE/JE (Signal): Quarterly,
                     SSE(Signal)/Incharge: Half-yearly
                     

                </span>

                <span class="heading_hindi">
आवधिकता: तकनीशियन (सिग्नल): मासिक
                 अनुभागीय सीसेई/जेई (सिग्नल): त्रैमासिक
           सीसेई (सिग्नल)/प्रभारी: अर्धवार्षिक


                </span>



            </div>
            <div class="modal-body table-responsive">
                <!-- <form id="modalFormComponent">
                   
                </form> -->
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">
                                    <span class="heading_english">
                                    S.No
                                    </span>

                                    <span class="heading_hindi">
                                        क्रम सं
                                    </span>
                                    
                                </th>
                                <th scope="col">
                                <span class="heading_english">
                                    Check the following
                                </span>

                                <span class="heading_hindi">
                                    निम्नलिखित की जाँच करें
                                </span>
                                    
                               </th>
                                <th scope="col">
                                <span class="heading_english">
                                    Action
                                </span>

                                <span class="heading_hindi">
                                    कार्रवाई
                                 </span>    
                                </th>
                        </tr>
                    </thead>
                    <tbody id="elb2_body">

                    </tbody>
                </table>
            </div>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <div id="elb2Form_status"></div>

                <div>
                   <button type='button' id="elb2PdfBtn" onclick="generatePdf('ELB2','pdfBodyELB2')"
                    class="btn btn-success btn-sm">PDF</button>

                <button type="button" class="btn btn-sm btn-secondary mx-2" data-dismiss="modal" aria-label="Close">
                    Close
                </button>


                </div>
            </div>

        </div>
        </form>
    </div>
</div>


<!-- Modal ELB3 -->
<div class="modal fade" id="componentForm_ELB3" data-backdrop="static" data-keyboard="false" tabindex="-1"  aria-labelledby="componentFormLabelELB4" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <form>
        <div class="modal-content">
            <div id="pdfBodyELB3">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="componentFormLabelELB3">
                    <span class="badge badge-success h3">
                  <span class="heading_english">
                  Maintenance Schedule of Power Operated Lifting Barrier ELB3
              </span>
              <span class="heading_hindi">
                विद्युत चालित लिफ्टिंग बैरियर का रखरखाव कार्यक्रम ELB3
              </span>


                    </span>
                    <span class="badge badge-danger h3 displaySubcompoName"></span>

                </h5>
               
            </div>
            <div class="row mx-2 px-2 py-1">
                    <div class="col-6">
                        <span>Name:</span>
                        <span class="ml-2 font-weight-bold">
                            <?php echo $_SESSION['userretailerempName'] ?? '...'; ?>

                        </span>

                    </div>
                    <div class="col-6">
                        <span>Id:</span>
                        <span class="ml-2 font-weight-bold">

                            <?php echo $_SESSION['userretaileremp']; ?>
                        </span>

                    </div>

                    <div class="col-6">
                        <span>Section:</span>
                        <span class="ml-2 font-weight-bold">
                        <?php echo $empSectionName; ?>
                        </span>
                    </div>
                    <div class="col-6">
                    <span>Station:</span>

                    <span class="ml-2 font-weight-bold">
                    <?php echo $empStationName; ?>

                    </span>

                    </div>
                </div>
            <div class="m-2 text-center alert alert-danger" style="font-size:13px">
          <span class="heading_english">
               Periodicity: Technician (Signal): Monthly,
                          Sectional SSE/JE (Signal): Quarterly,
                     SSE(Signal)/Incharge: Half-yearly
                     

                </span>

                <span class="heading_hindi">
आवधिकता: तकनीशियन (सिग्नल): मासिक
                 अनुभागीय सीसेई/जेई (सिग्नल): त्रैमासिक
           सीसेई (सिग्नल)/प्रभारी: अर्धवार्षिक


                </span>



            </div>
            <div class="modal-body table-responsive">
                <!-- <form id="modalFormComponent">
                   
                </form> -->
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                             <th scope="col">
                                    <span class="heading_english">
                                    S.No
                                    </span>

                                    <span class="heading_hindi">
                                        क्रम सं
                                    </span>
                                    
                                </th>
                                <th scope="col">
                                <span class="heading_english">
                                    Check the following
                                </span>

                                <span class="heading_hindi">
                                    निम्नलिखित की जाँच करें
                                </span>
                                    
                               </th>
                                <th scope="col">
                                <span class="heading_english">
                                    Action
                                </span>

                                <span class="heading_hindi">
                                    कार्रवाई
                                 </span>    
                                </th>
                        </tr>
                    </thead>
                    <tbody id="elb3_body">

                    </tbody>
                </table>
            </div>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <div id="elb3Form_status"></div>

                <div>
                    <button type='button' id="elb3PdfBtn" onclick="generatePdf('ELB3','pdfBodyELB3')"
                    class="btn btn-success btn-sm">PDF</button>

                <button type="button" class="btn btn-sm btn-secondary mx-2" data-dismiss="modal" aria-label="Close">
                    Close
                </button>
                </div>
            </div>

        </div>
        </form>
    </div>
</div>


<!-- Modal ELB4 -->
<div class="modal fade" id="componentForm_ELB4" data-backdrop="static" data-keyboard="false" tabindex="-1"  aria-labelledby="componentFormLabelELB4" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <form>
        <div class="modal-content">
            <div id="pdfBodyELB4">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="componentFormLabelELB4">
                    <span class="badge badge-success h3">
                  <span class="heading_english">
                  Maintenance Schedule of Power Operated Lifting Barrier ELB4
              </span>
              <span class="heading_hindi">
                विद्युत चालित लिफ्टिंग बैरियर का रखरखाव कार्यक्रम ELB4
              </span>

                    </span>


                    </span>
                    <span class="badge badge-danger h3 displaySubcompoName"></span>

                </h5>
                
            </div>
            <div class="row mx-2 px-2 py-1">
                    <div class="col-6">
                        <span>Name:</span>
                        <span class="ml-2 font-weight-bold">
                            <?php echo $_SESSION['userretailerempName'] ?? '...'; ?>

                        </span>

                    </div>
                    <div class="col-6">
                        <span>Id:</span>
                        <span class="ml-2 font-weight-bold">

                            <?php echo $_SESSION['userretaileremp']; ?>
                        </span>

                    </div>

                    <div class="col-6">
                        <span>Section:</span>
                        <span class="ml-2 font-weight-bold">
                        <?php echo $empSectionName; ?>
                        </span>
                    </div>
                    <div class="col-6">
                    <span>Station:</span>

                    <span class="ml-2 font-weight-bold">
                    <?php echo $empStationName; ?>

                    </span>

                    </div>
                </div>
            <div class="m-2 text-center alert alert-danger" style="font-size:13px">
          
                      <span class="heading_english">
              Periodicity: SSE (Signal)/Incharge : Yearly
                     

                </span>

                <span class="heading_hindi">
आवधिकता: सीसेई (सिग्नल)/प्रभारी: वार्षिक


                </span>

            </div>
            <div class="modal-body table-responsive">
                <!-- <form id="modalFormComponent">
                   
                </form> -->
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">
                                    <span class="heading_english">
                                    S.No
                                    </span>

                                    <span class="heading_hindi">
                                        क्रम सं
                                    </span>
                                    
                                </th>
                                <th scope="col">
                                <span class="heading_english">
                                    Check the following
                                </span>

                                <span class="heading_hindi">
                                    निम्नलिखित की जाँच करें
                                </span>
                                    
                               </th>
                                <th scope="col">
                                <span class="heading_english">
                                    Action
                                </span>

                                <span class="heading_hindi">
                                    कार्रवाई
                                 </span>    
                                </th>
                        </tr>
                    </thead>
                    <tbody id="elb4_body">

                    </tbody>
                </table>
            </div>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <div id="elb4Form_status"></div>

                <div>
                     <button type='button' id="elb4PdfBtn" onclick="generatePdf('ELB4','pdfBodyELB4')"
                    class="btn btn-success btn-sm">PDF</button>

                <button type="button" class="btn btn-sm btn-secondary mx-2" data-dismiss="modal" aria-label="Close">
                    Close
                </button>

                </div>
            </div>

        </div>
        </form>
    </div>
</div>


<!-- Modal ELB5 -->
<div class="modal fade" id="componentForm_ELB5" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="componentFormLabelELB5" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <form>
        <div class="modal-content">
            <div id="pdfBodyELB5">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="componentFormLabelELB5">
                    <span class="badge badge-success h3">
                <span class="heading_english">
                  Maintenance Schedule of Power Operated Lifting Barrier ELB5
              </span>
              <span class="heading_hindi">
                विद्युत चालित लिफ्टिंग बैरियर का रखरखाव कार्यक्रम ELB5
              </span>


                    </span>
                    <span class="badge badge-danger h3 displaySubcompoName"></span>

                </h5>
               
            </div>
            <div class="row mx-2 px-2 py-1">
                    <div class="col-6">
                        <span>Name:</span>
                        <span class="ml-2 font-weight-bold">
                            <?php echo $_SESSION['userretailerempName'] ?? '...'; ?>

                        </span>

                    </div>
                    <div class="col-6">
                        <span>Id:</span>
                        <span class="ml-2 font-weight-bold">

                            <?php echo $_SESSION['userretaileremp']; ?>
                        </span>

                    </div>

                    <div class="col-6">
                        <span>Section:</span>
                        <span class="ml-2 font-weight-bold">
                        <?php echo $empSectionName; ?>
                        </span>
                    </div>
                    <div class="col-6">
                    <span>Station:</span>

                    <span class="ml-2 font-weight-bold">
                    <?php echo $empStationName; ?>

                    </span>

                    </div>
                </div>
            <div class="m-2 text-center alert alert-danger" style="font-size:13px">
       <span class="heading_english">
               Periodicity: SSE (Signal)/Incharge : Yearly
                     

                </span>

                <span class="heading_hindi">
आवधिकता: तकनीशियन (सिग्नल): मासिक
                 अनुभागीय सीसेई/जेई (सिग्नल): त्रैमासिक
           सीसेई (सिग्नल)/प्रभारी: अर्धवार्षिक


                </span>



            </div>
            <div class="modal-body table-responsive">
                <!-- <form id="modalFormComponent">
                   
                </form> -->
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">
                                    <span class="heading_english">
                                    S.No
                                    </span>

                                    <span class="heading_hindi">
                                        क्रम सं
                                    </span>
                                    
                                </th>
                                <th scope="col">
                                <span class="heading_english">
                                    Check the following
                                </span>

                                <span class="heading_hindi">
                                    निम्नलिखित की जाँच करें
                                </span>
                                    
                               </th>
                                <th scope="col">
                                <span class="heading_english">
                                    Action
                                </span>

                                <span class="heading_hindi">
                                    कार्रवाई
                                 </span>    
                                </th>
                        </tr>
                    </thead>
                    <tbody id="elb5_body">

                    </tbody>
                </table>
            </div>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <div id="elb5Form_status"></div>

                <div>
                    <button type='button' id="elb5PdfBtn" onclick="generatePdf('ELB5','pdfBodyELB5')"
                    class="btn btn-success btn-sm">PDF</button>

                <button type="button" class="btn btn-sm btn-secondary mx-2" data-dismiss="modal" aria-label="Close">
                    Close
                </button>

                </div>
            </div>

        </div>
        </form>
    </div>
</div>


<!-- modal DAC -->

<!-- Modal DAC1 -->
<div class="modal fade" id="componentForm_DAC1" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="componentFormLabelDAC1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <form>
        <div class="modal-content">
            <div id="pdfBodyDAC1">

            <div class="modal-header">

                <h5 class="modal-title text-center" id="componentFormLabelDAC1">
                    <span class="badge badge-success h3">
                    <span class="heading_english">
                  Maintenance Schedule of Digital Axle Counter DAC1
              </span>
                  <span class="heading_hindi">
                    कंट्रोल पैनल के रखरखाव का कार्यक्रम DAC1
                  </span>


                    </span>
                    <span class="badge badge-danger h3 displaySubcompoName"></span>

                </h5>
                
            </div>
            <div class="row mx-2 px-2 py-1">
                    <div class="col-6">
                        <span>Name:</span>
                        <span class="ml-2 font-weight-bold">
                            <?php echo $_SESSION['userretailerempName'] ?? '...'; ?>

                        </span>

                    </div>
                    <div class="col-6">
                        <span>Id:</span>
                        <span class="ml-2 font-weight-bold">

                            <?php echo $_SESSION['userretaileremp']; ?>
                        </span>

                    </div>

                    <div class="col-6">
                        <span>Section:</span>
                        <span class="ml-2 font-weight-bold">
                        <?php echo $empSectionName; ?>
                        </span>
                    </div>
                    <div class="col-6">
                    <span>Station:</span>

                    <span class="ml-2 font-weight-bold">
                    <?php echo $empStationName; ?>

                    </span>

                    </div>
                </div>
            <div class="m-2 text-center alert alert-danger" style="font-size:13px">
           <span class="heading_english">
        Periodicity: Technician (Signal): Monthly
Sectional SSE/JE (Signal): Quarterly,
SSE (Signal) Incharge: Half Yearly
</span>
    <span class="heading_hindi">
        आवधिकता: तकनीशियन (सिग्नल): मासिक
                                    अनुभागीय सीसेई/जेई (सिग्नल): त्रैमासिक
             सीसेई (सिग्नल)/प्रभारी: अर्धवार्षिक

    </span>
            </div>
            <div class="modal-body table-responsive">
                <!-- <form id="modalFormComponent">
                   
                </form> -->
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                           <th scope="col">
                                    <span class="heading_english">
                                    S.No
                                    </span>

                                    <span class="heading_hindi">
                                        क्रम सं
                                    </span>
                                    
                                </th>
                                <th scope="col">
                                <span class="heading_english">
                                    Check the following
                                </span>

                                <span class="heading_hindi">
                                    निम्नलिखित की जाँच करें
                                </span>
                                    
                               </th>
                                <th scope="col">
                                <span class="heading_english">
                                    Action
                                </span>

                                <span class="heading_hindi">
                                    कार्रवाई
                                 </span>    
                                </th>
                        </tr>
                    </thead>
                    <tbody id="dac1_body">

                    </tbody>
                </table>
            </div>
</div>
            <div class="card-footer d-flex justify-content-between">
                <div id="dac1Form_status"></div>

                <div>
                     <button type='button' id="dac1PdfBtn" onclick="generatePdf('DAC1','pdfBodyDAC1')"
                    class="btn btn-success btn-sm">PDF</button>

                <button type="button" class="btn btn-sm btn-secondary mx-2" data-dismiss="modal" aria-label="Close">
                    Close
                </button>

                </div>
            </div>

        </div>
        </form>
    </div>
</div>


<!-- Modal dac2 -->
<div class="modal fade" id="componentForm_DAC2" data-backdrop="static" data-keyboard="false" tabindex="-1"  aria-labelledby="componentFormLabelDAC2" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <form>
        <div class="modal-content">
            <div id="pdfBodyDAC2">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="componentFormLabelMLB1">
                    <span class="badge badge-success h3">
                    <span class="heading_english">
                  Maintenance Schedule of Digital Axle Counter DAC2
              </span>
                  <span class="heading_hindi">
                    कंट्रोल पैनल के रखरखाव का कार्यक्रम DAC2
                  </span>



                    </span>
                    <span class="badge badge-danger h3 displaySubcompoName"></span>

                </h5>
             
            </div>
            <div class="row mx-2 px-2 py-1">
                    <div class="col-6">
                        <span>Name:</span>
                        <span class="ml-2 font-weight-bold">
                            <?php echo $_SESSION['userretailerempName'] ?? '...'; ?>

                        </span>

                    </div>
                    <div class="col-6">
                        <span>Id:</span>
                        <span class="ml-2 font-weight-bold">

                            <?php echo $_SESSION['userretaileremp']; ?>
                        </span>

                    </div>

                    <div class="col-6">
                        <span>Section:</span>
                        <span class="ml-2 font-weight-bold">
                        <?php echo $empSectionName; ?>
                        </span>
                    </div>
                    <div class="col-6">
                    <span>Station:</span>

                    <span class="ml-2 font-weight-bold">
                    <?php echo $empStationName; ?>

                    </span>

                    </div>
                </div>
            <div class="m-2 text-center alert alert-danger" style="font-size:13px">
          <span class="heading_english">  
       Periodicity: Sectional SSE/JE(Signal): Quarterly (to be done by ESM in presence of JE/SSE)
SSE(Signal)/Incharge: Half Yearly
</span>
        <span class="heading_hindi">
            आवधिकता: अनुभागीय सीसेई/जेई (सिग्नल): त्रैमासिक (जेई/एसएसई की उपस्थिति में ईएसएम द्वारा किया जाना है)
सीसेई (सिग्नल)/प्रभारी: अर्धवार्षिक
</span>




            </div>
            <div class="modal-body table-responsive">
                <!-- <form id="modalFormComponent">
                   
                </form> -->
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">
                                    <span class="heading_english">
                                    S.No
                                    </span>

                                    <span class="heading_hindi">
                                        क्रम सं
                                    </span>
                                    
                                </th>
                                <th scope="col">
                                <span class="heading_english">
                                    Check the following
                                </span>

                                <span class="heading_hindi">
                                    निम्नलिखित की जाँच करें
                                </span>
                                    
                               </th>
                                <th scope="col">
                                <span class="heading_english">
                                    Action
                                </span>

                                <span class="heading_hindi">
                                    कार्रवाई
                                 </span>    
                                </th>
                        </tr>
                    </thead>
                    <tbody id="dac2_body">

                    </tbody>
                </table>
            </div>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <div id="dac2Form_status"></div>

                <div>
                   <button type='button' id="dac2PdfBtn" onclick="generatePdf('DAC2','pdfBodyDAC2')"
                    class="btn btn-success btn-sm">PDF</button>

                <button type="button" class="btn btn-sm btn-secondary mx-2" data-dismiss="modal" aria-label="Close">
                    Close
                </button>


                </div>
            </div>

        </div>
        </form>
    </div>
</div>

<!-- Modal DAC3 -->
<div class="modal fade" id="componentForm_DAC3" data-backdrop="static" data-keyboard="false" tabindex="-1"  aria-labelledby="componentFormLabelDAC3" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <form>
        <div class="modal-content">
            <div id="pdfBodyDAC3">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="componentFormLabelMLB1">
                    <span class="badge badge-success h3">
                <span class="heading_english">
                  Maintenance Schedule of Digital Axle Counter DAC3
              </span>
                  <span class="heading_hindi">
                    कंट्रोल पैनल के रखरखाव का कार्यक्रम DAC3
                  </span>



                    </span>
                    <span class="badge badge-danger h3 displaySubcompoName"></span>

                </h5>
             
            </div>
            <div class="row mx-2 px-2 py-1">
                    <div class="col-6">
                        <span>Name:</span>
                        <span class="ml-2 font-weight-bold">
                            <?php echo $_SESSION['userretailerempName'] ?? '...'; ?>

                        </span>

                    </div>
                    <div class="col-6">
                        <span>Id:</span>
                        <span class="ml-2 font-weight-bold">

                            <?php echo $_SESSION['userretaileremp']; ?>
                        </span>

                    </div>

                    <div class="col-6">
                        <span>Section:</span>
                        <span class="ml-2 font-weight-bold">
                        <?php echo $empSectionName; ?>
                        </span>
                    </div>
                    <div class="col-6">
                    <span>Station:</span>

                    <span class="ml-2 font-weight-bold">
                    <?php echo $empStationName; ?>

                    </span>

                    </div>
                </div>
            <div class="m-2 text-center alert alert-danger" style="font-size:13px">
          <span class="heading_english">   
         Periodicity: Sectional SSE/JE(Signal): Yearly
</span>
             <span class="heading_hindi">
                आवधिकता: अनुभागीय सीसेई/जेई (सिग्नल): वार्षिक
             </span>



            </div>
            <div class="modal-body table-responsive">
                <!-- <form id="modalFormComponent">
                   
                </form> -->
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                           <th scope="col">
                                    <span class="heading_english">
                                    S.No
                                    </span>

                                    <span class="heading_hindi">
                                        क्रम सं
                                    </span>
                                    
                                </th>
                                <th scope="col">
                                <span class="heading_english">
                                    Check the following
                                </span>

                                <span class="heading_hindi">
                                    निम्नलिखित की जाँच करें
                                </span>
                                    
                               </th>
                                <th scope="col">
                                <span class="heading_english">
                                    Action
                                </span>

                                <span class="heading_hindi">
                                    कार्रवाई
                                 </span>    
                                </th>
                        </tr>
                    </thead>
                    <tbody id="dac3_body">

                    </tbody>
                </table>
            </div>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <div id="dac3Form_status"></div>

                <div>
                   <button type='button' id="dac3PdfBtn" onclick="generatePdf('DAC3','pdfBodyDAC3')"
                    class="btn btn-success btn-sm">PDF</button>

                <button type="button" class="btn btn-sm btn-secondary mx-2" data-dismiss="modal" aria-label="Close">
                    Close
                </button>


                </div>
            </div>

        </div>
        </form>
    </div>
</div>

<!-- modal Block Instrument -->

<!-- modal Block Instrument -->
<div class="modal fade" id="componentForm_DB1" data-backdrop="static" data-keyboard="false" tabindex="-1"  aria-labelledby="componentFormLabelDB1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <form>
        <div class="modal-content">
            <div id="pdfBodyDB1">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="componentFormLabelMLB1">
                    <span class="badge badge-success h3">
                 <span class="heading_english">
                 Maintenance Schedule of Block Instrument - Double line (Lock & Block) DB1
                            </span>

                            <span class="heading_hindi">
                ब्लॉक उपकरण - डबल लाइन (लॉक और ब्लॉक) का रखरखाव अनुसूची DB1

                            </span>



                    </span>
                    <span class="badge badge-danger h3 displaySubcompoName"></span>

                </h5>
             
            </div>
            <div class="row mx-2 px-2 py-1">
                    <div class="col-6">
                        <span>Name:</span>
                        <span class="ml-2 font-weight-bold">
                            <?php echo $_SESSION['userretailerempName'] ?? '...'; ?>

                        </span>

                    </div>
                    <div class="col-6">
                        <span>Id:</span>
                        <span class="ml-2 font-weight-bold">

                            <?php echo $_SESSION['userretaileremp']; ?>
                        </span>

                    </div>

                    <div class="col-6">
                        <span>Section:</span>
                        <span class="ml-2 font-weight-bold">
                        <?php echo $empSectionName; ?>
                        </span>
                    </div>
                    <div class="col-6">
                    <span>Station:</span>

                    <span class="ml-2 font-weight-bold">
                    <?php echo $empStationName; ?>

                    </span>

                    </div>
                </div>
            <div class="m-2 text-center alert alert-danger" style="font-size:13px">
          <span class="heading_english">
       Periodicity: Technician(Signal): Monthly
                               Sectional SSE/JE(Signal): Monthly
                            SSE(Signal)/Incharge: Quarterly
                        </span>
                        <span class="heading_hindi">
                            आवधिकता: तकनीशियन (सिग्नल): मासिक
                                    अनुभागीय सीसेई/जेई (सिग्नल): मासिक
             सीसेई (सिग्नल)/प्रभारी: त्रैमासिक

                            </span>


            </div>
            <div class="modal-body table-responsive">
                <!-- <form id="modalFormComponent">
                   
                </form> -->
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                           <th scope="col">
                                    <span class="heading_english">
                                    S.No
                                    </span>

                                    <span class="heading_hindi">
                                        क्रम सं
                                    </span>
                                    
                                </th>
                                <th scope="col">
                                <span class="heading_english">
                                    Check the following
                                </span>

                                <span class="heading_hindi">
                                    निम्नलिखित की जाँच करें
                                </span>
                                    
                               </th>
                                <th scope="col">
                                <span class="heading_english">
                                    Action
                                </span>

                                <span class="heading_hindi">
                                    कार्रवाई
                                 </span>    
                                </th>
                        </tr>
                    </thead>
                    <tbody id="db1_body">

                    </tbody>
                </table>
            </div>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <div id="dac3Form_status"></div>

                <div>
                   <button type='button' id="db1PdfBtn" onclick="generatePdf('DAC3','pdfBodyDB1')"
                    class="btn btn-success btn-sm">PDF</button>

                <button type="button" class="btn btn-sm btn-secondary mx-2" data-dismiss="modal" aria-label="Close">
                    Close
                </button>


                </div>
            </div>

        </div>
        </form>
    </div>
</div>
<!-- modal db2 -->
<div class="modal fade" id="componentForm_DB2" data-backdrop="static" data-keyboard="false" tabindex="-1"  aria-labelledby="componentFormLabelDB2" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <form>
        <div class="modal-content">
            <div id="pdfBodyDB2">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="componentFormLabelDB2">
                    <span class="badge badge-success h3">
                 <span class="heading_english">
                 Maintenance Schedule of Block Instrument - Double line (Lock & Block) DB2
                            </span>

                            <span class="heading_hindi">
                ब्लॉक उपकरण - डबल लाइन (लॉक और ब्लॉक) का रखरखाव अनुसूची DB2

                            </span>



                    </span>
                    <span class="badge badge-danger h3 displaySubcompoName"></span>

                </h5>
             
            </div>
            <div class="row mx-2 px-2 py-1">
                    <div class="col-6">
                        <span>Name:</span>
                        <span class="ml-2 font-weight-bold">
                            <?php echo $_SESSION['userretailerempName'] ?? '...'; ?>

                        </span>

                    </div>
                    <div class="col-6">
                        <span>Id:</span>
                        <span class="ml-2 font-weight-bold">

                            <?php echo $_SESSION['userretaileremp']; ?>
                        </span>

                    </div>

                    <div class="col-6">
                        <span>Section:</span>
                        <span class="ml-2 font-weight-bold">
                        <?php echo $empSectionName; ?>
                        </span>
                    </div>
                    <div class="col-6">
                    <span>Station:</span>

                    <span class="ml-2 font-weight-bold">
                    <?php echo $empStationName; ?>

                    </span>

                    </div>
                </div>
            <div class="m-2 text-center alert alert-danger" style="font-size:13px">
         <span class="heading_english">
       Periodicity: Sectional SSE/JE(Signal): Quarterly,
                SSE(Signal) Incharge: Half yearly

                        </span>
                        <span class="heading_hindi">
                            आवधिकता: अनुभागीय सीसेई/जेई (सिग्नल: त्रैमासिक
      सीसेई (सिग्नल)/प्रभारी: अर्धवार्षिक


                            </span>


            </div>
            <div class="modal-body table-responsive">
                <!-- <form id="modalFormComponent">
                   
                </form> -->
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                           <th scope="col">
                                    <span class="heading_english">
                                    S.No
                                    </span>

                                    <span class="heading_hindi">
                                        क्रम सं
                                    </span>
                                    
                                </th>
                                <th scope="col">
                                <span class="heading_english">
                                    Check the following
                                </span>

                                <span class="heading_hindi">
                                    निम्नलिखित की जाँच करें
                                </span>
                                    
                               </th>
                                <th scope="col">
                                <span class="heading_english">
                                    Action
                                </span>

                                <span class="heading_hindi">
                                    कार्रवाई
                                 </span>    
                                </th>
                        </tr>
                    </thead>
                    <tbody id="db2_body">

                    </tbody>
                </table>
            </div>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <div id="dac3Form_status"></div>

                <div>
                   <button type='button' id="db2PdfBtn" onclick="generatePdf('DB2','pdfBodyDB2')"
                    class="btn btn-success btn-sm">PDF</button>

                <button type="button" class="btn btn-sm btn-secondary mx-2" data-dismiss="modal" aria-label="Close">
                    Close
                </button>


                </div>
            </div>

        </div>
        </form>
    </div>
</div>
<!-- modal db3 -->
<div class="modal fade" id="componentForm_DB3" data-backdrop="static" data-keyboard="false" tabindex="-1"  aria-labelledby="componentFormLabelDB3" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <form>
        <div class="modal-content">
            <div id="pdfBodyDB3">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="componentFormLabelDB3">
                    <span class="badge badge-success h3">
                 <span class="heading_english">
                 Maintenance Schedule of Block Instrument - Double line (Lock & Block) DB3
                            </span>

                            <span class="heading_hindi">
                ब्लॉक उपकरण - डबल लाइन (लॉक और ब्लॉक) का रखरखाव अनुसूची DB3

                            </span>



                    </span>
                    <span class="badge badge-danger h3 displaySubcompoName"></span>

                </h5>
             
            </div>
            <div class="row mx-2 px-2 py-1">
                    <div class="col-6">
                        <span>Name:</span>
                        <span class="ml-2 font-weight-bold">
                            <?php echo $_SESSION['userretailerempName'] ?? '...'; ?>

                        </span>

                    </div>
                    <div class="col-6">
                        <span>Id:</span>
                        <span class="ml-2 font-weight-bold">

                            <?php echo $_SESSION['userretaileremp']; ?>
                        </span>

                    </div>

                    <div class="col-6">
                        <span>Section:</span>
                        <span class="ml-2 font-weight-bold">
                        <?php echo $empSectionName; ?>
                        </span>
                    </div>
                    <div class="col-6">
                    <span>Station:</span>

                    <span class="ml-2 font-weight-bold">
                    <?php echo $empStationName; ?>

                    </span>

                    </div>
                </div>
            <div class="m-2 text-center alert alert-danger" style="font-size:13px">
        <span class="heading_english">
      Periodicity: Sectional SSE/JE(Signal): Half Yearly
                     SSE(Signal)/Incharge: Yearly


                        </span>
                        <span class="heading_hindi">
                            आवधिकता: अनुभागीय सीसेई/जेई (सिग्नल): अर्धवार्षिक
 सीसेई (सिग्नल)/प्रभारी: वार्षिक



                            </span>


            </div>
            <div class="modal-body table-responsive">
                <!-- <form id="modalFormComponent">
                   
                </form> -->
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                           <th scope="col">
                                    <span class="heading_english">
                                    S.No
                                    </span>

                                    <span class="heading_hindi">
                                        क्रम सं
                                    </span>
                                    
                                </th>
                                <th scope="col">
                                <span class="heading_english">
                                    Check the following
                                </span>

                                <span class="heading_hindi">
                                    निम्नलिखित की जाँच करें
                                </span>
                                    
                               </th>
                                <th scope="col">
                                <span class="heading_english">
                                    Action
                                </span>

                                <span class="heading_hindi">
                                    कार्रवाई
                                 </span>    
                                </th>
                        </tr>
                    </thead>
                    <tbody id="db3_body">

                    </tbody>
                </table>
            </div>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <div id="db3Form_status"></div>

                <div>
                   <button type='button' id="db3PdfBtn" onclick="generatePdf('DB3','pdfBodyDB3')"
                    class="btn btn-success btn-sm">PDF</button>

                <button type="button" class="btn btn-sm btn-secondary mx-2" data-dismiss="modal" aria-label="Close">
                    Close
                </button>


                </div>
            </div>

        </div>
        </form>
    </div>
</div>

<!-- modal uf1 -->
<div class="modal fade" id="componentForm_UF1" data-backdrop="static" data-keyboard="false" tabindex="-1"  aria-labelledby="componentFormLabelUF1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <form>
        <div class="modal-content">
            <div id="pdfBodyUF1">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="componentFormLabelUF1">
                    <span class="badge badge-success h3">
                 <span class="heading_english">
                 Maintenance Schedule of Block Instrument - Double line (Lock & Block) UF1
                            </span>

                            <span class="heading_hindi">
                                ब्लॉक उपकरण - डबल लाइन (लॉक और ब्लॉक) का रखरखाव अनुसूची 
UF1

                            </span>



                    </span>
                    <span class="badge badge-danger h3 displaySubcompoName"></span>

                </h5>
             
            </div>
            <div class="row mx-2 px-2 py-1">
                    <div class="col-6">
                        <span>Name:</span>
                        <span class="ml-2 font-weight-bold">
                            <?php echo $_SESSION['userretailerempName'] ?? '...'; ?>

                        </span>

                    </div>
                    <div class="col-6">
                        <span>Id:</span>
                        <span class="ml-2 font-weight-bold">

                            <?php echo $_SESSION['userretaileremp']; ?>
                        </span>

                    </div>

                    <div class="col-6">
                        <span>Section:</span>
                        <span class="ml-2 font-weight-bold">
                        <?php echo $empSectionName; ?>
                        </span>
                    </div>
                    <div class="col-6">
                    <span>Station:</span>

                    <span class="ml-2 font-weight-bold">
                    <?php echo $empStationName; ?>

                    </span>

                    </div>
                </div>
            <div class="m-2 text-center alert alert-danger" style="font-size:13px">
       <span class="heading_english">
       Periodicity: Technician(Signal): Monthly
                               Sectional SSE/JE(Signal): Monthly
                            SSE(Signal)/Incharge: Quarterly
                        </span>
                        <span class="heading_hindi">
                            आवधिकता: तकनीशियन (सिग्नल): मासिक
                                    अनुभागीय सीसेई/जेई (सिग्नल): मासिक
             सीसेई (सिग्नल)/प्रभारी: त्रैमासिक

                            </span>


            </div>
            <div class="modal-body table-responsive">
                <!-- <form id="modalFormComponent">
                   
                </form> -->
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                           <th scope="col">
                                    <span class="heading_english">
                                    S.No
                                    </span>

                                    <span class="heading_hindi">
                                        क्रम सं
                                    </span>
                                    
                                </th>
                                <th scope="col">
                                <span class="heading_english">
                                    Check the following
                                </span>

                                <span class="heading_hindi">
                                    निम्नलिखित की जाँच करें
                                </span>
                                    
                               </th>
                                <th scope="col">
                                <span class="heading_english">
                                    Action
                                </span>

                                <span class="heading_hindi">
                                    कार्रवाई
                                 </span>    
                                </th>
                        </tr>
                    </thead>
                    <tbody id="uf1_body">

                    </tbody>
                </table>
            </div>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <div id="db3Form_status"></div>

                <div>
                   <button type='button' id="db3PdfBtn" onclick="generatePdf('UF1','pdfBodyUF1')"
                    class="btn btn-success btn-sm">PDF</button>

                <button type="button" class="btn btn-sm btn-secondary mx-2" data-dismiss="modal" aria-label="Close">
                    Close
                </button>


                </div>
            </div>

        </div>
        </form>
    </div>
</div>

<!-- modal uf2 -->

<!-- modal uf2 -->
<div class="modal fade" id="componentForm_UF2" data-backdrop="static" data-keyboard="false" tabindex="-1"  aria-labelledby="componentFormLabelUF2" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <form>
        <div class="modal-content">
            <div id="pdfBodyUF2">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="componentFormLabelUF1">
                    <span class="badge badge-success h3">
                 <span class="heading_english">
                 Maintenance Schedule of Block Instrument - Double line (Lock & Block) UF2
                            </span>

                            <span class="heading_hindi">
                 ब्लॉक उपकरण - डबल लाइन (लॉक और ब्लॉक) का रखरखाव अनुसूची UF2

                            </span>



                    </span>
                    <span class="badge badge-danger h3 displaySubcompoName"></span>

                </h5>
             
            </div>
            <div class="row mx-2 px-2 py-1">
                    <div class="col-6">
                        <span>Name:</span>
                        <span class="ml-2 font-weight-bold">
                            <?php echo $_SESSION['userretailerempName'] ?? '...'; ?>

                        </span>

                    </div>
                    <div class="col-6">
                        <span>Id:</span>
                        <span class="ml-2 font-weight-bold">

                            <?php echo $_SESSION['userretaileremp']; ?>
                        </span>

                    </div>

                    <div class="col-6">
                        <span>Section:</span>
                        <span class="ml-2 font-weight-bold">
                        <?php echo $empSectionName; ?>
                        </span>
                    </div>
                    <div class="col-6">
                    <span>Station:</span>

                    <span class="ml-2 font-weight-bold">
                    <?php echo $empStationName; ?>

                    </span>

                    </div>
                </div>
            <div class="m-2 text-center alert alert-danger" style="font-size:13px">
       <span class="heading_english">
       Periodicity: Technician(Signal): Monthly
                               Sectional SSE/JE(Signal): Monthly
                            SSE(Signal)/Incharge: Quarterly
                        </span>
                        <span class="heading_hindi">
                            आवधिकता: तकनीशियन (सिग्नल): मासिक
                                    अनुभागीय सीसेई/जेई (सिग्नल): मासिक
             सीसेई (सिग्नल)/प्रभारी: त्रैमासिक

                            </span>


            </div>
            <div class="modal-body table-responsive">
                <!-- <form id="modalFormComponent">
                   
                </form> -->
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                           <th scope="col">
                                    <span class="heading_english">
                                    S.No
                                    </span>

                                    <span class="heading_hindi">
                                        क्रम सं
                                    </span>
                                    
                                </th>
                                <th scope="col">
                                <span class="heading_english">
                                    Check the following
                                </span>

                                <span class="heading_hindi">
                                    निम्नलिखित की जाँच करें
                                </span>
                                    
                               </th>
                                <th scope="col">
                                <span class="heading_english">
                                    Action
                                </span>

                                <span class="heading_hindi">
                                    कार्रवाई
                                 </span>    
                                </th>
                        </tr>
                    </thead>
                    <tbody id="uf2_body">

                    </tbody>
                </table>
            </div>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <div id="db3Form_status"></div>

                <div>
                   <button type='button' id="uf2PdfBtn" onclick="generatePdf('UF2','pdfBodyUF2')"
                    class="btn btn-success btn-sm">PDF</button>

                <button type="button" class="btn btn-sm btn-secondary mx-2" data-dismiss="modal" aria-label="Close">
                    Close
                </button>


                </div>
            </div>

        </div>
        </form>
    </div>
</div>

<!-- modal uf3 -->
<div class="modal fade" id="componentForm_UF3" data-backdrop="static" data-keyboard="false" tabindex="-1"  aria-labelledby="componentFormLabelUF3" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <form>
        <div class="modal-content">
            <div id="pdfBodyUF3">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="componentFormLabelUF1">
                    <span class="badge badge-success h3">
                 <span class="heading_english">
                 Maintenance Schedule of Block Instrument - Double line (Lock & Block) UF3
                            </span>

                            <span class="heading_hindi">
                 ब्लॉक उपकरण - डबल लाइन (लॉक और ब्लॉक) का रखरखाव अनुसूची UF3

                            </span>



                    </span>
                    <span class="badge badge-danger h3 displaySubcompoName"></span>

                </h5>
             
            </div>
            <div class="row mx-2 px-2 py-1">
                    <div class="col-6">
                        <span>Name:</span>
                        <span class="ml-2 font-weight-bold">
                            <?php echo $_SESSION['userretailerempName'] ?? '...'; ?>

                        </span>

                    </div>
                    <div class="col-6">
                        <span>Id:</span>
                        <span class="ml-2 font-weight-bold">

                            <?php echo $_SESSION['userretaileremp']; ?>
                        </span>

                    </div>

                    <div class="col-6">
                        <span>Section:</span>
                        <span class="ml-2 font-weight-bold">
                        <?php echo $empSectionName; ?>
                        </span>
                    </div>
                    <div class="col-6">
                    <span>Station:</span>

                    <span class="ml-2 font-weight-bold">
                    <?php echo $empStationName; ?>

                    </span>

                    </div>
                </div>
            <div class="m-2 text-center alert alert-danger" style="font-size:13px">
      <span class="heading_english">
    Periodicity: Sectional SSE/JE(Signal): Quarterly
                  SSE(Signal)/Incharge: Half Yearly


                        </span>
                        <span class="heading_hindi">
                        आवधिकता: अनुभागीय सीसेई/जेई (सिग्नल): त्रैमासिक
    सीसेई (सिग्नल)/प्रभारी: अर्धवार्षिक



                            </span>


            </div>
            <div class="modal-body table-responsive">
                <!-- <form id="modalFormComponent">
                   
                </form> -->
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                           <th scope="col">
                                    <span class="heading_english">
                                    S.No
                                    </span>

                                    <span class="heading_hindi">
                                        क्रम सं
                                    </span>
                                    
                                </th>
                                <th scope="col">
                                <span class="heading_english">
                                    Check the following
                                </span>

                                <span class="heading_hindi">
                                    निम्नलिखित की जाँच करें
                                </span>
                                    
                               </th>
                                <th scope="col">
                                <span class="heading_english">
                                    Action
                                </span>

                                <span class="heading_hindi">
                                    कार्रवाई
                                 </span>    
                                </th>
                        </tr>
                    </thead>
                    <tbody id="uf3_body">

                    </tbody>
                </table>
            </div>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <div id="db3Form_status"></div>

                <div>
                   <button type='button' id="uf3PdfBtn" onclick="generatePdf('UF3','pdfBodyUF3')"
                    class="btn btn-success btn-sm">PDF</button>

                <button type="button" class="btn btn-sm btn-secondary mx-2" data-dismiss="modal" aria-label="Close">
                    Close
                </button>


                </div>
            </div>

        </div>
        </form>
    </div>
</div>

<!-- modal uf4 -->
<div class="modal fade" id="componentForm_UF4" data-backdrop="static" data-keyboard="false" tabindex="-1"  aria-labelledby="componentFormLabelUF4" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <form>
        <div class="modal-content">
            <div id="pdfBodyUF4">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="componentFormLabelUF1">
                    <span class="badge badge-success h3">
                 <span class="heading_english">
                 Maintenance Schedule of Block Instrument - Double line (Lock & Block) UF4
                            </span>

                            <span class="heading_hindi">
                 ब्लॉक उपकरण - डबल लाइन (लॉक और ब्लॉक) का रखरखाव अनुसूची UF4

                            </span>



                    </span>
                    <span class="badge badge-danger h3 displaySubcompoName"></span>

                </h5>
             
            </div>
            <div class="row mx-2 px-2 py-1">
                    <div class="col-6">
                        <span>Name:</span>
                        <span class="ml-2 font-weight-bold">
                            <?php echo $_SESSION['userretailerempName'] ?? '...'; ?>

                        </span>

                    </div>
                    <div class="col-6">
                        <span>Id:</span>
                        <span class="ml-2 font-weight-bold">

                            <?php echo $_SESSION['userretaileremp']; ?>
                        </span>

                    </div>

                    <div class="col-6">
                        <span>Section:</span>
                        <span class="ml-2 font-weight-bold">
                        <?php echo $empSectionName; ?>
                        </span>
                    </div>
                    <div class="col-6">
                    <span>Station:</span>

                    <span class="ml-2 font-weight-bold">
                    <?php echo $empStationName; ?>

                    </span>

                    </div>
                </div>
            <div class="m-2 text-center alert alert-danger" style="font-size:13px">
       <span class="heading_english">
   Periodicity: Sectional SSE/JE(Signal): Yearly                 


                        </span>
                        <span class="heading_hindi">
                        आवधिकता: अनुभागीय सीसेई/जेई (सिग्नल): वार्षिक



                            </span>


            </div>
            <div class="modal-body table-responsive">
                <!-- <form id="modalFormComponent">
                   
                </form> -->
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                           <th scope="col">
                                    <span class="heading_english">
                                    S.No
                                    </span>

                                    <span class="heading_hindi">
                                        क्रम सं
                                    </span>
                                    
                                </th>
                                <th scope="col">
                                <span class="heading_english">
                                    Check the following
                                </span>

                                <span class="heading_hindi">
                                    निम्नलिखित की जाँच करें
                                </span>
                                    
                               </th>
                                <th scope="col">
                                <span class="heading_english">
                                    Action
                                </span>

                                <span class="heading_hindi">
                                    कार्रवाई
                                 </span>    
                                </th>
                        </tr>
                    </thead>
                    <tbody id="uf4_body">

                    </tbody>
                </table>
            </div>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <div id="db3Form_status"></div>

                <div>
                   <button type='button' id="uf4PdfBtn" onclick="generatePdf('UF4','pdfBodyUF4')"
                    class="btn btn-success btn-sm">PDF</button>

                <button type="button" class="btn btn-sm btn-secondary mx-2" data-dismiss="modal" aria-label="Close">
                    Close
                </button>


                </div>
            </div>

        </div>
        </form>
    </div>
</div>

<!-- modal uf5 -->
<div class="modal fade" id="componentForm_UF5" data-backdrop="static" data-keyboard="false" tabindex="-1"  aria-labelledby="componentFormLabelUF5" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <form>
        <div class="modal-content">
            <div id="pdfBodyUF5">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="componentFormLabelUF5">
                    <span class="badge badge-success h3">
                 <span class="heading_english">
                 Maintenance Schedule of Block Instrument - Double line (Lock & Block) UF4
                            </span>

                            <span class="heading_hindi">
                 ब्लॉक उपकरण - डबल लाइन (लॉक और ब्लॉक) का रखरखाव अनुसूची UF4

                            </span>



                    </span>
                    <span class="badge badge-danger h3 displaySubcompoName"></span>

                </h5>
             
            </div>
            <div class="row mx-2 px-2 py-1">
                    <div class="col-6">
                        <span>Name:</span>
                        <span class="ml-2 font-weight-bold">
                            <?php echo $_SESSION['userretailerempName'] ?? '...'; ?>

                        </span>

                    </div>
                    <div class="col-6">
                        <span>Id:</span>
                        <span class="ml-2 font-weight-bold">

                            <?php echo $_SESSION['userretaileremp']; ?>
                        </span>

                    </div>

                    <div class="col-6">
                        <span>Section:</span>
                        <span class="ml-2 font-weight-bold">
                        <?php echo $empSectionName; ?>
                        </span>
                    </div>
                    <div class="col-6">
                    <span>Station:</span>

                    <span class="ml-2 font-weight-bold">
                    <?php echo $empStationName; ?>

                    </span>

                    </div>
                </div>
            <div class="m-2 text-center alert alert-danger" style="font-size:13px">
        <span class="heading_english">
  Periodicity: Sectional SSE/JE(Signal): Half Yearly,  
SSE(Signal)/Incharge: Yearly              



                        </span>
                        <span class="heading_hindi">
                    आवधिकता: अनुभागीय सीसेई/जेई (सिग्नल): अर्धवार्षिक
    सीसेई (सिग्नल)/प्रभारी: वार्षिक




                            </span>


            </div>
            <div class="modal-body table-responsive">
                <!-- <form id="modalFormComponent">
                   
                </form> -->
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                           <th scope="col">
                                    <span class="heading_english">
                                    S.No
                                    </span>

                                    <span class="heading_hindi">
                                        क्रम सं
                                    </span>
                                    
                                </th>
                                <th scope="col">
                                <span class="heading_english">
                                    Check the following
                                </span>

                                <span class="heading_hindi">
                                    निम्नलिखित की जाँच करें
                                </span>
                                    
                               </th>
                                <th scope="col">
                                <span class="heading_english">
                                    Action
                                </span>

                                <span class="heading_hindi">
                                    कार्रवाई
                                 </span>    
                                </th>
                        </tr>
                    </thead>
                    <tbody id="uf5_body">

                    </tbody>
                </table>
            </div>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <div id="db3Form_status"></div>

                <div>
                   <button type='button' id="uf5PdfBtn" onclick="generatePdf('UF5','pdfBodyUF5')"
                    class="btn btn-success btn-sm">PDF</button>

                <button type="button" class="btn btn-sm btn-secondary mx-2" data-dismiss="modal" aria-label="Close">
                    Close
                </button>


                </div>
            </div>

        </div>
        </form>
    </div>
</div>
<script>
var g_st_compList = [];
var colorArr = ['btn-info', 'btn-success', 'btn-warning', 'btn-primary', 'btn-secondary', 'btn-dark', 'btn-danger'];
var formDataList = {};



function printContent(el){

    var restorepage = document.body.innerHTML;

    var printcontent = document.getElementById(el).innerHTML;

    document.body.innerHTML = printcontent;

    window.print();

    document.body.innerHTML = restorepage;
    location.reload()

}

// window.jsPDF = window.jspdf.jsPDF; // uncomment it when you use js pdf for pdf
function generatePdf(formType, html_Id) {

    printContent(html_Id);
    return;


    console.log("from type", formType);
    console.log("html type", html_Id);

    // var doc = new jsPDF('l', 'mm', [297, 210]);
    // var doc = new jsPDF('l', 'mm', 'letter');
    var doc = new jsPDF();
    // doc.font('../jsPdf/font/TiroDevanagariHindi-Regular.ttf');

    // doc.addFileToVFS('../jsPdf/font/TiroDevanagariHindi-Regular.ttf', nepali)  
    // doc.addFileToVFS('TiroDevanagariHindi-Regular.ttf', '../jsPdf/font/TiroDevanagariHindi-Regular.ttf');

    // doc.addFont('TiroDevanagariHindi-Regular.ttf', 'custom', 'normal');

    //new 
    /*
    const myFont = "../jsPdf/font/TiroDevanagariHindi-Regular.ttf" // load the *.ttf font file as binary string

    // add the font to jsPDF
    doc.addFileToVFS("TiroDevanagariHindi-Regular.ttf", myFont);
    doc.addFont("TiroDevanagariHindi-Regular.ttf", "custom", "normal");
    doc.setFont("custom");

*/
    // Source HTMLElement or a string containing HTML.
    var elementHTML = document.querySelector("#" + html_Id);
    // Add a new page before adding content
    // doc.addPage();
    doc.html(elementHTML, {
        callback: function(doc) {
            // Save the PDF
            
            // doc.save(formType + '.pdf'); // auto pdf downloading when click on btn
            doc.output('dataurlnewwindow'); // open pdf in new window
            // doc.save();

            /* 
                doc.output('save', 'filename.pdf'); //Try to save PDF as a file (not works on ie before 10, and some mobile devices)
                doc.output('datauristring');        //returns the data uri string
                doc.output('datauri');              //opens the data uri in current window
                doc.output('dataurlnewwindow');  
             */
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
    let userID = '<?php echo $_SESSION['userretaileremp']; ?>';
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

        }else if (value == 'नहीं किया') {

            displayHtml +=
                `<select class="form-control">
                <option>${value}</option>
                <option value='हो गया'>हो गया</option>
            </select> <button type="button" onclick="updateSingleValue('हो गया','${typeOfForm}','${element['ep_id']}','${tableDataForm['id']}')" class="btn btn-sm btn-success my-1">Update</button>`;

            } else {
            // displayHtml += `<input type="text" class="form-control" disabled value="${value}">`;
            displayHtml += `<div class="">${value}</div>`;
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

    if(ep2DataObj['language'] == "Hindi"){
        $(".ep2_details_english").addClass('d-none')
        $(".ep2_details_hindi").removeClass('d-none')
    }else{
        $(".ep2_details_hindi").addClass('d-none')
        $(".ep2_details_english").removeClass('d-none')
    }
    /*
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

    */
    $("#EP2_1").html(ep2DataObj['ep2_1']);
    $("#EP2_2").html(ep2DataObj['ep2_2']);
    $("#EP2_3").html(ep2DataObj['ep2_3']);
    $("#EP2_4").html(ep2DataObj['ep2_4']);
    $("#EP2_5").html(ep2DataObj['ep2_5']);


    $("#op_v_N_R").html(ep2DataObj['op_v_N_R']);
    $("#op_v_R_N").html(ep2DataObj['op_v_R_N']);

    if(parseFloat(ep2DataObj['op_v_N_R']) < 100){
        $("#op_v_N_R").css('fontWeight','bold').css('fontSize','16px');
        
    }
    if(parseFloat(ep2DataObj['op_v_R_N']) < 100){
        
        $("#op_v_R_N").css('fontWeight','bold').css('fontSize','16px');
    }

    $("#ob_v_N_R").html(ep2DataObj['ob_v_N_R']);
    $("#ob_v_R_N").html(ep2DataObj['ob_v_R_N']);

    if(parseFloat(ep2DataObj['ob_v_N_R']) < 80){
        $("#ob_v_N_R").css('fontWeight','bold').css('fontSize','16px');
        
    }
    if(parseFloat(ep2DataObj['ob_v_R_N']) < 80){
        
        $("#ob_v_R_N").css('fontWeight','bold').css('fontSize','16px');
    }


    $("#det_v_N_R").html(ep2DataObj['det_v_N_R']);
    $("#det_v_R_N").html(ep2DataObj['det_v_R_N']);

    if(parseFloat(ep2DataObj['det_v_N_R']) < 24){
        $("#det_v_N_R").css('fontWeight','bold').css('fontSize','16px');
        
    }
    if(parseFloat(ep2DataObj['det_v_R_N']) < 24){
        
        $("#det_v_R_N").css('fontWeight','bold').css('fontSize','16px');
    }


    $("#nwc_N_R").html(ep2DataObj['nwc_N_R']);
    $("#nwc_R_N").html(ep2DataObj['nwc_R_N']);

    let n_NR = parseFloat(ep2DataObj['nwc_N_R']);
    let n_RN = parseFloat(ep2DataObj['nwc_R_N']);

    if(n_NR >= 1.5 && n_NR <=2.5 ){
        
    }else{
        $("#nwc_N_R").css('fontWeight','bold').css('fontSize','16px');
        
    }

    if(n_RN >= 1.5 && n_RN <=2.5 ){
        
    }else{
        $("#nwc_R_N").css('fontWeight','bold').css('fontSize','16px');
        
    }


    $("#ob_sc_N_R").html(ep2DataObj['ob_sc_N_R']);
    $("#ob_sc_R_N").html(ep2DataObj['ob_sc_R_N']);

    let ob_sc_NR = parseFloat(ep2DataObj['ob_sc_N_R']);
    let ob_sc_RN = parseFloat(ep2DataObj['ob_sc_R_N']);

    if(ob_sc_NR >= 3 && ob_sc_NR <= 5 ){
        
    }else{
        $("#ob_sc_N_R").css('fontWeight','bold').css('fontSize','16px');
        
    }

    if(ob_sc_RN >= 3 && ob_sc_RN <= 5 ){
        
    }else{
        $("#ob_sc_R_N").css('fontWeight','bold').css('fontSize','16px');
        
    }


    $("#ob_t_N_R").html(ep2DataObj['ob_t_N_R']);
    // let ob_t_R_N = $("#ob_t_R_N").val();
    $("#gt_N_R").html(ep2DataObj['gt_N_R']);
    // let gt_R_N = $("#gt_R_N").val();
    $("#operatingTimeSecond").html(ep2DataObj['operatingTimeSecond']);

    if(parseFloat(ep2DataObj['operatingTimeSecond']) >=4 && parseFloat(ep2DataObj['operatingTimeSecond']) <=5){
        
    }else{
        $("#operatingTimeSecond").css('fontWeight','bold').css('fontSize','16px');
        
    }


    $("#operatingTime_dbt").html(ep2DataObj['operatingTime_dbt']);
    $("#friction_c_s").html(ep2DataObj['friction_c_s']);
    $("#track_locking").html(ep2DataObj['track_locking']);
    $("#remark_brief").html(ep2DataObj['remark_brief']);
}


function fillEP3FormData(id) {

    let ep2DataObj = formDataList[['EP3']].filter((x) => {
        if (x['id'] == id) {
            return x;
        }
    })[0];

    $("#componentForm_EP3").modal("show");

    if(ep2DataObj['language'] == "Hindi"){
        $(".ep3_details_english").addClass('d-none')
        $(".ep3_details_hindi").removeClass('d-none')
    }else{
        $(".ep3_details_hindi").addClass('d-none')
        $(".ep3_details_english").removeClass('d-none')
    }

    $("#ep3_1").html(ep2DataObj['ep3_1']);
    $("#ep3_2").html(ep2DataObj['ep3_2']);
    $("#ep3_3").html(ep2DataObj['ep3_3']);
    $("#ep3_4").html(ep2DataObj['ep3_4']);


}


function showFormDetails(id, EPtype,language) {
    // where EPtype = is EP1, EP4, EP5
    if(language == "Hindi"){
        $(".heading_english").addClass('d-none')
        $(".heading_hindi").removeClass('d-none')
     }else{
        $(".heading_hindi").addClass('d-none')
        $(".heading_english").removeClass('d-none')
    }
    // EP2 here

    if (EPtype == 'EP2') {
        fillEP2FormData(id);
        return;
    }else if(EPtype == 'EP3'){
        fillEP3FormData(id);
        return
    }

    if (id != '' && EPtype != '') {

        $.ajax({
            type: "POST",
            url: "./query/action.php",
            data: {
                "action": "getEP_FormDetails",
                "formType": EPtype,
                "language":language
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
            <div class="">${value}</div>
            `;



        // <option value="Done">Done</option>
        // <option value="Not Done">Not Done</option>
        displayHtml += `
            </td>
            </tr>
        `;


    });

    console.log("tableDataForm=>", tableDataForm);

/*
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
    */

    $("#date1").html(tableDataForm['date1']);
    $("#sale1_spg").html(tableDataForm['sale1_spg']);
    $("#sale1_v").html(tableDataForm['sale1_v']);
    $("#sale2_spg").html(tableDataForm['sale2_spg']);
    $("#sale2_v").html(tableDataForm['sale2_v']);
    $("#sale3_spg").html(tableDataForm['sale3_spg']);
    $("#sale3_v").html(tableDataForm['sale3_v']);
    $("#charging_v").html(tableDataForm['charging_v']);
    $("#charging_current").html(tableDataForm['charging_current']);
    $("#feedVoltage").html(tableDataForm['feedVoltage']);
    $("#nearBlock").html(tableDataForm['nearBlock']);
    $("#wireStatus").html(tableDataForm['wireStatus']);
    $("#remark1").html(tableDataForm['remark1']);

    $("#date2").html(tableDataForm['date2']);
    $("#railVoltage").html(tableDataForm['railVoltage']);
    $("#vt_value").html(tableDataForm['vt_value']);
    $("#wireStatus2").html(tableDataForm['wireStatus2']);
    $("#magneticPart").html(tableDataForm['magneticPart']);
    $("#railFlag2").html(tableDataForm['railFlag2']);
    $("#jumberwireStatus").html(tableDataForm['jumberwireStatus']);
    $("#remark2").html(tableDataForm['remark2']);

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
        <div class="">${value}</div>
        </td>
        </tr>
    `;


        } else {

            displayHtml += `
        <tr>
        <th scope="row">${index+1}</th>
        <td>${element['dl_details']}</td>
        <td style="vertical-align:middle;width:22%" >
        <div class="">${value}</div>
        </td>
        </tr>
    `;

        }

    });

    document.getElementById(tableId).innerHTML = displayHtml;

}


// ELB

function openDialog_ELB(typeOfForm, dataList, id) {

    let tableId = '';
    let displayHtml = "";

    let tableDataForm = formDataList[typeOfForm].filter((x) => {
        if (x['id'] == id) {
            return x;
        }
    })[0];

    switch (typeOfForm) {
        case "ELB1":
            tableId = "elb1_body";
            $("#componentForm_ELB1").modal("show");
            break;
        case "ELB2":
            tableId = "elb2_body";
            $("#componentForm_ELB2").modal("show");
            break;

        case "ELB3":
            tableId = "elb3_body";
            $("#componentForm_ELB3").modal("show");
            break;

        case "ELB4":
            tableId = "elb4_body";
            $("#componentForm_ELB4").modal("show");
            break;

        case "ELB5":
            tableId = "elb5_body";
            $("#componentForm_ELB5").modal("show");
            break;    
    }


    dataList.forEach((element, index) => {

        let value = tableDataForm[element['elb_id'].toLowerCase()]
        
        if(typeOfForm == "ELB3" && index == 2){

if(tableDataForm.language == "English"){

displayHtml += `
<tr>
<th scope="row">${index+1}</th>
<td>
    <span>(a) For barriers without hand generator:</span>
    <table class="table-dark">
        <tr>
            <td>Type</td>
            <td>Rated Voltage</td>
            <td>Normal (Max.) operating current/barrier for boom length up to 9.76 meter (=10 meter)</td>
            <td>Maximum rated current for each barrier for boom length up to 9.76 meter (=10 meter)</td>
        </tr>
        <tr>
            <td>AC</td>
            <td>110V</td>
            <td>2.5 Amps</td>
            <td>4.0 Amps</td>
        </tr>
           <tr>
            <td>DC</td>
            <td>24V</td>
            <td>4.0 Amps</td>
            <td>7.0 Amps</td>
        </tr>
           <tr>
            <td>DC</td>
            <td>110V</td>
            <td>1.0 Amps</td>
            <td>1.8 Amps</td>
        </tr>

    </table>
    <span>(b) For barriers with hand generator:</span>
<table class="table-dark">
        <tr>
            <td>Type</td>
            <td>Rated Voltage</td>
            <td>Normal (Max.) operating current/barrier for boom length up to 9.76 meter (=10 meter)</td>
            <td>Maximum rated current for each barrier for boom length up to 9.76 meter (=10 meter)</td>
        </tr>
   
           <tr>
            <td>DC</td>
            <td>24V</td>
            <td>3.0 Amps</td>
            <td>5.0 Amps</td>
        </tr>
           <tr>
            <td>DC</td>
            <td>110V</td>
            <td>0.7 Amps</td>
            <td>1.2 Amps</td>
        </tr>

    </table>

</td>
<td style="vertical-align:middle;width:22%" >
    <div class="">${value}</div>
</td>
</tr>
`;

}else{

    displayHtml += `
<tr>
<th scope="row">${index+1}</th>
<td>
    <span>(a) For barriers without hand generator:</span>
    <table class="table-dark">
        <tr>
            <td>टाइप </td>
            <td>रेटेड वोल्टेज</td>
            <td>Normal (Max.) operating current/barrier for boom length up to 9.76 meter (=10 meter)</td>
            <td>Maximum rated current for each barrier for boom length up to 9.76 meter (=10 meter)</td>
        </tr>
        <tr>
            <td>एसी</td>
            <td>110V</td>
            <td>2.5 Amps</td>
            <td>4.0 Amps</td>
        </tr>
           <tr>
            <td>डीसी</td>
            <td>24V</td>
            <td>4.0 Amps</td>
            <td>7.0 Amps</td>
        </tr>
           <tr>
            <td>डीसी</td>
            <td>110V</td>
            <td>1.0 Amps</td>
            <td>1.8 Amps</td>
        </tr>

    </table>
    <span>(b) For barriers with hand generator:</span>
    <table class="table-dark">
        <tr>                  
            <td>टाइप </td>
            <td>रेटेड वोल्टेज</td>
            <td>Normal (Max.) operating current/barrier for boom length up to 9.76 meter (=10 meter)</td>
            <td>Maximum rated current for each barrier for boom length up to 9.76 meter (=10 meter)</td>
        </tr>
   
           <tr>
                <td>डीसी</td>
                <td>24V</td>
                <td>3.0 Amps</td>
                <td>5.0 Amps</td>
            </tr>
           <tr>
                <td>डीसी</td>
                <td>110V</td>
                <td>0.7 Amps</td>
                <td>1.2 Amps</td>
            </tr>

    </table>

</td>
<td style="vertical-align:middle;width:22%" >
<div class="">${value}</div>
</td>
</tr>
`;

}



}else{

    displayHtml += `
        <tr>
        <th scope="row">${index+1}</th>
        <td>${element['elb_details']}</td>
        <td style="vertical-align:middle;width:22%" >
        <div class="">${value}</div>
        </td>
        </tr>
    `;

}

      




        

    });

    document.getElementById(tableId).innerHTML = displayHtml;

}
// BI
function openDialog_BI(typeOfForm, dataList, id) {

    let tableId = '';
    let displayHtml = "";

    let tableDataForm = formDataList[typeOfForm].filter((x) => {
        if (x['id'] == id) {
            return x;
        }
    })[0];

    switch (typeOfForm) {
        case "DB1":
            tableId = "db1_body";
            $("#componentForm_DB1").modal("show");
            break;
        case "DB2":
            tableId = "db2_body";
            $("#componentForm_DB2").modal("show");
            break;

        case "DB3":
            tableId = "db3_body";
            $("#componentForm_DB3").modal("show");
            break;
        case "UF1":
            tableId = "uf1_body";
            $("#componentForm_UF1").modal("show");
            break;

        case "UF2":
            tableId = "uf2_body";
            $("#componentForm_UF2").modal("show");
            break;
            
        case "UF3":
            tableId = "uf3_body";
            $("#componentForm_UF3").modal("show");
            break;

         case "UF4":
            tableId = "uf4_body";
            $("#componentForm_UF4").modal("show");
            break;
            
        case "UF5":
            tableId = "uf5_body";
            $("#componentForm_UF5").modal("show");
            break;         

    }


    dataList.forEach((element, index) => {

        let value = tableDataForm[element['db_id'].toLowerCase()]

      

            displayHtml += `
        <tr>
        <th scope="row">${index+1}</th>
        <td>${element['db_details']}</td>
        <td style="vertical-align:middle;width:22%" >
        <div class="">${value}</div>
        </td>
        </tr>
    `;


        

    });

    document.getElementById(tableId).innerHTML = displayHtml;

}

// DAC

function openDialog_DAC(typeOfForm, dataList, id) {

    let tableId = '';
    let displayHtml = "";

    let tableDataForm = formDataList[typeOfForm].filter((x) => {
        if (x['id'] == id) {
            return x;
        }
    })[0];

    switch (typeOfForm) {
        case "DAC1":
            tableId = "dac1_body";
            $("#componentForm_DAC1").modal("show");
            break;
        case "DAC2":
            tableId = "dac2_body";
            $("#componentForm_DAC2").modal("show");
            break;

        case "DAC3":
            tableId = "dac3_body";
            $("#componentForm_DAC3").modal("show");
            break;
   
    }


    dataList.forEach((element, index) => {

        let value = tableDataForm[element['dac_id'].toLowerCase()]

      

            displayHtml += `
        <tr>
        <th scope="row">${index+1}</th>
        <td>${element['dac_details']}</td>
        <td style="vertical-align:middle;width:22%" >
        <div class="">${value}</div>
        </td>
        </tr>
    `;


        

    });

    document.getElementById(tableId).innerHTML = displayHtml;

}

function openDialog_MLB(typeOfForm, dataList, id) {

let tableId = '';
let displayHtml = "";

let tableDataForm = formDataList[typeOfForm].filter((x) => {
    if (x['id'] == id) {
        return x;
    }
})[0];

switch (typeOfForm) {
    case "MLB1":
        tableId = "mlb1_body";
        $("#componentForm_MLB1").modal("show");
        break;
    case "MLB2":
        tableId = "mlb2_body";
        $("#componentForm_MLB2").modal("show");
        break;

    case "MLB3":
        tableId = "mlb3_body";
        $("#componentForm_MLB3").modal("show");
        break;
}


dataList.forEach((element, index) => {

    let value = tableDataForm[element['mlb_id'].toLowerCase()]

        displayHtml += `
            <tr>
            <th scope="row">${index+1}</th>
            <td>${element['mlb_details']}</td>
            <td style="vertical-align:middle;width:22%" >
            <div class="">${value}</div>
            </td>
                </tr>
        `;


    });

document.getElementById(tableId).innerHTML = displayHtml;

}

// slb 


function openDialog_SLB(typeOfForm, dataList, id) {

let tableId = '';
let displayHtml = "";

let tableDataForm = formDataList[typeOfForm].filter((x) => {
    if (x['id'] == id) {
        return x;
    }
})[0];

switch (typeOfForm) {
    case "SLB1":
        tableId = "slb1_body";
        $("#componentForm_SLB1").modal("show");
        break;
    case "SLB2":
        tableId = "slb2_body";
        $("#componentForm_SLB2").modal("show");
        break;

}


dataList.forEach((element, index) => {

    let value = tableDataForm[element['slb_id'].toLowerCase()]

        displayHtml += `
            <tr>
            <th scope="row">${index+1}</th>
            <td>${element['slb_details']}</td>
            <td style="vertical-align:middle;width:22%" >
            <div class="">${value}</div>
            </td>
                </tr>
        `;


    });

document.getElementById(tableId).innerHTML = displayHtml;

}


// cs Type form


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
            <div class="">${value_5a}</div>

            </td>
        </tr>

        <tr>
            <td>(b) Red on white background for implantation distance < 2.36 meters.</td>
            <td style="vertical-align:middle;width:22%" >
            <div class="">${value_5b}</div>

            </td>
        </tr>
    `;

        } else {


            displayHtml += `
        <tr>
        <th scope="row">${index+1}</th>
        <td>${element['cs_details']}</td>
        <td style="vertical-align:middle;width:22%" >
        <div class="">${value}</div>
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
        case "T4":
            tableId = "t4_body";
            $("#componentForm_T4").modal("show");
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
        <div class="">${value}</div>`;


        // <option value="Done">Done</option>
        // <option value="Not Done">Not Done</option>
        displayHtml += `
        </td>
        </tr>
    `;


    });

    document.getElementById(tableId).innerHTML = displayHtml;

}

function get_T_formData(id, tType,language) {

    if(language == "Hindi"){
        $(".heading_english").addClass('d-none')
        $(".heading_hindi").removeClass('d-none')
     }else{
        $(".heading_hindi").addClass('d-none')
        $(".heading_english").removeClass('d-none')
    }
    $.ajax({
        type: "POST",
        url: "./query/action.php",
        data: {
            "action": "getT_FormDetails",
            "formType": tType,
            language:language

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

    /*

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

    */

    $("#cs1_1").html(cs1DataObj['cs1_1']);
    $("#cs1_2").html(cs1DataObj['cs1_2']);
    $("#cs1_3").html(cs1DataObj['cs1_3']);
    $("#cs1_4").html(cs1DataObj['cs1_4']);
    $("#cs1_5").html(cs1DataObj['cs1_5']);

    $("#cs1_6").html(cs1DataObj['cs1_6']);
    $("#cs1_7").html(cs1DataObj['cs1_7']);
    $("#cs1_8").html(cs1DataObj['cs1_8']);
    $("#cs1_9").html(cs1DataObj['cs1_9']);
    $("#cs1_10").html(cs1DataObj['cs1_10']);
    $("#cs1_11").html(cs1DataObj['cs1_11']);
    $("#cs1_12a").html(cs1DataObj['cs1_12a']);
    $("#cs1_12b").html(cs1DataObj['cs1_12b']);
    $("#cs1_12c").html(cs1DataObj['cs1_12c']);
    $("#date").html(cs1DataObj['date']);
    $("#rg").html(cs1DataObj['rg']);
    $("#hg").html(cs1DataObj['hg']);
    // let gt_R_N = $("#gt_R_N").val();
    $("#dg").html(cs1DataObj['dg']);
    $("#hhg").html(cs1DataObj['hhg']);
    $("#route").html(cs1DataObj['route']);
    $("#c_on").html(cs1DataObj['c_on']);
    $("#shout").html(cs1DataObj['shout']);
    $("#nut_bolt").html(cs1DataObj['nut_bolt']);
    $("#dome_clean").html(cs1DataObj['dome_clean']);
    $("#cover").html(cs1DataObj['cover']);
    $("#remark").html(cs1DataObj['remark']);
}

function get_CS_formData(id, csType,language) {
    if(language == "Hindi"){
        $(".heading_english").addClass('d-none')
        $(".heading_hindi").removeClass('d-none')
     }else{
        $(".heading_hindi").addClass('d-none')
        $(".heading_english").removeClass('d-none')
    }

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
            language:language

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
//for BI
function get_DB_formData(id, biType,language) {

    if(language == "Hindi"){
        $(".heading_english").addClass('d-none')
        $(".heading_hindi").removeClass('d-none')
     }else{
        $(".heading_hindi").addClass('d-none')
        $(".heading_english").removeClass('d-none')
    }
   
    $.ajax({
        type: "POST",
        url: "./query/action.php",
        data: {
            "action": "getBI_FormDetails",
            "formType": biType,
              language:language,

        },
        beforeSend: function() {
            $("#loader_show").removeClass('d-none');


        },
        success: function(respo) {
            $("#loader_show").addClass('d-none');

            let response = JSON.parse(respo);

            if (response['status']) {

                openDialog_BI(biType, response['data'], id);

            }

        },
        complete: function() {
            $("#loader_show").addClass('d-none');

        }
    });
}

// 

function get_DL_formData(id, dlType,language) {

    if(language == "Hindi"){
        $(".heading_english").addClass('d-none')
        $(".heading_hindi").removeClass('d-none')
     }else{
        $(".heading_hindi").addClass('d-none')
        $(".heading_english").removeClass('d-none')
    }
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
            language:language

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


//for ELB
function get_ELB_formData(id, elbType,language) {

    if(language == "Hindi"){
        $(".heading_english").addClass('d-none')
        $(".heading_hindi").removeClass('d-none')
     }else{
        $(".heading_hindi").addClass('d-none')
        $(".heading_english").removeClass('d-none')
    }
   
    $.ajax({
        type: "POST",
        url: "./query/action.php",
        data: {
            "action": "getELB_FormDetails",
            "formType": elbType,
              language:language,

        },
        beforeSend: function() {
            $("#loader_show").removeClass('d-none');


        },
        success: function(respo) {
            $("#loader_show").addClass('d-none');

            let response = JSON.parse(respo);

            if (response['status']) {

                openDialog_ELB(elbType, response['data'], id);

            }

        },
        complete: function() {
            $("#loader_show").addClass('d-none');

        }
    });
}
// 


//for DAC
function get_DAC_formData(id, dacType,language) {
    if(language == "Hindi"){
        $(".heading_english").addClass('d-none')
        $(".heading_hindi").removeClass('d-none')
     }else{
        $(".heading_hindi").addClass('d-none')
        $(".heading_english").removeClass('d-none')
    }
    $.ajax({
        type: "POST",
        url: "./query/action.php",
        data: {
            "action": "getDAC_FormDetails",
            "formType": dacType,
              language:language,

        },
        beforeSend: function() {
            $("#loader_show").removeClass('d-none');


        },
        success: function(respo) {
            $("#loader_show").addClass('d-none');

            let response = JSON.parse(respo);

            if (response['status']) {

                openDialog_DAC(dacType, response['data'], id);

            }

        },
        complete: function() {
            $("#loader_show").addClass('d-none');

        }
    });
}
// 



function get_MLB_formData(id, mlbType,language) {
    if(language == "Hindi"){
        $(".heading_english").addClass('d-none')
        $(".heading_hindi").removeClass('d-none')
     }else{
        $(".heading_hindi").addClass('d-none')
        $(".heading_english").removeClass('d-none')
    }
$.ajax({
    type: "POST",
    url: "./query/action.php",
    data: {
        "action": "getMLB_FormDetails",
        "formType": mlbType,
        language:language

    },
    beforeSend: function() {
        $("#loader_show").removeClass('d-none');


    },
    success: function(respo) {
        $("#loader_show").addClass('d-none');

        let response = JSON.parse(respo);

        if (response['status']) {

            openDialog_MLB(mlbType, response['data'], id);

        }

    },
    complete: function() {
        $("#loader_show").addClass('d-none');

    }
});
}


function get_SLB_formData(id, slbType,language) {
    if(language == "Hindi"){
        $(".heading_english").addClass('d-none')
        $(".heading_hindi").removeClass('d-none')
     }else{
        $(".heading_hindi").addClass('d-none')
        $(".heading_english").removeClass('d-none')
    }
$.ajax({
    type: "POST",
    url: "./query/action.php",
    data: {
        "action": "getSLB_FormDetails",
        "formType": slbType,
        language:language

    },
    beforeSend: function() {
        $("#loader_show").removeClass('d-none');


    },
    success: function(respo) {
        $("#loader_show").addClass('d-none');

        let response = JSON.parse(respo);

        if (response['status']) {

            openDialog_SLB(slbType, response['data'], id);

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
        
        $(".displaySubcompoName").html(element['sub_component']);

        if (formKeyName.startsWith("EP")) {
            displayHtml += `
        <button type="button" class="btn btn-sm btn-success" onclick="showFormDetails('${element['id']}','${formKeyName}','${element['language']}')">
            See <i class="fas fa-eye-close"></i>
        </button>
       `;

        } else if (formKeyName.startsWith("T")) {
            displayHtml += `
        <button type="button" class="btn btn-sm btn-success" onclick="get_T_formData('${element['id']}','${formKeyName}','${element['language']}')">
            See <i class="fas fa-eye-close"></i>
        </button>
       `;
        } else if (formKeyName.startsWith("CS")) {
            displayHtml += `
        <button type="button" class="btn btn-sm btn-success" onclick="get_CS_formData('${element['id']}','${formKeyName}','${element['language']}')">
            See <i class="fas fa-eye-close"></i>
        </button>
       `;
        } else if (formKeyName.startsWith("DL")) {
        $(".displaySubcompoName").html(''); // empty because no sub component in this component

            displayHtml += `
        <button type="button" class="btn btn-sm btn-success" onclick="get_DL_formData('${element['id']}','${formKeyName}','${element['language']}')">
            See <i class="fas fa-eye-close"></i>
        </button>
       `;
        }
         else if (formKeyName.startsWith("ELB")) {
            displayHtml += `
        <button type="button" class="btn btn-sm btn-success" onclick="get_ELB_formData('${element['id']}','${formKeyName}','${element['language']}')">
            See <i class="fas fa-eye-close"></i>
        </button>
       `;
        }

         else if (formKeyName.startsWith("DAC")) {
            displayHtml += `
        <button type="button" class="btn btn-sm btn-success" onclick="get_DAC_formData('${element['id']}','${formKeyName}','${element['language']}')">
            See <i class="fas fa-eye-close"></i>
        </button>
       `;
        }

         else if (formKeyName.startsWith("DB")) {
            displayHtml += `
        <button type="button" class="btn btn-sm btn-success" onclick="get_DB_formData('${element['id']}','${formKeyName}','${element['language']}')">
            See <i class="fas fa-eye-close"></i>
        </button>
       `;
        }

         else if (formKeyName.startsWith("UF")) {
            displayHtml += `
        <button type="button" class="btn btn-sm btn-success" onclick="get_DB_formData('${element['id']}','${formKeyName}','${element['language']}')">
            See <i class="fas fa-eye-close"></i>
        </button>
       `;
        }
         else if (formKeyName.startsWith("MLB")) {
            displayHtml += `
        <button type="button" class="btn btn-sm btn-success" onclick="get_MLB_formData('${element['id']}','${formKeyName}','${element['language']}')">
            See <i class="fas fa-eye-close"></i>
        </button>
       `;
        } else if (formKeyName.startsWith("SLB")) {
            displayHtml += `
        <button type="button" class="btn btn-sm btn-success" onclick="get_SLB_formData('${element['id']}','${formKeyName}','${element['language']}')">
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

    let userID = '<?php echo $_SESSION['userretaileremp']; ?>';
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