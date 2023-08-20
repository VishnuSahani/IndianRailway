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
        <p class="text-center h5">Add Station Component </p>

        <button type="button" onclick="location.reload()" class="btn btn-sm btn-success">Refresh</button>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form>
                    <div class="row">
                    <div class="form-group col-xl-6 col-lg-6 col-12">
                <label for="sectionName">Section Name</label>
                <input type="text" id="sectionName" class="form-control" disabled value="<?php echo $empSectionName;?>">
                <input type="hidden" id="sectionId" class="form-control" disabled value="<?php echo $empSectionId;?>">
                <input type="hidden" id="compoNameTmp">
                <input type="hidden" id="subcompoNameTmp">
            </div>

            <div class="form-group col-xl-6 col-lg-6 col-12">
                <label for="stationName">Station Name</label>
                <input type="text" id="stationName" class="form-control" disabled value="<?php echo $empStationName;?>">
                <input type="hidden" id="stationId" class="form-control" disabled value="<?php echo $empStationId;?>">
            </div>
                       

                        <div class="form-group col-12">
                            <div class="alert alert-success text-center h6">
                                Station Component List
                            </div>

                            <div class="d-flex flex-wrap my-2" id="componentDisplay">

                            </div>
                        </div>

                        <div class="form-group col-12" id="subComponentDisplay">

                        </div>






                    </div>

                </form>
            </div>
        </div>
    </div>



</div>
<!--container close-->


<!-- Modal -->
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
        
                    Periodicity: Technician(Signal): Fortnightly Sectional SSE/JE(Signal): Monthly SSE (Signal)/Incharge : Quarterly

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

            <div class="card-footer d-flex justify-content-between">
                <div id="ep1Form_status"></div>
                <button type='button' id="ep1FormBtn" class="btn btn-success">Final Submit</button>
            </div>

        </div>
    </div>
</div>

<script>
var g_st_compList = [];
var colorArr = ['btn-info', 'btn-success', 'btn-warning', 'btn-primary', 'btn-secondary', 'btn-dark', 'btn-danger'];

$(document).ready(function(){
    $("#modalFormComponent").submit(function(e){
        e.preventDefault();
        let name = $("#name").val().trim();
        let email = $("#email").val().trim();

        if(name == '' || name == null || name == undefined){
            $("#name").addClass("is-invalid");
            return;
        }else{
            $("#name").removeClass("is-invalid");
        }

        if(email == '' || email == null || email == undefined){
            $("#email").addClass("is-invalid");
            return;
        }else{
            $("#email").removeClass("is-invalid");
        }

        $.ajax({
            type:"POST",
            url:"query/action.php",
            data:{"action":"componentModalForm","name":name,"email":email},
            beforeSend:function(){

            },
            success:function(respo){
                let response = JSON.parse(respo);


                if(response['status']){
                    $("#modalFormComponent")[0].reset();                    
                    $("#modalRespo").html(response['msg']).css("color","green");

                }else{
                    $("#modalRespo").html(response['msg']).css("color","red");

                }

            },
            complete:function(){
                setTimeout(()=>{

                     $("#modalRespo").html("");

                },5000)
            }
        })



    });
});



function createSubComponent(val) {
    document.getElementById("subComponentDisplay").innerHTML = "";

    let componentName = val.target.innerHTML;
    // alert()
    let componetData = g_st_compList.filter(x => x['station_component'] == componentName);
    console.log("vishnu componetData ", componetData);

    if (componetData.length == 0) {
        alert("no sub component added yet");
        return;
    }


    let subComponentData = componetData[0]['sub_component'].split(',');


    let divAlert = document.createElement("div");
    divAlert.className = "alert alert-warning text-center h6";
    divAlert.innerHTML = "Station Sub Component List";

    let divWrap = document.createElement("div");
    divWrap.className = "d-flex flex-wrap my-2";

    let btn = '';
    let stationComName = val.target.id.split("_")[1]

    let btnColor = val.target.classList[(val.target.classList).length - 1].split("-")[1]
    subComponentData.forEach((value, index) => {

        btn += `<div class="dropdown m-2" id='subCompo_${value}'>
  <button class="btn btn-${btnColor} dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
    ${value}
  </button>
  <div class="dropdown-menu bg-light">
    <a class="dropdown-item" onclick="get_EP_formData('EP1','${value}','${stationComName}')">EP 1</a>
    <a class="dropdown-item" onclick="get_EP_formData('EP2','${value}','${stationComName}')">EP 2</a>
    <a class="dropdown-item" onclick="get_EP_formData('EP3','${value}','${stationComName}')">EP 3</a>
    <a class="dropdown-item" onclick="get_EP_formData('EP4','${value}','${stationComName}')">EP 4</a>
    <a class="dropdown-item" onclick="get_EP_formData('EP5','${value}','${stationComName}')">EP 5</a>
  </div>
</div>`;

        // let btn = document.createElement("button");
        //     btn.id = "subCompo_"+value;
        //     btn.type = "button";
        //     btn.className = val.target.className;//"btn btn-sm btn-warning mx-2";
        //     btn.innerHTML = value;

        // btn.onclick = createSubComponent;
        // divWrap.appendChild(btn)
        divWrap.innerHTML = btn

    });

    let elv = document.getElementById("subComponentDisplay");
    elv.appendChild(divAlert)
    elv.appendChild(divWrap)


}

function openDialog(typeOfForm, dataList){

    let tableId = '';
    let displayHtml = "";

    switch (typeOfForm){
        case "EP1":
            tableId = "ep1_body";
            $("#componentForm_EP1").modal("show");
            
    }


    dataList.forEach((element,index) => {

        displayHtml += `
            <tr>
            <th scope="row">${index+1}</th>
            <td>${element['ep_details']}</td>
            <td style="vertical-align:middle;width:22%" >
                <select class="custom-select ${typeOfForm}Class" id="${element['ep_id']}">
                    <option value="">Select Action</option>
                    <option value="Done">Done</option>
                    <option value="Not Done">Not Done</option>
                </select>
            </td>
            </tr>
        `;

        
    });
    
    document.getElementById(tableId).innerHTML = displayHtml;

}

function get_EP_formData(EPtype, subCompo, compo) {
    // data-toggle="modal" data-target="#exampleModal"
    $("#compoNameTmp").val(compo);
    $("#subcompoNameTmp").val(subCompo);

    $.ajax({
        type:"POST",
        url:"./query/action.php",
        data:{
            "action":"getEP_FormDetails",
            "formType":EPtype,

        },
        beforeSend:function(){

        },
        success:function(respo){
            let response = JSON.parse(respo);

            if(response['status']){

                openDialog(EPtype,response['data']);

            }

        }
    });

  

    // $("#modalComponentName").html(compo);
    // $("#modalSubCompoName").html(subCompo);
    // $("#modalSubCompoType").html(type);
}

function clearAllData() {
    g_st_compList = [];
    document.getElementById("componentDisplay").innerHTML = '';
    document.getElementById("subComponentDisplay").innerHTML = "";
}


function getComponent() {

    let sectionId = ($("#sectionId").val()).trim();
    let sectionName = ($("#sectionName").val()).trim();
    let stationId = ($("#stationId").val()).trim();
    let stationName = ($("#stationName").val()).trim();

    if(sectionId == '' || sectionName == "" || stationId == "" || stationName == ""){
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
            document.getElementById("subComponentDisplay").innerHTML = "";


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
                    btn.onclick = createSubComponent;
                    document.getElementById("componentDisplay").appendChild(btn)
                })
            }

        }
    });
}


$(document).ready(function(){
    getComponent();

    $("#ep1FormBtn").click(function(){
        if(confirm("Do you want to final submit EP1 Form")){
            let sectionName = $("#sectionName").val();
            let sectionId = $("#sectionId").val();

            let stationName = $("#stationName").val();
            let stationId = $("#stationId").val();

            let compoNameTmp = $("#compoNameTmp").val();
            let subcompoNameTmp = $("#subcompoNameTmp").val();

            if(
                sectionName == "" || sectionName == null || sectionName == undefined ||
                sectionId == "" || sectionId == null || sectionId == undefined ||
                stationName == "" || stationName == null || stationName == undefined ||
                stationId == "" || stationId == null || stationId == undefined ||
                compoNameTmp == "" || compoNameTmp == null || compoNameTmp == undefined ||
                subcompoNameTmp == "" || subcompoNameTmp == null || subcompoNameTmp == undefined

                ){
                    alert("Something went wrong , refresh the page and try again");
                    return;
                }

                let EP1_1 = $("#EP1_1").val();
                let EP1_2 = $("#EP1_2").val();
                let EP1_3 = $("#EP1_3").val();
                let EP1_4 = $("#EP1_4").val();
                let EP1_5 = $("#EP1_5").val();
                let EP1_6 = $("#EP1_6").val();
                let EP1_7 = $("#EP1_7").val();
                let EP1_8 = $("#EP1_8").val();
                let EP1_9 = $("#EP1_9").val();
                let EP1_10 = $("#EP1_10").val();
                let EP1_11 = $("#EP1_11").val();

                if(EP1_1 == '' || EP1_1.length == 0 || EP1_1 == null){
                    $("#EP1_1").addClass("is-invalid");
                    $("#ep1Form_status").html("Serial no 1 is required").css("color","red");
                    return;
                }else{
                    $("#ep1Form_status").html("");
                    $("#EP1_1").removeClass("is-invalid");

                }

                if(EP1_2 == '' || EP1_2.length == 0 || EP1_2 == null){
                    $("#EP1_2").addClass("is-invalid");
                    $("#ep1Form_status").html("Serial no 2 is required").css("color","red");
                    return;
                }else{
                    $("#ep1Form_status").html("");
                    $("#EP1_2").removeClass("is-invalid");

                }

                if(EP1_3 == '' || EP1_3.length == 0 || EP1_3 == null){
                    $("#EP1_3").addClass("is-invalid");
                    $("#ep1Form_status").html("Serial no 3 is required").css("color","red");
                    return;
                }else{
                    $("#ep1Form_status").html("");
                    $("#EP1_3").removeClass("is-invalid");

                }


                if(EP1_4 == '' || EP1_4.length == 0 || EP1_4 == null){
                    $("#EP1_4").addClass("is-invalid");
                    $("#ep1Form_status").html("Serial no 4 is required").css("color","red");
                    return;
                }else{
                    $("#ep1Form_status").html("");
                    $("#EP1_4").removeClass("is-invalid");

                }


                if(EP1_5 == '' || EP1_5.length == 0 || EP1_5 == null){
                    $("#EP1_5").addClass("is-invalid");
                    $("#ep1Form_status").html("Serial no 5 is required").css("color","red");
                    return;
                }else{
                    $("#ep1Form_status").html("");
                    $("#EP1_5").removeClass("is-invalid");

                }


                if(EP1_6 == '' || EP1_6.length == 0 || EP1_6 == null){
                    $("#EP1_6").addClass("is-invalid");
                    $("#ep1Form_status").html("Serial no 6 is required").css("color","red");
                    return;
                }else{
                    $("#ep1Form_status").html("");
                    $("#EP1_6").removeClass("is-invalid");

                }

                if(EP1_7 == '' || EP1_7.length == 0 || EP1_7 == null){
                    $("#EP1_7").addClass("is-invalid");
                    $("#ep1Form_status").html("Serial no 7 is required").css("color","red");
                    return;
                }else{
                    $("#ep1Form_status").html("");
                    $("#EP1_7").removeClass("is-invalid");

                }

                if(EP1_8 == '' || EP1_8.length == 0 || EP1_8 == null){
                    $("#EP1_8").addClass("is-invalid");
                    $("#ep1Form_status").html("Serial no 8 is required").css("color","red");
                    return;
                }else{
                    $("#ep1Form_status").html("");
                    $("#EP1_8").removeClass("is-invalid");

                }

                if(EP1_9 == '' || EP1_9.length == 0 || EP1_9 == null){
                    $("#EP1_9").addClass("is-invalid");
                    $("#ep1Form_status").html("Serial no 9 is required").css("color","red");
                    return;
                }else{
                    $("#ep1Form_status").html("");
                    $("#EP1_9").removeClass("is-invalid");

                }

                if(EP1_10 == '' || EP1_10.length == 0 || EP1_10 == null){
                    $("#EP1_10").addClass("is-invalid");
                    $("#ep1Form_status").html("Serial no 10 is required").css("color","red");
                    return;
                }else{
                    $("#ep1Form_status").html("");
                    $("#EP1_10").removeClass("is-invalid");

                }

                if(EP1_11 == '' || EP1_11.length == 0 || EP1_11 == null){
                    $("#EP1_11").addClass("is-invalid");
                    $("#ep1Form_status").html("Serial no 11 is required").css("color","red");
                    return;
                }else{
                    $("#ep1Form_status").html("");
                    $("#EP1_11").removeClass("is-invalid");

                }


                let userID = '<?php echo $_SESSION['userretailer']; ?>'

                $.ajax({
                    type:"POST",
                    url:"query/action.php",
                    data:{
                        "action":"EP1_formSubmit",
                        "userID":userID,
                        "sectionName":sectionName,
                        "sectionId":sectionId,
                        "stationName":stationName,
                        "stationId":stationId,
                        "compoNameTmp":compoNameTmp,
                        "subcompoNameTmp":subcompoNameTmp,
                        "EP1_1":EP1_1,
                        "EP1_2":EP1_2,
                        "EP1_3":EP1_3,
                        "EP1_4":EP1_4,
                        "EP1_5":EP1_5,
                        "EP1_6":EP1_6,
                        "EP1_7":EP1_7,
                        "EP1_8":EP1_8,
                        "EP1_9":EP1_9,
                        "EP1_10":EP1_10,
                        "EP1_11":EP1_11,
                    },
                    beforeSend:function(){
                        $("#loader_show").removeClass('d-none');

                    },
                    success:function(response){
                        let respo = JSON.parse(response);
                        if(respo['status']){
                            $("#ep1Form_status").html(respo['msg']).css("color","green");


                        }else{
                            $("#ep1Form_status").html(respo['msg']).css("color","red");

                        }
                    },
                    complete:function(){
                        $("#loader_show").addClass('d-none');

                    }
                });

        }
    })
})
</script>

</body>

</html>