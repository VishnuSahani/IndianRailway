<?php 

       include('include/db_config.php');







if(isset($_POST['user_email']))

{

 $emailId=$_POST['user_email'];



 $checkdata=" SELECT email FROM ibn_signup_distributor WHERE email='$emailId' ";

 $checkdata2=" SELECT email FROM ibn_signup_retailer WHERE email='$emailId' ";


 $query=mysqli_query($con,$checkdata);

 $query2=mysqli_query($con,$checkdata2);


 if((mysqli_num_rows($query)>0) || (mysqli_num_rows($query2)>0))

 {

  echo " This Email Id Already Registered!!";

 }

 else

 {
 echo "no";  

 }

 exit();

}



?>