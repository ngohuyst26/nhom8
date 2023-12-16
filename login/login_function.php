<?php
function login($email){
    $connect = new connect();
    $sql = "SELECT * FROM users WHERE email = ?";
    $connect->pdo_query($sql,$email);
}

function forgot($newpassword,$email){
    $connect = new connect();
    $sql = "UPDATE users SET password = ? WHERE email = ?";
    try{
        $data = $connect->pdo_execute($sql, $newpassword,$email);
        $_SESSION['chk'] = 1;
    } catch(customException $e){
        $_SESSION['chk'] = 2;
    }
    return $data;
}

function create($name,$email, $mahoa, $sex , $role,$address){
    $connect = new connect();
    $sql = "INSERT INTO users(name,email ,password,sex,role,address) VALUES (?,?,?,?,?,?)";
        try{
            $connect->pdo_execute($sql, $name, $email, $mahoa,$sex,$role,$address);
            $_SESSION['tb'] = 1;
        } catch (customException $e){
            $_SESSION['tb'] = 2;
        }
}
?>