<?php session_start();
if(!isset($_SESSION["login"]))
	header("location:index.php");
?>
<!DOCTYPE html>
<header>
    <title>Data Management</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
<!--  -->


<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js" crossorigin="anonymous"></script>

<link rel="stylesheet" href="css/DataManagement.css"   >
<style>
a:link, a:visited {
  color: black;
  padding: 10px 20px;
  text-align: center;
  display: inline-block;}
a:hover, a:active {
  background-color: white;
  color: red;}
  
ul{border-bottom:2px solid black;
    border-top:2px solid black;
    background-color:white;}
.c1{margin:4%;
    width:auto;
}
#A{margin-top:7%;}
.cadre{
    border:2px solid darkgrey;
}
</style>
</header>
<body>
<!-- primar navbar -->
<ul class="nav fixed-bottom mr-auto mt-2 mt-lg-0 justify-content-center">
  <li style="color:red;"><img src="pics/DataManagement.png" width="50px">Data Managment</li>
   <li style="margin-top:4px;margin-left:5px;">  <a class="nav-link " href="settings.php">Settings </a>  </li>
   <li class="nav-item" style="margin-top:4px;"> <a class="nav-link " href="logout.php">Log out  </a>  </li>
</ul>
<!-- second navbar -->
<ul class="nav nav-pills nav-fill fixed-top">
   <li class="nav-item">
    <a class="nav-link " href="DataManagement_index.php#A">Ambulance</a>
   </li>
      <li class="nav-item">
    <a class="nav-link " href="DataManagement_index.php#S">Ambulance Status</a>
   </li>
   <li class="nav-item">
    <a class="nav-link" href="DataManagement_index.php#Ad">Address</a>
   </li>
      <li class="nav-item">
    <a class="nav-link " href="#City">City</a>
   </li>
   <li class="nav-item">
    <a class="nav-link" href="#M">Medical Case</a>
   </li>
   <li class="nav-item">
    <a class="nav-link " href="#C">Shift</a>
   </li>
   <li class="nav-item">
    <a class="nav-link " href="#C">CM-kit</a>
   </li>
   <li class="nav-item">
    <a class="nav-link " href="#U">UHF radio-kit</a>
   </li>
</ul>
<!-- End of navigations-->
<center>
<div class="container " >
    <h3 id="A">Ambulance<img src="DataManagementModel/Ambulance/amb_ico.jpg " width="50px" style="margin-left:20px;"></h3>
    <div class="form-group">
    <div class="row">
     <div class="col-md-10  " ><label>Select option</label>     <select id="SelectColumn">
         <option>  </option>
        <option value="ambulance_plateNb">Plate Number </option>
        <option value="ambulance_description">description </option>
        <option value="ambulanceStatus_desc">Status </option>
        <option value="ambulance_final_km">Final KM</option>
        <option value="Ambulance_max_patient_nb">#Patient </option>
</select>    <input type="text" id="tags" placeholder="Search" class="form-control" data-role="tagsinput" />
 
    </div>
     <div class="col-md-3.5">
      <button type="button" name="search" class="btn btn-sm  cadre" id="search">Search</button>
      <button type="button" name="reset" class="btn btn-sm  cadre" id="reset">Reset</button>  </div>
    </div>
   </div>
        <div class="table-responsive" id="div1" style="margin-top:-7%;">
        <br><br><br><br>

          <span id="result1"></span>
          <div id="live_data1"></span>  
        </div>
</center>

</div>
<script>  $(document).ready(function(){
function reloadPage(){
        location.reload();
    }

    });
  </script>
 
</div>
</body>
</html>
<?php require("DataManagement_Control.php"); ?>
    </body>
    </html>