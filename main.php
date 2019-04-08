<?php include 'includes/header.php' ?>
<!DOCTYPE html>
<html>
<head>
  <title>Main Page</title>
  <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<div id="topDiv">
  <h1>Airline Booking System</h1>
  <?php
  session_start();
  if (isset($_SESSION["sesPersonID"])) {
    echo "Welcome, " . $_SESSION["sesPersonID"] . ".";
  } else {
    echo "Welcome!";
  }
  ?>
</div>
<div>
	<h2> View Flights </h2>
</div>
</body>
</html>
