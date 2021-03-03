<?php
include 'server.php';
include 'navbar.php';
 ?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Aminos</title>
  <meta name="author" content="Mohamed Gulaid">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body style="background-color:#2980b9">

  <br>
  <div id="register-wrapper">
  <center><h2>Join us today!</h2></center>
  <br>
  <form class="form" action="register.php" method="post" enctype="multipart/form-data">
    <?php include ('errors.php')?>
    <label> <b>First Name:</b></label>
    <input type="text" class="inputvalues1" name="first_name" placeholder="first name"><br><br>
    <label> <b>Last Name:</b></label>
    <input type="text" class="inputvalues1" name="last_name" placeholder="last name"><br><br>
    <label> <b>Username:</b></label>
    <input type="text" class="inputvalues1" name="username" placeholder="username"><br><br>
    <label> <b>Email:</b></label>
    <input type="text" class="inputvalues1" name="email" placeholder="email"><br><br>
    <label><b>Password:</b></label>
    <input type="password" class="inputvalues1" name="password" placeholder="password"><br><br>
    <label><b>Confirm Password:</b></label>
    <input type="password" class="inputvalues1" name="password2" placeholder="confirm password"><br><br>
    <label> <b>Address:</b></label>
    <input type="text" class="inputvalues1" name="c_address" placeholder="Address"><br><br>
    <label> <b>Profile Picture:</b></label>
    <input type="file" class="inputvalues1" name="c_image"><br><br>
    <input type="submit" id="signup_btn" name="signup_btn" value="Sign Up">
    <p>Already a User? <a href="login.php"><b>Log in</b></a></p>
  </form>

  </div>



</body>

</html>
