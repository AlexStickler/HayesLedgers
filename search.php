<!DOCTYPE HTML>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Hayes Funeral Home Ledgers</title>
  <!-- Link to the search page stylesheet -->
  <link type="text/css" media="screen" rel="stylesheet" href="responsive-tables.css" />
  <script type="text/javascript" src="responsive=tables.js">
  $(document).ready(function() {
      $("#keywords").tablesorter( {
          headers: {
              2: {
                  sorter: 'digit'
              }
          }
      });
  });
  </script>
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
        <li><a href="#">Map</a></li>
      </ul>
    </nav>
  </header>

  <br>

    <?php
    $name_first=$_GET['name_first'];
    $name_middle=$_GET['name_middle'];
    $name_last=$_GET['name_last'];
    $internment_at=$_GET['internment_at'];
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
    $con = mysqli_connect("localhost","ernest","xroads66");

    if (!$con) {
        die('Could not connect: ' . mysqli_error());
    }

    mysqli_select_db("hayesLedgers", $con);

    $result = mysqli_query("SELECT * FROM l1 WHERE name_first LIKE '$name_first%' AND name_middle LIKE
        '$name_middle%' AND name_last LIKE '$name_last%' AND internment_at LIKE '$internment_at%'
        AND cause_of_death LIKE '$cause_of_death%' AND age_years LIKE '$age_years%' AND occupation LIKE
        '$occupation%' AND certifying_physician LIKE '$certifying_physician%' AND marriage_status LIKE
        '$marriage_status%' AND date_of_death LIKE '$date_of_death%' AND date_of_funeral LIKE
        '$date_of_funeral%' AND place_of_death LIKE '$place_of_death%' AND total_footing_of_bill LIKE
        '$total_footing_of_bill%' AND charge_to LIKE '$charge_to%' ORDER BY age_years ASC");
    echo
    "<h1>HAYES FUNERAL HOME LEDGERS</h1>
    <br><br>
    <h3>(1902) - (1950)</h3
    <br>
    <table id='keywords' class ='responsive' cellspacing='0' cellpadding='0'>
        <thead>
            <tr>
                <th><span>First Name</span></th>
                <th><span>Middle Name</span></th>
                <th><span>Last Name</span></th>
                <th><span>Cemetery</span></th>
                <th><span>Cause Of Death</span></th>
                <th><span>Age</span></th>
                <th><span>Occupation</span></th>
                <th><span>Name Of Physician</span></th>
                <th><span>Marital Status</span></th>
                <th><span>Date Of Death</span></th>
                <th><span>Date Of Funeral</span></th>
                <th><span>Location Of Death</span></th>
                <th><span>Total Cost</span></th>
                <th><span>Charged To</span></th>
            </tr>
        </thead>";
        while($row = mysqli_fetch_array($result)) {
            echo
            "
            <tr>
                <td>".$row['name_first']."</td>
                <td>".$row['name_middle']."</td>
                <td>".$row['name_last']."</td>
                <td>".$row['internment_at']."</td>
                <td>".$row['cause_of_death']."</td>
                <td>".$row['age_years']."</td>
                <td>".$row['occupation']."</td>
                <td>".$row['certifying_physician']."</td>
                <td>".$row['marriage_status']."</td>
                <td>".$row['date_of_death']."</td>
                <td>".$row['date_of_funeral']."</td>
                <td>".$row['place_of_death']."</td>
                <td>".$row['total_footing_of_bill']."</td>
                <td>".$row['charge_to']."</td>
            </tr>";
        }

    echo"</table>";

    echo json_encode($result);
    mysqli_close($con)
    ?>

</body>
</html>
