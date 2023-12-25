<?php require('header.php');?>
<script language="javascript" >
	function submitForm(){
	
	form1.action = "#";
			form1.submit();
	
	}


$(document).ready(function(){
        $("#fetchval").on('change',function()
                         {
            var branch = $(this).val();
   
		
            $.ajax(
            {
               url:'search-station-assigned.php',
                type:'POST',
                data:{
				branch:branch
				},

                beforeSend:function()
                {
                    $("#dataTable ").html('Working...');
                    
                },
                success:function(data)
                {
                    $("#dataTable ").html(data);
                },
            });
        });
    });
</script>
<script>
function _(id)
{ 
return document.getElementById(id);
 }

 
 /*UPDATE AJAX*/
function submitForm1(){
	_("mybtn").disabled = true;
	_("status").innerHTML = 'please wait ...';
	var formdata = new FormData();
 formdata.append( "subid", _("subid").value );
	formdata.append( "subcode", _("subcode").value );
	formdata.append( "subname", _("subname").value );
	formdata.append( "dept", _("dept").value );
	formdata.append( "semester", _("semester").value );
	formdata.append( "maxmarks", _("maxmarks").value );
	formdata.append( "subtype", _("subtype").value );
  formdata.append( "max_class", _("max_class").value );
	var ajax = new XMLHttpRequest();
	ajax.open( "POST", "update-subject-db.php" );
	ajax.onreadystatechange = function() {
		if(ajax.readyState == 4 && ajax.status == 200) {
			if(ajax.responseText == "success"){
				_("my_form").innerHTML = '<h2>Thanks '+_("n").value+', your message has been sent.</h2>';
			} else {
				_("status").innerHTML = ajax.responseText;
				_("mybtn").disabled = false;
        
				/*$('#view').modal('hide');*/
			}
		}
	}
	ajax.send( formdata );
}/*********************/


</script>

    <div class="content-wrapper">
    <div class="container-fluid" >
      <!-- Breadcrumbs-->
      <!--  <div class="alert alert-success">
 <strong>  Admin Panel</strong> &mdash; <a href="assign-subject.php">Assigned Subject</a>
</div> -->

      <!-- Example DataTables Card-->
      <div class="card mb-3" >
        <div class="card-heading" style="background-color:#af0202;color:#FFFFFF;">
       <center> <i class="fa fa-graduation-cap" style="font-size:26px; color:#ffffff;"></i><font style="font-size:24px;">  <strong> View Assigned Station</strong></font></center>
           </div>
        <div class="card-body">
        <div class="row">
        
          <div class="table-responsive">
            <table class="table table-bordered"  id="dataTable" width="100%" cellspacing="0">
              <thead>
           <span  style="float:right; color:#FF0000;">&nbsp;<button type="button"
 class="btn btn-sm btn-danger" name="bt" id="btn" onClick="submitForm();">Download in Excel Format</button>
</form></span> 
                <tr>
                 <th>S.No.</th>
             <th>Emp ID</th>
           <th>JE/SSE Name</th>
             <th>Section Name</th>
             <th>Station Name</th>
           <th>Designtaion</th>             
           <th>Phone</th> 
                           
          
           
                </tr>
              </thead>
           
              <tbody > 
           
               <?php  
 
   include('include/db_config.php');
   $n=1;
   $recordset = mysqli_query($con,"select * from assign_info_rail where empid = '$empid'");
									while($record = mysqli_fetch_object($recordset))
									{
									echo"
                				
									<tr>
                                 <td>",$n,"</td>
								                <td>",$record->empid,"</td>
                                <td>",$record->empname,"</td>
                                <td>",$record->section_name,"</td>
                                <td>",$record->station_name,"</td>
                                <td>",$record->empdesg,"</td>
                                <td>",$record->phone,"</td>
                                
                                  								 
								 ";?>
                                
<?php
 $n++;

 } ?>
                                   
		
    
           
                  

               
              </tbody>
            </table> 
          </div>
        </div>
        
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    
       <!-- VIEW Modal-->
    <div class="modal fade" id="view" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">SUBJECT'S DETAILS</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
<form name="reg"  id="my_form"  method="post" onSubmit="submitForm1(); return false;" > 
<div class="row">
<div class="col-sm-6">
<div class="form-group">
<label for="subid">SUBJECT Id*</label>
<input type="text" name="subid" id="subid" class="form-control"  />
</div>
</div>
<div class="col-sm-6">
<div class="form-group">
<label for="subcode">Subject Code*</label>
<input type="text" name="subcode" id="subcode"  class="form-control" placeholder="Enter Subject Name"   />
</div>
</div>
</div>

<div class="row">

<div class="col-sm-6">
<div class="form-group">
<label for="subname">Subject Name*</label>
<Input type="text" name="subname" id="subname"  class="form-control" placeholder="Enter Subject Name"   />
</div>
</div>

<div class="col-sm-6">
<div class="form-group">
<label for="dept">Branch*</label>
<select name="dept" id="dept" class="form-control"required>
            <option value="">Select Your Department</option>
           <option value="Civil Engineering" >Civil Engineering</option>
           <option value="Mechanical Production">Mechanical Production</option>
           <option value="Mechanical CAD">Mechanical CAD</option>
           <option value="Electrical Engineering">Electrical Engineering</option>
           <option value="Computer Science and Engineering">Computer Science and Engineering</option>
           <option value="Electronics Engineering">Electronics Engineering</option>
           <option value="Architecture Assistantship">Architecture Assistantship</option>
           <option value="MSM">MSM</option>
          
</select>

</div>
</div>
</div>

<div class="row">
<div class="col-sm-6 ">
<div class="form-group">
<label for="semester">Semester</label>
  <select name="semester" id="semester" class="form-control" required   >
           
                         <option >Select Semester</option>
                            <option value="1">1</option>
                            <option value="2">2 </option>
                             <option value="3">3 </option>
                             <option value="4"> 4 </option>
                                 <option value="5">5 </option>
                               <option value="6">6 </option>
                           </select>
</select>
 </div>
</div>

<div class="col-sm-6">
<div class="form-group">
<label for="maxmarks" >Maximum Sessional Marks</label>
      
  <input type="maxmarks" name="maxmarks" id="maxmarks"  class="form-control" placeholder="Enter Maximum Sessional Marks"   />  
</div>
</div>
</div>


<div class="row"><div class="col-sm-6">
<div class="form-group">
<label for="subtype">Subject Type</label>
      
<select name="subtype" id="subtype" class="form-control" required   >
           
                         <option >Select Subject Type</option>
                            <option value="theory">Theory</option>
                            <option value="practical">Practical </option>   

</select>


</div>
</div>
<div class="col-sm-6">
<div class="form-group">
<label for="max_class">Max. Borad App. Classes*</label>
 <input type="max_class" name="max_class" id="max_class"  class="form-control" placeholder="Enter Maximum Borad Approved Classes"   />  
</div>
</div>

</div>




          </div><!----Modal Body-->
          
          
              <span id="status" style="color:red;"><strong><b></b></strong></span>
      
          <div class="modal-footer">
          <input type="submit" name="submit" id="mybtn" class="btn btn-success"  value="Update Details">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
               
    </form>
          </div><!---Moda;l footer---->
          
          
          
          
        </div>
      </div>
    </div>
  
  
           <!----------------------------------->
             <!-- VIEW Modal-->
 
  

<script>
 
 function showdetails3(button)    {
  var id = button.id;
$.ajax({
  url:"subject-detail.php",
  method:"GET",
  data:{"id":id},
  success: function(response){
 //console.log(response);
   

 var ob = JSON.parse(response);
 $("#subid").val(ob.id);
 $("#subcode").val(ob.subject_code);
 $("#subname").val(ob.subject_name);
 $("#dept").val(ob.branch);
  $("#semester").val(ob.semester);
   $("#maxmarks").val(ob.max_no);
    $("#subtype").val(ob.subject_type);
     $("#max_class").val(ob.max_class);
  }
  });

 }
</script>
 <!----------------------------------->
 


<?php require('footer.php');?>