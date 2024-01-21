    <?php
    require_once 'vendor/autoload.php';

    use app\Model\UserFunction;
    use app\Model\ProductFunction;
    use app\Responsitories\UserRespon;
    use app\Responsitories\ProductRespon;
    use app\Model\InvoiceFunction;
    $userRespon = new UserRespon();
    $ProductRespon = new ProductRespon();
    $user = new UserFunction();
    $product = new ProductFunction();
    $invoice = new InvoiceFunction();

    if (isset($_GET['controller'])) {
      $controller = $_GET['controller'];
    } else {
      $controller   = '';
    }


    switch ($controller) {
      case 'user':
        require_once "app/Controller/index.php";
        break;
      default:
        require_once "app/Controller/index.php";
        break;
    }
    ?>




    </div>
    </body>

    </html>