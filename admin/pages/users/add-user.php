<?php
    include_once 'pages/users/user-function.php';
    // Tạo biến bắt validate
//    $user = $email = $password = $sex = $role = "";
    $user_error = $email_error = $password_error = $sex_error = $role_error = "";
    $check = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["user"])) {
        $check = true;
        $user_error = "<span style='color:red;'>Error: Họ tên bắt buộc phải nhập.</span>";
    } else{
        $user = $_POST['user'];
    }

    if(empty($_POST["email"])){
        $email_error = "<span style='color:red;'>Error: Email bắt buộc phải nhập.</span>";
        $check == true;
    } else{
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $email_error = "<span style='color:red;'>Error: Email nhập chưa đúng.</span>";
            $check == true;
        } else if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $email = $_POST['email'];
        $connect = new connect();
        $data = "SELECT email FROM users WHERE email = '$email'";
        $check_email = $connect->pdo_query_one($data);
            if (!empty($check_email)){
                $email_check_error = "<span style='color:red;'>Error: Email đã được đăng ký tài khoản, vui lòng nhập email khác!</span>";
                $check = true;
            }
        }
    }

    if(empty($_POST["password"])){
        $check = true;
        $password_error = "<span style='color:red;'>Error: Mật khẩu bắt buộc phải nhập.</span>";
    } else{
        $password = $_POST['password'];
    }

    if (empty($_POST["sex"])){
        $check = true;
        $sex = $_POST['sex'];
        $sex_error = "<span style='color:red;'>Error: Giới tính bắt buộc phải chọn.</span>";
        echo $sex;
    } else{
        $sex = $_POST['sex'];

    }

    if (empty($_POST['role'])){
        $check = true;
        $role = $_POST['role'];
        $role_error = "<span style='color:red;'>Error: Chức vụ bắt buộc phải chọn.</span>";
        echo $role;
    } else{
        $role = $_POST['role'];
    }

    if ($check == false){
        $data = add_user($user, $email, $password,$sex, $role);
    }
}
?>

<div class="col-3"></div>
<div class="col-sm-12 col-xl-6 mt-3">
    <form method="POST" enctype="multipart/form-data">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">THÊM NGƯỜI DÙNG</h6>
        <div class="form-floating mb-3">
            <input type="text" name="user" class="form-control" id="floatingInput" placeholder=""  value="">
            <label for="floatingInput">Tên Người Dùng</label>
        </div>
        <?php
        if (isset($user_error)){
            echo $user_error;
        }
        ?>

        <div class="form-floating mb-3">
            <input type="email" name="email" class="form-control" id="floatingInput" placeholder=""  value="">
            <label for="floatingInput">Email Người Dùng</label>
        </div>
        <?php
        if (isset($email_error)){
            echo $email_error;
        }
        if (isset($email_check_error)){
            echo $email_check_error;
        }
        ?>

        <div class="form-floating mb-3">
            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password"  value="">
            <label for="floatingPassword">Password</label>
        </div>
        <?php
        if (isset($password_error)){
            echo $password_error;
        }
        ?>
        <div class="form-floating mb-3">
            <label for="exampleInputEmail1">Giới Tính</label><br/><br/>
            <input type="radio" name="sex" id="" value="1"> Nam
            <br/>
            <input type="radio" name="sex" id="" value="2"> Nữ
            <br/>
            <input type="radio" name="sex" id="" value="3"> Khác
        </div>
        <?php
        if (isset($sex_error)){
            echo $sex_error;
        }
        ?>
        <div class="form-floating mb-3">
            <label for="exampleInputEmail1">Chức Vụ</label><br/><br/>
            <input type="radio" name="role" id="" value="1"> Admin
            <br/>
            <input type="radio" name="role" id="" value="2"> Creators
            <br/>
            <input type="radio" name="role" id="" value="3"> Product Manager
            <br/>
            <input type="radio" name="role" id="" value="4"> User
        </div>
        <?php
        if (isset($role_error)){
            echo $role_error;
        }
        ?>
        <br/>
        <button type="submit" class="btn btn-outline-primary">Thêm</button>
    </form>

    <div>

    </div>

    </div>
</div>
<!--<div class="col-3"></div>-->