<?php 
	include 'header.php';
 ?>
<?php 

#session_start();
include 'dbh.php';

?>

 <!DOCTYPE html>
 <html>
 <head>
    <meta charset="utf-8">
 	<title>Player</title>
 	<link rel="stylesheet" type="text/css" href="style.css">
 </head>
 <body>
 
 <div>

 		<br>
 		<a href="pachieve.php"><button>Achievement</button></a>
 		<br>
 		<br>
 		<a href="searchi.php"><button>Search Player</button></a>

  </div>


<div>
   
   <form action="" method="post" id="playerinfo">
	   	<table>
	 		<tr>
	 			<td><label>Name</label></td>
	 			<td><input type="text" name="pname" id="pname"  ></td>
	 		</tr>

	 		<tr>
	 			<td><label>Position</label></td>
	 			<td><input type="text" name="position" id="position"  ></td>
	 		</tr>

	 	  	<tr>
	 	  		<td><label>IC Number:</label></td>
	 	  		<td><input type="text" name="pic" id="pic" ></td>
	 	  	</tr>

	 	 	<tr>
	 	  		<td><label>Gender</label></td>
	 	  		<td>
		 	  		<input type="radio" name="gender" value="Male">Male
		 	  		<input type="radio" name="gender" value="Female">Female
		 	  	</td>
		 	</tr>

	 	  

		 	  <tr>
		 	  	<td><label>Tel. Number:</label></td>
		 	  	<td><input type="text" name="ptel" id="ptel" ></td>
		 	  </tr>

		 	  <tr>
		 	  	<td><label>Adress:</label></td>
		 	  	<td><input type="text" name="padress" id="padress" ></td>
		 	  </tr>

		 	  <tr>
		 	  	<td><label>Parents/Guardians' Name:</label></td>
		 	  	<td><input type="text" name="gname" id="gname" ></td>
		 	  </tr>

		 	  <tr>
		 	  	<td><label>Parents/Guardians' Tel. Number:</label></td>
		 	  	<td><input type="text" name="gtel" id="gtel" ></td>
		 	  </tr>
		 	  <tr>
		 	  	<td> </td>
		 	  	<td>
		 	  		<button type="reset">Reset</button>
		   			 <button type="submit" name="save" value="insert">Save</button>	
		 		</td>
		 	  </tr>
	 	</table>
   </form>
 			
 	


</div>
<?php 
if(isset($_POST["save"]))
{
	$sql = "INSERT INTO player VALUES ('NULL', '$_POST[pname]', '$_POST[position]', '$_POST[pic]', '$_POST[gender]', '$_POST[ptel]', '$_POST[padress]', '$_POST[gname]', '$_POST[gtel]')";
	$result = mysqli_query($conn,$sql);

}


 ?>

 </body>
 </html>