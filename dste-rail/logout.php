 <?php   
 //logout.php  
 session_start();  
 session_destroy();
 // session_destroy($_SESSION['userretailer']);
 header("location:../index.php");  
 ?>  