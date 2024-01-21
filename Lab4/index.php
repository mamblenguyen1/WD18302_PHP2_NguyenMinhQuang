<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
<link rel="stylesheet" href="Assets/css/style.css">
<?php


require_once 'vendor/autoload.php';


use src\core\Form;
use src\Model\UserFunction;
use src\Helpers\status;
use src\core\Route;
$router = new Route();
$user = new UserFunction();

$router->register(
    '/',
    function () {
        echo "Home";
    }
);

$router->register('/', [src\Invoice::class, 'index'])
    ->register('/invoice', [src\Invoice::class, 'index'])
    ->register('/invoice/create', [src\Invoice::class, 'create']);


if (isset($_POST['delete'])) {
    $user_id = $_POST['user_id'];
    $user->DeleteUser($user_id, 1);
}
if (isset($_POST['recovery'])) {
    $user_id = $_POST['user_id'];
    $user->DeleteUser($user_id, 0);
}
?>
<button id="openPopupBtn" style="width: 300px; margin: 20px;" class="btn btn-secondary">Thêm tài khoản</button>

<div id="popup" class="popup">

    <div class="popup-content">
        <span class="close" id="closePopupBtn">&times;</span>

        <h1>Tạo Tài Khoản</h1>

        <?php $form = Form::begin('src/View/AccountList.php', 'post'); ?>
        <div class="row">

            <div class="form-control">
                <? echo $form->field('userName'); ?>
            </div>
            <div class="form-control">
                <? echo $form->field('userPhone'); ?>
            </div>
            <div class="form-control">
                <? echo $form->field('userEmail'); ?>
            </div>
            <div class="form-control">
                <? echo $form->field('password')->passwordField(); ?>
            </div>
            <div class="form-control">
                <? echo $form->field('confirmPassword')->passwordField(); ?>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>

        </div>
        <? echo Form::end() ?>
    </div>


</div>


<div class="user_list">
    <table class="user_table">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên Tài khoản</th>
                <th>Password</th>
                <th>Email Khách </th>
                <th>Số Điện Thoại</th>
                <th>Trạng thái</th>
                <th style="width: 200px;">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $STT = 1;
            $usersAll = $user->GetUser();
            foreach ($usersAll as $users) {
            ?>
                <tr>
                    <td><?= $STT++ ?></td>
                    <td><?= $users['user_name'] ?></td>
                    <td>******</td>
                    <td><? echo $users['user_adress'] ?></td>
                    <td><?= $users['user_phone'] ?></td>
                    <td style="width: 500px;"><?
                                                if ($users['is_deleted'] == 0) {
                                                    echo  status::getStatus()[status::ACTIVE];
                                                } else {
                                                    echo  status::getStatus()[status::DEACTIVE];
                                                }
                                                ?></td>
                    <td>
                        <a name="" id="" class="btn btn-primary" style="width: 100%;" href="src/View/edit_user.php?user_id=<?= $users['user_id'] ?>" role="button">Sửa</a>

                        <?
                        if ($users['is_deleted'] == 0) {
                            echo ' <form action="" method="post">
                                            <input type="hidden" name="user_id" value="' . $users['user_id'] . '">
                                            <button style="width: 100%" type="submit" class="btn btn-danger" name="delete"> Xóa
                                        </form>';
                        } else {
                            echo '<form action="" method="post">
                                            <input type="hidden" name="user_id" value="' . $users['user_id'] . '">
                                            <button style="width: 100% " type="submit" class="btn btn-success" name="recovery"> Khôi phục
                                        </form>';
                        }
                        ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>



<style>

</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Bắt sự kiện khi nút mở popup được click
        document.getElementById('openPopupBtn').addEventListener('click', function() {
            document.getElementById('popup').style.display = 'block';
        });

        // Bắt sự kiện khi nút đóng popup được click
        document.getElementById('closePopupBtn').addEventListener('click', function() {
            document.getElementById('popup').style.display = 'none';
        });

        // Đặt sự kiện để đóng popup khi click vào nền đen xung quanh popup
        document.getElementById('popup').addEventListener('click', function(event) {
            if (event.target === this) {
                document.getElementById('popup').style.display = 'none';
            }
        });
    });
</script>
<!-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Bắt sự kiện khi nút mở popup được click
        document.getElementById('openPopupBtnEdit').addEventListener('click', function() {
            document.getElementById('popupEdit').style.display = 'block';
        });

        // Bắt sự kiện khi nút đóng popup được click
        document.getElementById('closePopupBtn').addEventListener('click', function() {
            document.getElementById('popupEdit').style.display = 'none';
        });

        // Đặt sự kiện để đóng popup khi click vào nền đen xung quanh popup
        document.getElementById('popupEdit').addEventListener('click', function(event) {
            if (event.target === this) {
                document.getElementById('popupEdit').style.display = 'none';
            }
        });
    });
</script> -->