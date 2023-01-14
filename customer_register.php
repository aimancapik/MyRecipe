<?php

session_start();

include("includes/db.php");
include("functions/functions.php");


?>
<!DOCTYPE html>
<html>
<head>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="login_register.css">

	<style>
	img {
  display: block;
  margin-left: auto;
  margin-right: auto;
  }
</style>

	<title>Register Maajun Nenda</title>
</head>
<body>

<div class="container">
    <form action="customer_register.php" method="post" class="login-email" enctype="multipart/form-data" ><!-- form Starts -->
    <img src="myrecipelogo.png" style="width:250px;height:250px;"/>
                <p class="login-text"  style="font-size: 4rem; font-weight: 600; color:#db8f1c ;">Register</p>
          <div class="input-group">
            <input type="text" placeholder="Name" name="c_name" required>
          </div>

    <div class="input-group"><!-- form-group Starts -->

      <input type="text" placeholder="Email"  name="c_email" required>

    </div>

    <div class="input-group"><!-- form-group Starts -->

    <input type="password" placeholder="Password" id="pass" name="c_pass" required>
    </div>
    <div class="input-group"><!-- form-group Starts -->
    <input type="text" placeholder="Customer Contact" name="c_contact" required>
    </div><!-- form-group Ends -->
    <div class="input-group"><!-- form-group Starts -->
    <input type="text" placeholder="Customer Address" name="c_address" required>
    </div><!-- form-group Ends -->
    <div class="input-group"><!-- form-group Starts -->
    <label for="c_image" >&nbsp &nbsp &nbsp Select a image for profile picture</label>
    <input type="file" placeholder="Customer Image" name="c_image" required>
    </div><!-- form-group Ends -->
    <p>&nbsp &nbsp &nbsp </p>
    <div class="input-group">
            <button type="submit" name="register" class="btn" >Register</button>
    </div>
          <p class="login-register-text" style="text-align: center;">Have an account? <a href="customer_login.php">Login Here</a>.</p>
    </form>
</html>


<script src="js/jquery.min.js"> </script>

<script src="js/bootstrap.min.js"></script>

</body>

</html>
<?php

if(isset($_POST['register'])){

// $secret = "6LcHnoQaAAAAAF3_pqQ55sZMDgaWCGcXq4ucLgkH";

// $response = $_POST['g-recaptcha-response'];

$remoteip = $_SERVER['REMOTE_ADDR'];

// $url = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$remoteip");

// $result = json_decode($url, TRUE);

$c_name = $_POST['c_name'];

$c_email = $_POST['c_email'];

$c_pass = $_POST['c_pass'];

$c_contact = $_POST['c_contact'];

$c_address = $_POST['c_address'];

$c_image = $_FILES['c_image']['name'];

$c_image_tmp = $_FILES['c_image']['tmp_name'];

$c_ip = getRealUserIp();

move_uploaded_file($c_image_tmp,"customer/customer_images/$c_image");

$get_email = "select * from customers where customer_email='$c_email'";

$run_email = mysqli_query($con,$get_email);

$check_email = mysqli_num_rows($run_email);

  if($check_email == 1){

  echo "<script>alert('This email is already registered, try another one')</script>";

  exit();
  }

  $customer_confirm_code = mt_rand();

  $subject = "Email Confirmation Message";

  $from = "sad.ahmed22224@gmail.com";

  $message = "

  <h2>
  Email Confirmation By Computerfever.com $c_name
  </h2>

  <a href='localhost/maajundatabase/customer/my_account.php?$customer_confirm_code'>

  Click Here To Confirm Email

  </a>

  ";

  $headers = "From: $from \r\n";

  $headers .= "Content-type: text/html\r\n";

  mail($c_email,$subject,$message,$headers);

  $insert_customer = "insert into customers (customer_name,customer_email,customer_pass,customer_contact,customer_address,customer_image,customer_ip,customer_confirm_code) values ('$c_name','$c_email','$c_pass','$c_contact','$c_address','$c_image','$c_ip','$customer_confirm_code')";


  $run_customer = mysqli_query($con,$insert_customer);

  $sel_cart = "select * from cart where ip_add='$c_ip'";

  $run_cart = mysqli_query($con,$sel_cart);

  $check_cart = mysqli_num_rows($run_cart);

      if($check_cart>0){

      $_SESSION['customer_email']=$c_email;

      echo "<script>alert('You have been Registered Successfully')</script>";

      echo "<script>window.open('checkout.php','_self')</script>";

      }else{

      $_SESSION['customer_email']=$c_email;

      echo "<script>alert('You have been Registered Successfully')</script>";

      echo "<script>window.open('index.php','_self')</script>";


}
}


?>
