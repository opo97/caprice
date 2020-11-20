<?php
  session_start();

$con = mysqli_connect("localhost","root","","icecreamshop") or die(mysqli_error($con));


  $id = $_SESSION['c_id'];

  $sql = "SELECT * FROM customer where custid = '$id'";
  $result = mysqli_query($con, $sql)
            or die("unable to get sql".mysqli_error($con));

  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $c_id= $row['custid'];
        $c_name = $row['custName'];
        $c_phone = $row['custPhone'];
        $c_username = $row['custUsername'];
        $c_password = $row['custPassword'];
        $c_dob = $row['custDOB'];
        $c_email = $row['custEmail'];
        $c_addr = $row['custAddress'];
        $c_zip = $row['custZip'];
        $c_city = $row['custCity'];
        $c_state = $row['custState'];
  }

?>

<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css2/navhome.css">
    <link rel="stylesheet" type="text/css" href="css2/slideshow.css">
    <link rel="stylesheet" type="text/css" href="css2/form.css">
    <link rel="stylesheet" type="text/css" href="css2/login.css">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Barlow+Condensed|Barlow:600|Rasa:300,500" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



  <title>Früzzie Gelato™</title>
  <br><br><br><br>
  <center>
      <img src="img/title2.png" height="170" width="auto">
    </center>

</head>


<body style="background-image: url('img/backg3.png'); margin-left: 0px; margin-right: 0px; margin-bottom: 0px;">

<br><br>

<!---CONTAINER-->
<div style="background-color: white;">

<!----MENU BAR--->
<ul>
  <center>
  <li><a href="home.php">Home</a></li>
  <li><a href="profilecustomer.php">Profile</a></li>
  <li><a href="order.php">Purchase</a></li>
  <li><a href="cart2.php">Cart</a></li>
  <li><a href="home.php">Logout</a></li>
  </center>
</ul>


<!---Customer Profile-->

<br><br>
<center>
<div class="h1">CUSTOMER PROFILE</div>

<div id="form1">

  <form method="GET">
    <table width="480" cellpadding="5">
    <tr>
      <td>User ID</td>
      <td>:</td>
      <td><?php echo $c_id ?></td>
    </div>
    </tr>

    <tr>
      <td>Name</td>
      <td>:</td>
      <td><?php echo $c_name ?></td>
    </div>
    </tr>

    <tr>
      <td>Phone Number</td>
      <td>:</td>
      <td><?php echo $c_phone ?></td>
    </div>

    <tr>
      <td>Date of Birth</td>
      <td>:</td>
      <td><?php echo $c_dob ?></td>
    </tr>

    <tr>
      <td>Email</td>
      <td>:</td>
      <td><?php echo $c_email ?></td>
    </tr>

    <tr>
        <td>Address</td>
        <td>:</td>
        <td><?php echo $c_addr
      ." ,<br> ".$c_zip
      ." , ".$c_city
      ." ,<br> ".$c_state; ?>
        </td>
    </tr>
    </table>

   </form>
  </div>

<center><p style= "font-size: 18px;">Want to update your profile?</p></center>

<div>
      <a href="updateprofilecustomer.php"><input type = "submit" name="submit" value = "Update"></a>
</div>

<br><br>

<table>
</table>

<br><br><br><br>
</center>




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