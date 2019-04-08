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
session_start();
session_unset();
session_destroy();
?>

</body>
</html>
