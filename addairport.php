<?php include 'includes/header.php' ?>
<!DOCTYPE html>
<html>
<head>
  <title>Add Airport</title>
  <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<h1>Add airport</h1>
<div class="boxDiv">
<?php
if(!isset($_SESSION))
   {
       session_start();
   }
   if (isset($_SESSION["sesIsAdmin"])) {
?>

<form action="addairport.php" method="POST">
  Airport Code <br><input type="text" name = "acode" required/></br><br>
  City <br><input type="text" name = "city" required/></br><br>
  Airport Name <br><input type="text" name = "name" required/></br><br>
  <input type="submit" name="addButton" value = "Add Airport" />
</form>
</div>
<?php }
else {
  echo "Only Admins can add airports!";
}
?>

<?php
  if(isset($_POST['acode']) && isset($_POST['city']) && isset($_POST['name'])) {
    $acode = $_POST['acode'];
    $city = $_POST['city'];
    $name = $_POST['name'];

    $mysqli = new mysqli("127.0.0.1", "root", "root", "CPSC471");
    if ($mysqli->connect_errno) {
      echo "Connection Failed!";
    }

    $sql = "INSERT INTO CPSC471.Airport(airportCode,city,airportName) VALUES ('$acode','$city','$name');";
    if(mysqli_query($mysqli, $sql)){
    echo "Records added successfully.";
    }
  }
?>
