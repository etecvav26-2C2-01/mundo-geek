<?php

require_once __DIR__ . '/../../config/app.php';
require_once __DIR__ . '/../../config/database.php';

require_once __DIR__ . '/../../includes/auth.php';
require_once __DIR__ . '/../../includes/auth-admin.php';

require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/navbar.php';

if(isset($_GET)){
    $id = $_GET['id'];
}else{
    header ("Location: index.php");
    exit;
}

if($id != ''){
    $sql = 'DELETE FROM products WHERE id = :id';
    
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':id' => $id
    ]);

    header ("Location: index.php");
    exit;
}else{
    header ("Location: index.php");
    exit;
}
