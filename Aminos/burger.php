<?php
include 'server.php';
include 'navbar.php';
 ?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Aminos - Burgers </title>
  <meta name="author" content="Mohamed Gulaid">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

  <div id="content"> <!--content start-->
  <div class="container"><!--container start-->
    <div class="col-md-12">
      <ul class="breadcrumb">
        <li>
            <a href="order.php">Menu</a>
        </li>
        <li>
            Burgers
        </li>
      </ul>
    </div>
    <div class="col-md-9">
      <div class="box">
        <h1>Burgers</h1>
        <p>
          Our delicious burgers are cooked to perfection, served with fries and a drink.
        </p>
      </div>

      <div class="row"><!-- row Begin -->

                        <?php
                                $get_products = "select * from products WHERE p_cat_id = 1";
                                $result = mysqli_query($db,$get_products);

                                    while($row_products=mysqli_fetch_array($result)){

                                    $pro_id = $row_products['product_id'];

                                    $pro_title = $row_products['product_title'];

                                    $pro_price = $row_products['product_price'];

                                    $pro_img1 = $row_products['product_img'];

                                    echo "


                                        <div class='col-md-4 col-sm-6 center-responsive'>

                                            <div class='items'>

                                                <a href='details.php?pro_id=$pro_id'>

                                                    <img class='img-responsive' src='admin/img/$pro_img1'>

                                                </a>

                                                <div class='text'>

                                                    <h3>

                                                        <a href='details.php?pro_id=$pro_id'>

                                                         $pro_title

                                                        </a>


                                                    </h3>

                                                    <p class='price'>

                                                        £ $pro_price

                                                    </p>

                                                    <p class='buttons'>

                                                        <a class='btn btn-default' href='details.php?pro_id=$pro_id'>

                                                            View Details

                                                        </a>

                                                        <a class='btn btn-primary' href='details.php?pro_id=$pro_id'>

                                                            <i class='fa fa-shopping-cart'></i> Add To Cart

                                                        </a>

                                                    </p>
                                                    </form>
                                                </div>

                                            </div>

                                        </div>

                                    ";

                            }

                       ?>

                   </div>

    </div>

  </div><!--container end-->
</div><!--content end-->

</body>

</html>
