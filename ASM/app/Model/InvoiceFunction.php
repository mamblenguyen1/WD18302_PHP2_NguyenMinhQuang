<?php

namespace app\Model;


class InvoiceFunction
{
    function addInvoices($user_name, $user_adress, $user_phone)
    {
        $db = new Database();
        $sql = "INSERT INTO `invoices` (`Invoice_id`, `Invoice_date`, `status`, `user_name`, `user_adress`, `user_phone`) 
        VALUES (NULL, CURRENT_TIMESTAMP, '1', '$user_name', '$user_adress', '$user_phone');
         ";
        return $db->pdo_execute1($sql);
    }

    function Get_All_Invoice()
    {
        $db = new Database();
        $sql = "SELECT * FROM invoices";
        return $db->pdo_query($sql);
    }

    function addInvoicesDetails($Invoice_id, $product_id)
    {
        $db = new Database();
        $sql = "INSERT INTO `invoice_details` (`Invoice_detail_id`, `Invoice_id`, `product_id`, `product_quantity`) 
        VALUES (NULL, '$Invoice_id', '$product_id', '1');;
         ";
        return $db->pdo_execute($sql);
    }
  

    function Get_Invoice_Info($Invoice_id, $column)
    {
        $db = new Database();
        $sql = "SELECT * FROM `invoices` WHERE Invoice_id = $Invoice_id";
        $result = $db->pdo_query($sql);
        foreach ($result as $row) {
            return $row[$column];
        }
    }
    

    function Get_Invoice_Details($invoice_id)
    {
        $db = new Database();
        $sql = "SELECT * FROM products p , invoice_details i WHERE p.product_id = i.product_id
        AND i.Invoice_id = $invoice_id";
        return $db->pdo_query($sql);
    }
    function updateInvoiceDetails($product_quantity, $Invoice_detail_id)
    {
        $db = new Database();
        $sql = "  UPDATE `invoice_details` 
        SET  `product_quantity` = '$product_quantity' 
        WHERE `invoice_details`.`Invoice_detail_id` = $Invoice_detail_id ;
         ";
        return $db->pdo_execute($sql);
    }




    // update quantity duplicate

    function updateCartQty($product_id , $invoice_id)
    {
        $db = new Database();
        $select = "UPDATE invoice_details SET invoice_details.product_quantity = invoice_details.product_quantity + 1 
        WHERE invoice_details.product_id = $product_id 
        AND invoice_details.Invoice_id = $invoice_id";
        $result = $db->pdo_execute($select);
        return $result;
    }

    public function DuplicateCartProStorge($product_id , $Invoice_id, $productId)
    {
        $db = new Database();
        $select = "SELECT * FROM invoice_details
        WHERE invoice_details.product_id = $product_id
        AND invoice_details.Invoice_id = $Invoice_id
        ";
        $result = $db->pdo_query($select);
        foreach ($result as $row) {
            $nw = $row['product_id'];
            if ($productId == $nw) {
                return true;
            }
        }
    }




















    // function addNewInvoice($user_name, $user_adress, $user_phone, $product_id, $product_quantity)
    // {
    //     $db = new Database();
    //     $sql = "INSERT INTO invoices (user_name, user_adress, user_phone)
    //         VALUES ('$user_name', '$user_adress', '$user_phone');
    //         SET @last_invoice_id = LAST_INSERT_ID();
    //         INSERT INTO invoice_details (Invoice_id, product_id, product_quantity)
    //         VALUES (@last_invoice_id, $product_id, $product_quantity)";
    //     return $db->pdo_execute($sql);
    // }
}
