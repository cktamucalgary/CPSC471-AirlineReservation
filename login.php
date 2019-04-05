<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
<ul>
  <li><a href="main.php">Home</a></li>
  <li><a href="searchflight.php">Search Flights</a></li>
  <li><a href="bookflight.php">Book Flights</a></li>
  <li style="float:right"><a class="active" href="login.php">Login</a></li>
  <li style="float:right"><a href="signup.php">Sign Up</a></li>
</ul>
<h2>Login</h2>
<div class="boxDiv">
<form action="login.php" method="POST">
  Email <br><input type="text" name = "username" placeholder="Email" required/> </br><br>
  Password <br><input type="password" name = "password" placeholder="Password" required/></br><br>
  <input type="submit" value = Login />
</form>
</div>

<?php
$form_username = $_POST['username'];
$form_password = $_POST['password'];

//This is terrible code but its basically server/username/password/db name
$mysqli = new mysqli("127.0.0.1", "root", "root", "Auth");
  if ($mysqli->connect_errno) {
    echo "Connected Successfully!";
  }

  $stmt = $mysqli->prepare("SELECT personID, isAdmin FROM Login WHERE email=? AND password=?");
  $stmt->bind_param("ss",$form_username,$form_password);
  $stmt->execute();
  $stmt->store_result();

  if ($stmt->num_rows() == 1) {
    $stmt->bind_result($personID, $isAdmin);
    $stmt->fetch();
    echo '{"Success": true, "personID":' . $personID . ', "isAdmin":' . $isAdmin . '}';
  } else {
    echo '{"Success": false, "personID_id": null, "isAdmin": null}';
  }
  $stmt->close();

?>

</body>
</html>
