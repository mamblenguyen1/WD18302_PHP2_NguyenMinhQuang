<?

use app\Model\ProductFunction;
use app\Helpers\ProductValidator;

$product = new ProductFunction();
if (isset($_POST['updatepro'])) {
    $data = array();
    $_POST['product_img'] = $_FILES['product_img']['name'];
    $ProductValidator = new ProductValidator($_POST);
    $errors = $ProductValidator->validateAddProduct();
    $data[] = $_POST;
    // var_dump($data);
    // die;
    if ($errors == null) {
        $anhne = $_FILES['product_img']['tmp_name'];
        $error = $_FILES['product_img']['error'];
        $_POST['product_img'] = $_FILES['product_img']['name'];
        // echo $_POST['product_img'];
        // die;
        $path = 'assets/images/product/' . $_POST['product_img'];

        if (
            $error === 0
        ) {
            move_uploaded_file($anhne, $path);
        }
        $data = base64_encode(json_encode($_POST));
        echo '<script>window.location.href="?pages=ProductController/handleUpdate&data=' . $data . '"</script>';
    }
}

?>
<div class="content-wrapper">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Cập nhật sản phẩm</h4>
                <form class="forms-sample" enctype="multipart/form-data" method="POST">
                    <input type="hidden" name="updated_user" value="<?= $_SESSION['user_id'] ?>">

                    <input type="hidden" name="product_id" class="form-control" value="<?= $data['products']['product_id'] ?>">
                    <div class="form-group">
                        <label for="exampleInputName1">Tên sản phẩm :</label>
                        <input type="text" name="product_name" class="form-control" value="<?
                                                                                            if(isset($data['products']['product_name'])){
                                                                                                echo $data['products']['product_name'];
                                                                                            }else{
                                                                                                echo htmlspecialchars($_POST['product_name'] ?? '');
                                                                                            }
                                                                                                
                                                                                            ?>"
                                                                                             placeholder="Nhập tên khách hàng">
                        <span style="color: red;" class="error">
                            <? echo $errors['product_name'] ?? '' ?>
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Giá sản phẩm :</label>
                        <input type="number" name="product_price" class="form-control" value="<?
                                                                                            if(isset($data['products']['product_price'])){
                                                                                                echo $data['products']['product_price'];
                                                                                            }else{
                                                                                                echo htmlspecialchars($_POST['product_price'] ?? '');
                                                                                            }
                                                                                                
                                                                                            ?>" placeholder="Nhập giá">
                        <span style="color: red;" class="error">
                            <? echo $errors['product_price'] ?? '' ?>
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword4">Số lượng nhập :</label>
                        <input type="number" name="product_quantity" class="form-control" value="<?
                                                                                            if(isset($data['products']['product_quantity'])){
                                                                                                echo $data['products']['product_quantity'];
                                                                                            }else{
                                                                                                echo htmlspecialchars($_POST['product_quantity'] ?? '');
                                                                                            }
                                                                                                
                                                                                            ?>" placeholder="Nhập số lượng">
                        <span style="color: red;" class="error">
                            <? echo $errors['product_quantity'] ?? '' ?>
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword4">Mô tả :</label>
                        <input type="text" name="product_description" class="form-control" value="<?
                                                                                            if(isset($data['products']['product_description'])){
                                                                                                echo $data['products']['product_description'];
                                                                                            }else{
                                                                                                echo htmlspecialchars($_POST['product_description'] ?? '');
                                                                                            }
                                                                                                
                                                                                            ?>" placeholder="Nhập mô tả sản phẩm">
                        <span style="color: red;" class="error">
                            <? echo $errors['product_description'] ?? '' ?>
                        </span>
                    </div>

                    <div class="form-group">
                        <label>Ảnh cũ</label>
                        <img class="images" src="assets/images/product/<?  if(isset($data['products']['product_img'])){
                                                                                                echo $data['products']['product_img'];
                                                                                            }else{
                                                                                                echo htmlspecialchars($_POST['product_img'] ?? '');
                                                                                            } ?>" alt="">
                    </div>
                    <div class="form-group">
                        <label for="">Ảnh sản phẩm :</label>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" name="product_img" style="display: none;" id="input1">
                            <input type="text" class="form-control" placeholder="Thêm ảnh cho sản phẩm" disabled id="input1">
                            <label class="input-group-text btn btn-primary" for="input1" id="input1">Upload</label>
                        </div>
                        <span style="color: red;" class="error">
                            <? echo $errors['product_img'] ?? '' ?>
                        </span>
                    </div>
                    <button type="submit" class="btn btn-gradient-primary me-2" name="updatepro">Cập nhật</button>
                    <a href="/?pages=ProductController/list">Quay lại</a>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<style>
    .images {
        box-shadow: 0 0 5px gray;
        width: 200px;
        height: 250px;
        margin: 20px 0;
    }
</style>