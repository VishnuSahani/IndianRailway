
 <?php
require('header.php');
  

if(isset($_SESSION['usernamestd']))
 {
  $a=$_SESSION['usernamestd'];

 } 

elseif(isset($_SESSION['userteacher']))
{
  $a=$_SESSION['userteacher'];
}




include('connection.php');
error_reporting(1);




$Testid=$_GET['Testid'];  
$Subid=$_GET['Subid'];

$check="select Test_Id from question where Test_Id='$Testid'";
$check_run=mysqli_query($con,$check);
$count=0;
while($record_check=mysqli_fetch_array($check_run))
{
$record_check['Test_Id'];

$count++;
}
//echo 'Number of ques= '.$count;

if($count>10)
{
?>

<div class="container-fluid" style="background-color:#FFFFFF; margin-top:50px">
  <div class="row " >

 <div class="card">
        <div class="col-lg-12 col-md-12 ">
	<p align="center" class="h3  border-bottom border-right" style="margin-top:20px;color:#af0202">	Test your knowledge</p>



	<p align="center" >
	This is multiple choice quiz to test your knowledge<br>

    <span style="color:#CC0033;">Number of Questions : 20 </span><br>
    Question Type : Multiple Choice<br>

You will get only 60 seconds for each question.
<br>
<span style="color:#CC0033;">Please Do not Close the browser when quiz is running</span><br>
    </p>
<p align="center" class="h5" style="color:red;">Start Test From Here..<br><br>



<?php 
echo"<a href='Qpage.php?Testid=$Testid&Subid=$Subid'>";

?><button class="btn btn-primary">Click Now...</button>
<?php 
echo"</a></p>";

?>



     </div><!---col -->      
   </div><!--row close-->
   

</div><!--container close-->

<?php 
} // question check if close

else{
?>

<div class="container-fluid" style="background-color:#FFFFFF; margin-top:50px">
  <div class="row">
    
    <div class="col-md-12">
      <h3 class="text-danger text-center" >
        Sorry ! Question are not Ready
      </h3>
            <br />
      <h6 class="text-center">Another Quiz <a href="SubList.php">Click here </a></h6>
            <br />
            <br />

    </div><!-------col-------->
  </div><!---------row------------->

 </div><!---container----->
 <?php 
 }//else close
 ?>

<?php include ('Footer.php');?>

