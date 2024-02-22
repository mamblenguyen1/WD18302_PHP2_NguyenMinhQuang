<?php

namespace app\Model;



class InvoiceModel extends BaseModel
{
    public $tableName = 'invoices';
    public $id = '';

    public function getAllInvoiceToDay($day , $month , $year)
    {
        return $this->getAll()->where('DAY(Invoice_date)', '=', $day)->where('MONTH(Invoice_date)', '=', $month)->where('YEAR(Invoice_date)', '=', $year)->get();
    }

    public function getIdFormInvoiceDetail($Invoice_id)
    {
        // $this->select('Invoice_detail_id')->table('invoice_details')->where('Invoice_id' , '=', $Invoice_id)->get();
        return $this->select('Invoice_detail_id')->table('invoice_details')->where('Invoice_id' , '=', $Invoice_id)->get();
    }

    public function CountInvoiceDetailById($Invoice_id)
    {
        // $this->select('Invoice_detail_id')->table('invoice_details')->where('Invoice_id' , '=', $Invoice_id)->get();
        return $this->select('COUNT(Invoice_detail_id)')->table('invoice_details')->where('Invoice_id' , '=', $Invoice_id)->first();
    }

    public function getInfoOneUserByName()
    {
        return $this->getAll()->get();
    }
    public function getLatestId()
    {
        return $this->select('MAX(invoice_id) as id')->first();
    }

    public function checkUserExist($user_name, $user_password)
    {
        return $this->select()->whereLike('user_name',  $user_name)->whereLike('user_password',  $user_password)->first();
    }
    public function checkDuplicateUserName($user_name)
    {
        return $this->select()->whereLike('user_name', $user_name)->first();
    }
    public function checkDuplicateUserEmail($user_email)
    {
        return $this->select()->whereLike('user_email',  $user_email)->first();
    }

    
    public function getInfoUserName($invoice_id, $column)
    {
        return $this->select($column)->where('invoice_id', '=', $invoice_id)->first();
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
    public function updateUser($data, $field, $compare, $value)
    {
        $condition = $this->where($field, $compare, $value);
        return $this->update($data, $this->tableName, $condition);
    }
    public function getInfoById($id, $column)
    {
        return $this->where('user_id', ' = ', $id)->getInfo($column);
    }
    public function getAllWithPaginate(int $limit = 10, int  $offset = 0)
    {
        // return $this->select()->where('email', '=', $email)->first();
    }
    public function deleteUser($data, $field, $compare, $value)
    {
        $condition = $this->where($field, $compare, $value);
        return $this->update($this->tableName, $data, $condition);
    }

    public function removeItem($Invoice_detail_id){
        return $this->deleteData('invoice_details', "Invoice_detail_id = $Invoice_detail_id");
    }

    public function removeInvoice($Invoice_id){
        return $this->deleteData('invoices', "Invoice_id = $Invoice_id");
    }
    public function CreateItem($data, $column)
    {
        return $this->insert($data, $this->tableName, $column);
    }
    public function updateItem($data, $field, $compare, $value)
    {
        $condition = $this->where($field, $compare, $value);
        return $this->update($this->tableName, $data, $condition);
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
