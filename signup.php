<?php 
	include 'header.php';
 ?>

<!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<title></title>
 </head>
 <body >
 	<?php

	$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	if(strpos($url, 'error=empty')!==false){
		echo "Fill out all fields!";
	}


	if(isset($_SESSION['id'])){
                header("location: login.php");
                echo "<script>alert ('You're Already Logged In)</script>";

	}
	else{
		echo "<form action='includes/signup.inc.php' method='POST' id=signupp>
	<input type='text' name='first' placeholder='Firstname' class=first><br>
	<input type='text' name='last' placeholder='Lastname' class=last><br>
	<input type='text' name='uid' placeholder='Username' class=uid><br>
	<input type='Password' name='pass' placeholder='Password' class=pass><br>
	<button class=signup>Sign Up</button>
	</form>";
	}
 ?>

 </body>
 </html>

 <style type="text/css">
 	body{
 		background-image: url("bgtest.jpg");
 	}

 	.signup{

	border: none;
	margin-right: 20px;
	background-color: #E8A610;
	color:#000;
	font-size: 20px;
	cursor: pointer;
 		height: 40px;
	margin-top: 0px;
	margin-right: 20px;
	margin-left: 20px;
	padding-bottom: :10px;
	padding-right: 10px;
	padding-left: 10px;
	width: 355px;
	align-self: center;
 	}

 	.signup:hover{
 		background-color: #c6A806;
 	}
 </style>

 




