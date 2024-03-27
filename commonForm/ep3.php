<?php
//require('header.php');
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
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
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
                                    
                                    <div class="heading_english">
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
                                    <div class="heading_hindi">

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
                                    <div class="heading_english">
                                    Joint checking of SSD Setting and its arm insulation with P-Way supervisor.
                                        
                                    </div>
                                        <div class="heading_hindi">
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
                                    <div class="heading_english">
                                        Remarks by Signal Supervisor.
                                    </div>
                                    <div class="heading_hindi">
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
                                    <div class="heading_english">
                                        Remarks by P.Way  Supervisor.
                                    </div>
                                    <div class="heading_hindi">
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


                <div class="card-footer d-flex justify-content-end">
                    <button type='button' id="ep3PdfBtn" onclick="generatePdf('EP3','pdfBodyEP3')"
                        class="btn btn-success btn-sm">PDF</button>
                    <button type="button" class="btn btn-sm btn-secondary mx-2" data-dismiss="modal" aria-label="Close">
                        Close
                    </button>
                </div>

            </div>
        </form>
    </div>
</div>

<script>
    // global 
    var formDataList_g = [];


    function showFormDetails(id, language) {

        $("#componentForm_EP3").modal("show");

        if (language == "Hindi") {
            $(".heading_english").addClass('d-none')
            $(".heading_hindi").removeClass('d-none')
        } else {
            $(".heading_hindi").addClass('d-none')
            $(".heading_english").removeClass('d-none')
        }

        let ep3DataObj = formDataList_g.filter((x) => {
            if (x['id'] == id) {
                return x;
            }
        })[0];

        $("#created_date").html(ep3DataObj['created_date']);
        $("#updated_date").html(ep3DataObj['updated_date']);

        

    let displayHtml = '';
    let displayHtml2 = '';
    if (updateCheck.includes(ep3DataObj['ep3_1'])) {

        displayHtml +=
            `<div id='ep3_1'><select class="form-control">
        <option>${ep3DataObj['ep3_1']}</option>
        <option value='${updateValue[ep3DataObj['ep3_1']]}'>${updateValue[ep3DataObj['ep3_1']]}</option>
        </select> <button type="button" onclick="updateSingleValue('${updateValue[ep3DataObj['ep3_1']]}','EP3','ep3_1','${ep3DataObj['id']}')" class="btn btn-sm btn-success my-1">Update</button></div>`;

        }else{               
            displayHtml += `<div class="">${ep3DataObj['ep3_1']}</div>`;
        }

        if (updateCheck.includes(ep3DataObj['ep3_2'])) {

        displayHtml2 +=
            `<div id='ep3_2'><select class="form-control">
        <option>${ep3DataObj['ep3_2']}</option>
        <option value='${updateValue[ep3DataObj['ep3_2']]}'>${updateValue[ep3DataObj['ep3_2']]}</option>
        </select> <button type="button" onclick="updateSingleValue('${updateValue[ep3DataObj['ep3_2']]}','EP3','ep3_2','${ep3DataObj['id']}')" class="btn btn-sm btn-success my-1">Update</button></div>`;

        }else{         
            displayHtml2 += `<div class="">${ep3DataObj['ep3_2']}</div>`;
        }

    $("#ep3_1").html(displayHtml);
    $("#ep3_2").html(ep3DataObj['ep3_2']);



    $("#ep3_3").html(ep3DataObj['ep3_3']);
    $("#ep3_4").html(ep3DataObj['ep3_4']);

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

            let createSubcompo = `<div class="text-center h5 alert alert-danger my-2">Point "EP3" Form</div>`;
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
                "formType": "EP3"
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