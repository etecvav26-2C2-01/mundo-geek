<?php

require_once __DIR__ . '/../config/database.php';   
require_once __DIR__ . '/../includes/auth.php';
require_once __DIR__ . '/../includes/auth-admin.php';

require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/navbar.php';


$sql = "SELECT COUNT(*)
        FROM products ";

$stmt = $conn->prepare($sql);
$stmt->execute();

$total_products = $stmt->fetchColumn();
$total_orders = 0;

?>

    <main class="container min-vh-100 d-flex justify-content-center py-4">
        <section class="row g-4 w-100 h-100">

            <div class="col-12 col-md-6">
                <div class="card w-100 rounded-bottom-4">
                    <img src="<?= BASE_URL ?>/assets/img/products-menu-top.png" class="card-img-top" alt="Products menu">
                    <div class="card-body">
                        <h3><?= $text['Products'] ?></h3>
                        <p><?= $text['There_Are_Currently'] ?> <?= $total_products ?> <?= $text['Registered_Products'] ?>.</p>
                    </div>
                    <a href="<?= BASE_URL ?>/admin/products/index.php" class="btn btn-primary w-100 text-nowrap rounded-bottom-4 rounded-top-0">
                        <?= $text['Manage'] ?>
                    </a>
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="card w-100 rounded-bottom-4">
                    <img src="<?= BASE_URL ?>/assets/img/orders-banner.png" class="card-img-top" alt="Orders menu">
                    <div class="card-body">
                        <h3><?= $text['Orders'] ?></h3>
                        <p><?= $text['There_Are_Currently'] ?> <?= $total_orders ?> <?= $text['Registered_Orders'] ?>.</p>
                    </div>
                    <a href="<?= BASE_URL ?>/admin/orders/index.php" class="btn btn-secondary w-100 text-nowrap rounded-bottom-4 rounded-top-0 disabled">
                        <?= $text['Soon'] ?>
                    </a>
                </div>
            </div>

        </section>
    </main>

    <?php require_once __DIR__ . '/../includes/footer.php'; ?>
</body>

</html>
