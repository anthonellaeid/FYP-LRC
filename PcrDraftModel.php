<?php


    require("DBconnection.inc.php");

      if(isset($_GET['mission_id'])){$_SESSION['GetIdMission']=htmlspecialchars($_GET['mission_id']);
                                   $_SESSION['GetIdMission']  = mysqli_real_escape_string($conn,$_SESSION['GetIdMission']);
        //echo"<script>alert('".$_SESSION['GetIdMission']."')</script>";
   }
    // get mission type
    $query1="SELECT * FROM `mission_type`";
    $result1=mysqli_query($conn,$query1);

    // get medical case
    $query2="SELECT * FROM `medical_case`";
    $result2=mysqli_query($conn,$query2);

    // get ambulance
    $query3="SELECT * FROM `ambulance` where `Ambulance_status_code`=1";
    $result3=mysqli_query($conn,$query3);

    // get drivers
    $query4="SELECT * FROM `rescuer` WHERE rescuer_function=1";
    $result4=mysqli_query($conn,$query4);

    // get leaders
    $query5="SELECT * FROM `rescuer` WHERE rescuer_function !=3";
    $result5=mysqli_query($conn,$query5);

    // get EMTs
    $query6="SELECT * FROM `rescuer`";
    $result6=mysqli_query($conn,$query6);

    // get hospitals   
    $query7="SELECT * FROM `address` WHERE Is_hospital=1";
    $result7=mysqli_query($conn,$query7);

    // get event locations
    $query8="SELECT * FROM `address` WHERE Is_event=1";
    $result8=mysqli_query($conn,$query8);
    // echo json_encode($data8);

    // get other locations
    $query9="SELECT * FROM `address` WHERE Is_event!=1 and Is_hospital!=1";
    $result9=mysqli_query($conn,$query9);
    
    // get cm kits  
    $query10="SELECT * FROM `cm_kit`";
    $result10=mysqli_query($conn,$query10);

    // get uhf radios
    $query11="SELECT * FROM `uhf_radio`";
    $result11=mysqli_query($conn,$query11);

    // get nationalities
    $query12="SELECT * FROM `nationality`";
    $result12=mysqli_query($conn,$query12);

    // get cities
    $query13="SELECT * FROM `city`";
    $result13=mysqli_query($conn,$query13);

    // get patients 
    $query14="SELECT * FROM `patient`";
    $result14=mysqli_query($conn,$query14);

    // get shifts
    $query15="SELECT * FROM `shift`";
    $result15=mysqli_query($conn,$query15);

    /**DisplaySelected options and inserted data of drafted middion */
//Draft Mission info
$GetMissionInfo="SELECT `mission_id`, `mission_start_date`, `mission_end_date`, `mission_initial_km`, `mission_final_km`, `remaining_E_tank`, `remaining_D_tank`, `remaining_M_tank`, `mission_Statuscode`, `mission_missionType`, `mission_addressCodeSrc`, `mission_addressCodeDest`, `mission_shift_code`, `mission_ambulanceId`, `UHFradioId_mission`, `cmKitId_mission` FROM `mission` where mission_id='".$_SESSION['GetIdMission']."'";
$ResultGetMissionInfo=mysqli_query($conn,$GetMissionInfo);
//Draft Addresses
$GetMissionSrcAddress="SELECT `Address_code`, `Address_desc`, `Is_hospital`, `Is_event`, `Address_city` FROM `address` a join mission m on a.Address_code=m.mission_addressCodeSrc where m.mission_id='".$_SESSION['GetIdMission']."'";
$ResultGetMissionSrcAddress=mysqli_query($conn,$GetMissionSrcAddress);
$GetMissionDestAddress="SELECT `Address_code`, `Address_desc`, `Is_hospital`, `Is_event`, `Address_city` FROM `address` a join mission m on a.Address_code=m.mission_addressCodeDest where m.mission_id='".$_SESSION['GetIdMission']."';";
$ResultGetMissionDestAddress=mysqli_query($conn,$GetMissionDestAddress);
//Draft Mission Type Desc
$GetSelectedTypeMission="SELECT `mission_type_code`, `mission_type_desc` FROM `mission_type` mt join mission m on m.mission_missionType=mt.mission_type_code
where m.mission_id='".$_SESSION['GetIdMission']."'";
$ResultGetSelectedTypeMission=mysqli_query($conn,$GetSelectedTypeMission);
//Draft Medical Case
$GetMissionMedicalCase="SELECT `mission_MedicalCase_code`, `mission_missionId`,medicalCase_desc FROM `mission_medical_case` mmd JOIN medical_case mc on mc.medicalCase_code=mmd.mission_MedicalCase_code WHERE mission_missionId='".$_SESSION['GetIdMission']."';";
$ResultGetMissionMedicalCase=mysqli_query($conn,$GetMissionMedicalCase);
//Draft Patient
$GetMissionPatient="SELECT * FROM `patient` p join patient_mission pm on pm.patient_id=p.patient_id where pm.mission_id='".$_SESSION['GetIdMission']."'";
$ResultGetMissionPatient=mysqli_query($conn,$GetMissionPatient);
//Draft ambulance
$GetMissionAmbulance="SELECT `ambulance_id`, `ambulance_plateNb`, `ambulance_description`, `ambulance_final_km`, `Ambulance_status_code`, `Ambulance_max_patient_nb` FROM `ambulance` amb join mission m on m.mission_ambulanceId=amb.ambulance_id where m.mission_id='".$_SESSION['GetIdMission']."'";
$ResultGetMissionAmbulance=mysqli_query($conn,$GetMissionAmbulance);

//Draft rescuers
$GetMissionRescuersDriver="SELECT `rescuer_id`, `mission_id`, `IsCreator`, mission_rescuer.rescuer_function, r.rescuer_nickname FROM `mission_rescuer` join rescuer r using(rescuer_id) where mission_id='".$_SESSION['GetIdMission']."'and mission_rescuer.rescuer_function=1;";
$ResultGetMissionRescuersDriver=mysqli_query($conn,$GetMissionRescuersDriver);
$GetMissionRescuersLeader="SELECT `rescuer_id`, `mission_id`, `IsCreator`, mission_rescuer.rescuer_function, r.rescuer_nickname FROM `mission_rescuer` join rescuer r using(rescuer_id) where mission_id='".$_SESSION['GetIdMission']."'and mission_rescuer.rescuer_function=2;";
$ResultGetMissionRescuersLeader=mysqli_query($conn,$GetMissionRescuersLeader);
$GetMissionRescuersEMT="SELECT `rescuer_id`, `mission_id`, `IsCreator`, mission_rescuer.rescuer_function, r.rescuer_nickname FROM `mission_rescuer` join rescuer r using(rescuer_id) where mission_id='".$_SESSION['GetIdMission']."'and mission_rescuer.rescuer_function=3;";
$ResultGetMissionRescuersEMT=mysqli_query($conn,$GetMissionRescuersEMT);
//Get all Draft Rescuers
$GetAllMssionRescuer="SELECT * FROM `mission_rescuer` WHERE `mission_id`='".$_SESSION['GetIdMission']."'";
$resultGetAllMssionRescuer=mysqli_query($conn,$GetAllMssionRescuer);
/** */
    //itsyBitsySpider----->CancelMissionInsertion
    function CancelMission($mission_start_date,$mission_missionType,$mission_shift_code){
        require("DBconnection.inc.php");
        $query="update mission SET `mission_start_date`='".$mission_start_date."',    `mission_missionType`='".$mission_missionType."',
         `mission_shift_code`='".$mission_shift_code."',mission_Statuscode=3 where `mission_id`='".$_SESSION['GetIdMission']."'";
        $res=mysqli_query($conn,$query);
        mysqli_close($conn);
        return $res;
    }

        // update mission without locations 
    function updateMission($mission_start_date,$mission_end_date,$mission_initial_km,$mission_final_km,$remaining_E_tank,$remaining_D_tank,$remaining_M_tank,$mission_missionType,$mission_shift_code,$mission_ambulanceId,$UHFradioId_mission,$cmKitId_mission){
        require("DBconnection.inc.php");
        $updatequery="update `mission`set  `mission_start_date`='".$mission_start_date."'
                                     ,mission_end_date    ='".$mission_end_date."'
                                     ,`mission_initial_km` ='".$mission_initial_km."'
                                     , `mission_final_km`='".$mission_final_km."'
                                     , `remaining_E_tank`='".$remaining_E_tank."'
                                     , `remaining_D_tank`='".$remaining_D_tank."'
                                     , `remaining_M_tank`='".$remaining_M_tank."'
                                     , `mission_missionType`='".$mission_missionType."'
                                     , `mission_shift_code`='".$mission_shift_code."'
                                     , `mission_ambulanceId`='".$mission_ambulanceId."'
                                     , `UHFradioId_mission`='".$UHFradioId_mission."'
                                     , `cmKitId_mission`='".$cmKitId_mission."'
                                     ,mission_Statuscode=2 
                 where `mission_id`='".$_SESSION['GetIdMission']."'";
        $resupdate=mysqli_query($conn,$updatequery);
        mysqli_close($conn);
        return $resupdate;
    }
    // // add mission with locations
    function updateMission2($mission_start_date,$mission_end_date,$mission_initial_km,$mission_final_km,$remaining_E_tank,$remaining_D_tank,$remaining_M_tank,$mission_missionType,$mission_shift_code,$mission_ambulanceId,$UHFradioId_mission,$cmKitId_mission,$sourceCode,$destinationCode){
        require("DBconnection.inc.php");
        $updatequery="update `mission`set  `mission_start_date` ='".$mission_start_date."'
                                     ,mission_end_date          ='".$mission_end_date."'
                                     ,`mission_initial_km`      ='".$mission_initial_km."'
                                     , `mission_final_km`       ='".$mission_final_km."'
                                     , `remaining_E_tank`       ='".$remaining_E_tank."'
                                     , `remaining_D_tank`       ='".$remaining_D_tank."'
                                     , `remaining_M_tank`       ='".$remaining_M_tank."'
                                     , `mission_missionType`    ='".$mission_missionType."'
                                     , `mission_shift_code`     ='".$mission_shift_code."'
                                     , `mission_ambulanceId`    ='".$mission_ambulanceId."'
                                     , `UHFradioId_mission`     ='".$UHFradioId_mission."'
                                     , `cmKitId_mission`        ='".$cmKitId_mission."'
                                     ,`mission_addressCodeSrc`  ='".$sourceCode."'
                                     , `mission_addressCodeDest`='".$destinationCode."'
                                     ,mission_Statuscode        =2 
                 where `mission_id`='".$_SESSION['GetIdMission']."'";
        $resupdate=mysqli_query($conn,$updatequery);
        mysqli_close($conn);
        return $resupdate;
    }
    //insert Mission For poste and soin au centre type mission
    function updateMission3($mission_start_date,$mission_end_date,$remaining_E_tank,$remaining_D_tank,$remaining_M_tank,$mission_missionType,$mission_shift_code,$UHFradioId_mission,$cmKitId_mission){
        require("DBconnection.inc.php");
        $updatequery="update `mission`set  `mission_start_date`='".$mission_start_date."'
                                     ,mission_end_date    ='".$mission_end_date."'
                                     , `remaining_E_tank`='".$remaining_E_tank."'
                                     , `remaining_D_tank`='".$remaining_D_tank."'
                                     , `remaining_M_tank`='".$remaining_M_tank."'
                                     , `mission_missionType`='".$mission_missionType."'
                                     , `mission_shift_code`='".$mission_shift_code."'
                                     , `UHFradioId_mission`='".$UHFradioId_mission."'
                                     , `cmKitId_mission`='".$cmKitId_mission."'
                                     ,mission_Statuscode=2 
                 where `mission_id`='".$_SESSION['GetIdMission']."'";
        $res=mysqli_query($conn,$updatequery);
        mysqli_close($conn);
        return $res;
    }

    // // add mission without locations 
    // function addMission($mission_id,$mission_start_date,$mission_initial_km,$mission_final_km,$remaining_E_tank,$remaining_D_tank,$remaining_M_tank,$mission_missionType,$mission_shift_code,$mission_ambulanceId,$UHFradioId_mission,$cmKitId_mission){
    //     require("DBconnection.inc.php");
    //     $query="INSERT INTO `mission`(`mission_id`, `mission_start_date`,  `mission_initial_km`, `mission_final_km`,
    //  `remaining_E_tank`, `remaining_D_tank`, `remaining_M_tank`, `mission_missionType`, `mission_shift_code`, `mission_ambulanceId`, `UHFradioId_mission`, `cmKitId_mission`,mission_Statuscode ) 
    //             VALUES ('".$mission_id."','".$mission_start_date."','".$mission_initial_km."','".$mission_final_km."','".$remaining_E_tank."','".$remaining_D_tank."','$remaining_M_tank','".$mission_missionType."','".$mission_shift_code."','".$mission_ambulanceId."','".$UHFradioId_mission."','".$cmKitId_mission."',2)";
    //     $res=mysqli_query($conn,$query);
    //     mysqli_close($conn);
    //     return $res;
    // }
    //     // add mission without locations& Ambulances & mileage
    //     function addMission3($mission_id,$mission_start_date,$remaining_E_tank,$remaining_D_tank,$remaining_M_tank,$mission_missionType,$mission_shift_code,$UHFradioId_mission,$cmKitId_mission){
    //         require("DBconnection.inc.php");
    //         $query="INSERT INTO `mission`(`mission_id`, `mission_start_date`,  `remaining_E_tank`, `remaining_D_tank`, `remaining_M_tank`, `mission_missionType`, `mission_shift_code`,  `UHFradioId_mission`, `cmKitId_mission`,mission_Statuscode ) 
    //                 VALUES ('".$mission_id."','".$mission_start_date."','".$remaining_E_tank."','".$remaining_D_tank."','$remaining_M_tank','".$mission_missionType."','".$mission_shift_code."','".$UHFradioId_mission."','".$cmKitId_mission."',2)";
    //         $res=mysqli_query($conn,$query);
    //         mysqli_close($conn);
    //         return $res;
    //     }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // // add mission with locations
    // function addMission2($mission_id,$mission_start_date,$mission_initial_km,$mission_final_km,$remaining_E_tank,$remaining_D_tank,$remaining_M_tank,$mission_missionType,$mission_shift_code,$mission_ambulanceId,$UHFradioId_mission,$cmKitId_mission,$sourceCode,$destinationCode){
    //     require("DBconnection.inc.php");
    //     $query="INSERT INTO `mission`(`mission_id`, `mission_start_date`,  `mission_initial_km`, `mission_final_km`, `remaining_E_tank`, `remaining_D_tank`, `remaining_M_tank`, `mission_missionType`, `mission_shift_code`, `mission_ambulanceId`, `UHFradioId_mission`, `cmKitId_mission`,`mission_addressCodeSrc`, `mission_addressCodeDest`,mission_Statuscode ) 
    //             VALUES ('".$mission_id."','".$mission_start_date."','".$mission_initial_km."','".$mission_final_km."','".$remaining_E_tank."','".$remaining_D_tank."','$remaining_M_tank','".$mission_missionType."','".$mission_shift_code."','".$mission_ambulanceId."','".$UHFradioId_mission."','".$cmKitId_mission."','".$sourceCode."','".$destinationCode."',2)";
    //     $res=mysqli_query($conn,$query);
    //     mysqli_close($conn);
    //     return $res;
    // }
    // ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    

    //add patient
    function addPatient($patient_firstName,$patient_lastName,$patient_dateOfBirth,$patient_nationality){
        require("DBconnection.inc.php");
        $query="INSERT INTO `patient`(`patient_firstName`, `patient_lastName`, `patient_dateOfBirth`, `patient_nationality`) 
                VALUES ('".$patient_firstName."','".$patient_lastName."','".$patient_dateOfBirth."','".$patient_nationality."')";
        $res=mysqli_query($conn,$query);
        mysqli_close($conn);
        return $res;
    }

    // // get mission id
    // function getIdMission(){
    //     $today=date("Y-m-d");
    //     require("DBconnection.inc.php");
    //     $query="SELECT `mission_id` FROM mission WHERE `mission_start_date`='".$today."'";
    //     $res=mysqli_query($conn,$query);
    //     mysqli_close($conn);
    //     return $res;
    // }

    // get last patient id 
    function getLastPatientId(){
        require("DBconnection.inc.php");
        $query="SELECT `patient_id` FROM `patient`";
        $res=mysqli_query($conn,$query);
        mysqli_close($conn);
        return $res;
    }

    // get last address id 
    function getLastAddressId(){
        require("DBconnection.inc.php");
        $query="SELECT `address_code` FROM `address`";
        $res=mysqli_query($conn,$query);
        mysqli_close($conn);
        return $res;
    }

    // patient mission           
    function patientMission($patient_id,$patient_relativeName){
        require("DBconnection.inc.php");
        $query="INSERT INTO `patient_mission`(`patient_id`, `mission_id`, `patient_relativeName`) 
                VALUES ('".$patient_id."','".$_SESSION['GetIdMission']."','".$patient_relativeName."')";
        $res=mysqli_query($conn,$query);
        mysqli_close($conn);
        return $res;
    }

    //Delete old PatientMission
                  
    function DeleteExistingpatientMission($patient_id){
        require("DBconnection.inc.php");
        $query="DELETE FROM `patient_mission` WHERE 
                  `mission_id`='".$_SESSION['GetIdMission']."' and `patient_id`=".$patient_id;
        $res=mysqli_query($conn,$query);
        mysqli_close($conn);
        return $res;
    }


    // insert adress    
    function addAddress($address,$city_id){
        require("DBconnection.inc.php");
        $query="INSERT INTO `address`(`Address_desc`, `Is_hospital`, `Is_event`, `Address_city`) 
                VALUES ('".$address."','0','0','".$city_id."')";
        $res=mysqli_query($conn,$query);
        mysqli_close($conn);
        return $res;
    }

    // insert into mission_mediacal_case
    function insertintoMissionMedCase($medCase_id){    
        require("DBconnection.inc.php");
        $query="INSERT INTO `mission_medical_case`(`mission_MedicalCase_code`, `mission_missionId`) 
                VALUES ('".$medCase_id."','".$_SESSION['GetIdMission']."')";
        $res=mysqli_query($conn,$query);
        mysqli_close($conn);
        return $res;
    }
    //insert into mission_rescuer
    function insertintoMissionRescuer($rescuer_id,$rescuer_function,$RescuerRole){    
        require("DBconnection.inc.php");
        $query="INSERT INTO `mission_rescuer`(`rescuer_id`, `mission_id`, `rescuer_function`,`IsCreator`) 
                VALUES ('".$rescuer_id."','".$_SESSION['GetIdMission']."','".$rescuer_function."','".$RescuerRole."')";
        $res=mysqli_query($conn,$query);
        mysqli_close($conn);
        return $res;
    }
    //Delete old rescuers
    function DeleteOldMissionRescuer($rescuer_id){    
        require("DBconnection.inc.php");
        $query="DELETE FROM `mission_rescuer` 
                WHERE  `mission_id`='".$_SESSION['GetIdMission']."' and `rescuer_id`=".$rescuer_id ;
        $res=mysqli_query($conn,$query);
        mysqli_close($conn);
        return $res;
    }
    //insert creator
    function insertCreator($rescuer_id){
        require("DBconnection.inc.php");
        $query="INSERT INTO `mission_rescuer`(`rescuer_id`, `mission_id`, `rescuer_function`,`IsCreator`) 
                VALUES ('".$rescuer_id."','".$_SESSION['GetIdMission']."','0','1')";
        $res=mysqli_query($conn,$query);
        mysqli_close($conn);
        return $res; 
    }

    //add new med case
    function addMedicalCase($new_med_case){
        require("DBconnection.inc.php");
        $query="INSERT INTO `medical_case`(`medicalCase_desc`) 
                VALUES ('".$new_med_case."')";
        $res=mysqli_query($conn,$query);
        mysqli_close($conn);
        return $res;
    }
    // get last id med case
    function getLastMedCaseId(){
        require("DBconnection.inc.php");
        $query="SELECT `medicalCase_code` FROM `medical_case`";
        $res=mysqli_query($conn,$query);
        mysqli_close($conn);
        return $res;
    }

    // delete old medical case
    function Deletealreadyinserted($medMission){
        require("DBconnection.inc.php");
        $query="DELETE FROM `mission_medical_case` WHERE `mission_missionId`='".$_SESSION['GetIdMission']."' and `mission_MedicalCase_code`=".$medMission."";
        $res=mysqli_query($conn,$query);
        mysqli_close($conn);
        return $res;
}
    // update ambulance final km
    function updateAmbFinalKm($ambId,$finalKM){
        require("DBconnection.inc.php");
        $query="UPDATE `ambulance` SET `ambulance_final_km`=".$finalKM." WHERE `ambulance_id`=".$ambId;
        $res=mysqli_query($conn,$query);
        mysqli_close($conn);
        return $res;
    }
    //Get last initial ambulance km
    $GetLastkm="SELECT `ambulance_id`, max(mission_final_km) as maxKM, `mission_id` FROM `allambulance` WHERE ambulance_id in (select `ambulance_id` from ambulance) group by ambulance_id;";
    $ResGetLastkm=mysqli_query($conn,$GetLastkm);
?>