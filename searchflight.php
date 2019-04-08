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
<form action="/searchFlight" method="POST">

  <h4 id="lbl_dap">Departing Airport</h4><input type="text" id="form_dap" maxlength="3" name = "searchtype" placeholder="Departing Airport" required/> </br><br>
  <h4 id="lbl_aap">Arriving Airport</h4><input type="text" id="form_aap" maxlength="3" name = "searchtype" placeholder="Arriving Airport" required/> </br><br>
  <h4 id="lbl_numpass">Number of Passengers</h4><input type="number" value="1" min="1" id="form_numpass" name = "searchtype" placeholder="Number of Passengers" required/> </br><br>
  <h4 id="lbl_flightdate">Flight Date</h4><input type="date" id="form_flightdate" name = "searchtype" required/></br><br>
  <input type="submit" value = Search />
</form>
</div>

</body>


</html>
