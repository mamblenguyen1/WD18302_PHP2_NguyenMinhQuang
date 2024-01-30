<?php

namespace app\Model;

use app\Model\CrudInterface;
use app\Model\Database;
use PDO;

abstract class BaseModel implements CrudInterface
{


    public $tableName = '';
    public $selectField = '*';
    public $limit = '';
    public $orderBy = '';
    public $innerJoin = '';
    public $insert = '';
    public $leftJoin = '';
    public $groupBy = '';




    protected $table;

    public $where = '';
    public $operator = '';

    private $_connection;

    private $_query;

    public function __construct()
    {
        $this->_connection = new Database();
    }

 

    public function getAll()
    {
        $this->_query = "SELECT * FROM $this->table ";

        return $this;
    }

    public function select($field = "*")
    {
        $this->selectField = $field;
        return $this;
    }

    public function where($field, $compare, $value)
    {
        $this->operator = " WHERE";
        if (!empty($this->where)) {
            $this->operator = " AND ";
            $this->where .= "$this->operator $field $compare $value";
        } else {
            // Kiểm tra nếu giá trị $value là một biểu thức SQL, không cần thêm dấu nháy đơn
            if (strpos($value, ' ') !== false) {
                $this->where .= "$this->operator $field $compare $value";
            } else {
                $this->where .= "$this->operator $field $compare '$value'";
            }
        }
        return $this;
    }
    
    public function orderBy(string $order = 'ASC')
    {
        $this->_query = $this->_query . "order by " . $order;

        return $this;
    }

    // public function get()
    // {
    //     $stmt   = $this->_connection->pdo_execute($this->_query);
    //     // return $stmt->fetchAll(PDO::FETCH_ASSOC);
    //     return $stmt ;
    // }

    public function get()
    {
        // echo $this->innerJoin;
        $sqlQuery = "SELECT $this->selectField FROM $this->table $this->innerJoin $this->leftJoin $this->where $this->groupBy  $this->orderBy  $this->limit";                                                                                                           
        $stmt   = $this->_connection->pdo_execute($sqlQuery);
        // return $stmt ;
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        // if (!empty($query)) return $query->fetchAll(PDO::FETCH_ASSOC);
        // return false;
    }

    public function getInfo($column){
        $sqlQuery = "SELECT $this->selectField FROM $this->table $this->innerJoin $this->leftJoin $this->where $this->groupBy  $this->orderBy  $this->limit";                                                                                                           
        $result = $this->_connection->pdo_query($sqlQuery);
        foreach ($result as $row) {
            return $row[$column];
        }
    }

    public function limit(int $limit = 10)
    {
        $stmt   = $this->_connection->pdo_execute($this->_query);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function getOne(int $id)
    {
        return [];
    }
    public function create(array $data)
    {
    }
    public function update(int $id, array $data)
    {
    }
    public function remove(int $id): bool
    {
        return true;
    }


}