<?

function get_user($user_name)
{
    $db = new connect();
    $sql = "SELECT * FROM user WHERE user_name LIKE '%$user_name%'";
    return $db->pdo_query_one($sql);
}
?>