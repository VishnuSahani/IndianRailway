
 

<?php require('head_section.php');?>
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

<script type="text/javascript">
	$('#mybtn').click(function() {


 var username=$("#username").val();
 var password=$("#password").val();
 if(username!="" && password!="")
 {
  //$("#loading_spinner").css({"display":"block"});
  $.ajax
  ({
  type:'post',
  url:'distributor-login-query.php',
  data:{
   //do_login:"do_login",
   username:username,
   password:password
  },
  success:function(response) {
  if(response.status==1)
  {
    window.location.href="ibn-retailer/index.php";
  }
  else if(response.status==0) 
  {
    
    $('#status').html(response.message)
  }
  }
  });
 }

 else
 {
  alert("Please Fill Both Login ID and Padsword !!!!");
 }

 return false

});
</script>



<div class="container-fluid" style="margin-top: 10px;">
	<div class="row">
		<div class="col-xl-8">
			<!-- container fluid slider -->
              <?php require('slider-flex.php');?>
	
         </div>
				<div class="col-xl-4">
						<div class="card" style="margin-top: 25px;">
						<div class="card-header">
						 <p class="text-center text-success h3">IBN-Distributor Login</p> 	

						</div>
						<!-- card header -->
						<div class="card-body">
 <form id="my_form" action="distributor-login-query.php" method="post">  
   
      <div class="input-group ">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="fa fa-user"></i></div>
        </div>
        <input type="text" class="form-control" id="username" name="username" placeholder="Enter Login ID" required>
      </div>        <!-- input-group -->

<!--  -->
<div class="input-group " style="margin-top: 10px">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="fa fa-key"></i></div>
        </div>
        <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required>
      </div>        <!-- input-group -->
  
					 <div class="form-row" style="margin-top: 10px;">
					 	<div class="form-group col-lg-3">
					 	<label>Captcha:	</label>

						</div>
						<div class="form-group col-lg-3">
<label> <img src="captcha.php" class="img-fluid" /></label>
						</div>

						<div class="form-group col-lg-6">

							<input type="text" class="form-control" id="captcha" placeholder="Enter captcha" name="captcha" required="">
						</div>
						
					 </div>	
					 
        <span id="status" class="text-danger" style="font-size:15px; font-weight:bold; "><?php echo @$_GET['message']; ?></span>

    <center><button type="submit" name="login" id="mybtn" onclick="return test();" class="btn btn-success btn-block" style="margin-top: 20px;">Login</button></center>
    <p class="text-center" style="margin-top:10px;"><a href="retailer-forget-password.php">Forget Password ?</a> </p>
<img src="images/or.png" class="img-fluid" alt="">

       	    <p class="text-center" style="margin-top:5px;"><a href="retailer-forget-password.php">Forget Login ID ?</a> </p>

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

<!---MENUS----------->
<!------------------------------------------>
<div class="container" style="background-color:#FFFFFF; margin-top:50px" >
<div class="row">
<div class="col-lg-12 col-md-12  col-sm-12 col-xs-12 col-12 m-auto">
<div class="card">
  <h5 class="card-header" style="color:#af0202;"><strong><center>WELCOME TO IBN DIGITAL SERVICES</center></strong></h5>
  <div class="card-body">
<p align="justify">We aim to offer our customers a variety of the latest Banking & digital Services. We’ve come a long way, so we know exactly which direction to take when supplying services to you with high quality. We offer all of this while providing excellent customer service and friendly support. <br>
We are IBN Digital Services, a small but motivated company specializing in Banking & Digital Services. We believe passionately in great bargains and excellent service, which is why we commit ourselves to giving you the best. <br>
We always keep an eye on the latest trends in Banking & digital Services and put our customers’ wishes first. That is why we have satisfied customers, and are thrilled to be a part of the Banking & digital Services industry. <br>
Our customers are our top priority and through our services we work hard towards building long-lasting and meaningful relations with them. <br>
The interests of our customers are always top priority for us, so we hope you will enjoy our services as much as we enjoy making them available to you. <br>
If you’re looking for something new, you’re in the right place. We strive to be industrious and innovative, offering our customers something they want, putting their desires at the top of our priority list.

<br>
<center> <a href="about-us.php" class="btn">Read More</a> </center></p>
  </div>
</div>
</div>
<div class="col-lg-4 col-md-12  col-sm-12 col-xs-12 col-12" >

</div>





</div>
</div>
<!-- welcome container close -->


<!---MENUS----------->








<!-------------------------------------->
<div class="container-fluid" style="background-color:#FFFFFF; margin-top:50px;" >
<h1><center><strong>OUR GALLERY</strong></center></h1>
<div class="row" >

<div class="col-lg-6">
 <?php 

		   include('include/db_config.php');
$que="select * from gallery"; 
$run=mysqli_query($con,$que);
   if(mysqli_num_rows($run) >= 1)
     {
	   $recordset = mysqli_query($con,"select * from gallery where category='our achievements'  order by id desc limit 1 ");
				
                 while($record = mysqli_fetch_array($recordset))
			   {
if(!empty($record["category"]))
	       {
	         $y= $record["category"];
	       }
	       if(!empty($record["des"]))
	       {
	         $z= $record["des"];
	       }
		   if(!empty($record["image"]))
	       {
		   
	        $url= "gallery/".$y."/".$record["image"];
	       }
	
	echo' 
	
	
<div class="polaroid" id="pic-show">';?>
					<a href="Cultural-Programme.php"><img class="img-fluid"  src="<?php echo $url; ?>"  alt="Post" /></a>
							
						<div class="container">
  <p><strong><?php echo $z;  ?></strong></p>
  <a href="our-achievements.php" class="btn">View more</a>
  </div>
				
			</div>		
                <?php } 
					}
					
	// require('right_nav.php');?>
</div>

<!---------------------2nd cat--------------------->

<div class="col-lg-6">
 <?php 

		   include('include/db_config.php');
$que="select * from gallery"; 
$run=mysqli_query($con,$que);
   if(mysqli_num_rows($run) >= 1)
     {
	   $recordset = mysqli_query($con,"select * from gallery   where category='NEWS & EVENTS'  order by id desc limit 1 ");
				
                 while($record = mysqli_fetch_array($recordset))
			   {
if(!empty($record["category"]))
	       {
	         $y= $record["category"];
	       }
	       if(!empty($record["des"]))
	       {
	         $z= $record["des"];
	       }
		   if(!empty($record["image"]))
	       {
		   
	        $url= "gallery/".$y."/".$record["image"];
	       }
	
	echo' 
	
	
<div class="polaroid" id="pic-show">';?>
					<a href="News-Events.php"><img class="img-fluid"  src="<?php echo $url; ?>"  alt="Post" /></a>
							
						<div class="container">
  <p><strong><?php echo $z;  ?></strong></p>
     <a href="News-Events.php" class="btn">View more</a>

  </div>
				
			</div>		
                <?php } 
					}
					
	// require('right_nav.php');?>
</div>

<!---------------------------->

					
	
</div>

</div>

</div>


<!--  -->

<?php require('footer.php');?>