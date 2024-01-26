 <?php   
 //logout.php  
 session_start();  
 unset($_SESSION['userretaileraste']);
 header("location:../index-aste.php");  
 ?>  