<?php
include 'product.php';
$pro = new product();
$up = new upLoad();
if (isset($_GET['product'])) {
    $id_product = $_GET['product'];
    $data = $pro->GetOneProduct($id_product);
    $categoryName = $pro->GetCategory();
    if (isset($_POST['edit'])) {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $category = $_POST['category'];
        $sku = $_POST['sku'];
        $id_sku = $_POST['id_sku'];
        $price = $_POST['price'];
        if ($_FILES['thumbnail']['size'] > 0) {
            echo $_FILES['thumbnail']['size'];
            $thumbnail = $up->uploadImg($_FILES["thumbnail"]);
        } else {
            $thumbnail = $data['thumbnail'];
        }
        $pro->EditProductDefault($id_product, $id_sku, $name, $description, $category, $thumbnail, $sku, $price);
//        header("Location: ?page=product&action=list");
    }
    $data = $pro->GetOneProduct($id_product);
}
?>


<div class="col-1"></div>
<div class="col-sm-12 col-xl-10 mt-3">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">SỬA SẢN PHẨM</h6>
        <form enctype="multipart/form-data" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tên sản phẩm</label>
                <input type="text" name="name" value="<?= $data['product_name'] ?>" class="form-control">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Mô tả</label>
                <input type="text" name="description" value="<?= $data['description'] ?>" class="form-control">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Giá</label>
                <input type="number" name="price" value="<?= $data['price'] ?>" class="form-control">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Sku</label>
                <input type="text" name="sku" value="<?= $data['sku'] ?>" class="form-control">
                <input type="hidden" name="id_sku" value="<?= $data['sku_id'] ?>">
            </div>
            <div class="mb-3">
                <label for="" class="form-label"> Danh mục </label>
                <select name="category" id="" class="form-select">
                    <option value="0" <?= (($data['categori_id'] == 0) ? "selected" : "") ?> >Chưa phân loại</option>
                    <?php foreach ($categoryName as $cate): ?>
                        <option value="<?= $cate['id'] ?>" <?= (($data['categori_id'] == $cate['id']) ? "selected" : "") ?> ><?= $cate['name_category'] ?></option>
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
            <button type="submit" name="edit" class="btn btn-primary">Lưu</button>
            <a href="?page=product&action=list" class="btn btn-primary">Danh sách sản phẩm</a>
        </form>
    </div>
</div>
<div class="col-1"></div>

