<?php 
	include 'header.php';
 ?>
<?php 

#session_start();
include 'dbh.php';


		
if (isset($_POST["search"]))
{
	$id = $_POST['pid'];
	$sql = "SELECT pname, position, pic, gender, ptel, padress, gname, gtel FROM player WHERE pid= $id LIMIT 1" ;
	$result = mysqli_query($conn,$sql);
	if(mysqli_num_rows($result) > 0)
	{
		while ($row = mysqli_fetch_array($result)) 
		{
			$pname =$row['pname'];
			$position =$row['position'];
			$pic =$row['pic'];
			$gender =$row['gender'];
			$ptel=$row['ptel'];
			$padress =$row['padress'];
			$gname =$row['gname'];
			$gtel =$row['gtel'];
		}

	}else{

		echo "Player is not on the list";
		$pname ="";
		$position ="";
		$pic ="";
		$gender ="";
		$ptel="";
		$padress ="";
		$gname ="";
		$gtel ="";

	}

	mysqli_free_result($result);
	mysqli_close($conn);
}else{
		$pname ="";
		$position ="";
		$pic ="";
		$ptel="";
		$gender="";
		$padress ="";
		$gname ="";
		$gtel ="";
}

?>

 <!DOCTYPE html>
 <html>
 <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 	<title>Search</title>
 	<link rel="stylesheet" type="text/css" href="style.css">
 </head>
 <body>
 
 <div>

 
 <form action="" method="post" id="playerinfo">
 			
 	<table>

 	<tr>
 		<td><label>Player's ID</label></td>
 		<td><input type="text" name="pid" id="pid" ></td>
 	</tr>
 	<tr>
 		<td><label>Name</label></td>
 		<td><input type="text" name="pname" id="pname"  value="<?php echo $pname;?>"></td>
 	</tr>

 	<tr>
 		<td><label>Position</label></td>
 		<td><input type="text" name="position" id="position"  value="<?php echo $position;?>"></td>
 	</tr>

 	  <tr>
 	  	<td><label>IC Number:</label></td>
 	  	<td><input type="text" name="pic" id="pic" value="<?php echo $pic;?>"></td>
 	  </tr>

 	  <tr>
 	  	<td><label>Gender</label></td>
 	  	<td>
 	  		<input type="text" name="gender" value="<?php echo $gender;?>">
 	 
 	  	</td>
 	  </tr>

 	  <tr>
 	  	<td><label>Tel. Number:</label></td>
 	  	<td><input type="text" name="ptel" id="ptel" value="<?php echo $ptel;?>"></td>
 	  </tr>

 	  <tr>
 	  	<td><label>Adress:</label></td>
 	  	<td><input type="text" name="padress" id="padress" value="<?php echo $padress;?>"></td>
 	  </tr>

 	  <tr>
 	  	<td><label>Parents/Guardians' Name:</label></td>
 	  	<td><input type="text" name="gname" id="gname" value="<?php echo $gname;?>"></td>
 	  </tr>

 	  <tr>
 	  	<td><label>Parents/Guardians' Tel. Number:</label></td>
 	  	<td><input type="text" name="gtel" id="gtel" value="<?php echo $gtel;?>"></td>
 	  </tr>
 	  <tr>
 	  	<td></td>
 	  	<td><input type="submit" name="search" value="Find"> 
 	  	<input type="submit" name="delete" value="Delete Player">
		<input type="submit" name="update" value="Update">
 	  	</td>
 	  </tr>
 
 	</table>

    
 </form>
  </div>
  	<?php 
  		if (isset($_POST["delete"])) {

	$sql="DELETE FROM player where pid='$_POST[pid]'";
	$result = mysqli_query($conn,$sql);
}	
	if (isset($_POST["update"])) {

		$fname = mysql_real_escape_string($_POST['pname']);
		$fname = mysql_real_escape_string($_POST['position']);
		$fname = mysql_real_escape_string($_POST['pic']);
		$fname = mysql_real_escape_string($_POST['gender']);
		$fname = mysql_real_escape_string($_POST['ptel']);
		$fname = mysql_real_escape_string($_POST['padress']);
		$fname = mysql_real_escape_string($_POST['gname']);
		$fname = mysql_real_escape_string($_POST['gtel']);
		$sql="UPDATE player SET pname=$pname, position=$position, pic=$pic, gender=$gender, ptel=$ptel, padress=$padress, gname=$gname, gtel=$gtel where pid='$_POST[pid]'";
	}




  	 ?>
 </body>
 </html>