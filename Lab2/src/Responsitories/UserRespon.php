<?php

namespace src\Responsitories;

use src\Model\UserFunction;

class UserRespon
{

    function AddUserResponse($user_name, $user_email, $user_password, $user_phone)
    {
        if (
            !$user_name == '' &&
            !$user_email == '' &&
            !$user_password == '' &&
            !$user_phone == ''
        ) {
            $user = new UserFunction();
            return $user->AddUser($user_name, $user_email, $user_phone, $user_password);
        } else {
            // echo 'Xin vui lòng nhập đầy đủ thông tin';
            echo   '<div class="alert alert-danger" role="alert">
                Xin vui lòng nhập đầy đủ thông tin !!!
            </div>';
        }
    }

    function UpdateUserResponse($user_name, $user_email,  $user_phone, $user_id)
    {

        if (
            !$user_name == '' &&
            !$user_email == '' &&
            !$user_phone == ''
        ) {
            $user = new UserFunction();
            $user->UpdateUser($user_name, $user_email,  $user_phone, $user_id);
            echo '<script>alert("Cập nhật thông tin thành công")</script>';
            echo '<script>window.location.href="../../index.php"</script>';
        } else {
            echo   '<div class="alert alert-danger" role="alert">
            Xin vui lòng nhập đầy đủ thông tin !!!
        </div>';
        }
    }

    function ChangePass($oldPass, $newPass, $rePass, $user_id)
    {
        $user = new UserFunction();
        if (
            !$oldPass == '' &&
            !$newPass == '' &&
            !$rePass == ''
        ) {
            if ($oldPass === ($user->CheckPass($user_id, 'user_password'))) {
                if ($newPass != $rePass) {
                    echo   '<div class="alert alert-danger" role="alert">
                Nhập lại mật khẩu không đúng !!!
            </div>';
                } else {
                    $user->ChangePassFunc($newPass, $user_id);
                    echo '<script>alert("Đổi thành công")</script>';

                    echo '<script>window.location.href="../../index.php"</script>';
                }
            } else {
                echo   '<div class="alert alert-danger" role="alert">
            Mật khẩu cũ không đúng !!!
        </div>';
            }
        } else {
            echo   '<div class="alert alert-danger" role="alert">
            Xin vui lòng nhập đầy đủ thông tin !!!
        </div>';
        }
    }
}
