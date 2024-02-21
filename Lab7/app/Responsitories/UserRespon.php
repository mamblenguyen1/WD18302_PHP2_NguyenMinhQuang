<?php

namespace app\Responsitories;

use app\Model\UserModel;

class UserRespon
{

   
    function AddUserResponse($data)
    {
        $userModel = new UserModel();
        $userModel->CreateItem($data, '');
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
