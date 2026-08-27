<?php

require_once __DIR__ . '/../../config/app.php';
require_once __DIR__ . '/../../config/database.php';

require_once __DIR__ . '/../../includes/auth.php';
require_once __DIR__ . '/../../includes/auth-admin.php';

require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/navbar.php';

?>
<main>
    <section class="card tf-card">
        <div class="card-body">
            <form action = "store.php" method = "post" enctype = "multipart/form-data">
                <div class="mb-3">
                    <label for="username" class="form-label"><?= $text['username'] ?></label>
                    <input type="text" class="form-control" id="username" name = "username" aria-describedby="username" required>
                <div id="nameHelp" class="form-text"></div>
                </div>
                <div class="mb-3">
                    <label for="passaword" class="form-label"><?= $text['password'] ?></label>
                    <input class="form-control" type="password" id="password" name = "password" min = "0" required>
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label"><?= $text['role'] ?></label>
                    <select class="form-select" type="select" id="role" name = "role" min = "0" step="0.001" required>
                    <option value="" selected disabled>Selecione um cargo</option>
                        <option value="user">Cliente</option>
                        <option value="admin">Administrador</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary"><?= $text['submit'] ?></button>
            </form>
        </div>
    </section>
</main>
