<?php
require('DBconnection.inc.php');

/*---------------------------------------------------Admin--------------------------------------------------------------- */

//  Fill  Admin table
$Admin="Select * from accounts where roles=1";
$AdminRes=mysqli_query($conn,$Admin);

//  ++++++++++++++++++++++++++++++++++InsertAdmin++++++++++++++++++++++++++++++++++ \\
function insertAdmin($usernameAdmin,$passwordAdmin){

    require('DBconnection.inc.php');

    $inser="insert into accounts (username,password,roles) values ('".$usernameAdmin."','".$passwordAdmin."' ,1 )
    ";
    $res=mysqli_query($conn,$inser);
    return $res;
}
//  ++++++++++++++++++++++++++++++++++updateAdmin++++++++++++++++++++++++++++++++++ \\

function updateAdmin($AdminUser,$Adminpssd,$userID){
    require('DBconnection.inc.php');
    $QAdminUpdate="UPDATE `accounts` SET `username`='".$AdminUser."',`password`='".$Adminpssd."' WHERE `user_id`=".$userID."
    ";
    $updateAdmin=mysqli_query($conn,$QAdminUpdate);
    return $updateAdmin;
}
//  ++++++++++++++++++++++++++++++++++DeleteAdmin++++++++++++++++++++++++++++++++++ \\

function deleteAdmin($idAdmin){
    require('DBconnection.inc.php');
    $QDelete="DELETE FROM `accounts` WHERE `user_id`=".$idAdmin." ";
    $delete=mysqli_query($conn,$QDelete);
return $delete;
}
/*---------------------------------------------------Rescuer--------------------------------------------------------------- */
//  Fill Rescuers table



//  Select options Rescuers 
$userResc="SELECT `rescuer_nickname` FROM `rescuer` WHERE `rescuer_nickname` not in (SELECT `rescuer_nickname` FROM `rescuer`r join accounts u on u.nickname=r.rescuer_nickname);";
$resUser1=mysqli_query($conn,$userResc);

//  ++++++++++++++++++++++++++++++++++InsertRescuer++++++++++++++++++++++++++++++++++ \\
function insertRescuer($usernameRescuer,$passwordRescuer,$rescuer_nickname){
    require('DBconnection.inc.php');
    $QinsertRescuer="INSERT INTO `accounts`(`username`, `password`, `roles`, `nickname`) VALUES ('".$usernameRescuer."','".$passwordRescuer."',0,'".$rescuer_nickname."')";
    $resInsertRescuer=mysqli_query($conn,$QinsertRescuer);
    return resInsertRescuer;
}
//  ++++++++++++++++++++++++++++++++++updateRescuer++++++++++++++++++++++++++++++++++ \\

function updateRescuer($RescuerUser,$Rescuerpssd,$userIDResc){
    require('DBconnection.inc.php');
    $QRescuerUpdate="UPDATE `accounts` SET `username`='".$RescuerUser."',`password`='".$Rescuerpssd."' WHERE `user_id`=".$userIDResc."
    ";
    $updateRescuer=mysqli_query($conn,$QRescuerUpdate);
    return $updateRescuer;
}

//  ++++++++++++++++++++++++++++++++++DeleteRescuer++++++++++++++++++++++++++++++++++ \\

function deleteRescuer($idRescuer){
    require('DBconnection.inc.php');
    $QRescuerDelete="DELETE FROM `accounts` WHERE `user_id`=".$idRescuer." ";
    $deleteRescuer=mysqli_query($conn,$QRescuerDelete);
return $deleteRescuer;
}
//  ++++++++++++++++++++++++++++++++++Search Rescuer++++++++++++++++++++++++++++++++++ \\

// function SearchRescuer($filter){
//     require('DBconnection.inc.php');
// $QSearch="SELECT `username`, `password`, `nickname`, `user_id` FROM `users` WHERE `nickname` REGEXP 'Driver';";
// $RescuerRes=mysqli_query($conn,$QSearch);
// return $RescuerRes;
// }
    ?>