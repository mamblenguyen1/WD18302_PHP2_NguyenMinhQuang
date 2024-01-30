<?php


use app\Responsitories\LoginRespositoies;

$LoginRespositoies = new LoginRespositoies();

// if (isset($_POST['login'])) {
  // if ($LoginRespositoies->Login()) {
  //   echo '<script>window.location.href="/?pages=UserController/list/"</script>';
  // } else {
  // };
// }

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
              <form class="pt-3" method="post" action="?pages=LoginController/logIn">
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" name="username" placeholder="Tên tài khoản">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" name="userpass" placeholder="Mật khẩu">
                </div>
                <div class="mt-3">
                  <button class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" type="submit" name="login">
                    Đăng nhập
                  </button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <a href="#" class="auth-link text-black">Forgot password?</a>
                </div>
                <div class="text-center mt-4 font-weight-light"> Don't have an account? <a href="register.html" class="text-primary">Create</a>
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