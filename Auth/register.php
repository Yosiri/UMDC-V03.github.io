<?php
require __DIR__ . '/../Config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $role = $_POST['role'];
    $fname = $_POST['first_name'];
    $lname = $_POST['last_name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $roleStmt = $pdo->prepare("SELECT role_id FROM roles WHERE role_name = ?");
    $roleStmt->execute([$role]);
    $role_id = $roleStmt->fetchColumn();

    $stmt = $pdo->prepare("INSERT INTO users 
        (role_id, first_name, last_name, email, password_hash) 
        VALUES (?,?,?,?,?)");
    $stmt->execute([$role_id, $fname, $lname, $email, $password]);

    header("Location: /public/login.html");
    exit;
}
?>