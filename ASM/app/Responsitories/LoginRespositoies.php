<?php

namespace app\Responsitories;

use app\Model\UserFunction;
use app\Responsitories\ValidateRegex;
// use app\Helpers\mail\Mailer;

class LoginRespositoies
{

    function Login()
    {
        if (empty($_POST["username"]) && empty($_POST["userpass"])) {
            echo "<script>alert('Vui lòng nhập Email và mật khẩu!')</script>";
        } else {
            $Regex = new ValidateRegex();
            if (!$Regex->validatePassword($_POST["userpass"])) {
                return false;
            } else {
                $user = new UserFunction();
                if ($user->checkActive($_POST["username"], $_POST["userpass"])) {
                    echo '<script>alert("Vô hiệu hóa!!")</script>';
                } else {
                    if ($user->checkAccount($_POST["username"], $_POST["userpass"])) {
                        $userid = $user->getInfoUserName($_POST["username"], 'user_id');
                        // echo $userid;
                        $_SESSION['username'] = $user->getInfoUserName($_POST["username"], 'user_name');
                        $_SESSION['user_id'] = $userid;
                        setcookie("userID", $userid, time() + 3600, "/");
                        return true;
                    } else {
                        echo '<script>alert("Sai tên hoặc mật khẩu !!")</script>';
                        return false;
                    }
                }
            }
        }
    }


    function register()
    {
        $user = new UserFunction();
        $_POST["username"] = $_POST["username"];
        $user_email = $_POST["user_email"];
        $_POST["userpass"] = $_POST["userpass"];
        $confirmPass = $_POST["confirmPass"];

        if (empty($_POST["username"]) && empty($_POST["userpass"]) && empty($user_email) && empty($confirmPass)) {
            echo "<script>alert('Vui lòng nhập đầy đủ thông tin !!')</script>";
        } else {
            if ($user->checkDuplicateUser('user', 'user_name', $_POST["username"])) {
                echo "<script>alert('Tên tài khoản đã tồn tại!!')</script>";
            } else {
                if ($user->checkDuplicateUser('user', 'user_email', $user_email)) {
                    echo "<script>alert('Email đc được đăng kí!!')</script>";
                } else {
                    if ($_POST["userpass"] === $confirmPass) {
                        $user_id = $user->Register($_POST["username"], $user_email, $_POST["userpass"]);
                        setcookie("userID", $user_id, time() + 3600, "/");
                        return true;
                    } else {
                        echo '<script>alert("Nhập lại mật khẩu sai!!")</script>';
                        return false;
                    }
                }
            }
        }
    }
    // function forgot()
    // {
    //     $mailer = new Mailer;
    //     $user = new UserFunction();
    //     $_POST["username"] = $_POST["username"];
    //     $user_email = $_POST["user_email"];

    //     if (empty($_POST["username"]) && empty($_POST["userpass"]) && empty($user_email) ) {
    //         echo "<script>alert('Vui lòng nhập đầy đủ thông tin !!')</script>";
    //     } else {
    //         if ($user->checkDuplicateUser('user', 'user_name', $_POST["username"])) {
    //             if ($user->checkDuplicateUser('user', 'user_email', $user_email)) {
    //                 $mailer->forgot($user->getInfoUserName($_POST["username"], 'user_password'),$user_email);
    //                 echo "<script>alert('Mật khâu của bạn đã được gửi đến email,  xin vui lòng kiểm tra lại!!')</script>";
    //             }else{
    //                 echo "<script>alert('Email bạn vừa nhập không chính xác!!')</script>";
    //             }
    //         }else{
    //             echo "<script>alert('Tên đăng nhập bạn vừa nhập không chính xác!!')</script>";

    //         }










    //     echo "<script>alert('Tên tài khoản đã tồn tại!!')</script>";
    // } else {
    //     if ($user->checkDuplicateUser('user', 'user_email', $user_email)) {
    //         echo "<script>alert('Email đc được đăng kí!!')</script>";
    //     } else {
    //         if ($_POST["userpass"] === $confirmPass) {
    //             $user_id = $user->Register($_POST["username"], $user_email, $_POST["userpass"]);
    //             setcookie("userID", $user_id, time() + 3600, "/");
    //             return true;
    //         } else {
    //             echo '<script>alert("Nhập lại mật khẩu sai!!")</script>';
    //             return false;
    //         }
    //     }

    //     }
    // }






    // function ChangePass($oldPass, $newPass, $rePass, $user_id)
    // {
    //     $user = new UserFunction();
    //     if (
    //         !$oldPass == '' &&
    //         !$newPass == '' &&
    //         !$rePass == ''
    //     ) {
    //         if ($oldPass === ($user->CheckPass($user_id, 'user_password'))) {
    //             if ($newPass != $rePass) {
    //                 echo   '<div class="alert alert-danger" role="alert">
    //             Nhập lại mật khẩu không đúng !!!
    //         </div>';
    //             } else {
    //                 $user->ChangePassFunc($newPass, $user_id);
    //                 echo '<script>alert("Đổi thành công")</script>';

    //                 echo '<script>window.location.href="../../index.php"</script>';
    //             }
    //         } else {
    //             echo   '<div class="alert alert-danger" role="alert">
    //         Mật khẩu cũ không đúng !!!
    //     </div>';
    //         }
    //     } else {
    //         echo   '<div class="alert alert-danger" role="alert">
    //         Xin vui lòng nhập đầy đủ thông tin !!!
    //     </div>';
    //     }
    // }
}
