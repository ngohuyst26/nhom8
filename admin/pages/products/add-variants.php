<?php
include "product.php";
$pro = new product();
$up = new upLoad();

$_SESSION['name'] = 0;
$_SESSION['description'] = 0;
$_SESSION['ckfinder'] = 0;
$_SESSION['thumbnail'] = 0;

$category = $pro->GetCategory();

if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $ckfinder = $_POST['ckfinder'];
    if ($_FILES['thumbnail']['size'] > 0) {
        $thumbnail = $up->uploadImg($_FILES["thumbnail"]);
    } else {
        $thumbnail = $ckfinder;
    }
    $check = $pro->ValidateProductVariants($name, $description, $ckfinder, $thumbnail);
    if (!$check) {
        $pro->addProduct($name, $description, $category, $thumbnail);
        $id = $pro->LastProduct()['id'];
        header("Location: ?page=product&action=variants&product=$id");
    }
}


?>

<div class="col-1"></div>
<div class="col-sm-12 col-xl-10 mt-3">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">THÊM SẢN PHẨM</h6>
        <form method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tên sản phẩm</label>
                <input type="text" name="name" class="form-control">
                <?php if ($_SESSION['name'] == 1): ?>
                    <p class="text-danger">Tên không được để trống</p>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Mô tả</label>
                <input type="text" name="description" class="form-control">
                <?php if ($_SESSION['description'] == 1): ?>
                    <p class="text-danger">Mô tả không được để trống</p>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="" class="form-label"> Danh mục </label>
                <select name="category" id="" class="form-select">
                    <option value="0">Chưa phân loại</option>
                    <?php foreach ($category as $cate): ?>
                        <option value="<?= $cate['id'] ?>"><?= $cate['name_category'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Hình ảnh</label>
                <input class="form-control" name="thumbnail" type="file" id="formFile">
                <?php if ($_SESSION['thumbnail'] == 1): ?>
                    <p class="text-danger">Vui lòng chọn ảnh tải lên hoặc ảnh có sẵn</p>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <lable class="form-label">Hình đã tải lên</lable>
            </div>
            <div class="input-group mb-3">
                <button type="button" onclick="selectFileWithCKFinder('ckfinder-input-1')" class="input-group-text">Chọn
                    hình
                </button>
                <input type="text" class="form-control" name="ckfinder" id="ckfinder-input-1"
                       placeholder="Chưa hình nào được chọn" value="">
            </div>
            <?php if ($_SESSION['thumbnail'] == 1): ?>
                <p class="text-danger">Vui lòng chọn ảnh tải lên hoặc ảnh có sẵn</p>
            <?php endif; ?>
            <button type="submit" name="add" class="btn btn-primary">Thêm biến thể</button>
            <a href="?page=product&action=list" class="btn btn-primary">Danh sách sản phẩm</a>
            <a href="?page=product&action=add" class="btn btn-primary">Thêm sản phẩm thường</a>
        </form>
    </div>
</div>
<div class="col-1"></div>


