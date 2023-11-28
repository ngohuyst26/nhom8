<?php
include "product.php";
$pro = new product();

if (isset($_POST['undo_product'])) {
    $id_product = $_POST['id_product'];
    $pro->UndoProduct($id_product);
}

//var_dump($value);

if (isset($_POST['del_product_variants'])) {
    $id_product = $_POST['id_product'];
    $pro->DelProductVari($id_product);
}
if (isset($_POST['del_product_def'])) {
    $id_product = $_POST['id_product'];
    $pro->DelProductDef($id_product);
}

$value = $pro->GetAllProductDel();

?>

<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">THÙNG RÁC</h6>
            <a href="">Show All</a>
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                <tr class="text-white">
                    <th scope="col"><input class="form-check-input" type="checkbox"></th>
                    <th scope="col">Tên</th>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Danh mục</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Loại</th>
                    <th scope="col">Hành động</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($value as $product): ?>
                    <tr>
                        <td><input class="form-check-input" name="check[]" value="<?= $product['product_id'] ?>"
                                   type="checkbox"></td>
                        <td style="min-width: 395px;"><?= $product['product_name'] ?></td>
                        <td><img style="object-fit: cover; border-radius: 10px" src="<?= $product['thumbnail'] ?>"
                                 alt="" width="120" height="80"></td>
                        <td style="min-width: 170px;"><?= $pro->GetNameCategoryById($product['categori_id']) ?></td>
                        <td><?= number_format($product['price'], 0, ".", ",") ?> VNĐ</td>
                        <td>
                            <?php if ($pro->CountVariants($product['product_id']) > 0): ?>
                                Có <?= $pro->CountVariants($product['product_id']) ?> biến thể
                            <?php elseif ($pro->CheckSku($product['product_id']) == 0): ?>
                                Sản phẩm biến thể
                            <?php else: ?>
                                Sản phẩm thường
                            <?php endif; ?>
                        </td>
                        <td class="d-flex flex-wrap gap-1">
                            <?php if ($pro->CountVariants($product['product_id']) > 0 || $pro->CheckSku($product['product_id']) == 0): ?>
                                <a class="btn btn-sm btn-primary"
                                   href="?page=product&action=edit-variants&product=<?= $product['product_id'] ?>">Chỉnh
                                    sửa</a>

                                <!--                            Nút khôi phục-->
                                <button type="button" data-bs-toggle="modal"
                                        data-bs-target="#Undo<?= $product['product_id'] ?>"
                                        class="btn btn-sm  btn-primary">
                                    Khôi phục
                                </button>

                                <!--                            Nút xóa vĩnh viễn-->
                                <button type="button" data-bs-toggle="modal"
                                        data-bs-target="#DelVari<?= $product['product_id'] ?>"
                                        class="btn btn-sm  btn-primary">
                                    Xóa
                                </button>

                                <!--                            Modal xóa sản phẩm biến thể -->

                                <div class="modal fade" id="DelVari<?= $product['product_id'] ?>" tabindex="-1"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog text-white">
                                        <form method="post">
                                            <div class="modal-content bg-light">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Thông báo</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <?php if ($pro->CheckVariants($product['product_id']) > 0): ?>
                                                        <p>Vui lòng xóa các biến thể của sản phẩm trước khi xóa</p>
                                                    <?php else: ?>
                                                        <input type="hidden" name="id_product"
                                                               value="<?= $product['product_id'] ?>">
                                                        <p>Ban có chắc là muốn xóa</p>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">
                                                        Đóng
                                                    </button>
                                                    <?php if ($pro->CheckVariants($product['product_id']) == 0): ?>
                                                        <button type="submit" name="del_product_variants"
                                                                class="btn btn-primary">
                                                            Xóa
                                                        </button>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>


                                <!--                               Modal Khôi phục sản phẩm-->
                                <div class="modal fade" id="Undo<?= $product['product_id'] ?>" tabindex="-1"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog text-white">
                                        <form method="post">
                                            <div class="modal-content bg-light">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Thông báo</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="hidden" name="id_product"
                                                           value="<?= $product['product_id'] ?>">
                                                    Bn có chắc là muốn khôi phục
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">
                                                        Đóng
                                                    </button>
                                                    <button type="submit" name="undo_product"
                                                            class="btn btn-primary">
                                                        Khôi phục
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            <?php else: ?>
                                <a class="btn btn-sm btn-primary"
                                   href="?page=product&action=edit&product=<?= $product['product_id'] ?>">Chỉnh sửa</a>
                                <button type="button" data-bs-toggle="modal"
                                        data-bs-target="#Undo<?= $product['product_id'] ?>"
                                        class="btn btn-sm  btn-primary">
                                    Khôi phục
                                </button>


                                <!--                            Nút xóa vĩnh viễn-->
                                <button type="button" data-bs-toggle="modal"
                                        data-bs-target="#DelDef<?= $product['product_id'] ?>"
                                        class="btn btn-sm  btn-primary">
                                    Xóa
                                </button>

                                <!--                            Modal xóa sản phẩm biến thể -->
                                <div class="modal fade" id="DelDef<?= $product['product_id'] ?>" tabindex="-1"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog text-white">
                                        <form method="post">
                                            <div class="modal-content bg-light">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Thông báo</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <?php if ($pro->CheckSku($product['product_id']) == 1): ?>
                                                        <input type="hidden" name="id_product"
                                                               value="<?= $product['product_id'] ?>">
                                                        Ban có chắc là muốn xóa
                                                    <?php endif; ?>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">
                                                        Đóng
                                                    </button>
                                                    <?php if ($pro->CheckSku($product['product_id']) == 1): ?>
                                                        <button type="submit" name="del_product_def"
                                                                class="btn btn-primary">
                                                            Xóa
                                                        </button>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>


                                <div class="modal fade" id="Undo<?= $product['product_id'] ?>" tabindex="-1"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog text-white">
                                        <form method="post">
                                            <div class="modal-content bg-light">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Thông báo</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="hidden" name="id_product"
                                                           value="<?= $product['product_id'] ?>">
                                                    Bạn có chắc là muốn khôi phục
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">
                                                        Đóng
                                                    </button>
                                                    <button type="submit" name="undo_product"
                                                            class="btn btn-primary">
                                                        Khôi phục
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>