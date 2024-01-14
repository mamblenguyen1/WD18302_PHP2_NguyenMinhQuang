<?
include 'app/View/admin/include/header.php';
include 'app/View/admin/include/sidebar.php';
?>
<div class="main-panel">
    <div class="content-wrapper">

        <div class="card">
            <div class="card-body" style="padding: 20px 20px;">
                <div class="product-info">
                    <div class="info">
                        <h4 class="card-title" style="padding: 0;">Thông tin chi tiết khách hàng
                            : Product 1</h4>
                        <div class="product-name">
                            <span style="font-weight: bold;">Tên tài  khoản</span> <span class="info" style="margin-left: 3%;">nguoidung1</span>
                        </div>
                        <div class="product-name">
                            <span style="font-weight: bold;">Email</span> <span class="info" style="margin-left: 3%;">nd1@gmail.com</span>
                        </div>
                        <div class="product-name">
                            <span style="font-weight: bold;">Số điện thoại</span> <span class="info" style="margin-left: 3%;">0123456789</span>
                        </div>
                        <div class="product-name">
                            <span style="font-weight: bold;">Cấp quyền </span> <span class="info" style="margin-left: 3%;">Admin</span>
                        </div>
                        <div class="product-name">
                            <span style="font-weight: bold;">Người tạo</span> <span class="info" style="margin-left: 3%;">Tui nè</span>
                        </div>
                        <div class="product-name">
                            <span style="font-weight: bold;">Người sửa</span> <span class="info" style="margin-left: 3%;">Tui nè</span>
                        </div>
                        <div class="product-name">
                            <span style="font-weight: bold;">Người xóa </span> <span class="info" style="margin-left: 3%;">Tui nè</span>
                        </div>
                    </div>
                    <!-- <div class="product-img">
                        <img width="300px" height="300px" src="admin/public/images/" alt="">
                    </div> -->
                </div>

            </div>

            <a style="padding: 20px 30px;" href="index.php?pages=user&action=list">
                <button type="submit" name="detail" class="btn btn-primary mr-2">Quay lại</button>
            </a>
        </div>




        <style>
            .product-name span {
                text-align: right;
                width: 150px;
                display: inline-block;
                font-size: 16px;
            }

            .product-name .info {
                text-align: left;
                width: 300px;
                display: inline-block;
            }

            .product-name {
                padding: 5px 40px;
            }

            .product-info {
                position: relative;
            }

            .product-img {
                width: 200px;
                height: 200px;
                position: absolute;
                right: 10%;
                top: 20%;
            }

            .product-img img {
                box-shadow: 0 0 20px grey;

            }
        </style>
                </div>           
        <?
        include 'app/View/admin/include/footer.php';
        ?>
