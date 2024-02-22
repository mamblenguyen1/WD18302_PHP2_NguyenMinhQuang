<?php


use app\Helpers\UserValidator;


if(isset($_POST['change'])){
    $UserValidator = new UserValidator($_POST);
    $errors = $UserValidator->validateChangePass();
    $data[] = $_POST;
    if($errors == null){
        
        $data = base64_encode(json_encode($_POST));
       
        echo '<script>window.location.href="?pages=UserController/handleChange&data=' . $data . '"</script>';
    }
}
?>
<div class="content-wrapper">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Đổi mật khẩu</h4>
                <!-- <form class="forms-sample" method="post" action="?pages=UserController/handleCreate/"> -->
                <form class="forms-sample" method="POST" action="">

                    <input type="hidden" name="user_created" value="<?= $_SESSION['user_id']?>">
                    <div class="form-group">
                        <label for="exampleInputName1">Tên tài khoản :</label>
                        <input type="text" name="user_name" class="form-control" id="exampleInputName1" value="<? echo htmlspecialchars($_POST['user_name'] ?? '') ?>" placeholder="Nhập tên tài khoản">
                        <span style="color: red;" class="error">
                            <? echo $errors['user_name'] ?? ''?>
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Mật khẩu Cũ:</label>
                        <input type="text" name="user_password" class="form-control" id="exampleInputEmail3" value="<?= htmlspecialchars($_POST['user_password'] ?? '')?>" placeholder="Nhập Email">
                        <span style="color: red;" class="error">
                            <? echo $errors['user_password'] ?? ''?>
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Mật khẩu Mới:</label>
                        <input type="text" name="new_pass" class="form-control" id="exampleInputEmail3" value="<?= htmlspecialchars($_POST['new_pass'] ?? '')?>" placeholder="Nhập Email">
                        <span style="color: red;" class="error">
                            <? echo $errors['new_pass'] ?? ''?>
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Nhập lại mật khẩu :</label>
                        <input type="text" name="confirmPass" class="form-control" id="exampleInputEmail3" value="<?= htmlspecialchars($_POST['confirmPass'] ?? '')?>" placeholder="Nhập Email">
                        <span style="color: red;" class="error">
                            <? echo $errors['confirmPass'] ?? ''?>
                        </span>
                    </div>


                    <button type="submit" name="change" class="btn btn-gradient-primary me-2">Thêm</button>
                    <a href="/?pages=UserController/list">Quay lại</a>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<style>
    .error{
        color: red;
        padding: 5px 10px;
    }
</style>