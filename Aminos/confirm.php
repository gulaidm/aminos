
<?php
  include 'navbar.php';
  include 'server.php';
 ?>

 <?php

if (isset($_GET['order_id'])) {

$order_id = $_GET['order_id'];

}


  ?>



<!DOCTYPE html>
<html lang="en">
<head>

</head>
<body>

   <?php

    include("sidebar.php");

    ?>

           </div><!-- col-md-3 Finish -->

           <div class="col-md-9"><!-- col-md-9 Begin -->

               <div class="box"><!-- box Begin -->

                   <h1 align="center"> Please confirm your payment</h1>

                   <form action="confirm.php?update_id=<?php echo $order_id; ?>" method="post" enctype="multipart/form-data"><!-- form Begin -->

                       <div class="form-group"><!-- form-group Begin -->

                         <label> Invoice No: </label>

                          <input type="text" class="form-control" name="invoice_no" required>

                       </div><!-- form-group Finish -->

                       <div class="form-group"><!-- form-group Begin -->

                         <label> Amount Sent: </label>

                          <input type="text" class="form-control" name="amount_sent" required>

                       </div><!-- form-group Finish -->

                       <div class="form-group"><!-- form-group Begin -->

                         <label> Select Payment Mode: </label>

                          <select name="payment_mode" class="form-control"><!-- form-control Begin -->

                              <option> Select Payment Mode </option>
                              <option> Cash </option>
                              <option> Bank Transfer </option>

                          </select><!-- form-control Finish -->

                       </div><!-- form-group Finish -->

                       <div class="form-group"><!-- form-group Begin -->

                         <label> Transaction / Reference ID: </label>

                          <input type="text" class="form-control" name="ref_no" required>

                       </div>


                       <div class="form-group">

                         <label> Payment Date: </label>

                          <input type="text" class="form-control" name="date" required>

                       </div>

                       <div class="text-center">

                           <button class="btn btn-primary btn-lg" name="confirm_payment">

                               <i class="fa fa-user-md"></i> Confirm Payment

                           </button>

                       </div>

                   </form>
                   <?php

                   if (isset($_POST['confirm_payment'])) {

                     $update_id = $_GET['update_id'];

                     $invoice_no = $_POST['invoice_no'];

                     $amount = $_POST['amount'];

                     $payment_mode = $_POST['payment_mode'];

                     $ref_no = $_POST['ref_no'];

                     $code = $_POST['code'];

                     $payment_date = $_POST['date'];

                     $complete = "Complete";

                     $insert_payment = "insert into payments (invoice_no,amount,payment_mode,ref_no,date,Complete) values
                     ('$update_id','$invoice_no','$amount','$yment_mode','$ref_no','$payment_date')";

                     $run_payment = mysqli_query($db,$insert_payment);

                     $update_customer_order = "update customer_orders set order_status='$complete' where order_id='$update_id'";

                     $complete_customer_order= mysqli_query($db,$update_customer_order);

                     $update_pending = "update pending_orders set order_status='$complete' where order_id='$update_id'";

                     $run_pending = mysqli_query($db,$update_pending);

                     if ($run_pending) {

                       echo "<script>alert('Purchase Succesfull, your order will be with you shortly')</script>";
                       echo "<script>window.open('userinfo.php?my_orders','_self')</script>";
                     }








                   }

                    ?>
               </div>

           </div>

       </div>
   </div>





</body>
</html>
