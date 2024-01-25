<?php

namespace app\Responsitories;

use app\Model\UserFunction;

class UserRespon
{

    function AddUserResponse()
    {
        $user_name = $_POST['user_name'];
        $user_adress = $_POST['user_adress'];
        $user_phone = $_POST['user_phone'];
        $user_password = $_POST['user_password'];
        $role_id = $_POST['role_id'];
       
    }


    function UpdateUserResponse($user_id)
    {

        $user_name = $_POST['user_name'];
        $user_adress = $_POST['user_adress'];
        $user_phone = $_POST['user_phone'];
        $role_id = $_POST['role_id'];
        if (
            !$user_name == '' &&
            !$user_adress == '' &&
            !$user_phone == '' &&
            !$role_id == ''
        ) {
            $user = new UserFunction();
            $user->UpdateUser($user_name, $user_adress, $user_phone,  $user_id, $role_id);
            echo '<script>alert("Cập nhật tài khoản thành công ")</script>';
            echo '<script>window.location.href="/?pages=UserController/details/&id='.$user_id.'"</script>';
        } else {
            echo 'Xin vui lòng điền đầy đủ thông tin';
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
