<?php 
	include 'dbh.php';
	include 'header.php';
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body background="bgtest.jpg">

<form action="b4manplayer.php" method="post" id="playerinfo" >
	<table class="ttt">
		<tr>
			<td style="text-align: center;">Search Player</td>
		</tr>
		<tr>
			<td><input type="text" name="pname"></td>
			<td><input type="submit" name="searchu" value="Search" class="btn"></td>	

		</tr>
		
	</table>
</form>
</body>
</html>

<?php


 if (isset($_POST["searchu"]))
{
    $searchu= "SELECT pid , pname FROM player WHERE pname like '%$_POST[pname]%'";
	$res_display= mysqli_query($conn,$searchu);

	echo "<center>";
	echo "<table border=0 width=350px >";
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
	padding-left: 10%;
	margin-top: 10%;
}



</style>