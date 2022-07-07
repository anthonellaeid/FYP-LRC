<?php
  session_start();
require("PcrDraftModel.php");

if(isset($_GET['mission_id'])){$_SESSION['GetIdMission']=htmlspecialchars($_GET['mission_id']);
                               $_SESSION['GetIdMission']  = mysqli_real_escape_string($conn,$_SESSION['GetIdMission']);
    //echo"<script>alert('".$_SESSION['GetIdMission']."')</script>";
}
////////////////////////////////////////////////////////////////////////////////////////////////////
$dropdownsrc=htmlspecialchars($_POST["source"]);    
$dropdownsrc=mysqli_real_escape_string($conn,$dropdownsrc);  
$dropdowndest=htmlspecialchars($_POST["destination"]);
$dropdowndest=mysqli_real_escape_string($conn,$dropdowndest);        // echo "!!!!!!!!!!!!  ".$dropdownsrc.".......".$dropdowndest."  !!!!!!!!!!!!!!";
$srctxt=htmlspecialchars($_POST["srctxt"]);
$srctxt=mysqli_real_escape_string($conn,$srctxt);           
$desttxt=htmlspecialchars($_POST["desttxt"]); 
$desttxt=mysqli_real_escape_string($conn,$desttxt);
if($desttxt==''){
    echo "EMPTY TXT destination THEN NO INSERT TO ADDRESS <br>";
}else{
    echo $desttxt;
    $select_city2=htmlspecialchars($_POST["select_city2"]);
    $select_city2=mysqli_real_escape_string($conn,$select_city2);
    if($select_city2!=''){
        $a=addAddress($desttxt,$select_city2);
        if($a){
            echo " New dest address inserted in  ".$select_city2.".........";
        }
    }
}
echo "<br>";
echo $_POST["source"];  echo "<br>";
echo $_POST["destination"];  echo "<br>";
echo $_POST["srctxt"];echo "<br>";
echo $_POST["desttxt"];echo "<br>";
//////////////////////////////////////////////////////////////////////////////////////////////////////

if(isset($_POST['currentDay']) && isset($_POST['currentHour'])){
    $startd=htmlspecialchars($_POST['currentDay']);
    $stratd=mysqli_real_escape_string($conn,$startd);
    $startT=htmlspecialchars($_POST['currentHour']);
    $startT=mysqli_real_escape_string($conn,$startT);

    $StartDate=$startd." ".$startT;
    echo "StartDate: ".$StartDate;
}
echo "<br>////////////////////////**StartDate: ".$_POST['currentDay']." - ".$_POST['currentHour'];
echo "<br>";
  
echo "<br>";
$equipe=$_POST['shift'];
echo "initial:".$_POST["initial_mileage"]."-Final".$_POST["final_mileage"]."-".$_POST["etank"]."-".$_POST["dtank"]."-".$_POST["mtank"]."-".$_POST["mission_type"]."-".$equipe."-".$_POST["ambulance"]."-".$_POST["uhf_radio"]."-".$_POST["cm_kit"];

date_default_timezone_set("Asia/Beirut");    
$endDate=date("Y-m-d h:i:s");
echo "EndDate: ".$endDate;
//sql Injection
$initialKM=htmlspecialchars($_POST["initial_mileage"]);
$initialKM=mysqli_real_escape_string($conn,$initialKM);
$finalKM=htmlspecialchars($_POST["final_mileage"]);
$finalKM=mysqli_real_escape_string($conn,$finalKM);
$etank=htmlspecialchars($_POST["etank"]);
$etank=mysqli_real_escape_string($conn,$etank);
$mtank=htmlspecialchars($_POST["mtank"]);
$mtank=mysqli_real_escape_string($conn,$mtank);
$dtank=htmlspecialchars($_POST["dtank"]);
$dtank=mysqli_real_escape_string($conn,$dtank);
$missionType=htmlspecialchars($_POST["mission_type"]);
$missionType=mysqli_real_escape_string($conn,$missionType);
$ambId=htmlspecialchars($_POST["ambulance"]);
$ambId=mysqli_real_escape_string($conn,$ambId);
$uhfRadio=htmlspecialchars($_POST["uhf_radio"]);
$uhfRadio=mysqli_real_escape_string($conn,$uhfRadio);
$cmKit=htmlspecialchars($_POST["cm_kit"]);
$cmKit=mysqli_real_escape_string($conn,$cmKit);
//patient1
$patientfn1=htmlspecialchars($_POST["patient_firstname"]);
$patientfn1=mysqli_real_escape_string($conn,$patientfn1);
$patientln1=htmlspecialchars($_POST["patient_lastname"]);
$patientln1=mysqli_real_escape_string($conn,$patientln1);
$patientDOB1=htmlspecialchars($_POST["patient_dateofbirth"]);
$patientDOB1=mysqli_real_escape_string($conn,$patientDOB1);
$patientNat1=htmlspecialchars($_POST["patient_nationality"]);
$patientNat1=mysqli_real_escape_string($conn,$patientNat1);
$patientRel=htmlspecialchars($_POST["patient_relativename"]);
$patientRel=mysqli_real_escape_string($conn,$patientRel);
//patient2
$patientfn2=htmlspecialchars($_POST["patient_firstname2"]);
$patientfn2=mysqli_real_escape_string($conn,$patientfn2);
$patientln2=htmlspecialchars($_POST["patient_lastname2"]);
$patientln2=mysqli_real_escape_string($conn,$patientln2);
$patientDOB2=htmlspecialchars($_POST["patient_dateofbirth2"]);
$patientDOB2=mysqli_real_escape_string($conn,$patientDOB2);
$patientNat2=htmlspecialchars($_POST["patient_nationality2"]);
$patientNat2=mysqli_real_escape_string($conn,$patientNat2);
$patientRel2=htmlspecialchars($_POST["patient_relativename2"]);
$patientRel2=mysqli_real_escape_string($conn,$patientRel2);
//Rescuers
$Driver=htmlspecialchars($_POST["driver"]);
$Driver=mysqli_real_escape_string($conn,$Driver);
$leader=htmlspecialchars($_POST["leader"]);
$leader=mysqli_real_escape_string($conn,$leader);
$EMT=htmlspecialchars($_POST["emt"]);
$EMT=mysqli_real_escape_string($conn,$EMT);
//medicalCase

$medicalCaseText=htmlspecialchars($_POST["medcasetxt"]);
$medicalCaseText=mysqli_real_escape_string($conn,$medicalCaseText);
//





//***Insert Missions */

//insert mission
if( !empty($_POST["initial_mileage"]) && !empty($_POST["final_mileage"]) && !empty($_POST["etank"]) && !empty($_POST["dtank"]) && !empty($_POST["mtank"]) && !empty($_POST["mission_type"]) && !empty($_POST["ambulance"]) && !empty($_POST["uhf_radio"]) && !empty($_POST["cm_kit"]) ){
    if($_POST["initial_mileage"]<$_POST["final_mileage"]){

                
        if($dropdownsrc=='' && $dropdowndest==''){
            if($srctxt!='' && $desttxt!=''){
                $srcTxtAddress=$maxidaddress;
                $destTxtAddress=$srcTxtAddress++;
                $resupdate=updateMission2($StartDate,$endDate,$initialKM,$finalKM,$etank,$dtank,$mtank,$missionType,$equipe,$ambId,$uhfRadio,$cmKit,$srcTxtAddress,$destTxtAddress);
            }
        }else{
            if($dropdownsrc!='' && $dropdowndest==''){
                if($desttxt!=''){
                    $resupdate=updateMission2($StartDate,$endDate,$initialKM,$finalKM,$etank,$dtank,$mtank,$missionType,$equipe,$ambId,$uhfRadio,$cmKit,$dropdownsrc,$maxidaddress);
                }
            }else{
                if($dropdownsrc=='' && $dropdowndest!=''){
                    if($srctxt!=''){
                        $maxidaddress++;
                        $resupdate=updateMission2($StartDate,$endDate,$initialKM,$finalKM,$etank,$dtank,$mtank,$missionType,$equipe,$ambId,$uhfRadio,$cmKit,$maxidaddress,$dropdowndest);
                    }
                }else{
                    if($dropdownsrc!='' && $dropdowndest!=''){
                        $resupdate=updateMission2($StartDate,$endDate,$initialKM,$finalKM,$etank,$dtank,$mtank,$missionType,$equipe,$ambId,$uhfRadio,$cmKit,$dropdownsrc,$dropdowndest);
                    }
                }
            }
        }

    }
} else    // for poste and soin au centre
if(empty($_POST["initial_mileage"])&& empty($_POST["final_mileage"]) && empty($_POST["ambulance"]) &&empty( $_POST["source"]) && empty($_POST["destination"]) && empty($_POST["srctxt"]) && empty($_POST["desttxt"]) && !empty($_POST["mission_type"])  && !empty($_POST["uhf_radio"]) && !empty($_POST["cm_kit"]) )
    {
    $resupdate=updateMission3($StartDate,$endDate,$etank,$dtank,$mtank,$missionType,$equipe,$uhfRadio,$cmKit);
    }
    else{
    echo "can't insert mission";
}

if($resupdate){
    echo "MISSION";
}

//update mission final km
if($resupdate && !empty($_POST['ambulance'])){
    $updAmb=updateAmbFinalKm($ambId,$finalKM);
}
if($updAmb){echo "<br>Ambulance KM UPDATEDDDD<br>";}else{echo "<br>Failed To update Ambulance final km<br>";}




$exist=0;
//insert patient
if(!empty($_POST["patient_firstname"]) && !empty($_POST["patient_lastname"]) && !empty($_POST["patient_dateofbirth"]) && !empty($_POST["patient_nationality"]) ){
    //delete old patients
    $oldPatient=mysqli_num_rows($ResultGetMissionPatient);
        if($oldPatient>0){
                while($oldPatientID=mysqli_fetch_assoc($ResultGetMissionPatient)){
                    $DeletePatientRes=DeleteExistingpatientMission($oldPatientID['patient_id']);
                }
                if($DeletePatientRes){echo "<br>------------**successfully deleted old patients";}
                else{echo "<br>------------**Failed to delete old Patient";}
            
            
            }
       
    //---------------
    while($s=mysqli_fetch_array($result14)){
        if($s['patient_firstName']==$patientfn1 && $s['patient_lastName']==$patientln1 && $s['patient_dateOfBirth']==$patientDOB1 && $s['patient_nationality']==$patientNat1){
            $exist=$s['patient_id'];
            continue;
        }
    }
    mysqli_data_seek( $result14, 0 );
    if($exist==0){
        $d=addPatient($patientfn1,$patientln1,$patientDOB1,$patientNat1);
    }  
    //---------------
}
if($d){
    echo "PATIENT1 Inserted :)))";
}

//insert patient_mission
if($resupdate && $d){
    echo "c & d ";
    $maxid=0;
    $idpts=getLastPatientId();
    while($s=mysqli_fetch_array($idpts)){
        if($maxid<$s['patient_id']){
            $maxid=$s['patient_id'];
        }
    }
    
    echo "<br><br><br><br>********  ".$maxid." *******<br><br><br><br>";
    $e=patientMission($maxid++,$patientRel);
    if($e){
        echo "GOAL";
    }
}

/////////////////////
if($resupdate && $exist>0){
    echo "c & patient exist ";
    $k=patientMission($exist,$patientRel);
    if($k){
        echo "GOAL";
    }
}
//////////////////

if($srctxt==''){
    echo "EMPTY TXT SOURCE THEN NO INSERT TO ADDRESS";
}else{
    echo $srctxt;
    $select_city1=htmlspecialchars($_POST["select_city1"]);
    $select_city1=mysqli_real_escape_string($conn,$select_city1);
    if($select_city1!=''){
        $a=addAddress($srctxt,$select_city1);
        if($a){
            echo " New src address inserted in  ".$select_city1.".........";

        }
    }
}

$exist2=0;
if(!empty($_POST["patient_firstname2"]) && !empty($_POST["patient_lastname2"]) && !empty($_POST["patient_dateofbirth2"]) && !empty($_POST["patient_nationality2"])){
    if(empty($_POST["patient_firstname"]) && empty($_POST["patient_lastname"]) && empty($_POST["patient_dateofbirth"]) && empty($_POST["patient_nationality"]) ){
    //delete old patients
        $oldPatient=mysqli_num_rows($ResultGetMissionPatient);
        if($oldPatient>0){
                while($oldPatientID=mysqli_fetch_assoc($ResultGetMissionPatient)){
                    $DeletePatientRes=DeleteExistingpatientMission($oldPatientID['patient_id']);
                }
                if($DeletePatientRes){echo "<br>------------**successfully deleted old patients";}
                else{echo "<br>------------**Failed to delete old Patient";}
            
            
            }   
    }
    //---------------
    while($s=mysqli_fetch_array($result14)){
        if($s['patient_firstName']==$patientfn2 && $s['patient_lastName']==$patientln2 && $s['patient_dateOfBirth']==$patientDOB2 && $s['patient_nationality']==$patientNat2){
            $exist2=$s['patient_id'];
            continue;
        }
    }
    mysqli_data_seek( $result14, 0 );
    if($exist2==0){
        $f=addPatient($patientfn2,$patientln2,$patientDOB2,$patientNat2);
    }
    //---------------
}
if($f){
    echo "PATIENT 2 inserted :)))";
}
if($resupdate && $f){
    echo "c & f ";
    $maxid2=0;
    $idpts2=getLastPatientId();
    while($s=mysqli_fetch_array($idpts2)){
        if($maxid2<$s['patient_id']){
            $maxid2=$s['patient_id'];
        }
    }
    
    echo "<br><br><br><br>********  ".$maxid2." *******<br><br><br><br>";
    $g=patientMission($maxid2++,$patientRel2);
    if($g){
        echo "GOAL2";
    }
}
/////////////////////
if($resupdate && $exist2>0){
    echo "c & patient2 exist ";
    $l=patientMission($exist2,$patientRel2);
    if($l){
        echo "GOAL2";
    }
}
//////////////////

//insert into mission_rescuer
    //Delete old rescuers
    if($resupdate){
        if(!empty($_POST["driver"]) || !empty($_POST["leader"]) || !empty($_POST["emt"])){
            $oldResc=mysqli_num_rows($resultGetAllMssionRescuer);
            if($oldResc>0){
                while($oldRescID=mysqli_fetch_assoc($resultGetAllMssionRescuer)){
                    $DeleteoldRescID=DeleteOldMissionRescuer($oldRescID['rescuer_id']);
                }
                if($DeleteoldRescID)
                    {echo "<br>''''''''''''Deleted old Rescuers Succssefully'''''''''''' ";}
                else{echo "<br>''''''''''''FAILED to Delete old Rescuers '''''''''''' ";}
            }
        }
    }

    //insert  Leader and Driver
   if($resupdate && !empty($_POST["driver"]) ){
        if($Driver==$_SESSION["rescuer_id"]){echo " this driver:".$Driver." is the creator***"; $DriverRole=1;}
        else{$DriverRole=0;}
        $m=insertintoMissionRescuer($Driver,1,$DriverRole);
        echo "<br>";
        if($m){
            echo "MM";
        }
        echo "<br>";
    }
    if($resupdate && !empty($_POST["leader"]) ){
        
        if($leader==$_SESSION["rescuer_id"]){echo " this leader:".$leader." is the creator***"; $leaderRole=1;}
        else{$leaderRole=0;}
        $p=insertintoMissionRescuer($leader,2,$leaderRole);
        echo "<br>";
        if($p){
            echo "PP";
        }
        echo "<br>";
    }
    //
    //insert EMT
    if($resupdate && !empty($_POST["emt"])){
        if($EMT==$_SESSION["rescuer_id"]){echo " this EMT:".$EMT." is the creator***"; $emtRole=1;}
        else{$emtRole=0;}
        $o=insertintoMissionRescuer($EMT,3,$emtRole);
        echo "<br>";
        if($o){
            echo "OO";
        }
        echo "<br>";
    }
    //check id creator doesn't exist
    // if($m || $p ||$o ){
    //     if(($DriverRole==0) &&   ($leaderRole==0)
    //     while($rs=mysqli_fetch_assoc($resultGetAllMssionRescuer)){
    //         if($rs['IsCreator']==1){
    //             $y=1;
    //         }
    //         else{$y=0;
    //        $q=insertCreator($_SESSION["rescuer_id"]); }
    //     }
    // }
//



echo "<br>RRRRRRRRRRRRRRRRRRRRRRRRRRRRR<br>";

if (!empty($_POST["medical_case"])) {  
     $resMed=mysqli_num_rows($ResultGetMissionMedicalCase);
    if($resMed>0){
        while($medMission=mysqli_fetch_assoc($ResultGetMissionMedicalCase)){
            $med=Deletealreadyinserted($medMission['mission_MedicalCase_code']);

        }
       if($med){echo "Deleted medcal case successfully";}
    }
    
    echo "<ul>";
    foreach ($_POST["medical_case"] as $value) {
$value=htmlspecialchars($value);
$value=mysqli_real_escape_string($conn,$value);
        $h=insertintoMissionMedCase($value);
        echo "<li>$value</li>";
        if($h){
            echo "<br>----------- MissionMedCase inserted ------------<br>";
        }else{echo "FAILEDDDDDDD MissionMedCase";}
    }
    echo "</ul>";
}
echo "<br>RRRRRRRRRRRRRRRRRRRRRRRRRRRRR<br>";


echo "aaaaaaaaaa  ";
if (!empty($_POST["medcasetxt"])){
    echo " <br>medcasetxt is NOT empty<br>";
}else{
    echo "<br>medcasetxt is empty<br>";
}
echo "aaaaaaaaa";

if(!empty($_POST["medcasetxt"])){

    if(empty($_POST["medical_case"])){
        $resMed=mysqli_num_rows($ResultGetMissionMedicalCase);
        if($resMed>0){
            while($medMission=mysqli_fetch_assoc($ResultGetMissionMedicalCase)){
                $med=Deletealreadyinserted($medMission['mission_MedicalCase_code']);
    
            }
           if($med){echo "Deleted old medical case successfully";}
        }
    }


    echo "<br>med case txt is not empty<br>";
    $i=addMedicalCase($medicalCaseText);
    if($i){
        echo "<br> new medical case added <br>";
        $maxmcid=0;
        $idmc=getLastMedCaseId();
        while($s=mysqli_fetch_array($idmc)){
            if($maxmcid<$s['medicalCase_code']){
                $maxmcid=$s['medicalCase_code'];
            }
        }
        $j=insertintoMissionMedCase($maxmcid);
    }
}

?>