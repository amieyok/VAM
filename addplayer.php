<?php 
	include 'dbh.php';
	include 'header.php';

	function getPosts()
{
    $posts = array();
    $posts[0] = 'NULL';
    $posts[1] = $_POST['pname'];
    $posts[2] = $_POST['position'];
    $posts[3] = $_POST['pic'];
    $posts[4] = $_POST['gender'];
    $posts[5] = $_POST['ptel'];
    $posts[6] = $_POST['padress'];
    $posts[7] = $_POST['gname'];
    $posts[8] = $_POST['gtel'];

    return $posts;
}

 	if(isset($_POST["insert"]))
{
    $data = getPosts();
    
	$pname =$data[1];
	$position =$data[2];
	$pic =$data[3];
	$gender =$data[4];
	$ptel=$data[5];
	$padress =$data[6];
	$gname =$data[7];
	$gtel =$data[8];

	if (empty($pname)){
		echo "bodoh ke?";
     header("Location: addplayer.php?error=empty1"); 
     exit();
}

if (empty($position)){
     header("Location: addplayer.php?error=empty2"); 
     exit();
}

if (empty($pic)){
     header("Location: addplayer.php?error=empty3"); 
     exit();
}

if (empty($gender)){
     header("Location: addplayer.php?error=empty4"); 
     exit();
}

if (empty($ptel)){
     header("Location: addplayer.php?error=empty5"); 
     exit();
}

if (empty($padress)){
     header("Location: addplayer.php?error=empty6"); 
     exit();
}

if (empty($gname)){
     header("Location: addplayer.php?error=empty7"); 
     exit();
}

if (empty($gtel)){
     header("Location: addplayer.php?error=empty8"); 
     exit();


}


	else {
	 $insert_Query = "INSERT INTO player VALUES ('NULL', '$pname', '$position', '$pic', '$gender', '$ptel', '$padress', '$gname', '$gtel')";
      $insert_Result = mysqli_query($conn, $insert_Query);
        
}
}
 ?>

 <!DOCTYPE html>
 <html>
 <head>
    <meta charset="utf-8">
 	<title>Player</title>
 	<link rel="stylesheet" type="text/css" href="style.css">
 </head>
 <body background="bgtest.jpg">
 

<div>
   
   <form action="addplayer.php" method="post" id="playerinfo" >
	   	<table>
	 		
		 	<tr>
	 			<td><label>Name</label></td>
	 			<td><input type="text" name="pname" id="pname" ></td>
	 		</tr>
		 	

	 		<tr>
	 			<td><label>Position</label></td>
	 			<td><select name="position">
	 				<option >----</option>
	 				<option value="Outside Hitter">Outside Hitter</option>
	 				<option value="Right Side Hitter">Right Side Hitter</option>
	 				<option value="Opposite Hitter">Opposite Hitter</option>
	 				<option value="Setter">Setter</option>
	 				<option value="Middle Blocker">Middle Blocker</option>
	 				<option value="Libero">Libero</option>
	 				<option value="Defensive Specialist">Defensive Specialist</option>

	 			</select></td>
	 		</tr>

	 	  	<tr>
	 	  		<td><label>IC Number:</label></td>
	 	  		<td><input type="number" name="pic" id="pic"  ></td>
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
		 	  	<td><input type="number" name="ptel" id="ptel"  ></td>
		 	  </tr>

		 	  <tr>
		 	  	<td><label>Adress:</label></td>
		 	  	<td><input type="text" name="padress" id="padress" ></td>
		 	  </tr>

		 	  <tr>
		 	  	<td><label>Parents/Guardians' Name:</label></td>
		 	  	<td><input type="text" name="gname" id="gname"  ></td>
		 	  </tr>

		 	  <tr>
		 	  	<td><label>Parents/Guardians' Tel. Number:</label></td>
		 	  	<td><input type="number" name="gtel" id="gtel"  ></td>
		 	  </tr>
		 	  <tr>
		 	  	<td> </td>
		 	  	<td>
		 	  		<input type="reset" name="reset" value="Reset" class="btn">
		   			    <!-- Input For Add Values To Database-->
                <input type="submit" name="insert" value="Add" class="btn">
                
                              
		 		</td>
		 	  </tr>
	 	</table>
   </form>
 			
</div>

 </body>
 </html>

 <?php



$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	if(strpos($url, 'error=empty')!==false){
                echo "<script>alert ('FIll Out All Fields!')</script>";
	}


 if (isset($_POST["insert"]))
{
	$display_query= "SELECT pid , pname FROM player";
	$res_display= mysqli_query($conn,$display_query);

	echo "<center>";
	echo "<table border=0 width=900px >";
	echo "<tr>";
	echo "<th>"; echo "Player's ID"; echo "</th>";
	echo "<th>"; echo "Player's Name"; echo "</th>";

	echo "</tr>";
	while ($row=mysqli_fetch_array($res_display))
	{
		echo "<tr>";
		echo "<td>"; echo $row["pid"]; echo "</td>";
		echo "<td>"; echo $row["pname"]; echo "</td>";
		echo "<td>"; echo '<a href="manplayer.php?pid='.$row["pid"].' "><button class="btn">Edit</button></a>';
		; echo "</td>";
		echo "</tr>";
	}
	echo "</table>";


}

 ?>

 <style type="text/css">
	 #playerinfo {

	background-color: gainsboro;
	margin-left: 30%;
	margin-right: 30%;
	padding-left: 0%;
	margin-top: 10%;
}


</style>
