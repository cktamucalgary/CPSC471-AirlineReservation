<?php include 'includes/header.php' ?>
<!DOCTYPE html>
<html>
<head>
  <title>Add a Flight</title>
  <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<h1>Manage flights</h1>
</h2> 
<div class="boxDiv">
<?php
if(!isset($_SESSION))
   {
       session_start();
   }
   if (isset($_SESSION["sesPersonID"]) && isset($_SESSION["adminFlightNumber"])) {
?>
<?php }
else {
  header("Location:manageflight.php", true, 301);
}
?>

<form action="addflight.php" method="POST">
  Flight Number <br><input type="text" name = "flightname" placeholder="Flight no." required/> </br><br>
  Flight Date <br><input type="date" name = "flightdate" required/></br><br>
  Expected Duration <br><input type="text" name = "flightduration" required/></br><br>
  Departure Airport <br><input type="text" name = "departureairport" required/></br><br>
  Arrival Airport <br><input type="text" name = "arrivalairport" required/></br><br>
  Scheduled Departure Time <br><input type="text" name = "departuretime" required/></br><br>
  Scheduled Arrival Time <br><input type="text" name = "arrivaltime" required/></br><br>
  Plane Number <br><input type="text" name = "planenumber" required/></br><br>
  Plane Type <br><input type="text" name = "planetype" required/></br><br>

  <input type="submit" value = "Add flight" />
</form>
</div>

</body>


</html>
