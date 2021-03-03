

<div class="row">
<div class="box1"><!--  panel panel-default sidebar-menu Begin  -->

    <div class="panel-heading"><!--  panel-heading  Begin  -->

        <?php

        $customer_session = $_SESSION['username'];

        $get_customer = "select * from user where username='$customer_session'";

        $run_customer = mysqli_query($db, $get_customer);

        $row_customer = mysqli_fetch_array($run_customer);

        $customer_image = $row_customer['customer_image'];

        $customer_name = $row_customer['first_name'];

        if (!isset($_SESSION['username'])) {

        }else {
          echo "

          <center>


          <img src='customer/img/$customer_image' class='img-responsive'>


          </center>
          <br />

          <h3 align='center' class='panel'>


          <h3 class='caption'>

          $customer_name

          </h3>


          </h3><!--  panel-title  Finish -->


          ";
        }

         ?>



    </div><!--  panel-heading Finish  -->
    <div class="panel center responsive"><!--  panel-body Begin  -->

        <ul>

            <li class="<?php if(isset($_GET['my_orders'])){ echo "active"; } ?>">

                <a href="userinfo.php?my_orders">

                    <i class="fa fa-list"></i> My Orders

                </a>

            </li>

            <li class="<?php if(isset($_GET['edit_account'])){ echo "active"; } ?>">

                <a href="userinfo.php?edit_account">

                    <i class="fa fa-pencil"></i> Edit Account

                </a>

            </li>

            <li class="<?php if(isset($_GET['change_pass'])){ echo "active"; } ?>">

                <a href="userinfo.php?change_pass">

                    <i class="fa fa-user"></i> Change Password

                </a>

            </li>

            <li class="<?php if(isset($_GET['delete_account'])){ echo "active"; } ?>">

                <a href="userinfo.php?delete_account">

                    <i class="fa fa-trash-o"></i> Delete Account

                </a>

            </li>

            <li>

                <a href="logout.php">

                    <i class="fa fa-sign-out"></i> Log Out

                </a>

            </li>

        </ul><!--  nav-pills nav-stacked nav Begin  -->
      </div>
    </div>
  </div>
    </div><!--  panel-body Finish  -->

</div><!--  panel panel-default sidebar-menu Finish  -->
