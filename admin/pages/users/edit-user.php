<?php
include_once 'pages/users/user-function.php';
$id = $_GET['id'];
$data_edit = get_user_edit($id);
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user = $_POST['user'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sex = $_POST['sex'];
    $role = $_POST['role'];
    $edit_user = edit_user($user, $email, $password,$sex, $role);
}
?>

<div class="col-3"></div>
<div class="col-sm-12 col-xl-6 mt-3">
    <?php if (isset($data_edit)): ?>
        <?php foreach($data_edit as $print): ?>
    <form method="POST" enctype="multipart/form-data">
        <div class="bg-secondary rounded h-100 p-4">
            <h6 class="mb-4">SỬA THÔNG TIN NGƯỜI DÙNG</h6>
            <div class="form-floating mb-3">
                <input type="text" name="user" class="form-control" id="floatingInput" placeholder="" required value="<?=$print['name']?>" >
                <label for="floatingInput">Tên Người Dùng</label>
            </div>
            <div class="form-floating mb-3">
                <input type="email" name="email" class="form-control" id="floatingInput" placeholder="" required value="<?=$print['email']?>">
                <label for="floatingInput">Email Người Dùng</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required value="<?=$print['password']?>">
                <label for="floatingPassword">Password</label>
            </div>

            <div class="form-floating mb-3">
                <label for="exampleInputEmail1">Giới Tính</label><br/><br/>
                <input type="radio" name="sex" id="" value="male"> Nam
                <br/>
                <input type="radio" name="sex" id="" value="female"> Nữ
                <br/>
                <input type="radio" name="sex" id="" value="orther"> Khác
            </div>
            <div class="form-floating mb-3">
                <label for="exampleInputEmail1">Chức Vụ</label><br/><br/>
                <input type="radio" name="role" id="admin" value="1"> Admin
                <br/>
                <input type="radio" name="role" id="clinet" value="0"> Người Dùng
            </div>
            <br/>
            <button type="submit" class="btn btn-outline-primary">Thêm</button>
    </form>
    <?php endforeach;?>
    <?php endif;?>
</div>
</div>
