<?php

namespace app\Responsitories;

use app\Model\UserFunction;
use app\Model\UserModel;

class UserRespon
{

    function AddUserResponse()
    {
       
        if (empty($_POST['user_name']) && empty($_POST['user_adress']) && empty($_POST['user_email']) && empty($_POST['user_phone']) && empty($_POST['user_password']) && empty($_POST['role_id'])) {
            echo "<script>alert('Vui lòng nhập Email và mật khẩu!')</script>";
        } else {
            $Regex = new ValidateRegex();
            if (!$Regex->validatePassword($_POST['user_password'])) {
                return false;
            } else {
                if (!$Regex->validateEmail($_POST['user_email'])) {
                    return false;
                } else {
                    if (!$Regex->validatePhoneNumber($_POST['user_phone'])) {
                        return false;
                    } else {
                        $user = new UserFunction();
                        if ($user->checkDuplicateUser('user', 'user_name', $_POST['user_name'])) {
                            echo "<script>alert('Tên tài khoản đã tồn tại!!')</script>";
                        } else {
                            if ($user->checkDuplicateUser('user', 'user_email', $_POST['user_email'])) {
                                echo "<script>alert('Email đc được đăng kí!!')</script>";
                            } else {
                                // $user->AddUser($user_name, $user_adress, $user_phone, $user_email, $user_password, $role_id , $user_created);
                                $userModel = new UserModel();
                                $userModel->CreateItem($_POST);
                                header('location: /?pages=UserController/list/');
                                return true;
                            }
                        }
                    }
                }
            }
        }
    }


    function UpdateUserResponse()
    {

        // var_dump($_POST);
        // die;
        // if (isset($_SESSION['user_id'])) {
        //     $user_updated = $_SESSION['user_id'];
        // } else {
        //     echo 'không tìm thấy user id';
        // }
        // die;
        // $user_name = $_POST['user_name'];
        // $user_adress = $_POST['user_adress'];
        // $user_phone = $_POST['user_phone'];
        // $role_id = $_POST['role_id'];
        if (
            !$_POST['user_name'] == '' &&
            !$_POST['user_adress'] == '' &&
            !$_POST['user_phone'] == '' &&
            !$_POST['role_id'] == ''
        ) {
            // $user = new UserFunction();
            // $user->UpdateUser($_POST['user_name'], $_POST['user_adress'], $_POST['user_phone'],  $_POST['role_id'], $_POST['role_id'], $_POST['user_updated']);
            $userModel = new UserModel();
            // var_dump($userModel->updateItem($_POST, 'user_id', '=', 3));
            // die;
            $userModel->updateItem($_POST, 'user_id', '=', $_POST['user_id']);
            echo '<script>alert("Cập nhật tài khoản thành công ")</script>';
            echo '<script>window.location.href="/?pages=UserController/details/' . $_POST['user_id'] . '"</script>';
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
