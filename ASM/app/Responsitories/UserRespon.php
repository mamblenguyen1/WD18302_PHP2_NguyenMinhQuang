<?php

namespace app\Responsitories;

use app\Model\UserFunction;
use app\Model\UserModel;

class UserRespon
{

    function AddUserResponse($data)
    {
        $userModel = new UserModel();
        $userModel->CreateItem($data, 'create');
        return true;
    }
    function changePass($data)
    {
        
        unset($data['confirmPass']);
        $data['user_password'] =  $data['new_pass'];
        unset($data['new_pass']);
        $userModel = new UserModel();
        $userModel->updateItem($data, 'user_name', '=' , $data['user_name'] , 'change');
        return true;
    }


    function UpdateUserResponse($data)
    {
            $userModel = new UserModel();
            $userModel->updateItem($data, 'user_id', '=', $data['user_id'], 'update');
            echo '<script>alert("Cập nhật tài khoản thành công ")</script>';
            echo '<script>window.location.href="/?pages=UserController/details/' . $data['user_id'] . '"</script>';
            return true;
    }


    function HiddenUserResponse()
    {
        if (
            !$_POST['user_id'] == '' &&
            !$_POST['is_deleted'] == ''
        ) {
            $userModel = new UserModel();

            $userModel->updateItem($_POST, 'user_id', '=', $_POST['user_id'],'');
            echo '<script>alert("Cập nhật tài khoản thành công ")</script>';
            echo '<script>window.location.href="/?pages=UserController/list"</script>';
            return true;
        } else {
            echo 'Xin vui lòng điền đầy đủ thông tin';
        }
    }
    function RecoveryUserResponse()
    {

        if (
            !$_POST['user_id'] == ''
        ) {

            $userModel = new UserModel();
            $userModel->updateItem($_POST, 'user_id', '=', $_POST['user_id'],'');
            echo '<script>alert("Cập nhật tài khoản thành công ")</script>';
            echo '<script>window.location.href="/?pages=UserController/list"</script>';
            return true;
        } else {
            echo 'Xin vui lòng điền đầy đủ thông tin';
        }
    }
}

