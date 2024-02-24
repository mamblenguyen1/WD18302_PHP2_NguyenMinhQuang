<?php

use app\Helpers\status;
use app\Model\InvoiceFunction;
use app\Model\InvoiceModel;
$InvoiceFunction = new InvoiceFunction();
?>
<div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card">

        <div class="card">
            <a href="/?pages=InvoiceController/choose">
                <button type="button" class="btn btn-outline-primary" style="width: 200px; margin: 10px 30px;">Tạo hóa đơn</button>
            </a>

            <div class="card-body">

                <h4 class="card-title">Danh sách hóa đơn</h4>
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th> Mã hóa đơn </th>
                            <th> Tên khách hàng </th>
                            <th> Số sản phẩm </th>
                            <th> Trạng thái </th>
                            <th> Tổng hóa đơn </th>
                            <th> Thao tác </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?
                        $invoices = $InvoiceFunction->Get_All_Invoice();
                        foreach ($invoices as $invoice) {
                            $id = $invoice['Invoice_id'];

                        ?>
                            <tr>
                                <td class="py-1">
                                    #<?= $invoice['Invoice_id'] ?>
                                </td>
                                <td> <?= $invoice['user_name'] ?> </td>
                                <td>
                                    <?
                                    $InvoiceModel = new InvoiceModel();
                                   echo $InvoiceModel->CountInvoiceDetailById($id)['COUNT(Invoice_detail_id)'] ?>
                                </td>
                                <td>
                                    <? if ($invoice['status'] == 1) {
                                        echo '<label class="badge badge-primary">' . status::GetStatusInvoice()[status::DIRECTLY] . '</label>';
                                    } else  {
                                        echo '<label class="badge badge-info">' . status::GetStatusInvoice()[status::BANKING] . '</label>';
                                    } 
                                    ?>
                                </td>
                                <td> <?= number_format($invoice['total']) ?> đ</td>

                                <td>
                                    <a href="/?pages=InvoiceController/detail/<?= $invoice['Invoice_id'] ?>">
                                        <button type="button" class="btn btn-outline-success btn-icon-text"><i class="mdi mdi-alert btn-icon-prepend"></i> Chi tiết </button>

                                    </a>
                                    <a href="/?pages=InvoiceController/edit/<?= $invoice['Invoice_id'] ?>">

                                        <button type="button" class="btn btn-outline-info btn-icon-text"> Sửa <i class="mdi mdi-settings btn-icon-append"></i></button>
                                    </a>
                                    <form style="display: inline-block;" action="/?pages=InvoiceController/RemoveInvoice/<?= $invoice['Invoice_id'] ?>" method="post">
                                        <button type="submit" name="remove" class="btn btn-outline-danger btn-icon-text"> Xóa <i class="mdi mdi-alert btn-icon-prepend"></i></button>
                                    </form>
                                </td>
                            </tr>
                        <? } ?>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>

</body>

</html>