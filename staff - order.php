<?php
session_start();

$con = mysqli_connect("localhost","root","","icecreamshop") or die(mysqli_error($con));

$id = $_SESSION['s_id'];

$sql = "SELECT * FROM reservedorder r JOIN icecream i ON r.iceid=i.iceid
        JOIN ic_flavour f ON r.flavourid=f.flavourid JOIN salesperson s ON 
        r.salesid=s.salesid JOIN customer t ON r.custid = t.custid WHERE (r.salesid = '$id') AND (status='received' OR statuS='delivered' OR status='failed')";
$result = mysqli_query($con, $sql)
          or die("Unable to get sql".mysql_error($con));

if (isset($_POST['update'])) {
  $o_id = $_POST['orderid'];
  if (isset($_POST['status'])) {
      $st = $_POST['status'];
    }
      
    
      $sql2 = "UPDATE reservedorder r SET r.status = '$st' WHERE r.orderid = '$o_id'";
      $result2 = mysqli_query($con, $sql2)
                  or die(mysqli_error($con));

      if ($result2) {
        header('location:staff - order.php');
      }
}

if (isset($_POST['search'])) {
  $text = $_POST['searchText'];

  $sql = "SELECT * FROM reservedorder r JOIN icecream i ON r.iceid=i.iceid
        JOIN ic_flavour f ON r.flavourid=f.flavourid JOIN salesperson s ON 
        r.salesid=s.salesid JOIN customer t ON r.custid = t.custid WHERE (r.salesid = '$id' AND r.status!='pending') AND (iceDesc LIKE '%$text%' OR flavourDesc LIKE '%$text%' OR custName LIKE '%$text')";
  $result = mysqli_query($con, $sql)
             or die(mysqli_error($con));

  $count = mysqli_num_rows($result);

  if ($count == 0) {
    echo "<script type='text/Javascript'>
      alert('No customer')
      </script>";
  }

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

        table {
        border-collapse: collapse;
         width: 70%;
        }

        th {
          padding: 8px;
          text-align: center;
          border-bottom: 1px solid #ddd;
          background-color: #C5DEEE;
        }

        td {
          padding: 8px;
          text-align: center;
          border-bottom: 1px solid #ddd;
        }

        tr:hover {background-color:#f5f5f5;}

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

<!---ADMIN REGISTERED --->
			<center>
        		<h2>LIST ORDER</h2>
            <form method="POST" action="staff - order.php" style="width: 600px; height: 70px; background-color: transparent;">
              <input type="text" name="searchText" style="width: 70%; height: 30px; background-color: #d4d0ce" placeholder="What are you looking for?">   <input type="submit" name="search" value="Search" style="height: 30px; padding-bottom: 23px;">
            </form>
            <br><br>
            <table width="55%" align="center">
              <tr>
                <th>No</th>
                <th>Order ID</th>
                <th>Customer Name</th>
                <th>Flavour</th>
                <th>Tub Size</th>
                <th>Quantity</th>
                <th>Order<br>Price <br>(RM)</th>
                <th>Status</th>
              </tr>

            <?php
            $n = 1;
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
              $o_id = $row['orderid'];
              $c_n = $row['custName'];
              $f_n = $row['flavourDesc'];
              $i_n = $row['iceDesc'];
              $q = $row['orderQty'];
              $p = $row['orderPrice'];
              $s = $row['status'];

             echo"
             <tr>
                <td align='center'>$n</td>
                <td align='center'>$o_id</td>
                <td align='center'>$c_n</td>
                <td align='center'>$f_n</td>
                <td align='center'>$i_n</td>
                <td align='center'>$q</td>
                <td align='center'>$p</td>
                <td align='center' style='width:130px;'>
                <form method='POST' action='staff - order.php' style='background-color: white;'>
                $s<br>
                <select id='status' name='status' style=' width:100px; margin-top:10px; margin-bottom:15px;'>
                  <option if($s == 'received') echo 'selected'; value='received'>received</option>
                  <option if($s == 'delivered') echo 'selected'; value='delivered'>delivered</option>
                  <option if($s == 'failed') echo 'selected'; value='failed'>failed</option>
                </select>
                <input type='hidden' name='orderid' value=$o_id>
                <input type='submit' name='update' value='update'>
                </form>
                </td>
            </tr>";

            $n++;
            }

            ?>

            </table>
        	</center>

      <br>
			
		</body>
</html>