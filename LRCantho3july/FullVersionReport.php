<?php session_start();
if(!isset($_SESSION["login"]))
	header("location:index.php");

  require_once("FullVersionReport_Modal.php");
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
th{
  text-align:center;
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

<!--far right nav -->
	<ul class="navbar-nav my-auto my-2 my-lg-0">

<li class="nav-item active">
  <a class="nav-link" href="ReportsRescuerMonthly.php"><img src="back.png" width="25px"></a>
</li>
<li class="nav-item active">
<a class="nav-link" href="#"> <Button  onclick="window.print()" ><i style="font-size:24px" class="fa">&#xf02f;</i> </Button></a>
</li>
</ul>
<form action="<?php echo $_SERVER['PHP_SELF']; ?> " method="POST">

  </div>
  <div style="float:right">
<input type="text" name="text" id="text"  placeholder="Search">
<select name="SelectOption" id="SelectOption"><option value="patient_firstName">Patient first name</option>
<option value="mission_type_desc">mission Type</option>
</select>
<button name ="Search" id="Search"><i class="fa fa-search"></i></button>
<button><i style="font-size:14px" class="fa">&#xf021;</i></button>
</div>
</nav>

<br>
<?php
if(isset($_SESSION['Year'])&& isset($_SESSION['rescuerId']) && isset($_SESSION['shift'])&& isset($_SESSION['Month'])){
// $Year=htmlspecialchars($_GET['Year']);
// $Year=mysqli_real_escape_string($conn,$Year);
$Year=$_SESSION['Year'];
// $Shift=htmlspecialchars($_GET['shift']);
// $Shift=mysqli_real_escape_string($conn,$Shift);
$Shift=$_SESSION['shift'];
$rescuerId=$_SESSION['rescuerId'];
$Month=$_SESSION['Month'];}
$w=mysqli_num_rows($q);
if($w>0){
  $qq=mysqli_fetch_assoc($q);
$rescuer=$qq['rescuer_nickname']; 
$Month=$qq['monthM'];
echo "<center><h3>Full Report Results with : Rescuer-nickname:".$rescuer.", Month :".$Month.",
 Year: ".$Year.", Shift: ".$Shift."</h3></center><br>";
}
?>
<div  style="width:97%;margin-left:1%;">
<table class="table table-bordered table-striped " >
<thead style="color:#dd0101;">
  <tr>
  <th scope="col"style="width:7%;">Mission id</th>
    <th scope="col"style="width:9%;">Mission Type</th>
    <th scope="col"style="width:7%;">Start Date</th>
    <th scope="col"style="width:7%;">End Date</th>
    <th scope="col"style="margin-top:-50px;">Shift</th>
    <!-- <th scope="col"> D tank</th>
    <th scope="col"> E tank</th>
    <th scope="col"> M tank</th>
    <th scope="col">UHF radio</th>
    <th scope="col">CM kit</th> -->
    <th scope="col" style="width:7%;">Src Addr.</th>
    <th scope="col"style="width:8%;">Dest. Addr.</th>
    <th scope="col"style="width:7%;">Patient </th>
    <th scope="col" style="width:7%;">D.O.B.</th>
    <th scope="col" style="width:7%;">Natl.</th>
    <th scope="col"style="width:7%;">REL. name</th>
    <th scope="col" style="width:10%;">Medical Case</th>
    <th scope="col" style="width:12%;">involved rescuers</col>

  </tr>
</thead>
<tbody class="table-striped ">
  <?php
  $F=mysqli_num_rows($ResQtable);
  if($F>0){

    while($V=mysqli_fetch_assoc($ResQtable)){
    echo "<tr>
        <th scope='row'>".$V['mission_id']."</th>
        <td>".$V['mission_type_desc']."</td>
        <td>".$V['mission_start_date']."</td>
        <td>".$V['mission_end_date']."</td>
        <td>".$V['mission_shift_code']."</td>
        <td>".$V['Source_addr']."</td>
        <td>".$V['Dest_addr']."</td>
        <td>".$V['patient_firstName']."/".$V['patient_lastName']."</td>
        <td>".$V['patient_dateOfBirth']."</td>
        <td>".$V['nationality_desc']."</td>
        <td>".$V['patient_relativeName']."</td>
        <td><ul>";

          while($m=mysqli_fetch_assoc($ResQMedicalCase)){
            if($m['mission_id']==$V['mission_id']){
          echo "<li>".$m['medicalCase_desc']."</li>";
            
            }
        }
        echo  "</td><td><ul>";
        mysqli_data_seek($ResQMedicalCase,0);
        $rowr=mysqli_num_rows($ResQNickname);
        $i=1; 
            while($r=mysqli_fetch_assoc($ResQNickname) )
            {
              if($r['mission_id']==$V['mission_id']){
              echo "<li>".$r['rescuer_nickname']."</li>";
              }

          }
        mysqli_data_seek($ResQNickname,0); 

        echo "</ul></td></tr>";        
        

    }
  }
else{
    echo "No Result found ";
  }
  ?>
</tbody> 
</table>

</div>


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
let postObj = { 
    Select:document.getElementById("SelectOption").value , 
    text:document.getElementById("text").text
}
document.getElementById('Search').onclick=function(){
var Select=document.getElementById("SelectOption").value;
var text=document.getElementById("text").text;

if(text==''){
  alert("Enter Search");
}
else{
  funcQuery(Select,text);
}
}

function funcQuery(Select,text) {
  let post = JSON.stringify(postObj)
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
  // httpRequest.open('POST', url, true)
  httpRequest.open("POST", 'FullVersionReport_Modal.php', true);
  httpRequest.setRequestHeader('Content-Type', 'application/json; charset=UTF-8');
  httpRequest.send('SelectOption='+SelectOption+'&text='+text+'&nickname=Driver1'&Month='+<?php echo $Month;?>+'&Year='+<?php echo $Year;?>+'&shift=EDJ');

 
}

  </script> -->