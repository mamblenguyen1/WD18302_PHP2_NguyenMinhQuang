<?


use app\Helpers\UserValidator;
if(isset($_POST['register'])){
  $UserValidator = new UserValidator($_POST);
  $errors = $UserValidator->validateRegister();
  $data[] = $_POST;
  if($errors == null){
      $data = base64_encode(json_encode($_POST));
      echo '<script>window.location.href="?pages=LoginController/HandleRegister&data=' . $data . '"</script>';
  }
}
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Purple Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../assets/images/favicon.ico" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                  <img src="../../assets/images/logo.svg">
                </div>
                <form class="pt-3" method="POST" action="">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" id="exampleInputUsername1" value="<? echo htmlspecialchars($_POST['user_name'] ?? '') ?>" placeholder="Tên đăng nhập" name="user_name">
                    <span style="color: red;" class="error">
                            <? echo $errors['user_name'] ?? ''?>
                        </span>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" id="exampleInputEmail1" value="<? echo htmlspecialchars($_POST['user_email'] ?? '') ?>" placeholder="Email" name="user_email">
                    <span style="color: red;" class="error">
                            <? echo $errors['user_email'] ?? ''?>
                        </span>
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg" id="exampleInputEmail1" value="<? echo htmlspecialchars($_POST['user_password'] ?? '') ?>" placeholder="Mật khẩu" name="user_password">
                    <span style="color: red;" class="error">
                            <? echo $errors['user_password'] ?? ''?>
                        </span>
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" value="<? echo htmlspecialchars($_POST['confirmPass'] ?? '') ?>" placeholder="Nhập lại mật khẩu" name="confirmPass">
                    <span style="color: red;" class="error">
                            <? echo $errors['confirmPass'] ?? ''?>
                        </span>
                  </div>
                  <button class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" type="submit" name="register"> Đăng ký</button>
                  <div class="text-center mt-4 font-weight-light"> Bạn đã có tài khoản? <a href="?pages=LoginController/logIn" class="text-primary">Đăng nhập</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
  </body>
</html>