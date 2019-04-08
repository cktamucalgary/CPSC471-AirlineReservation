<?php include 'includes/header.php' ?>
<!DOCTYPE html>
<html>
<head>
  <title>Sign up</title>
  <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>


</div>

<?php
session_start();
if (isset($_SESSION["sesPersonID"])) {
  echo "Cannot signed up when logged in.";
} else {
  echo "<h2>Sign up</h2>";
  echo "<div class=\"boxDiv\">";
  echo "<form action=\"signup.php\" method=\"POST\">";
  echo "First Name <br><input type=\"text\" name = \"firstname\" placeholder=\"First Name\" required/> </br><br>";
  echo "Middle Name <br><input type=\"text\" name = \"middlename\" placeholder=\"Middle Name\" /> </br><br>";
  echo "Last Name <br><input type=\"text\" name = \"lastname\" placeholder=\"Last Name\" required/> </br><br>";
  echo "Phone Number <br><input type=\"text\" name = \"phoneno\" placeholder=\"Phone Number\" required/> </br><br>";
  echo "Passport Number <br><input type=\"text\" name = \"passportno\" placeholder=\"Passport Number\" required/> </br><br>";
  echo "Email <br><input type=\"text\" name = \"username\" placeholder=\"Email\" required/> </br><br>";
  echo "Password <br><input type=\"password\" name = \"password\" placeholder=\"Password\" required/></br><br>";
  echo "<input type=\"submit\" value = \"Sign up\" />";
  echo "</form>";
  $form_firstname = $_POST['firstname'];
  $form_middlename = $_POST['middlename'];
  $form_lastname = $_POST['lastname'];
  $form_phoneno = $_POST['phoneno'];
  $form_passportno = $_POST['passportno'];
  $form_username = $_POST['username'];
  $form_password = $_POST['password'];
  
  //This is terrible code but its basically server/username/password/db name
  $mysqli = new mysqli("127.0.0.1", "root", "root", "CPSC471");
    if ($mysqli->connect_errno) {
      echo "Connected Successfully!";
    }
  
    $stmt = $mysqli->prepare("INSERT INTO Person(firstName, middleName, lastName, phone, passportNo) VALUES (?,?,?,?,?)");
    $stmt->bind_param("sssss",$form_firstname,$form_middlename, $form_lastname,$form_phoneno,$form_passportno);
    $stmt->execute();
    $insertID = mysqli_insert_id($mysqli);
    $smtq = $mysqli->prepare("INSERT INTO Member(personID, email, password) VALUES (1,\"help\",\"query\")");

    $stmq->execute();

    
  
    $stmt->close();
    $stmq->close();
  }


?>

</body>
</html>
