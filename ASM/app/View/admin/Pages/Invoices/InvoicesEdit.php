<?

use app\Model\InvoiceModel;

$InvoiceModel = new InvoiceModel();
$invoice_id = $data['product'][0]['id'];

// echo($InvoiceModel->getInfoUserName($invoice_id, 'user_name')['user_name']);
// die;
?>
<div class="content-wrapper">
    <div class="col-12 grid-margin stretch-card">
    <div class="card">
            <div class="card-body">
                <h4 class="card-title">Cập nhật hóa đơn</h4>
                <div class="popup-container" id="popup">
                <form action="/?pages=InvoiceController/editProduct/<?= $invoice_id?>" method="post">
                        <div class="form-group">
                            <label for="exampleInputName1">Tên khách hàng :</label>
                            <input type="text" name="user_name" class="form-control" value="<?= $InvoiceModel->getInfoUserName($invoice_id, 'user_name')['user_name'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail3">Địa chỉ :</label>
                            <input type="text" name="user_adress" class="form-control" value="<?= $InvoiceModel->getInfoUserName($invoice_id, 'user_adress')['user_adress'] ?>" placeholder="Nhập giá">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword4">Số điện thoại :</label>
                            <input type="text" name="user_phone" class="form-control" value="<?= $InvoiceModel->getInfoUserName($invoice_id, 'user_phone')['user_phone'] ?>" placeholder="Nhập số lượng">
                        </div>
                        <button type="submit" class="btn btn-gradient-primary me-2">Tiếp Theo</button>
                        <a href="/?pages=InvoiceController/choose">Quay lại</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<style>
    .images{
        box-shadow: 0 0 5px gray;
        width: 200px;
        height: 250px;
        margin: 20px 0;
    }
</style>