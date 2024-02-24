<?

use app\Model\InvoiceModel;
use app\Helpers\InvoiceValidator;

if (isset($_POST['editInvoice'])) {
    $InvoiceValidator = new InvoiceValidator($_POST);
    $errors = $InvoiceValidator->validateEditInvoice();
    $data[] = $_POST;
    // var_dump($data);
    // die;
    if ($errors == null) {
        $data = base64_encode(json_encode($_POST));
        echo '<script>window.location.href="?pages=InvoiceController/editProduct&data=' . $data . '"</script>';
    }
}
?>
<div class="content-wrapper">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Cập nhật hóa đơn</h4>
                <div class="popup-container" id="popup">
                    <!-- <form action="/?pages=InvoiceController/editProduct/
                " method="post"> -->

                    <form action="" method="post">
                        <input type="hidden" name="Invoice_id" value="<?= $data['user']['Invoice_id'] ?>">
                        <div class="form-group">
                            <label for="exampleInputName1">Tên khách hàng :</label>
                            <input type="text" name="user_name" class="form-control" value="<?= $data['user']['user_name'] ?>">
                            <span style="color: red;" class="error">
                                <? echo $errors['user_name'] ?? '' ?>
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail3">Địa chỉ :</label>
                            <input type="text" name="user_adress" class="form-control" value="<?= $data['user']['user_adress'] ?>" placeholder="Nhập địa chỉ">
                            <span style="color: red;" class="error">
                                <? echo $errors['user_adress'] ?? '' ?>
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword4">Số điện thoại :</label>
                            <input type="text" name="user_phone" class="form-control" value="<?= $data['user']['user_phone'] ?>" placeholder="Nhập số điện thoại">
                            <span style="color: red;" class="error">
                                <? echo $errors['user_phone'] ?? '' ?>
                            </span>
                        </div>
                        <button type="submit" name="editInvoice" class="btn btn-gradient-primary me-2">Tiếp Theo</button>
                        <a href="/?pages=InvoiceController/list">Quay lại</a>
                    </form>
                </div>
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