<?php
if (isset($_GET['action'])){
    $action = $_GET['action'];
    switch($action){
        case 'add':
            include 'pages/posts/add.php';
            break;
        case 'edit':
            include 'pages/posts/edit.php';
            break;
        case 'list':
            include 'pages/posts/list.php';
            break;
    }
}else{
    include 'pages/404.php';
}
?>