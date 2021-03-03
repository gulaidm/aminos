<?php

include('server.php');
include('navbar.php');

 ?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Aminos</title>
  <meta name="author" content="Mohamed Gulaid">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

<div class="col-md-9">

<?php

 if( isset($_SESSION['username']) && !empty($_SESSION['username']) ){

include('payment.php');

}else {

  header('location: login.php');
}


 ?>

</div>


</body>

</html>
