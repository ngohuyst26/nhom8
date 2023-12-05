<?php
include_once 'login_function.php';
include_once 'config/database.php';
$verification = $_GET['verification'];
$_SESSION['chk'] = 0;
$new_string = '0123456789abcdefghijklmnopqrstuvwxyz';
$Verification_delete = str_shuffle($new_string);
$connect = new connect();
$sql = "SELECT * FROM users WHERE Verification = ?";
$data = $connect->pdo_query($sql, $verification);

if ($data == null){
    include_once 'tb_exit.php';
    unset($_SESSION['code']);
    exit;
}

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $newpassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
        foreach ($data as $verifications) {
            $email = $verifications['email'];
            if ($verifications['Verification'] == $verification) {
                $connect = new connect();
                $sql = "UPDATE users SET password = '$newpassword' WHERE email = '$email'";
                try{
                    $data = $connect->pdo_execute($sql);
                    $_SESSION['chk'] = 1;
                } catch(customException $e){
                    $_SESSION['chk'] = 2;
                }
                unset($_SESSION['code']);
                $connect = new connect();
                $sql = "UPDATE users SET Verification = ? WHERE email = ?";
                $data = $connect->pdo_query($sql, $Verification_delete, $email);

            }
        }
    }

?>


<div class="col-6 container m-auto">
    <br>
    <h3 style="text-align: center; color: #0a90eb">QUÊN MẬT KHẨU - XÁC THỰC</h3>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="singin-email">MẬT KHẨU MỚI</label>
        <input type="password" class="form-control" name="password" required>
        <button type="submit" class="btn btn-outline-primary" name="sm">
            <span>CẬP NHẬT</span>
        </button>
        <a href="?action=login" class="forgot-link">Đăng nhập</a> Hoặc
        <a href="?action=create" class="forgot-link">Đăng Ký</a>
    </form>

     <?php
    if (isset($_SESSION['chk']) && $_SESSION['chk'] == 1){
        echo "<span style='color: blue'>Cập nhật mật khẩu thành công</span><br>";
    } else if($_SESSION['chk'] == 2){
        echo "<span style='color: red'>Mã cập nhật không tồn tại, vui lòng kiểm tra lại!</span><br>";
    }
    if (isset($tb)){
        echo $tb;
    }
    ?>
    <br>
</div>