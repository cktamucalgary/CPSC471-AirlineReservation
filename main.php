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
  
  echo "<form action=\"main.php\" method=\"POST\">";
  echo "Flight Number <br><input type=\"text\" name = \"flightNo\" placeholder=\"Flight #\" required/> </br><br>";
  echo "Flight Date <br><input type=\"date\" name = \"flightDate\" /> </br><br>";
  echo "<input type=\"submit\" value = \"Search Flights\" />";
  echo "</form>";
echo "</div>";
?>
</body>
</html>
