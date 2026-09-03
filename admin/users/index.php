<?php

require_once __DIR__ . '/../../config/app.php';
require_once __DIR__ . '/../../config/database.php';

require_once __DIR__ . '/../../includes/auth.php';
require_once __DIR__ . '/../../includes/auth-admin.php';

require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/navbar.php';

$sql = "SELECT id, username, role
        FROM users
        ORDER BY username ASC";
$stmt = $conn->prepare($sql);
$stmt->execute();

$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<main>
    <section class="card tf-card">
        <div class="card-body">
            <div class="row g-4">
                <?php foreach ($users as $user): ?>
                    <div class="col-12 col-md-6 col-lg-4">
                        <article class="card tf-card h-100 admin-card">
                            <div class="card-body d-flex flex-column admin-card__body">
                                <h5 class="card-title fw-bold admin-card__username">
                                    username: <?= htmlspecialchars($user['username'])?>
                                </h5>
                                <h5 class="card-title fw-bold admin-card__id">
                                    id: <?= number_format($user['id'])?>
                                </h5>
                                <h5 class="card-title fw-bold admin-card__role">
                                    role: <?= htmlspecialchars($user['role']) ?>
                                </h5>
                                </div>
                                <div class="d-flex gap-2 admin-card__actions">
                                    <a href="edit.php?id=<?= $user['id'] ?>"
                                        class="btn btn-sm btn-outline-secondary w-100">
                                        <?= $text['edit']?>
                                    </a>
                                </div>
                            </div>
                        </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</main>
<?php 
require_once __DIR__ . '/../../includes/footer.php';
?>