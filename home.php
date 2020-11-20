<!----this page for only log in used--->

<?php

session_start();

$con = mysqli_connect("localhost", "root", "", "icecreamshop") or die(mysqli_error($con));
if (isset($_POST['bttLogin'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $sql = "SELECT * from customer where custUsername='$username' and custPassword='$password'";
  $result = mysqli_query($con, $sql)
    or die(mysqli_error($con));

  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $_SESSION['c_id'] = $row['custid'];
    $_SESSION['c_username'] = $row['custUsername'];
    $_SESSION['c_password'] = $row['custPassword'];

    if ($_SESSION['c_username'] = $username && $_SESSION['c_password'] = $password) {
      header("location:home2.php");
    }

    if ($_SESSION['c_username'] != $username || $_SESSION['c_password'] != $password) {
      header("location:home.php");
    }
  }
}
?>


<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" type="text/css" href="css2/navhome.css">
  <link rel="stylesheet" type="text/css" href="css2/slideshow.css">
  <link rel="stylesheet" type="text/css" href="css2/form.css">
  <link rel="stylesheet" type="text/css" href="css2/login.css">
  <link rel="stylesheet" type="text/css" href="css2/imagebox.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Barlow+Condensed|Barlow:600|Rasa:300,500" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <title>Früzzie Gelato™</title>
  <br><br><br><br>
  <center>
    <img src="img/title2.png" height="170" width="auto">
  </center>
  <script type="text/javascript">
    function showSlides() {
      var i;
      var slides = document.getElementsByClassName("mySlides");
      var dots = document.getElementsByClassName("dot");
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
      }
      slideIndex++;
      if (slideIndex > slides.length) {
        slideIndex = 1
      }
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex - 1].style.display = "block";
      dots[slideIndex - 1].className += " active";
      setTimeout(showSlides, 2000); // Change image every 2 seconds
    }
  </script>


</head>


<body style="background-image: url('img/backg3.png'); margin-left: 0px; margin-right: 0px; margin-bottom: 0px;">

  <br><br>

  <!---CONTAINER-->
  <div style="background-color: white;">

    <!----MENU BAR--->
    <ul>
      <center>
        <li><a href="home.php">Home</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a onclick="document.getElementById('id01').style.display='block'" style="width:auto; cursor:pointer;">Login/Register</a></li>
      </center>
    </ul>

    <!---login/register-->

    <div id="id01" class="modal">


      <form class="modal-content animate" action="home.php" method="post">
        <div class="container">

          <label for="uname"><b>Username</b></label>
          <input type="text" placeholder="Enter Username" name="username" required>

          <br>
          <label for="psw"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="password" required>

          <input type="submit" value="Log in" style="width: 90%;" name="bttLogin">

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



    <!---SLIDE SHOW--->
    <center>
      <div class="slideshow-container">

        <div class="mySlides fade">
          <div class="numbertext">1 / 3</div>
          <img src="img/promo1.png" style="width:100%;">
        </div>

        <div class="mySlides fade">
          <div class="numbertext">2 / 3</div>
          <img src="img/promo2.png" style="width:100%;">
        </div>

        <div class="mySlides fade">
          <div class="numbertext">2 / 3</div>
          <img src="img/promo3.png" style="width:100%;">
        </div>

      </div>

      <div style="text-align:center">
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
      </div>
    </center>

    <script>
      var slideIndex = 0;
      showSlides();
    </script>


    <!---ABOUT ME---->
    <center>
      <table bgcolor="#D9E3DA" width="100%" cellpadding="100" style="height : 400px;">
        <tr>
          <td>
            <h1>WELCOME TO</h1>
            <h1 style="font-size: 60px; margin-top: -20px;">Fruzzie Gelato</h1><br>
            <button>User Manual</button>
          </td>
          <td width="783" style="line-height: 30px;">
            <p>Fruzzie Gelato was first found in 2009 in the New York by a Mexican American named Mario Furtado. The label just recently widens its territory to the Southeast Asia, and we are taking this advantage to deliver the signature taste of Fruzzie Gelato to you. For the time being our delivery services will only be available in southern area of Perak and for customers who prefer to collect them in-store, we will be waiting for you at 14-G, Baldwin Street 4E/210, Ipoh. Our ice creams taste exactly just like the ones that were sold overseas since the powder for the making of the ice cream are imported from Fruzzie Gelato’s one own factory which is located in the New York. Our main goal is to make sure that we are to put a smile on your face by the taste of our cream with the most reasonable prices in town! Ice cream, you scream, we all scream!</p>
          </td>
        </tr>
      </table>
    </center>

    <br><br>
    <!---MENU CHOICE-->
    <br>
    <center>
      <fieldset style="display: inline-block; border: 8px dotted #ffc5c4; ">
        <legend>
          <div id="title">MENU</div>
        </legend>
        <table style="background-color: #fff;">
          <tr>
            <td>
              <div class="imagebox">
                <img src="img/buttonflav.png" alt="tile3" width="200" alt="house" />
                <div class="fadedbox">
                  <div class="title text" style="font-size: 16px;"><br>Flavour<br><br><br>Variety of flavour for your choice!<br><br>
                    <a href="flavour.php"><button class="bttn2">Flavour</button></a></div>
                </div>
              </div>
  </div>
  </td>
  <td>
    <div class="imagebox">
      <img src="img/buttontub.png" alt="tile3" width="200" alt="house" />
      <div class="fadedbox">
        <div class="title text" style="font-size: 16px;"><br>Tub Size<br><br><br>Open to see our box packaging size!<br><br>
          <a href="tub size.php"><button class="bttn2">Tub Size</button></a></div>
      </div>
    </div>
    </div>
  </td>
  </tr>
  </table>
  </fieldset>

  </center>
  <br><br><br><br>

  <!---footer--->
  <div class="footer">
    <div class="inner-footer">

      <div class="footer-items">
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

      <div class="footer-items">
        <h3>Früzzie Gelato™ </h3>

        <p><a href="home.php" style="text-decoration: none; color: black;">Home</a></p>

        <p><a href="flavour.php" style="text-decoration: none; color: black;">Flavour</a></p>

        <p><a href="tub size.php" style="text-decoration: none; color: black;">Tub Size</a></p>

      </div>


      <div class="footer-items">
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