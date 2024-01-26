
<?php

include('include/db_config.php');
$Subid =($_GET['Subjec_Name']) ;
    
$q ="SELECT id FROM states WHERE name ='$Subid'";
$re=mysqli_query($con,$q);
$re1=mysqli_fetch_array($re);
$re2=$re1['id'];
   $query="SELECT name FROM districts WHERE state_id='$re2'";
$result=mysqli_query($con,$query);

   ?>
       <select name="dist" id="dist" class="form-control">
           <?php
   
	
       while($row=mysqli_fetch_array($result))
		{ 

echo "<option>".$row['name']."</option>";
}
 ?>
</select>

