<?php
include_once "decentralization/decentralization_function.php";
$check = decentralization($uri = false);
if (!$check){
    echo "Bạn không có quyền truy cập vào chức năng này";
    exit;
} else {
    if (isset($_GET['action'])) {
        $action = $_GET['action'];
        switch ($action) {
            case 'orders':
                include 'pages/statistical/statisticalOrder.php';
                break;
            case 'products':
                include 'pages/statistical/statitiscalProduct.php';
                break;
            case 'chart':
                include 'pages/statistical/chart.php';
                break;
        }
    } else {
        include 'pages/404.php';
    }
}
?>