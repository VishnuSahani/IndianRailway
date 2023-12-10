<?php require('header.php');?>
<?php require('include/db_config.php');

 //Include database configuration file
    $id="";

    if(isset($_SESSION['userretailer']))
{
  $id=$_SESSION['userretailer'];  
   
}
   
  
?>

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
  
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>


<script language="javascript" type="text/javascript">

function getXMLHTTP() { //fuction to return the xml http object
    var xmlhttp=false;  
    try{
      xmlhttp=new XMLHttpRequest();
    }
    catch(e)  {   
      try{      
        xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
      }
      catch(e){
        try{
        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch(e1){
          xmlhttp=false;
        }
      }
    }
      
    return xmlhttp;
    }
  
  function getTest(Sub_Id) {    
  
    var strURL="Question2.php?Subjec_Name="+Sub_Id;
    
    var xhr = new XMLHttpRequest();
xhr.open("GET", strURL, true);
xhr.onreadystatechange = function() {

  if (parseInt( xhr.readyState )== 4 && parseInt( xhr.status )== 200) {
  
    document.getElementById('stationId').innerHTML=xhr.responseText;  
  }
}
xhr.send();
    
      
  }
  
</script>

<!-- <script language="javascript" type="text/javascript">


  function getTest(Sub_Id) {    
  
    var strURL="viewQuery.php?Subjec_Name="+Sub_Id;
    
    var xhr = new XMLHttpRequest();
xhr.open("GET", strURL, true);
xhr.onreadystatechange = function() {

  if (parseInt( xhr.readyState )== 4 && parseInt( xhr.status )== 200) {
  
  
    document.getElementById('T').innerHTML=xhr.responseText;  
  }
}
xhr.send();
    
      
  }
  
</script>-->


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
        Do you want to delete the employee <span class="font-weight-bold text-danger" id="deleteEmpName"></span>
        <input type="hidden" id="deleteEmpId">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">No</button>
        <button type="button" class="btn btn-sm btn-primary" onclick="deleteEmplyeeConfirm()">Yes</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">

    var gbl_data = [];
  var  myTableData;

  function deleteEmplyeeConfirm(){

    let deleteEmpId = $("#deleteEmpId").val();
    if(deleteEmpId != null && deleteEmpId != undefined && deleteEmpId != ''){
      $.ajax({
        type:"POST",
        url:"query/action.php",
        data:{action:"deleteEmployee",empId:deleteEmpId},
        beforeSend:()=>{
          $("#loader_show").removeClass('d-none');

        },
        success:(response)=>{
          $("#loader_show").addClass('d-none');
          let respo = JSON.parse(response)
          if(respo['status']){
            $("#empDeleteModal").modal("hide");
            getAllData();

          }
          
        }
      });
    }

  }

function deleteEmplyeeModal(empId,empName){
  $('#deleteEmpName').html(empName.split("_").join(" "));
  $('#deleteEmpId').val(empId);
  $("#empDeleteModal").modal("show");
}
  
function getAllData(){


let action = "getEmployeeAllData";

 var formdata = new FormData();
formdata.append( "action",action);

//alert(testData);
var ajax = new XMLHttpRequest();
ajax.open("POST","./query/action.php",true);
  //req.open("GET", "searchStudent.php?q=" + str, true);

ajax.send(formdata);

ajax.onreadystatechange = function(){
     if(ajax.readyState == 4 && ajax.status == 200) {

      let respo = JSON.parse(ajax.responseText);
      console.log(respo)

              // createTablerow(respo['data']);


          gbl_data = respo['data'];
          
          myTableData.clear();
          myTableData.rows.add(gbl_data);
          myTableData.draw(false);

      
    // if(respo['status']){


    // } else {
   
    // }

  }
};

}

  $(document).ready(()=>{

    myTableData = $('#myTable').DataTable( {
    data: gbl_data,
    columns: [
    
        { data: 'empid' },
        { data: 'empname' },
        { data: 'empdesg' },
        { data: 'station_name' },
        { data: 'pme_date' },
        { data: 'rme_date' },
        { data: 'competency' },
        { data: 'href' },
        { data: 'form' },
        { data: 'action' },
    ]
} );

getAllData();

  })


  function _(id)
{ 
  return document.getElementById(id);
 }

 function addEditPmeRme(value){

  console.log("list print ",value)

 }


 function createTablerow(dataList){

  let htmlDisplay = '';

    if(dataList.length == 0){

      htmlDisplay = `<tr>
      <td colspan="5">No data found</td>


      </tr>`

    }else{

      dataList.forEach((value,index)=>{

        let rowId = value['id'];
           let className1 = value['pme_date']==''?'text-danger':'';
        let className2 = value['rme_date']==''?'text-danger':'';


        htmlDisplay += `<tr>
        <td>${index+1}</td>
         <td>${value['empid']}</td>
          <td>${value['empname']}</td>
           <td>${value['empdesg']}</td>
           <td class="${className1}">${value['pme_date']==''?'No Record':value['pme_date']}</td>
        <td class="${className2}">${value['rme_date'] == '' ? 'No Record': value['rme_date']}</td>
            <td><a type="button" class="btn btn-sm btn-success" href="pme-rme-add.php?id=${rowId}">Edit</a></td>
        </tr>`;
      });

    }

    _("tableEmpData").innerHTML = htmlDisplay ;
 }


 


function getData(testData){


  let sectionId = _("sectionId").value 
  let tmpStation = _("stationId").value 
  let stationId = tmpStation.split("__")[0]
  let action = "getEmployeeData";

   var formdata = new FormData();

   formdata.append( "stationId", stationId);
  formdata.append( "sectionId",sectionId);
  formdata.append( "action",action);


//alert(testData);
var ajax = new XMLHttpRequest();
ajax.open("POST","./query/action.php",true);
    //req.open("GET", "searchStudent.php?q=" + str, true);

ajax.send(formdata);

ajax.onreadystatechange = function(){
       if(ajax.readyState == 4 && ajax.status == 200) {

        let respo = JSON.parse(ajax.responseText);
        console.log(respo)

                // createTablerow(respo['data']);


            gbl_data = respo['data'];
            
            myTableData.clear();
            myTableData.rows.add(gbl_data);
            myTableData.draw(false);

        
      // if(respo['status']){


      // } else {
     
      // }

    }
};

}


function resetEmpForm(){
  // $("#sectionId").val("")
  // $("#stationId").val("");
  // getAllData();
  location.reload();
}

</script>



 <div class="container" style="margin-top:30px;">

   
   
   <!----------------------------------------------------->
   
   
   <p class="card-header alert alert-primary text-center h3" >View  Employee </p>
   <form action="" method="">

   <div class="form-row">
 
    <div class="form-group col-md-5">
      <label for="inputState">Select Section</label>
      <select name="sectionId" id="sectionId" onChange="getTest(this.value)" class="form-control">
        <option value="">Select Section</option>
          <?php
  $que=mysqli_query($con,"select * from section_tbl ORDER BY section_name ASC");
while($row=mysqli_fetch_array($que))
{
echo"<option  name='sectionId' value='".$row['section_id']."'>".$row['section_name']."</option>";
}


?>


      </select>
    </div>
    <div class="form-group col-md-5">
      <label>Select Station</label>
      
      <select name="Test_Name" class="form-control" id="stationId" onchange="getData(this.value)">
        <option >Select Station</option>
        <?php
              $que2=mysqli_query($con,"select * from Station_tbl ORDER BY station_name ASC");
            while($row2=mysqli_fetch_array($que2))
            {
              echo "<option value='".$row2['station_id']."__".$row2['station_name']."'>",$row2['station_name'],"</option>";
            }


        ?>
      </select>

    </div>

    <div class="form-group d-flex align-items-end justify-content-center col-md-2">
    

      <button type="button" class="btn btn btn-danger" onclick="resetEmpForm()">Reset</button>
    </div>
  </div>
 

   </form>
     


<div class="table-responsive">
<table class="table display table-striped" border="0" align="center" bgcolor="#E9E9E9" id="myTable">
<thead class="thead-dark">

<tr>
<!-- <th>S.No.</th> -->
<th>Employee Id</th>

<th>Name</th>
<th>Designation</th>
<th>Station</th>

<th> PME</th>
<th>Refresher</th>
<th>Competency</th>
<th>Add PME/Competency</th>
<th>Form</th>
<th>Action</th>


</tr>
</thead>
<!-- <tbody id="tableEmpData"> -->
  <tbody>

  </tbody>



</table>
</div>




</span><!-----data from AJAX---->

    </div><!--col close-->
    
 </div>      
   </div><!--row close-->
   

</div><!--container close-->




<?php require('footer.php');?>

