<?php

session_start();

$id = $_SESSION['a_id'];

$con = mysqli_connect("localhost","root","","icecreamshop");

$sql = "SELECT * FROM admin WHERE adminID ='$id'";

$result = mysqli_query($con, $sql)
          or die(mysqli_error($con));


while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
  $a_uname = $row['adminUsername'];
  $a_email = $row['adminEmail'];
  $a_name = $row['adminName'];
  $a_psw = $row['adminPassword'];
  $a_pic = $row['adminPic'];
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

		<body >
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

<!---ADMIN PROFILE --->
<center>
  <h1 style="letter-spacing: 2px;">ADMIN PROFILE</h1>

</center>

  <form style="background-color: #cbdae2;">
    <fieldset>

      <br>
      <center><?php  
                $query2 = "SELECT * FROM admin WHERE adminID ='$id'";
                $result2 = mysqli_query($con, $query2);  
                while($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC))  
                {  
                     echo '<img src="data:image/jpeg;base64,'.base64_encode($row2['adminPic'] ).'" height="200" width="200" class="img-thumnail" />';  
                }  
                ?></center>
      <br><br>

      <table style="text-align: left;width: 100%;">
        <tr colspan="1">
          <td></td>
          <th>ID</th>
          <th>:</th>
          <th><?php echo $id ?></th>
        </tr>

        <tr>
          <td></td>
          <th>Username</th>
          <th>:</th>
          <td><?php echo $a_uname ?></td>
        </tr>

        <tr>
          <td></td>
          <th>Name</th>
          <th>:</th>
          <td><?php echo $a_name ?></td>
        </tr>

        <tr>
          <td></td>
          <th>Email</th>
          <th>:</th>
          <td><?php echo $a_email ?></td>
        </tr>
      </table>
    </fieldset>
  </form>
      <br>
		</body>
</html>