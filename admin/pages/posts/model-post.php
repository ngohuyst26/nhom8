<?php

class Posts extends connect
{

    public function cretePost($name, $slug, $thumbnail, $content, $status, $user_id, $category_id)
    {
        $time = new DateTime();
        $time = $time->format('Y-m-d H:i:s');
        $sql = "INSERT INTO posts(name, slug, thumbnail, content, status, user_id, category_id, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $conn = new connect();
        $conn->pdo_execute($sql, $name, $thumbnail, $slug, $content, $status, $user_id, $category_id, $time, $time);
    }

    public function updatePost($name, $slug, $content, $thumbnail, $id, $category_id, $user_id)
    {
        $sql = "UPDATE posts SET name=?, slug=?, content=?, thumbnail=?, category_id=?, user_id = ?, updated_at=NOW()  WHERE id=?";
        $conn = new connect();
        $conn->pdo_execute($sql, $name, $slug, $content, $thumbnail, $category_id, $user_id, $id);
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

    public function getAllPost($offset, $limit)
    {
        $sql = "SELECT p.*, pc.name_category  as name_category, user.name as user_name
                FROM posts AS p 
                INNER JOIN post_categories AS pc 
                ON p.category_id = pc.id 
                INNER JOIN users AS user
                ON p.user_id = user.id 
                WHERE status = 1
                ORDER BY ID DESC 
                LIMIT $offset, $limit
                ";
        $conn = new connect();
        $a = $conn->pdo_query($sql);
        return $a;
    }
   
    public function getPostByStatus( $status ,$offset, $limit)
    {
        $sql = "SELECT p.*, pc.name_category  as name_category, user.name as user_name
                FROM posts AS p 
                INNER JOIN post_categories AS pc 
                ON p.category_id = pc.id 
                INNER JOIN users AS user
                ON p.user_id = user.id 
                WHERE status = $status
                ORDER BY ID DESC
                LIMIT $offset, $limit

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

    public function getPostByID($id)
    {
        $sql = "SELECT p.*, pc.name_category  as name_category, user.name as user_name
        FROM posts AS p 
        INNER JOIN post_categories AS pc 
        ON p.category_id = pc.id 
        INNER JOIN users AS user
        ON p.user_id = user.id 
        WHERE p.id = ? ";
        $conn = new connect();
        $a = $conn->pdo_query($sql, $id);
        return $a;
    }

    public function getPostByCate($idCate, $status,$offset , $limit)
    {
        $sql = "SELECT p.*, pc.name_category  as name_category, user.name as user_name
        FROM posts AS p 
        INNER JOIN post_categories AS pc 
        ON p.category_id = pc.id 
        INNER JOIN users AS user
        ON p.user_id = user.id 
        WHERE p.category_id = $idCate 
        AND p.status = $status
        ORDER BY p.id DESC
        LIMIT $offset,  $limit
        ";
        $conn = new connect();
        $a = $conn->pdo_query($sql, $idCate, $status);
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

    public function countPostByStatus($status)
    {
        $connect = new connect();
        $conn = $connect->pdo_get_connection();
        $sql = "SELECT COUNT(*)
        FROM posts
        WHERE status = $status";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $total_records = $stmt->fetchColumn();
        return $total_records;
    }
    
    public function updateStatusPost($status, $id)
    {
        $conn = new connect();

        $sql = "UPDATE posts SET status= ?, updated_at=NOW()  WHERE id=?";

        if (is_array($id)) {
            foreach ($id as $id) {
                $conn->pdo_execute($sql, $status, $id);
            }
        } else {
            $conn->pdo_execute($sql, $status, $id);
        }
    }


    public function countPostCate($idCate, $status)
    {
        $connect = new connect();
        $conn = $connect->pdo_get_connection();
        $sql = "SELECT COUNT(*)
        FROM posts
        WHERE category_id = $idCate
        AND status = $status";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $total_records = $stmt->fetchColumn();
        return $total_records;
    }

    public function getImagePost($id)
    {
        $sql = "SELECT thumbnail FROM posts WHERE id = ?";
        $conn = new connect();
        $a = $conn->pdo_query_one($sql, $id);
        return $a;
    }

    public function getSearchPost($keyword, $offset, $limit)
    {
        $sql = "SELECT p.*, pc.name_category  as name_category, user.name as user_name
                FROM posts AS p 
                INNER JOIN post_categories AS pc 
                ON p.category_id = pc.id 
                INNER JOIN users AS user
                ON p.user_id = user.id 
                WHERE p.name LIKE '%$keyword%' 
                OR user.name LIKE '%$keyword%'
                ORDER BY p.id DESC
                LIMIT $offset, $limit

                ";
        $conn = new connect();
        $a = $conn->pdo_query($sql);
        return $a;
    }

    public function getSearchPostCate($keyword, $idCate, $offset, $limit)
    {
        $sql = "SELECT p.*, pc.name_category  as name_category, user.name as user_name
                FROM posts AS p 
                INNER JOIN post_categories AS pc 
                ON p.category_id = pc.id 
                INNER JOIN users AS user
                ON p.user_id = user.id 
                WHERE p.category_id = $idCate
                AND p.name LIKE '%$keyword%' 
                OR user.name LIKE '%$keyword%'
                ORDER BY p.id DESC
                LIMIT $offset, $limit

                ";
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

