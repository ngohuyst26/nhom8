<?php
$chucvu = '';
if (isset($_SESSION['role'])){
    if ($_SESSION['role'] == 1){
         $chucvu = "Admin";
    } else if ($_SESSION['role'] == 2){
        $chucvu = "Creators";
    } else if($_SESSION['role'] == 3){
        $chucvu = "Product Management";
    } else if ($_SESSION['role'] == 4){
        $chucvu = "User Management";
    } else if($_SESSION['role'] == 5){
        $chucvu = "Order Management";
    } else if($_SESSION['role'] == 6){
        $chucvu = "Manage Promotional Codes";
    } else if ($_SESSION['role'] == 7){
        $chucvu = "Manage Product Types";
    } else if ($_SESSION['role'] == 8){
        $chucvu = "Client";
    }
}
?>

<div class="container">
    <div class="col-m-6 m-5 justify-content-center">
        <div class="col-4 col-md-4 all des">
            <div class="card" style="width: 40rem;">
                <div class="card-body">
                <h5 class="card-title">TÀI KHOẢNG CỦA TÔI</h5>
                <img src="https://hienthao.com/wp-content/uploads/2023/05/c6e56503cfdd87da299f72dc416023d4-736x620.jpg"
                     alt="" width="60px">
                </br></br>
                <p class="card-text">
                <h6>Tên:
                    <?= $_SESSION['name'] ?>
                </h6>
                </p>

                <p class="card-text">
                <h6>Email:
                    <?= $_SESSION['email'] ?>
                </h6>
                </p>
                <p class="card-text">
                <h6>Chức Vụ:
                    <?php
                    if(isset($chucvu)){
                        echo $chucvu;
                    }?>
                </h6>
                </p>
                <a href="?action=logout" class="card-link">ĐĂNG XUẤT</a>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-4 all des">
            <div class="card" style="width: 40rem;">
                <div class="card-body">
                    <a href="" class="card-link">CẬP NHẬT TÀI KHOẢN</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 all des">
            <div class="card" style="width: 40rem;">
                <div class="card-body">
                    <a href="" class="card-link">ĐƠN HÀNG CỦA BẠN</a>
                </div>
            </div>
        </div>
    </div>
</div>

