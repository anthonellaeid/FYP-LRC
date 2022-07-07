<?php  
require("DBconnection.inc.php");
/**EMS */
$EMS="SELECT count( `rescuer_function`) as fctRescNb, `rescuer_function_desc` FROM `rescuerfunction` group BY rescuer_function;";
$resEMS=mysqli_query($conn,$EMS);
$TotalEMS="SELECT count( `rescuer_function`) as Totalresc FROM `rescuerfunction`;";
$resTotalEMS=mysqli_query($conn,$TotalEMS);

/**Ambulance */
$AMB="SELECT count(ambulance_id) as countAmb, `ambulanceStatus_desc` FROM `ambtypereport` GROUP BY ambulanceStatus_desc;";
$resAMB=mysqli_query($conn, $AMB);
$Total_AMB="SELECT count(ambulance_id) as TotalAmb FROM `ambtypereport`;";
$resTotalAMB=mysqli_query($conn,$Total_AMB);

/**Missions */
$PCR="SELECT count(mission_id) as countMission, `mission_missionType`, mt.mission_type_desc FROM `mission` m join mission_type mt on mt.mission_type_code=m.mission_missionType group by mission_missionType;";
$resPCR=mysqli_query($conn,$PCR);
$Total_PCr="SELECT count(mission_id) as TotalPCR FROM `todaytype`  ;";
$resTotal_PCR=mysqli_query($conn,$Total_PCr);

?>

