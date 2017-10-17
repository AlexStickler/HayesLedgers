<!DOCTYPE HTML>
<html lang="en">
<head>
  <meta charset="utf-8">
  <!-- <meta name="viewport" content="width=device-width"> -->
  <title>Hayes Funeral Home Ledgers</title>
  <!-- Link to the search page stylesheet -->
  <link type="text/css" media="all" rel="stylesheet" href="search.css" />
  <!-- Boostrap -->
  <link type="text/css" media="all" rel="stylesheet" href="bootstrap/css/no-more-tables.css">
  <link type="text/css" media="all" rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link type="text/css" media="all" rel="stylesheet" href="bootstrap/css/bootstrap-responsive.min.css">

  <!-- Style for bootstrap
  <style>
      body { padding-top: 60px; }
  	  table { width: 100%; }
  	  td, th {text-align: left; white-space: nowrap;}
  	  td.numeric, th.numeric { text-align: right; }
  	  h2, h3 {margin-top: 1em;}
  	  section {padding-top: 40px;}
  </style>
-->

</head>

<body>
  <header>
    <div id="banner">
      <!-- Header that you'll see on every page -->
      <h1>HAYES FUNERAL HOME LEDGERS</h1>
      <h3>(1902) - (1950)</h3>
    </div>
    <nav id="navbar">
    <!-- Navigation bar that you'll see on every page -->
    <!-- Note which link is given the class "active" -->
      <ul>
        <li><a href="index.html">Home</a></li>
        <li><a class="active" href="search.html">Search</a></li>
        <li><a href="browse.html">Browse</a></li>
        <li><a href="#">Explore</a></li>
        <li><a href="map2">Map</a></li>
      </ul>
    </nav>
  </header>

  <br><br><br><br><br><br><br><br><br><br>

    <?php

    $name_first=$_GET['name_first'];
    $name_middle=$_GET['name_middle'];
    $name_last=$_GET['name_last'];
    $interment_at=$_GET['interment_at'];
    $cause_of_death=$_GET['cause_of_death'];
    $age_years=$_GET['age_years'];
    $occupation=$_GET['occupation'];
    $certifying_physician=$_GET['certifying_physician'];
    $marriage_status=$_GET['marriage_status'];
    $date_of_death=$_GET['date_of_death'];
    $date_of_funeral=$_GET['date_of_funeral'];
    $place_of_death=$_GET['place_of_death'];
    $total_footing_of_bill=$_GET['total_footing_of_bill'];
    $charge_to=$_GET['charge_to'];

    $servername = "localhost";
    $username = "ernest";
    $password = "xroads66";
    $dbname = "hayesLedgers";

    //Creating connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    //Checking connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    //Create sql query to get results based on input ordered by age lowest to highest
    $sql = "SELECT * FROM l1 WHERE name_first LIKE '%$name_first%' OR name_first LIKE ''
        AND name_middle LIKE '%$name_middle%' OR name_middle LIKE ''
        AND name_last LIKE '%$name_last%' OR name_last LIKE ''
        AND interment_at LIKE '%$interment_at%' OR interment_at LIKE ''
        AND cause_of_death LIKE '%$cause_of_death%' OR cause_of_death LIKE ''
        AND age_years LIKE '%$age_years%' OR age_years LIKE ''
        AND occupation LIKE '%$occupation%' OR occupation LIKE ''
        AND certifying_physician LIKE '%$certifying_physician%' OR certifying_physician LIKE ''
        AND marriage_status LIKE '%$marriage_status%' OR marriage_status LIKE ''
        AND date_of_death LIKE '%$date_of_death%' OR date_of_death LIKE ''
        AND date_of_funeral LIKE '%$date_of_funeral%' OR date_of_funeral LIKE ''
        AND place_of_death LIKE '%$place_of_death%' OR place_of_death LIKE ''
        AND total_footing_of_bill LIKE '%$total_footing_of_bill%' OR total_footing_of_bill LIKE ''
        AND charge_to LIKE '%$charge_to%' OR charge_to LIKE '' ORDER BY age_years ASC";

    //result = connection to the database w/ query as input
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        //Print out table, with headers of each searchable category
            echo'
              <section>
                <table class="table-bordered table-striped table-condensed cf">
                  <thead class="cf">
                    <tr>
                      <th>First Name</th>
                      <th>Middle Name</th>
                      <th>Last Name</th>
                      <th>Cemetery</th>
                      <th>Cause Of Death</th>
                      <th class="numeric">Age</th>
                      <th>Occupation</th>
                      <th>Name Of Physician</th>
                      <th>Marital Status</th>
                      <th>Date Of Death</th>
                      <th>Date Of Funeral</th>
                      <th>Location Of Death</th>
                      <th class="numeric">Total Cost</th>
                      <th>Charged To</th>
                    </tr>
                  </thead>';

        while($row = $result->fetch_assoc()) {
            echo
                '<tbody>
                  <tr>
                    <td data-title="First Name">".$row["name_first"]."</td>
                    <td data-title="Middle Name">".$row["name_middle"]."</td>
                    <td data-title="Last Name">".$row["name_last"]."</td>
                    <td data-title="Cemetery">".$row["interment_at"]."</td>
                    <td data-title="Cause Of Death">".$row["cause_of_death"]."</td>
                    <td data-title="Age">".$row["age_years"]."</td>
                    <td data-title="Occupation">".$row["occupation"]."</td>
                    <td data-title="Name Of Physician">".$row["certifying_physician"]."</td>
                    <td data-title="Marital Status">".$row["marriage_status"]."</td>
                    <td data-title="Date Of Death">".$row["date_of_death"]."</td>
                    <td data-title="Date Of Funeral">".$row["date_of_funeral"]."</td>
                    <td data-title="Location Of Death">".$row["place_of_death"]."</td>
                    <td data-title="Total Cost">".$row["total_footing_of_bill"]."</td>
                    <td data-title="Charged To">".$row["charge_to"]."</td>
                  </tr>
                </tbody>';
        }
        echo '</table>';
    } else {
        echo '0 results';
    }
    $conn->close();
    ?>

</body>
</html>
