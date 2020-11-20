<?php

$custid = $_POST["custid"];
$custName = $_POST["custName"];
$custPhone = $_POST["custPhone"];
$custUsername = $_POST["custUsername"];
$custPassword = $_POST["custPassword"];
$custDOB = $_POST["custDOB"];
$custEmail = $_POST["custEmail"];
$custAddress = $_POST["custAddress"];
$custZip = $_POST["custZip"];
$custCity = $_POST["custCity"];
$custState = $_POST["custState2"];


$con = mysqli_connect("localhost","root","","icecreamshop") or die(mysqli_error($con));

$sql = "INSERT INTO customer (custid,custName,custPhone,custUsername,custPassword,custDOB,custEmail,custAddress,custZip,custCity,custState) VALUES ('$custid','$custName','$custPhone','$custUsername','$custPassword','$custDOB','$custEmail','$custAddress','$custZip','$custCity','$custState' )";

$result = mysqli_query($con, $sql) or
			die(mysqli_error($con));

if (! $result) {
  header('location:registermember2.php');
}

?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="css2/navhome.css">
    <link rel="stylesheet" type="text/css" href="css2/slideshow.css">
    <link rel="stylesheet" type="text/css" href="css2/form.css">
    <link rel="stylesheet" type="text/css" href="css2/login.css">

  <title>Früzzie Gelato™</title>
  <br><br><br><br>
  <center>
      <img src="img/title2.png" height="170" width="auto">
    </center>

    <script type="text/javascript">
    	var okay = confirm("You are now successfully register.\nLog in Now :D !")

    	if(okay)
    		location.replace("home.php");
    </script>

</head>


<body style="background-image: url('img/backg3.png'); margin-left: 0px; margin-right: 0px; margin-bottom: 0px;">

<br><br>

<!---CONTAINER-->
<div style="background-color: white;">

<!----MENU BAR--->
<ul>
  <center>
  <li><a href="home.html">Home</a></li>
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
            <button type="button" class="regbtn"><a href="registermember.html">Register</a></button>
          </div>
        </form>
      </div>

<br><br><br><br>

<!---footer--->
<div class="footer" style="color: black;">
<center>
<br>
Früzzie Gelato™
<br>
N0 488, Kota Bangi, Rawang, 48300, Malaysia
<br>
<table>
  <tr>
    <td>Instagram</td>
    <td>Twitter</td>
    <td>Email</td>
  </tr>
</table>
<br>
<button><a href="employees.php" style="text-decoration: none;"> Employees ?</a></button>
<br>
</center>
</div>



<!---END CONTAINER-->
</div>

	</body>
</html>