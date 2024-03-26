<?php

use app\Model\ProductFunction;
use app\Model\UserFunction;
use app\Responsitories\InvoicesRespon;
use app\Model\InvoiceFunction;


$InvoiceFunction = new InvoiceFunction();
$InvoicesRespon = new InvoicesRespon();
$user = new UserFunction();
$product  = new ProductFunction();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

if (isset($_POST['addInfo'])) {
    $id =  $InvoicesRespon->AddInvoices();
    echo '<script> window.location.href="/?pages=InvoiceController/addProduct/&id=' . $id . '"</script>';
}

if (isset($_POST['addProduct'])) {
    $product_id = $_POST['product_id'];
    $InvoiceId = $_POST['InvoiceId'];
    $InvoicesRespon->AddInvoicesDetails($InvoiceId);
}
if (isset($_POST['pay'])) {
    $InvoicesRespon->UpdateInvoicesDetails($id);
}

if(isset($_POST['remove'])) {
        $Invoice_detail_id = $_POST['Invoice_detail_id'];
        $InvoicesRespon->RemoveInvoicesDetails($Invoice_detail_id);
}
?>
<div class="content-wrapper">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h2 style="text-align: center; margin: 30px auto; box-shadow: 0 0 5px gray; padding: 20px 30px;">Danh sách trong hóa đơn</h2>

                <form action="" method="post">
                    <div class="products-container">

                        <?php
                        $InvoiceDetails = $InvoiceFunction->Get_Invoice_Details($id);
                        foreach ($InvoiceDetails as $index => $InvoiceDetail) {
                        ?>
                            <div class="product" id="product<?= $index ?>">
                                <input type="hidden" name="Invoice_detail_id" id="" value="<?= $InvoiceDetail['Invoice_detail_id']?>">
                                <input type="hidden" name="product_id<?= $index ?>" id="" value="<?= $InvoiceDetail['product_id']?>">

                                <div class="img" style="max-width: 100%; width: 100%; height: 100px;">
                                <img style="width: 100px; height: 80px; margin: 0 auto;" src="assets/images/product/<?= $InvoiceDetail['product_img'] ?>" alt="Product 1">

                                </div>
                                <div class="product-info">
                                    <p><?= $InvoiceDetail['product_name'] ?></p>
                                    <p data-unit-price="<?= $InvoiceDetail['product_price'] ?>" id="price<?= $index ?>">Tổng: <?= $InvoiceDetail['product_price'] ?> VNĐ</p>
                                </div>
                                <div class="quantity">
                                    <span class="quantity-control" onclick="decreaseQuantity(<?= $index ?>)">-</span>
                                    <input type="text" name="quantity<?= $index ?>" id="quantity<?= $index ?>" value="<?= $InvoiceDetail['product_quantity'] ?>" oninput="updateTotalPrice(<?= $index ?>)">
                                    <span class="quantity-control" onclick="increaseQuantity(<?= $index ?>)">+</span>
                                </div>
                                <button type="submit" name="remove" class="btn btn-outline-secondary btn-rounded btn-icon  close">
                                    <i class="mdi mdi-close text-primary"></i>
                                </button>
                            </div>
                        <?php }
                        ?>
                        <div id="totalPriceContainer">Tổng tiền : </div>
                    </div>
                    <button type="submit" name="pay" class="btn btn-outline-primary" style="display: block; width: 700px; margin: 40px auto; margin-top: 60px;">Xác nhận</button>

                    <script>
                        updateTotalPriceForAllProducts();

                        function decreaseQuantity(index) {
                            var quantityInput = document.getElementById('quantity' + index);
                            var currentQuantity = parseInt(quantityInput.value);
                            if (currentQuantity > 1) {
                                quantityInput.value = currentQuantity - 1;
                                updateTotalPrice(index);
                                updateTotalPriceForAllProducts();
                            }
                        }

                        function increaseQuantity(index) {
                            var quantityInput = document.getElementById('quantity' + index);
                            var currentQuantity = parseInt(quantityInput.value);
                            quantityInput.value = currentQuantity + 1;
                            updateTotalPrice(index);
                            updateTotalPriceForAllProducts();
                        }

                        function updateTotalPrice(index) {
                            var quantityInput = document.getElementById('quantity' + index);
                            var priceElement = document.getElementById('price' + index);
                            var unitPrice = parseFloat(priceElement.getAttribute('data-unit-price'));
                            var quantity = parseInt(quantityInput.value);
                            var totalPrice = unitPrice * quantity;
                            priceElement.textContent = 'Price: ' + totalPrice + ' VNĐ';
                            updateTotalPriceForAllProducts();
                        }

                        function updateTotalPriceForAllProducts() {
                            var total = 0;

                            // Loop through all products and accumulate total price
                            <?php foreach ($InvoiceDetails as $index => $InvoiceDetail) { ?>
                                var quantityInput = document.getElementById('quantity<?= $index ?>');
                                var priceElement = document.getElementById('price<?= $index ?>');
                                var unitPrice = parseFloat(priceElement.getAttribute('data-unit-price'));
                                var quantity = parseInt(quantityInput.value);
                                total += unitPrice * quantity;
                            <?php } ?>

                            // Render the total price in the specified div
                            var totalPriceContainer = document.getElementById('totalPriceContainer');
                            totalPriceContainer.textContent = 'Tổng tiền : ' + total + ' VNĐ';
                        }
                    </script>
                </form>
            </div>

        </div>
    </div>
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <h2 style="text-align: center;width: 600px; margin: 30px auto; box-shadow: 0 0 5px gray; padding: 60px 30px;">Thêm sản phẩm</h2>
                <button id="toggleButton">Thu gọn</button>
                <ul class="list">
                    <?
                    $productAll = $product->Get_Product_DB();
                    foreach ($productAll as $product) {
                    ?>
                        <li>
                            <form id="myForm" action="" method="post">
                                <input type="hidden" name="InvoiceId" value="<?= $id ?>">
                                <img style="width: 60px; height: 60px;" src="assets/images/product/<?= $product['product_img'] ?>">
                                <input type="hidden" id="product_id" name="product_id" value="<?= $product['product_id'] ?>">
                                <span>Tên : <?= $product['product_name'] ?></span>
                                <span>Giá : <?= $product['product_price'] ?></span>
                                <span>SL : <?= $product['product_quantity'] ?></span>

                                <button type="submit" name="addProduct">Thêm</button>
                            </form>
                        </li>
                    <? } ?>
                </ul>
            </div>
            <style>
                #totalPriceContainer {
                    position: absolute;
                    bottom: 130px;
                    right: 30px;
                    font-size: 25px;
                    color: green;
                    font-weight: bold;
                }

                .products-container {
                    display: grid;
                    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
                    gap: 20px;
                }

                .product {
                    position: relative;
                    border: 1px solid #ddd;
                    padding: 10px;
                    text-align: center;
                }

                .close {
                    position: absolute;
                    top: 10px;
                    right: 5px;
                }

                .product img {
                    max-width: 100%;
                    height: auto;
                }

                .product-info p {
                    margin: 5px 0;
                }

                .quantity {
                    display: flex;
                    align-items: center;
                    justify-content: space-between;
                    margin-top: 10px;
                }

                .quantity-control {
                    cursor: pointer;
                    background-color: #007bff;
                    color: #fff;
                    padding: 5px 10px;
                    border-radius: 5px;
                }

                .quantity-control:hover {
                    background-color: #0056b3;
                }

                .quantity input {
                    width: 40px;
                    text-align: center;
                    border: 1px solid #ddd;
                    border-radius: 5px;
                    margin: 0 5px;
                }

                #toggleButton {
                    background-color: #3498db;
                    color: #fff;
                    font-size: 16px;
                    padding: 10px 20px;
                    border: none;
                    cursor: pointer;
                    border-radius: 5px;
                    transition: background-color 0.3s;
                }

                #toggleButton:hover {
                    background-color: #2980b9;
                }
            </style>










        </div>
    </div>
</div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const list = document.querySelector('.list');
        const toggleButton = document.getElementById('toggleButton');

        toggleButton.addEventListener('click', function() {
            list.classList.toggle('hidden');
        });
    });
</script>
<style>
    .list {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .list li {
        border: 1px solid #ccc;
        padding: 10px;
        text-align: center;
    }

    .list img {
        max-width: 100%;
        height: auto;
        margin-bottom: 10px;
    }

    .list span {
        display: block;
        margin-bottom: 5px;
    }

    .list button {
        background-color: #4CAF50;
        color: white;
        border: none;
        padding: 8px 16px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 14px;
        margin-top: 5px;
        cursor: pointer;
    }

    .list.hidden {
        display: none;
    }
</style>