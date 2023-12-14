<?php
include 'product.php';
$pro = new product();
$up = new upLoad();


//Thêm variants cho sản phẩm
if (isset($_POST['add']) && isset($_GET['product'])) {
    $id_product = $_GET['product'];
    $variants = $_POST['variants'];
    $pro->AddVariants($id_product, $variants);
}

//Thêm option cho biến thể
if (isset($_POST['addoptions']) && isset($_GET['product'])) {
    $name_option = $_POST['option'];
    $variants_id = $_POST['variants_id'];
    $pro->AddOptionsVariants($variants_id, $name_option);

}

//Thêm tùy chọn và sku và price
if (isset($_POST['setoptions']) && isset($_GET['product'])) {
    $id_product = $_GET['product'];
    $sku = $_POST['sku'];
    $price = $_POST['price'];
    $option_id = $_POST['id_option'];
    $ckfinder = $_POST['ckfinder'];
    if ($_FILES['thumb  nail']['size'] > 0) {
        $thumbnail = $up->uploadImg($_FILES["thumbnail"]);
    } else {
        $thumbnail = $ckfinder;
    }
    $variants_id = $pro->GetNameVariant($id_product);
    $pro->AddOptionsSku($id_product, $sku, $price, $option_id, $variants_id, $thumbnail);
}

//Chỉnh sửa variants
if (isset($_POST['edit_variants'])) {
    $id_variants = $_POST['id_variants'];
    $name = $_POST['variants'];
    $pro->EditVariants($id_variants, $name);
}

//Chỉnh sửa options
if (isset($_POST['edit_option'])) {
    $id_option = $_POST['id_option'];
    $name = $_POST['option'];
    $pro->EditOption($id_option, $name);
}

//Chỉnh sửa tùy chọn
if (isset($_POST['edit_setoption'])) {
    $id_sku = $_POST['id_sku'];
    $sku = $_POST['sku'];
    $price = $_POST['price'];
    $pro->EditSkus($id_sku, $sku, $price);
}

//Xóa variants
if (isset($_GET['variant_del'])) {
    $id_del = $_GET['variant_del'];
    $pro->DeleteVariants($id_del);
}

//Xóa option
if (isset($_GET['option_del'])) {
    $id_del_option = $_GET['option_del'];
    $pro->DeleteOptions($id_del_option);
}

//Xóa tùy chọn
if (isset($_GET['del_setoption'])) {
    $id_del_setoption = $_GET['del_setoption'];
    $pro->DeleteSetOptions($id_del_setoption);
}

//Lấy các thông tin như option và variants
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

<div class="container p-4">
    <div class="row">
        <div class="mb-3">
            <table class="table table-bordered border-white text-white">
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
                                <li class="list-inline-item p-2 me-0 rounded-3 bg-info"><?= $key['name'] ?> </li>
                                <button class="btn btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#editVarriants<?= $key['id'] ?>"><i
                                            class="fa-sharp fa-solid fa-pen-to-square"></i></button>
                                <button class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#DelVariants<?= $key['id'] ?>">
                                    <i class="fa-solid fa-trash"></i>
                                </button>

                                <div class="modal fade" id="DelVariants<?= $key['id'] ?>" tabindex="-1"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog  ">
                                        <form method="post">
                                            <div class="modal-content bg-light text-dark">
                                                <div class="modal-header">
                                                    <h5 class="modal-title text-dark" id="exampleModalLabel">XÓA THUỘC
                                                        TÍNH</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <?php if ($pro->CheckOptions($key['id']) > 0): ?>
                                                        <p>Vui lòng xóa các thuộc tính của biến thể này trước khi
                                                            xóa</p>
                                                    <?php else: ?>
                                                        <p>Bạn có chắc chắn muốn xóa chưa!</p>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Đóng
                                                    </button>
                                                    <?php if ($pro->CheckOptions($key['id']) == 0): ?>
                                                        <a href="?page=product&action=edit-variants&product=<?= $id_product ?>&variant_del=<?= $key['id'] ?>"
                                                           class="rounded-3 p-2 text-decoration-none bg-danger me-3"
                                                           style="color: black;">
                                                            Xóa
                                                        </a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="editVarriants<?= $key['id'] ?>" tabindex="-1"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog  ">
                                        <form method="post">
                                            <div class="modal-content bg-light text-dark">
                                                <div class="modal-header">
                                                    <h5 class="modal-title text-dark" id="exampleModalLabel">CHỈNH SỬA
                                                        BIẾN THỂ</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label for="exampleInputPassword1" class="form-label ">Biến
                                                            thể</label>
                                                        <input type="text" name="variants" value="<?= $key['name'] ?>"
                                                               class="form-control bg-white text-dark">
                                                        <input type="hidden" name="id_variants"
                                                               value="<?= $key['id'] ?>">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Đóng
                                                    </button>
                                                    <button type="submit" name="edit_variants" class="btn btn-primary">
                                                        Lưu
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

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
            <table class="table table-bordered border-white text-white">
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
                                    <li class="list-inline-item p-2 me-0 rounded-3 bg-info"><?= $name ?> </li>
                                    <button class="btn btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#editOption<?= $optionIdArray[$index] ?>"><i
                                                class="fa-sharp fa-solid fa-pen-to-square"></i></button>
                                    <button class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#DelOption<?= $optionIdArray[$index] ?>">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>


                                    <div class="modal fade" id="DelOption<?= $optionIdArray[$index] ?>" tabindex="-1"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog  ">
                                            <form method="post">
                                                <div class="modal-content bg-light text-dark">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title text-dark" id="exampleModalLabel">XÓA
                                                            THUỘC TÍNH</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <?php if ($pro->CheckSetOption($optionIdArray[$index]) > 0): ?>
                                                            <p>Vui lòng xóa các tùy chọn có thuộc tính này trước khi
                                                                xóa</p>
                                                        <?php else: ?>
                                                            <p>Bạn có chắc chắn muốn xóa chưa!</p>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Đóng
                                                        </button>
                                                        <?php if ($pro->CheckSetOption($optionIdArray[$index]) == 0): ?>
                                                            <a href="?page=product&action=edit-variants&product=<?= $id_product ?>&option_del=<?= $optionIdArray[$index] ?>"
                                                               class="btn btn-primary" style="color: black;">
                                                                Xóa
                                                            </a>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>


                                    <div class="modal fade" id="editOption<?= $optionIdArray[$index] ?>" tabindex="-1"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog  ">
                                            <form method="post">
                                                <div class="modal-content bg-light text-dark">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title text-dark" id="exampleModalLabel">CHỈNH
                                                            SỬA TÙY CHỌN</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="exampleInputPassword1" class="form-label ">Tùy
                                                                Chọn</label>
                                                            <input type="text" name="option" value="<?= $name ?>"
                                                                   class="form-control bg-white text-dark">
                                                            <input type="hidden" name="id_option"
                                                                   value="<?= $optionIdArray[$index] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Đóng
                                                        </button>
                                                        <button type="submit" name="edit_option"
                                                                class="btn btn-primary">
                                                            Lưu
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
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

        <!-- Tùy chọn cho các biến thể -->
        <div class="mb-3">
            <table class="table table-bordered border-white text-white">
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
                        <td>
                            <button class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#editSetOption<?= $option['id'] ?>"><i
                                        class="fa-sharp fa-solid fa-pen-to-square"></i></button>

                            <button class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#DelSetOption<?= $option['id'] ?>">
                                <i class="fa-solid fa-trash"></i>
                            </button>


                            <div class="modal fade" id="DelSetOption<?= $option['id'] ?>" tabindex="-1"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog  ">
                                    <form method="post">
                                        <div class="modal-content bg-light text-dark">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-dark" id="exampleModalLabel">XÓA TÙY
                                                    CHỌN</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Bạn có chắc chắn muốn xóa chưa!</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Đóng
                                                </button>
                                                <a href="?page=product&action=edit-variants&product=<?= $id_product ?>&del_setoption=<?= $option['id'] ?>"
                                                   class="btn btn-danger">
                                                    Xóa
                                                </a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="modal fade" id="editSetOption<?= $option['id'] ?>" tabindex="-1"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog  ">
                                    <form method="post">
                                        <div class="modal-content bg-light text-dark">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-dark" id="exampleModalLabel">CHỈNH
                                                    SỬA TÙY CHỌN</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="exampleInputPassword1" class="form-label ">Sku</label>
                                                    <input type="text" name="sku" value="<?= $option['sku'] ?>"
                                                           class="form-control bg-white text-dark">

                                                    <label for="exampleInputPassword1" class="form-label ">Price</label>
                                                    <input type="text" name="price" value="<?= $option['price'] ?>"
                                                           class="form-control bg-white text-dark">

                                                    <input type="hidden" name="id_sku"
                                                           value="<?= $option['id'] ?>">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Đóng
                                                </button>
                                                <button type="submit" name="edit_setoption"
                                                        class="btn btn-primary">
                                                    Lưu
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>


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

<!-- Modal -->
<div class="modal fade" id="variantsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog text-white">
        <form action="" method="post">
            <div class="modal-content bg-light">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">THÊM BIẾN THỂ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="text" placeholder="Size or color" name="variants" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="submit" name="add" class="btn btn-primary">Lưu</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal Thêm thuộc tính -->
<div class="modal fade" id="optionsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog text-white">
        <form action="" method="post">
            <div class="modal-content bg-light">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">THÊM THUỘC TÍNH BIẾN THỂ</h5>
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
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="submit" name="addoptions" class="btn btn-primary">Lưu</button>
                </div>
            </div>
        </form>
    </div>
</div>


<!-- Modal thêm tùy chọn biến thể -->
<div class="modal fade" id="setoptionsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog text-white">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="modal-content bg-light">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">THÊM CÁC TÙY CHỌN</h5>
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
                        <label for="exampleInputPassword1" class="form-label">Giá</label>
                        <input type="text" placeholder="" name="price" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Hình ảnh</label>
                        <input class="form-control" name="thumbnail" type="file" id="formFile">

                    </div>
                    <div class="mb-3">
                        <lable class="form-label">Hình đã tải lên</lable>
                    </div>
                    <div class="input-group mb-3">
                        <button type="button" onclick="selectFileWithCKFinder('ckfinder-input-1')"
                                class="input-group-text">Chọn
                            hình
                        </button>
                        <input type="text" class="form-control" name="ckfinder" id="ckfinder-input-1"
                               placeholder="Chưa hình nào được chọn" value="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="submit" name="setoptions" class="btn btn-primary">Lưu</button>
                </div>
            </div>
        </form>
    </div>
</div>

