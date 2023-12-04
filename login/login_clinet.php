<?php
include_once 'config/database.php';
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $thongbao = "";
    $email = $_POST['email'];
    $password = $_POST['password'];
    $connect = new connect();
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $connect->pdo_query($sql);
    foreach ($result as $data) {
        if (isset($_POST['email']) && isset($_POST['password'])) {
            if ($email = $data['email'] && password_verify($password, $data['password'])) {
                $thongbao = "<span style='color:blue; font-size: 20px; font-family: Roboto;'>Đăng nhập thành công!</span>";
                $_SESSION['name'] = $data['name'];
                $_SESSION['email'] = $data['email'];
                $_SESSION['role'] = $data['role'];
            } else {
                $thongbao = "<span style='color:red; font-size: 20px; font-family: Roboto;'>Tài khoản hoặc mật khẩu không hợp lệ!</span>";
            }
        }
    }
}
?>

<div class="col-6 container m-auto">
<form action="" method="post" enctype="multipart/form-data">
       <br>
    <h3 style="text-align: center; color: #0a90eb">ĐĂNG NHẬP</h3>
        <label for="singin-email">Email *</label>
        <input type="text" class="form-control" name="email" >

        <label>Mật khẩu *</label>
        <input type="password" class="form-control"  name="password" >

        <button type="submit" class="btn btn-outline-primary">
            <span>Đăng nhập</span>
        </button>
        <a href="?action=forgot" class="forgot-link">Quên mật khẩu?</a> Hoặc
        <a href="?action=create" class="forgot-link">Bạn chưa có tài khoản?</a>
</form>
    <?php
    if (isset($thongbao)){
        echo $thongbao;
    }
    ?>
    <br><br>
</div>