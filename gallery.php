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


</style>

<div class=" container-fluid row3" style="padding:20px;">
  
   
      <!---------->
      <div class="row">
    <div class="col-lg-12">
    <div class="card">
          <div class="card-heading" style="background-color:#af0202;color:#FFFFFF;">
          <center> <i class="fa fa-image" style="font-size:36px; color:#ffffff;"></i><font style="font-size:30px;"><strong>&nbsp; GALLERY </strong></font></center>
           </div>
              <div class="card-body ">
                <nav class="nav nav-pills nav-justified">
  <a class="nav-item nav-link  btn  "  href="gallery.php">All</a>
          <a class="nav-item nav-link"  href="ncc-gallery.php">Ncc</a>

  <a class="nav-item nav-link"  href="Cultural-Programme.php">Cultural Programmes</a>
  <a class="nav-item nav-link" href="Sports-Games.php">Sports & Games</a>
  <a class="nav-item nav-link" href="News-Events.php">News & Events</a>
    <a class="nav-item nav-link"  href="media-gallery.php">College in Media</a>

</nav>
              <hr>
        <div class="row">
   <?php 
 include('include/db_config.php');
$que="select * from gallery"; 
$run=mysqli_query($con,$que);
   if(mysqli_num_rows($run) >= 1)
     {
	   $recordset = mysqli_query($con,"select * from gallery");
				
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
	
	<div class="col-lg-3">
<div class="polaroid" id="pic-show">';?>
					<a href="<?php echo $url;?>" target="_blank"><img class="img-fluid"  src="<?php echo $url; ?>"  alt="Post" /></a>
							
						<div class="container">
  <p style="text-transform: uppercase;"><strong><?php echo $z;  ?></strong></p>
  </div>
	</div>					
			</div>		
                <?php } 
					}
					
	// require('right_nav.php');?>
          
    </div>
    </div>
   </div>
   
  
      <!----->
      
      </div>
          	
   </div>
   </div>


<?php require('footer.php');?>