<?php 
session_start ();
$id="";

    if(isset($_SESSION['userretailer']))
{
  $id=$_SESSION['userretailer'];  
   
}
require('include/db_config.php');
date_default_timezone_set('Asia/Kolkata');

             
mysqli_set_charset($con,"utf8");

if( isset($_POST['sectionName']) && isset($_POST['stationName']) && isset($_POST['stationId']) && isset($_POST['sectionId'])  && isset($_POST['empid']) && isset($_POST['empname']) && isset($_POST['empdesg']) && isset($_POST['appdate']) && isset($_POST['retdate']) && isset($_POST['phone']) )
{


  $sectionName=$_POST["sectionName"];
  $stationName =$_POST["stationName"];

    $stationId=$_POST["stationId"];
  $sectionId =$_POST["sectionId"];
 

 $c=$_POST["empid"];
 $d=$_POST["empname"];
 $e=$_POST["empdesg"];
 
 $appdate=$_POST["appdate"];
 $retdate=$_POST["retdate"];
 $phone=$_POST["phone"];


if($sectionName=="" || $stationName=="" || $stationId=="" || $sectionId==""  ||  $c=="" || $d=="" || $e=="" || $appdate=="" || $retdate=="" || $phone=="" )
{
echo "Warning! Please Fill all Details";
exit();
}

$createdDateTime = date("Y-m-d h:i:sa");


        if(mysqli_query($con,"insert into assign_info_rail(section_id,station_id,station_name,section_name,empid,empname,empdesg,phone,date_of_app,date_of_ret,created_date)values('$sectionId','$stationId','$stationName','$sectionName','$c','$d','$e','$phone','$appdate','$retdate','$createdDateTime')"))
           {
              echo"success";

            }
            else
            {
                echo"Warning ! Data Not Inserted";
            }
   

}
else
{
    echo "Plese Select Section and Station Both";
}



?>