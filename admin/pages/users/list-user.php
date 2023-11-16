<?php
    include_once 'pages/users/user-function.php';
if (isset($_GET["id"])) {
    $id = $_GET['id'];
    $data_delete = delete_user($id);
}
    $data_user = get_all_user();

?>
<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Danh Sách Người Dùng</h6>
            <a href="">Show All</a>
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                <tr class="text-white">
                    <th scope="col"><input class="form-check-input" type="checkbox"></th>
                    <th scope="col">ID</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Email</th>
                    <th scope="col">Giới Tính</th>
                    <th scope="col">Hành Động</th>
                </tr>
                </thead>
                <?php if (isset($data_user)): ?>
                    <?php foreach($data_user as $print): ?>
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