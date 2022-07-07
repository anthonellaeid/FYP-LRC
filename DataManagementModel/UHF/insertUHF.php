<?php  
$connect = mysqli_connect("localhost", "root", "", "lrc");
	$desc=htmlspecialchars($_POST['uhf_radio_desc']);
	$desc=mysqli_real_escape_string($connect,$desc);
$sql = "INSERT INTO `uhf_radio`(`uhf_radio_desc`) VALUES ('".$desc."');";  
if(mysqli_query($connect, $sql))  
{  
     echo 'Data Inserted';  
} 
else {echo "Error";} 
 ?>

			
		


		