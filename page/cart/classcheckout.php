<?php

class CheckOut
{

    function AddOder($customer_id, $customer_name, $customer_phone, $customer_email, $customer_address, $note, $total)
    {
        $db = new connect();
        $sql = "INSERT INTO orders(user_id, customer_name, customer_phone, customer_email, 	shipping_address, note, total) 
            VALUES(?,?,?,?,?,?,?)";
        $db->pdo_execute($sql, $customer_id, $customer_name, $customer_phone, $customer_email, $customer_address, $note, $total);
    }

    function GetIdOrder($id)
    {
        $db = new connect();
        $sql = "SELECT MAX(id) as last_id FROM orders WHERE user_id = ?";
        return $db->pdo_query_one($sql, $id);
    }

    function AddOderDetail($order_id, $product_id, $product_name, $product_thumbnail, $qty, $total_price)
    {
        $db = new connect();
        $sql = "INSERT INTO order_detail(order_id, product_id, product_name, product_thumbnail, qty, price) 
            VALUES(?,?,?,?,?,?)";
        $db->pdo_execute($sql, $order_id, $product_id, $product_name, $product_thumbnail, $qty, $total_price);
    }

    function reduceDiscount($code)
    {
        $sql = "UPDATE discount SET number_use = number_use - 1 WHERE code LIKE ?";
        pdo_execute($sql, $code);
    }

}

?>