<?php

$postCate = new PostCate();
$post = new Posts();
$categories = $postCate->getAllPostCate();
$postPopular = $post->getAllPost(0, 5);

if (isset($_GET['categoryid'])) {
    $id = $_GET['categoryid'];
    $getAllPost = $post->getPostByCate($id, 1, 0, 100);
    $nameCate = $postCate->getPostCateByID($id);
} else {
    $getAllPost = $post->getAllPost(0, 100);
}

?>

<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
    <div class="container">
        <h1 class="page-title">Bài Viết</h1>

        <?php if (isset($_GET['categoryid'])) :
                foreach ($nameCate as $nametitle) :
            ?>
                    <span class="breadcrumb-item"><a href="?action=blog"><?= $nametitle['name_category'] ?></a></span>
                <?php endforeach; ?>
            <?php endif; ?>
    </div>
</div>


<nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Trang Chủ</a></li>
            <li class="breadcrumb-item"><a href="?action=blog">Bài Viết</a></li>
            <?php if (isset($_GET['categoryid'])) :
                foreach ($nameCate as $nameCate) :
            ?>
                    <li class="breadcrumb-item"><a href="?action=blog"><?= $nameCate['name_category'] ?></a></li>
                <?php endforeach; ?>
            <?php endif; ?>
        </ol>
    </div><!-- End .container -->
</nav><!-- End .breadcrumb-nav -->

<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <?php
                foreach ($getAllPost as $post) :
                ?>
                    <article class="entry">
                        <figure class="entry-media">
                            <a href="?action=blog-detail&id=<?= $post['id'] ?>">
                                <img src="<?= $post['thumbnail'] ?>" alt="<?= $post['name'] ?>">
                            </a>
                        </figure>

                        <div class="entry-body">
                            <div class="entry-meta">
                                <span class="entry-author">
                                    by <a href="#"><?= $post['user_name'] ?></a>
                                </span>
                                <span class="meta-separator">|</span>
                                <a href="#"><?= !empty($post['created_at']) ? date('d-m-Y', strtotime($post['created_at'])) : '' ?></a>
                                <span class="meta-separator">|</span>
                            </div><!-- End .entry-meta -->

                            <h2 class="entry-title">
                                <a href="?action=blog-detail&id=<?= $post['id'] ?>"><?= $post['name'] ?></a>
                            </h2><!-- End .entry-title -->

                            <div class="entry-cats">
                                in <a href="?action=blog&categoryid=<?= $post['category_id'] ?>"><?= $post['name_category'] ?></a>
                            </div><!-- End .entry-cats -->

                            <div class="entry-content">
                                <a href="?action=blog-detail&id=<?= $post['id'] ?>" class="read-more">Tiếp tục xem</a>
                            </div><!-- End .entry-content -->
                        </div><!-- End .entry-body -->
                    </article><!-- End .entry -->


                <?php endforeach ?>


            </div><!-- End .col-lg-9 -->

            <aside class="col-lg-3">
                <div class="widget widget-cats">
                    <h3 class="widget-title">Danh Mục Bài Viết</h3><!-- End .widget-title -->

                    <ul>
                        <?php
                        foreach ($categories as $cate) :
                        ?>
                            <li><a href="?action=blog&categoryid=<?= $cate['id'] ?>"><?= $cate['name_category'] ?></a></li>

                        <?php endforeach ?>
                    </ul>
                </div><!-- End .widget -->

                <div class="widget">
                    <h3 class="widget-title">Bài Viết Phổ Biến</h3><!-- End .widget-title -->

                    <ul class="posts-list">

                        <?php 
                          foreach ($postPopular as $postPopular) :
                        ?>
                        <li>
                            <figure>
                                <a href="?action=blog-detail&id=<?= $postPopular['id'] ?>">
                                    <img src="<?= $postPopular['thumbnail'] ?>" alt="<?= $postPopular['name'] ?>">
                                </a>
                            </figure>

                            <div>
                                <span><?= !empty($postPopular['created_at']) ? date('d-m-Y', strtotime($postPopular['created_at'])) : '' ?></span>
                                <h4><a href="#"><?= $postPopular['name'] ?></a></h4>
                            </div>
                        </li>

                        <?php endforeach ?>


                    </ul>
                </div>


        </div><!-- End .sidebar -->
        </aside><!-- End .col-lg-3 -->
    </div><!-- End .row -->
</div><!-- End .container -->
</div><!-- End .page-content -->
