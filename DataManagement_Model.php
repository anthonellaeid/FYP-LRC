<?php

require("DBconnection.inc.php");

if(isset($_POST["query"]) || isset($_POST["columnName"])){
    $AmbQuery=htmlspecialchars($_POST["query"]);
    $AmbQuery=mysqli_real_escape_string($conn,$AmbQuery);
    $search = str_replace(",", "|",$AmbQuery );
    echo "<script>console.log('".$search."');</script>";
    if(isset($_POST["columnName"])){ 
    $ColumnName=htmlspecialchars($_POST["columnName"]);
    $ColumnName=mysqli_real_escape_string($conn,$ColumnName);
    $sql = " SELECT * FROM `ambtypereport`
    WHERE  ".$ColumnName." REGEXP '".$search."'
    ";
}else{
 $sql = " SELECT * FROM `ambtypereport`
 WHERE  ambulance_plateNb REGEXP '".$search."'
   ambulance_description REGEXP '".$search."' 
  OR ambulance_final_km REGEXP '".$search."'
  OR ambulanceStatus_desc REGEXP '".$search."'
  OR Ambulance_max_patient_nb REGEXP '".$search."'
 ";}
}
else{$sql="SELECT * FROM `ambtypereport` ORDER BY ambulance_id DESC";}
$result=mysqli_query($conn,$sql);
$rK=mysqli_fetch_assoc($result);
// $Qkm="SELECT mission_id,`mission_final_km` from mission where `mission_ambulanceId`=".$rK['ambulance_id']." and mission_id in (select max(mission_id) from mission where `mission_ambulanceId`=".$rK['ambulance_id'].")";
$Qkm="SELECT distinct(ambulance_id), `mission_final_km`,max(mission_id) FROM `finalmissionkm` WHERE 1";
$resultKm=mysqli_query($conn,$Qkm);
mysqli_data_seek($result,0);
/** */
$Qstatus1="Select * FROM ambulance_status";
$RESstatus1=mysqli_query($conn,$Qstatus1);
/************* */
if(isset($_POST["query2"])){
    $search2=htmlspecialchars($_POST["query2"]);
    $search2=mysqli_real_escape_string($conn,$search2);
    $search2 = str_replace(",", "|", $search2);
    
    echo "<script>console.log('".$search2."');</script>";
  $Qstatus = " SELECT * FROM `ambulance_status`
  WHERE ambulanceStatus_desc	 REGEXP '".$search2."' 
  ";
  }
  else{ 
  $Qstatus = "SELECT * FROM ambulance_status order by ambulanceStatus_code DESC"; }//<table class="table table-bordered">   
  $ResStatus = mysqli_query($conn, $Qstatus);


/////////////////////////////////////// 3. Address Queries table\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\	
if(isset($_POST["queryAddress"]) || isset($_POST["columnNameaddress"])){
 $columnNameaddress=$_POST["columnNameaddress"];
$searchAddress=htmlspecialchars($_POST["queryAddress"]);
$searchAddress=mysqli_real_escape_string($conn,$searchAddress);
$searchAddress = str_replace(",", "|", $searchAddress);
  $QAddress="SELECT * FROM addresscity 
  where ".$columnNameaddress." REGEXP '".$searchAddress."'
  ";

}else{$QAddress="SELECT * FROM address order by Address_code DESC";}
$ResAddress=mysqli_query($conn,$QAddress);
$Qcity1 = "SELECT * FROM city order by city_id DESC";
$ResCity1 = mysqli_query($conn, $Qcity1);
/////////////////////////////////////// 4. City Queries table\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\	
if(isset($_POST["queryCity"])){
  $searchCity=htmlspecialchars($_POST["queryCity"]);
  $searchCity=mysqli_real_escape_string($conn,$searchCity);
  $searchCity=str_replace(",", "|", $searchCity);
  $Qcity="SELECT * FROM city 
  Where lower(city_name) REGEXP '".$searchCity."' ";
}
else{
$Qcity = "SELECT * FROM city order by city_id DESC";}
$ResCity = mysqli_query($conn, $Qcity);

/////////////////////////////////////// 5. Medical Case Queries table\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\	
if(isset($_POST["queryMedical"])){
  $searchMedical=htmlspecialchars($_POST["queryMedical"]);
  $searchMedical=mysqli_real_escape_string($conn,$searchMedical);
  $searchMedical=str_replace(",", "|", $searchMedical);
  $Qmedical="SELECT * FROM  medical_case 
  Where lower(medicalCase_desc) REGEXP '".$searchMedical."' ";
}
else{
$Qmedical = "SELECT * FROM medical_case order by medicalCase_code	 DESC ";  }
$ResMedical = mysqli_query($conn, $Qmedical);  

/////////////////////////////////////// 6. CM Kit Queries table\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\	
if(isset($_POST["queryCM"])){
  $searchCM=htmlspecialchars($_POST["queryCM"]);
  $searchCM=mysqli_real_escape_string($conn,$searchCM);
  $searchCM=str_replace(",", "|", $searchCM);
  $Qcmkit="SELECT * FROM  cm_kit 
  Where lower(cm_kit_desc) REGEXP '".$searchCM."' ";
}

else{

$Qcmkit = "SELECT * FROM cm_kit order by cm_kit_id DESC ";} //<table class="table table-bordered">   
$ResCMkit = mysqli_query($conn, $Qcmkit);

/////////////////////////////////////// 7. UHF Radio Queries table\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\	
if(isset($_POST["queryUHF"])){
  $searchUHF=htmlspecialchars($_POST["queryUHF"]);
  $searchUHF=mysqli_real_escape_string($conn,$searchUHF);
  $searchUHF=str_replace(",", "|", $searchUHF);
  $QUHF="SELECT * FROM  uhf_radio 
  Where lower(uhf_radio_desc) REGEXP '".$searchUHF."' ";
}
else{
$QUHF = "SELECT * FROM uhf_radio order by uhf_radio_id DESC "; }//<table class="table table-bordered">   
$ResUHF = mysqli_query($conn, $QUHF); 
/////////////////////////////////////// 8. Shift Queries table\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\	
if(isset($_POST["queryShift"])){
  $searchShift=htmlspecialchars($_POST["queryShift"]);
  $searchShift=mysqli_real_escape_string($conn,$searchShift);
  $searchShift=str_replace(",", "|", $searchShift);
  $QShift="SELECT * FROM  Shift 
  Where lower(shift_desc) REGEXP '".$searchShift."' ";
}

else{
$QShift = "SELECT * FROM Shift order by shift_code DESC ";  }
$ResShift = mysqli_query($conn, $QShift);



?>