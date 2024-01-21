<?php

include('include/db_config.php');


$query="select * from assign_info_rail";

$filename = "assignedstation.csv";
$fp = fopen('php://output', 'w');

$query = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA='raj-db-nurse-tcs' AND TABLE_NAME='assign_info_rail'";
$result = mysqli_query($con,$query);
while ($row = mysqli_fetch_row($result)) {
	$header[] = $row[0];
}	

header('Content-type: application/csv');
header('Content-Disposition: attachment; filename='.$filename);
fputcsv($fp, $header);

$result = mysqli_query($con,$query2);
while($row = mysqli_fetch_row($result)) {
	fputcsv($fp, $row);
}
exit;
?>