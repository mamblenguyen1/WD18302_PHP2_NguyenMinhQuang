<?php
use app\Model\UserFunction;
$user = new UserFunction();
use app\Model\UserModel;
$userModel = new UserModel();

use app\Helpers\status;
?>

<?php
$user_id = $data['user'][0]['id'];
echo ($userModel->where('user_id' , ' = ' , $user_id)->getInfo('user_name'));
// $result = $userModel->getAll()->select('user_name')->where('user_id' , ' = ' , $user_id)->get();
// foreach($result as $item){
//     echo $item
// }
// exit();
// echo $user_id;
?>
<div class="main-panel">
    <div class="content-wrapper">

        <div class="card">
            <div class="card-body" style="padding: 20px 20px;">
                <div class="product-info">
                    <div class="info">
                        <h4 class="card-title" style="padding: 0;">Thông tin chi tiết khách hàng
                            : <?= $userModel->where('user_id' , ' = ' , $user_id)->getInfo('user_name')?></h4>
                        <div class="product-name">
                            <span style="font-weight: bold;">Tên tài khoản</span> <span class="info" style="margin-left: 3%;"> <?=$userModel->where('user_id' , ' = ' , $user_id)->getInfo('user_name') ?></span>
                        </div>
                        <div class="product-name">
                            <span style="font-weight: bold;">Địa chỉ</span> <span class="info" style="margin-left: 3%;"> <?=$userModel->where('user_id' , ' = ' , $user_id)->getInfo('user_adress') ?></span>
                        </div>
                        <div class="product-name">
                            <span style="font-weight: bold;">Email</span> <span class="info" style="margin-left: 3%;"> <?=$userModel->where('user_id' , ' = ' , $user_id)->getInfo('user_email') ?></span>
                        </div>
                        <div class="product-name">
                            <span style="font-weight: bold;">Cấp quyền </span> <span class="info" style="margin-left: 3%;">
                                <?
                                if ($userModel->getAll()->select('role_id')->where('user_id' , ' = ' , $user_id)->get() == 1) {
                                    echo '<label class="badge bg-primary">' . status::getRole()[status::ADMIN] . '</label>';
                                } else {
                                    echo '<label class="badge bg-danger">' . status::getRole()[status::USER] . '</label>';
                                }
                                ?>
                            </span>
                        </div>
                        <div class="product-name">
                            <span style="font-weight: bold;">Người tạo</span> <span class="info" style="margin-left: 3%;"><? $user_created = $user->getInfoUser($user_id, 'user_created');
                                                                                                                            if ($user_created > 0) {
                                                                                                                                echo $user->getInfoUser($user_created, 'user_name');
                                                                                                                            } else {
                                                                                                                                echo '';
                                                                                                                            } ?></span>
                        </div>
                        <div class="product-name">
                            <span style="font-weight: bold;">Người sửa</span> <span class="info" style="margin-left: 3%;"><? $user_updated = $user->getInfoUser($user_id, 'user_updated');
                                                                                                                            if ($user_updated > 0) {
                                                                                                                                echo $user->getInfoUser($user_updated, 'user_name');
                                                                                                                            } else {
                                                                                                                                echo '';
                                                                                                                            } ?></span>
                        </div>
                        <div class="product-name">
                            <span style="font-weight: bold;">Người xóa </span> <span class="info" style="margin-left: 3%;"><? $user_deleted = $user->getInfoUser($user_id, 'user_deleted');
                                                                                                                            if ($user_deleted > 0) {
                                                                                                                                echo $user->getInfoUser($user_deleted, 'user_name');
                                                                                                                            } else {
                                                                                                                                echo '';
                                                                                                                            } ?></span>
                        </div>
                    </div>
                    <!-- <div class="product-img">
                        <?php
                        // if ($user->getInfoUser($user_id, 'role_id') == 1) {
                        //     echo '
                        // <img width="200px" height="200px" src="assets/images/user_avatar/admin_avatar.png" alt="">
                        //         ';
                        // } else {
                        //     echo '
                        //         <img width="200px" height="200px" src="assets/images/user_avatar/user_avatar.jpg" alt="">
                        //         ';
                        // }

                        ?>
                    </div> -->
                </div>

            </div>

            <a style="padding: 20px 30px;" href="/?pages=UserController/list">
                <button type="submit" name="detail" class="btn btn-primary mr-2">Quay lại</button>
            </a>
        </div>

        </div>



        <style>
            .product-name span {
                text-align: right;
                width: 150px;
                display: inline-block;
                font-size: 16px;
            }

            .product-name .info {
                text-align: left;
                width: 300px;
                display: inline-block;
            }

            .product-name {
                padding: 5px 40px;
            }

            .product-info {
                position: relative;
            }

            .product-img {
                width: 200px;
                height: 200px;
                position: absolute;
                right: 10%;
                top: 20%;
            }

            .product-img img {
                box-shadow: 0 0 20px grey;

            }
        </style>
    </div>
