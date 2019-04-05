<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="NavBar.css">
</head>
<body>
<ul>
  <li><a href="main.html">Home</a></li>
  <li><a href="searchflight.html">Search Flights</a></li>
  <li><a href="bookflight.html">Book Flights</a></li>
  <li style="float:right"><a class="active" href="login.html">Login</a></li>
</ul>
<h2>Please enter your login information</h2>
<div class="boxDiv">
<form action="login.php" method="POST">
  Username or Email <br><input type="text" name = "username" placeholder="username or email" required/> </br><br>
  Password <br><input type="password" name = "password" placeholder="password" required/></br><br>
  Select your login mode <br>
  <input type="radio" name="usrtype" value="member" required> Member
  <input type="radio" name="usrtype" value="admin"> Airline Admin <br><br>
  <input type="submit" value = Login />
</form>
</div>

<?php
$form_username = $_POST['username'];
$form_password = $_POST['password'];

$mysqli = new mysqli("127.0.0.1", "root", "root", "Auth");
  if ($mysqli->connect_errno) {
    echo "Connected Successfully!";
  }
  
  $stmt = $mysqli->prepare("SELECT personID FROM Login WHERE email=? AND password=?");
  $stmt->bind_param("ss",$form_username,$form_password);
  $stmt->execute();
  $stmt->store_result();

  if ($stmt->num_rows() == 1) {
    $stmt->bind_result($personID);
    $stmt->fetch();
    echo '{"Success": true, "personID":' . $personID . '}';
  } else {
    echo '{"Success": false, "personID_id": null}';
  }
  $stmt->close();
  
?>

</body>
</html>