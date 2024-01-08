<?php
// require('header.php');
// require('include/db_config.php');
session_start();

?>
<div class="container">
    <div class="row">
        <div class="my-1 col-12" id="createSubcompo">

        </div>

        <div id="showError" class="text-danger text-center h6">

        </div>

    </div>


    <div class="table-responsive d-none" id="mainTable">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <td>#</td>
                    <td>Component</td>
                    <td>Language</td>
                    <td>Sub Component</td>
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
                            <?php echo $_SESSION['emp_name_tmp'] ?? '...'; ?>

                        </span>

                    </div>
                    <div class="col-6">
                        <span>Id:</span>
                        <span class="ml-2 font-weight-bold">

                            <?php echo $_SESSION['empid_for_form']; ?>
                        </span>

                    </div>

                    <div class="col-6">
                        <span>Section:</span>
                        <span class="ml-2 font-weight-bold">
                            <?php echo $_SESSION['section_name_tmp']; ?>
                        </span>
                    </div>
                    <div class="col-6">
                        <span>Station:</span>

                        <span class="ml-2 font-weight-bold">
                            <?php echo $_SESSION['station_name_tmp']; ?>

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
                                     <span class="heading_english">
                                    Measurements of operating values (voltage & current) of point machines, with and
                                    without obstruction for normal
                                    and reverse operation. Current required to operate the machine in either direction
                                    shall be 1.5 to 2 times of its
                                    normal operation and friction clutch shall slip within this range. Replace machine
                                    when difference between normal
                                    operating current and current under obstruction is less than 0.5 A.</span>
                                    <span class="heading_hindi">
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
                                                    <span class="heading_english">Date</span>
                                                    <span class="heading_hindi">दिनांक</span>
                                                </td>
                                                <td>
                                                    <!-- <input type="date" id="EP2_1" disabled class="form-control"> -->
                                                    <div id="EP2_1" ></div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td style="vertical-align: middle;" rowspan="2">                                           
                                                     <span class="heading_english">Operating Voltage (>100 Volts)</span>
                                                    <span class="heading_hindi">सामान्य ऑपरेटिंग वोल्टेज (>100 वोल्ट)</span>
                                                </td>
                                                <td>
                                                    <span class="heading_english">(N to R)</span>
                                                    <span class="heading_hindi">नॉर्मल से रिर्वस</span>
                                                </td>
                                                <td>
                                                    <!-- <input type="number" disabled id="op_v_N_R" class="form-control"> -->
                                                    <div id="op_v_N_R"></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="heading_english">(R to N)</span>
                                                    <span class="heading_hindi">रिवर्स से नॉर्मल</span> 
                                                </td>
                                                <td>
                                                    <!-- <input type="number" disabled id="op_v_R_N" class="form-control"> -->
                                                    <div id="op_v_R_N"></div>
                                                </td>
                                            </tr>


                                            <tr>
                                                <td style="vertical-align: middle;" rowspan="2">
                                                    <span class="heading_english">Obstruction Voltage (>80 Volts)</span>
                                                    <span class="heading_hindi">बाधा वोल्टेज (>80 वोल्ट)</span>
                                                </td>
                                                <td>
                                                    <span class="heading_english">(N to R)</span>
                                                    <span class="heading_hindi">नॉर्मल से रिर्वस</span>
                                                </td>
                                                <td>
                                                    <!-- <input type="number" disabled id="ob_v_N_R" class="form-control"> -->
                                                    <div id="ob_v_N_R"></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="heading_english">(R to N)</span>
                                                    <span class="heading_hindi">रिवर्स से नॉर्मल</span> 
                                                </td>
                                                <td>
                                                    <!-- <input type="number" disabled id="ob_v_R_N" class="form-control"> -->
                                                    <div id="ob_v_R_N"></div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td style="vertical-align: middle;" rowspan="2">
                                                    <span class="heading_english">Detection Voltage (>24 Volts)</span>
                                                    <span class="heading_hindi">डिटेक्शन वोल्टेज (>24 वोल्ट)*</span>

                                                </td>
                                                <td>
                                                    <span class="heading_english">(N to R)</span>
                                                    <span class="heading_hindi">नॉर्मल से रिर्वस</span>
                                                </td>
                                                <td>
                                                    <!-- <input type="number" disabled id="det_v_N_R" class="form-control"> -->
                                                    <div id="det_v_N_R"></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="heading_english">(R to N)</span>
                                                    <span class="heading_hindi">रिवर्स से नॉर्मल</span> 
                                                </td>
                                                <td>
                                                    <!-- <input type="number" disabled id="det_v_R_N" class="form-control"> -->
                                                    <div id="det_v_R_N"></div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td style="vertical-align: middle;" rowspan="2">
                                                    <span class="heading_english">Normal Working Current (1.5 - 2.5 Amp.)</span>
                                                    <span class="heading_hindi">सामान्य कार्यशील धारा (1.5 - 2.5 एम्पियर)</span>
                                                </td>
                                                <td>
                                                    <span class="heading_english">(N to R)</span>
                                                    <span class="heading_hindi">नॉर्मल से रिर्वस</span> 
                                                </td>
                                                <td>
                                                    <!-- <input type="number" disabled id="nwc_N_R" class="form-control"> -->
                                                    <div id="nwc_N_R"></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="heading_english">(R to N)</span>
                                                    <span class="heading_hindi">रिवर्स से नॉर्मल</span> 
                                                </td>
                                                <td>
                                                    <!-- <input type="number" disabled id="nwc_R_N" class="form-control"> -->
                                                    <div id="nwc_R_N"></div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td style="vertical-align: middle;" rowspan="2">
                                                    <span class="heading_english">Obstruction/Slipping Current (3-5 Amp.)</span>
                                                    <span class="heading_hindi">रुकावट/स्लिपिंग करंट (3-5 एम्पियर)</span>
                                                 </td>
                                                <td>
                                                    <span class="heading_english">(N to R)</span>
                                                    <span class="heading_hindi">नॉर्मल से रिर्वस</span> 
                                                </td>
                                                <td>
                                                    <!-- <input type="number" disabled id="ob_sc_N_R" class="form-control"> -->
                                                    <div id="ob_sc_N_R"></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="heading_english">(R to N)</span>
                                                    <span class="heading_hindi">रिवर्स से नॉर्मल</span> 
                                                </td>
                                                <td>
                                                    <!-- <input type="number" disabled id="ob_sc_R_N" class="form-control"> -->
                                                    <div id="ob_sc_R_N"></div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td style="vertical-align: middle;" colspan="2">
                                                    <span class="heading_english">Obstruction Test (3.25 mm)</span>
                                                    <span class="heading_hindi">रुकावट परीक्षण (3.25 मिमी)*</span>
                                                </td>
                                                <!-- <td>(N to R)</td> -->
                                                <td>
                                                    <!-- <input type="text" disabled id="ob_t_N_R" class="form-control"> -->
                                                    <div id="ob_t_N_R"></div>

                                                </td>
                                            </tr>



                                            <tr>
                                                <td style="vertical-align: middle;" colspan="2">
                                                    <span class="heading_english">Go Test (1.6 mm Fail Safe Test)</span>
                                                    <span class="heading_hindi">गो टेस्ट (1.6 मिमी असफल सुरक्षित परीक्षण)*</span>
                                                </td>
                                                <!-- <td>(N to R)</td> -->
                                                <td>
                                                    <!-- <input type="text" disabled id="gt_N_R" class="custom-select"> -->
                                                    <div id="gt_N_R"></div>

                                                </td>
                                            </tr>


                                            <tr>
                                                <td style="vertical-align: middle;" colspan="2">
                                            
                                                    <span class="heading_english">Operating Time (4-5 Seconds)</span>
                                                    <span class="heading_hindi">परिचालन समय (4-5 सेकंड)*</span>
                                                </td>
                                                <td>
                                                    <!-- <input type="number" disabled id="operatingTimeSecond" class="form-control"> -->
                                                    <div id="operatingTimeSecond"></div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td style="vertical-align: middle;" colspan="2">
                                                    <span class="heading_english">अवरोध परिक्षण के दौरान परिचालन समय*</span>
                                                    <span class="heading_hindi">अवरोध परिक्षण के दौरान परिचालन समय*</span>
                                                </td>
                                                <td>
                                                    <!-- <input type="number" disabled id="operatingTime_dbt" class="form-control"> -->
                                                    <div id="operatingTime_dbt"></div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td style="vertical-align: middle;" colspan="2">
                                                    <!-- Is the friction clutch slipping or not? -->
                                                    <span class="heading_english">फ्रिक्शन क्लच स्लिप कर रहा है या नहीं</span>
                                                     <span class="heading_hindi">फ्रिक्शन क्लच स्लिप कर रहा है या नहीं</span>
                                                </td>
                                                <td>
                                                    <!-- <input type="number" disabled id="friction_c_s" class="form-control"> -->
                                                    <div id="friction_c_s"></div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td style="vertical-align: middle;" colspan="2">
                                                    <span class="heading_english">Track Locking Test</span>
                                                    <span class="heading_hindi">ट्रैक लॉकिंग टेस्ट*</span>
                                                </td>
                                                <td>
                                                    <!-- <input type="number" disabled id="track_locking" class="form-control"> -->
                                                    <div id="track_locking"></div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td style="vertical-align: middle;" colspan="2">
                                                    <!-- Remark's inspection/brief description of maintenance -->
                                                    <span class="heading_english">रिमार्क एवं निरिक्षण/अनुरक्षण का सञ्चिपट विवरण*</span>
                                                    <span class="heading_hindi">रिमार्क एवं निरिक्षण/अनुरक्षण का सञ्चिपट विवरण*</span>
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
                                <span class="heading_english">
                                    Checking of feed disconnection time under obstruction is not less than 10 Seconds.
                                </span>
                                <span class="heading_hindi">रुकावट के तहत फ़ीड वियोग का समय जांचने में 10 सेकंड से कम नहीं है।</span> 
                                </td>
                                <td>
                                    <!-- <input type="text" disabled class="custom-select EP2Class" id="EP2_2"> -->
                                    <div id="EP2_2"></div>

                                </td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>
                                    <span class="heading_english">
                                    Ensure Hose pipe/GI pipe in good condition and without gaps/access.</span>
                                    <span class="heading_hindi">सुनिश्चित करें कि होज़ पाइप/जीआई पाइप अच्छी स्थिति में और बिना किसी गैप/पहुँच के हो।</span>    
                                    
                                </td>
                                <td>
                                    <!-- <input type="text" disabled class="custom-select EP2Class" id="EP2_3"> -->
                                    <div id="EP2_3"></div>

                                </td>
                            </tr>
                            <tr>
                                <th scope="row">4</th>
                                <td>
                                <span class="heading_english">
                                    Check MS pins of Switch Extension piece/'P' bracket for any rib formation or excessive
                                    wear.
                                </span>
                                <span class="heading_hindi">किसी भी पसली गठन या अत्यधिक घिसाव के लिए स्विच एक्सटेंशन पीस/'पी' ब्रैकेट के MS पिन की जांच करें।</span>    
                            
                            
                                </td>
                                <td>
                                    <!-- <input type="text" disabled class="custom-select EP2Class" id="EP2_4"> -->
                                    <div id="EP2_4"></div>

                                </td>
                            </tr>
                            <tr>
                                <th scope="row">5</th>
                                <td>
                                <div class="heading_english">
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
                                <div class="heading_hindi">
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

<script>
    // global 
    var formDataList_g = [];

    function showFormDetails(id, language) {
        $("#componentForm_EP2").modal("show");

        if (language == "Hindi") {
            $(".heading_english").addClass('d-none')
            $(".heading_hindi").removeClass('d-none')
        } else {
            $(".heading_hindi").addClass('d-none')
            $(".heading_english").removeClass('d-none')
        }

        let ep2DataObj = formDataList_g.filter((x) => {
            if (x['id'] == id) {
                return x;
            }
        })[0];
        
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



    function showTable(subcomponame) {

        $("#mainTable").removeClass('d-none');

        let formData = formDataList_g.filter((x) => x.sub_component == subcomponame);
        let displayHtml = '';


        formData.forEach((element, index) => {

            displayHtml += `<tr>
        <th scope="row">${index + 1}</th>
        <td>${element['component_name']}</td>
        <td>${element['language']}</td>
        <td>${element['sub_component']}</td>
        <td>${element['created_date']}</td>
        <td>${element['updated_date']}</td>
        <td style="vertical-align:middle;width:22%" >`;

            $(".displaySubcompoName").html(element['sub_component']);

            displayHtml += `
        <button type="button" class="btn btn-sm btn-success" onclick="showFormDetails('${element['id']}','${element['language']}')">
            See <i class="fas fa-eye-close"></i>
        </button>`;



            displayHtml += `</td></tr>`;


        });

        document.getElementById("printTableData").innerHTML = displayHtml;


    }

    function showSubComponent() {

        $("#mainTable").addClass('d-none');

        document.getElementById("printTableData").innerHTML = "";

        let dataList = [...formDataList_g];

        let subCompo = [...new Set(dataList.map(x => x.sub_component))];

        console.log("subCompo map=", subCompo);

        if (subCompo.length != 0) {

            let createSubcompo = `<div class="text-center h5 alert alert-danger my-2">Point "EP2" Form</div>`;
            createSubcompo += `<div class="col-12 mt-1 mb-2">`;

            subCompo.forEach(element => {

                createSubcompo +=
                    `<button type="button" onclick="showTable('${element}')" class="btn btn-sm btn-primary mx-2">${element}</button>`

            });
            createSubcompo += `</div>`;


            $("#createSubcompo").html(createSubcompo);


        }


    }


    function getComponentForm() {

        $.ajax({
            type: "POST",
            url: "query/common-form-data-action.php",
            data: {
                common_action: "getFormSubmitedData_new",
                "formType": "EP2"
            },
            beforeSend: function () {
                $("#loader_show").removeClass('d-none');
                formDataList_g = [];
                $("#showError").html("");


            },
            success: function (response) {
                try {
                    let respo = JSON.parse(response);
                    console.log("response form data=", respo);

                    if (!respo['status']) {
                        $("#showError").html(respo['msg']);
                        return
                    }

                    formDataList_g = respo['data'];
                    showSubComponent();

                } catch (e) {
                    $("#showError").html("Catch block, Response Error " + e);


                }


            },
            complete: function () {
                $("#loader_show").addClass('d-none');
                setTimeout(() => {
                    $("#showError").html("");

                }, 9000);

            }

        });


    }


    $(document).ready(() => {
        getComponentForm();
    });

</script>