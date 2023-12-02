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


  function sub_type_fun(data)
  {   
    var Sub_Id = data;
    $.ajax({
      type : 'post',
      url : 'get_Teacher_name.php',
      dataType:'JSON',
      data:{
        t_id: Sub_Id,
      },
      success: function(data){
      
        $('#empname').val(data.empname);

        $('#empdesg').val(data.empdesg);
        $('#phone').val(data.phone);
        $('#appdate').val(data.date_of_app);
        $('#retdate').val(data.date_of_ret);
   

        // $('#assign_btn').attr('disabled', false)

      },

    });

  }




//////////////////////

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

  ajax.open( "POST", "save_je_data.php",true );
  ajax.onreadystatechange = function() {
    if(ajax.readyState == 4 && ajax.status == 200) {

         $("#loader_show").addClass('d-none')
            $('#ResponseModal').modal('show');
                      _("add").disabled = false;

      if(ajax.responseText == "success"){

      
        _("emp_form").reset();
    
 
     $('#status').html("Station Assigned Successfully !");

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
  <p class="h3 card-header alert alert-primary text-center">Assign Station To JE <br>
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
 
 <div class="form-row"> 
                 <div class="col-lg-6">
                     <label>Select Employee ID</label>  
                          <select id="empid" name="empid" class="form-control border-danger" onchange="sub_type_fun(this.value)">
                         
                              <option value="">Employee ID</option>
                              <?php 
                              $teacher_que=mysqli_query($con,"select empid,empname from je_info_rail where empname!='' order by empname");
                              while($tea_run=mysqli_fetch_array($teacher_que))
                              {
echo"<option value='".$tea_run['empid']."'>(".$tea_run['empname'].")".$tea_run['empid']."</option>";

                              }
                               ?>
                              
                          
                           </select>
                 </div><!--------col 6-------->

                 <div class="col-lg-6">
                 <!---<span id="T"> </span>here fetch data from get_Teacher_name.php---->
                  <label> Employee Name</label>

<input type="text" id="empname" class="form-control" disabled>

                 </div><!--------col 6--------> 



                 <div class="col-lg-6">
                 <!---<span id="T"> </span>here fetch data from get_Teacher_name.php---->
                  <label> Employee Designation</label>

<input type="text" id="empdesg" class="form-control">

                 </div><!--------col 6-------->    

                  <div class="col-lg-6">
                 <!---<span id="T"> </span>here fetch data from get_Teacher_name.php---->
                  <label> Mobile No</label>

<input type="text" id="phone" class="form-control" >

                 </div><!--------col 6-------->  

<div class="col-lg-6">
                 <!---<span id="T"> </span>here fetch data from get_Teacher_name.php---->
                  <label> Date of Appointment</label>

<input type="text" id="appdate" class="form-control">

                 </div><!--------col 6-------->    

                  <div class="col-lg-6">
                 <!---<span id="T"> </span>here fetch data from get_Teacher_name.php---->
                  <label> Date of Retirement</label>

<input type="text" id="retdate" class="form-control" >

                 </div><!--------col 6-------->  


             </div> <!---------form row 1------>


   
 <center>
  <button id="add" type="submit" class="btn btn-success">Assign Station</button> 
   
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
        <h5 class="modal-title text-danger" id="exampleModalLabel">Employe Information Status</h5>
       
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
