<!-- ckedit  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>

<style>
    .cke_inner, .cke_contents {
        min-height: 950px;
    }
    .cke_reset,
    .cke_top,
    .cke_bottom,
    .cke_reset_all {
        border-radius: 12px;
    }
</style>

<?php


if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'add':
            include 'pages/posts/add.php';
            break;
        case 'edit':
            include 'pages/posts/edit.php';
            break;
        case 'list':
            include 'pages/posts/list.php';
            break;
        case 'view':
            include 'pages/posts/view.php';
            break;
    }
} else {
    include 'pages/404.php';
}
?>


<script>
    CKEDITOR.replace('content');
    CKEDITOR.replace('detail_content');
</script>


