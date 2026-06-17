<?php

require_once __DIR__ . '/../config/app.php';  
require_once __DIR__ . '/../config/database.php';  

require_once __DIR__ . '/../includes/auth.php';
require_once __DIR__ . '/../includes/auth-admin.php';

require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/navbar.php';

$sql = "SELECT *
        FROM products 
        ORDER BY name ASC";

$stmt = $conn->prepare($sql);
$stmt->execute();

$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
    <main class="container min-vh-100 d-flex align-items-center justify-content-center py-4">
        <section class="row w-100 shadow-lg rounded-4 overflow-hidden">

            <div class="bg-white p-4">

                <div class="mb-4">
                    <h1 class="fw-bold mb-1">Mundo Geek</h1>
                </div>

                <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 g-4">
                    <?php foreach ($products as $product): ?>
                        <div class="col">
                            <div class="card h-100">
                                <?php if(!empty($product['image'])):?>
                                    <img style="height: 80%; object-fit: contain;" src="<?= BASE_URL ?>/assets/uploads/products/<?= htmlspecialchars($product['image']) ?>" class="card-img-top">

                                <?php else: ?>
                                    <p class="card-text">
                                        <?= $text['no_image_set_to_this_product'] ?>
                                    </p>
                                <?php endif; ?>

                                <div class="card-body">
                                    <h5 class="card-title">
                                        <?= htmlspecialchars($product['name']) ?>
                                    </h5>
                                    <p class="card-text">
                                        R$ <?= htmlspecialchars($product['price']) ?>
                                    </p>
                                    <div class="container text-center">
                                        <div class="d-flex gap-2 mt-3">
                                            <a href="product.php?id=<?= $product['id'] ?>" class="flex-grow-1 btn btn-primary w-100 text-nowrap">
                                                <?= $text['details'] ?>
                                            </a>
                                            <a href="cart.php?add=<?= $product['id'] ?>" class="btn btn-primary text-nowrap">
                                                <img style="width: 20px;" src="<?= BASE_URL ?>/assets/img/cart.svg">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </section>
    </main>
    
    <?php require_once __DIR__ . '/../includes/footer.php'; ?>
