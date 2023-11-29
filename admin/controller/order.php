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
            case 'order-detail':
                include 'pages/orders/order-detail.php';
                break;
            case 'edit':
                include 'pages/orders/edit.php';
                break;
            case 'list':
                include 'pages/orders/list.php';
                break;
        }
    } else {
        include 'pages/404.php';
    }
}
?>