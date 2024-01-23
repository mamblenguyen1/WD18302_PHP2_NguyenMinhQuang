<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous
<?php
require_once 'vendor/autoload.php';

use app\Model\ProductFunction;
use app\Responsitories\ProductRespon;
use app\Model\InvoiceFunction;

$ProductRespon = new ProductRespon();
$product = new ProductFunction();
$invoice = new InvoiceFunction();
define("ROOT_URL", "http://lab4.local/");

use app\Core\Route;

new Route;

?>