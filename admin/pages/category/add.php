<?php
//them loai sam pham
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $loaisanpham = $_POST["loaisanpham"];
    $connect = new connect();
    $tryvan = "INSERT INTO product_categories(name_category) VALUES ('$loaisanpham')";
    $connect->pdo_execute($tryvan);
}
?>
<div class="bg-secondary rounded h-100 p-4">
    <h6 class="mb-4">THÊM LOẠI SẢN PHẨM</h6>
    <form method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Loại sản phẩm:</label>
            <input type="text" name="loaisanpham" class="form-control" id="exampleInputEmail1"
                   aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Thêm loại</button>
    </form>
</div>