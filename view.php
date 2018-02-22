<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Hayes Funeral Home Ledgers</title>
  <!-- Link to the home page stylesheet -->
  <!-- media="all" makes it compatible for all browsers!!!-->
  <link rel="stylesheet" href="index.css" type="text/css" media="all"/>
  <!-- adding bootstrap -->
  <link type="text/css" media="all" rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>	
	<header>
		<div id="banner">
		<!-- Header that you'll see on every page -->
		<h1>HAYES FUNERAL HOME LEDGERS TESTING</h1>
		<h3>(1902) - (1950)</h3>
		</div>
		<nav id="navbar">
		<!-- Navigation bar that you'll see on every page -->
		<!-- Note which link is given the class "active" -->
		<ul>
			<li><a href="index.html">Home</a></li>
			<li><a class="active" href="search.html">Search</a></li>
			<li><a href="Hayes_map/index.html">Map</a></li>
		</ul>
		</nav>
	</header>
	<br><br><br><br><br>
	
	<main>

		<script>
		function goBack() {
			window.history.back()
		}
		</script>


		<button onclick="goBack()">Back to Search</button>

		<?php

		//Creating connection
		$db = parse_ini_file('cnf/cnf.ini');
		$con = new mysqli('localhost',$db['un'],$db['pwrd'],$db['dbname']);

		if (!$con)
		{
		die('Could not connect: ' . mysql_error());
		}

		//mysql_select_db("hayesLedgers", $con);

		$id = $_GET['id'];
		$sql = "SELECT *,year(date_on_ledger),day(date_on_ledger),month(date_on_ledger) FROM l1 WHERE prim = '$id'";
		$result = mysqli_query($con, $sql);

		$row = mysqli_fetch_array($result);
		echo "<br><div class=\"content_space\"></div>
		<div class=\"results\" align = \"center\" style=\"float: left;\"><table class = \"view\">";
		echo "<tr>";
		echo "<td>Name: </td><td>" . $row['name_first'] . " " . $row['name_middle'] . " " . $row['name_last'];
		echo "</td></tr>";
		echo "<tr>";
		echo "<td>Date of Birth: </td><td>" . $row['date_of_birth'];
		echo "</td></tr>";
		echo "<tr>";
		echo "<td>Cause of Death: </td><td>" . $row['cause_of_death'];
		echo "</td></tr>";
		echo "<tr>";
		echo "<td>Date of Death: </td><td>" . $row['date_of_death'];
		echo "</td></tr>";
		echo "<tr>";
		echo "<td>Age: </td><td>" . $row['age'];
		echo "</td></tr>";
		echo "<tr>";
		echo "<td>page number: </td><td>" . $row['page_no'];
		echo "</td></tr>";
		echo "<tr>";
		echo "<td>marriage status: </td><td>".  $row['marriage_status'];
		echo "</td></tr>";
		echo "<tr>";
		echo "<td>occupation: </td><td>" . $row['occupation'];
		echo "</td></tr>";
		echo "<tr>";
		echo "<td>religion: </td><td>" . $row['religion'];
		echo "</td></tr>";
		echo "<tr>";
		echo "<td>race: </td><td>". $row['race'];  
		echo "</td></tr>";
		echo "<tr>";
		echo "<td>redisence: </td><td>".  $row['residence'];
		echo "</td></tr>";
		echo "<tr>";
		echo "<td>charged to: : </td><td>". $row['charge_to'];  
		echo "</td></tr>";

		echo "<tr>";
		echo "<td>order given by: </td><td>". $row['order_given_by'];  
		echo "</td></tr>";
		echo "<tr>";
		echo "<td>how secured: </td><td>". $row['how_secured'];  
		echo "</td></tr>";
		echo "</table></div>";

		echo "<div class=\"content_space\"></div>";

		echo "<div class=\"results\" align = \"center\" style=\"float: left;\"><table class = \"view\">";
		echo "<tr>";
		echo "<td>date of funeral: </td><td>". $row['date_of_funeral'];  
		echo "</td></tr>";
		echo "<tr>";
		echo "<td>place of death: </td><td>". $row['place_of_death'];  
		echo "</td></tr>";
		echo "<tr>";
		echo "<td>funeral services location: </td><td>". $row['funeral_services_at'];  
		echo "</td></tr>";
		echo "<tr>";
		echo "<td>time of funeral services: </td><td>". $row['time_of_funeral_services'];  
		echo "</td></tr>";
		echo "<tr>";
		echo "<td>clergyman: </td><td>". $row['clergyman'];  
		echo "</td></tr>";
		echo "<tr>";
		echo "<td>certifying physician: </td><td>". $row['certifying_physician'];  
		echo "</td></tr>";
		echo "<tr>";
		echo "<td>burial certificate number: </td><td>". $row['burial_certificate_no'];  
		echo "</td></tr>";
		echo "<tr>";
		echo "<td>Cemetary: </td><td>". $row['interment_at'];  
		echo "</td></tr>";
		echo "<tr>";
		echo "<td>lot or grave number: </td><td>". $row['lot_or_grave_no'];  
		echo "</td></tr>";
		echo "<tr>";
		echo "<td>section number: </td><td>". $row['section_no'];  
		echo "</td></tr>";
		echo "<tr>";
		echo "<td>other location information: </td><td>". $row['other_location_information'];  
		echo "</td></tr>";
		echo "<tr>";
		echo "<td>total footing: </td><td>". $row['total_footing_of_bill'];  
		echo "</td></tr>";
		echo "<tr>";
		echo "<td>birthplace: </td><td>". $row['birthplace'];  
		echo "</td></tr>";
		echo "</table></div>";


//echo "<br><h1>information about parents<h1>"

$d= (string) $row['day(date_on_ledger)'];
$m=(string) $row['month(date_on_ledger)'];
if (strlen($d)<2){
$day='0' . $d;
}
else{
$day=$d;}
if (strlen($m)<2){
$month='0' . $m;
}
else{$month=$m;}



$image=$row['year(date_on_ledger)'] . $month . $day . '-' . $row['page_no'] . '.jpg';


//echo "<object type=\"image/jpeg\" data=\"images/ledger_images/$image\"></object>";

echo "<a href = \"images/$image\"><img src = \"images/$image\" width = \"27.7%\" style \"float: right;\"></a><br>";

$con->close();
?>
	</main>


</html>
