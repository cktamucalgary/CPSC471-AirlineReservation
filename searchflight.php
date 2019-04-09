<?php include 'includes/header.php' ?>
<!DOCTYPE html>
<html>
<head>
  <title>Search for Flights</title>
  <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<h1>Search Flights</h1>
<!-- When we implement search, we can change the form action on the next line to a php file or something -->
<div class="boxDiv">
<?php
if(!isset($_SESSION))
   {
       session_start();
   }
?>
<form action="searchflight.php" method="GET">

  <h4 id="lbl_dap">Departing Airport</h4><input type="text" id="form_dap" maxlength="3" name = "form_dap" placeholder="Departing Airport" required/> </br><br>
  <h4 id="lbl_aap">Arriving Airport</h4><input type="text" id="form_aap" maxlength="3" name = "form_aap" placeholder="Arriving Airport" required/> </br><br>
  <h4 id="lbl_numpass">Number of Passengers</h4><input type="number" value="1" min="1" id="form_numpass" name = "form_numpass" placeholder="Number of Passengers" required/> </br><br>
  <h4 id="lbl_flightdate">Flight Date</h4><input type="date" id="form_flightdate" name = "form_flightdate" required/></br><br>
  <input type="submit"  name ="submit" value = "Search">
</form>
</div>
<?php
  if(isset($_GET['form_dap']) && isset($_GET['form_aap']) && isset($_GET['form_numpass']) && isset($_GET['form_flightdate'])) {


  $depart = $_GET['form_dap'];


   $arrive = $_GET['form_aap'];
   $passengers = $_GET['form_numpass'];
   $date = $_GET['form_flightdate'];

  //This is terrible code but its basically server/username/password/db name
  $mysqli = new mysqli("127.0.0.1", "root", "root", "CPSC471");
    if ($mysqli->connect_errno) {
      echo "Connected Successfully!";
    }
    else {
      //echo $depart;
    }

    $stmt = $mysqli->prepare("SELECT * FROM flight
      WHERE DAirportCode=? AND AAirportCode=? AND flightDate=?");
    $stmt->bind_param("sss", $depart, $arrive, $date);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows === 0) exit('No flights found');

    while($row = $result->fetch_assoc()) {
      echo "Flight No: ". $row['flightNo']."<br>"
          ."Date: ". $row['flightDate']."<br>"
          ."Duration: ". $row['duration']."<br>"
          ."Departure: ". $row['DAirportCode']."<br>"
          ."Arrival: ". $row['AAirportCode']."<br>"
        //  ."Time of Departure: ". $row['AAirportCode']."<br>"
          ."Arrival Time: ". $row['scheduledAtime']."<br>";
        //  ."Fare: ". $row['AAirportCode']."<br>"
    }

    $stmt->close();

}


?>
</body>


</html>
