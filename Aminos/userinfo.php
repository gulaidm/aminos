<?php
include 'server.php';
include 'navbar.php';
 ?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Aminos - My Account </title>
  <meta name="author" content="Mohamed Gulaid">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>



<div class="col-md-4">
  <?php

    include('sidebar.php');

   ?>

          </div><!-- col-md-3 Finish -->

      <!-- col-md-9 Begin -->

              <div class="box center responsive"><!-- box Begin -->

                  <?php

                  if (isset($_GET['my_orders'])){
                      include("my_orders.php");
                  }

                  ?>

                  <?php

                  if (isset($_GET['edit_account'])){
                      include("edit_account.php");
                  }

                  ?>

                  <?php

                  if (isset($_GET['change_pass'])){
                      include("change_pass.php");
                  }

                  ?>

                  <?php

                  if (isset($_GET['delete_account'])){
                      include("delete_account.php");
                  }

                  ?>

              </div><!-- box Finish -->

          </div><!-- col-md-9 Finish -->

      </div><!-- container Finish -->
  </div><!-- #content Finish -->

</body>

</html>
