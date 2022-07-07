<?php
  session_start();
  $rescuerId=$_SESSION["rescuer_id"];
  if (!isset($_SESSION['User'])) {
      header("Location:LogIn.php");
  }
  ?>
<?php

require_once("PcrModel.php");
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
    //echo "StartDate: ".$StartDate;
}
echo "<br>////////////////////////**StartDate: ".$startd." - ".$startT;
echo "<br>";    echo "<br>GET Last Mission<br>";
$n=explode('-',$startd);
$firstsection=$n[0].$n[1].$n[2];
$max=0;
$ids=getIdMission($startd);
while($s=mysqli_fetch_array($ids)){
    echo "<br>GET Last Mission<br>";
    $a = explode("/", $s['mission_id']);
    //echo $s['mission_id'],"<br>";
    if($a[1] > $max){
        $max=$a[1];     
    }
}
$max++;
$equipe=$_POST['shift'];
$missionType=$_POST["mission_type"];
if(isset($_POST['CancelMission'])){

     $Function=CancelMission($firstsection.'/'.$max,$StartDate,$_POST["mission_type"],$equipe);
       // echo "<br>".$query;
    }

if($Function){
    header('location:index.php');
        echo "Successssssssss";
}
else{
    echo "Mission Failed!";
}
            echo "<script>alert('Canceled'); </script>";
// insert driver
if($Function && !empty($_POST["driver"]) ){
    if($_POST["driver"]==$_SESSION["rescuer_id"]){echo " this driver:".$_POST["driver"]." is the creator***"; $DriverRole=1;}
    else{$DriverRole=0;}
    $m=insertintoMissionRescuer($_POST["driver"],$firstsection.'/'.$max,1,$DriverRole);
        echo "<br>";
    if($m){
        echo "MM";
    }
    echo "<br>";
}  
//insert Leader
if($Function  && !empty($_POST["leader"])){
    
    if($_POST["leader"]==$_SESSION["rescuer_id"]){echo " this driver:".$_POST["leader"]." is the creator***"; $leaderRole=1;}
    else{$leaderRole=0;}
    $p=insertintoMissionRescuer($_POST["leader"],$firstsection.'/'.$max,2,$leaderRole);
    echo "<br>";
   if($p){
        echo "PP";
    }
    echo "<br>";
}      
//insert EMT
if($Function && !empty($_POST["emt"])){
    if($_POST["emt"]==$_SESSION["rescuer_id"]){echo " this driver:".$_POST["Driver"]." is the creator***"; $emtRole=1;}
    else{$emtRole=0;}
    $o=insertintoMissionRescuer($_POST["emt"],$firstsection.'/'.$max,3,$emtRole);
    echo "<br>";
    if($o){
        echo "OO";
    }
    echo "<br>";
}









        ?>