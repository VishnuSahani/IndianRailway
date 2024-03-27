<?php
// require('header.php');
// require('include/db_config.php');

// echo "DAC4";
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
                </tr>
            </thead>

            <tbody id="printTableData">

            </tbody>
        </table>
    </div>
</div>

<!-- Modal DAC4 -->
<div class="modal fade" id="componentForm_DAC4" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="componentFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div id="pdfBodyDAC4">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="componentFormLabel">
                        <span class="badge badge-success h3" id="modalComponentName">
                            
                            <span class="heading_english">
                            Maintenance Schedule of Digital Axle Counter DAC4
                                </span>

                                <span class="heading_hindi">
                                डिजिटल एक्सल काउंटर के रखरखाव का कार्यक्रम DAC4
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
                    Periodicity: Sectional SSE/JE(Signal): Half Yearly SSE(Signal)/Incharge : Yearly
                    </span>

                    <span class="heading_hindi">
                    आवधिकता: अनुभागीय सीसेई/जेई (सिग्नल): अर्ध वार्षिक, सीसेई(सिग्नल)/प्रभारी : वार्षिक
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
                                <th scope="col" style="width:25%">
                                <span class="heading_english">
                                    Action
                                </span>

                                <span class="heading_hindi">
                                    कार्रवाई
                                 </span>    
                                </th>
                        </tr>
                    </thead>
                        <tbody id="dac4_body">
                        <tr>
                            <td>1</td>
                            <td>
                                <span class="heading_english">
                                Measurement of Earth value of SSDAC, including earth continuity up to equipment & paint its value on earth enclosures/nearest wall. Readings of earth value to be recorded in earth measurement register for future reference. It should be less than 1 ohm. Earth Value(< 1Ω)*	Blank column to enter numeric value
                                </span>

                                <span class="heading_hindi">
                                एसएसडीएसी के पृथ्वी मूल्य का मापन, जिसमें उपकरण तक पृथ्वी की निरंतरता और पृथ्वी के बाड़ों/निकटतम दीवार पर इसके मूल्य को पेंट करना शामिल है। भविष्य के संदर्भ के लिए पृथ्वी माप रजिस्टर में पृथ्वी मूल्य की रीडिंग दर्ज की जाएगी। यह 1 ओम से कम होना चाहिए. पृथ्वी मान(< 1Ω)* संख्यात्मक मान दर्ज करने के लिए खाली कॉलम
                                 </span> 

                                 <div class="d-flex my-2 border p-3 justify-content-center align-items-center">
                                    <span class="mr-3">
                                        <span class="heading_english">
                                            Earth Value(< 1Ω)* :                                            
                                        </span> 
                                    <span class="heading_hindi">
                                    अर्थ मान (< 1Ω)*
                                    </span> 
                                    </span>
                                    <span class="ml-4" id="dac4_earthValue">
                                        
                                    </span>
                                 </div>
                            </td>
                            <td>
                                <div id="dac4_1">                           
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card-footer d-flex justify-content-end ">
                <!-- <div id="dac4Form_status"></div> -->
                <!-- <button type='button' id="dac4FormBtn" class="btn btn-success">Final Submit</button> -->
                <button type='button' id="dac4PdfBtn" onclick="generatePdf('DAC4','pdfBodyDAC4')"
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

        let displayHtml = "";

        let tableDataForm = formDataList_g.filter((x) => {
            if (x['id'] == id) {
                return x;
            }
        })[0];
        $("#created_date").html(tableDataForm['created_date']);
        $("#updated_date").html(tableDataForm['updated_date']);
        $("#dac4_earthValue").html(tableDataForm['dac4_earthValue']);

        $("#componentForm_DAC4").modal("show");

        let value = tableDataForm['dac4_1']

        if (updateCheck.includes(value)) {

                displayHtml +=
                    `<select class="form-control w-100">
                <option>${value}</option>
                <option value='${updateValue[value]}'>${updateValue[value]}</option>
                </select> <button type="button" onclick="updateSingleValue('${updateValue[value]}','DAC4','dac4_1','${tableDataForm['id']}')" class="btn btn-sm btn-success my-1">Update</button>`;

                } else {
                // displayHtml += `<input type="text" class="form-control" disabled value="${value}">`;
                displayHtml += `<div class="">${value}</div>`;
                }

                $("#dac4_1").html(displayHtml);

    }

    function showFormDetails(id, language) {

        if (language == "Hindi") {
            $(".heading_english").addClass('d-none')
            $(".heading_hindi").removeClass('d-none')
        } else {
            $(".heading_hindi").addClass('d-none')
            $(".heading_english").removeClass('d-none')
        }

        openDialog(id);


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
        <td style="vertical-align:middace;width:22%" >`;

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

            let createSubcompo = `<div class="text-center h5 alert alert-danger my-2">Point "DAC4" Form</div>`;
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
                "formType": "DAC4"
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