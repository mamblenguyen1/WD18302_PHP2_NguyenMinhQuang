<?php

use app\Model\InvoiceFunction;
use app\Helpers\status;
use app\Model\InvoiceModel;

$InvoiceFunction = new InvoiceFunction();
// $invoice_id = $data['Invoice'][0]['id'];

// var_dump($data);
// die;
?>

<div class="content-wrapper">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <button class="btn btn-gradient-primary me-2" onclick="printInvoice()">In hóa đơn</button>

                <div id="invoiceContent" class="invoice" style="  max-width: 800px;
        margin: 20px auto;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
        border-radius: 8px;
        overflow: hidden;">
                    <h1 style="margin: 0; color: #2c3e50;">Hóa Đơn Bán Hàng</h1>
                    <div class="info" style="margin-bottom: 20px;">
                        <div class="sender-info" style="display: inline-block;
        width: 45%;">
                            <p style="margin: 0;"><strong>Người Bán:</strong> Minh Quang Store</p>
                            <p style="margin: 0;"><strong>Địa Chỉ:</strong> Bình Minh - Vĩnh Long</p>
                            <p style="margin: 0;"><strong>Số Điện Thoại:</strong> 0123456789</p>
                        </div>
                        <div class="recipient-info" style="display: inline-block;
        width: 45%;">
                            <p style="margin: 0;"><strong>Người Nhận Hàng:</strong> <?= $data['invoice']['user_name'] ?></p>
                            <p style="margin: 0;"><strong>Địa Chỉ:</strong> <?= $data['invoice']['user_adress']; ?></p>
                            <p style="margin: 0;"><strong>Số Điện Thoại:</strong> <?= $data['invoice']['user_phone']; ?></p>
                            <p style="margin: 0;"><strong>Ngày đặt hàng:</strong> <?= $data['invoice']['Invoice_date']; ?></p>
                        </div>
                    </div>
                    <table style=" width: 100%;
        border-collapse: collapse;
        margin-top: 20px;">
                        <thead>
                            <tr>
                                <th style="border: 1px solid #ddd;
        padding: 12px;
        text-align: left; background-color: #2c3e50;
        color: #fff;">Sản Phẩm</th>
                                <th style="border: 1px solid #ddd;
        padding: 12px;
        text-align: left;background-color: #2c3e50;
        color: #fff;">Số Lượng</th>
                                <th style="border: 1px solid #ddd;
        padding: 12px;
        text-align: left;background-color: #2c3e50;
        color: #fff;">Đơn Giá</th>
                                <th style="border: 1px solid #ddd;
        padding: 12px;
        text-align: left;background-color: #2c3e50;
        color: #fff;">Thành Tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?
                            $totalPrice = 0;
                            $InvoiceModel = new InvoiceModel();

                            $InvoiceDetails = $InvoiceModel->getProductNameFromInvoice($data['invoice']['Invoice_id']);
                            // var_dump($InvoiceDetails);
                            // die;
                            foreach ($InvoiceDetails as $InvoiceDetail) {

                            ?>
                                <tr>
                                    <td style="border: 1px solid #ddd;
        padding: 12px;
        text-align: left;"><?= $InvoiceDetail['product_name'] ?></td>
                                    <td style="border: 1px solid #ddd;
        padding: 12px;
        text-align: left;"><?= $InvoiceDetail['invoiceQuantity'] ?></td>
                                    <td style="border: 1px solid #ddd;
        padding: 12px;
        text-align: left;"><?= number_format($InvoiceDetail['product_price']) ?> VNĐ</td>
                                    <td style="border: 1px solid #ddd;
        padding: 12px;
        text-align: left;"><?= number_format($InvoiceDetail['invoiceQuantity'] * $InvoiceDetail['product_price']) ?> VNĐ</td>
                                </tr>
                            <?
                                $totalPrice = $totalPrice + ($InvoiceDetail['invoiceQuantity'] * $InvoiceDetail['product_price']);
                            } ?>
                        </tbody>
                    </table>
                    <div class="total" style=" margin-top: 20px;
        text-align: right;">
                        <p><strong>Hình thức thanh toán:</strong> <? 
                        if ($invoice['status'] == 1) {
                            echo '<label>' . status::GetStatusInvoice()[status::DIRECTLY] . '</label>';
                        } else  {
                            echo '<label >' . status::GetStatusInvoice()[status::BANKING] . '</label>';
                        } 
                        ?></p>
                    </div>
                    <div class="total" style=" margin-top: 20px;
        text-align: right;">
                        <p><strong>Tổng Cộng:</strong> <?= number_format($totalPrice) ?> VND</p>
                    </div>
                    
                    <div class="thank-you" style=" margin-top: 20px;
        color: #777;">
                        <p>Cảm ơn quý khách đã mua hàng!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function printInvoice() {
        var printContent = document.getElementById("invoiceContent").innerHTML;
        var originalContent = document.body.innerHTML;

        document.body.innerHTML = printContent;

        window.print();

        // Khôi phục nội dung ban đầu
        document.body.innerHTML = originalContent;
    }
</script>
