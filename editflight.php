<?php include 'includes/header.php' ?>
<!DOCTYPE html>
<html>
<head>
  <title>Edit a Flight</title>
  <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<h1>Edit Flight</h1>
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

<?php

$mysqli = new mysqli("127.0.0.1", "root", "root", "CPSC471");
if ($mysqli->connect_errno) {
  echo "Connected Successfully!";
}
$stmt = $mysqli->prepare("SELECT scheduledAtime FROM flight WHERE flightNo=?");
$stmt->bind_param("s",$_SESSION["adminFlightNumber"]);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($arrivalTime);
$stmt->fetch();

$stmt = $mysqli->prepare("SELECT scheduledDtime FROM flight WHERE flightNo=?");
$stmt->bind_param("s",$_SESSION["adminFlightNumber"]);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($departureTime);
$stmt->fetch();

$stmt = $mysqli->prepare("SELECT duration FROM flight WHERE flightNo=?");
$stmt->bind_param("s",$_SESSION["adminFlightNumber"]);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($duration);
$stmt->fetch();

  echo "<form action=\"editflight.php\" method=\"POST\">";
  echo "Scheduled Departure Time: <br><input type=\"time\" name = \"dTime\" value = \"" . $departureTime . "\" ></br><br>";
  echo "Scheduled Arrival Time: <br><input type=\"time\" name = \"aTime\" value = \"" . $arrivalTime . "\" ></br><br>";
  echo "Duration: <br><input type=\"text\" name = \"duration\" value = \"" . $duration . "\" ></br><br>";
  echo "Confirm Edit <br><input type=\"checkbox\" name = \"check\"></br><br>";
  echo "<input type=\"submit\" name=\"editButton\" value = \"Edit Flight\" />";
  echo "</form>";
  echo "</div>";
  if(isset($_POST['aTime']) && isset($_POST['dTime']) && isset($_POST['check']) && isset($_POST['duration'])) {

    $stmt = $mysqli->prepare("UPDATE flight SET scheduledAtime=?, scheduledDtime=?, duration=? WHERE flightNo=?");
    $stmt->bind_param("ssss",$_POST['aTime'], $_POST['dTime'], $_POST['duration'], $_SESSION["adminFlightNumber"]);
    $stmt->execute();

    echo "Success! You have edited this flight.";
    header("Location:main.php", true, 301);
    $stmt->close();

} else {

}


?>
</body>


</html>
