<?php


namespace app\Responsitories;

abstract class AbstractProductFunction{
   abstract function Get_Product_DB();
   abstract function Get_Product_DB_limit($limit);
   abstract function getInfoProduct($product_id, $column);
   abstract function AddProduct($product_name, $product_price, $product_quantity, $product_description, $product_img);
   abstract function UpdateProduct($product_name, $product_price, $product_quantity,  $product_description, $product_img, $product_id);
   abstract function DeleteProduct($product_id, $status);
}

