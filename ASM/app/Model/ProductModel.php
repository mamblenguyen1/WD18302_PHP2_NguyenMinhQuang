<?php

namespace app\Model;



class ProductModel extends BaseModel
{
    protected $name = "UserModel";
    public $tableName = 'products';
    public $id = '';

    public function getAllUser()
    {
        return $this->getAll()->get();
    }

    public function getInfoOneUserByName()
    {
        return $this->getAll()->get();
    }
    public function getLatestId()
    {
        return $this->select('MAX(product_id) as id')->first();
    }



    public function checkProductExist($product_name)
    {
        return $this->select()->whereLike('product_name',  $product_name)->first();
    }



    
    public function getInfoProductById($product_id)
    {
        return $this->select()->where('product_id', '=', $product_id)->first();
    }




    public function checkActive($user_name, $user_password)
    {
        return $this->select()->whereLike('user_name', $user_name)->select()->whereLike('user_password', $user_password)->where('is_deleted', '=', 0)->first();
    }

    public function registerUser($data, $column)
    {
        return $this->insert($data, $this->tableName, $column);
        // var_dump($this->insert($this->tableName ,$data));
    }
    // public function updateUser($data, $field, $compare, $value)
    // {
    //     $condition = $this->where($field, $compare, $value);
    //     return $this->update($data, $this->tableName, $condition);
    // }
    public function getInfoById($id, $column)
    {
        return $this->where('user_id', ' = ', $id)->getInfo($column);
    }
    public function getAllWithPaginate(int $limit = 10, int  $offset = 0)
    {
        // return $this->select()->where('email', '=', $email)->first();
    }
    // public function deleteUser($data, $field, $compare, $value)
    // {
    //     $condition = $this->where($field, $compare, $value);
    //     return $this->update($this->tableName, $data, $condition);
    // }

    
    public function CreateItem($data, $column)
    {
        return $this->insert($data, $this->tableName, $column);
    }
    public function updateItem($data, $field, $compare, $value)
    {
        $condition = $this->where($field, $compare, $value);
        return $this->update($this->tableName, $data, $condition , '');
    }
    public function create($data)
    {
    }
    function getInfoUser($user_id, $column)
    {
        $db = new Database();
        $sql = "SELECT * FROM user WHERE 
        user.user_id = $user_id";
        $result = $db->pdo_query($sql);
        foreach ($result as $row) {
            return $row[$column];
        }
    }
}
