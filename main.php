<?php include 'includes/header.php' ?>
<!DOCTYPE html>
<html>
<head>
  <title>Main Page</title>
  <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<div id="topDiv">
  <h1>Airline Booking System</h1>
</div>
<?php
	echo "<h2> View Flights </h2>";
	 echo "<div class=\"boxDiv\">";
  
  if(!isset($_SESSION))
   {
       session_start();
   }
  if (isset($_SESSION["sesPersonID"])) {
    
    $mysqli = new mysqli("127.0.0.1", "root", "root", "CPSC471");
      if ($mysqli->connect_errno) {
        echo "Connection Error";
      }
      $stms = $mysqli->prepare("SELECT firstName FROM Person WHERE personID=?");
      $stms->bind_param("s", $_SESSION["sesPersonID"]);
      $stms->execute();
      $stms->store_result();
      $stms->bind_result($firstName);
      $stms->fetch();
    echo "Welcome, " . $firstName . "!\n";
      
      $stmt = $mysqli->prepare("SELECT * FROM booking,flight
        WHERE personID=? AND booking.flightNo = flight.flightNo");
      $stmt->bind_param("s", $_SESSION["sesPersonID"]);
      $stmt->execute();
      $result = $stmt->get_result();
      if($result->num_rows === 0) exit('No flights found');
      while($row = $result->fetch_assoc()) {
        echo "<br>Flight No: ". $row['flightNo']."<br>"
            ."Date: ". $row['flightDate']."<br>"
            ."Duration: ". $row['duration']."<br>"
            ."Departure: ". $row['DAirportCode']."<br>"
            ."Arrival: ". $row['AAirportCode']."<br>"
          //  ."Time of Departure: ". $row['AAirportCode']."<br>"
            ."Arrival Time: ". $row['scheduledAtime']."<br>";
          // ."Fare: ". $row['AAirportCode']."<br>"
      }

      $stmt->close();

  } else {
    echo "Welcome!";
  }



?>
</body>
</html>
