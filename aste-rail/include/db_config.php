<?php //to connect with mysqli
$con=mysqli_connect("localhost","ra34yshprjAvPTcs","Ag3@!ssRVbxm@98sJEclp") or die(mysqli_error($con));
//to select the database
$db=mysqli_select_db($con,"ind@rai#4cyyashzaARcHj@244")or die(mysqli_error($con));
mysqli_set_charset($con,"utf8"); // for hindi
?>

