<?php

namespace app\Model;



class UserModel extends BaseModel{
    protected $name ="UserModel";
    public $tableName = 'user';
    public $id = '';

    public function getAllUser(){
        return $this->getAll()->get();
    }
    public function getInfoOneUserByName(){
        return $this->getAll()->get();
    }



    public function getLatestId()
    {
        return $this->select('MAX(user_id) as id')->first();
    }



    public function checkUserExist($user_name , $user_password){
        return $this->select()->where('user_name', '=', $user_name)->where('user_password', '=', $user_password)->first();
    }
    public function checkDuplicateUserName($user_name){
        return $this->select()->where('user_name', '=', $user_name)->first();
    }
    public function checkDuplicateUserEmail($user_email){
        return $this->select()->where('user_email', '=', $user_email)->first();
    }
    public function getInfoUserName($user_name, $column){
        return $this->select($column)->where('user_name', '=', $user_name)->first();
    }
    public function checkActive($user_name, $user_password){
        return $this->select()->where('user_name', '=', $user_name)->select()->where('user_password', '=', $user_password)->where('is_deleted', '=', 0)->first();
    }
    public function getAllWithPaginate(int $limit = 10,int  $offset = 0){
        // return $this->select()->where('email', '=', $email)->first();
    }

    public function registerUser($data, $column){
        return $this->insert($data ,$this->tableName, $column);
        // var_dump($this->insert($this->tableName ,$data));
    }
    public function updateUser($data, $field , $compare , $value){
        $condition = $this->where($field , $compare , $value  );
        return $this->update($data,$this->tableName,$condition);
    }
    public function create($data){

    }
}