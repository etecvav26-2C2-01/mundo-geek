<?php

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../config/app.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/navbar.php';

$id = $_GET['id'];

$sql = "SELECT *
        FROM products
        WHERE id = :id";

$stmt = $conn->prepare($sql);
$stmt->execute([
    ':id' => $id
]);

$product = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<main class="container min-vh-100 d-flex align-items-center justify-content-center py-4">
    <section class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-8 w-100">
            <div class="card-produto card">
                <?php if (!empty($product['image'])): ?>
                    <img src="<?= BASE_URL ?>/assets/uploads/products/<?= htmlspecialchars($product['image']) ?>" class="card-img-top">

                <?php else: ?>
                    <p class="card-text">
                        <?= $text['no_image_set_to_this_product'] ?>
                    </p>
                <?php endif; ?>

                <div class="card-body card-produto-body">
                    <h5 class="card-title">
                        <?= htmlspecialchars($product['name']) ?>
                    </h5>
                    <p class="card-text">
                        R$ <?= htmlspecialchars($product['price']) ?>
                    </p>
                    <p class="card-text">
                        <?= htmlspecialchars($product['description']) ?>
                    </p>
                    <p class="card-text fw-bold">
                        <?= $text['dimensions'] ?>
                    </p>
                    <p class="card-text">
                        <?= $text['height'] ?> <?= $product['height'] ?> cm
                    </p>
                    <p class="card-text">
                        <?= $text['width'] ?> <?= $product['width'] ?> cm
                    </p>
                    <p class="card-text">
                        <?= $text['weight'] ?> <?= $product['weight'] ?> kg
                    </p>

                    <div class="container card-produto-botao text-center">
                        <a href="cart.php?add=<?= $product['id'] ?>" class="btn btn-primary w-100 text-nowrap">
                            <?= $text['add_to_cart'] ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php require_once __DIR__ . '/../includes/footer.php'; ?>
