<?php 
	session_start();
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<header>
	<style type="text/css">
		
</style>
		<div class="dropdown">
		  <a href="b4manplayer.php"><button class="dropbtn">PLAYER</button></a>
		  <div class="dc">
		    <a href="addplayer.php">ADD NEW PLAYER</a>
		    <a href="b4manplayer.php">MANAGE PLAYER</a>
		  </div>
		</div>
		<div class="dropdown">
		  <a href="b4pachieve.php"><button class="dropbtn">RECORD</button></a>
		</div>
		<div class="dropdown">
		  <button class="dropbtn">REPORT</button>
		  <div class="dc">
		    <a href="rachieve.php">OVERALL</a>
		    <a href="b4rachieve.php">BY PLAYER</a>
		    <a href="rachieveplayer.php">BETWEEN PLAYER</a>
		  </div>
		</div>
		<nav>
			<ul>
				<li><a href="login.php">HOME</a></li>
				<?php
				if(isset($_SESSION['id']))
				{
					echo "<form action='includes/logout.inc.php'>
				 	<button class=btn>Log Out</button>
					</form>";
				}else
				{
					echo "<form action='includes/signin.inc.php' method='POST'>
					<input type='text' name='uid' placeholder='Username'>
					<input type='Password' name='pass' placeholder='Password'>
					<button class=btn>Sign in</button>
					</form>";
				} 
			
				 ?>
				<li><a href="signup.php">SIGN UP</a></li>
			</ul>
		</nav>
	</header>
</body>
</html>

<style type="text/css">
	
nav ul {
	float: right;
	margin-top: -40px;
	margin-right: 30px;

}

nav ul li {
	list-style: none;
	float: left;
	margin-right: 20px;
}

nav ul li a {
	color: #fff;
	font-family: sans-serif;
	font-size: 16px;

	
}

.dropbtn {
    background-color: #444444;
    color: #E8A711;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
    height: 60px;
    margin: none;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dc {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 200px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
}

.dc a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dc a:hover {background-color: #f1f1f1}

.dropdown:hover .dc {
    display: block;
}

.dropdown:hover .dropbtn {
    background-color: dimgray;
}

	
	
</style>