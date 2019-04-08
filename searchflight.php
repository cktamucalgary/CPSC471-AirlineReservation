<?php include 'includes/header.php' ?>
<!DOCTYPE html>
<html>
<head>
  <title>Search for Flights</title>
  <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<h1>Search Flights</h1>
<!-- When we implement search, we can change the form action on the next line to a php file or something -->
<div class="boxDiv">
<?php
session_start();
?>
<form action="/loginAuth" method="POST">

  <input type="radio" name="searchtype" value="radio_flightnum"> By Flight Number
  <input type="radio" name="searchtype" value="radio_route"> Route <br>

  <h4 id="lbl_flightnum">Flight Number</h4><input type="text" id="form_flightnum" name = "searchtype" placeholder="Flight Number" required/> </br><br>
  <h4 id="lbl_flightdate">Flight Date</h4><input type="date" id="form_flightdate" name = "searchtype" required/></br><br>

  <!--<h4 id="lbl_flightform">From</h4><input type="text" id="form_flightfrom" name = "searchtype" placeholder="Departure City" required/> </br><br>
  <h4 id="lbl_flightto">To</h4><input type="text" id="form_flightto" name = "searchtype" placeholder="Arrival City" required/></br><br> -->
  <input type="submit" value = Search />
</form>
</div>

</body>


</html>
