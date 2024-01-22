<?php


use app\Model\UserFunction;
$user = new UserFunction();
$user_id = $data['Invoice'][0]['id'];
?>
<div class="content-wrapper">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Thông tin giao hàng</h4>
                <div class="overlay" id="overlay" onclick="closePopup()"></div>
                <div class="popup-container" id="popup">
                    <form action="/?pages=InvoiceController/addProduct" method="post">
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
                        <button type="submit" name="addInfo" class="btn btn-gradient-primary me-2">Tạo</button>
                        <a href="/?pages=InvoiceController/choose">Quay lại</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>