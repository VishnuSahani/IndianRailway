<?php
// require('header.php');
// require('include/db_config.php');

// echo "CS1";
// echo $_SESSION['empid_for_form'];
// print_r($_SESSION);
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
                    <td>#v</td>
                    <td>Component</td>
                    <td>Language</td>
                    <td>Sub Component</td>
                    <td>Created Date </td>
                    <td>Updated Date </td>
                    <td>Action</td>
                    <td>View</td>
                </tr>
            </thead>

            <tbody id="printTableData">

            </tbody>
        </table>
    </div>
</div>

<!-- Modal CS1 -->
<div class="modal fade" id="componentForm_CS1" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="componentFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div id="pdfBodyCS1">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="componentFormLabel">
                        <span class="badge badge-success h3" id="modalComponentName">
                            <span class="heading_english">
                                Maintenance Schedule of Colour Light Signal CS1
                            </span>
                            <span class="heading_hindi">
                                CS1
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

                    <div class="col-6">
                        <span>Created Date:</span>

                        <span class="ml-2 font-weight-bold" id="created_date">

                        </span>

                    </div>
                    <div class="col-6">
                        <span>Updated Date:</span>

                        <span class="ml-2 font-weight-bold" id="updated_date">

                        </span>

                    </div>
                </div>
                <div class="m-2 text-center alert alert-danger" style="font-size:13px">

                    <span class="heading_english">
                        Periodicity: Technician(Signal): Monthly, Sectional SSE/JE(Signal): Quarterly, SSE(Signal)/In
                        charge: Half yearly
                    </span>

                    <span class="heading_hindi">
                        आवधिकता: तकनीशियन (सिग्नल): मासिक, अनुभागीय सीसेई /जेई (सिग्नल): त्रैमासिक, सीसेई
                        (सिग्नल)/प्रभारी: अर्धवार्षिक
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
                                <td>
                                    <span class="heading_english">
                                        Cleaning of LED lighting unit & current regulator/integrated LED, all
                                        terminations, housing, signal units & around signal post.
                                    </span>

                                    <span class="heading_hindi">
                                        LED लाइटिंग यूनिट और करंट रेगुलेटर/एकीकृत LED, सभी टर्मिनल, हाउसिंग, सिग्नल
                                        इकाइयों और सिग्नल पोस्ट के आसपास की सफाई।
                                    </span>
                                </td>
                                <td style="vertical-align:middle;width:16%">
                                    <!-- <input class="form-control CS1Class" disable="true" readonly id="cs1_1"> -->
                                    <div id="cs1_1"></div>

                                </td>
                            </tr>



                            <tr>
                                <th scope="row">2</th>
                                <td>M
                                    <span class="heading_english">
                                        Measurement of input voltage & current with clamp type ammeter at input
                                        terminals of current regulator/LED signal for all signal aspects and V/I reading
                                        shall be within specified range as below:
                                    </span>
                                    <span class="heading_hindi">
                                        सभी सिग्नल पहलुओं और वोल्टेज/करेंट रीडिंग के लिए करंट रेगुलेटर/LED सिग्नल के
                                        इनपुट टर्मिनलों पर क्लैंप टाइप एमीटर के साथ इनपुट वोल्टेज और करंट का मापन नीचे
                                        दी गई निर्दिष्ट सीमा के भीतर होगा:
                                    </span>
                                    <br>
                                    (a) <span class="heading_english"> Main signal Voltage: 82.5 to137.5 V and Current:
                                        112 to 154 mA </span>
                                    <span class="heading_hindi">मुख्य सिग्नल वोल्टेज: 82.5 से 137.5 V और करंट: 112 से
                                        154 mA ।</span>
                                    <br>
                                    (b) <span class="heading_english"> Calling on/A/AG Marker Voltage: 88 to 132 V and
                                        current: 120 to 165 mA. </span><span class="heading_hindi">कॉलिंग ऑन/ए/एजी
                                        मार्कर वोल्टेज: 88 से 132 V और करंट: 120 से 165 mA ।</span>
                                    <br>
                                    (c) <span class="heading_english"> Route signal Voltage: 88 to 132 V and Current:
                                        23.75 to 26.25 mA per LED.</span> <span class="heading_hindi">रूट सिग्नल
                                        वोल्टेज: 88 से 132 V और करंट: 23.75 से 26.25 mA प्रति LED ।</span>
                                    <br>
                                    (d) <span class="heading_english"> Shunt signal Voltage: 88 to 132 V and Current:
                                        52.25 to 57.75 mA per LED. </span><span class="heading_hindi">शंट सिग्नल
                                        वोल्टेज: 88 से 132 V और करंट: 52.25 से 57.75 mA प्रति LED ।</span>

                                </td>
                                <td style="vertical-align:middle;width:16%">
                                    <!-- <input class="form-control CS1Class" disable="true" readonly id="cs1_2"> -->
                                    <div id="cs1_2"></div>

                                </td>

                            </tr>

                            <tr>
                                <td colspan="3">
                                    <table style="width:100%" border='1'>
                                        <thead>
                                            <tr>
                                                <td rowspan="2">Date</td>
                                                <td colspan="2">RG</td>
                                                <td colspan="2">HG</td>
                                                <td colspan="2">DG</td>
                                                <td colspan="2">HHG</td>
                                                <td colspan="2">ROUTE</td>
                                                <td colspan="2">Calling-ON</td>
                                                <td colspan="2">Shunt</td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <span class="heading_english">Voltage</span>
                                                    <span class="heading_hindi">वोल्टेज</span>
                                                    (V)
                                                </td>
                                                <td>
                                                    <span class="heading_english">Current</span>
                                                    <span class="heading_hindi">करेंट</span>
                                                    (mA)
                                                </td>

                                                <td>
                                                    <span class="heading_english">Voltage</span>
                                                    <span class="heading_hindi">वोल्टेज</span>
                                                    (V)
                                                </td>
                                                <td>
                                                    <span class="heading_english">Current</span>
                                                    <span class="heading_hindi">करेंट</span>
                                                    (mA)
                                                </td>

                                                <td>
                                                    <span class="heading_english">Voltage</span>
                                                    <span class="heading_hindi">वोल्टेज</span>
                                                    (V)
                                                </td>
                                                <td>
                                                    <span class="heading_english">Current</span>
                                                    <span class="heading_hindi">करेंट</span>
                                                    (mA)
                                                </td>

                                                <td>
                                                    <span class="heading_english">Voltage</span>
                                                    <span class="heading_hindi">वोल्टेज</span>
                                                    (V)
                                                </td>
                                                <td>
                                                    <span class="heading_english">Current</span>
                                                    <span class="heading_hindi">करेंट</span>
                                                    (mA)
                                                </td>

                                                <td>
                                                    <span class="heading_english">Voltage</span>
                                                    <span class="heading_hindi">वोल्टेज</span>
                                                    (V)
                                                </td>
                                                <td>
                                                    <span class="heading_english">Current</span>
                                                    <span class="heading_hindi">करेंट</span>
                                                    (mA)
                                                </td>

                                                <td>
                                                    <span class="heading_english">Voltage</span>
                                                    <span class="heading_hindi">वोल्टेज</span>
                                                    (V)
                                                </td>
                                                <td>
                                                    <span class="heading_english">Current</span>
                                                    <span class="heading_hindi">करेंट</span>
                                                    (mA)
                                                </td>

                                                <td>
                                                    <span class="heading_english">Voltage</span>
                                                    <span class="heading_hindi">वोल्टेज</span>
                                                    (V)
                                                </td>
                                                <td>
                                                    <span class="heading_english">Current</span>
                                                    <span class="heading_hindi">करेंट</span>
                                                    (mA)
                                                </td>

                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div id="date"></div>
                                                </td>
                                                <td>
                                                    <div id="rg_v"></div>
                                                </td>
                                                <td>
                                                    <div id="rg_c"></div>
                                                </td>
                                                <td>
                                                    <div id="hg_v"></div>

                                                </td>
                                                <td>
                                                    <div id="hg_c"></div>

                                                </td>
                                                <td>
                                                    <div id="dg_v"></div>
                                                </td>
                                                <td>
                                                    <div id="dg_c"></div>
                                                </td>
                                                <td>
                                                    <div id="hhg_v"></div>
                                                </td>
                                                <td>
                                                    <div id="hhg_c"></div>
                                                </td>
                                                <td>
                                                    <div id="route_v"></div>
                                                </td>
                                                <td>
                                                    <div id="route_c"></div>
                                                </td>
                                                <td>
                                                    <div id="c_on_v"></div>
                                                </td>
                                                <td>
                                                    <div id="c_on_c"></div>
                                                </td>
                                                <td>
                                                    <div id="shout_v"></div>
                                                </td>
                                                <td>
                                                    <div id="shout_c"></div>
                                                </td>
                                            </tr>
                                        </tbody>

                                    </table>

                                </td>
                            </tr>

                            <tr>
                                <th scope="row">3</th>
                                <td>
                                    <span class="heading_english">
                                        Checking of tightness of all adjusting screws of LED signal unit as well as
                                        Current regulator/integrated LED.</span>

                                    <span class="heading_hindi">LED सिग्नल यूनिट के साथ-साथ करंट रेगुलेटर/इंटीग्रेटेड
                                        LED के सभी एडजस्टिंग स्क्रू की जकड़न की जाँच करना।</span>


                                </td>
                                <td style="vertical-align:middle;width:16%">
                                    <!-- <input class="form-control CS1Class" disable="true" readonly id="cs1_3"> -->
                                    <div id="cs1_3"></div>

                                </td>
                            </tr>

                            <tr>
                                <th scope="row">4</th>
                                <td>
                                    <span class="heading_english">
                                        Ensure condition of signal post is satisfactory.
                                    </span>

                                    <span class="heading_hindi">सुनिश्चित करें कि सिग्नल पोस्ट की स्थिति संतोषजनक
                                        है।</span>
                                </td>
                                <td style="vertical-align:middle;width:16%">
                                    <!-- <input class="form-control CS1Class" disable="true" readonly id="cs1_4"> -->
                                    <div id="cs1_4"></div>

                                </td>
                            </tr>

                            <tr>
                                <th scope="row">5</th>
                                <td>
                                    <span class="heading_english">
                                        Check condition of Signal foundation, ladder & ensure proper alignment of signal
                                        post.</span>
                                    <span class="heading_hindi">सिग्नल फाउंडेशन, सीढ़ी की स्थिति की जांच करें और सिग्नल
                                        पोस्ट का उचित संरेखण सुनिश्चित करें।</span>

                                </td>
                                <td style="vertical-align:middle;width:16%">
                                    <!-- <input class="form-control CS1Class" disable="true" readonly id="cs1_5"> -->
                                    <div id="cs1_5"></div>

                                </td>
                            </tr>

                            <tr>
                                <th scope="row">6</th>
                                <td>
                                    <span class="heading_english">
                                        Ensure Signal unit condition, closing of door & locking arrangements are
                                        satisfactory.</span>
                                    <span class="heading_hindi">सुनिश्चित करें कि सिग्नल यूनिट की स्थिति, दरवाजा बंद
                                        करने और लॉक करने की व्यवस्था संतोषजनक है।</span>

                                </td>
                                <td style="vertical-align:middle;width:16%">
                                    <!-- <input class="form-control CS1Class" disable="true" readonly id="cs1_6"> -->
                                    <div id="cs1_6"></div>

                                </td>
                            </tr>

                            <tr>
                                <th scope="row">7</th>
                                <td>
                                    <span class="heading_english">
                                        Ensure Signal post & CLS unit should be earthed & screen earthing is
                                        effective.</span>
                                    <span class="heading_hindi">सुनिश्चित करें कि सिग्नल पोस्ट और सिग्नल यूनिट को अर्थ
                                        किया जाना चाहिए और स्क्रीन अर्थिंग प्रभावी है।</span>
                                </td>
                                <td style="vertical-align:middle;width:16%">
                                    <!-- <input class="form-control CS1Class" disable="true" readonly id="cs1_7"> -->
                                    <div id="cs1_7"></div>

                                </td>
                            </tr>

                            <tr>
                                <th scope="row">8</th>
                                <td>
                                    <span class="heading_english">
                                        Complete signal unit should be cleaned for removing oxidation, rusting &
                                        tightened properly.</span>
                                    <span class="heading_hindi">ऑक्सीकरण, जंग हटाने और ठीक से कसने के लिए पूरी सिग्नल
                                        यूनिट को साफ किया जाना चाहिए।</span>
                                </td>
                                <td style="vertical-align:middle;width:16%">
                                    <!-- <input class="form-control CS1Class" disable="true" readonly id="cs1_8"> -->
                                    <div id="cs1_8"></div>

                                </td>
                            </tr>

                            <tr>
                                <th scope="row">9</th>
                                <td>
                                    <span class="heading_english">
                                        Ensure that there is no opening/access for rain water/rodent entry.</span>
                                    <span class="heading_hindi">सुनिश्चित करें कि वर्षा जल/कृंतक प्रवेश के लिए कोई
                                        खुला/पहुँच नहीं है।</span>
                                </td>
                                <td style="vertical-align:middle;width:16%">
                                    <!-- <input class="form-control CS1Class" disable="true" readonly id="cs1_9"> -->
                                    <div id="cs1_9"></div>

                                </td>
                            </tr>

                            <tr>
                                <th scope="row">10</th>
                                <td>
                                    <span class="heading_english">
                                        Ensure the cable terminations in location box should be cleaned for removing
                                        oxidation, rusting & tightened properly.</span>
                                    <span class="heading_hindi">सुनिश्चित करें कि ऑक्सीकरण, जंग हटाने और ठीक से कसने के
                                        लिए लोकेशन बॉक्स में केबल टर्मिनेशन को साफ किया जाना चाहिए।</span>


                                </td>
                                <td style="vertical-align:middle;width:16%">
                                    <!-- <input class="form-control CS1Class" disable="true" readonly id="cs1_10"> -->
                                    <div id="cs1_10"></div>

                                </td>
                            </tr>

                            <tr>
                                <th scope="row">11</th>
                                <td>
                                    <span class="heading_english">
                                        Visual check of insulations of cables, PVC wires, proper termination without
                                        criss cross, condition of rubber gasket arrangement.</span>

                                    <span class="heading_hindi">केबलों, पीवीसी तारों के इन्सुलेशन की दृश्य जांच, क्रिस
                                        क्रॉस के बिना उचित समाप्ति, रबर गैसकेट व्यवस्था की स्थिति।</span>

                                </td>
                                <td style="vertical-align:middle;width:16%">
                                    <!-- <input class="form-control CS1Class" disable="true" readonly id="cs1_11"> -->
                                    <div id="cs1_11"></div>

                                </td>
                            </tr>

                            <tr>
                                <th rowspan="3" scope="row">12</th>
                                <td>
                                    <span class="heading_english">
                                        (a) Check that where signals are Infringing with SOD, their Implantation
                                        distance is marked on Red colour on white back ground.</span>
                                    <span class="heading_hindi">जांचें कि जहां सिग्नल SOD का उल्लंघन कर रहे हैं, उनकी
                                        इम्प्लांटेशन दूरी सफेद पृष्ठभूमि पर लाल रंग में अंकित है।</span>

                                    (b) <span class="heading_english">
                                        Blanking off to be done as given in chapter 19 of SEM.</span>
                                    <span class="heading_hindi">SEM के अध्याय 19 में दिए गए अनुसार Blanking Off करना
                                        होगा।</span>

                                    (c) <span class="heading_english">
                                        Right hand signals to be provided with an arrow mark pointing towards the
                                        relevant track.</span>
                                    <span class="heading_hindi">दाहिने हाथ के सिग्नल को संबंधित ट्रैक की ओर इंगित करने
                                        वाले तीर के निशान के साथ प्रदान किया जाना चाहिए।</span>

                                </td>
                                <td style="vertical-align:middle;width:16%">
                                    <div id="cs1_12a"></div>

                                </td>
                            </tr>


                        </tbody>



                    </table>



                </div>
            </div>

            <div class="card-footer d-flex justify-content-end ">
                <!-- <div id="cs1Form_status"></div> -->
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

<script>
    // global 
    var formDataList_g = [];

    function openDialog(id) {

        let cs1DataObj = formDataList_g.filter((x) => {
            if (x['id'] == id) {
                return x;
            }
        })[0];

        $("#componentForm_CS1").modal("show");
        $("#created_date").html(cs1DataObj['created_date']);
        $("#updated_date").html(cs1DataObj['updated_date']);

        let selectList = ['cs1_1','cs1_2','cs1_3','cs1_4','cs1_5','cs1_6','cs1_7','cs1_8','cs1_9','cs1_10','cs1_11','cs1_12a'];

        selectList.forEach(element => {
            let displayHtml = "";
            let value = cs1DataObj[element]
            if (updateCheck.includes(value)) {

                displayHtml +=
                    `<div id='${element}'><select class="form-control">
                <option>${value}</option>
                <option value='${updateValue[value]}'>${updateValue[value]}</option>
                </select> <button type="button" onclick="updateSingleValue('${updateValue[value]}','CS1','${element}','${cs1DataObj['id']}')" class="btn btn-sm btn-success my-1">Update</button></div>`;

                } else {
                    displayHtml += `<div class="">${value}</div>`;
                }
                $("#"+element).html(displayHtml);
        });//for each-loop

    // $("#cs1_1").html(cs1DataObj['cs1_1']);
    // $("#cs1_2").html(cs1DataObj['cs1_2']);
    // $("#cs1_3").html(cs1DataObj['cs1_3']);
    // $("#cs1_4").html(cs1DataObj['cs1_4']);
    // $("#cs1_5").html(cs1DataObj['cs1_5']);

    // $("#cs1_6").html(cs1DataObj['cs1_6']);
    // $("#cs1_7").html(cs1DataObj['cs1_7']);
    // $("#cs1_8").html(cs1DataObj['cs1_8']);
    // $("#cs1_9").html(cs1DataObj['cs1_9']);
    // $("#cs1_10").html(cs1DataObj['cs1_10']);
    // $("#cs1_11").html(cs1DataObj['cs1_11']);
    // $("#cs1_12a").html(cs1DataObj['cs1_12a']);
    
    $("#date").html(cs1DataObj['date']);
    $("#rg_v").html(cs1DataObj['rg_v']);
    $("#rg_c").html(cs1DataObj['rg_c']);
    $("#hg_v").html(cs1DataObj['hg_v']);
    $("#hg_c").html(cs1DataObj['hg_c']);
    $("#dg_v").html(cs1DataObj['dg_v']);
    $("#dg_c").html(cs1DataObj['dg_c']);
    $("#hhg_v").html(cs1DataObj['hhg_v']);
    $("#hhg_c").html(cs1DataObj['hhg_c']);
    $("#route_v").html(cs1DataObj['route_v']);
    $("#route_c").html(cs1DataObj['route_c']);
    $("#c_on_v").html(cs1DataObj['c_on_v']);
    $("#c_on_c").html(cs1DataObj['c_on_c']);
    $("#shout_v").html(cs1DataObj['shout_v']);
    $("#shout_c").html(cs1DataObj['shout_c']);

    }

    function addViewFormSuccessfully(formId,empId){

        let formData = formDataList_g.filter((x) => {
            if (x['id'] == formId) {
                return x;
            }
        })[0];

        if(formData){
                $.ajax({
                type:"POST",
                url:"./query/common-action.php",
                data:{
                    common_action:"whoViewMyFormAdd",
                    empid:empId,
                    formId:formId,
                    section_id : formData.section_id,
                    station_id : formData.station_id,
                    component_name : formData.component_name,
                    form_empid : formData.emp_id
                },
                success:(su)=>{
                    console.log("su",su);
                }
            })
        }

 
    }

    function showFormDetails(id, language) {

        if (language == "Hindi") {
            $(".heading_english").addClass('d-none')
            $(".heading_hindi").removeClass('d-none')
        } else {
            $(".heading_hindi").addClass('d-none')
            $(".heading_english").removeClass('d-none')
        }

        addViewFormSuccessfully(id,'<?php echo $_SESSION['myOriginalId']; ?>');

        openDialog(id);


    }

    function whoViewMyFormFuntion(formId){
        return new Promise((resolve,reject)=>{
            $.ajax({
            type : "POST",
            url:"./query/common-action.php",
            data:{
                common_action:"whoViewMyForm",
                who : '<?php echo $_SESSION['viewType']; ?>',
                id : '<?php echo $_SESSION['empid_for_form']; ?>',
                formId:formId
            },
            success:(response)=>{
                try{
                    let respo =JSON.parse(response);
                    if(respo['data']){
                        resolve(respo['data'])
                    }else{
                        resolve([])
                    }

                }catch(e){
                    resolve([])

                }
            }
        });
        });

    }

    function showTable(subcomponame) {

        $("#mainTable").removeClass('d-none');

        let formData = formDataList_g.filter((x) => x.sub_component == subcomponame);
        let displayHtml = '';


        formData.forEach((element, index) => {

            whoViewMyFormFuntion(element['id']).then((res)=>{
                    let formViewHtml = '';
                    if(res.length){
                        res.forEach(ele => {
                            let btnClass = 'btn-outline-danger';
                            if(ele['isView']){
                                btnClass = 'btn-danger';
                            }
                            formViewHtml+= `<button class="btn m-1 btn-sm ${btnClass}">${ele['type']}</button>`
                        });
                    }

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
        </button></td>`;



        displayHtml += `<td>${formViewHtml}</td></tr>`;

        document.getElementById("printTableData").innerHTML = displayHtml;
        })


        });



    }

    function showSubComponent() {

        $("#mainTable").addClass('d-none');

        document.getElementById("printTableData").innerHTML = "";

        let dataList = [...formDataList_g];

        let subCompo = [...new Set(dataList.map(x => x.sub_component))];

        console.log("subCompo map=", subCompo);

        if (subCompo.length != 0) {

            let createSubcompo = `<div class="text-center h5 alert alert-danger my-2">Point "CS1" Form</div>`;
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
                "formType": "CS1"
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