<?php

namespace app\Responsitories;


class ValidateRegex
{
    public function validateRegex($input, $regex)
    {
        return preg_match($regex, $input);
    }
    public function validateEmail($email)
    {
        $emailPattern = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
        if (preg_match($emailPattern, $email) == 0) {
            echo   '<script>alert("Định dạng Email sai !!! ")</script>';
        } else {
            return true;
        }
    }
    public function validatePhoneNumber($phone)
    {
        $phonePattern = '/^[0-9]{10}$/';
        if (preg_match($phonePattern, $phone) == 0) {
            echo   '<script>alert("Định dạng số điện thoại sai !!! ")</script>';
        } else {
            return true;
        }
    }
    public function validatePassword($password)
    {
        $passwordPattern = '/^(?=.*[a-z])(?=.*[A-Z])[A-Za-z\d@$!%*?&]{8,}$/';
        if (preg_match($passwordPattern, $password) == 0) {
            echo   '<script>alert("Định dạng mật khẩu sai !!! ")</script>';
        } else {
            return true;
        }
    }

        // function ValidateRegexAddUser($user_name, $user_adress, $user_phone, $user_password, $role_id)
    // {
    //     $pattern = '/^(?=.*[a-zA-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/';

    //     if (
    //         !$user_name == '' &&
    //         !$user_adress == '' &&
    //         !$user_phone == '' &&
    //         !$user_password == ''

    //     ) {
    //         $user = new UserFunction();
    //         $user->AddUser($user_name, $user_adress, $user_phone, $user_password, $role_id);
    //         echo '<script>alert("Tạo tài khoản thành công ")</script>';
    //         echo '<script>window.location.href="/?pages=UserController/list/"</script>';
    //     } else {
    //         echo '<script>alert("Xin vui lòng điền đầy đủ thông tin")</script>';
    //     }
    // }



}
