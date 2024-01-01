<?php 


require('head_section.php');?>
<style>
.btn{
padding:2px;
}

div.polaroid {
  width: 100%;
  background-color: white;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  margin-bottom: 25px;
  margin-top: 25px;
}

div.container {
  text-align: center;
  padding: 10px 20px;
}

	
	* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

/* Float four columns side by side */
.column {
  float: left;
  width: 25%;
  padding: 0 10px;
}

/* Remove extra left and right margins, due to padding in columns */
.row {margin: 0 -5px;}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Style the counter cards */
.card {
padding: 6px;
  text-align: center;
  border-radius: 40px;
box-shadow: 3px 3px 3px 2px rgba(0,0,0,0.25), -3px -3px 3px 3px rgba(0,0,0,0.22);
  cursor: pointer;
  transition: 0.4s;
}
#small-card .card:hover {
  transform: scale(0.9, 0.9);
  box-shadow: 3px 3px 3px 2px rgba(0,0,0,0.25), 
    -3px -3px 3px 3px rgba(0,0,0,0.22);
}
.card a{
text-decoration:none;
}
/* Responsive columns - one column layout (vertical) on small screens */
@media screen and (max-width: 600px) {
  .card {
   padding: 2px;
   margin-bottom:10px;
}
}

 .modal {
    z-index: 10000001 !important;
  }


</style>




<div class="container-fluid" style="margin-top: 10px;">
	<div class="row">
		<div class="col-xl-8">
			<!-- container fluid slider -->
              <?php require('slider-flex.php');?>
	
         </div>
				<div class="col-xl-4 " >
					<div class="card" style="margin-top: 25px; min-height:380px; ">
						<div class="card-header">
						 <p class="text-center text-success h3">JE/SSE Login</p> 	

						</div>
						<!-- card header -->
						<div class="card-body">
 <form id="my_form" action="login-je-query.php" method="post">  
   
      <div class="input-group ">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="fa fa-user"></i></div>
        </div>
        <input type="text" class="form-control" id="username" name="username" placeholder="Enter EMP ID" required>
      </div>        <!-- input-group -->

<!--  -->
<div class="input-group " style="margin-top: 10px">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="fa fa-key"></i></div>
        </div>
        <input type="password" class="form-control" id="password" name="password" placeholder="Enter Mobile No" required>
      </div>        <!-- input-group -->
  
					 <div class="form-row" style="margin-top: 10px;">
					 	<div class="form-group col-lg-3">
					 	<label>Captcha:	</label>

						</div>
						<div class="form-group col-lg-3">
<label> <img src="captcha.php" class="img-fluid" /></label>
						</div>

						<div class="form-group col-lg-6">

							<input type="text" class="form-control" id="captcha" placeholder="Enter captcha" name="captcha" >
						</div>
						
					 </div>	
					 
        <span id="status" class="text-danger" style="font-size:15px; font-weight:bold; "><?php echo @$_GET['message']; ?></span>

    <center><button type="submit" name="login" id="mybtn" onclick="return test();" class="btn btn-outline-success btn-lg" style="margin: 20px;">Login</button></center>
   <!--  <p class="text-center" style="margin-top:10px;"><a href="retailer-forget-password.php">Forget Password ?</a> </p>
<img src="images/or.png" class="img-fluid" alt="">

       	    <p class="text-center" style="margin-top:5px;"><a href="retailer-forget-password.php">Forget Login ID ?</a> </p> -->

       </form>
						</div>
						<!-- card body -->
					</div>
					<!-- card close -->
					
					
				</div>
				<!-- col 4 close -->

	</div>
	<!-- row -->
</div>

<!------------------------------------------>



<!---MENUS----------->











<!---------------------------->

					
	
</div>

</div>

</div>




<!--  -->

<?php require('footer.php');?>