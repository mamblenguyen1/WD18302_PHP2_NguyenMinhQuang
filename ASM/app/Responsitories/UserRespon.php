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
        // var_dump($data);
        // die;
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
            // $user = new UserFunction();
            // $user->UpdateUser($_POST['user_name'], $_POST['user_adress'], $_POST['user_phone'],  $_POST['role_id'], $_POST['role_id'], $_POST['user_updated']);
            $userModel = new UserModel();
            // var_dump($userModel->updateItem($_POST, 'user_id', '=', 3));
            // die;
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


//     function ChangePass($oldPass, $newPass, $rePass, $user_id)
//     {
//         $user = new UserFunction();
//         if (
//             !$oldPass == '' &&
//             !$newPass == '' &&
//             !$rePass == ''
//         ) {
//             if ($oldPass === ($user->CheckPass($user_id, 'user_password'))) {
//                 if ($newPass != $rePass) {
//                     echo   '<div class="alert alert-danger" role="alert">
//                 Nhập lại mật khẩu không đúng !!!
//             </div>';
//                 } else {
//                     $user->ChangePassFunc($newPass, $user_id);
//                     echo '<script>alert("Đổi thành công")</script>';

//                     echo '<script>window.location.href="../../index.php"</script>';
//                 }
//             } else {
//                 echo   '<div class="alert alert-danger" role="alert">
//             Mật khẩu cũ không đúng !!!
//         </div>';
//             }
//         } else {
//             echo   '<div class="alert alert-danger" role="alert">
//             Xin vui lòng nhập đầy đủ thông tin !!!
//         </div>';
//         }
//     }
// }
