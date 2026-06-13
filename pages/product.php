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
                        No image set to this product
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
                        <?= $text['Dimensions'] ?>
                    </p>
                    <p class="card-text">
                        <?= $text['Height'] ?> <?= $product['height'] ?> cm
                    </p>
                    <p class="card-text">
                        <?= $text['Width'] ?> <?= $product['width'] ?> cm
                    </p>
                    <p class="card-text">
                        <?= $text['Weight'] ?> <?= $product['weight'] ?> kg
                    </p>

                    <div class="container card-produto-botao text-center">
                        <a href="cart.php?add=<?= $product['id'] ?>" class="btn btn-primary w-100 text-nowrap">
                            Add to Cart
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
<?php require_once __DIR__ . '/../includes/footer.php'; ?>
</body>

</html>