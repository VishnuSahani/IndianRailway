<?php //to connect with mysqli
$con=mysqli_connect("localhost","root","") or die(mysqli_error());
//to select the database
$db=mysqli_select_db($con,"indian_rail_project3")or die(mysqli_error());


?>