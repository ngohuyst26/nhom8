<?php
    include_once 'pages/users/user-function.php';
if (isset($_GET["id"])) {
    $id = $_GET['id'];
//    Hàm này dùng để xóa người dùng
    $data_delete = delete_user($id);
}
    $count = GetCount('users');
    $totalRecords = $count;
    $recordsPerPage = 3;
// Trang hiện tại (nếu không được xác định, mặc định là trang 1)
$current_page = isset($_GET['page-item']) ? $_GET['page-item'] : 1;
// Tính số lượng trang cần hiển thị
$totalPages = ceil($totalRecords / $recordsPerPage);
// Giới hạn giá trị trang hiện tại trong khoảng từ 1 đến tổng số trang
$current_page = max(1, min($current_page, $totalPages));
// Tính vị trí bắt đầu lấy dữ liệu từ CSDL
$startFrom = ($current_page - 1) * $recordsPerPage;
//$datas = get_all_user();
$data = GetDataPage('users', $startFrom, $recordsPerPage);
?>
<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Danh Sách Người Dùng</h6>
            <a href="">Show All</a>
        </div>
        <div class="table-responsive mb-0">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                <tr class="text-white">
                    <th scope="col"></th>
                    <th scope="col">ID</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Email</th>
                    <th scope="col">Giới Tính</th>
                    <th scope="col">Hành Động</th>
                </tr>
                </thead>
                <?php if (isset($data)): ?>
                    <?php foreach($data as $print): ?>
                <tbody>
                <tr>
                    <td><input class="form-check-input" type="checkbox"></td>
                    <td><?=$print['id']?></td>
                    <td><?= $print['name'] ?></td>
                    <td><?= $print['email'] ?></td>
                    <td><?= $print['sex'] ?></td>
                    <td>
                        <a href="?page=users&action=list&id=<?=$print['id']?>"><button type="button" class="btn btn-primary">Xóa</button></a>
                        <a href="?page=users&action=edit&id=<?=$print['id']?>"><button type="button" class="btn btn-success">Sửa</button></a>
                    </td>
                </tr>
                </tbody>
                <?php endforeach;?>
                <?php endif;?>
            </table>
        </div>
    </div>
</div>
<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <?php if($current_page > 1): ?>
            <li class="page-item">
                <a class="page-link" href="?page=users&action=list" tabindex="-1" aria-disabled="true">Star page</a>
            </li>
        <?php endif; ?>
        <?php if($current_page >= 1): ?>
            <?php $next =  $current_page - 1 ?>
            <li class="page-item">
                <a class="page-link" href="?page=users&action=list&page-item=<?= $next ?>">Back</a>
            </li>
        <?php endif; ?>

        <?php for($i = max(1, $current_page - 2); $i <= min($current_page + 2, $totalPages); $i++): ?>
            <?php if($i == $current_page):?>
                <li class="page-item">
                    <strong> <a class="page-link" href="#"><?= $i ?></a></strong>
                </li>
            <?php else: ?>
                <li class="page-item">
                    <a class="page-link" href="?page=users&action=list&page-item=<?= $i ?>"><?= $i ?></a>
                </li>
            <?php endif ?>
        <?php endfor; ?>

        <?php if($current_page >= 1): ?>
            <?php $next =  $current_page +1 ?>
            <li class="page-item">
                <a class="page-link" href="?page=users&action=list&page-item=<?= $next ?>">Next</a>
            </li>
        <?php endif; ?>
        <?php if($current_page < $totalPages): ?>
            <li class="page-item">
                <a class="page-link" href="?page=users&action=list&page-item=<?= $totalPages ?>" tabindex="-1" aria-disabled="true">End page</a>
            </li>
        <?php endif; ?>
    </ul>
</nav>