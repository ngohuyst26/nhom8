<?php
include_once 'pages/users/user-function.php';
    $id = $_GET['id'];
    $data_edit = get_user_edit($id);
    foreach ($data_edit as $check_role_edit){
       $_SESSION['role_edit'] = $check_role_edit['role'];
    }
    $user_error = $email_error = $password_error = $sex_error = $role_error = $address_error = "";
    $check = false;
    if ($_SESSION['role'] == 4 && $_SESSION['role_edit'] == 1){
        include_once 'pages/users/err_update_user.php';
        exit;
    } else {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            if (empty($_POST["user"])) {
                $check = true;
                $user_error = "<span style='color:red;'>Error: Họ tên bắt buộc phải nhập.</span>";
            } else {
                $user = $_POST['user'];
            }

            if (empty($_POST['address'])){
                $address_error ="<span style='color:red;'>Error: địa chỉ bắt buộc phải nhập.</span>";
                $check = true;
            } else{
                $address = $_POST['address'];
            }

            if (empty($_POST["email"])) {
                $email_error = "<span style='color:red;'>Error: Email bắt buộc phải nhập.</span>";
                $check == true;
            } else {
                if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                    $email_error = "<span style='color:red;'>Error: Email nhập chưa đúng.</span>";
                    $check == true;
                } else {
                    $email = $_POST['email'];
                }
            }

            if (empty($_POST["password"])) {
                $check = true;
                $password_error = "<span style='color:red;'>Error: Mật khẩu bắt buộc phải nhập.</span>";
            } else {
                $password = $_POST['password'];
                $password = password_hash($password, PASSWORD_DEFAULT);
            }

            if (empty($_POST["sex"])) {
                $check = true;
                $sex_error = "<span style='color:red;'>Error: Giới tính bắt buộc phải chọn.</span>";
            } else {
                $sex = $_POST['sex'];
            }

            if (empty($_POST['role'])) {
                $check = true;
                $role_error = "<span style='color:red;'>Error: Chức vụ bắt buộc phải chọn.</span>";
            } else {
                $role = $_POST['role'];
            }

            if ($check == false) {
                $edit_user = edit_user($user, $email, $password, $sex, $role,$address,$id);
            }
        }
    }
?>

<div class="col-3"></div>
<div class="col-sm-12 col-xl-6 mt-3">
    <?php if (isset($data_edit)): ?>
        <?php foreach($data_edit as $print): ?>
    <form method="post" enctype="multipart/form-data">
        <div class="bg-secondary rounded h-100 p-4">
            <h6 class="mb-4">SỬA THÔNG TIN NGƯỜI DÙNG</h6>
            <div class="form-floating mb-3">
                <input type="text" name="user" class="form-control" id="floatingInput" placeholder="" required value="<?=$print['name']?>" >
                <label for="floatingInput">Tên Người Dùng</label>
                <?php
                if (isset($user_error)){
                    echo $user_error;
                }
                ?>
            </div>

            <div class="form-floating mb-3">
                <input type="text" name="address" class="form-control" id="floatingInput" placeholder=""  value="<?=$print['address']?>">
                <label for="floatingInput">Địa chỉ</label>
                <?php
                if (isset($address_error)){
                    echo $address_error;
                }
                ?>
            </div>

            <div class="form-floating mb-3">
                <input type="email" name="email" class="form-control" id="floatingInput" placeholder="" required value="<?=$print['email']?>">
                <label for="floatingInput">Email Người Dùng</label>
                <?php
                if (isset($email_error)){
                    echo $email_error;
                }
                if (isset($email_check_error)){
                    echo $email_check_error;
                }
                ?>
            </div>

            <div class="form-floating mb-3">
                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required value="<?=$print['password']?>">
                <label for="floatingPassword">Password</label>
                <?php
                if (isset($password_error)){
                    echo $password_error;
                }
                ?>
            </div>

            <div class="form-floating mb-3">
                <label for="exampleInputEmail1">Giới Tính</label><br/><br/>
                <input type="radio" name="sex" id="" value="1"> Nam
                <br/>
                <input type="radio" name="sex" id="" value="2"> Nữ
                <br/>
                <input type="radio" name="sex" id="" value="3"> Khác
                <br/> <?php
                if (isset($sex_error)){
                    echo $sex_error;
                }
                ?>
            </div>

            <div class="form-floating mb-3">
                <label for="exampleInputEmail1">Chức Vụ</label><br/><br/>
                <input type="radio" name="role" id="" value="2"> Creators
                <br/>
                <input type="radio" name="role" id="" value="3"> Product Management
                <br/>
                <input type="radio" name="role" id="" value="4"> User Management
                <br/>
                <input type="radio" name="role" id="" value="5"> Order Management
                <br/>
                <input type="radio" name="role" id="" value="6"> Manage Promotional Codes
                <br/>
                <input type="radio" name="role" id="" value="7"> Manage Product Types
                <br/>
                <input type="radio" name="role" id="" value="8"> Client
                <br/>
                <?php
                if (isset($role_error)){
                    echo $role_error;
                }
                ?>
            </div>
            <br/>
            <button type="submit" class="btn btn-outline-primary">Cập nhật</button>
    </form>
    <?php endforeach;?>
    <?php endif;?>
</div>
</div>
