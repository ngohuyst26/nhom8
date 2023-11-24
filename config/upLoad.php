<?php

class  upLoad
{
    function uploadImg($uploadedFile)
    {
        $imagePath = "";
        if (isset($uploadedFile)) {
            // Kiểm tra xem có lỗi xảy ra không
            if ($uploadedFile["error"] === UPLOAD_ERR_OK) {
                $tempName = $uploadedFile["tmp_name"];
                // Xác định tên file mới
                $originalName = basename($uploadedFile["name"]);
                $extension = pathinfo($originalName, PATHINFO_EXTENSION);
                $newFileName = uniqid() . "_" . $originalName; // Thêm một giá trị duy nhất vào tên file

                // Thư mục lưu trữ ảnh
                $uploadDir = "../view/img/";

                // Di chuyển file ảnh đến thư mục lưu trữ
                if (move_uploaded_file($tempName, $uploadDir . $newFileName)) {
                    // Trả về đường dẫn ảnh mới
                    $imagePath = "http://duanone.php/view/img/" . $newFileName;
                } else {
                    echo "Có lỗi xảy ra khi lưu trữ file ảnh.";
                }
            } else {
                echo "Có lỗi xảy ra trong quá trình upload ảnh.";
            }
            return $imagePath;
        }
    }

}

?>