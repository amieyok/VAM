<?php 
	include 'dbh.php';
	include 'header.php';




	$sqll= "SELECT pid, pname, sum(serve), sum(fpass), sum(toss), sum(katack) , sum(block) , sum(fdefense), sum(spike), sum(mark), count(pid) FROM pacieve natural join player group by pid";
	$res_sqll= mysqli_query($conn,$sqll);

	echo "<center>";
	echo "<table border=1 width=1000px >";
	echo "<tr>";
	echo "<th>"; echo "Player's ID"; echo "</th>";
	echo "<th>"; echo "Player's Name"; echo "</th>";
	echo "<th>"; echo "Serve"; echo "</th>";
	echo "<th>"; echo "Forearm Pass"; echo "</th>";
	echo "<th>"; echo "Set"; echo "</th>";
	echo "<th>"; echo "Kill/Attack"; echo "</th>";
	echo "<th>"; echo "Block"; echo "</th>";
	echo "<th>"; echo "Floor Defense"; echo "</th>";
	echo "<th>"; echo "Spike"; echo "</th>";
	echo "<th>"; echo "Mark"; echo "</th>";
	echo "<th>"; echo "Comment"; echo "</th>";

	echo "</tr>";

		while ($row=mysqli_fetch_array($res_sqll))
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
		echo "<td>"; echo $row["sum(serve)"]; echo "</td>";
		echo "<td>"; echo $row["sum(fpass)"]; echo "</td>";
		echo "<td>"; echo $row["sum(toss)"]; echo "</td>";
		echo "<td>"; echo $row["sum(katack)"]; echo "</td>";
		echo "<td>"; echo $row["sum(block)"]; echo "</td>";
		echo "<td>"; echo $row["sum(fdefense)"]; echo "</td>";
		echo "<td>"; echo $row["sum(spike)"]; echo "</td>";
		echo "<td>"; echo number_format((float)$mark, 2, '.', '') ; echo"%"; echo "</td>";
		echo "<td>"; echo $comment; echo "</td>";		
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