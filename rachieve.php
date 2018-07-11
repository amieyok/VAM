<?php 
	include 'dbh.php';
	include 'header.php';

		if(isset($_SESSION['id']))
	{
		//echo $_SESSION['id'];
	}
	else
	{
		//echo "You're are not logged in!";
    header ("location:login.php");
	}




	$sqll= "SELECT pid , pname,  sum(mark) , count(pid) from pacieve natural join player group by pid ";
	$res = mysqli_query($conn,$sqll);

	echo "<center>";
	echo "<table border=1 width=900px>";
	echo "<tr>";
	echo "<th>"; echo "Player's ID"; echo "</th>";
	echo "<th>"; echo "Player's Name"; echo "</th>";
	echo "<th>"; echo "Mark"; echo "</th>";
	echo "<th>"; echo "Comment"; echo "</th>";
	echo "<th>"; echo '<a href="chart.php"><button class="btn">Graph</button></a>'; echo "</th>";

	echo "</tr>";
	while ($row=mysqli_fetch_array($res))
	{
		$lol=$row["count(pid)"]*70;
		$mark=$row["sum(mark)"] / $lol;
		$mark=$mark* 100;

		if ($mark >79 && $mark <=100) 
			$comment = "Excellent";
		else if ($mark >59 && $mark <=79) 
			$comment = "Great";
		else if ($mark >39 && $mark <=59) 
			$comment = "Need More Training";
		else
			$comment = "Need More Training And Consider Eliminate";
		


		echo "<tr>";
		echo "<td>"; echo $row["pid"]; echo "</td>";
		echo "<td>"; echo $row["pname"]; echo "</td>";
		echo "<td>"; echo number_format((float)$mark, 2, '.', '') ; echo"%"; echo "</td>";
		echo "<td>"; echo $comment; echo "</td>";
		echo "<td>"; echo '<a href="afrachieve.php?pid='.$row["pid"].' "><button class="btn">Mark By Month</button></a>';
; echo "</td>";

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

