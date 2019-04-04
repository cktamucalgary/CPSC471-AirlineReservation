<html>
<head>
  <title>Search for Flights</title>
  <link rel="stylesheet" type="text/css" href="NavBar.css">
  
  <script>
  /*
  function Radio_Flight(x){
	if (x.checked) {
     document.getElementById("form_flightnum").style.display = "block";
     document.getElementById("form_flightdate").style.display = "block";
	 document.getElementById("lbl_flightnum").style.display = "block";
     document.getElementById("lbl_flightdate").style.display = "block";
	 
	 document.getElementById("form_flightfrom").style.display = "none";
     document.getElementById("form_flightto").style.display = "none";
	 document.getElementById("lbl_flightfrom").style.display = "none";
     document.getElementById("lbl_flightto").style.display = "none";
  
	}
  }
  
    function Radio_Route(x){
	if (x.checked) {
     document.getElementById("form_flightnum").style.display = "none";
     document.getElementById("form_flightdate").style.display = "none";
	 document.getElementById("lbl_flightnum").style.display = "none";
     document.getElementById("lbl_flightdate").style.display = "none";
	 
	 document.getElementById("form_flightfrom").style.display = "block";
     document.getElementById("form_flightto").style.display = "block";
	 document.getElementById("lbl_flightfrom").style.display = "block";
     document.getElementById("lbl_flightto").style.display = "block";
  
	}
  }*/
  
  function Radio_Flight(x){
	if (x.checked){
	 document.getElementById("form_flightnum").innerHTML = "Flight Number";
     document.getElementById("form_flightdate").innerHTML = "Flight Date";
	 document.getElementById("lbl_flightnum").innerHTML = "Flight Number";
     document.getElementById("lbl_flightdate").innerHTML = "Flight Date";
 
	}
  
  }
  
    function Radio_Route(x){
	if (x.checked){
	 document.getElementById("form_flightnum").innerHTML = "From";
     document.getElementById("form_flightdate").innerHTML = "To";
	 document.getElementById("lbl_flightnum").innerHTML = "Departure City";
     document.getElementById("lbl_flightdate").innerHTML = "Arrival City";
 
	}
  
  }
  
  </script>
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
  <input type="radio" name="searchtype" value="radio_flightnum" onchange="Radio_Flight(this)"> By Flight Number
  <input type="radio" name="searchtype" value="radio_route" onchange="Radio_Route(this)"> Route <br>
  
  <h4 id="lbl_flightnum">Flight Number</h4><input type="text" id="form_flightnum" name = "searchtype" placeholder="Flight Number" required/> </br><br>
  <h4 id="lbl_flightdate">Flight Date</h4><input type="date" id="form_flightdate" name = "searchtype" required/></br><br>
  
  <!--<h4 id="lbl_flightform">From</h4><input type="text" id="form_flightfrom" name = "searchtype" placeholder="Departure City" required/> </br><br>
  <h4 id="lbl_flightto">To</h4><input type="text" id="form_flightto" name = "searchtype" placeholder="Arrival City" required/></br><br> -->
  Select your login mode <br>
  <input type="submit" value = Search />
</form>

</body>


</html>