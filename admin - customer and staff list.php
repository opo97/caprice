<?php

session_start();

$id = $_SESSION['a_id'];

$con = mysqli_connect("localhost","root","","icecreamshop") or die(mysqli_error($con));


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


$sql2="SELECT * FROM customer";
$result2 = mysqli_query($con, $sql2)
            or die(mysqli_error($con));

$sql3="SELECT * FROM salesperson";
$result3 = mysqli_query($con, $sql3)
          or die(mysqli_error($con));


?>


<!DOCTYPE html>
  <html>
      <link rel="stylesheet" type="text/css" href="css2/navbar.css">
      <link rel="stylesheet" type="text/css" href="css2/form.css">
      <link rel="stylesheet" type="text/css" href="css2/search.css">
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
        th {
          padding: 6px;
          text-align: center;
          border-bottom: 1px solid #ddd;
          background-color: #C5DEEE;
          height: 35px;
        }
        td {
          text-align: center;
          height: 35px;
        }
      </style>


      <script type="text/javascript">
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


        function choose() {
          var d = document.getElementById('select');
          var o = d.options[d.selectedIndex].value;
          if(o == "customer") {
            document.getElementById("demo").innerHTML=document.getElementById("customer").innerHTML;
          }
          else if (o == "staff") {
            document.getElementById("demo").innerHTML=document.getElementById("staff").innerHTML;
          }
        }


      </script>
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
         
      </div> <a href="admin - customer and staff list.php">List User</a>
          <br><br>

      <div id="main">
          <span style="font-size:30px;cursor:pointer; padding-left: 15px" onclick="openNav()">&#9776;</span>
      </div>


<!---CUSTOMER OR STAFF-->
<center>
<h1 style="letter-spacing: 2px;">LIST USER</h1>
<br>
<table>
  <tr>
    <td>
      <select style="width: 400px;" name="select" id="select">
      <option value="" disabled selected>Select your option</option>
      <option value="customer">Customer</option>
      <option value="staff">Staff</option>
      </select>
  </td>
  <td><input type="submit" name="choose" value="Choose" style="margin-bottom: 30px; height: 35px;" onclick="choose()"></td>
  </tr>
</table>

<div id="demo"><br>Choose which list do you want to see</div>

<div id="customer" style="display: none;">
  <br>
  <table width="700px;">
    <tr style="border-bottom: 1px black;">
      <th>No</th>
      <th>Customer ID</th>
      <th>Name</th>
      <th>City</th>
      <th>Total Spend (RM)</th>
      <th>Action</th>
    </tr>

    <?php

      $n = 1;
      while ($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
        $custid = $row2['custid'];
        $name = $row2['custName'];
        $c_city = $row2['custCity'];

        //calculate total spend customer total spend
        $sql4 = "SELECT * FROM reservedorder r
         JOIN customer c ON c.custid = r.custid
         WHERE c.custid = '$custid'";
        $result4 = mysqli_query($con, $sql4)
          or die("Unable to get sql4".mysql_error($con));

          $price = 0.0;
          while ($row4 = mysqli_fetch_array($result4, MYSQLI_ASSOC)) {
            $price = $price+$row4['orderPrice'];
          }

        
        echo "<tr>
        <td>$n</td>
        <td>$custid</td>
        <td>$name</td>
        <td>$c_city</td>
        <td>$price</td>
        <td><a href='admin - deletecustomer.php?m=$custid' style='text-decoration:none;'><button style='display:block;'>Delete</button></a></td>
        </tr>";
        $n++;
      }
      ?>
  </table>
</div>

<!---Staff Search and List/View/Delete/Update--->
<div id="staff" style="display: none;">
  <br>
  <form method="POST" action="admin - customer and staff list.php" style="width: 600px; height: 70px; background-color: transparent;">
    
  <input type="text" name="searchText" style="width: 70%; height: 28px; background-color: #d4d0ce" placeholder="What are you looking for?">
  <button style="background-color: transparent;" name="searchStaff"><img src="img/search.png" width="24" height="20" style="margin-bottom: -5px;  cursor: pointer;">
  </button>
</form>
  <table width="700px;">
    <tr>
      <th>No</th>
      <th>Staff ID</th>
      <th>Name</th>
      <th>Delivery City</th>
      <th>Total Sales (RM)</th>
      <th>Total Commission (RM)</th>
      <th>Action</th>
    </tr>

    <?php

    if (isset($_POST['searchStaff'])) {
    $text = $_POST['searchText'];

    $sql3 = "SELECT * FROM `salesperson` WHERE `salesName` LIKE '%$text%'";
    $result3 = mysqli_query($con, $sql3)
             or die(mysql_error());

    $count = mysqli_num_rows($result3);

      if ($count == 0) {
          echo "<script type='text/Javascript'>
          alert('No staff');
          </script>";
          }
    }

      $n = 1;
      while ($row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC)) {
        $salesid = $row3['salesid'];
        $name = $row3['salesName'];
        $city = $row3['salesCity'];


        //calculate total spend customer total spend
        $sql5 = "SELECT * FROM reservedorder r
         JOIN salesperson s ON s.salesid = r.salesid
         WHERE s.salesid = '$salesid' AND status='delivered'";
        $result5 = mysqli_query($con, $sql5)
          or die("Unable to get sql4".mysqli_error($con));

          $price = 0.0;
          while ($row5 = mysqli_fetch_array($result5, MYSQLI_ASSOC)) {
            $op=$row5['orderPrice'];
            $price = $price+$op;
          }
          $comm = $price * 0.10;

        echo "<tr>
        <td>$n</td>
        <td>$salesid</td>
        <td>$name</td>
        <td>$city</td>
        <td>$price</td>
        <td>$comm</td>
        <td><a href='admin - deletesalesperson.php?m=$salesid' style='text-decoration:none;'><button style='display:block;'>Delete</button></a></td>
        </tr>";
        $n++;
      }
      ?>
  </table>
</div>


</center>
      <br>
    </body>
</html>