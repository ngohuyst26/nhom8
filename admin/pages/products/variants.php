<?php
include 'product.php';
$pro = new product();

if (isset($_POST['add']) && isset($_GET['product'])) {
    $id_product = $_GET['product'];
    $variants = $_POST['variants'];
    $pro->AddVariants($id_product, $variants);
}
if (isset($_POST['addoptions']) && isset($_GET['product'])) {
    $name_option = $_POST['option'];
    $variants_id = $_POST['variants_id'];
    $pro->AddOptionsVariants($variants_id, $name_option);

}

if (isset($_POST['setoptions']) && isset($_GET['product'])) {
    $id_product = $_GET['product'];
    $sku = $_POST['sku'];
    $price = $_POST['price'];
    $option_id = $_POST['id_option'];
    $variants_id = $pro->GetNameVariant($id_product);
    $pro->AddOptionsSku($id_product, $sku, $price, $option_id, $variants_id);
}

if (isset($_GET['variant_del'])) {
    $id_del = $_GET['variant_del'];
    $pro->DeleteVariants($id_del);
}

if (isset($_GET['option_del'])) {
    $id_del_option = $_GET['option_del'];
    $pro->DeleteOptions($id_del);
}

if (isset($_GET['del_setoption'])) {
    $id_del_setoption = $_GET['del_setoption'];
    $pro->DeleteSetOptions($id_del_setoption);
}


if (isset($_GET['product'])) {
    $id_product = $_GET['product'];
    $name_product = $pro->GetNameProduct($id_product)['name'];
    $name_variants = $pro->GetNameVariant($id_product);
    $variants_options = $pro->GetOptionsVariants($id_product);
    $sku_option = $pro->GetSkuOptions($id_product);
    // var_dump($sku_option);
}


?>


<h2 class="text-center">Thêm biến thể cho sản phẩm</h2>
<div class="row">
    <div class="mb-3">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Tên sản phẩm</th>
                <th>Biến thế</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><?= $name_product ?></td>
                <td>
                    <ul class="list-inline">
                        <?php foreach ($name_variants as $key): ?>
                            <li class="list-inline-item p-2 me-0 rounded-3 bg-warning"><?= $key['name'] ?> </li>
                            <a href="?product=<?= $id_product ?>&variant_del=<?= $key['id'] ?>"
                               class="rounded-3 p-2 text-decoration-none bg-danger me-3" style="color: black;"><i
                                        class="fa-solid fa-xmark"></i></a>
                        <?php endforeach; ?>
                    </ul>
                </td>
            </tr>
            </tbody>
        </table>
        <div>
            <button type="button" data-bs-toggle="modal" data-bs-target="#variantsModal" class="btn btn-primary">+
                Thêm
                biến thể
            </button>
        </div>
    </div>


    <!-- Variants Options -->
    <div class="mb-3">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Tên sản phẩm</th>
                <?php foreach ($name_variants as $key): ?>
                    <th><?= $key['name'] ?></th>
                <?php endforeach; ?>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><?= $name_product ?></td>
                <?php foreach ($variants_options as $option):
                    $optionNamesArray = explode(',', $option['option_names']);
                    $optionIdArray = explode(',', $option['option_ids']);
                    ?>
                    <td>
                        <ul class="list-inline">
                            <?php foreach ($optionNamesArray as $index => $name): ?>
                                <li class="list-inline-item p-2 me-0 rounded-3 bg-warning"><?= $name ?> </li>
                                <a href="?product=<?= $id_product ?>&option_del=<?= $optionIdArray[$index] ?>"
                                   class="rounded-3 p-2 text-decoration-none bg-danger me-3" style="color: black;"><i
                                            class="fa-solid fa-xmark"></i></a>
                            <?php endforeach; ?>
                        </ul>
                    </td>
                <?php endforeach; ?>
            </tr>
            </tbody>
        </table>
        <div>
            <button type="button" data-bs-toggle="modal" data-bs-target="#optionsModal" class="btn btn-primary">+
                Thêm
                thuộc tính
            </button>
        </div>
    </div>
</div>


<!-- Tùy chọn cho các biến thể -->
<div class="mb-3">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Tên sản phẩm</th>
            <th>Biến thể</th>
            <th>Sku</th>
            <th>Giá</th>
            <th>Hành động</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($sku_option as $option):
            $optionNamesArray = explode(',', $option['variant_option_names']);
            ?>
            <tr>
                <td><?= $name_product ?></td>
                <td>
                    <ul class="list-inline">
                        <?php foreach ($optionNamesArray as $name): ?>
                            <li class="list-inline-item p-2 me-0 rounded-3 bg-warning"><?= $name ?> </li>

                        <?php endforeach; ?>
                    </ul>
                </td>
                <td><?= $option['sku'] ?></td>
                <td><?= number_format($option['price'], 0, ",", ".") ?> VNĐ</td>
                <td><a href="/add-variants.php/?product=<?= $id_product ?>&edit_setoption=<?= $option['id'] ?>"
                       class="btn btn-primary">Chỉnh sửa</a>
                    <a href="/add-variants.php/?product=<?= $id_product ?>&del_setoption=<?= $option['id'] ?>"
                       class="btn btn-danger">Xóa</a>
                </td>
            </tr>
        <?php endforeach; ?>

        </tbody>
    </table>
    <div>
        <button type="button" data-bs-toggle="modal" data-bs-target="#setoptionsModal" class="btn btn-primary">+
            Thêm
            các tùy chọn
        </button>
    </div>
</div>
</div>
</div>
</div>


<!-- Modal -->
<div class="modal fade" id="variantsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm thuộc tính</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="text" placeholder="Size or color" name="variants" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="add" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal Thêm thuộc tính -->
<div class="modal fade" id="optionsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm thuộc tính</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Chọn biến thể cần thêm thuộc tính</label>
                        <select class="form-select" name="variants_id" aria-label="Default select example">
                            <?php foreach ($name_variants as $name): ?>
                                <option value="<?= $name['id'] ?>"><?= $name['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Thuộc tính</label>
                        <input type="text" placeholder="M, Xl.. or Blue, Red..." name="option" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="addoptions" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>


<!-- Modal thêm tùy chọn biến thể -->
<div class="modal fade" id="setoptionsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm các tùy chọn</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php foreach ($variants_options as $option):
                        $optionNamesArray = explode(',', $option['option_names']);
                        $optionIdArray = explode(',', $option['option_ids']);
                        ?>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label"><?= $option['variant_name'] ?></label>
                            <select class="form-select" name="id_option[]" aria-label="Default select example">
                                <?php foreach ($optionNamesArray as $index => $name): ?>
                                    <option value="<?= $optionIdArray[$index] ?>"><?= $name ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    <?php endforeach; ?>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Sku</label>
                        <input type="text" placeholder="" name="sku" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Price</label>
                        <input type="text" placeholder="" name="price" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="setoptions" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
    </div>

