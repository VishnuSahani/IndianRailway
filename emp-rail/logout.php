 <?php   
 //logout.php  
 session_start();  
 unset($_SESSION['userretailer']);
 header("location:../index-emp.php");  
 ?>  