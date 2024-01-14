<?
include 'app/View/admin/include/header.php';
include 'app/View/admin/include/sidebar.php';
?>
<div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card">

        <div class="card">
            <a href="?pages=user&action=add">
                <button type="button" class="btn btn-outline-primary" style="width: 200px; margin: 10px 30px;">Thêm sản phẩm</button>
            </a>

            <div class="card-body">

                <h4 class="card-title">Danh sách khách hàng</h4>
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th> Tên tài khoản </th>
                            <th> Email </th>
                            <th> Số điện thoại </th>
                            <th> Trạng thái </th>
                            <th> Thao tác </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="py-1">
                                Người dùng 1
                            </td>
                            <td> nd1@gmail.com </td>
                            <td>
                                123456789
                            </td>
                            <td>
                                <label class="badge badge-primary">Hiện</label>
                                <label class="badge badge-danger">Ẩn</label>

                            </td>
                            <td>
                                <a href="?pages=user&action=detail">
                                    <button type="button" class="btn btn-outline-success btn-icon-text" fdprocessedid="zlcdq9"><i class="mdi mdi-alert btn-icon-prepend"></i> Chi tiết  </button>

                                </a>
                                <a href="?pages=user&action=edit">

                                <button type="button" class="btn btn-outline-info btn-icon-text"> Sửa <i class="mdi mdi-settings btn-icon-append"></i></button>
                                </a>

                                <button type="button" class="btn btn-outline-danger btn-icon-text"> Xóa <i class="mdi mdi-alert btn-icon-prepend"></i></button>
                            </td>
                        </tr>

                        <tr>
                            <td class="py-1">
                                Người dùng 1
                            </td>
                            <td> nd1@gmail.com </td>
                            <td>
                                123456789
                            </td>
                            <td>
                                <label class="badge badge-primary">Hiện</label>
                                <label class="badge badge-danger">Ẩn</label>

                            </td>
                            <td>
                                <a href="?pages=product&action=detail">
                                    <button type="button" class="btn btn-outline-success btn-icon-text" fdprocessedid="zlcdq9"><i class="mdi mdi-alert btn-icon-prepend"></i> Chi tiết  </button>

                                </a>
                                <a href="?pages=product&action=edit">

                                <button type="button" class="btn btn-outline-info btn-icon-text"> Sửa <i class="mdi mdi-settings btn-icon-append"></i></button>
                                </a>

                                <button type="button" class="btn btn-outline-danger btn-icon-text"> Xóa <i class="mdi mdi-alert btn-icon-prepend"></i></button>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>


<?
include 'app/View/admin/include/footer.php';
?>
</body>

</html>