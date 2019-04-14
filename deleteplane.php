<?php include 'includes/header.php' ?>
<!DOCTYPE html>
<html>
<head>
  <title>Delete Plane</title>
  <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<h1>Delete plane</h1>
</h2> 
<div class="boxDiv">
<form action="deleteplane.php" method="POST">
  Serial No. <br><input type="text" name = "serialno" required/></br><br>
  <input type="submit" value = Delete />

  <?php
  if(isset($_POST['serialno'])) {

    $serialNo = $_POST['serialno'];

  //This is terrible code but its basically server/username/password/db name
  $mysqli = new mysqli("127.0.0.1", "root", "root", "CPSC471");
    if ($mysqli->connect_errno) {
      echo "Connection error!";
    }
    $stmt = $mysqli->prepare("SELECT * FROM flight
      WHERE planeNo=?");
    $stmt->bind_param("s", $serialNo);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows === 0)  {
      $stmt = $mysqli->prepare("SELECT * FROM plane
      WHERE serialNo=?");
      $stmt->bind_param("s", $serialNo);
      $stmt->execute();
      $result = $stmt->get_result();

      if($result->num_rows === 0) exit('No plane found');

      $stmt = $mysqli->prepare("DELETE FROM plane
      WHERE serialNo=?");
      $stmt->bind_param("s", $serialNo);
      $stmt->execute();

      echo("Plane deleted.");

    } else {
      echo "That plane has a flight or is not a valid plane";
    }

}


?>
</form>
</div>

</body>


</html>
