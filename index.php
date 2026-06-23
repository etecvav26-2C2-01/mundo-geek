<?php
require_once __DIR__ . '/config/app.php';  
require_once __DIR__ . '/config/database.php';

require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/navbar.php';

$sql = "SELECT id, name, description, price, image, stock
        FROM products
        ORDER BY name ASC";

$stmt = $conn->prepare($sql);
$stmt->execute();

$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
  <button class="carousel-control-prev carousel-cprev-hero" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
    <span class="carousel-control-prev-icon carousel-cprevi-hero" aria-hidden="true"></span>
    <span class="visually-hidden carousel-vhidden-hero" >Previous</span>
  </button>
  <button class="carousel-control-next carousel-cnext-hero" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
    <span class="carousel-control-next-icon carousel-cnexti-hero" aria-hidden="true"></span>
    <span class="visually-hidden carousel-vhidden-hero">Next</span>
  </button>
</div>


<?php require_once __DIR__ . '/includes/footer.php'; ?>