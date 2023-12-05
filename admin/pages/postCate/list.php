

<?php
    $con = new connect();
    require_once 'module-postCate.php';
    $post = new PostCate;

    $data = $post->getAllPostCate();

    $countAllPostCate = $post->countAllPostCate();

    if (isset($_GET['key'])) {
        $keyword = $_GET['key'];
        $data = $post->getSearchPostCate($keyword);
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


</style>


<div class="container-fluid  pt-4 px-4">
    <div class="container bg-secondary rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">DANH MỤC BÀI VIẾT</h6>
        </div>



        <div class="row ">
            <div class="col-lg-4">

                <?php
                require('add.php');
                ?>

            </div>


            <div class="col-lg-8 ">
                <div class="content-header">
                    <div class="card bg-secondary border-light">
                        <div class="card-header border-end border-light">
                            <p class="mt-2 fw-bold">Danh Sách Danh Mục </p>
                        </div>

                        <div class="card-body table-responsive">
                            <div class="d-lg-flex mb-3 justify-content-between aligh-items-center">
                                <div class="d-lg-flex">
                                    <div class="me-4 mb-3">
                                        <div class="d-flex">
                                            <div class="me-2">
                                                <select class="form-select form-select-sm" name="sortAction" id="sortAction">
                                                    <option value="delListID">Xóa</option>
                                                </select>
                                            </div>
                                            <label for="listID" id="labelListID" class="btn btn-sm  btn-outline-light">Thực Hiện</label>

                                        </div>

                                    </div>

                                    <a href="?page=categoriesPost&action=list" class="text-warning ">Tất cả (<?= $countAllPostCate ?>)</a>

                                </div>
                                <div class="search">
                                    <form class="d-flex" role="search" method="GET">
                                        <input type="hidden" name="page" value="categoriesPost">
                                        <input type="hidden" name="action" value="list">
                                        <input type="text" class="form-control form-control-sm main-search" style="min-width: 220px;" name=" key" id="key" placeholder="Tìm kiếm....">
                                        <button id="searchSubmit" class="btn btn-outline-light border btn-sm border-2 border-light" type="submit" disabled><i class="fa-solid fa-magnifying-glass"></i></button>
                                    </form>
                                </div>

                            </div>
                            <table class="table table-hover table-striped" id="demo">
                                <thead>
                                    <tr>
                                        <th scope="col"><input type="checkbox" id="head_check_list"></th>
                                        <th scope="col">Tên Danh Mục</th>
                                        <th scope="col">Slug</th>
                                        <th scope="col">Thao Tác </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <form action="/admin/pages/postCate/handel.php" method="post">

                                        <?php
                                        if (isset($data)) :;
                                            foreach ($data as $item) :;
                                        ?>

                                                <tr>
                                                    <td class="align-middle"><input type="checkbox" class="checkList" name="check_list[]" value="<?= $item['id'] ?> "></td>
                                                    <td class="align-middle"><?= $item['name_category'] ?></td>

                                                    <td class="align-middle" class="align-middle">
                                                        <p><?= $item['slug'] ?> </p>
                                                    </td>
                                                    </td>
                                                    <td class="align-middle">
                                                        <div class="dropdown">
                                                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" data-bs-auto-close='outside' aria-expanded="false">
                                                                <i class="fa-solid fa-ellipsis-vertical"></i>
                                                            </button>
                                                            <ul class="dropdown-menu bg-secondary  border-light">
                                                                <li>
                                                                    <a class="btn dropdown-item text-light" href="?page=categoriesPost&action=edit&id=<?= $item['id'] ?>" style="min-width:90px">Chỉnh Sửa</a>

                                                                </li>
                                                                <li>
                                                                    <button type="button" value="<?= $item['id'] ?>" class="LISTID btn dropdown-item text-light" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                                        Xóa
                                                                    </button>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endforeach ?>
                                        <?php endif; ?>


                                        <input type="submit" hidden name="delListID" id="listID">
                                    </form>
                                </tbody>
                            </table>
                            <?php
                            ?>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>



</div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-secondary">
            <form action="/admin/pages/postCate/handel.php" method="post">
                <div class="modal-header">
                    <h1 class="modal-title text-ưhite fs-5" id="staticBackdropLabel">Bạn Có Chắc Chắn Muốn Xóa Bài Viết Này</h1>
                    <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-footer">
                    <input type="text" name="check_list" value="" id="formDel" hidden>
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Hủy</button>
                    <button class="btn text-light" type="submit" name="delListID">Xóa</button>

                </div>
            </form>

        </div>
    </div>
</div>



<?php

if (isset($_SESSION['notifier'])) {
    $con->alertify($_SESSION['notifier'][0], $_SESSION['notifier'][1]);
    unset($_SESSION['notifier']);
}
?>



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

    document.getElementById("key").addEventListener("keyup", function() {
        var nameInput = document.getElementById('key').value;
        if (nameInput != "") {
            document.getElementById('searchSubmit').removeAttribute("disabled");
        } else {
            document.getElementById('searchSubmit').setAttribute("disabled", null);
        }
    });
</script>