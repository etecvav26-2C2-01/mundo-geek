<?php

require_once '../../config/database.php';
require_once '../../config/app.php';

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';
$role = $_POST['role'] ?? '';


$sql = "INSERT INTO users (username, password, role)
        Values (:username, :password, :role)";

$stmt = $conn->prepare($sql);

$password_hash = password_hash($password, PASSWORD_DEFAULT);

$stmt->execute([
    ':username' => $username,
    ':password' => $password_hash,
    ':role' => $role
])

?>