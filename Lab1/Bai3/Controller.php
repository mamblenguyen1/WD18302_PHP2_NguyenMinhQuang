<?
include 'Model.php';
if(isset($_POST['submit'])){
    $user_name = $_POST['user_name'];
    $user = get_user($user_name);
}
include 'View.php';


?>

