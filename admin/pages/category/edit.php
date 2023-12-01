<?php
$_SESSION['sualoai'] = 0;
$id = $_GET['id'];
$connect = new connect();
$tryvan = "SELECT * FROM product_categories WHERE id = $id";
$data = $connect->pdo_query($tryvan);

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $sualoai = $_POST['sualoai'];
    $connect = new connect();
    if(empty($sualoai)){
        $_SESSION['sualoai'] = 1;
        $check = false;
    }
    if($check == true){
        $tryvan = "UPDATE product_categories SET name_category = '$sualoai' WHERE id = $id";
        $connect->pdo_execute($tryvan);
    }
//    $tryvan = "UPDATE product_categories SET name_category = '$sualoai' WHERE id = $id";
//    $connect->pdo_execute($tryvan);
}

?>
<div class="bg-secondary rounded h-100 p-4">
    <h6 class="mb-4">SỬA LOẠI SẢN PHẨM</h6>
    <?php foreach ($data as $categories): ?>
    <form method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Loại sản phẩm:</label>
            <input type="text" value="<?=$categories['name_category']?>" name="sualoai" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <?php if($_SESSION['sualoai'] == 1): ?>
                <p>Không được để trống!!!</p>
            <?php endif; ?>
            <div id="emailHelp" class="form-text" >
            </div>
            <button type="submit" class="btn btn-primary">Sửa loại</button>
        </div>
    </form>
    <?php endforeach; ?>
</div>