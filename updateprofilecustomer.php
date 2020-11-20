<?php
  session_start();

$con = mysqli_connect("localhost","root","","icecreamshop") or die(mysqli_error($con));

  $id = $_SESSION['c_id'];

  $sql2 = "SELECT * FROM customer where custid = '$id'";
  $result2 = mysqli_query($con, $sql2)
            or die("unable to get sql".mysqli_error($con));

  while ($row = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
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

  if(isset($_POST['update']))
  {
    $cn = $_POST['c_name'];
    $cp = $_POST['c_phone'];
    $cd = $_POST['c_dob'];
    $ce = $_POST['c_email'];
    $ca = $_POST['c_addr'];
    $cz = $_POST['c_zip'];
    $cs = $_POST['c_state'];

    if (isset($_POST['c_city'])) {
      $cc = $_POST['c_city'] ;
    }

    $sql = "UPDATE customer c SET 
    c.custName = '$cn' , 
    c.custPhone = '$cp' ,
    c.custDOB = '$cd' ,
    c.custEmail = '$ce' ,
    c.custAddress = '$ca' ,
    c.custZip = '$cz' ,
    c.custCity = '$cc' ,
    c.custState = '$cs' 
    WHERE custid = '$id'";

    $result = mysqli_query($con, $sql)
              or die("Unable to get sql".mysqli_error($con));

    if ($result) {
      header('location:profilecustomer.php');
      exit;
    }
    else {
      echo ("Not successfully update".mysqli_error($con));
    }
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

 <style>
.block label 
{
  display : inline-block;
  width : 140px;
  text-align : right;
  margin : 10px 0px 10px 0px;
  vertical-align: middle;

}

.block input
{
  height : 30px;
  width : 60%;
  padding : 5px 15px;
  margin-bottom: 30px;
  margin-left: 10px;
  font-size : 16px;
  border-radius : 5px;
  border : 1px solid gray;
}

#form1 form
  {
    width: 580px;
    margin: 50px auto;
    text-align: left;
    padding: 20px;
    border: 1px solid #bbbbbb;
    border-radius: 5px;
    background-color: powderblue;
  }

.block textarea
{
  height : 100px;
  width : 60%;
  padding : 5px 15px;
  margin-bottom: 30px;
  margin-left: 10px;
  font-size : 16px;
  border-radius : 5px;
  border : 1px solid gray;
}

.formfield * {
  vertical-align: middle;
 
}

</style>

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
<div class="h1">UPDATE CUSTOMER PROFILE</div>

<div id="form1">

  <form method="POST" action="updateprofilecustomer.php">
    
    <div class = "block">
      <label>User ID  : </label>
      <?php echo $_SESSION['c_id']; ?>
    </div>

    <div class = "block">
      <label>Name  : </label>
      <input type = "text" name="c_name" value="<?php echo $c_name ?>">
    </div>

    <div class = "block">
      <label>Phone Number  : </label>
      <input type = "text" name="c_phone" value="<?php echo $c_phone ?>">
    </div>

    <div class = "block">
      <label>Date of Birth  : </label>
      <input type = "text" name="c_dob" value="<?php echo $c_dob ?>">
    </div>

    <div class = "block">
      <label>Email  : </label>
      <input type = "text" name="c_email" value="<?php echo $c_email ?>">
    </div>

    <div class = "block">
        <p class="formfield">
        <label for="textarea">Address  : </label>
        <textarea id="textarea" rows="5" name="c_addr" ><?php echo $c_addr ?></textarea>
        </p>
    </div>

    <div class = "block">
        <label for="custZip">Zip Code:</label>
        <input type="text" id="zipCode" name="c_zip" value="<?php echo $c_zip ?>">
    </div>

    <div class = "block">
        <label for="custCity">City:</label>
        <select id="city" name="c_city" style="width: 200px; padding-left: 5px; margin-left: 10px;">
                        <option <?php if ($c_city == 'Ipoh') echo 'selected'; ?> value="Ipoh">Ipoh</option>
                        <option <?php if ($c_city == 'Kuala Kangsar') echo 'selected'; ?> value="Kuala Kangsar">Kuala Kangsar</option>
                        <option <?php if ($c_city == 'Kampar') echo 'selected'; ?> value="Kampar">Kampar</option>
       </select>
    </div>

    <div class = "block">
        <label for="custState">State:</label>
        <input type="text" id="c_state" name="c_state" readonly value="Perak">
    </div>

    <center>
      <button type = "submit" name="update" value = "Update" class ="btn">Update</button>
    </center>

   </form>
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
      <h4>About Us </h4>

        <p style = " padding-bottom: 5px; font-size : 13px; text-decoration : none; color : #3A3B3C;">
          No.63,Jalan Bakawali 2B/5,
          <br>
          Seksyen BS10 Bukit Sentosa 3,
          <br>
          48300 Rawang,
          Selangor.
        </p>
        <button><a href="employees.php" style="text-decoration: none;"> Employees ?</a></button>
    </div>

  <br>

    <div class = "footer-items">
      <h4>Früzzie Gelato™ </h4>

        <p style = " padding-top: 0px; font-size : 13px;"><a style = " text-decoration : none; color : #3A3B3C;"href="home.php">Home</a></p>
  
        <p style = " padding-top: 0px; font-size : 13px;"><a style = " text-decoration : none; color : #3A3B3C;"href="flavour.php">Flavour</a></p>
  
        <p style = " padding-top: 0px; font-size : 13px;"><a style = " text-decoration : none; color : #3A3B3C;"href="tub size.php">Tub Size</a></p>

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