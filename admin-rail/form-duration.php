<?php require('header.php'); ?>
<?php require('include/db_config.php');

//Include database configuration file
$id = "";

if (isset($_SESSION['userretailer'])) {
    $id = $_SESSION['userretailer'];

}

?>

<div class="container my-2">
    <div class="alert alert-success text-center h5">
        Form Duration
    </div>

    <div class="row">
        <div class="col-12 col-md-3">
            <div class="form-group">
                <label for="empType">Select Employee Type</label>
                <select id="empType" onchange="filterDataList(this.value)" class="custom-select">
                    <!-- <option value="">Select Employee Type</option> -->
                    <!-- <option value="All">All</option> -->
                    <option value="Admin">Admin</option>
                    <option value="DSTE">DSTE</option>
                    <option value="ASTE">ASTE</option>
                    <option value="JE">JE</option>
                    <option value="SSE">SSE</option>
                    <option value="Employee">Employee</option>
                </select>
            </div>
        </div>
    </div>

    <div class="card bg-transparent">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <td>#</td>
                            <td>Name</td>
                            <td>Duration</td>
                            <td>Action</td>
                        </tr>
                    </thead>

                    <tbody id="tableDataDuration">

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>




<!-- Modal -->
<div class="modal fade" id="durationEditModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="durationEditModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-dark text-light">
                Change <span class="font-weight-bold mx-1" id="formName"></span> Duration
                <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form id="durationEditForm">
                    <div class="form-group">

                        <label for="empTypeShow">Employee Type <span class="text-danger">*</span></label>
                        <input type="text" id="empTypeShow" readonly disabled class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="durationValue">Duration/Day <span class="text-danger">*</span></label>
                        <input type="number" id="durationValue" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-sm btn-success">Submit</button>
                    </div>
                    <input type="hidden" id="durationId">
                    <div id="durationValueError" class="text-danger"></div>
                </form>
            </div>


        </div>
    </div>
</div>

<script>

    var g_formDurationList = [];

    function filterDataList(val) {
        let list = g_formDurationList.filter((x) => x.empType == val);
        displayData(list);

    }

    function displayData(list) {

        let htmlDisplay = "";

        if (list.length) {
            list.forEach((element, i) => {
                htmlDisplay += `<tr>
                    <td>${i + 1}</td>
                    <td>${element.formName}</td>
                    <td>${element.duration}</td>
                    <td><button type="button" onclick=editModal("${element.id}","${element.formName}","${element.duration}","${element.empType}") class="btn btn-sm btn-success">Edit</button></td>
                </tr>`
            });
        } else {
            htmlDisplay = "<tr><td class='text-center' colspan='4'>No Form Duration Data Found</td></tr>";
        }

        $("#tableDataDuration").html(htmlDisplay);
    }

    function editModal(id, formName, durationValue, empTypeShow) {
        debugger
        console.log("formName=", id);
        $("#formName").html(formName);
        $("#durationId").val(id);
        $("#empTypeShow").val(empTypeShow);
        $("#durationValue").val(durationValue);
        $("#durationEditModal").modal("show");

        //clear form
        $("#durationValueError").html("");
        $("#durationValue").removeClass("is-invalid");

    }


    function getFormDurationData(typeEmp) {
        $.ajax({
            type: "POST",
            url: "./query/action.php",
            data: {
                action: "getFormDurationData",
            },
            beforeSend: () => {
                $("#loader_show").removeClass('d-none');
            },
            success: (response) => {
                $("#loader_show").addClass('d-none');

                let respo = JSON.parse(response);
                console.log(respo);
                if (respo['data'].length) {
                    g_formDurationList = respo['data'];
                    let list = g_formDurationList.filter((x) => x.empType == typeEmp);
                    $("#empType").val(typeEmp);
                    displayData(list);
                }

            },
            error: (err) => {
                $("#loader_show").addClass('d-none');
            }
        });
    }

    $(document).ready(() => {

        getFormDurationData("Admin");

        $("#durationEditForm").submit((e) => {
            e.preventDefault()
            let durationValue = $("#durationValue").val();
            let durationId = $("#durationId").val();
            let typeEmp = $("#empType").val();

            if (durationValue == NaN || durationValue == undefined || durationValue == '') {
                $("#durationValueError").html("Duration is required");
                $("#durationValue").addClass("is-invalid");
                $("#durationValue").focus();

            } else {
                $("#durationValueError").html("");
                $("#durationValue").removeClass("is-invalid");
            }

            if (durationId == NaN || durationId == undefined || durationId == '') {
                $("#durationValueError").html("Refresh page and try again");

            }

            $.ajax({
                type: "POST",
                url: "./query/action.php",
                data: {
                    action: "updateFormDuration",
                    durationValue: durationValue,
                    durationId: durationId,
                },
                beforeSend: () => {

                },
                success: (response) => {
                    let respo = JSON.parse(response);
                    $("#durationValueError").html(respo['msg']);
                    if (respo['status']) {
                        //update table
                        getFormDurationData(typeEmp);

                    }
                },

            })
        });
    });
</script>
</body>

</html>