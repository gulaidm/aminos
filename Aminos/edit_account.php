<?php

$customer_session = $_SESSION['username'];

$get_customer = "select * from user where username='$customer_session'";

  $run_customer = mysqli_query($db,$get_customer);

  $row_customer = mysqli_fetch_array($run_customer);

  $customer_id = $row_customer['customer_id'];

  $first_name = $row_customer['first_name'];

  $last_name = $row_customer['last_name'];

  $email = $row_customer['email'];

  $address = $row_customer['customer_address'];

  $image = $row_customer['customer_image'];

 ?>


<h1 align="center"> Edit Your Account </h1>


<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">

        <label> First Name: </label>

        <input type="text" name="first_name" value="<?php echo $first_name;?>" class="form-control" required>

    </div>

    <div class="form-group">

        <label> Last Name: </label>

        <input type="text" name="last_name" class="form-control"  value="<?php echo $last_name;?>" required>

    </div>

    <div class="form-group">

        <label> Email: </label>

        <input type="text" name="email" class="form-control" value="<?php echo $email;?>" required>

    </div>


    <div class="form-group">

        <label> Address: </label>

        <input type="text" name="address" class="form-control" value="<?php echo $address;?>" required>

    </div>

    <div class="form-group">

        <label> Profile Image: </label>

        <input type="file" name="c_image" class="form-control form-height-custom">

        <img class="img-responsive" src="customer/img/<?php echo $image;?>">

    </div>

    <div class="text-center">

        <button name="change" class="btn btn-primary">

            <i class="fa fa-user-md"></i> Update Account

        </button>

    </div>

</form>

<?php
  if (isset($_POST['change'])) {

    $update_id = $customer_id;

    $first_name = $_POST['first_name'];

    $last_name = $_POST['last_name'];

    $email = $_POST['email'];

    $address = $_POST['customer_address'];

    $c_image = $_FILES['c_image']['name'];
    $c_image_tmp = $_FILES['c_image']['tmp_name'];

    move_uploaded_file($c_image_tmp,"customer/img/$c_image");

    $update_user = "update user set first_name='$first_name',last_name='$last_name',email='$email',customer_address='$address',first_name='$first_name',customer_image='$c_image' where customer_id='$update_id'";

    $run_user = mysqli_query($db,$update_user);

    if ($run_customer){

      echo "<script>alert('Your account has been updated, please log in again')</script>";
      echo "<script>window.open('logout.php','_self')</script>";

    }

  }


  ?>
