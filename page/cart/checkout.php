<?php
include 'classcheckout.php';
$ckout = new CheckOut();
$total_bill = 0;
if (isset($_POST['order'])) {
//    $code = "";
//    $discount = "";
//    if(isset($_POST['code'])){
//        $code = $_POST['code'];
//        reduceDiscount($code);
//    }
//    if(isset($_POST['discount'])){
//        $discount = $_POST['discount'];
//    }
    $name = $_POST['customer_name'];
    $address = $_POST['customer_address'];
    $phone = $_POST['customer_phone'];
    $email = $_POST['customer_email'];
    $total = $_POST['total'];
    $note = $_POST['note'];
    $customer_id = $_SESSION['id'];
    $ckout->AddOder($customer_id, $name, $phone, $email, $address, $note, $total);
    $last = $ckout->GetIdOrder($customer_id);
    $title = "Đơn hàng #" . $last['last_id'] . " từ cửa hàng Chin Millk Tea";
    $content = "
            <h3>Thông tin khách hàng</h3>
            <p><b>Tên:</b> " . $name . " </p>
            <p><b>Sđt:</b> " . $phone . " </p>
            <p><b>Email:</b> " . $email . " </p>
            <p><b>Ghi chú:</b> " . $note . " </p>
            <p><b>Địa chỉ:</b> " . $address . " </p>
            </hr>
            <h3> Giỏ hàng của bạn </h3>
            ";
    foreach ($_SESSION['cart'] as $cart) {
        $content .= "
        <p>" . $cart['name'] . "<b> x " . $cart['qty'] . "</b> " . number_format(($cart['price'] * $cart['qty']), 0, '.', ',') . " VNĐ</p> 
        ";
        $tongprice = ($cart['price'] * $cart['qty']);
        $ckout->AddOderDetail($last['last_id'], $cart['id'], $cart['name'], $cart['thumbnail'], $cart['qty'], $tongprice);
    }
//    if(isset($_POST['code']) && isset($_POST['discount']) ){
//        $content_discount = "<h5>Đã áp dụng mã ".$code." giảm được ".number_format($discount)." VNĐ</h5>";
//        $content .= $content_discount."
//        <h4>Tổng thành tiền ".number_format($total)." VNĐ</h4>";
//    }else{
    $content .= "
        <h4>Tổng thành tiền " . number_format($total) . " VNĐ</h4>
        ";
    GuiEmail($email, $title, $content);
    $_SESSION['cart'] = [];
}

?>
<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
    <div class="container">
        <h1 class="page-title">Checkout<span>Shop</span></h1>
    </div><!-- End .container -->
</div><!-- End .page-header -->
<nav aria-label="breadcrumb" class="breadcrumb-nav">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>
            <li class="breadcrumb-item active" aria-current="page">Thanh toán</li>
        </ol>
    </div><!-- End .container -->
</nav><!-- End .breadcrumb-nav -->

<div class="page-content">
    <div class="checkout">
        <div class="container">
            <div class="checkout-discount">
                <form action="#" method="post">
                    <input type="text" class="form-control" required id="checkout-discount-input">
                    <label for="checkout-discount-input" class="text-truncate">Have a coupon? <span>Click here to enter your code</span></label>
                </form>
            </div><!-- End .checkout-discount -->
            <form action="#" method="post">
                <div class="row">
                    <div class="col-lg-9">
                        <h2 class="checkout-title">Chi tiết đơn hàng</h2><!-- End .checkout-title -->
                        <label>Tên</label>
                        <input type="text" placeholder="Tên người nhận" name="customer_name" class="form-control"
                               required>
                        <label>Số điện thoại</label>
                        <input type="text" placeholder="Số điện thoại" name="customer_phone" class="form-control">

                        <label>Email</label>
                        <input type="email" class="form-control" name="customer_email" placeholder="Địa chỉ email"
                               required>

                        <label>Địa chỉ nhận hàng</label>
                        <input type="text" class="form-control" name="customer_address" placeholder="Địa chỉ nhận hàng"
                               required>


                        <label>Ghi chú</label>
                        <textarea class="form-control" name="note" cols="30" rows="4"
                                  placeholder="Ghi chú cho đơn hàng"></textarea>
                    </div><!-- End .col-lg-9 -->
                    <aside class="col-lg-3">
                        <div class="summary">
                            <h3 class="summary-title">Đơn hàng của bạn</h3><!-- End .summary-title -->

                            <table class="table table-summary">
                                <thead>
                                <tr>
                                    <th>Sản phẩm</th>
                                    <th>Giá tiền</th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php foreach ($_SESSION['cart'] as $product):
                                    $total_product = $product['price'] * $product['qty'];
                                    $total_bill += $total_product;
                                    ?>
                                    <tr>
                                        <td><a href="#"><?= $product['name'] ?></a></td>
                                        <td><?= number_format(($product['price'] * $product['qty']), 0, ",", ".") . "VNĐ" ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>

                                <tr class="summary-subtotal">
                                    <td>Tổng tiền:</td>
                                    <td><?= number_format($total_bill, 0, ",", ".") . "VNĐ" ?></td>
                                </tr><!-- End .summary-subtotal -->
                                <tr>
                                    <td>Vận chuyển:</td>
                                    <td>Miễn phí</td>
                                </tr>
                                <tr class="summary-total">
                                    <td>Tổng tiền hóa đơn:</td>
                                    <input type="hidden" name="total" value="<?= $total_bill ?>">
                                    <td><?= number_format($total_bill, 0, ",", ".") . "VNĐ" ?></td>
                                </tr><!-- End .summary-total -->
                                </tbody>
                            </table><!-- End .table table-summary -->

                            <div class="accordion-summary" id="accordion-payment">
                                <div class="card">
                                    <div class="card-header" id="heading-1">
                                        <h2 class="card-title">
                                            <input type="radio" checked name="pay" role="button" data-toggle="collapse"
                                                   href="#collapse-1"
                                                   aria-expanded="true" aria-controls="collapse-1">
                                            Thanh toán khi nhận hàng
                                            </input>
                                        </h2>
                                    </div><!-- End .card-header -->
                                    <div id="collapse-1" class="collapse show" aria-labelledby="heading-1"
                                         data-parent="#accordion-payment">
                                        <div class="card-body">
                                            Bạn sẽ thanh toán bằng tiền mặc khi nhận hàng trực tiếp
                                        </div><!-- End .card-body -->
                                    </div><!-- End .collapse -->
                                </div><!-- End .card -->

                                <div class="card">
                                    <div class="card-header" id="heading-2">
                                        <h2 class="card-title">
                                            <input type="radio" name="pay" class="collapsed" role="button"
                                                   data-toggle="collapse" href="#collapse-2"
                                                   aria-expanded="false" aria-controls="collapse-2">
                                            Chuyển khoản
                                            </input>
                                        </h2>
                                    </div><!-- End .card-header -->
                                    <div id="collapse-2" class="collapse" aria-labelledby="heading-2"
                                         data-parent="#accordion-payment">
                                        <div class="card-body">
                                            Thanh toán đơn hàng online bằng cách chuyển tiền
                                        </div><!-- End .card-body -->
                                    </div><!-- End .collapse -->
                                </div><!-- End .card -->


                            </div><!-- End .accordion -->

                            <button type="submit" name="order" class="btn btn-outline-primary-2 btn-order btn-block">
                                <span class="btn-text">Place Order</span>
                                <span class="btn-hover-text">Proceed to Checkout</span>
                            </button>
                        </div><!-- End .summary -->
                    </aside><!-- End .col-lg-3 -->
                </div><!-- End .row -->
            </form>
        </div><!-- End .container -->
    </div><!-- End .checkout -->
</div><!-- End .page-content -->

