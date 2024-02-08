<?php

// use app\Model\UserFunction;
// $user = new UserFunction();
use app\Model\UserModel;
$user = new UserModel();
$user_id = $data['user'][0]['id'];
// echo ($user->getInfoById($user_id , 'user_name'));
// exit;

?>
<div class="content-wrapper">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Cập nhật tài khoản</h4>
                <form class="forms-sample" method="post" action="/?pages=UserController/handleUpdate/<?= $user_id?>">
                <input type="hidden" name="user_id" value="<?= $user_id?>">
                <input type="hidden" name="user_updated" value="<?= $_COOKIE['userID']?>">

                    <div class="form-group">
                        <label for="exampleInputName1">Tên tài khoản :</label>
                        <input type="text" name="user_name" class="form-control" value="<?= $user->getInfoById($user_id , 'user_name') ?>" placeholder="Nhập tên khách hàng">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Địa chỉ :</label>
                        <input type="text" name="user_adress" class="form-control" value="<?= $user->getInfoById($user_id , 'user_adress') ?>" placeholder="Nhập địa chỉ">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword4">Số điện thoại :</label>
                        <input type="number" name="user_phone" class="form-control" value="<?= $user->getInfoById($user_id , 'user_phone') ?>" placeholder="Nhập email nhận hàng">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword4">Cấp quyền :</label>
                        <select name="role_id" id="role" class="form-control select2" style="width: 100%;">
                            <option selected="selected" value="<?= $user->getInfoById($user_id , 'role_id') ?>"><?= $user->getInfoById($user_id , 'role_id') == 1 ?  'Người quản trị' : 'Khách hàng' ?></option>
                            <option value="<?= $user->getInfoById($user_id , 'role_id') == 2 ?  '1' : '2' ?>"><?= $user->getInfoById($user_id , 'role_id') == 2 ?  'Người quản trị' : 'Khách hàng' ?></option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-gradient-primary me-2">Cập nhật</button>
                    <a href="/?pages=UserController/list">Quay lại</a>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>