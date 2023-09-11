<?php require('header.php');?>
<?php require('include/db_config.php');

 //Include database configuration file
    $id="";

    if(isset($_SESSION['userretailer']))
{
  $id=$_SESSION['userretailer'];  
   
}

// echo $name;

?>






<div class="container" style="margin-top:30px;">

    <div class="alert alert-primary d-flex justify-content-between align-items-center">
        <div></div>
        <p class="text-center h5">Your Station Component </p>

        <button type="button" onclick="location.reload()" class="btn btn-sm btn-success">Refresh</button>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form>
                    <div class="row">
                        <div class="form-group col-xl-6 col-lg-6 col-12">
                            <!-- <label for="sectionName">Section Name</label> -->
                            <input type="hidden" id="sectionName" class="form-control" disabled
                                value="<?php echo $empSectionName;?>">
                            <input type="hidden" id="sectionId" class="form-control" disabled
                                value="<?php echo $empSectionId;?>">
                            <input type="hidden" id="compoNameTmp">
                            <input type="hidden" id="subcompoNameTmp">
                        </div>

                        <div class="form-group col-xl-6 col-lg-6 col-12">
                            <!-- <label for="stationName">Station Name</label> -->
                            <input type="hidden" id="stationName" class="form-control" disabled
                                value="<?php echo $empStationName;?>">
                            <input type="hidden" id="stationId" class="form-control" disabled
                                value="<?php echo $empStationId;?>">
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



<script>
var g_st_compList = [];
var colorArr = ['btn-info', 'btn-success', 'btn-warning', 'btn-primary', 'btn-secondary', 'btn-dark', 'btn-danger'];
var formDataList = {};


function showTable(formKeyName, subcomponame) {
    console.log("keyName=", formKeyName);

    $("#mainTable").removeClass('d-none');

    let formData = formDataList[formKeyName].filter((x)=> x.sub_component == subcomponame);
    let displayHtml ='';


    formData.forEach((element, index) => {


        displayHtml += `
    <tr>
    <th scope="row">${index+1}</th>
    <td>${element['component_name']}</td>
    <td>${formKeyName}</td>
    <td>${element['sub_component']}</td>
    <td>${element['created_date']}</td>
    <td>${element['updated_date']}</td>
    <td style="vertical-align:middle;width:22%" >
       See <i class="fas fa-eye"></i>
       
    </td>
    </tr>
`;


    });

    document.getElementById("printTableData").innerHTML = displayHtml;


}

function showSubComponent(formName,btnColor) {

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

        formKeyDisplayHtml +=
            `<button type="button" onclick="showSubComponent('${element}','${btnColor}')" class="btn btn-sm btn-${btnColor} mx-2">${element}</button>`

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

    let userID = '<?php echo $_SESSION['userretailer']; ?>';
    if (userID == '' || userID == null || userID == undefined) {

        alert("Something went wrong with user Id, Refresh the page and try again");
        return
    }

    $.ajax({
        type: "POST",
        url: "query/form-data-action.php",
        data: {
            action: "getFormSubmitedData",
            "sectionId": sectionId,
            "sectionName": sectionName,
            "stationId": stationId,
            "stationName": stationName,
            "componentName": componentName,
            "userID": userID

        },
        beforeSend: function() {
            $("#loader_show").removeClass('d-none');
            formDataList = [];
            $("#showError").html("");


        },
        success: function(response) {
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
        complete: function() {
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
        url: "query/action.php",
        data: {
            "action": "getComponentData",
            "sectionId": sectionId,
            "sectionName": sectionName,
            "stationId": stationId,
            "stationName": stationName
        },
        beforeSend: function() {
            g_st_compList = [];
            document.getElementById("componentDisplay").innerHTML = '';
            document.getElementById("formKeyDisplay").innerHTML = "";
            $("#createSubcompo").html("");


        },
        success: function(respo) {
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

$(document).ready(function() {
    getComponent();
});
</script>

</body>

</html>