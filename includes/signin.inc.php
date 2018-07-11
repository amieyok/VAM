<?php 
session_start();
include '../dbh.php';

$uid = $_POST['uid'];
$pass = $_POST['pass'];

$sql = "SELECT * FROM coach WHERE cid = '$uid' AND pass = '$pass'";
$result = mysqli_query($conn,$sql);

if(!$row = mysqli_fetch_assoc($result))
{
	echo "Your Username or password is incorrect!";
}
else
{
	$_SESSION['id'] = $row['id'];
	$_SESSION['status']="active";

}

header("Location: ../login.php");

?>

