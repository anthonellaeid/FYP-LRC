<?php session_start();?>
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
  background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),url('pics/what-it-costs.jpg');
  min-height: 100%;
  background-position: center;
  background-size: cover;
}
a:link {
  text-decoration: none;
}
/**/
button {
  background-color: Transparent;
  border: none;
  color:white;
  text-shadow: 3px 3px 5px  #000000;
}
.shadow{
  border:2px solid white;
  height:50px;
  width:120px;

}
.shadow:hover {background-color:
hsla(0, 100%, 70%, 0.3);
 opacity: 0.3;}
.popup1 {
  position:absolute;
  top:-150%;
  left:50%;
  opacity:0;
  transform:translate(-50%,-50%) scale(1.25);
  width:380px;
  padding:20px 30px;
  background:#fff;
  box-shadow:2px 2px 5px 5px rgba(0,0,0,0.15);
  border-radius:10px;
  transition:top 0ms ease-in-out 200ms,
             opacity 200ms ease-in-out 0ms,
             transform 200ms ease-in-out 0ms; 
}
.popup1.active {
  top:50%;
  opacity:1;
  transform:translate(-50%,-50%) scale(1);
  transition:top 0ms ease-in-out 0ms,
             opacity 200ms ease-in-out 0ms,
             transform 200ms ease-in-out 0ms;
}
.popup1 .close-btn {
  position:absolute;
  top:10px;
  right:10px;
  width:15px;
  height:15px;
  background:#888;
  color:#eee;
  text-align:center;
  line-height:15px;
  border-radius:15px;
  cursor:pointer;
}
.popup1 .form h2 {
  text-align:center;
  color:#222;
  margin:10px 0px 20px;
  font-size:25px;
}
.popup1 .form .form-element {
  margin:15px 0px;
}
.popup1 .form .form-element label {
  font-size:14px;
  color:#222;
}
.popup1 .form .form-element input[type="text"],
.popup1 .form .form-element input[type="password"] {
  margin-top:5px;
  display:block;
  width:100%;
  padding:10px;
  outline:none;
  border:1px solid #aaa;
  border-radius:5px;
}
.popup1 .form .form-element input[type="checkbox"] {
  margin-right:5px;
}
.popup1 .form .form-element button {
  width:100%;
  height:40px;
  border:none;
  outline:none;
  font-size:16px;
  background:#222;
  color:#f5f5f5;
  border-radius:10px;
  cursor:pointer;
}
.popup1 .form .form-element a {
  display:block;
  text-align:right;
  font-size:15px;
  color:#1a79ca;
  text-decoration:none;
  font-weight:600;
}

</style>
</head>
<body>

<div class="bgimg w3-display-container w3-animate-opacity w3-text-white">
  <div class="w3-display-topleft w3-padding-large w3-xlarge">
    <img src="pics/logo.webp" width="20%">
  </div>
  <div class="w3-display-middle">
    <h1 class="w3-jumbo w3-animate-top"><button>Patient Care Report</button></h1>
    <hr class="w3-border-grey" style="margin:auto;width:40%">

	 <p class="w3-large w3-center"> <button class="shadow" id="show-login">Log In</button></p>
  </div>
  <!-- -->
<form action ="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
  <div class="popup1" style="width:38%;height:50%;">
    <div class="close-btn">&times;</div>
  <div class="form">
      <h2>Log in</h2>
      <div class="form-element">
        <label for="email">Username</label>
        <input type="text" name="username" id="email" placeholder="Enter username">
      </div>
      <div class="form-element">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="Enter password">
      </div>
      <div class="form-element">
        <p style="color:black; font-size:10px;"> Administrator Account is directed to the setting page</p>
        <button><input type="hidden" value="Sign in" >Sign in</button>
      </div>
  </div>
</div>
</form>
<?php require("LogIn_control.php");?>
<script>
document.querySelector("#show-login").addEventListener("click",function(){
  document.querySelector(".popup1").classList.add("active");
});


document.querySelector(".popup1 .close-btn").addEventListener("click",function(){
  document.querySelector(".popup1").classList.remove("active");
});


</script>

  <div class="w3-display-bottomleft w3-padding-large">
    Powered by Lebanese red cross</a>
  </div>
</div>

</body>
</html>
