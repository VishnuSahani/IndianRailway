<?php require('header.php'); ?>
<?php require('include/db_config.php');

//Include database configuration file
$id = "";

if (isset($_SESSION['userretailer'])) {
    $id = $_SESSION['userretailer'];

}

?>

<div class="container mt-2">
    <div class="alert alert-success text-center h5">
        Form Duration
    </div>

    <div class="table-responsive">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <td>#</td>
                    <td>Name</td>
                    <td>Day</td>
                    <td>Action</td>
                </tr>
            </thead>

            <tbody id="tableDataDuration">
              
            </tbody>
        </table>
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
    function editModal(id,formName,durationValue){
        console.log("formName=",id);
        $("#formName").html(formName);
        $("#durationId").val(id);
        $("#durationValue").val(durationValue);
        $("#durationEditModal").modal("show");
        
        //clear form
        $("#durationValueError").html("");
        $("#durationValue").removeClass("is-invalid");

    }


    function getFormDurationData(){
        $.ajax({
            type:"POST",
            url:"./query/action.php",
            data:{
                action : "getFormDurationData",
            },
            beforeSend:()=>{
                $("#loader_show").removeClass('d-none');
            },
            success:(response)=>{
                $("#loader_show").addClass('d-none');

                let respo = JSON.parse(response);
                console.log(respo);

                let htmlDisplay = "";

                if(respo['status'] && respo['data'].length){

                    respo['data'].forEach((element,i) => {
                        htmlDisplay += `<tr>
                            <td>${i+1}</td>
                            <td>${element.formName}</td>
                            <td>${element.duration}</td>
                            <td><button type="button" onclick=editModal("${element.id}","${element.formName}","${element.duration}") class="btn btn-sm btn-success">Edit</button></td>
                        </tr>`
                    });
                }else{
                    htmlDisplay = "<tr><td class='text-center' colspan='4'>No Form Duration Data Found</td></tr>";
                }

                $("#tableDataDuration").html(htmlDisplay);

            },
            error:(err)=>{
                $("#loader_show").addClass('d-none');
            }
        });
    }   

    $(document).ready(()=>{

        getFormDurationData();

        $("#durationEditForm").submit((e)=>{
            e.preventDefault()
            let durationValue = $("#durationValue").val();
            let durationId = $("#durationId").val();

            if(durationValue == NaN || durationValue == undefined || durationValue == ''){
                $("#durationValueError").html("Duration is required");
                $("#durationValue").addClass("is-invalid");
                $("#durationValue").focus();

            }else{
                $("#durationValueError").html("");
                $("#durationValue").removeClass("is-invalid");
            }

            if(durationId == NaN || durationId == undefined || durationId == ''){
                $("#durationValueError").html("Refresh page and try again");             

            }

            $.ajax({
                type:"POST",
                url:"./query/action.php",
                data:{
                    action:"updateFormDuration",
                    durationValue:durationValue,
                    durationId:durationId,
                },
                beforeSend:()=>{

                },
                success:(response)=>{
                    let respo = JSON.parse(response);
                    $("#durationValueError").html(respo['msg']);
                    if(respo['status']){
                        //update table
                        getFormDurationData();

                    }
                },
    
            })
        });
    });
</script>
</body>

</html>