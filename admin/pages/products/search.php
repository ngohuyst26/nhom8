<?php
include_once '../../../config/database.php';

include "product.php";
$pro = new product();

if (isset($_POST['search'])) {
    $search = $_POST['search'];
    $value = $pro->SearchProduct($search);
} else {
    $value = $pro->GetAllProduct();
}

?>
<?php if (!empty($value)): ?>
    <table class="table text-start align-middle table-bordered table-hover mb-0">
        <thead>
        <tr class="text-white">
            <th scope="col"><input class="form-check-input" type="checkbox"></th>
            <th scope="col">Tên</th>
            <th scope="col">Hình ảnh</th>
            <th scope="col">Danh mục</th>
            <th scope="col">Giá</th>
            <th style="min-width: 170px;" scope="col">Loại</th>
            <th scope="col">Hành động</th>
        </tr>
        </thead>
        <tbody>

        <?php foreach ($value as $product): ?>
            <tr>
                <td><input class="form-check-input" name="check[]" value="<?= $product['product_id'] ?>"
                           type="checkbox"></td>
                <td style="min-width: 395px;"><?= $product['product_name'] ?></td>
                <td><img style="object-fit: cover; border-radius: 10px" src="<?= $product['thumbnail'] ?>" alt=""
                         width="120" height="80"></td>
                <td style="min-width: 170px;"><?= $pro->GetNameCategoryById($product['categori_id']) ?></td>
                <td><?= number_format($product['price'], 0, ".", ",") ?> VNĐ</td>
                <td>
                    <?php if ($pro->CountVariants($product['product_id']) > 0): ?>
                        Có <?= $pro->CountVariants($product['product_id']) ?> biến thể
                    <?php else: ?>
                        Sản phẩm thường
                    <?php endif; ?>
                </td>
                <td>
                    <?php if ($pro->CountVariants($product['product_id']) > 0): ?>
                        <a class="btn btn-sm btn-warning"
                           href="?page=product&action=edit-variants&product=<?= $product['product_id'] ?>"><i
                                    class="fa-sharp fa-solid fa-pen-to-square"></i></a>
                        <button type="button" data-bs-toggle="modal"
                                data-bs-target="#Delete<?= $product['product_id'] ?>"
                                class="btn btn-sm  btn-primary">
                            <i class="fa-solid fa-trash"></i>
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
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
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
                        <a class="btn btn-sm btn-warning"
                           href="?page=product&action=edit&product=<?= $product['product_id'] ?>"><i
                                    class="fa-sharp fa-solid fa-pen-to-square"></i></a>
                        <button type="button" data-bs-toggle="modal"
                                data-bs-target="#Delete<?= $product['product_id'] ?>"
                                class="btn btn-sm  btn-primary">
                            <i class="fa-solid fa-trash"></i>
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
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
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
    </table>
<?php else: ?>
    <p class="text-danger text-center">Sản phẩm không có</p>
<?php endif; ?>
