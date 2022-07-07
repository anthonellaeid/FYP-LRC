<?php session_start();
if(!isset($_SESSION["login"]))
	header("location:index.php");
?>
<!Doctype html>
<html>
<header>
<title>LRC-Settings</title>
<meta name="viewport" content="width=device-width; initial-scale=1.0">
<style>
:root {
	--primary-color: #cc0000;
	--secondary-color: #7c0000;
}
p{margin-top:6px; text-align:center;}

html,


* {
	box-sizing: border-box;
	margin: 0;
	padding: 0;
}

body {
	font-family: 'Roboto', sans-serif;
	display: flex;
	flex-direction: column;
}



.container {
	width: 80%;
	margin: 0 auto;
	overflow: none;
	padding: 10px;
}

.app-header {
	background: var(--primary-color);
	box-shadow: 3px 3px 10px #888888;
}

.app-header .container {

	display: flex;
	flex-direction: column;
	align-items: center;
	/* justify-content: space-between; */
	justify-content: center;
	padding: 10px 10px;
}

.app-header .logo {
	width: 170px;
	margin-bottom: 1rem;
}



.subheader {
	background: var(--secondary-color);
	color: #fff;
	box-shadow: 3px 3px 10px #888888;
	font-size: 14px;
	padding: 10px;
	width: 90%;
	margin: 0 auto 1rem;
	display: flex;
	align-items: center;
	justify-content: space-between;
}

.subheader p {
	margin: 4px;
}



.grid {
	display: grid;
	grid-template-columns: repeat(2, 1fr);
	grid-gap: 50px;
}

.grid .item {	height:120%;
	display: flex;
	flex-direction: column;
	border: 1px #ccc solid;
	padding: 10px;
	box-shadow: 1px 1px 2px #ccc;
}

.grid .item h3 { text-align:center;
	margin-bottom: 2px;
}

.grid .item p {
	font-size: 14px;
	color: var(--secondary-color);
	font-weight: bold;
	/* margin-bottom: 5px; */
}

.grid .item img {
	width: 60px;
	text-align: right;
	display: block;
	align-self: center;
	/* margin-bottom:20px; */
}

.app-footer {
	flex-shrink: 0;
	background: #f4f4f4;
	color: #444;
	padding: 10px;
	font-size: 14px;
	margin-top: 10%;
	position:fixed;
	bottom:0;
	width:100%;
}

.app-footer ul {
	display: flex;
	align-items: center;
	justify-content: space-around;
}

.app-footer ul li {
	display: flex;
	flex-direction: column;
	align-items: center;
}

.app-footer ul li i {
	font-size: 22px;
}

.text-header{color:#dcdcdc; font-size:10px;}


/* Desktop */
@media (min-width: 768px) {
	.grid {
		grid-template-columns: repeat(4, 1fr);
	}

	.grid .item img {
		width: 150px;
		height: 150px;
	}
}


/**/
i{position:absolute;
float:right;
right:7%;
}
a.subhead:link {
  text-decoration: none;
  color:#ffff;
}
a.subhead:visited {
  color: white;
}

/* mouse over link */
a.subhead:hover {
  color: white;
}

/* selected link */
a.subhead:active {
  color: white;
}
/**/

/**/
h3 a:link{color:#000000;}

h3 a:visited {text-decoration: none;
  color: #000000;
}

/* mouse over link */
h3 a:hover {text-decoration: none;
  color: #990000;
}

/* selected link */
h3 a:active {text-decoration: none;
  color: #000000;
}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</header>
<body>


		<div class="content">
			<header class="app-header">
				<div class="container">
					<!--<img class="logo" src="https://i.ibb.co/G5jyXN9/logo.png" alt="" />-->
					<img class="logo" src="pics/logo.webp" alt="">
				<p class="text-header">	The Priority Needs,We Will Address<p>
				</div>
			</header>

			<div class="subheader">
				<div>
					<p>Welcome Administrator ! <a href="logout.php" class="subhead"> <i style="font-size:24px" class="fa">&#xf08b;</i></a></p>
					
				</div>
				
			</div>

			<div class="grid container">
				<div class="item">
				<img src="pics/user.png" alt="" /><br>
					<h3><a href="ManageRescuerView24.php" >Manage Rescuer</a></h3>
					<p class="desc">Add Rescuer<br>Edit Rescuer Information</p>
				</div>
				<div class="item">
				<img src="pics/setting19.png" alt="" /> <br>
					<h3><a href="AccountManagement_view" >Manage Accounts</a></h3>
					<p class="desc">Add or Edit Accounts</p>
				</div>
				<div class="item">
				<img src="pics/data.jpg" alt="" /> <br>
					<h3><a href="DataManagement_index.php" >Manage Data</a></h3>
					<p class="desc"> Add Data<br>Update Data<br> Remove Data</p>
				</div>
				<div class="item">
				<img src="pics/newspaper.png" alt="" /> <br>
					<h3><a href="Reports.php" >Reports</a></h3>
					<p class="desc">Monthly Missions Per Ambulance<br>All Missions</p>
				</div>
			
			</div>
		</div>
<br>
		<footer class="app-footer"><center>
		<p>2022 Lebanese Red Cross. All rights reserved.</p></center>
		</footer>
		</body>
		</html>