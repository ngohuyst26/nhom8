<?php


if (isset($_GET['action']) && $_GET['action'] == 'blog-detail') {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }
}

$postCate = new PostCate();
$post = new Posts();
$getPostByID = $post->getPostByID($id);

?>

<style>
    .w-900 {
        width: 900px;
        margin: 0 auto;
    }
</style>

<div class="page-wrapper">
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Trang Chủ</a></li>
                <li class="breadcrumb-item"><a href="?action=blog">Bài Viết</a></li>
                <?php foreach ($getPostByID as $post) :  ?>

                    <li class="breadcrumb-item"><a href="?action=blog&categoryid=<?= $post['category_id'] ?>"><?= $post['name_category'] ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= $post['name'] ?></li>
                <?php endforeach ?>
            </ol>
        </div>
    </nav>

    <div class="page-content">
        <div class="container">
            <div class="w-900">

            <div class="row">
                <div class="col-lg-12">

                    <?php foreach ($getPostByID as $post) :  ?>
                        <article class="entry single-entry">
                            <figure class="entry-media">
                                <img src="<?= $post['thumbnail'] ?>" alt="<?= $post['name'] ?>">
                            </figure>

                            <div class="entry-body">
                                <div class="entry-meta">
                                    <span class="entry-author">
                                        by <a href="#"><?= $post['user_name'] ?></a>
                                    </span>
                                    <span class="meta-separator">|</span>
                                    <a href="#"><?= !empty($post['created_at']) ? date('d-m-Y', strtotime($post['created_at'])) : '' ?></a>

                                </div>

                                <h2 class="entry-title">
                                    <?= $post['name'] ?>
                                </h2>

                                <div class="entry-cats">
                                    in <a href="#"><?= $post['name_category'] ?></a>,
                                </div>

                                <div class="entry-content editor-content">
                                    <p href="#"><?= $post['content'] ?></p>
                                </div>

                                <div class="entry-footer row no-gutters flex-column flex-md-row">


                                    <div class="col-md-auto mt-2 mt-md-0">
                                        <div class="social-icons social-icons-color">
                                            <span class="social-label">Share this post:</span>
                                            <a href="#" class="social-icon social-facebook" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                            <a href="#" class="social-icon social-twitter" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                            <a href="#" class="social-icon social-pinterest" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                                            <a href="#" class="social-icon social-linkedin" title="Linkedin" target="_blank"><i class="icon-linkedin"></i></a>
                                        </div><!-- End .soial-icons -->
                                    </div><!-- End .col-auto -->
                                </div><!-- End .entry-footer row no-gutters -->
                            </div><!-- End .entry-body -->


                        </article><!-- End .entry -->


                    <?php endforeach; ?>

                </div>

            </div>

            </div>

        </div>
    </div>

</div>

