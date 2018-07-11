<?php 
	include 'header.php';
 ?>



<?php
	if(isset($_SESSION['id']))
	{
		//echo $_SESSION['id'];
	}
	else
	{
		echo " ";
		//header("Location: login.php");

	}
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>VAM</title>
 </head>
 <body>

<nav>
<img  name="logo" src="logo_VAM.png" alt="VAM's Logo" class="logo">
	
</nav>
<p>
	
</p>
 
 </body>
 </html>

<style type="text/css">
nav {
	background-color: darkgrey;
	text-align: center;

}

.logo{
	/*text-align: center;*/
	margin-top: 30px;
	padding-top: ;
	visibility: block;
}

body{
	background-color: darkgrey;
}

</style>






