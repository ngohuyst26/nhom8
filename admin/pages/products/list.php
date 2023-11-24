<?php
include "product.php";
$pro = new product();

$value = $pro->GetAllProduct();
//var_dump($value);

?>

<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Danh sách sản phẩm</h6>
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
                        <td><?= $product['product_name'] ?></td>
                        <td><img src="<?= $product['thumbnail'] ?>" alt="" width="50" height="50"></td>
                        <td><?= $pro->GetNameCategoryById($product['categori_id']) ?></td>
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
                                <a class="btn btn-sm btn-primary"
                                   href="?page=product&action=edit-variants&product=<?= $product['product_id'] ?>">Chỉnh
                                    sửa</a>
                            <?php else: ?>
                                <a class="btn btn-sm btn-primary"
                                   href="?page=product&action=edit&product=<?= $product['product_id'] ?>">Chỉnh sửa</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>