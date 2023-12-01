<?php
$_SESSION['loaisanpham'] = 0;
$check = true;
//them loai sam pham
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $loaisanpham = $_POST["loaisanpham"];
    $connect = new connect();
    if (empty($loaisanpham)) {
        $_SESSION['loaisanpham'] = 1;
        $check = false;
    }
    if ($check == true) {
        $tryvan = "INSERT INTO product_categories(name_category) VALUES ('$loaisanpham')";
        $connect->pdo_execute($tryvan);
    }
//    try {
//        $connect->pdo_execute($tryvan);
//        echo "Thêm loại sản phẩm thành công!";
//    } catch(Exception $e) {
//        echo "Đã xảy lỗi!!!! " . $e->getMessage();
//    }
}
//if ($_SESSION['loaisanpham'] == 1) {
//    echo '<p>Loại saản phẩm không được để trống</p>';
//}
?>
<div class="col-1"></div>
<div class="col-sm-12 col-xl-10 mt-3">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">THÊM LOẠI SẢN PHẨM</h6>
        <form method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Loại sản phẩm:</label>
                <input type="text" name="loaisanpham" class="form-control" id="exampleInputEmail1"
                       aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">
                </div>
                <?php if ($_SESSION['loaisanpham'] == 1): ?>
                    <p>Không được để trống!!!</p>
                <?php endif; ?>
            </div>
            <button type="submit" class="btn btn-primary">Thêm loại</button>
        </form>
    </div>
</div>
<div class="col-1"></div>