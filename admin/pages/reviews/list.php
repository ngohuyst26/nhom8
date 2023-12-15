<?php
include 'review.php';
include "./pages/products/product.php";
$rv = new review();
$pro = new product();

$data = $rv->ProductReview();


?>


<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">DANH SÁCH ĐÁNH GIÁ</h6>
        <table class="table table-hover table-bordered">
            <thead>
            <tr>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Đánh giá mới nhất</th>
                <th scope="col">Số sao trung bình</th>
                <th scope="col">Số lượng đánh giá</th>
                <th scope="col">Hành động</th>
            </tr>
            </thead>
            <tbody>
            <?php if (!empty($data)): ?>
                <?php foreach ($data as $rev): ?>
                    <tr>
                        <th scope="row"><?= $rev['name'] ?></th>
                        <td><?= $rev['new'] ?></td>
                        <td><?= $rev['rate'] ?></td>
                        <td><?= $rev['total'] ?></td>
                        <td class="d-flex flex-wrap gap-1">
                            <a href="?page=review&action=detail&id=<?= $rev['id'] ?>" type="button"
                               class="btn btn-sm  btn-info">Xem chi tiết</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>Không có dữ liệu</tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
