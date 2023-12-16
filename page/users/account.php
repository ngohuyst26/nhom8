<?php
include 'admin/pages/orders/order.php';

$or = new order();

if (isset($_SESSION['id'])) {
    $id_user = $_SESSION['id'];
    $order = $or->GetOrderByUser($id_user);
}
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

<?php if (isset($_SESSION['id'])): ?>
    <div class="container">
        <div class="row">
            <div class="col-m-3 m-2 justify-content-center">
                <div class="col-3 col-md-3 all des">
                    <div class="card" style="width: 30rem;">
                        <div class="card-body">
                            <h5 class="card-title">TÀI KHOẢN CỦA TÔI</h5>
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
                                if (isset($chucvu)) {
                                    echo $chucvu;
                                } ?>
                            </h6>
                            </p>
                            <a href="?action=logout" class="card-link">ĐĂNG XUẤT</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 all des">
                    <div class="card" style="width: 30rem;">
                        <div class="card-body">
                            <a href="?action=update" class="card-link">CẬP NHẬT TÀI KHOẢN</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-8 col-md-8 ">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Tên khách hàng</th>
                        <th scope="col">Số điện thoại</th>
                        <th scope="col">Ngày đặt hàng</th>
                        <th scope="col">Tổng đơn hàng</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Hành động</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($order as $item): ?>
                        <tr>
                            <td><?= $item['customer_name'] ?></td>
                            <td><?= $item['customer_phone'] ?></td>
                            <td><?= $item['created_at'] ?></td>
                            <td><?= number_format($item['total'], 0, ",", ".") . "VNĐ" ?></td>
                            <td><?= $or->CheckStatus($item['status']) ?></td>
                            <td><a href="?action=order&order=<?= $item['id'] ?>" class="btn btn-primary">Xem chi
                                    tiết</a></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

