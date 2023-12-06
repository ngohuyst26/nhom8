<?php
include_once 'config/database.php';
$thongbao = '';
$email_error = '';
$check = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $email_error = "<span style='color:red; font-family: Roboto;'>Error: Email nhập chưa đúng định dạng<br/></span>";
        $check == true;
    }
    $password = $_POST['password'];
    $connect = new connect();
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $connect->pdo_query($sql);
    if ($result == null) {
        $thongbao = "<span style='color:red; font-size: 20px; font-family: Roboto;'>Error: Tài khoản hoặc mật khẩu không hợp lệ!</span>";
    } else {
        foreach ($result as $data) {
            if (isset($_POST['email']) && isset($_POST['password'])) {
                if ($email = $data['email'] && password_verify($password, $data['password'])) {
                    $_SESSION['name'] = $data['name'];
                    $_SESSION['email'] = $data['email'];
                    $_SESSION['role'] = $data['role'];
                    $_SESSION['id'] = $data['id'];
                    if ($check == false) {
                        header('Location: ?action=home');
                    }
                }
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
        <input type="text" class="form-control" name="email">
        <?php
        if (isset($email_error)) {
            echo $email_error;
        }
        ?>
        <label>Mật khẩu *</label>
        <input type="password" class="form-control" name="password">

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