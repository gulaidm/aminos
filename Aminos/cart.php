<?php

include 'server.php';
include 'navbar.php';
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Aminos - Cart</title>
  <meta name="author" content="Mohamed Gulaid">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

   <div id="content">
       <div class="container">
         <div class="row">
           <div class="col-md-12">
               <ul class="breadcrumb">
                   <li>
                       <a href="index.php">Home</a>
                   </li>
                   <li>
                       Cart
                   </li>
               </ul>
             </div>
             </div>
              <div class="row">
               <div id="cart" class="col-md-8">

                 <div class="box">

                   <form action="cart.php" method="post" enctype="multipart/form-data">
                     <h1>Shopping cart</h1>

                     <?php

                     $ip_add = getUserIp();

                     $select_cart = "select * from cart where ip_add='$ip_add'";

                     $run_cart = mysqli_query($db, $select_cart);

                     $count = mysqli_num_rows($run_cart);

                      ?>

                     <p class="text-muted">You have <?php echo $count; ?> item(s) in cart</p>

                     <div class="table-responsive">

                       <table class="shoppinggrid">

                         <thead>
                           <tr>

                             <th colspan="2">Food</th>
                             <th>Quantity</th>
                             <th>Unit Price</th>
                             <th colspan="1">Remove</th>
                             <th colspan="2">Sub-total</th>

                           </tr>
                         </thead>
                         <tbody>

                           <?php


                           $total= 0;

                           while ($row_cart = mysqli_fetch_array($run_cart)) {

                             $pro_id = $row_cart['p_id'];
                             $pro_qty = $row_cart['qty'];

                             $get_items = "select * from products where product_id='$pro_id'";
                             $run_products = mysqli_query($db,$get_items);


                             while ($row_products = mysqli_fetch_array($run_products)) {

                               $product_title = $row_products['product_title'];
                               $product_img = $row_products['product_img'];
                               $price = $row_products['product_price'];
                               $sub_total = $row_products['product_price']*$pro_qty;

                               $total += $sub_total;


                            ?>
                           <tr>
                             <td>
                               <img src="admin/img/<?php echo $product_img; ?>" alt="Product1">
                            </td>

                            <td>

                            <a href="order.php?pro_id=<?php echo $pro_id; ?>"> <?php echo $product_title; ?> </a>

                            </td>

                            <td>

                                <?php echo $pro_qty; ?>

                            </td>

                            <td>

                              <?php echo $price; ?>

                            </td>

                            <td>
                              <input type="checkbox" name="remove[]" value="<?php $pro_id; ?>">
                            </td>

                            <td>

                              £ <?php echo $sub_total; ?>

                            </td>

                           </tr>


                           <?php

                         } }

                            ?>
                         </tbody>

                         <tfoot>

                           <tr>
                             <th colspan="5">Total</th>
                             <th colspan="2">£ <?php echo $total; ?></th>
                           </tr>

                         </tfoot>

                       </table>

                     </div>

                     <div class="box-footer">

                       <div class="pull-left">

                         <a class="btn btn-info" href="order.php">

                            <i class="fa fa-chevron-left"></i> Continue Shopping

                         </a>

                       </div>

                       <div class="pull-right">

                         <button type="submit" name="update" value="Update Cart" class="btn btn-success">

                            <i class="fas fa-sync"></i> Update Cart

                         </button>

                         <a href="checkout.php" class="btn btn-primary">

                           <i class="fa fa-chevron-right"></i> Checkout

                         </a>

                       </div>

                     </div>
                   </form>

                 </div> </div>

                 <?php

                 function update_cart(){

                     global $db;

                     if(isset($_POST['update'])){

                         foreach($_POST['remove'] as $remove_id){

                             $delete_product = "delete from cart where p_id='$remove_id'";

                             $run_delete = mysqli_query($db,$delete_product);

                             if($run_delete){

                                 echo "<script>window.open('cart.php','_self')</script>";

                             }

                         }

                     }

                 }

                echo @$up_cart = update_cart();

                 ?>
         <div class="col-md-4" float:'right'>

           <div id="order" class="box">

             <div class="box-header">

               <h3>Order Summary</h3>

             </div>
             <p class="text-muted">

              Delivery Costs

             </p>

             <div class="table-responsive">

               <table class="table">

                 <tbody>

                    <tr>
                      <td>Order Sub-Total</td>
                      <th><?php echo $total; ?></th>
                    </tr>

                    <tr>
                      <td>Delivery Cost</td>
                      <th>Free</th>
                    </tr>

                    <tr class="total">
                      <td>Total</td>
                      <th><?php echo $total; ?></th>
                    </tr>

                 </tbody>



               </table>

             </div>

           </div>

         </div>

       </div>
     </div>
   </div>
     </div>
     </div>
</body>
</html>
