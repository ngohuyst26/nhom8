<?php




// hàm lấy ngày hiện tại 
function getCurrentDate()
{
    return date('d');
}
function getCurrentMouth()
{
    return date('n');
}


function totalOrderByMonth()
{
    $connect = new connect();
    $conn = $connect->pdo_get_connection();
    $month = getCurrentMouth();
    $sql = "SELECT SUM(total)
    FROM orders
    WHERE status = 1
    AND MONTH(created_at) = $month";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $total_records = $stmt->fetchColumn();
    return $total_records;
}

function totalOrderPreByMonth()
{
    $connect = new connect();
    $conn = $connect->pdo_get_connection();
    $month = getCurrentMouth();
    $sql = "SELECT SUM(total)
    FROM orders
    WHERE status = 1
    AND MONTH(created_at) = $month -1 ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $total_records = $stmt->fetchColumn();
    return $total_records;
}


function countOrderByMonth()
{
    $connect = new connect();
    $conn = $connect->pdo_get_connection();
    $month = getCurrentMouth();
    $sql = "SELECT COUNT(*)
    FROM orders
    WHERE MONTH(created_at) = $month ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $total_records = $stmt->fetchColumn();
    return $total_records;
}


function countUserByMonth()
{
    $connect = new connect();
    $conn = $connect->pdo_get_connection();
    $month = getCurrentMouth();
    $sql = "SELECT count(*)
    FROM users
    WHERE MONTH(created_at) = $month ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $total_records = $stmt->fetchColumn();
    return $total_records;
}

function getAllOrder(){
    $conn = new connect();
    $sql = "SELECT * 
    FROM orders 
    ORDER BY id DESC Limit 5";
    return $conn->pdo_query($sql);
}

function countUserByPreMonth()
{
    $connect = new connect();
    $conn = $connect->pdo_get_connection();
    $month = getCurrentMouth();
    $sql = "SELECT count(*)
    FROM users
    WHERE MONTH(created_at) = $month -1 ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $total_records = $stmt->fetchColumn();
    return $total_records;
}
function countAllUser()
{
    $connect = new connect();
    $conn = $connect->pdo_get_connection();
    $month = getCurrentMouth();
    $sql = "SELECT count(*)
    FROM users";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $total_records = $stmt->fetchColumn();
    return $total_records;
}


// đếm đơn hàng tháng all 

function countAllOrder()  {
    $connect = new connect();
    $conn = $connect->pdo_get_connection();
    $sql = "SELECT COUNT(*)
    FROM orders";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $total_records = $stmt->fetchColumn();
    return $total_records;
    
  
  }

  function countPreOrderByMonth()  {
    $connect = new connect();
    $conn = $connect->pdo_get_connection();
    $month = getCurrentMouth();
    $sql = "SELECT COUNT(*)
    FROM orders
    WHERE MONTH(created_at) = $month -1 ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $total_records = $stmt->fetchColumn();
    return $total_records;
    
  
  }
