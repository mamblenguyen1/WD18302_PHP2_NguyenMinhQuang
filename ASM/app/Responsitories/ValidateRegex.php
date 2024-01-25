<?php

namespace app\Responsitories;

use app\Model\UserFunction;

class ValidateRegex
{
    function ValidateRegexAddUser($user_name, $user_adress, $user_phone, $user_password, $role_id)
    {
        $pattern = '/^(?=.*[a-zA-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/';

        if (
            !$user_name == '' &&
            !$user_adress == '' &&
            !$user_phone == '' &&
            !$user_password == ''

        ) {
            $user = new UserFunction();
            $user->AddUser($user_name, $user_adress, $user_phone, $user_password, $role_id);
            echo '<script>alert("Tạo tài khoản thành công ")</script>';
            echo '<script>window.location.href="/?pages=UserController/list/"</script>';
        } else {
            echo '<script>alert("Xin vui lòng điền đầy đủ thông tin")</script>';
        }
    }
}
