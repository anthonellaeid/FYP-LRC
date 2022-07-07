<?php
    require("DBconnection.inc.php");


    // get mission type
    $query1="SELECT * FROM `mission_type`";
    $result1=mysqli_query($conn,$query1);

    // get medical case
    $query2="SELECT * FROM `medical_case`";
    $result2=mysqli_query($conn,$query2);

    // get ambulance
    $query3="SELECT * FROM `ambulance` WHERE ambulance_description is not null AND ambulance_status_code=1";
    $result3=mysqli_query($conn,$query3);

    // get drivers
    $query4="SELECT * FROM `rescuer` WHERE rescuer_function=1 and rescuerDate_left is null";// $query4="SELECT * FROM `rescuer` WHERE rescuer_function=1";
    $result4=mysqli_query($conn,$query4);

    // get leaders
    $query5="SELECT * FROM `rescuer` WHERE rescuer_function !=3 and rescuerDate_left is null";// $query5="SELECT * FROM `rescuer` WHERE rescuer_function !=3";
    $result5=mysqli_query($conn,$query5);

    // get EMTs
    $query6="SELECT * FROM `rescuer` where rescuerDate_left is null";// $query6="SELECT * FROM `rescuer`";
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

    //itsyBitsySpider----->CancelMissionInsertion
    function CancelMission($mission_id,$mission_start_date,$mission_missionType,$mission_shift_code){
        require("DBconnection.inc.php");
        // "INSERT INTO `mission`(`mission_id`, `mission_start_date`,    `mission_missionType`, `mission_shift_code`,mission_Statuscode ) 
        // VALUES ('".$firstsection."/".$max."','".$StartDate."','".$missionType."','".$equipe."',3)";
        $query="INSERT INTO `mission`(`mission_id`, `mission_start_date`,    `mission_missionType`, `mission_shift_code`,mission_Statuscode ) 
                VALUES ('".$mission_id."','".$mission_start_date."','".$mission_missionType."','".$mission_shift_code."',3)";
        $res=mysqli_query($conn,$query);
        mysqli_close($conn);
        return $res;
    }

    // add mission without locations 
    function addMission($mission_id,$mission_start_date,$mission_initial_km,$mission_final_km,$remaining_E_tank,$remaining_D_tank,$remaining_M_tank,$mission_missionType,$mission_shift_code,$mission_ambulanceId,$UHFradioId_mission,$cmKitId_mission){
        require("DBconnection.inc.php");
        $query="INSERT INTO `mission`(`mission_id`, `mission_start_date`,  `mission_initial_km`, `mission_final_km`, `remaining_E_tank`, `remaining_D_tank`, `remaining_M_tank`, `mission_missionType`, `mission_shift_code`, `mission_ambulanceId`, `UHFradioId_mission`, `cmKitId_mission`,mission_Statuscode ) 
                VALUES ('".$mission_id."','".$mission_start_date."','".$mission_initial_km."','".$mission_final_km."','".$remaining_E_tank."','".$remaining_D_tank."','$remaining_M_tank','".$mission_missionType."','".$mission_shift_code."','".$mission_ambulanceId."','".$UHFradioId_mission."','".$cmKitId_mission."',2)";
        $res=mysqli_query($conn,$query);
        mysqli_close($conn);
        return $res;
    }
        // add mission without locations& Ambulances & mileage
        function addMission3($mission_id,$mission_start_date,$remaining_E_tank,$remaining_D_tank,$remaining_M_tank,$mission_missionType,$mission_shift_code,$UHFradioId_mission,$cmKitId_mission){
            require("DBconnection.inc.php");
            $query="INSERT INTO `mission`(`mission_id`, `mission_start_date`,  `remaining_E_tank`, `remaining_D_tank`, `remaining_M_tank`, `mission_missionType`, `mission_shift_code`,  `UHFradioId_mission`, `cmKitId_mission`,mission_Statuscode ) 
                    VALUES ('".$mission_id."','".$mission_start_date."','".$remaining_E_tank."','".$remaining_D_tank."','$remaining_M_tank','".$mission_missionType."','".$mission_shift_code."','".$UHFradioId_mission."','".$cmKitId_mission."',2)";
            $res=mysqli_query($conn,$query);
            mysqli_close($conn);
            return $res;
        }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // add mission with locations
    function addMission2($mission_id,$mission_start_date,$mission_initial_km,$mission_final_km,$remaining_E_tank,$remaining_D_tank,$remaining_M_tank,$mission_missionType,$mission_shift_code,$mission_ambulanceId,$UHFradioId_mission,$cmKitId_mission,$sourceCode,$destinationCode){
        require("DBconnection.inc.php");
        $query="INSERT INTO `mission`(`mission_id`, `mission_start_date`,  `mission_initial_km`, `mission_final_km`, `remaining_E_tank`, `remaining_D_tank`, `remaining_M_tank`, `mission_missionType`, `mission_shift_code`, `mission_ambulanceId`, `UHFradioId_mission`, `cmKitId_mission`,`mission_addressCodeSrc`, `mission_addressCodeDest`,mission_Statuscode ) 
                VALUES ('".$mission_id."','".$mission_start_date."','".$mission_initial_km."','".$mission_final_km."','".$remaining_E_tank."','".$remaining_D_tank."','$remaining_M_tank','".$mission_missionType."','".$mission_shift_code."','".$mission_ambulanceId."','".$UHFradioId_mission."','".$cmKitId_mission."','".$sourceCode."','".$destinationCode."',2)";
        $res=mysqli_query($conn,$query);
        mysqli_close($conn);
        return $res;
    }
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    

    //add patient
    function addPatient($patient_firstName,$patient_lastName,$patient_dateOfBirth,$patient_nationality){
        require("DBconnection.inc.php");
        $query="INSERT INTO `patient`(`patient_firstName`, `patient_lastName`, `patient_dateOfBirth`, `patient_nationality`) 
                VALUES ('".$patient_firstName."','".$patient_lastName."','".$patient_dateOfBirth."','".$patient_nationality."')";
        $res=mysqli_query($conn,$query);
        mysqli_close($conn);
        return $res;
    }

    // get mission id
    function getIdMission($startd){
        require("DBconnection.inc.php");
        $query="SELECT mission_id FROM mission WHERE Date(mission_start_date)='".$startd."'";
        $res=mysqli_query($conn,$query);
        mysqli_close($conn);
        return $res;
    }

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
    function patientMission($patient_id,$mission_id,$patient_relativeName){
        require("DBconnection.inc.php");
        $query="INSERT INTO `patient_mission`(`patient_id`, `mission_id`, `patient_relativeName`) 
                VALUES ('".$patient_id."','".$mission_id."','".$patient_relativeName."')";
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
    function insertintoMissionMedCase($medCase_id,$mission_id){    
        require("DBconnection.inc.php");
        $query="INSERT INTO `mission_medical_case`(`mission_MedicalCase_code`, `mission_missionId`) 
                VALUES ('".$medCase_id."','".$mission_id."')";
        $res=mysqli_query($conn,$query);
        mysqli_close($conn);
        return $res;
    }

    // insert into mission_rescuer
    function insertintoMissionRescuer($rescuer_id,$mission_id,$rescuer_function,$RescuerRole){    
        require("DBconnection.inc.php");
        $query="INSERT INTO `mission_rescuer`(`rescuer_id`, `mission_id`, `rescuer_function`,`IsCreator`) 
                VALUES ('".$rescuer_id."','".$mission_id."','".$rescuer_function."','".$RescuerRole."')";
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


?>