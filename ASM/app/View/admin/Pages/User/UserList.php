<?php
// use app\Model\UserFunction;
use app\Helpers\status;
use app\Model\UserModel;
$user = new UserModel();
?>

<?php
 if(isset($_SESSION['user_id'])){
    $user_deleted = $_SESSION['user_id'];
}else{
    echo 'không tìm thấy user id';
}
// if (isset($_POST['delete'])) {
//     $user_id = $_POST['user_id'];
//     $user->DeleteUser($user_id, 1 , $user_deleted);
// }
// if (isset($_POST['recovery'])) {
//     $user_id = $_POST['user_id'];
//     $user->DeleteUser($user_id, 0 , $user_deleted);
// }
?>
<div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card">

        <div class="card">
            <a href="/?pages=UserController/add/">
                <button type="button" class="btn btn-outline-primary" style="width: 200px; margin: 10px 30px;">Thêm tài khoản</button>
            </a>

            <div class="card-body">

                <h4 class="card-title">Danh sách khách hàng</h4>
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th> Tên tài khoản </th>
                            <th> Email </th>
                            <th> Số điện thoại </th>
                            <th> Trạng thái </th>
                            <th> Thao tác </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?
                        $usersAll = $user->getAllUser();
                        foreach ($usersAll as $users) {
                        ?>
                            <tr>
                                <td class="py-1">
                                    <?= $users['user_name'] ?>
                                </td>
                                <td> <?= $users['user_adress'] ?> </td>
                                <td>
                                    <? if ($users['role_id'] == 1) {
                                        echo '<label class="badge badge-primary">' . status::getRole()[status::ADMIN] . '</label>';
                                    } else {
                                        echo '<label class="badge badge-danger">' . status::getRole()[status::USER] . '</label>';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <? if ($users['is_deleted'] == 0) {
                                        echo '<label class="badge badge-primary">' . status::getStatus()[status::ACTIVE] . '</label>';
                                    } else {
                                        echo '<label class="badge badge-danger">' . status::getStatus()[status::DEACTIVE] . '</label>';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <a href="/?pages=UserController/details/<?= $users['user_id'] ?>">
                                        <button type="button" class="btn btn-outline-success btn-icon-text" fdprocessedid="zlcdq9"><i class="mdi mdi-alert btn-icon-prepend"></i> Chi tiết </button>

                                    </a>
                                    <a href="/?pages=UserController/edit/<?= $users['user_id'] ?>">

                                        <button type="button" class="btn btn-outline-info btn-icon-text"> Sửa <i class="mdi mdi-settings btn-icon-append"></i></button>
                                    </a>
                                    <form action="" method="post" style="display: inline-block;">
                                        <input type="hidden" name="user_id" value="<?= $users['user_id'] ?>">
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
                                    </form>
                                </td>
                            </tr>

                        <? } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
