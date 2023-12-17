<?php
include 'admin/pages/orders/order.php';

$or = new order();

if (isset($_GET['order'])) {
    $id_order = $_GET['order'];
    $order = $or->GetOrderById($id_order);
    $order_detail = $or->GetDetailOrder($id_order);
}

?>

<div class="container">
    <div class="invoice p-3 mb-3">
        <!-- title row -->
        <div class="row">
            <div class="col-12">
                <h4><i class="fas fa-globe"></i> Thông tin khách hàng</h4>
                <h4>
                    <small class="float-right">Ngày: <?= $order['created_at'] ?></small>
                </h4>
            </div>
            <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
                <b>Từ</b>
                <address>
                    Ấp Hòa Trung, xã Hòa Tú 1, <br>
                    Huyện Mỹ Xuyên, Tỉnh Sóc Trăng<br>
                    Điện thoại: 081927054<br>
                    Email: ngohuyst77@gmail.com
                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                <b>Đến</b>
                <address>
                    <?= $order['shipping_address'] ?><br>
                    Điện thoại: <?= $order['customer_phone'] ?><br>
                    Email: <?= $order['customer_email'] ?><br>
                    Tên người nhận: <?= $order['customer_name'] ?>
                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                <b>Hóa đơn</b><br>
                <b>ID hóa đơn: <?= $order['id'] ?></b><br>
                <b>Hạn thanh toán: 3 ngày kể từ ngày mua</b> <br>
                <b>Tổng tiền:</b> <?= number_format($order['total'], 0, ",", ".") . "VNĐ" ?> VNĐ<br>
                <b>Tài khoản:</b> <?= $order['customer_name'] ?> <b>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Table row -->
        <div class="row">
            <div class="col-12 table-responsive">
                <table class="table text-start align-middle   table-hover mb-0 ">
                    <thead>
                    <tr>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Số Lượng</th>
                        <th scope="col">Giá</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($order_detail as $order): ?>
                        <tr>
                            <td style="min-width: 395px;"><?= $order['product_name'] ?></td>
                            <td><img style="object-fit: cover; border-radius: 10px"
                                     src="<?= $order['product_thumbnail'] ?>" alt=""
                                     width="120" height="80"></td>
                            <td><?= $order['qty'] ?></td>
                            <td><?= number_format($order['price'], 0, ",", ".") ?> VNĐ</td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->


        <!-- this row will not appear when printing -->

    </div>

</div>
