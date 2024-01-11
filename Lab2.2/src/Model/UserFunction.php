<?php

namespace src\Model;

use src\Model\Database;

class UserFunction
{
    public $username;
    public $email;

    function Get_User_DB()
    {
        $db = new Database();
        $sql = "SELECT * FROM user";
        return $db->pdo_query($sql);
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
    function AddUser($user_name, $user_email, $user_phone, $user_password)
    {
        $db = new Database();
        $sql = "INSERT INTO `user` (`user_id`, `user_name`, `user_email`, `user_phone`, `is_deleted`, `created_at`, `updated_at`, `deleted_at`, `user_created`, `user_updated`, `user_deleted`, `user_password`) 
        VALUES (NULL, '$user_name', '$user_email', '$user_phone', '0', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, NULL, NULL, NULL, '$user_password');";
        return $db->pdo_execute($sql);
    }
    function UpdateUser($user_name, $user_email, $user_phone,  $user_id)
    {
        $db = new Database();
        $sql = "UPDATE `user` SET `user_name` = '$user_name', `user_email` = '$user_email', `user_phone` = '$user_phone' WHERE `user`.`user_id` = $user_id;";
        return $db->pdo_execute($sql);
    }

    function DeleteUser($user_id, $status)
    {
        $db = new Database();
        $sql = "UPDATE `user` SET user.is_deleted = $status WHERE `user`.`user_id` = $user_id;";
        $result = $db->pdo_execute($sql);
        return $result;
    }

    function CheckPass($user_id, $column)
    {

        $db = new Database();
        $sql = "SELECT * FROM `user` WHERE user_id = $user_id";
        $result = $db->pdo_query($sql);
        foreach ($result as $row) {
            return $row[$column];
        }
    }

    function ChangePassFunc($user_password , $user_id)
    {
        $db = new Database();
        $sql = "UPDATE `user` SET `user_password` = '$user_password' WHERE `user`.`user_id` = $user_id;";
        return $db->pdo_execute($sql);
    }

}
