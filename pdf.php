<?php
require_once 'plugins/dompdf/autoload.inc.php';
require_once 'includes/db.php';

//$id = $_GET['recipe_id'];
$id = 1;
$sql = "SELECT * FROM products WHERE product_id = $id";

$result = $con->query($sql);

$data = $result->fetch_assoc();
$step = $data['product_desc'];
$img = $data['product_img1'];
$filename = $data['product_title'] . ".pdf";
$recipe_name = $data['product_title'];


$path = "admin_area/product_images/$img";
$type = pathinfo($path, PATHINFO_EXTENSION);
$image = file_get_contents($path);
$base64 = 'data:image/' . $type . ';base64,' . base64_encode($image);

$logo_path = "pdflogo.png";
$logo_type = pathinfo($logo_path, PATHINFO_EXTENSION);
$logo_image = file_get_contents($logo_path);
$logo_base64 = 'data:image/' . $logo_type . ';base64,' . base64_encode($logo_image);

// reference the Dompdf namespace
use Dompdf\Dompdf;
use Dompdf\Options;

// instantiate and use the dompdf class
$dompdf = new Dompdf();

$html = "<style>
            .logo {
                text-align:center;
            }

            .logo-img {
                width: 45mm;
                height: auto;
            }

            .recipe-img {
                width: 70mm;
                height: auto;
            }

            table {
                margin: 1.5rem;
            }

            td {
                vertical-align: top;
                padding: 5mm;
            }
        </style>
        <div class='logo'>
            <img class='logo-img' src='$logo_base64' >
        </div>
        <table width=100% border='1px solid black'>        
            <tr>
                <td width=40%>
                    <img class='recipe-img' src='$base64' >
                </td>
                <td>
                    <h3>$recipe_name</h3>
                    <h3>Ingredient</h3>
                    <p>$step</p>
                    <h3>Steps Tutorial</h3>
                    <p>$step</p>
                </td>
            <tr>
        </table>
        ";


$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'potrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream($filename, array("Attachment" => false));

?>