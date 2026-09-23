<?php

require_once '../../config/database.php';
require_once '../../config/app.php';

require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/navbar.php';

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';
$role = $_POST['role'] ?? '';

try{
    $sql = "INSERT INTO users (username, password, role)
            Values (:username, :password, :role)";
    
    $stmt = $conn->prepare($sql);
    
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    
    $stmt->execute([
        ':username' => $username,
        ':password' => $password_hash,
        ':role' => $role
    ]);
} catch (PDOException $e){
    $errorMessage = $text['error_signup'];
 }
?>

<?php if (!empty($errorMessage)): ?>
    <div class="alert alert-danger">
        <p><?= htmlspecialchars($errorMessage) ?></p>
    </div>
<?php else: ?>
    <?php 
    header('location: index.php');
    exit; 
    ?>
<?php endif; ?>
