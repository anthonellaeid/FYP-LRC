<?php
  session_start();
  if (!isset($_SESSION['User'])) {
      header("Location:LogIn.php");
    
  }?>
<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
      
	<title>Earlier Today</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">	<link href='https://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Caveat:wght@500&family=Cookie&family=Lexend+Mega:wght@200&display=swap" rel="stylesheet">
<style>
.header-fixed {
	background-color:#ffffff;
	box-shadow:0 1px 1px #ccc;
	padding: 20px 40px;
	height: 100px;
	color: #000;
	box-sizing: border-box;
	top:-100px;

	-webkit-transition:top 0.3s;
	transition:top 0.3s;
}

.header-fixed .header-limiter {
	max-width: 1200px;
	text-align: center;
	margin: 0 auto;
}

/*	The header placeholder. It is displayed when the header is fixed to the top of the
	browser window, in order to prevent the content of the page from jumping up. */

.header-fixed-placeholder{
	height: 80px;
	display: none;
}

/* Logo */

.header-fixed .header-limiter h1 {
	float: left;
	font-family: "Raleway", sans-serif;
	font-size:20px;
	/* font: normal 28px Cookie, Arial, Helvetica, sans-serif; */
	line-height: 30px;
	margin: 0;
}

.header-fixed .header-limiter h1 span {
	color: #a82323;
}

/* The navigation links */

.header-fixed .header-limiter a {
	color: #000;
	text-decoration: none;
}

.header-fixed .header-limiter nav {
	font:16px Arial, Helvetica, sans-serif;
	line-height: 40px;
	float: right;
}

.header-fixed .header-limiter nav a{
	display: inline-block;
	padding: 0 5px;
	text-decoration:none;
	color: #000;
	opacity: 0.9;
}

.header-fixed .header-limiter nav a:hover{
	opacity: 1;
}

.header-fixed .header-limiter nav a.selected {
	color: #a82323;
	pointer-events: none;
	opacity: 1;
}

/* Fixed version of the header */

body.fixed .header-fixed {
	padding: 10px 40px;
	height: 50px;
	position: fixed;
	width: 100%;
	top: 0;
	left: 0;
	z-index: 1;
}

body.fixed .header-fixed-placeholder {
	display: block;
}

body.fixed .header-fixed .header-limiter h1 {
	font-size: 15px;
	line-height: 30px;
}

body.fixed .header-fixed .header-limiter nav {
	line-height: 28px;
	font-size: 13px;
}


/* Making the header responsive */

@media all and (max-width: 850px) {

	.header-fixed {
		padding: 20px 0;
		height: 100px;
	}

	.header-fixed .header-limiter h1 {
		float: none;
		margin: -8px 0 10px;
		text-align: center;
		font-size: 24px;
		line-height: 1;
	}

	.header-fixed .header-limiter nav {
		line-height: 1;
		float:none;
	}

	.header-fixed .header-limiter nav a {
		font-size: 13px;
	}

	body.fixed .header-fixed {margin-top:10px; 
		width:60%;
		display: none; 
		font-size: 5px;
	}
	ul li{ 
  	display: inline-block;

}
.subheader{	
	width:1000px;
	line-height: 10px;
	display:inline-block;
	margin:0px;
	padding-top:10px;
	height:50%;
	}
.nav-item .nav-link{	
	 font-size: 8px;
	 margin:0; 
	 padding:0;
	text-align:justify; }


}
/*
	 We are clearing the body's margin and padding, so that the header fits properly.
	 We are also adding a height to demonstrate the scrolling behavior. You can remove
	 these styles.
 */
body {
	margin: 0;
	padding: 0;
	height: 1500px;
}
a.All:link, a.All:visited {
  color: #000;
  padding: 14px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}

a.All:hover, a.All:active {
  background-color: white;
}
a.OnHold:link, a.OnHold:visited {
  
  color: #c40505;
  padding: 14px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}

a.OnHold:hover, a.OnHold:active {
  background-color: white;
}
a.Closed:link, a.Closed:visited {
  
  color: #c40505;
  padding: 14px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}

a.Closed:hover, a.Closed:active {
  background-color: white;
}
	.table-content{border-top:#CCCCCC 4px solid; width:50%;}
	.table-content th {padding:5px 20px; background: #F0F0F0;vertical-align:top;} 
	.table-content td {padding:5px 20px; border-bottom: #F0F0F0 1px solid;vertical-align:top;} 
	.column-title {text-decoration:none; color:#c40505;}
table{
	width:500%;
	}
th{
	font-size:19px;}

.Tb1{font-size:25px;}

caption {font-family: 'Caveat', cursive;
	font-family: 'Cookie', cursive;
	font-family: 'Lexend Mega', sans-serif;
	background-image:url("pics/red.webp") ;
	color: #fff;
	font-weight: bold;
	letter-spacing: .3em;
}
hr{color:red;}
#date-time{font-size:10px;}
/* caption{font: normal 28px Cookie, Arial, Helvetica, sans-serif; */



.subheader {
	color: red;
	border:2px solid #ccc;
	font-size: 14px;
	width: 60%;
	display: flex;
	align-items: center;
	justify-content: space-between;
	height:50px;
}

.nav-link{	
	color:black;
}
.nav-item{
	/* text-align:center; */
margin-right:80px;
margin-left:60px;
}

ul li{ 
  	display: inline-block;
}
i{margin:2px;}

</style>
</head>


<body>

<header class="header-fixed">

	<div class="header-limiter">

		<h1><img width = "40px"src="pics/logo.webp" > &nbsp;<a href="#">Today's Missions  <span style="margin-top:-40px; font-size:15px;"><br><?php echo ucfirst($_SESSION["User"]);?></span> </a>
		 </h1>

		<nav>
			<a href="index.php">Home </a>
			<a href="#" class="selected">Missions</a>

			<a href="PcrView.php">New Mission</a>
			

		</nav>

</header>
<center>

<div class="subheader" >
			


<!-- <ul>
		<li> <span style="font-size:12px;"></span> </li>
		<li><a href="#">Complete mission</a></li>
		<li><a href="#">Incomplete mission</a></li>
		<li><a href="#">Canceled mission</a></li>

</ul> -->
<center>
<ul class="flex-column" >
   <li class="nav-item" >
    <a class="nav-link " href="#C">Complete mission</a>
   </li>
      <li class="nav-item ">
    <a class="nav-link " href="#I">Incomplete mission</a>
   </li>
   <li class="nav-item">
    <a class="nav-link" href="#Ca">Canceled mission</a>
   </li>
</ul>
	
</center>
</div>
<!-- You need this element to prevent the content of the page from jumping up -->
<div class="header-fixed-placeholder"></div>
<br>
<!-- The content of your page would go here. -->

           <div class="container-fluid" align="center" style="margin:10px;">  
		   <form name="frmSearch" method="post" action="">
		   <div class="container-fluid" align="center"> 
	 <?php 		 
		require("unsavedD_control.php");
	
		 ?>
		 <div class="table-responsive-sm" >
	 <table class="table table-striped caption-top" id="I">
		 <caption>Incomplete Missions<br><span id='date-time'></span> </caption>
			   <thead>
			 <tr>
			 <th width="5px"><span><a href="?orderby=mission_id&order=<?php echo $MissionIDNextOrder; ?>" class="column-title">ID</a></span></th>
			   <th scope="col" width="650px"><a href="?orderby=mission_type_desc&order=<?php echo $Mission_typeNextOrder; ?>" class="column-title">Mission Type</a></th>
			   <th scope="col"><a href="?orderby=shift_desc&order=<?php echo $shift_descNextOrder; ?>" class="column-title">Shift</a></th>  
			   <th ><span><a href="?orderby=missionStatus_desc&order=<?php echo $statusNextOrder; ?>" class="column-title">Status</a></span></th>  
			   <th ><span><a href="?orderby=missionStatus_desc&order=<?php echo $statusNextOrder; ?>" class="column-title">Created By</a></span></th>  
			   <th ><span><a href="?orderby=missionStatus_desc&order=<?php echo $statusNextOrder; ?>" class="column-title"></a></span></th>  

      
     
         

 
			</tr>
		   </thead>
		 <tbody>
		 <?php
			 while($row = mysqli_fetch_array($result)) {
		 ?>
			 <tr> <td><?php echo $row["mission_id"]; ?></td>
				 <td><?php echo $row["mission_type_desc"]; ?></td>
				 <td><?php echo $row["shift_desc"]; ?></td><!--Created By -->
				 <td><?php echo $row["missionStatus_desc"]; ?><i class="fa fa-exclamation-circle" style="font-size:20px;color:orange"></i></td>
				 <td><?php echo $row["rescuer_nickname"];?></td>
				 <?php if($_SESSION['User']==$row["rescuer_nickname"]){?>
				 <td><buttontype="submit" id="<?php echo $row['mission_id']; ?>" onclick="document.location.href='PcrDraftView.php?mission_id=<?php echo $row['mission_id']; ?>'" ><i style="font-size:24px; color:#297b61;" class="fa">&#xf04b;</i></button></td>
<?php } else echo "<td></td> "; ?>
			 </tr>
		<?php
			 }
		?>
		<tbody>
	   </table>

	   </form>
			</div>


			<br> <hr> <br>
			 
		   <form name="frmSearch2" method="post" action="">

	 <?php 		 
	
	 if(!empty($result2))	 { 
		 ?>
		 <div class="table-responsive-sm">
	 <table class="table table-striped caption-top" id="C" >
		 <caption>Complete Missions</caption>
			   <thead>
			 <tr>
			 <th width="col"><span><a href="?ordersby=mission_id&orders=<?php echo $MissionIDNextOrder2; ?>" class="column-title">ID</a></span></th>
			   <th scope="col" width="650px"><a href="?ordersby=mission_type_desc&orders=<?php echo $Mission_typeNextOrder2; ?>" class="column-title">Mission Type</a></th>
			   <th scope="col"><a href="?ordersby=shift_desc&orders=<?php echo $shift_descNextOrder2; ?>" class="column-title">Shift</a></th>  
			   <th ><span><a href="?ordersby=missionStatus_desc&orders=<?php echo $statusNextOrder2; ?>" class="column-title">Status</a></span></th>  
			   <th scope="col"><a href="?ordersby=shift_desc&orders=<?php echo $shift_descNextOrder2; ?>" class="column-title">Created by</a></th>  

     
         

 
			</tr>
		   </thead>
		 <tbody>
		 <?php
			 while($row = mysqli_fetch_array($result2)) {
		 ?>
			 <tr> <td><?php echo $row["mission_id"]; ?></td>
				 <td><?php echo $row["mission_type_desc"]; ?></td>
				 <td><?php echo $row["shift_desc"]; ?></td><!--Created By -->
				 <td><?php echo $row["missionStatus_desc"]; ?><i class="fa fa-check" style="font-size:24px; color:Green;" ></i></i></td>
				 <td><?php echo $row["rescuer_nickname"];?></td>
			 </tr>
		<?php
			 }
		?>
		<tbody>
	   </table>
	 <?php }


	 if(!empty($resultCancel))	 { 
			?><hr>
			<div class="table-responsive-sm">
		<table class="table table-striped caption-top" id="Ca">
			<caption>Canceled Missions</caption>
				  <thead>
				<tr>
				<th width="col"><span><a href="?orderByCanceled=mission_id&orderCancel=<?php echo $MissionIDNextOrder3; ?>" class="column-title">ID</a></span></th>
				  <th scope="col" width="650px"><a href="?orderByCanceled=mission_type_desc&orderCancel=<?php echo $Mission_typeNextOrder3; ?>" class="column-title">Mission Type</a></th>
				  <th scope="col"><a href="?orderByCanceled=shift_desc&orderCancel=<?php echo $shift_descNextOrder3; ?>" class="column-title">Shift</a></th>  
				  <th ><span><a href="?orderByCanceled=missionStatus_desc&orderCancel=<?php echo $statusNextOrder3; ?>" class="column-title">Status</a></span></th>  
		   
		 
		
			
   
	
			   </tr>
			  </thead>
			<tbody>
			<?php
				while($row = mysqli_fetch_array($resultCancel)) {
			?>
				<tr> <td><?php echo $row["mission_id"]; ?></td>
					<td><?php echo $row["mission_type_desc"]; ?></td>
					<td><?php echo $row["shift_desc"]; ?></td><!--Created By -->
					<td><?php echo $row["missionStatus_desc"]; ?><i class="fa fa-ban" style="font-size:24px; color:#9e0129;" ></i></i></td>
   
				</tr>
		   <?php
				}
		   ?>
		   <tbody>
		  </table>
		<?php } ?>
	   </form>
			</div>
                </div> 
</div>








</body>

</html>

