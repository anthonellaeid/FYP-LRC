<?php  
	$connect = mysqli_connect("localhost", "root", "", "lrc");
	$id=htmlspecialchars($_POST["id"]);
	$id=mysqli_real_escape_string($connect,$id);
	$sql = "DELETE FROM shift WHERE shift_code  = '".$id."'";  
	if(mysqli_query($connect, $sql))  
	{  
		echo 'Data Deleted';  
	}  else{
		echo "Error";
	}
 ?>
	