<?php include 'includes/header.php' ?>
<!DOCTYPE html>
<html>
<head>
  <title>Book your Flights</title>
  <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<h1>Book flights</h1>
<div class="boxDiv">
<?php
if(!isset($_SESSION))
   {
       session_start();
   }
   if (isset($_SESSION["sesPersonID"]) && isset($_SESSION["flightNumber"])) {
?>
<?php }
else {
  header("Location:bookflight.php", true, 301);
}
?>

<?php
  echo "<form action=\"showfare.php\" method=\"POST\">";
  echo "Business: $200.00 <br><input type=\"radio\" name = \"class\" value =\"Business\" checked/></br><br>";
  echo "Economy <br><input type=\"radio\" name = \"class\" value = \"Economy\"/></br><br>";
  echo "<input type=\"submit\" name=\"bookButton\" value = \"Book Flight\" />";
  echo "</form";
  echo "</div>";
  if(isset($_POST['flightname']) && isset($_POST['flightdate'])) {

    $flightname = $_SESSION['flightNumber'];
    $date = $_SESSION['flightDate'];

  //This is terrible code but its basically server/username/password/db name
  $mysqli = new mysqli("127.0.0.1", "root", "root", "CPSC471");
    if ($mysqli->connect_errno) {
      echo "Connected Successfully!";
    }
    $stmt = $mysqli->prepare("SELECT * FROM flight
      WHERE flightNo=? AND flightDate=? ");
    $stmt->bind_param("ss", $flightname, $date);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows === 0) exit('No flights found');
    
    
    $stmt = $mysqli->prepare("INSERT INTO booking (personID,seatRow,seatColumn,gateNo,flightNo,flightDate) VALUES (?,'4','5','D32',?,?)");
    $stmt->bind_param("sss",$_SESSION["sesPersonID"], $flightname, $date);
    $stmt->execute();
    echo "Success! You have booked this flight.";

    $stmt->close();

}


?>
</body>


</html>
