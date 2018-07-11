<?php 

$conn = mysqli_connect("localhost","root","","VAM");

if (!$conn)
{
	die("Connection failed: ".mysqli_connct_error());
}

?>