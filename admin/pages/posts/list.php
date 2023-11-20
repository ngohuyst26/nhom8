<?php

require_once 'model-post.php';
$post = new Posts;

$getPostCate = $post->getPostCate();
$countAllPost = $post->countAllPost();
$countTrashPost = $post->countTrashPost();

if (isset($_GET['f']) && $_GET['f'] == 'trash') {
    $status = 2;
} else {
    $status = 1;
}

if (isset($_GET['category'])) {

    $cate = $_GET['category'];

    if ($cate == 'all') {
        $getAllPost = $post->getAllPost();
    } else {
        $getAllPost = $post->getPostByCate($cate, $status);
    }
} else {
    $cate = 'all';
    $getAllPost = $post->getAllPost();
}

if (isset($_GET['f']) && $_GET['f'] == 'trash') {
    if (isset($_GET['category'])) {
        $cate = $_GET['category'];
        if ($cate == 'all') {
            $getAllPost = $post->getTrashPost();
        } else {
            $getAllPost = $post->getPostByCate($cate, $status);
        }
    } else {
        $getAllPost = $post->getTrashPost();
    }
}


?>

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
        <div class="text-start d-flex mb-3">
            <span class="me-3"><a href="/admin/?page=posts&action=list"
                                  class="text-light">Tat ca </a>(<?= $countAllPost; ?>)</span>
            <span class="me-3"><a href="/admin/?page=posts&action=list&f=trash"
                                  class="text-light">Thung rac</a> (<?= $countTrashPost; ?>)</span>
            <span class="me-3">Nháp (0)</span>

        </div>
        <div class="d-lg-flex mb-3 justify-content-between aligh-items-center">
            <div class="d-lg-flex ">
                <div class="me-4 mb-3">
                    <div class="d-flex">
                        <div class="me-2">
                            <select class="form-select form-select-sm" name="sortAction" id="sortAction">
                                <option value="del">Xóa</option>
                                <?php
                                if (isset($_GET['f']) && $_GET['f'] == 'trash') :

                                    ?>
                                    <option value="restore">Khôi Phục</option>
                                <?php
                                else :;
                                    ?>

                                    <option value="trashListID">Thùng rác</option>

                                <?php
                                endif;
                                ?>
                                <option value="noteListID">Nháp</option>
                            </select>
                        </div>
                        <label for="listID" id="labelListID" class="btn btn-sm  btn-outline-light">Thực Hiện</label>
                    </div>

                </div>
                <div class=" me-3 mb-3">
                    <form action="" method="GET">
                        <select name="category" id="category" class="form-select form-select-sm"
                                onchange="this.form.submit();">
                            <option value="all">All</option>
                            <?php
                            foreach ($getPostCate as $category) : ?>
                                <?php
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
                    <input type="text" class="form-control form-control-sm" name=" key" id="key"
                           placeholder="Tìm kiếm....">
                    <button class="btn border btn-sm border-2 border-light" type="submit"><i
                                class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>

        </div>

        <div class="" style="overflow-x: auto;">
            <div class="text-start align-middle table-hover">
                <div class="d-flex align-items-center mb-3 border-bottom pb-3 border-info" style="width: 1173px">
                    <div class="" style="width:40px;"><input type="checkbox"></div>
                    <div class="" style="width: 440px;">Tiêu Đề</div>
                    <div class="" style="width:180px">Hình Ảnh</div>
                    <div class="" style="width:120px">Tác Giả</div>
                    <div class="" style="width:140px">Danh Mục</div>
                    <div class="" style="width:120px">Thời Gian</div>
                    <div class="">Thao Tác</div>
                </div>

                <div class="d-flex align-items-center" id="">
                    <div class="">
                        <form action="/admin/pages/posts/handel.php" method="post">

                            <?php
                            if (isset($getAllPost)) :
                                foreach ($getAllPost as $post) :

                                    ?>
                                    <div class="d-flex align-items-center mb-3" style="width: 40px; height: 78px;">
                                        <input type="checkbox" class="checkList" name="check_list[]"
                                               value="<?= $post['id'] ?>"></div>

                                <?php
                                endforeach;
                            endif;
                            ?>


                            <input type="submit" id="listID" name="delListID" hidden>

                        </form>


                    </div>
                    <div class="">
                        <?php
                        if (isset($getAllPost)) :
                            foreach ($getAllPost as $post) :

                                ?>
                                <div class="d-flex align-items-center mb-3">
                                    <div style="width:440px">
                                        <span style="width:420px" class="post_table_title"> <?= $post['name'] ?></span>
                                    </div>
                                    <div style="width:180px"><img style="width: 140px; height: 78px;" class="rounded"
                                                                  src="<?php echo !empty($post['thumbnail']) ? $post['thumbnail'] : "https://i.pinimg.com/736x/72/d2/96/72d296e10b71253eb2c259b0ad810919.jpg" ?>"
                                                                  alt=""></div>
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
                                                    <button type="button" value="<?= $post['id'] ?>"
                                                            class="LISTID btn dropdown-item text-light"
                                                            data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                        Xóa
                                                    </button>
                                                </li>
                                                <li class="dropdown dropstart">


                                                    <?php
                                                    if (isset($_GET['f']) && $_GET['f'] == 'trash') :
                                                        ?>

                                                        <form action="/admin/pages/posts/handel.php" method="post">
                                                            <input type="text" name="check_list[]"
                                                                   value="<?= $post['id'] ?>" hidden>
                                                            <button type="submit" name="restore"
                                                                    class="btn dropdown-item text-light"
                                                                    style="min-width:90px">Khôi Phục
                                                            </button>
                                                        </form>

                                                    <?php
                                                    else :;
                                                        ?>

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
                                                                            <p class="mb-2" style="font-size: 0.8rem;">
                                                                                Chỉnh Sửa Nhanh</p>
                                                                            <input type="text" name="id"
                                                                                   value="<?= $post['id'] ?>" hidden>
                                                                            <div class="mb-1 row">
                                                                                <label for="quick-name"
                                                                                       class="col-sm-3 col-form-label">Tiêu
                                                                                    Đề</label>
                                                                                <div class="col-sm-9">
                                                                                    <input type="text"
                                                                                           class="form-control"
                                                                                           id="quick-name" name="name"
                                                                                           value="<?= $post['name'] ?>">
                                                                                </div>
                                                                            </div>
                                                                            <div class="mb-3 row">
                                                                                <label for="quick-slug"
                                                                                       class="col-sm-3 col-form-label">Slug</label>
                                                                                <div class="col-sm-9">
                                                                                    <input type="text"
                                                                                           class="form-control"
                                                                                           id="quick-slug" name="slug"
                                                                                           value="<?= $post['slug'] ?>">
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-4">
                                                                            <div class="mb-3">
                                                                                <p class="mb-2"
                                                                                   style="font-size: 0.8rem;">Danh Mục
                                                                                    Bài Viết</p>
                                                                                <select class="form-select"
                                                                                        size="3 aria-label=" Size 3
                                                                                        select example"
                                                                                name="category_id">
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
                                                                        <button type="button"
                                                                                class="btn btn-sm btn-outline-info"
                                                                                aria-expanded="false">Hủy
                                                                        </button>
                                                                        <button type="submit" name="quick-update"
                                                                                class="btn btn-sm btn-info">Cập Nhật
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
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/admin/pages/posts/handel.php" method="post">
                <div class="modal-header">
                    <h1 class="modal-title text-dark fs-5" id="staticBackdropLabel">Bạn Có Chắc Chắn Muốn Xóa Bài Viết
                        Này</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-footer">
                    <input type="text" name="id" value="" id="formDel" hidden>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <button class="btn  text-light" type="submit" name="del">Xóa</button>

                </div>
            </form>

        </div>
    </div>
</div>


<script>
    // const c = document.querySelectorAll('.checkList')
    // console.log(c);
    // c.forEach((item) => {
    //     item.addEventListener("click", () => {
    //         document.getElementById("listID").setAttribute('disable', '');
    //     });
    // });


    const b = document.querySelectorAll('.LISTID');

    console.log(b)


    b.forEach((item) => {
        item.addEventListener("click", () => {
            document.getElementById("formDel").setAttribute('value', item.value);
        });
    });


    const categorySelect = document.getElementById('category');
    const currentURL = new URL(window.location.href);

    categorySelect.addEventListener('change', (event) => {
        const selectedCategoryId = event.target.value;
        currentURL.searchParams.set('category', selectedCategoryId);
        window.location.href = currentURL.toString();

    });

    const categorySelect2 = document.getElementById('key');
    const currentURL2 = new URL(window.location.href);

    categorySelect2.addEventListener('change', (event) => {
        const selectedCategoryId2 = event.target.value;
        currentURL2.searchParams.set('key', selectedCategoryId2);
        window.location.href = currentURL2.toString();

    });


    const sortAction = document.getElementById('sortAction')

    sortAction.addEventListener('change', (event) => {
        const a = event.target.value;

        console.log(a);

        document.getElementById("listID").setAttribute('name', a);

    })
</script>