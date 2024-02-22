<?php

use app\Helpers\UserValidator;


if(isset($_POST['login'])){
    $UserValidator = new UserValidator($_POST);
    $errors = $UserValidator->validateLogin();
    $data[] = $_POST;
    if($errors == null){
        $data = base64_encode(json_encode($_POST));
        echo '<script>window.location.href="?pages=LoginController/HandleLogin&data=' . $data . '"</script>';
    }
}
?>
<link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
<link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
<link rel="stylesheet" href="../../assets/css/style.css">
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
                <img src="../../../../../assets/images//logo.png">
              </div>
              <h6 class="font-weight-light">Xin vui lòng đăng nhập để tiếp tục</h6>
              <form class="pt-3" method="post" action="">
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" name="user_name" value="<? echo htmlspecialchars($_POST['user_name'] ?? '') ?>" placeholder="Tên tài khoản">
                  <span style="color: red;" class="error">
                            <? echo $errors['user_name'] ?? ''?>
                        </span>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" name="user_password" value="<? echo htmlspecialchars($_POST['user_password'] ?? '') ?>" placeholder="Mật khẩu">
                  <span style="color: red;" class="error">
                            <? echo $errors['user_password'] ?? ''?>
                        </span>
                </div>
                <div class="mt-3">
                  <button class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" type="submit" name="login">
                    Đăng nhập
                  </button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <a href="?pages=LoginController/forgot" class="auth-link text-black">Quên mật khẩu ?</a>
                </div>
                <div class="text-center mt-4 font-weight-light"> Bạn chưa có tài khoản? <a href="?pages=LoginController/register" class="text-primary">Đăng ký</a>
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