<style>
    .post_table_title {
        text-overflow: ellipsis;
        overflow: hidden;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;
        display: -webkit-box;

    }

    .dropdown-toggle::after {

        border: none !important;
    }

    .update-quick {
        position: absolute !important;
        top: -50px !important;
        background-color: #fff;
        left: -320px !important;
        /* max-width: 120px; */
        z-index: 100;

    }
</style>


<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">DANH SÁCH BÀI VIẾT</h6>
        </div>


        <div class="d-lg-flex mb-3 justify-content-between aligh-items-center">
            <div class="d-lg-flex ">
                <!-- <div class="me-4 mb-3">
                    <div class="d-flex">
                        <div class="me-2">
                            <select class="form-select form-select-sm" name="" id="">
                                <option selected>Xóa</option>
                                <option value="">Thùng rác</option>
                                <option value="">Nháp</option>
                            </select>
                        </div>
                        <label for="listID" class="btn border btn-sm border-2 border-light" type="submit">Thực Hiện</label>
                    </div>

                </div> -->
                <div class=" me-3 mb-3">
                    <form action="" method="GET">
                        <select name="category" id="category" class="form-select form-select-sm"
                                onchange="this.form.submit();">
                            <option value="all">All</option>
                            <?php
                            foreach ($getPostCate as $category) : ?>
                                <?php
                                $cate = $_GET['category'];
                                if ($cate == $category['id']) :
                                    ?>
                                    <option selected
                                            value=" <?= $category['id'] ?>"><?= $category['name_category'] ?></option>

                                <?php else : ?>

                                    <option value=" <?= $category['id'] ?>"><?= $category['name_category'] ?></option>

                                <?php endif ?>

                            <?php endforeach; ?>

                        </select>
                    </form>

                </div>

            </div>
            <div class="search">
                <form class="d-flex" role="search" method="GET">
                    <!-- <input type="hidden" name="action" value="categories"> -->
                    <input type="text" class="form-control form-control-sm" placeholder="Tìm kiếm....">
                    <button class="btn border btn-sm border-2 border-light" type="submit"><i
                                class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>

        </div>


        <div class="table-responsive">
            <table class="table text-start align-middle table-hover">
                <thead>
                <tr class="text-white">
                    <th scope="col">Tiêu Đề</th>
                    <th scope="col">Hình Ảnh</th>
                    <th scope="col">Tác Giả</th>
                    <th scope="col">Danh Mục</th>
                    <th scope="col">Thời Gian</th>
                    <th scope="col">Thao Tác</th>
                </tr>
                </thead>
                <tbody>
                <?php

                if (isset($getAllPost)) :
                    foreach ($getAllPost as $post) :

                        ?>
                        <tr>

                            <td style="width:440px">
                                <span style="width:420px" class="post_table_title"> <?= $post['name'] ?></span>
                            </td>
                            <td style="width:180px"><img style="width: 140px;" class="rounded"
                                                         src="<?php echo !empty($post['thumbnail']) ? $post['thumbnail'] : "https://i.pinimg.com/736x/72/d2/96/72d296e10b71253eb2c259b0ad810919.jpg" ?>"
                                                         alt=""></td>
                            <td style="width:120px">
                                <p class=""> <?= $post['user_name'] ?></p>
                            </td>
                            <td style="width:140px">
                                <p class="post_table_title"> <?= $post['name_category'] ?></p>
                            </td>

                            <td style="width:120px">
                                <p style="width:120px"> <?= !empty($post['created_at']) ? date('d-m-Y', strtotime($post['created_at'])) : '' ?> </p>
                            </td>

                            <td>

                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                            data-bs-toggle="dropdown" data-bs-auto-close='outside'
                                            aria-expanded="false">
                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                    </button>
                                    <ul class="dropdown-menu bg-secondary  border-light">
                                        <li>
                                            <a class="btn dropdown-item text-light"
                                               href="?page=posts&action=edit&id=<?= $post['id'] ?>"
                                               style="min-width:90px">Chỉnh Sửa</a>

                                        </li>
                                        <li>
                                            <form action="/admin/pages/posts/handel.php" method="post">
                                                <input type="text" name="id" value="<?= $post['id'] ?>" hidden>
                                                <button class="btn dropdown-item text-light" type="submit" name="del">
                                                    Xóa
                                                </button>
                                            </form>
                                        </li>
                                        <li class="dropdown dropstart">
                                            <button class="btn dropdown-item text-light" type="button"
                                                    data-bs-toggle="dropdown" data-bs-auto-close='outside'
                                                    aria-expanded="false">
                                                Sửa Nhanh
                                            </button>

                                            <ul class="dropdown-menu bg-secondary update-quick border-light">
                                                <li>
                                                    <form action="/admin/pages/posts/handel.php" class="p-2"
                                                          method="post">
                                                        <div class="row">
                                                            <div class="col-8">
                                                                <p class="mb-2" style="font-size: 0.8rem;">Chỉnh Sửa
                                                                    Nhanh</p>
                                                                <input type="text" name="id" value="<?= $post['id'] ?>"
                                                                       hidden>
                                                                <div class="mb-1 row">
                                                                    <label for="quick-name"
                                                                           class="col-sm-3 col-form-label">Tiêu
                                                                        Đề</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control"
                                                                               id="quick-name" name="name"
                                                                               value="<?= $post['name'] ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3 row">
                                                                    <label for="quick-slug"
                                                                           class="col-sm-3 col-form-label">Slug</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control"
                                                                               id="quick-slug" name="slug"
                                                                               value="<?= $post['slug'] ?>">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-4">
                                                                <div class="mb-3">
                                                                    <p class="mb-2" style="font-size: 0.8rem;">Danh Mục
                                                                        Bài Viết</p>
                                                                    <select class="form-select" size="3 aria-label="
                                                                            Size 3 select example" name="category_id">
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

                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <button type="button" class="btn btn-sm btn-outline-info"
                                                                    aria-expanded="false">Hủy
                                                            </button>
                                                            <button type="submit" name="quick-update"
                                                                    class="btn btn-sm btn-info">Cập Nhật
                                                            </button>
                                                        </div>


                                                    </form>
                                                </li>
                                            </ul>

                                        </li>
                                    </ul>
                                </div>

                            </td>

                        </tr>

                    <?php
                    endforeach;
                endif;
                ?>

                </tbody>
            </table>

        </div>

    </div>
</div>


<script>
    const categorySelect = document.getElementById('category');
    const currentURL = new URL(window.location.href);

    categorySelect.addEventListener('change', (event) => {
        const selectedCategoryId = event.target.value;
        currentURL.searchParams.set('category', selectedCategoryId);
        window.location.href = currentURL.toString();

    });
</script>