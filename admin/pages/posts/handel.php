<?php


require_once 'model-post.php';
$posts = new Posts;


function upload_image($file) {
    
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
            $folder_name = "../../../upload-img/". date('Y'). "/" . date('m');
            if(!is_dir($folder_name)) {
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

    $name = $_POST['name'];
    $slug = str_replace(" ", "-", $name);
    $category_id = $_POST['category_id'];

    $thumbnail = upload_image($_FILES['thumbnail']);
    $content = $_POST['content'];
    $posts->cretePost($name, $thumbnail, $slug, $content, 1, $category_id);
    header('location: /admin/?page=posts&action=list');
}

if (isset($_POST['del'])) {
    $id = $_POST['id'];
    $posts->delPost($id);
    header('location: /admin/?page=posts&action=list');
}

if (isset($_POST['edit'])) {

    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $content = $_POST['content'];
    $category_id = $_POST['category_id'];
    $id = $_POST['id'];
    $posts->updatePost($name, $slug, $content, $id, $category_id, 1);
    header('location: /admin/?page=posts&action=list');

   
}
if (isset($_POST['quick-update'])) {

    var_dump($_POST);

    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $category_id = $_POST['category_id'];
    $id = $_POST['id'];
    $posts->updateQuick($name, $slug, $id, $category_id, 1);
    header('location: /admin/?page=posts&action=list');

   
}

if(isset($_POST['listID'])) {
    echo "<pre>";
    var_dump($_POST);

    // if(!empty($_POST['check_list'])) {
    //     foreach($_POST['check_list'] as $check) {
    //             echo $check; //echoes the value set in the HTML form for each checked checkbox.
    //                          //so, if I were to check 1, 3, and 5 it would echo value 1, value 3, value 5.
    //                          //in your case, it would echo whatever $row['Report ID'] is equivalent to.
    //     }
    // }
}

?>
