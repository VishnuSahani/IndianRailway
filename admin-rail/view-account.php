<?php require('header.php');?>
<?php require('include/db_config.php');?>
<div class="container " style="margin-top:50px;">
<div class="row">
<div class="col-sm-12 ">
<div class="card alert alert-warning">
<div class="card-header alert alert-primary">
<center><h6> Account Details</h6></center>
</div>
<div class="card-body">
<!-- Example DataTables Card-->
      
        <div class="card-body">

          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
         							<th>Product Name</th>
			        				<th>Registered ID</th>
			        				<th>Registered Email</th>
			        				<th>Registered Phone</th>
			        			
                                   
                </tr>
              </thead>
           
              <tbody> 
        <?php 
                            $id="";

                                if(isset($_SESSION['userretailer']))
                            {
                              echo $id=$_SESSION['userretailer'];  
   
                            }		                          
                               $sql= "select * from user_id_details where retailer_id='$id'";
			        				$query = $con->query($sql);
			        				while($row = $query->fetch_assoc()){
			        					echo "
			        						<tr>
			        							<td>".$row['product_name']."</td>
			        							<td>".$row['reg_id']."</td>
			        							<td>".$row['reg_email']."</td>
			        							<td>".$row['reg_phone']."</td>
			        							
												
			        						</tr>
			        					";
			        				}
			        			?>
    
           
                  
               
               
              </tbody>
            </table>
         
        </div><!------------>
     </div>
</div>  
</div>
</div>
</div>

 <!----------------------------------->

 <?php require('footer.php');?>

