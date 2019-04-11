<?php include 'includes/header.php' ?>
<!DOCTYPE html>
<html>
<head>
  <title>Add Flights</title>
  <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<h1>Add flights</h1>
<div class="boxDiv">
<?php
if(!isset($_SESSION))
   {
       session_start();
   }
   if (isset($_SESSION["sesIsAdmin"])) {
?>

<form action="addflight.php" method="POST">
  Flight Date <br><input type="date" name = "flightdate" required/></br><br>
  Expected Duration <br><input type="text" name = "duration" required/></br><br>
  Departure Airport <br><input type="text" name = "da" required/></br><br>
  Arrival Airport <br><input type="text" name = "aa" required/></br><br>
  Scheduled Departure time <br><input type="time" name = "dt" required/></br><br>
  Scheduled Arrival time <br><input type="time" name = "at" required/></br><br>
  Plane No <br><input type="text" name = "planeNo" required/></br><br>
  Plane Type <br><input type="text" name = "planeType" required/></br><br>
  <input type="submit" name="addButton" value = "Add Flight" />
</form>
</div>
<?php }
else {
  echo "Only Admins can add flights!";
}
?>

<?php
  if(isset($_POST['flightdate']) && isset($_POST['duration']) && isset($_POST['da']) && isset($_POST['aa']) && isset($_POST['dt']) && isset($_POST['at']) && isset($_POST['planeNo']) && isset($_POST['planeType'])) {
    $duration = $_POST['duration'];
    $date = $_POST['flightdate'];
    $da = $_POST['da'];
    $aa = $_POST['aa'];
    $dt = $_POST['dt'];
    $at = $_POST['at'];
    $planeNo = $_POST['planeNo'];
    $planeType = $_POST['planeType'];
    //echo $duration.$date.$da.$aa.$dt.$at.$planeNo.$planeType;

    $mysqli = new mysqli("127.0.0.1", "root", "root", "CPSC471");
    if ($mysqli->connect_errno) {
      echo "Connection Failed!";
    }

    $sql = "INSERT INTO CPSC471.Flight(flightDate,adminID,duration,DAirportcode,AAirportCode,scheduledDtime,scheduledAtime,planeNo,planeType) VALUES ('$date','1','$duration','$da','$aa','$dt','$at','$planeNo','$planeType');";
    if(mysqli_query($mysqli, $sql)){
    echo "Records added successfully.";
    } 
  }
?>
