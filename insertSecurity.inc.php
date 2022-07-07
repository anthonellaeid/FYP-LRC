<?php
function test($data){
        require("DBconnection.inc.php");
        $data = trim($data);
        $data =stripslashes($data);
        $data = htmlspecialchars($data);
        $data = mysqli_real_escape_string($conn, $data);
        return $data;
}

$nickname=test($_POST["nickname"]);
$firstname=test($_POST["firstname"]);
$lastname=test($_POST["lastname"]);
$dateofbirth=test($_POST["dateofbirth"]);
$phonenb=test($_POST["phonenb"]);
$datejoin=test($_POST["datejoin"]);
$dateleft=test($_POST["dateleft"]); 
$gender=test($_POST["gender"]);
?>