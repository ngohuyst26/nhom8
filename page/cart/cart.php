<?php
include "classCart.php";
$total_bill = 0;
if (isset($_SESSION['cart'])) {
    if (isset($_POST['removecart'])) {
        $cart_id = $_POST['removecart'];
        foreach ($_SESSION['cart'] as $productId) {
            if ($cart_id == $productId['cart_id']) {
                unset($_SESSION['cart']["$cart_id"]);
                // header('Location: cart.php') ;
                break;
            }
        }
    }
}


if (isset($_SESSION['cart'])) {
    if (isset($_POST['editcart'])) {
        $cart_id = $_POST['id'];
        $leght = sizeof($_SESSION['cart']);
        $qtyedit = $_POST['editqty'];
        for ($i = 0; $i < $leght; $i++) {
            $_SESSION['cart'][$cart_id[$i]]['qty'] = $qtyedit[$i];
        }
    }
    // header('Location: cart.php');
}

//unset($_SESSION['cart']);
//var_dump( $_SESSION['cart']);
?>
<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
    <div class="container">
        <h1 class="page-title">Shopping Cart<span>Shop</span></h1>
    </div><!-- End .container -->
</div><!-- End .page-header -->
<nav aria-label="breadcrumb" class="breadcrumb-nav">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Shop</a></li>
            <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
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
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
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
                                            <input type="hidden" name="id[]" value="<?= $cart['cart_id'] ?>">
                                        </div><!-- End .cart-product-quantity -->
                                    </td>
                                    <td class="total-col"><?= number_format(($cart['price'] * $cart['qty']), 0, ",", ".") ?>
                                        đ
                                    </td>
                                    <td class="remove-col">
                                        <button class="btn-remove" name="removecart" value="<?= $cart['cart_id'] ?>"><i
                                                    class="icon-close"></i></button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table><!-- End .table table-wishlist -->

                        <div class="cart-bottom">
                            <div class="cart-discount">
                                <form action="#">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="coupon code">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-primary-2" type="submit"><i
                                                        class="icon-long-arrow-right"></i></button>
                                        </div><!-- .End .input-group-append -->
                                    </div><!-- End .input-group -->
                                </form>
                            </div><!-- End .cart-discount -->

                            <button type="submit" name="editcart" class="btn btn-outline-dark-2">
                                <span>UPDATE CART</span><i class="icon-refresh"></i></button>
                        </div><!-- End .cart-bottom -->
                </div><!-- End .col-lg-9 -->
                <aside class="col-lg-3">
                    <div class="summary summary-cart">
                        <h3 class="summary-title">Cart Total</h3><!-- End .summary-title -->

                        <table class="table table-summary">
                            <tbody>
                            <tr class="summary-subtotal">
                                <td>Subtotal:</td>
                                <td><?= number_format($total_bill, 0, ",", ".") ?>đ</td>
                            </tr><!-- End .summary-subtotal -->
                            <tr class="summary-shipping">
                                <td>Shipping:</td>
                                <td>&nbsp;</td>
                            </tr>

                            <tr class="summary-shipping-row">
                                <td>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="free-shipping" name="shipping"
                                               class="custom-control-input">
                                        <label class="custom-control-label" for="free-shipping">Free Shipping</label>
                                    </div><!-- End .custom-control -->
                                </td>
                                <td>$0.00</td>
                            </tr><!-- End .summary-shipping-row -->

                            <tr class="summary-shipping-row">
                                <td>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="standart-shipping" name="shipping" class="custom-control-input">
                                        <label class="custom-control-label" for="standart-shipping">Standart:</label>
                                    </div><!-- End .custom-control -->
                                </td>
                                <td>$10.00</td>
                            </tr><!-- End .summary-shipping-row -->

                            <tr class="summary-shipping-row">
                                <td>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="express-shipping" name="shipping" class="custom-control-input">
                                        <label class="custom-control-label" for="express-shipping">Express:</label>
                                    </div><!-- End .custom-control -->
                                </td>
                                <td>$20.00</td>
                            </tr><!-- End .summary-shipping-row -->


                            <tr class="summary-total">
                                <td>Total:</td>
                                <td><?= number_format($total_bill, 0, ",", ".") ?>đ</td>
                            </tr><!-- End .summary-total -->
                            </tbody>
                        </table><!-- End .table table-summary -->
                        </form>
                        <a href="?action=checkout" class="btn btn-outline-primary-2 btn-order btn-block">PROCEED TO
                            CHECKOUT</a>
                    </div><!-- End .summary -->

                    <a href="http://duanone.php/?action=products" class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUE SHOPPING</span><i
                                class="icon-refresh"></i></a>
                </aside><!-- End .col-lg-3 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .cart -->
</div><!-- End .page-content -->
