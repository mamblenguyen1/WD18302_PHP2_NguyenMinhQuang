<?php

namespace src\Responsitories;


abstract class BaseModelAbstract
{   
    abstract public function CreateUser($user_name, $user_email, $user_phone, $user_password);
    abstract public function GetUser();
    abstract public function UpdateUser($user_name, $user_email, $user_phone,  $user_id);
    abstract public function DeleteUser($user_id, $status);


}
