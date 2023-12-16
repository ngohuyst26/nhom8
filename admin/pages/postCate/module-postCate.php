



<?php

class PostCate  extends connect
{

    public function cretePostCate($name, $slug, $content)
    {
        $time = new DateTime();
        $time = $time->format('Y-m-d H:i:s');
        $sql = "INSERT INTO post_categories(name_category, slug, content, created_at, updated_at) VALUES (?, ?, ?, ?, ?)";
        $conn = new connect();
        $conn->pdo_execute($sql, $name,  $slug, $content, $time, $time);
    }

    public function updatePostCate($name, $slug, $content, $id)
    {
        $sql = "UPDATE post_categories  SET name_category=?, slug=?, content=?, updated_at=NOW()  WHERE id=?";
        $conn = new connect();
        $conn->pdo_execute($sql, $name, $slug,  $content, $id);
    }

    public function ccate($id)
    {
        $connect = new connect();
        $conn = $connect->pdo_get_connection();
        $sql = "SELECT COUNT(*) 
        FROM post_categories as pc
        JOIN posts as p
        ON pc.id  = p.category_id 
        WHERE pc.id = ?";
        $stmt = $conn->prepare($sql);
        if (is_array($id)) {
            $total_records = 0;
            foreach ($id as $id) {
                $stmt->bindParam(1, $id);
                $stmt->execute();
                $total_records += $stmt->fetchColumn();
            }
            return $total_records;
        } else {
            $stmt->bindParam(1, $id);
            $stmt->execute();
            return $stmt->fetchColumn();
        }
    }



    public function delPostCate($id)
    {
        $conn = new connect();
        $sql = "DELETE FROM post_categories WHERE  id=?";
        if (is_array($id)) {
            foreach ($id as $id) {
                $conn->pdo_execute($sql, $id);
            }
        } else {
            $conn->pdo_execute($sql, $id);
        }
    }

    public function getAllPostCate()
    {
        $sql = "SELECT * FROM post_categories ORDER BY id DESC";
        $conn = new connect();
        $a = $conn->pdo_query($sql);
        return $a;
    }

    public function getPostCateByID($id)
    {
        $sql = "SELECT * FROM post_categories WHERE id = ? ";
        $conn = new connect();
        $a = $conn->pdo_query($sql, $id);
        return $a;
    }

    public function countAllPostCate()
    {
        $connect = new connect();
        $conn = $connect->pdo_get_connection();
        $sql = "SELECT COUNT(*)
        FROM post_categories";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $total_records = $stmt->fetchColumn();
        return $total_records;
    }




    public function getSearchPostCate($keyword)
    {
        $sql = "SELECT *
                FROM post_categories
                WHERE name_category LIKE '%$keyword%' 
                ORDER BY id DESC ";
        $conn = new connect();
        $a = $conn->pdo_query($sql);
        return $a;
    }

    public function countSearchPost($keyword)
    {
        $connect = new connect();
        $conn = $connect->pdo_get_connection();
        $sql = "SELECT COUNT(*)
            FROM posts AS p 
                INNER JOIN post_categories AS pc 
                ON p.category_id = pc.id 
                INNER JOIN users AS user
                ON p.user_id = user.id 
                WHERE p.name LIKE '%$keyword%' 
                OR user.name LIKE '%$keyword%' ";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $total_records = $stmt->fetchColumn();
        return $total_records;
    }

    public function countSearchPostCate($keyword, $idCate)
    {
        $connect = new connect();
        $conn = $connect->pdo_get_connection();
        $sql = "SELECT COUNT(*)
            FROM posts AS p 
                INNER JOIN post_categories AS pc 
                ON p.category_id = pc.id 
                INNER JOIN users AS user
                ON p.user_id = user.id 
                WHERE p.category_id = $idCate
                AND p.name LIKE '%$keyword%' 
                OR user.name LIKE '%$keyword%' ";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $total_records = $stmt->fetchColumn();
        return $total_records;
    }
}



?>

