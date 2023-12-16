<div class="container-fluid pt-4 px-4">

    <div class="col-sm-12 mt-3">
        <div class="bg-secondary rounded h-100 p-4">
            <form action="/admin/pages/postCate/handel.php" method="post" enctype="multipart/form-data">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="">CHỈNH SỬA DANH MỤC BÀI VIẾT</h6>
<<<<<<< HEAD
                    <button type="submit" name="edit" class="btn btn-light">Cập Nhật</button>
=======
                    <button type="submit" name="edit" class="btn btn-primary">Cập Nhật</button>
>>>>>>> 02755d18b81aed5b01e036cb90360e00e11bf24a
                </div>

                <?php
                require_once 'module-postCate.php';
                $post = new PostCate;
                $id = $_GET['id'];

                $post = $post->getPostCateByID($id);
                foreach ($post as $post) :
                ?>

                    <div class=" mb-3">
                        <label for="name" class="mb-2">Tên Danh Mục Bài Viết</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Tiêu Đề Bài Viết" value="<?= $post['name_category'] ?>">
                    </div>
                    <div class=" mb-3">
                        <label for="slug" class="mb-2">Slug</label>
                        <input type="text" class="form-control" id="slug" name="slug" placeholder="Tiêu Đề Bài Viết" value="<?= $post['slug'] ?>">
                    </div>

                    <div class="">
                    <h6 class="h6 fw-bold">Mô Tả</h6>
                                <textarea class="form-control" placeholder="Mô tả..." name="content" id="floatingTextarea" style="height: 150px;"></textarea>
                    </div>

                    <input type="text" name="id" value="<?= $id ?>" hidden>


                <?php
                endforeach;

                ?>

            </form>
        </div>
    </div>
</div>