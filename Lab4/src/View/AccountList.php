<?php

require_once '../../vendor/autoload.php';

use src\Model\UserFunction;
use src\Responsitories\Validator;

$user = new UserFunction();

$validator = new Validator();
if (isset($_POST['submit'])) {
    $userName = $_POST['userName'];
    $userPhone = $_POST['userPhone'];
    $userEmail = $_POST['userEmail'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $emailPattern = '/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
    $phonePattern = '/^0\d{9,10}$/';
    $passwordPattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/';

    if (
        !$userName == '' &&
        !$userPhone == '' &&
        !$userEmail == '' &&
        !$password == '' &&
        !$confirmPassword == ''

    ) {
        if (preg_match($emailPattern, $userEmail)) {
            if (preg_match($phonePattern, $userPhone)) {
                if (preg_match($passwordPattern, $password)) {
                    if ($password === $confirmPassword) {
                        $user->CreateUser($userName, $userEmail, $userPhone, $password);
                        echo '  <div class="container">
                        <label for="">Đang kí tài khoản thành công</label>
                        <div class="user-info">
                            <div class="info">Họ: <span>' . $userName . '</span></div>
                            <div class="info">Tên: <span>' . $userPhone . '</span></div>
                            <div class="info">Email: <span>' . $userEmail . '</span></div>
                            <div class="info">Mật khẩu: <span>' . $password . '</span></div>
                        </div>
                        <a href="../../index.php" class="back-to-form">Quay lại</a>
                        </div>';
                    } else {
                        echo '<script>alert("Nhập lại mật khẩu sai")</script>';
                        echo '<script>window.location.href="../../index.php"</script>';
                    }
                } else {
                    echo '<script>alert("Mật khẩu nhập vào không hợp lệ !")</script>';
                    echo '<script>window.location.href="../../index.php"</script>';
                }
            } else {
                echo '<script>alert("Số điện thoại không hợp lệ !")</script>';
                echo '<script>window.location.href="../../index.php"</script>';
            }
        } else {
            echo '<script>alert("Email vừa nhập không hợp lệ !")</script>';
            echo '<script>window.location.href="../../index.php"</script>';
        }
    } else {
        echo '<script>alert("Xin vui lòng nhập đầy đủ thông tin !")</script>';
        echo '<script>window.location.href="../../index.php"</script>';
    }
}
?>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 600px;
        margin: 50px auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        text-align: center;
    }

    .user-info {
        margin-top: 20px;
        border: 1px solid #ccc;
        border-radius: 8px;
        padding: 15px;
    }

    .info {
        margin-bottom: 10px;
    }

    label {
        display: block;
        margin-bottom: 10px;
        font-weight: bold;
        font-size: 1.2em;
    }

    .back-to-form {
        display: block;
        margin-top: 15px auto;
        text-align: center;
        border: 1px solid black;
        padding: 10px 20px;
        text-decoration: none;
        cursor: pointer;
    }
</style>