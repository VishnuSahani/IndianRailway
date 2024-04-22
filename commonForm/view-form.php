<?php
session_start();

if($_SESSION['from'] == "JE"){
    $_SESSION['myOriginalId'] = $_SESSION['userretailerje'];
    require('je-header.php');
}elseif($_SESSION['from'] == "Admin"){
    $_SESSION['myOriginalId'] = $_SESSION['userretailer'];
    require('admin-header.php');
}elseif($_SESSION['from'] == "SSE"){
    $_SESSION['myOriginalId'] = $_SESSION['userretailersse'];
    require('sse-header.php');
}elseif($_SESSION['from'] == "ASTE"){
    $_SESSION['myOriginalId'] = $_SESSION['userretaileraste'];
    require('aste-header.php');
}elseif($_SESSION['from'] == "DSTE"){
    $_SESSION['myOriginalId'] = $_SESSION['userretailerdste'];

    require('dste-header.php');
}elseif($_SESSION['from'] == "Employee"){
    $_SESSION['myOriginalId'] = $_SESSION['userretaileremp'];

    require('emp-header.php');
}else{
    require('header.php');
    die();
}
require('include/db_config.php');

// print_r($_SESSION);

?>
<script>
    var updateCheck =[
        "Not OK",
    "Not Done",
    "Not Checked",
    "ठीक नहीं है",
    "जांच नहीं की",
    "चेक नहीं किया गया",
    "नहीं किया",
    "अनुत्तीर्ण"
    ]
//     var updateCheckEng = [
//     "Not OK",
//     "Not Done",
//     "Not Checked"
// ];

// var updateCheckHindi = [
//     "ठीक नहीं है",
//     "जांच नहीं की",
//     "चेक नहीं किया गया",
//     "नहीं किया"
// ];

var updateValue = {
    "ठीक नहीं है": "ठीक है",
    "जांच नहीं की" : "जांच की",
    "चेक नहीं किया गया" : "चेक किया गया",
    "नहीं किया":"हो गया",
    "अनुत्तीर्ण":"उत्तीर्ण",
    "Not OK":"OK",
    "Not Done":"Done",
    "Not Checked":"Checked"
};
// E1
// E2
// E3
// HB1
// HB2
// HB3
// EP3

// EP2
// T1
// CS1

// DAC4
// ELBS3
// IPS1
// IPSBATTERY


//
// e3,e2,db1,2,3, ips2, ips3,slb1,  - msg


// var updateValue = {
//     "ठीक_नहीं_है": "ठीक है",
//     "जांच_नहीं_की" : "जांच की",
//     "चेक_नहीं_किया_गया" : "चेक किया गया",
//     "नहीं_किया":"हो गया",
//     "Not_OK":"OK",
//     "Not_Done":"Done",
//     "Not_Checked":"Checked"
// }
</script>
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
                        
                        <!-- <div class="form-group my-1 col-12" id="createSubcompo">

                        </div> -->






                    </div>

                </form>
            </div>

            <!-- <div class="table-responsive d-none" id="mainTable">
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
            </div> -->
        </div>

        <div id="formShowBox">

        </div>
    </div>



</div>
<!--container close-->


<script>
    var g_st_compList = [];
    var colorArr = ['btn-info', 'btn-success', 'btn-warning', 'btn-primary', 'btn-secondary', 'btn-dark', 'btn-danger'];
    var formDataList = {};

    function formOpenTab(form){

        console.log("from=",form);

        $.ajax({
            type:"GET",
            url:`${form}.php`,
            beforeSend:()=>{

            },
            success:(respo)=>{
                $("#formShowBox").html(respo);
            }
        })
    }

 //need
    function displayFormData(keyList, btnColor = 'success') {

        // document.getElementById("printTableData").innerHTML = "";
        $("#mainTable").addClass('d-none');


        if (keyList.length == 0) {
            $("#showError").html("No Form Data");
            return;
        }

        let formKeyDisplayHtml = '<div class="mb-2 badge badge-light">Form List : </div>'

        keyList.forEach(element => {

            // formKeyDisplayHtml += `<a role="button" href="${element.toLowerCase()}.php" class="btn btn-sm btn-${btnColor} mx-2">${element}</a>`
            formKeyDisplayHtml += `<button type="button" onclick="formOpenTab('${element.toLowerCase()}')" class="btn btn-sm btn-${btnColor} mx-2">${element}</button>`

        });

        $("#formKeyDisplay").html(formKeyDisplayHtml);




    }
//need
    function getComponentForm(val) {
        document.getElementById("formKeyDisplay").innerHTML = "";
        try{
            $("#createSubcompo").html("");
        }catch(e){}
        // document.getElementById("printTableData").innerHTML = "";
        // $("#mainTable").addClass('d-none');




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
                try{
                    $("#createSubcompo").html("");
                }catch(e){}

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


    function printContent(el){

var restorepage = document.body.innerHTML;

var printcontent = document.getElementById(el).innerHTML;

document.body.innerHTML = printcontent;

window.print();

document.body.innerHTML = restorepage;
location.reload()

}

function generatePdf(formType, html_Id) {

printContent(html_Id);
return;



}



function updateSingleValue(value,tableName,columnName,id){
    console.log("value",value);
    console.log("tableName",tableName);
    console.log("columnName",columnName);
    let userID = '<?php echo $_SESSION['empid_for_form']; ?>';
    if(userID == '' || userID == null || userID == undefined){                
        alert("Something went wrong with user Id, Refresh the page and try again");
        return
     }

    $.ajax({
        type:"POST",
        url:"./query/common-action.php",
        data:{
            common_action:"updateSingleValueFormData",
            value:value,
            tableName:tableName,
            columnName:columnName.toLowerCase(),
            userID:userID,
            id:id
        },
        beforeSend:function(){

        },
        success:function(response){
            console.log("update single respo", response);
            try{
                let respo = JSON.parse(response);
                if(respo['status']){
                    $("#"+columnName).html(value)
                }
            }catch(e){

            }
        }
    });

}
</script>

</body>

</html>