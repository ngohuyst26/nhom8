<?php
include 'order.php';
$or = new order();

$value = $or->GetAllOrder();
if (isset($_GET['del_order'])) {
    $del_order = $_GET['del_order'];
    $or->DelOrder($del_order);
}


?>
<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">DANH SÁCH ĐƠN HÀNG</h6>
        <table class="table table-hover table-bordered">
            <thead>
            <tr>
                <th scope="col">Tên khách hàng</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Địa chỉ</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Tổng tiền</th>
                <th scope="col">Hành động</th>
            </tr>
            </thead>
            <tbody>
            <?php if (!empty($value)): ?>
                <?php foreach ($value as $order): ?>
                    <tr>
                        <th scope="row"><?= $order['customer_name'] ?></th>
                        <td><?= $order['customer_phone'] ?></td>
                        <td><?= $order['shipping_address'] ?></td>
                        <td><?= $or->CheckStatus($order['status']) ?></td>
                        <td><?= $order['total'] ?></td>
                        <td class="d-flex flex-wrap gap-1">
                            <a class="btn btn-info" href="?page=order&action=order-detail&order=<?= $order['id'] ?>">Chi
                                tiết</a>
                            <a class="btn btn-info" href="?page=order&action=edit&edit_order=<?= $order['id'] ?>">Chỉnh
                                sửa</a>
                            <button type="button" data-bs-toggle="modal"
                                    data-bs-target="#Delete<?= $order['id'] ?>"
                                    class="btn btn-sm  btn-primary">
                                Xóa
                            </button>
                            <div class="modal fade" id="Delete<?= $order['id'] ?>" tabindex="-1"
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
                                                   href="?page=order&action=list&del_order=<?= $order['id'] ?>">Xóa
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