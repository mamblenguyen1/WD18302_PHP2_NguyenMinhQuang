<?php

use app\Model\InvoiceFunction;

$InvoiceFunction = new InvoiceFunction();
$invoice_id = $data['Invoice'][0]['id'];


?>

<div class="content-wrapper">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="invoice">
                    <h1>Hóa Đơn Bán Hàng</h1>
                    <div class="info">
                        <div class="sender-info">
                            <p><strong>Người Bán:</strong> Minh Quang Store</p>
                            <p><strong>Địa Chỉ:</strong> Bình Minh - Vĩnh Long</p>
                            <p><strong>Số Điện Thoại:</strong> 0123456789</p>
                        </div>
                        <div class="recipient-info">
                            <p><strong>Người Nhận Hàng:</strong> <?= $InvoiceFunction->Get_Invoice_Info($invoice_id, 'user_name'); ?></p>
                            <p><strong>Địa Chỉ:</strong> <?= $InvoiceFunction->Get_Invoice_Info($invoice_id, 'user_adress'); ?></p>
                            <p><strong>Số Điện Thoại:</strong> <?= $InvoiceFunction->Get_Invoice_Info($invoice_id, 'user_phone'); ?></p>
                            <p><strong>Ngày đặt hàng:</strong> <?= $InvoiceFunction->Get_Invoice_Info($invoice_id, 'Invoice_date'); ?></p>
                        </div>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Sản Phẩm</th>
                                <th>Số Lượng</th>
                                <th>Đơn Giá</th>
                                <th>Thành Tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?
                            $totalPrice = 0;
                            $InvoiceDetails = $InvoiceFunction->Get_Invoice_Details($invoice_id);
                            foreach ($InvoiceDetails as $InvoiceDetail) {
                            ?>
                                <tr>
                                    <td><?= $InvoiceDetail['product_name']?></td>
                                    <td><?= $InvoiceDetail['product_quantity']?></td>
                                    <td><?= number_format($InvoiceDetail['product_price'])?> VNĐ</td>
                                    <td><?= number_format($InvoiceDetail['product_quantity'] * $InvoiceDetail['product_price'])?> VNĐ</td>
                                </tr>
                            <? 
                        $totalPrice = $totalPrice + ($InvoiceDetail['product_quantity'] * $InvoiceDetail['product_price']);
                        } ?>
                        </tbody>
                    </table>
                    <div class="total">
                        <p><strong>Tổng Cộng:</strong> <?= number_format($totalPrice)?> VND</p>
                    </div>
                    <div class="thank-you">
                        <p>Cảm ơn quý khách đã mua hàng!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .invoice {
        max-width: 800px;
        margin: 20px auto;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
        border-radius: 8px;
        overflow: hidden;
    }

    h1,
    h2,
    p {
        margin: 0;
    }

    h1 {
        color: #2c3e50;
    }

    .info {
        margin-bottom: 20px;
    }

    .recipient-info,
    .sender-info {
        display: inline-block;
        width: 45%;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th,
    td {
        border: 1px solid #ddd;
        padding: 12px;
        text-align: left;
    }

    th {
        background-color: #2c3e50;
        color: #fff;
    }

    .total {
        margin-top: 20px;
        text-align: right;
    }

    .thank-you {
        margin-top: 20px;
        color: #777;
    }
</style>