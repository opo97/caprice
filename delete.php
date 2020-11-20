<?php
$con = mysqli_connect("localhost","root","","icecreamshop") or die(mysqli_error($con));

  $id = $_GET['m'];

  $sql = "DELETE from reservedorder WHERE orderid = '$id'";

  $result = mysqli_query($con, $sql);

  if ($result) 
  {
  	header("location:cart2.php");
  }
  else
  	echo "Error";
?>