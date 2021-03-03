<?php

session_start();

//set up variables

$username = "";
$password = "";

$errors = array();

// connection to Database

$db =  mysqli_connect('localhost','root','','aminosdb') or die('conection to database failure');

// register username

if(isset($_POST['signup_btn'])){
$first_name = mysqli_real_escape_string($db, $_POST['first_name']);
$last_name = mysqli_real_escape_string($db, $_POST['last_name']);
$username = mysqli_real_escape_string($db, $_POST['username']);
$email = mysqli_real_escape_string($db, $_POST['email']);
$password = mysqli_real_escape_string($db, $_POST['password']);
$password2 = mysqli_real_escape_string($db, $_POST['password2']);
$c_address = mysqli_real_escape_string($db, $_POST['c_address']);
$c_image = $_FILES['c_image']['name'];
$c_image_tmp = $_FILES['c_image']['tmp_name'];
$c_ip = getUserIp();
move_uploaded_file($c_image_tmp,"customer/img/$c_image");



//validation
if(empty($first_name)) { array_push($errors,"Enter Your First name");}
if(empty($last_name)) {array_push($errors,"Enter Your Last name");}
if(empty($username)) {array_push($errors,"Username is required");}
if(empty($email)) {array_push($errors,"Email is required");}
if(empty($password2)) {array_push($errors,"Enter your password");}
if(empty($c_address)) {array_push($errors,"Enter your address");}

    //confirm password check
if($password != $password2){ array_push($errors,"Password do not match");}

//check existing user/email in Database

$user_check_query = "SELECT * FROM user WHERE username = '$username' or email = '$email' LIMIT 1";

$result = mysqli_query($db, $user_check_query);
$user = mysqli_fetch_assoc($result);

if($user) {
  if($user['username'] === $username){
    array_push($errors, "username taken already");
  }

  if($user['email'] === $email){
  array_push($errors, "email already in use");
  }
}

// register user
if(count($errors) == 0){
  $password = md5($password);
  print $password;
  $query = "INSERT INTO user (first_name, last_name, username, email, password, customer_address, customer_image, customer_ip)
  VALUES ('$first_name', '$last_name', '$username','$email','$password','$c_address','$c_image','$c_ip')";
  mysqli_query($db, $query);
  $_SESSION['username'] = $username;
  $_SESSION['success'] = "You are now logged in";

  header('location: index.php');

}
}

//user login
if(isset($_POST['login_btn'])){

$username = mysqli_real_escape_string($db, $_POST['username']);
$password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)){
    array_push($errors, "Username is required");
  }
  if (empty($password)){
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {


    $password = md5($password);
    $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $results = mysqli_query($db, $query);

    if(mysqli_num_rows($results)){
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "";
      header('location: index.php');
    }
    else{
     array_push($errors, "Wrong Username/password");
    }

  }}

  function getUserIp(){

    switch(true){

      case(!empty($SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
      case(!empty($SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
      case(!empty($SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];

      default : return $_SERVER['REMOTE_ADDR'];

    }

  }


  if(isset($_GET['pro_id'])){

      $product_id = $_GET['pro_id'];

      $get_product = "select * from products where product_id='$product_id'";

      $run_product = mysqli_query($db,$get_product);

      $row_product = mysqli_fetch_array($run_product);

      $p_cat_id = $row_product['p_cat_id'];

      $pro_title = $row_product['product_title'];

      $pro_price = $row_product['product_price'];

      $pro_desc = $row_product['product_desc'];

      $pro_img = $row_product['product_img'];

      $get_p_cat = "select * from product_category where p_cat_id='$p_cat_id'";

      $run_p_cat = mysqli_query($db,$get_p_cat);

      $row_p_cat = mysqli_fetch_array($run_p_cat);

      $p_cat_title = $row_p_cat['cat_title'];

  }





  function add_cart(){


    global $db;

    if(isset($_GET['add_cart'])){

      $ip_add = getUserIp();

      $p_id = $_GET['add_cart'];

      $product_qty = $_POST['product_qty'];

      $check_product = "select * from cart where ip_add='$ip_add' AND p_id='$p_id'";

      $checkitem = mysqli_query($db,$check_product);

      if(mysqli_num_rows($checkitem)>0){

        echo "<script>alert('Item already in bag')</script>";
        echo "<script>window.open('order.php?pro_id=$p_id',''_self')</script>";

      } else{

        $query =  "insert into cart (p_id, ip_add, qty) VALUES ('$p_id','$ip_add','$product_qty')";

        $run_query = mysqli_query($db,$query);
        echo "<script>window.open('order.php?pro_id=$p_id',''_self')</script>";
        header('location: cart.php');
      }


    }

    }

    function getPro(){

        global $db;

        $get_products = "select * from products order by 1 DESC LIMIT 0,8";

        $run_products = mysqli_query($db,$get_products);

        while($row_products=mysqli_fetch_array($run_products)){

            $pro_id = $row_products['product_id'];

            $pro_title = $row_products['product_title'];

            $pro_price = $row_products['product_price'];

            $pro_img1 = $row_products['product_img1'];

            echo "

            <div class='col-md-4 col-sm-6 single'>

                <div class='product'>

                    <a href='details.php?pro_id=$pro_id'>

                        <img class='img-responsive' src='admin_area/product_images/$pro_img1'>

                    </a>

                    <div class='text'>

                        <h3>

                            <a href='details.php?pro_id=$pro_id'>

                                $pro_title

                            </a>

                        </h3>

                        <p class='price'>

                            $ $pro_price

                        </p>

                        <p class='button'>

                            <a class='btn btn-default' href='details.php?pro_id=$pro_id'>

                                View Details

                            </a>

                            <a class='btn btn-primary' href='details.php?pro_id=$pro_id'>

                                <i class='fa fa-shopping-cart'></i> Add to Cart

                            </a>

                        </p>

                    </div>

                </div>

            </div>

            ";

        }

    }

    /// finish getPro functions ///

    /// begin getPCats functions ///

    function getPCats(){

        global $db;

        $get_p_cats = "select * from product_categories";

        $run_p_cats = mysqli_query($db,$get_p_cats);

        while($row_p_cats=mysqli_fetch_array($run_p_cats)){

            $p_cat_id = $row_p_cats['p_cat_id'];

            $p_cat_title = $row_p_cats['p_cat_title'];

            echo "

                <li>

                    <a href='shop.php?p_cat=$p_cat_id'> $p_cat_title </a>

                </li>

            ";

        }

    }

    /// finish getPCats functions ///

    /// begin getCats functions ///

    function getCats(){

        global $db;

        $get_cats = "select * from categories";

        $run_cats = mysqli_query($db,$get_cats);

        while($row_cats=mysqli_fetch_array($run_cats)){

            $cat_id = $row_cats['cat_id'];

            $cat_title = $row_cats['cat_title'];

            echo "

                <li>

                    <a href='shop.php?cat=$cat_id'> $cat_title </a>

                </li>

            ";

        }

    }

    /// finish getCats functions ///

    /// begin getpcatpro functions ///

    function getpcatpro(){

        global $db;

        if(isset($_GET['p_cat'])){

            $p_cat_id = $_GET['p_cat'];

            $get_p_cat ="select * from product_categories where p_cat_id='$p_cat_id'";

            $run_p_cat = mysqli_query($db,$get_p_cat);

            $row_p_cat = mysqli_fetch_array($run_p_cat);

            $p_cat_title = $row_p_cat['p_cat_title'];

            $p_cat_desc = $row_p_cat['p_cat_desc'];

            $get_products ="select * from products where p_cat_id='$p_cat_id'";

            $run_products = mysqli_query($db,$get_products);

            $count = mysqli_num_rows($run_products);

            if($count==0){

                echo "

                    <div class='box'>

                        <h1> No Product Found In This Product Categories </h1>

                    </div>

                ";

            }else{

                echo "

                    <div class='box'>

                        <h1> $p_cat_title </h1>

                        <p> $p_cat_desc </p>

                    </div>

                ";

            }

            while($row_products=mysqli_fetch_array($run_products)){

                $pro_id = $row_products['product_id'];

                $pro_title = $row_products['product_title'];

                $pro_price = $row_products['product_price'];

                $pro_img1 = $row_products['product_img1'];

                echo "

                    <div class='col-md-4 col-sm-6 center-responsive'>

                <div class='product'>

                    <a href='details.php?pro_id=$pro_id'>

                        <img class='img-responsive' src='admin_area/product_images/$pro_img1'>

                    </a>

                    <div class='text'>

                        <h3>

                            <a href='details.php?pro_id=$pro_id'>

                                $pro_title

                            </a>

                        </h3>

                        <p class='price'>

                            $ $pro_price

                        </p>

                        <p class='button'>

                            <a class='btn btn-default' href='details.php?pro_id=$pro_id'>

                                View Details

                            </a>

                            <a class='btn btn-primary' href='details.php?pro_id=$pro_id'>

                                <i class='fa fa-shopping-cart'></i> Add to Cart

                            </a>

                        </p>

                    </div>

                </div>

            </div>

                ";

            }

        }

    }

    /// finish getpcatpro functions ///

    /// begin getcatpro functions ///

    function getcatpro(){

        global $db;

        if(isset($_GET['cat'])){

            $cat_id = $_GET['cat'];

            $get_cat = "select * from categories where cat_id='$cat_id'";

            $run_cat = mysqli_query($db,$get_cat);

            $row_cat = mysqli_fetch_array($run_cat);

            $cat_title = $row_cat['cat_title'];

            $cat_desc = $row_cat['cat_desc'];

            $get_cat = "select * from products where cat_id='$cat_id' LIMIT 0,6";

            $run_products = mysqli_query($db,$get_cat);

            $count = mysqli_num_rows($run_products);

            if($count==0){


                echo "

                    <div class='box'>

                        <h1> No Product Found In This Category </h1>

                    </div>

                ";

            }else{

                echo "

                    <div class='box'>

                        <h1> $cat_title </h1>

                        <p> $cat_desc </p>

                    </div>

                ";

            }

            while($row_products=mysqli_fetch_array($run_products)){

                $pro_id = $row_products['product_id'];

                $pro_title = $row_products['product_title'];

                $pro_price = $row_products['product_price'];

                $pro_desc = $row_products['product_desc'];

                $pro_img1 = $row_products['product_img1'];

                echo "

                    <div class='col-md-4 col-sm-6 center-responsive'>

                        <div class='product'>

                            <a href='details.php?pro_id=$pro_id'>

                                <img class='img-responsive' src='admin_area/product_images/$pro_img1'>

                            </a>

                            <div class='text'>

                                <h3>

                                    <a href='details.php?pro_id=$pro_id'> $pro_title </a>

                                </h3>

                            <p class='price'>

                                $$pro_price

                            </p>

                                <p class='buttons'>

                                    <a class='btn btn-default' href='details.php?pro_id=$pro_id'>

                                    View Details

                                    </a>

                                    <a class='btn btn-primary' href='details.php?pro_id=$pro_id'>

                                    <i class='fa fa-shopping-cart'></i> Add To Cart

                                    </a>

                                </p>

                            </div>

                        </div>

                    </div>

                ";

            }

        }

    }






 ?>
