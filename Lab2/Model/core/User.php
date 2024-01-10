<?php
   namespace Lab2\Model\core;
   

class User
{
    private $Id = null;
    private $UserName = null;
    private $PassWord = null;
    private $Email = null;
    private $Address = null;
    private $Phone = null;
    private $create_at = null;
    private $updated_at = null;
    private $Role_id = null;
    private $is_deleted	 = null;
    function getUserAll()
    {
            $db = new database();
            $select = "SELECT * from user ";
            return $db->pdo_query($select);

    }
    function countall_user()
    {
            $db = new database();
            $select = "SELECT COUNT(user_id) as number FROM user";
            return $db->pdo_query_one($select);


    }

    public function Insert_users($UserName, $PassWord, $Email, $Role_id, $Phone, $Address,$is_deleted, $user_id)
    {
            $db = new database();

            $select = "INSERT INTO user(user_name,email,user_phone_number,user_address,user_password,role_id,is_deleted,user_created,user_updated)
            VALUES(?,?,?,?,?,?,?,?,?)";
            $result = $db->pdo_execute($select, $UserName, $Email, $Phone, $Address, $PassWord, $Role_id, $is_deleted, $user_id, $user_id);
            return $result;

    }
    public function deleteuser($Id , $user_id)
    {
            $db = new database();
            $select = "UPDATE user SET is_deleted = 1, user_deleted = $user_id WHERE user_id = '$Id'";
            $result = $db->pdo_execute($select);
            return $result;

    }
    public function edituser($UserName, $Role_id, $Phone, $Address, $Id, $user_id)
    {
            $db = new database();
            $select = "UPDATE user SET user_name =? , role_id = ?,
            user_phone_number=? , user_address = ?, user_updated = ? where user_id =? ";
            $result = $db->pdo_execute($select, $UserName, $Role_id, $Phone, $Address, $user_id, $Id);
            return $result;

    }
    public function updateIsdeleted($user_id)
    {
            $db = new database();
            $select = "UPDATE user SET is_deleted = ? WHERE user_id = ?";
            $result = $db->pdo_execute($select, 0, $user_id);
            return $result;
    }

    public function getUserCreated($user_created) {
        $db = new database();
        $select = "SELECT user_name FROM user WHERE user_id = $user_created";
        $result = $db->pdo_query_one($select);
        return $result;
   }
    public function getUserUpdate($user_updated) {
        $db = new database();
        $select = "SELECT user_name FROM user WHERE user_id = $user_updated";
        $result = $db->pdo_query_one($select);
        return $result;
    }

    public function select_id_user($id)
    {
            $db = new database();

            $select = "SELECT * FROM user WHERE user_id  = '$id'";
            $result = $db->pdo_query_one($select);
            return $result;
        

    }
    function getInfoUser($id, $column)
    {
        $db = new database();
        $sql = "SELECT * FROM user WHERE user_id  = '$id'";
        $result = $db->pdo_query($sql);
        foreach ($result as $row) {
            return $row[$column];
        }
    }
    function getInfoUserAction($id, $column)
    {
            $db = new database();
            $sql = " SELECT user_name FROM `user`
        WHERE user.user_id = (
            SELECT $column FROM user
            WHERE user_id = $id
        )";
            $result = $db->pdo_query($sql);
            foreach ($result as $row) {
                return $row['user_name'];
            }
        
    }

    function plus($a , $b){
    echo $a + $b ;

    }


}
?>