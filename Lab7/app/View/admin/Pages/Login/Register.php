<?php

use app\Responsitories\LoginRespositoies;

$LoginRespositoies = new LoginRespositoies();
?>
<title>Login</title>
<?php


// if (isset($_POST['Register'])) {
//     if ($LoginRespositoies->register()) {
//         echo '<script>window.location.href="/?pages=UserController/list/"</script>';
//     } else {
//     };
// }

?>
<main class="page-content">
    <h1 class="page-title">Minh Quang Store</h1>
    <form id="registerForm" class="contact-form register" action="/?pages=LoginController/HandleRegister" method="post"  >
        <h2 class="form-title">Đăng kí</h2>
        <div class="form-field">
            <label for="name">Tên đăng nhập</label>
            <input type="text" id="name" name="user_name" />
        </div>
        <div class="form-field">
            <label for="name">Email</label>
            <input type="text" id="name" name="user_email" />
        </div>
        <div class="form-field">
            <label for="surname">Mật khẩu</label>
            <input type="password" id="surname" name="user_password" />
        </div>
        <div class="form-field">
            <label for="name">Nhập lại mật khẩu</label>
            <input type="password" id="name" name="confirmPass" />
        </div>
        <div style="margin: 10px 0;">
            <input type="submit"  class="btn" />
        </div>
        <a href="/?pages=LoginController/login">Đăng nhập</a>
    </form>
</main>
<style>
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    html:focus-within {
        scroll-behavior: smooth;
        /* Se sei curioso usa google */
    }

    body {
        min-height: 100vh;
        text-rendering: optimizeSpeed;
        /* Se sei curioso usa google */
        -webkit-font-smoothing: antialiased;
        /* Se sei curioso usa google */
        -moz-osx-font-smoothing: grayscale;
        /* Se sei curioso usa google */
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
        background-color: green;
        /* viola */
        border-color: #870f94;
        color: white;
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
</style>

</body>

</html>