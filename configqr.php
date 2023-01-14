<?php
include("includes/db.php");
include 'plugins/phpqrcode/qrlib.php';

$sql = "SELECT * FROM products";
$result = $con->query($sql);

while ($row = $result -> fetch_assoc()) {
    // Generate QR Code
    $id = $row['product_id'];
    $text = $_SERVER['HTTP_HOST'] . "pdf.php/?recipe_id=$id";
      
    // $path variable store the location where to 
    // store image and $file creates directory name
    // of the QR code file by using 'uniqid'
    // uniqid creates unique id based on microtime
    $path = 'admin_area/product_qr/';
    $filename = uniqid().".png";
    $file = $path . $filename;
      
    // $ecc stores error correction capability('L')
    $ecc = 'L';
    $pixel_Size = 10;
    $frame_Size = 2;
      
    // Generates QR Code and Stores it in directory given
    QRcode::png($text, $file, $ecc, $pixel_Size, $frame_Size);
      
    $stmt = "UPDATE products SET qrcode = '$filename' WHERE product_id = $id";
  
    $result = mysqli_query($con,$stmt);
}

?>