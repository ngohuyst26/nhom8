<?php


include_once '../../../config/database.php';
require_once 'model-post.php';
$post = new Posts;


$limit = 5;
$numberPag = $limit;
$status = 1;

if (isset($_GET['offset'])) {
    $offset = $_GET['offset'];
} else {
    $offset = 0;
}


if (isset($_POST['GetByCate']) && $_POST['GetByCate']) {
    $cate = $_POST['GetByCate'];
    $getAllPost = $post->getPostByCate($cate, $status, $offset, $limit);


} else {
    $value = $pro->GetAllProduct();
}


$base_url = (isset($_GET['offset'])) ? '?page=posts&action=list' : $_SERVER['REQUEST_URI'];
$next_page_url = $base_url;




?>

<div class="">
    <form action="/admin/pages/posts/handel.php" method="post">

        <?php
        if (isset($getAllPost)) :
            foreach ($getAllPost as $post) :

        ?>
                <div class=" d-flex align-items-center mb-3" style="width: 40px; height: 78px;">
                    <input type="checkbox" class="list checkList form-check-input" name="check_list[]" value="<?= $post['id'] ?>">
                </div>

        <?php
            endforeach;
        endif;
        ?>

        <input type="submit" id="listID" name="delListID" hidden>

    </form>

</div>
<div>
    <?php
    if (isset($getAllPost)) :
        foreach ($getAllPost as $post) :

    ?>
            <div class="d-flex align-items-center mb-3">
                <div style="width:440px">
                    <span style="width:420px" class="post_table_title"> <?= $post['name'] ?></span>
                </div>
                <div style="width:180px"><img style="width: 140px; height: 78px;" class="rounded" src="<?php echo !empty($post['thumbnail']) ? $post['thumbnail'] : "https://cdn11.bigcommerce.com/s-1812kprzl2/images/stencil/original/products/582/5042/no-image__63632.1665666729.jpg?c=2" ?>" alt=""></div>
                <div style="width:120px">
                    <p class=""> <?= $post['user_name'] ?></p>
                </div>
                <div style="width:140px">
                    <p class="post_table_title"> <?= $post['name_category'] ?></p>
                </div>

                <div style="width:120px">
                    <p style="width:120px"> <?= !empty($post['updated_at']) ? date('d-m-Y', strtotime($post['updated_at'])) : '' ?> </p>
                </div>

                <div>

                    <div class="dropdown">
                        <button class=" btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" data-bs-auto-close='outside' aria-expanded="false">
                            <i class="fa-solid fa-ellipsis-vertical"></i>
                        </button>
                        <ul class="dropdown-menu bg-secondary  border-light">
                            <li>
                                <a class="btn dropdown-item text-light" href="?page=posts&action=view&id=<?= $post['id'] ?>" target="_blank" style="min-width:90px">Xem</a>

                            </li>
                            <li>
                                <a class="btn dropdown-item text-light" href="?page=posts&action=edit&id=<?= $post['id'] ?>" style="min-width:90px">Chỉnh Sửa</a>

                            </li>
                            <li>
                                <button type="button" value="<?= $post['id'] ?>" class="LISTID btn dropdown-item text-light" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                    Xóa
                                </button>
                            </li>
                            <li class="dropdown dropstart">


                                <?php
                                if (isset($_GET['f']) && $_GET['f'] == 'trash') :
                                ?>

                                    <form action="/admin/pages/posts/handel.php" method="post">
                                        <input type="text" name="check_list[]" value="<?= $post['id'] ?>" hidden>
                                        <button type="submit" name="restore" class="btn dropdown-item text-light" style="min-width:90px">Khôi Phục
                                        </button>
                                    </form>

                                <?php
                                elseif ((isset($_GET['f']) && $_GET['f'] == 'note')) :
                                ?>

                                    <form action="/admin/pages/posts/handel.php" method="post">
                                        <input type="text" name="check_list[]" value="<?= $post['id'] ?>" hidden>
                                        <button type="submit" name="publishPost" class="btn dropdown-item text-light" style="min-width:90px">Xuất Bảng
                                        </button>
                                    </form>

                                <?php
                                else :;
                                ?>

                                    <button class="item-btn btn dropdown-item text-light" type="button" data-bs-toggle="dropdown" data-bs-auto-close='outside' aria-expanded="false">
                                        Sửa Nhanh
                                    </button>

                                    <ul class=" dropdown-menu bg-secondary update-quick border-light">
                                        <li>
                                            <form action="/admin/pages/posts/handel.php" class="p-2" method="post">
                                                <div class="row">
                                                    <div class="col-8">
                                                        <p class="mb-2" style="font-size: 0.8rem;">
                                                            Chỉnh Sửa Nhanh</p>
                                                        <input type="text" name="id" value="<?= $post['id'] ?>" hidden>
                                                        <div class="mb-1 row">
                                                            <label for="quick-name" class="col-sm-3 col-form-label">Tiêu
                                                                Đề</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control quick-name" id="quick-name" name="name" value="<?= $post['name'] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label for="quick-slug" class="col-sm-3 col-form-label">Slug</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control" id="quick-slug" name="slug" value="<?= $post['slug'] ?>">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-4">
                                                        <div class="mb-3">
                                                            <p class="mb-2" style="font-size: 0.8rem;">Danh Mục
                                                                Bài Viết</p>
                                                            <select class="form-select quick_category" size="3 aria-label=" Size 3 select example" name="category_id">
                                                                <?php foreach ($getPostCate as $category) : ?>
                                                                    <?php
                                                                    if ($post['category_id'] == $category['id']) :
                                                                    ?>

                                                                        <option selected value=" <?= $category['id'] ?>"><?= $category['name_category'] ?></option>

                                                                    <?php else : ?>

                                                                        <option value=" <?= $category['id'] ?>"><?= $category['name_category'] ?></option>

                                                                    <?php endif ?>


                                                                <?php endforeach; ?>
                                                            </select>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="d-flex justify-content-between align-items-center">
                                                    <button type="button" class="btn btn-sm btn-outline-info" aria-expanded="false">Hủy
                                                    </button>
                                                    <button type="submit" name="quick-update" class="btn btn-sm btn-info">Cập Nhật
                                                    </button>
                                                </div>


                                            </form>
                                        </li>
                                    </ul>

                                <?php
                                endif;
                                ?>

                            </li>
                        </ul>
                    </div>

                </div>

            </div>


    <?php
        endforeach;
    endif;
    ?>

</div>