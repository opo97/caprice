<?php
session_start();

$con = mysqli_connect("localhost","root","","icecreamshop") or die(mysqli_error($con));

$id = $_SESSION['c_id'];

$sql = "SELECT * FROM reservedorder r JOIN icecream i ON r.iceid = i.iceid JOIN ic_flavour c ON c.flavourid = r.flavourid
       WHERE custid = '$id' AND (status='pending' OR status ='received')";
$result = mysqli_query($con, $sql)
          or die(mysqli_error($con));
?>

<!DOCTYPE html>
<html>

<head>
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
  <li><a href="home2.php">Home</a></li>
  <li><a href="profilecustomer.php">Profile</a></li>
  <li><a href="order.php">Purchase</a></li>
  <li><a href="cart2.php">Cart</a></li>
  <li ><a href="home.php">Logout</a></li>
  </center>
</ul>

<!---CHECKOUT CART-->
<br><br>
<center>
<div class="h1">CHECKOUT CART</div>
<br><br>

<table width="50%" border="1" bordercolor="white" cellpadding="10">
<?php
  $totalall=0.0;

  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $pictub = $row['iceDesc'];
    $id = $row['orderid'];
    $picflav =$row['flavourDesc'];
    $total = ( $row['icePrice'] + $row['flavourPrice'] ) * $row['orderQty'];

    $sql2 = "UPDATE reservedorder r SET r.orderPrice='$total' WHERE r.orderid='$id'";
    $result2 =  mysqli_query($con, $sql2)
              or die(mysqli_error($con));

    echo "<tr><td bgcolor='#BBD7E7' colspan='2' height='60'>";
    echo "<b>Order Id:</b> ".$row['orderid']."<br><b>Date:</b> ".$row['orderdate'];
    echo "</td><td bgcolor='#BBD7E7' style='text-align:right;'>";
    echo "<b>Status:</b> ".$row['status'];
    echo "</td></tr><tr><td><b>";
    echo $row['iceDesc']."</b><br><img src='img/$pictub.png' width='80' height='100'><br><br>Per unit : RM ".$row['icePrice'];
    echo "</td><td><b>";
    echo $row['flavourDesc']."</b><br><img src='img/$picflav.png' width='80' height='100'><br><br>Per unit : RM ".$row['flavourPrice'];
    echo "</td>";
    echo "<td style='text-align:right;'>Quantity :".$row['orderQty']."<br><br>Total : RM ".$total."<br><br><a href='delete.php?m=$id'><img src='img/trash.png' width='30' height='30'></a>";
    echo "<br><br><br><br><br></td></tr>";

    $totalall = $totalall + $total;
  }
    echo "<tr>
        <td colspan='3' bgcolor='#3379A0' style='color: white; text-align: right; height: 60px;'>Total Order : RM $totalall</td></tr>"
?>
    <tr>
      <form method="GET" action="invoice-db.php">
        <td colspan="3" border="0"><input type="submit" name="pay" value="Pay"></td>
      </form>
    </tr>
    <tr>
      <td colspan="3" style="color: red;">*If all order status received, customer is disable from clicking payment button</td>
    </tr>

</table>
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