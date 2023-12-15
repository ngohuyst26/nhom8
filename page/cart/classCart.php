<?php

class cart
{
    function CheckDiscount($code)
    {
        $db = new connect();
        $sql = "SELECT * FROM `discount` WHERE code LIKE ?";
        $data = $db->pdo_query_one($sql, $code);
        if ($data) {
            $check = [
                'data' => $data,
                'check' => 1,
            ];
            return $check;
        } else {
            $check = [
                'data' => $data,
                'check' => 0,
            ];
            return $check;
        }
    }
}


?>