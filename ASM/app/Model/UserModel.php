<?php

namespace app\Model;



class UserModel extends BaseModel{
    protected $name ="UserModel";
    public $tableName = 'user';
    public $id = '';

    public function getAllUser(){
        return $this->getAll()->get();
    }

    public function checkUserExist($email){
        return $this->select()->where('email', '=', $email)->first();
    }

    public function getInfoById($id, $column){
        return $this->where('user_id' , ' = ' , $id)->getInfo($column);
    }
    public function getAllWithPaginate(int $limit = 10,int  $offset = 0){
        // return $this->select()->where('email', '=', $email)->first();
    }

    public function CreateItem($data){
        return $this->insert($data ,$this->tableName);
    }
    public function updateItem($data, $field , $compare , $value){
        $condition = $this->where($field , $compare , $value);
        return $this->update($this->tableName,$data,$condition);
    }
    public function create($data){

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




    // protected $table = 'user';

    
    // public function getAllUser(){
    //     return $this->getAll()->get();
    // }

    // public function getOneUser($id){
    //     return $this->getAll()->get();
    // }
}


// <?php

// namespace App\Models;



// class UserModel extends BaseModel{
//     protected $name ="UserModel";
//     public $tableName = 'users';
//     public $id = '';

//     public function getAllUser(){
//         return $this->getAll()->get();
//     }

//     public function checkUserExist($email){
//         return $this->select()->where('email', '=', $email)->first();
//     }

//     public function getAllWithPaginate(int $limit = 10,int  $offset = 0){
//         // return $this->select()->where('email', '=', $email)->first();
//     }

//     public function registerUser($data){
//         return $this->insert($data ,$this->tableName);
//         // var_dump($this->insert($this->tableName ,$data));
//     }
//     public function updateUser($data, $field , $compare , $value){
//         $condition = $this->where($field , $compare , $value  );
//         return $this->update($data,$this->tableName,$condition);
//     }
//     public function create($data){

//     }
// }