

<?php

if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'add':
            include 'pages/postCate/add.php';
            break;
        case 'edit':
            include 'pages/postCate/edit.php';
            break;
        case 'list':
            include 'pages/postCate/list.php';
            break;
    }
} else {
    include 'pages/404.php';
}
?>



