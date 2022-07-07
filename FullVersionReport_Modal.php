<?php
require('DBconnection.inc.php');

if(isset($_SESSION['Year'])&& isset($_SESSION['rescuerId']) && isset($_SESSION['shift'])&& isset($_SESSION['Month'])){
$Year=$_SESSION['Year'];
$Shift=$_SESSION['shift'];
$rescuerId=$_SESSION['rescuerId'];
$Month=$_SESSION['Month'];}

// ** Table Caption **
$ssql="Select rescuer_nickname,monthM from annualreport where rescuer_id=".$rescuerId." 
      and monthNb=".$Month."
      group by rescuer_id";
$q=mysqli_query($conn,$ssql);





//  --------------------------------------------Table------------------------------------\\
$Qtable="SELECT `mission_id`, fd.Address_code , fd.Address_desc as Dest_addr,fs.Address_code ,
fs.Address_desc as Source_addr,fr.mission_start_date,fr.mission_end_date,fr.mission_Statuscode,
fr.mission_type_desc,fr.mission_shift_code,fr.rescuer_id, patient_firstName, patient_lastName, 
patient_dateOfBirth ,`nationality_desc`,`patient_relativeName`
 FROM `fullreportmission_destination_address`fd 
 join fullreportmission_source_address fs using(mission_id)
  join fullreportmissionrescuers fr using(mission_id) 
  join fullreportmission_patient fp using (mission_id) 
  where fr.rescuer_id=".$rescuerId." and Year(mission_start_date)=".$Year." 
  and Month(mission_start_date)=".$Month."
  and mission_shift_code='".$Shift."'";
  if(isset($_POST['Search'])){
  if(isset($_POST['text']) && isset($_POST['SelectOption'])){
    if($_POST['text']==""){
      echo "<script>alert('Error Search');</script>";
      return false;
    }
    $Select=$_POST['SelectOption'];
    // echo "<script>alert('".$Select."');</script>";
    $text=$_POST['text'];
    echo "<script>alert('".$Select."  ".$text."');</script>";
    $Qtable.="and ".$Select." REGEXP '".$text."';";
    echo "<script>alert('and ".$Select." REGEXP ".$text."');</script>";
  }}
$ResQtable=mysqli_query($conn,$Qtable);


//***********Medical Case */
$QMedicalCase="SELECT `mission_id`, patient_firstName, patient_lastName, mc.medicalCase_desc 
FROM fullreportmissionrescuers fr join fullreportmission_patient fp using (mission_id) 
join mission_medical_case m_mc on m_mc.mission_missionId=fp.mission_id 
join medical_case mc on mc.medicalCase_code=m_mc.mission_MedicalCase_code 
where fr.rescuer_id=".$rescuerId." and Year(mission_start_date)=".$Year." 
  and Month(mission_start_date)=".$Month."
  and mission_shift_code='".$Shift."';";
$ResQMedicalCase=mysqli_query($conn,$QMedicalCase);

/******************** involved Rescuer */
$QNickname="SELECT `rescuer_id`, `mission_id`, `IsCreator`,rescuer_nickname 
FROM `mission_rescuer`mission_r join 
rescuer r using(`rescuer_id`) where mission_id In(SELECT `mission_id`
FROM fullreportmissionrescuers fr join fullreportmission_patient fp using (mission_id) 
join rescuer r using(`rescuer_id`)
where fr.rescuer_id=".$rescuerId." and Year(mission_start_date)=".$Year." 
  and Month(mission_start_date)=".$Month."
  and mission_shift_code='".$Shift."')
";
$ResQNickname=mysqli_query($conn,$QNickname);

?>