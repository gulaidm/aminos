<div class="box"><!-- box Begin -->
  <?php

   $username = $_SESSION['username'];

   $select_customer = "select * from user where username='$username'";

   $run_customer = mysqli_query($db,$select_customer);

   $row_customer = mysqli_fetch_array($run_customer);

   $customer_id = $row_customer['customer_id'];

   ?>
    <h1 class="text-center">Payment Options:</h1>

     <p class="lead text-center"><!-- lead text-center Begin -->

     <a href="buy.php?c_id=<?php echo $customer_id ?>"> Pay Later (at the door) </a>

     </p><!-- lead text-center Finish -->

  

</div><!-- box Finish -->
