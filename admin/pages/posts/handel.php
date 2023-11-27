<?php


require_once 'model-post.php';
$posts = new Posts;


function upload_image($file)
{

    $originalName = basename($file['name']);
    $tempName = $file['tmp_name'];
    $imageFileType = pathinfo($originalName, PATHINFO_EXTENSION);


    // check duoi anh 
    $allowedImageExtensions = array('jpg', 'jpeg', 'png', 'gif');
    if (in_array($imageFileType, $allowedImageExtensions)) {

        // Check if the file is too large.
        $maxFilesize = 1024 * 1024 * 10; // 10 MB

        if ($file['size'] > $maxFilesize) {
            echo "The file is too large.";
        } else {
            $folder_name = "../../../upload-img/" . date('Y') . "/" . date('m');
            if (!is_dir($folder_name)) {
                mkdir($folder_name, 0777, true);
            }
            // Generate a new name for the image.
            $imageName = uniqid() . '.' . $imageFileType;

            // duong dan anh 
            $imagr_url = $folder_name . '/' . $imageName;

            // Move the file to the new directory.
            move_uploaded_file($tempName, $imagr_url);

            return $imagr_url;
        }
    }
    // Return the to the image.
    return $imagr_url = '';
}

if (isset($_POST['add'])) {

    if (isset($_POST['name']) && $_POST['name'] != '') {
        $name = $_POST['name'];
        $slug = str_replace(" ", "-", $name);
        $category_id = $_POST['category_id'];

        $thumbnail = upload_image($_FILES['thumbnail']);
        $content = $_POST['content'];
        $posts->cretePost($name, $thumbnail, $slug, $content, 1, 1, $category_id);
    }


    header('location: /admin/?page=posts&action=list');
}
if (isset($_POST['addNote'])) {

    if (isset($_POST['name']) && $_POST['name'] != '') {
        $name = $_POST['name'];
        $slug = str_replace(" ", "-", $name);
        $category_id = $_POST['category_id'];

        $thumbnail = upload_image($_FILES['thumbnail']);
        $content = $_POST['content'];
        $posts->cretePost($name, $thumbnail, $slug, $content, 3, 1, $category_id);
    }

    header('location: /admin/?page=posts&action=list');
}

if (isset($_POST['delListID'])) {
    $id = $_POST['check_list'];
    $posts->delPost($id);
    header('location: ' . $_SERVER['HTTP_REFERER']);
}

if (isset($_POST['edit'])) {

    if (isset($_POST['name']) && $_POST['name'] != '') {
        $id = $_POST['id'];

        $name = $_POST['name'];
        $slug = $_POST['slug'];
        $old_img = $posts->getImagePost($id);
        if (!$_FILES['thumbnail']['size'] > 0) {
            $thumbnail = $old_img['thumbnail'];
        } else {
            $thumbnail = upload_image($_FILES['thumbnail']);
        }
        $content = $_POST['content'];
        $category_id = $_POST['category_id'];
        $posts->updatePost($name, $slug, $content, $thumbnail, $id, $category_id, 1);
    }

    header('location: /admin/?page=posts&action=list');
}

if (isset($_POST['quick-update'])) {

    if (isset($_POST['name']) && $_POST['name'] != '') {
        $name = $_POST['name'];
        $slug = $_POST['slug'];
        $category_id = $_POST['category_id'];
        $id = $_POST['id'];
        $posts->updateQuick($name, $slug, $id, $category_id, 1);
    }

    header('location: ' . $_SERVER['HTTP_REFERER']);
}

if (isset($_POST['noteListID'])) {
    echo "<pre>";
    var_dump($_POST);
    $id = $_POST['check_list'];
    $posts->updateNotePost($id);
    header('location: ' . $_SERVER['HTTP_REFERER']);
}

if (isset($_POST['trashListID'])) {
    $id = $_POST['check_list'];
    $posts->updateTranshPost(1, $id);
    header('location: ' . $_SERVER['HTTP_REFERER']);
}

if (isset($_POST['restore'])) {
    $id = $_POST['check_list'];
    $posts->restorePost($id);
    header('location: /admin/?page=posts&action=list');
}

if (isset($_POST['publishPost'])) {
    $id = $_POST['check_list'];
    $posts->restorePost($id);
    header('location: /admin/?page=posts&action=list');
}
