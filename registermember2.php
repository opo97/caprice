<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="css2/navhome.css">
    <link rel="stylesheet" type="text/css" href="css2/slideshow.css">
    <link rel="stylesheet" type="text/css" href="css2/form.css">
    <link rel="stylesheet" type="text/css" href="css2/login.css">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Barlow+Condensed|Barlow:600|Rasa:300,500" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



  <title>Früzzie Gelato™</title>
  <br><br><br><br>
  <center>
      <img src="img/title2.png" height="170" width="auto">
    </center>

</head>

<body style="background-image: url('img/backg3.png'); margin-left: 0px; margin-right: 0px; margin-bottom: 0px;">

<br><br>

<!---CONTAINER-->
<div style="background-color: white;">

<!----MENU BAR--->
<ul>
  <center>
  <li><a href="home.php">Home</a></li>
  <li><a href="#contact">Contact</a></li>
  <li><a onclick="document.getElementById('id01').style.display='block'" 
    style="width:auto; cursor:pointer;">Login/Register</a></li>
  </center>
</ul>

<!---login/register-->
      <div id="id01" class="modal">
  

        <form class="modal-content animate" action="/action_page.php" method="post">
          <div class="container">
            <label for="uname"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="uname" required>

            <br>
            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>
        
            <input type="submit" value="Log in" style="width: 90%;">
              <br><br>
            <label>
              <input type="checkbox" checked="checked" name="remember"> Remember me
            </label>
          </div>

          <div class="container" style="background-color:#f1f1f1; width: 100%">
            <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
            <button type="button" class="regbtn"><a href="registermember2.php">Register</a></button>
          </div>
        </form>
      </div>

<!---register form--->
<br><br>
<center><div class="h1">REGISTRATION NEW MEMBER</div></center>

<br><br>

<div class="row">
          <div class="col-md-12">
              <form action="registermember3.php" method="post" name="register">
                <fieldset>
                    <legend><span class="number">1</span> Your Basic Info</legend>

                    <br><br>

                    <input type="hidden" id="custid" name="custid">
        
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="custName" required>

                    <label for="username">Username:</label>
                    <input type="text" id="username" name="custUsername" required>
        
                    <label for="custEmail">Email:</label>
                    <input type="email" id="email" name="custEmail" required>
       
                    <label for="custPassword">Password:</label>
                    <input type="password" id="password" name="custPassword" required>
        
                    <label for="custPhone">Phone Number:</label>
                    <input type="text" id="phone" name="custPhone" required>

                    <label for="custDOB">Date of Birth:</label>
                    <input type="date" id="dob" name="custDOB" required>

                </fieldset>
            
                <fieldset>  
                    <legend><span class="number">2</span> Delivery Address</legend>
          
                  <label for="custAddress">Address:</label>
                    <textarea id="add" name="custAddress" required></textarea>

                    <label for="custZip">Zip Code:</label>
                    <input type="text" id="zipCode" name="custZip" required>

                    <label for="custCity">City:</label>
                    <select id="city" name="custCity" required>
                        <option value="" disabled selected>Select your option</option>
                        <option value="Ipoh">Ipoh</option>
                        <option value="Kuala Kangsar">Kuala Kangsar</option>
                        <option value="Kampar">Kampar</option>
                    </select>
                    
                  <label for="custState">State:</label>
                  <p style="color: red; font-size: 12px;">*Only customer live in Perak acceptable to register</p>
                  <input type="text" id="state" name="custState2" readonly value="Perak">

                </fieldset>
       
                <center><input type="submit" name="submit" value="Sign Up"></center><br>
        
              </form>
            </div>
          </div>
        </fieldset>


<br><br><br><br>


<!---footer--->
<div class="footer">
  <div class = "inner-footer">
  
    <div class = "footer-items">
      <h3>About Us </h3>

        <p>
          No.63,Jalan Bakawali 2B/5,
          <br>
          Seksyen BS10 Bukit Sentosa 3,
          <br>
          48300 Rawang,
          Selangor.
        </p>
        <button><a href="employees.php" style="text-decoration: none; color: black;"> Employees ?</a></button>
    </div>

  <br>

    <div class = "footer-items">
      <h3>Früzzie Gelato™ </h3>

        <p><a href="home.php" style="text-decoration: none; color: black;">Home</a></p>
  
        <p><a href="flavour.php" style="text-decoration: none; color: black;">Flavour</a></p>
  
        <p><a href="tub size.php" style="text-decoration: none; color: black;">Tub Size</a></p>

    </div>
    

    <div class = "footer-items">
      <h4>Follow Us </h4>

        <a href="#" class="fa fa-facebook"></a>
        
        <a href="#" class="fa fa-twitter"></a>
        <!-- <br> -->
        <a href="#" class="fa fa-google"></a>
        
        <a href="#" class="fa fa-instagram"></a> 
  

    </div>
  
  </div>
</div>






<!---END CONTAINER-->
</div>

	</body>
</html>