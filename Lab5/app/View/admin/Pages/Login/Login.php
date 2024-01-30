<?php

use app\Responsitories\LoginRespositoies;

$LoginRespositoies = new LoginRespositoies();
?>
<title>Login</title>
<?php


if (isset($_POST['Login'])) {
    if ($LoginRespositoies->Login()) {
        echo '<script>window.location.href="/?pages=UserController/list/"</script>';
    } else {
    };
}
if (isset($_POST['Register'])) {
    if ($LoginRespositoies->register()) {
        echo '<script>window.location.href="/?pages=UserController/list/"</script>';
    } else {
    };
}


?>
<main class="page-content">
    <h1 class="page-title">Minh Quang Store</h1>
    <form id="loginForm" class="contact-form" method="post">
        <h2 class="form-title">Đăng nhập</h2>
        <div class="form-field">
            <label for="name">Tên đăng nhập</label>
            <input type="text" id="name" name="username" />
        </div>
        <div class="form-field">
            <label for="surname">Mật khẩu</label>
            <input type="text" id="surname" name="userpass" />
        </div>
        <div>
            <input type="submit" name="Login" class="btn" />
        </div>
        <a href="/?pages=LoginController/register">Tạo tài khoản</a>
        <a style="margin-left: 30px;" href="/?pages=LoginController/forgot">Quên mật khẩu</a>
    </form>

    <!-- <form id="registerForm" class="contact-form register" method="post" style="display: none;">
        <h2 class="form-title">Đăng kí</h2>
        <div class="form-field">
            <label for="name">Tên đăng nhập</label>
            <input type="text" id="name" name="username" />
        </div>
        <div class="form-field">
            <label for="name">Số điện thoại</label>
            <input type="text" id="name" name="phone" />
        </div>
        <div class="form-field">
            <label for="surname">Mật khẩu</label>
            <input type="text" id="surname" name="userpass" />
        </div>
        <div class="form-field">
            <label for="name">Nhập lại mật khẩu</label>
            <input type="text" id="name" name="confirmPass" />
        </div>
        <div style="margin: 10px 0;">
            <input type="submit" name="Register" class="btn" />
        </div>
        <a href="/?pages=LoginController/login">Đăng nhập</a>
    </form> -->
</main>



<style>
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    html:focus-within {
        scroll-behavior: smooth;
    }

    body {
        min-height: 100vh;
        text-rendering: optimizeSpeed;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }

    html {
        font-size: 100%;
    }

    body {
        font-family: "Avenir";
        font-weight: normal;
        font-size: 1rem;
        line-height: 1.5;
        color: black;
    }

    h1,
    h2,
    h3 {
        font-weight: bold;
        line-height: 1.3;
    }

    h1 {
        font-size: 3.052rem;
    }

    h2 {
        padding: 30px;
        font-size: 2.441rem;
    }

    h3 {
        font-size: 1.953rem;
    }

    a {
        display: inline-block;
        color: currentColor;
        text-decoration: underline;
    }


    /* input*/
    input {
        display: inline-block;
        font: inherit;
        border: 1px solid grey;
        background-color: white;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"],
    input[type="tel"] {
        display: block;
        width: 100%;
        height: 2.5em;
        border-radius: 8px;
        text-indent: 0.5em;
    }

    .btn {
        display: inline-block;
        cursor: pointer;
        font-weight: bold;
        font-size: 1rem;
        padding: 8px 16px;
        border-radius: 8px;
        border: none;
        color: black;
        transition: all 200ms;
        transform: scale(1);
        background-color: #ffdc22;
    }

    .btn:hover,
    .btn:focus {
        transform: scale(1.02);
        background-color: #ffd700;
    }

    form {
        display: block;
        max-width: 400px;
        margin-left: auto;
        margin-right: auto;
        padding: 24px;
        border-radius: 8px;
        border: 1px solid grey;
        background-color: whitesmoke;
        box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.25);
    }

    form>*+* {
        margin-top: 24px;
    }

    .form-field+.form-field {
        margin-top: 12px;
    }

    .form-field {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .form-field-flat {
        justify-content: flex-start;
    }

    form label {
        opacity: 0.8;
        font-size: 0.8em;
        font-weight: bold;
    }

    form input[type="checkbox"]+* {
        margin-left: 4px;
    }

    .page-content>*+* {
        margin-top: 48px;
    }


    .page-title {
        text-align: center;
    }

    .contact-form {
        position: relative;
        background-color: #A312B3;
        border-color: #870f94;
        color: white;
    }

    .tabs {
        z-index: 10000;
        position: absolute;
        top: 100px;
        margin: 0 auto;
        left: 50%;
        transform: translate(-50%, 0);
    }

    .tabs button {
        margin: 20px;
        padding: 10px 20px;
        font-size: 16px;
        box-shadow: 0 0 5px green;
        cursor: pointer;
        border: none;
        outline: none;
        background-color: yellow;
        transition: color 0.3s ease-in-out;
    }

    .tabs button:hover {
        color: white;
        /* Màu khi hover */
        background-color: green;

    }

    .tabs button.active {
        color: #2ecc71;
        /* Màu khi active */
    }

    /* Hiệu ứng cho form khi chuyển đổi */
    .form-container {
        max-width: 600px;
        margin: 20px auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        opacity: 0;
        transform: translateY(-20px);
        transition: opacity 0.3s ease-in-out, transform 0.3s ease-in-out;
    }

    .form-container.active {
        opacity: 1;
        transform: translateY(0);
    }

    .contact-form .form-field input {
        color: #A312B3;
        border-color: #870f94;
    }

    .login-form {
        background-color: #0D39FF;
        border-color: #122FB3;
        color: white;
    }

    .login-form .form-field input {
        color: #0D39FF;
        border-color: #122FB3;
    }

    .login-form .forgot-password-link {
        font-size: 0.8em;
    }

    .register {
        height: 500px;
        padding-bottom: 10px;
    }
</style>
<script>
    function openTab(tabName) {
        var loginForm = document.getElementById("loginForm");
        var registerForm = document.getElementById("registerForm");
        var loginTab = document.getElementById("loginTab");
        var registerTab = document.getElementById("registerTab");

        if (tabName === "loginForm") {
            loginForm.style.display = "block";
            registerForm.style.display = "none";
            loginTab.classList.add("active");
            registerTab.classList.remove("active");
        } else if (tabName === "registerForm") {
            registerForm.style.display = "block";
            loginForm.style.display = "none";
            registerTab.classList.add("active");
            loginTab.classList.remove("active");
        }
    }
</script>
</body>

</html>