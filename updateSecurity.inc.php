<?php
function test($data){
        require("DBconnection.inc.php");
        $data = trim($data);
        $data =stripslashes($data);
        $data = htmlspecialchars($data);
       $data = mysqli_real_escape_string($conn, $data);
        return $data;
}

$nickname=test($_POST["nickname-".$x]);
$firstname=test($_POST["fname-".$x]);
$lastname=test($_POST["lname-".$x]);
$dateofbirth=test($_POST["dob-".$x]);
$phonenb=test($_POST["phoneNb-".$x]);
$datejoin=test($_POST["doj-".$x]);
$dateleft=test($_POST["dol-".$x]);
$function=test($_POST["function-".$x]);
$gender=test($_POST["gender-".$x]);
?>