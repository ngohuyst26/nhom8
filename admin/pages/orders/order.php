<?php

class  order
{

    function GetAllOrder()
    {
        $db = new connect();
        $sql = "SELECT id, customer_name, customer_phone, shipping_address, status, total FROM orders ";
        return $db->pdo_query($sql);
    }

    function CheckStatus($status)
    {
        $text = "";
        if ($status == 1) {
            $text = "Chưa thanh toán";
        } elseif ($status == 2) {
            $text = "Thanh toán thành công";
        } elseif ($status == 3) {
            $text = "Đang vận chuyển";
        }
        return $text;
    }

    function GetOrderById($id_order)
    {
        $db = new connect();
        $sql = "SELECT id, customer_name, customer_phone, shipping_address,customer_email, status, total, created_at FROM orders WHERE id = ?";
        return $db->pdo_query_one($sql, $id_order);
    }

    function GetOrderByUser($id_user)
    {
        $db = new connect();
        $sql = "SELECT id, customer_name, customer_phone, shipping_address,customer_email, status, total, created_at FROM orders WHERE user_id = ?";
        return $db->pdo_query($sql, $id_user);
    }

    function GetDetailOrder($id_order)
    {
        $db = new connect();
        $sql = "SELECT order_detail.qty, order_detail.price, order_detail.product_name, order_detail.product_thumbnail
                FROM order_detail
                WHERE order_detail.order_id = ?";
        return $db->pdo_query($sql, $id_order);
    }

    function UpdateOrder($id_order, $customer_name, $customer_phone, $shipping_address, $total, $status)
    {
        $db = new connect();
        $sql = "UPDATE orders as ord 
                SET ord.customer_name = ? , ord.customer_phone = ?, ord.shipping_address = ?, ord.total = ?, ord.status = ?
                WHERE id = ?";
        return $db->pdo_execute($sql, $customer_name, $customer_phone, $shipping_address, $total, $status, $id_order);
    }

    function DelOrder($order_id)
    {
        $db = new connect();
        $sql = "DELETE FROM orders WHERE id = ?;
                DELETE FROM order_detail WHERE order_id = ?";
        return $db->pdo_execute($sql, $order_id, $order_id);
    }

}

?>