<?php

include "admin/pages/products/product.php";
$pro = new product();
$db = new connect();
$value = $pro->GetAllProduct();
$category = $pro->GetCategory();
if (!isset ($_SESSION ['cart'])) {
    $_SESSION ['cart'] = [];
}
//var_dump($_POST['price']);
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $thumbnail = $_POST['thumbnail'];
    $price = $_POST['price'];
    $qty = 1;
    $product = [
        'id' => $id,
        'name' => $name,
        'thumbnail' => $thumbnail,
        'price' => $price,
        'qty' => $qty
    ];
    $found = false;
    if (isset ($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $productId) {
            if ($id == $productId['id']) {
                $_SESSION['cart']["$id"]['qty']++;
                $found = true;
                break;

            }
        }
    }
    var_dump($found);
    if (!$found) {
        $_SESSION['cart']["$id"] = $product;
    }
// header ('location: cart.php') ;
}
//var_dump( $_SESSION['cart']);

?>
<div id="value">
</div>
<main class="main">
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">TRANG SẢN PHẨM</h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->


    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="toolbox">
                        <div class="toolbox-left">
                            <div class="toolbox-info">
                                <!--                                Showing <span>9 of 56</span> Products-->
                            </div><!-- End .toolbox-info -->
                        </div><!-- End .toolbox-left -->
                        <div class="toolbox-right">
                            <div class="toolbox-sort">
                                <label for="sortby">Sort by:</label>
                                <div class="select-custom">
                                    <select name="sortby" id="sortby" class="form-control">
                                        <option value="popularity" selected="selected">Most Popular</option>
                                        <option value="rating">Most Rated</option>
                                        <option value="date">Date</option>
                                    </select>
                                </div>
                            </div><!-- End .toolbox-sort -->

                        </div><!-- End .toolbox-right -->
                    </div><!-- End .toolbox -->

                    <div class="products mb-3 content">
                        <div class="row justify-content-center">
                            <?php foreach ($value as $product):
                                $fistOption = $pro->FistOptions($product['product_id']);
                                if (!empty($fistOption)) {
                                    $optionSelected = explode(',', $fistOption['option_ids']);
                                    $option_id = implode(',', $optionSelected);
                                    $id = str_replace(",", "", $option_id);
                                    $nameOption = $pro->GetOptionById($option_id);
                                } else {
                                    $nameOption = [];
                                }
                                ?>
                                <div class="col-6 col-md-4 col-lg-4 product-item category-<?= $product['categori_id'] ?>">
                                    <div class="product product-7 text-center">
                                        <figure class="product-media">
                                            <span class="product-label label-new">New</span>
                                            <a href="?action=products-detail&product=<?= $product['product_id'] ?>">
                                                <img src="<?= $product['thumbnail'] ?>" alt="Product image"
                                                     class="product-image">
                                            </a>

                                            <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>

                                            </div><!-- End .product-action-vertical -->

                                            <div class="product-action">
                                                <form action="" class="addcartForm" method="post">
                                                    <input type="hidden" name="thumbnail"
                                                           value="<?= $product['thumbnail'] ?>" class="thumbnail">
                                                    <input type="hidden" name="id" value="<?= $id ?>"
                                                           class="id">
                                                    <input type="hidden" name="name"
                                                           value="<?= $product['product_name'] ?>
                                                            <?php if (!empty($nameOption)): ?>
                                                            <?php foreach ($nameOption as $name): ?>
                                                            <?= $name['name'] ?>
                                                            <?php endforeach; ?>
                                                            <?php endif;
                                                           ?>
                                                            " class="name">
                                                    <input type="hidden" name="price" value="<?= $product['price'] ?>"
                                                           class="price">
                                                    <button type="submit" style="width: 100%" name="addcart"
                                                            class="addcart btn-product btn-cart border-0">
                                                        <span>add to cart</span></button>
                                                </form>

                                                <!--                                                    </button>-->
                                            </div><!-- End .product-action -->
                                        </figure><!-- End .product-media -->
                                        <div class="product-body">
                                            <div class="product-cat">
                                                <a href="#"><?= $pro->GetNameCategoryById($product['categori_id']) ?></a>
                                            </div><!-- End .product-cat -->
                                            <h3 class="product-title"><a
                                                        href="?action=products-detail&product=<?= $product['product_id'] ?>"><?= $product['product_name'] ?>
                                                    <?php if (!empty($nameOption)): ?>
                                                        <?php foreach ($nameOption as $name): ?>
                                                            <?= $name['name'] ?>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </a></h3><!-- End .product-title -->
                                            <div class="product-price text-danger">
                                                <?= number_format($product['price'], 0, ",", ".") ?> VNĐ
                                            </div><!-- End .product-price -->
                                            <div class="ratings-container">
                                                <div class="ratings">
                                                    <div class="ratings-val" style="width: 20%;"></div>
                                                    <!-- End .ratings-val -->
                                                </div><!-- End .ratings -->
                                                <span class="ratings-text">( 2 Reviews )</span>
                                            </div><!-- End .rating-container -->
                                        </div><!-- End .product-body -->
                                    </div><!-- End .product -->
                                </div><!-- End .col-sm-6 col-lg-4 -->

                            <?php endforeach; ?>

                        </div><!-- End .row -->
                    </div><!-- End .products -->

                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link page-link-prev" href="#" aria-label="Previous" tabindex="-1"
                                   aria-disabled="true">
                                    <span aria-hidden="true"><i class="icon-long-arrow-left"></i></span>Prev
                                </a>
                            </li>
                            <li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item-total">of 6</li>
                            <li class="page-item">
                                <a class="page-link page-link-next" href="#" aria-label="Next">
                                    Next <span aria-hidden="true"><i class="icon-long-arrow-right"></i></span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div><!-- End .col-lg-9 -->
                <aside class="col-lg-3 order-lg-first">
                    <div class="sidebar sidebar-shop">
                        <div class="widget widget-clean">
                            <label>Filters:</label>
                            <a href="#" class="sidebar-filter-clear">Clean All</a>
                        </div><!-- End .widget widget-clean -->

                        <div class="widget widget-collapsible">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-1" role="button" aria-expanded="true"
                                   aria-controls="widget-1">
                                    Danh Mục
                                </a>
                            </h3><!-- End .widget-title -->

                            <div class="collapse show" id="widget-1">
                                <div class="widget-body list-group">
                                    <div class="text-dark p-1 button " data-type="*" style="cursor: pointer;">
                                        <p class="text-dark ">Tất cả</p>
                                    </div>
                                    <?php foreach ($category as $name): ?>
                                        <div class="text-dark p-1 button " data-type=".category-<?= $name['id'] ?>"
                                             style="cursor: pointer;">
                                            <p class="text-dark "><?= $name['name_category'] ?></p>
                                        </div>
                                    <?php endforeach; ?>
                                </div><!-- End .widget-body -->
                            </div><!-- End .collapse -->
                        </div><!-- End .widget -->


                        <div class="widget widget-collapsible">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-5" role="button" aria-expanded="true"
                                   aria-controls="widget-5">
                                    Price
                                </a>
                            </h3><!-- End .widget-title -->

                            <div class="collapse show" id="widget-5">
                                <div class="widget-body">
                                    <div class="filter-price">
                                        <div class="filter-price-text">
                                            Price Range:
                                            <span id="filter-price-range">$0 - $400</span>
                                        </div><!-- End .filter-price-text -->

                                        <div id="price-slider" class="noUi-target noUi-ltr noUi-horizontal">
                                            <!--                                            <div class="noUi-base">-->
                                            <!--                                                <div class="noUi-connects">-->
                                            <!--                                                    <div class="noUi-connect"-->
                                            <!--                                                         style="transform: translate(0%, 0px) scale(0.4, 1);"></div>-->
                                            <!--                                                </div>-->
                                            <!--                                                <div class="noUi-origin"-->
                                            <!--                                                     style="transform: translate(-100%, 0px); z-index: 5;">-->
                                            <!--                                                    <div class="noUi-handle noUi-handle-lower" data-handle="0"-->
                                            <!--                                                         tabindex="0" role="slider" aria-orientation="horizontal"-->
                                            <!--                                                         aria-valuemin="0.0" aria-valuemax="200.0" aria-valuenow="0.0"-->
                                            <!--                                                         aria-valuetext="$0">-->
                                            <!--                                                        <div class="noUi-touch-area"></div>-->
                                            <!--                                                        <div class="noUi-tooltip">$0</div>-->
                                            <!--                                                    </div>-->
                                            <!--                                                </div>-->
                                            <!--                                                <div class="noUi-origin"-->
                                            <!--                                                     style="transform: translate(-60%, 0px); z-index: 6;">-->
                                            <!--                                                    <div class="noUi-handle noUi-handle-upper" data-handle="1"-->
                                            <!--                                                         tabindex="0" role="slider" aria-orientation="horizontal"-->
                                            <!--                                                         aria-valuemin="200.0" aria-valuemax="1000.0"-->
                                            <!--                                                         aria-valuenow="400.0" aria-valuetext="$400">-->
                                            <!--                                                        <div class="noUi-touch-area"></div>-->
                                            <!--                                                        <div class="noUi-tooltip">$400</div>-->
                                            <!--                                                    </div>-->
                                            <!--                                                </div>-->
                                            <!--                                            </div>-->
                                        </div><!-- End #price-slider -->
                                    </div><!-- End .filter-price -->
                                </div><!-- End .widget-body -->
                            </div><!-- End .collapse -->
                        </div><!-- End .widget -->
                    </div><!-- End .sidebar sidebar-shop -->
                </aside><!-- End .col-lg-3 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div>


</main>
<script>
    $(document).ready(function () {
        var $grid = $('.content').isotope({
            itemSelector: '.product-item',
            layoutMode: 'fitRows'
        });
        // filter items on button click
        $('.list-group').on('click', '.button', function () {
            var filterValue = $(this).attr('data-type');
            console.log(filterValue);
            $grid.isotope({filter: filterValue});
        });
    });
</script>