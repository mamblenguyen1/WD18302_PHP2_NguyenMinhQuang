<?php

namespace app\Model;


//injection constructor
interface CrudInterface{
    
    /**
     * Phương thức getAll() dùng để lấy tất cả records
    */
    public function getAll();
    /**
     * Phương thức getOne() dùng để lấy một record
     * @param int $id
     * @return array $record
    */
    public function getOne(int $id);

    /**
     * Phương thức create dùng để tạo mới dữ liệu
     * @return mixed
    */
    public function create(array $data);


    public function update($data, $tableName,$id,$column);

    public function remove(int $id): bool;
}