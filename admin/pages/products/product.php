<?php

class  product
{


    function GetNameProduct($id)
    {
        $db = new connect();
        $sql = "SELECT name FROM products WHERE id = ?";
        return $db->pdo_query_one($sql, $id);
    }

    function GetNameVariant($id)
    {
        $db = new connect();
        $sql = "SELECT id, name FROM product_variants WHERE product_id= ?
        ORDER BY id";
        return $db->pdo_query($sql, $id);
    }

    function AddVariants($id_product, $variants)
    {
        $db = new connect();
        $sql = "INSERT INTO product_variants (product_id, name) VALUES(?,?)";
        $db->pdo_execute($sql, $id_product, $variants);
    }

    function EditVariants($id, $name)
    {
        $db = new connect();
        $sql = "UPDATE product_variants SET name = ? WHERE id = ? ";
        $db->pdo_execute($sql, $name, $id);
    }

    function EditOption($id, $name)
    {
        $db = new connect();
        $sql = "UPDATE product_variant_options SET name = ? WHERE id = ?";
        $db->pdo_execute($sql, $name, $id);
    }

    function EditSkus($id, $sku, $price)
    {
        $db = new connect();
        $sql = "UPDATE skus SET sku = ?, price = ? WHERE id = ?";
        $db->pdo_execute($sql, $sku, $price, $id);
    }

    function DeleteVariants($id)
    {
        $db = new connect();
        $sql = "DELETE FROM product_variants WHERE id=? ";
        $db->pdo_execute($sql, $id);
    }

    function DeleteOptions($id)
    {
        $db = new connect();
        $sql = "DELETE FROM product_variant_options WHERE id=? ";
        $db->pdo_execute($sql, $id);
    }

    function DeleteSetOptions($id)
    {
        $db = new connect();
        $sql = "DELETE FROM skus_product_variant_options WHERE sku_id = ?; 
        DELETE FROM skus WHERE id = ?;
        ";
        $db->pdo_execute($sql, $id, $id);
    }

    function GetOptionsVariants($id_product)
    {
        $db = new connect();
        $sql = "SELECT pv.id AS variant_id, pv.name AS variant_name, 
        GROUP_CONCAT(pvo.id) AS option_ids, 
        GROUP_CONCAT(pvo.name) AS option_names
        FROM product_variants pv
        JOIN product_variant_options pvo ON pv.id = pvo.product_variant_id
        WHERE pv.product_id = ?
        GROUP BY pv.id, pv.name
        ORDER BY pv.id";
        return $db->pdo_query($sql, $id_product);

    }

    function AddOptionsVariants($variants_id, $option)
    {
        $db = new connect();
        $sql = "INSERT INTO product_variant_options (product_variant_id, name) VALUES (?,?)";
        $db->pdo_execute($sql, $variants_id, $option);
    }


    function AddOptionsSku($id_product, $sku, $price, $options, $variants)
    {
        $db = new connect();

        $sql_sku = "INSERT INTO `skus` (`product_id`, `sku`, `price`) VALUES (?,?,?)";
        $db->pdo_execute($sql_sku, $id_product, $sku, $price);

        $sql_last_sku = "SELECT id FROM skus ORDER BY id DESC LIMIT 1";
        $last_sku = $db->pdo_query_one($sql_last_sku);

        foreach ($options as $index => $key) {

            $variants_id = $variants[$index]['id'];

            $sku_option_variant = "INSERT INTO `skus_product_variant_options` (`sku_id`, `product_variant_id`, `product_variant_options_id`)
            VALUES (?, ?, ?)";

            $db->pdo_execute($sku_option_variant, $last_sku['id'], $variants_id, $key);
        }
    }

    function GetSkuOptions($id_product)
    {
        $db = new connect();
        $sql = "SELECT s.id, s.sku, s.price, GROUP_CONCAT(pvo.name) AS variant_option_names
        FROM skus_product_variant_options spvo
        JOIN product_variant_options pvo ON spvo.product_variant_options_id = pvo.id
        JOIN skus s ON spvo.sku_id = s.id
        WHERE spvo.sku_id IN (SELECT id FROM skus WHERE product_id = ?)
        GROUP BY s.id, s.sku, s.price";
        return $db->pdo_query($sql, $id_product);
    }


    function addProduct($name, $description, $category, $thumbanil)
    {
        $db = new connect();
        $sql = "INSERT INTO products (name ,description,categori_id,thumbnail) VALUES (?,?,?,?)";
        $db->pdo_execute($sql, $name, $description, $category, $thumbanil);
    }

    function addProductDefault($name, $description, $category, $thumbnail, $sku, $price)
    {
        $db = new connect();
        $sql = "INSERT INTO products (name ,description,categori_id,thumbnail) VALUES (?,?,?,?);
                SET @product_id = LAST_INSERT_ID();
                INSERT INTO `skus` (`product_id`, `sku`, `price`) VALUES (@product_id, ?,?);
                ";
        $db->pdo_execute($sql, $name, $description, $category, $thumbnail, $sku, $price);
    }

    function LastProduct()
    {
        $db = new connect();
        $sql = "SELECT id FROM products ORDER BY id DESC LIMIT 1";
        return $db->pdo_query_one($sql);
    }

    function GetAllProduct()
    {
        $db = new connect();
        $sql = "SELECT p.id AS product_id,
               p.name AS product_name,
               p.thumbnail,
               p.categori_id,
               p.categori_id,
               (SELECT s.id FROM skus s WHERE s.product_id = p.id ORDER BY s.id LIMIT 1) AS sku_id,
               (SELECT s.sku FROM skus s WHERE s.product_id = p.id ORDER BY s.id LIMIT 1) AS sku,
               (SELECT s.price FROM skus s WHERE s.product_id = p.id ORDER BY s.id LIMIT 1) AS price
        FROM products p
        WHERE EXISTS (SELECT 1 FROM skus s WHERE s.product_id = p.id) AND del = 0 ;
        ";
        return $db->pdo_query($sql);
    }

    function GetAllProductDraft()
    {
        $db = new connect();
        $sql = "SELECT p.id AS product_id,
                   p.name AS product_name,
                   p.thumbnail,
                   p.categori_id,
                   p.categori_id,
                   (SELECT s.id FROM skus s WHERE s.product_id = p.id ORDER BY s.id LIMIT 1) AS sku_id,
                   (SELECT s.sku FROM skus s WHERE s.product_id = p.id ORDER BY s.id LIMIT 1) AS sku,
                   (SELECT s.price FROM skus s WHERE s.product_id = p.id ORDER BY s.id LIMIT 1) AS price
            FROM products p
            WHERE NOT EXISTS (SELECT 1 FROM skus s WHERE s.product_id = p.id) AND p.del = 0;
        ";
        return $db->pdo_query($sql);
    }

    function GetAllProductDel()
    {
        $db = new connect();
        $sql = "SELECT p.id AS product_id,
               p.name AS product_name,
               p.thumbnail,
               p.categori_id,
               p.categori_id,
               (SELECT s.id FROM skus s WHERE s.product_id = p.id ORDER BY s.id LIMIT 1) AS sku_id,
               (SELECT s.sku FROM skus s WHERE s.product_id = p.id ORDER BY s.id LIMIT 1) AS sku,
               (SELECT s.price FROM skus s WHERE s.product_id = p.id ORDER BY s.id LIMIT 1) AS price
        FROM products p
        WHERE  del = 1 ;
        ";
        return $db->pdo_query($sql);
    }

    function DelProduct($id_product)
    {
        $db = new connect();
        $sql = "UPDATE products SET del = 1 WHERE id = ?";
        $db->pdo_execute($sql, $id_product);
    }

    function UndoProduct($id_product)
    {
        $db = new connect();
        $sql = "UPDATE products SET del = 0 WHERE id = ?";
        $db->pdo_execute($sql, $id_product);
    }

    function GetCategory()
    {
        $db = new connect();
        $sql = "SELECT id, name_category FROM `product_categories`";
        return $db->pdo_query($sql);
    }

    function GetNameCategoryById($id)
    {
        if ($id > 0) {
            $db = new connect();
            $sql = "SELECT name_category FROM `product_categories` WHERE id = ?";
            $name = $db->pdo_query_one($sql, $id);
            return $name['name_category'];
        } else {
            return "Chưa phân loại";
        }
    }

    function CountVariants($product_id)
    {
        $db = new connect();
        $sql = "SELECT COUNT(product_id) FROM product_variants WHERE product_id = ?";
        return $db->pdo_query_value($sql, $product_id);
    }

    function EditProductDefault($id_product, $id_sku, $name, $description, $category, $thumbnail, $sku, $price)
    {
        $db = new connect();
        $sql = "UPDATE products SET name=?, thumbnail=?, description=?, categori_id=? WHERE id=?;
                UPDATE skus SET sku = ?, price= ? WHERE id = ?;
                ";
        $db->pdo_execute($sql, $name, $thumbnail, $description, $category, $id_product, $sku, $price, $id_sku);
    }

    function EditProductVariants($id_product, $name, $description, $category, $thumbnail)
    {
        $db = new connect();
        $sql = "UPDATE products SET name=?, thumbnail=?, description=?, categori_id=? WHERE id=?;
                ";
        $db->pdo_execute($sql, $name, $thumbnail, $description, $category, $id_product);
    }

    function GetOneProduct($id_product)
    {
        $db = new connect();
        $sql = "SELECT p.id AS product_id,
               p.name AS product_name,
               p.thumbnail,
                p.description,
               p.categori_id,
               (SELECT s.id FROM skus s WHERE s.product_id = p.id ORDER BY s.id LIMIT 1) AS sku_id,
               (SELECT s.sku FROM skus s WHERE s.product_id = p.id ORDER BY s.id LIMIT 1) AS sku,
               (SELECT s.price FROM skus s WHERE s.product_id = p.id ORDER BY s.id LIMIT 1) AS price
        FROM products p
        WHERE p.id = ?";
        return $db->pdo_query_one($sql, $id_product);
    }

    function SearchProduct($search)
    {
        $db = new connect();
        $sql = "SELECT p.id AS product_id,
               p.name AS product_name,
               p.thumbnail,
               p.categori_id,
               p.categori_id,
               (SELECT s.id FROM skus s WHERE s.product_id = p.id ORDER BY s.id LIMIT 1) AS sku_id,
               (SELECT s.sku FROM skus s WHERE s.product_id = p.id ORDER BY s.id LIMIT 1) AS sku,
               (SELECT s.price FROM skus s WHERE s.product_id = p.id ORDER BY s.id LIMIT 1) AS price
        FROM products p
        WHERE EXISTS (SELECT 1 FROM skus s WHERE s.product_id = p.id) AND p.name LIKE '%$search%' ";
        return $db->pdo_query($sql);
    }

    function GetProductByCategory($category_id)
    {
        $db = new connect();
        $sql = "SELECT p.id AS product_id,
               p.name AS product_name,
               p.thumbnail,
               p.categori_id,
               p.categori_id,
               (SELECT s.id FROM skus s WHERE s.product_id = p.id ORDER BY s.id LIMIT 1) AS sku_id,
               (SELECT s.sku FROM skus s WHERE s.product_id = p.id ORDER BY s.id LIMIT 1) AS sku,
               (SELECT s.price FROM skus s WHERE s.product_id = p.id ORDER BY s.id LIMIT 1) AS price
        FROM products p
        WHERE EXISTS (SELECT 1 FROM skus s WHERE s.product_id = p.id) AND p.categori_id = ? ";
        return $db->pdo_query($sql, $category_id);
    }

    function ValidateProductDefault($name, $description, $sku, $price, $ckfinder, $thumbnail)
    {
        $check = false;
        //Bắt lỗi rổng tên sản phẩm
        if (empty($name)) {
            $_SESSION['name'] = 1;
            $check = true;
        }
        //Bắt lỗi rổng mô tả
        if (empty($description)) {
            $_SESSION['description'] = 1;
            $check = true;
        }
        // Bắt lỗi rỗng giá
        if (empty($price)) {
            $_SESSION['price'] = 1;
            $check = true;
        }
        //Bắt lổi giá bé hơn 0
        if ($price <= 0) {
            $_SESSION['price'] = 2;
            $check = true;
        }
        //Bắt lỗi không phải số
        if (!is_numeric($price)) {
            $_SESSION['price'] = 3;
            $check = true;
        }

        if (empty($sku)) {
            $_SESSION['sku'] = 1;
            $check = true;
        }
        //Bắt lỗi chưa chọn hình ảnh
        if (empty($ckfinder) && $thumbnail == 0) {
            $_SESSION['thumbnail'] = 1;
            $check = true;
        }
        return $check;
    }

    function ValidateProductVariants($name, $description, $ckfinder, $thumbnail)
    {
        $check = false;
        //Bắt lỗi rổng tên sản phẩm
        if (empty($name)) {
            $_SESSION['name'] = 1;
            $check = true;
        }
        //Bắt lỗi rổng mô tả
        if (empty($description)) {
            $_SESSION['description'] = 1;
            $check = true;
        }
        //Bắt lỗi chưa chọn hình ảnh
        if (empty($ckfinder) && $thumbnail == 0) {
            $_SESSION['thumbnail'] = 1;
            $check = true;
        }
        return $check;
    }

    function CheckSetOption($id_option)
    {
        $db = new connect();
        $sql = "SELECT COUNT(*) AS product_variant_options
                FROM skus_product_variant_options
                WHERE product_variant_options_id = ?";
        return $db->pdo_query_value($sql, $id_option);
    }

    function CheckOptions($id_variants)
    {
        $db = new connect();
        $sql = "SELECT COUNT(*) AS product_options
                FROM product_variant_options
                WHERE product_variant_id = ?";
        return $db->pdo_query_value($sql, $id_variants);
    }

    function CheckVariants($id_product)
    {
        $db = new connect();
        $sql = "SELECT COUNT(*) AS variants
                FROM product_variants
                WHERE product_id = ?";
        return $db->pdo_query_value($sql, $id_product);
    }

    function CheckSku($id_product)
    {
        $db = new connect();
        $sql = "SELECT COUNT(*) AS sku
                FROM skus
                WHERE product_id = ?";
        return $db->pdo_query_value($sql, $id_product);
    }

    function DelProductVari($id_product)
    {
        $db = new connect();
        $sql = "DELETE FROM products WHERE id = ?";
        $db->pdo_execute($sql, $id_product);
    }

    function DelProductDef($id_product)
    {
        $db = new connect();
        $sql = "DELETE FROM skus WHERE product_id = ?;
                DELETE FROM products WHERE id = ?";
        $db->pdo_execute($sql, $id_product, $id_product);
    }
}


?>