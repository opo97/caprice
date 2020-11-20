<?php
session_start();

$con = mysqli_connect("localhost","root","","icecreamshop") or die(mysqli_error($con));

$id = $_SESSION['s_id'];

$sql = "SELECT * FROM salesperson WHERE salesid = '$id'";
$result = mysqli_query($con, $sql)
          or die("Unable to get sql".mysql_error($con));

while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
  $s_uname = $row['salesUsername'];
  $s_name = $row['salesName'];
  $s_phone = $row['salesPhone'];
  $s_pic = $row['salesPic'];
  $s_acc = $row['salesNoAcc'];
  $s_email = $row['salesEmail'];
  $s_c = $row['salesCity'];
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
  				<a href="staff - profile.php">Profile</a>
          <a href="staff - updateprofile.php">Update Profile</a>
          <a href="staff - order.php">List Order</a>
          <a href="staff - comm.php">Commision</a>
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

<!---STAFF PROFILE --->
<center>
  <h2>STAFF PROFILE</h2>
</center>

  <form style="background-color: #cbdae2;">
    <fieldset>

      <br><br>
      <center><?php  
                $query = "SELECT * FROM salesperson WHERE salesid = '$id'";  
                $result = mysqli_query($con, $query);  
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))  
                {  
                     echo '<img src="data:image/jpeg;base64,'.base64_encode($row['salesPic'] ).'" height="200" width="200" class="img-thumnail" />';  
                }  
                ?> </center>
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
          <td><?php echo $s_uname ?></td>
        </tr>

        <tr>
          <td></td>
          <th>Name</th>
          <th>:</th>
          <td><?php echo $s_name ?></td>
        </tr>

        <tr>
          <td></td>
          <th>Phone</th>
          <th>:</th>
          <td><?php echo $s_phone ?></td>
        </tr>

        <tr>
          <td></td>
          <th>Account No.</th>
          <th>:</th>
          <td><?php echo $s_acc ?></td>
        </tr>

        <tr>
          <td></td>
          <th>Email</th>
          <th>:</th>
          <td><?php echo $s_email ?></td>
        </tr>

        <tr>
          <td></td>
          <th>Delivery city</th>
          <th>:</th>
          <td><?php echo $s_c ?></td>
        </tr>
      </table>
    </fieldset>
  </form>
      <br>
		</body>
</html>