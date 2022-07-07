<?php  
	$connect = mysqli_connect("localhost", "root", "", "lrc");
	$id=htmlspecialchars($_POST["id"]);
	$id=mysqli_real_escape_string($connect,$id);	
	$text = htmlspecialchars($_POST["text"]);
	$text = mysqli_real_escape_string($connect,$text);
	$column_name = htmlspecialchars($_POST["column_name"]); 
	$column_name = mysqli_real_escape_string($connect,$column_name);
	$sql = "UPDATE uhf_radio SET ".$column_name."='".$text."' WHERE uhf_radio_id ='".$id."'";  
	if(mysqli_query($connect, $sql))  
	{  
		echo 'Data Updated';  
	}  
 ?> 
