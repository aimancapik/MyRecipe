<?php
session_start();
include("includes/db.php");
include("functions/functions.php");



?>
<?php

if(!isset($_SESSION['customer_email'])){

include("customer_login.php");


}else{
    
    include("includes/main.php");
include("payment_options.php");

}



?>


<script src="js/jquery.min.js"> </script>

<script src="js/bootstrap.min.js"></script>