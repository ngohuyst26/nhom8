<?php
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'list':
            include 'pages/reviews/list.php';
            break;
        case 'detail':
            include 'pages/reviews/review-detail.php';
            break;
    }
} else {
    include 'pages/404.php';
}
?>