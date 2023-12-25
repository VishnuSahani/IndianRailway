<?php 
session_start();
 require('header.php');
 require('include/db_config.php');

 //Include database configuration file
    $id="";

    if(isset($_SESSION['userretailer']))
{
  $id=$_SESSION['userretailer'];  
   
}
    //echo $id;
    $query = mysqli_query($con,"SELECT * FROM ibn_signup_retailer  WHERE binary ibn_id = '$id'");

	$row = mysqli_fetch_array($query);
	$idd = $row['id'];


  $x=$_REQUEST['testData'];
			
			 
			 	 	$fintst ="select * from emp_info_rail where station='$x'";
	$runtst	= mysqli_query($con,$fintst)	;
	$rowtst = mysqli_fetch_row($runtst);
	// echo "<br>".$rowtst[0];
			 
	
			 
			 
			 echo" <p class='h2 text-center text-light bg-info' style='margin-top:0px;'>View Selected Questions Of</p> 
   <p class='h4 text-center text-info' style='margin-top:0px;'>Test : <samp class='text-danger'><b>".$rowtst[2]."</b></samp></p>

<div class=table-responsive>
<table class='table  table-striped' border='0' align='center' bgcolor='#E9E9E9'>
<thead class='thead-dark'>
<tr>
<th>S.No.</th>
<th>Employee Id</th>

<th>Employee Name</th>
<th>Employee Designation</th>


<th>Add PME/RME</th>


</tr>
</thead>
";


$result=mysqli_query($con,"select * from question where Sub_ID = '$rowtst[1]' && Test_Id='$rowtst[0]'");
$count=1; 
while($record=mysqli_fetch_array($result))
{
echo "<tr>
<td>",$count,"</td>
<td>",$record['teacher_Id'],"</td>

<td>",$record['Question_Id'],"</td>
<td>",$record['Test_Id'],"</td>
<td>",$record['Question'],"</td>
<td>",$record['Ans_1'],"</td>
<td>",$record['Ans_2'],"</td>
<td>",$record['Ans_3'],"</td>
<td>",$record['Ans_4'],"</td>
<td>",$record['True_Ans'],"</td>";
?>

<?php
if($record['teacher_Id']==$_SESSION['userteacher'])
{

echo "<td><a href='up.php?Question_Id=",$record['Question_Id'],"'>Edit</a></td>";

}
?>

<?php
echo "</tr>";

$count++ ;
}

echo"
</table>
</div>
";
 


?>