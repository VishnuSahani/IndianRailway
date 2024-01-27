
<?php
session_start();
if(!isset($_SESSION['usernamestd']))
{
  header('location:login.php?session_error');   
}		
  
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

   <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
        <script src="js/sb-admin-datatables.min.js"></script>
        <!-------------------datepicker js-------->

  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 <!-- <link rel="stylesheet" href="/resources/demos/style.css">-->

  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<!--------------------------------------------------------------------------->

<title>MP POLYTECHNIC - GORAKHPUR - STUDENT PORTAL</title>
 <style>

.card:hover {
  box-shadow: 0 20px 20px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.23);
  
}
.card{
background:#feeeb7a8;
}

</style>

</style>

    <script type="text/javascript">
    $(window).on('load',function(){
        $('#myModal').modal('show');
    });
</script>
</head>

<body>

<nav class="navbar  navbar-expand-sm  navbar-dark bg-primary sticky-top">
<a href="index.php" class="navbar-brand" >MP POLYTECHNIC</a>

<button type="button"  class="navbar-toggler" data-toggle="collapse" data-target="#menubar"><span class="navbar-toggler-icon"></span></button>



<div id="menubar" class="collapse navbar-collapse">
<ul class="navbar-nav">
<li class="nav-item"><a href="index.php" class="nav-link active">Dashboard</a></li>

<li class="nav-item dropdown active"><a href="#" class="nav-link dropdown-toggle " data-toggle="dropdown">View/Update Details</a>
<div class="dropdown-menu">
     <a class="dropdown-item"  href="personal-detail.php" >View/Update Personal Details</a>
  <a class="dropdown-item"  href="educational-detail.php" >View/Update Educational Details</a>
    <a class="dropdown-item"  href="training-detail.php" >View/Update Training Details</a>

</div>
</li>
<li class="nav-item dropdown active"><a href="#" class="nav-link dropdown-toggle " data-toggle="dropdown"> Library Book Details</a>
<div class="dropdown-menu">
     <a class="dropdown-item"  href="library-search-books.php" > Search Library Book Details</a>
  <a class="dropdown-item"  href="library-books-transactions.php" >View  Library Book Transactions</a>
</div>
</li>
<!--<li class="nav-item"><a href="generate-icard.php" class="nav-link  active">Generate ID Card</a></li>
--><li class="nav-item"><a href="change-password.php" class="nav-link  active">Change Password</a></li>


</ul>

<ul  class="navbar-nav ml-auto " >

<li class="nav-item">
<a class="nav-link  active" href="logout.php">Logout</a>
</li>

</ul>
</div>
</nav>


<div>
    
    <?php
 include('include/db_config.php');


  ?>

    
    </div>


