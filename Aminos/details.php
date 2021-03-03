<?php

    $active='Cart';
    include 'server.php';
    include 'navbar.php';
?>


   <div id="content"><!-- #content Begin -->
       <div class="container"><!-- container Begin -->
           <div class="col-md-12"><!-- col-md-12 Begin -->

               <ul class="breadcrumb"><!-- breadcrumb Begin -->
                   <li>
                       <a href="index.php">Home</a>
                   </li>
                   <li>
                       Shop
                   </li>
                   <li> <?php echo $pro_title; ?> </li>
               </ul><!-- breadcrumb Finish -->

           </div><!-- col-md-12 Finish -->

           <div class="col-md-3"><!-- col-md-3 Begin -->


           </div><!-- col-md-3 Finish -->
           <div class="row">
           <div class="col-md-6">
               <div id="productMain" class="row">
                   <div class="col-sm-6">
                       <div id="mainImage">
                          <center><img class="img-responsive" src="admin/img/<?php echo $pro_img; ?>"></center>
                           </div>
                       </div>
                   </div>
                 </div>

                 <div class="row">
                   <div class="col-md-12"><!-- col-sm-6 Begin -->
                       <div class="box"><!-- box Begin -->
                           <h1 class="text-center"> <?php echo $pro_title; ?> </h1>

                           <?php add_cart(); ?>

                           <form action="details.php?add_cart=<?php echo $product_id; ?>" class="form-horizontal" method="post"><!-- form-horizontal Begin -->
                               <div class="form-group"><!-- form-group Begin -->
                                   <label for="" class="col-md-5 control-label">Products Quantity</label>
                                   <div class="row">
                                   <div class="col-md-7"><!-- col-md-7 Begin -->
                                          <select name="product_qty" id="" class="form-control"><!-- select Begin -->
                                           <option>1</option>
                                           <option>2</option>
                                           <option>3</option>
                                           <option>4</option>
                                           <option>5</option>
                                           </select><!-- select Finish -->

                                    </div><!-- col-md-7 Finish -->
                                  </div>
                               </div><!-- form-group Finish -->


                               <p class="price">$ <?php echo $pro_price; ?></p>

                               <p class="text-center buttons"><button class="btn btn-primary i fa fa-shopping-cart"> Add to cart</button></p>

                           </form><!-- form-horizontal Finish -->

                       </div><!-- box Finish -->

                   </div><!-- col-sm-6 Finish -->


               </div><!-- row Finish -->
                 <div class="col-md-12">
               <div class="box" id="details"><!-- box Begin -->

                       <h4>Product Details</h4>

                   <p>

                       <?php echo $pro_desc; ?>

                   </p>

               </div><!-- box Finish -->

           </div><!-- col-md-9 Finish -->
         </div>
       </div><!-- container Finish -->
   </div><!-- #content Finish -->

</body>
</html>
