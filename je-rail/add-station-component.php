<?php require('header.php');?>
<?php require('include/db_config.php');

 //Include database configuration file
    $id="";

    if(isset($_SESSION['userretailerje']))
{
  $id=$_SESSION['userretailerje'];  
   
}

?>






<div class="container" style="margin-top:30px;">

    <div class="card-header alert alert-primary text-center d-flex justify-content-between">
        <div></div>
        <div class="h5">Add Station Component</div>
        <div class="cursor-pointer">
            <a href="view-all-component.php">View Component</a>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <form id="componentForm">
                    <div class="row" id="subComponentList">
                        <div class="form-group col-xl-4 col-lg-4 col-md-4 col-12">

                            <label for="sectionId">Select Section <span class="text-danger">*</span></label>
                            <select name="sectionId" id="sectionId" onChange="filterStation(this.value)" class="form-control">
                                <option value="">Select Section</option>                            
                            </select>

                        </div>
                        <div class="form-group col-xl-4 col-lg-4 col-md-4 col-12">

                            <label>Select Station <span class="text-danger">*</span></label>

                            <select name="stationId" class="form-control" id="stationId" >
                                <option value="">Select Section First</option>

                            </select>

                        </div>

                        <div class="form-group col-xl-4 col-lg-4 col-md-4 col-12">

                            <label for="stationComponent">Station Component <span class="text-danger">*</span></label>
                            <input type="text" class="form-control text-uppercase" id="stationComponent" name="stationComponent"
                                placeholder="Enter Station Component">



                        </div>
                        <!-- <div class="" id="subComponentList"> -->
                            <div class="from-group col-xl-3 col-lg-3 col-md-3 col-12">
                                <label for="subComponent">Sub Component Name 1<span class="text-danger">*</span></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">1</span>
                                    </div>
                                    <input type="text" class="form-control subComponentName text-uppercase"
                                        placeholder="Sub Component Name" id="sub_component1" aria-label="Username"
                                        aria-describedby="basic-addon1">
                                </div>
                            </div>
                        <!-- </div> -->

                        
                    </div>

                    <div class="form-group">
                            <button type="button" class="btn btn-success btn-sm" onclick="addNewSubComponent()">Add</button>
                            <button type="button" class="btn btn-danger btn-sm" onclick="removeNewSubComponent()">Remove</button>
                        </div>



                        <div class="form-group text-center">
                            <button type="button" class="btn btn-info" id="submitBtnAdd">Sumbit</button>
                            <button type="button" class="btn btn-success d-none" id="submitBtnEdit">Update Component</button>
                        </div>
                </form>
            </div>
        </div>
    </div>



</div>
<!--container close-->

 <!-- Modal -->
<div class="modal fade" data-keyboard="false" data-backdrop="static"  id="ResponseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-danger" id="exampleModalLabel">Component Information </h5>
       
      </div>
      <div class="modal-body">
                <span id="status" class=""></span>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!--  -->

<script>

// below variable is global variable;
let count = 1;
var sectionStationData=[];
var sectionList_glo = [];
var stationList_glo = [];

// end global variable


function removeNewSubComponent(){
    
    if(count > 1){
        let removeId = 'newCompo'+count;
        $("#"+removeId).remove();

        count = count - 1;

    }
}

function addNewSubComponent(value='') {
    
    count = count + 1;
    let template = `<div class="from-group col-xl-3 col-lg-3 col-md-3 col-12" id="newCompo${count}">
                    <label for="subComponent">Name ${count}<span class="text-danger">*</span></label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">${count}</span>
                        </div>
                        <input type="text" class="form-control text-uppercase subComponentName" value='${value}' placeholder="Sub Component Name" aria-label="Username"
                            aria-describedby="basic-addon1">
                    </div>
                </div>`;


    // document.getElementById("subComponentList").appendChild(template);
    // document.getElementById("subComponentList").innerHTML = template;

    $("#subComponentList").append(template);



}

function filterStation(value) {
    if(value == ''){
        allSectionStation(sectionStationData).then((val)=>{            
            setStation();
        })
    }else{

        let tmpSection = sectionStationData.filter((x)=> x.section_id == value);
        allSectionStation(tmpSection).then((val)=>{            
            setStation();
        })

    }

}


function getArrFromObjArr(objArr,key){
    return objArr.map(x=>x[key]);
}

function allSectionStation(sec_stat_list){
    
    sectionList_glo = [];
    stationList_glo = [];
    
    return new Promise((resolve,reject)=>{
        sec_stat_list.forEach(element => {

            if(!getArrFromObjArr(sectionList_glo,'section_id').includes(element.section_id)){
                let obj = {
                    section_id:element.section_id,
                    section_name:element.section_name
                }
                sectionList_glo.push(obj);
            }
            if(!getArrFromObjArr(stationList_glo,'station_id').includes(element.station_id)){
                let obj = {
                    station_id:element.station_id,
                    station_name:element.station_name
                }
                stationList_glo.push(obj);
            }

            });// formeach

            resolve(true);

    });//promise
}

function setSection(){

    console.log(sectionList_glo);

    let sectionHtml = '<option value="">All Station</option>';
    sectionList_glo.forEach(element => {
        sectionHtml += `<option value="${element.section_id}">${element.section_name}</option>`;
        
    });

    $("#sectionId").html(sectionHtml)

}

function setStation(){

    console.log(stationList_glo);

    let stationHtml = '<option value="">Select Station</option>';
    stationList_glo.forEach(element => {
        stationHtml += `<option value="${element.station_id}">${element.station_name}</option>`;
        
    });

    $("#stationId").html(stationHtml)

}


function getJESectionStation(){
    let jeId = <?php echo $id; ?>;
    if(jeId == undefined || jeId == null || jeId == ''){
        return ;
    }

    $.ajax({
        type:"POST",
        url:"query/je-action.php",
        data:{
            JE_action:"getSectionStation",
            jeId:jeId
        },
        beforeSend:()=>{
            $("#loader_show").removeClass('d-none');
        },
        success:(response)=>{
            $("#loader_show").addClass('d-none');
            let respo =JSON.parse(response);
            console.log("respo=",respo);
            if(respo['status']){
                sectionStationData = respo['data'];

                allSectionStation(sectionStationData).then((res)=>{
                    setSection();
                    setStation();
                });

            }
        }
    })

}


$(document).ready(()=>{

    getJESectionStation();

    function getComponentInfoDetails(id){
        // alert(id)
        $.ajax({
            type : "POST",
            url : "./query/je-action.php",
            data : {
                "JE_action":"getSingleComponetData",
                "componentId": id.trim()
            },
            beforeSend:function(){
                $("#loader_show").removeClass('d-none');
            },
            success:function(respo){
                $("#loader_show").addClass('d-none');
                let response = JSON.parse(respo);
                console.log(response);
                if(response['status']){
                    let dataList = response['data'][0];
                    $("#sectionId").val(dataList['section_id']);

                    // $("#stationId").append(`<option value='${dataList['station_id']+'__'+dataList['station_name']}'>${dataList['station_name']}</option>`);

                    $("#stationId").val(dataList['station_id']);
                    $("#stationComponent").val(dataList['station_component']);
                    
                    let sub_componentArr = dataList['sub_component'].split(',')
                    console.log(sub_componentArr);

                    $("#sub_component1").val(sub_componentArr.shift());

                    sub_componentArr.forEach(element => {
                        addNewSubComponent(element);
                        
                    });

                    $("form").attr("id","EditComponentForm");
                    $("#submitBtnAdd").addClass("d-none");
                    $("#submitBtnEdit").removeClass("d-none");





                }

            }
        });
            
    }




        

        $("#submitBtnEdit").click(()=>{
     
        let stationComponent = ($("#stationComponent").val()).toUpperCase();

        if(stationComponent  == "" || stationComponent == null || stationComponent == undefined){
            $("#stationComponent").addClass("is-invalid")
            return 
        }else{
            $("#stationComponent").removeClass("is-invalid")

        }


        let subComponentList = [];

        

        let classList = document.getElementsByClassName("subComponentName");
        for(let i =0 ; i < classList.length ; i++){
            console.log(classList[i].value);
            if(classList[i].value == '' || classList[i].value == null || classList[i].value == undefined){
                classList[i].classList.add("is-invalid");
                break;
            }

            classList[i].classList.remove("is-invalid");

            subComponentList.push((classList[i].value).toUpperCase())
        }
 

        if(classList.length != subComponentList.length ){
            classList[0].classList.add("is-invalid");
            return;
        }

        // let sectionTmp = sectionValue.split("__");
        // let stationTmp = stationValue.split("__");

        $.ajax({
            type:"POST",
            url:"./query/je-action.php",
            data:{
                "JE_action":"stationComponentUpdate",
                "id":id,
                "stationComponent":stationComponent,
                "subComponent":subComponentList.join(",")},
            beforeSend:function(){
                $("#loader_show").removeClass('d-none');

            },
            success:function(respo){
                let response = JSON.parse(respo);
                console.log(response);
                $("#ResponseModal").modal("show");

                if(response['status']){
                    $('#EditComponentForm')[0].reset();  
                    $("#status").html(response['msg']).css('color','green');
 
                }else{
                    $("#status").html(response['msg']).css('color','red');

                }
                

            },
            complete:function(){
                    $("#loader_show").addClass('d-none');
            },
            error:()=>{

                $("#loader_show").addClass('d-none');

            }
        });


        
    })



    $("#submitBtnAdd").click(()=>{
        // e.preventDefault();
        
        let section_name = '';
        let station_name = '';

        let sectionValue = $("#sectionId").val();
        let stationValue = $("#stationId").val();
        let stationComponent = ($("#stationComponent").val()).toUpperCase();
        // alert(sectionValue)

        if(stationValue  == "" || stationValue == null || stationValue == undefined){
            $("#stationId").addClass("is-invalid")
            return 
        }else{
            $("#stationId").removeClass("is-invalid")

        }

        if(sectionValue  == "" || sectionValue == null || sectionValue == undefined){
           let tmpSectionList = sectionStationData.filter((x)=> x.station_id == stationValue);
           if(!tmpSectionList.length){
                alert("Please refresh the page and try again");
                return;
           }
           sectionValue = tmpSectionList[0]['section_id'];
           section_name = tmpSectionList[0]['section_name'];
           station_name = tmpSectionList[0]['station_name'];

        }

        if(stationComponent  == "" || stationComponent == null || stationComponent == undefined){
            $("#stationComponent").addClass("is-invalid")
            return 
        }else{
            $("#stationComponent").removeClass("is-invalid")

        }


        // $(".subComponentName").each(()=>{
        //     console.log($(this).text());
        // })

        let subComponentList = [];

        

        let classList = document.getElementsByClassName("subComponentName");
        for(let i =0 ; i < classList.length ; i++){
            console.log(classList[i].value);
            if(classList[i].value == '' || classList[i].value == null || classList[i].value == undefined){
                classList[i].classList.add("is-invalid");
                break;
            }

            classList[i].classList.remove("is-invalid");

            subComponentList.push((classList[i].value).toUpperCase())
        }
        // classList.forEach(element => {

        //     console.log(element.value);
        // });

        if(classList.length != subComponentList.length ){
            classList[0].classList.add("is-invalid");
            return;
        }

        // let sectionTmp = sectionValue.split("__");
        // let stationTmp = stationValue.split("__");

        $.ajax({
            type:"POST",
            url:"./query/je-action.php",
            data:{
                "JE_action":"stationComponentAdd",
                "sectionId":sectionValue,
                "sectionName":section_name,
                "stationId":stationValue,
                "stationName":station_name,
                "stationComponent":stationComponent,
                "subComponent":subComponentList.join(",")
            },
            beforeSend:function(){
                $("#loader_show").removeClass('d-none');
            },
            success:function(respo){
                let response = JSON.parse(respo);
                console.log(response);
                $("#ResponseModal").modal("show");


                if(response['status']){
                    $('#componentForm')[0].reset();  
                    $("#status").html(response['msg']).css('color','green');
 
                }else{
                    $("#status").html(response['msg']).css('color','red');

                }
                // response['msg'] 

            },
            complete:function(){
                    $("#loader_show").addClass('d-none');
            },
            error:()=>{

                $("#loader_show").addClass('d-none');

            }
        });


        
    });


    var url_string = window.location.href;
    var url = new URL(url_string);
    var id = url.searchParams.get("q");
    if(id != null && id != "" && id != undefined){
        getComponentInfoDetails(id);
    }

});



</script>

</body>

</html>