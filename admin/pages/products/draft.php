<?php
include "product.php";
$pro = new product();

if (isset($_POST['del_product'])) {
    $id_product = $_POST['id_product'];
    $pro->DelProduct($id_product);
}
$categoryName = $pro->GetCategory();

$value = $pro->GetAllProductDraft();

?>


<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary text-center rounded p-4">
        <div class="d-flex align-items-center gap-3 mb-4">
            <h6 class="mb-0">DANH SÁCH SẢN PHẨM NHÁP</h6>
        </div>
        <div class="table-responsive" id="value">
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
                <?php if (!empty($value)): ?>
                    <tbody>
                    <?php foreach ($value as $product): ?>
                        <tr>
                            <td><input class="form-check-input" name="check[]" value="<?= $product['product_id'] ?>"
                                       type="checkbox"></td>
                            <td style="min-width: 395px;"><?= $product['product_name'] ?></td>
                            <td><img style="object-fit: cover; border-radius: 10px" style="object-fit: cover;"
                                     src="<?= $product['thumbnail'] ?>" alt="" width="120" height="80"></td>
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
                            <td>
                                <?php if ($pro->CountVariants($product['product_id']) > 0 || $pro->CheckSku($product['product_id']) == 0): ?>
                                    <a class="btn btn-sm btn-primary"
                                       href="?page=product&action=edit-variants&product=<?= $product['product_id'] ?>">Cập
                                        nhật </a>
                                    <button type="button" data-bs-toggle="modal"
                                            data-bs-target="#Delete<?= $product['product_id'] ?>"
                                            class="btn btn-sm  btn-primary">
                                        Xóa
                                    </button>
                                    <div class="modal fade" id="Delete<?= $product['product_id'] ?>" tabindex="-1"
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
                                                        Bạn có chắc là muốn xóa chưa
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">
                                                            Đóng
                                                        </button>
                                                        <button type="submit" name="del_product"
                                                                class="btn btn-primary">
                                                            Xóa
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <a class="btn btn-sm btn-primary"
                                       href="?page=product&action=edit&product=<?= $product['product_id'] ?>">Chỉnh
                                        sửa</a>
                                    <button type="button" data-bs-toggle="modal"
                                            data-bs-target="#Delete<?= $product['product_id'] ?>"
                                            class="btn btn-sm  btn-primary">
                                        Xóa
                                    </button>
                                    <div class="modal fade" id="Delete<?= $product['product_id'] ?>" tabindex="-1"
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
                                                        Bạn có chắc là muốn xóa chưa
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">
                                                            Đóng
                                                        </button>
                                                        <button type="submit" name="del_product"
                                                                class="btn btn-primary">
                                                            Xóa
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
                <?php endif; ?>
            </table>

        </div>
    </div>
</div>
