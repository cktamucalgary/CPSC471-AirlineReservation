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
  Username or Email <br><input type="text" name = "username" placeholder="username or email" required/> </br><br>
  Password <br><input type="password" name = "password" placeholder="password" required/></br><br>
  Select your login mode <br>
  <input type="radio" name="usrtype" value="customer" required> Customer
  <input type="radio" name="usrtype" value="agent"> Booking Agent
  <input type="radio" name="usrtype" value="staff"> Airline Staff <br><br>
  <input type="submit" value = Login />
</form>
</div>

</body>


</html>