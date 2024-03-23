<?php require('header.php'); ?>
<?php require('include/db_config.php');

//Include database configuration file
$id = "";

if (isset($_SESSION['userretailer'])) {
    $id = $_SESSION['userretailer'];

}

?>






<div class="container" style="margin-top:30px;">

    <div class="card-header alert alert-primary text-center d-flex justify-content-between">
        <div></div>
        <div class="h5">View Station Component</div>
        <div class="cursor-pointer">
            <a href="add-station-component.php">Add Component</a>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <form id="componentForm">
                    <div class="row" id="subComponentList">
                        <div class="form-group col-md-6 col-12">

                            <label for="sectionId">Select Section <span class="text-danger">*</span></label>
                            <select name="sectionId" id="sectionId" onChange="filterStation(this.value)"
                                class="form-control">
                                <option value="">Select Section</option>
                            </select>

                        </div>
                        <div class="form-group col-md-6 col-12">

                            <label>Select Station <span class="text-danger">*</span></label>

                            <select name="stationId" class="form-control" onchange="getComponent(this.value)"
                                id="stationId">
                                <option value="">Select Section First</option>

                            </select>

                        </div>


                    </div>

                </form>
            </div>
        </div>

        <!--  -->
        <div class="row">
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
    </div>



</div>
<!--container close-->



<script>

    // this script used for section station dynamic filter for JE

    // below variable is global variable;

    var sectionStationData = [];
    var sectionList_glo = [];
    var stationList_glo = [];

    // end global variable

    function filterStation(value) {
        if (value == '') {
            allSectionStation(sectionStationData).then((val) => {
                setStation();
            })
        } else {

            let tmpSection = sectionStationData.filter((x) => x.section_id == value);
            allSectionStation(tmpSection).then((val) => {
                setStation();
            })

        }

    }

    function getArrFromObjArr(objArr, key) {
        return objArr.map(x => x[key]);
    }

    function allSectionStation(sec_stat_list) {

        sectionList_glo = [];
        stationList_glo = [];

        return new Promise((resolve, reject) => {
            sec_stat_list.forEach(element => {

                if (!getArrFromObjArr(sectionList_glo, 'section_id').includes(element.section_id)) {
                    let obj = {
                        section_id: element.section_id,
                        section_name: element.section_name
                    }
                    sectionList_glo.push(obj);
                }
                if (!getArrFromObjArr(stationList_glo, 'station_id').includes(element.station_id)) {
                    let obj = {
                        station_id: element.station_id,
                        station_name: element.station_name
                    }
                    stationList_glo.push(obj);
                }

            });// formeach

            resolve(true);

        });//promise
    }

    function setSection() {

        console.log(sectionList_glo);

        let sectionHtml = '<option value="">All Station</option>';
        sectionList_glo.forEach(element => {
            sectionHtml += `<option value="${element.section_id}">${element.section_name}</option>`;

        });

        $("#sectionId").html(sectionHtml)

    }

    function setStation() {

        console.log(stationList_glo);

        let stationHtml = '<option value="">Select Station</option>';
        stationList_glo.forEach(element => {
            stationHtml += `<option value="${element.station_id}">${element.station_name}</option>`;

        });

        $("#stationId").html(stationHtml)

    }


    function getSectionStation() {
     
        $.ajax({
            type: "POST",
            url: "query/form-action.php",
            data: {
                action: "getSectionStation",

            },
            beforeSend: () => {
                $("#loader_show").removeClass('d-none');
            },
            success: (response) => {
                $("#loader_show").addClass('d-none');
                let respo = JSON.parse(response);
                console.log("respo=", respo);
                if (respo['status']) {
                    sectionStationData = respo['data'];

                    allSectionStation(sectionStationData).then((res) => {
                        setSection();
                        setStation();
                    });


                }
            }
        })

    }


    $(document).ready(() => {
        getSectionStation();
    });
</script>

<!-- component function below -->
<script>
var g_st_compList = [];
var colorArr = ['btn-info', 'btn-success', 'btn-warning', 'btn-primary', 'btn-secondary', 'btn-dark', 'btn-danger'];


function createSubComponent(val) {
    document.getElementById("subComponentDisplay").innerHTML = "";

    let componentName = val.target.innerHTML;
    let btnColor = val.target.classList[(val.target.classList).length - 1].split("-")[1]
    let stationComName = val.target.id.split("_")[1]

    // alert()
    let componetData = g_st_compList.filter(x => x['station_component'] == componentName);
    console.log("vishnu componetData ", componetData);

    if (componetData.length == 0) {
        alert("no sub component added yet");
        return;
    }

    
    if(componetData[0]['sub_component'].length == 0 || componetData[0]['sub_component'] == ''){
        if(componentName == 'IPS'){
            alert("Can't update IPS Sub component")
            return;
        }

        let elv1 = document.getElementById("subComponentDisplay");
        let divAlert1 = document.createElement("div");
        divAlert1.className = "alert alert-warning text-center h6";
        divAlert1.innerHTML = "Form List";

        // delete edit btn
        
        let editBtnCompo = document.createElement("a");
        editBtnCompo.className = "btn btn-outline-danger btn-sm";
        editBtnCompo.innerHTML = "Delete";
        editBtnCompo.href="add-station-component.php?q="+componetData[0]['id'];

        // 


        let divWrap1 = document.createElement("div");
        divWrap1.className = "d-flex flex-wrap my-2";
        let btn1 = `
        <button class="btn btn-${btnColor} mx-2" type="button" onclick="get_DL_formData('DL1','NA','${stationComName}')">DL 1</button>
        <button class="btn btn-${btnColor} mx-2" type="button" onclick="get_DL_formData('DL2','NA','${stationComName}')">DL 2</button>
        <button class="btn btn-${btnColor} mx-2" type="button" onclick="get_DL_formData('DL3','NA','${stationComName}')">DL 3</button>
        <button class="btn btn-${btnColor} mx-2" type="button" onclick="get_DL_formData('DL4','NA','${stationComName}')">DL 4</button>
        `;


        divWrap1.innerHTML = btn1



        elv1.appendChild(divAlert1);
        // elv1.appendChild(editBtnCompo)
        elv1.appendChild(divWrap1)
        return;

    }


    /// below if sub component have


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

    subComponentData.forEach((value, index) => {

        btn += `<div class="dropdown mx-2" id='subCompo_${value}'>
  <button class="btn btn-${btnColor} dropdown-toggle mx-2 my-1" type="button" data-toggle="dropdown" aria-expanded="false">
    ${value}
  </button>
  <div class="dropdown-menu bg-light">`;

   
  if(componentName == "POINT"){
    btn +=`
    <a class="dropdown-item" onclick="get_EP_formData('EP1','${value}','${stationComName}')">EP 1</a>
    <a class="dropdown-item" onclick="get_EP_formData('EP2','${value}','${stationComName}')">EP 2</a>
    <a class="dropdown-item" onclick="get_EP_formData('EP3','${value}','${stationComName}')">EP 3</a>
    <a class="dropdown-item" onclick="get_EP_formData('EP4','${value}','${stationComName}')">EP 4</a>
    <a class="dropdown-item" onclick="get_EP_formData('EP5','${value}','${stationComName}')">EP 5</a>
    `;
  }else if(componentName == "TRACK"){
    btn +=`
    <a class="dropdown-item" onclick="get_T_formData('T1','${value}','${stationComName}')">T1</a>
    <a class="dropdown-item" onclick="get_T_formData('T2','${value}','${stationComName}')">T2</a>
    <a class="dropdown-item" onclick="get_T_formData('T3','${value}','${stationComName}')">T3</a>
    <a class="dropdown-item" onclick="get_T_formData('T4','${value}','${stationComName}')">T4</a>
    <a class="dropdown-item" onclick="get_T_formData('T5','${value}','${stationComName}')">T5</a>
    `;
  }else if(componentName == "SIGNAL CS" || componentName == "SIGNAL"){

   btn +=`
    <a class="dropdown-item" onclick="get_CS_formData('CS1','${value}','${stationComName}')">CS1</a>
    <a class="dropdown-item" onclick="get_CS_formData('CS2','${value}','${stationComName}')">CS2</a>
    `;

  }else if(componentName == "DL"){

    btn +=`
    <a class="dropdown-item" onclick="get_DL_formData('DL1','${value}','${stationComName}')">DL1</a>
    <a class="dropdown-item" onclick="get_DL_formData('DL2','${value}','${stationComName}')">DL2</a>
    <a class="dropdown-item" onclick="get_DL_formData('DL3','${value}','${stationComName}')">DL3</a>
    <a class="dropdown-item" onclick="get_DL_formData('DL4','${value}','${stationComName}')">DL4</a>
    `;

}else if(componentName == "MLB"){

btn +=`
    <a class="dropdown-item" onclick="get_MLB_formData('MLB1','${value}','${stationComName}')">MLB1</a>
    <a class="dropdown-item" onclick="get_MLB_formData('MLB2','${value}','${stationComName}')">MLB2</a>
    <a class="dropdown-item" onclick="get_MLB_formData('MLB3','${value}','${stationComName}')">MLB3</a>
    `;

}else if(componentName == "SLB"){

btn +=`
 <a class="dropdown-item" onclick="get_SLB_formData('SLB1','${value}','${stationComName}')">SLB1</a>
 <a class="dropdown-item" onclick="get_SLB_formData('SLB2','${value}','${stationComName}')">SLB2</a>
 
 `;

}

else if(componentName == "AXLE COUNTER"){

btn +=`
 <a class="dropdown-item" onclick="get_DAC_formData('DAC1','${value}','${stationComName}')">DAC1</a>
 <a class="dropdown-item" onclick="get_DAC_formData('DAC2','${value}','${stationComName}')">DAC2</a>
 <a class="dropdown-item" onclick="get_DAC_formData('DAC3','${value}','${stationComName}')">DAC3</a>
 
 `;

}


else if(componentName == "ELB"){

btn +=`
 <a class="dropdown-item" onclick="get_ELB_formData('ELB1','${value}','${stationComName}')">ELB1</a>
 <a class="dropdown-item" onclick="get_ELB_formData('ELB2','${value}','${stationComName}')">ELB2</a>
  <a class="dropdown-item" onclick="get_ELB_formData('ELB3','${value}','${stationComName}')">ELB3</a>
 <a class="dropdown-item" onclick="get_ELB_formData('ELB4','${value}','${stationComName}')">ELB4</a>
 <a class="dropdown-item" onclick="get_ELB_formData('ELB5','${value}','${stationComName}')">ELB5</a>
 
 `;

}
   
   
    btn +=`
  </div>
    </div>`;


        divWrap.innerHTML = btn

    });

    let elv = document.getElementById("subComponentDisplay");
    elv.appendChild(divAlert)
    elv.appendChild(editBtnCompo)
    elv.appendChild(divWrap)


}

    function getComponent(stationValue) {

        let sectionValue = $("#sectionId").val();

    let sectionName = "";
    let stationName = "";
    let tmpSectionList = sectionStationData.filter((x)=> x.station_id == stationValue);
    sectionName = tmpSectionList[0]['section_name'];
    stationName = tmpSectionList[0]['station_name'];

        if(sectionValue  == "" || sectionValue == null || sectionValue == undefined){
           if(!tmpSectionList.length){
                alert("Please refresh the page and try again");
                return;
           }
           sectionValue = tmpSectionList[0]['section_id'];
        }

        $.ajax({
            type: "POST",
            url: "query/form-action.php",
            data: {
                "action": "getComponentData",
                "sectionId": sectionValue,
                "stationId": stationValue,
                sectionName:sectionName,
                stationName:stationName
            },
            beforeSend: function () {
                $("#loader_show").removeClass('d-none');
                g_st_compList = [];
                document.getElementById("componentDisplay").innerHTML = '';
                document.getElementById("subComponentDisplay").innerHTML = "";


            },
            success: function (respo) {
                $("#loader_show").addClass('d-none');
                let response = JSON.parse(respo);
                if (response['status']) {
                    g_st_compList = response['data'];
                    let componetList = g_st_compList.map(x => x['station_component'])
                    console.log(componetList);


                    componetList.forEach((value, index) => {
                        let btn = document.createElement("button");
                        btn.id = "station_" + value;
                        btn.type = "button";
                        btn.className = "btn btn-sm mx-2 my-1";

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