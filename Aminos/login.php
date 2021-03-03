<?php
include 'server.php';
include 'navbar.php';

 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
</head>
<body style="background-color:#2980b9">

  <br>
  <div id="main-wrapper">
  <center><h2>Welcome back</h2></center>
  <br>
  <form class="form" action="login.php" method="post">
    <?php include ('errors.php')?>
    <label> <b>Username:</b></label><br>
    <input type="text" class="inputvalues" placeholder="username" name="username" required><br>
    <label><b>Password:</b></label><br>
    <input type="password" class="inputvalues" placeholder="password" name="password" required><br><br>
    <input type="submit" id="login_btn" name="login_btn" value="Login">
  </form>
    <p><a href="register.php">Create account</a></p>
  </div>



</body>

</html>
