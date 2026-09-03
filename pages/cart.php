<?php

require_once __DIR__ . '/../config/app.php';
require_once __DIR__ . '/../config/database.php';

require_once __DIR__ . '/../includes/auth.php';

require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/navbar.php';

$id = isset($_GET['add']) ? $_GET['add'] : null;
$id = $_GET['add'] ?? null;

if ($id) {
    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]++;
    } else {
        $_SESSION['cart'][$id] = 1;
    }
    header('Location: '.BASE_URL.'/pages/cart.php');
}

$products = [];

    $sql = "SELECT * FROM products WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':id' => $id]);

    $products[] = $stmt->fetch(PDO::FETCH_ASSOC);

$remove = $_GET['remove'] ?? null;

if ($remove && isset($_SESSION['cart'][$remove])) {
    unset($_SESSION['cart'][$remove]);
    header('Location: '.BASE_URL.'/pages/cart.php');
}

$products = [];

foreach ($_SESSION['cart'] as $id => $qtd) {
    $sql = "SELECT * FROM products WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':id' => $id]);

    $products[] = $stmt->fetch(PDO::FETCH_ASSOC);
}


?>
<main>
    <div class="w-100 d-flex flex-column">

        <?php foreach ($products as $product) : ?>

                <div class="w-100 flex-row">
                    <div class="card products-card d-flex flex-row">
                        <?php if (!empty($product['image'])): ?>
                            <div class="card__img-wrapper">
                                <img src="<?= BASE_URL ?>/assets/uploads/products/<?= htmlspecialchars($product['image']) ?>" class="card-img-top card__img">
                            </div>
                        <?php else: ?>
                            <div class="card__img-placeholder">
                                <p class="card-text card__text">
                                    <?= $text['no_image_set_to_this_product'] ?>
                                </p>
                            </div>
                        <?php endif; ?>

                        <div class="card-body card__body">
                            <h5 class="card-title card__name">
                                <?= htmlspecialchars($product['name']) ?>
                            </h5>
                            <p class="card-text card__price">
                                R$ <?= htmlspecialchars($product['price']) ?>
                            </p>
                            <div class="card__actions">
                                <div class="d-flex gap-2 mt-3">
                                    <a href="product.php?id=<?= $product['id'] ?>" class="flex-grow-1 btn btn-primary w-100 text-nowrap">
                                        <?= $text['details'] ?>
                                    </a>

                                     <p>$text['quantity']: <?= $_SESSION['cart'][$id] ?></p>
                                    
                                    <a href="cart.php?remove=<?= $product['id'] ?>" class="flex-grow-1 btn btn-primary w-100 text-nowrap">
                                        <?= $text['delete'] ?>
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        <?php endforeach ?>
    </div>
</main>
