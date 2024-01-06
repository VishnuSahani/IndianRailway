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


 //need
    function displayFormData(keyList, btnColor = 'success') {

        document.getElementById("printTableData").innerHTML = "";
        $("#mainTable").addClass('d-none');


        if (keyList.length == 0) {
            $("#showError").html("No Form Data");
            return;
        }

        let formKeyDisplayHtml = '<div class="mb-2 badge badge-light">Form List : </div>'

        keyList.forEach(element => {

            formKeyDisplayHtml += `<a role="button" href="${element.toLowerCase()}.php" class="btn btn-sm btn-${btnColor} mx-2">${element}</a>`

        });

        $("#formKeyDisplay").html(formKeyDisplayHtml);




    }
//need
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

//need
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

    //need
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