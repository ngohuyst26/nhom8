<?php
include 'product.php';
$pro = new product();
$up = new upLoad();

$category = $pro->GetCategory();
if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $sku = $_POST['sku'];
    $price = $_POST['price'];
    $category = $_POST['categori'];
    $thumbnail = $up->uploadImg($_FILES["thumbnail"]);
    $pro->addProductDefault($name, $description, $category, $thumbnail, $sku, $price);
    $id = $pro->LastProduct()['id'];
    header("Location: ?page=product&action=list");
}

?>


<div class="col-1"></div>
<div class="col-sm-12 col-xl-10 mt-3">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">THÊM SẢN PHẨM</h6>
        <form enctype="multipart/form-data" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tên sản phẩm</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Mô tả</label>
                <input type="text" name="description" class="form-control">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Giá</label>
                <input type="number" name="price" class="form-control">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Sku</label>
                <input type="text" name="sku" class="form-control">
            </div>
            <div class="mb-3">
                <label for="" class="form-label"> Danh mục </label>
                <select name="categori" id="" class="form-select">
                    <option value="0">Chưa phân loại</option>
                    <?php foreach ($category as $cate): ?>
                        <option value="<?= $cate['id'] ?>"><?= $cate['name_category'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Hình ảnh</label>
                <input class="form-control" name="thumbnail" type="file" id="formFile">
            </div>
            <div class="mb-3">
                <label class="form-label">Hình đã tải lên</label>
            </div>
            <div class="input-group mb-3">
                <button type="button" onclick="selectFileWithCKFinder('ckfinder-input-1')" class="input-group-text">Chọn
                    hình
                </button>
                <input type="text" class="form-control" name="ckfinder" id="ckfinder-input-1"
                       placeholder="Chưa hình nào được chọn" value="">
            </div>
            <button type="submit" name="add" class="btn btn-primary">Lưu</button>
            <a href="?page=product&action=list" class="btn btn-primary">Danh sách sản phẩm</a>
            <a href="?page=product&action=add-variants" class="btn btn-primary">Thêm sản phẩm biến thể</a>
        </form>
    </div>
</div>
<div class="col-1"></div>

