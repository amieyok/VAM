<?php 
	include 'dbh.php';
	include 'header.php';

	 $pid = $_REQUEST['pid'];

	 	if(isset($_SESSION['id']))
	{
		//echo $_SESSION['id'];
	}
	else
	{
		//echo "You're are not logged in!";
    header ("location:login.php");
	}

	$ssql= "SELECT adate , serve, fpass, toss, katack , block , fdefense, spike, mark FROM pacieve WHERE pid=$pid";
	$res_ssql= mysqli_query($conn,$ssql);

	echo "<center>";
	echo "<table border=1 width=900px >";
	echo "<tr>";
	echo "<th>"; echo "Month"; echo "</th>";
	echo "<th>"; echo "Serve"; echo "</th>";
	echo "<th>"; echo "Forearm Pass"; echo "</th>";
	echo "<th>"; echo "Set"; echo "</th>";
	echo "<th>"; echo "Kill/Attack"; echo "</th>";
	echo "<th>"; echo "Block"; echo "</th>";
	echo "<th>"; echo "Floor Defense"; echo "</th>";
	echo "<th>"; echo "Spike"; echo "</th>";
	echo "<th>"; echo "Mark"; echo "</th>";

	echo "</tr>";
	while ($row=mysqli_fetch_array($res_ssql))
	{
		echo "<tr>";
		echo "<td>"; echo $row["adate"]; echo "</td>";
		echo "<td>"; echo $row["serve"]; echo "</td>";
		echo "<td>"; echo $row["fpass"]; echo "</td>";
		echo "<td>"; echo $row["toss"]; echo "</td>";
		echo "<td>"; echo $row["katack"]; echo "</td>";
		echo "<td>"; echo $row["block"]; echo "</td>";
		echo "<td>"; echo $row["fdefense"]; echo "</td>";
		echo "<td>"; echo $row["spike"]; echo "</td>";
		echo "<td>"; echo $row["mark"]; echo "</td>";		
		//echo "<td>"; ec9ho '<a href="pachieve.php?pid='.$row["pid"].' "><button class="achieve">Achievement</button></a>';
//; echo "</td>";

		echo "</tr>";
	}
	echo "</table>";
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title></title>
</head>
<body background="bgtest.jpg">
	<script>
function myFunction() {
    window.print();
}


</script>
<button onclick="myFunction()" class="btn">Print</button>
</body>
</html>