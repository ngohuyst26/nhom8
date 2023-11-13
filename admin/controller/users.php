<?php
if (isset($_GET['action'])){
    $action = $_GET['action'];
    switch($action){
        case 'add':
            include 'pages/users/add-user.php';
            break;
        case 'edit':
            include 'pages/users/edit-user.php';
            break;
        case 'list':
            include 'pages/users/list-user.php';
            break;
    }
}else{
    include 'pages/404.php';
}
?>