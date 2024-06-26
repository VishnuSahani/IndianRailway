<?php require('header.php');?>
<?php require('include/db_config.php');

$empId = @$_GET['id'];

// echo $empId;


/*
The FILTER_VALIDATE_INT filter is used to validate value as integer.

FILTER_VALIDATE_INT also allows us to specify a range for the integer variable.

Possible options and flags:

min_range - specifies the minimum integer value
max_range - specifies the maximum integer value
FILTER_FLAG_ALLOW_OCTAL - allows octal number values
FILTER_FLAG_ALLOW_HEX - allows hexadecimal number values
*/

if (filter_var($empId, FILTER_VALIDATE_INT)!== false) {
    $query = mysqli_query($con,"SELECT * FROM emp_info_rail WHERE id = '$empId'");

    if(mysqli_num_rows($query) <= 0){
        echo "Invalid employee id <a href='emp-info.php'> Go back</a>";
        die();
    }

    $empBasicData = mysqli_fetch_array($query);

    $employeeId = $empBasicData['empid'];
  } 
  else {
    echo("Invalid param found from url <a href='emp-info.php'> Go back</a>");
    die();
  }



// print_r($empBasicData);


?>


<style>
#img-preview {
    display: none;
    height: 250px;
    border: 2px dashed #333;
    margin-bottom: 20px;
}

#img-preview img {
    width: 100%;
    /* height: auto;  */
    display: block;
}
</style>

<div class="alert alert-danger my-2">
    <h5 class="text-center">Add PME , Refresher Date </h5>
</div>

<!-- <i class="fa fa-file-pdf-o"></i>dd -->

<div class="container ">
    <div class="row">
        <div class="col-12 m-auto">

            <div class="row">
                <div class="form-group col-xl-6 col-lg-6 col-12">
                    <label for="sectionName">Section Name</label>
                    <input type="text" class="form-control" disabled
                        value="<?php echo $empBasicData['section_name'];?>">
                </div>

                <div class="form-group col-xl-6 col-lg-6 col-12">
                    <label for="stationName">Station Name</label>
                    <input type="text" class="form-control" disabled
                        value="<?php echo $empBasicData['station_name'];?>">
                </div>

                <div class="form-group col-xl-6 col-lg-6 col-12">
                    <label for="employeeId">Employee Id</label>
                    <input type="text" class="form-control" disabled value="<?php echo $empBasicData['empid'];?>">
                </div>

                <div class="form-group col-xl-6 col-lg-6 col-12">
                    <label for="empname">Employee Name</label>
                    <input type="text" class="form-control" disabled value="<?php echo $empBasicData['empname'];?>">
                </div>


                <div class="form-group col-xl-6 col-lg-6 col-12">
                    <label for="pmeDate">PME Date</label>
                    <input type="date" class="form-control" id="pmeDate">
                </div>

                <div class="form-group col-xl-6 col-lg-6 col-12">
                    <label for="rmeDate">Refresher Date</label>
                    <input type="date" class="form-control" id="rmeDate">
                </div>



                <div class="form-group text-center col-12">
                    <div class="my-2" id="statusRespo"></div>
                    <button type="button" class="btn btn-success" onclick="addPmeRmeData()">Save Data</button>
                </div>





            </div>

        </div>

        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-hover w-100" id="myTablePmeRme">
                    <thead class="table-dark">
                        <tr>
                            <!-- <th>#</th> -->
                            <th>PME Date</th>
                            <th>Refresher Date</th>
                            <th>Section Name</th>
                            <th>Station Name</th>
                            <th>PME File</th>
                            <!--<th>Refresher File</th>-->
                            <th>Competency</th>
                            <!-- <th>Action</th> -->
                        </tr>

                    </thead>

                    <tbody id="preRmeOldTableData">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>




<!-- Modal file-->
<div class="modal fade" id="addFileModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="addFileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info text-light">
                <h5 class="modal-title" id="addFileModalLabel">
                    Add  Document
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="modalFormComponent">
                    <div class="form-row">

                        <div class="form-group col-12">
                            <label for="email">Select File <small class="text-danger">(Only pdf and JPG
                                    allow)*</small></label>

                            <input type="file" onchange="getImgData()" id="choose-file" class="form-control"
                                name="choose-file" />

                        </div>
                        <div class="form-group col-12">
                            <!-- <label for="name">Name <span class="text-danger">*</span></label> -->
                            <input type="hidden" name="name" id="pmeRmeId" class="form-control">
                            <input type="hidden" name="subActionName" id="subActionName" class="form-control">
                            <div id="img-preview"></div>
                        </div>

                        <div class="form-group" id="fileRespo">

                        </div>



                        <div class="form-group col-12">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-sm btn-secondary"
                                    data-dismiss="modal">Close</button>
                                <button type="button" onclick="uploadFile()"
                                    class="btn btn-sm btn-success">Submit</button>
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


<!-- Modal date update -->
<div class="modal fade" id="editPmeRmeDateModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="editPmeRmeDateLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header bg-info text-light">
                <h5 class="modal-title" id="editPmeRmeDateLabel">
                    Date Edit
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editPmeRmeForm">
                    <div class="form-row">

                        <div class="form-group col-12">
                            <label for="email">Select Date</label>
                            <input type="date" id='editPmeRmeDateValue' class="form-control">
                        </div>
                        <div class="form-group col-12">
                            <!-- <label for="name">Name <span class="text-danger">*</span></label> -->
                            <input type="hidden" name="name" id="editPmeRmeId" class="form-control">
                            <input type="hidden" name="editSubActionName" id="editSubActionName" class="form-control">
                        </div>

                        <!-- <div class="form-group" id="editPmeRmeRespo">

                        </div> -->



                        <div class="form-group col-12">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-sm btn-secondary"
                                    data-dismiss="modal">Close</button>
                                <button type="submit"
                                    class="btn btn-sm btn-success">Submit</button>
                            </div>
                        </div>

                        <!--  -->
                        <div class="text-danger" id="editPmeRmeRespo"></div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>


<!-- delete Modal -->
<div class="modal fade" id="empDeleteModal" tabindex="-1" aria-labelledby="empDeleteModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="empDeleteModalLabel">Confirm</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Do you want to delete this data?
        <input type="hidden" id="deletePmeRmeId">
        <div class="my-3 text-danger" id="deleteStatus"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">No</button>
        <button type="button" class="btn btn-sm btn-primary" onclick="deleteEmplyeeConfirm()">Yes</button>
      </div>
    </div>
  </div>
</div>

<script>
const chooseFile = document.getElementById("choose-file");
const imgPreview = document.getElementById("img-preview");


function deleteEmplyeeModal(deletePmeRmeId){
  $('#deletePmeRmeId').val(deletePmeRmeId);
  $("#empDeleteModal").modal("show");
}


function deleteEmplyeeConfirm(){

let deletePmeRmeId = $("#deletePmeRmeId").val();
if(deletePmeRmeId != null && deletePmeRmeId != undefined && deletePmeRmeId != ''){
  $.ajax({
    type:"POST",
    url:"query/action.php",
    data:{action:"deletePmeRmeRow",deletePmeRmeId:deletePmeRmeId},
    beforeSend:()=>{
      $("#loader_show").removeClass('d-none');

    },
    success:(response)=>{
      $("#loader_show").addClass('d-none');
      let respo = JSON.parse(response)
      $("#deleteStatus").html(respo['msg']);
      if(respo['status']){
          $("#empDeleteModal").modal("hide");
          getPmeRmeData()
        }
        
    },
    complete:()=>{
        setTimeout(() => {
            $("#deleteStatus").html("");
        }, 5000);
    }
  });
}

}


function getImgData() {
    const files = chooseFile.files[0];
    imgPreview.innerHTML ='';

    if (files) {
        if (files.type != 'image/jpeg' && files.type != "application/pdf") {
            imgPreview.style.color = "red";
            imgPreview.style.display = "block";
            imgPreview.innerHTML = "Kindly selete on JPG and PDF format file";
            return;
        }

        if (files.type == "application/pdf") {
            // handlePDFFile(files);
            return;
        }


        const fileReader = new FileReader();
        fileReader.readAsDataURL(files);
        fileReader.addEventListener("load", function() {
            imgPreview.style.display = "block";
            imgPreview.innerHTML = '<img src="' + this.result + '" height="200px"  />';
        });
    }
}


function handlePDFFile(file) {
    const imgPreview = document.getElementById("img-preview");

    const reader = new FileReader();
    reader.onload = function(event) {
        const pdfUrl = event.target.result;
        const embedTag = `<embed src="${pdfUrl}" type="application/pdf" width="100%" height="300px" />`;
        imgPreview.innerHTML = embedTag;

    };
    reader.readAsDataURL(file);

}


// chooseFile.addEventListener("change", function () {
//   getImgData();
// });

var gbl_data = [];
var myTableData;

$(document).ready(() => {

    myTableData = $('#myTablePmeRme').DataTable({
        data: gbl_data,
        columns: [{
                data: 'pme_date'
            },
            {
                data: 'rme_date'
            },
            {
                data: 'section_name'
            },
            {
                data: 'station_name'
            },
            {
                data: 'addPmeFileBtn'
            },
            // {
            //     data: 'addRmeFileBtn'
            // },
            {
                data: 'competency'
            },
            /* {
                data: 'action'
            },*/

        ]
    });

});

function checkSize(size) {
    if (size >= (3 * 1024 * 1024)) {
        // chooseFile.get(0).reset(); //the tricky part is to "empty" the input file here I reset the form.
        $("#modalFormComponent")[0].reset();

        $("#fileRespo").html("JPG/PDF file maximum 3MB are not allow")
        return false;
    }
    return true;
}


function uploadFile() {

    
    const chooseFile = document.getElementById("choose-file");
    const files = chooseFile.files[0];
    if (files && (files.type == 'image/jpeg' || files.type == "application/pdf")) {
        console.log(files)

        if (checkSize(files.size)) {
            var formdata = new FormData();
            let subActionName = $("#subActionName").val();
            formdata.append("files", files);
            formdata.append("action", 'pmeRmeDocUpload');
            formdata.append("subActionName", subActionName);
            formdata.append("report_id", $("#pmeRmeId").val());

            $("#loader_show").removeClass('d-none');


            var ajax = new XMLHttpRequest();
            ajax.open("POST", "query/action.php");
            ajax.onreadystatechange = function() {
                if (ajax.readyState == 4 && ajax.status == 200) {
                    $("#loader_show").addClass('d-none');

                    let response = JSON.parse(ajax.responseText);

                    if(response['status']){
                        $('#fileRespo').html(response['msg']).css("color","green");
                        getPmeRmeData();
                    }else{
                        $('#fileRespo').html(response['msg']).css("color","red");

                    }

                    
                    $('#img-preview').html("").css("height","auto");
                    setTimeout(() => {
                        $("#fileRespo").html("")
                    }, 5000);
                    //  alert(ajax.responseText)

                    // chooseFile.get(0).reset(); 
                    $("#modalFormComponent")[0].reset();


                }
            }
            ajax.send(formdata);


        }



    }

}

function _(id) {
    return document.getElementById(id);
}

function editPmeRmeDialog(pmeRmeId,dateType,dateValue){
    if(dateType=='pmeDate'){
        //
        $("#editPmeRmeDateLabel").html("PME Date Update");
        
    }else{
        $("#editPmeRmeDateLabel").html("Refresher Date Update");
        
    }

    $("#editSubActionName").val(dateType);
    $("#editPmeRmeId").val(pmeRmeId);
    if(dateValue != ''){
        console.log("new Date(dateValue)",new Date(dateValue));
        $("#editPmeRmeDateValue").val(dateValue);

    }
    $("#editPmeRmeDateModal").modal("show")

}

function openDialog(pmeRmeId,fileType) {
    //certificate
    if(fileType == 'pmeFile'){

        $("#addFileModalLabel").html("PME File Upload");
        $("#subActionName").val("pmeFile");

    }else if(fileType == "rmeFile"){

        $("#addFileModalLabel").html("Refresher File Upload");
        $("#subActionName").val("rmeFile");
        
    }else{
        $("#addFileModalLabel").html("Competency Certificate File Upload");
        $("#subActionName").val("certificate");
    }

    $("#pmeRmeId").val(pmeRmeId);
    $("#addFileModal").modal("show")
    

}

function deleteFile(pmeRmeId,fileType){
    let msgShow = "Do you want to delete Refresher file";
    if(fileType == 'pmeFile'){
        
        msgShow = "Do you want to delete PME file";

    }else if(fileType=="certificate"){
        msgShow = "Do you want to delete Certificate";

    }
    if(confirm(msgShow) && pmeRmeId !=''){
        $.ajax({
            type:"POST",
            url:"query/action.php",
            data:{
                "action" : "deletePmeRmeFile",
                "pmeRmeId" : pmeRmeId,
                "subAction" : fileType,
            },
            beforeSend:function(){

            },
            success:function(respo){
                let response = JSON.parse(respo);
                if(response['status']){
                    getPmeRmeData();
                }

            }
        });
    }
}

function createTablerow(dataList) {

    let htmlDisplay = '';

    if (dataList.length == 0) {

        htmlDisplay = `<tr>
    <td colspan="5">No data found</td>


    </tr>`

    } else {

        dataList.forEach((value, index) => {

            let className1 = value['pme_date'] == '' ? 'text-danger' : '';
            let className2 = value['rme_date'] == '' ? 'text-danger' : '';

            htmlDisplay += `<tr>
      <td>${index+1}</td>
       <td class="${className1}">${value['pme_date']==''?'No Record':value['pme_date']}</td>
        <td class="${className2}">${value['rme_date'] == '' ? 'No Record': value['rme_date']}</td>
         <td>${value['section_name']}</td>
         <td>${value['station_name']}</td>
     
      </tr>`;
        });

    }

    _("preRmeOldTableData").innerHTML = htmlDisplay;
}


function addPmeRmeData() {

    let pmeDate = _("pmeDate").value;
    let rmeDate = _("rmeDate").value;

    if (pmeDate != "" || rmeDate != "") {

        var formdata = new FormData();

        formdata.append("pmeDate", pmeDate);
        formdata.append("rmeDate", rmeDate);
        formdata.append("id", '<?php echo $empId ?>');





        formdata.append("action", "pmeRmeDateInsert");
        var ajax = new XMLHttpRequest();
        ajax.open("POST", "./query/action.php", true);
        ajax.send(formdata);

        ajax.onreadystatechange = function() {
            if (ajax.readyState == 4 && ajax.status == 200) {

                let respo = JSON.parse(ajax.responseText);
                console.log(respo);

                _("statusRespo").innerHTML = respo['msg'];


                if (respo['status']) {

                    _("statusRespo").style.color = "green";
                    getPmeRmeData();

                } else {
                    _("statusRespo").style.color = "red";

                }

            }
        };


    } else {
        _("statusRespo").innerHTML = "Please select at least one date";
        _("statusRespo").style.color = "red";
        setTimeout(() => {
            _("statusRespo").innerHTML = "";

        }, 5000);
    }


}



function getPmeRmeData() {

    var formdata = new FormData();
    formdata.append("action", "getPmeRmeDate");
    formdata.append("empId", '<?php echo $employeeId ?>');
    var ajax = new XMLHttpRequest();
    ajax.open("POST", "./query/action.php", true);
    ajax.send(formdata);

    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {

            let respo = JSON.parse(ajax.responseText);
            console.log(respo);



            // createTablerow(respo['data']);
            gbl_data = respo['data'];


            if (myTableData != undefined) {
                myTableData.clear();
                myTableData.rows.add(gbl_data);
                myTableData.draw(false);

            }


            //     if(respo['status']){

            //     } else {

            // }

        }
    };

}


getPmeRmeData();


$(document).ready(()=>{
    $("#editPmeRmeForm").submit((e)=>{
        e.preventDefault()

        let editPmeRmeDateValue = $("#editPmeRmeDateValue").val();
        let editPmeRmeId = $("#editPmeRmeId").val();
        let editSubActionName = $("#editSubActionName").val();

        
        if(editPmeRmeId == '' || editPmeRmeId == null || editPmeRmeId == undefined){
            $('#editPmeRmeRespo').html("Refresh page and try again.");
            return;
        }

        if(editPmeRmeDateValue == '' || editPmeRmeDateValue == null || editPmeRmeDateValue == undefined){
            $('#editPmeRmeRespo').html("Please select date.");
            return;
        }

        if(editSubActionName == '' || editSubActionName == null || editSubActionName == undefined){
            $('#editPmeRmeRespo').html("Refresh page and try again.");
            return;
        }


        $.ajax({
            type:"POST",
            url:"query/action.php",
            data:{
                action:'editPmeRmeDate',
                editSubActionName : editSubActionName,
                editPmeRmeId : editPmeRmeId,
                editPmeRmeDateValue : editPmeRmeDateValue
            },

            beforeSend:()=>{
                $("#loader_show").removeClass('d-none');

            },
            success:(respo)=>{
                $("#loader_show").addClass('d-none');
                console.log("respo",respo);
                let response = JSON.parse(respo);
                if (response['status']) {
                    getPmeRmeData();
                }
                    $("#editPmeRmeRespo").html(response['msg']).css('color','blue')

           

            }


        });

       
    })
})
</script>