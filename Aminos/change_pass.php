<h1 align="center"> Change Password </h1>


<form action="" method="post">

    <div class="form-group">

        <label> Your Old Password: </label>

        <input type="text" name="old_pass" class="form-control" required>

    </div>

    <div class="form-group">

        <label> Your New Password: </label>

        <input type="text" name="pass1" class="form-control" required>

    </div>

    <div class="form-group">

        <label> Confirm Your New Password: </label>

        <input type="text" name="pass2" class="form-control" required>

    </div>

    <div class="text-center">

        <button type="submit" name="submit" class="btn btn-primary">

            <i class="fa fa-user-md"></i> Update Now

        </button>

    </div>

</form>

<?php

if (isset($_POST['submit'])) {

  $username = $_SESSION['username'];

  $old_pass = $_POST['old_pass'];

  $new_pass1 = $_POST['pass1'];

  $new_pass2 = $_POST['pass2'];

  $sel_old = "select * from user where password='$old_pass'";

  $run_old = mysqli_query($db,$sel_old);

  $check_old = mysqli_fetch_array($run_old);

  if($check_old==0){

    echo "<script>alert('Your current password is wrong, please try again')</script>";

    exit();

  }

  if ($new_pass1!=$new_pass2){

    echo "<script>alert('Passwords did not match, please try again')</script>";

    exit();
  }

  $update_pass = "update user set password='$new_pass2' where username='$username'";

  $run_user_pass = mysqli_query($db,$update_pass);

  if($run_user_pass){

  echo "<script>alert('Password has been successfully updated')</script>";

  echo "<script>window.open('userinfo.php?my_orders','_self')</script>";



  }

}


?>
