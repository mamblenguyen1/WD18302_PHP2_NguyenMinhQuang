<link rel="stylesheet" href="public/Assets/css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<?php
require_once 'vendor/autoload.php';


use src\Controller\BaseController;
use src\Model\BaseModel;
use src\core\Route;
use src\Model\UserFunction;
use src\Responsitories\UserRespon;

$route = new Route();
$controller = new BaseController();
$model = new BaseModel();
$user = new UserFunction();
$UserRespon = new UserRespon();
require_once '../Lab2/src/View/user_view.php';



?>
<script src="public/Assets/js/script.js"></script>