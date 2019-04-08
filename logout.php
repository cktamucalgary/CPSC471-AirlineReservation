<?php include 'includes/header.php' ?>
<!DOCTYPE html>
<html>
<head>
  <title>Log Out</title>
  <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<h2>Logout</h2>
<div class="boxDiv">
    Logout succesful.
</div>

<?php
if(!isset($_SESSION))
   {
       session_start();
   } 
session_unset();
session_destroy();
sleep(2);
header("Location:main.php", true, 301);
exit();
?>

</body>
</html>
