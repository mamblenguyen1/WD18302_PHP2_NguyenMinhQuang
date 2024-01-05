<?
// include 'Model/Model.php';
$users = get_user();
if(isset($_POST['delete'])){
    $user_id = $_POST['user_id'];
    visible_user($user_id, 1);
    echo '<script>alert("Tài khoản đã bị vô hiệu hóa !!!")</script>';
    echo '<script>window.location.href="index.php"</script>';

}
if(isset($_POST['recovery'])){
    $user_id = $_POST['user_id'];
    visible_user($user_id, 0);
    echo '<script>alert("Tài khoản đã được khôi phục !!!")</script>';
    echo '<script>window.location.href="index.php"</script>';

}

if(isset($_POST['add'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    if(
        !$username == '' &&
        !$email == '' &&
        !$password == '' &&
        !$phone == '' 
    ){
        add_account($username, $email, $password , $phone);
        echo '<script>alert("Thêm tài khoản thành công !!!")</script>';
    }else{
        echo '<script>alert("Saii !!!")</script>';
        
    }
}
// include 'Views/View.php';
