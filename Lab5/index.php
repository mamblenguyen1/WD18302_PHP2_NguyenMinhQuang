<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous
<?php
require_once 'vendor/autoload.php';
define("ROOT_URL", "http://lab5.local/");

use app\Core\Route;


if (!isset($_COOKIE['userID'])) {
    echo '<script>window.location.href="/?pages=LoginController/"</script>';
} 
new Route;






// use app\Model\UserModel;

// $userModel = new UserModel();
// var_dump($userModel->getAll()->select('user_id')->where('user_id' , ' = ' , 5)->get());
// var_dump($userModel->getAllUser());
?>