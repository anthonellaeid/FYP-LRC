<?php  
$connect = mysqli_connect("localhost", "root", "", "lrc");
$ambulanceStatus_desc = htmlspecialchars($_POST['ambulanceStatus_desc']);
$ambulanceStatus_desc = mysqli_real_escape_string($connect,$ambulanceStatus_desc);
$sql = "INSERT INTO `ambulance_status`(`ambulanceStatus_desc`) VALUES ('".$ambulanceStatus_desc."');";  
if(mysqli_query($connect, $sql))  
{  
     echo 'Data Inserted';  
} 
else {echo "Error";} 
 ?>

			
			
		