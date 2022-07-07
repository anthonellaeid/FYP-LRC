<?php
require("LogIn_model.php");
if (isset($_POST["username"]) && isset($_POST["password"])) {
	$val=checkifExist($username,$password);
	//var_dump($_POST["password"]);

	if($val[0]=="1"){

$logres=getUserRole($username,$password);
	// var_dump($logres["roles"]);
	if($logres["roles"]=="1"){
		$_SESSION["login"]="1";
		header("location:settings.php");}

		else{
			$_SESSION["User"]=$logres["nickname"];
			$rescuerId=getRescuerId($username,$password);
			$_SESSION["rescuer_id"]=$rescuerId["rescuer_id"];
		header("location:index.php");}
	}
	else{
		header("location:LogIn.php?error=wrong username or password");
	}
}
if(isset($_GET["error"])){
$Error=htmlspecialchars($_GET["error"]);
$Error=mysqli_real_escape_string($conn,$Error);
	echo '<center><div class="bd-example">
	<div class="alert alert-primary d-flex align-items-center" style="  background-color:
	hsla(0, 100%, 70%, 0.3);
	width:200px;" role="alert">
	  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
		<path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"></path>
	  </svg>
	  <div>
	  '.$Error.'.
	  </div>
	</div>
	</div>
</center>';}
?>