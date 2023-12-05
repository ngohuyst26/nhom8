<?php
include_once 'config/database.php';
include_once 'login/login_function.php';
$_SESSION['tb'] = 0;
$check = false;
$email_check_error = '';
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $sex = 3;
    //BẮT EMAIL ĐÃ TỒN TẠI
    $connect = new connect();
    $data = "SELECT email FROM users WHERE email = ?";
    $check_email = $connect->pdo_query_one($data, $email);
    if (!empty($check_email)){
        $email_check_error = "<span style='color:red;'>Cảnh báo: Email đã được đăng ký tài khoản, vui lòng nhập email khác!</span><br>";
        $check = true;
    }
    $role = 8;
    $password = $_POST['password'];
    $mahoa = password_hash($password, PASSWORD_DEFAULT);
    if ($check == false) {
        $create = create($name, $email, $mahoa,$sex, $role);
    }
}
?>
<div class="col-6 container m-auto">
    <form action="" method="post" enctype="multipart/form-data"> <br>
        <h3 style="text-align: center; color: #0a90eb">TẠO TÀI KHOẢN</h3>
        <label for="singin-email">Tên *</label>
        <input type="text" class="form-control" name="name" required>

        <label for="singin-email">Email *</label>
        <input type="text" class="form-control" name="email" required>
        <?php
        if (isset($email_check_error)){
            echo $email_check_error;
        }
        ?>
        <label>Mật khẩu *</label>
        <input type="password" class="form-control"  name="password" required>

        <button type="submit" class="btn btn-outline-primary">
            <span>Đăng Ký</span>
        </button>
        <a href="?action=forgot" class="forgot-link">Quên mật khẩu?</a> Hoặc
        <a href="?action=login" class="forgot-link">Đăng nhập</a>
    </form>
    <?php
    if (isset($_SESSION['tb']) && $_SESSION['tb'] == 1){
        echo $thongbao = "<span style='color: blue'>Đăng ký tài khoản thành công</span>";
    } else if(isset($_SESSION['tb']) && $_SESSION['tb'] == 2){
        echo $thongbao = "<span style='color: red'>Vui Lòng nhập đầy đủ thông tin</span>";
    }
    ?>
    <br><br>
</div>
