<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

<?php

require_once '../../vendor/autoload.php';

use src\Model\UserFunction;
use src\Responsitories\UserRespon;

$UserRespon = new UserRespon;
$user = new UserFunction();
$user_id = $_GET['user_id'];
if (isset($_POST['save'])) {
    $user_id = $_POST['user_id'];
    $userName = $_POST['userName'];
    $userEmail = $_POST['userEmail'];
    $userPhone = $_POST['userPhone'];
    $UserRespon->UpdateUserResponse($userName, $userEmail,  $userPhone, $user_id);
    // echo '<script>window.location.href="../../index.php"</script>';
}

?>

<div class="overlay" id="overlay">
    <div class="popup">
        <h2 style="text-align: center;">Chỉnh sửa dữ liệu</h2>
        <form id="editForm" method="post">
            <input type="hidden" name="user_id" value="<? echo $user->getInfoUser($user_id, 'user_id') ?>">
            <label for="userName">Tên tài khoản:</label>
            <input type="text" name="userName" value="<? echo $user->getInfoUser($user_id, 'user_name') ?>">

            <label for="userEmail">Email:</label>
            <input type="email" id="userEmail" name="userEmail" value="<? echo $user->getInfoUser($user_id, 'user_email') ?>">

            <label for="userPhone">SĐT:</label>
            <input type="tel" id="userPhone" name="userPhone" value="<?= $user->getInfoUser($user_id, 'user_phone') ?>">

            <button type="submit" name="save">Lưu</button>
        </form>
    </div>
</div>



<style>
    #editForm {
        max-width: 400px;
        /* Đặt độ rộng tối đa của form */
        margin: 0 auto;
        /* Căn giữa form trên trang */
    }

    #editForm label {
        display: block;
        margin-bottom: 8px;
    }

    #editForm input {
        width: 100%;
        padding: 8px;
        margin-bottom: 16px;
        box-sizing: border-box;
        /* Đảm bảo rằng padding không tăng kích thước của phần tử */
    }

    #editForm button {
        background-color: #4CAF50;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        width: 100%;
    }

    #editForm button:hover {
        background-color: #45a049;
    }
</style>