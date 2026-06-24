<?php

$allowedLanguages = ["en-us", "pt-br"];
if (isset($_GET['lang']) && in_array($_GET['lang'], $allowedLanguages)) {
    $_SESSION['lang'] = $_GET['lang'];
}

$lang = $_SESSION['lang'] ?? 'en-us';
require_once __DIR__ . '/../lang/' . $lang . '.php';

?>

<header>
  <link href="../assets/css/style.css" rel="stylesheet">
  <nav class="header__nav navbar navbar-expand-lg py-2">
    <div class="header__container container-fluid justify-content-between">
      <a href="<?= BASE_URL ?>/index.php">
        <img class="logo-img" src="<?= BASE_URL ?>/assets/img/logo.png" alt="Logo da Mundo Geek">
      </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="header__actions">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="<?= BASE_URL ?>/index.php"><?= $text['home']?></a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Admin
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="<?= BASE_URL ?>/admin/dashboard.php"><?= $text['dashboard'] ?></a></li>
                <li><a class="dropdown-item" href="<?= BASE_URL ?>/admin/products/index.php"><?= $text['products'] ?></a></li>
                <li><a class="dropdown-item disabled" href="<?= BASE_URL ?>/admin/orders/index.php"><?= $text['orders'] ?></a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="<?= BASE_URL ?>/admin/logout.php"><?= $text['leave'] ?></a></li>
              </ul>
            </li>
          </ul>
        </div>
        <div>
          <div class="header-lang__container mobile-hide d-flex justify-content-center gap-2">
            <div>
              <a class="cart-link" href="<?= BASE_URL ?>/pages/cart.php">
                <img class="cart-img" src="<?= BASE_URL ?>/assets/img/cart.svg" alt="Carrinho">
              </a>
            </div>
            <div class="dropdown ms-3">
              <a href="#" class="d-flex align-items-center text-decoration-none"
                data-bs-toggle="dropdown" aria-expanded="false">

                  <img class="profile-img" src="<?= BASE_URL ?>/assets/img/icon.png" alt="Perfil">
              </a>

              <ul class="dropdown-menu dropdown-menu-end">
                  <li><a class="dropdown-item disabled" href="profile.php"><?= $text['profile'] ?></a></li>
                  <li><a class="dropdown-item disabled" href="u-requests.php"><?= $text['u-orders'] ?></a></li>
                  <li><a class="dropdown-item disabled" href="settings.php"><?= $text['settings'] ?></a></li>

                  <li><hr class="dropdown-divider"></li>

                  <li><a class="dropdown-item text-danger" href="<?= BASE_URL ?>/admin/logout.php"><?= $text['leave'] ?></a></li>
              </ul>
            </div>
            <a href="?lang=en-us" class="btn btn-sm btn-outline-secondary">
              EN-US
            </a>
            <a href="?lang=pt-br" class="btn btn-sm btn-outline-secondary">
              PT-BR
            </a>
          </div>
        </div>
      </div>
    </div>
  </nav>
</header>