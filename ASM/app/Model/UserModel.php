<?php

namespace app\Model;



class UserModel extends BaseModel
{
    protected $name = "UserModel";
    public $tableName = 'user';
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
        return $this->select('MAX(user_id) as id')->first();
    }
    public function getInfoPUserById($user_id)
    {
        return $this->select()->where('user_id', '=', $user_id)->first();
    }

    public function CountUserAccount()
    {
        return $this->select('COUNT(user_id)')->where('role_id', '=', 2)->first();
    }
    public function CountUserAdmin()
    {
        return $this->select('COUNT(user_id)')->where('role_id', '=', 1)->first();
    }
    public function CountUserInvoices($month , $year)
    {
        return $this->select('COUNT(Invoice_id)')->table('invoices')->where('MONTH(Invoice_date)', '=', $month)->where('YEAR(Invoice_date)', '=', $year)->first();
    }
    public function checkUserExist($user_name, $user_password)
    {
        return $this->select()->whereLike('user_name',  $user_name)->whereLike('user_password',  $user_password)->first();
    }



    public function checkDuplicateUserName($user_name)
    {
        $user_name = strval($user_name);
        return $this->select()->where('user_name', ' = ',  $user_name)->first();
    }

    public function checkDuplicateUserPass($user_password)
    {
        return $this->select()->whereLike('user_password',  $user_password)->first();
    }





    public function checkDuplicateUserEmail($user_email)
    {
        return $this->select()->whereLike('user_email',  $user_email)->first();
    }

    public function getInfoUserName($user_name, $column)
    {
        return $this->select($column)->where('user_name', '=', $user_name)->first();
    }
    public function checkActive($user_name)
    {
        return $this->select()->whereLike('user_name', $user_name)->where('is_deleted', '=', 0)->first();
    }
    public function checkUserRole($user_name)
    {
        return $this->select()->whereLike('user_name', $user_name)->where('role_id', '=', 1)->first();
    }
    public function registerUser($data, $column)
    {
        return $this->insert($data, $this->tableName, $column);
        // var_dump($this->insert($this->tableName ,$data));
    }
    public function updateUser($data, $field, $compare, $value, $column)
    {
        $condition = $this->where($field, $compare, $value);
        return $this->update($data, $this->tableName, $condition, $column);
    }
    public function getInfoById($id, $column)
    {
        return $this->where('user_id', ' = ', $id)->getInfo($column);
    }
    public function getAllWithPaginate(int $limit = 10, int  $offset = 0)
    {
        // return $this->select()->where('email', '=', $email)->first();
    }
    public function deleteUser($data, $field, $compare, $value, $column)
    {
        $condition = $this->where($field, $compare, $value);
        return $this->update($this->tableName, $data, $condition, $column);
    }


    public function CreateItem($data, $column)
    {
        return $this->insert($data, $this->tableName, $column);
    }
    public function updateItem($data, $field, $compare, $value, $column)
    {
        $condition = $this->where($field, $compare, $value);
        return $this->update($this->tableName, $data, $condition, $column);
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
