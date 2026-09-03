<?php

require_once __DIR__ . '/../../config/app.php';
require_once __DIR__ . '/../../config/database.php';

require_once __DIR__ . '/../../includes/auth.php';
require_once __DIR__ . '/../../includes/auth-admin.php';

require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/navbar.php';

if (isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "SELECT * FROM users WHERE id = :id";

    $stmt = $conn->prepare($sql);
    
    $stmt->execute([
        ':id' => $id
    ]);


    $user = $stmt -> fetch(PDO::FETCH_ASSOC);
}

if (isset($_POST['btn-edit'])) {
        
    $id = $_GET['id'];

    $username = trim($_POST['username']);
    $role = trim($_POST['role']);

    $sql = "UPDATE users SET username = :username, role = :role Where id = :id";

    $stmt = $conn->prepare($sql);

    $stmt->execute([
        ':id' => $id,
        ':username' => $username,
        ':role' => $role
    ]);

    header("Location: index.php");
    
    exit;
}

?>

<main>
    <section class="card tf-card">
        <div class="card-body">
            <form action = "" method = "post" enctype = "multipart/form-data">
                <div class="mb-3">
                    <label for="username" class="form-label"><?= $text['username'] ?></label>
                    <input type="text" class="form-control" id="username" name = "username" aria-describedby="username" required>
                <div id="nameHelp" class="form-text"></div>
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label">role</label>
                    <select class="form-select" id="role" name = "role" required>
                    <option value="role" selected disabled>Selecione um cargo</option>
                        <option value="user">Cliente</option>
                        <option value="admin">Administrador</option>
                    </select>
                </div>
                <button type="submit" name = "btn-edit" class="btn btn-primary"><?= $text['submit'] ?></button>
            </form>
        </div>
    </section>
</main>
