<?php

namespace app\Responsitories;

use app\Model\ProductFunction;
use app\Model\ProductModel;

class ProductRespon
{

    function AddProductResponse()
    {
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_quantity = $_POST['product_quantity'];
        $product_description = $_POST['product_description'];
        $product_img = $_FILES['product_img']['name'];
        $_POST['product_img'] = $_FILES['product_img']['name'];

        if (
            !$product_name == '' &&
            !$product_price == '' &&
            !$product_quantity == '' &&
            !$product_description == '' &&
            !$product_img == ''

        ) {
            $ProductModel = new ProductModel();
            $ProductModel->CreateItem($_POST, '');
            $anhne = $_FILES['product_img']['tmp_name'];
            $error = $_FILES['product_img']['error'];
            $path = 'assets/images/product/' . $product_img;

            if (
                $error === 0
            ) {
                move_uploaded_file($anhne, $path);
            }
            echo '<script>alert("Tạo sản phẩm thành công ")</script>';
            echo '<script>window.location.href="/?pages=ProductController/list"</script>';
        } else {
            echo '<script>alert("Xin vui lòng điền đầy đủ thông tin ")</script>';
            return false;

            // echo '';
        }
    }
    function UpdateProductResponse($product_id)
    {
        $ProductModel = new ProductModel();

        $product = new ProductFunction();
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_quantity = $_POST['product_quantity'];
        $product_description = $_POST['product_description'];
        $product_img = $_FILES['product_img']['name'];
        $old_product_img = $product->getInfoProduct($_POST['product_id'], 'product_img');

        if (
            !$product_name == '' &&
            !$product_price == '' &&
            !$product_quantity == '' &&
            !$product_description == ''
        ) {
            if (!$product_img == '') {

                $_POST['product_img'] = $_FILES['product_img']['name'];
                // var_dump($_POST);
                // die;

                $ProductModel->updateItem($_POST, 'product_id', '=', $_POST['product_id']);

                // $product->UpdateProduct($product_name, $product_price, $product_quantity,  $product_description, $product_img, $product_id);
                $anhne = $_FILES['product_img']['tmp_name'];
                $error = $_FILES['product_img']['error'];
                $path = 'assets/images/product/' . $product_img;
                if (
                    $error === 0
                ) {
                    move_uploaded_file($anhne, $path);
                    if (file_exists("assets/images/product/$old_product_img")) {
                        unlink("assets/images/product/$old_product_img");
                    }
                }
                echo '<script>alert("Cập nhật sản phẩm thành công ")</script>';
                echo '<script>window.location.href="/?pages=ProductController/details/' . $_POST['product_id'] . '"</script>';
            } else {
                $_POST['product_img'] = $product->getInfoProduct($_POST['product_id'], 'product_img');
                $ProductModel->updateItem($_POST, 'product_id', '=', $_POST['product_id']);
                echo '<script>alert("Cập nhật sản phẩm thành công ")</script>';
                echo '<script>window.location.href="/?pages=ProductController/details/' . $_POST['product_id'] . '"</script>';
            }
        } else {
            echo 'Xin vui lòng điền đầy đủ thông tin';
        }
    }
    function HiddenProductResponse()
    {
        if (
            !$_POST['product_id'] == '' &&
            !$_POST['is_deleted'] == ''
        ) {
            $ProductModel = new ProductModel();
            $ProductModel->updateItem($_POST, 'product_id', '=', $_POST['product_id']);
            echo '<script>alert("Cập nhật tài khoản thành công ")</script>';
            echo '<script>window.location.href="/?pages=ProductController/list"</script>';
            return true;
        } else {
            echo 'Xin vui lòng điền đầy đủ thông tin';
        }
    }
    function RecoveryProductResponse()
    {

        if (
            !$_POST['product_id'] == ''
        ) {
            $ProductModel = new ProductModel();
            $ProductModel->updateItem($_POST, 'product_id', '=', $_POST['product_id']);
            echo '<script>alert("Cập nhật tài khoản thành công ")</script>';
            echo '<script>window.location.href="/?pages=ProductController/list"</script>';
            return true;
        } else {
            echo 'Xin vui lòng điền đầy đủ thông tin';
        }
    }
    // function UpdateUserResponse($user_name, $user_email,  $user_phone, $user_id)
    // {

    //     if (
    //         !$user_name == '' &&
    //         !$user_email == '' &&
    //         !$user_phone == ''
    //     ) {
    //         $user = new UserFunction();
    //         $user->UpdateUser($user_name, $user_email,  $user_phone, $user_id);
    //         echo '<script>alert("Cập nhật thông tin thành công")</script>';
    //         echo '<script>window.location.href="../../index.php"</script>';
    //     } else {
    //         echo   '<div class="alert alert-danger" role="alert">
    //         Xin vui lòng nhập đầy đủ thông tin !!!
    //     </div>';
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
