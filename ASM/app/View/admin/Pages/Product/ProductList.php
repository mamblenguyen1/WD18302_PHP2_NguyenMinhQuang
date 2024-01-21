<?


use app\Helpers\status;
use app\Model\ProductFunction;

$product = new ProductFunction();

    if(isset($_POST['delete'])){
        $product_id = $_POST['product_id'];
        $product->DeleteProduct($product_id, 1);
    }
    if(isset($_POST['recovery'])){
        $product_id = $_POST['product_id'];
        $product->DeleteProduct($product_id, 0);
    }
?>
<div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card">

        <div class="card">
            <a href="/?pages=ProductController/add">
                <button type="button" class="btn btn-outline-primary" style="width: 200px; margin: 10px 30px;">Thêm sản phẩm</button>
            </a>

            <div class="card-body">

                <h4 class="card-title">Danh sách sản phẩm</h4>
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th> Tên sản phẩm </th>
                            <th> Ảnh sản phẩm </th>
                            <th> Giá </th>
                            <th> Trạng thái </th>
                            <th> Thao tác </th>
                        </tr>
                    </thead>
                    <tbody>
                    <?
                        $productAll = $product->Get_Product_DB();
                        foreach ($productAll as $product) {
                        ?>
                        <tr>
                            <td class="py-1">
                               <?= $product['product_name']?>
                            </td>
                            <td> <img src="assets/images/product/<?= $product['product_img']?>" alt="image" /> </td>
                            <td>
                            <?= $product['product_price']?> $
                            </td>
                            <td>
                                    <? if ($product['is_deleted'] == 0) {
                                        echo '<label class="badge badge-primary">' . status::getShow()[status::SHOW] . '</label>';
                                    } else {
                                        echo '<label class="badge badge-danger">' . status::getShow()[status::HIDDEN] . '</label>';
                                    }
                                    ?>
                                </td>
                            <td>
                                <a href="/?pages=ProductController/details/&id=<?= $product['product_id']?>">
                                    <button type="button" class="btn btn-outline-success btn-icon-text" fdprocessedid="zlcdq9"><i class="mdi mdi-alert btn-icon-prepend"></i> Chi tiết </button>

                                </a>
                                <a href="/?pages=ProductController/edit/&id=<?= $product['product_id']?>">

                                <button type="button" class="btn btn-outline-info btn-icon-text"> Sửa <i class="mdi mdi-settings btn-icon-append"></i></button>
                                </a>

                                <form action="" method="post" style="display: inline-block;">
                                        <input type="hidden" name="product_id" value="<?= $product['product_id'] ?>">
                                        <?
                                        if ($product['is_deleted'] == 0) {
                                            echo ' <form action="" method="post">
                                            <input type="hidden" name="product_id" value="' . $product['product_id'] . '">
                                            <button style="width: 100%" type="submit" class="btn btn-danger" name="delete"> Xóa
                                        </form>';
                                        } else {
                                            echo '<form action="" method="post">
                                            <input type="hidden" name="product_id" value="' . $product['product_id'] . '">
                                            <button style="width: 100% " type="submit" class="btn btn-success" name="recovery"> Khôi phục
                                        </form>';
                                        }
                                        ?>
                                    </form>
                            </td>
                        </tr>

                      <? }?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
