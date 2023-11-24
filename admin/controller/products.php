<?php
if (isset($_GET['action'])){
    $action = $_GET['action'];
    switch ($action) {
        case 'add':
            include 'pages/products/add.php';
            break;
        case 'add-variants':
            include 'pages/products/add-variants.php';
            break;
        case 'variants':
            include 'pages/products/variants.php';
            break;
        case 'edit':
            include 'pages/products/edit.php';
            break;
        case 'edit-variants':
            include 'pages/products/edit-variants.php';
            break;
        case 'list':
            include 'pages/products/list.php';
            break;
    }
}else{
    include 'pages/404.php';
}
?>