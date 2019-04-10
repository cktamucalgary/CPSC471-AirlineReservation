<?php include 'includes/header.php' ?>
<!DOCTYPE html>
<html>
<head>
  <title>Delete Flights</title>
  <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<h1>Delete flights</h1>
</h2> 
<div class="boxDiv">
<form action="deleteflight.php" method="POST">
  Flight Number <br><input type="text" name = "flightname" placeholder="Flight no." required/> </br><br>
  Flight Date <br><input type="date" name = "flightdate" required/></br><br>
  <input type="submit" value = Delete />

  <?php
  if(isset($_POST['flightname']) && isset($_POST['flightdate'])) {

    $flightname = $_POST['flightname'];
    $date = $_POST['flightdate'];

  //This is terrible code but its basically server/username/password/db name
  $mysqli = new mysqli("127.0.0.1", "root", "root", "CPSC471");
    if ($mysqli->connect_errno) {
      echo "Connected Successfully!";
    }
    $stmt = $mysqli->prepare("SELECT * FROM booking
      WHERE flightNo=? AND flightDate=?");
    $stmt->bind_param("ss", $flightname, $date);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows === 0)  {
      $stmt = $mysqli->prepare("SELECT * FROM flight
      WHERE flightNo=? AND flightDate=?");
      $stmt->bind_param("ss", $flightname, $date);
      $stmt->execute();
      $result = $stmt->get_result();

      if($result->num_rows === 0) exit('No flights found');

      $stmt = $mysqli->prepare("DELETE FROM flight
      WHERE flightNo=? AND flightDate=?");
      $stmt->bind_param("ss", $flightname, $date);
      $stmt->execute();

      echo("Flight deleted.");

    } else {
      echo "That flight has passengers or is not a valid flight";
    }

}


?>
</form>
</div>

</body>


</html>
