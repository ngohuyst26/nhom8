<?php

require_once 'model-post.php';
$post = new Posts;

$getPostCate = $post->getPostCate();
$countAllPost = $post->countAllPost();
$countTrashPost = $post->countPostByStatus(2);
$countPushPost = $post->countPostByStatus(1);
$countNotePost = $post->countPostByStatus(3);

$limit = 5;
$numberPag = $limit;

$base_url = (isset($_GET['offset'])) ? '?page=posts&action=list' : $_SERVER['REQUEST_URI'];
$next_page_url = $base_url;

if (isset($_GET['f'])) {
    $next_page_url = $base_url . '&f=' . $_GET['f'];
}


if (isset($_GET['offset'])) {
    $offset = $_GET['offset'];
} else {
    $offset = 0;
}


if (isset($_GET['f'])) {
    if ($_GET['f'] == 'trash') {
        $status = 2;
        $page = ceil($countTrashPost / $numberPag);
    }

    if ($_GET['f'] == 'note') {
        $status = 3;
        $page = ceil($countNotePost / $numberPag);
    }
} else {
    $status = 1;
    $page = ceil($countPushPost / $numberPag);
}

if (isset($_GET['category'])) {
    $cate = $_GET['category'];

    if ($cate == 'all') {
        $getAllPost = $post->getAllPost($offset, $limit);
    } else {
        $next_page_url = $base_url . '&category=' . $_GET['category'];
        $countPostCate = $post->countPostCate($cate, $status);
        $page = ceil($countPostCate / $numberPag);
        $getAllPost = $post->getPostByCate($cate, $status, $offset, $limit);
    }
} else {
    $cate = 'all';
    $getAllPost = $post->getAllPost($offset, $limit);
}

if (isset($_GET['f']) && $_GET['f'] == 'trash') {
    if (isset($_GET['category'])) {
        $cate = $_GET['category'];
        if ($cate == 'all') {
            $getAllPost = $post->getTrashPost($offset, $limit);
        } else {
            $next_page_url = $base_url . '&f=' . $_GET['f'] . '&category=' . $_GET['category'];
            $countPostCate = $post->countPostCate($cate, $status);
            $page = ceil($countPostCate / $numberPag);
            $getAllPost = $post->getPostByCate($cate, $status, $offset, $limit);
        }
    } else {
        $getAllPost = $post->getTrashPost($offset, $limit);
    }
}

if (isset($_GET['f']) && $_GET['f'] == 'note') {
    if (isset($_GET['category'])) {
        $cate = $_GET['category'];
        if ($cate == 'all') {
            $getAllPost = $post->getNotePost($offset, $limit);
        } else {
            $next_page_url = $base_url . '&f=' . $_GET['f'] . '&category=' . $_GET['category'];

            $countPostCate = $post->countPostCate($cate, $status);
            $page = ceil($countPostCate / $numberPag);
            $getAllPost = $post->getPostByCate($cate, $status, $offset, $limit);
        }
    } else {
        $getAllPost = $post->getNotePost($offset, $limit);
    }
}


if (isset($_GET['key'])) {
    $keyword = $_GET['key'];
    $next_page_url = $base_url . '&key=' . $_GET['key'];
    $countPostSearch = $post->countSearchPost($keyword);
    $page = ceil($countPostSearch / $numberPag);

    if (isset($_GET['category'])) {
        $cate = $_GET['category'];

        if ($cate == 'all') {

            $getAllPost = $post->getNotePost($offset, $limit);
        } else {

            $next_page_url = $base_url . '&key=' . $_GET['key'] . '&category=' . $_GET['category'];

            $countPostCate = $post->countSearchPostCate($keyword, $cate);
            $page = ceil($countPostCate / $numberPag);
            $getAllPost = $post->getSearchPostCate($keyword, $cate, $offset, $limit);
        }
    } else {
        $getAllPost = $post->getSearchPost($keyword, $offset, $limit);
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
        left: -320px !important;
    }

    .page-link:hover {
        background-color: #0dcaf0 !important;
    }
</style>


<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">DANH SÁCH BÀI VIẾT</h6>
        </div>
        <div class="text-start d-lg-flex mb-3">
            <p class="me-3 text-warning">Tất Cả (<?= $countAllPost; ?>) </p>
            <p class="me-3"><a href="/admin/?page=posts&action=list"
                               class="<?= (!isset($_GET['f'])) ? 'text-white' : 'text-light' ?>">Công Khai
                    (<?= $countPushPost; ?>) </a></p>
            <p class="me-3"><a href="/admin/?page=posts&action=list&f=trash"
                               class="<?= (isset($_GET['f']) && $_GET['f'] == 'trash') ? 'text-white' : 'text-light' ?>">Thùng
                    rác (<?= $countTrashPost; ?>)</a></p>
            <p class="me-3"><a href="/admin/?page=posts&action=list&f=note"
                               class="<?= (isset($_GET['f']) && $_GET['f'] == 'note') ? 'text-white' : 'text-light' ?>">Nháp
                    (<?= $countNotePost ?>)</a></p>

        </div>
        <div class="d-lg-flex mb-3 justify-content-between aligh-items-center">
            <div class="d-lg-flex ">
                <div class="me-4 mb-3">
                    <div class="d-flex">
                        <div class="me-2">
                            <select class="form-select form-select-sm" name="sortAction" id="sortAction">
                                <option value="delListID">Xóa</option>
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

                                <?php
                                if (isset($_GET['f']) && $_GET['f'] == 'note') :
                                    ?>

                                    <option value="publishPost">Xuất Bảng</option>

                                <?php

                                else :;
                                    ?>

                                    <option value="noteListID">Nháp</option>

                                <?php
                                endif;
                                ?>

                            </select>
                        </div>
                        <label for="listID" id="labelListID" class="btn btn-sm  btn-outline-light">Thực Hiện</label>
                    </div>

                </div>
                <div class=" me-3 mb-3">
                    <form action="" method="GET">
                        <input type="hidden" name="page" value="posts">
                        <input type="hidden" name="action" value="list">
                        <input type="hidden" name="<?= (isset($_GET['f']) ? 'f' : '') ?>"
                               value="<?= (isset($_GET['f']) ? $_GET['f'] : '') ?>">
                        <input type="hidden" name="<?= (isset($_GET['key']) ? 'key' : '') ?>"
                               value="<?= (isset($_GET['key']) ? $_GET['key'] : '') ?>">
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
                    <input type="hidden" name="page" value="posts">
                    <input type="hidden" name="action" value="list">
                    <input type="text" class="form-control form-control-sm main-search" style="min-width: 220px;"
                           name=" key" id="key" placeholder="Tìm kiếm....">
                    <button id="searchSubmit" class="btn btn-outline-light border btn-sm border-2 border-light"
                            type="submit" disabled><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>

        </div>

        <?php
        if (isset($keyword) && isset($countPostSearch)) :
            ?>
            <div class="text-start mb-3 text-white fst-italic">
                <span>Kết quả tìm kiếm "<?= (isset($_GET['key'])) ? $_GET['key'] : '' ?> " (<?= $countPostSearch ?>) </span>
            </div>

        <?php endif; ?>

        <div class="pt-3" style="overflow-x: auto;">
            <div class="text-start align-middle table-hover">
                <div class="d-flex align-items-center mb-3 border-bottom pb-3 border-info" style="width: 1173px">
                    <div class="" style="width:40px;"><input type="checkbox" id="head_check_list"
                                                             class="form-check-input"></div>
                    <div class="" style="width: 440px;">Tiêu Đề</div>
                    <div class="" style="width:180px">Hình Ảnh</div>
                    <div class="" style="width:120px">Tác Giả</div>
                    <div class="" style="width:140px">Danh Mục</div>
                    <div class="" style="width:120px">Thời Gian</div>
                    <div class="">Thao Tác</div>
                </div>

                <div class="d-flex align-items-center" id="test-list">
                    <div class="">
                        <form action="/admin/pages/posts/handel.php" method="post">

                            <?php
                            if (isset($getAllPost)) :
                                foreach ($getAllPost as $post) :

                                    ?>
                                    <div class=" d-flex align-items-center mb-3" style="width: 40px; height: 78px;">
                                        <input type="checkbox" class="list checkList form-check-input"
                                               name="check_list[]" value="<?= $post['id'] ?>"></div>

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
                                    <div style="width:180px"><img style="width: 140px; height: 78px;" class="rounded"
                                                                  src="<?php echo !empty($post['thumbnail']) ? $post['thumbnail'] : "https://cdn11.bigcommerce.com/s-1812kprzl2/images/stencil/original/products/582/5042/no-image__63632.1665666729.jpg?c=2" ?>"
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
                                                    elseif ((isset($_GET['f']) && $_GET['f'] == 'note')) :
                                                        ?>

                                                        <form action="/admin/pages/posts/handel.php" method="post">
                                                            <input type="text" name="check_list[]"
                                                                   value="<?= $post['id'] ?>" hidden>
                                                            <button type="submit" name="publishPost"
                                                                    class="btn dropdown-item text-light"
                                                                    style="min-width:90px">Xuất Bảng
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
                                                                                <select
                                                                                    class="form-select quick_category"
                                                                                    size="3 aria-label=" Size 3 select
                                                                                    example" name="category_id">
                                                                                <?php foreach ($getPostCate as $category) : ?>
                                                                                    <?php
                                                                                    if ($post['category_id'] == $category['id']) :
                                                                                        ?>

                                                                                        <option selected
                                                                                                value=" <?= $category['id'] ?>"><?= $category['name_category'] ?></option>

                                                                                    <?php else : ?>

                                                                                        <option
                                                                                            value=" <?= $category['id'] ?>"><?= $category['name_category'] ?></option>

                                                                                    <?php endif ?>


                                                                                <?php endforeach; ?>
                                                                                </select>

                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div
                                                                        class="d-flex justify-content-between align-items-center">
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

        <?php if ($page > 1) :
            ?>
            <div class="Pagination">
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-end">
                        <li class="page-item <?= (isset($_GET['offset']) && $_GET['offset'] == 0 ? 'disabled ' : '') ?> ">
                            <a class="page-link m-1 bg-secondary text-white"
                               href="<?= $next_page_url ?>&offset=<?= (isset($_GET['offset'])) ? $_GET['offset'] - $limit : '0' ?> "
                               aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <?php
                        for ($i = 0; $i < $page; $i++) :
                            $active = false;
                            if (isset($_GET['offset'])) {
                                $active = ($_GET['offset'] / $limit == $i);
                            } else {
                                $active = ($i == 0);
                            }
                            $class = $active ? 'bg-info text-white' : 'bg-secondary text-white';

                            ?>

                            <li class="page-item">
                                <a class="page-link rounded m-1 <?= $class ?>" href="
                                        <?= $next_page_url ?>&offset=<?= $i * $limit ?>"><?= $i + 1 ?>
                                </a>
                            </li>

                        <?php endfor; ?>

                        <li class="page-item <?= (isset($_GET['offset']) && $_GET['offset'] == ($page * $limit) - $limit ? 'disabled' : '') ?>">
                            <a class="page-link m-1 bg-secondary text-white" href="
                                    <?= $next_page_url ?>&offset=<?= (isset($_GET['offset'])) ? $_GET['offset'] + $limit : $limit ?>"
                               aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>

            </div>


        <?php endif; ?>


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
                    <input type="text" name="check_list" value="" id="formDel" hidden>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <button class="btn text-light" type="submit" name="delListID">Xóa</button>

                </div>
            </form>

        </div>
    </div>
</div>



<script>
    const d = document.getElementById('head_check_list');
    const e = document.querySelectorAll('.checkList')

    d.addEventListener('click', () => {
        if (d.checked == true) {
            e.forEach((item) => {
                item.checked = true;
            })
        } else {
            e.forEach((item) => {
                item.checked = false;
            })
        }

    });


    const b = document.querySelectorAll('.LISTID');
    b.forEach((item) => {
        item.addEventListener("click", () => {
            document.getElementById("formDel").setAttribute('value', item.value);
        });
    });

    const sortAction = document.getElementById('sortAction')
    sortAction.addEventListener('change', (event) => {
        const a = event.target.value;
        document.getElementById("listID").setAttribute('name', a);

    })

    document.getElementById("key").addEventListener("keyup", function () {
        var nameInput = document.getElementById('key').value;
        if (nameInput != "") {
            document.getElementById('searchSubmit').removeAttribute("disabled");
        } else {
            document.getElementById('searchSubmit').setAttribute("disabled", null);
        }
    });
</script>