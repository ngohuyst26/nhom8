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
            case 'add-discount':
                include 'pages/discounts/add-discount.php';
                break;
            case 'edit-discount':
                include 'pages/discounts/edit-discount.php';
                break;
            case 'list-discount':
                include 'pages/discounts/list-discount.php';
                break;
        }
    } else {
        include 'pages/404.php';
    }
}
?>