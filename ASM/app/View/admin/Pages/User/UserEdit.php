<?php

// use app\Model\UserFunction;
// $user = new UserFunction();
// use app\Model\UserModel;
use app\Helpers\UserValidator;

// $user = new UserModel();
// $user_id = $data['user'][0]['id'];
// echo ($user->getInfoById($user_id , 'user_name'));
// exit;
// echo $data['user']['user_name'];
// die;
if(isset($_POST['update'])){
    $UserValidator = new UserValidator($_POST);
    $errors = $UserValidator->validateFormUpdate();
    $data[] = $_POST;
    // var_dump($_POST);
    // die;
    if($errors == null){
        $data = base64_encode(json_encode($_POST));
        echo '<script>window.location.href="/?pages=UserController/handleUpdate&data=' . $data . '"</script>';
    }
}
?>
<div class="content-wrapper">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Cập nhật tài khoản</h4>
                <form class="forms-sample" method="post" action="">
                <input type="hidden" name="user_id" value="<?= $data['user']['user_id']?>">
                <input type="hidden" name="user_updated" value="<?= $_SESSION['user_id']?>">
                    <div class="form-group">
                        <label for="exampleInputName1">Tên tài khoản :</label>
                        <input type="text" name="user_name" class="form-control" value="<?= $data['user']['user_name'] ?>" placeholder="Nhập tên khách hàng">
                        <span style="color: red;" class="error">
                            <? echo $errors['user_name'] ?? ''?>
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Địa chỉ :</label>
                        <input type="text" name="user_adress" class="form-control" value="<?= $data['user']['user_adress'] ?>" placeholder="Nhập địa chỉ">
                        <span style="color: red;" class="error">
                            <? echo $errors['user_adress'] ?? ''?>
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Địa chỉ Email :</label>
                        <input type="text" name="user_email" class="form-control" value="<?= $data['user']['user_email'] ?>" placeholder="Nhập địa chỉ">
                        <span style="color: red;" class="error">
                            <? echo $errors['user_email'] ?? ''?>
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword4">Số điện thoại :</label>
                        <input type="number" name="user_phone" class="form-control" value="<?= $data['user']['user_phone'] ?>" placeholder="Nhập email nhận hàng">
                        <span style="color: red;" class="error">
                            <? echo $errors['user_phone'] ?? ''?>
                        </span>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="user_password" class="form-control" value="<?= $data['user']['user_password'] ?>" placeholder="Nhập email nhận hàng">
                        <span style="color: red;" class="error">
                            <? echo $errors['user_password'] ?? ''?>
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword4">Cấp quyền :</label>
                        <select name="role_id" id="role" class="form-control select2" style="width: 100%;">
                            <option selected="selected" value="<?= $data['user']['role_id']?>"><?= $data['user']['role_id'] == 1 ?  'Người quản trị' : 'Khách hàng' ?></option>
                            <option value="<?= $data['user']['role_id'] == 2 ?  '1' : '2' ?>"><?= $data['user']['role_id'] == 2 ?  'Người quản trị' : 'Khách hàng' ?></option>
                        </select>
                    </div>
                    <button type="submit" name="update" class="btn btn-gradient-primary me-2">Cập nhật</button>
                    <a href="/?pages=UserController/list">Quay lại</a>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>