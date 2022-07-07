<?php  
$connect = mysqli_connect("localhost", "root", "", "lrc");
 	$cm_desc=htmlspecialchars($_POST["cm_kit_desc"]);
	$cm_desc=mysqli_real_escape_string($connect,$cm_desc);
$sql = "INSERT INTO `cm_kit`(`cm_kit_desc`) VALUES ('".$cm_desc."');";  
if(mysqli_query($connect, $sql))  
{  
     echo 'Data Inserted';  
} 
else {echo "Error";} 
 ?>

			
			
		