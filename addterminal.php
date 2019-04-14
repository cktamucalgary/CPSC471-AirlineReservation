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

<form action="addterminal.php" method="POST">
  Airport <br><input type="text" name = "airportcode" required/></br><br>
  Gate <br><input type="text" name = "gate" required/></br><br>
  Terminal Type <br><input type="text" name = "termtype" required/></br><br>
  Terminal Status <br><input type="text" name = "termstatus" required/></br><br>
  <input type="submit" name="addButton" value = "Add Terminal" />
</form>
</div>
<?php }
else {
  echo "Only Admins can add terminal!";
}
?>

<?php
  if(isset($_POST['airportcode']) && isset($_POST['gate']) && isset($_POST['termtype']) && isset($_POST['termstatus'])) {
    $acode = $_POST['airportcode'];
    $gate = $_POST['gate'];
    $type = $_POST['termtype'];
    $status = $_POST['termstatus'];
    //echo $duration.$date.$da.$aa.$dt.$at.$planeNo.$planeType;

    $mysqli = new mysqli("127.0.0.1", "root", "root", "CPSC471");
    if ($mysqli->connect_errno) {
      echo "Connection Failed!";
    }

    $sql = "INSERT INTO CPSC471.Terminal(airportCode, Gate, terminalType, terminalStatus) VALUES ('$acode','$gate','$termtype','$termstatus');";
    if(mysqli_query($mysqli, $sql)){
    echo "Records added successfully.";
    }
  }
?>
