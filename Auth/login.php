<?php
session_start();
require __DIR__ . '/../Config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT u.*, r.role_name 
                           FROM users u 
                           JOIN roles r ON u.role_id = r.role_id 
                           WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password_hash'])) {
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['role'] = $user['role_name'];

        if ($user['role_name'] === 'admin') {
            header("Location: /dashboard/admin.php");
        } elseif ($user['role_name'] === 'organization') {
            header("Location: /dashboard/organization.php");
        } elseif ($user['role_name'] === 'user') {
            header("Location: /dashboard/user.php");
        }
        exit;
    } else {
        echo "Invalid login";
    }
}
?>