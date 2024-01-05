<?


function get_user()
{
    $db = new connect();
    $sql = "SELECT * FROM user";
    return $db->pdo_query($sql);
}

function getInfoUser($user_id, $column)
{
    $db = new connect();
    $sql = "SELECT * FROM user WHERE user_id = $user_id";
    $result = $db->pdo_query($sql);
    foreach ($result as $row) {
        return $row[$column];
    }
}

function Edit_User($user_name, $user_email, $user_phone, $user_id)
{
    $db = new connect();
    $select = "UPDATE user SET user_name  = '$user_name', user_email = '$user_email', user_phone = '$user_phone'
    WHERE user_id = $user_id";
    return $db->pdo_execute($select);
}
function visible_user($user_id , $type)
{
    $db = new connect();
    $select = "UPDATE user SET is_deleted = $type 
    WHERE user_id = $user_id";
    return $db->pdo_execute($select);
}
function add_account($userName, $email, $password , $phone)
{
        $db = new connect();
        $sql = "INSERT INTO `user` (`user_id`, `user_name`, `user_email`, `user_phone`, `is_deleted`, `created_at`, `updated_at`, `deleted_at`, `user_created`, `user_updated`, `user_deleted`, `user_password`) 
        VALUES (NULL, '$userName', '$email', '$phone', 0, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, NULL, NULL, NULL, '$password');";
        return $db->pdo_execute($sql);
    
}

