    <?
  
    ?>
    <!-- partial -->

    <!-- partial -->
   
      <!-- content-wrapper ends -->
      <!-- partial:partials/_footer.html -->

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

          case 'order':
            switch ($_GET['action']) {
              case 'list':
                include './admin/resources/order/OrderList.php';
                break;
              case 'edit':
                include './admin/resources/order/OrderEdit.php';
                break;
              case 'detail':
                include './admin/resources/order/OrderDetail.php';
                break;
              default:
                include './admin/resources/order/OrderList.php';
                break;
            }
            break;
          case 'banner':
            switch ($_GET['action']) {
              case 'list':
                include './admin/resources/banner/BannerList.php';
                break;
              case 'add':
                include './admin/resources/banner/BannerAdd.php';
                break;
              case 'detail':
                include './admin/resources/banner/BannerDetail.php';
                break;
              case 'edit':
                include './admin/resources/banner/BannerEdit.php';
                break;
            }
            break;
          case 'posts':
            switch ($_GET['action']) {
              case 'list':
                include './admin/resources/posts/PostList.php';
                break;
              case 'add':
                include './admin/resources/posts/PostAdd.php';
                break;
              case 'edit':
                include './admin/resources/posts/PostEdit.php';
                break;
              case 'detail':
                include './admin/resources/posts/PostDetail.php';
                break;
            }
            break;
          case 'reviews':
            switch ($_GET['action']) {
              case 'list':
                include './admin/resources/reviews/ReviewList.php';
                break;
              case 'add':
                include './admin/resources/reviews/ReviewAdd.php';
                break;
              case 'edit':
                include './admin/resources/reviews/ReviewEdit.php';
                break;
              case 'detail':
                include './admin/resources/reviews/ReviewDetail.php';
                break;
            }
            break;
          case 'client':
            switch ($_GET['action']) {
              case 'index':
                header('location: ./client/index.php?action=home');
                break;
              case 'cart':
                include("./client/include/cart/CartList.php");
                break;
            }
            break;

          case 'client_v2':
            switch ($_GET['action']) {
              case 'index':
                header('location: ./client_v2/index.php?action=home');
                break;
            }
            break;


          case 'contact':
            include './admin/auth/access.guard.php';
            switch ($_GET['action']) {
              case 'list':
                include './admin/resources/contact/ContactList.php';
                break;
            }
            break;

          case 'exception':
            include './admin/auth/code.php';
            break;
        }
      }

      ?>
      </div>
      <!-- <?
      // include 'app/View/admin/include/footer.php';
      ?> -->
      </body>

      </html>