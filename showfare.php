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
$mysqli = new mysqli("127.0.0.1", "root", "root", "CPSC471");
if ($mysqli->connect_errno) {
  echo "Connected Successfully!";
}
      $stms = $mysqli->prepare("SELECT cardNumber FROM CreditCard WHERE personID=?");
      $stms->bind_param("s", $_SESSION["sesPersonID"]);
      $stms->execute();
      $stms->store_result(); 
      if ($stms->num_rows() == 1) {
        $stms->bind_result($creditCard);
        $stms->fetch();
      }

  echo "<form action=\"showfare.php\" method=\"POST\">";
  echo "Business: $200.00 <br><input type=\"radio\" name = \"class\" value =\"Business\"/></br><br>";
  echo "Economy: $100.00 <br><input type=\"radio\" name = \"class\" value = \"Economy\"/></br><br>";
  if (!isset($creditCard)) {
    echo "Credit Card <br><input type=\"text\" name = \"creditCard\" /></br><br>";
    echo "Expiry Date <br><input type=\"date\" name = \"expiryDate\" /></br><br>";
  }
  echo "<input type=\"submit\" name=\"bookButton\" value = \"Book Flight\" />";
  echo "</form>";
  echo "</div>";
  if(isset($_SESSION['flightNumber']) && isset($_SESSION['flightDate']) && isset($_POST['class']) && (isset($creditCard) || (isset($_POST['expiryDate']) &&isset($_POST['creditCard'])))) {
    $flightname = $_SESSION['flightNumber'];
    $date = $_SESSION['flightDate'];
    if (isset($_POST["class"])) {
      $class = $_POST['class'];
    }
    $fare = 0.0;
    $tax = 0.0;
    if ($class == "Economy") {
      $fare = 100.00;
      $tax = 15.00;
    } else {
      $fare = 200.00;
      $tax = 30.00;
    }
    
    
    

  //This is terrible code but its basically server/username/password/db name
  
    
    $stmt = $mysqli->prepare("INSERT INTO booking (personID,seatRow,seatColumn,gateNo,flightNo,flightDate, travelClass) VALUES (?,'4','5','D32',?,?,?)");
    $stmt->bind_param("ssss",$_SESSION["sesPersonID"], $flightname, $date, $class);
    $stmt->execute();

    $stmt = $mysqli->prepare("INSERT INTO baggage (seatRow, seatColumn, flightNo, bagLength, bagHeight, bagWidth, bagWeight) VALUES ('4','5',?,'20.0','20.0','20.0','20.0')");
    $stmt->bind_param("s", $flightname);
    $stmt->execute();

    $stmt = $mysqli->prepare("INSERT INTO fare (personID, seatRow, seatColumn, flightNo, flightDate, tax, price) VALUES (?,'4','5',?,?,?,?)");
    $stmt->bind_param("sssdd",$_SESSION["sesPersonID"], $flightname, $date, $tax, $fare);
    $stmt->execute();
    if (!isset($creditCard)) {
      $stmt = $mysqli->prepare("INSERT INTO CreditCard (personID, cardNumber, expiryDate) VALUES (?,?,?)");
      $stmt->bind_param("sss",$_SESSION["sesPersonID"], $_POST['creditCard'], $_POST['expiryDate']);
      $stmt->execute();
    }
    

    echo "Success! You have booked this flight.";
    header("Location:main.php", true, 301);
    $stmt->close();

} else {

}


?>
</body>


</html>
