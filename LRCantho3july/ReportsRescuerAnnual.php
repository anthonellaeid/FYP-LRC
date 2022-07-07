<?php session_start();
if(!isset($_SESSION["login"]))
	header("location:index.php");

  require_once("ReportsRescuerAnnual_Modal.php");
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
 .container-back{background-color:#c4c4c4;
                   }
.btn{
  float:right;
  margin-right:5%;
}
h3{
  margin:1%;
}
footer{
  background-color: #fff; 
   position: absolute;
    bottom:0%;
     right:40%; 
}
.Configure{
  padding:1%;
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

    <a class="navbar-brand" href="Reports.php">Reports</a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

      <li class="nav-item active">
        <a class="nav-link" href="#">Ambulance Reports <span class="sr-only">(current)</span></a>
      </li>
	  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="ReportsRescuerAnnual.php" role="button" style="color:red;" aria-haspopup="true" aria-expanded="false">Rescuer Report Annual</a>
    <div class="dropdown-menu">
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
<div class="container-fluid" style="margin-left:7%;width:85%;"  >
    <div  class="container-back">
    <form method="POST" action="ReportsRescuerAnnual.php">

    <div class="Configure">
    	<h3> Configure Report </h3>
      
      <div class="row">
     
 
      <!-- Rescuer Select -->
      <div class="col"  >
      <label> Rescuer</label>
      <select class="custom-select my-1 mr-sm-2" id="SelectRescuer" name="SelectRescuer" style="width:150px;">
        <option selected>Choose...</option>
        <?php 
        require('DBconnection.inc.php');

          while($resRes=mysqli_fetch_assoc($resultRes)){
            echo "        
            <option value='".$resRes['rescuer_id']."'>".$resRes['rescuer_nickname']."</option>
            ";}
        ?>
      </select>	  
      </div>

      <!-- Year Select -->
      <div class="col">
      <label> Year</label>
      <select class="custom-select my-1 mr-sm-2" id="SelectYear" name="SelectYear" style="width:150px;">
      <?php 
        require('DBconnection.inc.php');

        while($resY=mysqli_fetch_assoc($resultYear)) {  
        echo"<option  value='".$resY['yearM']."' ";
        if($resY['yearM']==date('Y')){
        echo" selected";}
        echo "> ".$resY['yearM']."</option>";
        }
        ?>
      </select>	
      </div>     

      <!-- Shift Select -->
      <div class="col">
      <label> Shift</label>
      <select class="custom-select my-1 mr-sm-2" id="SelectShift" name="SelectShift" style="width:150px;">
        <option selected>Choose...</option>
      <?php 
      require('DBconnection.inc.php'); 

      while($resS=mysqli_fetch_assoc($resShift)){
        echo '<option value="'.$resS['shift_code'].'" > '.$resS['shift_code'].' </option>
        ';
      }      
      ?>
      </select>
      </div>

      <div class="col " >
      <button class="btn btn-second " id="Clearbtn" > Clear</button> 
        <button class="btn btn-second" id="Submitbtn" name="Submitbtn"  style="background-color:red;color:#fff; "> Submit</button>
 
      </div>
      </div>
    </div>
  </div>
<br>

<!-- Table -->
<?php
require('DBconnection.inc.php');
$resRownb=mysqli_num_rows($resTable);
echo'<div id="Mytable">';

if($resRownb>0){
echo '<table class="table table-bordered table-striped " style="border-color:red; ">
<thead style="background-color:#ef1e1e;color:white;">
  <tr>
    <th scope="col">Mission Type</th>
    <th scope="col">Shift</th>
    <th scope="col">Year</th>
    <th scope="col">Total</th>
  </tr>
</thead> 
 <tbody id="tableBody">';
 while($row=mysqli_fetch_assoc($resTable)){
  echo " <tr>
  <td>".$row['mission_type_desc']."</td>
  <td>".$row['shift_code']."</td>
  <td>".$row['Year(mission_start_date)']."</td>
  <td>".$row['COUNT(`mission_type_desc`)']."</td>


";
 }
echo "</tbody>
</table></div>";
$w=mysqli_num_rows($q);
// echo "<script>alert('".$w."');</script>";
if($w>0){
  $qq=mysqli_fetch_assoc($q);
  echo "<div ><center><p id='text1' style='color:grey;'>List of Completed Missions Done By 
        <strong>".$qq['rescuer_nickname']." 
        </p> </center></div><br>";}

}
else echo "No result found ";

if(isset ($_GET['M'])){
  $M=htmlspecialchars($_GET['M']);
  $M=mysqli_real_escape_string($conn,$M);
echo"<script>alert('".$M." '); </script>";
 
}
?>

</form>
   


<footer class="text-center text-black " >
  <!-- Copyright -->
  <div class="text-center p-3" style="text-align: center;" > 
  © 2022 All Right Reserved:  <a class="text-black" >Lebanese Red Cross</a>
  </div>
  <!-- Copyright -->
</footer>
</body>
</html>
<!-- <script>
document.getElementById('Submitbtn').onclick=function(){
var rescuerId=document.getElementById("SelectRescuer").value;
var Year=document.getElementById("SelectYear").value;
var shift=document.getElementById("SelectShift").value;
if(rescuerId =='Choose...' ||shift=='Choose...'){
  alert("Choose nickname and Select shift");
}
else{
  funcQuery(rescuerId,Year,shift);
}
}

function funcQuery(rescuerId,Year,shift) {
  var httpRequest = new XMLHttpRequest();
  httpRequest.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      alert(this.responseText);
    // reload();

    }
  };
  if ( this.status == 404){
    alert("Not Found");
  }
  httpRequest.open("POST", "ReportsRescuerAnnual_Modal.php", true);
  httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  httpRequest.send('rescuer_id='+rescuerId+'&Year(mission_start_date)='+Year+'&shift_code='+shift);
}


function reload(){
    var container = document.getElementById("Mytable");
    var content = container.innerHTML;
    container.innerHTML= content; 
    // var tableBody=document.getElementById("tablebody");
    // tableBody.innerHTML=
    
   //this line is to watch the result in console , you can remove it later	
    console.log("Refreshed");
    console.log(container); 
}
</script> -->

