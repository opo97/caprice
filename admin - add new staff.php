<?php
session_start();

$id = $_SESSION['a_id'];

$con = mysqli_connect("localhost","root","","icecreamshop") or die(mysql_error());

if (isset($_POST['register'])) {
  $sn = $_POST['name'];
  $s_un = $_POST['username'];
  $sa = $_POST['acc'];
  $s_em = $_POST['email'];
  $s_psw = $_POST['password'];
  $s_p = $_POST['phone'];

   if (isset($_POST['country'])) {
      $sc = $_POST['country'] ;
    }

  $sql = "INSERT INTO salesperson (salesUsername,salesName,salesPhone,salesCity,salesNoAcc,salesEmail,salesPassword,adminID) VALUES ('$s_un','$sn','$s_p','$sc','$sa','$s_em','$s_psw','$id')";
  $result = mysqli_query($con, $sql)
            or die(mysql_error($con));

  if ($result) {
    echo "<script type='text/Javascript'>
    alert('New staff, $sn successfully register!');
    </script>";
  }
  else
    echo "<script type='text/Javascript'>
    alert('Try Again!');
    </script>";

}


?>

<!DOCTYPE html>
	<html>
    	<link rel="stylesheet" type="text/css" href="css2/navbar.css">
    	<link rel="stylesheet" type="text/css" href="css2/form.css">
      <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto+Condensed&display=swap" rel="stylesheet">
		<head>
			<title>Früzzie Gelato™</title>
       <a href="employees.php"><button style="float: right; background-color: #C7C7DE;">Log Out</button></a>
      <a href="home.php" target="_blank"><button style="float: right; background-color: #C7C7DE;">Home</button></a>

      <style type="text/css">
        body {
          font-family: Open Sans;
          font-size: 14px;
          letter-spacing: 0.5px;
          background: #f2f2f2;
        }
      </style>


		</head>

		<body>
			<!--SIDE NAVIGATION-->
			<div id="mySidenav" class="sidenav">
        <br>
        <center><img src="img/title1.png" width="150" height="auto"></center>
        <br><br>
  				<a href="javascript:void(0)" class="closebtn" onclick="closeNav();">&times;</a>
  				<a href="admin - profile.php">Profile</a>
          <a href="admin - add new staff.php">Add New Staff</a>
          <a href="admin - customer and staff list.php">List User</a>
          <br><br>
          <br><br>
			</div>

			<div id="main">
  				<span style="font-size:30px;cursor:pointer; padding-left: 15px" onclick="openNav()">&#9776;</span>
			</div>

			<script>
				function openNav() {
  					document.getElementById("mySidenav").style.width = "200px";
  					document.getElementById("main").style.marginLeft = "200px";
  					document.body.style.backgroundColor = "rgba(242, 242, 242, 1)";
				}

				function closeNav() {
  					document.getElementById("mySidenav").style.width = "0";
  					document.getElementById("main").style.marginLeft= "0";
  					document.body.style.backgroundColor = "rgba(242, 242, 242, 1)";
				}
			</script>

<!---ADMIN REGISTERED --->
			<center>
        		<h1 style="letter-spacing: 2px;">ADD NEW STAFF</h1>
        	</center>
      <br>
			<form action="admin - add new staff.php" method="POST">
              <fieldset>
                  <legend><br><span class="number">1</span>Staff Basic Info</legend>
        
                  <label for="name">Name:</label>
                  <input type="text" id="name" name="name" required>

                  <label for="name">Username:</label>
                  <input type="text" id="username" name="username" required>
        
                  <label for="email">Email:</label>
                  <input type="email" id="email" name="email">
       
                  <label for="password">Password:</label>
                  <input type="password" id="password" name="password" required>
        
                  <label for="phone">Phone Number:</label>
                  <input type="text" id="phone" name="phone" required>

                  <label for="phone">Account Number:</label>
                  <input type="text" id="acc" name="acc" required>

                  <label for="city">Delivery City:</label>
                  <select id="city" name="city" style="width: 200px; padding-left: 5px;">
                        <option value="Ipoh">Ipoh</option>
                        <option value="Kuala Kangsar">Kuala Kangsar</option>
                        <option value="Kampar">Kampar</option>
            </select>

                  <label for="country">Country:</label><p style="color: red; font-size: 12px;">*Delivery Country only acceptable on Perak</p>
                  <input type="text" id="country" name="country" readonly value="Perak">


              </fieldset>
              <center><input type="submit" name="register" value="Register"></center>
              <br>
            </form>
		</body>
</html>