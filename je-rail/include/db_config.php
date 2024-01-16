<?php //to connect with mysqli
$con=mysqli_connect("localhost","root","") or die(mysqli_error($con));
//to select the database
$db=mysqli_select_db($con,"indian_rail_project6")or die(mysqli_error($con));

?>

