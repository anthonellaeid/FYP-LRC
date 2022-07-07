<?php  
$connect = mysqli_connect("localhost", "root", "", "lrc");
$ambulance_plateNb = htmlspecialchars($_POST["ambulance_plateNb"]);
$ambulance_plateNb = mysqli_real_escape_string($connect,$ambulance_plateNb);
$ambulance_description = htmlspecialchars($_POST["ambulance_description"]);
$ambulance_description =mysqli_real_escape_string($connect,$ambulance_description);
$ambulance_final_km = htmlspecialchars($_POST["ambulance_final_km"]);
$ambulance_final_km = mysqli_real_escape_string($connect,$ambulance_final_km);
$Ambulance_status_code = htmlspecialchars($_POST["Ambulance_status_code"]);
$Ambulance_status_code = mysqli_real_escape_string($connect,$Ambulance_status_code);
$Ambulance_max_patient= htmlspecialchars($_POST["Ambulance_max_patient_nb"]);
$Ambulance_max_patient=mysqli_real_escape_string($connect,$Ambulance_max_patient);
$sql = "INSERT INTO ambulance(ambulance_plateNb,ambulance_description,ambulance_final_km,Ambulance_status_code,Ambulance_max_patient_nb) 
VALUES('".$ambulance_plateNb."',
 '".$ambulance_description."',
 '".$ambulance_final_km."',
 '".$Ambulance_status_code."',
 '".$Ambulance_max_patient."')";  
if(mysqli_query($connect, $sql))  
{  
     echo 'Data Inserted';  
}  
else{echo "error";}
 ?>
	
			
			
		