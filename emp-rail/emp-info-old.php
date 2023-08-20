<?php require('header.php');?>
<?php require('include/db_config.php');

 //Include database configuration file
    $id="";

    if(isset($_SESSION['userretailer']))
{
  $id=$_SESSION['userretailer'];  
   
}
    //echo $id;
    $query = mysqli_query($con,"SELECT * FROM ibn_signup_retailer  WHERE binary ibn_id = '$id'");

  $row = mysqli_fetch_array($query);
  $idd = $row['id'];

?>

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

<script type="text/javascript">


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

                createTablerow(respo['data']);

        
      // if(respo['status']){


      // } else {
     
      // }

    }
};

}
</script>



 <div class="container" style="margin-top:30px;">

   
   
   <!----------------------------------------------------->
   
   
   <p class="card-header alert alert-primary text-center h3" >View  Employee </p>
   <form action="" method="">

   <div class="form-row">
 
    <div class="form-group col-md-6">
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
    <div class="form-group col-md-6">
      <label>Select Station</label>
      
      <select name="Test_Name" class="form-control" id="stationId" onchange="getData(this.value)">
        <option >Select Section First</option>
        
      </select>

    </div>
  </div>
 

   </form>
     


<div class="table-responsive">
<table class="table  table-striped" border="0" align="center" bgcolor="#E9E9E9" id="dataTable">
<thead class="thead-dark">

<tr>
<th>S.No.</th>
<th>Employee Id</th>

<th>Employee Name</th>
<th>Employee Designation</th>

<th> PME</th>
<th>Refresher</th>
<th>Add PME/Refresher</th>


</tr>
</thead>
<tbody id="tableEmpData">

  </tbody>



</table>
</div>




</span><!-----data from AJAX---->

    </div><!--col close-->
    
 </div>      
   </div><!--row close-->
   

</div><!--container close-->


<?php require('footer.php');?>

