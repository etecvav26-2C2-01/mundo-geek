<?php

require_once '../../config/database.php';
require_once '../../config/app.php';

$name = trim($_POST['name']) ?? '';
$description = trim($_POST['description']) ?? '';
$price = trim($_POST['price'] ?? '');
$stock = trim($_POST['stock']) ?? '';
$height = trim($_POST['height']) ?? '';
$weight = trim ($_POST['weight']) ?? '';
$width = trim($_POST['width']) ?? '';
$length = trim ($_POST['length']) ?? '';

$image = null;

if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {

    $uploadDir = '../../assets/uploads/products/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    $originalName = $_FILES['image']['name'];
    $temporaryPath = $_FILES['image']['tmp_name'];
    $fileExtension = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));

    $allowedExtensions = ['jpg', 'jpeg', 'png', 'webp'];

    if (!in_array($fileExtension, $allowedExtensions)) {
        header('Location: create.php?error=invalid_image');
        exit;
    }

    $imageName = uniqid('product_', true) . '.' . $fileExtension;
    $destinationPath = $uploadDir . $imageName;

    if(move_uploaded_file($temporaryPath, $destinationPath)){
        $image = $imageName;
    }
}

$sql = "INSERT INTO products ( name, description, image, stock, weight, height, width, length)
        Values (:name, :description, :image, :stock, :weight, :height, :width, :length)";

$stmt = $conn->prepare($sql);

$stmt->execute([
    ':name' => $name,
    ':description' => $description,
    ':image' => $image,
    ':stock' => $stock,
    ':weight' => $weight,
    ':height' => $height,
    ':width'  => $width,
    ':length' => $length
]);

header('location: index.php');
?>