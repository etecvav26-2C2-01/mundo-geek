<?php
if ($user['role'] !== 'admin') {
    header('Location: ' .BASE_URL. '/index.php');
    exit;
}
