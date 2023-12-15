<div class="container-fluid pt-4 px-4">

    <div class="col-sm-12 mt-3">
        <div class="bg-secondary rounded h-100 p-4">
            <form action="/admin/pages/posts/handel.php" method="post" enctype="multipart/form-data">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="">CHỈNH SỬA BÀI VIẾT</h6>
                    <button type="submit" name="edit" class="btn btn-primary">Cập Nhật</button>
                </div>

                <?php
                require_once 'model-post.php';
                $post = new Posts;
                $getPostCate = $post->getPostCate();

                $id = $_GET['id'];

                $post = $post->getPostByID($id);
                foreach ($post as $post) :
                ?>

                    <div class=" mb-3">
                        <label for="name" class="mb-2">Tiêu Đề Bài Viết</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Tiêu Đề Bài Viết"
                               value="<?= $post['name'] ?>">
                    </div>
                    <div class=" mb-3">
                        <label for="slug" class="mb-2">Slug</label>
                        <input type="text" class="form-control" id="slug" name="slug" placeholder="Tiêu Đề Bài Viết"
                               value="<?= $post['slug'] ?>">
                    </div>

                    <div class="">
                        <div class="row">
                            <div class="col-8">
                                <div class=" mb-5">
                                    <label for="img-post" class="btn-primary p-2 rounded"
                                           style="min-width: 120px; text-align : center ;cursor: pointer;">Hình ảnh
                                        + </label>

                                    <input class="form-control form-control-sm border mb-3" id="img-post" type="file"
                                           name="thumbnail" hidden onchange="readURL(this);">
                                    <div style="width: 100%" class="p-4 border rounded mt-3 border-light ">
                                        <img src="<?php echo !empty($post['thumbnail']) ? $post['thumbnail'] : "https://cdn11.bigcommerce.com/s-1812kprzl2/images/stencil/original/products/582/5042/no-image__63632.1665666729.jpg?c=2" ?>"
                                             alt="" id="img" class="d-block p-3 "
                                             style="min-height: 240px; width: 100%; ">
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

                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="" class="mb-2">Danh Mục Bài Viết</label>

                                    <select class="form-select" aria-label="select example" name="category_id">
                                        <?php foreach ($getPostCate as $category) : ?>
                                            <?php
                                            if ($post['category_id'] == $category['id']) :
                                                ?>

                                                <option selected
                                                        value=" <?= $category['id'] ?>"><?= $category['name_category'] ?></option>

                                            <?php else : ?>

                                                <option value=" <?= $category['id'] ?>"><?= $category['name_category'] ?></option>

                                            <?php endif ?>


                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea"
                                  name="content">
                                    <?=
                                    $post['content']
                                    ?>
                    </textarea>
                    </div>

                    <input type="text" name="id" value="<?= $id ?>" hidden>


                <?php
                endforeach;

                ?>

            </form>
        </div>
    </div>
</div>