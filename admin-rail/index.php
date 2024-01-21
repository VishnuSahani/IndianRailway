<?php require('./header.php');
?>
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

<script>
function respo()
{
    $('#ResponseModal').modal({
      backdrop: 'static'
    });
  }

</script>



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

    let idd = Sub_Id.split("__")
  
    var strURL="Question2.php?Subjec_Name="+idd[0];
    
    var xhr = new XMLHttpRequest();
xhr.open("GET", strURL, true);
xhr.onreadystatechange = function() {

  if (parseInt( xhr.readyState )== 4 && parseInt( xhr.status )== 200) {
  
    document.getElementById('stationName').innerHTML=xhr.responseText;  
  }
}
xhr.send();
    
      
  }
  
</script>


<!---------------------------------------------->
<script type="text/javascript">

function check()
{
submitForm12();
return true;
}



function _(id)
{ 
return document.getElementById(id);
 }



function submitForm12(){
  _("add").disabled = true;
  var formdata = new FormData();

  let tmpSection = (_("sectionName").value).split("__");
    let tmpStation = (_("stationName").value).split("__");



  formdata.append( "sectionName", tmpSection[1]);
  formdata.append( "sectionId",tmpSection[0]);

  formdata.append( "stationName", tmpStation[1]);
  formdata.append( "stationId",tmpStation[0]);

  formdata.append( "empid", _("empid").value );
  formdata.append( "empname", _("empname").value );
  formdata.append( "empdesg", _("empdesg").value );
  formdata.append( "phone", _("phone").value );
 formdata.append( "appdate", _("appdate").value );
  formdata.append( "retdate", _("retdate").value );

    $("#loader_show").removeClass('d-none');
  var ajax = new XMLHttpRequest();

  ajax.open( "POST", "save_emp_data.php",true );
  ajax.onreadystatechange = function() {
    if(ajax.readyState == 4 && ajax.status == 200) {

         $("#loader_show").addClass('d-none')
            $('#ResponseModal').modal('show');
      if(ajax.responseText == "success"){

      
        _("emp_form").reset();
    
 
     $('#status').html("Employee Information Saved Successfully !");

        // _("status").innerHTML = ajax.responseText;

      } else {
        _("status").innerHTML = ajax.responseText;
          _("add").disabled = false;
       
        


      }

    }
  }
  ajax.send( formdata );
}




</script>






<div class="container " style="margin-top:50px;">
<!--  -->
<div class="row">



 <div class="col-lg-10 col-md-10 card jumbotron m-auto" style="color:#000000;">
  <p class="h3 card-header alert alert-primary text-center">Add Employee Data <br>
    <small><span style="color:#FF0000; padding-left:10px;">* means mandatory field</span></small></p>
  <form name="reg" id="emp_form" onsubmit="  check(); return false;" >
  <div class="form-row">

    <div class="form-group col-md-6">
      <label for="inputState">Select Section<span style="color:#FF0000; padding-left:10px;">*</span></label>
      <select id="sectionName" name="Subject_Name" onChange="getTest(this.value)" class="form-control">
        <option value="">Select Section...</option>
          <?php
  $que=mysqli_query($con,"select * from section_tbl ORDER BY Section_Name ASC");
while($row=mysqli_fetch_array($que))
{
  $optionId = $row['section_id']."__".$row['section_name'];
echo"<option value=".$optionId.">",$row['section_name'],"</option>";}?>
      </select>
    </div>
    <div class="form-group col-md-6">
      <label>Select Station<span style="color:#FF0000; padding-left:10px;">*</span></label>
      
      <select class="form-control" id="stationName">
        <option value="">Select Section First....</option>
        
      </select>

    </div>
  </div>
  <div class="form-group row">
    <label  class="col-sm-2 col-form-label">Employee ID<span style="color:#FF0000; padding-left:10px;">*</span></label>
    <div class="col-sm-10">
      <input id="empid" type="text" class="form-control" onkeyup="this.value = this.value.toUpperCase()" placeholder="Enter Employee Id"  />
      
    </div>
  </div>

 



 
  <div class="form-group row">
    
     <label  class="col-sm-2 col-form-label">Name<span style="color:#FF0000; padding-left:10px;">*</span></label>
      <div class="col-sm-10">
      <input class="form-control" id="empname" type="text" onkeyup="this.value = this.value.toUpperCase()" placeholder="Enter Employee Name" />
    </div>
        
    
  </div>
  
   <div class="form-group row">
    
     <label  class="col-sm-2 col-form-label">Designation<span style="color:#FF0000; padding-left:10px;">*</span></label>
      <div class="col-sm-10">
      


     <select name="empdesg" id="empdesg" class="form-control"    required="required">
      <option value="">Select Employee Designation</option>
        <option value="MCM">MCM</option>
        <option value="ESM-I">ESM-I</option>
        <option value="ESM-II">ESM-II</option>
        <option value="ESM-II">ESM-II</option>
            
        <option value="MCM/ESM">MCM/ESM</option>
        <option value="MCM/MSM">MCM/MSM</option>
        <option value="SM-I">SM-I</option>
        <option value="SM-II">SM-II</option>
        <option value="SM-III">SM-III</option>
        <option value="MCM B/S">MCM B/S</option>
        <option value="MCM (DES.)">MCM (DES.)</option>
      </select>
    </div>
        
    
  </div>

   <div class="form-group row">
    
     <label  class="col-sm-2 col-form-label">Mobile No<span style="color:#FF0000; padding-left:10px;">*</span></label>
      <div class="col-sm-10">
      <input class="form-control" id="phone" type="text" onkeyup="this.value = this.value.toUpperCase()"   placeholder="Enter Employee Mobile No" />
    </div>
        
    
  </div>
 
   <div class="form-group row">
    
     <label  class="col-sm-2 col-form-label">Appointment Date<span style="color:#FF0000; padding-left:10px;">*</span></label>
      <div class="col-sm-10">
      <input class="form-control" id="appdate" type="date"  placeholder="Enter Date Of Appointment" />
    </div>
        
    
  </div>
   
   <div class="form-group row">
    
     <label  class="col-sm-2 col-form-label">Retirement Date<span style="color:#FF0000; padding-left:10px;">*</span></label>
      <div class="col-sm-10">
      <input class="form-control" id="retdate" type="date"  placeholder="Enter Date Of Retirement" />
    </div>
        
    
  </div>
   
 <center>
  <button id="add" type="submit" class="btn btn-success">Save Record</button> 
   
  </center>

         
    <!-- <span id="status" class="text-danger" ></span> -->
     </div><!---col--->
     
     </form>


</div><!-- row -->

</div>
 <!-- Modal -->
<div class="modal fade" data-keyboard="false" data-backdrop="static"  id="ResponseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-danger" id="exampleModalLabel">Employee Information Status</h5>
       
      </div>
      <div class="modal-body">
                <span id="status" class="text-danger"></span>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!--  -->
<!-- container -->
 <!----------------------------------->



<?php require('footer.php');?>
