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