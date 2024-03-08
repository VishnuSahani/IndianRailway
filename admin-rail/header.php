<?php
session_start();

if(!isset($_SESSION['userretailer']))
{
  header('location:../index.php?session_error');   
}	

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Indian Railways</title>
<link rel="shortcut icon" href="../images/favicon.ico">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
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

/* ============ desktop view ============ */
@media all and (min-width: 1000px) {
  .navbar .nav-item .dropdown-menu{ display: none; }
  .navbar .nav-item:hover .nav-link{ color: #2874f0;font-weight:bold;  }
  .navbar .nav-item:hover .dropdown-menu{ display: block; }
  .navbar .nav-item .dropdown-menu{ margin-top:0; }

    .dropdown:hover .dropdown-menu{ display: block; }
    .dropdown-toggl:hover .dropdown-menu{ display: block; }


}

</style>
</head>

<body>


  <div class="container-fluid">
  <div class="row" style="color:blue; text-align: center;padding-top:3px;">
     
    <div class="col-xl-6 col-lg-6 col-md-12">
     <i class="fa fa-envelope-o" style="color:red;font-size:15px;"></i> <span style="font-size:15px;">help@gmail.com</span>
        
     </div>
     <div class="col-xl-6 col-lg-6 col-md-12">
     Helpline &nbsp;&nbsp;<i class="fa fa-phone" style="color:red;font-size:15px;"></i> <span style="font-size:15px;">+91 1212121212</span>
     </div>
   </div>

   <!--  -->
 <div  class="row" >
    <div class="col-lg-6 col-6">
      <a href="index.php"><img src="../images/logo_colour.gif" class="img-fluid"></a>
    </div>

    <div class="col-lg-6 col-6">
      <?php
    //Include database configuration file
    include('include/db_config.php');
    $id="";
    if(isset($_SESSION['userretailer']))
{
  $id=$_SESSION['userretailer'];  
   
}
    //echo $id;
    $query = mysqli_query($con,"SELECT * FROM ibn_signup_retailer  WHERE binary ibn_id = '$id'");

  $row = mysqli_fetch_array($query);
  $name = $row['first_name'];
$_SESSION['portal_name'] = $name;
    ?>
<!-- <li class="nav-item"> -->
  <p style="margin-top: 20px;" class="float-right">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-user-circle-o" style="font-size:20px; color:green;"></i> <span style="font-size:15px; color:#af0202;font-weight:bold"><?php echo $id; ?></span> 
    <br>

    <strong style="font-size:15px; color:#af0202;"> <?php echo $name; ?></strong> </p>
<!-- </li> -->
      
    </div>
<!-- col 6 close -->

   <!--  -->
 </div>
</div>

<nav class="navbar  navbar-expand-sm  navbar-dark sticky-top" style="background-color: #2f539f;">
  <a class="navbar-brand" href="index.php" style="color:#FFFFFF;"><i class="fa fa-home"></i> </a>
<!-- <a href="index.php" class="navbar-brand" >IBN DIGITAL</a> -->

<button type="button"  class="navbar-toggler" data-toggle="collapse" data-target="#menubar"><span class="navbar-toggler-icon"></span></button>



<div id="menubar" class="collapse navbar-collapse">
<ul class="navbar-nav">

 <li class="nav-item"><a href="index.php" class="nav-link  active">Add ESM/MCM Data</a></li> 

<li class="nav-item"><a href="emp-info.php" class="nav-link  active">View ESM/MCM Data</a></li> 

<li class="nav-item dropdown">
              
  <a class="nav-link dropdown-toggle" href="#" style="color:#FFFFFF;" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        View Form
        </a>
  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          
          <a class="dropdown-item" href="view-assigned-station-to-je.php">View  JE Form</a>
          
          <a class="dropdown-item" href="view-assigned-station-to-sse.php">View SSE Incharge Form</a>

          <a class="dropdown-item" href="view-assigned-station-to-aste.php">View ASTE Form</a>
       </div>
     </li>
<li class="nav-item"><a href="add-station-component.php" class="nav-link  active">Add station Component</a></li> 
<li class="nav-item"><a href="view-station-component.php" class="nav-link  active">View station Component</a></li> 
<!--<li class="nav-item"><a href="view-emp-form.php" class="nav-link  active">View Form</a></li> -->

<li class="nav-item"><a href="form-duration.php" class="nav-link  active">Form Duration</a></li> 
<li class="nav-item"><a href="gen-report.php" class="nav-link  active">Report</a></li> 

</ul>

<ul  class="navbar-nav ml-auto " >

<li class="nav-item dropdown">
              
  <a class="nav-link dropdown-toggle" href="#" style="color:#FFFFFF;" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        PME
        </a>
  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="pme-due.php">PME Due Today</a>
          <a class="dropdown-item" href="pme-due-future.php">PME Due To Date</a>
          
       </div>
     </li>
  <li class="nav-item"><a href="refresher-due.php" class="nav-link  active">Refresher Due</a></li> 

<li class="nav-item dropdown">
              
  <a class="nav-link dropdown-toggle" href="#" style="color:#FFFFFF;" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Assign/View Station
        </a>
  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="assign.php">Assign Station To JE</a>
          <a class="dropdown-item" href="view-assigned-station-to-je.php">View Assigned Station To JE</a>
          <a class="dropdown-item" href="sse-incharge-assign.php">Assign Station To SSE Incharge</a>
          <a class="dropdown-item" href="view-assigned-station-to-sse.php">View Assigned Station To SSE Incharge</a>

          <a class="dropdown-item" href="aste-assign.php">Assign Station To ASTE</a>
          <a class="dropdown-item" href="view-assigned-station-to-aste.php">View Assigned Station To ASTE</a>
       </div>
     </li>

<!-- <li class="nav-item"><a href="assign.php" class="nav-link  active">Assign Station</a></li> 
<li class="nav-item"><a href="view-assigned-station-to-je.php" class="nav-link  active">View Assigned Station</a></li> 
 
<li class="nav-item"><a href="sse-incharge-assign.php" class="nav-link  active">Assign Station To SSE</a></li> 
<li class="nav-item"><a href="view-assigned-station-to-sse.php" class="nav-link  active">View SSE Assigned Station</a></li>
 -->
<li class="nav-item">
    
<a class="nav-link  active" href="logout.php"><i class="fa fa-sign-out" style="font-size:20px; color:#af0202;"></i>Logout</a>
</li>

</ul>
</div>
</nav>


<div>
    
   

    
    </div>


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