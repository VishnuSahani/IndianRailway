<?php
 $Subid=($_GET['Subjec_Name']);

			require('include/db_config.php');


$query="SELECT * FROM emp_info_rail WHERE section='$Subid' ORDER BY station ASC";
$result=mysqli_query($con,$query);

?>
<select name=Test_Name >
<option>Select Station</option>
<?php while($row=mysqli_fetch_array($result)) 
      { 

echo "<option name'Test_Name' value=".$row['Test_Id'].">",$row['station'],"</option>";}
 ?>
</select>
