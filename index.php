<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<!-- molla/index-4.html  22 Nov 2019 09:53:08 GMT -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Molla - Bootstrap eCommerce Template</title>
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Molla - Bootstrap eCommerce Template">
    <meta name="author" content="p-themes">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/icons/favicon-16x16.png">
    <link rel="manifest" href="assets/images/icons/site.html">
    <link rel="mask-icon" href="assets/images/icons/safari-pinned-tab.svg" color="#666666">
    <link rel="shortcut icon" href="assets/images/icons/favicon.ico">
    <meta name="apple-mobile-web-app-title" content="Molla">
    <meta name="application-name" content="Molla">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="assets/images/icons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="assets/vendor/line-awesome/line-awesome/line-awesome/css/line-awesome.min.css">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/plugins/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/plugins/magnific-popup/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/plugins/jquery.countdown.css">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/font.css">
    <link rel="stylesheet" href="assets/css/plugins/nouislider/nouislider.css">
    <link rel="stylesheet" href="assets/css/skins/skin-demo-4.css">
    <link rel="stylesheet" href="assets/css/demos/demo-4.css">
    <link rel="stylesheet" href="assets/css/skins/skin-demo-13.css">
    <!-- <link rel="stylesheet" href="assets/css/demos/demo-13.css">-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/91f424987f.js" crossorigin="anonymous"></script>
</head>

<body>
<div class="page-wrapper">
    <?php include './components/header.php'; ?>
    <main>
        <?php
        include "config/database.php";
        if (isset($_GET['action'])) {
            switch ($_GET['action']) {
                case 'home':
                    include './page/home.php';
                    break;
                case 'products':
                    include './page/products/products.php';
                    break;
                case 'products-detail':
                    include './page/products/product_detail.php';
                    break;
                case 'about':
                    include './page/about.php';
                    break;
                case 'blog':
                    include './page/blog/blog.php';
                    break;
                case 'contact':
                    include './page/contact.php';
                    break;
                case 'cart':
                    include './page/cart/cart.php';
                    break;
                case 'checkout':
                    include './page/cart/checkout.php';
                    break;
            }
        } else {
            include './page/home.php';
        }
        ?>
    </main>

    <?php include './components/footer.php'; ?>
</div><!-- End .page-wrapper -->
<?php include './components/mobile_menu.php'; ?>
<!-- Plugins JS File -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/jquery.hoverIntent.min.js"></script>
<script src="assets/js/jquery.waypoints.min.js"></script>
<script src="assets/js/superfish.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/wNumb.js"></script>
<script src="assets/js/bootstrap-input-spinner.js"></script>
<script src="assets/js/jquery.plugin.min.js"></script>
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<script src="assets/js/jquery.countdown.min.js"></script>
<script src="assets/js/nouislider.min.js"></script>
<!-- Main JS File -->
<script src="assets/js/main.js"></script>
<script src="assets/js/demos/demo-4.js"></script>
<script src="assets/isotop.js"></script>

</body>


<!-- molla/index-4.html  22 Nov 2019 09:54:18 GMT -->

</html>