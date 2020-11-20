<?php
$con = mysqli_connect("localhost","root","","icecreamshop") or die(mysqli_error($con));

  $id = $_GET['m'];

  $sql = "DELETE from salesperson WHERE salesid = '$id'";

  $result = mysqli_query($con, $sql);

  if ($result) 
  {
  	header("location:admin - customer and staff list.php");
  }
  else
  	echo "Error";
?>