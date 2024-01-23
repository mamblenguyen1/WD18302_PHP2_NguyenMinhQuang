<?
    if (isset($_GET['pages'])) {
      switch ($_GET['pages']) {
        case 'login':
          header('location: /client_v2/index.php?pages=home&action=index');
          break;
        case 'signin':
          include './admin/auth/login.admin.php';
          break;
        case 'admin':
          switch ($_GET['action']) {
            case 'Dashboard':
              include './app/View/admin/Pages/Dashboard.php';
              break;
            default:
              include './app/View/admin/Pages/Dashboard.php';
              break;
          }
          break;

        case 'product':
          switch ($_GET['action']) {
            case 'list':
              include './app/View/admin/Pages/Product/ProductList.php';
              break;
            case 'add':
              include './app/View/admin/Pages/Product/ProductAdd.php';
              break;
            case 'edit':
              include './app/View/admin/Pages/Product/ProductEdit.php';
              break;
            case 'detail':
              include './app/View/admin/Pages/Product/ProductDetail.php';
              break;
            default:
              include './admin/resources/product/Product/ProductList.php';
              break;
          }
          break;
        case 'user':
          switch ($_GET['action']) {
            case 'list':
              include './app/View/admin/Pages/User/UserList.php';
              break;
            case 'add':
              include './app/View/admin/Pages/User/UserAdd.php';
              break;
            case 'edit':
              include './app/View/admin/Pages/User/UserEdit.php';
              break;
            case 'detail':
              include './app/View/admin/Pages/User/UserDetail.php';
              break;
            default:
              include './app/View/admin/Pages/User/UserList.php';
              break;
          }
          break;

        case 'category':
          switch ($_GET['action']) {
            case 'list':
              include './admin/resources/category/CategoryList.php';
              break;
            case 'add':
              include './admin/resources/category/CategoryAdd.php';
              break;
            case 'edit':
              include './admin/resources/category/CategoryEdit.php';
              break;
            default:
              include './admin/resources/category/CategoryList.php';
              break;
          }
          break;

        case 'invoice':
          switch ($_GET['action']) {
            case 'list':
              include './app/View/admin/Pages/Invoices/InvoicesList.php';
              break;
            case 'choose':
              include './app/View/admin/Pages/Invoices/ChooseCustormer.php';
              break;
            case 'add':
              include './app/View/admin/Pages/Invoices/InvoicesAdd.php';
              break;
            case 'edit':
              include './app/View/admin/Pages/Invoices/InvoicesEdit.php';
              break;
            case 'detail':
              include './app/View/admin/Pages/Invoices/InvoicesDetail.php';
              break;
            default:
              include './app/View/admin/Pages/Invoices/InvoicesList.php';
              break;
          }
          break;

          // case 'client':
          //   switch ($_GET['action']) {
          //     case 'index':
          //       header('location: ./client/index.php?action=home');
          //       break;
          //     case 'cart':
          //       include("./client/include/cart/CartList.php");
          //       break;
          //   }
          //   break;

          // case 'client_v2':
          //   switch ($_GET['action']) {
          //     case 'index':
          //       header('location: ./client_v2/index.php?action=home');
          //       break;
          //   }
          //   break;
      }
    }else{
      include './app/View/admin/Pages/Dashboard.php';
    }

    ?>