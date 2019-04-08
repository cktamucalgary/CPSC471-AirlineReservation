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
    echo "Welcome, " . $_SESSION["sesPersonID"] . ".";
  } else {
    echo "Welcome!";
  }
  
  
?>
</body>
</html>
