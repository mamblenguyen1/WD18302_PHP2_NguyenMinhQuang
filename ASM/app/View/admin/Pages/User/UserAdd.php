<?php


use app\Helpers\UserValidator;


if (isset($_POST['create'])) {
    $UserValidator = new UserValidator($_POST);
    $errors = $UserValidator->validateForm();
    $data[] = $_POST;
    if ($errors == null) {
        $data = base64_encode(json_encode($_POST));
        // $json_data = json_encode($data, JSON_PRETTY_PRINT);
        // file_put_contents('data.json', $json_data);
        // die;
        echo '<script>window.location.href="?pages=UserController/handleCreate&data=' . $data . '"</script>';
    }
}
?>
<div class="content-wrapper">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Thêm tài khoản</h4>
                <!-- <form class="forms-sample" method="post" action="?pages=UserController/handleCreate/"> -->
                <form class="forms-sample" method="POST" action="">

                    <input type="hidden" name="user_created" value="<?= $_SESSION['user_id'] ?>">
                    <div class="form-group">
                        <label for="exampleInputName1">Tên tài khoản :</label>
                        <input type="text" name="user_name" class="form-control" id="exampleInputName1" value="<? echo htmlspecialchars($_POST['user_name'] ?? '') ?>" placeholder="Nhập tên tài khoản">
                        <span style="color: red;" class="error">
                            <? echo $errors['user_name'] ?? '' ?>
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Địa chỉ :</label>
                        <input type="text" name="user_adress" class="form-control" id="exampleInputEmail3" value="<?= htmlspecialchars($_POST['user_adress'] ?? '') ?>" placeholder="Nhập Email">
                        <span style="color: red;" class="error">
                            <? echo $errors['user_adress'] ?? '' ?>
                        </span>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail3">Email :</label>
                        <input type="text" name="user_email" class="form-control" id="exampleInputEmail3" value="<?= htmlspecialchars($_POST['user_email'] ?? '') ?>" placeholder="Nhập Email">
                        <span style="color: red;" class="error">
                            <? echo $errors['user_email'] ?? '' ?>
                        </span>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword4">Số điện thoại :</label>
                        <input type="number" name="user_phone" class="form-control" id="exampleInputPassword4" value="<?= htmlspecialchars($_POST['user_phone'] ?? '') ?>" placeholder="Nhập số điện thoại">
                        <span style="color: red;" class="error">
                            <? echo $errors['user_phone'] ?? '' ?>
                        </span>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword4">Mật khẩu :</label>
                        <input type="text" name="user_password" class="form-control" id="exampleInputPassword4" value="<?= htmlspecialchars($_POST['user_password'] ?? '') ?>" placeholder="Nhập mật khẩu">
                        <span style="color: red;" class="error">
                            <? echo $errors['user_password'] ?? '' ?>
                        </span>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword4">Cấp quyền :</label>
                        <select name="role_id" class="form-control form-control-lg" id="exampleFormControlSelect1">
                            <option value="1">Admin</option>
                            <option value="2">User</option>
                        </select>
                    </div>

                    <button type="submit" name="create" class="btn btn-gradient-primary me-2">Thêm</button>
                    <a href="/?pages=UserController/list">Quay lại</a>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<style>
    .error {
        color: red;
        padding: 5px 10px;
    }
</style>