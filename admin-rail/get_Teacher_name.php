<?php 
require('include/db_config.php');
  $empid=$_POST['t_id'];
$sql=mysqli_query($con,"select * from je_info_rail where empid='$empid'");
$row=mysqli_fetch_row($sql);
/*
echo '
 					   	   <label>	Teacher Name</label>

<input type="text" id="teacher_name" class="form-control" value="'.$row[1].'" disabled>';

*/
//echo $row[6];
$data['empname']=$row[7];
				  
$data['empdesg']=$row[8];
$data['phone']=$row[9];
// $data['phone']=$row[8];
$data['date_of_app']=$row[10];
$data['date_of_ret']=$row[11];
// $data['subject_branch']=$sub_run[3];
// $data['subject_semester']=$sub_run[4];
// $data['subject_max_no']=$sub_run[5];
// $data['subject_type']=$sub_run[6];
// $data['subject_max_class']=$sub_run[7];



//$data['subject_name']=$sub_run[2];
echo json_encode($data);

 ?>