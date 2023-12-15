<style>
    .w-900 {
        width: 900px;
        margin: 0 auto;
    }

    .entry-body a {
        color: #333;
    }

    .entry-body a:hover {
        color: blue;
    }
</style>

<div class="container-fluid pt-4 px-4">

    <div class="col-sm-12 mt-3">

        <div class="bg-secondary rounded h-100 p-4">
            <?php

            require_once 'model-post.php';
            $post = new Posts;
            $id = $_GET['id'];
            $post = $post->getPostByID($id);
            foreach ($post as $post) :
            ?>
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="">XEM BÀI VIẾT - <?= $post['name'] ?></h6>

                </div>

                <div class="w-900">
                    <div class="page-wrapper">
                        <div class="row">
                            <div class="col-lg-12">
                                <article class="entry single-entry">
                                    <figure class="entry-media">
                                        <img src="<?= $post['thumbnail'] ?>" alt="<?= $post['name'] ?> " style="width: 100%;">
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
                                    </div><!-- End .entry-body -->


                                </article><!-- End .entry -->

                            </div>

                        </div>
                    </div>

                </div>

            <?php
            endforeach;

            ?>

        </div>
    </div>
</div>