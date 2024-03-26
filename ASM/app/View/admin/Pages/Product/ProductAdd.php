<?php

// use app\Responsitories\ProductRespon;

// $ProductRespon = new ProductRespon();
// if (isset($_POST['addProduct'])) {
//     $ProductRespon->AddProductResponse();
// }
use app\Helpers\ProductValidator;


if (isset($_POST['create'])) {
    $data = array();
    $data[] = $_POST;
    $_POST['product_img'] = $_FILES['product_img']['name'];
    $ProductValidator = new ProductValidator($_POST);
    $errors = $ProductValidator->validateAddProduct();
    if ($errors == null) {
        $anhne = $_FILES['product_img']['tmp_name'];
        $error = $_FILES['product_img']['error'];
        $path = 'assets/images/product/' . $_POST['product_img'];

        if (
            $error === 0
        ) {
            move_uploaded_file($anhne, $path);
        }
        $data = base64_encode(json_encode($_POST));
        echo '<script>window.location.href="?pages=ProductController/handleCreate&data=' . $data . '"</script>';
    }
}
?>
<div class="content-wrapper">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Thêm sản phẩm</h4>
                <form class="forms-sample" method="post" action="" enctype="multipart/form-data">
                    <input type="hidden" name="created_user" value="<?= $_SESSION['user_id'] ?>">
                    <div class="form-group">
                        <label for="exampleInputName1">Tên sản phẩm :</label>
                        <input type="text" name="product_name" class="form-control" id="exampleInputName1" value="<? echo htmlspecialchars($_POST['product_name'] ?? '') ?>" placeholder="Nhập tên sản phẩm">
                        <span style="color: red;" class="error">
                            <? echo $errors['product_name'] ?? '' ?>
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Giá sản phẩm :</label>
                        <input type="number" name="product_price" class="form-control" id="exampleInputEmail3" value="<? echo htmlspecialchars($_POST['product_price'] ?? '') ?>" placeholder="Nhập giá">
                        <span style="color: red;" class="error">
                            <? echo $errors['product_price'] ?? '' ?>
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword4">Số lượng nhập :</label>
                        <input type="number" name="product_quantity" class="form-control" id="exampleInputPassword4" value="<? echo htmlspecialchars($_POST['product_quantity'] ?? '') ?>" placeholder="Nhập số lượng">
                        <span style="color: red;" class="error">
                            <? echo $errors['product_quantity'] ?? '' ?>
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword4">Mô tả :</label>
                        <input type="text" name="product_description" class="form-control" id="exampleInputPassword4" value="<? echo htmlspecialchars($_POST['product_description'] ?? '') ?>" placeholder="Nhập mô tả sản phẩm">
                        <span style="color: red;" class="error">
                            <? echo $errors['product_description'] ?? '' ?>
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="">Ảnh sản phẩm :</label>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" name="product_img" style="display: none;" id="input1" value="<? echo htmlspecialchars($_POST['product_img'] ?? '') ?>">
                            <input type="text" class="form-control" placeholder="Thêm ảnh cho sản phẩm" disabled id="input1">
                            <label class="input-group-text btn btn-primary" for="input1" id="input1">Upload</label>
                        </div>
                        <span style="color: red;" class="error">
                            <? echo $errors['product_img'] ?? '' ?>
                        </span>
                    </div>
                    <button type="submit" name="create" class="btn btn-gradient-primary me-2">Submit</button>
                    <a href="/?pages=ProductController/list">Quay lại</a>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>