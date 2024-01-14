<?
include 'app/View/admin/include/header.php';
include 'app/View/admin/include/sidebar.php';
?>
<div class="content-wrapper">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Cập nhật tài khoản</h4>
                <form class="forms-sample">
                    <div class="form-group">
                        <label for="exampleInputName1">Tên tài khoản :</label>
                        <input type="text" name="product_name" class="form-control" id="exampleInputName1" placeholder="Nhập tên khách hàng">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Email :</label>
                        <input type="number" name="product_price" class="form-control" id="exampleInputEmail3" placeholder="Nhập Email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword4">Số điện thoại :</label>
                        <input type="number" name="product_quantity" class="form-control" id="exampleInputPassword4" placeholder="Nhập số điện thoại">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword4">Cấp quyền :</label>
                        <select class="form-control form-control-lg" id="exampleFormControlSelect1" fdprocessedid="7bufqn">
                            <option>Admin</option>
                            <option>User</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                    <a href="index.php?pages=user&action=list">Quay lại</a>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<?
include 'app/View/admin/include/footer.php';
?>