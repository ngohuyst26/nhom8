<?php
include_once "decentralization/decentralization_function.php";
$check = decentralization($uri = false);
if (!$check) {
    echo "Bạn không có quyền truy cập vào chức năng này";
    exit;
} else {
    if (isset($_GET['action'])) {
        $action = $_GET['action'];
        switch ($action) {
            case 'add':
                include 'pages/category/add.php';
                break;
            case 'edit':
                include 'pages/category/edit.php';
                break;
            case 'list':
                include 'pages/category/list.php';
                break;
        }
    } else {
        include 'pages/404.php';
    }
}
?>