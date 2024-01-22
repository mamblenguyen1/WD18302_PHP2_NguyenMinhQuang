<?php

use app\Model\UserFunction;

$user = new UserFunction();

?>
<div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card">
        <div id="popup1" class="popup">
            <h2>Chọn tài khoản</h2>
            <ul class="product-list">
                <?
                $usersAll = $user->Get_User_DB_Active();
                foreach ($usersAll as $users) {
                ?>
                    <li>
                        <a href="?pages=InvoiceController/add/&id=<?= $users['user_id'] ?>" class="user-button">
                            <?= $users['user_name'] ?>
                            <span class="user-phone"><?= $users['user_adress'] ?></span>
                        </a>
                    </li>
                <? } ?>
            </ul>
            <button class="closeButton" onclick="hidePopup(1)">X</button>
        </div>

        <!-- Popup 2 -->
        <div id="popup2" class="popup" >
            <div class="card-body" >
                <h4 class="card-title">Thông tin hóa đơn</h4>
                <form class="forms-sample" action="/?pages=InvoiceController/addProduct" method="post" >
                    <div class="form-group">
                        <label for="exampleInputUsername1">Họ và tên</label>
                        <input type="text" class="form-control" name="user_name" placeholder="Họ tên khách hàng">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Địa chỉ nhận hàng</label>
                        <input type="text" class="form-control" name="user_adress" placeholder="Nhập địa chỉ nhận hàng">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Số điện thoại</label>
                        <input type="text" class="form-control" name="user_phone" placeholder="Nhập số điện thoại">
                    </div>

                    <button type="submit" name="addInfo" class="btn btn-gradient-primary me-2">Tạo hóa đơn</button>
                    <button type="button" onclick="hidePopup(2)">Đóng</button>

                </form>
            </div>
        </div>
        <div class="card choose">
            <!-- <label >
                <input type="radio" name="popupSelector" onclick="showPopup(1)">
                <span class="radio-button">Khách hàng đã có tài khoản</span>
            </label>

            <label >
                <input type="radio" name="popupSelector" onclick="showPopup(2)">
                <span class="radio-button">Khách vãng lai</span>
            </label> -->
            <div class="card-select">
            <div class="inputst" onclick="showPopup(1)">Khách hàng đã có tài khoản</div>
            <div class="inputst" onclick="showPopup(2)">Khách vãng lai</div>
        </div>
        </div>

       
    </div>
    <div id="overlay" class="overlay" onclick="hideAllPopups()"></div>

    <script>
        function showPopup(popupNumber) {
            document.getElementById('popup' + popupNumber).style.display = 'block';
            document.getElementById('overlay').style.display = 'block';
        }

        function hidePopup(popupNumber) {
            document.getElementById('popup' + popupNumber).style.display = 'none';
            document.getElementById('overlay').style.display = 'none';
        }

        function hideAllPopups() {
            document.getElementById('popup1').style.display = 'none';
            document.getElementById('popup2').style.display = 'none';
            document.getElementById('overlay').style.display = 'none';
        }
    </script>
</div>
</div>
</div>

<style>
 
    .card-select {
        display: flex;
        justify-content: space-around;
        align-items: center;
    }

    .inputst {
        background-color: #2980b9;
        width: 300px;
        margin: 30px;
        text-align: center;
        padding: 90px 20px;
        border-radius: 50%;
        box-shadow: 0 0 5px gray;
        color: white;
    }
    .inputst:hover{
        background-color: #4CAF50;
        color: white;
        font-weight: bold;
        cursor: pointer;
    }

    /* Style cho popup */
    .popup {
        display: none;
        position: fixed;
        width: 600px;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        z-index: 1000;
        max-height: 500px;
        overflow-y: auto;
    }

    /* Style cho overlay */
    .overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 999;
    }

    /* Style cho danh sách người dùng trong popup */
    .user-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .user-list li {
        margin-bottom: 10px;
    }

    ul.product-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    ul.product-list li {
        margin-bottom: 20px;
        box-sizing: border-box;
    }



    ul.product-list span {
        display: block;
        margin-top: 5px;
    }

    ul.product-list button {
        background-color: #3498db;
        color: #fff;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
        border-radius: 3px;
    }

    .user-button {
        display: flex;
        /* Use flexbox */
        align-items: center;
        /* Center items vertically */
        padding: 10px 15px;
        background-color: #4CAF50;
        /* Green background color */
        color: white;
        /* White text color */
        text-decoration: none;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 5px;
    }

    .user-phone {
        margin: 5px 30px;
        font-style: italic;
        color: #555;
        /* Dark gray text color */
    }

    .closeButton {
        position: absolute;
        top: 30px;
        right: 30px;
    }
</style>
</body>

</html>