<!DOCTYPE html>
<html>
<head>
  <title>Sign up</title>
  <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
<ul>
  <li><a href="main.php">Home</a></li>
  <li><a href="searchflight.php">Search Flights</a></li>
  <li><a href="bookflight.php">Book Flights</a></li>
  <li style="float:right"><a href="login.php">Login</a></li>
  <li style="float:right"><a class="active" href="signup.php">Sign Up</a></li>
</ul>
<h2>Sign up</h2>
<div class="boxDiv">
<form action="signup.php" method="POST">
  Email <br><input type="text" name = "username" placeholder="Email" required/> </br><br>
  Password <br><input type="password" name = "password" placeholder="Password" required/></br><br>
  <input type="submit" value = "Sign up" />
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

  $stmt = $mysqli->prepare("INSERT INTO Login(email,password,isAdmin) VALUES (?,?,0)");
  $stmt->bind_param("ss",$form_username,$form_password);
  $stmt->execute();

  $stmt->close();

?>

</body>
</html>
