<?php

require_once __DIR__ . '/../../config/app.php';
require_once __DIR__ . '/../../config/database.php';

require_once __DIR__ . '/../../includes/auth.php';
require_once __DIR__ . '/../../includes/auth-admin.php';

require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/navbar.php';

if (isset($_POST['btn-edit'])) {
        
        $id = $_GET['id'];

        $name = trim($_POST['name']) ?? '';
        $description = trim($_POST['description']) ?? '';
        $price = trim($_POST['price'] ?? '');
        $stock = trim($_POST['stock']) ?? '';
        $height = trim($_POST['height']) ?? '';
        $weight = trim ($_POST['weight']) ?? '';
        $width = trim($_POST['width']) ?? '';
        $length = trim ($_POST['length']) ?? '';

        
        $sql = "UPDATE products SET  name = :name, description = :description, price = :price, stock =: stock, weight =: weight, height = :height, width =: width, length = :length WHERE id = :id";
        $stmt = $conn->prepare($sql);

        $stmt->execute([
        ':name' => $name,
        ':description' => $description,
        ':price' => $price,
        ':stock' => $stock,
        ':weight' => $weight,
        ':height' => $height,
        ':width' => $width,
        ':length' => $length,
        ':id' => $id
        ]);
}

if (isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "SELECT * FROM PRODUCTS WHERE id = :id";
    $stmt = $conn->prepare($sql);
    
    $stmt->execute([
        ':id' => $id
    ]);


    $product = $stmt -> fetch(PDO::FETCH_ASSOC);
}

?>

<main class="container py-4">

    <section class="mb-4">
        <h1 class="fw-bold mb-1"><?= $text['new_product'] ?></h1>
        <p class="text-muted mb-0"><?= $text['create_product'] ?></p>
    </section>

    <section class="card tf-card">
        <div class="card-body">
            <form method = "post" enctype = "multipart/form-data">
                <div class="mb-3">
                    <label for="name" class="form-label"><?= $text['name'] ?></label>
                    <input type="text" class="form-control" id="name" name = "name" aria-describedby="name" value="<?= $product['name'] ?>">
                <div id="nameHelp" class="form-text"></div>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label"><?= $text['description'] ?></label>
                    <input type="text" class="form-control" id="description" name = "description" value ="<?= $product['description']  ?>">
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label"><?= $text['price'] ?></label>
                    <input class="form-control" type="number" id="price" name = "price" step ="0.01" min = "0" value="<?= $product['price'] ?>">
                </div>
                <div class="mb-3">
                    <label for="stock" class="form-label"><?= $text['stock'] ?></label>
                    <input class="form-control" type="number" id="stock" name = "stock" min = "0" value="<?= $product['stock'] ?>">
                </div>
                <div class="mb-3">
                    <label for="height" class="form-label"><?= $text['height'] ?></label>
                    <input class="form-control" type="number" id="height" name = "height" min = "0" step="0.001" value="<?= $product['height'] ?>">
                </div>
                <div class="mb-3">
                    <label for="weight" class="form-label"><?= $text['weight'] ?></label>
                    <input class="form-control" type="number" id="weight" name = "weight" min = "0" step="0.001" value="<?= $product['weight'] ?>" >
                </div>
                <div class="mb-3">
                    <label for="width" class="form-label"><?= $text['width'] ?></label>
                    <input class="form-control" type="number" id="width" name = "width" min = "0" step="0.001"  value="<?= $product['width'] ?>">
                </div>
                <div class="mb-3">
                    <label for="length" class="form-label"><?= $text['length'] ?></label>
                    <input class="form-control" type="number" id="length" name = "length" min = "0" step="0.001"  value="<?= $product['length'] ?>">
                </div>
                <button type="submit" class="btn btn-primary btn-edit"><?= $text['submit'] ?></button>
            </form>
        </div>
    </section>
</main>
<?php 
require_once __DIR__ . '/../../includes/footer.php';
?>
