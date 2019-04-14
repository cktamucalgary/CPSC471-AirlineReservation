<?php include 'includes/header.php' ?>
<!DOCTYPE html>
<html>
<head>
  <title>Delete Terminal</title>
  <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<h1>Delete terminal</h1>
</h2> 
<div class="boxDiv">
<form action="deleteterminal.php" method="POST">
  Airport <br><input type="text" name = "airportcode" required/></br><br>
  Gate <br><input type="text" name = "gateNo" placeholder="Gate" required/> </br><br>
  <input type="submit" value = Delete />

  <?php
  if(isset($_POST['gateNo']) && isset($_POST['airportcode'])) {

    $gateNo = $_POST['gateNo'];
	$airportCode = $_POST['airportcode'];

  //This is terrible code but its basically server/username/password/db name
  $mysqli = new mysqli("127.0.0.1", "root", "root", "CPSC471");
    if ($mysqli->connect_errno) {
      echo "Connection error!";
    }
      $stmt = $mysqli->prepare("SELECT * FROM terminal
      WHERE Gate=? AND airportCode=?");
      $stmt->bind_param("ss", $gateNo, $airportCode);
      $stmt->execute();
      $result = $stmt->get_result();

      if($result->num_rows === 0) exit('No terminal found');

      $stmt = $mysqli->prepare("DELETE FROM terminal
      WHERE Gate=? AND airportCode=?");
      $stmt->bind_param("ss", $gateNo, $airportCode);
      $stmt->execute();

      echo("Terminal deleted.");
}


?>
</form>
</div>

</body>


</html>
