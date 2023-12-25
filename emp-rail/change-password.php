<?php require('header.php');?>

<script language="javascript">
function check()
{

   if(document.reg.newpass.value != document.reg.repass.value)
  {
    alert("New Password and Confirm Password does not match");
	
	document.reg.repass.focus();
	return false;
  }
  else{
  submitForm();
  }
   return true;
 }
  </script>
<script>
function _(id)
{ 
return document.getElementById(id);
 }
function submitForm(){
	_("mybtn").disabled = true;

	var formdata = new FormData();
	formdata.append( "oldpass", _("oldpass").value );
	formdata.append( "newpass", _("newpass").value );
    formdata.append( "repass", _("repass").value );
	var ajax = new XMLHttpRequest();
	ajax.open( "POST", "change-password-db.php" );
	ajax.onreadystatechange = function() {
		if(ajax.readyState == 4 && ajax.status == 200) {
			if(ajax.responseText == "success"){
				_("statuss").innerHTML = ajax.responseText;

			} else {
				_("statuss").innerHTML = ajax.responseText;
					_("mybtn").disabled = false;
					_("my_form").reset();
			  


			}

		}
	}
	ajax.send( formdata );
}
</script>


<div class="container " style="margin-top:50px;">
<div class="col-sm-12">
<div class="card  alert alert-danger">
<div class="card-header alert alert-primary">
<center><h6>Change Password</h6></center>
</div>
<div class="card-body">
<form name="reg"  id="my_form"  method="post" onSubmit="check(); return false;" > 
 <div class="form-group row">
    <label for="name" class="col-sm-3 col-form-label">Retailer Id</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" name="sname" id="name" value="<?php echo $_SESSION['userretaileremp']; ?>" placeholder="Student Id" readonly required>
    </div>
  </div>
  
  <div class="form-group row">
    <label for="name" class="col-sm-3 col-form-label">Old Password</label>
    <div class="col-sm-9">
      <input type="password" class="form-control" name="oldpass" id="oldpass" placeholder="Old Password" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="name" class="col-sm-3 col-form-label">New Password</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" name="newpass" id="newpass" placeholder="New Password" required >
    </div>
  </div>
  
  <div class="form-group row">
    <label for="name" class="col-sm-3 col-form-label">Re-enter New Password</label>
    <div class="col-sm-9">
      <input type="password" class="form-control" name="repass" id="repass" placeholder="Re-enter New Password" required>
    </div>
  </div>
  

 

   <center>
      <button type="submit" name="submit" id="mybtn" class="btn btn-outline-primary">Change Now</button>
      </center>
    <span id="statuss" style="color:#009900;"></span>

</form>
</div><!--second card body-->
</div><!--second card-->
</div><!--first row second card col-sm-6-->
</div><!--first row-->
</div>
<?php require('footer.php'); ?>