<?php

include('../include/db_config.php');

$getStationQ = mysqli_query($con,"SELECT * FROM station_tbl");

// $stationComponentArr = ['POINT','TRACK','LC'];
// $stationComponentArr = ['EARTHING'];

// $stationComponentArr = ['IPS']; // for IPS
$stationComponentArr = ['WEATHER PRECAUTIONS']; // for PRECAUTIONS
// $stationComponentArr = ["RELAY ROOM",'CONTROL PANEL']; // for RELAY ROOM
$stationComponentArr = ['EI']; // EL

// $subComponent = "201 A,201 B,202 A,202 B,203 A, 203 B, 204, 204 X, 205 A, 205 B, 206, 206 X, 207 A, 207 B, 208 A, 208 B, 209 A, 209 B, 210 A, 210 B, 212 A, 212 B, 501 X";

// $subComponent = "201 T, 202 T, 203 BT, 201 BT, 204 T, 205 BT, 01 T, 01 AT, 01 BT, 02 T, 02 AT, 02 BT, 03 T, 03 AT, 03 BT, 04 T, 04 AT, 04 BT, 05 T, 05 AT, 05 BT, 206 T, 207 T, 208 BT, 209 T, 210 T, 212 T, A11 T, 11 T, A10 T, A12 T, 12 T";

// $subComponent = "A1, S1, C3, S2, S4, S5, S6, S7, S8, S9, C10, S11, S12, A12, SH24, SH25, SH26, SH27, SH28, SH29, SH31, SH32";

// $subComponent = "150 c";

// $subComponent = "KHM-SANR, KHM-GKC";
// $subComponent = "ET 1, ET 2, ET 3, ET 4, ET 5, ET 6, ET 7, ET 8, ET 9, ET 10, ET 11, ET 12, ET 13, ET 14, ET 15, ET 16, ET 17, ET 18, ET 19, ET 20";

$subComponent = ""; // CONTROL PANEL AND RELAY ROOM

echo "GO BACK heee heee hee";
die(); // Scomment this line for auto add component.

while($runStation = mysqli_fetch_array($getStationQ)){

    $sectionId = $runStation['section_id'];
    $sectionName = $runStation['section_name'];

    $stationName = $runStation['station_name'];
    $stationId = $runStation['station_id'];



    foreach ($stationComponentArr as $key => $stationComponent) {

        $createdDateTime = date("Y-m-d h:i:s");

        //FOR insert
        // $insertComponent = "INSERT INTO station_component_info (section_id,section_name,station_id,station_name,station_component,sub_component,created_date) VALUES ('$sectionId','$sectionName','$stationId','$stationName','$stationComponent','$subComponent','$createdDateTime')";

        //FOR DELETE QUERY
        // $insertComponent = "DELETE FROM station_component_info WHERE station_component = '$stationComponent'";


        if(mysqli_query($con,$insertComponent)){
            // change delete or insert msg
           echo "Station component data inserted successfully.";

            }else{

             echo "Something went wrong, try again.";

            }   

        echo "<br>";

    }




}


?>