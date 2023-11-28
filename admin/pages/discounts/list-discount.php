<?php
$connect = new connect();
$tryvan = "SELECT * FROM discount";

$data = $connect->pdo_query($tryvan);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $connect = new connect();
    $xoa = "DELETE FROM discount WHERE id = $id";
    $connect->pdo_query_one($xoa);
}


?>
<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">Danh sách ưu đãi</h6>
        <table class="table">
            <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">ID</th>
                <th scope="col">Mã ưu đãi</th>
                <th scope="col">Ưu đãi</th>
                <th scope="col">Mô tả</th>
                <th scope="col">lần sử dụng</th>
                <th scope="col">Hết hạn</th>
                <th scope="col">Thao tác</th>
            </tr>
            </thead>
            <?php if (isset($data)): ?>
                <?php foreach ($data as $discounts): ?>
                    <tbody>
                    <tr>
                        <th scope="row"><input type="checkbox" class="form-check-input" name="check" id="exampleCheck1">
                        </th>
                        <td><?= $discounts['id'] ?></td>
                        <td><?= $discounts['code'] ?></td>
                        <td><?= $discounts['discount'] ?></td>
                        <td><?= $discounts['description'] ?></td>
                        <td><?= $discounts['number_use'] ?></td>
                        <td><?= $discounts['date_end'] ?></td>
                        <td>
                            <a href="?page=discounts&action=edit-discount&id=<?= $discounts['id'] ?>">
                                <button type="button" class="btn btn-primary">Sửa</button>
                            </a>
                            <a href="?page=discounts&action=list-discount&id=<?= $discounts['id'] ?>">
                                <button type="button" class="btn btn-primary">Xóa</button>
                            </a>
                        </td>
                    </tr>
                    </tbody>
                <?php endforeach; ?>
            <?php endif; ?>
        </table>
    </div>
</div>