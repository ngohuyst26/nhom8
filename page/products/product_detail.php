<?php
include "admin/pages/products/product.php";
$pro = new product();
$db = new connect();

if (isset($_GET['product'])) {
    $id_product = $_GET['product'];
    $value = $pro->GetOneProduct($id_product);
    $variants_options = $pro->GetOptionsVariants($id_product);
    $fistOption = $pro->FistOptions($id_product);
    if ($fistOption) {
        $optionSelected = explode(',', $fistOption['option_ids']);
        $option_id = implode(',', $optionSelected);
        $nameOption = $pro->GetOptionById($option_id);
    }
}


if (isset($_POST['option'])) {
    $_SESSION['option_id'] = $_POST['option'];
    $optionSelected = $_POST['option'];
    $size = sizeof($optionSelected);
    $option_id = implode(',', $optionSelected);
    $nameOption = $pro->GetOptionById($option_id);
    if (!empty($pro->DeltaiProduct($option_id, $size))) {
        $value = $pro->DeltaiProduct($option_id, $size);
    } else {
        $value = $pro->GetOneProduct($_GET['product']);
        $value['price'] = 0;
    }
}
if (!isset ($_SESSION ['cart'])) {
    $_SESSION ['cart'] = [];
}


if (isset ($_POST['addcart'])) {
    if (!empty($variants_options)) {
        if (!empty($_SESSION['option_id'])) {
            $option_id = implode(',', $_SESSION['option_id']);
            $cart_id = str_replace(",", "", $option_id);
        } else {
            $optionSelected = explode(',', $fistOption['option_ids']);
            $option_id = implode(',', $optionSelected);
            $cart_id = str_replace(",", "", $option_id);
        }
    } else {
        $cart_id = $_POST['id'];
    }
//    var_dump($id);
    $id = $_POST['id'];
    $name = $_POST['name'];
    $thumbnail = $_POST['thumbnail'];
    $price = $_POST['price'];
    $qty = 1;
    $product = [
        'cart_id' => $cart_id,
        'id' => $id,
        'name' => $name,
        'thumbnail' => $thumbnail,
        'price' => $price,
        'qty' => $qty
    ];
    $found = false;
    if (isset ($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $productId) {
            if ($cart_id == $productId['cart_id']) {
                $_SESSION['cart']["$cart_id"]['qty']++;
                $found = true;
                break;
            }
        }
    }
    if (!$found) {
        $_SESSION['cart']["$cart_id"] = $product;
    }
    unset($_SESSION['option_id']);
// header ('location: cart.php') ;
}
//unset($_SESSION['cart']);

?>
<style>
    .boxed label {
        display: inline-block;
        width: auto;
        min-width: 50px;
        text-align: center;
        padding: 10px;
        border: solid 2px #ccc;
        transition: all 0.3s;
        margin: 5px;
    }

    .boxed input[type="radio"] {
        display: none;
    }

    .boxed input[type="radio"]:checked + label {
        border: solid 2px #39f;
    }

</style>
<nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
    <div class="container d-flex align-items-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>
            <li class="breadcrumb-item active" aria-current="page">Chi tiết sản phẩm</li>
        </ol>


    </div><!-- End .container -->
</nav><!-- End .breadcrumb-nav -->

<div class="page-content">
    <div class="container">
        <div class="product-details-top">
            <div class="row">
                <div class="col-md-6">
                    <div class="product-gallery product-gallery-vertical">
                        <div class="row">
                            <figure class="product-main-image">
                                <img id="product-zoom" src="<?= $value['thumbnail'] ?>" alt="product image">

                                <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                    <i class="icon-arrows"></i>
                                </a>
                            </figure><!-- End .product-main-image -->


                        </div><!-- End .row -->
                    </div>
                </div><!-- End .col-md-6 -->

                <div class="col-md-6">
                    <div class="product-details">
                        <h1 class="product-title"><?= $value['product_name'] ?>
                            <?php if (!empty($nameOption)): ?>
                                <?php foreach ($nameOption as $name): ?>
                                    <?= $name['name'] ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </h1><!-- End .product-title -->

                        <div class="ratings-container">
                            <div class="ratings">
                                <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                            </div><!-- End .ratings -->
                            <a class="ratings-text" href="#product-review-link" id="review-link">( 2 Reviews )</a>
                        </div><!-- End .rating-container -->

                        <div class="product-price">
                            <?php if ($value['price'] > 0): ?>
                                <?= number_format($value['price'], 0, ",", ".") . "VNĐ" ?>
                            <?php else: ?>
                                HẾT HÀNG
                            <?php endif; ?>
                        </div><!-- End .product-price -->

                        <div class="product-content">
                            <p><?= $value['description'] ?></p>
                        </div><!-- End .product-content -->

                        <?php if (!empty($variants_options)): ?>
                            <form action="" id="optionForm" method="post">
                                <?php foreach ($variants_options as $checked => $option):
                                    $optionNamesArray = explode(',', $option['option_names']);
                                    $optionIdArray = explode(',', $option['option_ids']);
                                    ?>
                                    <div class="details-filter-row details-row-size">
                                        <p><?= $option['variant_name'] ?>:</p>
                                        <div class="product-nav product-nav-thumbs">
                                            <div class="boxed">
                                                <?php foreach ($optionNamesArray as $index => $name): ?>
                                                    <input type="radio" class="option"
                                                           id="<?= $optionIdArray[$index] ?>"
                                                           name="option[<?= $checked ?>]" <?= (($optionIdArray[$index] == $optionSelected[$checked]) ? 'checked' : ' ') ?>
                                                           value="<?= $optionIdArray[$index] ?>">
                                                    <label class="nameOption"
                                                           for="<?= $optionIdArray[$index] ?>"><?= $name ?></label>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </form>
                        <?php endif; ?>
                        <div class="details-filter-row details-row-size">
                            <label for="qty">Qty:</label>
                            <div class="product-details-quantity">
                                <input type="number" id="qty" class="form-control" value="1" min="1" max="10" step="1"
                                       data-decimals="0" required>
                            </div><!-- End .product-details-quantity -->
                        </div><!-- End .details-filter-row -->

                        <div class="product-details-action">
                            <form action="" method="post">
                                <input type="hidden" name="thumbnail" value="<?= $value['thumbnail'] ?>"
                                       class="thumbnail">
                                <input type="hidden" name="id" value="<?= $value['product_id'] ?>" class="id">
                                <input type="hidden" name="name" value="<?= $value['product_name'] ?>
                                <?php if (!empty($variants_options)): ?>
                                <?php foreach ($nameOption as $name): ?>
                                <?= $name['name'] ?>
                                <?php endforeach; ?>
                                <?php endif; ?>" class="name">
                                <input type="hidden" name="price" value="<?= $value['price'] ?>" class="price">
                                <?php if ($value['price'] > 0): ?>
                                    <button type="submit" name="addcart" class="btn-product btn-cart">
                                        <span>add to cart</span></button>
                                <?php endif; ?>
                            </form>

                            <!--                            <div class="details-action-wrapper">-->
                            <!--                                <a href="#" class="btn-product btn-wishlist"-->
                            <!--                                   title="Wishlist"><span>Add to Wishlist</span></a>-->
                            <!--                                <a href="#" class="btn-product btn-compare" title="Compare"><span>Add to Compare</span></a>-->
                            <!--                            </div>-->
                            <!-- End .details-action-wrapper -->
                        </div><!-- End .product-details-action -->

                        <div class="product-details-footer">
                            <div class="social-icons social-icons-sm">
                                <span class="social-label">Chia sẽ:</span>
                                <a href="#" class="social-icon" title="Facebook" target="_blank"><i
                                            class="icon-facebook-f"></i></a>
                                <a href="#" class="social-icon" title="Twitter" target="_blank"><i
                                            class="icon-twitter"></i></a>
                                <a href="#" class="social-icon" title="Instagram" target="_blank"><i
                                            class="icon-instagram"></i></a>
                                <a href="#" class="social-icon" title="Pinterest" target="_blank"><i
                                            class="icon-pinterest"></i></a>
                            </div>
                        </div><!-- End .product-details-footer -->
                    </div><!-- End .product-details -->
                </div><!-- End .col-md-6 -->
            </div><!-- End .row -->
        </div><!-- End .product-details-top -->

        <div class="product-details-tab">
            <ul class="nav nav-pills justify-content-center" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab"
                       role="tab" aria-controls="product-desc-tab" aria-selected="true">Mô tả</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="product-review-link" data-toggle="tab" href="#product-review-tab" role="tab"
                       aria-controls="product-review-tab" aria-selected="false">Đánh giá</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel"
                     aria-labelledby="product-desc-link">
                    <div class="product-desc-content">
                        <p><?= $value['description'] ?></p>
                    </div><!-- End .product-desc-content -->
                </div><!-- .End .tab-pane -->
                <div class="tab-pane fade" id="product-review-tab" role="tabpanel"
                     aria-labelledby="product-review-link">
                    <div class="reviews">
                        <h3>Đánh giá</h3>
                        <div class="review">
                            <div class="row no-gutters">
                                <div class="col-auto">
                                    <h4><a href="#">Samanta J.</a></h4>
                                    <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                                        </div><!-- End .ratings -->
                                    </div><!-- End .rating-container -->
                                    <span class="review-date">6 days ago</span>
                                </div><!-- End .col -->
                                <div class="col">
                                    <h4>Good, perfect size</h4>

                                    <div class="review-content">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus cum dolores
                                            assumenda asperiores facilis porro reprehenderit animi culpa atque
                                            blanditiis commodi perspiciatis doloremque, possimus, explicabo, autem fugit
                                            beatae quae voluptas!</p>
                                    </div><!-- End .review-content -->

                                    <div class="review-action">
                                        <a href="#"><i class="icon-thumbs-up"></i>Helpful (2)</a>
                                        <a href="#"><i class="icon-thumbs-down"></i>Unhelpful (0)</a>
                                    </div><!-- End .review-action -->
                                </div><!-- End .col-auto -->
                            </div><!-- End .row -->
                        </div><!-- End .review -->

                        <div class="review">
                            <div class="row no-gutters">
                                <div class="col-auto">
                                    <h4><a href="#">John Doe</a></h4>
                                    <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 100%;"></div>
                                            <!-- End .ratings-val -->
                                        </div><!-- End .ratings -->
                                    </div><!-- End .rating-container -->
                                    <span class="review-date">5 days ago</span>
                                </div><!-- End .col -->
                                <div class="col">
                                    <h4>Very good</h4>

                                    <div class="review-content">
                                        <p>Sed, molestias, tempore? Ex dolor esse iure hic veniam laborum blanditiis
                                            laudantium iste amet. Cum non voluptate eos enim, ab cumque nam, modi, quas
                                            iure illum repellendus, blanditiis perspiciatis beatae!</p>
                                    </div><!-- End .review-content -->

                                    <div class="review-action">
                                        <a href="#"><i class="icon-thumbs-up"></i>Helpful (0)</a>
                                        <a href="#"><i class="icon-thumbs-down"></i>Unhelpful (0)</a>
                                    </div><!-- End .review-action -->
                                </div><!-- End .col-auto -->
                            </div><!-- End .row -->
                        </div><!-- End .review -->
                    </div><!-- End .reviews -->
                </div><!-- .End .tab-pane -->
            </div><!-- End .tab-content -->
        </div><!-- End .product-details-tab -->

        <h2 class="title text-center mb-4">You May Also Like</h2><!-- End .title text-center -->

        <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
             data-owl-options='{
                            "nav": false, 
                            "dots": true,
                            "margin": 20,
                            "loop": false,
                            "responsive": {
                                "0": {
                                    "items":1
                                },
                                "480": {
                                    "items":2
                                },
                                "768": {
                                    "items":3
                                },
                                "992": {
                                    "items":4
                                },
                                "1200": {
                                    "items":4,
                                    "nav": true,
                                    "dots": false
                                }
                            }
                        }'>
            <div class="product product-7 text-center">
                <figure class="product-media">
                    <span class="product-label label-new">New</span>
                    <a href="product.html">
                        <img src="assets/images/products/product-4.jpg" alt="Product image" class="product-image">
                    </a>

                    <div class="product-action-vertical">
                        <a href="#"
                           class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                        <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                        <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                    </div><!-- End .product-action-vertical -->

                    <div class="product-action">
                        <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                    </div><!-- End .product-action -->
                </figure><!-- End .product-media -->

                <div class="product-body">
                    <div class="product-cat">
                        <a href="#">Women</a>
                    </div><!-- End .product-cat -->
                    <h3 class="product-title"><a href="product.html">Brown paperbag waist <br>pencil skirt</a></h3>
                    <!-- End .product-title -->
                    <div class="product-price">
                        $60.00
                    </div><!-- End .product-price -->
                    <div class="ratings-container">
                        <div class="ratings">
                            <div class="ratings-val" style="width: 20%;"></div><!-- End .ratings-val -->
                        </div><!-- End .ratings -->
                        <span class="ratings-text">( 2 Reviews )</span>
                    </div><!-- End .rating-container -->

                    <div class="product-nav product-nav-thumbs">
                        <a href="#" class="active">
                            <img src="assets/images/products/product-4-thumb.jpg" alt="product desc">
                        </a>
                        <a href="#">
                            <img src="assets/images/products/product-4-2-thumb.jpg" alt="product desc">
                        </a>

                        <a href="#">
                            <img src="assets/images/products/product-4-3-thumb.jpg" alt="product desc">
                        </a>
                    </div><!-- End .product-nav -->
                </div><!-- End .product-body -->
            </div><!-- End .product -->

            <div class="product product-7 text-center">
                <figure class="product-media">
                    <span class="product-label label-out">Out of Stock</span>
                    <a href="product.html">
                        <img src="assets/images/products/product-6.jpg" alt="Product image" class="product-image">
                    </a>

                    <div class="product-action-vertical">
                        <a href="#"
                           class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                        <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                        <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                    </div><!-- End .product-action-vertical -->

                    <div class="product-action">
                        <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                    </div><!-- End .product-action -->
                </figure><!-- End .product-media -->

                <div class="product-body">
                    <div class="product-cat">
                        <a href="#">Jackets</a>
                    </div><!-- End .product-cat -->
                    <h3 class="product-title"><a href="product.html">Khaki utility boiler jumpsuit</a></h3>
                    <!-- End .product-title -->
                    <div class="product-price">
                        <span class="out-price">$120.00</span>
                    </div><!-- End .product-price -->
                    <div class="ratings-container">
                        <div class="ratings">
                            <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                        </div><!-- End .ratings -->
                        <span class="ratings-text">( 6 Reviews )</span>
                    </div><!-- End .rating-container -->
                </div><!-- End .product-body -->
            </div><!-- End .product -->

            <div class="product product-7 text-center">
                <figure class="product-media">
                    <span class="product-label label-top">Top</span>
                    <a href="product.html">
                        <img src="assets/images/products/product-11.jpg" alt="Product image" class="product-image">
                    </a>

                    <div class="product-action-vertical">
                        <a href="#"
                           class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                        <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                        <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                    </div><!-- End .product-action-vertical -->

                    <div class="product-action">
                        <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                    </div><!-- End .product-action -->
                </figure><!-- End .product-media -->

                <div class="product-body">
                    <div class="product-cat">
                        <a href="#">Shoes</a>
                    </div><!-- End .product-cat -->
                    <h3 class="product-title"><a href="product.html">Light brown studded Wide fit wedges</a></h3>
                    <!-- End .product-title -->
                    <div class="product-price">
                        $110.00
                    </div><!-- End .product-price -->
                    <div class="ratings-container">
                        <div class="ratings">
                            <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                        </div><!-- End .ratings -->
                        <span class="ratings-text">( 1 Reviews )</span>
                    </div><!-- End .rating-container -->

                    <div class="product-nav product-nav-thumbs">
                        <a href="#" class="active">
                            <img src="assets/images/products/product-11-thumb.jpg" alt="product desc">
                        </a>
                        <a href="#">
                            <img src="assets/images/products/product-11-2-thumb.jpg" alt="product desc">
                        </a>

                        <a href="#">
                            <img src="assets/images/products/product-11-3-thumb.jpg" alt="product desc">
                        </a>
                    </div><!-- End .product-nav -->
                </div><!-- End .product-body -->
            </div><!-- End .product -->

            <div class="product product-7 text-center">
                <figure class="product-media">
                    <a href="product.html">
                        <img src="assets/images/products/product-10.jpg" alt="Product image" class="product-image">
                    </a>

                    <div class="product-action-vertical">
                        <a href="#"
                           class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                        <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                        <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                    </div><!-- End .product-action-vertical -->

                    <div class="product-action">
                        <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                    </div><!-- End .product-action -->
                </figure><!-- End .product-media -->

                <div class="product-body">
                    <div class="product-cat">
                        <a href="#">Jumpers</a>
                    </div><!-- End .product-cat -->
                    <h3 class="product-title"><a href="product.html">Yellow button front tea top</a></h3>
                    <!-- End .product-title -->
                    <div class="product-price">
                        $56.00
                    </div><!-- End .product-price -->
                    <div class="ratings-container">
                        <div class="ratings">
                            <div class="ratings-val" style="width: 0%;"></div><!-- End .ratings-val -->
                        </div><!-- End .ratings -->
                        <span class="ratings-text">( 0 Reviews )</span>
                    </div><!-- End .rating-container -->
                </div><!-- End .product-body -->
            </div><!-- End .product -->

            <div class="product product-7 text-center">
                <figure class="product-media">
                    <a href="product.html">
                        <img src="assets/images/products/product-7.jpg" alt="Product image" class="product-image">
                    </a>

                    <div class="product-action-vertical">
                        <a href="#"
                           class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                        <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                        <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                    </div><!-- End .product-action-vertical -->

                    <div class="product-action">
                        <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                    </div><!-- End .product-action -->
                </figure><!-- End .product-media -->

                <div class="product-body">
                    <div class="product-cat">
                        <a href="#">Jeans</a>
                    </div><!-- End .product-cat -->
                    <h3 class="product-title"><a href="product.html">Blue utility pinafore denim dress</a></h3>
                    <!-- End .product-title -->
                    <div class="product-price">
                        $76.00
                    </div><!-- End .product-price -->
                    <div class="ratings-container">
                        <div class="ratings">
                            <div class="ratings-val" style="width: 20%;"></div><!-- End .ratings-val -->
                        </div><!-- End .ratings -->
                        <span class="ratings-text">( 2 Reviews )</span>
                    </div><!-- End .rating-container -->
                </div><!-- End .product-body -->
            </div><!-- End .product -->
        </div><!-- End .owl-carousel -->
    </div><!-- End .container -->
</div><!-- End .page-content -->
<script>
    $(document).ready(function () {
        $('input[type="radio"]').on('change', function () {
            // Thực hiện submit form
            $('#optionForm').submit();
        });
    });
</script>