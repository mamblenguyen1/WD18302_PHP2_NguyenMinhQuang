    <?php
    require_once 'vendor/autoload.php';

    use app\Core\Route;

    define("ROOT_URL", "http://php2.local/ASM/");

    session_start();


    // if (!isset($_COOKIE['userID'])) {
    //     echo '<script>window.location.href="/?pages=LoginController/logIn"</script>';
    // }
      new Route;

    // use app\Model\ProductFunction;
    // use app\Responsitories\ProductRespon;
    // use app\Model\InvoiceFunction;

    // $ProductRespon = new ProductRespon();
    // $product = new ProductFunction();
    // $invoice = new InvoiceFunction();

    // if (isset($_GET['controller'])) {
    //   $controller = $_GET['controller'];
    // } else {
    //   $controller   = '';
    // }


    // switch ($controller) {
    //   case 'user':
    //     require_once "app/Controller/index.php";
    //     break;
    //   default:
    //     require_once "app/Controller/index.php";
    //     break;
    // }
    ?>