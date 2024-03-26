<?php

namespace app\Responsitories;

use app\Model\InvoiceFunction;
use app\Model\InvoiceModel;
use app\Model\ProductFunction;

class InvoicesRespon
{


    function AddInvoices()
    {
        $user_name = $_POST['user_name'];
        $user_adress = $_POST['user_adress'];
        $user_phone = $_POST['user_phone'];
        if (
            !$user_name == '' &&
            !$user_adress == '' &&
            !$user_phone == ''
        ) {
            $InvoiceFunction = new InvoiceFunction();
            return $InvoiceFunction->addInvoices($user_name, $user_adress, $user_phone);
        } else {
            echo '<script>alert("Xin vui lòng điền đầy đủ thông tin")</script>';
            echo '<script>window.location.href="/?pages=InvoiceController/choose"</script>';
        }
    }



    function AddInvoicesDetails($Invoice_id)
    {
        $InvoiceFunction = new InvoiceFunction();
        $product_id = $_POST['product_id'];
        if (
            !$product_id == ''
        ) {
            if ($InvoiceFunction->DuplicateCartProStorge($product_id, $Invoice_id, $product_id)) {
                $InvoiceFunction->updateCartQty($product_id, $Invoice_id);
            } else {
                $InvoiceFunction->addInvoicesDetails($Invoice_id, $product_id);
            }
        } else {
            echo '<script>alert("Xin vui lòng điền đầy đủ thông tin")</script>';
        }
    }

    function RemoveInvoicesDetails($Invoice_detail_id)
    {
        $InvoiceModel = new InvoiceModel();
        $InvoiceModel->removeItem($Invoice_detail_id);
    }
    function RemoveInvoices($Invoice_detail_id)
    {
        $InvoiceModel = new InvoiceModel();

        $invoice_id =  $InvoiceModel->getIdFormInvoiceDetail($Invoice_detail_id);
        foreach ($invoice_id as $id) {
            $this->RemoveInvoicesDetails($id['Invoice_detail_id']);
        }
        $InvoiceModel->removeInvoice($Invoice_detail_id);
        return true;
    }
    function UpdateUserInvoice($data)
    {
        $InvoiceModel = new InvoiceModel();
        $InvoiceModel->updateItem($data, 'Invoice_id ', ' = ', $data['Invoice_id'], '');
        return true;
    }
    function UpdateInvoicesDetails($id)
    {
        $InvoiceFunction = new InvoiceFunction();
        $InvoiceDetails = $InvoiceFunction->Get_Invoice_Details($id);
        $totalPrice1 = 0;
        $time = 1;
        foreach ($InvoiceDetails as $index => $InvoiceDetail) {
            $time++;
            $productF = new ProductFunction();
            $quantity = $_POST['quantity' . $index];
            $product_id = $_POST['product_id' . $index];
            $totalPrice = $quantity * $InvoiceDetail['product_price'];
            $totalPrice1 = $totalPrice1 + $totalPrice;
            if ($quantity > ($productF->getInfoProduct($product_id, 'product_quantity'))) {
                echo '<script> alert("Số lượng sản phẩm trong kho không đủ đáp ứng như cầu của bạn")</script>  ';
                echo '<script>window.location.href="?pages=InvoiceController/addProduct/&id=' . $id . '"</script>';
            } else {
                $InvoiceFunction->updateInvoiceDetails($quantity, $InvoiceDetail['Invoice_detail_id']);
                $InvoiceFunction->updateQuantity($quantity, $product_id);
            }
        }
        // }
        $InvoiceFunction->updateInvoiceTotal($id , $totalPrice1);

        echo '<script>window.location.href="/?pages=InvoiceController/detail/' . $id . '"</script>';
    }
}
