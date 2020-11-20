<?php
session_start();

$con = mysqli_connect("localhost","root","","icecreamshop") or die(mysqli_error($con));

$c_id = $_SESSION['c_id'];

$sql2 = "SELECT * FROM customer WHERE custid = '$c_id'";
$result2 = mysqli_query($con, $sql2)
            or die(mysqli_error($con));
while ($row = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
  $c_city = $row['custCity'];
}


$sql = "SELECT * from ic_flavour";

$result = mysqli_query($con, $sql)
          or die("SQL select statement failed");

$sql3 = "SELECT * from salesperson WHERE salesCity = '$c_city'";
$result3 = mysqli_query($con, $sql3)
            or die(mysqli_error($con));
while ($row2 = mysqli_fetch_array($result3, MYSQLI_ASSOC)) {
  $s_id = $row2['salesid'];
}


if (isset($_POST['buy'])){
    $f_id = $_POST['flavourid'];
    $sizetub = $_POST['sizetub'];
    $qty = $_POST['qty'];


    if($sizetub == "Large")
    {
      $iceid = 1;
    }

    elseif ($sizetub == "Medium") {
      $iceid = 2;
    }

      $sql3="INSERT INTO 
      reservedorder(`orderQty`,`orderdate`,`custid`, `flavourid`, `salesid` , `iceid`) 
      VALUES ('$qty',NOW(),'$c_id','$f_id','$s_id' , '$iceid')";
      $result3=mysqli_query($con, $sql3)
                or die(mysqli_error($con));

      header("location:cart2.php");
  }
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
  <li><a href="home.php">Logout</a></li>
  </center>
</ul>

<!---FLAVOUR CHOICE-->
<br><br>
<center>
<div class="h1">FLAVOUR</div>

<br><br>

<table border="2" width="5" cellpadding="10" cellspacing="0" style="border-color: #9cc9ac;">
<tr>

<form name="cart" method="POST" action="order.php">
<?php
$n = 1;
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
  $desc = $row['flavourDesc'];

  echo '<td align="center"><img src="data:image/jpeg;base64,'.base64_encode($row['flavourPic'] ).'" height="280" width="220" class="img-thumnail" /><p align="center"><input type="radio" name="flavourid" value='.$row['flavourid'].'  required>Choose</p></td>';

if ($n%3 == 0) {
    echo "</tr><tr>";
  }
  $n++;
  }
?>

    <table style="margin-top: 50px;" cellspacing="12" bgcolor="#FDB784">
      <tr>
        <th>Size</th>
        <td>:</td>
        <td>
          <select id='sizetub' name='sizetub' style='height: 30px; margin: 20px; width: 80px;' required="">
            <option style='display:none'></option>
            <option value='Large'>Large</option>
            <option value='Medium'>Medium</option>
          </select>
        </td>
      </tr>
      <tr>
        <th>Quantity</th>
        <td>:</td>
        <td><input type='number' name='qty' min='1' max='200' style='height: 30px; margin: 20px; width: 80px;' required=""></td>
      </tr>
      <tr>
        <td colspan='3' align='center'><input type='submit' name='buy' value='Cart'></td>
      </tr>
    </table>
  </td>
  </tr>
</form>

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