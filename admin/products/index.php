<?php

require_once __DIR__ . '/../../config/app.php';
require_once __DIR__ . '/../../config/database.php';

require_once __DIR__ . '/../../includes/auth.php';
require_once __DIR__ . '/../../includes/auth-admin.php';

require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/navbar.php';

$sql = "SELECT id, name, description, price, image, stock, created_at, height, weight, width, length
        FROM products
        ORDER BY name ASC";
$stmt = $conn->prepare($sql);
$stmt->execute();

$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<main>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <section class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
        <div>
            <h1><?= $text['products'] ?></h1>
            <p><?= $text['products_management'] ?></p>
        </div>
        <a href = "create.php" class = "btn tf-btn-primary"><?= $text['new_product'] ?></a>
    </section>

    <section class="card tf-card">
        <div class="card-body">
            
            <?php if(empty($products)): ?>

            <div class="text-center py-5">

                <h3><?= $text['no_product_found'] ?></h3>

                <a href = "create.php" class = "btn tf-btn-primary"><?= $text['create_product'] ?></a>

            </div>
            <?php else: ?>
            
            <div class="row g-4">
                <?php foreach ($products as $product): ?>
                    <div class="col-12 col-md-6 col-lg-4">
                        <article class="card tf-card h-100">
                            <?php if (!empty($product['image'])): ?>
                                <img
                                    src="../../assets/uploads/products/<?= htmlspecialchars($product['image']) ?>" 
                                    class="tf-product-card-image"
                                    alt="<?= htmlspecialchars($product['name']) ?>"
                                >
                            <?php else: ?>
                                <div class="tf-product-card-placeholder">
                                    <p><?= $text['no_image_set_to_this_product'] ?></p>
                                </div>
                            <?php endif; ?>
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title fw-bold">
                                    <?= htmlspecialchars($product['name'])?>
                                </h5>
                                <p class="card-text text-muted flex-grow-1">
                                    <?= htmlspecialchars($product['description']) ?>
                                </p>
                                <div class="mb-3">
                                    <span class="badge text-bg-light">
                                        R$ <?= number_format($product['price'], 2, ',', '.')?>
                                    </span>
                                    <span class="badge text-bg-light">
                                        <?= htmlspecialchars($product['stock']) ?>
                                    </span>
                                </div>
                                <div class="d-flex gap-2">
                                    <a href="edit.php?id=<?= $product['id'] ?>" 
                                        class="btn btn-sm btn-outline-secondary w-100"> 
                                        <?= $text['edit']?>
                                    </a>
                                    <a href="delete.php?id=<?= $product['id'] ?>" 
                                        class="btn btn-sm btn-outline-danger w-100" onclick="return confirm('<?= htmlspecialchars($text['confirm_delete'], ENT_QUOTES) ?>');">
                                        <?= $text['delete'] ?>
                                    </a>
                                </div>
                            </div>
                        </article>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </section>
</main>
<?php 
require_once __DIR__ . '/../../includes/footer.php';
?>
