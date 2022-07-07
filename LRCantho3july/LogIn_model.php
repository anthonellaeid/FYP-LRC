<?php
require("DBconnection.inc.php");

function checkifExist($username,$password){
    require("DBconnection.inc.php");
    $username=htmlspecialchars($_POST["username"]);
	$password=htmlspecialchars($_POST["password"]);
	$username=mysqli_real_escape_string($conn,$username);
	$password=mysqli_real_escape_string($conn,$password);
$res=mysqli_query($conn,'SELECT count(*) FROM `accounts` WHERE `username`="'.$username.'" AND `password`="'.$password.'"');
$val=mysqli_fetch_array($res);

return $val;}

/** */
function getUserRole($username,$password){
    require("DBconnection.inc.php");
    $username=htmlspecialchars($_POST["username"]);
	$password=htmlspecialchars($_POST["password"]);
	$username=mysqli_real_escape_string($conn,$username);
	$password=mysqli_real_escape_string($conn,$password);
$log=mysqli_query($conn,'SELECT `roles`,username,`user_id`,nickname  FROM `accounts` WHERE `username`="'.$username.'" AND `password`="'.$password.'"');
$logres=mysqli_fetch_array($log);
return $logres;
}
function getRescuerId($username,$password){
	require("DBconnection.inc.php");
    $username=htmlspecialchars($_POST["username"]);
	$password=htmlspecialchars($_POST["password"]);
	$username=mysqli_real_escape_string($conn,$username);
	$password=mysqli_real_escape_string($conn,$password);
$Resc=mysqli_query($conn,'SELECT `roles`,username,`user_id`,r.rescuer_id FROM `accounts`a join rescuer r on r.rescuer_nickname=a.nickname WHERE `username`="'.$username.'" AND `password`="'.$password.'"');
$Rescres=mysqli_fetch_array($Resc);
return $Rescres;
}
?>