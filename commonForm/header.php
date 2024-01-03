<?php
session_start();

if(!isset($_SESSION['empid_for_form']) || !isset($_SESSION['from']) || empty($_SESSION['empid_for_form']) || empty($_SESSION['from']))
{
  header('location:index.php');  
  die();

 }	

 $empid_for_form = $_SESSION['empid_for_form'];
 $from = $_SESSION['from'];
 $redirectPage = $_SESSION['redirectPage'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Indian Railways</title>
<link rel="shortcut icon" href="../images/favicon.ico">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap core CSS-->
  <link href="../vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

   <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="../vendor/chart.js/Chart.min.js"></script>
    <script src="../vendor/datatables/jquery.dataTables.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.js"></script>
        <script src="../js/sb-admin-datatables.min.js"></script>
        <!-------------------datepicker js-------->

  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 <!-- <link rel="stylesheet" href="/resources/demos/style.css">-->

  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<!--------------------------------------------------------------------------->

<title>INDIAN RAILWAYS --ADMIN PORTAL</title>
 <style>

.card:hover {
  box-shadow: 0 20px 20px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.23);
  
}
.card{
background:#feeeb7a8;
}


/*product list show*/

  .category-a{
    height: 400px;
  }
  
  .img-zoom:hover {
  transform: scale(1.1); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
}
  .img-zoom2{
 
  opacity: 0.5;
}

.cursor-pointer{
  cursor: pointer;
}

</style>
</head>

<body>

<nav class="navbar  navbar-expand-sm  navbar-dark sticky-top" style="background-color: #2f539f;">
  <a class="navbar-brand" href="<?php echo $_SESSION['redirectPage'];?>" style="color:#FFFFFF;"><i class="fa fa-home"></i> </a>
<!-- <a href="index.php" class="navbar-brand" >IBN DIGITAL</a> -->

<button type="button"  class="navbar-toggler" data-toggle="collapse" data-target="#menubar"><span class="navbar-toggler-icon"></span></button>



<div id="menubar" class="collapse navbar-collapse">
<ul class="navbar-nav">

<li class="nav-item"><a href="<?php echo $_SESSION['redirectPage'];?>" class="nav-link  active"><?php echo $from;?> Dashboard</a></li> 
<li class="nav-item"><a href="view-form.php" class="nav-link  active">View Form</a></li> 

</ul>

</div>
</nav>

<style>
  .loader{
    height:100%;
    width:100%;
    position:fixed;
    top:0;
    left:0;
    background:#838b83ad;
    z-index:10000;
}

.loader-spinner{
    margin: 20% auto;
    display:block;
    /* background:red; */
    /* height:100vh; */
}
</style>
<div id="loader_show" class="loader d-none">
    
    <div style="display: flex;
    justify-content: center;
    align-items: center;
    height: 100%;">
         <i class="fa fa-spinner fa-spin" style="font-size:96px;color:red"></i>
    </div>
    
   
</div>