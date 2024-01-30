<?php

namespace app\Model;

use app\Responsitories\AbstractUserFunction;

class UserFunction extends AbstractUserFunction
{
    public $username;
    public $email;

    
    function Get_User_DB()
    {
        $db = new Database();
        $sql = "SELECT * FROM user";
        return $db->pdo_query($sql);
    }
    function Get_User_DB_limit($limit)
    {
        $db = new Database();
        $sql = "SELECT * FROM user Limit $limit";
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


    function AddUser($user_name, $user_adress, $user_phone, $user_password, $role_id)
    {
        $db = new Database();
        $sql = "INSERT INTO `user` (`user_id`, `user_name`, `user_adress`, `user_phone`, `is_deleted`, `created_at`, `updated_at`, `deleted_at`, `user_created`, `user_updated`, `user_deleted`, `user_password`, `role_id`)
         VALUES (NULL, '$user_name', '$user_adress', '$user_phone', 0, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, NULL, NULL, NULL, '$user_password', $role_id);";
        return $db->pdo_execute($sql);
    }
    function Register($user_name, $user_email, $user_password)
    {
        $db = new Database();
        $sql = "INSERT INTO `user` (`user_id`, `user_name`, `user_email`,  `is_deleted`, `created_at`, `updated_at`, `deleted_at`, `user_created`, `user_updated`, `user_deleted`, `user_password`, `role_id`,`user_adress`)
         VALUES (NULL, '$user_name', '$user_email', 0, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, NULL, NULL, NULL, '$user_password', 1 , NULL);";
        return $db->pdo_execute1($sql);
    }
    function UpdateUser($user_name, $user_adress, $user_phone,  $user_id, $role_id)
    {
        $db = new Database();
        $sql = "UPDATE `user` SET `user_name` = '$user_name', `user_adress` = '$user_adress', `user_phone` = '$user_phone' , `role_id` = $role_id WHERE `user`.`user_id` = $user_id;";
        return $db->pdo_execute($sql);
    }

    function DeleteUser($user_id, $status)
    {
        $db = new Database();
        $sql = "UPDATE `user` SET user.is_deleted = $status WHERE `user`.`user_id` = $user_id;";
        $result = $db->pdo_execute($sql);
        return $result;
    }
    public function checkActive($user_name, $user_password)
    {
        $db = new Database();
        $select = "SELECT * FROM user WHERE user_name = '$user_name' AND user_password = '$user_password'  AND is_deleted = 1 ";
        $result = $db->pdo_query_one($select);
        if ($result != null)
            return true;
        else
            return false;
    }

    public function checkAccount($user_name, $user_password)
    {
        $db = new Database();
        $select = "SELECT * FROM user WHERE user_name = '$user_name' AND user_password = '$user_password'";
        $result = $db->pdo_query_one($select);
        if ($result != null)
            return true;
        else
            return false;
    }
    function getInfoUserName($user_name, $column)
    {
        $db = new Database();
        $sql = "SELECT * FROM user WHERE user_name ='$user_name'";
        $result = $db->pdo_query($sql);
        foreach ($result as $row) {
            return $row[$column];
        }
    }

    public function checkDuplicateUser($table,$column,$userAccount)
    {
        $db = new Database();
        $select = "SELECT * FROM $table";
        $result = $db->pdo_query($select);
        foreach ($result as $row) {
            $nw = $row[$column];
            if ($userAccount == $nw) {
                return true;
            }
        }
    }

}
