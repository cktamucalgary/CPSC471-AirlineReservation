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



<form action="addplane.php" method="POST">
  Serial Number <br><input type="text" name = "sno" required/></br><br>
  Number of Seats <br><input type="text" name = "seats" required/></br><br>
  Company <br><input type="text" name = "corp" required/></br><br>
  Type <br><input type="text" name = "type" required/></br><br>
  <input type="submit" name="addButton" value = "Add Plane" />
</form>
</div>
<?php }
else {
  echo "Only Admins can add planes!";
}
?>

<?php
  if(isset($_POST['sno']) && isset($_POST['seats']) && isset($_POST['corp']) && isset($_POST['type'])) {
    $sno = $_POST['sno'];
    $seats = $_POST['seats'];
    $corp = $_POST['corp'];
    $type = $_POST['type'];

    $mysqli = new mysqli("127.0.0.1", "root", "root", "CPSC471");
    if ($mysqli->connect_errno) {
      echo "Connection Failed!";
    }

    $sql = "INSERT INTO CPSC471.Plane(serialNo, NoOfSeats, company, planeType) VALUES ('$sno','$seats','$corp','$type');";
    if(mysqli_query($mysqli, $sql)){
    echo "Records added successfully.";
    }
  }
?>
