<?php session_start();
if(!isset($_SESSION["login"]))
	header("location:index.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>LRC-unsaved Report</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>  
  <style>
 .option{background-color:#fff; height:60px; margin:20px; border:2px red solid;border-radius:10px;}
 .container-back{background-color:#c4c4c4; margin-bottom:10px; background-image: url('grey-bg.png'); 
	 background-repeat: no-repeat;
	 background-size: cover;border:1px solid red;}
.separator{background-color:red;}
a.link1:link {color:#000;
  text-decoration: none;
}

a.link1:visited {color:#000;
  text-decoration: none;
}

a.link1:hover {color:red;
  text-decoration: none;
}

a.link1:active {color:#000;
  text-decoration: none;
}
.add{
	text-shadow: 0 0 3px #ff0000;
	width:15%;
	background-color:transparent;
	padding-left:2%;
	margin-bottom:1%;
}
  </style>
  
</head>
<body>
<!-- nav -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
  <img src="pics/logo.webp" width="20px" >&nbsp;

    <a class="navbar-brand" href="#">Reports</a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

      <li class="nav-item active">
        <a class="nav-link" href="#" >Ambulance Reports <span class="sr-only">(current)</span></a>
      </li>
	  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Rescuer Report</a>
    <div class="dropdown-menu">
	<a class="dropdown-item" href="ReportsRescuerAnnual.php">Annual </a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="ReportsRescuerMonthly.php">Monthly</a>
    </div>
  </li>
    </ul>
<!--far right nav -->
	<ul class="navbar-nav my-auto my-2 my-lg-0">

<li class="nav-item active">
  <a class="nav-link" href="Settings.php">Settings <span class="sr-only">(current)</span></a>
</li>
<li class="nav-item active">
  <a class="nav-link" href="logout.php">Logout <span class="sr-only">(current)</span></a>
</li>
</ul>

  </div>
</nav>




<!-- Container -->
<div class="container-fluid" >
    <div  class="container-back">
    <img src="ico/reports.webp" class="img-fluid" alt="..." style="width:60%; margin:20px;"> 
		  
		<!-- <div class="container">
			<div class="row">
				<div class="col option">
				<center><h2 > <a href="Reports-Ambulance.php" class="link1"> Per Ambulance</a></h2></center>
				</div >
				<div class="col option"><center><h2><a href="Reports-AllMission.php" class="link1">All Missions</a></h2></center></div>	
			</div>
		</div> -->

<hr style="background-color:red;">
	<h4 class ="add" >Additional info<h4>

    <div class="row" style="width:auto; margin:auto;">
	
		<div class="col">
			<div class="card border-danger mb-3" style="max-width: 540px; ">
				<div class="row g-0"><!--Image -->
					<div class="col-md-4">
					<img src="ico/ems.webp" class="img-fluid rounded-start" style="width:90px;" alt="...">
					</div>
				<div class="col-md-8" style="height:250px;"><!--Card Information -->
					<div class="card-body">
					<h4 class="card-title">Rescuer</h4>
					<p class="card-text"style="font-size:15px;"></p>
					<ul class="list-group list-group-flush"style="font-size:15px;">
					<?php require("Reports_Model.php");
					while($R_EMS=mysqli_fetch_assoc($resEMS)){
						echo '<li class="list-group-item d-flex justify-content-between align-items-center "
						>'.$R_EMS["rescuer_function_desc"].'<span class="badge badge-primary badge-pill" style="background-color:red;"
						>'.$R_EMS["fctRescNb"].'</span> </li>';
					}
					
					?>

					</ul>
					</div>
				</div>
				</div>
				<div class="card-footer bg-transparent border-danger"> <p class="card-text" style="font-size:18px;"><small class="text-muted">Total &nbsp; : &nbsp;<?php  while($R_EMST=mysqli_fetch_assoc($resTotalEMS)){ echo $R_EMST["Totalresc"]; }?></small></p></div>
			</div>
		</div>
		
		<div class="col">
			<div class="card border-danger mb-3" style="max-width: 540px;">
				<div class="row g-0">
					<div class="col-md-4">
					<img src="ico/ambulance-icon.jpg" class="img-fluid rounded-start" style="width:100px;"alt="...">
					</div>
				<!-- <div class="col-md-8" style="height:250px;"> -->
					<div class="card-body" style="height:250px;">
					<a href="ambulanceReportView.php"><h5 class="card-title">Ambulance</h5></a>
					<ul class="list-group list-group-flush"style="font-size:15px;">
					<?php 
					
					while($R_AMB= mysqli_fetch_assoc($resAMB)){
						echo '<li class="list-group-item d-flex justify-content-between align-items-center "
						>'.$R_AMB["ambulanceStatus_desc"].'<span class="badge badge-primary badge-pill" style="background-color:red;"
						>'.$R_AMB["countAmb"].'</span> </li>';
					}
					?>
				
					</ul>      
					</div>
				<!-- </div> -->
				</div>
				<div class="card-footer bg-transparent border-danger"> <p class="card-text" style="font-size:18px;"><small class="text-muted">Total &nbsp; : &nbsp;<?php  while($R_AMBT=mysqli_fetch_assoc($resTotalAMB)){ echo $R_AMBT["TotalAmb"]; }?></small></p></div>
			</div>
		</div>

		<div class="col">
			<div class="card border-danger mb-3" style="max-width: 540px;">
				<div class="row g-0">
					<div class="col-md-4">
					<img src="ico/patient.webp" class="img-fluid rounded-start" style="width:90px;"alt="...">
					</div>
				<!-- <div class="col-md-8" style="height:250px;background-color:black;"> -->
					<div class="card-body">
					<h5 class="card-title">Missions</h5>
					<ul class="list-group list-group-flush"style="font-size:15px;">
					<?php 
					
					while($R_PCR= mysqli_fetch_assoc($resPCR)){
						echo '<li class="list-group-item d-flex justify-content-between align-items-center "
						>'.$R_PCR["mission_type_desc"].'<span class="badge badge-primary badge-pill" style="background-color:red;"
						>'.$R_PCR["countMission"].'</span> </li>';
					}
					?>
					</ul>      
					</div>
				
				</div>
				<div class="card-footer bg-transparent border-danger"> <p class="card-text" style="font-size:18px;"><small class="text-muted">Total &nbsp; : &nbsp;<?php  while($Res_PCR_Total=mysqli_fetch_assoc($resTotal_PCR)){ echo $Res_PCR_Total["TotalPCR"]; }?></small></p></div>
			</div>
			</div>
		</div>		



	</div>
	</div>
</div>	
<footer class="text-center text-black " style="background-color: #fff; margin-top:10px;">
  <!-- Grid container -->
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center p-3" >
 © 2022 All Right Reserved:
    <a class="text-black" >Lebanese Red Cross</a>
  </div>
  <!-- Copyright -->
</footer>
</body>
</html>
