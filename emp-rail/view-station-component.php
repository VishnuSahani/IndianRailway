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
                        <div class="form-group col-xl-6 col-lg-6 col-12">
                            <label for="sectionName">Section Name</label>
                            <input type="text" id="sectionName" class="form-control" disabled
                                value="<?php echo $empSectionName;?>">
                            <input type="hidden" id="sectionId" class="form-control" disabled
                                value="<?php echo $empSectionId;?>">
                            <input type="hidden" id="compoNameTmp">
                            <input type="hidden" id="subcompoNameTmp">
                        </div>

                        <div class="form-group col-xl-6 col-lg-6 col-12">
                            <label for="stationName">Station Name</label>
                            <input type="text" id="stationName" class="form-control" disabled
                                value="<?php echo $empStationName;?>">
                            <input type="hidden" id="stationId" class="form-control" disabled
                                value="<?php echo $empStationId;?>">
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
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="componentFormLabel">
                    <span class="badge badge-success h3" id="modalComponentName">
                        Schedule Code: EP1
                    </span>

                    <!-- <span id="modalSubCompoName"></span>
                    <span class="badge badge-danger h3" id="modalSubCompoType"></span> -->
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="m-2 text-center alert alert-danger" style="font-size:13px">

                Periodicity: Technician(Signal): Fortnightly Sectional SSE/JE(Signal): Monthly SSE (Signal)/Incharge :
                Quarterly

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
                    <tbody id="ep1_body">

                    </tbody>
                </table>
            </div>

            <div class="card-footer d-flex justify-content-between">
                <div id="ep1Form_status"></div>
                <button type='button' id="ep1FormBtn" class="btn btn-success">Final Submit</button>
            </div>

        </div>
    </div>
</div>

<!-- Modal EP2 -->
<div class="modal fade" id="componentForm_EP2" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="componentFormLabel2" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="componentFormLabel2">
                    <span class="badge badge-success h3">
                        Schedule Code: EP2
                    </span>

                    <!-- <span id="modalSubCompoName"></span>
                    <span class="badge badge-danger h3" id="modalSubCompoType"></span> -->
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="m-2 text-center alert alert-danger" style="font-size:13px">

                Periodicity: Signal Technician: Monthly (to be done by ESM in the presence of SSE/JE) Sectional
                SSE/JE(Signal): Monthly SSE(Signal)/Incharge: Quarterly

            </div>
            <form id="FormEP2">
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
                    <tbody id="ep2_body">
                        <tr>
                            <th scope="row">1</th>
                            <td colspan="2">
                                <div class="alert alert-success">
                                    Measurements of operating values (voltage & current) of point machines, with and
                                    without obstruction for normal
                                    and reverse operation. Current required to operate the machine in either direction
                                    shall be 1.5 to 2 times of its
                                    normal operation and friction clutch shall slip within this range. Replace machine
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
                                                <input type="date" id="EP2_1" class="form-control">
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="vertical-align: middle;" rowspan="2">Operating Voltage (>100 Volts)</td>
                                            <td>(N to R)</td>
                                            <td>
                                                <input type="number" id="op_v_N_R" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>(R to N)</td>
                                            <td>
                                                <input type="number" id="op_v_R_N" class="form-control">
                                            </td>
                                        </tr>


                                        <tr>
                                            <td style="vertical-align: middle;" rowspan="2">Obstruction Voltage (>80 Volts)</td>
                                            <td>(N to R)</td>
                                            <td>
                                                <input type="number" id="ob_v_N_R" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>(R to N)</td>
                                            <td>
                                                <input type="number" id="ob_v_R_N" class="form-control">
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="vertical-align: middle;" rowspan="2">Detection Voltage (>24 Volts)</td>
                                            <td>(N to R)</td>
                                            <td>
                                                <input type="number" id="det_v_N_R" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>(R to N)</td>
                                            <td>
                                                <input type="number" id="det_v_R_N" class="form-control">
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="vertical-align: middle;" rowspan="2">Normal Working Current (1.5 - 2.5 Amp.)</td>
                                            <td>(N to R)</td>
                                            <td>
                                                <input type="number" id="nwc_N_R" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>(R to N)</td>
                                            <td>
                                                <input type="number" id="nwc_R_N" class="form-control">
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="vertical-align: middle;" rowspan="2">Obstruction/Slipping Current (3-5 Amp.)</td>
                                            <td>(N to R)</td>
                                            <td>
                                                <input type="number" id="ob_sc_N_R" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>(R to N)</td>
                                            <td>
                                                <input type="number" id="ob_sc_R_N" class="form-control">
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="vertical-align: middle;"  colspan="2">Obstruction Test (3.25 mm)</td>
                                            <!-- <td>(N to R)</td> -->
                                            <td>
                                                <select id="ob_t_N_R" class="custom-select">
                                                    <option value="">Select</option>
                                                    <option value="OK">OK</option>
                                                    <option value="Not OK">Not OK</option>
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
                                            <td style="vertical-align: middle;"  colspan="2">Go Test (1.6 mm Fail Safe Test)</td>
                                            <!-- <td>(N to R)</td> -->
                                            <td>
                                                <select id="gt_N_R" class="custom-select">
                                                    <option value="">Select</option>
                                                    <option value="OK">OK</option>
                                                    <option value="Not OK">Not OK</option>
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
                                            <td style="vertical-align: middle;" colspan="2">Operating Time (4-5 Seconds)</td>
                                            <td>
                                                <input type="number" id="operatingTimeSecond" class="form-control">
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="vertical-align: middle;" colspan="2">
                                            <!-- Operating time during barrier test (>10 Seconds) -->
                                            अवरोध परिक्षण के दौरान परिचालन समय
                                        </td>
                                            <td>
                                                <input type="number" id="operatingTime_dbt" class="form-control">
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="vertical-align: middle;" colspan="2">
                                            <!-- Is the friction clutch slipping or not? -->
                                            फ्रिक्शन क्लच स्लिप कर रहा है या नहीं
                                        </td>
                                            <td>
                                                <input type="number" id="friction_c_s" class="form-control">
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="vertical-align: middle;" colspan="2">
                                            Track Locking Test
                                        </td>
                                            <td>
                                                <input type="number" id="track_locking" class="form-control">
                                            </td>
                                        </tr>
                                       
                                        <tr>
                                            <td style="vertical-align: middle;" colspan="2">
                                            <!-- Remark's inspection/brief description of maintenance -->
                                            रिमार्क एवं निरिक्षण/अनुरक्षण का सञ्चिपट विवरण
                                        </td>
                                            <td>
                                                <input type="number" id="remark_brief" class="form-control">
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
                            <td>Checking of feed disconnection time under obstruction is not less than 10 Seconds.</td>
                            <td>
                                <select class="custom-select EP2Class" id="EP2_2">
                                    <option value="">Select Action</option>
                                    <option value="Done">Done</option>
                                    <option value="Not Done">Not Done</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Ensure Hose pipe/GI pipe in good condition and without gaps/access.</td>
                            <td>
                                <select class="custom-select EP2Class" id="EP2_3">
                                    <option value="">Select Action</option>
                                    <option value="OK">OK</option>
                                    <option value="Not OK">Not OK</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>Check MS pins of Switch Extension piece/‘P’ bracket for any rib formation or excessive
                                wear.</td>
                            <td>
                                <select class="custom-select EP2Class" id="EP2_4">
                                    <option value="">Select Action</option>
                                    <option value="Done">Done</option>
                                    <option value="Not Done">Not Done</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">5</th>
                            <td>
                                In case of Clamp type point machine, Lubricate the following moving parts of the clamp
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
                                <select class="custom-select EP2Class" id="EP2_5">
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
                <div id="ep2Form_status"></div>
                <button type='button' id="ep2FormBtn" class="btn btn-success">Final Submit</button>
            </div>
            </form>

        </div>
    </div>
</div>


<!-- Modal EP4 -->
<div class="modal fade" id="componentForm_EP4" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="componentFormLabel4" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="componentFormLabel4">
                    <span class="badge badge-success h3">
                        Schedule Code: EP4
                    </span>

                    <!-- <span id="modalSubCompoName"></span>
                    <span class="badge badge-danger h3" id="modalSubCompoType"></span> -->
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="m-2 text-center alert alert-danger" style="font-size:13px">

                Periodicity: Technician(Signal): Quarterly Sectional SSE/JE(Signal): Half-yearly SSE(Signal)/Incharge :
                Yearly
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
                    <tbody id="ep4_body">

                    </tbody>
                </table>
            </div>

            <div class="card-footer d-flex justify-content-between">
                <div id="ep4Form_status"></div>
                <button type='button' id="ep4FormBtn" class="btn btn-success">Final Submit</button>
            </div>

        </div>
    </div>
</div>

<!-- Modal EP5 -->
<div class="modal fade" id="componentForm_EP5" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="componentFormLabel4" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="componentFormLabel5">
                    <span class="badge badge-success h3">
                        Schedule Code: EP5
                    </span>

                    <!-- <span id="modalSubCompoName"></span>
                    <span class="badge badge-danger h3" id="modalSubCompoType"></span> -->
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="m-2 text-center alert alert-danger" style="font-size:13px">

                Periodicity: Sectional JSSE/JE(Signal): Half-yearly SSE(Signal)/Incharge : Yearly
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
                    <tbody id="ep5_body">

                    </tbody>
                </table>
            </div>

            <div class="card-footer d-flex justify-content-between">
                <div id="ep5Form_status"></div>
                <button type='button' id="ep5FormBtn" class="btn btn-success">Final Submit</button>
            </div>

        </div>
    </div>
</div>


<!-- Modal T1 -->
<div class="modal fade" id="componentForm_T1" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="componentFormLabelT1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="componentFormLabelT1">
                    <span class="badge badge-success h3">
                        Schedule Code: T1
                    </span>

                    <!-- <span id="modalSubCompoName"></span>
                    <span class="badge badge-danger h3" id="modalSubCompoType"></span> -->
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="m-2 text-center alert alert-danger" style="font-size:13px">

                Periodicity: Technician(Signal): Fortnightly Sectional SSE/JE(Signal): Monthly SSE (Signal)/Incharge :
                Quarterly

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
                                    <tr>
                                    <td rowspan="3">Date</td> <td colspan="6">SPG and Volt</td> <td rowspan="3"> Charging V</td><td rowspan="3">Current V</td><td rowspan="3"> --- </td><td rowspan="3">  िफड इंड पर वोल्टेज</td><td rowspan="3">Near Block</td> <td rowspan="3">Wire status</td> <td rowspan="3">Remark</td>
                            
                                </tr>
                                <tr>
                                    <td colspan="2">Sale 1</td> <td colspan="2">Sale 2</td> <td colspan="2">Sale 3</td> 
                            
                                </tr>
                                <tr>
                                    <td>SPG</td> <td >V</td> <td>SPG</td><td>V</td> <td>SPG</td><td >V</td> 
                            
                                </tr>
                                </thead>

                                <tbody>
                                     <tr>
                                    <td ><input id="date1" class="form-control" type="date"></td> 
                                    <td><input id="sale1_spg" class="form-control" type="text"></td>
                                     <td ><input id="sale1_v" class="form-control" type="text"></td>
                                      <td><input id="sale2_spg" class="form-control" type="text"></td>
                                      <td><input id="sale2_v" class="form-control" type="text"></td>
                                       <td><input id="sale3_spg" class="form-control" type="text"></td>
                                    <td ><input id="sale3_v" class="form-control" type="text"></td> 
                                 <td ><input id="charging_v" class="form-control" type="text"></td> 
                                 <td ><input id="charging_current" class="form-control" type="text"></td>
                                 <td ></td>
                                 <td ><input id="feedVoltage" class="form-control" type="text"></td> 
                                 <td ><input id="nearBlock" class="form-control" type="text"></td>
                                   <td ><input id="wireStatus" class="form-control" type="text"></td> 
                                   <td ><input id="remark1" class="form-control" type="text"></td> 
                                    
                            
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
                                    <td><input id="railVoltage" class="form-control" type="text"></td>
                                    <td><input id="vt_value" class="form-control" type="text"></td>
                                    <td><input id="wireStatus2" class="form-control" type="text"></td>
                                    <td><input id="magneticPart" class="form-control" type="text"></td>
                                    <td></td>
                                    <td><input id="railFlag2" class="form-control" type="text"></td>
                                    <td><input id="jumberwireStatus" class="form-control" type="text"></td>
                                    <td><input id="remark2" class="form-control" type="text"></td>
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

            
                </table>
            </div>

            <div class="card-footer d-flex justify-content-between">
                <div id="t1Form_status"></div>
                <button type='button' id="t1FormBtn" class="btn btn-success">Final Submit</button>
            </div>

        </div>
    </div>
</div>

<!-- Modal T2 -->
<div class="modal fade" id="componentForm_T2" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="componentFormLabelT2" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="componentFormLabelT2">
                    <span class="badge badge-success h3">
                        Schedule Code: T2
                    </span>

                    <!-- <span id="modalSubCompoName"></span>
                    <span class="badge badge-danger h3" id="modalSubCompoType"></span> -->
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="m-2 text-center alert alert-danger" style="font-size:13px">

                Periodicity: Technician(Signal): Fortnightly Sectional SSE/JE(Signal): Monthly SSE (Signal)/Incharge :
                Quarterly

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
                    <tbody id="t2_body">

                    </tbody>
                </table>
            </div>

            <div class="card-footer d-flex justify-content-between">
                <div id="t2Form_status"></div>
                <button type='button' id="t2FormBtn" class="btn btn-success">Final Submit</button>
            </div>

        </div>
    </div>
</div>


<!-- Modal T3 -->
<div class="modal fade" id="componentForm_T3" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="componentFormLabelT3" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="componentFormLabelT3">
                    <span class="badge badge-success h3">
                        Schedule Code: T3
                    </span>

                    <!-- <span id="modalSubCompoName"></span>
                    <span class="badge badge-danger h3" id="modalSubCompoType"></span> -->
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="m-2 text-center alert alert-danger" style="font-size:13px">

                Periodicity: Technician(Signal): Fortnightly Sectional SSE/JE(Signal): Monthly SSE (Signal)/Incharge :
                Quarterly

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
                    <tbody id="t3_body">

                    </tbody>
                </table>
            </div>

            <div class="card-footer d-flex justify-content-between">
                <div id="t3Form_status"></div>
                <button type='button' id="t3FormBtn" class="btn btn-success">Final Submit</button>
            </div>

        </div>
    </div>
</div>


<!-- Modal T5 -->
<div class="modal fade" id="componentForm_T5" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="componentFormLabelT5" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="componentFormLabelT5">
                    <span class="badge badge-success h3">
                        Schedule Code: T5
                    </span>

                    <!-- <span id="modalSubCompoName"></span>
                    <span class="badge badge-danger h3" id="modalSubCompoType"></span> -->
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="m-2 text-center alert alert-danger" style="font-size:13px">

                Periodicity: Technician(Signal): Fortnightly Sectional SSE/JE(Signal): Monthly SSE (Signal)/Incharge :
                Quarterly

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
                    <tbody id="t5_body">

                    </tbody>
                </table>
            </div>

            <div class="card-footer d-flex justify-content-between">
                <div id="t5Form_status"></div>
                <button type='button' id="t5FormBtn" class="btn btn-success">Final Submit</button>
            </div>

        </div>
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
    // alert()
    let componetData = g_st_compList.filter(x => x['station_component'] == componentName);
    console.log("vishnu componetData ", componetData);

    if (componetData.length == 0) {
        alert("no sub component added yet");
        return;
    }


    let subComponentData = componetData[0]['sub_component'].split(',');


    let divAlert = document.createElement("div");
    divAlert.className = "alert alert-warning text-center h6";
    divAlert.innerHTML = "Station Sub Component List";

    let divWrap = document.createElement("div");
    divWrap.className = "d-flex flex-wrap my-2";

    let btn = '';
    let stationComName = val.target.id.split("_")[1]

    let btnColor = val.target.classList[(val.target.classList).length - 1].split("-")[1]
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

    if (EPtype === 'EP2') {
        $("#EP2_1").val(new Date().toISOString().split("T")[0]);
        $("#componentForm_EP2").modal("show");
        return;
    }

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
    getComponent();

    $("#ep1FormBtn").click(function() {
        if (confirm("Do you want to final submit EP1 Form")) {
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


            let userID = '<?php echo $_SESSION['userretailer']; ?>';
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
            
            
            let userID = '<?php echo $_SESSION['userretailer']; ?>'
            
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
                },
                beforeSend: function() {
                    $("#loader_show").removeClass('d-none');

                },
                success: function(response) {
                    let respo = JSON.parse(response);
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

    $("#ep4FormBtn").click(function() {
        if (confirm("Do you want to final submit EP4 Form")) {
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


            let userID = '<?php echo $_SESSION['userretailer']; ?>';
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


            let userID = '<?php echo $_SESSION['userretailer']; ?>';
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
                $("#t2Form_status").html("Serial no 2 is required").css("color", "red");
                return;
            } else {
                $("#t2Form_status").html("");
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

          





            let userID = '<?php echo $_SESSION['userretailer']; ?>';
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
                    remark2:remark2

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


            let userID = '<?php echo $_SESSION['userretailer']; ?>';
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


            let userID = '<?php echo $_SESSION['userretailer']; ?>';
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
    $("#t5FormBtn").click(function() {
        if (confirm("Do you want to final submit T5 Form")) {
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

           


            let userID = '<?php echo $_SESSION['userretailer']; ?>';
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
});




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

    case "T5":
        tableId = "t5_body";
        $("#componentForm_T5").modal("show");
        break;


}


dataList.forEach((element, index) => {


    displayHtml += `
        <tr>
        <th scope="row">${index+1}</th>
        <td>${element['t_details']}</td>
        <td style="vertical-align:middle;width:22%" >
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


});

document.getElementById(tableId).innerHTML = displayHtml;

}

function get_T_formData(tType,subCompo,compo){
    $("#compoNameTmp").val(compo);
    $("#subcompoNameTmp").val(subCompo);

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

                openDialog_T(tType, response['data']);

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