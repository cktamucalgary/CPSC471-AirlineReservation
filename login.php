<?php include 'includes/header.php' ?>
<!DOCTYPE html>
<html>
<head>
  <title>Log in</title>
  <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<h2>Login</h2>
<div class="boxDiv">
<form action="login.php" method="POST">
  Email <br><input type="text" name = "username" placeholder="Email" required/> </br><br>
  Password <br><input type="password" name = "password" placeholder="Password" required/></br><br>
  <input type="submit" value = Login />
</form>
</div>

<?php
if(!isset($_SESSION))
   {
       session_start();
   } 
$form_username = $_POST['username'];
$form_password = $_POST['password'];

//This is terrible code but its basically server/username/password/db name
$mysqli = new mysqli("127.0.0.1", "root", "root", "CPSC471");


  $stmt = $mysqli->prepare("SELECT personID FROM Admin WHERE email=? and password=?
  UNION
  SELECT personID FROM member WHERE email=? and password=?");
  $stmt->bind_param("ssss",$form_username,$form_password, $form_username, $form_password);
  $stmt->execute();
  $stmt->store_result();

  if ($stmt->num_rows() == 1) {
    $stmt->bind_result($personID);
    $stmt->fetch();
    $_SESSION["sesPersonID"] = $personID;

    header("Location:main.php", true, 301);
    exit();
  }
  $stmt->close();

?>

</body>
</html>
