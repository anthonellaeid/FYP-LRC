<?php
  session_start();
  $rescuerId=$_SESSION["rescuer_id"];
  if (!isset($_SESSION['User'])) {
      header("Location:LogIn.php");
  }

  
  ?>
<?php


require_once('PcrDraftModel.php');

$Driver=htmlspecialchars($_POST["driver"]);
$Driver=mysqli_real_escape_string($conn,$Driver);
$leader=htmlspecialchars($_POST["leader"]);
$leader=mysqli_real_escape_string($conn,$leader);
$EMT=htmlspecialchars($_POST["emt"]);
$EMT=mysqli_real_escape_string($conn,$EMT);
if(isset($_POST['currentDay']) && isset($_POST['currentHour'])){
    $startd=htmlspecialchars($_POST['currentDay']);
    $stratd=mysqli_real_escape_string($conn,$startd);
    $startT=htmlspecialchars($_POST['currentHour']);
    $startT=mysqli_real_escape_string($conn,$startT);

    $StartDate=$startd." ".$startT;
    echo "StartDate: ".$StartDate;
}
echo "<br>////////////////////////**StartDate: ".$startd." - ".$startT;
echo "<br>";
$equipe=$_POST['shift'];
$missionType=$_POST["mission_type"];
if(isset($_POST['CancelMission'])){
    // echo $_SESSION['GetIdMission']."Date".$StartDate." type ".$_POST["mission_type"]." Equipe".$equipe;   

     $Function=CancelMission($StartDate,$_POST["mission_type"],$equipe);
    echo "<br>Date".$StartDate." type ".$_POST["mission_type"]." Equipe".$equipe;
}
if($Function){header('location:index.php');}
else{ echo 'Failed';}


//insert into mission_rescuer
    //Delete old rescuers
    if($Function){
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
   if($Function && !empty($_POST["driver"]) ){
        if($Driver==$_SESSION["rescuer_id"]){echo " this driver:".$Driver." is the creator***"; $DriverRole=1;}
        else{$DriverRole=0;}
        $m=insertintoMissionRescuer($Driver,1,$DriverRole);
        echo "<br>";
        if($m){
            echo "MM";
        }
        echo "<br>";
    }
    if($Function && !empty($_POST["leader"]) ){
        
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
    if($Function && !empty($_POST["emt"])){
        if($EMT==$_SESSION["rescuer_id"]){echo " this EMT:".$EMT." is the creator***"; $emtRole=1;}
        else{$emtRole=0;}
        $o=insertintoMissionRescuer($EMT,3,$emtRole);
        echo "<br>";
        if($o){
            echo "OO";
        }
        echo "<br>";
    }


if($Function){echo "<br>Success";}
else{ echo "<br>Error";}





        ?>