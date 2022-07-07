<?php
  session_start();
  // $rescuerId=$_SESSION["rescuer_id"];
  if (!isset($_SESSION['User'])) {
      header("Location:LogIn.php");

  }

?>
<!DOCTYPE html>
<html>
<head>
<title>Lebanese Red Cross</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="css/googleFont.css">
<style>
body,h1 {font-family: "Raleway", sans-serif}
body, html {height: 100%}
.bgimg {
  background-image: url('pics/what-it-costs.jpg');
  min-height: 100%;
  background-position: center;
  background-size: cover;
}
a:link {
  text-decoration: none;
}
/**/
button {
    background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0, 0.4);
  background-color: Transparent;
  border: none;
  color:white;
  text-shadow: 3px 3px 5px  #000000;
}

.shadow:hover {background-color:
hsla(0, 100%, 70%, 0.1);
 opacity: 0.4;
color:black;}

.shadow{color: white;
  text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px black;
  border:none;
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,1, 0.4);}

</style>
</head>
<body>

<div class="bgimg w3-display-container w3-animate-opacity w3-text-white">
  <div class="w3-display-topleft w3-padding-large w3-xlarge">
    <img src="pics/logo.webp" width="20%" style="float:left;"><p style="float:left; margin-left:5%;">Welcome <?php echo ucwords($_SESSION["User"]);?></p>
  </div>
  <div class="w3-display-middle">
    <h1 class="w3-jumbo w3-animate-top"><button  >Patient Care Report</button></h1>
    <hr class="w3-border-grey" style="margin:auto;width:40%">
    <p class="w3-large w3-center"> <button id="newPCr"class="shadow" >New PCR</button></p>
    <p class="w3-large w3-center"><button id="myButton" class="shadow">Today's Missions</button></p>
    <p class="w3-large w3-center"> <button id="Logout" class="shadow" >Log Out</button></p>

  </div>
  <!-- -->
<?php ?>
<script>



document.getElementById("myButton").onclick = function () {
        location.href = "unsavedD.php";
    };

document.getElementById("Logout").onclick=function(){
location.href="logout.php";
} ; 

document.getElementById("newPCr").onclick=function(){
  location.href="PcrView.php";
}
</script>

  <div class="w3-display-bottomleft w3-padding-large">
    Powered by Lebanese red cross</a>
  </div>
</div>

</body>
</html>
