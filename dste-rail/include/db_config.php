<?php //to connect with mysqli

$con=mysqli_connect("localhost","root","") or die(mysqli_error($con));
//to select the database
// $db=mysqli_select_db($con,"indian_rail_project")or die(mysqli_error());
// $db=mysqli_select_db($con,"indian_rail_project3")or die(mysqli_error());
// $db=mysqli_select_db($con,"indian_rail_project4")or die(mysqli_error());
// $db=mysqli_select_db($con,"indian_rail_project5")or die(mysqli_error());
$db=mysqli_select_db($con,"indian_rail_project7")or die(mysqli_error($con));

mysqli_set_charset($con,"utf8"); // for hindi
?>
