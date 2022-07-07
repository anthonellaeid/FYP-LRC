<?php
require('DBconnection.inc.php');
//         <!-- Rescuer Select -->
$sqlRescuer="SELECT `rescuer_id`, `rescuer_nickname`, `rescuer_firstName`, `rescuer_lastName` FROM `rescuer`";
$resultRes=mysqli_query($conn,$sqlRescuer);

//        <!-- Year Select -->
$QYear="SELECT Year(`mission_start_date`) as yearM FROM `mission` group by yearM;";   
$resultYear=mysqli_query($conn,$QYear);

//        <!-- Shift Select -->
$QShift="SELECT `shift_code` FROM `shift`"; 
$resShift=mysqli_query($conn,$QShift);

$QMonth="Select Month(`mission_start_date`) as monthNb, MONTHNAME(`mission_start_date`) as monthM From mission group by monthM";
$resultMonth=mysqli_query($conn,$QMonth);

//  <!-- Table -->
// function table($shift,$rescuerId,$Year){        require('DBconnection.inc.php');

// $QTable="SELECT COUNT(`mission_type_desc`), rescuer_nickname,`mission_type_desc`,`shift_code`,
// `Year(mission_start_date)` from annualreport  ";

// if(isset($_POST['shift_code'])&& isset($_POST['rescuer_id']) && isset($_POST['Year(mission_start_date)'])){
// $shift=$_POST['shift_code'];
// $rescuerId=$_POST['rescuer_id']; $Year=$_POST['Year(mission_start_date)'];
// // echo"received".$shift." ".$Year." ".$rescuerId;
// $QTable.="where rescuer_id=".$rescuerId." and `Year(mission_start_date)`=".$Year." and shift_code='".$shift."'
// ";
// echo "where rescuer_id=".$rescuerId." and `Year(mission_start_date)`=".$Year." and shift_code='".$shift."'
// group by shift_code , `mission_type_desc`,rescuer_nickname;";
// }else{
// $QTable.="where `Year(mission_start_date)`=2022
// group by shift_code , `mission_type_desc`; ";}


// $resTable=mysqli_query($conn,$QTable);
// return $resTable;
// }

// if(isset($_POST['shift_code'])&& isset($_POST['rescuer_id']) && isset($_POST['Year(mission_start_date)'])){
//     $shift=$_POST['shift_code'];
//     $rescuerId=$_POST['rescuer_id']; $Year=$_POST['Year(mission_start_date)'];
//     // echo"received".$shift." ".$Year." ".$rescuerId;
//     $QTable="SELECT COUNT(`mission_type_desc`), rescuer_nickname,`mission_type_desc`,`shift_code`,
//     `Year(mission_start_date)` from annualreportwhere rescuer_id=".$rescuerId." and `Year(mission_start_date)`=".$Year." and shift_code='".$shift."'
//     group by shift_code , `mission_type_desc`,rescuer_nickname; ";
//     echo "<script>alert('Here');</script>";
//     echo "where rescuer_id=".$rescuerId." and `Year(mission_start_date)`=".$Year." and shift_code='".$shift."'
//      group by shift_code , `mission_type_desc`,rescuer_nickname;";
// }else{
// $QTable="SELECT COUNT(`mission_type_desc`), rescuer_nickname,`mission_type_desc`,`shift_code`,
// `Year(mission_start_date)` from annualreport where `Year(mission_start_date)`=2022
// group by shift_code , `mission_type_desc`; ";}

// function initialtable(){       
//      require('DBconnection.inc.php');
// $resTable=mysqli_query($conn,$GLOBALS['QTable']);
// return $resTable; 
// }

if(isset($_POST['Submitbtn'])){

    
    if($_POST['SelectRescuer']=='Choose...' ){
        echo "<script>alert('Choose Rescuer '); </script>";
        header('location:ReportsRescuerMonthly.php?M=NoResultFound; Choose Rescuer');
        exit(0); 
                }

    else if($_POST['SelectMonth']==""){
            echo "<script>alert('Precise the Month'); </script>";
            header('location:ReportsRescuerMonthly.php?M=NoResultFound; Precise the Month');
            exit(0);
                }    
    else if($_POST['SelectShift']=='Choose...'){
            echo "<script>alert('Select Shift '); </script>";                  
            header('location:ReportsRescuerMonthly.php?M=NoResultFound; Select Shift');
            exit(0);
             }

    else{
        $shift = htmlspecialchars($_POST['SelectShift']);
        $shift = mysqli_real_escape_string($conn,$shift);

        $rescuerId = htmlspecialchars($_POST['SelectRescuer']);
        $rescuerId = mysqli_real_escape_string($conn,$rescuerId);

        $Year = htmlspecialchars($_POST['SelectYear']);
        $Year = mysqli_real_escape_string($conn,$Year);

        $Month = htmlspecialchars($_POST['SelectMonth']);
        $Month = mysqli_real_escape_string($conn,$Month);

        $QTable="SELECT COUNT(`mission_type_desc`), rescuer_nickname,`mission_type_desc`,`shift_code`,
                `Year(mission_start_date)`,monthNb from annualreport 
                where rescuer_id=".$rescuerId." and `Year(mission_start_date)`=".$Year." 
                and shift_code='".$shift."' and monthNb=".$Month." 
                group by shift_code , `mission_type_desc`,rescuer_nickname; ";
        }
        // Sessions to receive in full report page
        $_SESSION['rescuerId']=$rescuerId;
        $_SESSION['Month']=$Month;
        $_SESSION['Year']=$Year;
        $_SESSION['shift']=$shift;
        // echo "<script>alert('".$_SESSION['rescuerId']."');</script>";
    $resTable=mysqli_query($conn,$QTable);
    if (isset($_POST['CheckFullVersion']) == 'checked'){

        // header('location:FullVersionReport.php?nickname='.$_POST['SelectRescuer'].'&Month='.$_POST['SelectMonth'].'&Year='.$_POST['SelectYear'].'&shift='.$_POST['SelectShift'].'');
       header('location:FullVersionReport.php');
    }
      // ** Table Caption **
    $ssql="Select rescuer_nickname,monthM from annualreport where rescuer_id=".$rescuerId." 
            and monthNb=".$GLOBALS['Month']."
            group by rescuer_id";
    $q=mysqli_query($conn,$ssql);
}
//  if nothing received
else{
$QTable="SELECT COUNT(`mission_type_desc`), rescuer_nickname,`mission_type_desc`,`shift_code`,
        `Year(mission_start_date)` from annualreport where `Year(mission_start_date)`=".date('Y')."
            group by shift_code , `mission_type_desc`; ";
$resTable=mysqli_query($conn,$QTable);

$q=mysqli_query($conn,"Select rescuer_nickname from annualreport where rescuer_id=NULL");
    }
?>

