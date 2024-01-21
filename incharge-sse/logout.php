 <?php   
 //logout.php  
 session_start();  
 unset($_SESSION['userretailersse']);
 header("location:../index-sse-incharge.php");  
 ?>  