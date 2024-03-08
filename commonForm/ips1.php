<?php
// require('header.php');
// require('include/db_config.php');

// echo "IPS1";
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

<!-- Modal IPS1 -->
<div class="modal fade" id="componentForm_IPS1" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="componentFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div id="pdfBodyIPS1">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="componentFormLabel">
                        <span class="badge badge-success h3" id="modalComponentName">
                        <span class="heading_english">
                         Maintenance Schedules for Integrated Power Supply System IPS1

                            </span>

                            <span class="heading_hindi">
                            एकीकृत विद्युत आपूर्ति प्रणाली के लिए रखरखाव अनुसूचियां IPS 1



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

                 Periodicity: Technician (Signal): Monthly 
                                     Sectional SSE/JE(Signal): Bi-Monthly
                             SSE(Signal)/Incharge: Quarterly
                        </span>
                        <span class="heading_hindi">
                        आवधिकता: तकनीशियन (सिग्नल): मासिक,
                                          अनुभागीय सीसेई/जेई (सिग्नल): द्वि-मासिक,
           सीसेई (सिग्नल)/प्रभारी: त्रैमासिक
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
                        <tbody id="ips1_body">

                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card-footer d-flex justify-content-end ">
                <!-- <div id="ips1Form_status"></div> -->
                <!-- <button type='button' id="ips1FormBtn" class="btn btn-success">Final Submit</button> -->
                <button type='button' id="ips1PdfBtn" onclick="generatePdf('IPS1','pdfBodyIPS1')"
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

        let tableId = '';
        let displayHtml = "";

        let tableDataForm = formDataList_g.filter((x) => {
            if (x['id'] == id) {
                return x;
            }
        })[0];

        
        let ips1_load = tableDataForm['ips1_load'];
        let ips1_adcp = tableDataForm['ips1_adcp'];
        let ips1_dcdp = tableDataForm['ips1_dcdp'];
        

        $("#created_date").html(tableDataForm['created_date']);
        $("#updated_date").html(tableDataForm['updated_date']);


        $("#componentForm_IPS1").modal("show");

        let language = tableDataForm['language'];
        let l9 = "मुख्य आपूर्ति वोल्टेज को आईपीएस तक मापें";
        let la = "लोड";
        let lb = "एसीडीपी (वोल्ट)";
        let lc = "डीसीडीपी (वोल्ट)";
        if(language == 'English'){
            l9 = "Main Supply voltage to IPS";
            la = "LOAD";
            lb = "ACDP (V)";
            lc = "DCDP (V)";
        }

        dataList.forEach((element, index) => {

            let value = tableDataForm[element['ips_id'].toLowerCase()];

            
            let detailsNew = "";
        

            if(index == 8){

                detailsNew = `${element['ips_details']} <div class="p-2 border">${l9} : <span>${tableDataForm['ips1_8_supply_volt']}</span></div>`;

            }else if(index == 9){
                detailsNew = `${element['ips_details']}
                <table class="table table-bordered">
<tr>
<th>${la}</th>
<th>${lb}</th>
<th>${lc}</th>
</tr>
<tr>
<td><div>${ips1_load}</div></td>
<td><div>${ips1_adcp}</div</td>
<td><div>${ips1_dcdp}</div></td>
</tr>
</table>
                `;

            }else{
                detailsNew = element['ips_details'];
            }


            displayHtml += `
    <tr>
    <th scope="row">${index + 1}</th>
    <td>${detailsNew}</td>
    <td style="vertical-align:middle;width:22%" >`;

            if (value == 'Not Done') {

                displayHtml +=
                    `<select class="form-control">
            <option>${value}</option>
            <option value='Done'>Done</option>
        </select> <button type="button" onclick="updateSingleValue('Done','IPS1','${element['ips_id']}','${tableDataForm['id']}')" class="btn btn-sm btn-success my-1">Update</button>`;

            } else if (value == 'नहीं किया') {

                displayHtml +=
                    `<select class="form-control">
            <option>${value}</option>
            <option value='हो गया'>हो गया</option>
        </select> <button type="button" onclick="updateSingleValue('हो गया','IPS1','${element['ips_id']}','${tableDataForm['id']}')" class="btn btn-sm btn-success my-1">Update</button>`;

            } else {
                // displayHtml += `<input type="text" class="form-control" disabled value="${value}">`;
                displayHtml += `<div class="">${value}</div>`;
            }



            displayHtml += `
    </td>
    </tr>
`;


        });

        document.getElementById("ips1_body").innerHTML = displayHtml;

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
                    "common_action": "getIPS_FormDetails",
                    "formType": "IPS1",
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

            let createSubcompo = `<div class="text-center h5 alert alert-danger my-2">Point "IPS1" Form</div>`;
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
                "formType": "IPS1"
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