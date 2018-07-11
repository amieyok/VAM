<?php  
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

?>

<!DOCTYPE html>
<?php
@ob_start();
//session_start();
?>
<html>
<head>
<div class="logout">

</div>
  <meta charset="utf-8">
	<title>REPORT</title>
	
</head>
<body background="bgtest.jpg">
<div ></div>
    <div class="con-center div-login" align="center">
    <p>&nbsp;</p>
<script type="text/javascript" src="js/fusioncharts.js"></script>

<style>

.code-block-holder pre {
      max-height: 188px;  
      min-height: 188px; 
      overflow: auto;
      border: 1px solid #ccc;
      border-radius: 5px;
}
.tab-btn-holder {
	width: 100%;
	margin: 20px 0 0;
	border-bottom: 1px solid #dfe3e4;
	min-height: 30px;
}
.tab-btn-holder a {
	background-color: #fff;
	font-size: 14px;
	text-transform: uppercase;
	color: #006bb8;
	text-decoration: none;
	display: inline-block;
	*zoom:1; *display:inline;
}
.tab-btn-holder a.active {
	color: #858585;
    padding: 9px 10px 8px;
    border: 1px solid #dfe3e4;
    border-bottom: 1px solid #fff;
    margin-bottom: -1px;
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
    position: relative;
    z-index: 300;
}
.graph
{
	margin:180px;
}
</style>
.
<body background="bgtest,.jpg">

<div class="graph">

<?php 
$con=mysqli_connect ('localhost','root','','vam')
?>


<?php

include("fusioncharts.php");
	

			 
			 require 'dbh.php';
		
		
			 
			 $result=mysqli_query($con, 'SELECT DISTINCT pname,SUM(mark), count(pid) FROM pacieve NATURAL JOIN player GROUP BY pid');

	

     	
        	$arrData = array(
        	    "chart" => array(
                  "caption" => "Overall Report",
                  "showValues" => "0",
                  "theme" => "zune"
              	)
           	);

        	$arrData["data"] = array();
		
		while($row = mysqli_fetch_array($result)) {

                $lol=$row["count(pid)"]*70;
                $mark=$row["SUM(mark)"] / $lol;
                $mark=$mark* 100;
           	array_push($arrData["data"], array(
              	"label" => $row["pname"],
              	"value" => $mark
              	)
           	);
        	}
			
        	

        

        	$jsonEncodedData = json_encode($arrData);


        	$columnChart = new FusionCharts("column2D", "myFirstChart" , 1000, 300, "chart-1", "json", $jsonEncodedData);

        	
        	$columnChart->render();

        	
     	

  	?>
<div id="chart-1"><!-- Fusion Charts will render here--></div>
 
 
 
</div>

<script>
function myFunction() {
    window.print();
}


</script>
<button onclick="myFunction()" class="btn">Print</button>


</body>

<body>
  <style type="text/css">
    .back{
      font-size: 15px;
      font-family: Algerian;
      float: left;
      text-decoration: none;
      list-style-type: none;
      margin-top: 40px;
      margin-right: 50px;
      width: 80px;
      height: 25px;
      text-align: center;
      padding: 10px 20px 10px 20px;
      border-style: double;
    }
  </style>
</body>
</html>


