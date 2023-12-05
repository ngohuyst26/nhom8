<?php

use Symfony\Component\HttpFoundation\Session\Attribute\NamespacedAttributeBag;

session_start();


require_once 'module-postCate.php';
$posts = new PostCate;


if (isset($_POST['delListID'])) {

    if (isset($_POST['check_list'])) {

        $id = $_POST['check_list'];

        $a = $posts->ccate($id);

        if ($a == 0) {
            $posts->delPostCate($id);

            $_SESSION['notifier'] = ['Xóa Thành Công', 'success'];
        } else {
            $_SESSION['notifier'] = ['1 số danh mục có bài viết !!', 'error'];
        }
    }

    header('location: /admin/?page=categoriesPost&action=list');
}

if (isset($_POST['add'])) {


    if (isset($_POST['name']) && $_POST['name'] !== '') {

        $name = trim($_POST['name']);
        $content = $_POST['content'];
        $slug = $_POST['slug'];

        $checkName =  $posts->getSearchPostCate($name);

        $createCategory = true;
        foreach ($checkName as $check) {
            if (strcasecmp($name, $check['name_category']) == 0) {
                $createCategory = false;
                $_SESSION['notifier'] = ['Đã Có Tên Danh Mục', 'error'];
                break; 
            }
        }

        if ($createCategory) {
            $posts->cretePostCate($name, $slug, $content);
            $_SESSION['notifier'] = ['Thêm Thành Công', 'success'];
        }
    } else {
        $_SESSION['notifier'] = ['Thiếu Tiếu Đề bài Viết', 'error'];
    }



    header('location: ' . $_SERVER['HTTP_REFERER']);
}
if (isset($_POST['edit'])) {

    var_dump($_POST);

    if (isset($_POST['name']) && $_POST['name'] !== '' && isset($_POST['id'])) {
        $name = $_POST['name'];
        $content = $_POST['content'];
        $slug = $_POST['slug'];
        $id = $_POST['id'];
        $posts->updatePostCate($name, $slug, $content, $id);
        $_SESSION['notifier'] = ['Sửa Thành Công', 'success'];
    } else {
        $_SESSION['notifier'] = ['Thiếu Tiếu Đề bài Viết', 'error'];
    }
    header('location: /admin/?page=categoriesPost&action=list');
}
