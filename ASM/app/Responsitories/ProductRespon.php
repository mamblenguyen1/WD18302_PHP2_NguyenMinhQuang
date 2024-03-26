<?php

namespace app\Responsitories;

use app\Model\ProductModel;

class ProductRespon
{

    function AddProductResponse($data)
    {
        $data['product_price'] = intval($data['product_price']);
        $data['product_quantity'] = intval($data['product_quantity']);
        $ProductModel = new ProductModel();
        $ProductModel->CreateItem($data, '');
        return true;
    }
    function UpdateProductResponse($data)
    {
        $data['product_price'] = intval($data['product_price']);
        $data['product_quantity'] = intval($data['product_quantity']);
        $ProductModel = new ProductModel();
        $ProductModel->updateItem($data, 'product_id', '=', $data['product_id']);
        return true;
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
 
}
