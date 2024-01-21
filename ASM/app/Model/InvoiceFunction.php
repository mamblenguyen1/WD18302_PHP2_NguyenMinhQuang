<?php

namespace app\Model;


class InvoiceFunction
{
    function addNewInvoice($user_name, $user_adress, $user_phone, $product_id, $product_quantity)
    {
        $db = new Database();
        $sql = "INSERT INTO invoices (user_name, user_adress, user_phone)
            VALUES ('$user_name', '$user_adress', '$user_phone');
            SET @last_invoice_id = LAST_INSERT_ID();
            INSERT INTO invoice_details (Invoice_id, product_id, product_quantity)
            VALUES (@last_invoice_id, $product_id, $product_quantity)";
        return $db->pdo_execute($sql);
    }
}
