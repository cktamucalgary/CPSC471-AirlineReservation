<html>
<head>
  <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
<ul>
<?php
if(!isset($_SESSION))
   {
       session_start();
   }
  echo "<li><a class=\"active\" href=\"main.php\">Home</a></li>";
  echo "<li><a href=\"searchflight.php\">Search Flights</a></li>";
  if (isset($_SESSION["sesIsAdmin"]) && $_SESSION["sesIsAdmin"] == 0) {
    echo "<li><a href=\"bookflight.php\">Book Flights</a></li>";
  }
  if (isset($_SESSION["sesIsAdmin"]) && $_SESSION["sesIsAdmin"] == 1) {
    echo "<li><a href=\"manageflight.php\">Manage Flights</a></li>";
    echo "<li><a href=\"addflight.php\">Add Flight</a></li>";
    echo "<li><a href=\"deleteflight.php\">Delete Flight</a></li>";
  }
  if (isset($_SESSION["sesPersonID"])) {
    echo "<li style=\"float:right\"><a href=\"logout.php\">Logout</a></li>";
  } else {
    echo "<li style=\"float:right\"><a href=\"login.php\">Login</a></li>";
    echo "<li style=\"float:right\"><a href=\"signup.php\">Sign Up</a></li>";
  }
?>
</ul>
