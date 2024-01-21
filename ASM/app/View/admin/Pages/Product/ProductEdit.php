<?
include 'app/View/admin/include/header.php';
include 'app/View/admin/include/sidebar.php';
?>
<?
if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    if (isset($_POST['editProduct'])) {
      $ProductRespon->UpdateUserResponse($product_id);  
    }
}
?>
<div class="content-wrapper">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Cập nhật sản phẩm</h4>
                <form class="forms-sample" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputName1">Tên sản phẩm :</label>
                        <input type="text" name="product_name" class="form-control" value="<?= $product->getInfoProduct($product_id , 'product_name')?>" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Giá sản phẩm :</label>
                        <input type="number" name="product_price" class="form-control" id="exampleInputEmail3" value="<?= $product->getInfoProduct($product_id , 'product_price')?>" placeholder="Nhập giá">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword4">Số lượng nhập :</label>
                        <input type="number" name="product_quantity" class="form-control" id="exampleInputPassword4" value="<?= $product->getInfoProduct($product_id , 'product_quantity')?>" placeholder="Nhập số lượng">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword4">Mô tả :</label>
                        <input type="text" name="product_description" class="form-control" id="exampleInputPassword4" value="<?= $product->getInfoProduct($product_id , 'product_description')?>" placeholder="Nhập mô tả sản phẩm">
                    </div>

                    <div class="form-group">
                        <label>Ảnh cũ</label>
                        <img class="images" src="assets/images/product/<?= $product->getInfoProduct($product_id , 'product_img')?>" alt="">
                    </div>
                    <div class="form-group">
                    <label for="">Ảnh sản phẩm :</label>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" name="product_img" style="display: none;" id="input1" >
                            <input type="text" class="form-control" placeholder="Thêm ảnh cho sản phẩm" disabled id="input1">
                            <label class="input-group-text btn btn-primary" for="input1" id="input1">Upload</label>
                        </div>
                      </div>
                    <button type="submit" name="editProduct" class="btn btn-gradient-primary me-2">Submit</button>
                    <a href="index.php?pages=product&action=list">Quay lại</a>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<?
include 'app/View/admin/include/footer.php';
?>
<style>
    .images {
        box-shadow: 0 0 5px gray;
        width: 200px;
        height: 250px;
        margin: 20px 0;
    }
</style>