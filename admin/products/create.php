<?php

$currentpage = 'products';

require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../includes/auth.php';
require_once __DIR__ . '/../../includes/auth-admin.php';
require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/navbar.php';

?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

<main class="container py-4">

    <section class="mb-4">
        <h1 class="fw-bold mb-1"><?= $text['new_product'] ?></h1>
        <p class="text-muted mb-0"><?= $text['create_product'] ?></p>
    </section>

    <section class="card tf-card">
        <div class="card-body">
            <form action = "store.php" method = "post" enctype = "multipart/form-data">
                <div class="mb-3">
                    <label for="name" class="form-label"><?= $text['name'] ?></label>
                    <input type="text" class="form-control" id="name" name = "name" aria-describedby="name">
                <div id="nameHelp" class="form-text"></div>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label"><?= $text['description'] ?></label>
                    <input type="text" class="form-control" id="description" name = "description" >
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label"><?= $text['price'] ?></label>
                    <input class="form-control" type="number" id="price" name = "price" step ="0.01" min = "0">
                </div>
                <div class="mb-3">
                    <label for="stock" class="form-label"><?= $text['stock'] ?></label>
                    <input class="form-control" type="number" id="stock" name = "stock" min = "0">
                </div>
                <div class="mb-3">
                    <label for="height" class="form-label"><?= $text['height'] ?></label>
                    <input class="form-control" type="number" id="height" name = "height" min = "0" step="0.001">
                </div>
                <div class="mb-3">
                    <label for="weight" class="form-label"><?= $text['weight'] ?></label>
                    <input class="form-control" type="number" id="weight" name = "weight" min = "0" step="0.001">
                </div>
                <div class="mb-3">
                    <label for="width" class="form-label"><?= $text['width'] ?></label>
                    <input class="form-control" type="number" id="width" name = "width" min = "0" step="0.001">
                </div>
                <div class="mb-3">
                    <label for="length" class="form-label"><?= $text['lenght'] ?></label>
                    <input class="form-control" type="number" id="length" name = "length" min = "0" step="0.001">
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label"><?= $text['input_file'] ?></label>
                    <input class="form-control" type="file" id="image" name = "image" accept="image/png, image/jpeg, image/jpg, image/webp">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" class="btn btn-primary"><?= $text['submit'] ?></button>
            </form>
        </div>
    </section>
</main>

