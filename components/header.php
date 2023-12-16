<?php
if (!isset ($_SESSION ['cart'])) {
    $_SESSION ['cart'] = [];
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

?>

<header class="header header-intro-clearance header-4">
    <div class="header-top">
        <div class="container">
            <div class="header-left">
                <a href="tel:#"><i class="icon-phone"></i>Call: +0123 456 789</a>
            </div><!-- End .header-left -->

            <div class="header-right">

                <ul class="top-menu">
                    <li>
                        <a href="#">Links</a>
                        <ul>
                            <li>
                                <div class="header-dropdown">
                                    <a href="#">VNĐ</a>
                                    <div class="header-menu">
                                        <ul>
                                            <li><a href="#">Eur</a></li>
                                            <li><a href="#">Usd</a></li>
                                        </ul>
                                    </div><!-- End .header-menu -->
                                </div>
                            </li>
                            <li>
                                <div class="header-dropdown">
                                    <a href="#">English</a>
                                    <div class="header-menu">
                                        <ul>
                                            <li><a href="#">English</a></li>
                                            <li><a href="#">French</a></li>
                                            <li><a href="#">Spanish</a></li>
                                        </ul>
                                    </div><!-- End .header-menu -->
                                </div>
                            </li>
                            <li><?php
                                if (isset($_SESSION['name'])){
                                    echo $_SESSION['name'];
                                }
                                ?></li>
                        </ul>
                    </li>
                </ul><!-- End .top-menu -->
            </div><!-- End .header-right -->

        </div><!-- End .container -->
    </div><!-- End .header-top -->

    <div class="header-middle">
        <div class="container">
            <div class="header-left">
                <button class="mobile-menu-toggler">
                    <span class="sr-only">Toggle mobile menu</span>
                    <i class="icon-bars"></i>
                </button>

                <a href="index.html" class="logo">
                    <img src="assets/images/demos/demo-4/logo.png" alt="Molla Logo" width="105" height="25">
                </a>
            </div><!-- End .header-left -->

            <div class="header-center">
                <div class="header-search header-search-extended header-search-visible d-none d-lg-block">
                    <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                    <form action="#" method="get">
                        <div class="header-search-wrapper search-wrapper-wide">
                            <label for="q" class="sr-only">Search</label>
                            <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
                            <input type="search" class="form-control" name="search" id="search"
                                   placeholder="Tìm kiếm sản phẩm theo tên..." required>
                        </div><!-- End .header-search-wrapper -->
                    </form>
                </div><!-- End .header-search -->
            </div>

            <div class="header-right">


                <div class="dropdown cart-dropdown">
                    <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false" data-display="static">
                        <div class="icon">
                            <i class="icon-shopping-cart"></i>
                            <span class="cart-count"><?= (isset($_SESSION['cart']) ? sizeof($_SESSION['cart']) : "") ?></span>
                        </div>
                        <p>Giỏ hàng</p>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-cart-products">
                            <?php foreach ($_SESSION['cart'] as $cart):
                                $total_product = $cart['price'] * $cart['qty'];
                                $total_bill += $total_product;
                                ?>
                                <div class="product">
                                    <div class="product-cart-details">
                                        <h4 class="product-title">
                                            <a href=""><?= $cart['name'] ?></a>
                                        </h4>

                                        <span class="cart-product-info">
                                                <span class="cart-product-qty"><?= $cart['qty'] ?></span>
                                                x <?= number_format($cart['price'], 0, ",", ".") ?> VNĐ
                                            </span>
                                    </div><!-- End .product-cart-details -->

                                    <figure class="product-image-container">
                                        <a href="#" class="product-image">
                                            <img src="<?= $cart['thumbnail'] ?>" alt="product">
                                        </a>
                                    </figure>
                                    <a href="#" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
                                </div><!-- End .product -->
                            <?php endforeach; ?>
                        </div><!-- End .cart-product -->

                        <div class="dropdown-cart-total">
                            <span>Tổng giá</span>

                            <span class="cart-total-price"><?= number_format($total_bill, 0, ",", ".") ?>đ</span>
                        </div><!-- End .dropdown-cart-total -->

                        <div class="dropdown-cart-action">
                            <a href="?action=cart" class="btn btn-primary">Xem giỏ hàng</a>
                            <a href="?action=checkout" class="btn btn-outline-primary-2"><span>Checkout</span><i
                                        class="icon-long-arrow-right"></i></a>
                        </div><!-- End .dropdown-cart-total -->
                    </div><!-- End .dropdown-menu -->
                </div><!-- End .cart-dropdown -->
            </div><!-- End .header-right -->
        </div><!-- End .container -->
    </div><!-- End .header-middle -->

    <div class="header-bottom sticky-header">
        <div class="container">
            <div class="header-left">
            </div><!-- End .header-left -->

            <div class="header-center">
                <nav class="main-nav">
                    <ul class="menu sf-arrows">
                        <li class="<?= (isset($_GET['action']) && $_GET['action'] == 'home')?'megamenu-container  active':''?> ">
                            <a href="?action=home">Trang chủ</a>
                        </li>
                        <li class="<?= (isset($_GET['action']) && $_GET['action'] == 'products')?'megamenu-container  active':''?>">
                            <a href="?action=products" >Sản phẩm</a>
                        </li class="<?= (isset($_GET['action']) && $_GET['action'] == 'about')?'megamenu-container  active':''?>">
                        <li>
                            <a href="?action=about" >Giới thiệu</a>
                        </li>
                        <li class="<?= (isset($_GET['action']) && $_GET['action'] == 'blog') ? 'megamenu-container  active' : '' ?>">
                            <a href="?action=blog">Bài viết</a>
                        </li>
                        <li class="<?= (isset($_GET['action']) && $_GET['action'] == 'contact') ? 'megamenu-container  active' : '' ?>">
                            <a href="?action=contact">Liên hệ</a>
                        </li>
                        <li class="<?= (isset($_GET['action']) && $_GET['action'] == 'cart') ? 'megamenu-container  active' : '' ?>">
                            <a href="?action=cart">Giỏ hàng</a>
                        </li>
                        <?php
                        $hienthi = "";
                        $login = "Đăng nhập";
                        $account = "Tài khoản";
                        if (isset($_SESSION['name']) && isset($_SESSION['email'])) {
                            $hienthi = $account;
                            ?>
                            <li class="<?= (isset($_GET['action']) && $_GET['action'] == 'account') ? 'megamenu-container  active' : '' ?>">
                                <a href="?action=account"><?= $hienthi ?></a>
                            </li>
                        <?php } else {
                            $hienthi = $login;
                            ?>
                            <li class="<?= (isset($_GET['action']) && $_GET['action'] == 'login') ? 'megamenu-container  active' : '' ?>">
                                <a href="?action=login"><?= $hienthi ?></a>
                            </li>
                            <?php
                        }
                        ?>
                    </ul><!-- End .menu -->
                </nav><!-- End .main-nav -->
            </div><!-- End .header-center -->
        </div><!-- End .container -->
    </div><!-- End .header-bottom -->
</header><!-- End .header -->
<script>
    $(document).ready(function () {

        $('#search').on('keyup', function (e) {
            e.preventDefault();
            console.log($(this).val());
            $.ajax({
                url: 'page/products/productSearch.php',
                type: 'POST',
                data: {
                    search: $(this).val()
                }
            }).done(function (ketqua) {
                $('#product-search').html(ketqua);
            });

        });
    });

</script>
