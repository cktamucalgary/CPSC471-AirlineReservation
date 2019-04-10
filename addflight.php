<?php include 'includes/header.php' ?>
<!DOCTYPE html>
<html>
<head>
  <title>Add a Flight</title>
  <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<h1>Add a Flight</h1>
</h2> 
<div class="boxDiv">
<?php
if(!isset($_SESSION))
   {
       session_start();
   }
   if (isset($_SESSION["sesIsAdmin"])) {
    echo "<form action=\"addflight.php\" method=\"POST\">";
    echo "Flight Date <br><input type=\"date\" name = \"flightdate\" required/></br><br>";
    echo "Expected Duration <br><input type=\"text\" name = \"flightduration\" required/></br><br>";
    echo "Departure Airport <br><input type=\"text\" name = \"departureairport\" required/></br><br>";
    echo "Arrival Airport <br><input type=\"text\" name = \"arrivalairport\" required/></br><br>";
    echo "Scheduled Departure Time <br><input type=\"time\" name = \"departuretime\" required/></br><br>";
    echo "Scheduled Arrival Time <br><input type=\"time\" name = \"arrivaltime\" required/></br><br>";
    echo "Plane Number <br><input type=\"text\" name = \"planenumber\" required/></br><br>";
    echo "Plane Type <br><input type=\"text\" name = \"planetype\" required/></br><br>";
    echo "<input type=\"submit\" value = \"Add Flight\" />";
    echo "</form>";
    echo "</div>";
    if(isset($_POST['flightdate']) && isset($_POST['flightduration']) && isset($_POST['departureairport']) && isset($_POST['arrivalairport']) && isset($_POST['departuretime']) && isset($_POST['arrivaltime']) && isset($_POST['planenumber']) && isset($_POST['planetype'])) {
      $stmq = $mysqli->prepare("INSERT INTO Flight (flightDate,adminID,duration,DAirportcode,AAirportCode,scheduledDtime,scheduledAtime,planeNo,planeType) VALUES (?,?,?, ?, ?, ?, ?, ?, ?)");
      $stmq->bind_param("sisssssss", $_POST['flightdate'], $_SESSION['sesPersonID'], $_POST['flightduration'], $_POST['departureairport'], $_POST['arrivalairport'], $_POST['departuretime'], $_POST['arrivaltime'], $_POST['planenumber'], $_POST['planetype']);
      $stmq->execute();
  
      echo "Flight Created";
  }
}
else {
  header("Location:main.php", true, 301);
}

?>



  
</form>
</div>

</body>


</html>
