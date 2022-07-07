<?php  
$connect = mysqli_connect("localhost", "root", "", "lrc");
$med_desc= htmlspecialchars($_POST['medicalCase_desc']);
$med_desc=mysqli_real_escape_string($connect,$med_desc);
$sql = "INSERT INTO `medical_case`(`medicalCase_desc`) VALUES ('".$med_desc."');";  
if(mysqli_query($connect, $sql))  
{  
     echo 'Data Inserted';  
} 
else {echo "Error";} 
 ?>

			
			
