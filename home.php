<?php 
	include 'header.php';
 ?>

 <?php
	if(isset($_SESSION['id']))
	{
		echo $_SESSION['id'];
	}
	else
	{
		echo "You're are not logged in!";
    header ("location:login.php");
	}
 ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>HOME</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body background="bgtest.jpg">
  <div align="center">
  	
  		<table>
  			<tr>
  				<td><a href="backuptest.php"><img src="player icon1.jpg" alt="Player" class="iplayer"></a></td>
  				<td><img src="achievement icon.jpg" alt="Achievement" class=iachieve ></td>
  				<td><img src="volley icon.jpg" alt="Matches" class=ivolley ></td>
  			</tr>
  		</table>
  		
  	
  </div>

</body>
</html>

