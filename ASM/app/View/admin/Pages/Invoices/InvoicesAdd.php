<?php


use app\Model\ProductFunction;
use app\Model\UserFunction;
$user = new UserFunction();
$product  = new ProductFunction();
$user_id = $data['Invoice'][0]['id'];

if (isset($_POST['addProduct'])) {
    $product_id = $_POST['product_id'];
    // // $user_name = $_POST['user_name'];
    // // $user_adress = $_POST['user_adress'];
    // // $user_phone = $_POST['user_phone'];
    // // $product_quantity = 1;

    // echo $product_id;
    // // echo $user_name;
    // // echo $user_adress;
    // // echo $product_quantity;
    // // echo $user_phone;
    // exit();
    if (
        $product_id == '' &&
        $user_name == '' &&
        $user_adress == '' &&
        $user_phone == '' &&
        $product_quantity == ''
    ) {
        $invoice->addNewInvoice($user_name, $user_adress, $user_phone, $product_id, $product_quantity);
    }
}
?>
<div class="content-wrapper">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Thêm hóa đơn</h4>
                <div class="overlay" id="overlay" onclick="closePopup()"></div>
                <div class="popup-container" id="popup">
                    <h2>Thêm sản phẩm</h2>
                    <ul class="list">
                        <?
                        $productAll = $product->Get_Product_DB();
                        foreach ($productAll as $product) {
                        ?>
                            <li>
                                <form id="myForm" action="index.php?pages=invoice&action=add&user_id=<?= $user_id ?>" method="post">

                                    <!-- <form id="myForm" action="index.php?pages=invoice&action=add&user_id=<?= $user_id ?>&product_id=<?= $product['product_id'] ?>" method="post">-->
                                    <img src="assets/images/product/<?= $product['product_img'] ?>">
                                    <input type="text" id="product_id" name="product_id" value="<?= $product['product_id'] ?>">
                                    <span><?= $product['product_name'] ?></span>
                                    <span><?= $product['product_price'] ?></span>
                                    <button type="submit" name="addProduct">Thêm</button>
                                </form>
                            </li>
                        <? } ?>
                    </ul>
                    <button onclick="closePopup()">Đóng</button>
                </div>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="exampleInputName1">Tên khách hàng :</label>
                        <input type="text" name="user_name" class="form-control" value="<?= $user->getInfoUser($user_id, 'user_name') ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Địa chỉ :</label>
                        <input type="text" name="user_adress" class="form-control" value="<?= $user->getInfoUser($user_id, 'user_adress') ?>" placeholder="Nhập giá">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword4">Số điện thoại :</label>
                        <input type="text" name="user_phone" class="form-control" value="<?= $user->getInfoUser($user_id, 'user_phone') ?>" placeholder="Nhập số lượng">
                    </div>



                    <div class="product">
                        <ul class="product-list">
                            <li class="product-item" id="product1">
                                <form action="" method="post">
                                    <img src="assets/images/product/CucHoaMi.jpg" alt="Ảnh sản phẩm 1">
                                    <h3>Tên sản phẩm 1</h3>
                                    <input type="hidden" value="<?= $product_id ?>" name="product_id">
                                    <a class="update-button" onclick="giamSoLuong()">-</a>
                                    <input type="number" id="hien-thi-gio-hang" name="qty">
                                    <a class="update-button" onclick="tangSoLuong()">+</a>
                                    <p>Giá: $<span id="price1">50.00</span></p>
                                    <button class="update-button" onclick="updatePrice(1)">Cập nhật giá</button>
                                </form>
                            </li>
                        </ul>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword4">Sản phẩm</label>
                        <button style="display: block; margin: 30px;" type="button" class="btn btn-outline-secondary" onclick="openPopup()" fdprocessedid="dp7omg">
                            <i class="mdi mdi-plus d-block mb-1"></i> Thêm sản phẩm </button>
                    </div>
                    <button type="submit" class="btn btn-gradient-primary me-2">Tạo</button>
                    <a href="index.php?pages=product&action=list">Quay lại</a>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<script>
    let soLuongGioHang = 1;

    function tangSoLuong() {
        soLuongGioHang++;
        capNhatGioHang();
    }

    function giamSoLuong() {
        if (soLuongGioHang > 0) {
            soLuongGioHang--;
            capNhatGioHang();
        }
    }

    function capNhatGioHang() {
        let hienThiGioHang = document.getElementById('hien-thi-gio-hang');
        hienThiGioHang.value = soLuongGioHang;
    }
    document.addEventListener('DOMContentLoaded', function() {
        capNhatGioHang();
    });
</script>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
    }

    .popup-container {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: white;
        padding: 20px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        z-index: 1000;
    }

    .overlay {
        display: none;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 900;
    }

    .btn-outline-secondary {
        cursor: pointer;
    }

    .popup-container ul {
        list-style: none;
        padding: 0;
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        grid-gap: 20px;
    }

    .popup-container li {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: center;
    }

    .popup-container img {
        max-width: 100%;
        max-height: 100%;
        margin-bottom: 10px;
    }

    .popup-container span {
        display: block;
        margin-bottom: 5px;
    }

    .popup-container form {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .popup-container button {
        margin-top: 10px;
    }

    .list {
        max-height: 300px;
        /* Set the max height according to your needs */
        overflow-y: auto;
        /* Enable vertical scrolling */
    }

    /* Style for each list item */
    .list li {
        list-style: none;
        /* Remove default list styles */
        padding: 10px;
        border-bottom: 1px solid #ddd;
        /* Add a border between list items */
    }

    /* Style for the form within each list item */
    .list form {
        display: flex;
        align-items: center;
    }

    /* Additional style for the image (adjust the width and height as needed) */
    .list img {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        /* Make it round */
        margin-right: 10px;
    }

    /* Add styles for other elements (e.g., product name, price, and button) */
    .list span {
        margin-right: 10px;
    }

    .list button {
        padding: 5px 10px;
        background-color: #4CAF50;
        /* Green background color */
        color: white;
        /* White text color */
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .product-list {
        list-style: none;
        padding: 0;
        display: flex;
        justify-content: space-between;
        /* Đảm bảo khoảng cách giữa các sản phẩm */
    }

    .product-item {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: center;
        width: 30%;
        /* Điều chỉnh chiều rộng của mỗi sản phẩm */
    }

    img {
        max-width: 100%;
        max-height: 100px;
    }

    /* Style cho nút cập nhật giá */
    .update-button {
        background-color: #4CAF50;
        color: white;
        border: none;
        padding: 5px 10px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 14px;
        cursor: pointer;
    }
</style>
<script>
    function openPopup() {
        document.getElementById("popup").style.display = "block";
        document.getElementById("overlay").style.display = "block";
    }

    function closePopup() {
        document.getElementById("popup").style.display = "none";
        document.getElementById("overlay").style.display = "none";
    }
</script>
<?
include 'app/View/admin/include/footer.php';
?>