<?php require('header.php'); ?>
<?php require('include/db_config.php');

//Include database configuration file
$id = "";

if (isset($_SESSION['userretailer'])) {
    $id = $_SESSION['userretailer'];

}

?>


<div class="container-fluid">
    <div class="alert alert-success h6 text-center my-2">Change Employee Station</div>
    <div class="row p-2">
        <div class="col-12 col-md-4 form-group">
            <label for="empId">Employee Name<span class="text-danger">*</span></label>
            <select name="empId" id="empId" class="custom-select" >
                <option value="">Select Employee</option>            
            </select>
        </div>

        <div class="col-12 col-md-4 form-group">
            <label for="stationId">Station Name<span class="text-danger">*</span></label>
            <select name="stationId" id="stationId" class="custom-select" >
                <option value="">Select Station</option>             
            </select>
            <input type="hidden" class="form-control" id="stationName" readonly>
        </div>

        <div class="col-12 col-md-4 form-group">
            <label for="sectionName">Section Name<span class="text-danger">*</span></label>
           <input type="text" class="form-control" id="sectionName" readonly>
           <input type="hidden" class="form-control" id="sectionId" readonly>
        </div>

        <div class="col-12 form-group">
            <div class="d-flex align-items-center">
                <button type="button" class="btn btn-sm btn-primary" id="changeStationBtn">Change Station</button>
                    <div class="ml-5" id="respoMsg"></div>
            </div>
        </div>


    </div>
</div>




</body>

<script>

    var g_stationDataList = [];
    var g_EmpDataList = [];

    function getEmployeeData(){
        
        $.ajax({
            type:"POST",
            url:"./query/action.php",
            data:{
                action:"getEmployeeAllData"
            },
            beforeSend:()=>{
                g_EmpDataList=[];
                $("#loader_show").removeClass('d-none');

            },
            success:(response)=>{
                $("#loader_show").addClass('d-none');

                try{
                    let respo =JSON.parse(response);
                    if(respo['status']){
                        g_EmpDataList = respo['data'];

                        let displayHtml = '<option value="">Select Employee</option>';

                        g_EmpDataList.forEach(element => {
                            displayHtml += `<option value="${element['empid']}">${element['empname']} (${element['empid']})</option>`;                            
                        });

                        $("#empId").html(displayHtml);

                    }


                }catch(e){
                    console.error(e);
                }
            },
            error:(e)=>{
                console.error(e);
                $("#loader_show").addClass('d-none');

            }
        });
    }

    function getStationData(){

        $.ajax({
            type:"POST",
            url:"./query/form-action.php",
            data:{
                action:"getSectionStation"
            },
            beforeSend:()=>{
                g_stationDataList=[];
                $("#loader_show").removeClass('d-none');

            },
            success:(response)=>{
                $("#loader_show").addClass('d-none');

                try{
                    let respo =JSON.parse(response);
                    if(respo['status']){
                        g_stationDataList = respo['data'];

                        let displayHtml = '<option value="">Select Station</option>';

                        g_stationDataList.forEach(element => {
                            displayHtml += `<option value="${element['station_id']}">${element['station_name']}</option>`;                            
                        });

                        $("#stationId").html(displayHtml);

                        $("#stationName").val('');
                        $("#sectionName").val('');
                        $("#sectionId").val('');

                    }


                }catch(e){
                    console.error(e);
                }
            },
            error:(e)=>{
                console.error(e);
                $("#loader_show").addClass('d-none');

            }
        });

    }
    $(document).ready(()=>{
        getStationData(); //stationList
        getEmployeeData() // emp list

        
        $("#empId").on('change',function(){
            let empId = $(this).val();
            let selectObj = g_EmpDataList.filter((x)=> x.empid == empId)
            console.log("selectObj=",selectObj);
            if(selectObj.length){
                selectObj = selectObj[0];                
                $("#stationName").val(selectObj['station_name']);
                $("#sectionName").val(selectObj['section_name']);
                $("#sectionId").val(selectObj['section_id']);
                $("#stationId").val(selectObj['station_id']);
            }else{
                alert("Something went wrong, refresh page and try again")
            }

        });

        $("#stationId").on('change',function(){
            let stationId = $(this).val();
            let selectObj = g_stationDataList.filter((x)=> x.station_id == stationId)
            console.log("selectObj=",selectObj);
            if(selectObj.length){
                selectObj = selectObj[0];                
                $("#stationName").val(selectObj['station_name']);
                $("#sectionName").val(selectObj['section_name']);
                $("#sectionId").val(selectObj['section_id']);
            }else{
                alert("Something went wrong, refresh page and try again")
            }

        });

        $("#changeStationBtn").click(()=>{

            let stationId =$("#stationId").val();
            let stationName =$("#stationName").val();
            let sectionName =$("#sectionName").val();
            let sectionId =$("#sectionId").val();
            let empId =$("#empId").val();

            if(empId == undefined || empId == null || empId == ""){
                $("#empId").addClass('is-invalid');
                $("#respoMsg").html("Employee Name is required").css('color','red');
                return;
            }else{
                $("#empId").removeClass('is-invalid');
                $("#respoMsg").html("");
            }

            if(stationId == undefined || stationId == null || stationId == ""){
                $("#stationId").addClass('is-invalid');
                $("#respoMsg").html("Station is required").css('color','red');
                return;
            }else{
                $("#stationId").removeClass('is-invalid');
                $("#respoMsg").html("");
            }

            
            if(stationName == undefined || stationName == null || stationName == "" || sectionName == undefined || sectionName == null || sectionName == "" || sectionId == undefined || sectionId == null || sectionId == "" ){
                alert("Something went wrong, refresh page and try again")
                return;
            }

            let selectObj = g_EmpDataList.filter((x)=> x.empid == empId);

            if(!selectObj.length){
                alert("Invalid Employee Id, refresh page and try again")
                return;
            }
            if(stationId == selectObj[0]['station_id']){
                $("#stationId").addClass('is-invalid');
                $("#respoMsg").html("Please change station").css('color','red');
                return;
            }

            



            $.ajax({
                type:"POST",
                url:"./query/action.php",
                data:{
                    action: "updateEmpStation",
                    stationId:stationId,
                    stationName:stationName,
                    sectionName:sectionName,
                    sectionId:sectionId,
                    empId:empId
                },
                beforeSend:()=>{
                    $("#loader_show").removeClass('d-none');
                },
                success:(response)=>{
                    try{
                        $("#loader_show").addClass('d-none');

                        let respo =JSON.parse(response);
                        if(respo['status']){
                            $("#respoMsg").html(respo['msg']).css('color','green');

                            getStationData(); //stationList
                            getEmployeeData() // emp list

                        }else{
                            $("#respoMsg").html(respo['msg']).css('color','red');
                        }
                    }catch(e){
                        console.error(e);

                    }
                },
                error:(e)=>{
                    console.error(e);
                    $("#loader_show").addClass('d-none');

                }
            })


        })
    })
</script>

</html>