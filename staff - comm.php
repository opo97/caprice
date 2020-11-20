<?php
session_start();

$con = mysqli_connect("localhost","root","","icecreamshop") or die(mysqli_error($con));

$id = $_SESSION['s_id'];

$sql = "SELECT * FROM reservedorder r
         JOIN salesperson s ON r.salesid = s.salesid 
         WHERE r.salesid = '$id' AND status='delivered'";
$result = mysqli_query($con, $sql)
          or die("Unable to get sql".mysqli_error($con));

$q=0;
$price=0.0;
$sn = "No customer";
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
  $sn = $row['salesName'];
  $q = $q + $row['orderQty'];
  $price = $price + $row['orderPrice'];
}
$comm = $price * 0.10; // COMMISION : 15% AFTER THEY DELIVERY PRODUCT FROM THE TOTAL PRICE

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

      <!---STAFF COMMISSION --->
      <center>
        <h2>MONTHLY COMMISSION</h2>
      </center>

      <form action="index.html" method="post" style="background-color: #cbdae2;">
        <fieldset>
          <p style="color: red; font-size: 12px; text-align:center;">* Only item that have been delivered would be count *</p>
          <br>
          <table style="text-align: left;">
            <tr>
              <th>Name</th>
              <th>:</th>
              <td><?php echo $sn ?></td>
            </tr>

             <tr>
              <th>Total Delivery</th>
              <th>:</th>
              <td><?php echo $q ?></td>
            </tr>

             <tr>
              <th>Total Sales</th>
              <th>:</th>
              <td>RM <?php echo $price ?></td>
            </tr>

            <tr>
              <th>Commission Earned</th>
              <th>:</th>
              <td>RM <?php echo $comm ?></td>
            </tr>
          </table>
        </fieldset>
      </form>
		</body>
</html>