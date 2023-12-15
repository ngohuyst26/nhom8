<?php
include "admin/pages/products/product.php";
$pro = new product();
$db = new connect();
$productRan = $pro->GetproductRan();
if (isset($_POST['review'])) {
    $id_product = $_GET['product'];
    $content = $_POST['content'];
    $rate_value = $_POST['rate_value'];
    $rating_msg = $_POST['rating_msg'];
    if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
        $pro->AddReview($rating_msg, $rate_value, $content, $id_product, $_SESSION['id']);
    }
}

if (isset($_GET['product'])) {
    $id_product = $_GET['product'];
    $value = $pro->GetOneProduct($id_product);
    $review = $pro->GetAllReview($id_product);
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
            $id = str_replace(",", "", $option_id);
        } else {
            $optionSelected = explode(',', $fistOption['option_ids']);
            $option_id = implode(',', $optionSelected);
            $id = str_replace(",", "", $option_id);
        }
    } else {
        $id = $_POST['id'];
        echo "hong";
    }
    var_dump($id);

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
    if (!$found) {
        $_SESSION['cart']["$id"] = $product;
    }
    unset($_SESSION['option_id']);
// header ('location: cart.php') ;
}

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

    @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,700);
    * {
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
    }

    body {
        color: #545454;
        font-family: "Open Sans", sans-serif;
    }

    .wrapper {
        margin: 0 auto;
        max-width: 960px;
        width: 100%;
    }

    .master {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        -webkit-box-pack: start;
        -ms-flex-pack: start;
        justify-content: flex-start;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
    }

    h1 {
        font-size: 20px;
        margin-bottom: 20px;
    }

    h2 {
        line-height: 160%;
        margin-bottom: 20px;
        text-align: center;
    }

    .rating-component {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        margin-bottom: 10px;
    }

    .rating-component .status-msg {
        margin-bottom: 10px;
        text-align: center;
    }

    .rating-component .status-msg strong {
        display: block;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .rating-component .stars-box {
        -ms-flex-item-align: center;
        align-self: center;
        margin-bottom: 15px;
        font-size: 30px;
    }

    .rating-component .stars-box .star {
        color: #ccc;
        cursor: pointer;
    }

    .rating-component .stars-box .star.hover {
        color: #ff5a49;
    }

    .rating-component .stars-box .star.selected {
        color: #ff5a49;
    }

    .feedback-tags {
        min-height: 119px;
    }

    .feedback-tags .tags-container {
        display: none;
    }

    .feedback-tags .tags-container .question-tag {
        text-align: center;
        margin-bottom: 40px;
    }

    .feedback-tags .tags-box {
        display: -webkit-box;
        display: -ms-flexbox;
        text-align: center;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        -webkit-box-orient: horizontal;
        -webkit-box-direction: normal;
        -ms-flex-direction: row;
        flex-direction: row;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        width: 500px;
    }

    .feedback-tags .tags-container .make-compliment {
        padding-bottom: 20px;
    }

    .feedback-tags .tags-container .make-compliment .compliment-container {
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        color: #000;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
    }

    .feedback-tags
    .tags-container
    .make-compliment
    .compliment-container
    .fa-smile-wink {
        color: #ff5a49;
        cursor: pointer;
        font-size: 40px;
        margin-top: 15px;
        -webkit-animation-name: compliment;
        animation-name: compliment;
        -webkit-animation-duration: 2s;
        animation-duration: 2s;
        -webkit-animation-iteration-count: 1;
        animation-iteration-count: 1;
    }

    .feedback-tags
    .tags-container
    .make-compliment
    .compliment-container
    .list-of-compliment {
        display: none;
        margin-top: 15px;
    }

    .feedback-tags .tag {
        border: 1px solid #ff5a49;
        border-radius: 5px;
        color: #ff5a49;
        cursor: pointer;
        margin-bottom: 10px;
        margin-left: 10px;
        padding: 10px;
    }

    .feedback-tags .tag.choosed {
        background-color: #ff5a49;
        color: #fff;
    }

    .list-of-compliment ul {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: horizontal;
        -webkit-box-direction: normal;
        -ms-flex-direction: row;
        flex-direction: row;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
    }

    .list-of-compliment ul li {
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        cursor: pointer;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        margin-bottom: 10px;
        margin-left: 20px;
        min-width: 90px;
    }

    .list-of-compliment ul li:first-child {
        margin-left: 0;
    }

    .list-of-compliment ul li .icon-compliment {
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        border: 2px solid #ff5a49;
        border-radius: 50%;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        height: 70px;
        margin-bottom: 15px;
        overflow: hidden;
        padding: 0 10px;
        -webkit-transition: 0.5s;
        transition: 0.5s;
        width: 70px;
    }

    .list-of-compliment ul li .icon-compliment i {
        color: #ff5a49;
        font-size: 30px;
        -webkit-transition: 0.5s;
        transition: 0.5s;
    }

    .list-of-compliment ul li.actived .icon-compliment {
        background-color: #ff5a49;
        -webkit-transition: 0.5s;
        transition: 0.5s;
    }

    .list-of-compliment ul li.actived .icon-compliment i {
        color: #fff;
        -webkit-transition: 0.5s;
        transition: 0.5s;
    }

    .button-box .done {
        background-color: #ff5a49;
        border: 1px solid #ff5a49;
        border-radius: 3px;
        color: #fff;
        cursor: pointer;
        display: none;
        min-width: 100px;
        padding: 10px;
    }

    .button-box .done:disabled,
    .button-box .done[disabled] {
        border: 1px solid #ff9b95;
        background-color: #ff9b95;
        color: #fff;
        cursor: initial;
    }

    .submited-box {
        display: none;
        padding: 20px;
    }

    .submited-box .loader,
    .submited-box .success-message {
        display: none;
    }

    .submited-box .loader {
        border: 5px solid transparent;
        border-top: 5px solid #4dc7b7;
        border-bottom: 5px solid #ff5a49;
        border-radius: 50%;
        width: 60px;
        height: 60px;
        -webkit-animation: spin 0.8s linear infinite;
        animation: spin 0.8s linear infinite;
    }

    @-webkit-keyframes compliment {
        1% {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
        }

        25% {
            -webkit-transform: rotate(-30deg);
            transform: rotate(-30deg);
        }

        50% {
            -webkit-transform: rotate(30deg);
            transform: rotate(30deg);
        }

        75% {
            -webkit-transform: rotate(-30deg);
            transform: rotate(-30deg);
        }

        100% {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
        }
    }

    @keyframes compliment {
        1% {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
        }

        25% {
            -webkit-transform: rotate(-30deg);
            transform: rotate(-30deg);
        }

        50% {
            -webkit-transform: rotate(30deg);
            transform: rotate(30deg);
        }

        75% {
            -webkit-transform: rotate(-30deg);
            transform: rotate(-30deg);
        }

        100% {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
        }
    }

    @-webkit-keyframes spin {
        0% {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }

    @keyframes spin {
        0% {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
        }
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
                        <?php foreach ($review as $item): ?>
                            <div class="review">
                                <div class="row no-gutters">
                                    <div class="col-auto">
                                        <h4><a href="#"><?= $pro->GetNameUser($item['user_id'])['name'] ?></a></h4>
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val"
                                                     style="width: <?= (($item['rate_value'] * 2) * 10) ?>%;"></div>
                                                <!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                        </div><!-- End .rating-container -->
                                        <span class="review-date"><?= $item['created_at'] ?></span>
                                    </div><!-- End .col -->
                                    <div class="col">
                                        <h4><?= $item['rating_msg'] ?></h4>
                                        <div class="review-content">
                                            <p><?= $item['content'] ?></p>
                                        </div><!-- End .review-content -->
                                        <div class="review-action">
                                            <a href="#"><i class="icon-thumbs-up"></i>Helpful (2)</a>
                                            <a href="#"><i class="icon-thumbs-down"></i>Unhelpful (0)</a>
                                        </div><!-- End .review-action -->
                                    </div><!-- End .col-auto -->
                                </div><!-- End .row -->
                            </div><!-- End .review -->
                        <?php endforeach; ?>
                    </div><!-- End .reviews -->
                </div><!-- .End .tab-pane -->
            </div><!-- End .tab-content -->
        </div><!-- End .product-details-tab -->
        <div class="wrapper">
            <div class="master">
                <!--                <h1>Review And rating</h1>-->
                <?php if (!isset($_SESSION['id'])): ?>
                    <h4>Bạn cần đăng nhập để được đánh giá</h4>
                <?php else: ?>
                    <h4>Hãy để lại đánh giá cho sản phẩm</h4>
                <?php endif; ?>
                <form action="" method="post">
                    <div class="rating-component">
                        <div class="status-msg">
                        </div>
                        <div class="rating">
                            <label>
                                <input class="rating_msg" type="hidden" name="rating_msg" value=""/>
                            </label>
                        </div>
                        <div class="stars-box">
                            <i class="star fa fa-star" title="1 star" data-message="Tệ" data-value="1"></i>
                            <i class="star fa fa-star" title="2 stars" data-message="Khá tệ" data-value="2"></i>
                            <i class="star fa fa-star" title="3 stars" data-message="Chất lượng" data-value="3"></i>
                            <i class="star fa fa-star" title="4 stars" data-message="Tốt" data-value="4"></i>
                            <i class="star fa fa-star" title="5 stars" data-message="Rất tốt" data-value="5"></i>
                        </div>
                        <div class="starrate">
                            <label>
                                <input class="ratevalue" type="hidden" name="rate_value" value=""/>
                            </label>
                        </div>
                    </div>
                    <div class="feedback-tags">
                        <div class="tags-container" data-tag-set="1">
                            <div class="question-tag">
                                Hãy cho tôi biết lý do dẫn đến trải nghiệm cuả quý khách bị tệ?
                            </div>
                        </div>
                        <div class="tags-container" data-tag-set="2">
                            <div class="question-tag">
                                Hãy cho tôi biết lý do dẫn đến trải nghiệm cuả quý khách bị tệ?
                            </div>
                        </div>
                        <div class="tags-container" data-tag-set="3">
                            <div class="question-tag">
                                Hãy cho tôi biết trải nghiệm của quý khách?
                            </div>
                        </div>
                        <div class="tags-container" data-tag-set="4">
                            <div class="question-tag">
                                Hãy cho tôi biết những đặt điểm tốt của sản phẩm mà quý khách hàng đa trải nghiệm được
                            </div>
                        </div>
                        <div class="tags-container" data-tag-set="5">
                            <div class="make-compliment">
                                <div class="compliment-container">
                                    Hãy đưa ra lời khen cho sản phẩm
                                    <i class="far fa-smile-wink"></i>
                                </div>
                            </div>
                        </div>
                        <div class="tags-box">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                  placeholder="Đánh giá của bạn" name="content"></textarea>
                            <input type="hidden" name="product_id" value="{{ $products->id }}"/>
                        </div>
                    </div>
                    <div class="button-box">
                        <input type="submit" name="review" class=" done btn btn-warning" disabled="disabled"
                               value="Đánh giá"/>
                    </div>
                </form>
                <div class="submited-box">
                    <div class="loader"></div>
                    <div class="success-message">
                        Thank you!
                    </div>
                </div>
            </div>

        </div>


        <h2 class="title text-center mb-4">Có lẻ bạn sẽ thích</h2><!-- End .title text-center -->

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
            <?php foreach ($productRan as $ran): ?>
                <div class="product product-7 text-center">
                    <figure class="product-media">
                        <a href="?action=products-detail&product=<?= $ran['product_id'] ?>">
                            <img src="<?= $ran['thumbnail'] ?>" alt="Product image" class="product-image">
                        </a>
                        <!--                        <div class="product-action">-->
                        <!--                            <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>-->
                        <!--                        </div>-->
                        <!-- End .product-action -->
                    </figure><!-- End .product-media -->
                    <div class="product-body">
                        <div class="product-cat">
                            <a href="#">Phone</a>
                        </div><!-- End .product-cat -->
                        <h3 class="product-title"><a
                                    href="?action=products-detail&product=<?= $ran['product_id'] ?>"><?= $ran['product_name'] ?></a>
                        </h3>
                        <!-- End .product-title -->
                        <div class="product-price">
                            <?= number_format($ran['price'], 0, ",", ".") ?> VNĐ
                        </div><!-- End .product-price -->
                        <div class="ratings-container">
                            <div class="ratings">
                                <div class="ratings-val" style="width: 20%;"></div><!-- End .ratings-val -->
                            </div><!-- End .ratings -->
                            <span class="ratings-text">( 2 Reviews )</span>
                        </div><!-- End .rating-container -->


                    </div><!-- End .product-body -->
                </div><!-- End .product -->
            <?php endforeach; ?>
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

    $(".rating-component .star").on("mouseover", function () {
        var onStar = parseInt($(this).data("value"), 10); //
        $(this).parent().children("i.star").each(function (e) {
            if (e < onStar) {
                $(this).addClass("hover");
            } else {
                $(this).removeClass("hover");
            }
        });
    }).on("mouseout", function () {
        $(this).parent().children("i.star").each(function (e) {
            $(this).removeClass("hover");
        });
    });

    $(".rating-component .stars-box .star").on("click", function () {
        var onStar = parseInt($(this).data("value"), 10);
        var stars = $(this).parent().children("i.star");
        var ratingMessage = $(this).data("message");
        var msg = "";
        if (onStar > 1) {
            msg = onStar;
        } else {
            msg = onStar;
        }
        $('.rating-component .starrate .ratevalue').val(msg);
        $('.rating-component .rating .rating_msg').val(ratingMessage);


        $(".fa-smile-wink").show();

        $(".button-box .done").show();

        if (onStar === 5) {
            $(".button-box .done").removeAttr("disabled");
        } else {
            $(".button-box .done").attr("disabled", "true");
        }

        for (i = 0; i < stars.length; i++) {
            $(stars[i]).removeClass("selected");
        }

        for (i = 0; i < onStar; i++) {
            $(stars[i]).addClass("selected");
        }

        $(".status-msg .rating_msg").val(ratingMessage);
        $(".status-msg").html(ratingMessage);
        $("[data-tag-set]").hide();
        $("[data-tag-set=" + onStar + "]").show();
    });

    $(".feedback-tags  ").on("click", function () {
        var choosedTagsLength = $(this).parent("div.tags-box").find("input").length;
        choosedTagsLength = choosedTagsLength + 1;

        if ($(this).hasClass("choosed")) {
            $(this).removeClass("choosed");
            choosedTagsLength = choosedTagsLength - 2;
        } else {
            $(this).addClass("choosed");
            $(".button-box .done").removeAttr("disabled");
        }

        console.log(choosedTagsLength);

        if (choosedTagsLength <= 0) {
            $(".button-box .done").attr("enabled", "false");
        }
    });


    $(".compliment-container .fa-smile-wink").on("click", function () {
        $(this).fadeOut("slow", function () {
            $(".list-of-compliment").fadeIn();
        });
    });


    $(".done").on("click", function () {
        $(".rating-component").hide();
        $(".feedback-tags").hide();
        $(".button-box").hide();
        $(".submited-box").show();
        $(".submited-box .loader").show();

        setTimeout(function () {
            $(".submited-box .loader").hide();
            $(".submited-box .success-message").show();
        }, 1500);
    });

</script>