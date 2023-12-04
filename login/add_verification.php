<?php
include_once 'login_function.php';
include_once 'config/database.php';
$_SESSION['chk'] = 0;
$new_string = '0123456789abcdefghijklmnopqrstuvwxyz';
$Verification_delete = str_shuffle($new_string);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $code = $_POST['code'];
    $newpassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $connect = new connect();
    $sql = "SELECT * FROM users WHERE Verification = ?";
    $data = $connect->pdo_query($sql, $code);
    foreach ($data as $verification) {
        $email = $verification['email'];
        if ($verification['Verification'] == $code) {
            $update = forgot($newpassword, $email);
            unset($_SESSION['code']);
            $connect = new connect();
            $sql = "UPDATE users SET Verification = ? WHERE email = ?";
            try {
                $data = $connect->pdo_query($sql, $Verification_delete, $email);
                $_SESSION['ck'] = 1;
            } catch (customException $e) {
                $_SESSION['ck'] = 2;
            }
        }
    }
}
?>


<div class="col-6 container m-auto">
    <br>
    <h3 style="text-align: center; color: #0a90eb">QUÊN MẬT KHẨU - XÁC THỰC</h3>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="singin-email">MÃ XÁC NHẬN</label>
        <input type="text" class="form-control" name="code" required>

        <label for="singin-email">MẬT KHẨU MỚI</label>
        <input type="text" class="form-control" name="password" required>
        <button type="submit" class="btn btn-outline-primary" name="sm">
            <span>CẬP NHẬT</span>
        </button>
        <a href="?action=login" class="forgot-link">Đăng nhập</a> Hoặc
        <a href="?action=create" class="forgot-link">Đăng Ký</a>
    </form>
    <?php
    if (isset($_SESSION['chk']) && $_SESSION['chk'] == 1) {
        echo "<span style='color: blue'>Cập nhật mật khẩu thành công</span>";
    } else if ($_SESSION['chk'] == 2) {
        echo "<span style='color: red'>Mã cập nhật không tồn tại, vui lòng kiểm tra lại!</span>";
    }
    ?>
    <br>
</div>