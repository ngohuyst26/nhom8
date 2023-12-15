<?php
include 'review.php';
include "./pages/products/product.php";
$rv = new review();
$pro = new product();

if (isset($_GET['del_review'])) {
    $review_id = $_GET['del_review'];
    $rv->DelReview($review_id);
}
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    $data = $rv->GetAllReviewByProductId($product_id);
}

?>


<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">DANH SÁCH ĐƠN HÀNG</h6>
        <table class="table table-hover table-bordered">
            <thead>
            <tr>
                <th scope="col">Tên khách hàng</th>
                <th scope="col">Nội dung đánh giá</th>
                <th scope="col">Số sao</th>
                <th scope="col">Đánh giá</th>
                <th scope="col">Ngày đánh giá</th>
                <th scope="col">Hành động</th>
            </tr>
            </thead>
            <tbody>
            <?php if (!empty($data)): ?>
                <?php foreach ($data as $rev): ?>
                    <tr>
                        <th scope="row"><?= $rev['name'] ?></th>
                        <td><?= $rev['content'] ?></td>
                        <td><?= $rev['rate_value'] ?></td>
                        <td><?= $rev['rating_msg'] ?></td>
                        <td><?= $rev['created_at'] ?></td>
                        <td class="d-flex flex-wrap gap-1">
                            <button type="button" data-bs-toggle="modal"
                                    data-bs-target="#Delete<?= $rev['id'] ?>"
                                    class="btn btn-sm  btn-primary">
                                Xóa
                            </button>
                            <div class="modal fade" id="Delete<?= $rev['id'] ?>" tabindex="-1"
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
                                                Bạn có chắc là muốn xóa chưa
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    Close
                                                </button>
                                                <a class="btn btn-primary"
                                                   href="?page=review&action=detail&id=<?= $_GET['id'] ?>&del_review=<?= $rev['id'] ?>">Xóa
                                                    thiệt</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
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
