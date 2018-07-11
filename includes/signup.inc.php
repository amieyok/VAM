<?php 
session_start();
include '../dbh.php';

$first = $_POST['first'];
$last = $_POST['last'];
$uid = $_POST['uid'];
$pass = $_POST['pass'];

if (empty($first)){
     header("Location: ../signup.php?error=empty"); 
     exit();
}

if (empty($last)){
     header("Location: ../signup.php?error=empty"); 
     exit();
}

if (empty($uid)){
     header("Location: ../signup.php?error=empty"); 
     exit();
}

if (empty($pass)){
     header("Location: ../signup.php?error=empty"); 
     exit();
}
else {
$sql="SELECT cid FROM coach WHERE cid= '$uid'";
$result = mysqli_query($conn,$sql); 
$uidcheck = mysqli_num_rows($result);
	if ($uidcheck > 0){
		header("Location: ../signup.php?error=username"); 
     	exit();
	} else {
		$sql = "INSERT INTO coach (first, last, cid, pass) VALUES ('$first','$last', '$uid', '$pass')";

     $result = mysqli_query($conn,$sql);

     header("Location: ../login.php");

	}
	
}

?>
<!DOCTYPE html>
<html>
<head>
     <title></title>
</head>
<body background="bgtest.jpg">

</body>
</html>

