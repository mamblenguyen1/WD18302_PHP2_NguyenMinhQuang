<div class="content-wrapper">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Thêm tài khoản</h4>
                <form class="forms-sample" method="post" action="?pages=UserController/handleCreate/">
                    <input type="hidden" name="user_created" value="<?= $_COOKIE['userID']?>">
                    <div class="form-group">
                        <label for="exampleInputName1">Tên tài khoản :</label>
                        <input type="text" name="user_name" class="form-control" id="exampleInputName1" placeholder="Nhập tên tài khoản">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Địa chỉ :</label>
                        <input type="text" name="user_adress" class="form-control" id="exampleInputEmail3" placeholder="Nhập Email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Email :</label>
                        <input type="text" name="user_email" class="form-control" id="exampleInputEmail3" placeholder="Nhập Email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword4">Số điện thoại :</label>
                        <input type="number" name="user_phone" class="form-control" id="exampleInputPassword4" placeholder="Nhập số điện thoại">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword4">Mật khẩu :</label>
                        <input type="text" name="user_password" class="form-control" id="exampleInputPassword4" placeholder="Nhập mật khẩu">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword4">Cấp quyền :</label>
                        <select name="role_id" class="form-control form-control-lg" id="exampleFormControlSelect1">
                            <option value="1">Admin</option>
                            <option value="2">User</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-gradient-primary me-2">Thêm</button>
                    <a href="/?pages=UserController/list">Quay lại</a>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>