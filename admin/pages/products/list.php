<?php
include "product.php";
$pro = new product();

if (isset($_POST['del_product'])) {
    $id_product = $_POST['id_product'];
    $pro->DelProduct($id_product);
}
$categoryName = $pro->GetCategory();

?>


<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary text-center rounded p-4">
        <div class="d-flex align-items-center gap-3 mb-4">
            <h6 class="mb-0">DANH SÁCH SẢN PHẨM</h6>
            <div class="col-3">
                <select class="form-select" id="category" aria-label="Default select example">
                    <option value="0">Tất cả</option>
                    <?php foreach ($categoryName as $cate): ?>
                        <option value="<?= $cate['id'] ?>"><?= $cate['name_category'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <input type="text" id="search" class="form-control" placeholder="Tìm kiếm theo tên...">
            </div>
        </div>
        <div class="table-responsive" id="value">
            <?php include "table-list.php"; ?>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {

        $('#search').on('keyup', function (e) {
            e.preventDefault();
            console.log($(this).val());
            $.ajax({
                url: 'pages/products/search.php',
                type: 'POST',
                data: {
                    search: $(this).val()
                }
            }).done(function (ketqua) {
                $('#value').html(ketqua);
            });

        });
    });

    $(document).ready(function () {

        $('#category').on('change', function (e) {
            e.preventDefault();
            console.log($(this).val());
            $.ajax({
                url: 'pages/products/ProductsCategory.php',
                type: 'POST',
                data: {
                    GetByCate: $(this).val()
                }
            }).done(function (ketqua) {
                $('#value').html(ketqua);
            });

        });
    });
</script>