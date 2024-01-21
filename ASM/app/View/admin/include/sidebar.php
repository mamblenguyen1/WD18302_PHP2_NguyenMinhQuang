<?php

use app\Model\UserFunction;
use app\Helpers\status;
$user = new UserFunction();
?>

<div class="container-fluid page-body-wrapper">
    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar" >
        <ul class="nav">
            <li class="nav-item nav-profile" >
                <a href="#" class="nav-link">
                    <div class="nav-profile-image">
                        <img src="assets/images/user_avatar/user_avatar.jpg" alt="profile">
                        <span class="login-status online"></span>
                        <!--change to offline or busy as needed-->
                    </div>
                    <div class="nav-profile-text d-flex flex-column">
                        <span class="font-weight-bold mb-2">
                            <?= $user->getInfoUser(1 , 'user_name')?>
                        </span>
                        <span class="text-secondary text-small">
                        <?
                                if (1) {
                                    echo status::getRole()[status::ADMIN] ;
                                } else {
                                    echo  status::getRole()[status::USER] ;
                                }
                                ?>
                        </span>
                    </div>
                    <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/?pages=HomeController/home">
                    <span class="menu-title">Bảng điều khiển</span>
                    <i class="mdi mdi-home menu-icon"></i>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/?pages=ProductController/list">
                    <span class="menu-title">Sản phẩm</span>
                    <!-- <i class="mdi mdi-home menu-icon"></i> -->
                    <i class="mdi mdi-cube-outline menu-icon"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/?pages=UserController/list">
                    <span class="menu-title">Khách hàng</span>
                    <!-- <i class="mdi mdi-home menu-icon"></i> -->
                    <i class="mdi mdi-account menu-icon"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/?pages=InvoiceController/list">
                    <span class="menu-title">Hóa Đơn</span>
                    <!-- <i class="mdi mdi-home menu-icon"></i> -->
                    <i class="mdi mdi-script menu-icon"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                    <span class="menu-title">12</span>
                    <i class="menu-arrow"></i>
                    <i class="mdi mdi-crosshairs-gps menu-icon"></i>
                </a>
                <div class="collapse" id="ui-basic">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
                        <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
                    </ul>
                </div>
            </li>
           
            <!-- <li class="nav-item sidebar-actions">
            <span class="nav-link">
              <div class="border-bottom">
                <h6 class="font-weight-normal mb-3">Projects</h6>
              </div>
              <button class="btn btn-block btn-lg btn-gradient-primary mt-4">+ Add a project</button> 
            </span>
          </li> -->
        </ul>
    </nav>
