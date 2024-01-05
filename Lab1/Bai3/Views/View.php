<link rel="stylesheet" href="../style.css">
<?
echo ' ';
?>

<div class="search-box">
    <form action="" method="post" id="myForm">
    <h1>PC07626 - Lab 1.2 </h1>
        <p class="timkim" align="center">
            <label for="">Xin vui lòng nhập tên tài khoản</label>
            <br>
            <input type="text" name="user_name" id="userName">
            <span id="userNameError" style="color: red; display: block;"></span>
            <button type="submit" name="submit">Submit</button>
        <div id="error-message1" style="color: red;"></div>
        </p>

    </form>
    <?
    if (isset($user['user_name'])) {
    ?>
        <div class="info">
            <div class="name">Tên tài khoản : <?= $user['user_name'] ?></div>
            <div class="phone">Email : <?= $user['user_email'] ?></div>
            <div class="phone">SĐT : <?= $user['user_phone'] ?></div>
        </div>

    <?
    } else {
    ?>
    <div class="error_massage" style="
    background-color: #ffcccc;
    color: #ff0000;
    padding: 10px;
    border: 1px solid #ff9999;
    border-radius: 4px;
    text-align: center;
    margin-top: 20px;">
            Kết quả tìm kiếm không tồn tại</div>
    <?
    }
    ?>
</div>
<script>
    document.getElementById("myForm").addEventListener("submit", function(event) {
        document.getElementById("userNameError").textContent = "";
        if (document.getElementById("userName").value.trim() === "") {
            document.getElementById("userNameError").textContent = "Tên tài khoản không được để trống";
            event.preventDefault();
        }
    });
</script>