<?php  
$connect = mysqli_connect("localhost", "root", "", "lrc");
 	$city_name=htmlspecialchars($_POST["city_name"]);
	$city_name=mysqli_real_escape_string($connect,$city_name);
$sql = "INSERT INTO `city`(`city_name`) VALUES ('".$city_name."');";  
if(mysqli_query($connect, $sql))  
{  
     echo 'Data Inserted';  
} 
else {echo "Error";} 
 ?>

			
			
		