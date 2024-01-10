<?php
require_once 'vendor/autoload.php';
use Lab2\Model\core\database;
use Lab2\Model\core\User;

$db = new database();

$user = new User();

require_once 'Controller/Controller.php';

?>

<link rel="stylesheet" href="style.css">
<button onclick="openPopup()">Tạo tài khoản</button>
<div class="popup-container" id="popupContainer">
    <div class="popup">
        <h2>Đăng ký tài khoản mới</h2>
        <form action="" method="post" id="signupForm">
            <label for="username">Tên đăng nhập:</label>
            <input type="text" id="username" name="username">
            <label for="phone">Mật khâu:</label>
            <input type="text" id="password" name="password">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email">
            <label for="phone">Số điện thoại:</label>
            <input type="tel" id="phone" name="phone">
            <button type="submit" name="add">Đăng ký</button>
            <button class="close-btn" onclick="closePopup()">Đóng</button>

        </form>
    </div>
</div>
<div class="search-box">

    <?
    if (isset($users)) {
    ?>
        <table>
            <thead>
                <tr>
                    <th>Tên tài khoản</th>
                    <th>Email</th>
                    <th>SĐT</th>
                    <th>Trạng thái</th>
                    <th>Ngày tạo</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?
                foreach ($users as $user) {
                ?> <tr>
                        <th class="name"> <?= $user['user_name'] ?></th>
                        <th class="phone"><?= $user['user_email'] ?></th>
                        <th class=""><?= $user['user_phone'] ?></th>
                        <th class=""><?
                                        if ($user['is_deleted'] == 0) {
                                            echo 'Đang hoạt động';
                                        } else {
                                            echo 'Vô hiệu hóa';
                                        }
                                        ?></th>
                        <th class="phone"><?= $user['created_at'] ?></th>
                        <th>
                            <a href="Controller/edit.php?user_id=<?= $user['user_id'] ?>" class="button-primary">Sửa</a>
                            <?
                            if ($user['is_deleted'] == 0) {
                                echo ' <form action="" method="post">
                                            <input type="hidden" name="user_id" value="' . $user['user_id'] . '">
                                            <button type="submit" class="button-danger" name="delete"> Xóa
                                        </form>';
                            } else {
                                echo '<form action="" method="post">
                                            <input type="hidden" name="user_id" value="' . $user['user_id'] . '">
                                            <button type="submit" class="button-recovery" name="recovery"> Khôi phục
                                        </form>';
                            }
                            ?>

                        </th>
                    </tr>


            <? }
            }
            ?>

            </tbody>
        </table>
</div>
<script>
    function openPopup() {
        document.getElementById('popupContainer').style.display = 'block';
    }

    function closePopup() {
        document.getElementById('popupContainer').style.display = 'none';
    }

    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('signupForm').addEventListener('submit', function(event) {
            // event.preventDefault();
            closePopup();
        });
    });
</script>