<?php
require_once '../../vendor/autoload.php';

use src\Model\UserFunction;

$user = new UserFunction();
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />


<link rel="stylesheet" href="../../Assets/css/style.css">
<?

if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
}
if (isset($_POST['edit'])) {
    $user_id = $_POST['user_id'];
    $userName = $_POST['userName'];
    $userEmail = $_POST['userEmail'];
    $userPhone = $_POST['userPhone'];
    $emailPattern = '/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
    $phonePattern = '/^0\d{9,10}$/';
    if (
        !$user_id == '' &&
        !$userName == '' &&
        !$userEmail == '' &&
        !$userPhone == ''
    ) {
        if (preg_match($emailPattern, $userEmail)) {
            if (preg_match($phonePattern, $userPhone)) {
                $user->UpdateUser($userName, $userEmail,  $userPhone, $user_id);
                echo '<script> alert("Cập nhật thông tin thành công ! ! ")</script>';
                echo '<script> window.location.href="../../index.php"</script>';
            } else {
                echo '<script>alert("Sai định dạng số điện thoại !")</script>';
                echo '<script> window.location.href="edit_user.php?user_id=' . $user_id . '"</script>';
            }
        } else {
            echo '<script>alert("Định dạng Email không hợp lệ !")</script>';
            echo '<script> window.location.href="edit_user.php?user_id=' . $user_id . '"</script>';
        }
    } else {
        echo '<script> alert("Xin vui lòng nhập đủ thông tin")</script>';
    }
}

?>
<div class="form-edit">
    <form action="" method="post">
        <input type="hidden" name="user_id" value="<?= $user->getInfoUser($user_id, 'user_id') ?>">
        <div class="mb-3">
            <label for="" class="form-label">Tên đăng nhập</label>
            <input type="text" class="form-control" name="userName" id="" value="<?= $user->getInfoUser($user_id, 'user_name') ?>" />
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Số điện thoại</label>
            <input type="text" class="form-control" name="userPhone" id="" value="<?= $user->getInfoUser($user_id, 'user_phone') ?>" />
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Email</label>
            <input type="text" class="form-control" name="userEmail" id="" value="<?= $user->getInfoUser($user_id, 'user_email') ?>" />
        </div>

        <div class="d-flex gap-2">
            <a name="" id="" class="btn btn-primary" style="width: 50%; display: inline;" href="../../index.php" role="button">Quay lại</a>
            <button type="submit" style="width: 50%; display: inline;" name="edit" id="" class="btn btn-primary">
                Cập nhật
            </button>
        </div>

    </form>


</div>


</div>