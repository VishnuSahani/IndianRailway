<?php require('header.php'); ?>
<?php require('include/db_config.php');

//Include database configuration file
$id = "";

if (isset($_SESSION['userretaileremp'])) {
    $id = $_SESSION['userretaileremp'];

}

// echo $name;

?>

<style>
    .dropdown-item{
        cursor: pointer;
    }

    .width70{
        width: 70px !important;
    }
</style>




<div class="container" style="margin-top:30px;">

    <div class="alert alert-primary d-flex justify-content-between align-items-center">
        <div></div>
        <p class="text-center h5">Add Station Component </p>

        <button type="button" onclick="location.reload()" class="btn btn-sm btn-success">Refresh</button>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form>
                    <div class="row">
                    <div class="form-group col-md-4 col-12">

                        <label for="language">Select Form Language <span class="text-danger">*</span></label>
                        <select name="language" id="language" class="form-control">
                            <!-- <option value="">Select Lnguage</option> -->
                            <option value="Hindi">Hindi</option>
                            <option value="English">English</option>

                        </select>

                    </div>
                        <div class="form-group col-md-4 col-12">
                            <label for="sectionName">Section Name</label>
                            <input type="text" id="sectionName" class="form-control" disabled
                                value="<?php echo $empSectionName; ?>">
                            <input type="hidden" id="sectionId" class="form-control" disabled
                                value="<?php echo $empSectionId; ?>">
                            <input type="hidden" id="compoNameTmp">
                            <input type="hidden" id="subcompoNameTmp">
                        </div>

                        <div class="form-group col-md-4 col-12">
                            <label for="stationName">Station Name</label>
                            <input type="text" id="stationName" class="form-control" disabled
                                value="<?php echo $empStationName; ?>">
                            <input type="hidden" id="stationId" class="form-control" disabled
                                value="<?php echo $empStationId; ?>">
                        </div>


                        <div class="form-group col-12">
                            <div class="alert alert-success text-center h6">
                                Station Component List
                            </div>

                            <div class="d-flex flex-wrap my-2" id="componentDisplay">

                            </div>
                        </div>

                        <div class="form-group col-12" id="subComponentDisplay">

                        </div>






                    </div>

                </form>
            </div>
        </div>
    </div>



</div>
<!--container close-->


<!-- Modal EP1 -->
<div class="modal fade" id="componentForm_EP1" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="componentFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <form>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="componentFormLabel">
                        <span class="badge badge-success h3" id="modalComponentName">
                            Schedule Code: EP1  
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
                        <tbody id="ep1_body">

                        </tbody>
                    </table>
                </div>

                <div class="card-footer d-flex justify-content-between">
                    <div id="ep1Form_status"></div>
                    <div>
                        <button type="reset" class="btn btn-sm btn-danger">Reset</button>
                        <button type='button' id="ep1FormBtn" class="btn btn-sm btn-success">Final Submit</button>
                    </div>
                </div>

            </div>
        </form>
    </div>
</div>

<!-- Modal EP2 -->
<div class="modal fade" id="componentForm_EP2" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="componentFormLabel2" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <form id="FormEP2">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="componentFormLabel2">
                    <span class="badge badge-success h3">
                        Schedule Code: EP2
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
                <!-- <form id="modalFormComponent">
                   
                </form> -->
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <!-- <th scope="col">S.No</th>
                            <th scope="col">Check the following</th>
                            <th scope="col">Action</th> -->
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
                                                <input type="date" id="EP2_1" class="form-control">
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
                                                <input type="number" id="op_v_N_R" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                            <span class="ep2_details_english">(R to N)</span>
                                            <span class="ep2_details_hindi">रिवर्स से नॉर्मल</span>    
                                            
                                        </td>
                                            <td>
                                                <input type="number" id="op_v_R_N" class="form-control">
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
                                                <input type="number" id="ob_v_N_R" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                            <span class="ep2_details_english">(R to N)</span>
                                            <span class="ep2_details_hindi">रिवर्स से नॉर्मल</span>    
                                            </td>
                                            <td>
                                                <input type="number" id="ob_v_R_N" class="form-control">
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
                                                <input type="number" id="det_v_N_R" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                            <span class="ep2_details_english">(R to N)</span>
                                            <span class="ep2_details_hindi">रिवर्स से नॉर्मल</span>    
                                            </td>
                                            <td>
                                                <input type="number" id="det_v_R_N" class="form-control">
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
                                                <input type="number" id="nwc_N_R" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                            <span class="ep2_details_english">(R to N)</span>
                                            <span class="ep2_details_hindi">रिवर्स से नॉर्मल</span>    
                                            </td>
                                            <td>
                                                <input type="number" id="nwc_R_N" class="form-control">
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
                                                <input type="number" id="ob_sc_N_R" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                            <span class="ep2_details_english">(R to N)</span>
                                            <span class="ep2_details_hindi">रिवर्स से नॉर्मल</span>    
                                            </td>
                                            <td>
                                                <input type="number" id="ob_sc_R_N" class="form-control">
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="vertical-align: middle;"  colspan="2">
                                            <span class="ep2_details_english">Obstruction Test (3.25 mm)</span>
                                            <span class="ep2_details_hindi">रुकावट परीक्षण (3.25 मिमी)*</span>
                                            </td>
                                            <!-- <td>(N to R)</td> -->
                                            <td>
                                                <select id="ob_t_N_R" class="custom-select">
                                                    <option value="">Select</option>
                                                   
                                                    <option class="ep2_details_english" value="OK">OK</option>
                                                    <option class="ep2_details_english" value="Not OK">Not OK</option>
                                                   
                                            
                                                    <option  class="ep2_details_hindi" value="ठीक है">ठीक है</option>
                                                    <option  class="ep2_details_hindi" value="ठीक नहीं है">ठीक नहीं है</option>
                                            
                                                    
                                                </select>
                                            </td>
                                        </tr>
                                        <!-- <tr>
                                            <td>(R to N)</td>
                                            <td>
                                                <input type="text" id="ob_t_R_N" class="form-control">
                                            </td>
                                        </tr> -->


                                        <tr>
                                            <td style="vertical-align: middle;"  colspan="2">
                                            <span class="ep2_details_english">Go Test (1.6 mm Fail Safe Test)</span>
                                            <span class="ep2_details_hindi">गो टेस्ट (1.6 मिमी असफल सुरक्षित परीक्षण)*</span>
                                            </td>
                                            <!-- <td>(N to R)</td> -->
                                            <td>
                                                <select id="gt_N_R" class="custom-select">
                                                <option value="">Select</option>
                                                    
                                                    <option class="ep2_details_english" value="OK">OK</option>
                                                    <option class="ep2_details_english" value="Not OK">Not OK</option>
                                                    
                                            
                                                    <option class="ep2_details_hindi" value="ठीक है">ठीक है</option>
                                                    <option class="ep2_details_hindi" value="ठीक नहीं है">ठीक नहीं है</option>
                                            
                                                </select>
                                            </td>
                                        </tr>
                                        <!-- <tr>
                                            <td>(R to N)</td>
                                            <td>
                                                <input type="text" id="gt_R_N" class="form-control">
                                            </td>
                                        </tr> -->

                                        <tr>
                                            <td style="vertical-align: middle;" colspan="2">
                                            <span class="ep2_details_english">Operating Time (4-5 Seconds)</span>
                                            <span class="ep2_details_hindi">परिचालन समय (4-5 सेकंड)*</span>
                                            </td>
                                            <td>
                                                <input type="number" id="operatingTimeSecond" class="form-control">
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="vertical-align: middle;" colspan="2">
                                            <!-- Operating time during barrier test (>10 Seconds) -->
                                            <span class="ep2_details_english">अवरोध परिक्षण के दौरान परिचालन समय*</span>
                                            <span class="ep2_details_hindi">अवरोध परिक्षण के दौरान परिचालन समय*</span>
                                            
                                        </td>
                                            <td>
                                                <input type="number" id="operatingTime_dbt" class="form-control">
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="vertical-align: middle;" colspan="2">
                                            <!-- Is the friction clutch slipping or not? -->
                                            <span class="ep2_details_english">फ्रिक्शन क्लच स्लिप कर रहा है या नहीं</span>
                                            <span class="ep2_details_hindi">फ्रिक्शन क्लच स्लिप कर रहा है या नहीं</span>
                                           
                                        </td>
                                            <td>
                                                <!-- <input type="text" id="friction_c_s" class="form-control"> -->
                                                <select id="friction_c_s" class="custom-select">
                                                <option value="">Select</option>
                                                
                                                    <option  class="ep2_details_english" value="OK">OK</option>
                                                    <option  class="ep2_details_english" value="Not OK">Not OK</option>
                                                    
                                            
                                                    <option class="ep2_details_hindi" value="ठीक है">ठीक है</option>
                                                    <option class="ep2_details_hindi" value="ठीक नहीं है">ठीक नहीं है</option>
                                            
                                                </select>
                                                
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="vertical-align: middle;" colspan="2">
                                            <span class="ep2_details_english">Track Locking Test</span>
                                            <span class="ep2_details_hindi">ट्रैक लॉकिंग टेस्ट*</span>
                                            
                                        </td>
                                            <td>
                                                <!-- <input type="text" id="track_locking" class="form-control"> -->
                                                <select id="track_locking" class="custom-select">
                                                <option value="">Select</option>
                                                    
                                                    <option class="ep2_details_english" value="OK">OK</option>
                                                    <option class="ep2_details_english" value="Not OK">Not OK</option>
                                                    
                                            
                                                    <option class="ep2_details_hindi" value="उत्तीर्ण">उत्तीर्ण</option>
                                                    <option class="ep2_details_hindi" value="अनुत्तीर्ण">अनुत्तीर्ण</option>
                                            
                                                </select>
                                            </td>
                                        </tr>
                                       
                                        <tr>
                                            <td style="vertical-align: middle;" colspan="2">
                                            <!-- Remark's inspection/brief description of maintenance -->
                                            <span class="ep2_details_english">रिमार्क एवं निरिक्षण/अनुरक्षण का सञ्चिपट विवरण*</span>
                                            <span class="ep2_details_hindi">रिमार्क एवं निरिक्षण/अनुरक्षण का सञ्चिपट विवरण*</span>
                                            
                                        </td>
                                            <td>
                                                <input type="text" id="remark_brief" class="form-control">
                                            </td>
                                        </tr>

                                        <!-- <tr>
                                            <td style="vertical-align: middle;" colspan="2">
                                          Signature
                                        </td>
                                            <td>
                                                <input type="text" id="signature" class="form-control">
                                            </td>
                                        </tr> -->
                                     


                                        
                                    </tbody>
                                </table>
                            </td>

                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>
                            <span class="ep2_details_english">
                                Checking of feed disconnection time under obstruction is not less than 10 Seconds.</span>
                                            <span class="ep2_details_hindi">रुकावट के तहत फ़ीड वियोग का समय जांचने में 10 सेकंड से कम नहीं है।</span>    
                            </td>
                            <td>
                                <select class="custom-select EP2Class" id="EP2_2">
                                    <option value="">Select Action</option>
                                    <option  class="ep2_details_english" value="OK">OK</option>
                                                    <option  class="ep2_details_english" value="Not OK">Not OK</option>
                                                    
                                            
                                                    <option class="ep2_details_hindi" value="ठीक है">ठीक है</option>
                                                    <option class="ep2_details_hindi" value="ठीक नहीं है">ठीक नहीं है</option>
                                            
                                </select>
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
                                <select class="custom-select EP2Class" id="EP2_3">
                                    <option value="">Select Action</option>
                                    <option  class="ep2_details_english" value="OK">OK</option>
                                                    <option  class="ep2_details_english" value="Not OK">Not OK</option>
                                                    
                                            
                                                    <option class="ep2_details_hindi" value="ठीक है">ठीक है</option>
                                                    <option class="ep2_details_hindi" value="ठीक नहीं है">ठीक नहीं है</option>
                                            
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>
                            <span class="ep2_details_english">
                            Check MS pins of Switch Extension piece/‘P’ bracket for any rib formation or excessive
                                wear.
                            </span>
                                            <span class="ep2_details_hindi">किसी भी पसली गठन या अत्यधिक घिसाव के लिए स्विच एक्सटेंशन पीस/'पी' ब्रैकेट के MS पिन की जांच करें।</span>    
                            </td>
                            <td>
                                <select class="custom-select EP2Class" id="EP2_4">
                                    <option value="">Select Action</option>
                                    <option  class="ep2_details_english" value="OK">OK</option>
                                                    <option  class="ep2_details_english" value="Not OK">Not OK</option>
                                                    
                                            
                                                    <option class="ep2_details_hindi" value="ठीक है">ठीक है</option>
                                                    <option class="ep2_details_hindi" value="ठीक नहीं है">ठीक नहीं है</option>
                                            
                                </select>
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
                                <select class="custom-select EP2Class" id="EP2_5">
                                    <option value="">Select Action</option>
                                    <option  class="ep2_details_english" value="OK">OK</option>
                                                    <option  class="ep2_details_english" value="Not OK">Not OK</option>
                                                    
                                            
                                                    <option class="ep2_details_hindi" value="ठीक है">ठीक है</option>
                                                    <option class="ep2_details_hindi" value="ठीक नहीं है">ठीक नहीं है</option>
                                            
                                </select>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>

            <div class="card-footer d-flex justify-content-between">
                <div id="ep2Form_status"></div>
                <div>
                    <button class="btn btn-sm btn-danger" type="reset">Reset</button>
                    <button type='button' id="ep2FormBtn" class="btn btn-sm btn-success">Final Submit</button>
                </div>
            </div>
         

        </div>
        </form>
    </div>
</div>

<!-- Modal EP3 -->
<div class="modal fade" id="componentForm_EP3" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="componentFormLabelEP3" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <form id="formEP3">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="componentFormLabelEP3">
                        <span class="badge badge-success h3" id="modalComponentName">
                            Schedule Code: EP3  
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
                                <select id="ep3_1" class="custom-select">
                                                <option value="">Select</option>
                                                
                                                    <option  class="ep3_details_english" value="OK">OK</option>
                                                    <option  class="ep3_details_english" value="Not OK">Not OK</option>
                                                    
                                            
                                                    <option class="ep3_details_hindi" value="ठीक है">ठीक है</option>
                                                    <option class="ep3_details_hindi" value="ठीक नहीं है">ठीक नहीं है</option>
                                            
                                    </select>
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
                                <select id="ep3_2" class="custom-select">
                                                <option value="">Select</option>
                                                
                                                    <option  class="ep3_details_english" value="OK">OK</option>
                                                    <option  class="ep3_details_english" value="Not OK">Not OK</option>
                                                    
                                            
                                                    <option class="ep3_details_hindi" value="ठीक है">ठीक है</option>
                                                    <option class="ep3_details_hindi" value="ठीक नहीं है">ठीक नहीं है</option>
                                            
                                    </select>
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
                                    <input type="text" id="ep3_3" class="form-control">
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
                                <input type="text" id="ep3_4" class="form-control">

                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>

                <div class="card-footer d-flex justify-content-between">
                    <div id="ep3Form_status"></div>
                    <div>
                        <button type="reset" class="btn btn-sm btn-danger">Reset</button>
                        <button type='button' id="ep3FormBtn" class="btn btn-sm btn-success">Final Submit</button>
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
        <form>
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="componentFormLabel4">
                    <span class="badge badge-success h3">
                        Schedule Code: EP4
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
                    <tbody id="ep4_body">

                    </tbody>
                </table>
            </div>

            <div class="card-footer d-flex justify-content-between">
                <div id="ep4Form_status"></div>

                <div>
                    <button type='reset' class="btn btn-sm btn-danger">Reset</button>
                    <button type='button' id="ep4FormBtn" class="btn btn-sm btn-success">Final Submit</button>
                </div>
            </div>

        </div>
        </form>
    </div>
</div>

<!-- Modal EP5 -->
<div class="modal fade" id="componentForm_EP5" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="componentFormLabel4" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <form>
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="componentFormLabel5">
                    <span class="badge badge-success h3">
                        Schedule Code: EP5
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
                    <tbody id="ep5_body">

                    </tbody>
                </table>
            </div>

            <div class="card-footer d-flex justify-content-between">
                <div id="ep5Form_status"></div>
                <div>
                    <button type='reset' class="btn btn-sm btn-danger">Reset</button>
                    <button type='button' id="ep5FormBtn" class="btn btn-sm btn-success">Final Submit</button>
                </div>
            </div>

        </div>
        </form>
    </div>
</div>


<!-- Modal T1 -->
<div class="modal fade" id="componentForm_T1" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="componentFormLabelT1" aria-hidden="true">
    <form>
    <div class="modal-dialog modal-dialog-centered" style="width:100%;max-width:100%">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="componentFormLabelT1">
                    <span class="badge badge-success h3">
                        Schedule Code: T1
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
                  Periodicity: Technician(Signal): Fortnightly Sectional SSE/JE(Signal): Monthly SSE (Signal)/Incharge :
                Quarterly
                </span>

                <span class="heading_hindi">
             आवधिकता: तकनीशियन (सिग्नल): पाक्षिक,अनुभागीय सीसेई/जेई (सिग्नल): मासिक (ए, बी और सी मार्गों पर), त्रैमासिक (डी और ई मार्ग पर), सीसेई (सिग्नल)/प्रभारी: अर्धवार्षिक



                </span>

            </div>
            <div class="modal-body table-responsive">

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
                    <tbody id="t1_body">

                    </tbody>
                    <tbody>
                        <tr>
                            <th>7</th>
                            <td>
                                Measure and record Specific gravity (1180-1220) & voltage (1.8 to 2.2 V) of each & every cell by switching off charger, charger voltage and charging current, feed end/relay end voltage and currents, regulating resistance value & voltage across it, voltage across Choke and ensure all are in the acceptable ranges. Take suitable remedial action for values beyond acceptable range.
                            </td>
                            <td>
                                <select class="custom-select T1Class" id="t1_7">
                                    <option value="">Select Action</option>
                                    <option value="Done">Done</option>
                                    <option value="Not Done">Not Done</option>
                                </select>
                            </td>
                        </tr>
                       <tr>
                        <td colspan="3">
                            <table class="table table-bordered">
                                <thead class="text-center table-dark">
                                    <!-- <tr>
                                    <td rowspan="3">Date</td> <td colspan="6">SPG and Volt</td> <td rowspan="3"> Charging V</td><td rowspan="3">Current V</td><td rowspan="3"> --- </td><td rowspan="3">  िफड इंड पर वोल्टेज</td><td rowspan="3">Near Block</td> <td rowspan="3">Wire status</td> <td rowspan="3">Remark</td>
                            
                                </tr> -->
                                <tr>
                                    <td rowspan="3">Date</td> <td colspan="6">SPG and Volt</td> <td rowspan="3"> Charging V</td><td rowspan="3">Current V</td>
                                                                
                                </tr>
                                <tr>
                                    <td colspan="2">Sale 1</td> <td colspan="2">Sale 2</td> <td colspan="2">Sale 3</td> 
                            
                                </tr>
                                <tr>
                                    <td>SPG</td> <td >V</td> <td>SPG</td><td>V</td> <td>SPG</td><td >V</td> 
                            
                                </tr>
                                </thead>

                                <!-- <tbody>
                                     <tr>
                                    <td ><input id="date1" class="form-control" type="date"></td> 
                                    <td><input id="sale1_spg" class="form-control width70" type="text"></td>
                                     <td ><input id="sale1_v" class="form-control width70"  type="text"></td>
                                      <td><input id="sale2_spg" class="form-control width70"  type="text"></td>
                                      <td><input id="sale2_v" class="form-control width70"  type="text"></td>
                                       <td><input id="sale3_spg" class="form-control width70"  type="text"></td>
                                    <td ><input id="sale3_v" class="form-control width70"  type="text"></td> 
                                 <td ><input id="charging_v" class="form-control width70"  type="text"></td> 
                                 <td ><input id="charging_current" class="form-control width70"  type="text"></td>
                                 <td ></td>
                                 <td ><input id="feedVoltage" class="form-control width70"  type="text"></td> 
                                 <td ><input id="nearBlock" class="form-control width70"  type="text"></td>
                                   <td ><input id="wireStatus" class="form-control width70"  type="text"></td> 
                                   <td ><input id="remark1" class="form-control width70"  type="text"></td> 
                                    
                            
                                </tr>
                                </tbody> -->

                                <tbody>
                                     <tr>
                                    <td ><input id="date1" class="form-control" type="date"></td> 
                                    <td><input id="sale1_spg" class="form-control width70" type="text"></td>
                                     <td ><input id="sale1_v" class="form-control"  type="text"></td>
                                      <td><input id="sale2_spg" class="form-control width70"  type="text"></td>
                                      <td><input id="sale2_v" class="form-control width70"  type="text"></td>
                                       <td><input id="sale3_spg" class="form-control width70"  type="text"></td>
                                    <td ><input id="sale3_v" class="form-control width70"  type="text"></td> 
                                 <td ><input id="charging_v" class="form-control width70"  type="text"></td> 
                                 <td ><input id="charging_current" class="form-control width70"  type="text"></td>                                                  
                                    
                            
                                </tr>
                                </tbody>
                                <thead class="table-dark">
                                <tr>
                                <td> 
                                     िफड इंड पर वोल्टेज
                                    </td>
                                    <td>Near Block</td>
                                     <td>Wire status</td>
                                      <td>Remark</td>
                                </tr>
                                </thead>

                                <tbody>
                                <tr>
                                <td >
                                    <input id="feedVoltage" class="form-control"  type="text">
                                </td> 
                                 <td >
                                    <input id="nearBlock" class="form-control width70"  type="text">
                                </td>
                                   <td >
                                    <input id="wireStatus" class="form-control"  type="text">
                                    </td> 
                                   <td >
                                    <input id="remark1" class="form-control width70"  type="text">
                                </td> 
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
                                        <td><input id="date2" class="form-control" type="date"></td>
                                    <td><input id="railVoltage" class="form-control width70" type="text"></td>
                                    <td><input id="vt_value" class="form-control" type="text"></td>
                                    <td><input id="wireStatus2" class="form-control width70" type="text"></td>
                                    <td><input id="magneticPart" class="form-control width70" type="text"></td>
                                    <td></td>
                                    <td><input id="railFlag2" class="form-control width70" type="text"></td>
                                    <td><input id="jumberwireStatus" class="form-control width70" type="text"></td>
                                    <td><input id="remark2" class="form-control width70" type="text"></td>
                                    </tr>

                                </tbody>
                            </table>



                        </td>
                       </tr>
                        <tr>
                            <th>8</th>
                            <td>
                               Checking of TF charger failure alarms.
                            </td>
                            <td>
                                <select class="custom-select T1Class" id="t1_8">
                                    <option value="">Select Action</option>
                                    <option value="Done">Done</option>
                                    <option value="Not Done">Not Done</option>
                                </select>
                            </td>
                        </tr>
                    </tbody>

                    
                </table>

            
               
            </div>

            <div class="card-footer d-flex justify-content-between">
                <div id="t1Form_status"></div>

                <div>

                    <button type='reset' class="btn btn-sm btn-danger">Reset</button>
                    <button type='button' id="t1FormBtn" class="btn btn-sm btn-success">Final Submit</button>
                </div>
            </div>

        </div>
    </div>
</form>
</div>

<!-- Modal T2 -->
<div class="modal fade" id="componentForm_T2" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="componentFormLabelT2" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <form>
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="componentFormLabelT2">
                    <span class="badge badge-success h3">
                        Schedule Code: T2
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
                    <tbody id="t2_body">

                    </tbody>
                </table>
            </div>

            <div class="card-footer d-flex justify-content-between">
                <div id="t2Form_status"></div>
                <div>

                    <button type='reset' class="btn btn-sm btn-danger">Reset</button>
                    <button type='button' id="t2FormBtn" class="btn btn-sm btn-success">Final Submit</button>
                </div>
            </div>

        </div>
        </form>
    </div>
</div>


<!-- Modal T3 -->
<div class="modal fade" id="componentForm_T3" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="componentFormLabelT3" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <form>
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="componentFormLabelT3">
                    <span class="badge badge-success h3">
                        Schedule Code: T3
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
                    <tbody id="t3_body">

                    </tbody>
                </table>
            </div>

            <div class="card-footer d-flex justify-content-between">
                <div id="t3Form_status"></div>

                <div>

                    <button type='reset' class="btn btn-sm btn-danger">Reset</button>
                    <button type='button' id="t3FormBtn" class="btn btn-sm btn-success">Final Submit</button>
                </div>
            </div>

        </div>
        </form>
    </div>
</div>

<!-- Modal T4 -->
<div class="modal fade" id="componentForm_T4" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="componentFormLabelT4" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <form>
        <div class="modal-content">
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

            <div class="card-footer d-flex justify-content-between">
                <div id="t4Form_status"></div>

                <div>

                    <button type='reset' class="btn btn-sm btn-danger">Reset</button>
                    <button type='button' id="t4FormBtn" class="btn btn-sm btn-success">Final Submit</button>
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
        <form>
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="componentFormLabelT5">
                    <span class="badge badge-success h3">
                        Schedule Code: T5
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
                    <tbody id="t5_body">

                    </tbody>
                </table>
            </div>

            <div class="card-footer d-flex justify-content-between">
                <div id="t5Form_status"></div>
                <div>

                    <button type='reset' class="btn btn-sm btn-danger">Reset</button>
                    <button type='button' id="t5FormBtn" class="btn btn-sm btn-success">Final Submit</button>
                </div>
            </div>

        </div>
        </form>
    </div>
</div>

<!-- Modal CS1 -->
<div class="modal fade" id="componentForm_CS1" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="componentFormLabelCS1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width:100%;max-width:100%">
        <form>
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="componentFormLabelCS1">
                    <span class="badge badge-success h3">
                       <span class="heading_english">
                        Schedule Code: CS1
                    </span>
                     <span class="heading_hindi">
                         Schedule Code: CS1
                     </span>
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
               
               Periodicity: Technician(Signal): Monthly, Sectional SSE/JE(Signal): Quarterly, SSE(Signal)/In charge: Half yearly
                </span>

                <span class="heading_hindi">
        आवधिकता: तकनीशियन (सिग्नल): मासिक, अनुभागीय सीसेई /जेई (सिग्नल): त्रैमासिक, सीसेई (सिग्नल)/प्रभारी: अर्धवार्षिक



                </span>

            </div>
            <div class="modal-body table-responsive">

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
                    <tbody id="cs1_body">
                    <tr>
                            <th scope="row">1</th>
                            
                            <td>
                                
                               <span class="heading_english">  
                            Cleaning of LED lighting unit & current regulator/integrated LED, all terminations, housing, signal units & around signal post.
                        </span>

                         <span class="heading_hindi">
                            LED लाइटिंग यूनिट और करंट रेगुलेटर/एकीकृत LED, सभी टर्मिनल, हाउसिंग, सिग्नल इकाइयों और सिग्नल पोस्ट के आसपास की सफाई।
                         </span>

                        </td>
                       

                            <td style="vertical-align:middle;width:16%">
                                <select class="custom-select CS1Class" id="cs1_1">
                                    <option value="">Select Action</option>
                                   <option class="heading_english" value="Done">Done</option>
                                                    <option class="heading_english" value="Not Done">Not Done</option>
                                                   
                                            
                                                    <option  class="heading_hindi" value="चेक किया गया">चेक किया गया</option>
                                                    <option  class="heading_hindi" value="चेक नहीं किया गया">चेक नहीं किया गया</option>
                                </select>
                            </td>
                        </tr>

                    

                        <tr>
                            <th scope="row" rowspan="6">2</th>
                                <td>
                                     <span class="heading_english"> 
                                Measurement of input voltage & current with clamp type ammeter at input terminals of current regulator/LED signal for all signal aspects and V/I reading shall be within specified range as below:
                            </span>
                            <span class="heading_hindi">
                                सभी सिग्नल पहलुओं और वोल्टेज/करेंट रीडिंग के लिए करंट रेगुलेटर/LED सिग्नल के इनपुट टर्मिनलों पर क्लैंप टाइप एमीटर के साथ इनपुट वोल्टेज और करंट का मापन नीचे दी गई निर्दिष्ट सीमा के भीतर होगा:
                            </span>
                            </td>
                                <td rowspan="6" style="vertical-align:middle;width:16%">
                                    <select class="custom-select CS1Class" id="cs1_2">
                                       


                                           <option value="">Select Action</option>
                                                   
                                                    <option class="heading_english" value="Done">Done</option>
                                                    <option class="heading_english" value="Not Done">Not Done</option>
                                                   
                                            
                                                    <option  class="heading_hindi" value="चेक किया गया">चेक किया गया</option>
                                                    <option  class="heading_hindi" value="चेक नहीं किया गया">चेक नहीं किया गया</option>
                                    </select>
                                </td>

                            </tr>
                            <tr>
                            <td>(a) <span class="heading_english">  Main signal Voltage: 82.5 to137.5 V and Current: 112 to 154 mA </span>
`                                 <span class="heading_hindi">मुख्य सिग्नल वोल्टेज: 82.5 से 137.5 V और करंट: 112 से 154 mA ।</span>
                            </td>

                            </tr>

                            <tr>
                            <td>(b)  <span class="heading_english"> Calling on/A/AG Marker Voltage: 88 to 132 V and current: 120 to 165 mA. </span><span class="heading_hindi">कॉलिंग ऑन/ए/एजी मार्कर वोल्टेज: 88 से 132 V और करंट: 120 से 165 mA ।</span></td>
                            </tr>
                            <tr>
                            <td>(c) <span class="heading_english">  Route signal Voltage: 88 to 132 V and Current: 23.75 to 26.25 mA per LED.</span> <span class="heading_hindi">रूट सिग्नल वोल्टेज: 88 से 132 V और करंट: 23.75 से 26.25 mA प्रति LED ।</span></td>
                            </tr>
                            <tr>
                            <td>(d)  <span class="heading_english"> Shunt signal Voltage: 88 to 132 V and Current: 52.25 to 57.75 mA per LED. </span><span class="heading_hindi">शंट सिग्नल वोल्टेज: 88 से 132 V और करंट: 52.25 से 57.75 mA प्रति LED ।</span></td>
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
                                    <td >HG</td>
                                     <td>DG</td>
                                     <td>HHG</td>
                                      <td>ROUTE</td>
                                      <td >C-ON</td> 
                                      <td>Shunt</td>                            
                                </tr>
                                </thead>

                                <tbody>
                                     <tr>
                                    <td ><input id="date" class="form-control" type="date"></td> 
                                    <td><input id="rg" class="form-control" type="text"></td>
                                     <td ><input id="hg" class="form-control" type="text"></td>
                                      <td><input id="dg" class="form-control" type="text"></td>
                                      <td><input id="hhg" class="form-control" type="text"></td>
                                       <td><input id="route" class="form-control" type="text"></td>
                                    <td ><input id="c_on" class="form-control" type="text"></td> 
                                    <td ><input id="shout" class="form-control" type="text"></td> 
                                 <td ><input id="nut_bolt" class="form-control" type="text"></td> 
                                 <td ><input id="dome_clean" class="form-control" type="text"></td>
                               
                                 <td ><input id="cover" class="form-control" type="text"></td> 
                                 <td ><input id="remark" class="form-control" type="text"></td>
                                    
                            
                                </tr>
                                </tbody>
                             
                            </table>

                            </td>
                        </tr>

                        <tr>
                            <th scope="row">3</th>
                            <td><span class="heading_english">
                                Checking of tightness of all adjusting screws of LED signal unit as well as Current regulator/integrated LED.</span>

                                <span class="heading_hindi">LED सिग्नल यूनिट के साथ-साथ करंट रेगुलेटर/इंटीग्रेटेड LED के सभी एडजस्टिंग स्क्रू की जकड़न की जाँच करना।</span>

                            </td>
                            <td style="vertical-align:middle;width:16%">
                                <select class="custom-select CS1Class" id="cs1_3">
                                      <option value="">Select Action</option>
                                                   
                                                    <option class="heading_english" value="OK">OK</option>
                                                    <option class="heading_english" value="Not OK">Not OK</option>
                                                   
                                            
                                                    <option  class="heading_hindi" value="ठीक है">ठीक है</option>
                                                    <option  class="heading_hindi" value="ठीक नहीं है">ठीक नहीं है</option>
                                </select>
                            </td>
                        </tr>
                        
                        <tr>
                            <th scope="row">4</th>
                            <td><span class="heading_english">
                                Ensure condition of signal post is satisfactory.
                                    </span>

                                    <span class="heading_hindi">सुनिश्चित करें कि सिग्नल पोस्ट की स्थिति संतोषजनक है।</span>
                            </td>
                            <td style="vertical-align:middle;width:16%">
                                <select class="custom-select CS1Class" id="cs1_4">
                                     <option value="">Select Action</option>
                                                   
                                                    <option class="heading_english" value="OK">OK</option>
                                                    <option class="heading_english" value="Not OK">Not OK</option>
                                                   
                                            
                                                    <option  class="heading_hindi" value="ठीक है">ठीक है</option>
                                                    <option  class="heading_hindi" value="ठीक नहीं है">ठीक नहीं है</option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row">5</th>
                            <td>
                                 <span class="heading_english">  
                                Check condition of Signal foundation, ladder & ensure proper alignment of signal post.</span>
                                 <span class="heading_hindi">सिग्नल फाउंडेशन, सीढ़ी की स्थिति की जांच करें और सिग्नल पोस्ट का उचित संरेखण सुनिश्चित करें।</span>
                            </td>
                            <td style="vertical-align:middle;width:16%">
                                <select class="custom-select CS1Class" id="cs1_5">
                                     <option value="">Select Action</option>
                                                   
                                                    <option class="heading_english" value="OK">OK</option>
                                                    <option class="heading_english" value="Not OK">Not OK</option>
                                                   
                                            
                                                    <option  class="heading_hindi" value="ठीक है">ठीक है</option>
                                                    <option  class="heading_hindi" value="ठीक नहीं है">ठीक नहीं है</option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row">6</th>
                            <td> <span class="heading_english">  
                                Ensure Signal unit condition, closing of door & locking arrangements are satisfactory.</span>
                        <span class="heading_hindi">सुनिश्चित करें कि सिग्नल यूनिट की स्थिति, दरवाजा बंद करने और लॉक करने की व्यवस्था संतोषजनक है।</span>
                            </td>
                            <td style="vertical-align:middle;width:16%">
                                <select class="custom-select CS1Class" id="cs1_6">
                                      <option value="">Select Action</option>
                                                   
                                                    <option class="heading_english" value="OK">OK</option>
                                                    <option class="heading_english" value="Not OK">Not OK</option>
                                                   
                                            
                                                    <option  class="heading_hindi" value="ठीक है">ठीक है</option>
                                                    <option  class="heading_hindi" value="ठीक नहीं है">ठीक नहीं है</option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row">7</th>
                            <td> <span class="heading_english"> 
                                Ensure Signal post & CLS unit should be earthed & screen earthing is effective.</span>
                                <span class="heading_hindi">सुनिश्चित करें कि सिग्नल पोस्ट और सिग्नल यूनिट को अर्थ किया जाना चाहिए और स्क्रीन अर्थिंग प्रभावी है।</span>
                            </td>
                            <td style="vertical-align:middle;width:16%">
                                <select class="custom-select CS1Class" id="cs1_7">
                                     <option value="">Select Action</option>
                                                   
                                                    <option class="heading_english" value="OK">OK</option>
                                                    <option class="heading_english" value="Not OK">Not OK</option>
                                                   
                                            
                                                    <option  class="heading_hindi" value="ठीक है">ठीक है</option>
                                                    <option  class="heading_hindi" value="ठीक नहीं है">ठीक नहीं है</option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row">8</th>
                            <td> <span class="heading_english"> 
                                Complete signal unit should be cleaned for removing oxidation, rusting & tightened properly.</span>
                                <span class="heading_hindi">ऑक्सीकरण, जंग हटाने और ठीक से कसने के लिए पूरी सिग्नल यूनिट को साफ किया जाना चाहिए।</span>
                            </td>
                            <td style="vertical-align:middle;width:16%">
                                <select class="custom-select CS1Class" id="cs1_8">
                                    <option value="">Select Action</option>
                                   <option class="heading_english" value="Done">Done</option>
                                                    <option class="heading_english" value="Not Done">Not Done</option>
                                                   
                                            
                                                    <option  class="heading_hindi" value="चेक किया गया">चेक किया गया</option>
                                                    <option  class="heading_hindi" value="चेक नहीं किया गया">चेक नहीं किया गया</option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row">9</th>
                            <td> <span class="heading_english"> 
                                Ensure that there is no opening/access for rain water/rodent entry.</span>
                                <span class="heading_hindi">सुनिश्चित करें कि वर्षा जल/कृंतक प्रवेश के लिए कोई खुला/पहुँच नहीं है।</span>

                            </td>
                            <td style="vertical-align:middle;width:16%">
                                <select class="custom-select CS1Class" id="cs1_9">
                                     <option value="">Select Action</option>
                                                   
                                                    <option class="heading_english" value="OK">OK</option>
                                                    <option class="heading_english" value="Not OK">Not OK</option>
                                                   
                                            
                                                    <option  class="heading_hindi" value="ठीक है">ठीक है</option>
                                                    <option  class="heading_hindi" value="ठीक नहीं है">ठीक नहीं है</option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row">10</th>
                            <td> <span class="heading_english"> 
                                Ensure the cable terminations in location box should be cleaned for removing oxidation, rusting & tightened properly.</span>
                                <span class="heading_hindi">सुनिश्चित करें कि ऑक्सीकरण, जंग हटाने और ठीक से कसने के लिए लोकेशन बॉक्स में केबल टर्मिनेशन को साफ किया जाना चाहिए।</span>

                            </td>
                            <td style="vertical-align:middle;width:16%">
                                <select class="custom-select CS1Class" id="cs1_10">
                                    <option value="">Select Action</option>
                                                   
                                                    <option class="heading_english" value="OK">OK</option>
                                                    <option class="heading_english" value="Not OK">Not OK</option>
                                                   
                                            
                                                    <option  class="heading_hindi" value="ठीक है">ठीक है</option>
                                                    <option  class="heading_hindi" value="ठीक नहीं है">ठीक नहीं है</option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row">11</th>
                            <td><span class="heading_english">
                                Visual check of insulations of cables, PVC wires, proper termination without criss cross, condition of rubber gasket arrangement.</span>

                                <span class="heading_hindi">केबलों, पीवीसी तारों के इन्सुलेशन की दृश्य जांच, क्रिस क्रॉस के बिना उचित समाप्ति, रबर गैसकेट व्यवस्था की स्थिति।</span>

                            </td>
                            <td style="vertical-align:middle;width:16%">
                                <select class="custom-select CS1Class" id="cs1_11">
                                     <option value="">Select Action</option>
                                                   
                                                    <option class="heading_english" value="OK">OK</option>
                                                    <option class="heading_english" value="Not OK">Not OK</option>
                                                   
                                            
                                                    <option  class="heading_hindi" value="ठीक है">ठीक है</option>
                                                    <option  class="heading_hindi" value="ठीक नहीं है">ठीक नहीं है</option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <th rowspan="3" scope="row">12</th>
                            <td><span class="heading_english">
                                (a) Check that where signals are Infringing with SOD, their Implantation distance is marked on Red colour on white back ground.</span>
                        <span class="heading_hindi">जांचें कि जहां सिग्नल SOD का उल्लंघन कर रहे हैं, उनकी इम्प्लांटेशन दूरी सफेद पृष्ठभूमि पर लाल रंग में अंकित है।</span>

                            </td>
                            <td style="vertical-align:middle;width:16%">
                                <select class="custom-select CS1Class" id="cs1_12a">
                                     <option value="">Select Action</option>
                                                   
                                                    <option class="heading_english" value="OK">OK</option>
                                                    <option class="heading_english" value="Not OK">Not OK</option>
                                                   
                                            
                                                    <option  class="heading_hindi" value="ठीक है">ठीक है</option>
                                                    <option  class="heading_hindi" value="ठीक नहीं है">ठीक नहीं है</option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td> (b)  <span class="heading_english">
                                Blanking off to be done as given in chapter 19 of SEM.</span>
                                <span class="heading_hindi">SEM के अध्याय 19 में दिए गए अनुसार Blanking Off करना होगा।</span>
                            </td>
                            <td style="vertical-align:middle;width:16%">
                                <select class="custom-select CS1Class" id="cs1_12b">
                                     <option value="">Select Action</option>
                                                   
                                                    <option class="heading_english" value="OK">OK</option>
                                                    <option class="heading_english" value="Not OK">Not OK</option>
                                                   
                                            
                                                    <option  class="heading_hindi" value="ठीक है">ठीक है</option>
                                                    <option  class="heading_hindi" value="ठीक नहीं है">ठीक नहीं है</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td> (c) <span class="heading_english">
                                 Right hand signals to be provided with an arrow mark pointing towards the relevant track.</span>
                                <span class="heading_hindi">दाहिने हाथ के सिग्नल को संबंधित ट्रैक की ओर इंगित करने वाले तीर के निशान के साथ प्रदान किया जाना चाहिए।</span>
                            </td>
                            <td style="vertical-align:middle;width:16%">
                                <select class="custom-select CS1Class" id="cs1_12c">
                                    <option value="">Select Action</option>
                                                   
                                                    <option class="heading_english" value="OK">OK</option>
                                                    <option class="heading_english" value="Not OK">Not OK</option>
                                                   
                                            
                                                    <option  class="heading_hindi" value="ठीक है">ठीक है</option>
                                                    <option  class="heading_hindi" value="ठीक नहीं है">ठीक नहीं है</option>
                                </select>
                            </td>
                        </tr>

                    </tbody>
                  

                    
                </table>

            </div>

            <div class="card-footer d-flex justify-content-between">
                <div id="cs1Form_status"></div>
                <div>

                    <button type='reset' class="btn btn-sm btn-danger">Reset</button>
                    <button type='button' id="cs1FormBtn" class="btn btn-sm btn-success">Final Submit</button>
                </div>
            </div>

        </div>
        </form>
    </div>
</div>

<!-- Modal CS2 -->
<div class="modal fade" id="componentForm_CS2" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="componentFormLabelCS2" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <form>
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="componentFormLabelCS2">
                    <span class="badge badge-success h3">
                        <span class="heading_english">
                        Schedule Code: CS2
                    </span>
                     <span class="heading_hindi">
                         Schedule Code: CS2
                     </span>

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
                    <tbody id="cs2_body">

                    </tbody>
                </table>
            </div>

            <div class="card-footer d-flex justify-content-between">
                <div id="cs2Form_status"></div>
                <div>

                    <button type='reset' class="btn btn-sm btn-danger">Reset</button>
                    <button type='button' id="cs2FormBtn" class="btn btn-sm btn-success">Final Submit</button>
                </div>
            </div>

        </div>
        </form>
    </div>
</div>

<!-- Modal DL1 -->
<div class="modal fade" id="componentForm_DL1" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="componentFormLabelDL1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <form>
        <div class="modal-content">
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
                    <!--<span class="badge badge-danger h3 displaySubcompoName"></span>-->

                    <!-- <span id="modalSubCompoName"></span>
                    <span class="badge badge-danger h3" id="modalSubCompoType"></span> -->
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
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
                    <tbody id="dl1_body">

                    </tbody>
                </table>
            </div>

            <div class="card-footer d-flex justify-content-between">
                <div id="dl1Form_status"></div>
                <div>

                    <button type='reset' class="btn btn-sm btn-danger">Reset</button>
                    <button type='button' id="dl1FormBtn" class="btn btn-sm btn-success">Final Submit</button>
                </div>
            </div>

        </div>
        </form>
    </div>
</div>

<!-- Modal DL2 -->
<div class="modal fade" id="componentForm_DL2" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="componentFormLabelDL2" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <form>
        <div class="modal-content">
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
                    <!--<span class="badge badge-danger h3 displaySubcompoName"></span>-->

                    <!-- <span id="modalSubCompoName"></span>
                    <span class="badge badge-danger h3" id="modalSubCompoType"></span> -->
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
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
                    <tbody id="dl2_body">

                    </tbody>
                </table>
            </div>

            <div class="card-footer d-flex justify-content-between">
                <div id="dl2Form_status"></div>

                <div>
                    <button type='reset' class="btn btn-sm btn-danger">Reset</button>
                    <button type='button' id="dl2FormBtn" class="btn btn-sm btn-success">Final Submit</button>

                </div>
            </div>

        </div>
        </form>
    </div>
</div>

<!-- Modal DL3 -->
<div class="modal fade" id="componentForm_DL3" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="componentFormLabelDL3" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <form>
        <div class="modal-content">
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
                    <!--<span class="badge badge-danger h3 displaySubcompoName"></span>-->

                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
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
                    <tbody id="dl3_body">

                    </tbody>
                </table>
            </div>

            <div class="card-footer d-flex justify-content-between">
                <div id="dl3Form_status"></div>

                <div>

                    <button type='reset' class="btn btn-sm btn-danger">Reset</button>
                    <button type='button' id="dl3FormBtn" class="btn btn-sm btn-success">Final Submit</button>
                </div>
            </div>

        </div>
        </form>
    </div>
</div>

<!-- Modal DL4 -->
<div class="modal fade" id="componentForm_DL4" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="componentFormLabelDL4" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <form>
        <div class="modal-content">
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
                    <!--<span class="badge badge-danger h3 displaySubcompoName"></span>-->

                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
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
                    <tbody id="dl4_body">

                    </tbody>
                </table>
            </div>

            <div class="card-footer d-flex justify-content-between">
                <div id="dl4Form_status"></div>

                <div>
                    <button type='reset' class="btn btn-sm btn-danger">Reset</button>
                    <button type='button' id="dl4FormBtn" class="btn btn-sm btn-success">Final Submit</button>

                </div>
            </div>

        </div>
        </form>
    </div>
</div>

<!-- Modal MLB1 -->
<div class="modal fade" id="componentForm_MLB1" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="componentFormLabelMLB1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <form>
        <div class="modal-content">
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
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
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

            <div class="card-footer d-flex justify-content-between">
                <div id="mlb1Form_status"></div>

                <div>
                    <button type='reset' class="btn btn-sm btn-danger">Reset</button>
                    <button type='button' id="mlb1FormBtn" class="btn btn-sm btn-success">Final Submit</button>

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
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
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

            <div class="card-footer d-flex justify-content-between">
                <div id="mlb2Form_status"></div>

                <div>
                    <button type='reset' class="btn btn-sm btn-danger">Reset</button>
                    <button type='button' id="mlb2FormBtn" class="btn btn-sm btn-success">Final Submit</button>

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
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
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
                    <tbody id="mlb3_body">

                    </tbody>
                </table>
            </div>

            <div class="card-footer d-flex justify-content-between">
                <div id="mlb3Form_status"></div>

                <div>
                    <button type='reset' class="btn btn-sm btn-danger">Reset</button>
                    <button type='button' id="mlb3FormBtn" class="btn btn-sm btn-success">Final Submit</button>

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
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
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

            <div class="card-footer d-flex justify-content-between">
                <div id="slb1Form_status"></div>

                <div>
                    <button type='reset' class="btn btn-sm btn-danger">Reset</button>
                    <button type='button' id="slb1FormBtn" class="btn btn-sm btn-success">Final Submit</button>

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
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
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

            <div class="card-footer d-flex justify-content-between">
                <div id="slb2Form_status"></div>

                <div>
                    <button type='reset' class="btn btn-sm btn-danger">Reset</button>
                    <button type='button' id="slb2FormBtn" class="btn btn-sm btn-success">Final Submit</button>

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
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
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

            <div class="card-footer d-flex justify-content-between">
                <div id="elb1Form_status"></div>

                <div>
                    <button type='reset' class="btn btn-sm btn-danger">Reset</button>
                    <button type='button' id="elb1FormBtn" class="btn btn-sm btn-success">Final Submit</button>

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
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
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

            <div class="card-footer d-flex justify-content-between">
                <div id="elb2Form_status"></div>

                <div>
                    <button type='reset' class="btn btn-sm btn-danger">Reset</button>
                    <button type='button' id="elb2FormBtn" class="btn btn-sm btn-success">Final Submit</button>

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
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
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

            <div class="card-footer d-flex justify-content-between">
                <div id="elb3Form_status"></div>

                <div>
                    <button type='reset' class="btn btn-sm btn-danger">Reset</button>
                    <button type='button' id="elb3FormBtn" class="btn btn-sm btn-success">Final Submit</button>

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
                    <span class="badge badge-danger h3 displaySubcompoName"></span>

                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
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

            <div class="card-footer d-flex justify-content-between">
                <div id="elb4Form_status"></div>

                <div>
                    <button type='reset' class="btn btn-sm btn-danger">Reset</button>
                    <button type='button' id="elb4FormBtn" class="btn btn-sm btn-success">Final Submit</button>

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
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="m-2 text-center alert alert-danger" style="font-size:13px">
        Periodicity: SSE (Signal)/Incharge : Yearly
 <span class="heading_english">
               आवधिकता: सीसेई (सिग्नल)/प्रभारी: वार्षिक
                     

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

            <div class="card-footer d-flex justify-content-between">
                <div id="elb5Form_status"></div>

                <div>
                    <button type='reset' class="btn btn-sm btn-danger">Reset</button>
                    <button type='button' id="elb5FormBtn" class="btn btn-sm btn-success">Final Submit</button>

                </div>
            </div>

        </div>
        </form>
    </div>
</div>

<!-- for DAC -->
<div class="modal fade" id="componentForm_DAC1" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="componentFormLabelELB1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <form>
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="componentFormLabelDAC1">
                    <span class="badge badge-success h3">
                  Maintenance Schedule of Digital Axle Counter DAC1



                    </span>
                    <span class="badge badge-danger h3 displaySubcompoName"></span>

                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="m-2 text-center alert alert-danger" style="font-size:13px">
        Periodicity: Technician (Signal): Monthly
Sectional SSE/JE (Signal): Quarterly,
SSE (Signal) Incharge: Half Yearly



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

            <div class="card-footer d-flex justify-content-between">
                <div id="dac1Form_status"></div>

                <div>
                    <button type='reset' class="btn btn-sm btn-danger">Reset</button>
                    <button type='button' id="dac1FormBtn" class="btn btn-sm btn-success">Final Submit</button>

                </div>
            </div>

        </div>
        </form>
    </div>
</div>


<!-- Modal DAC2 -->
<div class="modal fade" id="componentForm_DAC2" data-backdrop="static" data-keyboard="false" tabindex="-1"  aria-labelledby="componentFormLabelDAC2" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <form>
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="componentFormLabelDAC2">
                    <span class="badge badge-success h3">
                 Maintenance Schedule of Digital Axle Counter DAC2




                    </span>
                    <span class="badge badge-danger h3 displaySubcompoName"></span>

                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="m-2 text-center alert alert-danger" style="font-size:13px">
       Periodicity: Sectional SSE/JE(Signal): Quarterly (to be done by ESM in presence of JE/SSE)
SSE(Signal)/Incharge: Half Yearly




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

            <div class="card-footer d-flex justify-content-between">
                <div id="dac2Form_status"></div>

                <div>
                    <button type='reset' class="btn btn-sm btn-danger">Reset</button>
                    <button type='button' id="dac2FormBtn" class="btn btn-sm btn-success">Final Submit</button>

                </div>
            </div>

        </div>
        </form>
    </div>
</div>


<!-- Modal DAC3 -->
<div class="modal fade" id="componentForm_DAC3" data-backdrop="static" data-keyboard="false" tabindex="-1"  aria-labelledby="componentFormLabelELB4" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <form>
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="componentFormLabelDAC1">
                    <span class="badge badge-success h3">
                  Maintenance Schedule of Digital Axle Counter DAC3




                    </span>
                    <span class="badge badge-danger h3 displaySubcompoName"></span>

                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="m-2 text-center alert alert-danger" style="font-size:13px">
         Periodicity: Sectional SSE/JE(Signal): Yearly



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

            <div class="card-footer d-flex justify-content-between">
                <div id="dac3Form_status"></div>

                <div>
                    <button type='reset' class="btn btn-sm btn-danger">Reset</button>
                    <button type='button' id="dac3FormBtn" class="btn btn-sm btn-success">Final Submit</button>

                </div>
            </div>

        </div>
        </form>
    </div>
</div>

<script>

var g_st_compList = [];
var colorArr = ['btn-info', 'btn-success', 'btn-warning', 'btn-primary', 'btn-secondary', 'btn-dark', 'btn-danger'];

$(document).ready(function() {
    $("#modalFormComponent").submit(function(e) {
        e.preventDefault();
        let name = $("#name").val().trim();
        let email = $("#email").val().trim();

        if (name == '' || name == null || name == undefined) {
            $("#name").addClass("is-invalid");
            return;
        } else {
            $("#name").removeClass("is-invalid");
        }

        if (email == '' || email == null || email == undefined) {
            $("#email").addClass("is-invalid");
            return;
        } else {
            $("#email").removeClass("is-invalid");
        }

        $.ajax({
            type: "POST",
            url: "query/action.php",
            data: {
                "action": "componentModalForm",
                "name": name,
                "email": email
            },
            beforeSend: function() {

            },
            success: function(respo) {
                let response = JSON.parse(respo);


                if (response['status']) {
                    $("#modalFormComponent")[0].reset();
                    $("#modalRespo").html(response['msg']).css("color", "green");

                } else {
                    $("#modalRespo").html(response['msg']).css("color", "red");

                }

            },
            complete: function() {
                setTimeout(() => {

                    $("#modalRespo").html("");

                }, 5000)
            }
        })



    });
});



function createSubComponent(val) {
    document.getElementById("subComponentDisplay").innerHTML = "";

    let componentName = val.target.innerHTML;
    let btnColor = val.target.classList[(val.target.classList).length - 1].split("-")[1]
    let stationComName = val.target.id.split("_")[1]

    // alert()
    let componetData = g_st_compList.filter(x => x['station_component'] == componentName);
    console.log("vishnu componetData ", componetData);

    if (componetData.length == 0) {
        alert("no sub component added yet");
        return;
    }

    //sub component == component new check

    if(componetData[0]['sub_component'].length == 0 || componetData[0]['sub_component'] == ''){

    let elv1 = document.getElementById("subComponentDisplay");
    let divAlert1 = document.createElement("div");
    divAlert1.className = "alert alert-warning text-center h6";
    divAlert1.innerHTML = "Form List";

    let divWrap1 = document.createElement("div");
    divWrap1.className = "d-flex flex-wrap my-2";
    let btn1 = `
    <button class="btn btn-${btnColor} mx-2" type="button" onclick="get_DL_formData('DL1','NA','${stationComName}')">DL 1</button>
    <button class="btn btn-${btnColor} mx-2" type="button" onclick="get_DL_formData('DL2','NA','${stationComName}')">DL 2</button>
    <button class="btn btn-${btnColor} mx-2" type="button" onclick="get_DL_formData('DL3','NA','${stationComName}')">DL 3</button>
    <button class="btn btn-${btnColor} mx-2" type="button" onclick="get_DL_formData('DL4','NA','${stationComName}')">DL 4</button>
    `;


    divWrap1.innerHTML = btn1



    elv1.appendChild(divAlert1)
    elv1.appendChild(divWrap1)

    }else{

    
    let subComponentData = componetData[0]['sub_component'].split(',');


    let divAlert = document.createElement("div");
    divAlert.className = "alert alert-warning text-center h6";
    divAlert.innerHTML = "Station Sub Component List";

    let divWrap = document.createElement("div");
    divWrap.className = "d-flex flex-wrap my-2";

    let btn = '';

    subComponentData.forEach((value, index) => {

        btn += `<div class="dropdown m-2" id='subCompo_${value}'>
  <button class="btn btn-${btnColor} dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
    ${value}
  </button>
  <div class="dropdown-menu bg-light">`;
  
  if(componentName == "POINT"){
    btn +=`
    <a class="dropdown-item" onclick="get_EP_formData('EP1','${value}','${stationComName}')">EP 1</a>
    <a class="dropdown-item" onclick="get_EP_formData('EP2','${value}','${stationComName}')">EP 2</a>
    <a class="dropdown-item" onclick="get_EP_formData('EP3','${value}','${stationComName}')">EP 3</a>
    <a class="dropdown-item" onclick="get_EP_formData('EP4','${value}','${stationComName}')">EP 4</a>
    <a class="dropdown-item" onclick="get_EP_formData('EP5','${value}','${stationComName}')">EP 5</a>
    `;
  }else if(componentName == "TRACK"){
    btn +=`
    <a class="dropdown-item" onclick="get_T_formData('T1','${value}','${stationComName}')">T1</a>
    <a class="dropdown-item" onclick="get_T_formData('T2','${value}','${stationComName}')">T2</a>
    <a class="dropdown-item" onclick="get_T_formData('T3','${value}','${stationComName}')">T3</a>
    <a class="dropdown-item" onclick="get_T_formData('T4','${value}','${stationComName}')">T4</a>
    <a class="dropdown-item" onclick="get_T_formData('T5','${value}','${stationComName}')">T5</a>
    `;
  }else if(componentName == "SIGNAL CS" || componentName == "SIGNAL"){

   btn +=`
    <a class="dropdown-item" onclick="get_CS_formData('CS1','${value}','${stationComName}')">CS1</a>
    <a class="dropdown-item" onclick="get_CS_formData('CS2','${value}','${stationComName}')">CS2</a>
    `;

  }else if(componentName == "DL"){

    btn +=`
    <a class="dropdown-item" onclick="get_DL_formData('DL1','${value}','${stationComName}')">DL1</a>
    <a class="dropdown-item" onclick="get_DL_formData('DL2','${value}','${stationComName}')">DL2</a>
    <a class="dropdown-item" onclick="get_DL_formData('DL3','${value}','${stationComName}')">DL3</a>
    <a class="dropdown-item" onclick="get_DL_formData('DL4','${value}','${stationComName}')">DL4</a>
    `;

}else if(componentName == "MLB"){

btn +=`
    <a class="dropdown-item" onclick="get_MLB_formData('MLB1','${value}','${stationComName}')">MLB1</a>
    <a class="dropdown-item" onclick="get_MLB_formData('MLB2','${value}','${stationComName}')">MLB2</a>
    <a class="dropdown-item" onclick="get_MLB_formData('MLB3','${value}','${stationComName}')">MLB3</a>
    `;

}else if(componentName == "SLB"){

btn +=`
 <a class="dropdown-item" onclick="get_SLB_formData('SLB1','${value}','${stationComName}')">SLB1</a>
 <a class="dropdown-item" onclick="get_SLB_formData('SLB2','${value}','${stationComName}')">SLB2</a>
 
 `;

}

else if(componentName == "AXLE COUNTER"){

btn +=`
 <a class="dropdown-item" onclick="get_DAC_formData('DAC1','${value}','${stationComName}')">DAC1</a>
 <a class="dropdown-item" onclick="get_DAC_formData('DAC2','${value}','${stationComName}')">DAC2</a>
 <a class="dropdown-item" onclick="get_DAC_formData('DAC3','${value}','${stationComName}')">DAC3</a>
 
 `;

}


else if(componentName == "ELB"){

btn +=`
 <a class="dropdown-item" onclick="get_ELB_formData('ELB1','${value}','${stationComName}')">ELB1</a>
 <a class="dropdown-item" onclick="get_ELB_formData('ELB2','${value}','${stationComName}')">ELB2</a>
  <a class="dropdown-item" onclick="get_ELB_formData('ELB3','${value}','${stationComName}')">ELB3</a>
 <a class="dropdown-item" onclick="get_ELB_formData('ELB4','${value}','${stationComName}')">ELB4</a>
 <a class="dropdown-item" onclick="get_ELB_formData('ELB5','${value}','${stationComName}')">ELB5</a>
 
 `;

}
   
   
    btn +=`
  </div>
    </div>`;

        // let btn = document.createElement("button");
        //     btn.id = "subCompo_"+value;
        //     btn.type = "button";
        //     btn.className = val.target.className;//"btn btn-sm btn-warning mx-2";
        //     btn.innerHTML = value;

        // btn.onclick = createSubComponent;
        // divWrap.appendChild(btn)
        divWrap.innerHTML = btn

    });

    let elv = document.getElementById("subComponentDisplay");
    elv.appendChild(divAlert)
    elv.appendChild(divWrap)

}


}


function openDialog(typeOfForm, dataList) {

    let tableId = '';
    let displayHtml = "";

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


        displayHtml += `
            <tr>
            <th scope="row">${index+1}</th>
            <td>${element['ep_details']}</td>
            <td style="vertical-align:middle;width:22%" >
                <select class="custom-select ${typeOfForm}Class" id="${element['ep_id']}">
                    <option value="">Select Action</option>`;

        let optArr = element['ep_option'].split(",");
        optArr.forEach(opt => {
            displayHtml += `<option value="${opt}">${opt}</option>`;


        });
        // <option value="Done">Done</option>
        // <option value="Not Done">Not Done</option>
        displayHtml += `</select>
            </td>
            </tr>
        `;


    });

    document.getElementById(tableId).innerHTML = displayHtml;

}

// alert(new Date().toISOString().split("T")[0])

function get_EP_formData(EPtype, subCompo, compo) {
    // data-toggle="modal" data-target="#exampleModal"
    $("#compoNameTmp").val(compo);
    $("#subcompoNameTmp").val(subCompo);
    $(".displaySubcompoName").html(subCompo);
    let language = $("#language").val();

    if(language == "Hindi"){
        $(".heading_english").addClass('d-none')
        $(".heading_hindi").removeClass('d-none')
     }else{
        $(".heading_hindi").addClass('d-none')
        $(".heading_english").removeClass('d-none')
    }

    if (EPtype === 'EP2') {
        $("#EP2_1").val(new Date().toISOString().split("T")[0]);
        
        if(language == "Hindi"){
            $(".ep2_details_english").addClass('d-none')
            $(".ep2_details_hindi").removeClass('d-none')
        }else{
            $(".ep2_details_hindi").addClass('d-none')
            $(".ep2_details_english").removeClass('d-none')
        }
        $("#componentForm_EP2").modal("show");
        return;
    }else if(EPtype === 'EP3'){
        if(language == "Hindi"){
            $(".ep3_details_english").addClass('d-none')
            $(".ep3_details_hindi").removeClass('d-none')
        }else{
            $(".ep3_details_hindi").addClass('d-none')
            $(".ep3_details_english").removeClass('d-none')
        }
        $("#componentForm_EP3").modal("show");

        return; //no need to go below
    }

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

                openDialog(EPtype, response['data']);

            }

        },
        complete:function(){
            $("#loader_show").addClass('d-none');

        }
    });



    // $("#modalComponentName").html(compo);
    // $("#modalSubCompoName").html(subCompo);
    // $("#modalSubCompoType").html(type);
}

function clearAllData() {
    g_st_compList = [];
    document.getElementById("componentDisplay").innerHTML = '';
    document.getElementById("subComponentDisplay").innerHTML = "";
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
            document.getElementById("subComponentDisplay").innerHTML = "";


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
                    btn.onclick = createSubComponent;
                    document.getElementById("componentDisplay").appendChild(btn)
                })
            }

        }
    });
}


$(document).ready(function() {
    getComponent(); // init first

    $("#ep1FormBtn").click(function() {
        if (confirm("Do you want to final submit EP1 Form")) {
            let language = $("#language").val();
            let sectionName = $("#sectionName").val();
            let sectionId = $("#sectionId").val();

            let stationName = $("#stationName").val();
            let stationId = $("#stationId").val();

            let compoNameTmp = $("#compoNameTmp").val();
            let subcompoNameTmp = $("#subcompoNameTmp").val();

            if (
                sectionName == "" || sectionName == null || sectionName == undefined ||
                sectionId == "" || sectionId == null || sectionId == undefined ||
                stationName == "" || stationName == null || stationName == undefined ||
                stationId == "" || stationId == null || stationId == undefined ||
                compoNameTmp == "" || compoNameTmp == null || compoNameTmp == undefined ||
                subcompoNameTmp == "" || subcompoNameTmp == null || subcompoNameTmp == undefined

            ) {
                alert("Something went wrong , refresh the page and try again");
                return;
            }

            let EP1_1 = $("#EP1_1").val();
            let EP1_2 = $("#EP1_2").val();
            let EP1_3 = $("#EP1_3").val();
            let EP1_4 = $("#EP1_4").val();
            let EP1_5 = $("#EP1_5").val();
            let EP1_6 = $("#EP1_6").val();
            let EP1_7 = $("#EP1_7").val();
            let EP1_8 = $("#EP1_8").val();
            let EP1_9 = $("#EP1_9").val();
            let EP1_10 = $("#EP1_10").val();
            let EP1_11 = $("#EP1_11").val();

            if (EP1_1 == '' || EP1_1.length == 0 || EP1_1 == null) {
                $("#EP1_1").addClass("is-invalid");
                $("#ep1Form_status").html("Serial no 1 is required").css("color", "red");
                return;
            } else {
                $("#ep1Form_status").html("");
                $("#EP1_1").removeClass("is-invalid");

            }

            if (EP1_2 == '' || EP1_2.length == 0 || EP1_2 == null) {
                $("#EP1_2").addClass("is-invalid");
                $("#ep1Form_status").html("Serial no 2 is required").css("color", "red");
                return;
            } else {
                $("#ep1Form_status").html("");
                $("#EP1_2").removeClass("is-invalid");

            }

            if (EP1_3 == '' || EP1_3.length == 0 || EP1_3 == null) {
                $("#EP1_3").addClass("is-invalid");
                $("#ep1Form_status").html("Serial no 3 is required").css("color", "red");
                return;
            } else {
                $("#ep1Form_status").html("");
                $("#EP1_3").removeClass("is-invalid");

            }


            if (EP1_4 == '' || EP1_4.length == 0 || EP1_4 == null) {
                $("#EP1_4").addClass("is-invalid");
                $("#ep1Form_status").html("Serial no 4 is required").css("color", "red");
                return;
            } else {
                $("#ep1Form_status").html("");
                $("#EP1_4").removeClass("is-invalid");

            }


            if (EP1_5 == '' || EP1_5.length == 0 || EP1_5 == null) {
                $("#EP1_5").addClass("is-invalid");
                $("#ep1Form_status").html("Serial no 5 is required").css("color", "red");
                return;
            } else {
                $("#ep1Form_status").html("");
                $("#EP1_5").removeClass("is-invalid");

            }


            if (EP1_6 == '' || EP1_6.length == 0 || EP1_6 == null) {
                $("#EP1_6").addClass("is-invalid");
                $("#ep1Form_status").html("Serial no 6 is required").css("color", "red");
                return;
            } else {
                $("#ep1Form_status").html("");
                $("#EP1_6").removeClass("is-invalid");

            }

            if (EP1_7 == '' || EP1_7.length == 0 || EP1_7 == null) {
                $("#EP1_7").addClass("is-invalid");
                $("#ep1Form_status").html("Serial no 7 is required").css("color", "red");
                return;
            } else {
                $("#ep1Form_status").html("");
                $("#EP1_7").removeClass("is-invalid");

            }

            if (EP1_8 == '' || EP1_8.length == 0 || EP1_8 == null) {
                $("#EP1_8").addClass("is-invalid");
                $("#ep1Form_status").html("Serial no 8 is required").css("color", "red");
                return;
            } else {
                $("#ep1Form_status").html("");
                $("#EP1_8").removeClass("is-invalid");

            }

            if (EP1_9 == '' || EP1_9.length == 0 || EP1_9 == null) {
                $("#EP1_9").addClass("is-invalid");
                $("#ep1Form_status").html("Serial no 9 is required").css("color", "red");
                return;
            } else {
                $("#ep1Form_status").html("");
                $("#EP1_9").removeClass("is-invalid");

            }

            if (EP1_10 == '' || EP1_10.length == 0 || EP1_10 == null) {
                $("#EP1_10").addClass("is-invalid");
                $("#ep1Form_status").html("Serial no 10 is required").css("color", "red");
                return;
            } else {
                $("#ep1Form_status").html("");
                $("#EP1_10").removeClass("is-invalid");

            }

            if (EP1_11 == '' || EP1_11.length == 0 || EP1_11 == null) {
                $("#EP1_11").addClass("is-invalid");
                $("#ep1Form_status").html("Serial no 11 is required").css("color", "red");
                return;
            } else {
                $("#ep1Form_status").html("");
                $("#EP1_11").removeClass("is-invalid");

            }


            let userID = '<?php echo $_SESSION['userretaileremp']; ?>';
            if(userID == '' || userID == null || userID == undefined){
                
                $("#ep1Form_status").html("Something went wrong with user Id, Refresh the page and try again").css("color", "red");
                return
            }

            $.ajax({
                type: "POST",
                url: "query/action.php",
                data: {
                    "action": "EP1_formSubmit",
                    "userID": userID,
                    "sectionName": sectionName,
                    "sectionId": sectionId,
                    "stationName": stationName,
                    "stationId": stationId,
                    "compoNameTmp": compoNameTmp,
                    "subcompoNameTmp": subcompoNameTmp,
                    "EP1_1": EP1_1,
                    "EP1_2": EP1_2,
                    "EP1_3": EP1_3,
                    "EP1_4": EP1_4,
                    "EP1_5": EP1_5,
                    "EP1_6": EP1_6,
                    "EP1_7": EP1_7,
                    "EP1_8": EP1_8,
                    "EP1_9": EP1_9,
                    "EP1_10": EP1_10,
                    "EP1_11": EP1_11,
                    "language":language
                },
                beforeSend: function() {
                    $("#loader_show").removeClass('d-none');

                },
                success: function(response) {
                    let respo = JSON.parse(response);
                    if (respo['status']) {
                        $("#ep1Form_status").html(respo['msg']).css("color", "green");


                    } else {
                        $("#ep1Form_status").html(respo['msg']).css("color", "red");

                    }
                },
                complete: function() {
                    $("#loader_show").addClass('d-none');

                }
            });

        }
    });

    $("#ep2FormBtn").click(function() {
        if (confirm("Do you want to final submit EP2 Form")) {
            let language = $("#language").val();

            let sectionName = $("#sectionName").val();
            let sectionId = $("#sectionId").val();

            let stationName = $("#stationName").val();
            let stationId = $("#stationId").val();

            let compoNameTmp = $("#compoNameTmp").val();
            let subcompoNameTmp = $("#subcompoNameTmp").val();

            if (
                sectionName == "" || sectionName == null || sectionName == undefined ||
                sectionId == "" || sectionId == null || sectionId == undefined ||
                stationName == "" || stationName == null || stationName == undefined ||
                stationId == "" || stationId == null || stationId == undefined ||
                compoNameTmp == "" || compoNameTmp == null || compoNameTmp == undefined ||
                subcompoNameTmp == "" || subcompoNameTmp == null || subcompoNameTmp == undefined

            ) {
                alert("Something went wrong , refresh the page and try again");
                return;
            }

            let EP2_1 = $("#EP2_1").val();
            let EP2_2 = $("#EP2_2").val();
            let EP2_3 = $("#EP2_3").val();
            let EP2_4 = $("#EP2_4").val();
            let EP2_5 = $("#EP2_5").val();

            let op_v_N_R = $("#op_v_N_R").val();
            let op_v_R_N = $("#op_v_R_N").val();
            let ob_v_N_R = $("#ob_v_N_R").val();
            let ob_v_R_N = $("#ob_v_R_N").val();
            let det_v_N_R = $("#det_v_N_R").val();
            let det_v_R_N = $("#det_v_R_N").val();
            let nwc_N_R = $("#nwc_N_R").val();
            let nwc_R_N = $("#nwc_R_N").val();
            let ob_sc_N_R = $("#ob_sc_N_R").val();
            let ob_sc_R_N = $("#ob_sc_R_N").val();
            let ob_t_N_R = $("#ob_t_N_R").val();
            // let ob_t_R_N = $("#ob_t_R_N").val();
            let gt_N_R = $("#gt_N_R").val();
            // let gt_R_N = $("#gt_R_N").val();
            let operatingTimeSecond = $("#operatingTimeSecond").val();
            let operatingTime_dbt = $("#operatingTime_dbt").val();
            let friction_c_s = $("#friction_c_s").val();
            let track_locking = $("#track_locking").val();
            let remark_brief = $("#remark_brief").val();
            // let signature = $("#signature").val();

            if (EP2_1 == '' || EP2_1.length == 0 || EP2_1 == null) {
                $("#EP2_1").addClass("is-invalid");
                $("#ep2Form_status").html("Date is required").css("color", "red");
                return;
            } else {
                $("#ep2Form_status").html("");
                $("#EP2_1").removeClass("is-invalid");

            }



            if (op_v_N_R == '' || op_v_N_R.length == 0 || op_v_N_R == null) {
                $("#op_v_N_R").addClass("is-invalid");
                $("#ep2Form_status").html("Operating Voltage N-R is required").css("color", "red");
                return;
            } else {
                $("#ep2Form_status").html("");
                $("#op_v_N_R").removeClass("is-invalid");

            }

            if (op_v_R_N == '' || op_v_R_N.length == 0 || op_v_R_N == null) {
                $("#op_v_R_N").addClass("is-invalid");
                $("#ep2Form_status").html("Operating Voltage R-N is required").css("color", "red");
                return;
            } else {
                $("#ep2Form_status").html("");
                $("#op_v_R_N").removeClass("is-invalid");

            }

            if (ob_v_N_R == '' || ob_v_N_R.length == 0 || ob_v_N_R == null) {
                $("#ob_v_N_R").addClass("is-invalid");
                $("#ep2Form_status").html("Obstruction Voltage N-R is required").css("color", "red");
                return;
            } else {
                $("#ep2Form_status").html("");
                $("#ob_v_N_R").removeClass("is-invalid");

            }

            if (ob_v_R_N == '' || ob_v_R_N.length == 0 || ob_v_R_N == null) {
                $("#ob_v_R_N").addClass("is-invalid");
                $("#ep2Form_status").html("Obstruction Voltage R-N is required").css("color", "red");
                return;
            } else {
                $("#ep2Form_status").html("");
                $("#ob_v_R_N").removeClass("is-invalid");

            }

            if (det_v_N_R == '' || det_v_N_R.length == 0 || det_v_N_R == null) {
                $("#det_v_N_R").addClass("is-invalid");
                $("#ep2Form_status").html("Detection Voltage N-R is required").css("color", "red");
                return;
            } else {
                $("#ep2Form_status").html("");
                $("#det_v_N_R").removeClass("is-invalid");

            }

            if (det_v_R_N == '' || det_v_R_N.length == 0 || det_v_R_N == null) {
                $("#det_v_R_N").addClass("is-invalid");
                $("#ep2Form_status").html("Detection Voltage R-N is required").css("color", "red");
                return;
            } else {
                $("#ep2Form_status").html("");
                $("#det_v_R_N").removeClass("is-invalid");

            }

            if (nwc_N_R == '' || nwc_N_R.length == 0 || nwc_N_R == null) {
                $("#nwc_N_R").addClass("is-invalid");
                $("#ep2Form_status").html("Normal Working Current (N-R) is required").css("color", "red");
                return;
            } else {
                $("#ep2Form_status").html("");
                $("#nwc_N_R").removeClass("is-invalid");

            }

            if (nwc_R_N == '' || nwc_R_N.length == 0 || nwc_R_N == null) {
                $("#nwc_R_N").addClass("is-invalid");
                $("#ep2Form_status").html("Normal Working Current (R-N) is required").css("color", "red");
                return;
            } else {
                $("#ep2Form_status").html("");
                $("#nwc_R_N").removeClass("is-invalid");

            }

            if (ob_sc_N_R == '' || ob_sc_N_R.length == 0 || ob_sc_N_R == null) {
                $("#ob_sc_N_R").addClass("is-invalid");
                $("#ep2Form_status").html("Obstructure/Slipping Current (N-R)").css("color", "red");
                return;
            } else {
                $("#ep2Form_status").html("");
                $("#ob_sc_N_R").removeClass("is-invalid");

            }

            if (ob_sc_R_N == '' || ob_sc_R_N.length == 0 || ob_sc_R_N == null) {
                $("#ob_sc_R_N").addClass("is-invalid");
                $("#ep2Form_status").html("Obstructure/Slipping Current (R-N)").css("color", "red");
                return;
            } else {
                $("#ep2Form_status").html("");
                $("#ob_sc_R_N").removeClass("is-invalid");

            }

            if (ob_t_N_R == '' || ob_t_N_R.length == 0 || ob_t_N_R == null) {
                $("#ob_t_N_R").addClass("is-invalid");
                $("#ep2Form_status").html("Obstructure Test (N-R)").css("color", "red");
                return;
            } else {
                $("#ep2Form_status").html("");
                $("#ob_t_N_R").removeClass("is-invalid");

            }
            
            // if (ob_t_R_N == '' || ob_t_R_N.length == 0 || ob_t_R_N == null) {
            //     $("#ob_t_R_N").addClass("is-invalid");
            //     $("#ep2Form_status").html("Obstructure Test (R-N)").css("color", "red");
            //     return;
            // } else {
            //     $("#ep2Form_status").html("");
            //     $("#ob_t_R_N").removeClass("is-invalid");

            // }
            
            if (gt_N_R == '' || gt_N_R.length == 0 || gt_N_R == null) {
                $("#gt_N_R").addClass("is-invalid");
                $("#ep2Form_status").html("Go Test (N-R) is required").css("color", "red");
                return;
            } else {
                $("#ep2Form_status").html("");
                $("#gt_N_R").removeClass("is-invalid");

            }
            
            // if (gt_R_N == '' || gt_R_N.length == 0 || gt_R_N == null) {
            //     $("#gt_R_N").addClass("is-invalid");
            //     $("#ep2Form_status").html("Go Test (R-N) is required").css("color", "red");
            //     return;
            // } else {
            //     $("#ep2Form_status").html("");
            //     $("#gt_R_N").removeClass("is-invalid");

            // }
            
            if (operatingTimeSecond == '' || operatingTimeSecond.length == 0 || operatingTimeSecond == null) {
                $("#operatingTimeSecond").addClass("is-invalid");
                $("#ep2Form_status").html("operating Time is required").css("color", "red");
                return;
            } else {
                $("#ep2Form_status").html("");
                $("#operatingTimeSecond").removeClass("is-invalid");

            }
            
            if (operatingTime_dbt == '' || operatingTime_dbt.length == 0 || operatingTime_dbt == null) {
                $("#operatingTime_dbt").addClass("is-invalid");
                $("#ep2Form_status").html("operating Time during barrier is required").css("color", "red");
                return;
            } else {
                $("#ep2Form_status").html("");
                $("#operatingTime_dbt").removeClass("is-invalid");

            }
            
            if (friction_c_s == '' || friction_c_s.length == 0 || friction_c_s == null) {
                $("#friction_c_s").addClass("is-invalid");
                $("#ep2Form_status").html("Friction is required").css("color", "red");
                return;
            } else {
                $("#ep2Form_status").html("");
                $("#friction_c_s").removeClass("is-invalid");

            }
            
            if (track_locking == '' || track_locking.length == 0 || track_locking == null) {
                $("#track_locking").addClass("is-invalid");
                $("#ep2Form_status").html("Track Locking Test is required").css("color", "red");
                return;
            } else {
                $("#ep2Form_status").html("");
                $("#track_locking").removeClass("is-invalid");

            }
            
            if (remark_brief == '' || remark_brief.length == 0 || remark_brief == null) {
                $("#remark_brief").addClass("is-invalid");
                $("#ep2Form_status").html("Remark Inspection is required").css("color", "red");
                return;
            } else {
                $("#ep2Form_status").html("");
                $("#remark_brief").removeClass("is-invalid");

            }
            
            // if (signature == '' || signature.length == 0 || signature == null) {
            //     $("#signature").addClass("is-invalid");
            //     $("#ep2Form_status").html("Signature is required").css("color", "red");
            //     return;
            // } else {
            //     $("#ep2Form_status").html("");
            //     $("#signature").removeClass("is-invalid");

            // }


            
            if (EP2_2 == '' || EP2_2.length == 0 || EP2_2 == null) {
                $("#EP2_2").addClass("is-invalid");
                $("#ep2Form_status").html("Serial no 2 is required").css("color", "red");
                return;
            } else {
                $("#ep2Form_status").html("");
                $("#EP2_2").removeClass("is-invalid");

            }

            if (EP2_3 == '' || EP2_3.length == 0 || EP2_3 == null) {
                $("#EP2_3").addClass("is-invalid");
                $("#ep2Form_status").html("Serial no 3 is required").css("color", "red");
                return;
            } else {
                $("#ep2Form_status").html("");
                $("#EP2_3").removeClass("is-invalid");

            }


            if (EP2_4 == '' || EP2_4.length == 0 || EP2_4 == null) {
                $("#EP2_4").addClass("is-invalid");
                $("#ep2Form_status").html("Serial no 4 is required").css("color", "red");
                return;
            } else {
                $("#ep2Form_status").html("");
                $("#EP2_4").removeClass("is-invalid");

            }


            if (EP2_5 == '' || EP2_5.length == 0 || EP2_5 == null) {
                $("#EP2_5").addClass("is-invalid");
                $("#ep2Form_status").html("Serial no 5 is required").css("color", "red");
                return;
            } else {
                $("#ep2Form_status").html("");
                $("#EP2_5").removeClass("is-invalid");
                
            }
            
            
            let userID = '<?php echo $_SESSION['userretaileremp']; ?>'
            
            if(userID == '' || userID == null || userID == undefined){
                
                $("#ep2Form_status").html("Something went wrong with user Id, Refresh the page and try again").css("color", "red");
                return
            }

            $.ajax({
                type: "POST",
                url: "query/action.php",
                data: {
                    "action": "EP2_formSubmit",
                    "userID": userID,
                    "sectionName": sectionName,
                    "sectionId": sectionId,
                    "stationName": stationName,
                    "stationId": stationId,
                    "compoNameTmp": compoNameTmp,
                    "subcompoNameTmp": subcompoNameTmp,
                    "EP2_1": EP2_1,
                    "EP2_2": EP2_2,
                    "EP2_3": EP2_3,
                    "EP2_4": EP2_4,
                    "EP2_5": EP2_5,
                    "op_v_N_R": op_v_N_R,
                    "op_v_R_N": op_v_R_N,
                    "ob_v_N_R": ob_v_N_R,
                    "ob_v_R_N": ob_v_R_N,
                    "det_v_N_R": det_v_N_R,
                    "det_v_R_N": det_v_R_N,
                    "nwc_N_R": nwc_N_R,
                    "nwc_R_N": nwc_R_N,
                    "ob_sc_N_R": ob_sc_N_R,
                    "ob_sc_R_N": ob_sc_R_N,
                    "ob_t_N_R": ob_t_N_R,
                    // "ob_t_R_N": ob_t_R_N,
                    "gt_N_R": gt_N_R,
                    // "gt_R_N": gt_R_N,
                    "operatingTimeSecond": operatingTimeSecond,
                    "operatingTime_dbt": operatingTime_dbt,
                    "friction_c_s": friction_c_s,
                    "track_locking": track_locking,
                    "remark_brief": remark_brief,
                    // "signature": signature,
                    language:language
                },
                beforeSend: function() {
                    $("#loader_show").removeClass('d-none');

                },
                success: function(response) {
                    let respo = JSON.parse(response);
                    $("#loader_show").addClass('d-none');

                    if (respo['status']) {
                        $("#ep2Form_status").html(respo['msg']).css("color", "green");


                    } else {
                        $("#FormEP2")[0].reset();
                        $("#ep2Form_status").html(respo['msg']).css("color", "red");

                    }
                },
                complete: function() {
                    $("#loader_show").addClass('d-none');

                }
            });

        }
    });


    
    $("#ep3FormBtn").click(function() {
        if (confirm("Do you want to final submit EP3 Form")) {
            let language = $("#language").val();
            let sectionName = $("#sectionName").val();
            let sectionId = $("#sectionId").val();

            let stationName = $("#stationName").val();
            let stationId = $("#stationId").val();

            let compoNameTmp = $("#compoNameTmp").val();
            let subcompoNameTmp = $("#subcompoNameTmp").val();

            if (
                sectionName == "" || sectionName == null || sectionName == undefined ||
                sectionId == "" || sectionId == null || sectionId == undefined ||
                stationName == "" || stationName == null || stationName == undefined ||
                stationId == "" || stationId == null || stationId == undefined ||
                compoNameTmp == "" || compoNameTmp == null || compoNameTmp == undefined ||
                subcompoNameTmp == "" || subcompoNameTmp == null || subcompoNameTmp == undefined

            ) {
                alert("Something went wrong , refresh the page and try again");
                return;
            }

            let ep3_1 = $("#ep3_1").val();
            let ep3_2 = $("#ep3_2").val();
            let ep3_3 = $("#ep3_3").val();
            let ep3_4 = $("#ep3_4").val();
          

            if (ep3_1 == '' || ep3_1.length == 0 || ep3_1 == null) {
                $("#ep3_1").addClass("is-invalid");
                $("#ep3Form_status").html("Serial no 1 is required").css("color", "red");
                return;
            } else {
                $("#ep3Form_status").html("");
                $("#ep3_1").removeClass("is-invalid");

            }

            if (ep3_2 == '' || ep3_2.length == 0 || ep3_2 == null) {
                $("#ep3_2").addClass("is-invalid");
                $("#ep3Form_status").html("Serial no 2 is required").css("color", "red");
                return;
            } else {
                $("#ep3Form_status").html("");
                $("#ep3_2").removeClass("is-invalid");

            }




            let userID = '<?php echo $_SESSION['userretaileremp']; ?>';
            if(userID == '' || userID == null || userID == undefined){
                
                $("#ep3Form_status").html("Something went wrong with user Id, Refresh the page and try again").css("color", "red");
                return
            }

            $.ajax({
                type: "POST",
                url: "query/action.php",
                data: {
                    "action": "EP3_formSubmit",
                    "userID": userID,
                    "sectionName": sectionName,
                    "sectionId": sectionId,
                    "stationName": stationName,
                    "stationId": stationId,
                    "compoNameTmp": compoNameTmp,
                    "subcompoNameTmp": subcompoNameTmp,
                    "ep3_1": ep3_1,
                    "ep3_2": ep3_2,
                    "ep3_3": ep3_3,
                    "ep3_4": ep3_4,                    
                    "language":language
                },
                beforeSend: function() {
                    $("#loader_show").removeClass('d-none');
                },
                success: function(response) {
                    let respo = JSON.parse(response);
                    if (respo['status']) {
                        $("#ep3Form_status").html(respo['msg']).css("color", "green");

                    } else {
                        $("#ep3Form_status").html(respo['msg']).css("color", "red");

                    }
                },
                error:(er)=>{                    
                    $("#loader_show").addClass('d-none');
                },
                complete: function() {
                    $("#loader_show").addClass('d-none');
                    setTimeout(() => {
                        $("#ep3Form_status").html('');
                        
                    }, 5000);

                }
            });

        }
    });

    $("#ep4FormBtn").click(function() {
        if (confirm("Do you want to final submit EP4 Form")) {
            let language = $("#language").val();

            let sectionName = $("#sectionName").val();
            let sectionId = $("#sectionId").val();

            let stationName = $("#stationName").val();
            let stationId = $("#stationId").val();

            let compoNameTmp = $("#compoNameTmp").val();
            let subcompoNameTmp = $("#subcompoNameTmp").val();

            if (
                sectionName == "" || sectionName == null || sectionName == undefined ||
                sectionId == "" || sectionId == null || sectionId == undefined ||
                stationName == "" || stationName == null || stationName == undefined ||
                stationId == "" || stationId == null || stationId == undefined ||
                compoNameTmp == "" || compoNameTmp == null || compoNameTmp == undefined ||
                subcompoNameTmp == "" || subcompoNameTmp == null || subcompoNameTmp == undefined

            ) {
                alert("Something went wrong , refresh the page and try again");
                return;
            }

            let EP4_1 = $("#EP4_1").val();
            let EP4_2 = $("#EP4_2").val();
            let EP4_3 = $("#EP4_3").val();
            let EP4_4 = $("#EP4_4").val();


            if (EP4_1 == '' || EP4_1.length == 0 || EP4_1 == null) {
                $("#EP4_1").addClass("is-invalid");
                $("#ep4Form_status").html("Serial no 1 is required").css("color", "red");
                return;
            } else {
                $("#ep4Form_status").html("");
                $("#EP4_1").removeClass("is-invalid");

            }

            if (EP4_2 == '' || EP4_2.length == 0 || EP4_2 == null) {
                $("#EP4_2").addClass("is-invalid");
                $("#ep4Form_status").html("Serial no 2 is required").css("color", "red");
                return;
            } else {
                $("#ep4Form_status").html("");
                $("#EP4_2").removeClass("is-invalid");

            }

            if (EP4_3 == '' || EP4_3.length == 0 || EP4_3 == null) {
                $("#EP4_3").addClass("is-invalid");
                $("#ep4Form_status").html("Serial no 3 is required").css("color", "red");
                return;
            } else {
                $("#ep4Form_status").html("");
                $("#EP4_3").removeClass("is-invalid");

            }


            if (EP4_4 == '' || EP4_4.length == 0 || EP4_4 == null) {
                $("#EP4_4").addClass("is-invalid");
                $("#ep4Form_status").html("Serial no 4 is required").css("color", "red");
                return;
            } else {
                $("#ep4Form_status").html("");
                $("#EP4_4").removeClass("is-invalid");

            }


            let userID = '<?php echo $_SESSION['userretaileremp']; ?>';
            if(userID == '' || userID == null || userID == undefined){
                
                $("#ep4Form_status").html("Something went wrong with user Id, Refresh the page and try again").css("color", "red");
                return
            }

            $.ajax({
                type: "POST",
                url: "query/action.php",
                data: {
                    "action": "EP4_formSubmit",
                    "userID": userID,
                    "sectionName": sectionName,
                    "sectionId": sectionId,
                    "stationName": stationName,
                    "stationId": stationId,
                    "compoNameTmp": compoNameTmp,
                    "subcompoNameTmp": subcompoNameTmp,
                    "EP4_1": EP4_1,
                    "EP4_2": EP4_2,
                    "EP4_3": EP4_3,
                    "EP4_4": EP4_4,
                    language:language

                },
                beforeSend: function() {
                    $("#loader_show").removeClass('d-none');

                },
                success: function(response) {
                    let respo = JSON.parse(response);
                    if (respo['status']) {
                        $("#ep4Form_status").html(respo['msg']).css("color", "green");


                    } else {
                        $("#ep4Form_status").html(respo['msg']).css("color", "red");

                    }
                },
                error: (e) => {
                    $("#ep4Form_status").html(e).css("color", "red");

                },
                complete: function() {
                    $("#loader_show").addClass('d-none');
                    setTimeout(() => {
                        $("#ep4Form_status").html("");


                    }, 5000);

                }
            });

        }
    });

    $("#ep5FormBtn").click(function() {
        if (confirm("Do you want to final submit EP5 Form")) {
            let language = $("#language").val();

            let sectionName = $("#sectionName").val();
            let sectionId = $("#sectionId").val();

            let stationName = $("#stationName").val();
            let stationId = $("#stationId").val();

            let compoNameTmp = $("#compoNameTmp").val();
            let subcompoNameTmp = $("#subcompoNameTmp").val();

            if (
                sectionName == "" || sectionName == null || sectionName == undefined ||
                sectionId == "" || sectionId == null || sectionId == undefined ||
                stationName == "" || stationName == null || stationName == undefined ||
                stationId == "" || stationId == null || stationId == undefined ||
                compoNameTmp == "" || compoNameTmp == null || compoNameTmp == undefined ||
                subcompoNameTmp == "" || subcompoNameTmp == null || subcompoNameTmp == undefined

            ) {
                alert("Something went wrong , refresh the page and try again");
                return;
            }

            let EP5_1 = $("#EP5_1").val();
            let EP5_2 = $("#EP5_2").val();
            let EP5_3 = $("#EP5_3").val();
            let EP5_4 = $("#EP5_4").val();
            let EP5_5 = $("#EP5_5").val();
            let EP5_6 = $("#EP5_6").val();


            if (EP5_1 == '' || EP5_1.length == 0 || EP5_1 == null) {
                $("#EP5_1").addClass("is-invalid");
                $("#ep5Form_status").html("Serial no 1 is required").css("color", "red");
                return;
            } else {
                $("#ep5Form_status").html("");
                $("#EP5_1").removeClass("is-invalid");

            }

            if (EP5_2 == '' || EP5_2.length == 0 || EP5_2 == null) {
                $("#EP5_2").addClass("is-invalid");
                $("#ep5Form_status").html("Serial no 2 is required").css("color", "red");
                return;
            } else {
                $("#ep5Form_status").html("");
                $("#EP5_2").removeClass("is-invalid");

            }

            if (EP5_3 == '' || EP5_3.length == 0 || EP5_3 == null) {
                $("#EP5_3").addClass("is-invalid");
                $("#ep5Form_status").html("Serial no 3 is required").css("color", "red");
                return;
            } else {
                $("#ep5Form_status").html("");
                $("#EP5_3").removeClass("is-invalid");

            }


            if (EP5_4 == '' || EP5_4.length == 0 || EP5_4 == null) {
                $("#EP5_4").addClass("is-invalid");
                $("#ep5Form_status").html("Serial no 4 is required").css("color", "red");
                return;
            } else {
                $("#ep5Form_status").html("");
                $("#EP5_4").removeClass("is-invalid");

            }

            if (EP5_5 == '' || EP5_5.length == 0 || EP5_5 == null) {
                $("#EP5_5").addClass("is-invalid");
                $("#ep5Form_status").html("Serial no 5 is required").css("color", "red");
                return;
            } else {
                $("#ep5Form_status").html("");
                $("#EP5_5").removeClass("is-invalid");

            }

            if (EP5_6 == '' || EP5_6.length == 0 || EP5_6 == null) {
                $("#EP5_6").addClass("is-invalid");
                $("#ep5Form_status").html("Serial no 6 is required").css("color", "red");
                return;
            } else {
                $("#ep5Form_status").html("");
                $("#EP5_6").removeClass("is-invalid");

            }


            let userID = '<?php echo $_SESSION['userretaileremp']; ?>';
            if(userID == '' || userID == null || userID == undefined){
                
                $("#ep5Form_status").html("Something went wrong with user Id, Refresh the page and try again").css("color", "red");
                return
            }

            $.ajax({
                type: "POST",
                url: "query/action.php",
                data: {
                    "action": "EP5_formSubmit",
                    "userID": userID,
                    "sectionName": sectionName,
                    "sectionId": sectionId,
                    "stationName": stationName,
                    "stationId": stationId,
                    "compoNameTmp": compoNameTmp,
                    "subcompoNameTmp": subcompoNameTmp,
                    "EP5_1": EP5_1,
                    "EP5_2": EP5_2,
                    "EP5_3": EP5_3,
                    "EP5_4": EP5_4,
                    "EP5_5": EP5_5,
                    "EP5_6": EP5_6,
                    language:language

                },
                beforeSend: function() {
                    $("#loader_show").removeClass('d-none');

                },
                success: function(response) {
                    let respo = JSON.parse(response);
                    if (respo['status']) {
                        $("#ep5Form_status").html(respo['msg']).css("color", "green");


                    } else {
                        $("#ep5Form_status").html(respo['msg']).css("color", "red");

                    }
                },
                error: (e) => {
                    $("#ep5Form_status").html(e).css("color", "red");

                },
                complete: function() {
                    $("#loader_show").addClass('d-none');
                    setTimeout(() => {
                        $("#ep5Form_status").html("");


                    }, 5000);

                }
            });

        }
    });
    
    $("#t1FormBtn").click(function() {
        
        if (confirm("Do you want to final submit T1 Form")) {
            let language = $("#language").val();

            let sectionName = $("#sectionName").val();
            let sectionId = $("#sectionId").val();

            let stationName = $("#stationName").val();
            let stationId = $("#stationId").val();

            let compoNameTmp = $("#compoNameTmp").val();
            let subcompoNameTmp = $("#subcompoNameTmp").val();

            if (
                sectionName == "" || sectionName == null || sectionName == undefined ||
                sectionId == "" || sectionId == null || sectionId == undefined ||
                stationName == "" || stationName == null || stationName == undefined ||
                stationId == "" || stationId == null || stationId == undefined ||
                compoNameTmp == "" || compoNameTmp == null || compoNameTmp == undefined ||
                subcompoNameTmp == "" || subcompoNameTmp == null || subcompoNameTmp == undefined

            ) {
                alert("Something went wrong , refresh the page and try again");
                return;
            }

            let t1_1 = $("#t1_1").val();
            let t1_2 = $("#t1_2").val();
            let t1_3 = $("#t1_3").val();  

            let t1_4 = $("#t1_4").val();           
            let t1_5 = $("#t1_5").val();           
            let t1_6 = $("#t1_6").val();           
            let t1_7 = $("#t1_7").val();           
            let t1_8 = $("#t1_8").val();   

            let date1 = $("#date1").val();    
            let sale1_spg = $("#sale1_spg").val();    
            let sale1_v = $("#sale1_v").val();    
            let sale2_spg = $("#sale2_spg").val();    
            let sale2_v = $("#sale2_v").val();    
            let sale3_spg = $("#sale3_spg").val();    
            let sale3_v = $("#sale3_v").val();    
            let charging_v = $("#charging_v").val();    
            let charging_current = $("#charging_current").val();    
            let feedVoltage = $("#feedVoltage").val();    
            let nearBlock = $("#nearBlock").val();    
            let wireStatus = $("#wireStatus").val();    
            let remark1 = $("#remark1").val();   

            let date2 = $("#date2").val();    
            let railVoltage = $("#railVoltage").val();    
            let vt_value = $("#vt_value").val();    
            let wireStatus2 = $("#wireStatus2").val();    
            let magneticPart = $("#magneticPart").val();    
            let railFlag2 = $("#railFlag2").val();    
            let jumberwireStatus = $("#jumberwireStatus").val();    
            let remark2 = $("#remark2").val();    
            
            

            if (t1_1 == '' || t1_1.length == 0 || t1_1 == null) {
                $("#t1_1").addClass("is-invalid");
                $("#t1Form_status").html("Serial no 1 is required").css("color", "red");
                return;
            } else {
                $("#t1Form_status").html("");
                $("#t1_1").removeClass("is-invalid");

            }

            if (t1_2 == '' || t1_2.length == 0 || t1_2 == null) {
                $("#t1_2").addClass("is-invalid");
                $("#t1Form_status").html("Serial no 2 is required").css("color", "red");
                return;
            } else {
                $("#t1Form_status").html("");
                $("#t1_2").removeClass("is-invalid");

            }

            if (t1_3 == '' || t1_3.length == 0 || t1_3 == null) {
                $("#t1_3").addClass("is-invalid");
                $("#t1Form_status").html("Serial no 3 is required").css("color", "red");
                return;
            } else {
                $("#t1Form_status").html("");
                $("#t1_3").removeClass("is-invalid");

            }

            if (t1_4 == '' || t1_4.length == 0 || t1_4 == null) {
                $("#t1_4").addClass("is-invalid");
                $("#t1Form_status").html("Serial no 4 is required").css("color", "red");
                return;
            } else {
                $("#t1Form_status").html("");
                $("#t1_4").removeClass("is-invalid");

            }

            if (t1_5 == '' || t1_5.length == 0 || t1_5 == null) {
                $("#t1_5").addClass("is-invalid");
                $("#t1Form_status").html("Serial no 5 is required").css("color", "red");
                return;
            } else {
                $("#t1Form_status").html("");
                $("#t1_5").removeClass("is-invalid");

            }

            if (t1_6 == '' || t1_6.length == 0 || t1_6 == null) {
                $("#t1_6").addClass("is-invalid");
                $("#t1Form_status").html("Serial no 6 is required").css("color", "red");
                return;
            } else {
                $("#t1Form_status").html("");
                $("#t1_6").removeClass("is-invalid");

            }

            if (t1_7 == '' || t1_7.length == 0 || t1_7 == null) {
                $("#t1_7").addClass("is-invalid");
                $("#t1Form_status").html("Serial no 7 is required").css("color", "red");
                return;
            } else {
                $("#t1Form_status").html("");
                $("#t1_7").removeClass("is-invalid");

            }


            if (t1_8 == '' || t1_8.length == 0 || t1_8 == null) {
                $("#t1_8").addClass("is-invalid");
                $("#t1Form_status").html("Serial no 8 is required").css("color", "red");
                return;
            } else {
                $("#t1Form_status").html("");
                $("#t1_8").removeClass("is-invalid");

            }
            if (date1 == '' || date1.length == 0 || date1 == null) {
                $("#date1").addClass("is-invalid");
                $("#t1Form_status").html("Date is required").css("color", "red");
                return;
            } else {
                $("#t1Form_status").html("");
                $("#date1").removeClass("is-invalid");

            }
            // //////

            if (sale1_spg == '' || sale1_spg.length == 0 || sale1_spg == null) {
                $("#sale1_spg").addClass("is-invalid");
                $("#t1Form_status").html("Sale 1 SPG is required").css("color", "red");
                return;
            } else {
                $("#t1Form_status").html("");
                $("#sale1_spg").removeClass("is-invalid");

            }

            if (sale1_v == '' || sale1_v.length == 0 || sale1_v == null) {
                $("#sale1_v").addClass("is-invalid");
                $("#t1Form_status").html("Sale 1 Volt required").css("color", "red");
                return;
            } else {
                $("#t1Form_status").html("");
                $("#sale1_v").removeClass("is-invalid");

            }


            if (sale2_spg == '' || sale2_spg.length == 0 || sale2_spg == null) {
                $("#sale2_spg").addClass("is-invalid");
                $("#t1Form_status").html("Sale 2 SPG is required").css("color", "red");
                return;
            } else {
                $("#t1Form_status").html("");
                $("#sale2_spg").removeClass("is-invalid");

            }


            if (sale2_v == '' || sale2_v.length == 0 || sale2_v == null) {
                $("#sale2_v").addClass("is-invalid");
                $("#t1Form_status").html("Sale 2 Volt is required").css("color", "red");
                return;
            } else {
                $("#t1Form_status").html("");
                $("#sale2_v").removeClass("is-invalid");

            }


            if (sale3_spg == '' || sale3_spg.length == 0 || sale3_spg == null) {
                $("#sale3_spg").addClass("is-invalid");
                $("#t1Form_status").html("Sale 3 SPG is required").css("color", "red");
                return;
            } else {
                $("#t1Form_status").html("");
                $("#sale3_spg").removeClass("is-invalid");

            }


            if (sale3_v == '' || sale3_v.length == 0 || sale3_v == null) {
                $("#sale3_v").addClass("is-invalid");
                $("#t1Form_status").html("Sale 3 Volt is required").css("color", "red");
                return;
            } else {
                $("#t1Form_status").html("");
                $("#sale3_v").removeClass("is-invalid");

            }


            if (charging_v == '' || charging_v.length == 0 || charging_v == null) {
                $("#charging_v").addClass("is-invalid");
                $("#t1Form_status").html("All field is required").css("color", "red");
                return;
            } else {
                $("#t1Form_status").html("");
                $("#charging_v").removeClass("is-invalid");

            }


            if (charging_current == '' || charging_current.length == 0 || charging_current == null) {
                $("#charging_current").addClass("is-invalid");
                $("#t1Form_status").html("All field is required").css("color", "red");
                return;
            } else {
                $("#t1Form_status").html("");
                $("#charging_current").removeClass("is-invalid");

            }


            if (feedVoltage == '' || feedVoltage.length == 0 || feedVoltage == null) {
                $("#feedVoltage").addClass("is-invalid");
                $("#t1Form_status").html("All Field is required").css("color", "red");
                return;
            } else {
                $("#t1Form_status").html("");
                $("#feedVoltage").removeClass("is-invalid");

            }


            if (nearBlock == '' || nearBlock.length == 0 || nearBlock == null) {
                $("#nearBlock").addClass("is-invalid");
                $("#t1Form_status").html("All field is required").css("color", "red");
                return;
            } else {
                $("#t1Form_status").html("");
                $("#nearBlock").removeClass("is-invalid");

            }


            if (wireStatus == '' || wireStatus.length == 0 || wireStatus == null) {
                $("#wireStatus").addClass("is-invalid");
                $("#t1Form_status").html("All field is required").css("color", "red");
                return;
            } else {
                $("#t1Form_status").html("");
                $("#wireStatus").removeClass("is-invalid");

            }


            if (remark1 == '' || remark1.length == 0 || remark1 == null) {
                $("#remark1").addClass("is-invalid");
                $("#t1Form_status").html("Remark 1 is required").css("color", "red");
                return;
            } else {
                $("#t1Form_status").html("");
                $("#remark1").removeClass("is-invalid");

            }


            if (date2 == '' || date2.length == 0 || date2 == null) {
                $("#date2").addClass("is-invalid");
                $("#t1Form_status").html("Date 2 is required").css("color", "red");
                return;
            } else {
                $("#t1Form_status").html("");
                $("#date2").removeClass("is-invalid");

            }


            if (railVoltage == '' || railVoltage.length == 0 || railVoltage == null) {
                $("#railVoltage").addClass("is-invalid");
                $("#t1Form_status").html("All field is required").css("color", "red");
                return;
            } else {
                $("#t1Form_status").html("");
                $("#railVoltage").removeClass("is-invalid");

            }


            if (vt_value == '' || vt_value.length == 0 || vt_value == null) {
                $("#vt_value").addClass("is-invalid");
                $("#t1Form_status").html("All field is required").css("color", "red");
                return;
            } else {
                $("#t1Form_status").html("");
                $("#vt_value").removeClass("is-invalid");

            }


            if (wireStatus2 == '' || wireStatus2.length == 0 || wireStatus2 == null) {
                $("#wireStatus2").addClass("is-invalid");
                $("#t1Form_status").html("All field is required").css("color", "red");
                return;
            } else {
                $("#t1Form_status").html("");
                $("#wireStatus2").removeClass("is-invalid");

            }


            if (magneticPart == '' || magneticPart.length == 0 || magneticPart == null) {
                $("#magneticPart").addClass("is-invalid");
                $("#t1Form_status").html("All field is required").css("color", "red");
                return;
            } else {
                $("#t1Form_status").html("");
                $("#magneticPart").removeClass("is-invalid");

            }


            if (railFlag2 == '' || railFlag2.length == 0 || railFlag2 == null) {
                $("#railFlag2").addClass("is-invalid");
                $("#t1Form_status").html("All field is required").css("color", "red");
                return;
            } else {
                $("#t1Form_status").html("");
                $("#railFlag2").removeClass("is-invalid");

            }


            if (jumberwireStatus == '' || jumberwireStatus.length == 0 || jumberwireStatus == null) {
                $("#jumberwireStatus").addClass("is-invalid");
                $("#t1Form_status").html("All field is required").css("color", "red");
                return;
            } else {
                $("#t1Form_status").html("");
                $("#jumberwireStatus").removeClass("is-invalid");

            }


            if (remark2 == '' || remark2.length == 0 || remark2 == null) {
                $("#remark2").addClass("is-invalid");
                $("#t1Form_status").html("All field is required").css("color", "red");
                return;
            } else {
                $("#t1Form_status").html("");
                $("#remark2").removeClass("is-invalid");

            }

          





            let userID = '<?php echo $_SESSION['userretaileremp']; ?>';
            if(userID == '' || userID == null || userID == undefined){
                
                $("#t1Form_status").html("Something went wrong with user Id, Refresh the page and try again").css("color", "red");
                return
            }

            $.ajax({
                type: "POST",
                url: "query/action.php",
                data: {
                    "action": "T1_formSubmit",
                    "userID": userID,
                    "sectionName": sectionName,
                    "sectionId": sectionId,
                    "stationName": stationName,
                    "stationId": stationId,
                    "compoNameTmp": compoNameTmp,
                    "subcompoNameTmp": subcompoNameTmp,
                    "t1_1": t1_1,
                    "t1_2": t1_2,
                    "t1_3": t1_3,                  
                    "t1_4": t1_4,                  
                    "t1_5": t1_5,                  
                    "t1_6": t1_6,                  
                    "t1_7": t1_7,                  
                    "t1_8": t1_8,
                    date1:date1,
                    sale1_spg:sale1_spg,
                    sale1_v:sale1_v,
                    sale2_spg:sale2_spg,
                    sale2_v:sale2_v,
                    sale3_spg:sale3_spg,
                    sale3_v:sale3_v,
                    charging_v:charging_v,
                    charging_current:charging_current,
                    feedVoltage:feedVoltage,
                    nearBlock:nearBlock,
                    wireStatus:wireStatus,
                    remark1:remark1,
                    date2:date2,
                    railVoltage:railVoltage,
                    vt_value:vt_value,
                    wireStatus2:wireStatus2,
                    magneticPart:magneticPart,
                    railFlag2:railFlag2,
                    jumberwireStatus:jumberwireStatus,
                    remark2:remark2,
                    language:language

                },
                beforeSend: function() {
                    $("#loader_show").removeClass('d-none');

                },
                success: function(response) {
                    let respo = JSON.parse(response);
                    if (respo['status']) {
                        $("#t1Form_status").html(respo['msg']).css("color", "green");


                    } else {
                        $("#t1Form_status").html(respo['msg']).css("color", "red");

                    }
                },
                error: (e) => {
                    $("#t1Form_status").html(e).css("color", "red");

                },
                complete: function() {
                    $("#loader_show").addClass('d-none');
                    setTimeout(() => {
                        $("#t1Form_status").html("");


                    }, 5000);

                }
            });

        }
    });
    
    $("#t2FormBtn").click(function() {
        if (confirm("Do you want to final submit T2 Form")) {
            let language = $("#language").val();

            let sectionName = $("#sectionName").val();
            let sectionId = $("#sectionId").val();

            let stationName = $("#stationName").val();
            let stationId = $("#stationId").val();

            let compoNameTmp = $("#compoNameTmp").val();
            let subcompoNameTmp = $("#subcompoNameTmp").val();

            if (
                sectionName == "" || sectionName == null || sectionName == undefined ||
                sectionId == "" || sectionId == null || sectionId == undefined ||
                stationName == "" || stationName == null || stationName == undefined ||
                stationId == "" || stationId == null || stationId == undefined ||
                compoNameTmp == "" || compoNameTmp == null || compoNameTmp == undefined ||
                subcompoNameTmp == "" || subcompoNameTmp == null || subcompoNameTmp == undefined

            ) {
                alert("Something went wrong , refresh the page and try again");
                return;
            }

            let t2_1 = $("#t2_1").val();
            let t2_2 = $("#t2_2").val();
            let t2_3 = $("#t2_3").val();           

            if (t2_1 == '' || t2_1.length == 0 || t2_1 == null) {
                $("#t2_1").addClass("is-invalid");
                $("#t2Form_status").html("Serial no 1 is required").css("color", "red");
                return;
            } else {
                $("#t2Form_status").html("");
                $("#t2_1").removeClass("is-invalid");

            }

            if (t2_2 == '' || t2_2.length == 0 || t2_2 == null) {
                $("#t2_2").addClass("is-invalid");
                $("#t2Form_status").html("Serial no 2 is required").css("color", "red");
                return;
            } else {
                $("#t2Form_status").html("");
                $("#t2_2").removeClass("is-invalid");

            }

            if (t2_3 == '' || t2_3.length == 0 || t2_3 == null) {
                $("#t2_3").addClass("is-invalid");
                $("#t2Form_status").html("Serial no 3 is required").css("color", "red");
                return;
            } else {
                $("#t2Form_status").html("");
                $("#t2_3").removeClass("is-invalid");

            }


            let userID = '<?php echo $_SESSION['userretaileremp']; ?>';
            if(userID == '' || userID == null || userID == undefined){
                
                $("#t2Form_status").html("Something went wrong with user Id, Refresh the page and try again").css("color", "red");
                return
            }

            $.ajax({
                type: "POST",
                url: "query/action.php",
                data: {
                    "action": "T2_formSubmit",
                    "userID": userID,
                    "sectionName": sectionName,
                    "sectionId": sectionId,
                    "stationName": stationName,
                    "stationId": stationId,
                    "compoNameTmp": compoNameTmp,
                    "subcompoNameTmp": subcompoNameTmp,
                    "t2_1": t2_1,
                    "t2_2": t2_2,
                    "t2_3": t2_3,  
                    language:language                

                },
                beforeSend: function() {
                    $("#loader_show").removeClass('d-none');

                },
                success: function(response) {
                    let respo = JSON.parse(response);
                    if (respo['status']) {
                        $("#t2Form_status").html(respo['msg']).css("color", "green");


                    } else {
                        $("#t2Form_status").html(respo['msg']).css("color", "red");

                    }
                },
                error: (e) => {
                    $("#t2Form_status").html(e).css("color", "red");

                },
                complete: function() {
                    $("#loader_show").addClass('d-none');
                    setTimeout(() => {
                        $("#t2Form_status").html("");


                    }, 5000);

                }
            });

        }
    });

    $("#t3FormBtn").click(function() {
        if (confirm("Do you want to final submit T3 Form")) {
            let language = $("#language").val();

            let sectionName = $("#sectionName").val();
            let sectionId = $("#sectionId").val();

            let stationName = $("#stationName").val();
            let stationId = $("#stationId").val();

            let compoNameTmp = $("#compoNameTmp").val();
            let subcompoNameTmp = $("#subcompoNameTmp").val();

            if (
                sectionName == "" || sectionName == null || sectionName == undefined ||
                sectionId == "" || sectionId == null || sectionId == undefined ||
                stationName == "" || stationName == null || stationName == undefined ||
                stationId == "" || stationId == null || stationId == undefined ||
                compoNameTmp == "" || compoNameTmp == null || compoNameTmp == undefined ||
                subcompoNameTmp == "" || subcompoNameTmp == null || subcompoNameTmp == undefined

            ) {
                alert("Something went wrong , refresh the page and try again");
                return;
            }

            let t3_1 = $("#t3_1").val();
            let t3_2 = $("#t3_2").val();
            let t3_3 = $("#t3_3").val();           
            let t3_4 = $("#t3_4").val();           

            if (t3_1 == '' || t3_1.length == 0 || t3_1 == null) {
                $("#t3_1").addClass("is-invalid");
                $("#t3Form_status").html("Serial no 1 is required").css("color", "red");
                return;
            } else {
                $("#t3Form_status").html("");
                $("#t3_1").removeClass("is-invalid");

            }

            if (t3_2 == '' || t3_2.length == 0 || t3_2 == null) {
                $("#t3_2").addClass("is-invalid");
                $("#t3Form_status").html("Serial no 2 is required").css("color", "red");
                return;
            } else {
                $("#t3Form_status").html("");
                $("#t3_2").removeClass("is-invalid");

            }

            if (t3_3 == '' || t3_3.length == 0 || t3_3 == null) {
                $("#t3_3").addClass("is-invalid");
                $("#t3Form_status").html("Serial no 3 is required").css("color", "red");
                return;
            } else {
                $("#t3Form_status").html("");
                $("#t3_3").removeClass("is-invalid");

            }

            if (t3_4 == '' || t3_4.length == 0 || t3_4 == null) {
                $("#t3_4").addClass("is-invalid");
                $("#t3Form_status").html("Serial no 4 is required").css("color", "red");
                return;
            } else {
                $("#t3Form_status").html("");
                $("#t3_4").removeClass("is-invalid");

            }


            let userID = '<?php echo $_SESSION['userretaileremp']; ?>';
            if(userID == '' || userID == null || userID == undefined){
                
                $("#t2Form_status").html("Something went wrong with user Id, Refresh the page and try again").css("color", "red");
                return
            }

            $.ajax({
                type: "POST",
                url: "query/action.php",
                data: {
                    "action": "T3_formSubmit",
                    "userID": userID,
                    "sectionName": sectionName,
                    "sectionId": sectionId,
                    "stationName": stationName,
                    "stationId": stationId,
                    "compoNameTmp": compoNameTmp,
                    "subcompoNameTmp": subcompoNameTmp,
                    "t3_1": t3_1,
                    "t3_2": t3_2,
                    "t3_3": t3_3,                  
                    "t3_4": t3_4,   
                    language:language               

                },
                beforeSend: function() {
                    $("#loader_show").removeClass('d-none');

                },
                success: function(response) {
                    let respo = JSON.parse(response);
                    if (respo['status']) {
                        $("#t3Form_status").html(respo['msg']).css("color", "green");


                    } else {
                        $("#t3Form_status").html(respo['msg']).css("color", "red");

                    }
                },
                error: (e) => {
                    $("#t3Form_status").html(e).css("color", "red");

                },
                complete: function() {
                    $("#loader_show").addClass('d-none');
                    setTimeout(() => {
                        $("#t3Form_status").html("");


                    }, 5000);

                }
            });

        }
    });


    
    $("#t4FormBtn").click(function() {
        if (confirm("Do you want to final submit T4 Form")) {
            let language = $("#language").val();

            let sectionName = $("#sectionName").val();
            let sectionId = $("#sectionId").val();

            let stationName = $("#stationName").val();
            let stationId = $("#stationId").val();

            let compoNameTmp = $("#compoNameTmp").val();
            let subcompoNameTmp = $("#subcompoNameTmp").val();

            if (
                sectionName == "" || sectionName == null || sectionName == undefined ||
                sectionId == "" || sectionId == null || sectionId == undefined ||
                stationName == "" || stationName == null || stationName == undefined ||
                stationId == "" || stationId == null || stationId == undefined ||
                compoNameTmp == "" || compoNameTmp == null || compoNameTmp == undefined ||
                subcompoNameTmp == "" || subcompoNameTmp == null || subcompoNameTmp == undefined

            ) {
                alert("Something went wrong , refresh the page and try again");
                return;
            }

            let t4_1 = $("#t4_1").val();
            let t4_2 = $("#t4_2").val();
            let t4_3 = $("#t4_3").val();           
            let t4_4 = $("#t4_4").val();           
            let t4_5 = $("#t4_5").val();           

            if (t4_1 == '' || t4_1.length == 0 || t4_1 == null) {
                $("#t4_1").addClass("is-invalid");
                $("#t4Form_status").html("Serial no 1 is required").css("color", "red");
                return;
            } else {
                $("#t4Form_status").html("");
                $("#t4_1").removeClass("is-invalid");

            }

            if (t4_2 == '' || t4_2.length == 0 || t4_2 == null) {
                $("#t4_2").addClass("is-invalid");
                $("#t4Form_status").html("Serial no 2 is required").css("color", "red");
                return;
            } else {
                $("#t4Form_status").html("");
                $("#t4_2").removeClass("is-invalid");

            }

            if (t4_3 == '' || t4_3.length == 0 || t4_3 == null) {
                $("#t4_3").addClass("is-invalid");
                $("#t4Form_status").html("Serial no 3 is required").css("color", "red");
                return;
            } else {
                $("#t4Form_status").html("");
                $("#t4_3").removeClass("is-invalid");

            }

            
            if (t4_4 == '' || t4_4.length == 0 || t4_4 == null) {
                $("#t4_4").addClass("is-invalid");
                $("#t4Form_status").html("Serial no 4 is required").css("color", "red");
                return;
            } else {
                $("#t4Form_status").html("");
                $("#t4_4").removeClass("is-invalid");

            }

            
            if (t4_5 == '' || t4_5.length == 0 || t4_5 == null) {
                $("#t4_5").addClass("is-invalid");
                $("#t4Form_status").html("Serial no 5 is required").css("color", "red");
                return;
            } else {
                $("#t4Form_status").html("");
                $("#t4_5").removeClass("is-invalid");

            }


            let userID = '<?php echo $_SESSION['userretaileremp']; ?>';
            if(userID == '' || userID == null || userID == undefined){
                
                $("#t4Form_status").html("Something went wrong with user Id, Refresh the page and try again").css("color", "red");
                return
            }

            $.ajax({
                type: "POST",
                url: "query/action.php",
                data: {
                    "action": "T4_formSubmit",
                    "userID": userID,
                    "sectionName": sectionName,
                    "sectionId": sectionId,
                    "stationName": stationName,
                    "stationId": stationId,
                    "compoNameTmp": compoNameTmp,
                    "subcompoNameTmp": subcompoNameTmp,
                    "t4_1": t4_1,
                    "t4_2": t4_2,
                    "t4_3": t4_3,  
                    "t4_4": t4_4,  
                    "t4_5": t4_5,  
                    language:language                

                },
                beforeSend: function() {
                    $("#loader_show").removeClass('d-none');

                },
                success: function(response) {
                    let respo = JSON.parse(response);
                    if (respo['status']) {
                        $("#t4Form_status").html(respo['msg']).css("color", "green");


                    } else {
                        $("#t4Form_status").html(respo['msg']).css("color", "red");

                    }
                },
                error: (e) => {
                    $("#t4Form_status").html(e).css("color", "red");

                },
                complete: function() {
                    $("#loader_show").addClass('d-none');
                    setTimeout(() => {
                        $("#t4Form_status").html("");


                    }, 5000);

                }
            });

        }
    });

    $("#t5FormBtn").click(function() {
        if (confirm("Do you want to final submit T5 Form")) {
            let language = $("#language").val();

            let sectionName = $("#sectionName").val();
            let sectionId = $("#sectionId").val();

            let stationName = $("#stationName").val();
            let stationId = $("#stationId").val();

            let compoNameTmp = $("#compoNameTmp").val();
            let subcompoNameTmp = $("#subcompoNameTmp").val();

            if (
                sectionName == "" || sectionName == null || sectionName == undefined ||
                sectionId == "" || sectionId == null || sectionId == undefined ||
                stationName == "" || stationName == null || stationName == undefined ||
                stationId == "" || stationId == null || stationId == undefined ||
                compoNameTmp == "" || compoNameTmp == null || compoNameTmp == undefined ||
                subcompoNameTmp == "" || subcompoNameTmp == null || subcompoNameTmp == undefined

            ) {
                alert("Something went wrong , refresh the page and try again");
                return;
            }

            let t5_1 = $("#t5_1").val();
            let t5_2 = $("#t5_2").val();

            if (t5_1 == '' || t5_1.length == 0 || t5_1 == null) {
                $("#t5_1").addClass("is-invalid");
                $("#t5Form_status").html("Serial no 1 is required").css("color", "red");
                return;
            } else {
                $("#t5Form_status").html("");
                $("#t5_1").removeClass("is-invalid");

            }

            if (t5_2 == '' || t5_2.length == 0 || t5_2 == null) {
                $("#t5_2").addClass("is-invalid");
                $("#t5Form_status").html("Serial no 2 is required").css("color", "red");
                return;
            } else {
                $("#t5Form_status").html("");
                $("#t5_2").removeClass("is-invalid");

            }

           


            let userID = '<?php echo $_SESSION['userretaileremp']; ?>';
            if(userID == '' || userID == null || userID == undefined){
                
                $("#t2Form_status").html("Something went wrong with user Id, Refresh the page and try again").css("color", "red");
                return
            }

            $.ajax({
                type: "POST",
                url: "query/action.php",
                data: {
                    "action": "T5_formSubmit",
                    "userID": userID,
                    "sectionName": sectionName,
                    "sectionId": sectionId,
                    "stationName": stationName,
                    "stationId": stationId,
                    "compoNameTmp": compoNameTmp,
                    "subcompoNameTmp": subcompoNameTmp,
                    "t5_1": t5_1,
                    "t5_2": t5_2,
                    language:language
                },
                beforeSend: function() {
                    $("#loader_show").removeClass('d-none');

                },
                success: function(response) {
                    let respo = JSON.parse(response);
                    if (respo['status']) {
                        $("#t5Form_status").html(respo['msg']).css("color", "green");


                    } else {
                        $("#t5Form_status").html(respo['msg']).css("color", "red");

                    }
                },
                error: (e) => {
                    $("#t5Form_status").html(e).css("color", "red");

                },
                complete: function() {
                    $("#loader_show").addClass('d-none');
                    setTimeout(() => {
                        $("#t5Form_status").html("");


                    }, 5000);

                }
            });

        }
    });

    // CS 1 

    $("#cs1FormBtn").click(function() {
        
        if (confirm("Do you want to final submit CS1 Form")) {
            let language = $("#language").val();

            let sectionName = $("#sectionName").val();
            let sectionId = $("#sectionId").val();

            let stationName = $("#stationName").val();
            let stationId = $("#stationId").val();

            let compoNameTmp = $("#compoNameTmp").val();
            let subcompoNameTmp = $("#subcompoNameTmp").val();

            if (
                sectionName == "" || sectionName == null || sectionName == undefined ||
                sectionId == "" || sectionId == null || sectionId == undefined ||
                stationName == "" || stationName == null || stationName == undefined ||
                stationId == "" || stationId == null || stationId == undefined ||
                compoNameTmp == "" || compoNameTmp == null || compoNameTmp == undefined ||
                subcompoNameTmp == "" || subcompoNameTmp == null || subcompoNameTmp == undefined

            ) {
                alert("Something went wrong , refresh the page and try again");
                return;
            }

            let cs1_1 = $("#cs1_1").val();
            let cs1_2 = $("#cs1_2").val();
            let cs1_3 = $("#cs1_3").val();  

            let cs1_4 = $("#cs1_4").val();           
            let cs1_5 = $("#cs1_5").val();           
            let cs1_6 = $("#cs1_6").val();           
            let cs1_7 = $("#cs1_7").val();           
            let cs1_8 = $("#cs1_8").val(); 

            let cs1_9 = $("#cs1_9").val();   
            let cs1_10 = $("#cs1_10").val();   
            let cs1_11 = $("#cs1_11").val();   
            let cs1_12a = $("#cs1_12a").val();   
            let cs1_12b= $("#cs1_12b").val();   
            let cs1_12c = $("#cs1_12c").val();   

            let date = $("#date").val();    
            let rg = $("#rg").val();    
            let hg = $("#hg").val();    
            let dg = $("#dg").val();    
            let hhg = $("#hhg").val();    
            let route = $("#route").val();    
            let c_on = $("#c_on").val();    
            let shout = $("#shout").val();    
            let nut_bolt = $("#nut_bolt").val();    
            let dome_clean = $("#dome_clean").val();    
            let cover = $("#cover").val();    
            let remark = $("#remark").val();           
            

            if (cs1_1 == '' || cs1_1.length == 0 || cs1_1 == null) {
                $("#cs1_1").addClass("is-invalid");
                $("#cs1Form_status").html("Serial no 1 is required").css("color", "red");
                return;
            } else {
                $("#cs1Form_status").html("");
                $("#cs1_1").removeClass("is-invalid");

            }

           


            if (date == '' || date.length == 0 || date == null) {
                $("#date").addClass("is-invalid");
                $("#cs1Form_status").html("Date is required").css("color", "red");
                return;
            } else {
                $("#cs1Form_status").html("");
                $("#date").removeClass("is-invalid");

            }
            // //////

            if (rg == '' || rg.length == 0 || rg == null) {
                $("#rg").addClass("is-invalid");
                $("#cs1Form_status").html("Sale 1 SPG is required").css("color", "red");
                return;
            } else {
                $("#cs1Form_status").html("");
                $("#rg").removeClass("is-invalid");

            }

            if (hg == '' || hg.length == 0 || hg == null) {
                $("#hg").addClass("is-invalid");
                $("#cs1Form_status").html("Sale 1 Volt required").css("color", "red");
                return;
            } else {
                $("#cs1Form_status").html("");
                $("#hg").removeClass("is-invalid");

            }


            if (dg == '' || dg.length == 0 || dg == null) {
                $("#dg").addClass("is-invalid");
                $("#cs1Form_status").html("Sale 2 SPG is required").css("color", "red");
                return;
            } else {
                $("#cs1Form_status").html("");
                $("#dg").removeClass("is-invalid");

            }


            if (hhg == '' || hhg.length == 0 || hhg == null) {
                $("#hhg").addClass("is-invalid");
                $("#cs1Form_status").html("Sale 2 Volt is required").css("color", "red");
                return;
            } else {
                $("#cs1Form_status").html("");
                $("#hhg").removeClass("is-invalid");

            }


            if (route == '' || route.length == 0 || route == null) {
                $("#route").addClass("is-invalid");
                $("#cs1Form_status").html("Sale 3 SPG is required").css("color", "red");
                return;
            } else {
                $("#cs1Form_status").html("");
                $("#route").removeClass("is-invalid");

            }


            if (c_on == '' || c_on.length == 0 || c_on == null) {
                $("#c_on").addClass("is-invalid");
                $("#cs1Form_status").html("Sale 3 Volt is required").css("color", "red");
                return;
            } else {
                $("#cs1Form_status").html("");
                $("#c_on").removeClass("is-invalid");

            }


            if (shout == '' || shout.length == 0 || shout == null) {
                $("#shout").addClass("is-invalid");
                $("#cs1Form_status").html("All field is required").css("color", "red");
                return;
            } else {
                $("#cs1Form_status").html("");
                $("#shout").removeClass("is-invalid");

            }


            if (nut_bolt == '' || nut_bolt.length == 0 || nut_bolt == null) {
                $("#nut_bolt").addClass("is-invalid");
                $("#cs1Form_status").html("All field is required").css("color", "red");
                return;
            } else {
                $("#cs1Form_status").html("");
                $("#nut_bolt").removeClass("is-invalid");

            }


            if (cover == '' || cover.length == 0 || cover == null) {
                $("#cover").addClass("is-invalid");
                $("#cs1Form_status").html("All Field is required").css("color", "red");
                return;
            } else {
                $("#cs1Form_status").html("");
                $("#cover").removeClass("is-invalid");

            }


            if (remark == '' || remark.length == 0 || remark == null) {
                $("#remark").addClass("is-invalid");
                $("#cs1Form_status").html("All field is required").css("color", "red");
                return;
            } else {
                $("#cs1Form_status").html("");
                $("#remark").removeClass("is-invalid");

            }


             if (cs1_2 == '' || cs1_2.length == 0 || cs1_2 == null) {
                $("#cs1_2").addClass("is-invalid");
                $("#cs1Form_status").html("Serial no 2 is required").css("color", "red");
                return;
            } else {
                $("#cs1Form_status").html("");
                $("#cs1_2").removeClass("is-invalid");

            }

            if (cs1_3 == '' || cs1_3.length == 0 || cs1_3 == null) {
                $("#cs1_3").addClass("is-invalid");
                $("#cs1Form_status").html("Serial no 3 is required").css("color", "red");
                return;
            } else {
                $("#cs1Form_status").html("");
                $("#cs1_3").removeClass("is-invalid");

            }

            if (cs1_4 == '' || cs1_4.length == 0 || cs1_4 == null) {
                $("#cs1_4").addClass("is-invalid");
                $("#cs1Form_status").html("Serial no 4 is required").css("color", "red");
                return;
            } else {
                $("#cs1Form_status").html("");
                $("#cs1_4").removeClass("is-invalid");

            }

            if (cs1_5 == '' || cs1_5.length == 0 || cs1_5 == null) {
                $("#cs1_5").addClass("is-invalid");
                $("#cs1Form_status").html("Serial no 5 is required").css("color", "red");
                return;
            } else {
                $("#cs1Form_status").html("");
                $("#cs1_5").removeClass("is-invalid");

            }

            if (cs1_6 == '' || cs1_6.length == 0 || cs1_6 == null) {
                $("#cs1_6").addClass("is-invalid");
                $("#cs1Form_status").html("Serial no 6 is required").css("color", "red");
                return;
            } else {
                $("#cs1Form_status").html("");
                $("#cs1_6").removeClass("is-invalid");

            }

            if (cs1_7 == '' || cs1_7.length == 0 || cs1_7 == null) {
                $("#cs1_7").addClass("is-invalid");
                $("#cs1Form_status").html("Serial no 7 is required").css("color", "red");
                return;
            } else {
                $("#cs1Form_status").html("");
                $("#cs1_7").removeClass("is-invalid");

            }


            if (cs1_8 == '' || cs1_8.length == 0 || cs1_8 == null) {
                $("#cs1_8").addClass("is-invalid");
                $("#cs1Form_status").html("Serial no 8 is required").css("color", "red");
                return;
            } else {
                $("#cs1Form_status").html("");
                $("#cs1_8").removeClass("is-invalid");

            }

            if (cs1_9 == '' || cs1_9.length == 0 || cs1_9 == null) {
                $("#cs1_9").addClass("is-invalid");
                $("#cs1Form_status").html("Serial no 9 is required").css("color", "red");
                return;
            } else {
                $("#cs1Form_status").html("");
                $("#cs1_9").removeClass("is-invalid");

            }

            if (cs1_10 == '' || cs1_10.length == 0 || cs1_10 == null) {
                $("#cs1_10").addClass("is-invalid");
                $("#cs1Form_status").html("Serial no 10 is required").css("color", "red");
                return;
            } else {
                $("#cs1Form_status").html("");
                $("#cs1_10").removeClass("is-invalid");

            }

            if (cs1_11 == '' || cs1_11.length == 0 || cs1_11 == null) {
                $("#cs1_11").addClass("is-invalid");
                $("#cs1Form_status").html("Serial no 11 is required").css("color", "red");
                return;
            } else {
                $("#cs1Form_status").html("");
                $("#cs1_11").removeClass("is-invalid");

            }

            if (cs1_12a == '' || cs1_12a.length == 0 || cs1_12a == null) {
                $("#cs1_12a").addClass("is-invalid");
                $("#cs1Form_status").html("Serial no 12 A is required").css("color", "red");
                return;
            } else {
                $("#cs1Form_status").html("");
                $("#cs1_12a").removeClass("is-invalid");

            }

            if (cs1_12b == '' || cs1_12b.length == 0 || cs1_12b == null) {
                $("#cs1_12b").addClass("is-invalid");
                $("#cs1Form_status").html("Serial no 12 B is required").css("color", "red");
                return;
            } else {
                $("#cs1Form_status").html("");
                $("#cs1_12b").removeClass("is-invalid");

            }

            if (cs1_12c == '' || cs1_12c.length == 0 || cs1_12c == null) {
                $("#cs1_12c").addClass("is-invalid");
                $("#cs1Form_status").html("Serial no 12 C is required").css("color", "red");
                return;
            } else {
                $("#cs1Form_status").html("");
                $("#cs1_12c").removeClass("is-invalid");

            }


            let userID = '<?php echo $_SESSION['userretaileremp']; ?>';
            if(userID == '' || userID == null || userID == undefined){
                
                $("#cs1Form_status").html("Something went wrong with user Id, Refresh the page and try again").css("color", "red");
                return
            }

            $.ajax({
                type: "POST",
                url: "query/action.php",
                data: {
                    "action": "CS1_formSubmit",
                    "userID": userID,
                    "sectionName": sectionName,
                    "sectionId": sectionId,
                    "stationName": stationName,
                    "stationId": stationId,
                    "compoNameTmp": compoNameTmp,
                    "subcompoNameTmp": subcompoNameTmp,
                    "cs1_1": cs1_1,
                    "cs1_2": cs1_2,
                    "cs1_3": cs1_3,                  
                    "cs1_4": cs1_4,                  
                    "cs1_5": cs1_5,                  
                    "cs1_6": cs1_6,                  
                    "cs1_7": cs1_7,                  
                    "cs1_8": cs1_8,
                    "cs1_9": cs1_9,
                    "cs1_10": cs1_10,
                    "cs1_11": cs1_11,
                    "cs1_12a": cs1_12a,
                    "cs1_12b": cs1_12b,
                    "cs1_12c": cs1_12c,
                    date:date,
                    rg:rg,
                    hg:hg,
                    dg:dg,
                    hhg:hhg,
                    route:route,
                    c_on:c_on,
                    shout:shout,
                    nut_bolt:nut_bolt,
                    cover:cover,
                    remark:remark,    
                    language:language   

                },
                beforeSend: function() {
                    $("#loader_show").removeClass('d-none');

                },
                success: function(response) {
                    let respo = JSON.parse(response);
                    if (respo['status']) {
                        $("#cs1Form_status").html(respo['msg']).css("color", "green");


                    } else {
                        $("#cs1Form_status").html(respo['msg']).css("color", "red");

                    }
                },
                error: (e) => {
                    $("#cs1Form_status").html(e).css("color", "red");

                },
                complete: function() {
                    $("#loader_show").addClass('d-none');
                    setTimeout(() => {
                        $("#cs1Form_status").html("");


                    }, 5000);

                }
            });

        }
    });

    $("#cs2FormBtn").click(function() {
        
        if (confirm("Do you want to final submit CS2 Form")) {
            let language = $("#language").val();

            let sectionName = $("#sectionName").val();
            let sectionId = $("#sectionId").val();

            let stationName = $("#stationName").val();
            let stationId = $("#stationId").val();

            let compoNameTmp = $("#compoNameTmp").val();
            let subcompoNameTmp = $("#subcompoNameTmp").val();

            if (
                sectionName == "" || sectionName == null || sectionName == undefined ||
                sectionId == "" || sectionId == null || sectionId == undefined ||
                stationName == "" || stationName == null || stationName == undefined ||
                stationId == "" || stationId == null || stationId == undefined ||
                compoNameTmp == "" || compoNameTmp == null || compoNameTmp == undefined ||
                subcompoNameTmp == "" || subcompoNameTmp == null || subcompoNameTmp == undefined

            ) {
                alert("Something went wrong , refresh the page and try again");
                return;
            }

            let cs2_1 = $("#cs2_1").val();
            let cs2_2 = $("#cs2_2").val();
            let cs2_3 = $("#cs2_3").val();  

            let cs2_4 = $("#cs2_4").val();           
            let cs2_5a = $("#cs2_5a").val();           
            let cs2_5b = $("#cs2_5b").val();           
            let cs2_6 = $("#cs2_6").val();           
            let cs2_7 = $("#cs2_7").val();           
            
            if (cs2_1 == '' || cs2_1.length == 0 || cs2_1 == null) {
                $("#cs2_1").addClass("is-invalid");
                $("#cs2Form_status").html("Serial no 1 is required").css("color", "red");
                return;
            } else {
                $("#cs2Form_status").html("");
                $("#cs2_1").removeClass("is-invalid");

            }

           
             if (cs2_2 == '' || cs2_2.length == 0 || cs2_2 == null) {
                $("#cs2_2").addClass("is-invalid");
                $("#cs2Form_status").html("Serial no 2 is required").css("color", "red");
                return;
            } else {
                $("#cs2Form_status").html("");
                $("#cs2_2").removeClass("is-invalid");

            }

            if (cs2_3 == '' || cs2_3.length == 0 || cs2_3 == null) {
                $("#cs2_3").addClass("is-invalid");
                $("#cs2Form_status").html("Serial no 3 is required").css("color", "red");
                return;
            } else {
                $("#cs2Form_status").html("");
                $("#cs2_3").removeClass("is-invalid");

            }

            if (cs2_4 == '' || cs2_4.length == 0 || cs2_4 == null) {
                $("#cs2_4").addClass("is-invalid");
                $("#cs2Form_status").html("Serial no 4 is required").css("color", "red");
                return;
            } else {
                $("#cs2Form_status").html("");
                $("#cs2_4").removeClass("is-invalid");

            }

            if (cs2_5a == '' || cs2_5a.length == 0 || cs2_5a == null) {
                $("#cs2_5a").addClass("is-invalid");
                $("#cs2Form_status").html("Serial no 5 is required").css("color", "red");
                return;
            } else {
                $("#cs2Form_status").html("");
                $("#cs2_5a").removeClass("is-invalid");

            }
            if (cs2_5b == '' || cs2_5b.length == 0 || cs2_5b == null) {
                $("#cs2_5b").addClass("is-invalid");
                $("#cs2Form_status").html("Serial no 5 is required").css("color", "red");
                return;
            } else {
                $("#cs2Form_status").html("");
                $("#cs2_5b").removeClass("is-invalid");

            }

            if (cs2_6 == '' || cs2_6.length == 0 || cs2_6 == null) {
                $("#cs2_6").addClass("is-invalid");
                $("#cs2Form_status").html("Serial no 6 is required").css("color", "red");
                return;
            } else {
                $("#cs2Form_status").html("");
                $("#cs2_6").removeClass("is-invalid");

            }

            if (cs2_7 == '' || cs2_7.length == 0 || cs2_7 == null) {
                $("#cs2_7").addClass("is-invalid");
                $("#cs2Form_status").html("Serial no 7 is required").css("color", "red");
                return;
            } else {
                $("#cs2Form_status").html("");
                $("#cs2_7").removeClass("is-invalid");

            }


           

            let userID = '<?php echo $_SESSION['userretaileremp']; ?>';
            if(userID == '' || userID == null || userID == undefined){
                
                $("#cs1Form_status").html("Something went wrong with user Id, Refresh the page and try again").css("color", "red");
                return
            }

            $.ajax({
                type: "POST",
                url: "query/action.php",
                data: {
                    "action": "CS2_formSubmit",
                    "userID": userID,
                    "sectionName": sectionName,
                    "sectionId": sectionId,
                    "stationName": stationName,
                    "stationId": stationId,
                    "compoNameTmp": compoNameTmp,
                    "subcompoNameTmp": subcompoNameTmp,
                    "cs2_1": cs2_1,
                    "cs2_2": cs2_2,
                    "cs2_3": cs2_3,                  
                    "cs2_4": cs2_4,                  
                    "cs2_5a": cs2_5a,                  
                    "cs2_5b": cs2_5b,                  
                    "cs2_6": cs2_6,                  
                    "cs2_7": cs2_7,
                    language:language                    
                },
                beforeSend: function() {
                    $("#loader_show").removeClass('d-none');

                },
                success: function(response) {
                    let respo = JSON.parse(response);
                    if (respo['status']) {
                        $("#cs2Form_status").html(respo['msg']).css("color", "green");


                    } else {
                        $("#cs2Form_status").html(respo['msg']).css("color", "red");

                    }
                },
                error: (e) => {
                    $("#cs2Form_status").html(e).css("color", "red");

                },
                complete: function() {
                    $("#loader_show").addClass('d-none');
                    setTimeout(() => {
                        $("#cs2Form_status").html("");


                    }, 5000);

                }
            });

        }
    });

    // DL 1

    $("#dl1FormBtn").click(function() {
        
        if (confirm("Do you want to final submit DL1 Form")) {
            let language = $("#language").val();

            let sectionName = $("#sectionName").val();
            let sectionId = $("#sectionId").val();

            let stationName = $("#stationName").val();
            let stationId = $("#stationId").val();

            let compoNameTmp = $("#compoNameTmp").val();
            let subcompoNameTmp = $("#subcompoNameTmp").val();

            if (
                sectionName == "" || sectionName == null || sectionName == undefined ||
                sectionId == "" || sectionId == null || sectionId == undefined ||
                stationName == "" || stationName == null || stationName == undefined ||
                stationId == "" || stationId == null || stationId == undefined ||
                compoNameTmp == "" || compoNameTmp == null || compoNameTmp == undefined ||
                subcompoNameTmp == "" || subcompoNameTmp == null || subcompoNameTmp == undefined

            ) {
                alert("Something went wrong , refresh the page and try again");
                return;
            }

            let dl1_1 = $("#dl1_1").val();
            let dl1_2 = $("#dl1_2").val();
            let dl1_3 = $("#dl1_3").val();  

            let dl1_4 = $("#dl1_4").val();           
            let dl1_5 = $("#dl1_5").val();           
            let dl1_6 = $("#dl1_6").val();           
            let dl1_7 = $("#dl1_7").val();           
            let dl1_8a = $("#dl1_8a").val();           
            let dl1_8b = $("#dl1_8b").val();           
            let dl1_9 = $("#dl1_9").val();           
            
            if (dl1_1 == '' || dl1_1.length == 0 || dl1_1 == null) {
                $("#dl1_1").addClass("is-invalid");
                $("#dl1Form_status").html("Serial no 1 is required").css("color", "red");
                return;
            } else {
                $("#dl1Form_status").html("");
                $("#dl1_1").removeClass("is-invalid");

            }

           
             if (dl1_2 == '' || dl1_2.length == 0 || dl1_2 == null) {
                $("#dl1_2").addClass("is-invalid");
                $("#dl1Form_status").html("Serial no 2 is required").css("color", "red");
                return;
            } else {
                $("#dl1Form_status").html("");
                $("#dl1_2").removeClass("is-invalid");

            }

            if (dl1_3 == '' || dl1_3.length == 0 || dl1_3 == null) {
                $("#dl1_3").addClass("is-invalid");
                $("#dl1Form_status").html("Serial no 3 is required").css("color", "red");
                return;
            } else {
                $("#dl1Form_status").html("");
                $("#dl1_3").removeClass("is-invalid");

            }

            if (dl1_4 == '' || dl1_4.length == 0 || dl1_4 == null) {
                $("#dl1_4").addClass("is-invalid");
                $("#dl1Form_status").html("Serial no 4 is required").css("color", "red");
                return;
            } else {
                $("#dl1Form_status").html("");
                $("#dl1_4").removeClass("is-invalid");

            }

            if (dl1_5 == '' || dl1_5.length == 0 || dl1_5 == null) {
                $("#dl1_5").addClass("is-invalid");
                $("#dl1Form_status").html("Serial no 5 is required").css("color", "red");
                return;
            } else {
                $("#dl1Form_status").html("");
                $("#dl1_5").removeClass("is-invalid");

            }
         

            if (dl1_6 == '' || dl1_6.length == 0 || dl1_6 == null) {
                $("#dl1_6").addClass("is-invalid");
                $("#dl1Form_status").html("Serial no 6 is required").css("color", "red");
                return;
            } else {
                $("#dl1Form_status").html("");
                $("#dl1_6").removeClass("is-invalid");

            }

            if (dl1_7 == '' || dl1_7.length == 0 || dl1_7 == null) {
                $("#dl1_7").addClass("is-invalid");
                $("#dl1Form_status").html("Serial no 7 is required").css("color", "red");
                return;
            } else {
                $("#dl1Form_status").html("");
                $("#dl1_7").removeClass("is-invalid");

            }

            if (dl1_8a == '' || dl1_8a.length == 0 || dl1_8a == null) {
                $("#dl1_8a").addClass("is-invalid");
                $("#dl1Form_status").html("Serial no 8A is required").css("color", "red");
                return;
            } else {
                $("#dl1Form_status").html("");
                $("#dl1_8a").removeClass("is-invalid");

            }

            if (dl1_8b == '' || dl1_8b.length == 0 || dl1_8b == null) {
                $("#dl1_8b").addClass("is-invalid");
                $("#dl1Form_status").html("Serial no 8B is required").css("color", "red");
                return;
            } else {
                $("#dl1Form_status").html("");
                $("#dl1_8b").removeClass("is-invalid");

            }

            if (dl1_9 == '' || dl1_9.length == 0 || dl1_9 == null) {
                $("#dl1_9").addClass("is-invalid");
                $("#dl1Form_status").html("Serial no 9 is required").css("color", "red");
                return;
            } else {
                $("#dl1Form_status").html("");
                $("#dl1_9").removeClass("is-invalid");

            }


           

            let userID = '<?php echo $_SESSION['userretaileremp']; ?>';
            if(userID == '' || userID == null || userID == undefined){
                
                $("#dl1Form_status").html("Something went wrong with user Id, Refresh the page and try again").css("color", "red");
                return
            }

            $.ajax({
                type: "POST",
                url: "query/action.php",
                data: {
                    "action": "DL1_formSubmit",
                    "userID": userID,
                    "sectionName": sectionName,
                    "sectionId": sectionId,
                    "stationName": stationName,
                    "stationId": stationId,
                    "compoNameTmp": compoNameTmp,
                    "subcompoNameTmp": subcompoNameTmp,
                    "dl1_1": dl1_1,
                    "dl1_2": dl1_2,
                    "dl1_3": dl1_3,                  
                    "dl1_4": dl1_4,                  
                    "dl1_5": dl1_5,                  
                    "dl1_6": dl1_6,                  
                    "dl1_7": dl1_7,                    
                    "dl1_8a": dl1_8a,                    
                    "dl1_8b": dl1_8b,                    
                    "dl1_9": dl1_9,  
                    language:language                  
                },
                beforeSend: function() {
                    $("#loader_show").removeClass('d-none');

                },
                success: function(response) {
                    let respo = JSON.parse(response);
                    if (respo['status']) {
                        $("#dl1Form_status").html(respo['msg']).css("color", "green");


                    } else {
                        $("#dl1Form_status").html(respo['msg']).css("color", "red");

                    }
                },
                error: (e) => {
                    $("#dl1Form_status").html(e).css("color", "red");

                },
                complete: function() {
                    $("#loader_show").addClass('d-none');
                    setTimeout(() => {
                        $("#dl1Form_status").html("");


                    }, 5000);

                }
            });

        }
    });

    $("#dl2FormBtn").click(function() {
        
        if (confirm("Do you want to final submit DL2 Form")) {
            let language = $("#language").val();

            let sectionName = $("#sectionName").val();
            let sectionId = $("#sectionId").val();

            let stationName = $("#stationName").val();
            let stationId = $("#stationId").val();

            let compoNameTmp = $("#compoNameTmp").val();
            let subcompoNameTmp = $("#subcompoNameTmp").val();

            if (
                sectionName == "" || sectionName == null || sectionName == undefined ||
                sectionId == "" || sectionId == null || sectionId == undefined ||
                stationName == "" || stationName == null || stationName == undefined ||
                stationId == "" || stationId == null || stationId == undefined ||
                compoNameTmp == "" || compoNameTmp == null || compoNameTmp == undefined ||
                subcompoNameTmp == "" || subcompoNameTmp == null || subcompoNameTmp == undefined

            ) {
                alert("Something went wrong , refresh the page and try again");
                return;
            }

            let dl2_1 = $("#dl2_1").val();
            let dl2_2 = $("#dl2_2").val();
            let dl2_3 = $("#dl2_3").val(); 
            // let dl2_3b = $("#dl2_3b").val();           
                     
            
            if (dl2_1 == '' || dl2_1.length == 0 || dl2_1 == null) {
                $("#dl2_1").addClass("is-invalid");
                $("#dl2Form_status").html("Serial no 1 is required").css("color", "red");
                return;
            } else {
                $("#dl2Form_status").html("");
                $("#dl2_1").removeClass("is-invalid");

            }

           
             if (dl2_2 == '' || dl2_2.length == 0 || dl2_2 == null) {
                $("#dl2_2").addClass("is-invalid");
                $("#dl2Form_status").html("Serial no 2 is required").css("color", "red");
                return;
            } else {
                $("#dl2Form_status").html("");
                $("#dl2_2").removeClass("is-invalid");

            }

            if (dl2_3 == '' || dl2_3.length == 0 || dl2_3 == null) {
                $("#dl2_3").addClass("is-invalid");
                $("#dl2Form_status").html("Serial no 3 is required").css("color", "red");
                return;
            } else {
                $("#dl2Form_status").html("");
                $("#dl2_3").removeClass("is-invalid");

            }

            // if (dl2_3b == '' || dl2_3b.length == 0 || dl2_3b == null) {
            //     $("#dl2_3b").addClass("is-invalid");
            //     $("#dl2Form_status").html("Serial no 4 is required").css("color", "red");
            //     return;
            // } else {
            //     $("#dl2Form_status").html("");
            //     $("#dl2_3b").removeClass("is-invalid");

            // }


            let userID = '<?php echo $_SESSION['userretaileremp']; ?>';
            if(userID == '' || userID == null || userID == undefined){
                
                $("#dl2Form_status").html("Something went wrong with user Id, Refresh the page and try again").css("color", "red");
                return
            }

            $.ajax({
                type: "POST",
                url: "query/action.php",
                data: {
                    "action": "DL2_formSubmit",
                    "userID": userID,
                    "sectionName": sectionName,
                    "sectionId": sectionId,
                    "stationName": stationName,
                    "stationId": stationId,
                    "compoNameTmp": compoNameTmp,
                    "subcompoNameTmp": subcompoNameTmp,
                    "dl2_1": dl2_1,
                    "dl2_2": dl2_2,
                    "dl2_3": dl2_3,                  
                    // "dl2_3b": dl2_3b,  
                    language:language                
                                      
                },
                beforeSend: function() {
                    $("#loader_show").removeClass('d-none');

                },
                success: function(response) {
                    let respo = JSON.parse(response);
                    if (respo['status']) {
                        $("#dl2Form_status").html(respo['msg']).css("color", "green");


                    } else {
                        $("#dl2Form_status").html(respo['msg']).css("color", "red");

                    }
                },
                error: (e) => {
                    $("#dl2Form_status").html(e).css("color", "red");

                },
                complete: function() {
                    $("#loader_show").addClass('d-none');
                    setTimeout(() => {
                        $("#dl2Form_status").html("");

                    }, 5000);

                }
            });

        }
    });

    $("#dl3FormBtn").click(function() {
        
        if (confirm("Do you want to final submit DL3 Form")) {
            let language = $("#language").val();

            let sectionName = $("#sectionName").val();
            let sectionId = $("#sectionId").val();

            let stationName = $("#stationName").val();
            let stationId = $("#stationId").val();

            let compoNameTmp = $("#compoNameTmp").val();
            let subcompoNameTmp = $("#subcompoNameTmp").val();

            if (
                sectionName == "" || sectionName == null || sectionName == undefined ||
                sectionId == "" || sectionId == null || sectionId == undefined ||
                stationName == "" || stationName == null || stationName == undefined ||
                stationId == "" || stationId == null || stationId == undefined ||
                compoNameTmp == "" || compoNameTmp == null || compoNameTmp == undefined ||
                subcompoNameTmp == "" || subcompoNameTmp == null || subcompoNameTmp == undefined

            ) {
                alert("Something went wrong , refresh the page and try again");
                return;
            }

            let dl3_1 = $("#dl3_1").val();
            let dl3_2 = $("#dl3_2").val();          
            let dl3_3 = $("#dl3_3").val();         
            
            if (dl3_1 == '' || dl3_1.length == 0 || dl3_1 == null) {
                $("#dl3_1").addClass("is-invalid");
                $("#dl3Form_status").html("Serial no 1 is required").css("color", "red");
                return;
            } else {
                $("#dl3Form_status").html("");
                $("#dl3_1").removeClass("is-invalid");

            }

           
             if (dl3_2 == '' || dl3_2.length == 0 || dl3_2 == null) {
                $("#dl3_2").addClass("is-invalid");
                $("#dl3Form_status").html("Serial no 2 is required").css("color", "red");
                return;
            } else {
                $("#dl3Form_status").html("");
                $("#dl3_2").removeClass("is-invalid");

            }
            
            if (dl3_3 == '' || dl3_3.length == 0 || dl3_3 == null) {
                $("#dl3_3").addClass("is-invalid");
                $("#dl3Form_status").html("Serial no 3 is required").css("color", "red");
                return;
            } else {
                $("#dl3Form_status").html("");
                $("#dl3_3").removeClass("is-invalid");

            }



            let userID = '<?php echo $_SESSION['userretaileremp']; ?>';
            if(userID == '' || userID == null || userID == undefined){
                
                $("#dl3Form_status").html("Something went wrong with user Id, Refresh the page and try again").css("color", "red");
                return
            }

            $.ajax({
                type: "POST",
                url: "query/action.php",
                data: {
                    "action": "DL3_formSubmit",
                    "userID": userID,
                    "sectionName": sectionName,
                    "sectionId": sectionId,
                    "stationName": stationName,
                    "stationId": stationId,
                    "compoNameTmp": compoNameTmp,
                    "subcompoNameTmp": subcompoNameTmp,
                    "dl3_1": dl3_1,
                    "dl3_2": dl3_2, 
                    "dl3_3": dl3_3, 
                    language:language                 
                                      
                },
                beforeSend: function() {
                    $("#loader_show").removeClass('d-none');

                },
                success: function(response) {
                    let respo = JSON.parse(response);
                    if (respo['status']) {
                        $("#dl3Form_status").html(respo['msg']).css("color", "green");


                    } else {
                        $("#dl3Form_status").html(respo['msg']).css("color", "red");

                    }
                },
                error: (e) => {
                    $("#dl3Form_status").html(e).css("color", "red");

                },
                complete: function() {
                    $("#loader_show").addClass('d-none');
                    setTimeout(() => {
                        $("#dl3Form_status").html("");

                    }, 5000);

                }
            });

        }
    });

    $("#dl4FormBtn").click(function() {
        
        if (confirm("Do you want to final submit DL4 Form")) {
            let language = $("#language").val();

            let sectionName = $("#sectionName").val();
            let sectionId = $("#sectionId").val();

            let stationName = $("#stationName").val();
            let stationId = $("#stationId").val();

            let compoNameTmp = $("#compoNameTmp").val();
            let subcompoNameTmp = $("#subcompoNameTmp").val();

            if (
                sectionName == "" || sectionName == null || sectionName == undefined ||
                sectionId == "" || sectionId == null || sectionId == undefined ||
                stationName == "" || stationName == null || stationName == undefined ||
                stationId == "" || stationId == null || stationId == undefined ||
                compoNameTmp == "" || compoNameTmp == null || compoNameTmp == undefined ||
                subcompoNameTmp == "" || subcompoNameTmp == null || subcompoNameTmp == undefined

            ) {
                alert("Something went wrong , refresh the page and try again");
                return;
            }

            let dl4_1 = $("#dl4_1").val();
            let dl4_2 = $("#dl4_2").val();
            let dl4_3 = $("#dl4_3").val(); 
            let dl4_4 = $("#dl4_4").val(); 
                     
            
            if (dl4_1 == '' || dl4_1.length == 0 || dl4_1 == null) {
                $("#dl4_1").addClass("is-invalid");
                $("#dl4Form_status").html("Serial no 1 is required").css("color", "red");
                return;
            } else {
                $("#dl4Form_status").html("");
                $("#dl4_1").removeClass("is-invalid");

            }

           
             if (dl4_2 == '' || dl4_2.length == 0 || dl4_2 == null) {
                $("#dl4_2").addClass("is-invalid");
                $("#dl4Form_status").html("Serial no 2 is required").css("color", "red");
                return;
            } else {
                $("#dl4Form_status").html("");
                $("#dl4_2").removeClass("is-invalid");

            }

            if (dl4_3 == '' || dl4_3.length == 0 || dl4_3 == null) {
                $("#dl4_3").addClass("is-invalid");
                $("#dl4Form_status").html("Serial no 3 is required").css("color", "red");
                return;
            } else {
                $("#dl4Form_status").html("");
                $("#dl4_3").removeClass("is-invalid");

            }
            
            if (dl4_4 == '' || dl4_4.length == 0 || dl4_4 == null) {
                $("#dl4_4").addClass("is-invalid");
                $("#dl4Form_status").html("Serial no 4 is required").css("color", "red");
                return;
            } else {
                $("#dl4Form_status").html("");
                $("#dl4_4").removeClass("is-invalid");

            }


            let userID = '<?php echo $_SESSION['userretaileremp']; ?>';
            if(userID == '' || userID == null || userID == undefined){
                
                $("#dl4Form_status").html("Something went wrong with user Id, Refresh the page and try again").css("color", "red");
                return
            }

            $.ajax({
                type: "POST",
                url: "query/action.php",
                data: {
                    "action": "DL4_formSubmit",
                    "userID": userID,
                    "sectionName": sectionName,
                    "sectionId": sectionId,
                    "stationName": stationName,
                    "stationId": stationId,
                    "compoNameTmp": compoNameTmp,
                    "subcompoNameTmp": subcompoNameTmp,
                    "dl4_1": dl4_1,
                    "dl4_2": dl4_2,
                    "dl4_3": dl4_3,   
                    "dl4_4": dl4_4,   
                    language:language               
                                      
                },
                beforeSend: function() {
                    $("#loader_show").removeClass('d-none');

                },
                success: function(response) {
                    let respo = JSON.parse(response);
                    if (respo['status']) {
                        $("#dl4Form_status").html(respo['msg']).css("color", "green");


                    } else {
                        $("#dl4Form_status").html(respo['msg']).css("color", "red");

                    }
                },
                error: (e) => {
                    $("#dl4Form_status").html(e).css("color", "red");

                },
                complete: function() {
                    $("#loader_show").addClass('d-none');
                    setTimeout(() => {
                        $("#dl4Form_status").html("");

                    }, 5000);

                }
            });

        }
    });


    $("#mlb1FormBtn").click(function() {
        if (confirm("Do you want to final submit MLB1 Form")) {
            let language = $("#language").val();
            let sectionName = $("#sectionName").val();
            let sectionId = $("#sectionId").val();

            let stationName = $("#stationName").val();
            let stationId = $("#stationId").val();

            let compoNameTmp = $("#compoNameTmp").val();
            let subcompoNameTmp = $("#subcompoNameTmp").val();

            if (
                sectionName == "" || sectionName == null || sectionName == undefined ||
                sectionId == "" || sectionId == null || sectionId == undefined ||
                stationName == "" || stationName == null || stationName == undefined ||
                stationId == "" || stationId == null || stationId == undefined ||
                compoNameTmp == "" || compoNameTmp == null || compoNameTmp == undefined ||
                subcompoNameTmp == "" || subcompoNameTmp == null || subcompoNameTmp == undefined

            ) {
                alert("Something went wrong , refresh the page and try again");
                return;
            }

            let mlb1_1 = $("#mlb1_1").val();
            let mlb1_2 = $("#mlb1_2").val();
            let mlb1_3 = $("#mlb1_3").val();
            let mlb1_4 = $("#mlb1_4").val();
            let mlb1_5 = $("#mlb1_5").val();
            let mlb1_6 = $("#mlb1_6").val();
            
            if (mlb1_1 == undefined  || mlb1_1 == null || mlb1_1 == '' || mlb1_1.length == 0) {
                $("#mlb1_1").addClass("is-invalid");
                $("#mlb1Form_status").html("Serial no 1 is required").css("color", "red");
                return;
            } else {
                $("#mlb1Form_status").html("");
                $("#mlb1_1").removeClass("is-invalid");

            }

            if (mlb1_2 == undefined  || mlb1_2 == null || mlb1_2 == '' || mlb1_2.length == 0) {
                $("#mlb1_2").addClass("is-invalid");
                $("#mlb1Form_status").html("Serial no 2 is required").css("color", "red");
                return;
            } else {
                $("#mlb1Form_status").html("");
                $("#mlb1_2").removeClass("is-invalid");

            }

            if (mlb1_3 == undefined  || mlb1_3 == null || mlb1_3 == '' || mlb1_3.length == 0) {
                $("#mlb1_3").addClass("is-invalid");
                $("#mlb1Form_status").html("Serial no 3 is required").css("color", "red");
                return;
            } else {
                $("#mlb1Form_status").html("");
                $("#mlb1_3").removeClass("is-invalid");

            }

            if (mlb1_4 == undefined  || mlb1_4 == null || mlb1_4 == '' || mlb1_4.length == 0) {
                $("#mlb1_4").addClass("is-invalid");
                $("#mlb1Form_status").html("Serial no 4 is required").css("color", "red");
                return;
            } else {
                $("#mlb1Form_status").html("");
                $("#mlb1_4").removeClass("is-invalid");

            }

            if (mlb1_5 == undefined  || mlb1_5 == null || mlb1_5 == '' || mlb1_5.length == 0) {
                $("#mlb1_5").addClass("is-invalid");
                $("#mlb1Form_status").html("Serial no 5 is required").css("color", "red");
                return;
            } else {
                $("#mlb1Form_status").html("");
                $("#mlb1_5").removeClass("is-invalid");

            }

            if (mlb1_6 == undefined  || mlb1_6 == null || mlb1_6 == '' || mlb1_6.length == 0) {
                $("#mlb1_6").addClass("is-invalid");
                $("#mlb1Form_status").html("Serial no 6 is required").css("color", "red");
                return;
            } else {
                $("#mlb1Form_status").html("");
                $("#mlb1_6").removeClass("is-invalid");

            }



            let userID = '<?php echo $_SESSION['userretaileremp']; ?>';
            if(userID == '' || userID == null || userID == undefined){
                
                $("#mlb1Form_status").html("Something went wrong with user Id, Refresh the page and try again").css("color", "red");
                return
            }

            $.ajax({
                type: "POST",
                url: "query/action.php",
                data: {
                    "action": "MLB1_formSubmit",
                    "userID": userID,
                    "sectionName": sectionName,
                    "sectionId": sectionId,
                    "stationName": stationName,
                    "stationId": stationId,
                    "compoNameTmp": compoNameTmp,
                    "subcompoNameTmp": subcompoNameTmp,
                    "mlb1_1": mlb1_1,
                    "mlb1_2": mlb1_2,
                    "mlb1_3": mlb1_3,
                    "mlb1_4": mlb1_4,
                    "mlb1_5": mlb1_5,
                    "mlb1_6": mlb1_6,              
                    "language":language
                },
                beforeSend: function() {
                    $("#loader_show").removeClass('d-none');

                },
                success: function(response) {
                    let respo = JSON.parse(response);
                    if (respo['status']) {
                        $("#mlb1Form_status").html(respo['msg']).css("color", "green");


                    } else {
                        $("#mlb1Form_status").html(respo['msg']).css("color", "red");

                    }
                },
                complete: function() {
                    $("#loader_show").addClass('d-none');

                }
            });

        }
    });

    
    $("#mlb2FormBtn").click(function() {
        if (confirm("Do you want to final submit MLB2 Form")) {
            let language = $("#language").val();
            let sectionName = $("#sectionName").val();
            let sectionId = $("#sectionId").val();

            let stationName = $("#stationName").val();
            let stationId = $("#stationId").val();

            let compoNameTmp = $("#compoNameTmp").val();
            let subcompoNameTmp = $("#subcompoNameTmp").val();

            if (
                sectionName == "" || sectionName == null || sectionName == undefined ||
                sectionId == "" || sectionId == null || sectionId == undefined ||
                stationName == "" || stationName == null || stationName == undefined ||
                stationId == "" || stationId == null || stationId == undefined ||
                compoNameTmp == "" || compoNameTmp == null || compoNameTmp == undefined ||
                subcompoNameTmp == "" || subcompoNameTmp == null || subcompoNameTmp == undefined

            ) {
                alert("Something went wrong , refresh the page and try again");
                return;
            }

            let mlb2_1 = $("#mlb2_1").val();
            let mlb2_2 = $("#mlb2_2").val();
         
            
            if (mlb2_1 == undefined  || mlb2_1 == null || mlb2_1 == '' || mlb2_1.length == 0) {
                $("#mlb2_1").addClass("is-invalid");
                $("#mlb2Form_status").html("Serial no 1 is required").css("color", "red");
                return;
            } else {
                $("#mlb2Form_status").html("");
                $("#mlb2_1").removeClass("is-invalid");

            }

            if (mlb2_2 == undefined  || mlb2_2 == null || mlb2_2 == '' || mlb2_2.length == 0) {
                $("#mlb2_2").addClass("is-invalid");
                $("#mlb2Form_status").html("Serial no 2 is required").css("color", "red");
                return;
            } else {
                $("#mlb2Form_status").html("");
                $("#mlb2_2").removeClass("is-invalid");

            }






            let userID = '<?php echo $_SESSION['userretaileremp']; ?>';
            if(userID == '' || userID == null || userID == undefined){
                
                $("#mlb2Form_status").html("Something went wrong with user Id, Refresh the page and try again").css("color", "red");
                return
            }

            $.ajax({
                type: "POST",
                url: "query/action.php",
                data: {
                    "action": "MLB2_formSubmit",
                    "userID": userID,
                    "sectionName": sectionName,
                    "sectionId": sectionId,
                    "stationName": stationName,
                    "stationId": stationId,
                    "compoNameTmp": compoNameTmp,
                    "subcompoNameTmp": subcompoNameTmp,
                    "mlb2_1": mlb2_1,
                    "mlb2_2": mlb2_2,
                               
                    "language":language
                },
                beforeSend: function() {
                    $("#loader_show").removeClass('d-none');

                },
                success: function(response) {
                    let respo = JSON.parse(response);
                    if (respo['status']) {
                        $("#mlb2Form_status").html(respo['msg']).css("color", "green");


                    } else {
                        $("#mlb2Form_status").html(respo['msg']).css("color", "red");

                    }
                },
                complete: function() {
                    $("#loader_show").addClass('d-none');

                }
            });

        }
    });


    $("#mlb3FormBtn").click(function() {
        if (confirm("Do you want to final submit MLB3 Form")) {
            let language = $("#language").val();
            let sectionName = $("#sectionName").val();
            let sectionId = $("#sectionId").val();

            let stationName = $("#stationName").val();
            let stationId = $("#stationId").val();

            let compoNameTmp = $("#compoNameTmp").val();
            let subcompoNameTmp = $("#subcompoNameTmp").val();

            if (
                sectionName == "" || sectionName == null || sectionName == undefined ||
                sectionId == "" || sectionId == null || sectionId == undefined ||
                stationName == "" || stationName == null || stationName == undefined ||
                stationId == "" || stationId == null || stationId == undefined ||
                compoNameTmp == "" || compoNameTmp == null || compoNameTmp == undefined ||
                subcompoNameTmp == "" || subcompoNameTmp == null || subcompoNameTmp == undefined

            ) {
                alert("Something went wrong , refresh the page and try again");
                return;
            }

            let mlb3_1 = $("#mlb3_1").val();
         
            
            if (mlb3_1 == undefined  || mlb3_1 == null || mlb3_1 == '' || mlb3_1.length == 0) {
                $("#mlb3_1").addClass("is-invalid");
                $("#mlb3Form_status").html("Serial no 1 is required").css("color", "red");
                return;
            } else {
                $("#mlb3Form_status").html("");
                $("#mlb3_1").removeClass("is-invalid");

            }


            let userID = '<?php echo $_SESSION['userretaileremp']; ?>';
            if(userID == '' || userID == null || userID == undefined){
                
                $("#mlb3Form_status").html("Something went wrong with user Id, Refresh the page and try again").css("color", "red");
                return
            }

            $.ajax({
                type: "POST",
                url: "query/action.php",
                data: {
                    "action": "MLB3_formSubmit",
                    "userID": userID,
                    "sectionName": sectionName,
                    "sectionId": sectionId,
                    "stationName": stationName,
                    "stationId": stationId,
                    "compoNameTmp": compoNameTmp,
                    "subcompoNameTmp": subcompoNameTmp,
                    "mlb3_1": mlb3_1,
                               
                    "language":language
                },
                beforeSend: function() {
                    $("#loader_show").removeClass('d-none');

                },
                success: function(response) {
                    let respo = JSON.parse(response);
                    if (respo['status']) {
                        $("#mlb3Form_status").html(respo['msg']).css("color", "green");


                    } else {
                        $("#mlb3Form_status").html(respo['msg']).css("color", "red");

                    }
                },
                complete: function() {
                    $("#loader_show").addClass('d-none');

                }
            });

        }
    });



//for DAC1
    $("#dac1FormBtn").click(function() {
        if (confirm("Do you want to final submit DAC1 Form")) {
            let language = $("#language").val();
            let sectionName = $("#sectionName").val();
            let sectionId = $("#sectionId").val();

            let stationName = $("#stationName").val();
            let stationId = $("#stationId").val();

            let compoNameTmp = $("#compoNameTmp").val();
            let subcompoNameTmp = $("#subcompoNameTmp").val();

            if (
                sectionName == "" || sectionName == null || sectionName == undefined ||
                sectionId == "" || sectionId == null || sectionId == undefined ||
                stationName == "" || stationName == null || stationName == undefined ||
                stationId == "" || stationId == null || stationId == undefined ||
                compoNameTmp == "" || compoNameTmp == null || compoNameTmp == undefined ||
                subcompoNameTmp == "" || subcompoNameTmp == null || subcompoNameTmp == undefined

            ) {
                alert("Something went wrong , refresh the page and try again");
                return;
            }

            let dac1_1 = $("#dac1_1").val();
            let dac1_2 = $("#dac1_2").val();
             let dac1_3 = $("#dac1_3").val();
            let dac1_4 = $("#dac1_4").val();
             let dac1_5 = $("#dac1_5").val();
            let dac1_6 = $("#dac1_6").val();
             let dac1_7 = $("#dac1_7").val();
             let dac1_8 = $("#dac1_8").val();
            let dac1_9 = $("#dac1_9").val();
             let dac1_10 = $("#dac1_10").val();
            let dac1_11 = $("#dac1_11").val();
             let dac1_12 = $("#dac1_12").val();
            let dac1_13 = $("#dac1_13").val();
             let dac1_14 = $("#dac1_14").val();
             let dac1_15 = $("#dac1_15").val();
            
            if (dac1_1 == undefined  || dac1_1 == null || dac1_1 == '' || dac1_1.length == 0) {
                $("#dac1_1").addClass("is-invalid");
                $("#dac1Form_status").html("Serial no 1 is required").css("color", "red");
                return;
            } else {
                $("#dac1Form_status").html("");
                $("#dac1_1").removeClass("is-invalid");

            }

            if (dac1_2 == undefined  || dac1_2 == null || dac1_2 == '' || dac1_2.length == 0) {
                $("#dac1_2").addClass("is-invalid");
                $("#dac1Form_status").html("Serial no 2 is required").css("color", "red");
                return;
            } else {
                $("#dac1Form_status").html("");
                $("#dac1_2").removeClass("is-invalid");

            }


              if (dac1_3 == undefined  || dac1_3 == null || dac1_3 == '' || dac1_3.length == 0) {
                $("#dac1_3").addClass("is-invalid");
                $("#dac1Form_status").html("Serial no 3 is required").css("color", "red");
                return;
            } else {
                $("#dac1Form_status").html("");
                $("#dac1_3").removeClass("is-invalid");

            }

              if (dac1_4 == undefined  || dac1_4 == null || dac1_4 == '' || dac1_4.length == 0) {
                $("#dac1_4").addClass("is-invalid");
                $("#dac1Form_status").html("Serial no 4 is required").css("color", "red");
                return;
            } else {
                $("#dac1Form_status").html("");
                $("#dac1_4").removeClass("is-invalid");

            }

            if (dac1_5 == undefined  || dac1_5 == null || dac1_5 == '' || dac1_5.length == 0) {
                $("#dac1_5").addClass("is-invalid");
                $("#dac1Form_status").html("Serial no 5 is required").css("color", "red");
                return;
            } else {
                $("#dac1Form_status").html("");
                $("#dac1_4").removeClass("is-invalid");

            }

            if (dac1_6 == undefined  || dac1_6 == null || dac1_6 == '' || dac1_6.length == 0) {
                $("#dac1_6").addClass("is-invalid");
                $("#dac1Form_status").html("Serial no 6 is required").css("color", "red");
                return;
            } else {
                $("#dac1Form_status").html("");
                $("#dac1_6").removeClass("is-invalid");

            }

            if (dac1_7 == undefined  || dac1_7 == null || dac1_7 == '' || dac1_7.length == 0) {
                $("#dac1_7").addClass("is-invalid");
                $("#dac1Form_status").html("Serial no 7 is required").css("color", "red");
                return;
            } else {
                $("#dac1Form_status").html("");
                $("#dac1_7").removeClass("is-invalid");

            }

              if (dac1_8 == undefined  || dac1_8 == null || dac1_8 == '' || dac1_8.length == 0) {
                $("#dac1_8").addClass("is-invalid");
                $("#dac1Form_status").html("Serial no 8 is required").css("color", "red");
                return;
            } else {
                $("#dac1Form_status").html("");
                $("#dac1_8").removeClass("is-invalid");

            }


              if (dac1_9 == undefined  || dac1_9 == null || dac1_9 == '' || dac1_9.length == 0) {
                $("#dac1_9").addClass("is-invalid");
                $("#dac1Form_status").html("Serial no 9 is required").css("color", "red");
                return;
            } else {
                $("#dac1Form_status").html("");
                $("#dac1_9").removeClass("is-invalid");

            }


              if (dac1_10 == undefined  || dac1_10 == null || dac1_10 == '' || dac1_10.length == 0) {
                $("#dac1_10").addClass("is-invalid");
                $("#dac1Form_status").html("Serial no 10 is required").css("color", "red");
                return;
            } else {
                $("#dac1Form_status").html("");
                $("#dac1_10").removeClass("is-invalid");

            }

              if (dac1_11 == undefined  || dac1_11 == null || dac1_11 == '' || dac1_11.length == 0) {
                $("#dac1_11").addClass("is-invalid");
                $("#dac1Form_status").html("Serial no 11 is required").css("color", "red");
                return;
            } else {
                $("#dac1Form_status").html("");
                $("#dac1_11").removeClass("is-invalid");

            }

              if (dac1_12 == undefined  || dac1_12 == null || dac1_12 == '' || dac1_12.length == 0) {
                $("#dac1_12").addClass("is-invalid");
                $("#dac1Form_status").html("Serial no 12 is required").css("color", "red");
                return;
            } else {
                $("#dac1Form_status").html("");
                $("#dac1_12").removeClass("is-invalid");

            }

              if (dac1_13 == undefined  || dac1_13 == null || dac1_13 == '' || dac1_13.length == 0) {
                $("#dac1_13").addClass("is-invalid");
                $("#dac1Form_status").html("Serial no 13 is required").css("color", "red");
                return;
            } else {
                $("#dac1Form_status").html("");
                $("#dac1_13").removeClass("is-invalid");

            }

              if (dac1_14 == undefined  || dac1_14 == null || dac1_14 == '' || dac1_14.length == 0) {
                $("#dac1_14").addClass("is-invalid");
                $("#dac1Form_status").html("Serial no 14 is required").css("color", "red");
                return;
            } else {
                $("#dac1Form_status").html("");
                $("#dac1_14").removeClass("is-invalid");

            }

              if (dac1_15 == undefined  || dac1_15 == null || dac1_15 == '' || dac1_15.length == 0) {
                $("#dac1_15").addClass("is-invalid");
                $("#dac1Form_status").html("Serial no 15 is required").css("color", "red");
                return;
            } else {
                $("#dac1Form_status").html("");
                $("#dac1_15").removeClass("is-invalid");

            }

            let userID = '<?php echo $_SESSION['userretaileremp']; ?>';
            if(userID == '' || userID == null || userID == undefined){
                
                $("#dac1Form_status").html("Something went wrong with user Id, Refresh the page and try again").css("color", "red");
                return
            }

            $.ajax({
                type: "POST",
                url: "query/action.php",
                data: {
                    "action": "DAC1_formSubmit",
                    "userID": userID,
                    "sectionName": sectionName,
                    "sectionId": sectionId,
                    "stationName": stationName,
                    "stationId": stationId,
                    "compoNameTmp": compoNameTmp,
                    "subcompoNameTmp": subcompoNameTmp,
                    "dac1_1": dac1_1,
                    "dac1_2": dac1_2,
                     "dac1_3": dac1_3,
                    "dac1_4": dac1_4,
                    "dac1_5": dac1_5,
                    "dac1_6": dac1_6,
                    "dac1_7": dac1_7,
                    "dac1_8": dac1_8,
                    "dac1_9": dac1_9,
                     "dac1_10": dac1_10,
                    "dac1_11": dac1_11,
                    "dac1_12": dac1_12,
                    "dac1_13": dac1_13,
                    "dac1_14": dac1_14,        
                    "dac1_14": dac1_14,        
                    "dac1_15": dac1_15,        
                    "language":language
                },
                beforeSend: function() {
                    $("#loader_show").removeClass('d-none');

                },
                success: function(response) {
                    let respo = JSON.parse(response);
                    if (respo['status']) {
                        $("#dac1Form_status").html(respo['msg']).css("color", "green");


                    } else {
                        $("#dac1Form_status").html(respo['msg']).css("color", "red");

                    }
                },
                complete: function() {
                    $("#loader_show").addClass('d-none');

                }
            });
        }
        
    });

//for DAC2
    $("#dac2FormBtn").click(function() {
        if (confirm("Do you want to final submit DAC3 Form")) {
            let language = $("#language").val();
            let sectionName = $("#sectionName").val();
            let sectionId = $("#sectionId").val();

            let stationName = $("#stationName").val();
            let stationId = $("#stationId").val();

            let compoNameTmp = $("#compoNameTmp").val();
            let subcompoNameTmp = $("#subcompoNameTmp").val();

            if (
                sectionName == "" || sectionName == null || sectionName == undefined ||
                sectionId == "" || sectionId == null || sectionId == undefined ||
                stationName == "" || stationName == null || stationName == undefined ||
                stationId == "" || stationId == null || stationId == undefined ||
                compoNameTmp == "" || compoNameTmp == null || compoNameTmp == undefined ||
                subcompoNameTmp == "" || subcompoNameTmp == null || subcompoNameTmp == undefined

            ) {
                alert("Something went wrong , refresh the page and try again");
                return;
            }

            let dac2_1 = $("#dac2_1").val();
            let dac2_2 = $("#dac2_2").val();
             let dac2_3 = $("#dac2_3").val();
            let dac2_4 = $("#dac2_4").val();
             let dac2_5 = $("#dac2_5").val();
            let dac2_6 = $("#dac2_6").val();
             let dac2_7 = $("#dac2_7").val();
            
            if (dac2_1 == undefined  || dac2_1 == null || dac2_1 == '' || dac2_1.length == 0) {
                $("#dac2_1").addClass("is-invalid");
                $("#dac2Form_status").html("Serial no 1 is required").css("color", "red");
                return;
            } else {
                $("#dac2Form_status").html("");
                $("#dac2_1").removeClass("is-invalid");

            }

            if (dac2_2 == undefined  || dac2_2 == null || dac2_2 == '' || dac2_2.length == 0) {
                $("#dac2_2").addClass("is-invalid");
                $("#dac2Form_status").html("Serial no 2 is required").css("color", "red");
                return;
            } else {
                $("#dac2Form_status").html("");
                $("#dac2_2").removeClass("is-invalid");

            }


              if (dac2_3 == undefined  || dac2_3 == null || dac2_3 == '' || dac2_3.length == 0) {
                $("#dac2_3").addClass("is-invalid");
                $("#dac2Form_status").html("Serial no 3 is required").css("color", "red");
                return;
            } else {
                $("#dac2Form_status").html("");
                $("#dac2_3").removeClass("is-invalid");

            }

              if (dac2_4 == undefined  || dac2_4 == null || dac2_4 == '' || dac2_4.length == 0) {
                $("#dac2_4").addClass("is-invalid");
                $("#dac2Form_status").html("Serial no 4 is required").css("color", "red");
                return;
            } else {
                $("#dac2Form_status").html("");
                $("#dac2_4").removeClass("is-invalid");

            }

            if (dac2_5 == undefined  || dac2_5 == null || dac2_5 == '' || dac2_5.length == 0) {
                $("#dac2_5").addClass("is-invalid");
                $("#dac2Form_status").html("Serial no 5 is required").css("color", "red");
                return;
            } else {
                $("#dac2Form_status").html("");
                $("#dac5_4").removeClass("is-invalid");

            }

            if (dac2_6 == undefined  || dac2_6 == null || dac2_6 == '' || dac2_6.length == 0) {
                $("#dac2_6").addClass("is-invalid");
                $("#dac2Form_status").html("Serial no 6 is required").css("color", "red");
                return;
            } else {
                $("#dac2Form_status").html("");
                $("#dac2_6").removeClass("is-invalid");

            }

            if (dac2_7 == undefined  || dac2_7 == null || dac2_7 == '' || dac2_7.length == 0) {
                $("#dac2_7").addClass("is-invalid");
                $("#dac2Form_status").html("Serial no 7 is required").css("color", "red");
                return;
            } else {
                $("#dac2Form_status").html("");
                $("#dac2_7").removeClass("is-invalid");

            }

            let userID = '<?php echo $_SESSION['userretaileremp']; ?>';
            if(userID == '' || userID == null || userID == undefined){
                
                $("#dacForm_status").html("Something went wrong with user Id, Refresh the page and try again").css("color", "red");
                return
            }

            $.ajax({
                type: "POST",
                url: "query/action.php",
                data: {
                    "action": "DAC2_formSubmit",
                    "userID": userID,
                    "sectionName": sectionName,
                    "sectionId": sectionId,
                    "stationName": stationName,
                    "stationId": stationId,
                    "compoNameTmp": compoNameTmp,
                    "subcompoNameTmp": subcompoNameTmp,
                    "dac2_1": dac2_1,
                    "dac2_2": dac2_2,
                     "dac2_3": dac2_3,
                    "dac2_4": dac2_4,
                    "dac2_5": dac2_5,
                    "dac2_6": dac2_6,
                    "dac2_7": dac2_7,
                              
                    "language":language
                },
                beforeSend: function() {
                    $("#loader_show").removeClass('d-none');

                },
                success: function(response) {
                    let respo = JSON.parse(response);
                    if (respo['status']) {
                        $("#dac2Form_status").html(respo['msg']).css("color", "green");


                    } else {
                        $("#dac2Form_status").html(respo['msg']).css("color", "red");

                    }
                },
                complete: function() {
                    $("#loader_show").addClass('d-none');

                }
            });

        }
    });

 // for DAC3
    $("#dac3FormBtn").click(function() {
        if (confirm("Do you want to final submit DAC3 Form")) {
            let language = $("#language").val();
            let sectionName = $("#sectionName").val();
            let sectionId = $("#sectionId").val();

            let stationName = $("#stationName").val();
            let stationId = $("#stationId").val();

            let compoNameTmp = $("#compoNameTmp").val();
            let subcompoNameTmp = $("#subcompoNameTmp").val();

            if (
                sectionName == "" || sectionName == null || sectionName == undefined ||
                sectionId == "" || sectionId == null || sectionId == undefined ||
                stationName == "" || stationName == null || stationName == undefined ||
                stationId == "" || stationId == null || stationId == undefined ||
                compoNameTmp == "" || compoNameTmp == null || compoNameTmp == undefined ||
                subcompoNameTmp == "" || subcompoNameTmp == null || subcompoNameTmp == undefined

            ) {
                alert("Something went wrong , refresh the page and try again");
                return;
            }

            let dac3_1 = $("#dac3_1").val();
            let dac3_2 = $("#dac3_2").val();
         
            
            if (dac3_1 == undefined  || dac3_1 == null || dac3_1 == '' || dac3_1.length == 0) {
                $("#dac3_1").addClass("is-invalid");
                $("#dac3Form_status").html("Serial no 1 is required").css("color", "red");
                return;
            } else {
                $("#dac3Form_status").html("");
                $("#dac3_1").removeClass("is-invalid");

            }

            if (dac3_2 == undefined  || dac3_2 == null || dac3_2 == '' || dac3_2.length == 0) {
                $("#dac3_2").addClass("is-invalid");
                $("#dac3Form_status").html("Serial no 2 is required").css("color", "red");
                return;
            } else {
                $("#dac3Form_status").html("");
                $("#dac3_2").removeClass("is-invalid");

            }






            let userID = '<?php echo $_SESSION['userretaileremp']; ?>';
            if(userID == '' || userID == null || userID == undefined){
                
                $("#dac3Form_status").html("Something went wrong with user Id, Refresh the page and try again").css("color", "red");
                return
            }

            $.ajax({
                type: "POST",
                url: "query/action.php",
                data: {
                    "action": "DAC3_formSubmit",
                    "userID": userID,
                    "sectionName": sectionName,
                    "sectionId": sectionId,
                    "stationName": stationName,
                    "stationId": stationId,
                    "compoNameTmp": compoNameTmp,
                    "subcompoNameTmp": subcompoNameTmp,
                    "dac3_1": dac3_1,
                    "dac3_2": dac3_2,
                               
                    "language":language
                },
                beforeSend: function() {
                    $("#loader_show").removeClass('d-none');

                },
                success: function(response) {
                    let respo = JSON.parse(response);
                    if (respo['status']) {
                        $("#dac3Form_status").html(respo['msg']).css("color", "green");


                    } else {
                        $("#dac3Form_status").html(respo['msg']).css("color", "red");

                    }
                },
                complete: function() {
                    $("#loader_show").addClass('d-none');

                }
            });

        }
    });

// for SLB1

 
$("#slb1FormBtn").click(function() {
        if (confirm("Do you want to final submit SLB1 Form")) {
            let language = $("#language").val();
            let sectionName = $("#sectionName").val();
            let sectionId = $("#sectionId").val();

            let stationName = $("#stationName").val();
            let stationId = $("#stationId").val();

            let compoNameTmp = $("#compoNameTmp").val();
            let subcompoNameTmp = $("#subcompoNameTmp").val();

            if (
                sectionName == "" || sectionName == null || sectionName == undefined ||
                sectionId == "" || sectionId == null || sectionId == undefined ||
                stationName == "" || stationName == null || stationName == undefined ||
                stationId == "" || stationId == null || stationId == undefined ||
                compoNameTmp == "" || compoNameTmp == null || compoNameTmp == undefined ||
                subcompoNameTmp == "" || subcompoNameTmp == null || subcompoNameTmp == undefined

            ) {
                alert("Something went wrong , refresh the page and try again");
                return;
            }

            let slb1_1 = $("#slb1_1").val();
            let slb1_2 = $("#slb1_2").val();
            let slb1_3 = $("#slb1_3").val();
            let slb1_4 = $("#slb1_4").val();
            let slb1_5 = $("#slb1_5").val();
            let slb1_6 = $("#slb1_6").val();
            let slb1_7 = $("#slb1_7").val();
            
            if (slb1_1 == undefined  || slb1_1 == null || slb1_1 == '' || slb1_1.length == 0) {
                $("#slb1_1").addClass("is-invalid");
                $("#slb1Form_status").html("Serial no 1 is required").css("color", "red");
                return;
            } else {
                $("#slb1Form_status").html("");
                $("#slb1_1").removeClass("is-invalid");

            }

            if (slb1_2 == undefined  || slb1_2 == null || slb1_2 == '' || slb1_2.length == 0) {
                $("#slb1_2").addClass("is-invalid");
                $("#slb1Form_status").html("Serial no 2 is required").css("color", "red");
                return;
            } else {
                $("#slb1Form_status").html("");
                $("#slb1_2").removeClass("is-invalid");

            }

            if (slb1_3 == undefined  || slb1_3 == null || slb1_3 == '' || slb1_3.length == 0) {
                $("#slb1_3").addClass("is-invalid");
                $("#slb1Form_status").html("Serial no 3 is required").css("color", "red");
                return;
            } else {
                $("#slb1Form_status").html("");
                $("#slb1_3").removeClass("is-invalid");

            }

            if (slb1_4 == undefined  || slb1_4 == null || slb1_4 == '' || slb1_4.length == 0) {
                $("#slb1_4").addClass("is-invalid");
                $("#slb1Form_status").html("Serial no 4 is required").css("color", "red");
                return;
            } else {
                $("#slb1Form_status").html("");
                $("#slb1_4").removeClass("is-invalid");

            }

            if (slb1_5 == undefined  || slb1_5 == null || slb1_5 == '' || slb1_5.length == 0) {
                $("#slb1_5").addClass("is-invalid");
                $("#slb1Form_status").html("Serial no 5 is required").css("color", "red");
                return;
            } else {
                $("#slb1Form_status").html("");
                $("#slb1_5").removeClass("is-invalid");

            }

            if (slb1_6 == undefined  || slb1_6 == null || slb1_6 == '' || slb1_6.length == 0) {
                $("#slb1_6").addClass("is-invalid");
                $("#slb1Form_status").html("Serial no 6 is required").css("color", "red");
                return;
            } else {
                $("#slb1Form_status").html("");
                $("#slb1_6").removeClass("is-invalid");

            }

            if (slb1_7 == undefined  || slb1_7 == null || slb1_7 == '' || slb1_7.length == 0) {
                $("#slb1_7").addClass("is-invalid");
                $("#slb1Form_status").html("Serial no 7 is required").css("color", "red");
                return;
            } else {
                $("#slb1Form_status").html("");
                $("#slb1_7").removeClass("is-invalid");

            }

            let userID = '<?php echo $_SESSION['userretaileremp']; ?>';
            if(userID == '' || userID == null || userID == undefined){
                
                $("#slb1Form_status").html("Something went wrong with user Id, Refresh the page and try again").css("color", "red");
                return
            }

            $.ajax({
                type: "POST",
                url: "query/action.php",
                data: {
                    "action": "SLB1_formSubmit",
                    "userID": userID,
                    "sectionName": sectionName,
                    "sectionId": sectionId,
                    "stationName": stationName,
                    "stationId": stationId,
                    "compoNameTmp": compoNameTmp,
                    "subcompoNameTmp": subcompoNameTmp,
                    "slb1_1": slb1_1,
                    "slb1_2": slb1_2,
                    "slb1_3": slb1_3,
                    "slb1_4": slb1_4,
                    "slb1_5": slb1_5,
                    "slb1_6": slb1_6,              
                    "slb1_7": slb1_7,              
                    "language":language
                },
                beforeSend: function() {
                    $("#loader_show").removeClass('d-none');

                },
                success: function(response) {
                    let respo = JSON.parse(response);
                    if (respo['status']) {
                        $("#slb1Form_status").html(respo['msg']).css("color", "green");


                    } else {
                        $("#slb1Form_status").html(respo['msg']).css("color", "red");

                    }
                },
                complete: function() {
                    $("#loader_show").addClass('d-none');

                }
            });

        }
    });


// for SLB2

 $("#slb2FormBtn").click(function() {
        if (confirm("Do you want to final submit SLB2 Form")) {
            let language = $("#language").val();
            let sectionName = $("#sectionName").val();
            let sectionId = $("#sectionId").val();

            let stationName = $("#stationName").val();
            let stationId = $("#stationId").val();

            let compoNameTmp = $("#compoNameTmp").val();
            let subcompoNameTmp = $("#subcompoNameTmp").val();

            if (
                sectionName == "" || sectionName == null || sectionName == undefined ||
                sectionId == "" || sectionId == null || sectionId == undefined ||
                stationName == "" || stationName == null || stationName == undefined ||
                stationId == "" || stationId == null || stationId == undefined ||
                compoNameTmp == "" || compoNameTmp == null || compoNameTmp == undefined ||
                subcompoNameTmp == "" || subcompoNameTmp == null || subcompoNameTmp == undefined

            ) {
                alert("Something went wrong , refresh the page and try again");
                return;
            }

            let slb2_1 = $("#slb2_1").val();
            let slb2_2 = $("#slb2_2").val();
            let slb2_3 = $("#slb2_3").val();
            let slb2_4 = $("#slb2_4").val();
         
            
            if (slb2_1 == undefined  || slb2_1 == null || slb1_2 == '' || slb1_2.length == 0) {
                $("#slb2_1").addClass("is-invalid");
                $("#slb2Form_status").html("Serial no 1 is required").css("color", "red");
                return;
            } else {
                $("#slb2Form_status").html("");
                $("#slb2_1").removeClass("is-invalid");

            }

            if (slb2_2 == undefined  || slb2_2 == null || slb2_2 == '' || slb2_2.length == 0) {
                $("#slb2_2").addClass("is-invalid");
                $("#slb2Form_status").html("Serial no 2 is required").css("color", "red");
                return;
            } else {
                $("#slb2Form_status").html("");
                $("#slb2_2").removeClass("is-invalid");

            }

            if (slb2_3 == undefined  || slb2_3 == null || slb2_3 == '' || slb2_3.length == 0) {
                $("#slb2_3").addClass("is-invalid");
                $("#slb2Form_status").html("Serial no 3 is required").css("color", "red");
                return;
            } else {
                $("#slb2Form_status").html("");
                $("#slb2_3").removeClass("is-invalid");

            }

            if (slb2_4 == undefined  || slb2_4 == null || slb2_4 == '' || slb2_4.length == 0) {
                $("#slb2_4").addClass("is-invalid");
                $("#slb2Form_status").html("Serial no 4 is required").css("color", "red");
                return;
            } else {
                $("#slb2Form_status").html("");
                $("#slb2_4").removeClass("is-invalid");

            }

           

            let userID = '<?php echo $_SESSION['userretaileremp']; ?>';
            if(userID == '' || userID == null || userID == undefined){
                
                $("#slb2Form_status").html("Something went wrong with user Id, Refresh the page and try again").css("color", "red");
                return
            }

            $.ajax({
                type: "POST",
                url: "query/action.php",
                data: {
                    "action": "SLB2_formSubmit",
                    "userID": userID,
                    "sectionName": sectionName,
                    "sectionId": sectionId,
                    "stationName": stationName,
                    "stationId": stationId,
                    "compoNameTmp": compoNameTmp,
                    "subcompoNameTmp": subcompoNameTmp,
                    "slb2_1": slb2_1,
                    "slb2_2": slb2_2,
                    "slb2_3": slb2_3,
                    "slb2_4": slb2_4,
                               
                    "language":language
                },
                beforeSend: function() {
                    $("#loader_show").removeClass('d-none');

                },
                success: function(response) {
                    let respo = JSON.parse(response);
                    if (respo['status']) {
                        $("#slb2Form_status").html(respo['msg']).css("color", "green");


                    } else {
                        $("#slb2Form_status").html(respo['msg']).css("color", "red");

                    }
                },
                complete: function() {
                    $("#loader_show").addClass('d-none');

                }
            });

        }
    });


    // for ELB1


 
    $("#elb1FormBtn").click(function() {
        if (confirm("Do you want to final submit ELB1 Form")) {
            let language = $("#language").val();
            let sectionName = $("#sectionName").val();
            let sectionId = $("#sectionId").val();

            let stationName = $("#stationName").val();
            let stationId = $("#stationId").val();

            let compoNameTmp = $("#compoNameTmp").val();
            let subcompoNameTmp = $("#subcompoNameTmp").val();

            if (
                sectionName == "" || sectionName == null || sectionName == undefined ||
                sectionId == "" || sectionId == null || sectionId == undefined ||
                stationName == "" || stationName == null || stationName == undefined ||
                stationId == "" || stationId == null || stationId == undefined ||
                compoNameTmp == "" || compoNameTmp == null || compoNameTmp == undefined ||
                subcompoNameTmp == "" || subcompoNameTmp == null || subcompoNameTmp == undefined

            ) {
                alert("Something went wrong , refresh the page and try again");
                return;
            }

            let elb1_1 = $("#elb1_1").val();
            let elb1_2 = $("#elb1_2").val();
            let elb1_3 = $("#elb1_3").val();
            let elb1_4 = $("#elb1_4").val();
            let elb1_5 = $("#elb1_5").val();
            let elb1_6 = $("#elb1_6").val();
            let elb1_7 = $("#elb1_7").val();
            let elb1_8 = $("#elb1_8").val();
            let elb1_9 = $("#elb1_9").val();
            let elb1_10 = $("#elb1_10").val();
            let elb1_11 = $("#elb1_11").val();


            if (elb1_1 == undefined  || elb1_1 == null || elb1_1 == '' || elb1_1.length == 0) {
                $("#elb1_1").addClass("is-invalid");
                $("#elb1Form_status").html("Serial no 1 is required").css("color", "red");
                return;
            } else {
                $("#elb1Form_status").html("");
                $("#elb1_1").removeClass("is-invalid");

            }

            if (elb1_2 == undefined  || elb1_2 == null || elb1_2 == '' || elb1_2.length == 0) {
                $("#elb1_2").addClass("is-invalid");
                $("#elb1Form_status").html("Serial no 2 is required").css("color", "red");
                return;
            } else {
                $("#elb1Form_status").html("");
                $("#elb1_2").removeClass("is-invalid");

            }

            if (elb1_3 == undefined  || elb1_3 == null || elb1_3 == '' || elb1_3.length == 0) {
                $("#elb1_3").addClass("is-invalid");
                $("#elb1Form_status").html("Serial no 3 is required").css("color", "red");
                return;
            } else {
                $("#elb1Form_status").html("");
                $("#elb1_3").removeClass("is-invalid");

            }

            if (elb1_4 == undefined  || elb1_4 == null || elb1_4 == '' || elb1_4.length == 0) {
                $("#elb1_4").addClass("is-invalid");
                $("#elb1Form_status").html("Serial no 4 is required").css("color", "red");
                return;
            } else {
                $("#elb1Form_status").html("");
                $("#elb1_4").removeClass("is-invalid");

            }

            if (elb1_5 == undefined  || elb1_5 == null || elb1_5 == '' || elb1_5.length == 0) {
                $("#elb1_5").addClass("is-invalid");
                $("#elb1Form_status").html("Serial no 5 is required").css("color", "red");
                return;
            } else {
                $("#elb1Form_status").html("");
                $("#elb1_5").removeClass("is-invalid");

            }

            if (elb1_6 == undefined  || elb1_6 == null || elb1_6 == '' || elb1_6.length == 0) {
                $("#elb1_6").addClass("is-invalid");
                $("#elb1Form_status").html("Serial no 6 is required").css("color", "red");
                return;
            } else {
                $("#elb1Form_status").html("");
                $("#elb1_6").removeClass("is-invalid");

            }

            if (elb1_7 == undefined  || elb1_7 == null || elb1_7 == '' || elb1_7.length == 0) {
                $("#elb1_7").addClass("is-invalid");
                $("#elb1Form_status").html("Serial no 7 is required").css("color", "red");
                return;
            } else {
                $("#elb1Form_status").html("");
                $("#elb1_7").removeClass("is-invalid");
            }

            if (elb1_8 == undefined  || elb1_8 == null || elb1_8 == '' || elb1_8.length == 0) {
                $("#elb1_8").addClass("is-invalid");
                $("#elb1Form_status").html("Serial no 8 is required").css("color", "red");
                return;
            } else {
                $("#elb1Form_status").html("");
                $("#elb1_8").removeClass("is-invalid");
            }

            if (elb1_9 == undefined  || elb1_9 == null || elb1_9 == '' || elb1_9.length == 0) {
                $("#elb1_9").addClass("is-invalid");
                $("#elb1Form_status").html("Serial no 9 is required").css("color", "red");
                return;
            } else {
                $("#elb1Form_status").html("");
                $("#elb1_9").removeClass("is-invalid");
            }

            if (elb1_10 == undefined  || elb1_10 == null || elb1_10 == '' || elb1_10.length == 0) {
                $("#elb1_10").addClass("is-invalid");
                $("#elb1Form_status").html("Serial no 10 is required").css("color", "red");
                return;
            } else {
                $("#elb1Form_status").html("");
                $("#elb1_10").removeClass("is-invalid");
            }

            if (elb1_11 == undefined  || elb1_11 == null || elb1_11 == '' || elb1_11.length == 0) {
                $("#elb1_11").addClass("is-invalid");
                $("#elb1Form_status").html("Serial no 11 is required").css("color", "red");
                return;
            } else {
                $("#elb1Form_status").html("");
                $("#elb1_11").removeClass("is-invalid");
            }

            let userID = '<?php echo $_SESSION['userretaileremp']; ?>';
            if(userID == '' || userID == null || userID == undefined){
                
                $("#elb1Form_status").html("Something went wrong with user Id, Refresh the page and try again").css("color", "red");
                return
            }

            $.ajax({
                type: "POST",
                url: "query/action.php",
                data: {
                    "action": "ELB1_formSubmit",
                    "userID": userID,
                    "sectionName": sectionName,
                    "sectionId": sectionId,
                    "stationName": stationName,
                    "stationId": stationId,
                    "compoNameTmp": compoNameTmp,
                    "subcompoNameTmp": subcompoNameTmp,
                    "elb1_1": elb1_1,
                    "elb1_2": elb1_2,
                    "elb1_3": elb1_3,
                    "elb1_4": elb1_4,
                    "elb1_5": elb1_5,
                    "elb1_6": elb1_6,              
                    "elb1_7": elb1_7, 
                    "elb1_8": elb1_8,
                    "elb1_9": elb1_9,
                    "elb1_10": elb1_10,              
                    "elb1_11": elb1_11,             
                    "language":language
                },
                beforeSend: function() {
                    $("#loader_show").removeClass('d-none');

                },
                success: function(response) {
                    let respo = JSON.parse(response);
                    if (respo['status']) {
                        $("#elb1Form_status").html(respo['msg']).css("color", "green");


                    } else {
                        $("#elb1Form_status").html(respo['msg']).css("color", "red");

                    }
                },
                complete: function() {
                    $("#loader_show").addClass('d-none');

                }
            });

        }
    });

// for ELB2

     $("#elb2FormBtn").click(function() {
        if (confirm("Do you want to final submit ELB2 Form")) {
            let language = $("#language").val();
            let sectionName = $("#sectionName").val();
            let sectionId = $("#sectionId").val();

            let stationName = $("#stationName").val();
            let stationId = $("#stationId").val();

            let compoNameTmp = $("#compoNameTmp").val();
            let subcompoNameTmp = $("#subcompoNameTmp").val();

            if (
                sectionName == "" || sectionName == null || sectionName == undefined ||
                sectionId == "" || sectionId == null || sectionId == undefined ||
                stationName == "" || stationName == null || stationName == undefined ||
                stationId == "" || stationId == null || stationId == undefined ||
                compoNameTmp == "" || compoNameTmp == null || compoNameTmp == undefined ||
                subcompoNameTmp == "" || subcompoNameTmp == null || subcompoNameTmp == undefined

            ) {
                alert("Something went wrong , refresh the page and try again");
                return;
            }

            let elb2_1 = $("#elb2_1").val();
            let elb2_2 = $("#elb2_2").val();
            let elb2_3 = $("#elb2_3").val();
            let elb2_4 = $("#elb2_4").val();
            let elb2_5 = $("#elb2_5").val();
            let elb2_6 = $("#elb2_6").val();
            let elb2_7 = $("#elb2_7").val();
            let elb2_8 = $("#elb2_8").val();
    


            if (elb2_1 == undefined  || elb2_1 == null || elb2_1 == '' || elb2_1.length == 0) {
                $("#elb2_1").addClass("is-invalid");
                $("#elb2Form_status").html("Serial no 1 is required").css("color", "red");
                return;
            } else {
                $("#elb2Form_status").html("");
                $("#elb2_1").removeClass("is-invalid");

            }

            if (elb2_2 == undefined  || elb2_2 == null || elb2_2 == '' || elb2_2.length == 0) {
                $("#elb2_2").addClass("is-invalid");
                $("#elb2Form_status").html("Serial no 2 is required").css("color", "red");
                return;
            } else {
                $("#elb1Form_status").html("");
                $("#elb1_2").removeClass("is-invalid");

            }

            if (elb2_3 == undefined  || elb2_3 == null || elb2_3 == '' || elb2_3.length == 0) {
                $("#elb2_3").addClass("is-invalid");
                $("#elb2Form_status").html("Serial no 3 is required").css("color", "red");
                return;
            } else {
                $("#elb2Form_status").html("");
                $("#elb2_3").removeClass("is-invalid");

            }

            if (elb2_4 == undefined  || elb2_4 == null || elb2_4 == '' || elb2_4.length == 0) {
                $("#elb2_4").addClass("is-invalid");
                $("#elb2Form_status").html("Serial no 4 is required").css("color", "red");
                return;
            } else {
                $("#elb2Form_status").html("");
                $("#elb2_4").removeClass("is-invalid");

            }

            if (elb2_5 == undefined  || elb2_5 == null || elb2_5 == '' || elb2_5.length == 0) {
                $("#elb2_5").addClass("is-invalid");
                $("#elb2Form_status").html("Serial no 5 is required").css("color", "red");
                return;
            } else {
                $("#elb2Form_status").html("");
                $("#elb2_5").removeClass("is-invalid");

            }

            if (elb2_6 == undefined  || elb2_6 == null || elb2_6 == '' || elb2_6.length == 0) {
                $("#elb2_6").addClass("is-invalid");
                $("#elb2Form_status").html("Serial no 6 is required").css("color", "red");
                return;
            } else {
                $("#elb2Form_status").html("");
                $("#elb2_6").removeClass("is-invalid");

            }

            if (elb2_7 == undefined  || elb2_7 == null || elb2_7 == '' || elb2_7.length == 0) {
                $("#elb2_7").addClass("is-invalid");
                $("#elb2Form_status").html("Serial no 7 is required").css("color", "red");
                return;
            } else {
                $("#elb2Form_status").html("");
                $("#elb2_7").removeClass("is-invalid");
            }

            if (elb2_8 == undefined  || elb2_8 == null || elb2_8 == '' || elb2_8.length == 0) {
                $("#elb2_8").addClass("is-invalid");
                $("#elb2Form_status").html("Serial no 8 is required").css("color", "red");
                return;
            } else {
                $("#elb2Form_status").html("");
                $("#elb2_8").removeClass("is-invalid");
            }

            

            
            let userID = '<?php echo $_SESSION['userretaileremp']; ?>';
            if(userID == '' || userID == null || userID == undefined){
                
                $("#elb2Form_status").html("Something went wrong with user Id, Refresh the page and try again").css("color", "red");
                return
            }

            $.ajax({
                type: "POST",
                url: "query/action.php",
                data: {
                    "action": "ELB2_formSubmit",
                    "userID": userID,
                    "sectionName": sectionName,
                    "sectionId": sectionId,
                    "stationName": stationName,
                    "stationId": stationId,
                    "compoNameTmp": compoNameTmp,
                    "subcompoNameTmp": subcompoNameTmp,
                    "elb2_1": elb2_1,
                    "elb2_2": elb2_2,
                    "elb2_3": elb2_3,
                    "elb2_4": elb2_4,
                    "elb2_5": elb2_5,
                    "elb2_6": elb2_6,              
                    "elb2_7": elb2_7, 
                    "elb2_8": elb2_8,
                                 
                    "language":language
                },
                beforeSend: function() {
                    $("#loader_show").removeClass('d-none');

                },
                success: function(response) {
                    let respo = JSON.parse(response);
                    if (respo['status']) {
                        $("#elb2Form_status").html(respo['msg']).css("color", "green");


                    } else {
                        $("#elb2Form_status").html(respo['msg']).css("color", "red");

                    }
                },
                complete: function() {
                    $("#loader_show").addClass('d-none');

                }
            });

        }
    });

// for ELB3
    $("#elb3FormBtn").click(function() {
        if (confirm("Do you want to final submit ELB3 Form")) {
            let language = $("#language").val();
            let sectionName = $("#sectionName").val();
            let sectionId = $("#sectionId").val();

            let stationName = $("#stationName").val();
            let stationId = $("#stationId").val();

            let compoNameTmp = $("#compoNameTmp").val();
            let subcompoNameTmp = $("#subcompoNameTmp").val();

            if (
                sectionName == "" || sectionName == null || sectionName == undefined ||
                sectionId == "" || sectionId == null || sectionId == undefined ||
                stationName == "" || stationName == null || stationName == undefined ||
                stationId == "" || stationId == null || stationId == undefined ||
                compoNameTmp == "" || compoNameTmp == null || compoNameTmp == undefined ||
                subcompoNameTmp == "" || subcompoNameTmp == null || subcompoNameTmp == undefined

            ) {
                alert("Something went wrong , refresh the page and try again");
                return;
            }

            let elb3_1 = $("#elb3_1").val();
            let elb3_2 = $("#elb3_2").val();
            let elb3_3 = $("#elb3_3").val();
            let elb3_4 = $("#elb3_4").val();
            let elb3_5 = $("#elb3_5").val();
            let elb3_6 = $("#elb3_6").val();
         
    


            if (elb3_1 == undefined  || elb3_1 == null || elb3_1 == '' || elb3_1.length == 0) {
                $("#elb3_1").addClass("is-invalid");
                $("#elb3Form_status").html("Serial no 1 is required").css("color", "red");
                return;
            } else {
                $("#elb3Form_status").html("");
                $("#elb3_1").removeClass("is-invalid");

            }

            if (elb3_2 == undefined  || elb3_2 == null || elb3_2 == '' || elb3_2.length == 0) {
                $("#elb3_2").addClass("is-invalid");
                $("#elb3Form_status").html("Serial no 2 is required").css("color", "red");
                return;
            } else {
                $("#elb3Form_status").html("");
                $("#elb3_2").removeClass("is-invalid");

            }

            if (elb3_3 == undefined  || elb3_3 == null || elb3_3 == '' || elb3_3.length == 0) {
                $("#elb3_3").addClass("is-invalid");
              $("#elb3Form_status").html("Serial no 3 is required").css("color", "red");
                return;
            } else {
                $("#elb3Form_status").html("");
                $("#elb3_3").removeClass("is-invalid");

            }

            if (elb3_4 == undefined  || elb3_4 == null || elb3_4 == '' || elb3_4.length == 0) {
                $("#elb3_4").addClass("is-invalid");
                $("#elb3Form_status").html("Serial no 4 is required").css("color", "red");
                return;
            } else {
                $("#elb3Form_status").html("");
                $("#elb3_4").removeClass("is-invalid");

            }

            if (elb3_5 == undefined  || elb3_5 == null || elb3_5 == '' || elb3_5.length == 0) {
                $("#elb3_5").addClass("is-invalid");
                $("#elb3Form_status").html("Serial no 5 is required").css("color", "red");
                return;
            } else {
                $("#elb3Form_status").html("");
                $("#elb3_5").removeClass("is-invalid");

            }

            if (elb3_6 == undefined  || elb3_6 == null || elb3_6 == '' || elb3_6.length == 0) {
                $("#elb3_6").addClass("is-invalid");
                $("#elb3Form_status").html("Serial no 6 is required").css("color", "red");
                return;
            } else {
                $("#elb3Form_status").html("");
                $("#elb3_6").removeClass("is-invalid");3
            }



            

            
            let userID = '<?php echo $_SESSION['userretaileremp']; ?>';
            if(userID == '' || userID == null || userID == undefined){
                
                $("#elb3Form_status").html("Something went wrong with user Id, Refresh the page and try again").css("color", "red");
                return
            }

            $.ajax({
                type: "POST",
                url: "query/action.php",
                data: {
                    "action": "ELB3_formSubmit",
                    "userID": userID,
                    "sectionName": sectionName,
                    "sectionId": sectionId,
                    "stationName": stationName,
                    "stationId": stationId,
                    "compoNameTmp": compoNameTmp,
                    "subcompoNameTmp": subcompoNameTmp,
                    "elb3_1": elb3_1,
                    "elb3_2": elb3_2,
                    "elb3_3": elb3_3,
                    "elb3_4": elb3_4,
                    "elb3_5": elb3_5,
                    "elb3_6": elb3_6,              
                   
                                 
                    "language":language
                },
                beforeSend: function() {
                    $("#loader_show").removeClass('d-none');

                },
                success: function(response) {
                    let respo = JSON.parse(response);
                    if (respo['status']) {
                        $("#elb3Form_status").html(respo['msg']).css("color", "green");


                    } else {
                        $("#elb3Form_status").html(respo['msg']).css("color", "red");

                    }
                },
                complete: function() {
                    $("#loader_show").addClass('d-none');

                }
            });

        }
    });

// for ELB4

     $("#elb4FormBtn").click(function() {
        if (confirm("Do you want to final submit ELB4 Form")) {
            let language = $("#language").val();
            let sectionName = $("#sectionName").val();
            let sectionId = $("#sectionId").val();

            let stationName = $("#stationName").val();
            let stationId = $("#stationId").val();

            let compoNameTmp = $("#compoNameTmp").val();
            let subcompoNameTmp = $("#subcompoNameTmp").val();

            if (
                sectionName == "" || sectionName == null || sectionName == undefined ||
                sectionId == "" || sectionId == null || sectionId == undefined ||
                stationName == "" || stationName == null || stationName == undefined ||
                stationId == "" || stationId == null || stationId == undefined ||
                compoNameTmp == "" || compoNameTmp == null || compoNameTmp == undefined ||
                subcompoNameTmp == "" || subcompoNameTmp == null || subcompoNameTmp == undefined

            ) {
                alert("Something went wrong , refresh the page and try again");
                return;
            }

            let elb4_1 = $("#elb4_1").val();
            let elb4_2 = $("#elb4_2").val();
            let elb4_3 = $("#elb4_3").val();
            let elb4_4 = $("#elb4_4").val();
            let elb4_5 = $("#elb4_5").val();
            let elb4_6 = $("#elb4_6").val();
            let elb4_7 = $("#elb4_7").val();
          
   


            if (elb4_1 == undefined  || elb4_1 == null || elb4_1 == '' || elb4_1.length == 0) {
                $("#elb4_1").addClass("is-invalid");
                $("#elb4Form_status").html("Serial no 1 is required").css("color", "red");
                return;
            } else {
                $("#elb4Form_status").html("");
                $("#elb4_1").removeClass("is-invalid");

            }

            if (elb4_2 == undefined  || elb4_2 == null || elb4_2 == '' || elb4_2.length == 0) {
                $("#elb4_2").addClass("is-invalid");
                $("#elb4Form_status").html("Serial no 2 is required").css("color", "red");
                return;
            } else {
                $("#elb4Form_status").html("");
                $("#elb4_2").removeClass("is-invalid");

            }

            if (elb4_3 == undefined  || elb4_3 == null || elb4_3 == '' || elb4_3.length == 0) {
                $("#elb4_3").addClass("is-invalid");
                $("#elb4Form_status").html("Serial no 3 is required").css("color", "red");
                return;
            } else {
                $("#elb4Form_status").html("");
                $("#elb4_3").removeClass("is-invalid");

            }

            if (elb4_4 == undefined  || elb4_4 == null || elb4_4 == '' || elb4_4.length == 0) {
                $("#elb4_4").addClass("is-invalid");
                $("#elb4Form_status").html("Serial no 4 is required").css("color", "red");
                return;
            } else {
                $("#elb4Form_status").html("");
                $("#elb4_4").removeClass("is-invalid");

            }

            if (elb4_5 == undefined  || elb4_5 == null || elb4_5 == '' || elb4_5.length == 0) {
                $("#elb4_5").addClass("is-invalid");
                $("#elb4Form_status").html("Serial no 5 is required").css("color", "red");
                return;
            } else {
                $("#elb4Form_status").html("");
                $("#elb4_5").removeClass("is-invalid");

            }

            if (elb4_6 == undefined  || elb4_6 == null || elb4_6 == '' || elb4_6.length == 0) {
                $("#elb4_6").addClass("is-invalid");
                $("#elb4Form_status").html("Serial no 6 is required").css("color", "red");
                return;
            } else {
                $("#elb4Form_status").html("");
                $("#elb4_6").removeClass("is-invalid");

            }

            if (elb4_7 == undefined  || elb4_7 == null || elb4_7 == '' || elb4_7.length == 0) {
                $("#elb4_7").addClass("is-invalid");
                $("#elb4Form_status").html("Serial no 7 is required").css("color", "red");
                return;
            } else {
                $("#elb4Form_status").html("");
                $("#elb4_7").removeClass("is-invalid");
            }

            

            

            
            let userID = '<?php echo $_SESSION['userretaileremp']; ?>';
            if(userID == '' || userID == null || userID == undefined){
                
                $("#elb2Form_status").html("Something went wrong with user Id, Refresh the page and try again").css("color", "red");
                return
            }

            $.ajax({
                type: "POST",
                url: "query/action.php",
                data: {
                    "action": "ELB4_formSubmit",
                    "userID": userID,
                    "sectionName": sectionName,
                    "sectionId": sectionId,
                    "stationName": stationName,
                    "stationId": stationId,
                    "compoNameTmp": compoNameTmp,
                    "subcompoNameTmp": subcompoNameTmp,
                    "elb4_1": elb4_1,
                    "elb4_2": elb4_2,
                    "elb4_3": elb4_3,
                    "elb4_4": elb4_4,
                    "elb4_5": elb4_5,
                    "elb4_6": elb4_6,              
                    "elb4_7": elb4_7, 
                    
                                 
                    "language":language
                },
                beforeSend: function() {
                    $("#loader_show").removeClass('d-none');

                },
                success: function(response) {
                    let respo = JSON.parse(response);
                    if (respo['status']) {
                        $("#elb4Form_status").html(respo['msg']).css("color", "green");


                    } else {
                        $("#elb4Form_status").html(respo['msg']).css("color", "red");

                    }
                },
                complete: function() {
                    $("#loader_show").addClass('d-none');

                }
            });

        }
    });
// for ELB5

     $("#elb5FormBtn").click(function() {
        if (confirm("Do you want to final submit ELB5 Form")) {
            let language = $("#language").val();
            let sectionName = $("#sectionName").val();
            let sectionId = $("#sectionId").val();

            let stationName = $("#stationName").val();
            let stationId = $("#stationId").val();

            let compoNameTmp = $("#compoNameTmp").val();
            let subcompoNameTmp = $("#subcompoNameTmp").val();

            if (
                sectionName == "" || sectionName == null || sectionName == undefined ||
                sectionId == "" || sectionId == null || sectionId == undefined ||
                stationName == "" || stationName == null || stationName == undefined ||
                stationId == "" || stationId == null || stationId == undefined ||
                compoNameTmp == "" || compoNameTmp == null || compoNameTmp == undefined ||
                subcompoNameTmp == "" || subcompoNameTmp == null || subcompoNameTmp == undefined

            ) {
                alert("Something went wrong , refresh the page and try again");
                return;
            }

            let elb5_1 = $("#elb5_1").val();
           
          
   


            if (elb5_1 == undefined  || elb5_1 == null || elb5_1 == '' || elb5_1.length == 0) {
                $("#elb5_1").addClass("is-invalid");
                $("#elb5Form_status").html("Serial no 1 is required").css("color", "red");
                return;
            } else {
                $("#elb5Form_status").html("");
                $("#elb5_1").removeClass("is-invalid");

            }

            

            

            
            let userID = '<?php echo $_SESSION['userretaileremp']; ?>';
            if(userID == '' || userID == null || userID == undefined){
                
                $("#elb2Form_status").html("Something went wrong with user Id, Refresh the page and try again").css("color", "red");
                return
            }

            $.ajax({
                type: "POST",
                url: "query/action.php",
                data: {
                    "action": "ELB5_formSubmit",
                    "userID": userID,
                    "sectionName": sectionName,
                    "sectionId": sectionId,
                    "stationName": stationName,
                    "stationId": stationId,
                    "compoNameTmp": compoNameTmp,
                    "subcompoNameTmp": subcompoNameTmp,
                    "elb5_1": elb5_1,
                    
                    
                                 
                    "language":language
                },
                beforeSend: function() {
                    $("#loader_show").removeClass('d-none');

                },
                success: function(response) {
                    let respo = JSON.parse(response);
                    if (respo['status']) {
                        $("#elb5Form_status").html(respo['msg']).css("color", "green");


                    } else {
                        $("#elb5Form_status").html(respo['msg']).css("color", "red");

                    }
                },
                complete: function() {
                    $("#loader_show").addClass('d-none');

                }
            });

        }
    });


///
});
//form insert javascript above



// T Type form

function openDialog_T(typeOfForm, dataList) {

let tableId = '';
let displayHtml = "";

switch (typeOfForm) {
    case "T1":
        tableId = "t1_body";
        $("#componentForm_T1").modal("show");
        break;
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

    if(typeOfForm == 'T1' && (index == 6 || index == 7)){
        
    }else{    

    displayHtml += `
        <tr>
        <th scope="row">${index+1}</th>
        <td>${element['t_details']}</td>
        <td style="vertical-align:middle;width:15%" >
            <select class="custom-select ${typeOfForm}Class" id="${element['t_id']}">
                <option value="">Select Action</option>`;

    let optArr = element['t_option'].split(",");
    optArr.forEach(opt => {
        displayHtml += `<option value="${opt}">${opt}</option>`;


    });
    // <option value="Done">Done</option>
    // <option value="Not Done">Not Done</option>
    displayHtml += `</select>
        </td>
        </tr>
    `;
    }

});

document.getElementById(tableId).innerHTML = displayHtml;

}

function get_T_formData(tType,subCompo,compo){
    $("#compoNameTmp").val(compo);
    $("#subcompoNameTmp").val(subCompo);
    $(".displaySubcompoName").html(subCompo);
    let language = $("#language").val();

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

                openDialog_T(tType, response['data']);

            }

        },
        complete:function(){
            $("#loader_show").addClass('d-none');

        }
    });
}

// fOR sIGNAL


function openDialog_CS(typeOfForm, dataList) {

let tableId = '';
let displayHtml = "";

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

    if(element['cs_id'] == 'cs2_5'){

    if(language == 'English'){
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
                <select class="custom-select CS2Class" id="cs2_5a">
                    <option value="">Select Action</option>
                    <option value="Done">Done</option>
                    <option value="Not Done">Not Done</option>
                </select>
            </td>
        </tr>

        <tr>
            <td>(b) Red on white background for implantation distance < 2.36 meters.</td>
            <td style="vertical-align:middle;width:22%" >
            <select class="custom-select CS2Class" id="cs2_5b">
                    <option value="">Select Action</option>
                    <option value="Done">Done</option>
                    <option value="Not Done">Not Done</option>
                </select>
            </td>
        </tr>
    `;
    }else{
            
    displayHtml += `
        <tr>
            <th rowspan="3" scope="row">${index+1}</th>
            <td>सिग्नल पोस्ट पर निकटतम ट्रैक की केंद्र रेखा से इम्प्लांटेशन दूरी को निकटतम ट्रैक की ओर इंगित करने वाले तीर के साथ निम्नलिखित रंगों में चित्रित किया जाना चाहिए</td>
            <td style="vertical-align:middle;width:22%" >
              
            </td>
        </tr>

        <tr>
            <td>(ए) सामान्य प्रत्यारोपण के लिए सफेद पृष्ठभूमि पर काला।</td>
            <td style="vertical-align:middle;width:22%" >
                <select class="custom-select CS2Class" id="cs2_5a">
                    <option value="">Select Action</option>
                    <option value="ठीक है">ठीक है</option>
                    <option value="ठीक नहीं है">ठीक नहीं है</option>
                </select>
            </td>
        </tr>

        <tr>
            <td>(बी) प्रत्यारोपण दूरी <2.36 मीटर के लिए सफेद पृष्ठभूमि पर लाल।</td>
            <td style="vertical-align:middle;width:22%" >
            <select class="custom-select CS2Class" id="cs2_5b">
                    <option value="">Select Action</option>
                    <option value="ठीक है">ठीक है</option>
                    <option value="ठीक नहीं है">ठीक नहीं है</option>
                </select>
            </td>
        </tr>
    `;
    }

    }else{

        
    displayHtml += `
        <tr>
        <th scope="row">${index+1}</th>
        <td>${element['cs_details']}</td>
        <td style="vertical-align:middle;width:22%" >
            <select class="custom-select ${typeOfForm}Class" id="${element['cs_id']}">
                <option value="">Select Action</option>`;

                let optArr = element['cs_option'].split(",");
                optArr.forEach(opt => {
                    displayHtml += `<option value="${opt}">${opt}</option>`;


    });
    // <option value="Done">Done</option>
    // <option value="Not Done">Not Done</option>
    displayHtml += `</select>
        </td>
        </tr>
    `;

    }




});

document.getElementById(tableId).innerHTML = displayHtml;

}

// for DL



function openDialog_DL(typeOfForm, dataList) {

let tableId = '';
let displayHtml = "";

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

    if(typeOfForm== 'DL1'){

        let sn = index+1;
        if(element['dl_id'] == 'dl1_8b'){
            sn = '';
        }

        if(element['dl_id'] == 'dl1_9'){
            sn = index;
        }

          
        displayHtml += `
            <tr>
            <th scope="row">${sn}</th>
            <td>${element['dl_details']}</td>
            <td style="vertical-align:middle;width:22%" >
                <select class="custom-select ${typeOfForm}Class" id="${element['dl_id']}">
                    <option value="">Select Action</option>`;

                    let optArr = element['dl_option'].split(",");
                optArr.forEach(opt => {
                    displayHtml += `<option value="${opt}">${opt}</option>`;


                });
    // <option value="Done">Done</option>
    // <option value="Not Done">Not Done</option>
    displayHtml += `</select>
        </td>
        </tr>
    `;

    }else{

        
    displayHtml += `
        <tr>
        <th scope="row">${index+1}</th>
        <td>${element['dl_details']}</td>
        <td style="vertical-align:middle;width:22%" >
            <select class="custom-select ${typeOfForm}Class" id="${element['dl_id']}">
                <option value="">Select Action</option>`;

                let optArr = element['dl_option'].split(",");
                optArr.forEach(opt => {
                    displayHtml += `<option value="${opt}">${opt}</option>`;


    });
    // <option value="Done">Done</option>
    // <option value="Not Done">Not Done</option>
    displayHtml += `</select>
        </td>
        </tr>
    `;

    }




});

document.getElementById(tableId).innerHTML = displayHtml;

}



function openDialog_MLB(typeOfForm, dataList) {

let tableId = '';
let displayHtml = "";

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


        
    displayHtml += `
        <tr>
        <th scope="row">${index+1}</th>
        <td>${element['mlb_details']}</td>
        <td style="vertical-align:middle;width:22%" >
            <select class="custom-select ${typeOfForm}Class" id="${element['mlb_id']}">
                <option value="">Select Action</option>`;

                let optArr = element['mlb_option'].split(",");
                optArr.forEach(opt => {
                    displayHtml += `<option value="${opt}">${opt}</option>`;


                });
  
    displayHtml += `</select>
        </td>
        </tr>
    `;


});

document.getElementById(tableId).innerHTML = displayHtml;

}

// for SLB

function openDialog_SLB(typeOfForm, dataList) {

let tableId = '';
let displayHtml = "";

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


        
    displayHtml += `
        <tr>
        <th scope="row">${index+1}</th>
        <td>${element['slb_details']}</td>
        <td style="vertical-align:middle;width:22%" >
            <select class="custom-select ${typeOfForm}Class" id="${element['slb_id']}">
                <option value="">Select Action</option>`;

                let optArr = element['slb_option'].split(",");
                optArr.forEach(opt => {
                    displayHtml += `<option value="${opt}">${opt}</option>`;


                });
  
    displayHtml += `</select>
        </td>
        </tr>
    `;


});

document.getElementById(tableId).innerHTML = displayHtml;

}


// for ELB


function openDialog_ELB(typeOfForm, dataList) {

let tableId = '';
let displayHtml = "";
let language = $("#language").val(); // no change here


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

    if(typeOfForm == "ELB3" && index == 2){

        if(language == "English"){

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
            <select class="custom-select ${typeOfForm}Class" id="${element['elb_id']}">
                <option value="">Select Action</option>`;

                let optArr = element['elb_option'].split(",");
                optArr.forEach(opt => {
                    displayHtml += `<option value="${opt}">${opt}</option>`;


                });
  
    displayHtml += `</select>
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
            <select class="custom-select ${typeOfForm}Class" id="${element['elb_id']}">
                <option value="">Select Action</option>`;

                let optArr = element['elb_option'].split(",");
                optArr.forEach(opt => {
                    displayHtml += `<option value="${opt}">${opt}</option>`;


                });
  
    displayHtml += `</select>
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
            <select class="custom-select ${typeOfForm}Class" id="${element['elb_id']}">
                <option value="">Select Action</option>`;

                let optArr = element['elb_option'].split(",");
                optArr.forEach(opt => {
                    displayHtml += `<option value="${opt}">${opt}</option>`;


                });
  
    displayHtml += `</select>
        </td>
        </tr>
    `;

    }
        



});

document.getElementById(tableId).innerHTML = displayHtml;

}
//

// for DAC

function openDialog_DAC(typeOfForm, dataList) {

let tableId = '';
let displayHtml = "";

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


        
       
    displayHtml += `
        <tr>
        <th scope="row">${index+1}</th>
        <td>${element['dac_details']}</td>
        <td style="vertical-align:middle;width:22%" >
            <select class="custom-select ${typeOfForm}Class" id="${element['dac_id']}">
                <option value="">Select Action</option>`;

                let optArr = element['dac_option'].split(",");
                optArr.forEach(opt => {
                    displayHtml += `<option value="${opt}">${opt}</option>`;


                });
  
    displayHtml += `</select>
        </td>
        </tr>
    `;


});

document.getElementById(tableId).innerHTML = displayHtml;

}
//

function get_CS_formData(csType,subCompo,compo){
    $("#compoNameTmp").val(compo);
    $("#subcompoNameTmp").val(subCompo);
    $(".displaySubcompoName").html(subCompo);
    let language = $("#language").val();
    if(language == "Hindi"){
        $(".heading_english").addClass('d-none')
        $(".heading_hindi").removeClass('d-none')
     }else{
        $(".heading_hindi").addClass('d-none')
        $(".heading_english").removeClass('d-none')
    }

    if(csType == 'CS1'){
        $("#componentForm_CS1").modal("show");
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

                openDialog_CS(csType, response['data']);

            }

        },
        complete:function(){
            $("#loader_show").addClass('d-none');

        }
    });
}


// slb for details
function get_SLB_formData(slb_Type,subCompo,compo){
    $("#compoNameTmp").val(compo); // no change here
    $("#subcompoNameTmp").val(subCompo); // no change here
    let language = $("#language").val(); // no change here
    $(".displaySubcompoName").html(subCompo);

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
            "formType": slb_Type,
            language:language
        },
        beforeSend: function() {
            $("#loader_show").removeClass('d-none');


        },
        success: function(respo) {
            $("#loader_show").addClass('d-none');

            let response = JSON.parse(respo);

            if (response['status']) {

                openDialog_SLB(slb_Type, response['data']);

            }

        },
        complete:function(){
            $("#loader_show").addClass('d-none');

        }
    });
}

// ELB form details

function get_ELB_formData(elb_Type,subCompo,compo){
    $("#compoNameTmp").val(compo); // no change here
    $("#subcompoNameTmp").val(subCompo); // no change here
    let language = $("#language").val(); // no change here
    $(".displaySubcompoName").html(subCompo);

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
            "formType": elb_Type,
            language:language
        },
        beforeSend: function() {
            $("#loader_show").removeClass('d-none');


        },
        success: function(respo) {
            $("#loader_show").addClass('d-none');

            let response = JSON.parse(respo);

            if (response['status']) {

                openDialog_ELB(elb_Type, response['data']);

            }

        },
        complete:function(){
            $("#loader_show").addClass('d-none');

        }
    });
}

// AXLE Counter form Details
function get_DAC_formData(dac_Type,subCompo,compo){
    $("#compoNameTmp").val(compo); // no change here
    $("#subcompoNameTmp").val(subCompo); // no change here
    let language = $("#language").val(); // no change here
    $(".displaySubcompoName").html(subCompo);

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
            "formType": dac_Type,
            language:language
        },
        beforeSend: function() {
            $("#loader_show").removeClass('d-none');


        },
        success: function(respo) {
            $("#loader_show").addClass('d-none');

            let response = JSON.parse(respo);

            if (response['status']) {

                openDialog_DAC(dac_Type, response['data']);

            }

        },
        complete:function(){
            $("#loader_show").addClass('d-none');

        }
    });
}

function get_MLB_formData(mlb_Type,subCompo,compo){
    $("#compoNameTmp").val(compo); // no change here
    $("#subcompoNameTmp").val(subCompo); // no change here
    let language = $("#language").val(); // no change here
    $(".displaySubcompoName").html(subCompo);

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
            "formType": mlb_Type,
            language:language
        },
        beforeSend: function() {
            $("#loader_show").removeClass('d-none');


        },
        success: function(respo) {
            $("#loader_show").addClass('d-none');

            let response = JSON.parse(respo);

            if (response['status']) {

                openDialog_MLB(mlb_Type, response['data']);

            }

        },
        complete:function(){
            $("#loader_show").addClass('d-none');

        }
    });
}

function get_DL_formData(dL_Type,subCompo,compo){
    $("#compoNameTmp").val(compo);
    $("#subcompoNameTmp").val(subCompo);
    let language = $("#language").val();

    if(language == "Hindi"){
        $(".heading_english").addClass('d-none')
        $(".heading_hindi").removeClass('d-none')
     }else{
        $(".heading_hindi").addClass('d-none')
        $(".heading_english").removeClass('d-none')
    }

    // $(".displaySubcompoName").html(subCompo);

    // if(dL_Type == 'CS1'){
    //     $("#componentForm_CS1").modal("show");
    //     return;
    // }

    $.ajax({
        type: "POST",
        url: "./query/action.php",
        data: {
            "action": "getDL_FormDetails",
            "formType": dL_Type,
            language:language
        },
        beforeSend: function() {
            $("#loader_show").removeClass('d-none');


        },
        success: function(respo) {
            $("#loader_show").addClass('d-none');

            let response = JSON.parse(respo);

            if (response['status']) {

                openDialog_DL(dL_Type, response['data']);

            }

        },
        complete:function(){
            $("#loader_show").addClass('d-none');

        }
    });
}
</script>

</body>

</html>