<?php

require 'vendor/autoload.php';

define('SITE_URL', 'userinfo.php');

$paypal = new \paypal\rest\ApiContext(
  new \PayPal\Auth\OAuthTokenCredential(
  'AQH6QDdCB69FJgf-KG8D7VY-V7kiJ8ndGYAAwWe0I7CORcfD4k9LeeIwQMipRBK41XxOVdX3Prch2W5N',
  'EOxNZkDHsGrEyuCQK90PpN2hpkxEohop95J35-xS1ePN80igPqVqOYNidZlfz0sllHSykQ0_ZVWssOzv'


  )

);

 ?>
