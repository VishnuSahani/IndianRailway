<?php require('header.php');?>
<?php require('include/db_config.php');

 //Include database configuration file
    $id="";

    if(isset($_SESSION['userretailer']))
{
  $id=$_SESSION['userretailer'];  
   
}

?>






<div class="container" style="margin-top:30px;">

    <p class="card-header alert alert-primary text-center h5">Add Station Component </p>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <form>
                    <div class="row">
                        <div class="form-group col-xl-6 col-lg-6 col-md-6 col-12">

                            <label for="sectionId">Select Section <span class="text-danger">*</span></label>
                            <select name="sectionId" id="sectionId" onChange="getTest(this.value);clearAllData()"
                                class="form-control">
                                <option value="">Select Section</option>
                                <?php
                                      $que=mysqli_query($con,"select * from section_tbl ORDER BY section_name ASC");
                                    while($row=mysqli_fetch_array($que))
                                    {
                                        $idOpt = $row['section_id']."__".$row['section_name'];
                                    echo "<option value='".$idOpt."'>".$row['section_name']."</option>";
                                    }


                                ?>
                            </select>

                        </div>
                        <div class="form-group col-xl-6 col-lg-6 col-md-6 col-12">

                            <label>Select Station <span class="text-danger">*</span></label>

                            <select name="stationId" class="form-control" id="stationId"
                                onchange="getComponent(this.value)">
                                <option value="">Select Section First</option>

                            </select>

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
<div class="modal fade" id="componentForm" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="componentFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="componentFormLabel">
                    <span class="badge badge-success h3" id="modalComponentName"></span>
                    <span id="modalSubCompoName"></span>
                    <span class="badge badge-danger h3" id="modalSubCompoType"></span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="modalFormComponent">
                    <div class="form-row">
                        <div class="form-group col-xl-6 col-lg-6 col-12">
                            <label for="name">Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="name" class="form-control"
                                placeholder="Enter Employee name">
                        </div>

                        <div class="form-group col-xl-6 col-lg-6 col-12">
                            <label for="email">Email <span class="text-danger">*</span></label>
                            <input type="text" name="email" id="email" class="form-control"
                                placeholder="Enter Employee Email">
                        </div>

                        <div class="form-group col-12">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-sm btn-success">Submit</button>
                            </div>
                        </div>

                        <!--  -->
                        <div id="modalRespo"></div>
                    </div>
                </form>
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


function getTest(Sub_Id) {

    var strURL = "Question2.php?Subjec_Name=" + Sub_Id;

    var xhr = new XMLHttpRequest();
    xhr.open("GET", strURL, true);
    xhr.onreadystatechange = function() {

        if (parseInt(xhr.readyState) == 4 && parseInt(xhr.status) == 200) {

            document.getElementById('stationId').innerHTML = xhr.responseText;
        }
    }
    xhr.send();


}


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


    // Edit Button

    let editBtnCompo = document.createElement("a");
    editBtnCompo.className = "btn btn-outline-success btn-sm";
    editBtnCompo.innerHTML = "Edit";
    editBtnCompo.href="add-station-component.php?q="+componetData[0]['id'];

    let divWrap = document.createElement("div");
    divWrap.className = "d-flex flex-wrap my-2";

    let btn = '';
    let stationComName = val.target.id.split("_")[1]

    let btnColor = val.target.classList[(val.target.classList).length - 1].split("-")[1]
    subComponentData.forEach((value, index) => {

        btn += `<div class="dropdown mx-2" id='subCompo_${value}'>
  <button class="btn btn-${btnColor} dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
    ${value}
  </button>
  <div class="dropdown-menu bg-light">
    <a class="dropdown-item" onclick="openDialog('EP 1','${value}','${stationComName}')">EP 1</a>
    <a class="dropdown-item" onclick="openDialog('EP 2','${value}','${stationComName}')">EP 2</a>
    <a class="dropdown-item" onclick="openDialog('EP 3','${value}','${stationComName}')">EP 3</a>
    <a class="dropdown-item" onclick="openDialog('EP 4','${value}','${stationComName}')">EP 4</a>
    <a class="dropdown-item" onclick="openDialog('EP 5','${value}','${stationComName}')">EP 4</a>
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
    elv.appendChild(editBtnCompo)
    elv.appendChild(divWrap)


}

function openDialog(type, subCompo, compo) {
    // data-toggle="modal" data-target="#exampleModal"

    $("#componentForm").modal("show");
    $("#modalComponentName").html(compo);
    $("#modalSubCompoName").html(subCompo);
    $("#modalSubCompoType").html(type);
}

function clearAllData() {
    g_st_compList = [];
    document.getElementById("componentDisplay").innerHTML = '';
    document.getElementById("subComponentDisplay").innerHTML = "";
}


function getComponent(stationValue) {

    let sectionValue = $("#sectionId").val();
    let sectionTmp = sectionValue.split("__");
    let stationTmp = stationValue.split("__");

    $.ajax({
        type: "POST",
        url: "query/action.php",
        data: {
            "action": "getComponentData",
            "sectionId": sectionTmp[0],
            "sectionName": sectionTmp[1],
            "stationId": stationTmp[0],
            "stationName": stationTmp[1]
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
                    btn.className = "btn btn-sm mx-2";

                    btn.classList.add(colorArr[index % 6])


                    btn.innerHTML = value;
                    btn.onclick = createSubComponent;
                    document.getElementById("componentDisplay").appendChild(btn)
                })
            }

        }
    });
}
</script>

</body>

</html>