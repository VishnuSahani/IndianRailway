
<?php
session_start();
include('include/db_config.php');
if(  isset($_POST['oldpass']) && isset($_POST['newpass']) && isset($_POST['repass'])  )
{
 
$id=$_SESSION['userretailer'];
$pass=$_POST['oldpass'];
$newpass=$_POST['newpass'];
$repass=$_POST['repass'];

$que="select * from ibn_signup_retailer where ibn_id='$id' and password='$pass'";
   $run=mysqli_query($con,$que);
   
   if(mysqli_num_rows($run) == 1)

{

$query ="update ibn_signup_retailer set  password='$repass'  where ibn_id='$id' and password='$pass'";
$af = mysqli_query($con,$query);
echo "Password Updated successfully";	
}

else
{

echo "Error in Password Updation ";	

}

}

?>