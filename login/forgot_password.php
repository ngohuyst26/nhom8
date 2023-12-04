<?php
include_once 'config/database.php';
include_once 'login/login_function.php';
include_once 'mailer/email.php';
$string = '0123456789abcdefghijklmnopqrstuvwxyz';
$_SESSION['code'] = str_shuffle($string);
//echo $string_random;
if($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['sm'])){
    $email = $_POST['email'];
    $Verification = $_SESSION['code'];
    $connect = new connect();
    $data = "UPDATE users SET Verification = ? WHERE email = ?";
    $result = $connect->pdo_execute($data, $Verification, $email);
    $title = "Xác nhận cập nhật mật khẩu từ Molla shop";
    guimail($email,$title,$_SESSION['code']);
}
}
?>
<div class="col-6 container m-auto">
    <br>
    <h3 style="text-align: center; color: #0a90eb">QUÊN MẬT KHẨU - LẤY MÃ</h3>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="singin-email">Email *</label>
        <input type="text" class="form-control" name="email" required>
        <button type="submit" class="btn btn-outline-primary" name="sm">
            <span>Lấy Mã</span>
        </button>
        <a href="?action=login" class="forgot-link">Đăng nhập</a> Hoặc
        <a href="?action=create" class="forgot-link">Đăng Ký</a>
    </form>
    <br><br>
</div>