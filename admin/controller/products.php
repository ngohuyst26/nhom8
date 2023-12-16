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
        case 'draft':
            include 'pages/products/draft.php';
            break;
        case 'del':
            include 'pages/products/del.php';
            break;
    }
}else{
    include 'pages/404.php';
}
?>
<script>
    $(document).ready(function () {

        $('#search').on('keyup', function (e) {
            e.preventDefault();
            console.log($(this).val());
            $.ajax({
                url: 'pages/products/search.php',
                type: 'POST',
                data: {
                    search: $(this).val()
                }
            }).done(function (ketqua) {
                $('#value').html(ketqua);
            });

        });
    });
</script>