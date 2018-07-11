<?php 
	include 'header.php';
	include 'dbh.php';

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

//$data = getPosts();
    
    $search_Query = "SELECT * FROM player WHERE pid = $pid";
    
    $search_Result = mysqli_query($conn, $search_Query);

    // $_SESSION["pid"] = $pid_value;

    
    if($search_Result)
    {
        if(mysqli_num_rows($search_Result))
        {
            while($row = mysqli_fetch_array($search_Result))
            {
                $pid =$row['pid'];
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

            $pid ="";
        $pname ="";
        $position ="";
        $pic ="";
        $ptel="";
        $gender="";
        $padress ="";
        $gname ="";
        $gtel ="";
                echo "<script>alert ('No Player With that Name')</script>";
        }
    }else{
        echo "Result Error";
    }

if(isset($_POST["delete"]))
{
    $data = getPosts();
    $delete_Query = "DELETE FROM player WHERE pid = $data[0]";
    try{
        $delete_Result = mysqli_query($conn, $delete_Query);
        
        if($delete_Result)
        {
            if(mysqli_affected_rows($conn) > 0)
            {
                echo "<script>alert ('Data Deleted')</script>";
                header ("location:b4manplayer.php");

            }else{
                echo "<script>alert ('Failed to Delete')</script>";
            }
        }
    } catch (Exception $ex) {
        echo "Error Delete ";
    }
}

if(isset($_POST["delete"]))
{
    $data = getPosts();
    $del= "DELETE FROM pacieve WHERE pid = $data[0]";
    try{
        $delete_Result = mysqli_query($conn, $del);
        
    } catch (Exception $ex) {
        echo "Error Delete ";
    }
}

if(isset($_POST["update"]))
{
    $data = getPosts();
    $update_Query = "UPDATE player SET pname='$data[1]',position='$data[2]',pic='$data[3]',gender='$data[4]',ptel='$data[5]',padress='$data[6]',gname='$data[7]',gtel='$data[8]' WHERE pid=$data[0]";

    try{
        $update_Result = mysqli_query($conn, $update_Query);
        
        if($update_Result)
        {
            if(mysqli_affected_rows($conn) > 0)
            {
                echo "<script>alert ('Data Updated')</script>";
              
            }else{
                echo "<script>alert ('Failed to Update')</script>";
            }
        }
    } catch (Exception $ex) {
        echo "Error Update ";
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
   
   <form action="manplayer.php" method="post" id="playerinfo" >
        <table>
            
            <tr>
                <td><label>Name</label></td>
                <td><input type="text" name="pname" id="pname"  value="<?php echo $pname;?>" ></td>
            </tr>
            <tr>
                <td><label>Player's ID</label></td>
                <td><input type="text" name="pid" id="pid" value="<?php print $pid;?>"></td>
            </tr>
            

            <tr>
                <td><label>Position</label></td>
                <td><input type="text" name="position" id="position"  value="<?php echo $position;?>" ></td>
            </tr>

            <tr>
                <td><label>IC Number:</label></td>
                <td><input type="text" name="pic" id="pic" value="<?php echo $pic;?>" ></td>
            </tr>

            <tr>
                <td><label>Gender</label></td>
                <td>
                    <input type="text" name="gender" value="<?php echo $gender;?>" >
                    
                </td>
            </tr>

          

              <tr>
                <td><label>Tel. Number:</label></td>
                <td><input type="text" name="ptel" id="ptel" value="<?php echo $ptel;?>" ></td>
              </tr>

              <tr>
                <td><label>Adress:</label></td>
                <td><input type="text" name="padress" id="padress" value="<?php echo $padress;?>" ></td>
              </tr>

              <tr>
                <td><label>Parents/Guardians' Name:</label></td>
                <td><input type="text" name="gname" id="gname" value="<?php echo $gname;?>" ></td>
              </tr>

              <tr>
                <td><label>Parents/Guardians' Tel. Number:</label></td>
                <td><input type="text" name="gtel" id="gtel" value="<?php echo $gtel;?>" ></td>
              </tr>
              <tr>
                <td> </td>
                <td>
                
                <!-- Input For Edit Values -->
                <input type="submit" name="update" value="Update" class="btn">
                
                <!-- Input For Clear Values -->
                <input type="submit" name="delete" value="Delete" class="btn">
                
                <!-- Input For Find Values With The given ID -->
                
                </td>
              </tr>
        </table>
   </form>
            
</div>

 </body>
 </html>

 <style type="text/css">
     #playerinfo {

    background-color: gainsboro;
    margin-left: 30%;
    margin-right: 30%;
    padding-left: 0%;
    margin-top: 10%;
}


</style>
