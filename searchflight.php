<html>
<head>
  <title>Search for Flights</title>
  <link rel="stylesheet" type="text/css" href="NavBar.css">
</head>
<body>
<ul>
  <li><a href="main.php">Home</a></li>
  <li><a class="active" href="searchflight.php">Search Flights</a></li>
  <li><a href="bookflight.php">Book Flights</a></li>
  <li style="float:right"><a href="login.php">Login</a></li>
</ul>
<h1>Search Flights</h1>
<!-- When we implement search, we can change the form action on the next line to a php file or something -->
<form action="/loginAuth" method="POST">
  <input type="radio" name="searchtype" value="radio_flightnum"> By Flight Number
  <input type="radio" name="searchtype" value="radio_route"> Route <br>
  
  <h4 id="lbl_flightnum">Flight Number</h4><input type="text" id="form_flightnum" name = "searchtype" placeholder="Flight Number" required/> </br><br>
  <h4 id="lbl_flightdate">Flight Date</h4><input type="date" id="form_flightdate" name = "searchtype" required/></br><br>
  
  <!--<h4 id="lbl_flightform">From</h4><input type="text" id="form_flightfrom" name = "searchtype" placeholder="Departure City" required/> </br><br>
  <h4 id="lbl_flightto">To</h4><input type="text" id="form_flightto" name = "searchtype" placeholder="Arrival City" required/></br><br> -->
  Select your login mode <br>
  <input type="submit" value = Search />
</form>

</body>


</html>