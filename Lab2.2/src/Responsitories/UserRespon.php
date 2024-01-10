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
        } else {
            echo   '<div class="alert alert-danger" role="alert">
            Xin vui lòng nhập đầy đủ thông tin !!!
        </div>';
        }
    }
}
