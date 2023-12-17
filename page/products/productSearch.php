<?php
include '../../admin/pages/products/product.php';
include_once '../../config/database.php';

$pro = new product();

if (isset($_POST['search'])) {
    $search = $_POST['search'];
    $value = $pro->SearchProduct($search);
} else {
    $value = $pro->GetAllProduct();
}

?>

<?php foreach ($value as $product):
    $fistOption = $pro->FistOptions($product['product_id']);
    if (!empty($fistOption)) {
        $optionSelected = explode(',', $fistOption['option_ids']);
        $option_id = implode(',', $optionSelected);
        $id = str_replace(",", "", $option_id);
        $nameOption = $pro->GetOptionById($option_id);
    } else {
        $nameOption = [];
        $id = $product['product_id'];
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



