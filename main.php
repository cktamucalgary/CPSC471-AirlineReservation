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
  print_r($_SESSION);
  ?>
</div>
<div>
	<h2> View Flights </h2>
</div>
</body>
</html>
