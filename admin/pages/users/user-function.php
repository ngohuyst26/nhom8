<?php
function add_user($user, $email, $password,$sex, $role){
    $connect = new connect();
    $data = "INSERT INTO users(name,email ,password,sex,role) VALUES ('$user','$email','$password','$sex','$role')";
    $connect->pdo_execute($data);
}

function get_all_user(){
    $connect = new connect();
    $data = "SELECT * FROM users";
    $result = $connect->pdo_query($data);
    return $result;
}
function get_user_edit($id){
    $connect = new connect();
    $data = "SELECT * FROM users WHERE id = $id";
    $result = $connect->pdo_query($data);
    return $result;
}

function edit_user($user, $email, $password, $sex, $role)
{
    $connect = new connect();
    $data = "UPDATE users SET name ='$user', email='$email', password='$password', sex='$sex', role= $role WHERE email=  '$email'";
    $connect->pdo_execute($data);
}

function delete_user($id)
{
    $connect = new connect();
    $data = "DELETE FROM users WHERE id = $id";
    $connect = $connect->pdo_query_one($data);
    return $connect;
}

function delete_all($del){
    $connect = new connect();
    $data = "DELETE FROM users WHERE id IN ($del)";
    $connect = $connect->pdo_execute($data);
    return $connect;
}

function GetCount($table)
{
    $connect = new connect();
    $data = "SELECT COUNT(*) FROM $table";
    $connect = $connect->pdo_query_value($data);
    return $connect;
}

function GetuserByCategori($id)
{
    $connect = new connect();
    $data = "SELECT * FROM users WHERE id = '$id'";
    $connect = $connect->pdo_query($data);
    return $connect;
}

function GetDataPage($table, $offset, $limit)
{
    $connect = new connect();
    $data = "SELECT * FROM $table LIMIT $offset, $limit ";
    $connect = $connect->pdo_query($data);
    return $connect;
}

//Tìm kiếm
function search($timkiem)
{
    $connect = new connect();
    $data = "SELECT * FROM users WHERE email LIKE '%".$timkiem."%' ORDER BY id DESC LIMIT 3";
    $connect = $connect->pdo_query($data);
    return $connect;
}

?>