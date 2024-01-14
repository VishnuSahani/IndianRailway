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
                    <td>#v</td>
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
                            <td colspan="3">
                                <table class="table table-bordered">
                                    <thead class="text-center table-dark">
                                        <!-- <tr>
                                        <td rowspan="3">Date</td> <td colspan="6">SPG and Volt</td> <td rowspan="3"> Charging V</td><td rowspan="3">Current V</td><td rowspan="3"> --- </td><td rowspan="3">  िफड इंड पर वोल्टेज</td><td rowspan="3">Near Block</td> <td rowspan="3">Wire status</td> <td rowspan="3">Remark</td>
                                
                                    </tr> -->
                                    <tr>
                                        <td rowspan="3">
                                            
                                            <span class="heading_english">
                                                Date
                                            </span>
                                            <span class="heading_hindi">
                                                दिनांक
                                            </span> 
                                        </td>
                                        <td colspan="6">                                        
                                            <span class="heading_english">
                                                
                                            </span>
                                            <span class="heading_hindi">
                                            
                                            </span>
                                        
                                        </td>
                                        <td rowspan="3"> 
                                            <span class="heading_english">
                                            Total Battery Voltage*
                                                
                                            </span>
                                                <span class="heading_hindi">                                               
                                                    कुल बैटरी वोल्टेज*
                                                </span>
                                        
                                        </td>
                                        <td rowspan="3">
                                                <span class="heading_english">
                                                Charging Voltage (V)
                                                </span>
                                                <span class="heading_hindi">
                                                
                                                    चार्जिंग वोल्टेज (वोल्ट)
                                                </span>
                                            
                                        </td>
                                        <!-- new -->
                                        <td rowspan="3">
                                                <span class="heading_english">
                                                    Charging Current (A)
                                                </span>
                                                <span class="heading_hindi">
                                                    चार्जिंग करेंट (अंपीयर)
                                                
                                                </span>
                                        
                                            </td>
                                                                    
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <span class="heading_english">
                                                Cell 1                                            
                                            </span>
                                            <span class="heading_hindi">
                                                सेल-1
                                            </span>
                                        </td> 
                                        <td colspan="2">
                                            <span class="heading_english">
                                                Cell 2                                            
                                            </span>
                                            <span class="heading_hindi">
                                                सेल-2
                                            </span>
                                        </td>
                                        <td colspan="2">
                                            <span class="heading_english">
                                                Cell 3                                            
                                            </span>
                                            <span class="heading_hindi">
                                                सेल-3
                                            </span>
                                        </td> 
                                
                                    </tr>
                                    <tr>
                                        <td>
                                            
                                            <span class="heading_english">
                                                Sp. Gravity                                            
                                            </span>
                                            <span class="heading_hindi">
                                                विशिष्ट गुरुत्व
                                            </span>
                                        </td>
                                        <td >
                                        
                                            <span class="heading_english">
                                                Voltage                                            
                                            </span>
                                            <span class="heading_hindi">
                                                वोल्टेज
                                            </span>
                                        </td>
                                        
                                        <td>
                                            
                                            <span class="heading_english">
                                                Sp. Gravity                                            
                                            </span>
                                            <span class="heading_hindi">
                                                विशिष्ट गुरुत्व
                                            </span>
                                        </td>
                                        <td >
                                        
                                            <span class="heading_english">
                                                Voltage                                            
                                            </span>
                                            <span class="heading_hindi">
                                                वोल्टेज
                                            </span>
                                        </td>

                                        <td>
                                            
                                            <span class="heading_english">
                                                Sp. Gravity                                            
                                            </span>
                                            <span class="heading_hindi">
                                                विशिष्ट गुरुत्व
                                            </span>
                                        </td>
                                        <td >
                                        
                                            <span class="heading_english">
                                                Voltage                                            
                                            </span>
                                            <span class="heading_hindi">
                                                वोल्टेज
                                            </span>
                                        </td>
                                
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
                                        <td>
                                            <div id="date1"></div>
                                        </td>
                                        <td>
                                            <div id="sale1_spg" ></div>
                                        </td>
                                        <td>
                                            <div id="sale1_v" ></div>
                                        </td>
                                        <td>
                                            <div id="sale2_spg"></div>
                                        </td>
                                        <td>
                                            <div id="sale2_v"></div>
                                        </td>
                                        <td>
                                            <div id="sale3_spg"></div>
                                        </td>
                                        <td>
                                            <div id="sale3_v"></div>
                                        </td> 
                                        <!-- new -->
                                        <td>
                                            <div id="total_battery_voltage"></div>
                                        </td>                                
                                        <td>
                                            <div id="charging_v" ></div>
                                        </td> 
                                        <td>
                                            <div id="charging_current" ></div>
                                        </td>                                                  
                                        
                                
                                    </tr>
                                    </tbody>

                                    <!-- new form -->
                                    <thead class="table-dark">
                                        <tr>
                                            <td rowspan="2">
                                            <span class="heading_english">
                                                
                                                Regulating Resistance (Ohms)
                                                </span>
                                                <span class="heading_hindi">
                                                
                                                रेगुलेटिंग रेजीस्टेंस का मान (ओम)
                                                </span>
                                            </td>
                                            <td colspan="2">
                                            <span class="heading_english">
                                                Feed End
                                                
                                            </span>
                                            <span class="heading_hindi">
                                            
                                                फीड एंड
                                            </span>
                                            </td>
                                            <td colspan="2">
                                            <span class="heading_english">
                                                Relay End
                                                
                                                </span>
                                                <span class="heading_hindi">
                                                
                                                    रीले एंड
                                                </span>
                                            </td>
                                            <td rowspan="2">
                                            <span class="heading_english">
                                                Value of voltage across the regulating resistance
                                                </span>
                                                <span class="heading_hindi">
                                                
                                                रेगुलेटिंग रेजीस्टेंस के आर-पार वोल्टेज का मान

                                                </span>
                                            </td>
                                            <td colspan="2">
                                            <span class="heading_english">
                                                
                                                Voltage on Choke
                                                </span>
                                                <span class="heading_hindi">
                                                
                                                    चोक पर वोल्टेज
                                                </span>
                                            </td>
                                            <td colspan="3">
                                            <span class="heading_english">
                                                
                                                Voltage on TR*
                                                </span>
                                                <span class="heading_hindi">
                                                
                                                    ट्रैक रिले पर वोल्टेज*
                                                </span>
                                            </td>
                                        
                                        </tr>
                                        <tr>
                                            <td> 
                                            <span class="heading_english">
                                                Voltage (V)
                                                
                                                </span>
                                                <span class="heading_hindi">
                                                
                                                    वोल्टेज (वोल्ट) 
                                                </span>
                                            </td>
                                            <td> 
                                            <span class="heading_english">
                                                
                                                Current (A)
                                            </span>
                                            <span class="heading_hindi">
                                            
                                                करेंट (अंपीयर) 
                                            </span>
                                            </td>
                                                <td> 
                                                <span class="heading_english">
                                                
                                                    Voltage (V)
                                                </span>
                                                <span class="heading_hindi">
                                                    वोल्टेज (वोल्ट) 
                                                
                                                </span>
                                            
                                            </td>
                                            <td> 
                                            <span class="heading_english">
                                                
                                                Current (A)
                                                </span>
                                                <span class="heading_hindi">
                                                
                                                    करेंट (अंपीयर) 
                                                </span>
                                                
                                                </td>
                                            <td> 
                                            <span class="heading_english">
                                                Relay End
                                                
                                                </span>
                                                <span class="heading_hindi">
                                                
                                                    फीड एंड 
                                                </span>
                                            </td>
                                            <td> 
                                            <span class="heading_english">
                                                
                                                Feed End
                                                </span>
                                                <span class="heading_hindi">
                                                
                                                    रीले एंड
                                                </span>
                                            </td>
                                            <td> 
                                                R1-R2 
                                            </td>
                                            <td> 
                                                A2-D2 
                                            
                                            </td>
                                            <td> 
                                                A1-D1 
                                            
                                            </td>

                                        </tr>

                                    </thead>

                                    <tbody>
                                        <tr>
                                    <td>
                                        <div id="regulating_om"></div>
                                    </td>                                                  
                                    <td>
                                        <div id="feed_volt"></div>
                                        </td>                                                  
                                    <td>
                                        <div id="feed_amp"></div>
                                        </td>                                                  
                                    <td>
                                        <div id="reed_volt"></div>
                                        </td>                                                  
                                    <td>
                                        <div id="reel_amp"></div>
                                        </td>                                                  
                                    <td>
                                        <div id="regulating_registance"></div>
                                    </td>                                                  
                                    <td>
                                        <div id="check_feed"></div>
                                        </td>                                                  
                                    <td>
                                        <div id="check_reel"></div>
                                        </td>                                                  
                                    <td>
                                        <div id="r1_r2"></div>
                                        </td>                                                  
                                    <td>
                                        <div id="a2_d2"></div>
                                        </td>                                                  
                                    <td>
                                        <div id="a1_d1"></div>
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


<script>
    // global 
    var formDataList_g = [];

    function openDialog(dataList, id) {

       
        let displayHtml = "";

        let tableDataForm = formDataList_g.filter((x) => {
            if (x['id'] == id) {
                return x;
            }
        })[0];

        $("#created_date").html(tableDataForm['created_date']);
        $("#updated_date").html(tableDataForm['updated_date']);

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

        displayHtml += `
            </td>
            </tr>
        `;


    });

console.log("tableDataForm=>", tableDataForm);


$("#date1").html(tableDataForm['date1']);
$("#sale1_spg").html(tableDataForm['sale1_spg']);
$("#sale1_v").html(tableDataForm['sale1_v']);
$("#sale2_spg").html(tableDataForm['sale2_spg']);
$("#sale2_v").html(tableDataForm['sale2_v']);
$("#sale3_spg").html(tableDataForm['sale3_spg']);
$("#sale3_v").html(tableDataForm['sale3_v']);
$("#total_battery_voltage").html(tableDataForm['total_battery_voltage']);
$("#charging_v").html(tableDataForm['charging_v']);
$("#charging_current").html(tableDataForm['charging_current']);


$("#regulating_om").html(tableDataForm['regulating_om']);
$("#feed_volt").html(tableDataForm['feed_volt']);
$("#feed_amp").html(tableDataForm['feed_amp']);

$("#reed_volt").html(tableDataForm['reed_volt']);
$("#reel_amp").html(tableDataForm['reel_amp']);
$("#regulating_registance").html(tableDataForm['regulating_registance']);
$("#check_feed").html(tableDataForm['check_feed']);
$("#check_reel").html(tableDataForm['check_reel']);
$("#r1_r2").html(tableDataForm['r1_r2']);
$("#a2_d2").html(tableDataForm['a2_d2']);
$("#a1_d1").html(tableDataForm['a1_d1']);


        document.getElementById("t1_body").innerHTML = displayHtml;

    }

    function showFormDetails(id, language) {

        if (language == "Hindi") {
            $(".heading_english").addClass('d-none')
            $(".heading_hindi").removeClass('d-none')
        } else {
            $(".heading_hindi").addClass('d-none')
            $(".heading_english").removeClass('d-none')
        }


        if (id != '') {

            $.ajax({
                type: "POST",
                url: "query/common-form-data-action.php",
                data: {
                    "common_action": "getT_FormDetails",
                    "formType": "T1",
                    "language": language
                },
                beforeSend: function () {
                    $("#loader_show").removeClass('d-none');


                },
                success: function (respo) {
                    $("#loader_show").addClass('d-none');

                    let response = JSON.parse(respo);

                    if (response['status']) {

                        openDialog(response['data'], id);


                    } else {
                        $("#showError").html(response['msg']);
                    }

                },
                complete: function () {
                    $("#loader_show").addClass('d-none');

                }
            });

        } else {
            alert("Id is not set");
        }

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

            let createSubcompo = `<div class="text-center h5 alert alert-danger my-2">Point "T1" Form</div>`;
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
                "formType": "T1"
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