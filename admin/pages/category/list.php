<?php
$connect = new connect();
$tryvan = "SELECT * FROM product_categories";

// Cái này là khi nó thực hiện truy vấn xong nó sẻ lưu dữ liệu vào biến $data
$data = $connect->pdo_query($tryvan); // Cái này dùng để lấy dữ liệu ra
//H kiểm tra coi nó có dữ liệu chưa kiểm tra xong thì comment lại
//var_dump($data);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $connect = new connect();
    $xoa = "DELETE FROM product_categories WHERE id = $id";
    $connect->pdo_query_one($xoa);
}
?>
<div class="bg-secondary rounded h-100 p-4">
    <form method="post" enctype="multipart/form-data">
        <h6 class="mb-4">DANH SÁCH LOẠI SẢN PHẨM</h6>
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">Check</th>
                <th scope="col">Mumber</th>
                <th scope="col">Loại sản phẩm</th>
                <th scope="col">Thao tác</th>
            </tr>
            </thead>
            <tbody>
            <!--            Bây h sẽ sữ dụng vòng lập để in mấy cái dữ liệu mình mới lấy về raâái bảng-->
            <?php if(isset($data)):?>
            <?php foreach ($data as $categories): ?>
                <tr>
                    <!--                Cái chữ trong dấu ngoặc vuông là tên tên của cái dòng trong database mình muốn in dữ liệu ra -->
                    <th><input type="checkbox" class="form-check-input" name="check" id="exampleCheck1"></th>
                    <th scope="row"><?= $categories['id'] ?></th>
                    <td><?= $categories['name_category'] ?></td>
                    <td>
                        <a href="?page=category&action=edit&id=<?=$categories['id']?>"><button type="button" class="btn btn-primary">Sửa</button></a>
                        <a href="?page=category&action=list&id=<?=$categories['id']?>"><button type="button" class="btn btn-primary">Xóa</button></a>
                    </td>
                </tr>
            <?php endforeach; ?>
            <?php endif;?>
            </tbody>
        </table>
    </form>
</div>