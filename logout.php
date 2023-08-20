 <?php   
 //logout.php  
 session_start();  
 unset($_SESSION['usernamestd']);
 header("location:login.php");  
 ?>  