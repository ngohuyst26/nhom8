<?php
include_once '../../pages/users/user-function.php';
include_once '../../../config/database.php';
if (isset( $_POST['data'])) {
    $timkiem = $_POST['data'];
    if ($timkiem != NULL) {
       $data = search($timkiem);
    } else {
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
    }
}
?>
<table class="table text-start align-middle table-bordered table-hover mb-0">
    <tbody>
    <?php if (isset($data)):?>
        <?php foreach ($data as $print):
            $sex_fr = '';
            if ($print['sex'] == 1){
                $sex_fr = 'Nam';
            } else if($print['sex'] == 2){
                $sex_fr = 'Nữ';
            } else{
                $sex_fr = 'Khác';
            }
            ?>
            <tr>
                <td><input class="form-check-input" type="checkbox" name='checkbox[]' value='<?=$print['id'] ?>'></td>
                <td><?= $print['name'] ?></td>
                <td><?= $print['address'] ?></td>
                <td><?= $print['email'] ?></td>
                <td><?= $sex_fr ?></td>
                <td>
                    <a href="?page=users&action=list&id=<?= $print['id'] ?>">
                        <button type="button" class="btn btn-primary">Xóa</button>
                    </a>
                    <a href="?page=users&action=edit&id=<?= $print['id'] ?>">
                        <button type="button" class="btn btn-success">Sửa</button>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
    </tbody>
</table>

