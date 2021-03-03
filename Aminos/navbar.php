<?php ?>


<link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
<link href="css/style.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Luckiest+Guy" rel="stylesheet">
<div class="loggedin">
  <?php if(isset($_SESSION['username'])): ?>
    <h3> Hi, <strong><?php echo $_SESSION['username']; ?></strong></h3>
  <?php endif ?>

  <nav>
    <div class="logo">
      <a href="index.php"><img src="img/logo.png" ></a>
    </div>
    <ul class="pages">
      <li>
        <a href="index.php">Home</a>
      </li>
      <li>
        <a href="order.php">Menu</a>
      </li>
      <li>
        <a href="contact.php">Contact Us</a>
      </li>
      <li>
        <a href="cart.php">cart</a>
      </li>

      <li>
        <?php if( isset($_SESSION['username']) && !empty($_SESSION['username']) )
        {
          ?>
          <a href="userinfo.php">My Account</a>
          <a href="logout.php">Logout</a>

        <?php }else{ ?>

          <a href="login.php">Login</a>

        <?php } ?>
      </li>
    </ul>


    <div class="sidemenu">
      <div class="line1"></div>
      <div class="line2"></div>
      <div class="line3"></div>
    </div>
  </nav>


  <script src="js/js.js"></script>
  <script src="js/charge.js"></script>
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
