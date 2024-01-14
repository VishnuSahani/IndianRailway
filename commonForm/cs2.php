<?php
// require('header.php');
// require('include/db_config.php');

// echo "CS2";
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

<!-- Modal CS2 -->
<div class="modal fade" id="componentForm_CS2" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="componentFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div id="pdfBodyCS2">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="componentFormLabel">
                        <span class="badge badge-success h3" id="modalComponentName">
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
                        Periodicity: Technician(Signal): Fortnightly Sectional SSE/JE(Signal): Monthly SSE
                        (Signal)/Incharge :
                        Quarterly
                    </span>

                    <span class="heading_hindi">
                        आवधिकता: तकनीशियन (सिग्नल): पाक्षिक अनुभागीय सीसेई/जेई (सिग्नल): मासिक सीसेई (सिग्नल)/प्रभारी:
                        त्रैमासिक
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

            <div class="card-footer d-flex justify-content-end ">
                <!-- <div id="cs2Form_status"></div> -->
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
        $("#created_date").html(tableDataForm['created_date']);
        $("#updated_date").html(tableDataForm['updated_date']);

        $("#componentForm_CS2").modal("show");

        dataList.forEach((element, index) => {

            let value = tableDataForm[element['cs_id'].toLowerCase()]
            let language = tableDataForm['language'];

            let h1="Implantation distance from center line of nearest track along with an arrow indicating towards nearest track should be painted on signal post in following colours";
            let ha="(a) Black on white background for normal implantation.";
            let hb="(b) Red on white background for implantation distance < 2.36 meters.";
            
            if(language == "Hindi"){
                
                h1="सिग्नल पोस्ट पर निकटतम ट्रैक की केंद्र रेखा से इम्प्लांटेशन दूरी को निकटतम ट्रैक की ओर इंगित करने वाले तीर के साथ निम्नलिखित रंगों में चित्रित किया जाना चाहिए ";
                ha="(ए) सामान्य प्रत्यारोपण के लिए सफेद पृष्ठभूमि पर काला।";
                hb="(बी) प्रत्यारोपण दूरी <2.36 मीटर के लिए सफेद पृष्ठभूमि पर लाल।";
            }

            
        if (element['cs_id'] == 'cs2_5') {
            let value_5a = tableDataForm['cs2_5a'];
            let value_5b = tableDataForm['cs2_5b'];

            displayHtml += `
        <tr>
            <th rowspan="3" scope="row">${index+1}</th>
            <td>${h1}</td>
            <td style="vertical-align:middle;width:22%" >
              
            </td>
        </tr>

        <tr>
            <td>${ha}</td>
            <td style="vertical-align:middle;width:22%" >
            <div class="">${value_5a}</div>

            </td>
        </tr>

        <tr>
            <td>${hb}</td>
            <td style="vertical-align:middle;width:22%" >
            <div class="">${value_5b}</div>

            </td>
        </tr>
    `;

        }else{

            displayHtml += `
    <tr>
    <th scope="row">${index + 1}</th>
    <td>${element['cs_details']}</td>
    <td style="vertical-align:middle;width:22%" >`;

            if (value == 'Not Done') {

                displayHtml +=
                    `<select class="form-control">
            <option>${value}</option>
            <option value='Done'>Done</option>
        </select> <button type="button" onclick="updateSingleValue('Done','CS2','${element['cs_id']}','${tableDataForm['id']}')" class="btn btn-sm btn-success my-1">Update</button>`;

            } else if (value == 'नहीं किया') {

                displayHtml +=
                    `<select class="form-control">
            <option>${value}</option>
            <option value='हो गया'>हो गया</option>
        </select> <button type="button" onclick="updateSingleValue('हो गया','CS2','${element['cs_id']}','${tableDataForm['id']}')" class="btn btn-sm btn-success my-1">Update</button>`;

            } else {
                // displayHtml += `<input type="text" class="form-control" disabled value="${value}">`;
                displayHtml += `<div class="">${value}</div>`;
            }



            displayHtml += `
    </td>
    </tr>
`;


        }


        });

        document.getElementById("cs2_body").innerHTML = displayHtml;

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
                    "common_action": "getCS_FormDetails",
                    "formType": "CS2",
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

            let createSubcompo = `<div class="text-center h5 alert alert-danger my-2">Point "CS2" Form</div>`;
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
                "formType": "CS2"
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