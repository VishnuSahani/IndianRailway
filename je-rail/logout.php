 <?php   
 //logout.php  
 session_start();  
 unset($_SESSION['userretailerje']);
 header("location:../index-je.php");  
 ?>  