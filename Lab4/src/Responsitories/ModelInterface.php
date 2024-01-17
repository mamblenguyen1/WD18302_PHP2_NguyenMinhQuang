<?php

namespace src\Responsitories;

interface ModelInterface
{

     public function CreateUser($user_name, $user_email, $user_phone, $user_password);
     public function GetUser();
     public function UpdateUser($user_name, $user_email, $user_phone,  $user_id);
     public function DeleteUser($user_id, $status);
}
