<?php
  session_start();
  $rescuerId=$_SESSION["rescuer_id"];
  if (!isset($_SESSION['User'])) {
      header("Location:LogIn.php");
  }?>
 <?php
    require("PcrModel.php");

    echo "mission type  ........      ".$_POST["mission_type"]."<br>";
    // echo $_POST["medical_case"];
    // echo $_POST["sourcetype"];
    // echo $_POST["desttype"];

    

    // echo $_POST["patient_firstname"];
    // echo $_POST["patient_lastname"];
    // echo $_POST["patient_dateofbirth"];
    // echo $_POST["patient_nationality"];
    // echo $_POST["patient_relativename"];
    
    // echo $_POST["cm_kit"];
    // echo $_POST["uhf_radio"];
    // echo $_POST["etank"];
    // echo $_POST["dtank"];
    // echo $_POST["mtank"];

    // echo $_POST["ambulance"];
    // echo $_POST["driver"];
    // echo $_POST["leader"];
    // echo $_POST["emt"];
    // // echo $_POST["initial_mileage"];
    // // echo $_POST["final_mileage"];

    




    $dropdownsrc=$_POST["source"];      
    $dropdowndest=$_POST["destination"];        // echo "!!!!!!!!!!!!  ".$dropdownsrc.".......".$dropdowndest."  !!!!!!!!!!!!!!";
    $srctxt=$_POST["srctxt"];           
    $desttxt=$_POST["desttxt"];                     // if($dropdownsrc!=''){echo " DROPDOWN SOURCE NOT NULL";}
    
    
    if($desttxt==''){
        echo "EMPTY TXT destination THEN NO INSERT TO ADDRESS";
    }else{
        echo $desttxt;
        $select_city2=$_POST["select_city2"];
        if($select_city2!=''){
            $a=addAddress($desttxt,$select_city2);
            if($a){
                echo " New dest address inserted in  ".$select_city2.".........";
            }
        }
    }


    // max id adress + 1
    $maxidaddress=0;
    $allidaddress=getLastAddressId();
    while($s=mysqli_fetch_array($allidaddress)){
        if($maxidaddress<$s['address_code']){
            $maxidaddress=$s['address_code'];
            echo "<br>maximum id adress = ".$maxidaddress." ================!!!!!!!!!!!!!<br>";
        }
    }
    // $maxidaddress++;

    echo " DATE AND TIME --------------DAY---   ".$_POST["currentDay"]."  -------HOUR-----".$_POST["currentHour"];
    $manualDate=$_POST["currentDay"]." ".$_POST["currentHour"].":00";
    echo "<br>  manual date ".$manualDate."   <br>";
    if(isset($_POST['currentDay']) && isset($_POST['currentHour'])){
        $startd=htmlspecialchars($_POST['currentDay']);
        $stratd=mysqli_real_escape_string($conn,$startd);
        $startT=htmlspecialchars($_POST['currentHour']);
        $startT=mysqli_real_escape_string($conn,$startT);
    
        $StartDate=$startd." ".$startT;
        echo "StartDate: ".$StartDate;
    }
    $n=explode('-',$startd);
    $firstsection=$n[0].$n[1].$n[2];
    $max=0;
    $ids=getIdMission($startd);
    while($s=mysqli_fetch_array($ids)){
        echo "<br>GET Last Mission<br>";
        $a = explode("/", $s['mission_id']);
        echo $s['mission_id'],"<br>";
        if($a[1] > $max){
            $max=$a[1];     
        }
    }
    $max++;

    // if not empty
    echo "<br>emt 1 ....................................................................    ".$_POST["emt"]."<br>";
    echo "emt 2 ....................................................................    ".$_POST["emt2"]."<br>";
    echo "emt 3 ....................................................................    ".$_POST["emt3"]."<br>";

/////////////////////////////////////////////////////////////////////////////////////////////////

    echo "dropdown source  .......    ".$dropdownsrc."<br>"; // dropdown source
    echo "dropdown destination  .......    ".$dropdowndest."<br>"; // dropdown destination
    echo "textarea source  .......    ".$srctxt."<br>";  // textarea source
    echo "textarea destination  .......    ".$desttxt."<br>"; // textarea destination
    echo "<br><br>------------------------------------------------------<br>";

    // echo "mission type  ........      ".$_POST["mission_type"]."<br>";

    // if($_POST["mission_type"]==5){
    //     echo "POSTE";

    // }
    if($_POST["mission_type"]==4){
        echo "care given at station";

        if( isset($_POST["savebtn"]) && !empty($_POST["etank"]) && !empty($_POST["dtank"]) && !empty($_POST["mtank"]) && !empty($_POST["mission_type"]) && !empty($_POST["uhf_radio"]) && !empty($_POST["cm_kit"]) ){
            $equipe=$_POST['shift'];
            $c=addMission3($firstsection.'/'.$max,$manualDate,$_POST["etank"],$_POST["dtank"],$_POST["mtank"],4,$equipe,$_POST["uhf_radio"],$_POST["cm_kit"]);
            
                    echo "<br>RRRRRRRRRRRRRRRRRRRRRRRRRRRRR<br>";
                    if ($c && !empty($_POST["medical_case"])) {
                        echo "<ul>";
                        foreach ($_POST["medical_case"] as $value) {
                            $h=insertintoMissionMedCase($value,$firstsection.'/'.$max);
                            echo "<li>$value</li>";
                            if($h){
                                echo "<br>----------- MissionMedCase inserted ------------<br>";
                            }
                        }
                        echo "</ul>";
                    }
                    echo "<br>RRRRRRRRRRRRRRRRRRRRRRRRRRRRR<br>";
        }
    }else{

        // if($_POST["mission_type"]==5){
        //     echo "POSTE";

        //             if( isset($_POST["savebtn"]) && !empty($_POST["etank"]) && !empty($_POST["dtank"]) && !empty($_POST["mtank"]) && !empty($_POST["uhf_radio"]) && !empty($_POST["cm_kit"]) ){
        //                 // $initialmileage=NULL;
        //                 // $finalmileage=NULL;
        //                 // $ambul=NULL;
        //                 // $dropdownsrc=NULL;      
        //                 // $dropdowndest=NULL;        
        //                 // $srctxt=NULL;           
        //                 // $desttxt=NULL; 

        //                 // if(!empty($_POST["initial_mileage"])){
        //                 //     $initialmileage=$_POST["initial_mileage"];
        //                 // }
        //                 // if(!empty($_POST["final_mileage"])){
        //                 //     $finalmileage=$_POST["final_mileage"];
        //                 // }
        //                 // if(($_POST["initial_mileage"])==""||empty($_POST["initial_mileage"])){
        //                 //     $initialmileage=NULL;
        //                 // }
        //                 // if(($_POST["final_mileage"])==""||empty($_POST["final_mileage"])){
        //                 //     $finalmileage=NULL;
        //                 // }

                        
                        
        //                 if(!empty($_POST["ambulance"])){
        //                     $ambul=$_POST["ambulance"];
        //                 }
        //                 if(($_POST["ambulance"])==""){
        //                     $ambul=NULL;
        //                 }
        //                 if($ambul==NULL){
        //                     echo " ambulance is null ";
        //                 }


        //                 $equipe=$_POST['shift'];
                        
        //                 if($dropdownsrc=='' && $dropdowndest==''){
        //                     if($srctxt!='' && $desttxt!=''){
        //                         $srcTxtAddress=$maxidaddress;
        //                         $destTxtAddress=$srcTxtAddress++;
        //                         $c=addMission2($firstsection.'/'.$max,$manualDate,$_POST["initial_mileage"],$_POST["final_mileage"],$_POST["etank"],$_POST["dtank"],$_POST["mtank"],$_POST["mission_type"],$equipe,$ambul,$_POST["uhf_radio"],$_POST["cm_kit"],$srcTxtAddress,$destTxtAddress);
        //                     }
    
        //                 }else{
        //                     if($dropdownsrc!='' && $dropdowndest==''){
        //                         if($desttxt!=''){
        //                             $c=addMission2($firstsection.'/'.$max,$manualDate,$_POST["initial_mileage"],$_POST["final_mileage"],$_POST["etank"],$_POST["dtank"],$_POST["mtank"],$_POST["mission_type"],$equipe,$ambul,$_POST["uhf_radio"],$_POST["cm_kit"],$dropdownsrc,$maxidaddress);
        //                         }
        //                     }else{
        //                         if($dropdownsrc=='' && $dropdowndest!=''){
        //                             if($srctxt!=''){
        //                                 $maxidaddress++;
        //                                 $c=addMission2($firstsection.'/'.$max,$manualDate,$_POST["initial_mileage"],$_POST["final_mileage"],$_POST["etank"],$_POST["dtank"],$_POST["mtank"],$_POST["mission_type"],$equipe,$ambul,$_POST["uhf_radio"],$_POST["cm_kit"],$maxidaddress,$dropdowndest);
        //                             }
        //                         }else{
        //                             if($dropdownsrc!='' && $dropdowndest!=''){
        //                                 $c=addMission2($firstsection.'/'.$max,$manualDate,$_POST["initial_mileage"],$_POST["final_mileage"],$_POST["etank"],$_POST["dtank"],$_POST["mtank"],$_POST["mission_type"],$equipe,$ambul,$_POST["uhf_radio"],$_POST["cm_kit"],$dropdownsrc,$dropdowndest);
        //                             }
        //                         }
        //                     }
        //                 }
        //                 echo "<br>RRRRRRRRRRRRRRRRRRRRRRRRRRRRR<br>";
        //                 if ($c && !empty($_POST["medical_case"])) {
        //                     echo "<ul>";
        //                     foreach ($_POST["medical_case"] as $value) {
        //                         $h=insertintoMissionMedCase($value,$firstsection.'/'.$max);
        //                         echo "<li>$value</li>";
        //                         if($h){
        //                             echo "<br>----------- MissionMedCase inserted ------------<br>";
        //                         }
        //                     }
        //                     echo "</ul>";
        //                 }
        //                 echo "<br>RRRRRRRRRRRRRRRRRRRRRRRRRRRRRboooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo<br>";
                    
        //         }
        // }else{
        


            //insert mission
            if($_POST["mission_type"]!=4 && isset($_POST["savebtn"]) && !empty($_POST["initial_mileage"]) && !empty($_POST["final_mileage"]) && !empty($_POST["etank"]) && !empty($_POST["dtank"]) && !empty($_POST["mtank"]) && !empty($_POST["mission_type"]) && !empty($_POST["ambulance"]) && !empty($_POST["uhf_radio"]) && !empty($_POST["cm_kit"]) ){
                
                if($_POST["initial_mileage"]<=$_POST["final_mileage"]){
                    

                    $equipe=$_POST['shift'];

                    if($dropdownsrc=='' && $dropdowndest==''){
                        if($srctxt!='' && $desttxt!=''){
                            $srcTxtAddress=$maxidaddress;
                            $destTxtAddress=$srcTxtAddress++;
                            $c=addMission2($firstsection.'/'.$max,$manualDate,$_POST["initial_mileage"],$_POST["final_mileage"],$_POST["etank"],$_POST["dtank"],$_POST["mtank"],$_POST["mission_type"],$equipe,$_POST["ambulance"],$_POST["uhf_radio"],$_POST["cm_kit"],$srcTxtAddress,$destTxtAddress);
                        }

                    }else{
                        if($dropdownsrc!='' && $dropdowndest==''){
                            if($desttxt!=''){
                                $c=addMission2($firstsection.'/'.$max,$manualDate,$_POST["initial_mileage"],$_POST["final_mileage"],$_POST["etank"],$_POST["dtank"],$_POST["mtank"],$_POST["mission_type"],$equipe,$_POST["ambulance"],$_POST["uhf_radio"],$_POST["cm_kit"],$dropdownsrc,$maxidaddress);
                            }
                        }else{
                            if($dropdownsrc=='' && $dropdowndest!=''){
                                if($srctxt!=''){
                                    $maxidaddress++;
                                    $c=addMission2($firstsection.'/'.$max,$manualDate,$_POST["initial_mileage"],$_POST["final_mileage"],$_POST["etank"],$_POST["dtank"],$_POST["mtank"],$_POST["mission_type"],$equipe,$_POST["ambulance"],$_POST["uhf_radio"],$_POST["cm_kit"],$maxidaddress,$dropdowndest);
                                }
                            }else{
                                if($dropdownsrc!='' && $dropdowndest!=''){
                                    $c=addMission2($firstsection.'/'.$max,$manualDate,$_POST["initial_mileage"],$_POST["final_mileage"],$_POST["etank"],$_POST["dtank"],$_POST["mtank"],$_POST["mission_type"],$equipe,$_POST["ambulance"],$_POST["uhf_radio"],$_POST["cm_kit"],$dropdownsrc,$dropdowndest);
                                }
                            }
                        }
                    }

                            echo "<br>RRRRRRRRRRRRRRRRRRRRRRRRRRRRR<br>";
                            if ($c && !empty($_POST["medical_case"])) {
                                echo "<ul>";
                                foreach ($_POST["medical_case"] as $value) {
                                    $h=insertintoMissionMedCase($value,$firstsection.'/'.$max);
                                    echo "<li>$value</li>";
                                    if($h){
                                        echo "<br>----------- MissionMedCase inserted ------------<br>";
                                    }
                                }
                                echo "</ul>";
                            }
                            echo "<br>RRRRRRRRRRRRRRRRRRRRRRRRRRRRR<br>";

                }
            } 
        }
    //     else    {
    //     echo "can't insert mission";
    // }
    // }
//////////itsyBitsySpider----->
    // if(isset($_POST["savebtn"]) && empty($_POST["initial_mileage"]) && empty($_POST["final_mileage"]) && empty($_POST["ambulance"]))
    //     {
    //         if($dropdownsrc=='' && $dropdowndest=='' && $srctxt=='' && $desttxt==''){
    //              $c=addMission3($n.'/'.$max,date('Y-m-d'),$_POST["initial_mileage"],$_POST["final_mileage"],$_POST["etank"],$_POST["dtank"],$_POST["mtank"],$_POST["mission_type"],"EDJ",$_POST["ambulance"],$_POST["uhf_radio"],$_POST["cm_kit"]);
    //         }
    //     } else     {
    //         echo "can't insert mission";
    //     }
    
    if($c){
        echo "MISSION";
    }

    $exist=0;
    //insert patient
    if(!empty($_POST["patient_firstname"]) && !empty($_POST["patient_lastname"]) && !empty($_POST["patient_dateofbirth"]) && !empty($_POST["patient_nationality"]) ){
        //---------------
        while($s=mysqli_fetch_array($result14)){
            if($s['patient_firstName']==$_POST["patient_firstname"] && $s['patient_lastName']==$_POST["patient_lastname"] && $s['patient_dateOfBirth']==$_POST["patient_dateofbirth"] && $s['patient_nationality']==$_POST["patient_nationality"]){
                $exist=$s['patient_id'];
                continue;
            }
        }
        mysqli_data_seek( $result14, 0 );
        if($exist==0){
            $d=addPatient($_POST["patient_firstname"],$_POST["patient_lastname"],$_POST["patient_dateofbirth"],$_POST["patient_nationality"]);
        }  
        //---------------
    }
    if($d){
        echo "PATIENT1 Inserted :)))";
    }

    //insert patient_mission
    if($c && $d){
        echo "c & d ";
        $maxid=0;
        $idpts=getLastPatientId();
        while($s=mysqli_fetch_array($idpts)){
            if($maxid<$s['patient_id']){
                $maxid=$s['patient_id'];
            }
        }
        
        echo "<br><br><br><br>********  ".$maxid." *******<br><br><br><br>";
        $e=patientMission($maxid++,$firstsection.'/'.$max,$_POST["patient_relativename"]);
        if($e){
            echo "GOAL";
        }
    }

    /////////////////////
    if($c && $exist>0){
        echo "c & patient exist ";
        $k=patientMission($exist,$firstsection.'/'.$max,$_POST["patient_relativename"]);
        if($k){
            echo "GOAL";
        }
    }
    //////////////////

    if($srctxt==''){
        echo "EMPTY TXT SOURCE THEN NO INSERT TO ADDRESS";
    }else{
        echo $srctxt;
        $select_city1=$_POST["select_city1"];
        if($select_city1!=''){
            $a=addAddress($srctxt,$select_city1);
            if($a){
                echo " New src address inserted in  ".$select_city1.".........";

            }
        }
    }

    $exist2=0;
    if(!empty($_POST["patient_firstname2"]) && !empty($_POST["patient_lastname2"]) && !empty($_POST["patient_dateofbirth2"]) && !empty($_POST["patient_nationality2"])){
        //---------------
        while($s=mysqli_fetch_array($result14)){
            if($s['patient_firstName']==$_POST["patient_firstname2"] && $s['patient_lastName']==$_POST["patient_lastname2"] && $s['patient_dateOfBirth']==$_POST["patient_dateofbirth2"] && $s['patient_nationality']==$_POST["patient_nationality2"]){
                $exist2=$s['patient_id'];
                continue;
            }
        }
        mysqli_data_seek( $result14, 0 );
        if($exist2==0){
            $f=addPatient($_POST["patient_firstname2"],$_POST["patient_lastname2"],$_POST["patient_dateofbirth2"],$_POST["patient_nationality2"]);
        }
        //---------------
    }
    if($f){
        echo "PATIENT 2 inserted :)))";
    }
    if($c && $f){
        echo "c & f ";
        $maxid2=0;
        $idpts2=getLastPatientId();
        while($s=mysqli_fetch_array($idpts2)){
            if($maxid2<$s['patient_id']){
                $maxid2=$s['patient_id'];
            }
        }
        
        echo "<br><br><br><br>********  ".$maxid2." *******<br><br><br><br>";
        $g=patientMission($maxid2++,$firstsection.'/'.$max,$_POST["patient_relativename2"]);
        if($g){
            echo "GOAL2";
        }
    }
    /////////////////////
    if($c && $exist2>0){
        echo "c & patient2 exist ";
        $l=patientMission($exist2,$firstsection.'/'.$max,$_POST["patient_relativename2"]);
        if($l){
            echo "GOAL2";
        }
    }
    //////////////////
  //itsyBitsySpider-----> car  driver est obligatoire mais emt or leader ne le sont pas
//insert into mission_rescuer
//
    //insert  Leader and Driver
    if($c && !empty($_POST["driver"]) ){
        if($_POST["driver"]==$_SESSION["rescuer_id"]){echo " this driver:".$_POST["driver"]." is the creator***"; $DriverRole=1;}
        else{$DriverRole=0;}
        $m=insertintoMissionRescuer($_POST["driver"],$firstsection.'/'.$max,1,$DriverRole);
        echo "<br>";
        if($m){
            echo "MM";
        }
        echo "<br>";
    }
    if($c && !empty($_POST["leader"]) ){
        
        if($_POST["leader"]==$_SESSION["rescuer_id"]){echo " this leader:".$_POST["leader"]." is the creator***"; $leaderRole=1;}
        else{$leaderRole=0;}
        $p=insertintoMissionRescuer($_POST["leader"],$firstsection.'/'.$max,2,$leaderRole);
        echo "<br>";
        if($p){
            echo "PP";
        }
        echo "<br>";
    }
    //
    //insert EMT
    if($c && !empty($_POST["emt"])){
        if($_POST["emt"]==$_SESSION["rescuer_id"]){echo " this EMT:".$_POST["emt"]." is the creator***"; $emtRole=1;}
        else{$emtRole=0;}
        $o=insertintoMissionRescuer($_POST["emt"],$firstsection.'/'.$max,3,$emtRole);
        echo "<br>";
        if($o){
            echo "OO";
        }
        echo "<br>";
    }
    // insert emt2
    if($c && !empty($_POST["emt2"])){    
        if($_POST["emt2"]==$_SESSION["rescuer_id"]){echo " this EMT:".$_POST["emt2"]." is the creator***"; $emtRole=1;}
        else{$emtRole=0;}
        $x=insertintoMissionRescuer($_POST["emt2"],$firstsection.'/'.$max,3,$emtRole);
        echo "<br>";
        if($x){
            echo "XX";
        }
        echo "<br>";
    }
    // insert emt3
    if($c && !empty($_POST["emt3"])){    
        if($_POST["emt3"]==$_SESSION["rescuer_id"]){echo " this EMT:".$_POST["emt3"]." is the creator***"; $emtRole=1;}
        else{$emtRole=0;}
        $y=insertintoMissionRescuer($_POST["emt3"],$firstsection.'/'.$max,3,$emtRole);
        echo "<br>";
        if($y){
            echo "YY";
        }
        echo "<br>";
    }

//
        

    
//
    
    echo "aaaaaaaaaa  ";
    if (!empty($_POST["medcasetxt"])){
        echo " <br>medcasetxt is NOT empty<br>";
    }else{
        echo "<br>medcasetxt is empty<br>";
    }
    echo "aaaaaaaaa";

    if($c && !empty($_POST["medcasetxt"])){
        echo "<br>med case txt is not empty<br>";
        $i=addMedicalCase($_POST["medcasetxt"]);
        if($i){
            echo "<br> new medical case added <br>";
            $maxmcid=0;
            $idmc=getLastMedCaseId();
            while($s=mysqli_fetch_array($idmc)){
                if($maxmcid<$s['medicalCase_code']){
                    $maxmcid=$s['medicalCase_code'];
                }
            }
            $j=insertintoMissionMedCase($maxmcid,$firstsection.'/'.$max);
        }
    }    


    if($c>0){
        echo "<script>window.location.assign('index.php');</script>";
    }
    // $equipe="";
    // $time=date("H:m:s");
    // $b=explode(":",$time);
    // $hour=$b[0]+3;
    // while($s=mysqli_fetch_array($result15)){
    //     if(explode(":",$s['shift_start_hour'])[0]<$hour && explode(":",$s['shift_end_hour'])[0]>$hour){
    //         // echo "<br> C'EST L'EQUIPE DE JOUR<br>";
    //         $equipe=$s['shift_code'];
    //     }else{
    //         // echo "<br> C'EST L'EQUIPE DE NUIT<br>";
    //         $equipe=$s['shift_code'];
    //     }
    // }
    // echo "<br>".$equipe."<br><br><br>";




    // if(isset($_POST["next1"])){
    //     echo "DDDDDDDDDDDAAAAAAAAAAAAAAAAAAAAAAAA";
    // }
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////itsyBitsySpider----->\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
//Draft Mision
if(isset($_POST['DraftMission']))
{
    //get shift
    $equipe=htmlspecialchars($_POST['shift']);
    $equipe=mysqli_real_escape_string($conn,$equipe); 
    //get current date and time
    echo " DATE AND TIME --------------DAY---   ".$_POST["currentDay"]."  -------HOUR-----".$_POST["currentHour"];
    $currentDate=htmlspecialchars($_POST["currentDay"]);
    $currentDate=mysqli_real_escape_string($conn,$currentDate);
    $currentHour=htmlspecialchars($_POST["currentHour"]);
    $currentHour=mysqli_real_escape_string($conn,$currentHour);
    $manualDate=$currentDate." ".$currentHour.":00";
    echo "<br>  manual date ".$manualDate."   <br>"; 
    //--------------LOCATIONs----------
    if($dropdownsrc=='' && $dropdowndest=='')
    {
        if($srctxt!='' && $desttxt!='')
        {
                $srcTxtAddress=$maxidaddress; $destTxtAddress=$srcTxtAddress++;
            /*----------->*/ $sourceLocation=$srcTxtAddress ; $DestinationLocation=$destTxtAddress;
        }
    }
    else{if($dropdownsrc!='' && $dropdowndest=='')
            {
                if($desttxt!='')
                {
                    $sourceLocation=$dropdownsrc; $DestinationLocation=$maxidaddress;   
                }
            }
            else
            {
                if($dropdownsrc=='' && $dropdowndest!='')  
                {
                    if($srctxt!='')
                    { 
                        $maxidaddress++; $DestinationLocation=$dropdowndest  ; $sourceLocation=$maxidaddress  ;
                    }
                }
                else {
                    if($dropdownsrc!='' && $dropdowndest!='')
                    { $sourceLocation=$dropdownsrc; $DestinationLocation=$dropdowndest ;}
                } 
            }       
        }
    //----------Checking filled fields--------------
    $missiontype=htmlspecialchars($_POST["mission_type"]);
    $missiontype=mysqli_real_escape_string($conn,$missiontype);
   
    $CMkitId=htmlspecialchars($_POST["cm_kit"]);
    $CMkitId=mysqli_real_escape_string($conn,);

    $UHF_Id=htmlspecialchars($_POST["uhf_radio"]);
    $UHF_Id=mysqli_real_escape_string($conn, $UHF_Id);

    $Etank=htmlspecialchars($_POST["etank"]);
    $Etank=mysqli_real_escape_string($conn, $Etank);

    $Dtank=htmlspecialchars($_POST["dtank"]);
    $Dtank=mysqli_real_escape_string($conn,$Dtank);

    $Mtank=htmlspecialchars($_POST["mtank"]);
    $Mtank=mysqli_real_escape_string($conn,$Mtank);

    $AmbulancePlateNb=htmlspecialchars($_POST["ambulance"]);
    $AmbulancePlateNb=mysqli_real_escape_string($conn,$AmbulancePlateNb);

    $Driver=htmlspecialchars($_POST["driver"]);
    $Driver=mysqli_real_escape_string($conn, $Driver);

    $Leader=htmlspecialchars($_POST["leader"]);
    $Leader=mysqli_real_escape_string($conn,$Leader);

    $EMT=htmlspecialchars($_POST["emt"]);
    $EMT=mysqli_real_escape_string($conn,$EMT);
    // ↓ added EMT 2 and 3//itsyBitsySpider----->
    $EMT2=htmlspecialchars($_POST["emt2"]);
    $EMT2=mysqli_real_escape_string($conn,$EMT2);
    $EMT3=htmlspecialchars($_POST["emt3"]);
    $EMT3=mysqli_real_escape_string($conn,$EMT3);
    // ↑
    $initial_KM=htmlspecialchars($_POST["initial_mileage"]);
    $initial_KM=mysqli_real_escape_string($conn,$initial_KM);
    $final_km=htmlspecialchars($_POST["final_mileage"]);
    $final_km=mysqli_real_escape_string($conn,$final_km);

    // Mission ID
    if(isset($_POST['currentDay']) && isset($_POST['currentHour'])){
        $startd=htmlspecialchars($_POST['currentDay']);
        $stratd=mysqli_real_escape_string($conn,$startd);
        $startT=htmlspecialchars($_POST['currentHour']);
        $startT=mysqli_real_escape_string($conn,$startT);
    
        $StartDate=$startd." ".$startT;
        echo "StartDate: ".$StartDate;
    }
    $n=explode('-',$startd);
    $firstsection=$n[0].$n[1].$n[2];
    $max=0;
    $ids=getIdMission($startd);
    while($s=mysqli_fetch_array($ids)){
        echo "<br>GET Last Mission<br>";
        $a = explode("/", $s['mission_id']);
        echo $s['mission_id'],"<br>";
        if($a[1] > $max){
            $max=$a[1];     
        }
    }
    $max++;

// The Query

    $QueryDraft='';
    $QueryValues='';
    if($missiontype!='' )
    {
        $QueryDraft.='INSERT INTO `mission`(`mission_id`, `mission_start_date`, `mission_Statuscode`, `mission_missionType`, `mission_shift_code`'; 
        $QueryValues.=')  Values ("'.$firstsection.'/'.$max.'" ,"'.$manualDate.'",1,'.$missiontype.' , "'.$equipe.'"';
        if($CMkitId!=''){$QueryDraft.=', `cmKitId_mission`';            $QueryValues.=','.$CMkitId;}
        if($UHF_Id!=''){$QueryDraft.=', `UHFradioId_mission`';          $QueryValues.=','.$UHF_Id;}
        if($Etank!=''){$QueryDraft.=',`remaining_E_tank`';              $QueryValues.=','.$Etank;} 
        if($Dtank!=''){$QueryDraft.=',`remaining_D_tank`';              $QueryValues.=','.$Dtank;}
        if($Mtank!=''){$QueryDraft.=', `remaining_M_tank`';            $QueryValues.=','.$Mtank; }
        if($AmbulancePlateNb!=''){$QueryDraft.=',`mission_ambulanceId`'; $QueryValues.=','.$AmbulancePlateNb;}
        if($initial_KM!=''){$QueryDraft.=',`mission_initial_km`';       $QueryValues.=','.$initial_KM;}
        if($final_km!=''){$QueryDraft.=',`mission_final_km`';            $QueryValues.=','.$final_km;}
        if($GLOBALS['sourceLocation']!=''){$QueryDraft.=',`mission_addressCodeSrc`';       $QueryValues.=','.$sourceLocation;};
        if($GLOBALS['DestinationLocation']!=''){$QueryDraft.=',`mission_addressCodeDest`'; $QueryValues.=','.$DestinationLocation;}

    $QueryValues.=');';
    $FinalQueryDraft=$QueryDraft.$QueryValues;
    $DbQueryDraft=mysqli_query($conn,$FinalQueryDraft);
    if($DbQueryDraft){
        echo "<br>".$FinalQueryDraft;
        echo "<br>SUCCESSSS Drafting";
        echo"<script>window.location.assign('index.php');</script>";
        //     Header('location:index.php');
    }else{
            echo "<br>".$FinalQueryDraft;
            echo "<br>Failed Drafting";
        }
            
    }

//--------MedicalCase---------
    if (!empty($_POST["medical_case"])) {
        echo "<ul>";
        foreach ($_POST["medical_case"] as $value) {
            $value=htmlspecialchars($value);
            $value=mysqli_real_escape_string($conn,$value);
            $h=insertintoMissionMedCase($value,$firstsection.'/'.$max);
            echo "<li>$value</li>";
            if($h){
                echo "<br>----------- MissionMedCase inserted ------------<br>";
            }
        }
        echo "</ul>";
    }
    //----------MedicalCaseTxT-----------
    if(!empty($_POST["medcasetxt"])){
        echo "<br>med case txt is not empty<br>";
        $medtxt=htmlspecialchars($_POST["medcasetxt"]);
        $medtxt=mysqli_real_escape_string($conn,$medtxt);
        $i=addMedicalCase($medtxt);
        if($i){
            echo "<br> new medical case added <br>";
            $maxmcid=0;
            $idmc=getLastMedCaseId();
            while($s=mysqli_fetch_array($idmc)){
                if($maxmcid<$s['medicalCase_code']){
                    $maxmcid=$s['medicalCase_code'];
                }
            }
            $j=insertintoMissionMedCase($maxmcid,$firstsection.'/'.$max);
        }
    }
    //-----insert into mission_rescuer
//insert into mission_rescuer
//
    //insert  Leader and Driver
    if($DbQueryDraft && !empty($_POST["driver"]) ){
        if($_POST["driver"]==$_SESSION["rescuer_id"]){echo " this driver:".$_POST["driver"]." is the creator***"; $DriverRole=1;}
        else{$DriverRole=0;}
        $m=insertintoMissionRescuer($Driver,$firstsection.'/'.$max,1,$DriverRole);
        echo "<br>";
        if($m){
            echo "MM";
        }
        echo "<br>";
    }
    if($DbQueryDraft && !empty($_POST["leader"]) ){
        
        if($_POST["leader"]==$_SESSION["rescuer_id"]){echo " this leader:".$_POST["leader"]." is the creator***"; $leaderRole=1;}
        else{$leaderRole=0;}
        $p=insertintoMissionRescuer($Leader,$firstsection.'/'.$max,2,$leaderRole);
        echo "<br>";
        if($p){
            echo "PP";
        }
        echo "<br>";
    }
    //
    //insert EMT
    if($DbQueryDraft && !empty($_POST["emt"])){
        if($_POST["emt"]==$_SESSION["rescuer_id"]){echo " this EMT:".$_POST["emt"]." is the creator***"; $emtRole=1;}
        else{$emtRole=0;}
        $o=insertintoMissionRescuer($EMT,$firstsection.'/'.$max,3,$emtRole);
        echo "<br>";
        if($o){
            echo "OO";
        }
        echo "<br>";
    }
        // ↓ insert emt2 ↓
    if($DbQueryDraft && !empty($_POST["emt2"])){    
        if($_POST["emt2"]==$_SESSION["rescuer_id"]){echo " this EMT:".$_POST["emt2"]." is the creator***"; $emtRole=1;}
        else{$emtRole=0;}
        $x=insertintoMissionRescuer($EMT2,$firstsection.'/'.$max,3,$emtRole);
        echo "<br>";
        if($x){
            echo "XX";
        }
        echo "<br>";
    }
    // insert emt3
    if($DbQueryDraft && !empty($_POST["emt3"])){    
        if($_POST["emt3"]==$_SESSION["rescuer_id"]){echo " this EMT:".$_POST["emt3"]." is the creator***"; $emtRole=1;}
        else{$emtRole=0;}
        $y=insertintoMissionRescuer($EMT3,$firstsection.'/'.$max,3,$emtRole);
        echo "<br>";
        if($y){
            echo "YY";
        }
        echo "<br>";
    }

//↑↑↑↑↑↑↑↑↑↑↑↑
    // GET PATIENTSS   
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
    //-----------------------PATIENT CONTROL------------------
    $exist=0;
    //insert patient
    if(!empty($_POST["patient_firstname"]) && !empty($_POST["patient_lastname"]) && !empty($_POST["patient_dateofbirth"]) && !empty($_POST["patient_nationality"]) ){
        //---------------
        while($s=mysqli_fetch_array($result14)){
            if($s['patient_firstName']==$_POST["patient_firstname"] && $s['patient_lastName']==$_POST["patient_lastname"] && $s['patient_dateOfBirth']==$_POST["patient_dateofbirth"] && $s['patient_nationality']==$_POST["patient_nationality"]){
                $exist=$s['patient_id'];
                continue;
            }
        }
        mysqli_data_seek( $result14, 0 );
        if($exist==0){
            $d=addPatient($patientfn1,$patientln1,$patientDOB1,$patientNat1); }        
        //---------------
    }
    if($d){
        echo "PATIENT1 Inserted :)))";
    }
    //insert patient_mission
    if($DbQueryDraft && $d){
        echo "DbQueryDraft & d ";
        $maxid=0;
        $idpts=getLastPatientId();
        while($s=mysqli_fetch_array($idpts)){
            if($maxid<$s['patient_id']){
                $maxid=$s['patient_id'];
            }
        }
        
        echo "<br><br><br><br>********  ".$maxid." *******<br><br><br><br>";
        $e=patientMission($maxid++,$firstsection.'/'.$max,$patientRel);
        if($e){
            echo "GOAL";
        }
    }

    /////////////////////
    if($DbQueryDraft && $exist>0){
        echo "DbQueryDraft & patient exist ";
        $k=patientMission($exist,$firstsection.'/'.$max,$patientRel);
        if($k){
            echo "GOAL";
        }
    }

    $exist2=0;
    if(!empty($_POST["patient_firstname2"]) && !empty($_POST["patient_lastname2"]) && !empty($_POST["patient_dateofbirth2"]) && !empty($_POST["patient_nationality2"])){
        //---------------
        while($s=mysqli_fetch_array($result14)){
            if($s['patient_firstName']==$_POST["patient_firstname2"] && $s['patient_lastName']==$_POST["patient_lastname2"] && $s['patient_dateOfBirth']==$_POST["patient_dateofbirth2"] && $s['patient_nationality']==$_POST["patient_nationality2"]){
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
    if($DbQueryDraft && $f){
        echo "DbQueryDraft & f ";
        $maxid2=0;
        $idpts2=getLastPatientId();
        while($s=mysqli_fetch_array($idpts2)){
            if($maxid2<$s['patient_id']){
                $maxid2=$s['patient_id'];
            }
        }
        
        echo "<br><br><br><br>********  ".$maxid2." *******<br><br><br><br>";
        $g=patientMission($maxid2++,$firstsection.'/'.$max,$patientRel2);
        if($g){
            echo "GOAL2";
        }
    }
    /////////////////////
    if($DbQueryDraft && $exist2>0){
        echo "DbQueryDraft & patient2 exist ";
        $l=patientMission($exist2,$firstsection.'/'.$max,$patientRel2);
        if($l){
            echo "GOAL2";
        }
    }
    

}
    
    

?>