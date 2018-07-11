<?php 

	include 'header.php';
  include 'dbh.php';

  
  $pid = $_REQUEST['pid'];

  //echo $pid;

  //$_SESSION['player_id'] = $pid;

 ?>

 <?php
	 if(isset($_SESSION['id']))
  {
    //echo $_SESSION['id'];
  }
  else
  {
    //echo "You're are not logged in!";
    header ("location:login.php");
  }





 

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Player's Achievement</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body background="bgtest.jpg">
  <div>
  	<form action="pachieve.php" method="post" id="pachieve">
  		
      <table >
        
        <tr>
          <td>Player's Id</td>
          <td><input type="text" name="pid" value="<?php echo $pid;?>" ></td>
        </tr>
        <tr>
          <td>Date</td>
          <td><input type="month" name="date"></td>
        </tr>
        

      </table>
      <table>

  			<tr>
  				<th>Skills</th>
  				<th>Mark Per 10 Try</th>
  			</tr>

  			<tr>
  				<td><label >Serve</label></td>
  				<td>
              <input type="number" name="serve" id="mark" min="0" max="10" placeholder="eg:0-10" required> 
          </td>
  			</tr>

  			  <tr>
  				<td><label >Forearm Pass</label></td>
  				<td>
            <input type="number" name="fpass" id="mark" min="0" max="10" placeholder="eg:0-10" required> 
             
            </td>  
  			</tr>  			

  			<tr>
  				<td><label>Set</label></td>
  				<td>
              <input type="number" name="toss" id="mark" min="0" max="10" placeholder="eg:0-10" required> 
              
            </td>  
  			</tr>  			

  			<tr>
  				<td><label >Kill/Attack</label></td>
          <td>
          <input type="number" name="katack" id="mark" min="0" max="10" placeholder="eg:0-10" required> 
              
            </td>
  			</tr>  			

  			<tr>
  				<td><label >Block</label></td>
          <td>
          <input type="number" name="block" id="mark" min="0" max="10" placeholder="eg:0-10" required class="serve"> 
               
            </td>
  			</tr>  			
  			<tr>
  				<td><label >Floor Defense</label></td>
          <td>
          <input type="number" name="fdefense" id="mark" min="0" max="10" placeholder="eg:0-10" required> 
               
            </td>
  			</tr>  			
  			<tr>
  				<td><label >Spike</label></td>
          <td>
          <input type="number" name="spike" id="mark"min="0" max="10" placeholder="eg:0-10" required> 
               
  				</td>
  			</tr>

  			<tr>
  				<td> </td>
  				<td>
            <button type="reset" class="btn">Reset</button>
    				<button type="submit" name="save" class="btn">Save</button>	
    			</td>
  			</tr>

  			
  		</table>
  		
  	</form>
  </div>
</body>
</html>

<?php 



if(isset($_POST["save"]))
{
  //$pid = $_SESSION['player_id'];
  //echo "string" . $pid;
    $mark =+ $_POST['serve'] + $_POST['fpass']+ $_POST['toss']+ $_POST['katack']+ $_POST['block']+ $_POST['fdefense']+ $_POST['spike'];


  
  $sql = "INSERT INTO pacieve VALUES ( '$_POST[pid]' ,'$_POST[date]',  '$_POST[serve]' , '$_POST[fpass]', '$_POST[toss]', '$_POST[katack]', '$_POST[block]', '$_POST[fdefense]', '$_POST[spike]','$mark')";

  try{
        $insert_Result = mysqli_query($conn, $sql);
        
        if($insert_Result)
        {
            if(mysqli_affected_rows($conn) > 0)
            {
                echo "<script>alert ('Data Inserted')</script>";
                //header("Location: b4pachieve.php");
            }else{
                echo "<script>alert ('Data not Inserted')</script>";
            }
        }
    } catch (Exception $ex) {
        echo "Error Insert ";
    }

   
} ?>

<style type="text/css">
  .serve{
    width: 60px;
  }
   
     #pachieve {

    background-color: gainsboro;
    margin-left: 30%;
    margin-right: 30%;
    padding-left: 10%;
    padding-right: 10%;
    margin-top: 10%;
}

table{
  width: 400px;
}
</style>