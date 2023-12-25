 <?php   
 //logout.php  
 session_start();  
 unset($_SESSION['userretaileremp']);
 header("location:../index-emp.php");  
 ?>  