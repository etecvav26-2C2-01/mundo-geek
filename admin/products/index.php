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
                        <article class="card tf-card h-100 admin-card">
                            <?php if (!empty($product['image'])): ?>
                                <div class="admin-card__img-wrapper">
                                    <img
                                        src="../../assets/uploads/products/<?= htmlspecialchars($product['image']) ?>" 
                                        class="admin-card__img"
                                        alt="<?= htmlspecialchars($product['name']) ?>"
                                    >
                                </div>
                            <?php else: ?>
                                <div class="admin-card__placeholder">
                                    <p><?= $text['no_image_set_to_this_product'] ?></p>
                                </div>
                            <?php endif; ?>
                            <div class="card-body d-flex flex-column admin-card__body">
                                <h5 class="card-title fw-bold admin-card__name">
                                    <?= htmlspecialchars($product['name'])?>
                                </h5>
                                <textarea readonly class="card-text text-muted flex-grow-1 admin-card__description">
                                    <?= htmlspecialchars($product['description']) ?>
                                </textarea>
                                <div class="mb-3">
                                    <span class="badge text-bg-light admin-card__price">
                                        R$ <?= number_format($product['price'], 2, ',', '.')?>
                                    </span>
                                    <span class="badge text-bg-light admin-card__stock">
                                        <?= htmlspecialchars($product['stock']) ?>
                                    </span>
                                </div>
                                <div class="d-flex gap-2 admin-card__actions">
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
