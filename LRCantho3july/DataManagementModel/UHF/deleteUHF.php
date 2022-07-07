<?php  
	$connect = mysqli_connect("localhost", "root", "", "lrc");
		$id=htmlspecialchars($_POST["id"]);
	$id=mysqli_real_escape_string($connect,$id);
	$sql = "DELETE FROM uhf_radio WHERE uhf_radio_id  = '".$id."'";  
	if(mysqli_query($connect, $sql))  
	{  
		echo 'Data Deleted';  
	}  
 ?>