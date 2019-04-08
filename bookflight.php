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
session_start();
?>
<form action="/loginAuth" method="POST">

  Flight Number <br><input type="text" name = "flightname" placeholder="Flight no." required/> </br><br>
  Flight Date <br><input type="date" name = "flightdate" required/></br><br>
  <input type="submit" value = Book />
</form>
</div>

</body>


</html>
