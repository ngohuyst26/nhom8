<?php
function check_user($email){
    $connect = new connect();
    $select="SELECT * FROM users WHERE email = $email";
    $result = $connect->pdo_query($select);
}
?>