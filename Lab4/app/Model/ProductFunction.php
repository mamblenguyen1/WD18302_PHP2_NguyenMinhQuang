<?php

namespace app\Model;
use app\Responsitories\AbstractProductFunction;
class ProductFunction extends AbstractProductFunction
{

    function Get_Product_DB()
    {
        $db = new Database();
        $sql = "SELECT * FROM products";
        return $db->pdo_query($sql);
    }
    function Get_Product_DB_limit($limit)
    {
        $db = new Database();
        $sql = "SELECT * FROM products Limit $limit";
        return $db->pdo_query($sql);
    }
    function getInfoProduct($product_id, $column)
    {
        $db = new Database();
        $sql = "SELECT * FROM products WHERE 
        products.product_id = $product_id";
        $result = $db->pdo_query($sql);
        foreach ($result as $row) {
            return $row[$column];
        }
    }


    function AddProduct($product_name, $product_price, $product_quantity, $product_description, $product_img)
    {
        $db = new Database();
        $sql = "INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_quantity`, `product_description`, `product_img`, `created_user`, `created_at`, `updated_user`, `updated_at`, `deleted_user`, `deleted_at`, `is_deleted`) 
        VALUES (NULL, '$product_name', $product_price, $product_quantity, '$product_description ', '$product_img', NULL, NULL, NULL, NULL, NULL, NULL, '0');";
        return $db->pdo_execute($sql);
    }
    function UpdateProduct($product_name, $product_price, $product_quantity,  $product_description, $product_img, $product_id)
    {
        $db = new Database();
        $sql = "UPDATE `products` SET 
        `product_name` = '$product_name', 
        `product_price` = $product_price,
        `product_quantity` = $product_quantity,
        `product_description` = '$product_description', 
        `product_img` = '$product_img' 
        WHERE `products`.`product_id` = $product_id;";
        return $db->pdo_execute($sql);
    }

    function DeleteProduct($product_id, $status)
    {
        $db = new Database();
        $sql = "UPDATE `products` SET products.is_deleted = $status WHERE `products`.`product_id` = $product_id;";
        $result = $db->pdo_execute($sql);
        return $result;
    }

}
