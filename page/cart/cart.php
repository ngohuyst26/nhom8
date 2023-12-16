
<?php
include "classCart.php";
$car = new cart();

if (!isset ($_SESSION ['cart'])) {
    $_SESSION ['cart'] = [];
}

$_SESSION ['discount'] = 4;
if (isset($_POST['apply'])) {
    if (isset($_POST['discount'])) {
        $code = $_POST['discount'];
        $data = $car->CheckDiscount($code);
        if ($data['check'] == 1) {
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $today = date('d-m-Y H:i:s');
            if (strtotime($today) < strtotime($data['data']['date_end'])) {
                $check_date = true;
            } else {
                $check_date = false;
            }
        }

        if ($data['check'] == 1 && (($data['data']['number_use'] > 0) || ($data['data']['number_use'] == null))
            && ($check_date == true || ($data['data']['date_end'] == null))) {
            $discount = $data['data']['discount'];
            $type = $data['data']['type'];
            $code = $data['data']['code'];
            $_SESSION ['discount'] = $data['check'];
        } elseif ($data['check'] == 1 && ($data['data']['number_use'] == 0) && ($data['data']['number_use'] != null)) {
            $_SESSION ['discount'] = 2;
        } elseif ($data['check'] == 1 && ($check_date == false)) {
            $_SESSION ['discount'] = 3;
        } else {
            $_SESSION ['discount'] = $data['check'];
        }
    }
}


$total_bill = 0;
if (isset($_SESSION['cart'])) {
    if (isset($_POST['removecart'])) {
        $id = $_POST['removecart'];
        foreach ($_SESSION['cart'] as $productId) {
            if ($id == $productId['id']) {
                unset($_SESSION['cart']["$id"]);
                // header('Location: cart.php') ;
                break;
            }
        }
    }
}


if (isset($_SESSION['cart'])) {
    if (isset($_POST['editcart'])) {
        $id = $_POST['id'];
        $leght = sizeof($_SESSION['cart']);
        $qtyedit = $_POST['editqty'];
        for ($i = 0; $i < $leght; $i++) {
            $_SESSION['cart'][$id[$i]]['qty'] = $qtyedit[$i];
        }
    }
    // header('Location: cart.php');
}

//unset($_SESSION['cart']);
//var_dump($_SESSION['cart']);
?>
<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
    <div class="container">
        <h1 class="page-title">Giỏ Hàng</h1>
    </div><!-- End .container -->
</div><!-- End .page-header -->
<nav aria-label="breadcrumb" class="breadcrumb-nav">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>
            <li class="breadcrumb-item active" aria-current="page">Giỏ hàng</li>
        </ol>
    </div><!-- End .container -->
</nav><!-- End .breadcrumb-nav -->

<div class="page-content">
    <div class="cart">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <form action="" method="post">
                        <table class="table table-cart table-mobile">
                            <thead>
                            <tr>
                                <th>Tên sản phẩm</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Tổng giá</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($_SESSION['cart'] as $cart):
                                $total_product = $cart['price'] * $cart['qty'];
                                $total_bill += $total_product;
                                ?>
                                <tr>
                                    <td class="product-col">
                                        <div class="product">
                                            <figure class="product-media">
                                                <a href="#">
                                                    <img src="<?= $cart['thumbnail'] ?>" alt="Product image">
                                                </a>
                                            </figure>

                                            <h3 class="product-title">
                                                <a href="#"><?= $cart['name'] ?></a>
                                            </h3><!-- End .product-title -->
                                        </div><!-- End .product -->
                                    </td>
                                    <td class="price-col"><?= number_format($cart['price'], 0, ",", ".") ?>đ</td>
                                    <td class="quantity-col">
                                        <div class="cart-product-quantity">
                                            <input type="number" name="editqty[]" class="form-control"
                                                   value="<?= $cart['qty'] ?>" min="1" max="10" step="1"
                                                   data-decimals="0" required>
                                            <input type="hidden" name="id[]" value="<?= $cart['id'] ?>">
                                        </div><!-- End .cart-product-quantity -->
                                    </td>
                                    <td class="total-col"><?= number_format(($cart['price'] * $cart['qty']), 0, ",", ".") ?>
                                        đ
                                    </td>
                                    <td class="remove-col">
                                        <button class="btn-remove" name="removecart" value="<?= $cart['id'] ?>"><i
                                                    class="icon-close"></i></button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            <?php
                            if (isset($type) && $type == 1) {
                                $discount = (($total_bill / 100) * $discount);
                                $total_bill = $total_bill - $discount;
                            } elseif (isset($type) && $type == 2 && $discount < $total_bill) {
                                $total_bill = $total_bill - $discount;
                            } elseif (isset($type) && $type == 2 && $discount > $total_bill) {
                                $total_bill = 0;
                            }
                            ?>
                            </tbody>
                        </table><!-- End .table table-wishlist -->
                        <div class="cart-bottom">
                            <div class="cart-discount">
                                <form action="#" method="post">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="discount" placeholder="Mã ưu đãi">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-primary-2" type="submit" name="apply"><i
                                                        class="icon-long-arrow-right"></i></button>
                                        </div><!-- .End .input-group-append -->
                                    </div><!-- End .input-group -->
                                </form>
                            </div><!-- End .cart-discount -->

                            <button type="submit" name="editcart" class="btn btn-outline-dark-2">
                                <span>UPDATE CART</span><i class="icon-refresh"></i></button>
                        </div><!-- End .cart-bottom -->
                        <?php if ($_SESSION['discount'] == 1): ?>
                            <h6 class="text-success mt-5">Áp dụng thành công mã <?= $code ?> đã
                                giảm: <?= number_format($discount, 0, ",", ".") ?>đ</h6>
                        <?php elseif ($_SESSION['discount'] == 0): ?>
                            <h6 class="text-danger mt-5">Mã giảm giá không tồn tại</h6>
                        <?php elseif ($_SESSION['discount'] == 2): ?>
                            <h6 class="text-danger mt-5">Mã giảm giá đã hết số lần sử dụng</h6>
                        <?php elseif ($_SESSION['discount'] == 3): ?>
                            <h6 class="text-danger mt-5">Mã giảm giá đã hết hạn sử dụng rồi</h6>
                        <?php endif; ?>
                </div><!-- End .col-lg-9 -->
                <aside class="col-lg-3">
                    <div class="summary summary-cart">
                        <h3 class="summary-title">Cart Total</h3><!-- End .summary-title -->
                        <table class="table table-summary">
                            <tbody>
                            <tr class="summary-subtotal">
                                <td>Tổng:</td>
                                <td><?= number_format($total_bill, 0, ",", ".") ?>đ</td>
                            </tr><!-- End .summary-subtotal -->
                            <tr class="summary-shipping">
                                <td>Vận chuyển:</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr class="summary-shipping-row">
                                <td>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="free-shipping" name="shipping"
                                               class="custom-control-input">
                                        <label class="custom-control-label" for="free-shipping">Nhanh</label>
                                    </div><!-- End .custom-control -->
                                </td>
                                <td>30.000đ</td>
                            </tr><!-- End .summary-shipping-row -->
                            <tr class="summary-shipping-row">
                                <td>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="standart-shipping" name="shipping"
                                               class="custom-control-input">
                                        <label class="custom-control-label" for="standart-shipping">Chậm</label>
                                    </div><!-- End .custom-control -->
                                </td>
                                <td>10.000đ</td>
                            </tr><!-- End .summary-shipping-row -->
                            <tr class="summary-total">
                                <td>Tổng giỏ hàng:</td>
                                <td><?= number_format($total_bill, 0, ",", ".") ?>đ</td>
                            </tr><!-- End .summary-total -->
                            </tbody>
                        </table><!-- End .table table-summary -->
                        </form>
                        <form action="?action=checkout" method="post">
                            <input type="hidden" name="discount" value="<?= $discount ?>">
                            <input type="hidden" name="code" value="<?= $code ?>">
                            <button class="btn btn-outline-primary-2 btn-order btn-block">TIẾP TỤC THANH TOÁN
                            </button>
                        </form>
                    </div><!-- End .summary -->
                    <a href="http://duanone.php/?action=products" class="btn btn-outline-dark-2 btn-block mb-3"><span>TIẾP TỤC MUA HÀNG</span><i
                                class="icon-refresh"></i></a>
                </aside><!-- End .col-lg-3 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .cart -->
</div><!-- End .page-content -->
