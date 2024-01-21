
<?php

use app\Helpers\status;
use app\Model\ProductFunction;
use app\Model\UserFunction;
$user = new UserFunction();

$product = new ProductFunction();

$product_id = $data['product'][0]['id'];
echo $product_id;  

?>
<div class="main-panel">
    <div class="content-wrapper">

        <div class="card">
            <div class="card-body" style="padding: 20px 20px;">
                <div class="product-info">
                    <div class="info">
                        <h4 class="card-title" style="padding: 0;">Thông tin chi tiết sản phẩm
                            : <?= $product->getInfoProduct($product_id , 'product_name')?></h4>
                        <div class="product-name">
                            <span style="font-weight: bold;">Tên sản phẩm</span> <span class="info" style="margin-left: 3%;"><?= $product->getInfoProduct($product_id , 'product_name')?></span>
                        </div>
                        <div class="product-name">
                            <span style="font-weight: bold;">Giá sản phẩm</span> <span class="info" style="margin-left: 3%;"><?= $product->getInfoProduct($product_id , 'product_price')?> VNĐ</span>
                        </div>
                        <!-- <div class="product-name">
                            <span style="font-weight: bold;">Phần trăm giảm giá</span> <span class="info" style="margin-left: 3%;">20 %</span>
                        </div> -->
                        <div class="product-name">
                            <span style="font-weight: bold;">Số lượng </span> <span class="info" style="margin-left: 3%;"><?= $product->getInfoProduct($product_id , 'product_quantity')?></span>
                        </div>
                        <div class="product-name">
                            <span style="font-weight: bold ;vertical-align: top;">Mô tả sản phẩm </span> <span class="info" style="margin-left: 3%;"><?= $product->getInfoProduct($product_id , 'product_description')?></span>
                        </div>
                        <div class="product-name">
                            <span style="font-weight: bold;">Người tạo</span> <span class="info" style="margin-left: 3%;"><?  $user_created = $product->getInfoProduct($product_id, 'created_user');
                                                                                                                            if ($user_created > 0) {
                                                                                                                                echo $user->getInfoUser($user_created, 'user_name');
                                                                                                                            } else {
                                                                                                                                echo '';
                                                                                                                            } ?></span>
                        </div>
                        <div class="product-name">
                            <span style="font-weight: bold;">Người sửa</span> <span class="info" style="margin-left: 3%;"><?  $user_created = $product->getInfoProduct($product_id, 'updated_user');
                                                                                                                            if ($user_created > 0) {
                                                                                                                                echo $user->getInfoUser($user_created, 'user_name');
                                                                                                                            } else {
                                                                                                                                echo '';
                                                                                                                            } ?></span>
                        </div>
                        <div class="product-name">
                            <span style="font-weight: bold;">Người xóa </span> <span class="info" style="margin-left: 3%;"><?  $user_created = $product->getInfoProduct($product_id, 'deleted_user');
                                                                                                                            if ($user_created > 0) {
                                                                                                                                echo $user->getInfoUser($user_created, 'user_name');
                                                                                                                            } else {
                                                                                                                                echo '';
                                                                                                                            } ?></span>
                        </div>
                    </div>
                    <div class="product-img">
                        <img width="200px" height="200px" src="assets/images/product/<?= $product->getInfoProduct($product_id , 'product_img')?>" alt="">
                    </div>
                </div>

            </div>

            <a style="padding: 20px 30px;" href="/?pages=ProductController/list">
                <button type="submit" name="detail" class="btn btn-primary mr-2">Quay lại</button>
            </a>
        </div>
        </div>

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
       