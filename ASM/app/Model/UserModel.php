<?php

namespace app\Model;



class UserModel extends BaseModel{
    
    protected $table = 'user';

    
    public function getAllUser(){
        return $this->getAll()->get();
    }

    public function getOneUser($id){
        return $this->getAll()->get();
    }
}