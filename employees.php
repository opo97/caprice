<?php

session_start();

$con = mysqli_connect("localhost","root","","icecreamshop");

    if (isset($_POST['stafflogin'])) {
      $username = $_POST['staffuname'];
      $password = $_POST['staffpsw'];
      $sql = "SELECT * from salesperson where salesUsername='$username' and salesPassword='$password'";
      $result = mysqli_query($con, $sql)
                or die(mysqli_error($con));

      while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $_SESSION['s_id']= $row['salesid'];
        $_SESSION['s_username'] = $row['salesUsername'];
        $_SESSION['s_password'] = $row['salesPassword'];

        if ($_SESSION['s_username'] = $username && $_SESSION['s_password'] = $password) {
          header("location:staff - profile.php");
        }

        if ($_SESSION['s_username'] != $username || $_SESSION['s_password'] != $password) {
          header("location:employees.php");
        }
      }
    }

    if (isset($_POST['adminlogin'])) {
      $username2 = $_POST['adminuname'];
      $password2 = $_POST['adminpsw'];
      $sql2 = "SELECT * from admin where adminUsername='$username2' and adminPassword='$password2'";
      $result2 = mysqli_query($con, $sql2)
                or die(mysqli_error($con));

      while ($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
        $_SESSION['a_id']= $row2['adminID'];
        $_SESSION['a_username'] = $row2['adminUsername'];
        $_SESSION['a_password'] = $row2['adminPassword'];

        if ($_SESSION['a_username'] = $username2 && $_SESSION['a_password'] = $password2) {
          header("location:admin - profile.php");
        }

        if ($_SESSION['a_username'] != $username2 || $_SESSION['a_password'] != $password2) {
          header("location:employees.php");
        }
      }
    }


?>



<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
	<title>Früzzie Gelato™</title>

  <link rel="stylesheet" type="text/css" href="css2/form.css">
  <link rel="stylesheet" type="text/css" href="css2/login.css">
  <link rel="stylesheet" type="text/css" href="css2/imagebox.css">
  <link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond:700,700i,400i,400|Karla:400,700,700i,400i|Playfair+Display:400" rel="stylesheet" type="text/css">

  <style> 
    body {
          font-family: Cormorant Garamond;
          font-size: 15px;
          letter-spacing: 0.2px;
          background: #f2f2f2;
        }

  .homebttn{
    float: right;
    background-color: #6699ff;
    border-color: white;
    color: white;
    padding: 8px 12px;
    text-align: center;
    text-decoration: none;
    display: inline-block;font-size: 16px;
  }

  .bttn2{
    cursor: pointer;
    display: inline-block;
    padding: 8px 12px;
    text-align: center;
    text-decoration: none;
    outline: none;
    color: white;
    background-color: #5194D3;
    border: none;
    border-radius: 15px;
    box-shadow: 0 px #D2D3D4;
  }

  .bttn2:hover{
    background-color: gray;
  }

  .bttn:active{
    background-color: black;
    box-shadow: 0 5px #666;
    transform: translateY(4px);
  }

  </style>    
</head>

<body>
<!---home-->
<a href="home.php" target="_blank"><button style="float: right; background-color: #C7C7DE;">Home</button></a>
<br>

<!---EMPLOYEES LOG IN--->
<center>
  <h1>EMPLOYEE ONLY</h1><br>
  </center>


<center>
<table width="700">
  <tr>
    <td>
<div class="imagebox">
      <img src="img/staff.png" alt="tile3" width="330" height="230" alt="house" />
      <div class="fadedbox">
        <div class="title text"><br>Staff<br>
          <button onclick="document.getElementById('staff').style.display='block'" class="bttn2" >STAFF</button>
        </div>
    </div>
  </div>
</td>
<td>
<div class="imagebox">
      <img src="img/admin.png" alt="tile3" width="330" height="230" alt="house" />
      <div class="fadedbox">
        <div class="title text"><br>Admin<br>
          <button onclick="document.getElementById('admin').style.display='block'" class="bttn2" >ADMIN</button>
        </div>
    </div>
  </div>
</td>
</tr>
</table>
  </center>
<br><br><br><br>
<center>Interested to join our team?<br>
  Contact us now!<br>
  <a href="contact.php" target="_blank"><button style="background-color: #C7C7DE;">Contact</button></a>
<br><br><br><img src="img/logo3.png" width="270"></center> <!--title besar-->

<!---staff login--->


<div id="staff" class="modal"> <!---login.css--->
  <form class="modal-content animate" action="employees.php" method="post">
    <div class="container">
    <h3 style="color: brown;">STAFF LOG IN</h3>  
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="staffuname" required>
    <br>
    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="staffpsw" required>
    <input type="submit" value="Log in" name="stafflogin" style="width: 90%;">
    <br><br>
    <!--checkbox // cancel button-->
    <label><input type="checkbox" checked="checked" name="remember">Remember me<br><button type="button" onclick="document.getElementById('staff').style.display='none'" class="cancelbtn">Cancel</button></label>
    </div>
  </form>
</div>

<!---admin login--->
<div id="admin" class="modal">
  <form class="modal-content animate" action="employees.php" method="post">
    <div class="container">
    <h3 style="color: brown;">ADMIN LOG IN</h3>
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="adminuname" required>
    <br>
    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="adminpsw" required>
    <input type="submit" value="Log in" name="adminlogin" style="width: 90%;">
    <br><br>
    <!--checkbox // cancel button-->
    <label><input type="checkbox" checked="checked" name="remember"> Remember me<br><button type="button" onclick="document.getElementById('admin').style.display='none'" class="cancelbtn">Cancel</button></label>
    </div>
  </form>
</div>
<br>
</body>
</html>