<?php

require_once __DIR__ . '/../config/app.php';
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
                <div class="card dashboard-card w-100 rounded-bottom-4">
                    <img src="<?= BASE_URL ?>/assets/img/products-menu-top.png" class="card-img-top dashboard-card-img" alt="Products menu">
                    <div class="card-body dashboard-card-body">
                        <h3><?= $text['products'] ?></h3>
                        <p><?= $text['there_are_currently'] ?> <?= $total_products ?> <?= $text['registered_products'] ?>.</p>
                    </div>
                    <a href="<?= BASE_URL ?>/admin/products/index.php" class="btn btn-primary dashboard-card-btn w-100 text-nowrap rounded-bottom-4 rounded-top-0">
                        <?= $text['manage'] ?>
                    </a>
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="card dashboard-card w-100 rounded-bottom-4">
                    <img src="<?= BASE_URL ?>/assets/img/orders-banner.png" class="card-img-top dashboard-card-img" alt="Orders menu">
                    <div class="card-body dashboard-card-body">
                        <h3><?= $text['orders'] ?></h3>
                        <p><?= $text['there_are_currently'] ?> <?= $total_orders ?> <?= $text['registered_orders'] ?>.</p>
                    </div>
                    <a href="<?= BASE_URL ?>/admin/orders/index.php" class="btn btn-secondary dashboard-card-btn w-100 text-nowrap rounded-bottom-4 rounded-top-0 disabled">
                        <?= $text['soon'] ?>
                    </a>
                </div>
            </div>

        </section>
    </main>

    <?php require_once __DIR__ . '/../includes/footer.php'; ?>
