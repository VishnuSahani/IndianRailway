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
           <th>ASTE Name</th>
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
   $recordset = mysqli_query($con,"select * from assign_aste_rail where empid = '$empid'");
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
    

 


<?php require('footer.php');?>