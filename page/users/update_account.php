<?php
include_once 'config/database.php';
$user_error = $email_error = $address_error = "";
$id = $_SESSION['id'];
$check = false;
$email = $_SESSION['email'];
$connect = new connect();
$data = "SELECT * FROM users WHERE email = '$email'";
$result = $connect->pdo_query($data);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["user"])) {
        $check = true;
        $user_error = "<span style='color:red;'>Error: Họ tên bắt buộc phải nhập.</span><br>";
    } else {
        $user = $_POST['user'];
    }

    if (empty($_POST['address'])) {
        $address_error = "<span style='color:red;'>Error: địa chỉ bắt buộc phải nhập.</span><br>";
        $check = true;
    } else {
        $address = $_POST['address'];
    }

    if (empty($_POST["email"])) {
        $email_error = "<span style='color:red;'>Error: Email bắt buộc phải nhập.</span><br>";
        $check == true;
    } else {
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $email_error = "<span style='color:red;'>Error: Email nhập chưa đúng định dạng.</span><br>";
            $check == true;
        }
    }

    if ($check == false) {
        $connect = new connect();
        $data = "UPDATE users SET name = ?, email= ?, address =? WHERE id =  ?";
        $connect->pdo_execute($data, $user, $email, $address, $id);
        $thongbao = "<span style='color:blue;'>Cập nhật tài khoản thành công</span>";
    }
}
?>

<div class="col-6 container m-auto">
    <?php if (isset($result)): ?>
        <?php foreach ($result as $print): ?>
            <form action="" method="post" enctype="multipart/form-data">
                <br>
                <h3 style="text-align: center; color: #0a90eb">CẬP NHẬT TÀI KHOẢN</h3>

                <label>Tên *</label>
                <input type="text" class="form-control" name="user" value="<?= $print['name'] ?>">
                <?php
                if (isset($user_error)) {
                    echo $user_error;
                }
                ?>
                <label for="singin-email">Email *</label>
                <input type="text" class="form-control" name="email" value="<?= $print['email'] ?>">
                <?php
                if (isset($email_error)) {
                    echo $email_error;
                }
                if (isset($email_check_error)) {
                    echo $email_check_error;
                }
                ?>
                <label>Địa chỉ *</label>
                <input type="text" class="form-control" name="address" value="<?= $print['address'] ?>">
                <?php
                if (isset($address_error)) {
                    echo $address_error;
                }
                ?>
                <button type="submit" class="btn btn-outline-primary">
                    <span>Cập nhật</span>
                </button>
            </form>
            <?php
            if (isset($thongbao)) {
                echo $thongbao;
            }
            ?>
        <?php endforeach; ?>
    <?php endif; ?>
    <br>
    <div class="col-lg-4 col-md-4 all des">
        <div class="card" style="width: 40rem;">
            <div class="card-body">
                <a href="?action=account" class="card-link">VỀ LẠI TRANG TÀI KHOẢN</a>
            </div>
        </div>
    </div>
    <br>
</div>