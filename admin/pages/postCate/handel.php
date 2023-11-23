<?php


session_start();


require_once 'module-postCate.php';
$posts = new PostCate;


if (isset($_POST['delListID'])) {

    if (isset($_POST['check_list'])) {
        $id = $_POST['check_list'];
        $posts->delPostCate($id);
    }
    header('location: ' . $_SERVER['HTTP_REFERER']);
}

if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $content = $_POST['content'];
    $slug = $_POST['slug'];

    if (isset($_POST['name'])) {
        $posts->cretePostCate($name, $slug, $content);
    }
    header('location: ' . $_SERVER['HTTP_REFERER']);
}
if (isset($_POST['edit'])) {

    var_dump($_POST);

    if (isset($_POST['name']) && isset($_POST['id'])) {
        $name = $_POST['name'];
        $content = $_POST['content'];
        $slug = $_POST['slug'];
        $id = $_POST['id'];
        $posts->updatePostCate($name, $slug, $content, $id);
    }
    header('location: /admin/?page=categoriesPost&action=list');




}


?>