<?php
include_once 'config/database.php';
include_once 'login/login_function.php';
include_once 'mailer/email.php';
$email_error = '';
$http = 'http://duanone.php/?action=check&verification=';
$string = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHJIKLMNOPQRSTUVWXYZ';
$_SESSION['code'] = substr(str_shuffle($string), 0, 6);
$http .= $_SESSION['code'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $check = false;
    if (isset($_POST['sm'])) {
        $email = $_POST['email'];
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $email_error = "<span style='color:red; font-family: Roboto;'>Error: Email nhập chưa đúng định dạng</span>";
            $check = true;
        } else {
            $connect = new connect();
            $sql = "SELECT * FROM users WHERE email = ?";
            $check_email = $connect->pdo_query($sql, $email);
            if ($check_email == null) {
                $tt = "<span style='color:red; font-family: Roboto;'>Error: Email chưa đăng ký tài khoản<br/></span>";
                $check = true;
            }
        }
        $Verification = "<br><span>Link thay đổi mật khẩu: </span>";
        $Verification .= $http;
        $connect = new connect();
        $data = "UPDATE users SET Verification = ? WHERE email = ?";
        $result = $connect->pdo_execute($data, $_SESSION['code'], $email);
        $title = "Xác nhận cập nhật mật khẩu từ Molla shop";
        if (isset($check) && $check == false) {
            guimail($email, $title, $Verification);
            $thongbao_gm = "<span style='color: #39f; font-family: Roboto; font-size: 17px;'>Một email xác nhận đã được gửi về, vui lòng check email để thay đổi mật khẩu!</span><br/>";
        }
    }
}
?>
<div class="col-6 container m-auto">
    <br>
    <h3 style="text-align: center; color: #0a90eb">QUÊN MẬT KHẨU - LẤY MÃ</h3>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="singin-email">Email *</label>
        <input type="text" class="form-control" name="email" required>
        <?php
        if (isset($tt)) {
            echo $tt;
        }
        if (isset($email_error)) {
            echo $email_error;
        }
        if (isset($thongbao_gm)) {
            echo $thongbao_gm;
        }
        ?>
        <button type="submit" class="btn btn-outline-primary" name="sm">
            <span>Lấy Mã</span>
        </button>
        <a href="?action=login" class="forgot-link">Đăng nhập</a> Hoặc
        <a href="?action=create" class="forgot-link">Đăng Ký</a>
    </form>
    <br><br>
</div>