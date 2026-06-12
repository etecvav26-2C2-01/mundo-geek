<?php

session_start();
$allowedLanguages = ["en-us", "pt-br"];

if (isset($_GET['lang']) && in_array($_GET['lang'], $allowedLanguages)) {
    $_SESSION['lang'] = $_GET['lang'];
}

$lang = $_SESSION['lang'] ?? 'en-us';
require_once __DIR__ . '/../lang/' . $lang . '.php';

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../config/app.php';

if (isset($_SESSION['user'])) {
    header('Location: '. BASE_URL .'/pages/index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');
    
    if(empty($username) || empty($password)){
        $errorMessage = 'Fill all fields';
    }else{
         
        $sql = "SELECT * FROM users WHERE username = :username";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':username' => $username]);
            
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($user) {
            if(password_verify($_POST['password'], $user['password'])){
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['username'];

                header('Location: '. BASE_URL .'/pages/index.php');
                exit;
            }else{
                $errorMessage = 'Incorrect password combination'; 
            exit;
            }

        }else{
            $errorMessage = 'No user named "' .$username. '" found'; 
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="<?= htmlspecialchars($lang) ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mundo Geek - Login</title>
    
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <main class="container min-vh-100 d-flex align-items-center justify-content-center py-4">
    <section class="row w-100 shadow-lg rounded-4 overflow-hidden">

        <div class="bg-white p-4">
            
            <div class="mb-4">
                <h1 class="fw-bold mb-1">
                    Mundo Geek
                </h1>
            </div>
            
            <h2 class="h4 mb-3">
                Login
            </h2>

            <form method="post" action="login.php">

                <div class="mb-3">
                    <label for="username" class="form-label">
                        Username
                    </label>
                    <input 
                        type="text" 
                        class="form-control" 
                        id="username" 
                        name="username" 
                        required
                    >
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">
                        Password
                    </label>
                    <input 
                        type="password" 
                        class="form-control" 
                        id="password" 
                        name="password" 
                        required
                    >
                </div>
                
                <?php if (!empty($errorMessage)): ?>
                    <div class="alert alert-danger">
                        <?= htmlspecialchars($errorMessage) ?>
                    </div>
                <?php endif; ?>

                <button type="submit" class="btn w-100 mb-3">
                    Login
                </button>

            </form>

            <div class="d-flex justify-content-center gap-2">
                <a href="?lang=en-us" class="btn btn-sm btn-outline-secondary">
                    EN
                </a>
                <a href="?lang=pt-br" class="btn btn-sm btn-outline-secondary">
                    PT
                </a>
            </div>

            <p class="small text-center mt-4 mb-0">
                Educational project · Beta version
            </p>
        </div>
        
    </section>

</main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
