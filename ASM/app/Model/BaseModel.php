<?php

namespace app\Model;

use app\Model\CrudInterface;
use app\Model\Database;
use PDO;
use Exception;
use app\Model\QueryBuilder;

abstract class BaseModel implements CrudInterface
{
    use QueryBuilder;


    private $_connection;

    // protected $name ="BaseModel";
    private $_query;

    public function __construct()
    {
        $this->_connection = new Database();
    }

    abstract public function getAllWithPaginate(int $limit, int  $offset);

    public function getAll()
    {
        $this->_query = "SELECT * FROM $this->tableName";

        return $this;
    }

    public function orderBy(string $order = 'ASC')
    {
        $this->_query = $this->_query . "order by " . $order;

        return $this;
    }


    // public function get()
    // {
    //     $stmt   = $this->_connection->pdo_get_connection()->prepare($this->_query);
    //     $stmt->execute();

    //     return $stmt->fetchAll(PDO::FETCH_ASSOC);
    // }

    public function getInfo($column)
    {
        $sqlQuery = "SELECT $this->selectField FROM $this->tableName $this->innerJoin $this->leftJoin $this->where $this->groupBy  $this->orderBy  $this->limit";
        $result = $this->_connection->pdo_query($sqlQuery);
        foreach ($result as $row) {
            return $row[$column];
        }
    }

    public function getOne($id)
    {
        return [];
    }


    public function limit(int $limit = 10)
    {
        $stmt   = $this->_connection->pdo_get_connection()->prepare($this->_query);
        $result = $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function remove(int $id): bool
    {
        return true;
    }
    public function updateData($table, $data, $condition = '', $collumn)
    {
        if (!empty($data)) {
            $updateStr = '';
            foreach ($data as $key => $value) {
                if ($key === $collumn) {
                    $updateStr;
                } else if ($value === '' || $value === null) {
                    $updateStr .= "$key=NULL,";
                } else {
                    $updateStr .= "$key='$value',";
                }
            }
            $updateStr = rtrim($updateStr, ',');
            $sql = "UPDATE $table SET $updateStr";
            if (!empty($condition)) {
                $sql = "UPDATE $table SET $updateStr WHERE $condition";
            }
            $status = $this->query($sql);
            if (!$status) return false;
        }
        return true;
    }

    public function deleteData($table, $condition = ''): bool
    {
        $sql = 'DELETE FROM ' . $table;
        if (!empty($condition)) {
            $sql = 'DELETE FROM ' . $table . ' WHERE ' . $condition;
        }
        $status = $this->query($sql);
        if (!$status) return false;
        return true;
    }
    public function query($sql)
    {
        try {
            $statement =  $this->_connection->pdo_get_connection()->prepare($sql);
            $statement->execute();
            return $statement;
        } catch (Exception $ex) {
            $mess = $ex->getMessage();
            echo $mess;
            die();
        }
    }
}
