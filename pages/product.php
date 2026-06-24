<?php

require_once __DIR__ . '/../config/app.php';
require_once __DIR__ . '/../config/database.php';

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

<main class="container min-vh-100 d-flex justify-content-center py-4">
    <section class="row justify-content-center">
        <div class="col-12 w-100">
            <div class="card product-detail">
                <?php if (!empty($product['image'])): ?>
                    <div class="product-detail__img-wrapper">
                        <img src="<?= BASE_URL ?>/assets/uploads/products/<?= htmlspecialchars($product['image']) ?>" class="card-img-top product-detail__img">
                    </div>
                <?php else: ?>
                    <div class="product-detail__img-placeholder">
                        <p class="card-text">
                            <?= $text['no_image_set_to_this_product'] ?>
                        </p>
                    </div>
                <?php endif; ?>

                <div class="card-body product-detail__body">
                    <h5 class="card-title product-detail__name">
                        <?= htmlspecialchars($product['name']) ?>
                    </h5>
                    <p class="card-text product-detail__price">
                        R$ <?= htmlspecialchars($product['price']) ?>
                    </p>
                    <p class="card-text product-detail__description">
                        <?= htmlspecialchars($product['description']) ?>
                    </p>
                    <div class="product-detail__dimensions">
                        <p class="card-text fw-bold">
                            <?= $text['dimensions'] ?>
                        </p>
                        <p class="card-text product-detail__dimension">
                            <?= $text['height'] ?> <?= $product['height'] ?> cm
                        </p>
                        <p class="card-text product-detail__dimension">
                            <?= $text['width'] ?> <?= $product['width'] ?> cm
                        </p>
                        <p class="card-text product-detail__dimension">
                            <?= $text['weight'] ?> <?= $product['weight'] ?> kg
                        </p>
                    </div>
                    <div class="container product-detail__action text-center">
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
