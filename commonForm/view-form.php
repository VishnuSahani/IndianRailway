<?php
require('header.php');
require('include/db_config.php');

// print_r($_SESSION);

?>

<div class="container" style="margin-top:30px;">

    <div class="alert alert-primary d-flex justify-content-between align-items-center">
        <div></div>
        <p class="text-center h5">View Employee Form</p>

        <button type="button" onclick="location.reload()" class="btn btn-sm btn-success">Refresh</button>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form>
                    <div class="row">
                        <div class="form-group col-xl-6 col-lg-6 col-12">
                            <label for="employeeId">Employee Id</label>
                            <input type="text" id="employeeId" class="form-control" readonly>

                        </div>

                        <div class="form-group col-xl-6 col-lg-6 col-12">
                            <label for="employeeName">Employee Name</label>

                            <input type="text" id="employeeName" class="form-control" readonly>

                        </div>
                        <!--  -->
                        <div class="form-group col-xl-6 col-lg-6 col-12">
                            <label for="stationName">Section Name</label>

                            <input type="text" id="sectionName" class="form-control" disabled>
                            <input type="hidden" id="sectionId" class="form-control" disabled>

                        </div>

                        <div class="form-group col-xl-6 col-lg-6 col-12">


                            <label for="stationName">Station Name</label>
                            <input type="text" id="stationName" class="form-control" disabled>
                            <input type="hidden" id="stationId" class="form-control" disabled>

                        </div>


                        <div class="form-group col-12">

                            <div class="d-flex flex-wrap my-2" id="componentDisplay">

                            </div>

                            <div id="showError" class="text-danger text-center h6">

                            </div>
                        </div>

                        <div class="form-group col-12" id="formKeyDisplay">

                        </div>
                        <div class="form-group my-1 col-12" id="createSubcompo">

                        </div>






                    </div>

                </form>
            </div>

            <div class="table-responsive d-none" id="mainTable">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <td>#</td>
                            <td>Component Name </td>
                            <td>Form Name</td>
                            <td>Sub Component Name </td>
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

            <!-- <div class="card-footer d-flex justify-content-between">
                <div id="ep1Form_status"></div>
                <button type='button' id="ep1FormBtn" class="btn btn-success">Final Submit</button>
            </div> -->

        </div>
    </div>
</div>


<script>
    var g_st_compList = [];
    var colorArr = ['btn-info', 'btn-success', 'btn-warning', 'btn-primary', 'btn-secondary', 'btn-dark', 'btn-danger'];
    var formDataList = {};


    function updateSingleValue(value, tableName, columnName, id) {
        console.log("value", value);
        console.log("tableName", tableName);
        console.log("columnName", columnName);
        let userID = '<?php echo $empid_for_form; ?>';
        if (userID == '' || userID == null || userID == undefined) {

            //  $("#t1Form_status").html("Something went wrong with user Id, Refresh the page and try again").css("color", "red");
            alert("Something went wrong with user Id, Refresh the page and try again");
            return
        }

        $.ajax({
            type: "POST",
            url: "./query/form-data-action.php",
            data: {
                action: "updateSingleValueFormData",
                value: value,
                tableName: tableName,
                columnName: columnName.toLowerCase(),
                userID: userID,
                id: id
            },
            beforeSend: function () {

            },
            success: function (response) {
                console.log("update single respo", response);
            }
        });

    }

    function openDialog(typeOfForm, dataList, id) {

        let tableId = '';
        let displayHtml = "";

        let tableDataForm = formDataList[typeOfForm].filter((x) => {
            if (x['id'] == id) {
                return x;
            }
        })[0];

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

            let value = tableDataForm[element['ep_id'].toLowerCase()]
            displayHtml += `
        <tr>
        <th scope="row">${index + 1}</th>
        <td>${element['ep_details']}</td>
        <td style="vertical-align:middle;width:22%" >`;

            if (value == 'Not Done') {

                displayHtml += `<select class="form-control">
                <option>${value}</option>
                <option value='Done'>Done</option>
            </select> <button type="button" onclick="updateSingleValue('Done','${typeOfForm}','${element['ep_id']}','${tableDataForm['id']}')" class="btn btn-sm btn-success my-1">Update</button>`;

            } else {
                displayHtml += `<input type="text" class="form-control" disabled value="${value}">`;
            }



            displayHtml += `
        </td>
        </tr>
    `;


        });

        document.getElementById(tableId).innerHTML = displayHtml;

    }

    function fillEP2FormData(id) {

        let ep2DataObj = formDataList[['EP2']].filter((x) => {
            if (x['id'] == id) {
                return x;
            }
        })[0];

        $("#componentForm_EP2").modal("show");
        $("#EP2_1").val(ep2DataObj['ep2_1']);
        $("#EP2_2").val(ep2DataObj['ep2_2']);
        $("#EP2_3").val(ep2DataObj['ep2_3']);
        $("#EP2_4").val(ep2DataObj['ep2_4']);
        $("#EP2_5").val(ep2DataObj['ep2_5']);

        $("#op_v_N_R").val(ep2DataObj['op_v_N_R']);
        $("#op_v_R_N").val(ep2DataObj['op_v_R_N']);
        $("#ob_v_N_R").val(ep2DataObj['ob_v_N_R']);
        $("#ob_v_R_N").val(ep2DataObj['ob_v_R_N']);
        $("#det_v_N_R").val(ep2DataObj['det_v_N_R']);
        $("#det_v_R_N").val(ep2DataObj['det_v_R_N']);
        $("#nwc_N_R").val(ep2DataObj['nwc_N_R']);
        $("#nwc_R_N").val(ep2DataObj['nwc_R_N']);
        $("#ob_sc_N_R").val(ep2DataObj['ob_sc_N_R']);
        $("#ob_sc_R_N").val(ep2DataObj['ob_sc_R_N']);
        $("#ob_t_N_R").val(ep2DataObj['ob_t_N_R']);
        // let ob_t_R_N = $("#ob_t_R_N").val();
        $("#gt_N_R").val(ep2DataObj['gt_N_R']);
        // let gt_R_N = $("#gt_R_N").val();
        $("#operatingTimeSecond").val(ep2DataObj['operatingTimeSecond']);
        $("#operatingTime_dbt").val(ep2DataObj['operatingTime_dbt']);
        $("#friction_c_s").val(ep2DataObj['friction_c_s']);
        $("#track_locking").val(ep2DataObj['track_locking']);
        $("#remark_brief").val(ep2DataObj['remark_brief']);
    }


    function showFormDetails(id, EPtype) {

        // where EPtype = is EP1, EP4, EP5

        // EP2 here

        if (EPtype == 'EP2') {
            fillEP2FormData(id);
            return;
        }

        if (id != '' && EPtype != '') {

            $.ajax({
                type: "POST",
                url: "./query/action.php",
                data: {
                    "action": "getEP_FormDetails",
                    "formType": EPtype,

                },
                beforeSend: function () {
                    $("#loader_show").removeClass('d-none');


                },
                success: function (respo) {
                    $("#loader_show").addClass('d-none');

                    let response = JSON.parse(respo);

                    if (response['status']) {

                        openDialog(EPtype, response['data'], id);

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


    //create t1
    function createTradeT1FormCreate(typeOfForm, dataList, id) {

        let tableId = '';
        let displayHtml = "";
        let tableDataForm = formDataList[typeOfForm].filter((x) => {
            if (x['id'] == id) {
                return x;
            }
        })[0];

        tableId = "t1_body";
        $("#componentForm_T1").modal("show");


        dataList.forEach((element, index) => {

            let value = tableDataForm[element['t_id'].toLowerCase()]

            displayHtml += `
            <tr>
            <th scope="row">${index + 1}</th>
            <td>${element['t_details']}</td>
            <td style="vertical-align:middle;width:22%" >
            <input type="text" class="form-control" disabled value="${value}"> `;


            // <option value="Done">Done</option>
            // <option value="Not Done">Not Done</option>
            displayHtml += `
            </td>
            </tr>
        `;


        });

        console.log("tableDataForm=>", tableDataForm);


        $("#date1").val(tableDataForm['date1']);
        $("#sale1_spg").val(tableDataForm['sale1_spg']);
        $("#sale1_v").val(tableDataForm['sale1_v']);
        $("#sale2_spg").val(tableDataForm['sale2_spg']);
        $("#sale2_v").val(tableDataForm['sale2_v']);
        $("#sale3_spg").val(tableDataForm['sale3_spg']);
        $("#sale3_v").val(tableDataForm['sale3_v']);
        $("#charging_v").val(tableDataForm['charging_v']);
        $("#charging_current").val(tableDataForm['charging_current']);
        $("#feedVoltage").val(tableDataForm['feedVoltage']);
        $("#nearBlock").val(tableDataForm['nearBlock']);
        $("#wireStatus").val(tableDataForm['wireStatus']);
        $("#remark1").val(tableDataForm['remark1']);

        $("#date2").val(tableDataForm['date2']);
        $("#railVoltage").val(tableDataForm['railVoltage']);
        $("#vt_value").val(tableDataForm['vt_value']);
        $("#wireStatus2").val(tableDataForm['wireStatus2']);
        $("#magneticPart").val(tableDataForm['magneticPart']);
        $("#railFlag2").val(tableDataForm['railFlag2']);
        $("#jumberwireStatus").val(tableDataForm['jumberwireStatus']);
        $("#remark2").val(tableDataForm['remark2']);

        document.getElementById(tableId).innerHTML = displayHtml;






    }

    // T Type form

    function openDialog_T(typeOfForm, dataList, id) {

        let tableId = '';
        let displayHtml = "";

        if (typeOfForm == "T1") {
            createTradeT1FormCreate(typeOfForm, dataList, id)
        }

        let tableDataForm = formDataList[typeOfForm].filter((x) => {
            if (x['id'] == id) {
                return x;
            }
        })[0];

        switch (typeOfForm) {
            // case "T1":
            //     tableId = "t1_body";
            //     $("#componentForm_T1").modal("show");
            //     break;
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

            let value = tableDataForm[element['t_id'].toLowerCase()]

            displayHtml += `
        <tr>
        <th scope="row">${index + 1}</th>
        <td>${element['t_details']}</td>
        <td style="vertical-align:middle;width:22%" >
        <input type="text" class="form-control" disabled value="${value}"> `;


            // <option value="Done">Done</option>
            // <option value="Not Done">Not Done</option>
            displayHtml += `
        </td>
        </tr>
    `;


        });

        document.getElementById(tableId).innerHTML = displayHtml;

    }
    function get_T_formData(id, tType) {


        $.ajax({
            type: "POST",
            url: "./query/action.php",
            data: {
                "action": "getT_FormDetails",
                "formType": tType,

            },
            beforeSend: function () {
                $("#loader_show").removeClass('d-none');


            },
            success: function (respo) {
                $("#loader_show").addClass('d-none');

                let response = JSON.parse(respo);

                if (response['status']) {

                    openDialog_T(tType, response['data'], id);

                }

            },
            complete: function () {
                $("#loader_show").addClass('d-none');

            }
        });
    }


    function showTable(formKeyName, subcomponame) {
        console.log("keyName=", formKeyName);

        $("#mainTable").removeClass('d-none');

        let formData = formDataList[formKeyName].filter((x) => x.sub_component == subcomponame);
        let displayHtml = '';


        formData.forEach((element, index) => {



            displayHtml += `
    <tr>
    <th scope="row">${index + 1}</th>
    <td>${element['component_name']}</td>
    <td>${formKeyName}</td>
    <td>${element['sub_component']}</td>
    <td>${element['created_date']}</td>
    <td>${element['updated_date']}</td>
    <td style="vertical-align:middle;width:22%" >
    `;
            if (formKeyName.startsWith("EP")) {
                displayHtml += `
        <button type="button" class="btn btn-sm btn-success" onclick="showFormDetails('${element['id']}','${formKeyName}')">
            See <i class="fas fa-eye"></i>
        </button>
       `;

            } else if (formKeyName.startsWith("T")) {
                displayHtml += `
       
         <button type="button" class="btn btn-sm btn-success" onclick="get_T_formData('${element['id']}','${formKeyName}')">
            See <i class="fas fa-eye-close"></i>
        </button>
       `;
            }

            displayHtml += ` 
    </td>
    </tr>
`;


        });

        document.getElementById("printTableData").innerHTML = displayHtml;


    }

    function showSubComponent(formName, btnColor) {

        $("#mainTable").addClass('d-none');


        document.getElementById("printTableData").innerHTML = "";

        let dataList = formDataList[formName];

        let subCompo = [...new Set(dataList.map(x => x.sub_component))];

        console.log("subCompo map=", subCompo);
        if (subCompo.length != 0) {

            let createSubcompo = `<div class="mb-2 badge badge-light my-2 mr-3">SubComponet List of ${formName} :</div>`;

            subCompo.forEach(element => {

                createSubcompo +=
                    `<button type="button" onclick="showTable('${formName}','${element}')" class="btn btn-sm btn-${btnColor} mx-2">${element}</button>`

            });

            $("#createSubcompo").html(createSubcompo);


        }


    }

    function displayFormData(keyList, btnColor = 'success') {

        document.getElementById("printTableData").innerHTML = "";
        $("#mainTable").addClass('d-none');


        if (keyList.length == 0) {
            $("#showError").html("No Form Data");
            return;
        }

        let formKeyDisplayHtml = '<div class="mb-2 badge badge-light">Form List : </div>'

        keyList.forEach(element => {

            // formKeyDisplayHtml +=`<button type="button" onclick="showSubComponent('${element}','${btnColor}')" class="btn btn-sm btn-${btnColor} mx-2">${element}</button>`
            formKeyDisplayHtml += `<a role="button" href="${element.toLowerCase()}.php" class="btn btn-sm btn-${btnColor} mx-2">${element}</a>`

        });

        $("#formKeyDisplay").html(formKeyDisplayHtml);




    }

    function getComponentForm(val) {
        document.getElementById("formKeyDisplay").innerHTML = "";
        $("#createSubcompo").html("");
        document.getElementById("printTableData").innerHTML = "";
        $("#mainTable").addClass('d-none');




        let componentName = val.target.innerHTML;
        let btnColor = val.target.classList[(val.target.classList).length - 1].split("-")[1]

        // alert()
        let componetData = g_st_compList.filter(x => x['station_component'] == componentName);
        console.log("vishnu componetData ", componetData);

        if (componetData.length == 0) {
            alert("no sub component added yet");
            return;
        }

        let sectionId = ($("#sectionId").val()).trim();
        let sectionName = ($("#sectionName").val()).trim();
        let stationId = ($("#stationId").val()).trim();
        let stationName = ($("#stationName").val()).trim();

        let userID = '<?php echo $empid_for_form; ?>';
        if (userID == '' || userID == null || userID == undefined) {

            alert("Something went wrong with user Id, Refresh the page and try again");
            return
        }

        $.ajax({
            type: "POST",
            url: "query/common-form-data-action.php",
            data: {
                common_action: "getFormSubmitedData",
                "sectionId": sectionId,
                "sectionName": sectionName,
                "stationId": stationId,
                "stationName": stationName,
                "componentName": componentName,
                "userID": userID

            },
            beforeSend: function () {
                $("#loader_show").removeClass('d-none');
                formDataList = [];
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

                    formDataList = respo['data'][0];

                    let keyList = Object.keys(formDataList);

                    displayFormData(keyList, btnColor);

                    console.log("formDataList=", formDataList);

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
            url: "query/common-action.php",
            data: {
                "common_action": "getComponentData",
                "sectionId": sectionId,
                "sectionName": sectionName,
                "stationId": stationId,
                "stationName": stationName
            },
            beforeSend: function () {
                g_st_compList = [];
                document.getElementById("componentDisplay").innerHTML = '';
                document.getElementById("formKeyDisplay").innerHTML = "";
                $("#createSubcompo").html("");


            },
            success: function (respo) {
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
                        btn.onclick = getComponentForm;
                        document.getElementById("componentDisplay").appendChild(btn)
                    })
                }

            }
        });
    }

    function getEmployeeInfo() {
        let empId = '<?php echo $empid_for_form ?>';
        if (empId != "") {

            $.ajax({
                type: "POST",
                url: "./query/common-action.php",
                data: {
                    common_action: "getEmployeeDataById",
                    "empId": empId,
                },
                beforeSend: () => {
                    $("#loader_show").removeClass('d-none');

                },
                success: (response) => {
                    $("#loader_show").addClass('d-none');

                    let respo = JSON.parse(response);
                    console.log("Get employee info=>", respo);
                    if (respo['status']) {

                        let section_id = respo['data']['section_id'];
                        let section_name = respo['data']['section_name'];
                        let station_id = respo['data']['station_id'];
                        let station_name = respo['data']['station_name'];

                        $("#sectionId").val(section_id);
                        $("#sectionName").val(section_name);
                        $("#stationId").val(station_id);
                        $("#stationName").val(station_name);
                        $("#employeeName").val(respo['data']['empname']);
                        $("#employeeId").val(respo['data']['empid']);
                        getComponent();

                    }

                }
            })
        }
    }

    $(document).ready(function () {

        getEmployeeInfo();
    });
</script>

</body>

</html>