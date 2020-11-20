<?php
session_start();

$con = mysqli_connect("localhost","root","","icecreamshop") or die(mysqli_error($con));

$id = $_SESSION['s_id'];

$sql = "SELECT * FROM salesperson WHERE salesid = '$id'";
$result = mysqli_query($con, $sql)
          or die("Unable to get sql".mysqli_error($con));

while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
  $s_uname = $row['salesUsername'];
  $s_name = $row['salesName'];
  $s_phone = $row['salesPhone'];
  $s_psw = $row['salesPassword'];
  $s_pic = $row['salesPic'];
  $s_acc = $row['salesNoAcc'];
  $s_email = $row['salesEmail'];
  $s_c = $row['salesCity'];
}


if (isset($_POST['Update'])) {
  $su = $_POST['username'];
  $sn = $_POST['name'];
  $sp = $_POST['phone'];
  $sps = $_POST['password'];
  $sa = $_POST['acc'];
  $se = $_POST['email'];

  $sql2 = "UPDATE salesperson s SET s.salesUsername='$su', s.salesName='$sn', 
  s.salesPhone='$sp', s.salesNoAcc='$sa', s.salesEmail='$se', s.salesPassword='$sps'WHERE s.salesid = '$id'";
  
  $result2 = mysqli_query($con, $sql2)
              or die(mysqli_error($con));

  if ($result2) {
    header('location:staff - profile.php');
  }
  else
    header('location:staff - updateprofile.php');
}

 if(isset($_POST["insert"]))  
 {  
      $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"])); 
      $query = "UPDATE salesperson s SET s.salesPic = '$file' WHERE s.salesid = '$id'";
      if(mysqli_query($con, $query))  
      {  
           echo '<script>alert("Image successfully updated!")</script>';  
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
      </style>


      <script type="text/javascript">
        function check()
        {
          var pic = document.update.image.value;

          if (pic == "")
          {
            alert("No picture inserted");
            return false;
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

<!---STAFF UPDATE PROFILE --->
      <center>
            <h2>STAFF UPDATE PROFILE</h2>
          </center>

          <form action="staff - updateprofile.php" method="POST" enctype="multipart/form-data" name="update" >
            <fieldset>
              <br><br> 
                <label for="image">Update New Image:</label>
                <p><input type="file" name="image" id="image" value="<?php echo '<img src="data:image/jpeg;base64,'.base64_encode('$s_pic').'">' ?>
                <input type="submit" name="insert" value="Insert" onclick="return check();"></p>

                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="<?php echo $s_name ?>">

                <label for="name">Username:</label>
                <input type="text" id="username" name="username" value="<?php echo $s_uname ?>">
        
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo $s_email ?>">
       
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" value="<?php echo $s_psw ?>">
      
                <label for="phone">Phone Number:</label>
                <input type="text" id="phone" name="phone" value="<?php echo $s_phone ?>">

                <label for="dob">No Account:</label>
                <input type="text" id="acc" name="acc" value="<?php echo $s_acc ?>">

                <label for="dob">Delivery City:</label>
                <input type="text" name="city" value="<?php echo $s_c ?>" readonly>
                <p style="color: red; font-size: 13px;">* To change delivery city, please contact admin *</p>
            </fieldset>
            <center><input type="submit" name="Update" value="Update"></center>
            <br>
          </form>
      <br>
		</body>
</html>