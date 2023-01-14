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
<title>Login Maajun Nenda</title>
</head>
<body>

<div class="container">
<form action="checkout.php" method="post" class="login-email"><!--form Starts -->
        <img src="myrecipelogo.png" style="width:250px;height:250px;"/>
            <p class="login-text"  style="font-size: 4rem; font-weight: 600; color:#db8f1c ;">Login</p>
			<div class="input-group">
				<input type="text" placeholder="Email" name="c_email"  required>
			</div>
            <div class="input-group">
				<input type="password" placeholder="Password" name="c_pass" required>
			</div>
            <div class="input-group">
				<button name="login" class="btn">Login</button>
			</div>
            <p class="login-register-text" style="text-align: center;">Don't have an account? <a href="customer_register.php">Register Here</a>.</p>
            <p class="login-register-text" style="text-align: center;">Forget Password? <a href="forgot_pass.php">Click Here</a>.</p>
		</form>
	</div>




<?php

if(isset($_POST['login'])){

$customer_email = $_POST['c_email'];

$customer_pass = $_POST['c_pass'];

$select_customer = "select * from customers where customer_email='$customer_email' AND customer_pass='$customer_pass'";

$run_customer = mysqli_query($con,$select_customer);

$get_ip = getRealUserIp();

$check_customer = mysqli_num_rows($run_customer);

$select_cart = "select * from cart where ip_add='$get_ip'";

$run_cart = mysqli_query($con,$select_cart);

$check_cart = mysqli_num_rows($run_cart);

if($check_customer==0){

echo "<script>alert('password or email is wrong')</script>";

exit();

}

if($check_customer==1 AND $check_cart==0){

$_SESSION['customer_email']=$customer_email;

echo "<script>alert('You are Logged In')</script>";

echo "<script>window.open('my_account.php?my_orders','_self')</script>";

}
else {

$_SESSION['customer_email']=$customer_email;

echo "<script>alert('You are Logged In')</script>";

echo "<script>window.open('index.php','_self')</script>";

} 


}

?>