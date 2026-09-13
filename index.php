<?php
require_once __DIR__ . '/config/app.php';
require_once __DIR__ . '/config/database.php';

require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/navbar.php';

$sql = "SELECT id, name, description, price, image, stock
        FROM products
        ORDER BY name ASC
        LIMIT 5";

$stmt = $conn->prepare($sql);
$stmt->execute();

$featuredProducts = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<div id="carouselExampleAutoplaying" class="carousel slide hero-carousel-banner" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active carousel-item-hero">
      <picture>
        <source media="(max-width: 425px)" srcset="<?= BASE_URL ?>/assets/img/freight-banner.jpg">
        <img src="<?= BASE_URL ?>/assets/img/freight-banner-desktop.jpg" class="d-block w-100" alt="Frete grátis">
      </picture>
    </div>
    <div class="carousel-item carousel-item-hero">
      <picture>
        <source media="(max-width: 425px)" srcset="<?= BASE_URL ?>/assets/img/book-banner.jpg">
        <img src="<?= BASE_URL ?>/assets/img/book-banner-desktop.jpg" class="d-block w-100" alt="Frete grátis">
      </picture>
    </div>
    <div class="carousel-item carousel-item-hero">
      <picture>
        <source media="(max-width: 425px)" srcset="<?= BASE_URL ?>/assets/img/funko-banner.jpg">
        <img src="<?= BASE_URL ?>/assets/img/funko-banner-desktop.jpg" class="d-block w-100" alt="Frete grátis">
      </picture>
    </div>
  </div>
  <button class="carousel-control-prev carousel-cprev-hero" type="button" data-bs-target="#carouselExampleAutoplaying"
    data-bs-slide="prev">
    <span class="carousel-control-prev-icon carousel-cprevi-hero" aria-hidden="true"></span>
    <span class="visually-hidden carousel-vhidden-hero">Previous</span>
  </button>
  <button class="carousel-control-next carousel-cnext-hero" type="button" data-bs-target="#carouselExampleAutoplaying"
    data-bs-slide="next">
    <span class="carousel-control-next-icon carousel-cnexti-hero" aria-hidden="true"></span>
    <span class="visually-hidden carousel-vhidden-hero">Next</span>
  </button>
</div>

<section class ="container py-4">
  <h2> <?= $text['featured_products']?> </h2>
  <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 g-4">
    <?php foreach ($featuredProducts as $product): ?>
      <div class="col">
        <div class="card h-100 products-card">
          <?php if (!empty($product['image'])): ?>
            <div class="card__img-wrapper">
              <img src="<?= BASE_URL ?>/assets/uploads/products/<?= htmlspecialchars($product['image']) ?>"
                class="card-img-top card__img">
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
                <a href="pages/product.php?id=<?= $product['id'] ?>" class="flex-grow-1 btn btn-primary w-100 text-nowrap">
                  <?= $text['details'] ?>
                </a>
                <a href="pages/cart.php?add=<?= $product['id'] ?>" class="btn btn-primary text-nowrap">
                  <img style="width: 20px;" src="<?= BASE_URL ?>/assets/img/cart.svg">
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach ?>
  </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>