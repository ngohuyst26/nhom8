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
    $check = $pro->ValidateProductVariants($name, $description);
    if (!$check) {
        $pro->addProduct($name, $description, $category);
        $id = $pro->LastProduct()['id'];
        header("Location: ?page=product&action=edit-variants&product=$id");
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
            <button type="submit" name="add" class="btn btn-primary">Thêm biến thể</button>
            <a href="?page=product&action=list" class="btn btn-primary">Danh sách sản phẩm</a>
            <a href="?page=product&action=add" class="btn btn-primary">Thêm sản phẩm thường</a>
        </form>
    </div>
</div>
<div class="col-1"></div>


