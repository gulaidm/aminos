<center>

    <h1> Are you sure you want to delete? This action cannot be undone!</h1>

    <form action="" method="post"><!-- form Begin -->

       <input type="submit" class="btn btn-danger" name="confirm" value="Yes, Delete Me Now!" >

       <input type="submit" class="btn btn-primary" name="No" value="No, I've Made an Mistake" >

    </form>

</center>

<?php

$username = $_SESSION['username'];

if (isset($_POST['confirm'])) {

  $delete_user = "delete from user where username='$username'";

  $run_delete = mysqli_query($db,$delete_user);

  if ($run_delete) {

    session_destroy();

    echo "<script>alert('Account deleted successfully, we will miss you')</script>";

    echo "<script>window.open('index.php','_self')</script>";



  }

}

if (isset($_POST['No'])) {
  echo "<script>alert('Good Choice :)')</script>";
  echo "<script>window.open('userinfo.php?my_orders','_self')</script>";
}



 ?>
