



<!DOCTYPE html>
<html>
<head>
	<title>player</title>
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
		   	
		   			    <!-- Input For Add Values To Database-->
                <input type="submit" name="insert" value="Add">
                
                <!-- Input For Edit Values -->
                <input type="submit" name="update" value="Update">
                
                <!-- Input For Clear Values -->
                <input type="submit" name="delete" value="Delete">
                
                <!-- Input For Find Values With The given ID -->
                <input type="submit" name="search" value="Find">
		 		</td>
		 	  </tr>
	 	</table>
   </form>
 			
</div>
<?php 
	include 'header.php';
	session_start();
	include 'dbh.php';

	function getPosts()
{
    $posts = array();
    $posts[0] = $_POST['pid'];
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
 
 if(isset($_POST['search']))
{
    $data = getPosts();
    
    $search_Query = "SELECT * FROM player WHERE pid = $data[0]";
    
    $search_Result = mysqli_query($conn, $search_Query);
    
    if($search_Result)
    {
        if(mysqli_num_rows($search_Result))
        {
            while($row = mysqli_fetch_array($search_Result))
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
            echo 'No Data For This Id';
        }
    }else{
        echo 'Result Error';
    }
}
if(isset($_POST['insert']))
{
    $data = getPosts();
    $insert_Query = "INSERT INTO player VALUES ('NULL', '$_POST[pname]', '$_POST[position]', '$_POST[pic]', '$_POST[gender]', '$_POST[ptel]', '$_POST[padress]', '$_POST[gname]', '$_POST[gtel]')";
    try{
        $insert_Result = mysqli_query($conn, $insert_Query);
        
        if($insert_Result)
        {
            if(mysqli_affected_rows($conn) > 0)
            {
                echo 'Data Inserted';
            }else{
                echo 'Data Not Inserted';
            }
        }
    } catch (Exception $ex) {
        echo 'Error Insert ';
    }
}

if(isset($_POST['delete']))
{
    $data = getPosts();
    $delete_Query = "DELETE FROM player WHERE pid = $data[0]";
    try{
        $delete_Result = mysqli_query($conn, $delete_Query);
        
        if($delete_Result)
        {
            if(mysqli_affected_rows($conn) > 0)
            {
                echo 'Data Deleted';
            }else{
                echo 'Data Not Deleted';
            }
        }
    } catch (Exception $ex) {
        echo 'Error Delete ';
}

if(isset($_POST['update']))
{
    $data = getPosts();
    $update_Query = "UPDATE player SET pname='$data[1]',position='$data[2]',pic='$data[3]',gender='$data[4]',ptel='$data[5]',padress='$data[6]',gname='$data[7]',gtel='$data[8]' WHERE pid=$data[0]";

    try{
        $update_Result = mysqli_query($conn, $update_Query);
        
        if($update_Result)
        {
            if(mysqli_affected_rows($conn) > 0)
            {
                echo 'Data Updated';
            }else{
                echo 'Data Not Updated';
            }
        }
    } catch (Exception $ex) {
        echo 'Error Update ';
    }
}
?>
</body>
</html>