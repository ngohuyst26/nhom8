<?php

class  review
{
    function GetAllReviewByProductId($product_id)
    {
        $db = new  connect();
        $sql = "SELECT users.name, reviews.id,reviews.content, reviews.rate_value, reviews.rating_msg, reviews.created_at
                FROM reviews
                JOIN users ON reviews.user_id = users.id
                WHERE reviews.product_id = ?";
        return $db->pdo_query($sql, $product_id);
    }

    function ProductReview()
    {
        $db = new  connect();
        $sql = "SELECT  products.id,products.name, COUNT(reviews.id) as total, MAX(reviews.created_at) as new, ROUND(AVG(CAST(reviews.rate_value AS FLOAT)), 1) as rate
                FROM products
                JOIN reviews ON products.id = reviews.product_id
                WHERE products.id = reviews.product_id 
                GROUP BY products.id";
        return $db->pdo_query($sql);
    }

    function DelReview($review_id)
    {
        $db = new  connect();
        $sql = "DELETE FROM reviews WHERE id = ?";
        $db->pdo_execute($sql, $review_id);
    }
}


?>