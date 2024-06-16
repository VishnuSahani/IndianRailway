<?php
include("../include/db_config.php");

// $formArr = ['EP1','EP2','EP3','EP4','EP5','T1','T2','T3','T4','T5','CS1','CS2','DL1','DL2','DL3','DL4','MLB1','MLB2','MLB3','SLB1','SLB2','ELB1','ELB2','ELB3','ELB4','ELB5','DAC1','DAC2','DAC3','DB1','DB2','DB3','HB1','HB2','HB3','UF1','UF2','UF3','UF4','UF5'];
// $formArr = ["IPS1","IPS2","IPS3","E1","E2","E3",];
// $formArr = ["IPS_Battery"];
// $formArr = ["DAC4"];
// $formArr = ["R1","R2","R3","CP1","CP2","CP3"];
// $formArr = ["EL1","EL2","EL3","EL4"];
$formArr = ["Summer_Precaution"];
$empType = ["Admin","DSTE","ASTE","SSE","JE","Employee"];
foreach ($empType as $type) {
    echo $type;
    foreach ($formArr as $key) {
        echo $key;
        echo "<br>";
        $q = "INSERT INTO form_duration_info (formName,duration,empType) VALUES ('$key',10,'$type')";
        mysqli_query($con,$q); // uncomment to insert
     }
     echo "<br>";

}

?>