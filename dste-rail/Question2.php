<?php
 $Subid=($_GET['Subjec_Name']);
//include ('connection.php');

 require('include/db_config.php');
//echo"$re2";

//$query="SELECT * FROM test WHERE Sub_ID='$Subid' ORDER BY Test_Name ASC";
$query="SELECT * FROM station_tbl WHERE section_id='$Subid' ORDER BY station_name ASC";
$result=mysqli_query($con,$query);

?>
<select name=Test_Name >
<option value="">Select Station</option>
<?php while($row=mysqli_fetch_array($result)) 
      { 

echo "<option value='".$row['station_id']."__".$row['station_name']."'>",$row['station_name'],"</option>";}

 ?>
</select>