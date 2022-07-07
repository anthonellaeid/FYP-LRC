<?php  
$connect = mysqli_connect("localhost", "root", "", "lrc");
$shift_code=htmlspecialchars($_POST['shift_code']);
$shift_code=mysqli_real_escape_string($connect,$shift_code);
$shift_desc= htmlspecialchars($_POST['shift_desc']);
$shift_desc=mysqli_real_escape_string($connect,$shift_desc);

$shift_start_hour=htmlspecialchars($_POST['shift_start_hour']);
$shift_start_hour=mysqli_real_escape_string($connect,$shift_start_hour);
$shift_start_hour.=":00";
$shift_end_hour=htmlspecialchars($_POST['shift_end_hour']);
$shift_end_hour=mysqli_real_escape_string($connect,$shift_end_hour);
$shift_end_hour.=":00";
$sql = "INSERT INTO `shift`(`shift_code`,`shift_desc`,shift_start_hour,shift_end_hour) VALUES ('".$shift_code."','".$shift_desc."','".$shift_start_hour."','".$shift_end_hour."');";  
if(mysqli_query($connect, $sql))  
{  
     echo 'Data Inserted';  
} 
else {echo "Error";} 
 ?>

			
			
	
	
