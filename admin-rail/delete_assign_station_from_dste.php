<?php 
require('include/db_config.php');
$id=$_GET['id'];
$dele=mysqli_query($con,"delete from assign_dste_rail where id='$id'");
if ($dele>=1) 
{
	header('location:view-assigned-station-to-dste.php');
	exit;
}

 ?>