<?php include 'includes/header.php' ?>
<!DOCTYPE html>
<html>
<head>
  <title>Delete Airport</title>
  <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<h1>Delete airport</h1>
</h2> 
<div class="boxDiv">
<form action="deleteairport.php" method="POST">
  Airport <br><input type="text" name = "airportcode" required/></br><br>
  <input type="submit" value = Delete />

  <?php
  if(isset($_POST['airportcode'])) {

    $airportCode = $_POST['airportcode'];

  //This is terrible code but its basically server/username/password/db name
  $mysqli = new mysqli("127.0.0.1", "root", "root", "CPSC471");
    if ($mysqli->connect_errno) {
      echo "Connection error!";
    }
    $stmt = $mysqli->prepare("SELECT * FROM flight
      WHERE DAirportCode=? OR AAirportCode=?");
    $stmt->bind_param("ss", $airportCode, $airportCode);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows === 0)  {
      $stmt = $mysqli->prepare("SELECT * FROM airport
      WHERE airportCode=?");
      $stmt->bind_param("s", $airportCode);
      $stmt->execute();
      $result = $stmt->get_result();

      if($result->num_rows === 0) exit('No airport found');

      $stmt = $mysqli->prepare("DELETE FROM airport
      WHERE airportCode=?");
      $stmt->bind_param("s", $airportCode);
      $stmt->execute();

      echo("Flight deleted.");

    } else {
      echo "That airport has a flight or is not a valid airport";
    }

}


?>
</form>
</div>

</body>


</html>
