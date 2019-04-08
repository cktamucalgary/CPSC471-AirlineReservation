<?php include 'includes/header.php' ?>
<!DOCTYPE html>
<html>
<head>
  <title>Sign up</title>
  <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<h2>Sign up</h2>
<div class="boxDiv">

</div>

<?php
session_start();
if (isset($_SESSION["sesPersonID"])) {
  echo "Cannot signed up when logged in.";
} else {
  echo "<form action=\"signup.php\" method=\"POST\">";
  echo "Email <br><input type=\"text\" name = \"username\" placeholder=\"Email\" required/> </br><br>";
  echo "Password <br><input type=\"password\" name = \"password\" placeholder=\"Password\" required/></br><br>";
  echo "<input type=\"submit\" value = \"Sign up\" />";
  echo "</form>";
  $form_username = $_POST['username'];
  $form_password = $_POST['password'];
  
  //This is terrible code but its basically server/username/password/db name
  $mysqli = new mysqli("127.0.0.1", "root", "root", "CPSC471");
    if ($mysqli->connect_errno) {
      echo "Connected Successfully!";
    }
  
    $stmt = $mysqli->prepare("INSERT INTO Login(email,password,isAdmin) VALUES (?,?,0)");
    $stmt->bind_param("ss",$form_username,$form_password);
    $stmt->execute();
  
    $stmt->close();
  }


?>

</body>
</html>
