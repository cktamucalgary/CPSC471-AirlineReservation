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
   if (isset($_SESSION["sesPersonID"])) {
?>

<form action="bookflight.php" method="POST">
  Flight Number <br><input type="text" name = "flightname" placeholder="Flight no." required/> </br><br>
  Flight Date <br><input type="date" name = "flightdate" required/></br><br>
  <input type="submit" value = Book />
</form>
</div>
<?php }
else {
  echo "Please login to book flights!";
}
?>

<?php
  if(isset($_POST['flightname']) && isset($_POST['flightdate'])) {

    $flightname = $_POST['flightname'];
    $date = $_POST['flightdate'];

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
