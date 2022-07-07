<?php  
$connect = mysqli_connect("localhost", "root", "", "lrc");
$Address_desc= htmlspecialchars($_POST["Address_desc"]);
$Address_desc= mysqli_real_escape_string($connect,$Address_desc);

$IsHospital=htmlspecialchars($_POST['Is_hospital']);
$IsHospital=mysqli_real_escape_string($connect,$IsHospital);

$IsEvent=htmlspecialchars($_POST['Is_event']);
$IsEvent=mysqli_real_escape_string($connect,$IsEvent);

$Address_city = htmlspecialchars($_POST["Address_city"]);
$Address_city= mysqli_real_escape_string($connect,$Address_city);

$sql = "INSERT INTO address (Address_desc,Is_hospital,Is_event,Address_city) 
VALUES('".$Address_desc."',
 '".$IsHospital."',
 '".$IsEvent."',
 '".$Address_city."'
 )";  
if(mysqli_query($connect, $sql))  
{  
     echo 'Data Inserted';  
}  
 ?>
	
			
     					