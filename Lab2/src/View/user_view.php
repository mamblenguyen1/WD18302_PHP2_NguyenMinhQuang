<?php

namespace src\view;

?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<?php
if (isset($_POST['delete'])) {
    $user_id = $_POST['user_id'];
    $user->DeleteUser($user_id, 1);
}
if (isset($_POST['recovery'])) {
    $user_id = $_POST['user_id'];
    $user->DeleteUser($user_id, 0);
}
?>
<button style="margin: 20px;" class="btn btn-primary" onclick="openPopup()">Tạo tài khoản</button>
<div class="popup-container" id="popupContainer">
    <div class="popup">
        <h2>Đăng ký tài khoản mới</h2>
        <?php
        if (isset($_POST['add'])) {
            $user_name = $_POST['username'];
            $user_password = $_POST['password'];
            $user_email = $_POST['email'];
            $user_phone = $_POST['phone'];
            $UserRespon->AddUserResponse($user_name, $user_email, $user_password, $user_phone);
        }
        ?>
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
<?php
$users = $controller->Render_user();
if (isset($users)) {
?>
    <table>
        <thead>
            <tr>
                <th>Tên tài khoản</th>
                <th>Mật khẩu</th>
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
                    <th>******** <a href="src/View/pass_change.php?user_id=<?= $user['user_id'] ?>"><i class="fa fa-refresh" style="font-size:18px;"></i></a></th>
                    <th class="phone"><?= $user['user_email'] ?></th>
                    <th class=""><?= $user['user_phone'] ?></th>
                    <th class=""><?
                                    if ($user['is_deleted'] == 0) {
                                        echo 'Đang hoạt động';
                                    } else {
                                        echo 'Vô hiệu hóa';
                                    }
                                    ?></th>
                    <th class="phone"><? $created_at = $user['created_at'] ;
                    $formatted_date = date('d/m/Y', strtotime($created_at));
                    echo $formatted_date;
                    ?></th>
                    <th>
                        <a name="" id="" class="btn btn-primary" href="src/View/edit_user.php?user_id=<?= $user['user_id'] ?>" role="button">Sửa</a>

                        <?
                        if ($user['is_deleted'] == 0) {
                            echo ' <form action="" method="post">
                                            <input type="hidden" name="user_id" value="' . $user['user_id'] . '">
                                            <button type="submit" class="btn btn-danger" name="delete"> Xóa
                                        </form>';
                        } else {
                            echo '<form action="" method="post">
                                            <input type="hidden" name="user_id" value="' . $user['user_id'] . '">
                                            <button type="submit" class="btn btn-success" name="recovery"> Khôi phục
                                        </form>';
                        }
                        ?>

                    </th>
                </tr>


        <? }
        }
        ?>