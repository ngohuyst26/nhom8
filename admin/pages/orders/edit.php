<?php
include 'order.php';
$or = new order();

if (isset($_POST['update'])) {
    $id_order = $_GET['edit_order'];
    $customer_name = $_POST['customer_name'];
    $customer_phone = $_POST['customer_phone'];
    $shipping_address = $_POST['shipping_address'];
    $total = $_POST['total'];
    $status = $_POST['status'];
    $or->UpdateOrder($id_order, $customer_name, $customer_phone, $shipping_address, $total, $status);
}

if (isset($_GET['edit_order'])) {
    $id_order = $_GET['edit_order'];
    $order = $or->GetOrderById($id_order);
}
?>

<div class="col-1"></div>
<div class="col-sm-12 col-xl-10 mt-3">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">THÊM SẢN PHẨM</h6>
        <form enctype="multipart/form-data" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tên khách hàng</label>
                <input type="text" name="customer_name" value="<?= $order['customer_name'] ?>" class="form-control">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Số điện thoại</label>
                <input type="text" name="customer_phone" value="<?= $order['customer_phone'] ?>" class="form-control">

            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Địa chỉ</label>
                <input type="text" name="shipping_address" value="<?= $order['shipping_address'] ?>"
                       class="form-control">

            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Tổng giá</label>
                <input type="number" name="total" value="<?= $order['total'] ?>" class="form-control">
            </div>
            <div class="mb-3">
                <label for="" class="form-label"> Trạng thái </label>
                <select name="status" id="" class="form-select">
                    <option value="1" <?= (($order['status'] == 1) ? "selected" : "") ?>>Chưa thanh toán</option>
                    <option value="2" <?= (($order['status'] == 2) ? "selected" : "") ?>>Thanh toán thành công</option>
                    <option value="3" <?= (($order['status'] == 3) ? "selected" : "") ?>>Đang vận chuyển</option>
                </select>
            </div>
            <button type="submit" name="update" class="btn btn-primary">Lưu</button>
            <a href="?page=order&action=list" class="btn btn-primary">Danh sách đơn hàng</a>
        </form>
    </div>
</div>
<div class="col-1"></div>
