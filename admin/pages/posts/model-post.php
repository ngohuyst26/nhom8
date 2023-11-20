<?php

if (isset($_GET['action'])) {
    include_once '../config/database.php';
} else {
    require_once '../../../config/database.php';
}


class Posts extends connect
{

    public function cretePost($name, $slug, $thumbnail, $content, $user_id, $category_id)
    {
        $time = new DateTime();
        $time = $time->format('Y-m-d H:i:s');
        $sql = "INSERT INTO posts(name, slug, thumbnail, content, user_id, category_id, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $conn = new connect();
        $conn->pdo_execute($sql, $name, $thumbnail, $slug, $content, $user_id, $category_id, $time, $time);
    }

    public function updatePost($name, $slug, $content, $id, $category_id, $user_id)
    {
        $sql = "UPDATE posts SET name=?, slug=?, content=?, category_id=?, user_id = ?, updated_at=NOW()  WHERE id=?";
        $conn = new connect();
        $conn->pdo_execute($sql, $name, $slug, $content, $category_id, $user_id, $id);
    }

    public function updateQuick($name, $slug, $id, $category_id, $user_id)
    {
        $sql = "UPDATE posts SET name=?, slug=?, category_id=?, user_id = ?, updated_at=NOW()  WHERE id=?";
        $conn = new connect();
        $conn->pdo_execute($sql, $name, $slug, $category_id, $user_id, $id);
    }

    public function delPost($id)
    {
        $conn = new connect();

        $sql = "DELETE FROM posts WHERE  id=?";
        if (is_array($id)) {
            foreach ($id as $id) {
                $conn->pdo_execute($sql, $id);
            }
        } else {
            $conn->pdo_execute($sql, $id);
        }
    }

    public function getAllPost()
    {
        $sql = "SELECT p.*, pc.name_category  as name_category, user.name as user_name
                FROM posts AS p 
                INNER JOIN post_categories AS pc 
                ON p.category_id = pc.id 
                INNER JOIN users AS user
                ON p.user_id = user.id 
                WHERE status = 1
                ORDER BY ID DESC
                ";
        $conn = new connect();
        $a = $conn->pdo_query($sql);
        return $a;
    }

    public function getTrashPost()
    {
        $sql = "SELECT p.*, pc.name_category  as name_category, user.name as user_name
                FROM posts AS p 
                INNER JOIN post_categories AS pc 
                ON p.category_id = pc.id 
                INNER JOIN users AS user
                ON p.user_id = user.id 
                WHERE status = 2
                ORDER BY ID DESC
                ";
        $conn = new connect();
        $a = $conn->pdo_query($sql);
        return $a;
    }

    public function getPostCate()
    {
        $sql = "SELECT * FROM post_categories ORDER BY ID DESC";
        $conn = new connect();
        $a = $conn->pdo_query($sql);
        return $a;
    }

    public function getPostByID($id)
    {
        $sql = "SELECT * FROM posts WHERE id = ? ";
        $conn = new connect();
        $a = $conn->pdo_query($sql, $id);
        return $a;
    }

    public function getPostByCate($idCate, $status)
    {
        $sql = "SELECT p.*, pc.name_category  as name_category, user.name as user_name
        FROM posts AS p 
        INNER JOIN post_categories AS pc 
        ON p.category_id = pc.id 
        INNER JOIN users AS user
        ON p.user_id = user.id 
        WHERE p.category_id = $idCate 
        ORDER BY ID DESC";
        $conn = new connect();
        $a = $conn->pdo_query($sql, $idCate);
        return $a;
    }


    public function countAllPost()
    {
        $connect = new connect();
        $conn = $connect->pdo_get_connection();
        $sql = "SELECT COUNT(*)
        FROM posts";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $total_records = $stmt->fetchColumn();
        return $total_records;
    }

    public function countTrashPost()
    {
        $connect = new connect();
        $conn = $connect->pdo_get_connection();
        $sql = "SELECT COUNT(*)
        FROM posts
        WHERE status = 2";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $total_records = $stmt->fetchColumn();
        return $total_records;
    }

    public function updateTranshPost($user_id, $id)
    {
        $conn = new connect();

        $sql = "UPDATE posts SET status=2, user_id=?, updated_at=NOW()  WHERE id=?";

        if (is_array($id)) {
            foreach ($id as $id) {
                $conn->pdo_execute($sql, $user_id, $id);
            }
        } else {
            $conn->pdo_execute($sql, $user_id, $id);
        }
    }

    public function restorePost($id)
    {
        $conn = new connect();

        $sql = "UPDATE posts SET status=1, updated_at=NOW()  WHERE id=?";

        if (is_array($id)) {
            foreach ($id as $id) {
                $conn->pdo_execute($sql, $id);
            }
        } else {
            $conn->pdo_execute($sql, $id);
        }
    }
}


?>

