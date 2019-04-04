<html>
<head>
  <title>Book your Flights</title>
  <link rel="stylesheet" type="text/css" href="NavBar.css">
</head>
<body>
<ul>
  <li><a href="main.php">Home</a></li>
  <li><a href="searchflight.php">Search Flights</a></li>
  <li><a class="active" href="bookflight.php">Book Flights</a></li>
  <li style="float:right"><a href="login.php">Login</a></li>
</ul>
<h1>Book flights</h1>
<div class="boxDiv">
<form action="/loginAuth" method="POST">
  Flight Number <br><input type="text" name = "flightname" placeholder="Flight no." required/> </br><br>
  Flight Date <br><input type="date" name = "flightdate" required/></br><br>
  <input type="submit" value = Book />
</form>
</div>

</body>


</html>