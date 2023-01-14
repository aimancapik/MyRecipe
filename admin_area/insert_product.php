<?php

if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {

?>
<!DOCTYPE html>

<html>

<head>

<title> Insert Products </title>


<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'#product_desc' });</script>

</head>

<body>

<div class="row"><!-- row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<ol class="breadcrumb"><!-- breadcrumb Starts -->

<li class="active">

<i class="fa fa-dashboard"> </i> Dashboard / Insert Products

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- row Ends -->


<div class="row"><!-- 2 row Starts --> 

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<h3 class="panel-title">

<i class="fa fa-money fa-fw"></i> Insert Products

</h3>

</div><!-- panel-heading Ends -->

<div class="panel-body"><!-- panel-body Starts -->

<form class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Product Title </label>

<div class="col-md-6" >

<input type="text" name="product_title" class="form-control" required >

</div>

</div><!-- form-group Ends -->


<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Product Url </label>

<div class="col-md-6" >

<input type="text" name="product_url" class="form-control" required >

<br>

<p style="font-size:15px; font-weight:bold;">

Product Url Example : product-name-combo

</p>

</div>

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Product Image 1 </label>

<div class="col-md-6" >

<input type="file" name="product_img1" class="form-control" required >

</div>

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Product Price </label>

<div class="col-md-6" >

<input type="text" name="product_price" class="form-control" required >

</div>

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Product Description </label>

<div class="col-md-6" >

<textarea name="product_desc" class="form-control" rows="15" id="product_desc">
</textarea>

</div>

</div><!-- form-group Ends -->


<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" ></label>

<div class="col-md-6" >

<input type="submit" name="submit" value="Insert Product" class="btn btn-primary form-control" >

</div>

</div><!-- form-group Ends -->

</form><!-- form-horizontal Ends -->

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends --> 




</body>

</html>

<?php

if(isset($_POST['submit'])){

$product_title = $_POST['product_title'];
$product_price = $_POST['product_price'];
$product_desc = $_POST['product_desc'];

$product_url = $_POST['product_url'];


$product_img1 = $_FILES['product_img1']['name'];

$temp_name1 = $_FILES['product_img1']['tmp_name'];

move_uploaded_file($temp_name1,"product_images/$product_img1");

$insert_product = "insert into products (date,product_title,product_url,product_img1,product_price,product_desc) values (NOW(),'$product_title','$product_url','$product_img1','$product_price','$product_desc')";

$run_product = mysqli_query($con,$insert_product);

if($run_product){
  $last_id = mysqli_insert_id($con);
  // Generate QR Code

  include '../plugins/phpqrcode/qrlib.php';
  $text = $_SERVER['HTTP_HOST'] . "pdf.php/?recipe_id=$last_id";
    
  // $path variable store the location where to 
  // store image and $file creates directory name
  // of the QR code file by using 'uniqid'
  // uniqid creates unique id based on microtime
  $path = 'product_qr/';
  $filename = uniqid().".png";
  $file = $path . $filename;
    
  // $ecc stores error correction capability('L')
  $ecc = 'L';
  $pixel_Size = 10;
  $frame_Size = 2;
    
  // Generates QR Code and Stores it in directory given
  QRcode::png($text, $file, $ecc, $pixel_Size, $frame_Size);
    
  $stmt = "UPDATE products SET qrcode = '$filename' WHERE product_id = $last_id";

  $result = mysqli_query($con,$stmt);

echo "<script>alert('Product has been inserted successfully')</script>";

echo "<script>window.open('index.php?view_products','_self')</script>";

}

}

?>

<?php } ?>
