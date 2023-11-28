<?php
require_once 'model-post.php';
$post = new Posts;
$getPostCate = $post->getPostCate();
?>

<div class="col-sm-12 mt-3">
    <div class="bg-secondary rounded h-100 p-4">
        <form action="/admin/pages/posts/handel.php" method="post" enctype="multipart/form-data">
            <div class="d-lg-flex align-items-center justify-content-between mb-4">
                <h6 class="">THÊM BÀI VIẾT</h6>
                <div class="">
                    <button type="submit" name="addNote" class="btn btn-primary">Lưu vào Nháp </button>
                    <button type="submit" name="add" class="btn btn-primary">Thêm Mới 
                    </button>
                </div>

            </div>

            <div class="mb-3">
                <label for="name" class="mb-2">Tiêu Đề Bài Viết</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Tên tiêu đề bài viết.....">
            </div>

            <div class="">
                <div class="row">
                    <div class="col-lg-8 col-sm-12">
                        <div class=" mb-5">
                            <label for="img-post" class="btn-primary p-2 rounded"
                                   style="min-width: 120px; text-align : center ;cursor: pointer;">Hình ảnh + </label>

                            <input class="form-control form-control-sm border mb-3" id="img-post" type="file"
                                   name="thumbnail" hidden onchange="readURL(this);">
                            <div style="width: 100%" class="p-lg-4 border rounded mt-3 border-light ">
                                <img src="https://cdn11.bigcommerce.com/s-1812kprzl2/images/stencil/original/products/582/5042/no-image__63632.1665666729.jpg?c=2"
                                     alt="" id="img" class="d-block p-3 " style="min-height: 240px; width: 100%; ">
                            </div>

                            <script>
                                function readURL(input) {
                                    if (input.files && input.files[0]) {
                                        var reader = new FileReader();

                                        reader.onload = function (e) {
                                            $('#img').attr('src', e.target.result);
                                        }
                                        reader.readAsDataURL(input.files[0]);
                                    }
                                }
                            </script>
                        </div>

                    </div>

                    <div class="col-lg-4 col-sm-12">
                        <div class="mb-3">
                            <label for="" class="mb-2">Danh Mục Bài Viết</label>
                            <select class="form-select" aria-label="Default select example" name="category_id">
                                <?php foreach ($getPostCate as $category) : ?>
                                    <option <?= (isset($_GET['$category']) && $_GET['category'] === $category['id']) ? 'selected' : '' ?>
                                            value=" <?= $category['id'] ?>">
                                        <?= $category['name_category'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>

                        </div>
                    </div>
                </div>

            </div>
            <div class="form-floating">
                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="content"
                          style="height: 150px;"></textarea>
            </div>
        </form>
    </div>
</div>