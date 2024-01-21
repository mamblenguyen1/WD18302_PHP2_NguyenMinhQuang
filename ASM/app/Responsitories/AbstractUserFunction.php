<?php


namespace app\Responsitories;

abstract class AbstractUserFunction{
   abstract function Get_User_DB();
   abstract function Get_User_DB_limit($limit);
   abstract function getInfoUser($user_id, $column);
   abstract function AddUser($user_name, $user_email, $user_phone, $user_password , $role_id);
   abstract function UpdateUser($user_name, $user_email, $user_phone,  $user_id, $role_id);
   abstract function DeleteUser($user_id, $status);
   abstract function CheckPass($user_id, $column);
   abstract function ChangePassFunc($user_password , $user_id);
}

