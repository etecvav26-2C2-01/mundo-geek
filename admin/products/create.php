<?php

$currentpage = 'products';

?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
<main class="container py-4">

    <section class="mb-4">
        <h1 class="fw-bold mb-1">New Product</h1>
        <p class="text-muted mb-0">Create Product</p>
    </section>

    <section class="card tf-card">
        <div class="card-body">
            <form action = "store.php" method = "post" enctype = "multipart/form-data">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" aria-describedby="name>
                <div id="nameHelp" class="form-text"></div>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" class="form-control" id="description">
                </div>
                <div class="mb-3">
                    <label for="stock" class="form-label">Stock</label>
                    <input class="form-control" type="number" id="stock" min = "0">
                </div>
                <div class="mb-3">
                    <label for="height" class="form-label">Height</label>
                    <input class="form-control" type="number" id="height" min = "0" step="0.001">
                </div>
                <div class="mb-3">
                    <label for="weight" class="form-label">Weight</label>
                    <input class="form-control" type="number" id="weight" min = "0" step="0.001">
                </div>
                <div class="mb-3">
                    <label for="width" class="form-label">Width</label>
                    <input class="form-control" type="number" id="width" min = "0" step="0.001">
                </div>
                <div class="mb-3">
                    <label for="length" class="form-label">Length</label>
                    <input class="form-control" type="number" id="length" min = "0" step="0.001">
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Input file</label>
                    <input class="form-control" type="file" id="image" accept="image/png, image/jpeg, image/webp">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </section>
</main>
</body>
</html>
