<!----this page for only log in used--->

<?php

session_start();

$con = mysqli_connect("localhost","root","","icecreamshop") or die(mysqli_error($con));

    if (isset($_POST['bttLogin'])) {
      $username = $_POST['username'];
      $password = $_POST['password'];
      $sql = "SELECT * from customer where custUsername='$username' and custPassword='$password'";
      $result = mysqli_query($con, $sql)
                or die(mysqli_error($con));

      while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $_SESSION['c_id']= $row['custid'];
        $_SESSION['c_name'] = $row['custName'];
        $_SESSION['c_phone'] = $row['custPhone'];
        $_SESSION['c_username'] = $row['custUsername'];
        $_SESSION['c_password'] = $row['custPassword'];
        $_SESSION['c_dob'] = $row['custDOB'];
        $_SESSION['c_email']= $row['custEmail'];
        $_SESSION['c_addr'] = $row['custAddress'];
        $_SESSION['c_zip'] = $row['custZip'];
        $_SESSION['c_city']= $row['custCity'];
        $_SESSION['c_state']= $row['custState'];

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
    <link rel="stylesheet" type="text/css" href="css2/form.css">
    <link rel="stylesheet" type="text/css" href="css2/login.css">
    <link href="https://fonts.googleapis.com/css?family=Barlow+Condensed|Barlow:600|Rasa:300,500" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <title>Früzzie Gelato™</title>
  <br><br><br><br>
  <center>
      <img src="img/title2.png" height="170" width="auto">
    </center>


  <script type="text/javascript">

    function contact() 
    {
      var c = document.contact_form.contactplatform.value;

      if (c == "email")
      {
        window.open('https://mail.google.com/mail/?view=cm&fs=1&to=ainnurinaa@gmail.com' , '' , 'width=500, height=300')
      }

      else if (c == "whatsapp") 
      {
        window.open('https://api.whatsapp.com/send?phone=+601126175667' , '' , 'width=500, height=300')
      }

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
  <li><a href="#contact">Contact</a></li>
  <li><a onclick="document.getElementById('id01').style.display='block'" 
    style="width:auto; cursor:pointer;">Login/Register</a></li>
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



<!---contact-->
<br><br>
<center>
<div class="h1">CONTACT</div>

<br><br><br>

<form name="contact_form">
<br>
<table align="center">
  <tr>
    <td style="padding-right: 40px;"><img src="img/emaillogo.png" width="100"></td>
    <td style="padding-right: 20px;"><img src="img/ws.png" width="100"></td>
  </tr>
  <tr>
    <td style="padding-right: 40px;"><center><input type="radio" name="contactplatform" id="radio" value="email">E-mail</center></td>
    <td style="padding-right: 40px;"><center><input type="radio" name="contactplatform" id="radio2" value="whatsapp">WhatsApp</center></td>
  </tr>
</table>
<br><br>
<input type="submit" name="send" value="Choose" onclick="contact();">
</form>

<br><br><br><br><br><br>

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