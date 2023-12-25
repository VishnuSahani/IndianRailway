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
                <form id="componentForm">
                    <div class="row" id="subComponentList">
                        <div class="form-group col-xl-4 col-lg-4 col-md-4 col-12">

                            <label for="sectionId">Select Section <span class="text-danger">*</span></label>
                            <select name="sectionId" id="sectionId" onChange="getTest(this.value)" class="form-control">
                                <option value="">Select Section</option>
                                <?php
                                      $que=mysqli_query($con,"select * from section_tbl ORDER BY section_name ASC");
                                    while($row=mysqli_fetch_array($que))
                                    {
                                        $idOpt = $row['section_id']."__".$row['section_name'];
                                    echo"<option value=".$idOpt.">".$row['section_name']."</option>";
                                    }


                                ?>
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
                                        placeholder="Sub Component Name" aria-label="Username"
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
                            <button type="submit" class="btn btn-info">Sumbit</button>
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
let count = 1;

function removeNewSubComponent(){
    
    if(count > 1){
        let removeId = 'newCompo'+count;
        $("#"+removeId).remove();

        count = count - 1;

    }
}

function addNewSubComponent() {
    
    count = count + 1;
    let template = `<div class="from-group col-xl-3 col-lg-3 col-md-3 col-12" id="newCompo${count}">
                    <label for="subComponent">Name ${count}<span class="text-danger">*</span></label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">${count}</span>
                        </div>
                        <input type="text" class="form-control text-uppercase subComponentName" placeholder="Sub Component Name" aria-label="Username"
                            aria-describedby="basic-addon1">
                    </div>
                </div>`;


    // document.getElementById("subComponentList").appendChild(template);
    // document.getElementById("subComponentList").innerHTML = template;

    $("#subComponentList").append(template);



}

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





$(document).ready(()=>{
    $("#componentForm").submit((e)=>{
        e.preventDefault();
        let sectionValue = $("#sectionId").val();
        let stationValue = $("#stationId").val();
        let stationComponent = ($("#stationComponent").val()).toUpperCase();
        // alert(sectionValue)

        if(sectionValue  == "" || sectionValue == null || sectionValue == undefined){
            $("#sectionId").addClass("is-invalid")
            return 
        }else{
            $("#sectionId").removeClass("is-invalid")

        }

        if(stationValue  == "" || stationValue == null || stationValue == undefined){
            $("#stationId").addClass("is-invalid")
            return 
        }else{
            $("#stationId").removeClass("is-invalid")

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

        let sectionTmp = sectionValue.split("__");
        let stationTmp = stationValue.split("__");

        $.ajax({
            type:"POST",
            url:"./query/action.php",
            data:{"action":"stationComponentAdd","sectionId":sectionTmp[0],"sectionName":sectionTmp[1],"stationId":stationTmp[0],"stationName":stationTmp[1],"stationComponent":stationComponent,"subComponent":subComponentList.join(",")},
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


        
    })
})
</script>

</body>

</html>