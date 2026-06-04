<?php

require_once '../includes/auth.php';
require_once '../includes/header.php';
require_once '../includes/navbar.php';
require_once '../../config/database.php';

$sql = "SELECT id, name, description, price, stock, created_at, height, weight, width, length
        FROM products
        ORDER BY name ASC";
$stmt = $conn->prepare($sql);
$stmt->execute();

$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($products as $item){
    echo $item['id'];
    echo $item['name'];
    echo $item['description'];
    echo $item['price'];
    echo $item['stock'];
    echo $item['created_at'];
    echo $item ['height'];
    echo $item['weight'];
    echo $item['width'];
    echo $item['length'];
}

require_once "../includes/footer.php";
?>
