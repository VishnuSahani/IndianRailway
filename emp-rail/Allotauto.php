
<?php

// include('include/db_config.php');
// $Subid =($_GET['Subjec_Name']) ;
    
// $q ="SELECT id FROM states WHERE name ='$Subid'";
// $re=mysqli_query($con,$q);
// $re1=mysqli_fetch_array($re);
// $re2=$re1['id'];
//    $query="SELECT name FROM districts WHERE state_id='$re2'";
// $result=mysqli_query($con,$query);


 //        <select name="dist" id="dist" class="form-control">
//         
 
   
	
//        while($row=mysqli_fetch_array($result))
// 		{ 

// echo "<option>".$row['name']."</option>";
// }

date_default_timezone_set('Asia/Kolkata'); 

echo "Date test<br>";
echo  $createdDateTime = date("Y-m-d h:i:s");
echo "<br>";
echo strtotime($createdDateTime);
echo "<br>";

echo  $createdDateTime = date("Y-m-d h:i:s");
echo "<br>2023-08-20 02:39:37<br>";
echo $a = strtotime("2023-08-20 02:39:37");

echo "<br>";

echo date("Y-m-d h:i:s",$a);

echo "<br> 15 day <br>";

 $d15 = strtotime("+15 days",strtotime($createdDateTime));
 echo date("Y-m-d h:i:s",$d15);


 echo "<h1>test</h1>";

 $date1 = date_create("01-07-2023");
 $date2 = date_create("10-07-2023");

  $diff = date_diff($date2,$date1);
  echo $diff->format("%R%a");

 ?>
</select>


