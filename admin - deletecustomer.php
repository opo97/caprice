<?php
 $con = mysqli_connect("localhost","root","","icecreamshop") or die(mysqli_error($con));

  $id = $_GET['m'];

  $sql = "DELETE from customer WHERE custid = '$id'";

  $result = mysql_query($con, $sql)
            or die(mysql_error($con));

 if ($result) 
  {
    header("location:admin - customer and staff list.php");
  }
  else
    echo "Error";
?>